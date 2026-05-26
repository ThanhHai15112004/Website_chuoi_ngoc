<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class BaiVietController extends Controller {
    public function index() {
        $data = [
            'tieu_de' => 'Quản lý bài viết - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'bai_viet', // To match sidebar later
        ];
        $this->view('admin_bai_viet', $data, 'admin');
    }

    public function create() {
        $data = [
            'tieu_de' => 'Thêm bài viết mới - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'bai_viet',
            'is_edit' => false,
        ];
        $this->view('admin_bai_viet_form', $data, 'admin');
    }

    public function edit() {
        $data = [
            'tieu_de' => 'Chỉnh sửa bài viết - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'bai_viet',
            'is_edit' => true,
        ];
        $this->view('admin_bai_viet_form', $data, 'admin');
    }
}
