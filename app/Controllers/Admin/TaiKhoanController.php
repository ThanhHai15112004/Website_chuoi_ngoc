<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Admin\NhanSuModel;

class TaiKhoanController extends Controller {
    public function index() {
        if (empty($_SESSION['admin_id'])) {
            header('Location: ' . APP_URL . '/admin/dang-nhap');
            exit;
        }

        $tab = isset($_GET['tab']) ? $_GET['tab'] : 'profile';
        $nhanSuModel = new NhanSuModel();
        $user = $nhanSuModel->layChiTiet($_SESSION['admin_id']);
        
        $data = [
            'tieu_de' => 'Cài đặt tài khoản - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'tai_khoan',
            'active_tab' => $tab,
            'user' => [
                'ho_ten' => $user['ho_ten'],
                'email' => $user['email'],
                'sdt' => $user['dien_thoai'] ?? '',
                'dia_chi' => $user['dia_chi'] ?? '',
                'anh_dai_dien' => $user['avatar_url'],
                'vai_tro' => $user['vai_tro']
            ],
            'success' => $_SESSION['success'] ?? null,
            'error' => $_SESSION['error'] ?? null
        ];
        
        unset($_SESSION['success'], $_SESSION['error']);
        $this->view('admin_tai_khoan', $data, 'admin');
    }

    public function capNhatThongTin() {
        if (empty($_SESSION['admin_id'])) {
            header('Location: ' . APP_URL . '/admin/dang-nhap');
            exit;
        }

        $id = $_SESSION['admin_id'];
        $ho_ten = trim($_POST['ho_ten'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $sdt = trim($_POST['sdt'] ?? '');
        $dia_chi = trim($_POST['dia_chi'] ?? '');

        if (empty($ho_ten) || empty($email)) {
            $_SESSION['error'] = "Vui lòng nhập đủ Họ tên và Email.";
            header('Location: ' . APP_URL . '/admin/tai-khoan?tab=profile');
            exit;
        }

        $nhanSuModel = new NhanSuModel();
        
        // Kiểm tra email trùng
        if ($nhanSuModel->kiemTraEmail($email, $id)) {
            $_SESSION['error'] = "Email này đã được sử dụng bởi người khác.";
            header('Location: ' . APP_URL . '/admin/tai-khoan?tab=profile');
            exit;
        }

        $dataUpdate = [
            'ho_ten' => $ho_ten,
            'email' => $email,
            'dien_thoai' => $sdt,
            'dia_chi' => $dia_chi
        ];

        // Xử lý upload ảnh
        if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
            $fileTmp = $_FILES['avatar']['tmp_name'];
            $fileName = $_FILES['avatar']['name'];
            $fileSize = $_FILES['avatar']['size'];
            
            $allowedExts = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            if (!in_array($ext, $allowedExts)) {
                $_SESSION['error'] = "Chỉ chấp nhận ảnh định dạng JPG, PNG, GIF, WEBP.";
                header('Location: ' . APP_URL . '/admin/tai-khoan?tab=profile');
                exit;
            }

            if ($fileSize > 2 * 1024 * 1024) { // 2MB
                $_SESSION['error'] = "Kích thước ảnh tối đa là 2MB.";
                header('Location: ' . APP_URL . '/admin/tai-khoan?tab=profile');
                exit;
            }

            $uploadDir = __DIR__ . '/../../../public/uploads/avatars/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            $newFileName = time() . '_' . uniqid() . '.' . $ext;
            $uploadPath = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmp, $uploadPath)) {
                $dataUpdate['avatar'] = APP_URL . '/uploads/avatars/' . $newFileName;
                $_SESSION['admin_avatar'] = $dataUpdate['avatar'];
            }
        }

        if ($nhanSuModel->capNhat($id, $dataUpdate)) {
            $_SESSION['admin_name'] = $ho_ten;
            $_SESSION['success'] = "Cập nhật thông tin thành công!";
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại.";
        }

        header('Location: ' . APP_URL . '/admin/tai-khoan?tab=profile');
        exit;
    }

    public function xoaAnh() {
        if (empty($_SESSION['admin_id'])) {
            header('Location: ' . APP_URL . '/admin/dang-nhap');
            exit;
        }

        $id = $_SESSION['admin_id'];
        $nhanSuModel = new NhanSuModel();
        
        $user = $nhanSuModel->layChiTiet($id);
        if ($user && !empty($user['avatar'])) {
            // Có thể thêm logic xóa file vật lý nếu muốn
            $nhanSuModel->capNhat($id, ['avatar' => null]);
            $_SESSION['admin_avatar'] = null;
            $_SESSION['success'] = "Đã xóa ảnh đại diện thành công!";
        }

        header('Location: ' . APP_URL . '/admin/tai-khoan?tab=profile');
        exit;
    }

    public function doiMatKhau() {
        if (empty($_SESSION['admin_id'])) {
            header('Location: ' . APP_URL . '/admin/dang-nhap');
            exit;
        }

        $id = $_SESSION['admin_id'];
        $currentPass = $_POST['current_password'] ?? '';
        $newPass = $_POST['new_password'] ?? '';
        $confirmPass = $_POST['confirm_password'] ?? '';

        if (empty($currentPass) || empty($newPass) || empty($confirmPass)) {
            $_SESSION['error'] = "Vui lòng nhập đầy đủ thông tin mật khẩu.";
            header('Location: ' . APP_URL . '/admin/tai-khoan?tab=security');
            exit;
        }

        if ($newPass !== $confirmPass) {
            $_SESSION['error'] = "Mật khẩu xác nhận không khớp.";
            header('Location: ' . APP_URL . '/admin/tai-khoan?tab=security');
            exit;
        }

        if (strlen($newPass) < 8) {
            $_SESSION['error'] = "Mật khẩu mới phải dài ít nhất 8 ký tự.";
            header('Location: ' . APP_URL . '/admin/tai-khoan?tab=security');
            exit;
        }

        $nhanSuModel = new NhanSuModel();
        $user = $nhanSuModel->layChiTiet($id);

        if (!password_verify($currentPass, $user['mat_khau'])) {
            $_SESSION['error'] = "Mật khẩu hiện tại không chính xác.";
            header('Location: ' . APP_URL . '/admin/tai-khoan?tab=security');
            exit;
        }

        if ($nhanSuModel->doiMatKhau($id, $newPass)) {
            $_SESSION['success'] = "Đổi mật khẩu thành công!";
        } else {
            $_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại.";
        }

        header('Location: ' . APP_URL . '/admin/tai-khoan?tab=security');
        exit;
    }
}
