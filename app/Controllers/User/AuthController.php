<?php

namespace App\Controllers\User;

use App\Core\Controller;

class AuthController extends Controller {
    
    public function index() {
        // You can check if the user is already logged in here and redirect them if so.
        // if (isset($_SESSION['user_id'])) {
        //     header('Location: ' . APP_URL . '/tai-khoan');
        //     exit;
        // }

        $data = [
            'tieu_de' => 'Đăng Nhập / Đăng Ký - Chuỗi Ngọc Phong Thủy',
            'mo_ta' => 'Đăng nhập hoặc đăng ký tài khoản để trải nghiệm mua sắm tuyệt vời tại Chuỗi Ngọc Phong Thủy.',
        ];

        // Render view 'dang_nhap' with layout 'main'
        return $this->view('dang_nhap', $data, 'main');
    }

    public function loginProcess() {
        // Handle login processing here
        // ...
        
        // For now, redirect back to home or account page
        header('Location: ' . APP_URL . '/tai-khoan');
        exit;
    }

    public function registerProcess() {
        // Handle registration processing here
        // ...

        // For now, redirect back to home or account page
        header('Location: ' . APP_URL . '/tai-khoan');
        exit;
    }

    public function logout() {
        // Destroy session
        // session_destroy();
        
        header('Location: ' . APP_URL . '/dang-nhap');
        exit;
    }
}
