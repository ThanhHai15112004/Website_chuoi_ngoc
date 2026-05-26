<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class ThongBaoController extends Controller {
    public function index() {
        $data = [
            'tieu_de' => 'Quản lý thông báo - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'hop_thu',
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
