<?php
/**
 * User Web Routes
 */

$router->get('/', 'User\HomeController@index');
$router->get('/san-pham', 'User\ProductController@index');
$router->get('/chi-tiet-san-pham', 'User\ProductController@detail');
$router->get('/gio-hang', 'User\CartController@index');
$router->get('/thanh-toan', 'User\CheckoutController@index');
$router->get('/dat-hang-thanh-cong', 'User\CheckoutController@success');
$router->get('/vong-theo-menh', 'User\VongTheoMenhController@index');
$router->get('/khuyen-mai', 'User\KhuyenMaiController@index');
$router->get('/bai-viet', 'User\ArticleController@index');
