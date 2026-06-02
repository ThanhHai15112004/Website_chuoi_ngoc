<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Models\Admin\KhachHangModel;

class AccountController extends Controller
{
    public function index()
    {
        $model = new KhachHangModel();
        $user = $model->timTheoId($_SESSION['user_id']);

        $data = [
            'tieu_de' => 'Tài khoản cá nhân - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai' => 'tai_khoan',
            'user' => $user,
        ];
        
        $this->view('tai_khoan', $data);
    }
}
