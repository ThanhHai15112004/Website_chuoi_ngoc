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

// Catch-all route cho Admin (để tránh lỗi khi truy cập các route chưa code)
