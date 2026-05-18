<?php

namespace App\Controllers\User;

use App\Core\Controller;

class KhuyenMaiController extends Controller {
    public function index() {
        $data = [
            'tieu_de' => 'Khuyến Mãi - Săn Ưu Đãi Trang Sức Phong Thuỷ',
            'trang_hien_tai' => 'khuyen_mai',
            'breadcrumbs' => [
                ['ten' => 'Trang chủ', 'url' => APP_URL . '/'],
                ['ten' => 'Khuyến mãi', 'url' => APP_URL . '/khuyen-mai']
            ]
        ];
        
        $this->view('khuyen_mai', $data);
    }
}
