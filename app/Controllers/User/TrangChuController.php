<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Services\User\TrangChuService;

class TrangChuController extends Controller {
    private $trangChuService;

    public function __construct()
    {
        $this->trangChuService = new TrangChuService();
    }

    public function index() {
        $homeData = $this->trangChuService->getHomeData();
        
        $data = array_merge([
            'tieu_de' => 'Trang chủ - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai' => 'trang_chu',
        ], $homeData);
        
        $this->view('trang_chu', $data, 'main');
    }
}
