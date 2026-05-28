<?php

require 'config/constants.php';
require 'app/Core/Helpers.php';
loadEnv(__DIR__ . '/../.env');
require 'app/Core/Database.php';
require 'app/Models/ThongBaoModel.php';

$model = new \App\Models\ThongBaoModel();

$mockNotifications = [
    [
        'tieu_de' => 'Đơn hàng mới #DH001',
        'noi_dung' => 'Khách hàng Nguyễn Văn A vừa đặt Vòng tay Thạch Anh Tóc Vàng. Vui lòng kiểm tra và xử lý đơn hàng sớm nhất.',
        'loai_thong_bao' => 'don_hang',
        'link' => '/admin/don-hang/chi-tiet/DH001'
    ],
    [
        'tieu_de' => 'Cảnh báo bảo mật',
        'noi_dung' => 'Có đăng nhập bất thường từ địa chỉ IP 192.168.1.55 vào tài khoản Admin. Vui lòng kiểm tra lại nếu không phải là bạn.',
        'loai_thong_bao' => 'he_thong',
        'link' => '/admin/nhat-ky-hoat-dong'
    ],
    [
        'tieu_de' => 'Đánh giá 5 sao từ khách hàng',
        'noi_dung' => 'Khách hàng Trần B vừa để lại đánh giá 5 sao cho sản phẩm Vòng Cẩm Thạch: "Sản phẩm rất đẹp, đóng gói cẩn thận. Sẽ ủng hộ shop dài dài."',
        'loai_thong_bao' => 'danh_gia',
        'link' => '/admin/binh-luan'
    ],
    [
        'tieu_de' => 'Thành viên mới đăng ký',
        'noi_dung' => 'Lê Văn C vừa đăng ký tài khoản mới trên hệ thống.',
        'loai_thong_bao' => 'tai_khoan',
        'link' => '/admin/khach-hang'
    ],
    [
        'tieu_de' => 'Sắp hết hàng trong kho',
        'noi_dung' => 'Sản phẩm Nhẫn Mắt Hổ Size 16mm hiện chỉ còn 2 chiếc trong kho. Vui lòng lên kế hoạch nhập hàng.',
        'loai_thong_bao' => 'kho',
        'link' => '/admin/ton-kho'
    ]
];

$count = 0;
foreach ($mockNotifications as $noti) {
    // Thêm thông báo cho Admin (id_nguoi_dung = null)
    $noti['id_nguoi_dung'] = null;
    $model->insert($noti);
    $count++;
}

echo "Da them $count thong bao mau vao hop thu Admin!\n";
