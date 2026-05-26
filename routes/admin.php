<?php
/**
 * Admin Web Routes
 */

$router->get('/admin', 'Admin\DashboardController@index');
$router->get('/admin/dashboard', 'Admin\DashboardController@index');
$router->get('/admin/dang-nhap', 'Admin\AuthController@login');
$router->get('/admin/san-pham', 'Admin\SanPhamController@index');
$router->get('/admin/san-pham/chi-tiet', 'Admin\SanPhamController@show');
$router->get('/admin/san-pham/them', 'Admin\SanPhamController@create');
$router->get('/admin/san-pham/sua', 'Admin\SanPhamController@edit');
$router->get('/admin/danh-muc', 'Admin\DanhMucController@index');
$router->get('/admin/don-hang', 'Admin\DonHangController@index');
$router->get('/admin/don-hang/chi-tiet/(\w+)', 'Admin\DonHangController@show');
$router->get('/admin/voucher', 'Admin\VoucherController@index');
$router->get('/admin/voucher/them', 'Admin\VoucherController@create');
$router->get('/admin/voucher/sua', 'Admin\VoucherController@edit');
$router->get('/admin/khuyen-mai', 'Admin\KhuyenMaiController@index');
$router->get('/admin/khuyen-mai/them', 'Admin\KhuyenMaiController@create');
$router->get('/admin/khuyen-mai/sua', 'Admin\KhuyenMaiController@edit');
$router->get('/admin/loai-da', 'Admin\LoaiDaController@index');
$router->get('/admin/loai-da/them', 'Admin\LoaiDaController@create');
$router->get('/admin/loai-da/sua', 'Admin\LoaiDaController@edit');
$router->get('/admin/menh-phong-thuy', 'Admin\MenhPhongThuyController@index');
$router->get('/admin/menh-phong-thuy/sua', 'Admin\MenhPhongThuyController@edit');
$router->get('/admin/binh-luan', 'Admin\BinhLuanController@index');
$router->get('/admin/khach-hang', 'Admin\KhachHangController@index');
$router->get('/admin/khach-hang/them', 'Admin\KhachHangController@create');
$router->get('/admin/khach-hang/chi-tiet/(\w+)', 'Admin\KhachHangController@show');
$router->get('/admin/khach-hang/hang-thanh-vien', 'Admin\KhachHangController@ranks');
$router->get('/admin/notification', 'Admin\ThongBaoController@index');
$router->get('/admin/notification/them', 'Admin\ThongBaoController@create');

$router->get('/admin/post', 'Admin\BaiVietController@index');
$router->get('/admin/post/them', 'Admin\BaiVietController@create');
$router->get('/admin/post/sua', 'Admin\BaiVietController@edit');

$router->get('/admin/banner', 'Admin\BannerController@index');
$router->get('/admin/banner/them', 'Admin\BannerController@create');
$router->get('/admin/banner/sua', 'Admin\BannerController@edit');

$router->get('/admin/bao-cao-doanh-thu', 'Admin\BaoCaoDoanhThuController@index');

// Catch-all route cho Admin (để tránh lỗi khi truy cập các route chưa code)
