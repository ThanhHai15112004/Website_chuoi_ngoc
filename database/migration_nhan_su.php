<?php
/**
 * Migration: Tạo bảng nhan_vien + nhan_vien_quyen + nhan_vien_lich_su
 * Chạy: php database/migration_nhan_su.php
 */

$envPath = __DIR__ . '/../.env';
if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            $_ENV[trim($name)] = trim($value);
        }
    }
}

$dsn = "mysql:host=" . ($_ENV['DB_HOST'] ?? '127.0.0.1') . ";port=" . ($_ENV['DB_PORT'] ?? '3307') . ";dbname=" . ($_ENV['DB_DATABASE'] ?? 'shop_chuoi_ngoc') . ";charset=utf8mb4";
$pdo = new PDO($dsn, $_ENV['DB_USERNAME'] ?? 'root', $_ENV['DB_PASSWORD'] ?? '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
$pdo->exec("SET NAMES utf8mb4");

echo "=== Migration: Quản lý nhân sự ===\n\n";

// DROP TABLES IF EXIST
$pdo->exec("DROP TABLE IF EXISTS nhan_vien_lich_su");
$pdo->exec("DROP TABLE IF EXISTS nhan_vien_quyen");
$pdo->exec("DROP TABLE IF EXISTS nhan_vien");
echo "[OK] Đã xóa các bảng cũ (nếu có).\n";

// ===== Bảng nhan_vien =====
$pdo->exec("
    CREATE TABLE IF NOT EXISTS nhan_vien (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ma_nv VARCHAR(20) NOT NULL UNIQUE COMMENT 'Mã nhân viên',
        ho_ten VARCHAR(255) NOT NULL COMMENT 'Họ và tên',
        email VARCHAR(255) NOT NULL UNIQUE COMMENT 'Email đăng nhập',
        dien_thoai VARCHAR(20) DEFAULT NULL,
        mat_khau VARCHAR(255) NOT NULL COMMENT 'Password hashed',
        vai_tro VARCHAR(50) NOT NULL DEFAULT 'Nhân viên bán hàng',
        phong_ban VARCHAR(100) DEFAULT NULL,
        trang_thai ENUM('hoat_dong','cho_kich_hoat','bi_khoa') NOT NULL DEFAULT 'cho_kich_hoat',
        avatar VARCHAR(500) DEFAULT NULL,
        ngay_sinh DATE DEFAULT NULL,
        dia_chi TEXT DEFAULT NULL,
        ghi_chu TEXT DEFAULT NULL,
        yeu_cau_doi_mk TINYINT(1) DEFAULT 1,
        ly_do_khoa TEXT DEFAULT NULL,
        ngay_vao_lam DATE DEFAULT NULL,
        lan_dang_nhap_cuoi DATETIME DEFAULT NULL,
        nguoi_tao VARCHAR(100) DEFAULT NULL,
        nguoi_cap_nhat VARCHAR(100) DEFAULT NULL,
        ngay_tao DATETIME DEFAULT CURRENT_TIMESTAMP,
        ngay_cap_nhat DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        INDEX idx_trang_thai (trang_thai),
        INDEX idx_vai_tro (vai_tro),
        INDEX idx_phong_ban (phong_ban)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Nhân viên hệ thống'
");
echo "[OK] Bảng 'nhan_vien' đã tạo.\n";

// ===== Bảng nhan_vien_quyen =====
$pdo->exec("
    CREATE TABLE IF NOT EXISTS nhan_vien_quyen (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_nhan_vien INT NOT NULL,
        module VARCHAR(100) NOT NULL COMMENT 'Dashboard, Sản phẩm, Đơn hàng, Kho, Cấu hình',
        xem TINYINT(1) DEFAULT 0,
        them TINYINT(1) DEFAULT 0,
        sua TINYINT(1) DEFAULT 0,
        xoa TINYINT(1) DEFAULT 0,
        dac_biet TINYINT(1) DEFAULT 0 COMMENT 'Xuất Excel, Duyệt phiếu...',
        UNIQUE KEY uk_nv_module (id_nhan_vien, module),
        FOREIGN KEY (id_nhan_vien) REFERENCES nhan_vien(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Ma trận quyền nhân viên'
");
echo "[OK] Bảng 'nhan_vien_quyen' đã tạo.\n";

// ===== Bảng nhan_vien_lich_su =====
$pdo->exec("
    CREATE TABLE IF NOT EXISTS nhan_vien_lich_su (
        id INT AUTO_INCREMENT PRIMARY KEY,
        id_nhan_vien INT NOT NULL,
        hanh_dong VARCHAR(255) NOT NULL,
        mo_ta TEXT DEFAULT NULL,
        ip_address VARCHAR(45) DEFAULT NULL,
        thiet_bi VARCHAR(255) DEFAULT NULL,
        nguoi_thuc_hien VARCHAR(100) DEFAULT NULL,
        ngay_thuc_hien DATETIME DEFAULT CURRENT_TIMESTAMP,
        INDEX idx_id_nv (id_nhan_vien),
        FOREIGN KEY (id_nhan_vien) REFERENCES nhan_vien(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Lịch sử hoạt động nhân viên'
");
echo "[OK] Bảng 'nhan_vien_lich_su' đã tạo.\n";

// ===== Seed data =====
echo "\n--- Thêm 50 dữ liệu mẫu ---\n";

$defaultPass = password_hash('AutoPass123!', PASSWORD_DEFAULT);

$seeds = [
    ['NV0001', 'Hải Admin',           'thanhhai@example.com',  '0901234567', $defaultPass, 'Super Admin',           'Quản trị',  'hoat_dong',     '2004-11-15', '123 Nguyễn Văn Linh, Quận Hải Châu, TP. Đà Nẵng', 'Người sáng lập hệ thống. Phụ trách tổng thể nền tảng.', 0, null, '2026-01-01', '2026-05-18 09:30:00', 'Hệ thống'],
    ['NV0002', 'Nguyễn Văn Kho',      'vankho@example.com',    '0987654321', $defaultPass, 'Quản lý kho',           'Kho',       'hoat_dong',     '1995-03-20', null, null, 1, null, '2026-02-15', '2026-05-18 08:15:00', 'Hải Admin'],
    ['NV0003', 'Trần Thị Chăm Sóc',   'chamsoc@example.com',   '0912345678', $defaultPass, 'CSKH',                  'CSKH',      'cho_kich_hoat', '1998-07-10', null, null, 1, null, '2026-05-17', null, 'Hải Admin'],
    ['NV0004', 'Lê Kế Toán',          'ketoan@example.com',    null,         $defaultPass, 'Kế toán / báo cáo',     'Kế toán',   'bi_khoa',       '1990-12-25', null, 'Vi phạm quy trình, tạm khóa để điều tra.', 1, 'Nhân viên nghỉ việc / Thôi việc', '2026-03-10', '2026-05-01 17:00:00', 'Hải Admin'],
    ['NV0005', 'Phạm Bán Hàng',       'banhang@example.com',   '0933445566', $defaultPass, 'Nhân viên bán hàng',    'Bán hàng',  'hoat_dong',     '2000-05-15', null, null, 1, null, '2026-04-20', '2026-05-17 19:20:00', 'Hải Admin'],
];

// Generate 45 random users
$hoTenList = ['Nguyễn Văn', 'Trần Thị', 'Lê', 'Phạm', 'Hoàng', 'Phan', 'Vũ', 'Võ', 'Đặng', 'Bùi', 'Đỗ', 'Hồ', 'Ngô', 'Dương', 'Lý'];
$tenList = ['Anh', 'Bình', 'Cường', 'Dũng', 'Em', 'Phương', 'Giang', 'Hùng', 'Linh', 'Khánh', 'Lan', 'Mai', 'Nga', 'Oanh', 'Phúc', 'Quang', 'Trang', 'Tuấn', 'Uyên', 'Vy', 'Xuân', 'Yến', 'Hải', 'Sơn', 'Tùng'];
$vaiTroList = ['Admin', 'Quản lý kho', 'CSKH', 'Kế toán / báo cáo', 'Nhân viên bán hàng'];
$phongBanList = ['Quản trị', 'Kho', 'CSKH', 'Kế toán', 'Bán hàng'];
$trangThaiList = ['hoat_dong', 'cho_kich_hoat', 'bi_khoa'];

for ($i = 6; $i <= 50; $i++) {
    $maNV = 'NV' . str_pad($i, 4, '0', STR_PAD_LEFT);
    $hoTen = $hoTenList[array_rand($hoTenList)] . ' ' . $tenList[array_rand($tenList)];
    
    // Generate email without accents
    $emailPrefix = strtolower(preg_replace('/[^a-zA-Z0-9]/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $hoTen)));
    $email = $emailPrefix . $i . '@example.com';
    
    $dienThoai = '09' . rand(10000000, 99999999);
    $vaiTroIdx = array_rand($vaiTroList);
    $vaiTro = $vaiTroList[$vaiTroIdx];
    $phongBan = $phongBanList[$vaiTroIdx];
    
    // Weighted status
    $randStatus = rand(1, 100);
    if ($randStatus <= 70) $trangThai = 'hoat_dong';
    elseif ($randStatus <= 90) $trangThai = 'cho_kich_hoat';
    else $trangThai = 'bi_khoa';
    
    $ngaySinh = date('Y-m-d', strtotime('-' . rand(20, 45) . ' years'));
    $ngayVaoLam = date('Y-m-d', strtotime('-' . rand(1, 1000) . ' days'));
    
    $lanDangNhap = $trangThai == 'hoat_dong' ? date('Y-m-d H:i:s', strtotime('-' . rand(0, 30) . ' days')) : null;
    $lyDoKhoa = $trangThai == 'bi_khoa' ? 'Khóa tự động do lâu không hoạt động' : null;

    $seeds[] = [
        $maNV, $hoTen, $email, $dienThoai, $defaultPass, $vaiTro, $phongBan, $trangThai, $ngaySinh, null, null, 1, $lyDoKhoa, $ngayVaoLam, $lanDangNhap, 'Hải Admin'
    ];
}

$stmt = $pdo->prepare("
    INSERT INTO nhan_vien (ma_nv, ho_ten, email, dien_thoai, mat_khau, vai_tro, phong_ban, trang_thai, ngay_sinh, dia_chi, ghi_chu, yeu_cau_doi_mk, ly_do_khoa, ngay_vao_lam, lan_dang_nhap_cuoi, nguoi_tao, ngay_tao, ngay_cap_nhat)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())
");

foreach ($seeds as $index => $s) {
    $stmt->execute($s);
    if ($index < 5 || $index > 45) {
        echo "  [+] Đã thêm: {$s[1]} ({$s[0]})\n";
    }
}
echo "  ... và các nhân viên khác (Tổng cộng 50)\n";

// Seed quyền cho từng nhân viên
$modules = ['Dashboard & Thống kê', 'Sản phẩm & Danh mục', 'Đơn hàng & Thanh toán', 'Quản lý Kho', 'Cấu hình & Nhân sự'];
$stmtQ = $pdo->prepare("INSERT INTO nhan_vien_quyen (id_nhan_vien, module, xem, them, sua, xoa, dac_biet) VALUES (?, ?, ?, ?, ?, ?, ?)");

for ($i = 1; $i <= 50; $i++) {
    $stmtRole = $pdo->prepare("SELECT vai_tro FROM nhan_vien WHERE id = ?");
    $stmtRole->execute([$i]);
    $role = $stmtRole->fetchColumn();

    if ($role == 'Super Admin' || $role == 'Admin') {
        foreach ($modules as $m) { $stmtQ->execute([$i, $m, 1, 1, 1, 1, 1]); }
    } elseif ($role == 'Quản lý kho') {
        $stmtQ->execute([$i, 'Dashboard & Thống kê', 1, 0, 0, 0, 0]);
        $stmtQ->execute([$i, 'Sản phẩm & Danh mục', 1, 1, 1, 0, 1]);
        $stmtQ->execute([$i, 'Quản lý Kho', 1, 1, 1, 1, 1]);
    } elseif ($role == 'CSKH' || $role == 'Nhân viên bán hàng') {
        $stmtQ->execute([$i, 'Dashboard & Thống kê', 1, 0, 0, 0, 0]);
        $stmtQ->execute([$i, 'Sản phẩm & Danh mục', 1, 0, 0, 0, 0]);
        $stmtQ->execute([$i, 'Đơn hàng & Thanh toán', 1, 1, 1, 0, 0]);
    } elseif ($role == 'Kế toán / báo cáo') {
        $stmtQ->execute([$i, 'Dashboard & Thống kê', 1, 0, 0, 0, 1]);
        $stmtQ->execute([$i, 'Đơn hàng & Thanh toán', 1, 0, 1, 0, 1]);
    }
}

echo "\n[OK] Đã seed quyền cho 50 nhân viên.\n";

// Seed lịch sử
$stmtH = $pdo->prepare("INSERT INTO nhan_vien_lich_su (id_nhan_vien, hanh_dong, mo_ta, ip_address, thiet_bi, nguoi_thuc_hien, ngay_thuc_hien) VALUES (?, ?, ?, ?, ?, ?, ?)");

// Lịch sử đăng nhập NV0001
$stmtH->execute([1, 'Đăng nhập', 'Đăng nhập thành công', '113.160.22.1', 'Windows • Chrome', 'Hải Admin', date('Y-m-d H:i:s')]);
$stmtH->execute([1, 'Đăng nhập', 'Đăng nhập thành công', '113.160.22.1', 'Windows • Chrome', 'Hải Admin', date('Y-m-d H:i:s', strtotime('-1 day'))]);

// Nhật ký hoạt động NV0001
$stmtH->execute([1, 'Tạo phiếu nhập kho PN00123', 'Đã thêm 50 sản phẩm.', '113.160.22.1', 'Windows • Chrome', 'Hải Admin', date('Y-m-d H:i:s', strtotime('-2 hours'))]);
$stmtH->execute([1, 'Cập nhật cấu hình', 'Đã chỉnh sửa nội dung tab.', '113.160.22.1', 'Windows • Chrome', 'Hải Admin', date('Y-m-d H:i:s', strtotime('-1 day'))]);

// Lịch sử tạo tài khoản ngẫu nhiên
for ($i = 1; $i <= 50; $i++) {
    $stmtH->execute([$i, 'Tạo tài khoản', 'Khởi tạo tài khoản', null, null, 'Hệ thống', date('Y-m-d H:i:s', strtotime('-1 month'))]);
}

echo "[OK] Đã seed lịch sử hoạt động.\n";
echo "\n=== Migration nhân sự hoàn tất! ===\n";
