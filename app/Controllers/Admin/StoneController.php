<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class StoneController extends Controller {
    public function index() {
        $thong_ke = [
            'tong_loai' => 32,
            'dang_hien_thi' => 26,
            'dang_an' => 6,
            'co_san_pham' => 21,
            'chua_co_sp' => 11,
            'dung_nhieu_nhat' => 'Ngọc bích'
        ];

        $danh_sach = [
            [
                'ma_da' => 'STONE-JADE',
                'ten_da' => 'Ngọc bích',
                'ten_tieng_anh' => 'Jade',
                'mo_ta' => 'Sắc xanh nhẹ, thường được gợi ý cho bình an và tài lộc.',
                'nhom' => 'Ngọc',
                'mau_sac' => ['ten' => 'Xanh ngọc', 'hex' => '#10B981'],
                'menh' => ['Mộc', 'Hỏa'],
                'nhu_cau' => ['Bình an', 'Tài lộc', 'Sức khỏe tinh thần'],
                'so_san_pham' => 48,
                'trang_thai' => 'Đang hiển thị',
                'ngay_cap_nhat' => '18/05/2026 09:30',
                'hinh_anh' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg' // Dùng tạm ảnh mock
            ],
            [
                'ma_da' => 'GEM-QUARTZ-PINK',
                'ten_da' => 'Thạch anh hồng',
                'ten_tieng_anh' => 'Rose Quartz',
                'mo_ta' => 'Viên đá của tình yêu, đem lại năng lượng tích cực.',
                'nhom' => 'Đá tự nhiên',
                'mau_sac' => ['ten' => 'Hồng nhạt', 'hex' => '#F472B6'],
                'menh' => ['Hỏa', 'Thổ'],
                'nhu_cau' => ['Tình duyên', 'Bình an'],
                'so_san_pham' => 25,
                'trang_thai' => 'Đang hiển thị',
                'ngay_cap_nhat' => '15/05/2026 14:20',
                'hinh_anh' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-2.jpg'
            ],
            [
                'ma_da' => 'STONE-OBSIDIAN',
                'ten_da' => 'Obsidian',
                'ten_tieng_anh' => 'Black Obsidian',
                'mo_ta' => 'Đá núi lửa đen bóng, bảo vệ chủ nhân khỏi năng lượng xấu.',
                'nhom' => 'Đá tự nhiên',
                'mau_sac' => ['ten' => 'Đen', 'hex' => '#1F2937'],
                'menh' => ['Thủy', 'Mộc'],
                'nhu_cau' => ['Bình an', 'Công việc'],
                'so_san_pham' => 0,
                'trang_thai' => 'Đang ẩn',
                'ngay_cap_nhat' => '10/05/2026 10:15',
                'hinh_anh' => '' // Giả lập chưa có ảnh
            ],
            [
                'ma_da' => 'GEM-RUBY',
                'ten_da' => 'Ruby',
                'ten_tieng_anh' => 'Ruby',
                'mo_ta' => 'Hồng ngọc quý hiếm, mang lại quyền lực và may mắn.',
                'nhom' => 'Đá cao cấp',
                'mau_sac' => ['ten' => 'Đỏ', 'hex' => '#DC2626'],
                'menh' => ['Hỏa', 'Thổ'],
                'nhu_cau' => ['May mắn', 'Tài lộc', 'Quà tặng'],
                'so_san_pham' => 12,
                'trang_thai' => 'Đang hiển thị',
                'ngay_cap_nhat' => '05/05/2026 16:45',
                'hinh_anh' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-3.jpg'
            ]
        ];

        $data = [
            'tieu_de' => 'Quản lý Loại Đá / Ngọc - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'loai_da',
            'thong_ke' => $thong_ke,
            'danh_sach' => $danh_sach
        ];

        $this->view('admin_stone', $data, 'admin');
    }

    public function create() {
        $data = [
            'tieu_de' => 'Thêm Loại Đá / Ngọc - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'loai_da',
            'is_edit' => false
        ];
        $this->view('admin_stone_form', $data, 'admin');
    }

    public function edit() {
        $data = [
            'tieu_de' => 'Sửa Loại Đá / Ngọc - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'loai_da',
            'is_edit' => true,
            'mock_data' => [
                'ten' => 'Ngọc bích',
                'ma' => 'STONE-JADE',
                'tieng_anh' => 'Jade',
                'nhom' => 'ngoc',
                'mo_ta' => 'Sắc xanh nhẹ, thường được gợi ý cho bình an và tài lộc.',
                'mau_sac' => 'Xanh ngọc',
                'mau_hex' => '#10B981',
                'menh' => ['Mộc', 'Hỏa'],
                'nhu_cau' => ['Bình an', 'Tài lộc', 'Sức khỏe tinh thần'],
                'y_nghia' => 'Ngọc bích thường được xem là biểu tượng của sự bình an, hài hòa và tài lộc. Sắc xanh nhẹ nhàng của ngọc thường được gợi ý cho người mệnh Mộc và Hỏa.',
                'luu_y' => 'Tránh va đập mạnh, hạn chế tiếp xúc hóa chất, nên lau bằng khăn mềm.',
                'slug' => 'ngoc-bich',
                'so_san_pham' => 48
            ]
        ];
        $this->view('admin_stone_form', $data, 'admin');
    }
}
