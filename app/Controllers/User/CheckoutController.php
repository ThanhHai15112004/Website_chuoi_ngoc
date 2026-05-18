<?php
namespace App\Controllers\User;

use App\Core\Controller;

class CheckoutController extends Controller {
    public function index() {
        // Dữ liệu giả định giỏ hàng (mock data) giống như ở CartController
        $gio_hang = [
            [
                'id' => 1,
                'ten' => 'Vòng Ngọc Bích Tài Lộc',
                'hinh_anh' => 'https://images.unsplash.com/photo-1611591437281-460bfbe1220a?q=80&w=600&auto=format&fit=crop',
                'loai_da' => 'Ngọc bích',
                'menh' => 'Mộc, Hỏa',
                'kich_thuoc_hat' => '8mm',
                'size_vong' => '16cm',
                'gia' => 850000,
                'so_luong' => 1,
            ],
            [
                'id' => 2,
                'ten' => 'Chuỗi Thạch Anh Hồng Tình Duyên',
                'hinh_anh' => 'https://images.unsplash.com/photo-1599643478524-fb66645366f4?q=80&w=600&auto=format&fit=crop',
                'loai_da' => 'Thạch anh',
                'menh' => 'Hỏa, Thổ',
                'kich_thuoc_hat' => '10mm',
                'size_vong' => '17cm',
                'gia' => 680000,
                'so_luong' => 2,
            ]
        ];

        // Thông tin người dùng giả định (nếu đã đăng nhập)
        $user_info = [
            'ho_ten' => 'Nguyễn Văn A',
            'so_dien_thoai' => '0987654321',
            'email' => 'nguyenvana@example.com',
            'dia_chi' => '123 Đường Nguyễn Huệ, Phường Bến Nghé, Quận 1, TP. HCM',
        ];

        $vouchers = [
            [
                'ma' => 'GIAM50K',
                'ten' => 'Giảm 50K',
                'dieu_kien' => 'Đơn từ 500K',
                'han_su_dung' => '30/06/2026'
            ]
        ];

        $this->view('thanh_toan', [
            'title' => 'Thanh toán - Chuỗi Ngọc',
            'gio_hang' => $gio_hang,
            'user_info' => $user_info,
            'vouchers' => $vouchers
        ]);
    }

    public function success() {
        // Giả lập thông tin đơn hàng
        $order_info = [
            'ma_don_hang' => 'DH' . rand(100000, 999999),
            'ngay_dat' => date('d/m/Y H:i'),
            'trang_thai' => 'Đang xử lý',
            'phuong_thuc_thanh_toan' => 'Chuyển khoản ngân hàng', // hoặc COD
            'nguoi_nhan' => [
                'ho_ten' => 'Nguyễn Văn A',
                'so_dien_thoai' => '0987654321',
                'dia_chi' => '123 Đường Nguyễn Huệ, Phường Bến Nghé, Quận 1, TP. HCM',
            ],
            'tong_tien' => 2210000,
            'giam_gia' => 50000,
            'phi_van_chuyen' => 30000,
            'thanh_toan' => 2190000
        ];

        $this->view('dat_hang_thanh_cong', [
            'title' => 'Đặt hàng thành công - Chuỗi Ngọc',
            'order_info' => $order_info
        ]);
    }
}
