<?php
/**
 * Admin Web Routes
 */

$router->get('/admin', 'Admin\DashboardController@index');
$router->get('/admin/dashboard', 'Admin\DashboardController@index');
$router->get('/admin/dang-nhap', 'Admin\AuthController@login');
$router->get('/admin/san-pham', 'Admin\ProductController@index');
$router->get('/admin/san-pham/chi-tiet', 'Admin\ProductController@show');
$router->get('/admin/san-pham/them', 'Admin\ProductController@create');
$router->get('/admin/san-pham/sua', 'Admin\ProductController@edit');
$router->get('/admin/danh-muc', 'Admin\CategoryController@index');
$router->get('/admin/don-hang', 'Admin\OrderController@index');
$router->get('/admin/don-hang/chi-tiet/(\w+)', 'Admin\OrderController@show');
$router->get('/admin/voucher', 'Admin\VoucherController@index');
$router->get('/admin/voucher/them', 'Admin\VoucherController@create');
$router->get('/admin/voucher/sua', 'Admin\VoucherController@edit');
$router->get('/admin/khuyen-mai', 'Admin\PromotionController@index');
$router->get('/admin/khuyen-mai/them', 'Admin\PromotionController@create');
$router->get('/admin/khuyen-mai/sua', 'Admin\PromotionController@edit');
$router->get('/admin/loai-da', 'Admin\StoneController@index');
$router->get('/admin/loai-da/them', 'Admin\StoneController@create');
$router->get('/admin/loai-da/sua', 'Admin\StoneController@edit');
$router->get('/admin/menh-phong-thuy', 'Admin\DestinyController@index');
$router->get('/admin/menh-phong-thuy/sua', 'Admin\DestinyController@edit');
$router->get('/admin/binh-luan', 'Admin\ReviewController@index');
$router->get('/admin/khach-hang', 'Admin\CustomerController@index');
$router->get('/admin/khach-hang/them', 'Admin\CustomerController@create');
$router->get('/admin/khach-hang/chi-tiet/(\w+)', 'Admin\CustomerController@show');
$router->get('/admin/khach-hang/hang-thanh-vien', 'Admin\CustomerController@ranks');
$router->get('/admin/notification', 'Admin\NotificationController@index');
$router->get('/admin/notification/them', 'Admin\NotificationController@create');

$router->get('/admin/post', 'Admin\PostController@index');
$router->get('/admin/post/them', 'Admin\PostController@create');
$router->get('/admin/post/sua', 'Admin\PostController@edit');

$router->get('/admin/banner', 'Admin\BannerController@index');
$router->get('/admin/banner/them', 'Admin\BannerController@create');
$router->get('/admin/banner/sua', 'Admin\BannerController@edit');

// Catch-all route cho Admin (để tránh lỗi khi truy cập các route chưa code)
