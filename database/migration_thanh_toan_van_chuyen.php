<?php
/**
 * Migration + Seed: Thanh toán & Vận chuyển
 * Chạy: php database/migration_thanh_toan_van_chuyen.php
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
echo "✓ Kết nối DB thành công.\n";

// ==================== CREATE TABLES ====================
$tables = [
    "CREATE TABLE IF NOT EXISTS `phuong_thuc_thanh_toan` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `ma` VARCHAR(20) NOT NULL UNIQUE,
        `ten` VARCHAR(100) NOT NULL,
        `mo_ta` TEXT,
        `dieu_kien` VARCHAR(255) DEFAULT NULL,
        `phi` INT DEFAULT 0,
        `icon` VARCHAR(50) DEFAULT 'mdi:wallet',
        `thu_tu` INT DEFAULT 0,
        `trang_thai` TINYINT(1) DEFAULT 1,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    "CREATE TABLE IF NOT EXISTS `tai_khoan_ngan_hang` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `ten_ngan_hang` VARCHAR(100) NOT NULL,
        `chu_tai_khoan` VARCHAR(100) NOT NULL,
        `so_tai_khoan` VARCHAR(50) NOT NULL,
        `chi_nhanh` VARCHAR(100) DEFAULT NULL,
        `qr_image` VARCHAR(255) DEFAULT NULL,
        `la_mac_dinh` TINYINT(1) DEFAULT 0,
        `trang_thai` TINYINT(1) DEFAULT 1,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    "CREATE TABLE IF NOT EXISTS `phuong_thuc_van_chuyen` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `ma` VARCHAR(20) NOT NULL UNIQUE,
        `ten` VARCHAR(100) NOT NULL,
        `mo_ta` TEXT,
        `khu_vuc` VARCHAR(100) DEFAULT 'Toàn quốc',
        `thoi_gian` VARCHAR(50),
        `phi_mac_dinh` INT DEFAULT 0,
        `freeship_tu` INT DEFAULT 0,
        `icon` VARCHAR(50) DEFAULT 'mdi:truck-outline',
        `thu_tu` INT DEFAULT 0,
        `trang_thai` TINYINT(1) DEFAULT 1,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    "CREATE TABLE IF NOT EXISTS `khu_vuc_giao_hang` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `ten` VARCHAR(100) NOT NULL,
        `danh_sach_tinh` TEXT,
        `phi_tieu_chuan` INT DEFAULT 0,
        `phi_nhanh` INT DEFAULT 0,
        `freeship_tu` INT DEFAULT 0,
        `thoi_gian` VARCHAR(50),
        `trang_thai` TINYINT(1) DEFAULT 1,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",

    "CREATE TABLE IF NOT EXISTS `quy_tac_freeship` (
        `id` INT AUTO_INCREMENT PRIMARY KEY,
        `ten` VARCHAR(100) NOT NULL,
        `khu_vuc_ap_dung` VARCHAR(255),
        `dieu_kien` VARCHAR(255),
        `trang_thai` TINYINT(1) DEFAULT 1,
        `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci",
];

foreach ($tables as $sql) {
    $pdo->exec($sql);
}
echo "✓ 5 bảng đã tạo.\n";

// ==================== SEED DATA ====================

// 1. Phương thức thanh toán
$payments = [
    ['COD', 'Thanh toán khi nhận hàng', 'Khách thanh toán cho nhân viên giao hàng khi nhận sản phẩm', 'Áp dụng toàn bộ đơn hàng', 0, 'mdi:cash', 0, 1],
    ['BANK', 'Chuyển khoản ngân hàng', 'Khách chuyển khoản trước khi shop xử lý đơn', 'Đơn từ 0đ', 0, 'mdi:bank-transfer', 1, 1],
];
$stmt = $pdo->prepare("INSERT INTO phuong_thuc_thanh_toan (ma, ten, mo_ta, dieu_kien, phi, icon, thu_tu, trang_thai) VALUES (?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE ten=VALUES(ten), mo_ta=VALUES(mo_ta)");
foreach ($payments as $p) { $stmt->execute($p); }
echo "✓ Seed phương thức thanh toán: " . count($payments) . " records.\n";

// 2. Tài khoản ngân hàng
$pdo->exec("DELETE FROM tai_khoan_ngan_hang WHERE 1=1");
$stmt = $pdo->prepare("INSERT INTO tai_khoan_ngan_hang (ten_ngan_hang, chu_tai_khoan, so_tai_khoan, chi_nhanh, la_mac_dinh, trang_thai) VALUES (?,?,?,?,?,?)");
$stmt->execute(['Vietcombank', 'CÔNG TY CHUỖI NGỌC', '123456789', 'Chi nhánh Hội sở chính', 1, 1]);
echo "✓ Seed tài khoản ngân hàng: 1 record.\n";

// 3. Phương thức vận chuyển
$shippings = [
    ['STD', 'Giao hàng tiêu chuẩn', 'Giao toàn quốc trong 2 - 5 ngày', 'Toàn quốc', '2 - 5 ngày', 30000, 500000, 'mdi:truck-outline', 0, 1],
    ['FAST', 'Giao hàng nhanh', 'Giao tốc hành nội thành và liên tỉnh', 'Toàn quốc', '1 - 2 ngày', 50000, 0, 'mdi:truck-fast-outline', 1, 0],
    ['STORE', 'Nhận tại cửa hàng', 'Khách đến cửa hàng lấy hàng trực tiếp', 'Hà Nội', 'Lấy ngay', 0, 0, 'mdi:store', 2, 1],
];
$stmt = $pdo->prepare("INSERT INTO phuong_thuc_van_chuyen (ma, ten, mo_ta, khu_vuc, thoi_gian, phi_mac_dinh, freeship_tu, icon, thu_tu, trang_thai) VALUES (?,?,?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE ten=VALUES(ten), mo_ta=VALUES(mo_ta)");
foreach ($shippings as $s) { $stmt->execute($s); }
echo "✓ Seed phương thức vận chuyển: " . count($shippings) . " records.\n";

// 4. Khu vực giao hàng
$pdo->exec("DELETE FROM khu_vuc_giao_hang WHERE 1=1");
$stmt = $pdo->prepare("INSERT INTO khu_vuc_giao_hang (ten, danh_sach_tinh, phi_tieu_chuan, phi_nhanh, freeship_tu, thoi_gian, trang_thai) VALUES (?,?,?,?,?,?,?)");
$stmt->execute(['Nội thành Hà Nội', 'Quận Cầu Giấy, Quận Đống Đa, Quận Ba Đình, Quận Hoàn Kiếm, Quận Tây Hồ, Quận Thanh Xuân', 20000, 35000, 500000, '1 - 2 ngày', 1]);
$stmt->execute(['Toàn quốc', 'Tất cả các tỉnh thành còn lại', 30000, 50000, 500000, '2 - 5 ngày', 1]);
echo "✓ Seed khu vực giao hàng: 2 records.\n";

// 5. Quy tắc freeship
$pdo->exec("DELETE FROM quy_tac_freeship WHERE 1=1");
$stmt = $pdo->prepare("INSERT INTO quy_tac_freeship (ten, khu_vuc_ap_dung, dieu_kien, trang_thai) VALUES (?,?,?,?)");
$stmt->execute(['Freeship đơn từ 500.000đ', 'Áp dụng toàn quốc', 'Đơn từ 500.000đ', 1]);
$stmt->execute(['Freeship cho hạng Diamond', 'Áp dụng mọi đơn hàng', 'Hạng Diamond', 1]);
echo "✓ Seed quy tắc freeship: 2 records.\n";

echo "\n✓ Migration hoàn tất!\n";
