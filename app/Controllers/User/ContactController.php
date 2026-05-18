<?php

namespace App\Controllers\User;

use App\Core\Controller;

class ContactController extends Controller
{
    public function index()
    {
        // For now, no dynamic data from DB is strictly required just to show the UI
        $data = [
            'tieu_de' => 'Liên Hệ - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai' => 'lien_he'
        ];
        
        $this->view('lien_he', $data);
    }
}
