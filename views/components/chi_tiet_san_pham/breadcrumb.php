<?php
/**
 * Component: Breadcrumb chi tiết sản phẩm (dùng component chung)
 */
$breadcrumb_items = [
    ['ten' => 'Trang Chủ', 'url' => APP_URL . '/', 'icon' => 'ph:house-bold'],
    ['ten' => 'Sản Phẩm', 'url' => APP_URL . '/san-pham', 'icon' => 'ph:shopping-bag-bold'],
    ['ten' => htmlspecialchars($san_pham['danh_muc'] ?? 'Danh mục'), 'url' => APP_URL . '/san-pham?danh_muc=' . urlencode($san_pham['danh_muc'] ?? ''), 'icon' => 'ph:tag-bold'],
    ['ten' => htmlspecialchars($san_pham['ten'] ?? 'Chi tiết'), 'url' => null, 'icon' => 'ph:gem-bold'],
];
require_once __DIR__ . '/../common/breadcrumb.php';
?>
