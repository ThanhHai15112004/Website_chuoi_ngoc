<?php
// views/pages/vong_theo_menh.php

// Hero Banner
require_once __DIR__ . '/../components/User/vong_theo_menh/banner.php';

// Breadcrumb
$breadcrumb_items = [
    ['ten' => 'Trang Chủ', 'url' => APP_URL . '/', 'icon' => 'ph:house-bold'],
    ['ten' => 'Vòng Theo Mệnh', 'url' => null, 'icon' => 'ph:yin-yang-bold'],
];
require_once __DIR__ . '/../components/common/breadcrumb.php';

// Ý nghĩa Vòng theo mệnh
require_once __DIR__ . '/../components/User/vong_theo_menh/y_nghia.php';

// Quy trình tra cứu mệnh và gợi ý sản phẩm phù hợp
require_once __DIR__ . '/../components/User/vong_theo_menh/quy_trinh.php';

// Form tra cứu mệnh
require_once __DIR__ . '/../components/User/vong_theo_menh/form_tra_cuu.php';

// Kết quả tra cứu mệnh (Hiển thị qua AJAX/JS sau khi submit form)
require_once __DIR__ . '/../components/User/vong_theo_menh/ket_qua.php';

// Gợi ý sản phẩm dựa trên mệnh (Hiển thị qua AJAX/JS)
require_once __DIR__ . '/../components/User/vong_theo_menh/goi_y_san_pham.php';

// Bộ sưu tập Ngũ hành (Để người dùng tham khảo thêm)
require_once __DIR__ . '/../components/User/vong_theo_menh/bo_suu_tap_ngu_hanh.php';

// Câu hỏi thường gặp (FAQ)
require_once __DIR__ . '/../components/User/vong_theo_menh/faq.php';
?>


