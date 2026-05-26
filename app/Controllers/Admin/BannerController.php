<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class BannerController extends Controller
{
    /**
     * Hiển thị danh sách banner
     */
    public function index()
    {
        // Mock data cho giao diện
        $mockBanners = [
            [
                'id' => 1,
                'ten' => 'Flash Sale Vòng Ngọc Tháng 5',
                'anh_desktop' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg',
                'anh_mobile' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-2.jpg',
                'vi_tri' => 'Trang chủ · Slider chính',
                'thiet_bi' => 'desktop_mobile',
                'link' => '/san-pham/khuyen-mai',
                'bat_dau' => '2026-05-01',
                'ket_thuc' => '2026-05-31',
                'trang_thai' => 'dang_hien_thi',
                'thu_tu' => 1
            ],
            [
                'id' => 2,
                'ten' => 'Banner Vòng Sinh Mệnh',
                'anh_desktop' => APP_URL . '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg',
                'anh_mobile' => '',
                'vi_tri' => 'Vòng Sinh Mệnh',
                'thiet_bi' => 'desktop',
                'link' => '/vong-sinh-menh',
                'bat_dau' => '2026-01-01',
                'ket_thuc' => null,
                'trang_thai' => 'dang_hien_thi',
                'thu_tu' => 2
            ],
            [
                'id' => 3,
                'ten' => 'Bộ sưu tập Trầm Hương Mới',
                'anh_desktop' => '',
                'anh_mobile' => APP_URL . '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-2.jpg',
                'vi_tri' => 'Trang sản phẩm',
                'thiet_bi' => 'mobile',
                'link' => '/danh-muc/tram-huong',
                'bat_dau' => '2026-06-01',
                'ket_thuc' => '2026-06-30',
                'trang_thai' => 'sap_hien_thi',
                'thu_tu' => 1
            ],
            [
                'id' => 4,
                'ten' => 'Khuyến mãi qua hạn',
                'anh_desktop' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-3.jpg',
                'anh_mobile' => APP_URL . '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-3.jpg',
                'vi_tri' => 'Bài viết',
                'thiet_bi' => 'desktop_mobile',
                'link' => '/bai-viet/khuyen-mai-cu',
                'bat_dau' => '2026-03-01',
                'ket_thuc' => '2026-03-31',
                'trang_thai' => 'het_han',
                'thu_tu' => 1
            ],
            [
                'id' => 5,
                'ten' => 'Banner lỗi thiếu link',
                'anh_desktop' => APP_URL . '/images/Logo_.jpg',
                'anh_mobile' => '',
                'vi_tri' => 'Footer',
                'thiet_bi' => 'desktop_mobile',
                'link' => '',
                'bat_dau' => '2026-05-01',
                'ket_thuc' => '2026-12-31',
                'trang_thai' => 'thieu_cau_hinh',
                'thu_tu' => 5
            ]
        ];

        $this->view('admin_banner', [
            'banners' => $mockBanners,
            'tieu_de' => 'Quản lý banner',
            'current_page' => 'banner'
        ], 'admin');
    }

    /**
     * Hiển thị form thêm mới banner
     */
    public function create()
    {
        $this->view('admin_banner_form', [
            'mode' => 'create',
            'banner' => null,
            'tieu_de' => 'Thêm banner mới',
            'current_page' => 'them_banner'
        ], 'admin');
    }

    /**
     * Hiển thị form sửa banner
     */
    public function edit()
    {
        // Mock data cho banner edit
        $mockBanner = [
            'id' => 1,
            'ten' => 'Flash Sale Vòng Ngọc Tháng 5',
            'tieu_de_hien_thi' => 'Ưu đãi vòng ngọc tháng này',
            'mo_ta' => 'Giảm đến 30% cho các mẫu vòng ngọc phong thủy chọn lọc.',
            'cta' => 'Xem ngay',
            'anh_desktop' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg',
            'anh_mobile' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-2.jpg',
            'vi_tri' => 'slider_chinh',
            'thiet_bi' => 'desktop_mobile',
            'loai_link' => 'san_pham',
            'link' => '/san-pham/vong-ngoc-bich',
            'bat_dau' => '2026-05-01',
            'gio_bat_dau' => '08:00',
            'ket_thuc' => '2026-05-31',
            'gio_ket_thuc' => '23:59',
            'khong_gioi_han' => false,
            'trang_thai' => 'dang_hien_thi',
            'thu_tu' => 1
        ];

        $this->view('admin_banner_form', [
            'mode' => 'edit',
            'banner' => $mockBanner,
            'tieu_de' => 'Chỉnh sửa banner',
            'current_page' => 'sua_banner'
        ], 'admin');
    }
}
