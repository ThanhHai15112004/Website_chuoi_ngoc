<?php
/**
 * User Web Routes
 */

$router->get('/', 'User\HomeController@index');
$router->get('/san-pham', 'User\SanPhamController@index');
$router->get('/chi-tiet-san-pham', 'User\SanPhamController@detail');
$router->get('/gio-hang', 'User\CartController@index');
$router->get('/thanh-toan', 'User\CheckoutController@index');
$router->get('/dat-hang-thanh-cong', 'User\CheckoutController@success');
$router->get('/vong-theo-menh', 'User\VongTheoMenhController@index');
$router->get('/khuyen-mai', 'User\KhuyenMaiController@index');
$router->get('/bai-viet', 'User\ArticleController@index');
$router->get('/chi-tiet-bai-viet', 'User\ArticleController@detail');
$router->get('/lien-he', 'User\ContactController@index');
$router->get('/chi-tiet-don-hang', 'User\DonHangController@detail');
$router->post('/chi-tiet-don-hang/huy', 'User\DonHangController@cancel');
$router->get('/tai-khoan', 'User\AccountController@index');

// Authentication Routes
$router->get('/dang-nhap', 'User\AuthController@index');
$router->post('/dang-nhap/xu-ly', 'User\AuthController@loginProcess');
$router->post('/dang-ky/xu-ly', 'User\AuthController@registerProcess');
$router->get('/dang-xuat', 'User\AuthController@logout');

