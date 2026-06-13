<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use Exception;

class TongQuanModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    
    // 1. Thống kê nhanh (quick stats)
    public function getThongKeNhanh() {
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));

        // Doanh thu hôm nay
        $doanhThuHomNay = $this->db->query("
            SELECT SUM(thanh_tien) as total 
            FROM don_hang 
            WHERE DATE(ngay_tao) = '$today' AND trang_thai_don_hang = 3
        ")->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        // Doanh thu hôm qua
        $doanhThuHomQua = $this->db->query("
            SELECT SUM(thanh_tien) as total 
            FROM don_hang 
            WHERE DATE(ngay_tao) = '$yesterday' AND trang_thai_don_hang = 3
        ")->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        $tangTruongDoanhThu = 0;
        if ($doanhThuHomQua > 0) {
            $tangTruongDoanhThu = round((($doanhThuHomNay - $doanhThuHomQua) / $doanhThuHomQua) * 100);
        } else if ($doanhThuHomNay > 0) {
            $tangTruongDoanhThu = 100;
        }

        // Đơn hàng mới hôm nay
        $donHangMoi = $this->db->query("
            SELECT COUNT(id) as total 
            FROM don_hang 
            WHERE DATE(ngay_tao) = '$today'
        ")->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        // Đơn chờ xác nhận
        $donChoXacNhan = $this->db->query("
            SELECT COUNT(id) as total 
            FROM don_hang 
            WHERE trang_thai_don_hang = 0
        ")->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        // Khách hàng mới hôm nay
        $khachHangMoiHomNay = $this->db->query("
            SELECT COUNT(id) as total 
            FROM nguoi_dung 
            WHERE DATE(ngay_tao) = '$today'
        ")->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        $khachHangMoiHomQua = $this->db->query("
            SELECT COUNT(id) as total 
            FROM nguoi_dung 
            WHERE DATE(ngay_tao) = '$yesterday'
        ")->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        $tangTruongKhach = 0;
        if ($khachHangMoiHomQua > 0) {
            $tangTruongKhach = round((($khachHangMoiHomNay - $khachHangMoiHomQua) / $khachHangMoiHomQua) * 100);
        } else if ($khachHangMoiHomNay > 0) {
            $tangTruongKhach = 100;
        }

        // Sắp hết hàng
        $sapHetHang = $this->db->query("
            SELECT COUNT(id) as total 
            FROM san_pham 
            WHERE tong_ton_kho > 0 AND tong_ton_kho <= 10 AND da_xoa = 0
        ")->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        // Voucher đang chạy
        $voucherDangChay = $this->db->query("
            SELECT COUNT(id) as total 
            FROM voucher 
            WHERE trang_thai = 1 AND ngay_bat_dau <= NOW() AND ngay_ket_thuc >= NOW()
        ")->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        // Voucher sắp hết hạn (còn <= 3 ngày)
        $voucherSapHetHan = $this->db->query("
            SELECT COUNT(id) as total 
            FROM voucher 
            WHERE trang_thai = 1 AND ngay_ket_thuc >= NOW() AND ngay_ket_thuc <= DATE_ADD(NOW(), INTERVAL 3 DAY)
        ")->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;

        return [
            'doanh_thu_hom_nay' => $doanhThuHomNay,
            'tang_truong_doanh_thu' => $tangTruongDoanhThu,
            'don_hang_moi' => $donHangMoi,
            'don_cho_xacNhan' => $donChoXacNhan, // UI uses don_cho_xac_nhan
            'don_cho_xac_nhan' => $donChoXacNhan, 
            'khach_hang_moi' => $khachHangMoiHomNay,
            'tang_truong_khach' => $tangTruongKhach,
            'sap_het_hang' => $sapHetHang,
            'voucher_dang_chay' => $voucherDangChay,
            'voucher_sap_het_han' => $voucherSapHetHan
        ];
    }

    // 2. Đơn hàng mới nhất
    public function getDonHangMoiNhat($limit = 5) {
        $sql = "SELECT id, ma_don_hang as ma_don, ten_nguoi_nhan as khach_hang, thanh_tien as tong_tien, 
                       CASE trang_thai_don_hang 
                            WHEN 0 THEN 'Chờ xác nhận'
                            WHEN 1 THEN 'Đang chuẩn bị'
                            WHEN 2 THEN 'Đang giao'
                            WHEN 3 THEN 'Hoàn thành'
                            WHEN 4 THEN 'Đã hủy'
                            ELSE 'Không xác định'
                       END as trang_thai 
                FROM don_hang 
                ORDER BY ngay_tao DESC LIMIT " . (int)$limit;
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // 3. Sản phẩm bán chạy
    public function getSanPhamBanChay($limit = 5) {
        $sql = "
            SELECT 
                sp.ten_sp as ten, 
                SUM(ct.so_luong) as da_ban, 
                SUM(ct.so_luong * ct.don_gia) as doanh_thu, 
                sp.tong_ton_kho as ton_kho, 
                sp.hinh_anh_chinh as anh
            FROM chi_tiet_don_hang ct
            JOIN don_hang dh ON ct.id_don_hang = dh.id
            JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
            JOIN san_pham sp ON bt.id_san_pham = sp.id
            WHERE dh.trang_thai_don_hang = 3 AND sp.da_xoa = 0
            GROUP BY sp.id
            ORDER BY da_ban DESC
            LIMIT " . (int)$limit;
        
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        // Fallback placeholder images if missing
        foreach ($result as &$item) {
            if (empty($item['anh'])) {
                $item['anh'] = 'https://ui-avatars.com/api/?name=' . urlencode($item['ten']) . '&background=E4D5C3&color=6B0D18';
            } else {
                $base = defined('APP_URL') ? APP_URL : '';
                $item['anh'] = $base . '/' . ltrim($item['anh'], '/');
            }
        }
        return $result;
    }

    // 4. Sản phẩm bán chậm
    public function getSanPhamBanCham($limit = 5) {
        // Tie^u chi': To^`n kho > 20, vµ khong ba'n dduo.c trong 30 ngay qua
        // Hoa.c ba'n < 5 ca'i
        $sql = "
            SELECT 
                sp.id,
                sp.ten_sp as ten, 
                sp.tong_ton_kho as ton_kho, 
                sp.hinh_anh_chinh as anh,
                COALESCE(SUM(CASE WHEN dh.ngay_tao >= DATE_SUB(NOW(), INTERVAL 30 DAY) THEN ct.so_luong ELSE 0 END), 0) as da_ban_30_ngay
            FROM san_pham sp
            LEFT JOIN san_pham_bien_the bt ON bt.id_san_pham = sp.id
            LEFT JOIN chi_tiet_don_hang ct ON ct.id_bien_the = bt.id
            LEFT JOIN don_hang dh ON ct.id_don_hang = dh.id AND dh.trang_thai_don_hang != 4
            WHERE sp.da_xoa = 0 AND sp.tong_ton_kho > 20
            GROUP BY sp.id
            HAVING da_ban_30_ngay < 5
            ORDER BY da_ban_30_ngay ASC, ton_kho DESC
            LIMIT " . (int)$limit;

        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as &$item) {
            if (empty($item['anh'])) {
                $item['anh'] = 'https://ui-avatars.com/api/?name=' . urlencode($item['ten']) . '&background=f3f4f6&color=6B0D18';
            } else {
                $base = defined('APP_URL') ? APP_URL : '';
                $item['anh'] = $base . '/' . ltrim($item['anh'], '/');
            }
            if ($item['da_ban_30_ngay'] == 0) {
                $item['goi_y'] = 'Đẩy lên trang chủ';
            } else {
                $item['goi_y'] = 'Tạo khuyến mãi';
            }
        }
        return $result;
    }

    // 5. Cảnh báo tồn kho
    public function getCanhBaoTonKho() {
        $warnings = [];
        
        // Hết hàng
        $sqlHet = "SELECT ten_sp FROM san_pham WHERE tong_ton_kho = 0 AND da_xoa = 0 LIMIT 5";
        $het = $this->db->query($sqlHet)->fetchAll(PDO::FETCH_ASSOC);
        foreach($het as $h) {
            $warnings[] = ['noi_dung' => $h['ten_sp'] . ' đã hết hàng', 'loai' => 'het_hang'];
        }

        // Sắp hết
        $sqlSapHet = "SELECT ten_sp, tong_ton_kho FROM san_pham WHERE tong_ton_kho > 0 AND tong_ton_kho <= 10 AND da_xoa = 0 LIMIT 5";
        $sapHet = $this->db->query($sqlSapHet)->fetchAll(PDO::FETCH_ASSOC);
        foreach($sapHet as $sh) {
            $warnings[] = ['noi_dung' => $sh['ten_sp'] . ' chỉ còn ' . $sh['tong_ton_kho'] . ' sản phẩm', 'loai' => 'sap_het'];
        }

        // Tồn nhiều
        $sqlTonNhieu = "SELECT ten_sp, tong_ton_kho FROM san_pham WHERE tong_ton_kho > 100 AND da_xoa = 0 LIMIT 5";
        $tonNhieu = $this->db->query($sqlTonNhieu)->fetchAll(PDO::FETCH_ASSOC);
        foreach($tonNhieu as $tn) {
            $warnings[] = ['noi_dung' => $tn['ten_sp'] . ' tồn kho ' . $tn['tong_ton_kho'] . ' sản phẩm', 'loai' => 'ton_nhieu'];
        }

        return $warnings;
    }

    // 6. Khách hàng mới nhất
    public function getKhachHangMoiNhat($limit = 5) {
        $sql = "
            SELECT nd.ho_ten as ten, DATE_FORMAT(nd.ngay_tao, '%d/%m/%Y') as ngay_dang_ky, htv.ten_hang as hang
            FROM nguoi_dung nd
            LEFT JOIN hang_thanh_vien htv ON nd.id_hang_thanh_vien = htv.id
            ORDER BY nd.ngay_tao DESC 
            LIMIT " . (int)$limit;
        
        $result = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as &$kh) {
            if (empty($kh['hang'])) {
                $kh['hang'] = 'Thành viên mới';
            }
        }
        return $result;
    }

    // 7. Khuyến mãi đang chạy (Voucher)
    public function getKhuyenMaiDangChay($limit = 5) {
        $sql = "
            SELECT ma_voucher as ma, 
                   ten_chuong_trinh as uu_dai, 
                   CONCAT(da_dung, '/', so_luong) as da_dung, 
                   DATE_FORMAT(ngay_ket_thuc, '%d/%m/%Y') as het_han
            FROM voucher
            WHERE trang_thai = 1 AND ngay_ket_thuc >= NOW()
            ORDER BY ngay_ket_thuc ASC
            LIMIT " . (int)$limit;
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    // 8. Hoạt động gần đây
    public function getHoatDongGanDay($limit = 10) {
        $sql = "
            SELECT nd.ho_ten as nguoi_thuc_hien, nk.hanh_dong, nk.module, nk.ngay_tao
            FROM nhat_ky_hoat_dong nk
            LEFT JOIN nguoi_dung nd ON nk.id_nguoi_dung = nd.id
            ORDER BY nk.ngay_tao DESC
            LIMIT " . (int)$limit;
        
        $logs = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        
        $result = [];
        foreach ($logs as $log) {
            $timeAgo = $this->timeElapsedString($log['ngay_tao']);
            $nguoi = $log['nguoi_thuc_hien'] ? $log['nguoi_thuc_hien'] : 'Hệ thống';
            
            // Format noi_dung roughly
            $noiDung = "{$nguoi} đã {$log['hanh_dong']} ở module <span class='font-medium text-[#6B0D18]'>{$log['module']}</span>.";
            
            $result[] = [
                'thoi_gian' => $timeAgo,
                'noi_dung' => $noiDung
            ];
        }
        
        return $result;
    }

    private function timeElapsedString($datetime, $full = false) {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'năm',
            'm' => 'tháng',
            'w' => 'tuần',
            'd' => 'ngày',
            'h' => 'giờ',
            'i' => 'phút',
            's' => 'giây',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v;
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' trước' : 'vừa xong';
    }

    // 9. Biểu đồ doanh thu
    public function getBieuDoDoanhThu() {
        // 7 ngày qua
        $sql7Days = "
            SELECT DATE_FORMAT(ngay_tao, '%d/%m') as label, SUM(thanh_tien) as total
            FROM don_hang
            WHERE trang_thai_don_hang = 3 AND ngay_tao >= DATE_SUB(CURDATE(), INTERVAL 6 DAY)
            GROUP BY DATE(ngay_tao)
            ORDER BY DATE(ngay_tao) ASC
        ";
        $data7Days = $this->db->query($sql7Days)->fetchAll(PDO::FETCH_ASSOC);

        // Fill missing days for 7 days
        $labels7 = [];
        $values7 = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = date('d/m', strtotime("-$i days"));
            $labels7[] = $date;
            $found = false;
            foreach ($data7Days as $d) {
                if ($d['label'] == $date) {
                    $values7[] = round($d['total'] / 1000000, 2); // Convert to millions
                    $found = true;
                    break;
                }
            }
            if (!$found) $values7[] = 0;
        }

        // Tháng này (Từng ngày trong tháng)
        $sqlMonth = "
            SELECT DAY(ngay_tao) as label, SUM(thanh_tien) as total
            FROM don_hang
            WHERE trang_thai_don_hang = 3 AND MONTH(ngay_tao) = MONTH(CURDATE()) AND YEAR(ngay_tao) = YEAR(CURDATE())
            GROUP BY DAY(ngay_tao)
            ORDER BY DAY(ngay_tao) ASC
        ";
        $dataMonth = $this->db->query($sqlMonth)->fetchAll(PDO::FETCH_ASSOC);
        $labelsMonth = [];
        $valuesMonth = [];
        $daysInMonth = date('t');
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $labelsMonth[] = $i;
            $found = false;
            foreach ($dataMonth as $d) {
                if ($d['label'] == $i) {
                    $valuesMonth[] = round($d['total'] / 1000000, 2);
                    $found = true;
                    break;
                }
            }
            if (!$found) $valuesMonth[] = 0;
        }

        // Năm nay (Từng tháng)
        $sqlYear = "
            SELECT MONTH(ngay_tao) as label, SUM(thanh_tien) as total
            FROM don_hang
            WHERE trang_thai_don_hang = 3 AND YEAR(ngay_tao) = YEAR(CURDATE())
            GROUP BY MONTH(ngay_tao)
            ORDER BY MONTH(ngay_tao) ASC
        ";
        $dataYear = $this->db->query($sqlYear)->fetchAll(PDO::FETCH_ASSOC);
        $labelsYear = [];
        $valuesYear = [];
        for ($i = 1; $i <= 12; $i++) {
            $labelsYear[] = 'T' . $i;
            $found = false;
            foreach ($dataYear as $d) {
                if ($d['label'] == $i) {
                    $valuesYear[] = round($d['total'] / 1000000, 2);
                    $found = true;
                    break;
                }
            }
            if (!$found) $valuesYear[] = 0;
        }

        return [
            '7_ngay' => ['labels' => $labels7, 'data' => $values7],
            'thang_nay' => ['labels' => $labelsMonth, 'data' => $valuesMonth],
            'nam_nay' => ['labels' => $labelsYear, 'data' => $valuesYear],
        ];
    }
}
