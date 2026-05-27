<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class TaiKhoanController extends Controller {
    public function index() {
        // Tab mặc định là profile nếu không có tab trong URL
        $tab = isset($_GET['tab']) ? $_GET['tab'] : 'profile';
        
        $data = [
            'tieu_de' => 'Cài đặt tài khoản - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'tai_khoan',
            'active_tab' => $tab,
            // Giả lập thông tin user hiện tại
            'user' => [
                'ho_ten' => 'Hải Admin',
                'email' => 'admin@chuoingoc.com',
                'sdt' => '0987654321',
                'dia_chi' => '123 Đường X, Hà Nội',
                'anh_dai_dien' => 'https://ui-avatars.com/api/?name=Admin&background=8B0000&color=fff&bold=true',
                'vai_tro' => 'Super Admin'
            ]
        ];
        $this->view('admin_tai_khoan', $data, 'admin');
    }
}
