<?php
namespace App\Controllers\Admin;
use App\Core\Controller;

class DanhMucController extends Controller {
    public function index() {
        // Layout variables
        $current_page = 'danh_muc';
        $page_title = 'Quản lý danh mục';

        // Mock Categories
        $danh_muc_list = [
            [
                'id' => 1,
                'ma_dm' => 'DM-VONG-TAY',
                'ten_dm' => 'Vòng tay phong thủy',
                'mo_ta' => 'Các mẫu vòng tay theo mệnh, loại đá và nhu cầu phong thủy.',
                'slug' => 'vong-tay-phong-thuy',
                'so_san_pham' => 48,
                'vi_tri' => ['Menu chính', 'Trang chủ', 'Bộ lọc sản phẩm'],
                'thu_tu' => 1,
                'trang_thai' => 'Đang hiển thị',
                'ngay_cap_nhat' => '18/05/2026',
                'mau_sac_icon' => 'bg-red-50 text-red-700', // Mock placeholder
                'chu_cai' => 'VT'
            ],
            [
                'id' => 2,
                'ma_dm' => 'DM-CHUOI-NGOC',
                'ten_dm' => 'Chuỗi ngọc',
                'mo_ta' => 'Chuỗi hạt ngọc cao cấp mang lại bình an, tài lộc.',
                'slug' => 'chuoi-ngoc',
                'so_san_pham' => 25,
                'vi_tri' => ['Menu chính', 'Trang chủ'],
                'thu_tu' => 2,
                'trang_thai' => 'Đang hiển thị',
                'ngay_cap_nhat' => '16/05/2026',
                'mau_sac_icon' => 'bg-emerald-50 text-emerald-700',
                'chu_cai' => 'CN'
            ],
            [
                'id' => 3,
                'ma_dm' => 'DM-VONG-DA',
                'ten_dm' => 'Vòng đá tự nhiên',
                'mo_ta' => 'Vòng đá chế tác từ thiên nhiên 100%.',
                'slug' => 'vong-da-tu-nhien',
                'so_san_pham' => 112,
                'vi_tri' => ['Menu chính', 'Bộ lọc sản phẩm'],
                'thu_tu' => 3,
                'trang_thai' => 'Đang hiển thị',
                'ngay_cap_nhat' => '15/05/2026',
                'mau_sac_icon' => 'bg-blue-50 text-blue-700',
                'chu_cai' => 'VĐ'
            ],
            [
                'id' => 4,
                'ma_dm' => 'DM-MAT-DAY',
                'ten_dm' => 'Mặt dây chuyền',
                'mo_ta' => 'Mặt dây chuyền phật bản mệnh, hồ ly, tỳ hưu.',
                'slug' => 'mat-day-chuyen',
                'so_san_pham' => 36,
                'vi_tri' => ['Menu phụ'],
                'thu_tu' => 4,
                'trang_thai' => 'Đang ẩn',
                'ngay_cap_nhat' => '10/05/2026',
                'mau_sac_icon' => 'bg-gray-100 text-gray-700',
                'chu_cai' => 'MD'
            ],
            [
                'id' => 5,
                'ma_dm' => 'DM-NHAN',
                'ten_dm' => 'Nhẫn đá phong thủy',
                'mo_ta' => 'Nhẫn tỳ hưu, nhẫn bản ngọc.',
                'slug' => 'nhan-da-phong-thuy',
                'so_san_pham' => 15,
                'vi_tri' => ['Trang chủ'],
                'thu_tu' => 5,
                'trang_thai' => 'Đang hiển thị',
                'ngay_cap_nhat' => '05/05/2026',
                'mau_sac_icon' => 'bg-amber-50 text-amber-700',
                'chu_cai' => 'ND'
            ],
            [
                'id' => 6,
                'ma_dm' => 'DM-TUONG',
                'ten_dm' => 'Tượng phong thủy',
                'mo_ta' => 'Tượng linh vật đặt bàn làm việc.',
                'slug' => 'tuong-phong-thuy',
                'so_san_pham' => 0,
                'vi_tri' => ['Footer'],
                'thu_tu' => 6,
                'trang_thai' => 'Đang hiển thị',
                'ngay_cap_nhat' => '01/05/2026',
                'mau_sac_icon' => 'bg-purple-50 text-purple-700',
                'chu_cai' => 'TP'
            ]
        ];

        // Stats
        $stats = [
            'tong' => count($danh_muc_list),
            'hien_thi' => count(array_filter($danh_muc_list, fn($c) => $c['trang_thai'] === 'Đang hiển thị')),
            'dang_an' => count(array_filter($danh_muc_list, fn($c) => $c['trang_thai'] === 'Đang ẩn')),
            'co_sp' => count(array_filter($danh_muc_list, fn($c) => $c['so_san_pham'] > 0)),
            'trong' => count(array_filter($danh_muc_list, fn($c) => $c['so_san_pham'] === 0)),
        ];

        $data = [
            'tieu_de' => 'Quản lý danh mục',
            'current_page' => 'danh_muc',
            'danh_muc_list' => $danh_muc_list,
            'stats' => $stats
        ];

        $this->view('admin_danh_muc', $data, 'admin');
    }
}
