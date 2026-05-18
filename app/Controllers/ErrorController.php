<?php

namespace App\Controllers;

use App\Core\Controller;

class ErrorController extends Controller {
    public function notFound() {
        http_response_code(404);
        $data = [
            'tieu_de' => '404 - Không tìm thấy trang',
            'trang_hien_tai' => '404'
        ];
        $this->view('404', $data);
    }
}
