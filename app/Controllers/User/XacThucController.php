<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Core\MailHelper;
use App\Models\Admin\KhachHangModel;
use App\Services\ThuDienTuService;
use App\Services\ThongBaoService;

class XacThucController extends Controller {

    /**
     * Hiển thị trang đăng nhập / đăng ký
     */
    public function index() {
        if (!empty($_SESSION['user_id'])) {
            header('Location: ' . APP_URL . '/tai-khoan');
            exit;
        }

        $error = $_GET['error'] ?? null;
        $mode  = $_GET['mode'] ?? null; // 'register' to show register panel
        $data = [
            'tieu_de' => 'Đăng Nhập / Đăng Ký - Chuỗi Ngọc Phong Thủy',
            'mo_ta'   => 'Đăng nhập hoặc đăng ký tài khoản để trải nghiệm mua sắm tuyệt vời.',
            'error'   => $error,
            'mode'    => $mode,
        ];

        return $this->view('dang_nhap', $data, 'main');
    }

    /**
     * Xử lý đăng nhập (POST)
     */
    public function loginProcess() {
        $email    = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            header('Location: ' . APP_URL . '/dang-nhap?error=empty');
            exit;
        }

        $model = new KhachHangModel();
        $user  = $model->findByEmail($email);

        if (!$user) {
            header('Location: ' . APP_URL . '/dang-nhap?error=wrong');
            exit;
        }

        if (!password_verify($password, $user['mat_khau'])) {
            header('Location: ' . APP_URL . '/dang-nhap?error=wrong');
            exit;
        }

        // Tài khoản bị khóa (trang_thai = 0)
        if ((int)$user['trang_thai'] === 0) {
            header('Location: ' . APP_URL . '/dang-nhap?error=locked');
            exit;
        }

        // === Đăng nhập thành công ===
        $this->setUserSession($user);

        header('Location: ' . APP_URL . '/tai-khoan');
        exit;
    }

    /**
     * Bước 1 đăng ký: validate + gửi OTP
     */
    public function registerProcess() {
        $hoTen           = trim($_POST['ho_ten'] ?? '');
        $email           = trim($_POST['email'] ?? '');
        $password        = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['password_confirm'] ?? '';

        // Validate
        if (empty($hoTen) || empty($email) || empty($password)) {
            header('Location: ' . APP_URL . '/dang-nhap?mode=register&error=empty');
            exit;
        }

        if (strlen($password) < 6) {
            header('Location: ' . APP_URL . '/dang-nhap?mode=register&error=password_short');
            exit;
        }

        if ($password !== $passwordConfirm) {
            header('Location: ' . APP_URL . '/dang-nhap?mode=register&error=password_mismatch');
            exit;
        }

        $model = new KhachHangModel();
        if ($model->emailDaTonTai($email)) {
            header('Location: ' . APP_URL . '/dang-nhap?mode=register&error=email_exists');
            exit;
        }

        // Lưu thông tin đăng ký tạm vào session
        $_SESSION['register_pending'] = [
            'ho_ten'   => $hoTen,
            'email'    => $email,
            'password' => $password,
        ];

        // Tạo và gửi OTP
        $otp = MailHelper::taoOTP();
        $_SESSION['otp_code']    = $otp;
        $_SESSION['otp_email']   = $email;
        $_SESSION['otp_purpose'] = 'register';
        $_SESSION['otp_expires'] = time() + 300; // 5 phút

        MailHelper::guiOTP($email, $otp, 'register');

        // Trả về JSON cho AJAX
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'message' => 'OTP đã gửi tới email']);
        exit;
    }

    /**
     * Xác nhận OTP đăng ký → tạo tài khoản
     */
    public function verifyRegisterOtp() {
        header('Content-Type: application/json');

        $inputOtp = trim($_POST['otp'] ?? '');

        if (empty($_SESSION['otp_code']) || empty($_SESSION['register_pending'])) {
            echo json_encode(['success' => false, 'message' => 'Phiên đăng ký đã hết hạn. Vui lòng thử lại.']);
            exit;
        }

        if (time() > ($_SESSION['otp_expires'] ?? 0)) {
            unset($_SESSION['otp_code'], $_SESSION['otp_expires'], $_SESSION['register_pending']);
            echo json_encode(['success' => false, 'message' => 'Mã OTP đã hết hạn. Vui lòng gửi lại.']);
            exit;
        }

        if ($inputOtp !== $_SESSION['otp_code']) {
            echo json_encode(['success' => false, 'message' => 'Mã OTP không chính xác.']);
            exit;
        }

        // OTP đúng → tạo tài khoản
        $pending = $_SESSION['register_pending'];
        $model = new KhachHangModel();

        $userId = bin2hex(random_bytes(16)); // UUID-like
        $maKH = $model->taoMaKH();

        $model->themMoi([
            'id'       => $userId,
            'ma_nd'    => $maKH,
            'ho_ten'   => $pending['ho_ten'],
            'email'    => $pending['email'],
            'mat_khau' => password_hash($pending['password'], PASSWORD_DEFAULT),
            'id_hang_thanh_vien' => 'rank_1', // Mặc định hạng Đồng
            'trang_thai'    => 1,
            'tong_chi_tieu' => 0,
            'diem_thuong'   => 0,
            'ngay_tao'      => date('Y-m-d H:i:s'),
        ]);

        // Cleanup OTP session
        unset($_SESSION['otp_code'], $_SESSION['otp_email'], $_SESSION['otp_purpose'],
              $_SESSION['otp_expires'], $_SESSION['register_pending']);

        // Auto login
        $user = $model->findByEmail($pending['email']);
        if ($user) {
            $this->setUserSession($user);

            // Gửi email chào mừng + thông báo
            try {
                ThuDienTuService::sendWelcome($user);
                $notif = new ThongBaoService();
                $notif->newUserRegistered($user);
            } catch (\Exception $ex) {
                error_log('[Auth] Lỗi gửi welcome email: ' . $ex->getMessage());
            }
        }

        echo json_encode(['success' => true, 'redirect' => APP_URL . '/tai-khoan']);
        exit;
    }

    /**
     * Quên mật khẩu - Bước 1: gửi OTP
     */
    public function forgotSendOtp() {
        header('Content-Type: application/json');

        $email = trim($_POST['email'] ?? '');
        if (empty($email)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng nhập email.']);
            exit;
        }

        $model = new KhachHangModel();
        $user = $model->findByEmail($email);

        if (!$user) {
            echo json_encode(['success' => false, 'message' => 'Email không tồn tại trong hệ thống.']);
            exit;
        }

        $otp = MailHelper::taoOTP();
        $_SESSION['otp_code']    = $otp;
        $_SESSION['otp_email']   = $email;
        $_SESSION['otp_purpose'] = 'forgot';
        $_SESSION['otp_expires'] = time() + 300;

        MailHelper::guiOTP($email, $otp, 'forgot');

        echo json_encode(['success' => true, 'message' => 'Mã OTP đã gửi tới email']);
        exit;
    }

    /**
     * Quên mật khẩu - Bước 2: xác nhận OTP + đặt lại mật khẩu
     */
    public function forgotVerifyOtp() {
        header('Content-Type: application/json');

        $inputOtp    = trim($_POST['otp'] ?? '');
        $newPassword = $_POST['new_password'] ?? '';

        if (empty($_SESSION['otp_code']) || ($_SESSION['otp_purpose'] ?? '') !== 'forgot') {
            echo json_encode(['success' => false, 'message' => 'Phiên đã hết hạn. Vui lòng thử lại.']);
            exit;
        }

        if (time() > ($_SESSION['otp_expires'] ?? 0)) {
            unset($_SESSION['otp_code'], $_SESSION['otp_expires']);
            echo json_encode(['success' => false, 'message' => 'Mã OTP đã hết hạn.']);
            exit;
        }

        if ($inputOtp !== $_SESSION['otp_code']) {
            echo json_encode(['success' => false, 'message' => 'Mã OTP không chính xác.']);
            exit;
        }

        if (strlen($newPassword) < 6) {
            echo json_encode(['success' => false, 'message' => 'Mật khẩu mới phải ít nhất 6 ký tự.']);
            exit;
        }

        $email = $_SESSION['otp_email'];
        $model = new KhachHangModel();
        $model->capNhatMatKhau($email, password_hash($newPassword, PASSWORD_DEFAULT));

        // Cleanup
        unset($_SESSION['otp_code'], $_SESSION['otp_email'], $_SESSION['otp_purpose'], $_SESSION['otp_expires']);

        echo json_encode(['success' => true, 'message' => 'Đặt lại mật khẩu thành công!']);
        exit;
    }

    /**
     * Gửi lại OTP
     */
    public function resendOtp() {
        header('Content-Type: application/json');

        $email   = $_SESSION['otp_email'] ?? '';
        $purpose = $_SESSION['otp_purpose'] ?? 'register';

        if (empty($email)) {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy phiên. Vui lòng thử lại.']);
            exit;
        }

        $otp = MailHelper::taoOTP();
        $_SESSION['otp_code']    = $otp;
        $_SESSION['otp_expires'] = time() + 300;

        MailHelper::guiOTP($email, $otp, $purpose);

        echo json_encode(['success' => true, 'message' => 'Mã OTP mới đã gửi tới email']);
        exit;
    }

    /**
     * Đăng xuất - CHỈ xóa user session, giữ admin session
     */
    public function logout() {
        unset(
            $_SESSION['user_id'], $_SESSION['user_ma'],
            $_SESSION['user_name'], $_SESSION['user_email'],
            $_SESSION['user_avatar'], $_SESSION['user_rank']
        );
        header('Location: ' . APP_URL . '/dang-nhap');
        exit;
    }

    /**
     * Set session cho user
     */
    private function setUserSession(array $user): void {
        $_SESSION['user_id']     = $user['id'];
        $_SESSION['user_ma']     = $user['ma_nd'] ?? '';
        $_SESSION['user_name']   = $user['ho_ten'];
        $_SESSION['user_email']  = $user['email'];
        $_SESSION['user_avatar'] = $user['anh_dai_dien'] ?? null;

        // Merge giỏ hàng từ Session (guest) sang DB (logged-in)
        if (!empty($_SESSION['cart'])) {
            try {
                $cartService = new \App\Services\User\GioHangService();
                $cartService->mergeSessionToDb($user['id']);
            } catch (\Exception $e) {
                error_log('[Auth] Lỗi merge giỏ hàng: ' . $e->getMessage());
            }
        }
    }
}
