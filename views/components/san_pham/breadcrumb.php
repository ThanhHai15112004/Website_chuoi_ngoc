<?php
/**
 * Component: Breadcrumb trang Sản phẩm (dùng component chung)
 */
$breadcrumb_items = [
    ['ten' => 'Trang Chủ', 'url' => APP_URL . '/', 'icon' => 'ph:house-bold'],
    ['ten' => 'Sản Phẩm', 'url' => null, 'icon' => 'ph:shopping-bag-bold'],
];
require_once __DIR__ . '/../common/breadcrumb.php';
?>
