<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Admin\NhanSuModel;

class AuthController extends Controller {

    /**
     * Hiển thị trang đăng nhập
     */
    public function login() {
        // Nếu đã đăng nhập rồi thì redirect về dashboard
        if (!empty($_SESSION['admin_id'])) {
            header('Location: ' . APP_URL . '/admin/dashboard');
            exit;
        }

        $error = $_GET['error'] ?? null;
        $this->view('admin_dang_nhap', [
            'is_auth_page' => true,
            'error' => $error,
        ], 'admin');
    }

    /**
     * Xử lý đăng nhập (POST)
     */
    public function xuLyDangNhap() {
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            header('Location: ' . APP_URL . '/admin/dang-nhap?error=empty');
            exit;
        }

        $model = new NhanSuModel();
        $staff = $model->findByEmail($email);

        // Sai email
        if (!$staff) {
            header('Location: ' . APP_URL . '/admin/dang-nhap?error=wrong');
            exit;
        }

        // Sai mật khẩu
        if (!password_verify($password, $staff['mat_khau'])) {
            header('Location: ' . APP_URL . '/admin/dang-nhap?error=wrong');
            exit;
        }

        // Tài khoản bị khóa
        if ($staff['trang_thai'] === 'bi_khoa') {
            header('Location: ' . APP_URL . '/admin/dang-nhap?error=locked');
            exit;
        }

        // Chờ kích hoạt
        if ($staff['trang_thai'] === 'cho_kich_hoat') {
            header('Location: ' . APP_URL . '/admin/dang-nhap?error=inactive');
            exit;
        }

        // === Đăng nhập thành công ===
        $_SESSION['admin_id']     = $staff['id'];
        $_SESSION['admin_ma_nv']  = $staff['ma_nv'];
        $_SESSION['admin_name']   = $staff['ho_ten'];
        $_SESSION['admin_email']  = $staff['email'];
        $_SESSION['admin_role']   = $staff['vai_tro'];
        $_SESSION['admin_avatar'] = $staff['avatar'] ?? null;

        // Cập nhật lần đăng nhập cuối
        $model->capNhatDangNhapCuoi($staff['id']);

        // Ghi lịch sử đăng nhập
        $model->themLichSu([
            'id_nhan_vien'    => $staff['id'],
            'hanh_dong'       => 'Đăng nhập',
            'mo_ta'           => 'Đăng nhập thành công',
            'ip_address'      => $_SERVER['REMOTE_ADDR'] ?? null,
            'thiet_bi'        => $_SERVER['HTTP_USER_AGENT'] ?? null,
            'nguoi_thuc_hien' => $staff['ho_ten'],
        ]);

        header('Location: ' . APP_URL . '/admin/dashboard');
        exit;
    }

    /**
     * Đăng xuất - CHỈ xóa admin session, giữ user session
     */
    public function dangXuat() {
        unset(
            $_SESSION['admin_id'], $_SESSION['admin_ma_nv'],
            $_SESSION['admin_name'], $_SESSION['admin_email'],
            $_SESSION['admin_role'], $_SESSION['admin_avatar']
        );
        header('Location: ' . APP_URL . '/admin/dang-nhap');
        exit;
    }
}
