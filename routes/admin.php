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
$router->get('/admin/don-hang/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\DonHangController@show');
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
$router->get('/admin/khach-hang/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\KhachHangController@show');
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
$router->get('/admin/bao-cao-san-pham', 'Admin\BaoCaoSanPhamController@index');
$router->get('/admin/ton-kho', 'Admin\TonKhoController@index');
$router->get('/admin/nhap-kho', 'Admin\NhapKhoController@index');
$router->get('/admin/nhap-kho/them', 'Admin\NhapKhoController@create');
$router->get('/admin/nhap-kho/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\NhapKhoController@show');
$router->get('/admin/xuat-kho', 'Admin\XuatKhoController@index');
$router->get('/admin/xuat-kho/them', 'Admin\XuatKhoController@create');
$router->get('/admin/xuat-kho/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\XuatKhoController@show');
$router->get('/admin/thuyen-chuyen-kho', 'Admin\ThuyenChuyenController@index');
$router->get('/admin/thuyen-chuyen-kho/them', 'Admin\ThuyenChuyenController@create');
$router->get('/admin/thuyen-chuyen-kho/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\ThuyenChuyenController@show');
$router->get('/admin/kiem-ke', 'Admin\KiemKeController@index');
$router->get('/admin/kiem-ke/them', 'Admin\KiemKeController@create');
$router->get('/admin/kiem-ke/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\KiemKeController@show');
$router->get('/admin/nha-cung-cap', 'Admin\NhaCungCapController@index');
$router->get('/admin/nha-cung-cap/them', 'Admin\NhaCungCapController@create');
$router->get('/admin/nha-cung-cap/sua/([a-zA-Z0-9_-]+)', 'Admin\NhaCungCapController@edit');
$router->get('/admin/nha-cung-cap/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\NhaCungCapController@show');
// Catch-all route cho Admin (để tránh lỗi khi truy cập các route chưa code)
