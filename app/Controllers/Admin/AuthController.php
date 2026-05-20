<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class AuthController extends Controller {
    public function login() {
        $this->view('admin_dang_nhap', ['is_auth_page' => true], 'admin');
    }
}
