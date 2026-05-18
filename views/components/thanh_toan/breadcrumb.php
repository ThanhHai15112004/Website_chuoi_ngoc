<?php
/**
 * Component: Breadcrumb trang Thanh toán (dùng component chung)
 */
$breadcrumb_items = [
    ['ten' => 'Trang Chủ', 'url' => APP_URL . '/', 'icon' => 'ph:house-bold'],
    ['ten' => 'Giỏ Hàng', 'url' => APP_URL . '/gio-hang', 'icon' => 'ph:shopping-cart-bold'],
    ['ten' => 'Thanh Toán', 'url' => null, 'icon' => 'ph:credit-card-bold'],
];
require_once __DIR__ . '/../common/breadcrumb.php';
?>
