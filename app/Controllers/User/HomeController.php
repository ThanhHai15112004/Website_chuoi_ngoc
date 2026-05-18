<?php

namespace App\Controllers\User;

use App\Core\Controller;

class HomeController extends Controller {
    public function index() {
        $data = [
            'tieu_de' => 'Trang chủ - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai' => 'trang_chu',
            'san_pham' => [
                ['ten' => 'Ngọc Tụ Nham Vân Mây', 'gia' => '850.000đ', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (1).jpg'],
                ['ten' => 'Vòng Thời Trang Xinh Yêu', 'gia' => '550.000đ', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-1.jpg'],
                ['ten' => 'Nhang Trầm Hương', 'gia' => '250.000đ', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg'],
                ['ten' => 'Vòng Tụ Nham', 'gia' => '550.000đ', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-3.jpg']
            ]
        ];
        
        $this->view('trang_chu', $data);
    }
}
