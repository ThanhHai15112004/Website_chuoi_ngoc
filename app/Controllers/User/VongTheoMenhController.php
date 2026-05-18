<?php

namespace App\Controllers\User;

use App\Core\Controller;

class VongTheoMenhController extends Controller {
    public function index() {
        $data = [
            'tieu_de' => 'Vòng Theo Mệnh - Tìm Chiếc Vòng Dành Riêng Cho Bạn',
            'trang_hien_tai' => 'vong_theo_menh',
            'breadcrumbs' => [
                ['ten' => 'Trang chủ', 'url' => APP_URL . '/'],
                ['ten' => 'Vòng Theo Mệnh', 'url' => APP_URL . '/vong-theo-menh']
            ]
        ];
        
        $this->view('vong_theo_menh', $data);
    }
}
