<?php
namespace App\Models\Admin;

use App\Core\Database;

class BaoCaoDoanhThuModel
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

    /**
     * Lấy tổng quan doanh thu trong khoảng thời gian
     */
    public function tongQuan($tuNgay, $denNgay)
    {
        $sql = "SELECT 
                    SUM(thanh_tien) as tong_doanh_thu,
                    COUNT(id) as don_thanh_cong,
                    AVG(thanh_tien) as gia_tri_trung_binh,
                    SUM(tien_giam_gia) as tong_giam_gia,
                    SUM(tong_tien) as doanh_thu_thuc_nhan
                FROM don_hang 
                WHERE trang_thai_don_hang = 3 
                  AND ngay_tao >= ? AND ngay_tao <= ?";
                  
        $overview = $this->query($sql, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetch();
        
        // Đếm số sản phẩm đã bán trong các đơn hàng thành công
        $sqlSp = "SELECT SUM(so_luong) as san_pham_da_ban
                  FROM chi_tiet_don_hang ctdh
                  JOIN don_hang dh ON ctdh.id_don_hang = dh.id
                  WHERE dh.trang_thai_don_hang = 3
                    AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?";
        
        $spData = $this->query($sqlSp, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetch();
        
        $overview['san_pham_da_ban'] = $spData['san_pham_da_ban'] ?? 0;
        
        // Handle null values
        $overview['tong_doanh_thu'] = $overview['tong_doanh_thu'] ?? 0;
        $overview['don_thanh_cong'] = $overview['don_thanh_cong'] ?? 0;
        $overview['gia_tri_trung_binh'] = $overview['gia_tri_trung_binh'] ?? 0;
        $overview['tong_giam_gia'] = $overview['tong_giam_gia'] ?? 0;
        $overview['doanh_thu_thuc_nhan'] = $overview['doanh_thu_thuc_nhan'] ?? 0;
        
        return $overview;
    }

    /**
     * Dữ liệu biểu đồ doanh thu theo thời gian
     */
    public function bieuDoDoanhThu($tuNgay, $denNgay, $kyTruocTu, $kyTruocDen)
    {
        // Lấy danh sách các ngày trong kỳ hiện tại
        $begin = new \DateTime($tuNgay);
        $end = new \DateTime($denNgay);
        $end->modify('+1 day');
        $interval = new \DateInterval('P1D');
        $daterange = new \DatePeriod($begin, $interval, $end);
        
        $labels = [];
        $dataKyNay = [];
        $dictKyNay = [];
        
        $sqlKyNay = "SELECT DATE(ngay_tao) as ngay, SUM(thanh_tien) as total
                     FROM don_hang 
                     WHERE trang_thai_don_hang = 3 
                       AND ngay_tao >= ? AND ngay_tao <= ?
                     GROUP BY DATE(ngay_tao)";
        $rowsKyNay = $this->query($sqlKyNay, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetchAll();
        foreach($rowsKyNay as $r) {
            $dictKyNay[$r['ngay']] = (float)$r['total'];
        }

        // Lấy data kỳ trước (nếu có yêu cầu so sánh)
        $dataKyTruoc = [];
        $dictKyTruoc = [];
        
        $sqlKyTruoc = "SELECT DATE(ngay_tao) as ngay, SUM(thanh_tien) as total
                     FROM don_hang 
                     WHERE trang_thai_don_hang = 3 
                       AND ngay_tao >= ? AND ngay_tao <= ?
                     GROUP BY DATE(ngay_tao)";
        $rowsKyTruoc = $this->query($sqlKyTruoc, [$kyTruocTu . ' 00:00:00', $kyTruocDen . ' 23:59:59'])->fetchAll();
        foreach($rowsKyTruoc as $r) {
            $dictKyTruoc[$r['ngay']] = (float)$r['total'];
        }

        // Tính danh sách các ngày kỳ trước (để map vào label cùng chỉ số)
        $beginPrev = new \DateTime($kyTruocTu);
        $endPrev = new \DateTime($kyTruocDen);
        $endPrev->modify('+1 day');
        $daterangePrev = new \DatePeriod($beginPrev, $interval, $endPrev);
        $arrPrevDates = [];
        foreach($daterangePrev as $d) {
            $arrPrevDates[] = $d->format("Y-m-d");
        }

        $i = 0;
        $rawLabels = [];
        foreach($daterange as $date) {
            $d = $date->format("Y-m-d");
            $labels[] = $date->format("d/m");
            $rawLabels[] = $d;
            $dataKyNay[] = $dictKyNay[$d] ?? 0;
            
            $prevD = $arrPrevDates[$i] ?? null;
            $dataKyTruoc[] = ($prevD && isset($dictKyTruoc[$prevD])) ? $dictKyTruoc[$prevD] : 0;
            $i++;
        }
        
        return [
            'labels' => $labels,
            'raw_labels' => $rawLabels,
            'ky_nay' => $dataKyNay,
            'ky_truoc' => $dataKyTruoc
        ];
    }

    /**
     * Dữ liệu biểu đồ trạng thái đơn hàng (tất cả các đơn trong kỳ)
     */
    public function bieuDoTrangThaiDon($tuNgay, $denNgay)
    {
        $sql = "SELECT trang_thai_don_hang, COUNT(id) as total
                FROM don_hang
                WHERE ngay_tao >= ? AND ngay_tao <= ?
                GROUP BY trang_thai_don_hang";
        $rows = $this->query($sql, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetchAll();
        
        $data = [
            'Thành công' => 0,
            'Đang giao' => 0,
            'Chờ xác nhận' => 0,
            'Đã hủy' => 0
        ];
        
        foreach($rows as $r) {
            switch($r['trang_thai_don_hang']) {
                case 0:
                case 1:
                    $data['Chờ xác nhận'] += $r['total'];
                    break;
                case 2:
                    $data['Đang giao'] += $r['total'];
                    break;
                case 3:
                    $data['Thành công'] += $r['total'];
                    break;
                case 4:
                    $data['Đã hủy'] += $r['total'];
                    break;
            }
        }
        
        return $data;
    }

    /**
     * Bảng doanh thu theo thời gian (Chi tiết ngày)
     */
    public function bangTheoNgay($tuNgay, $denNgay)
    {
        $sql = "SELECT 
                    DATE(dh.ngay_tao) as ngay,
                    SUM(CASE WHEN dh.trang_thai_don_hang = 3 THEN 1 ELSE 0 END) as don_thanh_cong,
                    SUM(CASE WHEN dh.trang_thai_don_hang = 4 THEN 1 ELSE 0 END) as don_huy,
                    SUM(CASE WHEN dh.trang_thai_don_hang = 3 THEN dh.thanh_tien ELSE 0 END) as thuc_nhan,
                    SUM(CASE WHEN dh.trang_thai_don_hang = 3 THEN dh.tien_giam_gia ELSE 0 END) as giam_gia,
                    SUM(CASE WHEN dh.trang_thai_don_hang = 3 THEN dh.tong_tien ELSE 0 END) as tong_doanh_thu,
                    SUM(CASE WHEN dh.trang_thai_don_hang = 3 THEN (SELECT SUM(so_luong) FROM chi_tiet_don_hang WHERE id_don_hang = dh.id) ELSE 0 END) as sp_ban
                FROM don_hang dh
                WHERE dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                GROUP BY DATE(dh.ngay_tao)
                ORDER BY DATE(dh.ngay_tao) DESC";
                
        $rows = $this->query($sql, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetchAll();
        
        // Format ngày
        foreach($rows as &$r) {
            $r['ngay'] = date('d/m/Y', strtotime($r['ngay']));
            $r['sp_ban'] = $r['sp_ban'] ?? 0;
        }
        
        return $rows;
    }

    /**
     * Doanh thu theo sản phẩm (Top bán chạy)
     */
    public function topSanPham($tuNgay, $denNgay, $limit = 5)
    {
        $sql = "SELECT 
                    sp.ma_sp, sp.ten_sp, sp.hinh_anh_chinh as hinh_anh, dm.ten_danh_muc as danh_muc,
                    sp.tong_ton_kho as ton_kho,
                    SUM(ct.so_luong) as da_ban,
                    SUM(ct.so_luong * ct.don_gia) as doanh_thu
                FROM don_hang dh
                JOIN chi_tiet_don_hang ct ON dh.id = ct.id_don_hang
                -- id_bien_the format: bt_{id_sp}_xxxx
                JOIN san_pham sp ON SUBSTRING_INDEX(ct.id_bien_the, '_', 2) = CONCAT('bt_', SUBSTRING_INDEX(sp.id, '_', -1))
                LEFT JOIN danh_muc dm ON sp.id_danh_muc = dm.id
                WHERE dh.trang_thai_don_hang = 3
                  AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                GROUP BY sp.id
                ORDER BY da_ban DESC, doanh_thu DESC
                LIMIT ?";
                
        $rows = $this->query($sql, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59', $limit])->fetchAll();
        
        // Calculate percentages
        $totalRevenue = 0;
        foreach($rows as $r) {
            $totalRevenue += $r['doanh_thu'];
        }
        
        foreach($rows as &$r) {
            $r['ty_trong'] = $totalRevenue > 0 ? round(($r['doanh_thu'] / $totalRevenue) * 100, 1) : 0;
            if ($r['hinh_anh'] && !str_starts_with($r['hinh_anh'], 'http')) {
                $r['hinh_anh'] = APP_URL . (str_starts_with($r['hinh_anh'], '/') ? '' : '/') . $r['hinh_anh'];
            }
        }
        
        return $rows;
    }

    /**
     * Sản phẩm bán chậm (tồn nhiều, bán ít)
     */
    public function sanPhamBanCham($limit = 5)
    {
        // 30 ngày gần nhất
        $denNgay = date('Y-m-d 23:59:59');
        $tuNgay = date('Y-m-d 00:00:00', strtotime('-30 days'));

        $sql = "SELECT 
                    sp.ma_sp, sp.ten_sp, sp.hinh_anh_chinh as hinh_anh, sp.tong_ton_kho as ton_kho, sp.ngay_tao,
                    COALESCE((
                        SELECT SUM(ct.so_luong) 
                        FROM chi_tiet_don_hang ct 
                        JOIN don_hang dh ON dh.id = ct.id_don_hang 
                        WHERE dh.trang_thai_don_hang = 3 
                          AND SUBSTRING_INDEX(ct.id_bien_the, '_', 2) = CONCAT('bt_', SUBSTRING_INDEX(sp.id, '_', -1))
                          AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                    ), 0) as da_ban_ky,
                    COALESCE((
                        SELECT SUM(ct.so_luong * ct.don_gia) 
                        FROM chi_tiet_don_hang ct 
                        JOIN don_hang dh ON dh.id = ct.id_don_hang 
                        WHERE dh.trang_thai_don_hang = 3 
                          AND SUBSTRING_INDEX(ct.id_bien_the, '_', 2) = CONCAT('bt_', SUBSTRING_INDEX(sp.id, '_', -1))
                          AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                    ), 0) as doanh_thu
                FROM san_pham sp
                WHERE sp.tong_ton_kho > 0 AND sp.trang_thai = 1 AND sp.da_xoa = 0
                ORDER BY da_ban_ky ASC, sp.tong_ton_kho DESC
                LIMIT ?";
                
        $rows = $this->query($sql, [$tuNgay, $denNgay, $tuNgay, $denNgay, $limit])->fetchAll();
        
        foreach($rows as &$r) {
            if ($r['hinh_anh'] && !str_starts_with($r['hinh_anh'], 'http')) {
                $r['hinh_anh'] = APP_URL . (str_starts_with($r['hinh_anh'], '/') ? '' : '/') . $r['hinh_anh'];
            }
        }
        
        return $rows;
    }

    /**
     * Doanh thu theo danh mục
     */
    public function doanhThuTheoDanhMuc($tuNgay, $denNgay)
    {
        $sql = "SELECT 
                    dm.ten_danh_muc as ten,
                    COUNT(DISTINCT dh.id) as so_don,
                    SUM(ct.so_luong) as sp_ban,
                    SUM(ct.so_luong * ct.don_gia) as doanh_thu
                FROM don_hang dh
                JOIN chi_tiet_don_hang ct ON dh.id = ct.id_don_hang
                JOIN san_pham sp ON SUBSTRING_INDEX(ct.id_bien_the, '_', 2) = CONCAT('bt_', SUBSTRING_INDEX(sp.id, '_', -1))
                JOIN danh_muc dm ON sp.id_danh_muc = dm.id
                WHERE dh.trang_thai_don_hang = 3
                  AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                GROUP BY dm.id
                ORDER BY doanh_thu DESC";
                
        $rows = $this->query($sql, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetchAll();
        
        $totalRevenue = 0;
        foreach($rows as $r) {
            $totalRevenue += $r['doanh_thu'];
        }
        
        foreach($rows as &$r) {
            $r['ty_trong'] = $totalRevenue > 0 ? round(($r['doanh_thu'] / $totalRevenue) * 100, 1) : 0;
        }
        
        return $rows;
    }

    /**
     * Doanh thu theo loại đá
     */
    public function doanhThuTheoLoaiDa($tuNgay, $denNgay)
    {
        $sql = "SELECT 
                    ld.ten_loai_da as ten,
                    SUM(ct.so_luong) as sp_ban,
                    SUM(ct.so_luong * ct.don_gia) as doanh_thu,
                    (
                        SELECT sp2.ten_sp 
                        FROM chi_tiet_don_hang ct2 
                        JOIN don_hang dh2 ON dh2.id = ct2.id_don_hang
                        JOIN san_pham sp2 ON SUBSTRING_INDEX(ct2.id_bien_the, '_', 2) = CONCAT('bt_', SUBSTRING_INDEX(sp2.id, '_', -1))
                        WHERE sp2.id_loai_da = ld.id AND dh2.trang_thai_don_hang = 3
                          AND dh2.ngay_tao >= ? AND dh2.ngay_tao <= ?
                        GROUP BY sp2.id 
                        ORDER BY SUM(ct2.so_luong) DESC 
                        LIMIT 1
                    ) as top_sp
                FROM don_hang dh
                JOIN chi_tiet_don_hang ct ON dh.id = ct.id_don_hang
                JOIN san_pham sp ON SUBSTRING_INDEX(ct.id_bien_the, '_', 2) = CONCAT('bt_', SUBSTRING_INDEX(sp.id, '_', -1))
                JOIN loai_da ld ON sp.id_loai_da = ld.id
                WHERE dh.trang_thai_don_hang = 3
                  AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                GROUP BY ld.id
                ORDER BY doanh_thu DESC";
                
        $rows = $this->query($sql, [
            $tuNgay . ' 00:00:00', $denNgay . ' 23:59:59',
            $tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'
        ])->fetchAll();
        
        $totalRevenue = 0;
        foreach($rows as $r) {
            $totalRevenue += $r['doanh_thu'];
        }
        
        foreach($rows as &$r) {
            $r['ty_trong'] = $totalRevenue > 0 ? round(($r['doanh_thu'] / $totalRevenue) * 100, 1) : 0;
        }
        
        return $rows;
    }

    /**
     * Doanh thu theo mệnh
     */
    public function doanhThuTheoMenh($tuNgay, $denNgay)
    {
        $sql = "SELECT 
                    mpt.ten_menh as ten,
                    SUM(ct.so_luong) as sp_ban,
                    COUNT(DISTINCT dh.id) as so_don,
                    SUM(ct.so_luong * ct.don_gia) as doanh_thu,
                    (
                        SELECT ld2.ten_loai_da 
                        FROM chi_tiet_don_hang ct2 
                        JOIN don_hang dh2 ON dh2.id = ct2.id_don_hang
                        JOIN san_pham sp2 ON SUBSTRING_INDEX(ct2.id_bien_the, '_', 2) = CONCAT('bt_', SUBSTRING_INDEX(sp2.id, '_', -1))
                        JOIN loai_da ld2 ON sp2.id_loai_da = ld2.id
                        WHERE sp2.id_menh_phong_thuy = mpt.id AND dh2.trang_thai_don_hang = 3
                          AND dh2.ngay_tao >= ? AND dh2.ngay_tao <= ?
                        GROUP BY ld2.id 
                        ORDER BY SUM(ct2.so_luong) DESC 
                        LIMIT 1
                    ) as top_da
                FROM don_hang dh
                JOIN chi_tiet_don_hang ct ON dh.id = ct.id_don_hang
                JOIN san_pham sp ON SUBSTRING_INDEX(ct.id_bien_the, '_', 2) = CONCAT('bt_', SUBSTRING_INDEX(sp.id, '_', -1))
                JOIN menh_phong_thuy mpt ON sp.id_menh_phong_thuy = mpt.id
                WHERE dh.trang_thai_don_hang = 3
                  AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                GROUP BY mpt.id
                ORDER BY doanh_thu DESC";
                
        $rows = $this->query($sql, [
            $tuNgay . ' 00:00:00', $denNgay . ' 23:59:59',
            $tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'
        ])->fetchAll();
        
        $totalRevenue = 0;
        foreach($rows as $r) {
            $totalRevenue += $r['doanh_thu'];
        }
        
        foreach($rows as &$r) {
            $r['ty_trong'] = $totalRevenue > 0 ? round(($r['doanh_thu'] / $totalRevenue) * 100, 1) : 0;
            
            // Add badge color based on Menh
            switch(mb_strtolower($r['ten'], 'UTF-8')) {
                case 'kim': $r['badge'] = 'bg-gray-100 text-gray-800'; break;
                case 'mộc': $r['badge'] = 'bg-green-100 text-green-800'; break;
                case 'thủy': $r['badge'] = 'bg-blue-100 text-blue-800'; break;
                case 'hỏa': $r['badge'] = 'bg-red-100 text-red-800'; break;
                case 'thổ': $r['badge'] = 'bg-yellow-100 text-yellow-800'; break;
                default: $r['badge'] = 'bg-gray-100 text-gray-800';
            }
        }
        
        return $rows;
    }

    /**
     * Báo cáo Voucher / Khuyến mãi
     */
    public function baoCaoVoucher($tuNgay, $denNgay)
    {
        // Thống kê tổng quan voucher
        $sqlTong = "SELECT 
                        COUNT(id) as tong_don_dung_voucher,
                        SUM(tien_giam_gia) as tong_giam_tu_voucher,
                        SUM(thanh_tien) as doanh_thu_tu_don_voucher,
                        (SELECT COUNT(id) FROM don_hang WHERE trang_thai_don_hang = 3 AND ngay_tao >= ? AND ngay_tao <= ?) as tong_don_thanh_cong
                    FROM don_hang
                    WHERE trang_thai_don_hang = 3 AND id_voucher IS NOT NULL AND id_voucher != ''
                      AND ngay_tao >= ? AND ngay_tao <= ?";
                      
        $tong = $this->query($sqlTong, [
            $tuNgay . ' 00:00:00', $denNgay . ' 23:59:59',
            $tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'
        ])->fetch();
        
        $tyLe = $tong['tong_don_thanh_cong'] > 0 ? round(($tong['tong_don_dung_voucher'] / $tong['tong_don_thanh_cong']) * 100, 1) : 0;

        // Chi tiết từng voucher
        $sqlVoucher = "SELECT 
                           v.ma_voucher as ma,
                           COUNT(dh.id) as luot_dung,
                           SUM(dh.tien_giam_gia) as tong_giam,
                           SUM(dh.thanh_tien) as doanh_thu,
                           v.trang_thai, v.ngay_ket_thuc
                       FROM don_hang dh
                       JOIN voucher v ON dh.id_voucher = v.id
                       WHERE dh.trang_thai_don_hang = 3
                         AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                       GROUP BY v.id
                       ORDER BY luot_dung DESC, doanh_thu DESC";
                       
        $vouchers = $this->query($sqlVoucher, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetchAll();
        
        $now = date('Y-m-d H:i:s');
        foreach($vouchers as &$v) {
            if ($v['trang_thai'] == 0 || $v['ngay_ket_thuc'] < $now) {
                $v['trang_thai_str'] = 'expired';
            } else {
                $v['trang_thai_str'] = 'active';
            }
            $v['trang_thai'] = $v['trang_thai_str']; // overwrite to use in view
        }

        return [
            'tong_don_dung_voucher' => $tong['tong_don_dung_voucher'] ?? 0,
            'tong_giam_tu_voucher' => $tong['tong_giam_tu_voucher'] ?? 0,
            'doanh_thu_tu_don_voucher' => $tong['doanh_thu_tu_don_voucher'] ?? 0,
            'ty_le_don_co_giam_gia' => $tyLe,
            'danh_sach_voucher' => $vouchers
        ];
    }

    /**
     * Báo cáo thanh toán
     */
    public function doanhThuTheoPTTT($tuNgay, $denNgay)
    {
        $sql = "SELECT 
                    pt_thanh_toan as ten,
                    COUNT(id) as so_don,
                    SUM(thanh_tien) as doanh_thu
                FROM don_hang
                WHERE trang_thai_don_hang = 3
                  AND ngay_tao >= ? AND ngay_tao <= ?
                GROUP BY pt_thanh_toan
                ORDER BY doanh_thu DESC";
                
        $rows = $this->query($sql, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetchAll();
        
        $totalRevenue = 0;
        foreach($rows as $r) {
            $totalRevenue += $r['doanh_thu'];
        }
        
        foreach($rows as &$r) {
            $r['ty_le'] = $totalRevenue > 0 ? round(($r['doanh_thu'] / $totalRevenue) * 100, 1) : 0;
            if (empty($r['ten'])) $r['ten'] = 'Khác';
        }
        
        return $rows;
    }

    /**
     * Báo cáo hạng thành viên
     */
    public function doanhThuTheoHangTV($tuNgay, $denNgay)
    {
        $sql = "SELECT 
                    htv.ten_hang as hang,
                    COUNT(DISTINCT nd.id) as khach,
                    COUNT(dh.id) as so_don,
                    SUM(dh.thanh_tien) as doanh_thu
                FROM don_hang dh
                JOIN nguoi_dung nd ON dh.id_nguoi_dung = nd.id
                JOIN hang_thanh_vien htv ON nd.id_hang_thanh_vien = htv.id
                WHERE dh.trang_thai_don_hang = 3
                  AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?
                GROUP BY htv.id
                ORDER BY doanh_thu DESC";
                
        $rows = $this->query($sql, [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'])->fetchAll();
        
        foreach($rows as &$r) {
            $r['tb_don'] = $r['so_don'] > 0 ? round($r['doanh_thu'] / $r['so_don']) : 0;
            
            // Add badge color based on Rank
            switch(mb_strtolower($r['hang'], 'UTF-8')) {
                case 'kim cương': $r['badge'] = 'bg-blue-100 text-blue-800'; break;
                case 'vàng': $r['badge'] = 'bg-yellow-100 text-yellow-800'; break;
                case 'bạc': $r['badge'] = 'bg-gray-200 text-gray-800'; break;
                case 'đồng': $r['badge'] = 'bg-orange-100 text-orange-800'; break;
                default: $r['badge'] = 'bg-gray-100 text-gray-800';
            }
        }
        
        return $rows;
    }

    /**
     * Bảng chi tiết đơn hàng gần nhất
     */
    public function danhSachDonHang($tuNgay, $denNgay, $limit = 10, $offset = 0, $keyword = '')
    {
        $sql = "SELECT 
                    dh.ma_don_hang as ma_don,
                    dh.ten_nguoi_nhan as khach_hang,
                    dh.ngay_tao as ngay_ht,
                    IFNULL((SELECT SUM(so_luong * don_gia) FROM chi_tiet_don_hang ct WHERE ct.id_don_hang = dh.id), 0) as tong_tien,
                    dh.tien_giam_gia as giam_gia,
                    dh.phi_ship as phi_vc,
                    dh.thanh_tien as thuc_nhan,
                    dh.pt_thanh_toan as thanh_toan,
                    CASE dh.trang_thai_don_hang
                        WHEN 0 THEN 'Chờ xác nhận'
                        WHEN 1 THEN 'Đang chuẩn bị'
                        WHEN 2 THEN 'Đang giao'
                        WHEN 3 THEN 'Thành công'
                        WHEN 4 THEN 'Đã hủy'
                        ELSE 'Không xác định'
                    END as trang_thai,
                    dh.id
                FROM don_hang dh
                WHERE dh.trang_thai_don_hang = 3 
                  AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?";
                
        $params = [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'];
        
        if (!empty($keyword)) {
            $sql .= " AND (dh.ma_don_hang LIKE ? OR dh.ten_nguoi_nhan LIKE ?)";
            $params[] = "%$keyword%";
            $params[] = "%$keyword%";
        }

        $sql .= " ORDER BY dh.ngay_tao DESC LIMIT ? OFFSET ?";
        
        // Add limit and offset
        $params[] = $limit;
        $params[] = $offset;

        // Use prepare because limit/offset must be bound as INT, but query() uses execute with string values. 
        // Wait, Database::query can handle it if we use standard query logic, but LIMIT with string causes syntax error in PDO if emulation is off.
        // Let's use custom bind
        $stmt = $this->db->getConnection()->prepare($sql);
        foreach ($params as $k => $v) {
            $type = is_int($v) ? \PDO::PARAM_INT : \PDO::PARAM_STR;
            $stmt->bindValue($k + 1, $v, $type);
        }
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach($rows as &$r) {
            $r['ngay_ht'] = date('d/m/Y H:i', strtotime($r['ngay_ht']));
        }
        
        return $rows;
    }

    public function demDanhSachDonHang($tuNgay, $denNgay, $keyword = '')
    {
        $sql = "SELECT COUNT(*) as total 
                FROM don_hang dh
                WHERE dh.trang_thai_don_hang = 3 
                  AND dh.ngay_tao >= ? AND dh.ngay_tao <= ?";
        $params = [$tuNgay . ' 00:00:00', $denNgay . ' 23:59:59'];
        
        if (!empty($keyword)) {
            $sql .= " AND (dh.ma_don_hang LIKE ? OR dh.ten_nguoi_nhan LIKE ?)";
            $params[] = "%$keyword%";
            $params[] = "%$keyword%";
        }

        $row = $this->query($sql, $params)->fetch();
        return $row ? (int)$row['total'] : 0;
    }
}
