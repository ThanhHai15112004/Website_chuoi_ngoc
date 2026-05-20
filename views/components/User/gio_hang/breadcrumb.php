<?php
/**
 * Component: Breadcrumb trang Giỏ hàng (dùng component chung)
 */
$breadcrumb_items = [
    ['ten' => 'Trang Chủ', 'url' => APP_URL . '/', 'icon' => 'ph:house-bold'],
    ['ten' => 'Giỏ Hàng', 'url' => null, 'icon' => 'ph:shopping-cart-bold'],
];
require_once __DIR__ . '/../../common/breadcrumb.php';
?>
