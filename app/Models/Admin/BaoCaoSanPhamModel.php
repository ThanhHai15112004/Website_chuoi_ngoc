<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;

class BaoCaoSanPhamModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    private function query($sql, $params = [])
    {
        $stmt = $this->db->getConnection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function tongQuan($tuNgay, $denNgay)
    {
        // Doanh thu và số lượng SP đã bán
        $sqlBan = "SELECT 
                    SUM(ctdh.so_luong) as san_pham_da_ban,
                    SUM(ctdh.so_luong * ctdh.don_gia) as doanh_thu_san_pham
                   FROM chi_tiet_don_hang ctdh
                   JOIN don_hang dh ON ctdh.id_don_hang = dh.id
                   WHERE dh.trang_thai_don_hang = 3
                     AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?";
        $banData = $this->query($sqlBan, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetch(PDO::FETCH_ASSOC);

        // Kì trước để so sánh (để đơn giản trong model này, ta tạm tính 0, controller có thể query 2 lần hoặc model tự làm)
        // Controller truyền $tuNgay, $denNgay nên ta chỉ lấy dữ liệu của kì này

        // Sản phẩm bán chạy nhất
        $sqlTop = "SELECT 
                    sp.ten_sp as ten, 
                    sp.hinh_anh_chinh as hinh_anh,
                    SUM(ctdh.so_luong) as da_ban
                   FROM chi_tiet_don_hang ctdh
                   JOIN don_hang dh ON ctdh.id_don_hang = dh.id
                   JOIN san_pham_bien_the bt ON ctdh.id_bien_the = bt.id
                   JOIN san_pham sp ON bt.id_san_pham = sp.id
                   WHERE dh.trang_thai_don_hang = 3
                     AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                   GROUP BY sp.id
                   ORDER BY da_ban DESC
                   LIMIT 1";
        $topSp = $this->query($sqlTop, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetch(PDO::FETCH_ASSOC);

        // Bán chậm, sắp hết hàng, tồn kho cao
        $sqlInventory = "SELECT
            SUM(CASE WHEN tong_ton_kho > 0 AND tong_ton_kho <= 10 THEN 1 ELSE 0 END) as sap_het_hang,
            SUM(CASE WHEN tong_ton_kho > 50 THEN 1 ELSE 0 END) as ton_kho_cao
            FROM san_pham WHERE da_xoa = 0";
        $inventoryData = $this->query($sqlInventory)->fetch(PDO::FETCH_ASSOC);

        // Sản phẩm bán chậm (trong khoảng thời gian này không bán được hoặc < 2)
        $sqlCham = "SELECT COUNT(id) as sp_ban_cham FROM san_pham 
                    WHERE da_xoa = 0 AND tong_ton_kho > 0 AND id NOT IN (
                        SELECT DISTINCT bt.id_san_pham
                        FROM chi_tiet_don_hang ctdh
                        JOIN don_hang dh ON ctdh.id_don_hang = dh.id
                        JOIN san_pham_bien_the bt ON ctdh.id_bien_the = bt.id
                        WHERE dh.trang_thai_don_hang = 3
                          AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                    )";
        $spCham = $this->query($sqlCham, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetch(PDO::FETCH_ASSOC);

        return [
            'san_pham_da_ban' => $banData['san_pham_da_ban'] ?? 0,
            'doanh_thu_san_pham' => $banData['doanh_thu_san_pham'] ?? 0,
            'sp_ban_chay_nhat' => $topSp ?: ['ten' => 'Chưa có', 'da_ban' => 0, 'hinh_anh' => ''],
            'sp_ban_cham' => $spCham['sp_ban_cham'] ?? 0,
            'sap_het_hang' => $inventoryData['sap_het_hang'] ?? 0,
            'ton_kho_cao' => $inventoryData['ton_kho_cao'] ?? 0
        ];
    }

    public function topSanPham($tuNgay, $denNgay, $limit = 5)
    {
        $sql = "SELECT 
                    sp.ten_sp, 
                    SUM(ctdh.so_luong) as da_ban,
                    SUM(ctdh.so_luong * ctdh.don_gia) as doanh_thu
                FROM chi_tiet_don_hang ctdh
                JOIN don_hang dh ON ctdh.id_don_hang = dh.id
                JOIN san_pham_bien_the bt ON ctdh.id_bien_the = bt.id
                JOIN san_pham sp ON bt.id_san_pham = sp.id
                WHERE dh.trang_thai_don_hang = 3
                  AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                GROUP BY sp.id
                ORDER BY doanh_thu DESC
                LIMIT " . (int)$limit;
        
        $rows = $this->query($sql, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetchAll(PDO::FETCH_ASSOC);
        
        $labels = [];
        $da_ban = [];
        $doanh_thu = [];
        
        foreach ($rows as $r) {
            $labels[] = mb_strimwidth($r['ten_sp'], 0, 20, '...');
            $da_ban[] = (int)$r['da_ban'];
            $doanh_thu[] = (float)$r['doanh_thu'];
        }
        
        return [
            'labels' => $labels,
            'da_ban' => $da_ban,
            'doanh_thu' => $doanh_thu
        ];
    }

    public function doanhThuTheoDanhMuc($tuNgay, $denNgay)
    {
        $sql = "SELECT 
                    dm.ten_danh_muc, 
                    SUM(ctdh.so_luong * ctdh.don_gia) as doanh_thu
                FROM chi_tiet_don_hang ctdh
                JOIN don_hang dh ON ctdh.id_don_hang = dh.id
                JOIN san_pham_bien_the bt ON ctdh.id_bien_the = bt.id
                JOIN san_pham sp ON bt.id_san_pham = sp.id
                JOIN danh_muc dm ON sp.id_danh_muc = dm.id
                WHERE dh.trang_thai_don_hang = 3
                  AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                GROUP BY dm.id
                ORDER BY doanh_thu DESC";
        $rows = $this->query($sql, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetchAll(PDO::FETCH_ASSOC);
        
        $data = [];
        foreach ($rows as $r) {
            $data[$r['ten_danh_muc']] = (float)$r['doanh_thu'];
        }
        return $data;
    }

    public function hieuQuaTheoLoaiDa($tuNgay, $denNgay)
    {
        // Lấy tất cả loại đá và join với sản phẩm, đơn hàng
        $sql = "SELECT 
                    ld.ten_loai_da as ten,
                    (SELECT COUNT(id) FROM san_pham WHERE id_loai_da = ld.id AND trang_thai = 1 AND da_xoa = 0) as sp_dang_ban,
                    SUM(ctdh.so_luong) as da_ban,
                    SUM(ctdh.so_luong * ctdh.don_gia) as doanh_thu,
                    (SELECT sp2.ten_sp 
                     FROM chi_tiet_don_hang ct2 
                     JOIN don_hang dh2 ON ct2.id_don_hang = dh2.id
                     JOIN san_pham_bien_the bt2 ON ct2.id_bien_the = bt2.id
                     JOIN san_pham sp2 ON bt2.id_san_pham = sp2.id
                     WHERE sp2.id_loai_da = ld.id AND dh2.trang_thai_don_hang = 3 
                       AND dh2.ngay_tao >= ? AND dh2.ngay_tao <= ?
                     GROUP BY sp2.id ORDER BY SUM(ct2.so_luong) DESC LIMIT 1) as top_sp,
                    (SELECT sp_img.hinh_anh_chinh FROM san_pham sp_img WHERE sp_img.id_loai_da = ld.id AND sp_img.da_xoa = 0 ORDER BY sp_img.luot_xem DESC LIMIT 1) as hinh_anh
                FROM loai_da ld
                JOIN san_pham sp ON ld.id = sp.id_loai_da
                JOIN san_pham_bien_the bt ON sp.id = bt.id_san_pham
                JOIN chi_tiet_don_hang ctdh ON bt.id = ctdh.id_bien_the
                JOIN don_hang dh ON ctdh.id_don_hang = dh.id
                WHERE dh.trang_thai_don_hang = 3
                  AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                GROUP BY ld.id
                ORDER BY doanh_thu DESC";
        $rows = $this->query($sql, [$tuNgay.' 00:00:00', $denNgay.' 23:59:59', $tuNgay.' 00:00:00', $denNgay.' 23:59:59'])->fetchAll(PDO::FETCH_ASSOC);
        
        $totalDoanhThu = array_sum(array_column($rows, 'doanh_thu'));
        
        foreach ($rows as &$r) {
            $r['ty_trong'] = $totalDoanhThu > 0 ? round(($r['doanh_thu'] / $totalDoanhThu) * 100, 1) : 0;
            if ($r['hinh_anh'] && !str_starts_with($r['hinh_anh'], 'http')) {
                $r['hinh_anh'] = (defined('APP_URL') ? APP_URL : '') . '/public' . $r['hinh_anh'];
            }
        }
        return $rows;
    }

    public function hieuQuaTheoMenh($tuNgay, $denNgay)
    {
        $sql = "SELECT 
                    mpt.ten_menh as ten,
                    (SELECT COUNT(id) FROM san_pham WHERE id_menh_phong_thuy = mpt.id AND trang_thai = 1 AND da_xoa = 0) as sp_phu_hop,
                    SUM(ctdh.so_luong) as da_ban,
                    SUM(ctdh.so_luong * ctdh.don_gia) as doanh_thu,
                    (SELECT GROUP_CONCAT(DISTINCT ld.ten_loai_da SEPARATOR ', ') 
                     FROM san_pham sp3 
                     JOIN loai_da ld ON sp3.id_loai_da = ld.id 
                     WHERE sp3.id_menh_phong_thuy = mpt.id AND sp3.da_xoa = 0) as da_noi_bat
                FROM menh_phong_thuy mpt
                JOIN san_pham sp ON mpt.id = sp.id_menh_phong_thuy
                JOIN san_pham_bien_the bt ON sp.id = bt.id_san_pham
                JOIN chi_tiet_don_hang ctdh ON bt.id = ctdh.id_bien_the
                JOIN don_hang dh ON ctdh.id_don_hang = dh.id
                WHERE dh.trang_thai_don_hang = 3
                  AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                GROUP BY mpt.id
                ORDER BY doanh_thu DESC";
        $rows = $this->query($sql, [$tuNgay.' 00:00:00', $denNgay.' 23:59:59'])->fetchAll(PDO::FETCH_ASSOC);
        
        $totalDoanhThu = array_sum(array_column($rows, 'doanh_thu'));
        $badges = ['Kim' => 'bg-gray-100 text-gray-800', 'Mộc' => 'bg-green-100 text-green-800', 'Thủy' => 'bg-blue-100 text-blue-800', 'Hỏa' => 'bg-red-100 text-red-800', 'Thổ' => 'bg-yellow-100 text-yellow-800'];
        
        foreach ($rows as &$r) {
            $r['ty_trong'] = $totalDoanhThu > 0 ? round(($r['doanh_thu'] / $totalDoanhThu) * 100, 1) : 0;
            $r['badge'] = 'bg-gray-100 text-gray-800';
            foreach ($badges as $k => $v) {
                if (strpos($r['ten'], $k) !== false) $r['badge'] = $v;
            }
        }
        return $rows;
    }

    public function canhBaoTonKho($tuNgay, $denNgay)
    {
        // 1. Lấy SP Hết hàng hoặc sắp hết (tồn < 10)
        // 2. Tồn cao (tồn > 50)
        // Tính tốc độ bán trong kỳ
        $sql = "SELECT 
                    sp.id as ma_sp, 
                    sp.ten_sp, 
                    sp.tong_ton_kho as ton_kho,
                    IFNULL((SELECT SUM(ct.so_luong) 
                            FROM chi_tiet_don_hang ct 
                            JOIN don_hang dh ON ct.id_don_hang = dh.id
                            JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
                            WHERE bt.id_san_pham = sp.id AND dh.trang_thai_don_hang = 3
                              AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                           ), 0) as da_ban_ky
                FROM san_pham sp
                WHERE sp.da_xoa = 0 
                  AND (sp.tong_ton_kho <= 10 OR sp.tong_ton_kho > 50)
                ORDER BY sp.tong_ton_kho ASC
                LIMIT 15";
        $rows = $this->query($sql, [$tuNgay.' 00:00:00', $denNgay.' 23:59:59'])->fetchAll(PDO::FETCH_ASSOC);
        
        $days = max(1, (strtotime($denNgay) - strtotime($tuNgay)) / (60 * 60 * 24));
        
        $warnings = [];
        foreach ($rows as $r) {
            $toc_do = round($r['da_ban_ky'] / $days, 1);
            if ($r['ton_kho'] <= 0) {
                $canh_bao = 'Hết hàng';
                $badge = 'bg-red-50 text-red-700';
                $du_kien = '0 ngày';
            } elseif ($r['ton_kho'] <= 10) {
                $canh_bao = 'Sắp hết';
                $badge = 'bg-yellow-50 text-yellow-700';
                $du_kien = $toc_do > 0 ? ceil($r['ton_kho'] / $toc_do) . ' ngày' : 'N/A';
            } else {
                $canh_bao = 'Tồn cao';
                $badge = 'bg-orange-50 text-orange-700';
                $du_kien = '> 6 tháng';
            }
            
            $warnings[] = [
                'ten_sp' => $r['ten_sp'],
                'ma_sp' => $r['ma_sp'],
                'ton_kho' => $r['ton_kho'],
                'da_ban_ky' => $r['da_ban_ky'],
                'toc_do_ban' => $toc_do . '/ngày',
                'canh_bao' => $canh_bao,
                'badge' => $badge,
                'du_kien_het' => $du_kien
            ];
        }
        return $warnings;
    }

    public function sanPhamBanCham($tuNgay, $denNgay, $limit = 10)
    {
        $sql = "SELECT 
                    sp.id as ma_sp,
                    sp.ten_sp,
                    sp.tong_ton_kho as ton_kho,
                    sp.ngay_tao,
                    dm.ten_danh_muc as danh_muc,
                    IFNULL((SELECT SUM(ct.so_luong) 
                            FROM chi_tiet_don_hang ct 
                            JOIN don_hang dh ON ct.id_don_hang = dh.id
                            JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
                            WHERE bt.id_san_pham = sp.id AND dh.trang_thai_don_hang = 3
                              AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                           ), 0) as da_ban_ky,
                    IFNULL((SELECT SUM(ct.so_luong * ct.don_gia) 
                            FROM chi_tiet_don_hang ct 
                            JOIN don_hang dh ON ct.id_don_hang = dh.id
                            JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
                            WHERE bt.id_san_pham = sp.id AND dh.trang_thai_don_hang = 3
                              AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                           ), 0) as doanh_thu
                FROM san_pham sp
                LEFT JOIN danh_muc dm ON sp.id_danh_muc = dm.id
                WHERE sp.da_xoa = 0 AND sp.tong_ton_kho > 0
                HAVING da_ban_ky <= 2
                ORDER BY sp.ngay_tao ASC, da_ban_ky ASC
                LIMIT " . (int)$limit;
        
        $params = [
            $tuNgay.' 00:00:00', $denNgay.' 23:59:59',
            $tuNgay.' 00:00:00', $denNgay.' 23:59:59'
        ];
        
        $rows = $this->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
        
        $result = [];
        $now = time();
        foreach ($rows as $r) {
            $days_created = max(1, round(($now - strtotime($r['ngay_tao'])) / 86400));
            $ly_do = 'Chưa có khuyến mãi';
            $de_xuat = 'Tạo khuyến mãi';
            if ($days_created > 90) {
                $ly_do = 'Sản phẩm quá cũ';
                $de_xuat = 'Điều chỉnh giá';
            }
            $result[] = [
                'ma_sp' => $r['ma_sp'],
                'ten_sp' => $r['ten_sp'],
                'danh_muc' => $r['danh_muc'],
                'ton_kho' => $r['ton_kho'],
                'da_ban_ky' => $r['da_ban_ky'],
                'doanh_thu' => $r['doanh_thu'],
                'ngay_tao' => date('d/m/Y', strtotime($r['ngay_tao'])),
                'ngay_chua_ban' => $days_created,
                'ly_do' => $ly_do,
                'de_xuat' => $de_xuat
            ];
        }
        return $result;
    }

    public function hieuQuaKhuyenMai($tuNgay, $denNgay)
    {
        $sql = "SELECT 
                    km.ten_chuong_trinh as chuong_trinh,
                    sp.ten_sp,
                    sp.gia_ban as gia_goc,
                    IFNULL(km_sp.gia_tri_giam_tuy_chinh, 
                        CASE 
                            WHEN km.kieu_giam = 'phan_tram' THEN sp.gia_ban * (1 - km.gia_tri_giam/100)
                            WHEN km.kieu_giam = 'so_tien' THEN GREATEST(sp.gia_ban - km.gia_tri_giam, 0)
                            ELSE km.gia_tri_giam
                        END
                    ) as gia_sale,
                    IFNULL(km_sp.so_luong_da_ban, 0) as ban_trong,
                    (SELECT SUM(ct.so_luong) 
                     FROM chi_tiet_don_hang ct 
                     JOIN don_hang dh ON ct.id_don_hang = dh.id
                     JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
                     WHERE bt.id_san_pham = sp.id AND dh.trang_thai_don_hang = 3
                       AND dh.ngay_tao < km.ngay_bat_dau
                    ) as ban_truoc
                FROM chuong_trinh_khuyen_mai km
                JOIN chuong_trinh_khuyen_mai_san_pham km_sp ON km.id = km_sp.id_khuyen_mai
                JOIN san_pham sp ON km_sp.id_san_pham = sp.id
                WHERE km.ngay_bat_dau <= ? AND km.ngay_ket_thuc >= ?
                  AND km.trang_thai IN (1, 2)
                LIMIT 10";
                
        $rows = $this->query($sql, [$denNgay.' 23:59:59', $tuNgay.' 00:00:00'])->fetchAll(PDO::FETCH_ASSOC);
        
        $result = [];
        foreach ($rows as $r) {
            $dt = $r['ban_trong'] * $r['gia_sale'];
            $giam = $r['ban_trong'] * ($r['gia_goc'] - $r['gia_sale']);
            $hieu_qua = 'Tốt';
            $badge = 'bg-green-100 text-green-800';
            if ($r['ban_trong'] <= $r['ban_truoc']) {
                $hieu_qua = 'Không hiệu quả';
                $badge = 'bg-red-100 text-red-800';
            } elseif ($r['ban_trong'] < $r['ban_truoc'] * 2) {
                $hieu_qua = 'Trung bình';
                $badge = 'bg-blue-100 text-blue-800';
            }
            
            $result[] = [
                'ten_sp' => $r['ten_sp'],
                'chuong_trinh' => $r['chuong_trinh'],
                'gia_goc' => $r['gia_goc'],
                'gia_sale' => $r['gia_sale'],
                'ban_truoc' => (int)$r['ban_truoc'],
                'ban_trong' => (int)$r['ban_trong'],
                'doanh_thu' => $dt,
                'tong_giam' => $giam,
                'hieu_qua' => $hieu_qua,
                'badge' => $badge
            ];
        }
        return $result;
    }

    public function danhSachSanPham($tuNgay, $denNgay, $limit = 10, $offset = 0, $filters = [])
    {
        $sql = "SELECT 
                    sp.id, sp.ten_sp, sp.hinh_anh_chinh as anh, sp.gia_ban as gia, sp.tong_ton_kho as ton_kho,
                    dm.ten_danh_muc as danh_muc, ld.ten_loai_da as da, mpt.ten_menh as menh,
                    IFNULL((SELECT SUM(ct.so_luong) 
                            FROM chi_tiet_don_hang ct 
                            JOIN don_hang dh ON ct.id_don_hang = dh.id
                            JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
                            WHERE bt.id_san_pham = sp.id AND dh.trang_thai_don_hang = 3
                              AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                           ), 0) as da_ban,
                    IFNULL((SELECT SUM(ct.so_luong * ct.don_gia) 
                            FROM chi_tiet_don_hang ct 
                            JOIN don_hang dh ON ct.id_don_hang = dh.id
                            JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
                            WHERE bt.id_san_pham = sp.id AND dh.trang_thai_don_hang = 3
                              AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                           ), 0) as doanh_thu
                FROM san_pham sp
                LEFT JOIN danh_muc dm ON sp.id_danh_muc = dm.id
                LEFT JOIN loai_da ld ON sp.id_loai_da = ld.id
                LEFT JOIN menh_phong_thuy mpt ON sp.id_menh_phong_thuy = mpt.id
                WHERE sp.da_xoa = 0";

        $params = [
            $tuNgay.' 00:00:00', $denNgay.' 23:59:59',
            $tuNgay.' 00:00:00', $denNgay.' 23:59:59'
        ];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (sp.ten_sp LIKE ? OR sp.id LIKE ?)";
            $params[] = "%" . $filters['keyword'] . "%";
            $params[] = "%" . $filters['keyword'] . "%";
        }
        
        if (!empty($filters['danh_muc']) && $filters['danh_muc'] != 'Tất cả danh mục') {
            $sql .= " AND dm.ten_danh_muc = ?";
            $params[] = $filters['danh_muc'];
        }
        if (!empty($filters['loai_da']) && $filters['loai_da'] != 'Loại đá / ngọc') {
            $sql .= " AND ld.ten_loai_da = ?";
            $params[] = $filters['loai_da'];
        }
        if (!empty($filters['menh']) && $filters['menh'] != 'Mệnh phong thủy') {
            $sql .= " AND mpt.ten_menh = ?";
            $params[] = $filters['menh'];
        }

        // Khuyến mãi hoặc trạng thái bán: Khó query trực tiếp nếu không join. Ta sẽ dùng HAVING cho trạng thái bán
        $having = "";
        if (!empty($filters['hieu_qua']) && $filters['hieu_qua'] != 'Hiệu quả bán') {
            if ($filters['hieu_qua'] == 'Bán chạy') {
                $having = " HAVING da_ban > 10";
            } elseif ($filters['hieu_qua'] == 'Bán chậm') {
                $having = " HAVING da_ban <= 2";
            } elseif ($filters['hieu_qua'] == 'Tồn kho cao') {
                $having = " HAVING ton_kho > 50";
            }
        }
        $sql .= $having;

        $sql .= " ORDER BY doanh_thu DESC LIMIT ? OFFSET ?";
        $params[] = (int)$limit;
        $params[] = (int)$offset;

        $stmt = $this->db->getConnection()->prepare($sql);
        foreach ($params as $k => $v) {
            $type = is_int($v) ? PDO::PARAM_INT : PDO::PARAM_STR;
            $stmt->bindValue($k + 1, $v, $type);
        }
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $totalSql = "SELECT IFNULL(SUM(ct.so_luong * ct.don_gia), 0)
                     FROM chi_tiet_don_hang ct
                     JOIN don_hang dh ON ct.id_don_hang = dh.id
                     WHERE dh.trang_thai_don_hang = 3 AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?";
        $totalDt = (float)$this->query($totalSql, [$tuNgay.' 00:00:00', $denNgay.' 23:59:59'])->fetchColumn();

        foreach ($rows as &$r) {
            if ($r['anh'] && !str_starts_with($r['anh'], 'http')) {
                $r['anh'] = (defined('APP_URL') ? APP_URL : '') . '/public' . $r['anh'];
            }
            $r['ty_trong'] = $totalDt > 0 ? round(($r['doanh_thu'] / $totalDt) * 100, 1) : 0;
            
            if ($r['da_ban'] == 0) $r['trang_thai'] = 'Chưa có đơn';
            elseif ($r['da_ban'] > 10) $r['trang_thai'] = 'Bán chạy';
            else $r['trang_thai'] = 'Ổn định';
        }
        
        return $rows;
    }

    public function demDanhSachSanPham($tuNgay, $denNgay, $filters = [])
    {
        $sql = "SELECT COUNT(*) FROM (
                SELECT 
                    sp.id, sp.tong_ton_kho as ton_kho,
                    IFNULL((SELECT SUM(ct.so_luong) 
                            FROM chi_tiet_don_hang ct 
                            JOIN don_hang dh ON ct.id_don_hang = dh.id
                            JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
                            WHERE bt.id_san_pham = sp.id AND dh.trang_thai_don_hang = 3
                              AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                           ), 0) as da_ban
                FROM san_pham sp
                LEFT JOIN danh_muc dm ON sp.id_danh_muc = dm.id
                LEFT JOIN loai_da ld ON sp.id_loai_da = ld.id
                LEFT JOIN menh_phong_thuy mpt ON sp.id_menh_phong_thuy = mpt.id
                WHERE sp.da_xoa = 0";
        
        $params = [
            $tuNgay.' 00:00:00', $denNgay.' 23:59:59'
        ];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (sp.ten_sp LIKE ? OR sp.id LIKE ?)";
            $params[] = "%" . $filters['keyword'] . "%";
            $params[] = "%" . $filters['keyword'] . "%";
        }
        if (!empty($filters['danh_muc']) && $filters['danh_muc'] != 'Tất cả danh mục') {
            $sql .= " AND dm.ten_danh_muc = ?";
            $params[] = $filters['danh_muc'];
        }
        if (!empty($filters['loai_da']) && $filters['loai_da'] != 'Loại đá / ngọc') {
            $sql .= " AND ld.ten_loai_da = ?";
            $params[] = $filters['loai_da'];
        }
        if (!empty($filters['menh']) && $filters['menh'] != 'Mệnh phong thủy') {
            $sql .= " AND mpt.ten_menh = ?";
            $params[] = $filters['menh'];
        }
        
        $sql .= ") as temp WHERE 1=1";
        
        if (!empty($filters['hieu_qua']) && $filters['hieu_qua'] != 'Hiệu quả bán') {
            if ($filters['hieu_qua'] == 'Bán chạy') {
                $sql .= " AND da_ban > 10";
            } elseif ($filters['hieu_qua'] == 'Bán chậm') {
                $sql .= " AND da_ban <= 2";
            } elseif ($filters['hieu_qua'] == 'Tồn kho cao') {
                $sql .= " AND ton_kho > 50";
            }
        }
        
        $stmt = $this->db->getConnection()->prepare($sql);
        foreach ($params as $k => $v) {
            $stmt->bindValue($k + 1, $v, PDO::PARAM_STR);
        }
        $stmt->execute();
        return (int)$stmt->fetchColumn();
    }
}
