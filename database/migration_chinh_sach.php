<?php
/**
 * Migration: Tạo bảng chinh_sach + chinh_sach_lich_su
 * Chạy: php database/migration_chinh_sach.php
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

try {

    echo "=== Migration: Chính sách cửa hàng ===\n\n";

    // ===== Bảng chinh_sach =====
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS chinh_sach (
            id INT AUTO_INCREMENT PRIMARY KEY,
            ten VARCHAR(255) NOT NULL COMMENT 'Tên chính sách',
            loai VARCHAR(50) NOT NULL COMMENT 'Loại: Đổi trả, Bảo hành, Vận chuyển, Thanh toán, Bảo mật, Điều khoản, Hướng dẫn, Kiểm hàng',
            slug VARCHAR(255) NOT NULL UNIQUE COMMENT 'Đường dẫn SEO',
            mo_ta_ngan TEXT DEFAULT NULL COMMENT 'Mô tả ngắn hiển thị ở danh sách/SEO',
            noi_dung LONGTEXT DEFAULT NULL COMMENT 'Nội dung chính sách (HTML)',
            vi_tri_hien_thi JSON DEFAULT NULL COMMENT 'Mảng vị trí: Footer, Checkout, Trang sản phẩm, Đăng ký',
            trang_thai ENUM('dang_hien_thi','dang_an','ban_nhap','can_cap_nhat') NOT NULL DEFAULT 'ban_nhap' COMMENT 'Trạng thái hiển thị',
            seo_title VARCHAR(60) DEFAULT NULL COMMENT 'Meta Title SEO',
            seo_description VARCHAR(160) DEFAULT NULL COMMENT 'Meta Description SEO',
            nguoi_tao VARCHAR(100) DEFAULT NULL COMMENT 'Tên người tạo',
            nguoi_cap_nhat VARCHAR(100) DEFAULT NULL COMMENT 'Tên người cập nhật cuối',
            ngay_tao DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày tạo',
            ngay_cap_nhat DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Ngày cập nhật',
            INDEX idx_trang_thai (trang_thai),
            INDEX idx_loai (loai),
            INDEX idx_ngay_cap_nhat (ngay_cap_nhat)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Chính sách cửa hàng'
    ");
    echo "[OK] Bảng 'chinh_sach' đã tạo.\n";

    // ===== Bảng chinh_sach_lich_su =====
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS chinh_sach_lich_su (
            id INT AUTO_INCREMENT PRIMARY KEY,
            id_chinh_sach INT NOT NULL,
            hanh_dong VARCHAR(255) NOT NULL COMMENT 'Mô tả hành động',
            mo_ta TEXT DEFAULT NULL COMMENT 'Chi tiết thay đổi',
            nguoi_thuc_hien VARCHAR(100) DEFAULT NULL COMMENT 'Tên người thực hiện',
            ngay_thuc_hien DATETIME DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_id_chinh_sach (id_chinh_sach),
            FOREIGN KEY (id_chinh_sach) REFERENCES chinh_sach(id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Lịch sử chỉnh sửa chính sách'
    ");
    echo "[OK] Bảng 'chinh_sach_lich_su' đã tạo.\n";

    // ===== Seed data mẫu =====
    $count = $pdo->query("SELECT COUNT(*) FROM chinh_sach")->fetchColumn();
    if ($count == 0) {
        echo "\n--- Thêm dữ liệu mẫu ---\n";

        $seeds = [
            [
                'ten' => 'Chính sách đổi trả',
                'loai' => 'Đổi trả',
                'slug' => 'chinh-sach-doi-tra',
                'mo_ta_ngan' => 'Tìm hiểu chi tiết về điều kiện, thời gian và quy trình đổi trả các sản phẩm vòng ngọc, chuỗi đá và phụ kiện tại cửa hàng chúng tôi.',
                'noi_dung' => '<h2>1. ĐIỀU KIỆN ĐỔI TRẢ</h2><ul><li>Sản phẩm chưa qua sử dụng, còn nguyên tem mác, hộp đựng.</li><li>Không bị nứt vỡ, trầy xước do tác động ngoại lực.</li><li>Sản phẩm phải có hóa đơn mua hàng hợp lệ tại Chuỗi Ngọc.</li></ul><h2>2. THỜI GIAN ĐỔI TRẢ</h2><p>Khách hàng có thể yêu cầu đổi trả trong vòng <strong>7 ngày</strong> kể từ ngày nhận hàng.</p><h2>3. CÁC TRƯỜNG HỢP KHÔNG HỖ TRỢ</h2><ul><li>Vòng ngọc, chuỗi đá đã qua chỉnh sửa kích thước theo yêu cầu riêng.</li><li>Sản phẩm khuyến mãi sâu trong các chương trình Flash Sale.</li></ul>',
                'vi_tri' => '["Footer","Checkout"]',
                'trang_thai' => 'dang_hien_thi',
                'seo_title' => 'Chính sách đổi trả - Chuỗi Ngọc Phong Thủy',
                'seo_description' => 'Tìm hiểu chi tiết về điều kiện, thời gian và quy trình đổi trả các sản phẩm vòng ngọc, chuỗi đá và phụ kiện tại cửa hàng chúng tôi.',
                'nguoi_tao' => 'Hải Admin',
                'nguoi_cap_nhat' => 'Hải Admin',
            ],
            [
                'ten' => 'Chính sách bảo hành',
                'loai' => 'Bảo hành',
                'slug' => 'chinh-sach-bao-hanh',
                'mo_ta_ngan' => 'Cam kết bảo hành chất lượng sản phẩm vòng ngọc, chuỗi đá tự nhiên.',
                'noi_dung' => '<h2>1. PHẠM VI BẢO HÀNH</h2><ul><li>Bảo hành đứt dây, tuột hạt do lỗi kỹ thuật: miễn phí trong 6 tháng.</li><li>Bảo hành xước nhẹ bề mặt đá: đánh bóng miễn phí 1 lần.</li></ul><h2>2. KHÔNG BẢO HÀNH</h2><ul><li>Sản phẩm bị nứt vỡ do va đập mạnh.</li><li>Sản phẩm đã tự ý sửa chữa tại nơi khác.</li></ul>',
                'vi_tri' => '["Footer","Trang sản phẩm"]',
                'trang_thai' => 'dang_hien_thi',
                'seo_title' => 'Chính sách bảo hành - Chuỗi Ngọc Phong Thủy',
                'seo_description' => 'Cam kết bảo hành chất lượng sản phẩm vòng ngọc, chuỗi đá tự nhiên.',
                'nguoi_tao' => 'Hải Admin',
                'nguoi_cap_nhat' => 'Hải Admin',
            ],
            [
                'ten' => 'Chính sách vận chuyển',
                'loai' => 'Vận chuyển',
                'slug' => 'chinh-sach-van-chuyen',
                'mo_ta_ngan' => 'Thông tin về phí vận chuyển, thời gian giao hàng và đồng kiểm.',
                'noi_dung' => '<h2>1. PHÍ VẬN CHUYỂN</h2><p>Miễn phí giao hàng cho đơn từ 500.000đ trở lên.</p><h2>2. THỜI GIAN GIAO HÀNG</h2><ul><li>Nội thành: 1-2 ngày</li><li>Ngoại thành: 3-5 ngày</li></ul>',
                'vi_tri' => '["Footer","Checkout"]',
                'trang_thai' => 'dang_hien_thi',
                'seo_title' => '',
                'seo_description' => 'Thông tin về phí vận chuyển, thời gian giao hàng.',
                'nguoi_tao' => 'Super Admin',
                'nguoi_cap_nhat' => 'Super Admin',
            ],
            [
                'ten' => 'Chính sách bảo mật',
                'loai' => 'Bảo mật',
                'slug' => 'chinh-sach-bao-mat',
                'mo_ta_ngan' => 'Cam kết bảo vệ thông tin cá nhân của khách hàng.',
                'noi_dung' => '<h2>1. THU THẬP THÔNG TIN</h2><p>Chúng tôi chỉ thu thập thông tin cần thiết cho việc xử lý đơn hàng.</p><h2>2. BẢO VỆ DỮ LIỆU</h2><p>Mọi thông tin được mã hóa và bảo vệ nghiêm ngặt.</p>',
                'vi_tri' => '["Footer","Đăng ký"]',
                'trang_thai' => 'can_cap_nhat',
                'seo_title' => 'Chính sách bảo mật - Chuỗi Ngọc',
                'seo_description' => 'Cam kết bảo vệ thông tin cá nhân của khách hàng.',
                'nguoi_tao' => 'Hải Admin',
                'nguoi_cap_nhat' => 'Hải Admin',
            ],
            [
                'ten' => 'Chính sách thanh toán',
                'loai' => 'Thanh toán',
                'slug' => 'chinh-sach-thanh-toan',
                'mo_ta_ngan' => 'Hướng dẫn các phương thức thanh toán được chấp nhận.',
                'noi_dung' => '<h2>PHƯƠNG THỨC THANH TOÁN</h2><ul><li>Thanh toán khi nhận hàng (COD)</li><li>Chuyển khoản ngân hàng</li><li>Ví điện tử MoMo, ZaloPay</li></ul>',
                'vi_tri' => '["Checkout"]',
                'trang_thai' => 'dang_hien_thi',
                'seo_title' => '',
                'seo_description' => '',
                'nguoi_tao' => 'Hải Admin',
                'nguoi_cap_nhat' => 'Hải Admin',
            ],
            [
                'ten' => 'Điều khoản sử dụng',
                'loai' => 'Điều khoản',
                'slug' => 'dieu-khoan-su-dung',
                'mo_ta_ngan' => 'Các điều khoản và điều kiện khi sử dụng website.',
                'noi_dung' => '<h2>ĐIỀU KHOẢN CHUNG</h2><p>Bằng việc truy cập website, bạn đồng ý với các điều khoản sử dụng dưới đây.</p>',
                'vi_tri' => '["Footer"]',
                'trang_thai' => 'dang_an',
                'seo_title' => '',
                'seo_description' => '',
                'nguoi_tao' => 'Super Admin',
                'nguoi_cap_nhat' => 'Super Admin',
            ],
            [
                'ten' => 'Hướng dẫn mua hàng',
                'loai' => 'Hướng dẫn',
                'slug' => 'huong-dan-mua-hang',
                'mo_ta_ngan' => 'Hướng dẫn từng bước để đặt hàng trên website.',
                'noi_dung' => '<h2>CÁC BƯỚC MUA HÀNG</h2><ol><li>Chọn sản phẩm yêu thích</li><li>Thêm vào giỏ hàng</li><li>Tiến hành thanh toán</li><li>Nhận hàng và kiểm tra</li></ol>',
                'vi_tri' => '[]',
                'trang_thai' => 'ban_nhap',
                'seo_title' => '',
                'seo_description' => '',
                'nguoi_tao' => 'Hải Admin',
                'nguoi_cap_nhat' => 'Hải Admin',
            ],
            [
                'ten' => 'Chính sách kiểm hàng',
                'loai' => 'Kiểm hàng',
                'slug' => 'chinh-sach-kiem-hang',
                'mo_ta_ngan' => 'Quyền kiểm tra hàng hóa trước khi nhận.',
                'noi_dung' => '<h2>QUYỀN KIỂM HÀNG</h2><p>Quý khách có quyền đồng kiểm sản phẩm trước khi thanh toán cho đơn vị vận chuyển.</p>',
                'vi_tri' => '["Trang sản phẩm"]',
                'trang_thai' => 'dang_hien_thi',
                'seo_title' => 'Chính sách kiểm hàng - Chuỗi Ngọc',
                'seo_description' => 'Quyền kiểm tra hàng hóa trước khi nhận.',
                'nguoi_tao' => 'Hải Admin',
                'nguoi_cap_nhat' => 'Hải Admin',
            ],
        ];

        $stmt = $pdo->prepare("
            INSERT INTO chinh_sach (ten, loai, slug, mo_ta_ngan, noi_dung, vi_tri_hien_thi, trang_thai, seo_title, seo_description, nguoi_tao, nguoi_cap_nhat, ngay_tao, ngay_cap_nhat)
            VALUES (:ten, :loai, :slug, :mo_ta_ngan, :noi_dung, :vi_tri, :trang_thai, :seo_title, :seo_description, :nguoi_tao, :nguoi_cap_nhat, NOW(), NOW())
        ");

        $stmtHistory = $pdo->prepare("
            INSERT INTO chinh_sach_lich_su (id_chinh_sach, hanh_dong, mo_ta, nguoi_thuc_hien)
            VALUES (:id_cs, :hanh_dong, :mo_ta, :nguoi)
        ");

        foreach ($seeds as $seed) {
            $stmt->execute([
                ':ten' => $seed['ten'],
                ':loai' => $seed['loai'],
                ':slug' => $seed['slug'],
                ':mo_ta_ngan' => $seed['mo_ta_ngan'],
                ':noi_dung' => $seed['noi_dung'],
                ':vi_tri' => $seed['vi_tri'],
                ':trang_thai' => $seed['trang_thai'],
                ':seo_title' => $seed['seo_title'],
                ':seo_description' => $seed['seo_description'],
                ':nguoi_tao' => $seed['nguoi_tao'],
                ':nguoi_cap_nhat' => $seed['nguoi_cap_nhat'],
            ]);
            $lastId = $pdo->lastInsertId();

            // Thêm lịch sử khởi tạo
            $stmtHistory->execute([
                ':id_cs' => $lastId,
                ':hanh_dong' => 'Khởi tạo chính sách',
                ':mo_ta' => 'Tạo mới chính sách "' . $seed['ten'] . '"',
                ':nguoi' => $seed['nguoi_tao'],
            ]);

            echo "  [+] Đã thêm: {$seed['ten']}\n";
        }

        echo "\n[OK] Đã thêm " . count($seeds) . " chính sách mẫu.\n";
    } else {
        echo "\n[SKIP] Bảng chinh_sach đã có $count bản ghi, bỏ qua seed.\n";
    }

    echo "\n=== Migration hoàn tất! ===\n";

} catch (PDOException $e) {
    echo "[ERROR] " . $e->getMessage() . "\n";
    exit(1);
}
