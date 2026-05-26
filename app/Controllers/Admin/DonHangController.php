<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class DonHangController extends Controller
{
    public function index()
    {
        // Mock stats data
        $stats = [
            'tong_don' => 1248,
            'cho_xac_nhan' => 12,
            'dang_giao' => 28,
            'thanh_cong' => 965,
            'da_huy' => 32,
            'doanh_thu' => 185000000
        ];

        // Mock orders data
        $don_hang_list = [
            [
                'ma_don' => 'DH202600123',
                'khach_hang' => 'Nguyễn Văn An',
                'sdt' => '0901234567',
                'hinh_thuc_thanh_toan' => 'COD',
                'trang_thai_thanh_toan' => 'Chưa thanh toán',
                'van_chuyen' => 'Giao tiêu chuẩn',
                'ma_van_don' => '',
                'trang_thai' => 'Chờ xác nhận',
                'tong_tien' => 1360000,
                'ngay_dat' => '17/05/2026 20:35',
                'san_pham_chinh' => 'Vòng Ngọc Bích Tài Lộc',
                'so_luong_sp_khac' => 2,
                'tong_so_luong' => 3,
                'nhan_vien' => 'Chưa xử lý',
                'thoi_gian_xl' => '',
                'icon_mau' => 'bg-emerald-50 text-emerald-700',
                'icon_chu' => 'NB'
            ],
            [
                'ma_don' => 'DH202600122',
                'khach_hang' => 'Trần Thị Bích',
                'sdt' => '0987654321',
                'hinh_thuc_thanh_toan' => 'Chuyển khoản',
                'trang_thai_thanh_toan' => 'Đã thanh toán',
                'van_chuyen' => 'GHN',
                'ma_van_don' => 'GHN123456789',
                'trang_thai' => 'Xác nhận đơn hàng',
                'tong_tien' => 850000,
                'ngay_dat' => '17/05/2026 19:15',
                'san_pham_chinh' => 'Nhẫn Tỳ Hưu Mạ Vàng',
                'so_luong_sp_khac' => 0,
                'tong_so_luong' => 1,
                'nhan_vien' => 'Hải Admin',
                'thoi_gian_xl' => '19:30',
                'icon_mau' => 'bg-amber-50 text-amber-700',
                'icon_chu' => 'TH'
            ],
            [
                'ma_don' => 'DH202600121',
                'khach_hang' => 'Lê Hữu Đạt',
                'sdt' => '0912345678',
                'hinh_thuc_thanh_toan' => 'VNPay',
                'trang_thai_thanh_toan' => 'Đã thanh toán',
                'van_chuyen' => 'Viettel Post',
                'ma_van_don' => 'VTP987654321',
                'trang_thai' => 'Đang giao',
                'tong_tien' => 2450000,
                'ngay_dat' => '16/05/2026 14:20',
                'san_pham_chinh' => 'Chuỗi Trầm Hương Cao Cấp',
                'so_luong_sp_khac' => 1,
                'tong_so_luong' => 2,
                'nhan_vien' => 'Lan NV',
                'thoi_gian_xl' => '16/05 15:00',
                'icon_mau' => 'bg-blue-50 text-blue-700',
                'icon_chu' => 'TH'
            ],
            [
                'ma_don' => 'DH202600120',
                'khach_hang' => 'Phạm Hoàng Yến',
                'sdt' => '0934567890',
                'hinh_thuc_thanh_toan' => 'COD',
                'trang_thai_thanh_toan' => 'Thanh toán thất bại',
                'van_chuyen' => 'Giao hỏa tốc',
                'ma_van_don' => '',
                'trang_thai' => 'Đã hủy',
                'tong_tien' => 550000,
                'ngay_dat' => '15/05/2026 09:10',
                'san_pham_chinh' => 'Hồ Ly Thạch Anh Hồng',
                'so_luong_sp_khac' => 0,
                'tong_so_luong' => 1,
                'nhan_vien' => 'Hải Admin',
                'thoi_gian_xl' => '15/05 10:20',
                'icon_mau' => 'bg-pink-50 text-pink-700',
                'icon_chu' => 'HL'
            ],
            [
                'ma_don' => 'DH202600119',
                'khach_hang' => 'Vũ Đình Trọng',
                'sdt' => '0971234567',
                'hinh_thuc_thanh_toan' => 'Chuyển khoản',
                'trang_thai_thanh_toan' => 'Đã thanh toán',
                'van_chuyen' => 'AhaMove',
                'ma_van_don' => 'AHA123',
                'trang_thai' => 'Đã giao',
                'tong_tien' => 3200000,
                'ngay_dat' => '14/05/2026 11:45',
                'san_pham_chinh' => 'Tượng Di Lặc Cẩm Thạch',
                'so_luong_sp_khac' => 3,
                'tong_so_luong' => 4,
                'nhan_vien' => 'Hải Admin',
                'thoi_gian_xl' => '14/05 16:30',
                'icon_mau' => 'bg-green-50 text-green-700',
                'icon_chu' => 'DL'
            ],
            [
                'ma_don' => 'DH202600118',
                'khach_hang' => 'Đỗ Thị Lan',
                'sdt' => '0969876543',
                'hinh_thuc_thanh_toan' => 'COD',
                'trang_thai_thanh_toan' => 'Đã thanh toán',
                'van_chuyen' => 'GHN',
                'ma_van_don' => 'GHN112233',
                'trang_thai' => 'Thành công',
                'tong_tien' => 1800000,
                'ngay_dat' => '10/05/2026 08:30',
                'san_pham_chinh' => 'Vòng Mắt Hổ Thái Dương',
                'so_luong_sp_khac' => 1,
                'tong_so_luong' => 2,
                'nhan_vien' => 'Lan NV',
                'thoi_gian_xl' => '12/05 14:00',
                'icon_mau' => 'bg-yellow-50 text-yellow-700',
                'icon_chu' => 'MH'
            ]
        ];

        $data = [
            'tieu_de' => 'Quản lý đơn hàng - Admin',
            'current_page' => 'don_hang',
            'stats' => $stats,
            'don_hang_list' => $don_hang_list
        ];

        $this->view('admin_don_hang', $data, 'admin');
    }

    public function show($id)
    {
        // Mock data cho chi tiết đơn hàng
        $don_hang = [
            'ma_don' => $id,
            'ngay_dat' => '17/05/2026, 20:35',
            'nguon_don' => 'Website',
            'nhan_vien' => 'Hải Admin',
            'trang_thai' => 'Chờ xác nhận',
            'thoi_gian_cap_nhat' => '18/05/2026, 09:30',
            'khach_hang' => [
                'ho_ten' => 'Nguyễn Văn An',
                'sdt' => '0901234567',
                'email' => 'nguyenvana@gmail.com',
                'hang_thanh_vien' => 'Gold',
                'tong_don' => 12,
                'tong_chi_tieu' => 3500000,
                'trang_thai_tk' => 'Hoạt động'
            ],
            'giao_hang' => [
                'nguoi_nhan' => 'Nguyễn Văn An',
                'sdt_nhan' => '0901234567',
                'dia_chi' => '123 Nguyễn Trãi, Phường 2, Quận 5, TP.HCM',
                'phuong_thuc' => 'Giao hàng tiêu chuẩn',
                'don_vi' => 'Chưa có',
                'ma_van_don' => '',
                'ghi_chu' => 'Gói quà giúp mình, gọi trước khi giao hàng.'
            ],
            'thanh_toan' => [
                'phuong_thuc' => 'Thanh toán khi nhận hàng (COD)',
                'trang_thai' => 'Chưa thanh toán',
                'so_tien_thu' => 1360000
            ],
            'chi_tiet_tien' => [
                'tam_tinh' => 1530000,
                'giam_gia' => -170000,
                'phi_van_chuyen' => 30000,
                'goi_qua' => 20000,
                'voucher' => [
                    'ma' => 'GIAM50K',
                    'tien_giam' => -50000,
                    'mo_ta' => 'Giảm 50.000đ cho đơn từ 500.000đ'
                ],
                'tong_thanh_toan' => 1360000
            ],
            'san_pham' => [
                [
                    'anh' => 'NB',
                    'mau_anh' => 'bg-emerald-50 text-emerald-700',
                    'ten' => 'Vòng Ngọc Bích Tài Lộc',
                    'ma_sp' => 'NB-TL-001',
                    'bien_the' => 'Size: 16cm · Hạt: 8mm',
                    'don_gia' => 850000,
                    'so_luong' => 1,
                    'thanh_tien' => 850000,
                    'ton_kho' => 12
                ],
                [
                    'anh' => 'TH',
                    'mau_anh' => 'bg-amber-50 text-amber-700',
                    'ten' => 'Nhẫn Tỳ Hưu Mạ Vàng',
                    'ma_sp' => 'TH-MV-002',
                    'bien_the' => 'Size: 10',
                    'don_gia' => 450000,
                    'so_luong' => 1,
                    'thanh_tien' => 450000,
                    'ton_kho' => 3
                ],
                [
                    'anh' => 'VQ',
                    'mau_anh' => 'bg-red-50 text-red-700',
                    'ten' => 'Hộp Quà Cao Cấp',
                    'ma_sp' => 'HQ-001',
                    'bien_the' => 'Màu: Đỏ thẳm',
                    'don_gia' => 230000,
                    'so_luong' => 1,
                    'thanh_tien' => 230000,
                    'ton_kho' => 50
                ]
            ],
            'dich_vu_them' => [
                'Gói quà sang trọng' => '20.000đ',
                'Viết thiệp chúc mừng' => 'Miễn phí',
                'Nội dung thiệp' => 'Chúc mẹ luôn bình an và hạnh phúc.'
            ],
            'lich_su' => [
                [
                    'thoi_gian' => '17/05/2026, 20:35',
                    'noi_dung' => 'Hệ thống tạo đơn hàng.',
                    'nhan_vien' => 'Hệ thống'
                ]
            ],
            'ghi_chu_noi_bo' => [
                [
                    'thoi_gian' => '18/05/2026, 09:30',
                    'noi_dung' => 'Khách yêu cầu gọi trước khi giao. Kiểm tra kỹ size vòng 16cm.',
                    'nhan_vien' => 'Hải Admin'
                ]
            ]
        ];

        $data = [
            'tieu_de' => 'Chi tiết đơn hàng ' . $id . ' - Admin',
            'current_page' => 'don_hang',
            'don_hang' => $don_hang
        ];

        $this->view('admin_don_hang_chi_tiet', $data, 'admin');
    }
}
