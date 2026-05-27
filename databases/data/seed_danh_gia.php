<?php
try {
    $db = new PDO('mysql:host=127.0.0.1;port=3307;dbname=shop_chuoi_ngoc;charset=utf8mb4', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get some products
    $stmt = $db->query("SELECT id FROM san_pham LIMIT 5");
    $products = $stmt->fetchAll(PDO::FETCH_COLUMN);

    if (empty($products)) {
        die("Please add some products first.\n");
    }

    // Insert dummy user if not exists
    $db->exec("INSERT IGNORE INTO nguoi_dung (id, ho_ten, email, so_dien_thoai, mat_khau, id_vai_tro) VALUES 
               ('user_1', 'Nguyễn Văn A', 'a@test.com', '0901234567', '123', '3'),
               ('user_2', 'Trần Thị B', 'b@test.com', '0901234568', '123', '3')");

    $reviews = [
        [
            'id' => 'dg_' . uniqid(),
            'id_san_pham' => $products[0],
            'id_nguoi_dung' => 'user_1',
            'id_don_hang' => null,
            'so_sao' => 5,
            'noi_dung' => 'Vòng đẹp, màu ngọc sáng nhẹ nhàng, đóng gói cực kỳ cẩn thận. Mình mua làm quà tặng mẹ, mẹ mình rất ưng ý. Sẽ ủng hộ shop thêm nhiều lần nữa!',
            'hinh_anh' => '',
            'trang_thai' => 0, // cho_duyet
            'ngay_tao' => date('Y-m-d H:i:s', strtotime('-2 hours')),
            'phan_hoi_noi_dung' => null,
            'phan_hoi_ngay' => null,
            'phan_hoi_boi' => null
        ],
        [
            'id' => 'dg_' . uniqid(),
            'id_san_pham' => $products[1] ?? $products[0],
            'id_nguoi_dung' => 'user_2',
            'id_don_hang' => null,
            'so_sao' => 2,
            'noi_dung' => 'Màu đá hơi tối so với ảnh trên web. Mình tay nhỏ đeo dây này cảm giác hơi lỏng lẻo, shop có nhận đổi size dây không ạ?',
            'hinh_anh' => '',
            'trang_thai' => 1, // da_duyet
            'ngay_tao' => date('Y-m-d H:i:s', strtotime('-1 days')),
            'phan_hoi_noi_dung' => 'Chào bạn, Chuỗi Ngọc xin ghi nhận phản hồi của bạn. Các mẫu Obsidian tự nhiên sẽ có tông đen đặc trưng. Về phần dây rộng, nhân viên CSKH sẽ liên hệ qua SĐT để hỗ trợ bạn đổi size miễn phí nhé ạ!',
            'phan_hoi_ngay' => date('Y-m-d H:i:s', strtotime('-20 hours')),
            'phan_hoi_boi' => 'admin_id_here'
        ],
        [
            'id' => 'dg_' . uniqid(),
            'id_san_pham' => $products[2] ?? $products[0],
            'id_nguoi_dung' => 'user_1',
            'id_don_hang' => null,
            'so_sao' => 4,
            'noi_dung' => 'Sản phẩm khá tốt, đáng tiền.',
            'hinh_anh' => '',
            'trang_thai' => 2, // da_an
            'ngay_tao' => date('Y-m-d H:i:s', strtotime('-3 days')),
            'phan_hoi_noi_dung' => null,
            'phan_hoi_ngay' => null,
            'phan_hoi_boi' => null
        ]
    ];

    $stmt = $db->prepare("INSERT INTO danh_gia (id, id_san_pham, id_nguoi_dung, id_don_hang, so_sao, noi_dung, hinh_anh, trang_thai, ngay_tao, phan_hoi_noi_dung, phan_hoi_ngay, phan_hoi_boi) 
                          VALUES (:id, :id_san_pham, :id_nguoi_dung, :id_don_hang, :so_sao, :noi_dung, :hinh_anh, :trang_thai, :ngay_tao, :phan_hoi_noi_dung, :phan_hoi_ngay, :phan_hoi_boi)");
    
    foreach ($reviews as $review) {
        $stmt->execute($review);
    }

    echo "Seed data for danh_gia created successfully.\n";

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
