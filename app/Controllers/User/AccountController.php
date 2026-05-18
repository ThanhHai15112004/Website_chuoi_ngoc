<?php

namespace App\Controllers\User;

use App\Core\Controller;

class AccountController extends Controller
{
    public function index()
    {
        $data = [
            'tieu_de' => 'Tài khoản cá nhân - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai' => 'tai_khoan'
        ];
        
        $this->view('tai_khoan', $data);
    }
}
