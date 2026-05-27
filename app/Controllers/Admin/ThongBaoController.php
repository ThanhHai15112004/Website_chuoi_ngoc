<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class ThongBaoController extends Controller {
    public function index() {
        // Mock data for inbox/notifications
        $mockNotifications = [
            [
                'id' => 1,
                'tieu_de' => 'Đơn hàng mới #DH001',
                'noi_dung' => 'Khách hàng Nguyễn Văn A vừa đặt Vòng tay Thạch Anh Tóc Vàng. Vui lòng kiểm tra và xử lý đơn hàng sớm nhất.',
                'loai' => 'don_hang',
                'nguoi_gui' => 'Hệ thống',
                'thoi_gian' => '2 phút trước',
                'da_doc' => false,
                'icon' => 'mdi:receipt-text-outline',
                'color_class' => 'bg-blue-100 text-blue-600',
                'link' => '/admin/don-hang/chi-tiet/DH001'
            ],
            [
                'id' => 2,
                'tieu_de' => 'Cảnh báo bảo mật',
                'noi_dung' => 'Có đăng nhập bất thường từ địa chỉ IP 192.168.1.55 vào tài khoản Admin. Vui lòng kiểm tra lại nếu không phải là bạn.',
                'loai' => 'he_thong',
                'nguoi_gui' => 'Bảo mật',
                'thoi_gian' => '15 phút trước',
                'da_doc' => false,
                'icon' => 'mdi:shield-alert-outline',
                'color_class' => 'bg-red-100 text-red-600',
                'link' => '/admin/nhat-ky-hoat-dong'
            ],
            [
                'id' => 3,
                'tieu_de' => 'Đánh giá 5 sao từ khách hàng',
                'noi_dung' => 'Khách hàng Trần B vừa để lại đánh giá 5 sao cho sản phẩm Vòng Cẩm Thạch: "Sản phẩm rất đẹp, đóng gói cẩn thận. Sẽ ủng hộ shop dài dài."',
                'loai' => 'danh_gia',
                'nguoi_gui' => 'Trần B',
                'thoi_gian' => '1 giờ trước',
                'da_doc' => true,
                'icon' => 'mdi:star-circle-outline',
                'color_class' => 'bg-amber-100 text-amber-600',
                'link' => '/admin/binh-luan'
            ],
            [
                'id' => 4,
                'tieu_de' => 'Thành viên mới đăng ký',
                'noi_dung' => 'Lê Văn C vừa đăng ký tài khoản mới trên hệ thống.',
                'loai' => 'he_thong',
                'nguoi_gui' => 'Hệ thống',
                'thoi_gian' => 'Hôm qua',
                'da_doc' => true,
                'icon' => 'mdi:account-plus-outline',
                'color_class' => 'bg-emerald-100 text-emerald-600',
                'link' => '/admin/khach-hang/chi-tiet/KH005'
            ],
            [
                'id' => 5,
                'tieu_de' => 'Sắp hết hàng trong kho',
                'noi_dung' => 'Sản phẩm Nhẫn Mắt Hổ Size 16mm hiện chỉ còn 2 chiếc trong kho. Vui lòng lên kế hoạch nhập hàng.',
                'loai' => 'he_thong',
                'nguoi_gui' => 'Hệ thống',
                'thoi_gian' => '2 ngày trước',
                'da_doc' => true,
                'icon' => 'mdi:package-variant-closed',
                'color_class' => 'bg-orange-100 text-orange-600',
                'link' => '/admin/ton-kho'
            ]
        ];

        $data = [
            'tieu_de' => 'Hộp thư & Thông báo',
            'current_page' => 'hop_thu',
            'notifications' => $mockNotifications
        ];
        $this->view('admin_thong_bao', $data, 'admin');
    }

    public function create() {
        $data = [
            'tieu_de' => 'Tạo thông báo mới - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'hop_thu',
            'is_edit' => false,
        ];
        $this->view('admin_thong_bao_form', $data, 'admin');
    }
}
