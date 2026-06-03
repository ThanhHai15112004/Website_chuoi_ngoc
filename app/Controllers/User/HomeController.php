<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Services\User\HomeService;

class HomeController extends Controller {
    private $homeService;

    public function __construct()
    {
        $this->homeService = new HomeService();
    }

    public function index() {
        $homeData = $this->homeService->getHomeData();
        
        $data = array_merge([
            'tieu_de' => 'Trang chủ - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai' => 'trang_chu',
        ], $homeData);
        
        $this->view('trang_chu', $data, 'main');
    }
}
