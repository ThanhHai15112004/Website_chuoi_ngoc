<?php
/**
 * User Web Routes
 */

$router->get('/', 'User\TrangChuController@index');
$router->get('/san-pham', 'User\SanPhamController@index');
$router->get('/chi-tiet-san-pham', 'User\SanPhamController@detail');
$router->get('/gio-hang', 'User\GioHangController@index');
$router->post('/gio-hang/them', 'User\GioHangController@add');
$router->post('/gio-hang/cap-nhat', 'User\GioHangController@update');
$router->post('/gio-hang/xoa', 'User\GioHangController@remove');
$router->get('/gio-hang/count', 'User\GioHangController@count');
$router->post('/gio-hang/variants', 'User\GioHangController@variants');
$router->post('/gio-hang/ap-voucher', 'User\GioHangController@applyVoucher');
$router->post('/gio-hang/xoa-voucher', 'User\GioHangController@removeVoucher');
$router->get('/gio-hang/vouchers', 'User\GioHangController@getVouchersForCart');
$router->get('/thanh-toan', 'User\ThanhToanController@index');
$router->post('/thanh-toan/dat-hang', 'User\ThanhToanController@placeOrder');
$router->get('/dat-hang-thanh-cong', 'User\ThanhToanController@success');
$router->get('/vong-theo-menh', 'User\VongTheoMenhController@index');
$router->post('/vong-theo-menh/phan-tich', 'User\VongTheoMenhController@analyze');
$router->get('/vong-theo-menh/ket-qua/([a-zA-Z0-9\-]+)', 'User\VongTheoMenhController@ketQua');


$router->get('/khuyen-mai', 'User\KhuyenMaiController@index');
$router->post('/khuyen-mai/luu-voucher', 'User\KhuyenMaiController@saveVoucher');
$router->get('/bai-viet', 'User\BaiVietController@index');
$router->get('/chi-tiet-bai-viet', 'User\BaiVietController@detail');
$router->post('/chi-tiet-bai-viet/binh-luan', 'User\BaiVietController@submitComment');
$router->get('/lien-he', 'User\LienHeController@index');
$router->post('/lien-he/gui', 'User\LienHeController@submit');
$router->get('/chi-tiet-don-hang', 'User\DonHangController@detail');
$router->post('/chi-tiet-don-hang/huy', 'User\DonHangController@cancel');
$router->get('/tai-khoan', 'User\TaiKhoanController@index');
$router->post('/tai-khoan/cap-nhat-ho-so', 'User\TaiKhoanController@updateProfile');
$router->post('/tai-khoan/doi-mat-khau', 'User\TaiKhoanController@changePassword');
$router->post('/tai-khoan/doc-thong-bao', 'User\TaiKhoanController@markNotificationRead');
$router->post('/tai-khoan/xoa-thong-bao', 'User\TaiKhoanController@deleteNotification');

// Authentication Routes
$router->get('/dang-nhap', 'User\XacThucController@index');
$router->post('/dang-nhap/xu-ly', 'User\XacThucController@loginProcess');
$router->post('/dang-ky/xu-ly', 'User\XacThucController@registerProcess');
$router->post('/dang-ky/verify-otp', 'User\XacThucController@verifyRegisterOtp');
$router->post('/quen-mat-khau/send-otp', 'User\XacThucController@forgotSendOtp');
$router->post('/quen-mat-khau/verify-otp', 'User\XacThucController@forgotVerifyOtp');
$router->post('/otp/resend', 'User\XacThucController@resendOtp');
$router->get('/dang-xuat', 'User\XacThucController@logout');


// Address Routes (API)
$router->get('/api/dia-chi/danh-sach', 'User\DiaChiController@getList');
$router->post('/api/dia-chi/them', 'User\DiaChiController@add');
$router->post('/api/dia-chi/sua', 'User\DiaChiController@update');
$router->post('/api/dia-chi/xoa', 'User\DiaChiController@delete');
$router->post('/api/dia-chi/mac-dinh', 'User\DiaChiController@setDefault');

// Wishlist Routes (API)
$router->post('/api/yeu-thich/toggle', 'User\YeuThichController@toggle');
$router->get('/api/yeu-thich/ids', 'User\YeuThichController@getIds');

// Search Route (API)
$router->get('/api/san-pham/tim-kiem', 'User\SanPhamController@searchSuggest');

// Review Routes (API)
$router->post('/api/danh-gia/submit', 'User\DanhGiaController@submit');
$router->get('/api/danh-gia/danh-sach', 'User\DanhGiaController@getList');
