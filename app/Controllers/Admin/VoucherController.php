<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class VoucherController extends Controller {
    public function index() {
        // Mock data for Admin Voucher Management
        $data = [
            'tieu_de' => 'Quản lý voucher - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'voucher',
            'thong_ke' => [
                'tong_voucher' => 48,
                'dang_hoat_dong' => 12,
                'sap_het_han' => 5,
                'het_han' => 18,
                'da_dung' => 326,
                'tong_giam_gia' => 18500000,
            ],
            'voucher_list' => [
                [
                    'ma_voucher' => 'GIAM50K',
                    'ten_chuong_trinh' => 'Giảm 50K cho đơn từ 500K',
                    'mo_ta' => 'Áp dụng cho vòng ngọc và chuỗi đá phong thủy.',
                    'loai_giam' => 'Giảm số tiền',
                    'gia_tri_giam' => '50.000đ',
                    'dieu_kien' => 'Đơn từ 500.000đ',
                    'doi_tuong' => ['Tất cả khách hàng'],
                    'ngay_bat_dau' => '01/05/2026',
                    'ngay_ket_thuc' => '31/05/2026',
                    'trang_thai_thoi_gian' => 'Còn 11 ngày',
                    'da_dung' => 32,
                    'tong_luot' => 100,
                    'trang_thai' => 'Đang hoạt động',
                    'ngay_tao' => '01/05/2026',
                    'ngay_cap_nhat' => '10/05/2026'
                ],
                [
                    'ma_voucher' => 'FREESHIP',
                    'ten_chuong_trinh' => 'Freeship tháng 5',
                    'mo_ta' => 'Miễn phí vận chuyển cho đơn từ 300K.',
                    'loai_giam' => 'Freeship',
                    'gia_tri_giam' => 'Miễn phí vận chuyển',
                    'dieu_kien' => 'Đơn từ 300.000đ',
                    'doi_tuong' => ['Khách hàng mới'],
                    'ngay_bat_dau' => '01/05/2026',
                    'ngay_ket_thuc' => '31/05/2026',
                    'trang_thai_thoi_gian' => 'Còn 11 ngày',
                    'da_dung' => 150,
                    'tong_luot' => -1, // Không giới hạn
                    'trang_thai' => 'Đang hoạt động',
                    'ngay_tao' => '25/04/2026',
                    'ngay_cap_nhat' => '25/04/2026'
                ],
                [
                    'ma_voucher' => 'NEW10',
                    'ten_chuong_trinh' => 'Ưu đãi khách hàng mới',
                    'mo_ta' => 'Giảm 10% tối đa 100K.',
                    'loai_giam' => 'Giảm phần trăm',
                    'gia_tri_giam' => '10%',
                    'giam_toi_da' => 'Tối đa 100.000đ',
                    'dieu_kien' => 'Không yêu cầu',
                    'doi_tuong' => ['Khách hàng mới'],
                    'ngay_bat_dau' => '10/05/2026',
                    'ngay_ket_thuc' => '20/05/2026',
                    'trang_thai_thoi_gian' => 'Hết hạn sau 12 giờ',
                    'da_dung' => 88,
                    'tong_luot' => 100,
                    'trang_thai' => 'Sắp hết hạn',
                    'ngay_tao' => '08/05/2026',
                    'ngay_cap_nhat' => '08/05/2026'
                ],
                [
                    'ma_voucher' => 'GOLD5',
                    'ten_chuong_trinh' => 'Giảm thêm cho thành viên Gold',
                    'mo_ta' => 'Chỉ áp dụng cho hạng thành viên Gold.',
                    'loai_giam' => 'Ưu đãi thành viên',
                    'gia_tri_giam' => '5%',
                    'giam_toi_da' => 'Không giới hạn',
                    'dieu_kien' => 'Đơn từ 1.000.000đ',
                    'doi_tuong' => ['Gold', 'Diamond'],
                    'ngay_bat_dau' => '01/01/2026',
                    'ngay_ket_thuc' => '31/12/2026',
                    'trang_thai_thoi_gian' => 'Còn 225 ngày',
                    'da_dung' => 45,
                    'tong_luot' => -1,
                    'trang_thai' => 'Đang hoạt động',
                    'ngay_tao' => '01/01/2026',
                    'ngay_cap_nhat' => '01/01/2026'
                ],
                [
                    'ma_voucher' => 'QUATANG1',
                    'ten_chuong_trinh' => 'Tặng hộp quà gỗ',
                    'mo_ta' => 'Tặng hộp quà gỗ sồi cao cấp cho đơn hàng lớn.',
                    'loai_giam' => 'Quà tặng',
                    'gia_tri_giam' => 'Tặng hộp quà',
                    'dieu_kien' => 'Đơn từ 2.000.000đ',
                    'doi_tuong' => ['Tất cả khách hàng'],
                    'ngay_bat_dau' => '25/05/2026',
                    'ngay_ket_thuc' => '05/06/2026',
                    'trang_thai_thoi_gian' => 'Bắt đầu sau 5 ngày',
                    'da_dung' => 0,
                    'tong_luot' => 50,
                    'trang_thai' => 'Chưa bắt đầu',
                    'ngay_tao' => '19/05/2026',
                    'ngay_cap_nhat' => '19/05/2026'
                ],
                [
                    'ma_voucher' => 'TET2026',
                    'ten_chuong_trinh' => 'Lì xì đầu năm',
                    'mo_ta' => 'Mã giảm giá dịp Tết Nguyên Đán.',
                    'loai_giam' => 'Giảm số tiền',
                    'gia_tri_giam' => '100.000đ',
                    'dieu_kien' => 'Đơn từ 800.000đ',
                    'doi_tuong' => ['Tất cả khách hàng'],
                    'ngay_bat_dau' => '01/02/2026',
                    'ngay_ket_thuc' => '28/02/2026',
                    'trang_thai_thoi_gian' => 'Đã qua 81 ngày',
                    'da_dung' => 500,
                    'tong_luot' => 500,
                    'trang_thai' => 'Hết lượt dùng', // Cả hết hạn và hết lượt
                    'ngay_tao' => '15/01/2026',
                    'ngay_cap_nhat' => '28/02/2026'
                ],
                [
                    'ma_voucher' => 'THANG3',
                    'ten_chuong_trinh' => 'Khuyến mãi tháng 3',
                    'mo_ta' => 'Dành cho ngày 8/3.',
                    'loai_giam' => 'Giảm phần trăm',
                    'gia_tri_giam' => '8%',
                    'giam_toi_da' => 'Tối đa 83.000đ',
                    'dieu_kien' => 'Không yêu cầu',
                    'doi_tuong' => ['Tất cả khách hàng'],
                    'ngay_bat_dau' => '01/03/2026',
                    'ngay_ket_thuc' => '10/03/2026',
                    'trang_thai_thoi_gian' => 'Đã qua 71 ngày',
                    'da_dung' => 120,
                    'tong_luot' => -1,
                    'trang_thai' => 'Hết hạn',
                    'ngay_tao' => '25/02/2026',
                    'ngay_cap_nhat' => '25/02/2026'
                ],
                [
                    'ma_voucher' => 'FLASH50',
                    'ten_chuong_trinh' => 'Flash sale giảm 50%',
                    'mo_ta' => 'Chương trình đã bị tạm dừng do lỗi hệ thống.',
                    'loai_giam' => 'Giảm phần trăm',
                    'gia_tri_giam' => '50%',
                    'giam_toi_da' => 'Tối đa 500.000đ',
                    'dieu_kien' => 'Không yêu cầu',
                    'doi_tuong' => ['Tất cả khách hàng'],
                    'ngay_bat_dau' => '15/05/2026',
                    'ngay_ket_thuc' => '16/05/2026',
                    'trang_thai_thoi_gian' => 'Đã tắt',
                    'da_dung' => 5,
                    'tong_luot' => 10,
                    'trang_thai' => 'Đã tắt',
                    'ngay_tao' => '14/05/2026',
                    'ngay_cap_nhat' => '15/05/2026'
                ]
            ]
        ];

        $this->view('admin_voucher', $data, 'admin');
    }

    public function create() {
        $data = [
            'tieu_de' => 'Thêm voucher mới - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'voucher',
            'is_edit' => false,
        ];
        $this->view('admin_voucher_form', $data, 'admin');
    }

    public function edit() {
        $data = [
            'tieu_de' => 'Chỉnh sửa voucher - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'voucher',
            'is_edit' => true,
        ];
        $this->view('admin_voucher_form', $data, 'admin');
    }
}
