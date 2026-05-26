<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class SanPhamController extends Controller {
    public function index() {
        // Mock data for Admin Product Management
        $data = [
            'tieu_de' => 'Quản lý sản phẩm - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'san_pham',
            'thong_ke' => [
                'tong_san_pham' => 256,
                'dang_hien_thi' => 220,
                'sap_het_hang' => 12,
                'het_hang' => 8,
                'dang_giam_gia' => 32,
                'dang_an' => 16,
            ],
            'danh_muc_list' => ['Tất cả danh mục', 'Vòng tay phong thủy', 'Chuỗi ngọc', 'Vòng đá tự nhiên', 'Vòng cao cấp', 'Quà tặng phong thủy', 'Sản phẩm khuyến mãi'],
            'loai_da_list' => ['Ngọc bích', 'Cẩm thạch', 'Thạch anh', 'Mã não', 'Đá mắt hổ', 'Obsidian', 'Ruby', 'Tourmaline'],
            'menh_list' => ['Kim', 'Mộc', 'Thủy', 'Hỏa', 'Thổ'],
            'san_pham_list' => [
                [
                    'ma_sp' => 'NB-TL-001',
                    'ten_sp' => 'Vòng Ngọc Bích Tài Lộc',
                    'mo_ta_ngan' => 'Hợp mệnh Mộc, Hỏa · Cầu tài lộc',
                    'anh' => 'https://ui-avatars.com/api/?name=Ngoc+Bich&background=E4D5C3&color=6B0D18',
                    'danh_muc' => 'Vòng tay phong thủy',
                    'loai_da' => 'Ngọc bích',
                    'menh' => ['Mộc', 'Hỏa'],
                    'gia_ban' => 850000,
                    'gia_khuyen_mai' => 680000,
                    'ton_kho' => 25,
                    'trang_thai_ton_kho' => 'Còn hàng',
                    'da_ban' => 128,
                    'trang_thai' => 'Đang hiển thị',
                    'nhan' => ['Bán chạy', 'Giảm giá'],
                    'ngay_cap_nhat' => '18/05/2026 09:30'
                ],
                [
                    'ma_sp' => 'CT-X-002',
                    'ten_sp' => 'Chuỗi Cẩm Thạch Xanh',
                    'mo_ta_ngan' => 'Hợp mệnh Mộc, Thủy · Bình an',
                    'anh' => 'https://ui-avatars.com/api/?name=Cam+Thach&background=f3f4f6&color=6B0D18',
                    'danh_muc' => 'Chuỗi ngọc',
                    'loai_da' => 'Cẩm thạch',
                    'menh' => ['Mộc', 'Thủy'],
                    'gia_ban' => 1250000,
                    'gia_khuyen_mai' => null,
                    'ton_kho' => 3,
                    'trang_thai_ton_kho' => 'Sắp hết',
                    'da_ban' => 45,
                    'trang_thai' => 'Đang hiển thị',
                    'nhan' => ['Cao cấp'],
                    'ngay_cap_nhat' => '17/05/2026 14:20'
                ],
                [
                    'ma_sp' => 'MH-N-003',
                    'ten_sp' => 'Vòng Mắt Hổ Nâu',
                    'mo_ta_ngan' => 'Hợp mệnh Thổ, Kim · Quyền lực',
                    'anh' => 'https://ui-avatars.com/api/?name=Mat+Ho&background=E4D5C3&color=6B0D18',
                    'danh_muc' => 'Vòng tay phong thủy',
                    'loai_da' => 'Đá mắt hổ',
                    'menh' => ['Thổ', 'Kim'],
                    'gia_ban' => 650000,
                    'gia_khuyen_mai' => null,
                    'ton_kho' => 0,
                    'trang_thai_ton_kho' => 'Hết hàng',
                    'da_ban' => 210,
                    'trang_thai' => 'Hết hàng',
                    'nhan' => ['Bán chạy'],
                    'ngay_cap_nhat' => '15/05/2026 10:15'
                ],
                [
                    'ma_sp' => 'TA-H-004',
                    'ten_sp' => 'Vòng Thạch Anh Tóc Vàng',
                    'mo_ta_ngan' => 'Hợp mệnh Kim, Thổ · Thu hút tài lộc',
                    'anh' => 'https://ui-avatars.com/api/?name=Thach+Anh&background=f3f4f6&color=6B0D18',
                    'danh_muc' => 'Vòng cao cấp',
                    'loai_da' => 'Thạch anh',
                    'menh' => ['Kim', 'Thổ'],
                    'gia_ban' => 3500000,
                    'gia_khuyen_mai' => 3150000,
                    'ton_kho' => 15,
                    'trang_thai_ton_kho' => 'Còn hàng',
                    'da_ban' => 12,
                    'trang_thai' => 'Đang ẩn',
                    'nhan' => ['Mới', 'Flash sale'],
                    'ngay_cap_nhat' => '18/05/2026 08:00'
                ],
                [
                    'ma_sp' => 'MN-D-005',
                    'ten_sp' => 'Chuỗi Mã Não Đỏ',
                    'mo_ta_ngan' => 'Hợp mệnh Hỏa, Thổ · May mắn',
                    'anh' => null,
                    'danh_muc' => 'Vòng đá tự nhiên',
                    'loai_da' => 'Mã não',
                    'menh' => ['Hỏa', 'Thổ'],
                    'gia_ban' => 450000,
                    'gia_khuyen_mai' => null,
                    'ton_kho' => 42,
                    'trang_thai_ton_kho' => 'Còn hàng',
                    'da_ban' => 85,
                    'trang_thai' => 'Đang hiển thị',
                    'nhan' => [],
                    'ngay_cap_nhat' => '12/05/2026 16:45'
                ],
                [
                    'ma_sp' => 'OS-D-006',
                    'ten_sp' => 'Vòng Obsidian Đen Nguyên Khối',
                    'mo_ta_ngan' => 'Hợp mệnh Thủy, Mộc · Trừ tà',
                    'anh' => 'https://ui-avatars.com/api/?name=Obsidian&background=E4D5C3&color=6B0D18',
                    'danh_muc' => 'Vòng tay phong thủy',
                    'loai_da' => 'Obsidian',
                    'menh' => ['Thủy', 'Mộc'],
                    'gia_ban' => 550000,
                    'gia_khuyen_mai' => null,
                    'ton_kho' => 0,
                    'trang_thai_ton_kho' => 'Hết hàng',
                    'da_ban' => 15,
                    'trang_thai' => 'Ngừng kinh doanh',
                    'nhan' => [],
                    'ngay_cap_nhat' => '01/05/2026 11:20'
                ]
            ]
        ];

        $this->view('admin_san_pham', $data, 'admin');
    }

    public function show() {
        // Mock data for Admin Product Detail
        $data = [
            'tieu_de' => 'Chi tiết sản phẩm - Vòng Ngọc Bích Tài Lộc',
            'current_page' => 'chi_tiet_san_pham',
            'san_pham' => [
                'ma_sp' => 'NB-TL-001',
                'ten_sp' => 'Vòng Ngọc Bích Tài Lộc',
                'trang_thai' => 'Đang hiển thị',
                'danh_muc' => 'Vòng tay phong thủy',
                'loai_da' => 'Ngọc bích',
                'menh' => ['Mộc', 'Hỏa'],
                'gia_ban' => 850000,
                'gia_khuyen_mai' => 680000,
                'ton_kho' => 25,
                'da_ban' => 128,
                'doanh_thu' => 108800000,
                'ngay_tao' => '10/01/2026 14:00',
                'ngay_cap_nhat' => '18/05/2026 09:30',
                'anh_chinh' => 'https://ui-avatars.com/api/?name=Ngoc+Bich&background=E4D5C3&color=6B0D18&size=512',
                'anh_phu' => [
                    'https://ui-avatars.com/api/?name=NB&background=f3f4f6&color=6B0D18&size=512',
                    'https://ui-avatars.com/api/?name=TL&background=f3f4f6&color=6B0D18&size=512',
                ],
                'mo_ta_ngan' => 'Vòng ngọc bích tự nhiên, thu hút tài lộc, bình an.',
                'mo_ta_chi_tiet' => '<p>Sản phẩm làm từ ngọc bích tự nhiên nguyên khối, được mài dũa thủ công. Phù hợp cho người mệnh Mộc và Hỏa, mang lại tài lộc, bình an.</p><p>Kích thước hạt: 8mm, 10mm, 12mm phù hợp với nhiều cỡ tay khác nhau.</p>',
                'bien_the' => [
                    ['ten' => 'Hạt 8mm', 'ton_kho' => 10, 'gia_ban' => 850000, 'da_ban' => 50],
                    ['ten' => 'Hạt 10mm', 'ton_kho' => 10, 'gia_ban' => 950000, 'da_ban' => 45],
                    ['ten' => 'Hạt 12mm', 'ton_kho' => 5, 'gia_ban' => 1050000, 'da_ban' => 33],
                ]
            ],
            'danh_gia' => [
                ['khach_hang' => 'Nguyễn Thị Hoa', 'so_sao' => 5, 'noi_dung' => 'Vòng rất đẹp, đá sáng và mát tay.', 'ngay' => '17/05/2026'],
                ['khach_hang' => 'Trần Văn Hùng', 'so_sao' => 4, 'noi_dung' => 'Giao hàng nhanh, đóng gói cẩn thận. Tuy nhiên hạt hơi nhỏ so với tưởng tượng.', 'ngay' => '15/05/2026'],
                ['khach_hang' => 'Lê Mai', 'so_sao' => 5, 'noi_dung' => 'Rất hài lòng, sẽ ủng hộ shop thêm.', 'ngay' => '10/05/2026'],
            ],
            'lich_su_kho' => [
                ['loai' => 'Nhập', 'so_luong' => '+50', 'nguoi_thuc_hien' => 'Admin Hải', 'ghi_chu' => 'Nhập lô hàng tháng 5', 'ngay' => '05/05/2026 10:00'],
                ['loai' => 'Xuất', 'so_luong' => '-1', 'nguoi_thuc_hien' => 'Hệ thống', 'ghi_chu' => 'Đơn hàng DH202600123', 'ngay' => '06/05/2026 14:20'],
                ['loai' => 'Cập nhật', 'so_luong' => '25', 'nguoi_thuc_hien' => 'Admin Hải', 'ghi_chu' => 'Kiểm kho định kỳ', 'ngay' => '18/05/2026 09:30'],
            ]
        ];

        $this->view('admin_san_pham_chi_tiet', $data, 'admin');
    }

    public function create() {
        $data = [
            'tieu_de' => 'Thêm sản phẩm mới',
            'current_page' => 'them_san_pham',
            'is_edit' => false,
            'danh_muc_list' => ['Vòng tay phong thủy', 'Dây chuyền mặt đá', 'Nhẫn phong thủy', 'Vật phẩm trưng bày', 'Quà tặng doanh nghiệp'],
            'loai_da_list' => ['Thạch anh', 'Cẩm thạch', 'Mã não', 'Mắt hổ', 'Ngọc bích', 'Gỗ sưa'],
            'menh_list' => ['Kim', 'Mộc', 'Thủy', 'Hỏa', 'Thổ'],
            'san_pham' => null
        ];
        $this->view('admin_san_pham_form', $data, 'admin');
    }

    public function edit() {
        // Mock data for editing
        $data = [
            'tieu_de' => 'Chỉnh sửa sản phẩm',
            'current_page' => 'san_pham', // Vẫn highlight tab danh sách
            'is_edit' => true,
            'danh_muc_list' => ['Vòng tay phong thủy', 'Dây chuyền mặt đá', 'Nhẫn phong thủy', 'Vật phẩm trưng bày', 'Quà tặng doanh nghiệp'],
            'loai_da_list' => ['Thạch anh', 'Cẩm thạch', 'Mã não', 'Mắt hổ', 'Ngọc bích', 'Gỗ sưa'],
            'menh_list' => ['Kim', 'Mộc', 'Thủy', 'Hỏa', 'Thổ'],
            'san_pham' => [
                'ma_sp' => 'NB-TL-001',
                'ten_sp' => 'Vòng Ngọc Bích Tài Lộc',
                'trang_thai' => '1',
                'danh_muc' => 'Vòng tay phong thủy',
                'loai_da' => 'Ngọc bích',
                'menh' => ['Mộc', 'Hỏa'],
                'gia_ban' => 850000,
                'gia_khuyen_mai' => 680000,
                'ton_kho' => 25,
                'anh_chinh' => 'https://ui-avatars.com/api/?name=Ngoc+Bich&background=E4D5C3&color=6B0D18&size=512',
                'anh_phu' => [
                    'https://ui-avatars.com/api/?name=NB&background=f3f4f6&color=6B0D18&size=512',
                    'https://ui-avatars.com/api/?name=TL&background=f3f4f6&color=6B0D18&size=512',
                ],
                'mo_ta_ngan' => 'Vòng ngọc bích tự nhiên, thu hút tài lộc, bình an.',
                'mo_ta_chi_tiet' => '<p>Sản phẩm làm từ ngọc bích tự nhiên nguyên khối, được mài dũa thủ công. Phù hợp cho người mệnh Mộc và Hỏa, mang lại tài lộc, bình an.</p><p>Kích thước hạt: 8mm, 10mm, 12mm phù hợp với nhiều cỡ tay khác nhau.</p>',
                'nhan' => ['Mới', 'Bán chạy']
            ]
        ];
        $this->view('admin_san_pham_form', $data, 'admin');
    }
}
