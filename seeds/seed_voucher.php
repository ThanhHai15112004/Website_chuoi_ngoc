<?php
// Tự động thêm 200 voucher
require_once __DIR__ . '/../config/constants.php';
require_once __DIR__ . '/../app/Core/Helpers.php';
loadEnv(__DIR__ . '/../.env');

// Simple Autoloader
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require $file;
});

try {
    $db = \App\Core\Database::getInstance()->getConnection();
    
    // Clear old test data if needed (optional)
    // $db->exec("TRUNCATE TABLE voucher");

    $loaiGiam = [1, 2, 3, 4]; // 1: %, 2: Tiền, 3: Freeship, 4: Quà
    $doiTuong = ['all', 'new', 'silver', 'gold', 'diamond'];
    $phamVi = ['all', 'vong_ngoc', 'chuoi_da', 'vat_pham'];
    $tienTo = ['SALE', 'LIXI', 'VIP', 'NEW', 'CHAO', 'THANG'];
    
    $count = 0;
    
    for ($i = 1; $i <= 200; $i++) {
        $loai = $loaiGiam[array_rand($loaiGiam)];
        $dt = $doiTuong[array_rand($doiTuong)];
        $pv = $phamVi[array_rand($phamVi)];
        $prefix = $tienTo[array_rand($tienTo)];
        
        $maVoucher = $prefix . strtoupper(substr(md5(uniqid()), 0, 5)) . $i;
        $tenChuongTrinh = "Chương trình " . ($loai == 1 ? "giảm %" : ($loai == 2 ? "giảm tiền" : ($loai == 3 ? "miễn phí ship" : "tặng quà"))) . " siêu hot $i";
        $moTa = "Mô tả chi tiết cho chương trình $maVoucher";
        
        $giaTri = 0;
        $giamToiDa = 0;
        $donToiThieu = rand(0, 5) * 100000; // 0 đến 500k
        
        if ($loai == 1) { // percent
            $giaTri = rand(5, 50); // 5% đến 50%
            $giamToiDa = rand(2, 10) * 10000; // 20k đến 100k
        } elseif ($loai == 2) { // fixed
            $giaTri = rand(2, 20) * 10000; // 20k đến 200k
        } elseif ($loai == 3) { // freeship
            $giaTri = 0;
            $giamToiDa = rand(2, 5) * 10000; // freeship tối đa 20k-50k
        } else {
            $giaTri = 0; // quà
        }

        // Thời gian: Chủ yếu là hiện tại và tương lai
        $randTime = rand(1, 100);
        $isUpcoming = false;
        if ($randTime <= 10) {
            // Hết hạn (10%)
            $start = date('Y-m-d H:i:s', strtotime('-' . rand(10, 30) . ' days'));
            $end = date('Y-m-d H:i:s', strtotime('-' . rand(1, 5) . ' days'));
        } elseif ($randTime <= 20) {
            // Chưa bắt đầu (10%)
            $start = date('Y-m-d H:i:s', strtotime('+' . rand(1, 5) . ' days'));
            $end = date('Y-m-d H:i:s', strtotime('+' . rand(10, 30) . ' days'));
            $isUpcoming = true;
        } else {
            // Đang hoạt động (80%)
            $start = date('Y-m-d H:i:s', strtotime('-' . rand(1, 10) . ' days'));
            $end = date('Y-m-d H:i:s', strtotime('+' . rand(1, 30) . ' days'));
        }

        $soLuong = rand(0, 1) ? -1 : rand(10, 500); // 50% vô hạn, 50% có giới hạn
        $daDung = 0;
        
        $hangThanhVien = null;
        if ($dt == 'silver' || $dt == 'gold' || $dt == 'diamond') {
            $dt_mapped = 'all'; // Set back to all if we use JSON
            $hangThanhVien = json_encode([$dt]);
        } else {
            $dt_mapped = $dt;
        }

        $isCombine = rand(0, 1);
        $trangThai = rand(1, 10) <= 9 ? 1 : 0; // 90% bật

        $sql = "INSERT INTO voucher (id, ma_voucher, ten_chuong_trinh, mo_ta, loai_giam, gia_tri, giam_toi_da, don_toi_thieu, pham_vi_san_pham, doi_tuong, hang_thanh_vien, is_combine, so_luong, da_dung, ngay_bat_dau, ngay_ket_thuc, trang_thai) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $db->prepare($sql);
        $stmt->execute([
            uniqid('vc_seed_'), $maVoucher, $tenChuongTrinh, $moTa, $loai, $giaTri, $giamToiDa, $donToiThieu, 
            $pv, $dt_mapped, $hangThanhVien, $isCombine, $soLuong, $daDung, $start, $end, $trangThai
        ]);
        
        $count++;
    }
    
    echo "Đã tạo thành công $count mã voucher!\n";

} catch (Exception $e) {
    echo "Lỗi: " . $e->getMessage() . "\n";
}
