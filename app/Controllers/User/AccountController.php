<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Models\Admin\KhachHangModel;
use App\Models\Admin\BanMenhModel;

class AccountController extends Controller
{
    public function index()
    {
        $model     = new KhachHangModel();
        $banMenhMdl = new BanMenhModel();

        $user = $model->timTheoId($_SESSION['user_id']);

        // Lịch sử tra cứu bản mệnh (tối đa 20 bản gần nhất)
        $lichSuBanMenh = $banMenhMdl->layLichSuCuaNguoiDung($_SESSION['user_id'], 20);

        $data = [
            'tieu_de'          => 'Tài khoản cá nhân - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai'   => 'tai_khoan',
            'user'             => $user,
            'lich_su_ban_menh' => $lichSuBanMenh,
        ];
        
        $this->view('tai_khoan', $data);
    }
}
