<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Services\User\TaiKhoanService;
use App\Models\Admin\BanMenhModel;
use App\Models\Admin\ThongBaoModel;
use App\Models\User\SoDiaChiModel;

class TaiKhoanController extends Controller
{
    private $taiKhoanService;

    public function __construct()
    {
        $this->taiKhoanService = new TaiKhoanService();
    }

    /**
     * Trang tài khoản chính - cung cấp dữ liệu cho tất cả tabs
     */
    public function index()
    {
        // Guard: phải đăng nhập
        if (empty($_SESSION['user_id'])) {
            header('Location: ' . APP_URL . '/dang-nhap');
            exit;
        }

        $userId = $_SESSION['user_id'];

        // Lấy thông tin user đầy đủ
        $user = $this->taiKhoanService->getThongTinUser($userId);
        if (!$user) {
            header('Location: ' . APP_URL . '/dang-nhap');
            exit;
        }

        // Tổng quan stats
        $tong_quan = $this->taiKhoanService->getTongQuan($userId);

        // Đơn hàng gần đây (cho tab tổng quan)
        $don_hang_gan_day = $this->taiKhoanService->getDonHangGanDay($userId, 3);

        // Tất cả đơn hàng (cho tab đơn hàng)
        $don_hang = $this->taiKhoanService->getDonHang($userId, null, 1, 10);

        // Voucher
        $vouchers = $this->taiKhoanService->getVouchers($userId);

        // Yêu thích
        $yeu_thich = $this->taiKhoanService->getYeuThich($userId);

        // Thông báo
        $thong_bao = $this->taiKhoanService->getThongBao($userId);

        // Đánh giá
        $danh_gia = $this->taiKhoanService->getDanhGia($userId);

        // Hạng thành viên - tất cả hạng + hạng tiếp theo
        $tat_ca_hang = $this->taiKhoanService->getTatCaHang();
        $hang_tiep_theo = $this->taiKhoanService->getHangTiepTheo($user['tong_chi_tieu'] ?? 0);

        // Sổ địa chỉ
        $soDiaChiModel = new SoDiaChiModel();
        $danh_sach_dia_chi = $soDiaChiModel->getAllByUserId($userId);

        // Lịch sử bản mệnh (wrap try/catch vì bảng có thể chưa tồn tại)
        $lichSuBanMenh = [];
        try {
            $banMenhMdl = new BanMenhModel();
            $lichSuBanMenh = $banMenhMdl->layLichSuCuaNguoiDung($userId, 20);
        } catch (\Exception $e) {
            $lichSuBanMenh = [];
        }

        $data = [
            'tieu_de'            => 'Tài khoản cá nhân - Chuỗi Ngọc Phong Thủy',
            'trang_hien_tai'     => 'tai_khoan',
            'user'               => $user,
            'tong_quan'          => $tong_quan,
            'don_hang_gan_day'   => $don_hang_gan_day,
            'don_hang'           => $don_hang,
            'vouchers'           => $vouchers,
            'yeu_thich'          => $yeu_thich,
            'thong_bao'          => $thong_bao,
            'danh_gia'           => $danh_gia,
            'tat_ca_hang'        => $tat_ca_hang,
            'hang_tiep_theo'     => $hang_tiep_theo,
            'lich_su_ban_menh'   => $lichSuBanMenh,
            'danh_sach_dia_chi'  => $danh_sach_dia_chi,
        ];

        $this->view('tai_khoan', $data);
    }

    /**
     * API: Cập nhật hồ sơ cá nhân
     */
    public function updateProfile()
    {
        if (empty($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Chưa đăng nhập']);
            return;
        }

        $userId = $_SESSION['user_id'];

        $data = [
            'ho_ten'        => $_POST['ho_ten'] ?? '',
            'gioi_tinh'     => $_POST['gioi_tinh'] ?? '',
            'so_dien_thoai' => $_POST['so_dien_thoai'] ?? '',
            'dia_chi'       => $_POST['dia_chi'] ?? '',
        ];

        // Build ngay_sinh from day/month/year
        if (!empty($_POST['ngay_sinh_ngay']) && !empty($_POST['ngay_sinh_thang']) && !empty($_POST['ngay_sinh_nam'])) {
            $data['ngay_sinh'] = sprintf(
                '%04d-%02d-%02d',
                (int)$_POST['ngay_sinh_nam'],
                (int)$_POST['ngay_sinh_thang'],
                (int)$_POST['ngay_sinh_ngay']
            );
            $data['nam_sinh'] = (int)$_POST['ngay_sinh_nam'];
        }

        try {
            $result = $this->taiKhoanService->capNhatHoSo($userId, $data);
            echo json_encode(['success' => true, 'message' => 'Cập nhật thành công!']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API: Đổi mật khẩu
     */
    public function changePassword()
    {
        if (empty($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Chưa đăng nhập']);
            return;
        }

        $matKhauCu = $_POST['mat_khau_cu'] ?? '';
        $matKhauMoi = $_POST['mat_khau_moi'] ?? '';
        $xacNhan = $_POST['xac_nhan_mat_khau'] ?? '';

        if (empty($matKhauCu) || empty($matKhauMoi)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng nhập đầy đủ thông tin']);
            return;
        }

        if (strlen($matKhauMoi) < 6) {
            echo json_encode(['success' => false, 'message' => 'Mật khẩu mới phải có ít nhất 6 ký tự']);
            return;
        }

        if ($matKhauMoi !== $xacNhan) {
            echo json_encode(['success' => false, 'message' => 'Mật khẩu xác nhận không khớp']);
            return;
        }

        try {
            $this->taiKhoanService->doiMatKhau($_SESSION['user_id'], $matKhauCu, $matKhauMoi);
            echo json_encode(['success' => true, 'message' => 'Đổi mật khẩu thành công!']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API: Đánh dấu đã đọc thông báo
     */
    public function markNotificationRead()
    {
        if (empty($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Chưa đăng nhập']);
            return;
        }

        $thongBaoModel = new ThongBaoModel();
        $id = $_POST['id'] ?? '';

        if ($id === 'all') {
            $thongBaoModel->markAllAsRead(false, $_SESSION['user_id']);
        } else if (!empty($id)) {
            $thongBaoModel->markAsRead($id);
        }

        echo json_encode(['success' => true]);
    }

    /**
     * API: Xóa thông báo
     */
    public function deleteNotification()
    {
        if (empty($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Chưa đăng nhập']);
            return;
        }

        $thongBaoModel = new ThongBaoModel();
        $id = $_POST['id'] ?? '';

        if ($id === 'all_read') {
            // Xóa tất cả đã đọc
            $thongBaoModel->xoaTatCaDaDoc($_SESSION['user_id']);
        } else if (!empty($id)) {
            $thongBaoModel->xoa($id);
        }

        echo json_encode(['success' => true]);
    }
}
