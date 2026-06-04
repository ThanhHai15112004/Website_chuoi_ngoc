<?php
/**
 * User Web Routes
 */

$router->get('/', 'User\HomeController@index');
$router->get('/san-pham', 'User\SanPhamController@index');
$router->get('/chi-tiet-san-pham', 'User\SanPhamController@detail');
$router->get('/gio-hang', 'User\CartController@index');
$router->post('/gio-hang/them', 'User\CartController@add');
$router->post('/gio-hang/cap-nhat', 'User\CartController@update');
$router->post('/gio-hang/xoa', 'User\CartController@remove');
$router->get('/gio-hang/count', 'User\CartController@count');
$router->post('/gio-hang/variants', 'User\CartController@variants');
$router->post('/gio-hang/ap-voucher', 'User\CartController@applyVoucher');
$router->post('/gio-hang/xoa-voucher', 'User\CartController@removeVoucher');
$router->get('/gio-hang/vouchers', 'User\CartController@getVouchersForCart');
$router->get('/thanh-toan', 'User\CheckoutController@index');
$router->post('/thanh-toan/dat-hang', 'User\CheckoutController@placeOrder');
$router->get('/dat-hang-thanh-cong', 'User\CheckoutController@success');
$router->get('/vong-theo-menh', 'User\VongTheoMenhController@index');
$router->post('/vong-theo-menh/phan-tich', 'User\VongTheoMenhController@analyze');
$router->get('/vong-theo-menh/ket-qua/([a-zA-Z0-9\-]+)', 'User\VongTheoMenhController@ketQua');


$router->get('/khuyen-mai', 'User\KhuyenMaiController@index');
$router->post('/khuyen-mai/luu-voucher', 'User\KhuyenMaiController@saveVoucher');
$router->get('/bai-viet', 'User\ArticleController@index');
$router->get('/chi-tiet-bai-viet', 'User\ArticleController@detail');
$router->post('/chi-tiet-bai-viet/binh-luan', 'User\ArticleController@submitComment');
$router->get('/lien-he', 'User\ContactController@index');
$router->post('/lien-he/gui', 'User\ContactController@submit');
$router->get('/chi-tiet-don-hang', 'User\DonHangController@detail');
$router->post('/chi-tiet-don-hang/huy', 'User\DonHangController@cancel');
$router->get('/tai-khoan', 'User\AccountController@index');
$router->post('/tai-khoan/cap-nhat-ho-so', 'User\AccountController@updateProfile');
$router->post('/tai-khoan/doi-mat-khau', 'User\AccountController@changePassword');
$router->post('/tai-khoan/doc-thong-bao', 'User\AccountController@markNotificationRead');
$router->post('/tai-khoan/xoa-thong-bao', 'User\AccountController@deleteNotification');

// Authentication Routes
$router->get('/dang-nhap', 'User\AuthController@index');
$router->post('/dang-nhap/xu-ly', 'User\AuthController@loginProcess');
$router->post('/dang-ky/xu-ly', 'User\AuthController@registerProcess');
$router->post('/dang-ky/verify-otp', 'User\AuthController@verifyRegisterOtp');
$router->post('/quen-mat-khau/send-otp', 'User\AuthController@forgotSendOtp');
$router->post('/quen-mat-khau/verify-otp', 'User\AuthController@forgotVerifyOtp');
$router->post('/otp/resend', 'User\AuthController@resendOtp');
$router->get('/dang-xuat', 'User\AuthController@logout');


// Address Routes (API)
$router->get('/api/dia-chi/danh-sach', 'User\AddressController@getList');
$router->post('/api/dia-chi/them', 'User\AddressController@add');
$router->post('/api/dia-chi/sua', 'User\AddressController@update');
$router->post('/api/dia-chi/xoa', 'User\AddressController@delete');
$router->post('/api/dia-chi/mac-dinh', 'User\AddressController@setDefault');

// Wishlist Routes (API)
$router->post('/api/yeu-thich/toggle', 'User\WishlistController@toggle');
$router->get('/api/yeu-thich/danh-sach', 'User\WishlistController@getIds');

// Search Routes (API)
$router->get('/api/san-pham/tim-kiem', 'User\SanPhamController@searchSuggest');

