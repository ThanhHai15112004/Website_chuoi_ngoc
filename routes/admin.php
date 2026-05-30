<?php
/**
 * Admin Web Routes
 */

$router->get('/admin', 'Admin\DashboardController@index');
$router->get('/admin/dashboard', 'Admin\DashboardController@index');
$router->get('/admin/dang-nhap', 'Admin\AuthController@login');
$router->get('/admin/san-pham', 'Admin\SanPhamController@index');
$router->get('/admin/san-pham/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\SanPhamController@chiTiet');
$router->get('/admin/san-pham/them', 'Admin\SanPhamController@taoMoi');
$router->post('/admin/san-pham/them', 'Admin\SanPhamController@luuMoi');
$router->get('/admin/san-pham/sua/([a-zA-Z0-9_-]+)', 'Admin\SanPhamController@trangCapNhat');
$router->post('/admin/san-pham/sua/([a-zA-Z0-9_-]+)', 'Admin\SanPhamController@capNhat');
$router->post('/admin/san-pham/an-hien/([a-zA-Z0-9_-]+)', 'Admin\SanPhamController@doiTrangThai');
$router->post('/admin/san-pham/xoa/([a-zA-Z0-9_-]+)', 'Admin\SanPhamController@xoa');
$router->post('/admin/san-pham/nhan-ban/([a-zA-Z0-9_-]+)', 'Admin\SanPhamController@duplicate');

$router->get('/admin/danh-muc', 'Admin\DanhMucController@index');
$router->post('/admin/danh-muc/luu', 'Admin\DanhMucController@luuMoi');
$router->post('/admin/danh-muc/xoa/([a-zA-Z0-9_-]+)', 'Admin\DanhMucController@xoa');
$router->post('/admin/danh-muc/an-hien/([a-zA-Z0-9_-]+)', 'Admin\DanhMucController@doiTrangThai');

$router->get('/admin/don-hang', 'Admin\DonHangController@index');
$router->get('/admin/don-hang/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\DonHangController@chiTiet');
$router->get('/admin/voucher', 'Admin\VoucherController@index');
$router->get('/admin/voucher/them', 'Admin\VoucherController@taoMoi');
$router->get('/admin/voucher/sua', 'Admin\VoucherController@trangCapNhat');
$router->get('/admin/khuyen-mai', 'Admin\KhuyenMaiController@index');
$router->get('/admin/khuyen-mai/them', 'Admin\KhuyenMaiController@taoMoi');
$router->get('/admin/khuyen-mai/sua', 'Admin\KhuyenMaiController@trangCapNhat');
$router->get('/admin/loai-da', 'Admin\LoaiDaController@index');
$router->post('/admin/loai-da/luu', 'Admin\LoaiDaController@luuMoi');
$router->post('/admin/loai-da/xoa/([a-zA-Z0-9_-]+)', 'Admin\LoaiDaController@xoa');
$router->post('/admin/loai-da/an-hien/([a-zA-Z0-9_-]+)', 'Admin\LoaiDaController@doiTrangThai');
$router->get('/admin/loai-da/them', 'Admin\LoaiDaController@taoMoi');
$router->get('/admin/loai-da/sua/([a-zA-Z0-9_-]+)', 'Admin\LoaiDaController@trangCapNhat');
$router->get('/admin/loai-da/api/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\LoaiDaController@apiDetail');
$router->get('/admin/menh-phong-thuy', 'Admin\MenhPhongThuyController@index');
$router->get('/admin/menh-phong-thuy/api/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\MenhPhongThuyController@apiDetail');
$router->post('/admin/menh-phong-thuy/an-hien/([a-zA-Z0-9_-]+)', 'Admin\MenhPhongThuyController@doiTrangThai');
$router->get('/admin/menh-phong-thuy/sua/([a-zA-Z0-9_-]+)', 'Admin\MenhPhongThuyController@trangCapNhat');
$router->post('/admin/menh-phong-thuy/sua/([a-zA-Z0-9_-]+)', 'Admin\MenhPhongThuyController@luuMoi');
$router->get('/admin/binh-luan', 'Admin\BinhLuanController@index');
$router->get('/admin/binh-luan/detail', 'Admin\BinhLuanController@detail');
$router->post('/admin/binh-luan/toggle-status', 'Admin\BinhLuanController@doiTrangThai');
$router->post('/admin/binh-luan/reply', 'Admin\BinhLuanController@reply');
$router->post('/admin/binh-luan/delete', 'Admin\BinhLuanController@xoa');
$router->post('/admin/binh-luan/save-settings', 'Admin\BinhLuanController@saveSettings');

$router->get('/admin/khach-hang', 'Admin\KhachHangController@index');
$router->get('/admin/khach-hang/them', 'Admin\KhachHangController@taoMoi');
$router->post('/admin/khach-hang/luu', 'Admin\KhachHangController@luuMoi');
$router->get('/admin/khach-hang/sua/([a-zA-Z0-9_-]+)', 'Admin\KhachHangController@trangCapNhat');
$router->post('/admin/khach-hang/cap-nhat/([a-zA-Z0-9_-]+)', 'Admin\KhachHangController@updateCustomer');
$router->get('/admin/khach-hang/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\KhachHangController@chiTiet');
$router->get('/admin/khach-hang/hang-thanh-vien', 'Admin\KhachHangController@ranks');
$router->get('/admin/khach-hang/hang-thanh-vien/api/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\KhachHangController@apiDetailRank');
$router->post('/admin/khach-hang/hang-thanh-vien/luu', 'Admin\KhachHangController@storeRank');
$router->post('/admin/khach-hang/hang-thanh-vien/gan-voucher', 'Admin\KhachHangController@assignVouchersRank');
$router->post('/admin/khach-hang/hang-thanh-vien/xoa/([a-zA-Z0-9_-]+)', 'Admin\KhachHangController@deleteRank');
$router->post('/admin/khach-hang/hang-thanh-vien/an-hien/([a-zA-Z0-9_-]+)', 'Admin\KhachHangController@toggleRankStatus');

$router->post('/admin/khach-hang/bulk-notify', 'Admin\KhachHangController@bulkNotify');
$router->post('/admin/khach-hang/bulk-lock', 'Admin\KhachHangController@bulkLock');
$router->post('/admin/khach-hang/bulk-delete', 'Admin\KhachHangController@bulkDelete');
$router->post('/admin/khach-hang/bulk-voucher', 'Admin\KhachHangController@bulkAssignVoucher');
$router->post('/admin/khach-hang/reset-password', 'Admin\KhachHangController@resetPassword');
$router->post('/admin/khach-hang/adjust-points', 'Admin\KhachHangController@adjustPoints');
$router->post('/admin/khach-hang/save-config', 'Admin\KhachHangController@saveConfig');
$router->post('/admin/khach-hang/update-rank', 'Admin\KhachHangController@updateRank');
$router->post('/admin/khach-hang/send-notification', 'Admin\KhachHangController@sendNotification');
$router->get('/admin/notification', 'Admin\ThongBaoController@index');
$router->get('/admin/notification/them', 'Admin\ThongBaoController@taoMoi');
$router->post('/admin/notification/luu', 'Admin\ThongBaoController@luuMoi');
$router->post('/admin/notification/read', 'Admin\ThongBaoController@markAsRead');
$router->post('/admin/notification/delete', 'Admin\ThongBaoController@xoa');
$router->post('/admin/notification/read-all', 'Admin\ThongBaoController@markAllAsRead');

$router->get('/admin/post', 'Admin\BaiVietController@index');
$router->get('/admin/post/them', 'Admin\BaiVietController@taoMoi');
$router->get('/admin/post/sua', 'Admin\BaiVietController@trangCapNhat');

$router->get('/admin/banner', 'Admin\BannerController@index');
$router->get('/admin/banner/them', 'Admin\BannerController@taoMoi');
$router->get('/admin/banner/sua', 'Admin\BannerController@trangCapNhat');

$router->get('/admin/bao-cao-doanh-thu', 'Admin\BaoCaoDoanhThuController@index');
$router->get('/admin/bao-cao-san-pham', 'Admin\BaoCaoSanPhamController@index');
$router->post('/admin/ton-kho/dieu-chinh', 'Admin\TonKhoController@dieuChinh');
$router->get('/admin/ton-kho/api/search-variants', 'Admin\TonKhoController@apiSearchVariants');
$router->get('/admin/ton-kho/api/vi-tri/([a-zA-Z0-9_-]+)', 'Admin\TonKhoController@apiViTriCuaBienThe');
$router->get('/admin/cau-hinh-kho/api/vi-tri-hop-le', 'Admin\CauHinhKhoController@apiDanhSachViTriHople');
$router->post('/admin/ton-kho/dieu-chinh', 'Admin\TonKhoController@dieuChinh');
$router->get('/admin/nhap-kho', 'Admin\NhapKhoController@index');
$router->get('/admin/nhap-kho/them', 'Admin\NhapKhoController@taoMoi');
$router->post('/admin/nhap-kho/luu', 'Admin\NhapKhoController@luuMoi');
$router->get('/admin/nhap-kho/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\NhapKhoController@chiTiet');
$router->get('/admin/nhap-kho/sua/([a-zA-Z0-9_-]+)', 'Admin\NhapKhoController@trangCapNhat');
$router->get('/admin/nhap-kho/kiem-hang/([a-zA-Z0-9_-]+)', 'Admin\NhapKhoController@check');
$router->post('/admin/nhap-kho/kiem-hang/luu/([a-zA-Z0-9_-]+)', 'Admin\NhapKhoController@luuCheck');
$router->post('/admin/nhap-kho/duyet/([a-zA-Z0-9_-]+)', 'Admin\NhapKhoController@duyet');
$router->post('/admin/nhap-kho/huy/([a-zA-Z0-9_-]+)', 'Admin\NhapKhoController@huy');
$router->get('/admin/xuat-kho', 'Admin\XuatKhoController@index');
$router->get('/admin/xuat-kho/them', 'Admin\XuatKhoController@taoMoi');
$router->post('/admin/xuat-kho/luu', 'Admin\XuatKhoController@luuMoi');
$router->get('/admin/xuat-kho/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\XuatKhoController@chiTiet');
$router->post('/admin/xuat-kho/duyet/([a-zA-Z0-9_-]+)', 'Admin\XuatKhoController@duyet');
$router->post('/admin/xuat-kho/huy/([a-zA-Z0-9_-]+)', 'Admin\XuatKhoController@huy');
$router->get('/admin/xuat-kho/chuan-bi/([a-zA-Z0-9_-]+)', 'Admin\XuatKhoController@prepare');
$router->post('/admin/xuat-kho/chuan-bi/luu/([a-zA-Z0-9_-]+)', 'Admin\XuatKhoController@luuPrepare');
$router->get('/admin/thuyen-chuyen-kho', 'Admin\ThuyenChuyenController@index');
$router->get('/admin/thuyen-chuyen-kho/them', 'Admin\ThuyenChuyenController@taoMoi');
$router->get('/admin/thuyen-chuyen-kho/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\ThuyenChuyenController@chiTiet');
$router->get('/admin/kiem-ke', 'Admin\KiemKeController@index');
$router->get('/admin/kiem-ke/them', 'Admin\KiemKeController@taoMoi');
$router->get('/admin/kiem-ke/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\KiemKeController@chiTiet');
$router->get('/admin/nha-cung-cap', 'Admin\NhaCungCapController@index');
$router->get('/admin/nha-cung-cap/them', 'Admin\NhaCungCapController@taoMoi');
$router->post('/admin/nha-cung-cap/luu', 'Admin\NhaCungCapController@luuMoi');
$router->get('/admin/nha-cung-cap/sua/([a-zA-Z0-9_-]+)', 'Admin\NhaCungCapController@trangCapNhat');
$router->post('/admin/nha-cung-cap/cap-nhat/([a-zA-Z0-9_-]+)', 'Admin\NhaCungCapController@capNhat');
$router->get('/admin/nha-cung-cap/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\NhaCungCapController@chiTiet');
$router->post('/admin/nha-cung-cap/cap-nhat-trang-thai/([a-zA-Z0-9_-]+)', 'Admin\NhaCungCapController@capNhatTrangThai');

$router->get('/admin/cau-hinh-kho', 'Admin\CauHinhKhoController@index');
$router->get('/admin/cau-hinh-kho/them', 'Admin\CauHinhKhoController@taoMoi');
$router->post('/admin/cau-hinh-kho/luu', 'Admin\CauHinhKhoController@luuMoi');
$router->get('/admin/cau-hinh-kho/sua/([a-zA-Z0-9_-]+)', 'Admin\CauHinhKhoController@trangCapNhat');
$router->post('/admin/cau-hinh-kho/cap-nhat/([a-zA-Z0-9_-]+)', 'Admin\CauHinhKhoController@capNhat');
$router->post('/admin/cau-hinh-kho/trang-thai/([a-zA-Z0-9_-]+)', 'Admin\CauHinhKhoController@doiTrangThai');
$router->post('/admin/cau-hinh-kho/mac-dinh/([a-zA-Z0-9_-]+)', 'Admin\CauHinhKhoController@datMacDinh');
$router->get('/admin/cau-hinh-kho/api/chi-tiet/([a-zA-Z0-9_-]+)', 'Admin\CauHinhKhoController@apiChiTiet');
$router->get('/admin/cau-hinh-kho/api/vi-tri/san-pham/([a-zA-Z0-9_-]+)', 'Admin\CauHinhKhoController@apiSanPhamTaiViTri');
$router->post('/admin/cau-hinh-kho/vi-tri/luu', 'Admin\CauHinhKhoController@luuViTri');
$router->post('/admin/cau-hinh-kho/vi-tri/xoa/([a-zA-Z0-9_-]+)', 'Admin\CauHinhKhoController@xoaViTri');
$router->post('/admin/cau-hinh-kho/cau-hinh/luu', 'Admin\CauHinhKhoController@luuCauHinh');
$router->get('/admin/cau-hinh-kho/api/phan-quyen', 'Admin\CauHinhKhoController@apiPhanQuyenKho');
$router->post('/admin/cau-hinh-kho/phan-quyen/luu', 'Admin\CauHinhKhoController@luuPhanQuyen');
$router->post('/admin/cau-hinh-kho/lich-kiem-ke/luu', 'Admin\CauHinhKhoController@luuLichKiemKe');
$router->post('/admin/cau-hinh-kho/lich-kiem-ke/xoa/([0-9]+)', 'Admin\CauHinhKhoController@xoaLichKiemKe');
$router->post('/admin/cau-hinh-kho/lich-kiem-ke/trang-thai/([0-9]+)', 'Admin\CauHinhKhoController@doiTrangThaiLich');

$router->get('/admin/quan-ly-cua-hang', 'Admin\QuanLyCuaHangController@index');
$router->get('/admin/cai-dat/thanh-toan', 'Admin\ThanhToanVanChuyenController@index');
$router->get('/admin/chinh-sach', 'Admin\ChinhSachController@index');
$router->get('/admin/chinh-sach/them', 'Admin\ChinhSachController@taoMoi');
$router->get('/admin/chinh-sach/sua/(\d+)', 'Admin\ChinhSachController@trangCapNhat');

$router->get('/admin/nhan-su', 'Admin\NhanSuController@index');
$router->get('/admin/nhan-su/them', 'Admin\NhanSuController@taoMoi');
$router->get('/admin/nhan-su/xem/(\d+)', 'Admin\NhanSuController@chiTiet');
$router->get('/admin/nhan-su/sua/(\d+)', 'Admin\NhanSuController@trangCapNhat');
$router->get('/admin/vai-tro', 'Admin\NhanSuController@roles');

$router->get('/admin/nhat-ky-hoat-dong', 'Admin\NhatKyHoatDongController@index');

$router->get('/admin/tai-khoan', 'Admin\TaiKhoanController@index');

// Catch-all route cho Admin (để tránh lỗi khi truy cập các route chưa code)
