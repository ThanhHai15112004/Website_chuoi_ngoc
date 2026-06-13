<?php
namespace App\Controllers\User;

use App\Core\Controller;
use App\Models\Admin\KhachHangModel;
use App\Models\Admin\PhuongThucThanhToanModel;
use App\Models\Admin\TaiKhoanNganHangModel;
use App\Services\User\GioHangService;
use App\Models\Admin\DonHangModel;
use App\Services\ThuDienTuService;
use App\Services\ThongBaoService;

class ThanhToanController extends Controller {
    public function index() {
        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['flash_message'] = 'Vui lòng đăng nhập để tiếp tục thanh toán.';
            $_SESSION['flash_type'] = 'warning';
            header('Location: ' . APP_URL . '/dang-nhap?redirect=thanh-toan');
            exit;
        }

        $userId = $_SESSION['user_id'];

        // Lấy giỏ hàng
        $gioHangService = new GioHangService();
        $gio_hang_full = $gioHangService->getCart();
        $gio_hang = array_filter($gio_hang_full, fn($i) => $i['con_hang']); // Chỉ thanh toán sản phẩm còn hàng

        if (empty($gio_hang)) {
            $_SESSION['flash_message'] = 'Giỏ hàng của bạn đang trống hoặc các sản phẩm đã hết hàng.';
            $_SESSION['flash_type'] = 'error';
            header('Location: ' . APP_URL . '/gio-hang');
            exit;
        }

        // Lấy thông tin khách hàng
        $khachHangModel = new KhachHangModel();
        $user_info = $khachHangModel->timTheoId($userId);

        if (!$user_info) {
            header('Location: ' . APP_URL . '/dang-xuat');
            exit;
        }

        // Lấy Sổ địa chỉ
        $soDiaChiModel = new \App\Models\User\SoDiaChiModel();
        $danh_sach_dia_chi = $soDiaChiModel->getAllByUserId($userId);

        // Tự động migrate địa chỉ cũ từ bảng nguoi_dung sang so_dia_chi nếu chưa có
        if (empty($danh_sach_dia_chi) && (!empty($user_info['dia_chi']) || !empty($user_info['so_dien_thoai']))) {
            // Tách thử địa chỉ để điền vào phường xã nếu có thể
            $dia_chi_parts = explode(',', $user_info['dia_chi']);
            $dia_chi_parts = array_map('trim', $dia_chi_parts);
            
            $tinh = $quan = $phuong = '';
            $cu_the = $user_info['dia_chi'];
            
            if (count($dia_chi_parts) >= 4) {
                $tinh = array_pop($dia_chi_parts);
                $quan = array_pop($dia_chi_parts);
                $phuong = array_pop($dia_chi_parts);
                $cu_the = implode(', ', $dia_chi_parts);
            }

            $soDiaChiModel->add([
                'id_nguoi_dung' => $userId,
                'ho_ten' => $user_info['ho_ten'],
                'so_dien_thoai' => $user_info['so_dien_thoai'],
                'tinh_thanh' => $tinh,
                'quan_huyen' => $quan,
                'phuong_xa' => $phuong,
                'dia_chi_cu_the' => $cu_the,
                'la_mac_dinh' => 1
            ]);
            $danh_sach_dia_chi = $soDiaChiModel->getAllByUserId($userId);
        }

        $dia_chi_mac_dinh = !empty($danh_sach_dia_chi) ? $danh_sach_dia_chi[0] : null;

        // Lấy phương thức thanh toán
        $ptttModel = new PhuongThucThanhToanModel();
        $phuong_thuc_tt = array_filter($ptttModel->getAll(), fn($pt) => $pt['trang_thai'] == 1);

        // Lấy ngân hàng mặc định
        $tknhModel = new TaiKhoanNganHangModel();
        $tk_ngan_hang_all = $tknhModel->getAll();
        $ngan_hang_mac_dinh = null;
        foreach ($tk_ngan_hang_all as $tk) {
            if ($tk['trang_thai'] == 1) {
                if ($tk['la_mac_dinh'] == 1) {
                    $ngan_hang_mac_dinh = $tk;
                    break;
                } elseif (!$ngan_hang_mac_dinh) {
                    $ngan_hang_mac_dinh = $tk; // fallback
                }
            }
        }

        // Tính tiền
        $tong_tam_tinh = 0;
        foreach ($gio_hang as $item) {
            $tong_tam_tinh += $item['gia'] * $item['so_luong'];
        }

        $order_discount = 0;
        $max_freeship_discount = 0;
        $applied_vouchers = $_SESSION['cart_vouchers'] ?? [];
        $danh_sach_voucher_ap_dung = [];

        if (!empty($applied_vouchers)) {
            $maGiamGiaModel = new \App\Models\Admin\MaGiamGiaModel();
            foreach ($applied_vouchers as $id => $vc) {
                // Check lại lần nữa cho chắc
                $check = $maGiamGiaModel->checkVoucherByCode($vc['ma_voucher'], $gio_hang, $userId);
                if ($check['success']) {
                    if ($check['loai_giam'] == 3) { // freeship
                        $max_freeship_discount += $check['giam_gia'];
                    } else {
                        $order_discount += $check['giam_gia'];
                    }
                    $danh_sach_voucher_ap_dung[] = $check;
                } else {
                    unset($_SESSION['cart_vouchers'][$id]);
                }
            }
        }

        $phi_van_chuyen = 0; // Mặc định ở frontend chọn Tiêu chuẩn = 0đ. Sẽ được tính lại bằng JS.

        $thanh_tien = max(0, $tong_tam_tinh - $order_discount + max(0, $phi_van_chuyen - $max_freeship_discount));

        $this->view('thanh_toan', [
            'title' => 'Thanh toán - Chuỗi Ngọc',
            'gio_hang' => $gio_hang,
            'user_info' => $user_info,
            'phuong_thuc_tt' => $phuong_thuc_tt,
            'ngan_hang' => $ngan_hang_mac_dinh,
            'tong_tam_tinh' => $tong_tam_tinh,
            'order_discount' => $order_discount,
            'max_freeship_discount' => $max_freeship_discount,
            'phi_van_chuyen' => $phi_van_chuyen,
            'thanh_tien' => $thanh_tien,
            'danh_sach_voucher_ap_dung' => $danh_sach_voucher_ap_dung,
            'danh_sach_dia_chi' => $danh_sach_dia_chi,
            'dia_chi_mac_dinh' => $dia_chi_mac_dinh
        ]);
    }

    public function placeOrder() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: ' . APP_URL . '/thanh-toan');
            exit;
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . APP_URL . '/dang-nhap');
            exit;
        }

        $userId = $_SESSION['user_id'];

        $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'] ?? '';
        $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'] ?? '';
        $dia_chi = $_POST['dia_chi'] ?? '';
        $ghi_chu = $_POST['ghi_chu'] ?? '';
        $pt_thanh_toan_id = $_POST['phuong_thuc_thanh_toan'] ?? null;

        if (empty($ten_nguoi_nhan) || empty($sdt_nguoi_nhan) || empty($dia_chi) || empty($pt_thanh_toan_id)) {
            $_SESSION['flash_message'] = 'Vui lòng điền đầy đủ thông tin giao hàng và phương thức thanh toán.';
            $_SESSION['flash_type'] = 'error';
            header('Location: ' . APP_URL . '/thanh-toan');
            exit;
        }

        // Cập nhật lại thông tin user nếu chưa có địa chỉ
        $khachHangModel = new KhachHangModel();
        $userInfo = $khachHangModel->timTheoId($userId);
        if (empty($userInfo['dia_chi']) && empty($userInfo['so_dien_thoai'])) {
            $khachHangModel->capNhat($userId, [
                'dia_chi' => $dia_chi,
                'so_dien_thoai' => $sdt_nguoi_nhan
            ]);
        }

        // Lấy lại giỏ hàng và voucher
        $gioHangService = new GioHangService();
        $gio_hang_full = $gioHangService->getCart();
        $gio_hang = array_filter($gio_hang_full, fn($i) => $i['con_hang']);

        if (empty($gio_hang)) {
            $_SESSION['flash_message'] = 'Giỏ hàng của bạn đang trống.';
            $_SESSION['flash_type'] = 'error';
            header('Location: ' . APP_URL . '/gio-hang');
            exit;
        }

        $tong_tam_tinh = 0;
        $products_data = [];
        foreach ($gio_hang as $item) {
            $tong_tam_tinh += $item['gia'] * $item['so_luong'];
            $products_data[] = [
                'id' => $item['id_bien_the'], // Dùng id_bien_the cho chi_tiet_don_hang
                'quantity' => $item['so_luong'],
                'price' => $item['gia']
            ];
        }

        $order_discount = 0;
        $max_freeship_discount = 0;
        $id_voucher_db = null;
        $applied_vouchers = $_SESSION['cart_vouchers'] ?? [];
        if (!empty($applied_vouchers)) {
            $maGiamGiaModel = new \App\Models\Admin\MaGiamGiaModel();
            foreach ($applied_vouchers as $id => $vc) {
                $check = $maGiamGiaModel->checkVoucherByCode($vc['ma_voucher'], $gio_hang, $userId);
                if ($check['success']) {
                    if ($check['loai_giam'] == 3) {
                        $max_freeship_discount += $check['giam_gia'];
                    } else {
                        $order_discount += $check['giam_gia'];
                    }
                    if (!$id_voucher_db) {
                        $id_voucher_db = $check['id_voucher']; // Tạm thời chỉ hỗ trợ lưu 1 id_voucher vào DB don_hang
                    }
                }
            }
        }

        $phi_van_chuyen_goc = isset($_POST['phi_ship_input']) ? intval($_POST['phi_ship_input']) : 0;
        $phi_van_chuyen_thuc_te = max(0, $phi_van_chuyen_goc - $max_freeship_discount);
        
        $thanh_tien = max(0, $tong_tam_tinh - $order_discount + $phi_van_chuyen_thuc_te);
        // Tổng giảm giá để lưu DB là tổng của order_discount + mức giảm freeship được áp dụng
        $tong_giam_gia = $order_discount + min($phi_van_chuyen_goc, $max_freeship_discount);

        // Tên phương thức thanh toán
        $ptttModel = new PhuongThucThanhToanModel();
        $ptttInfo = $ptttModel->getById($pt_thanh_toan_id);
        $ten_pt_thanh_toan = $ptttInfo ? $ptttInfo['ten'] : 'COD';

        $orderData = [
            'id_khach_hang' => $userId,
            'ten_nguoi_nhan' => $ten_nguoi_nhan,
            'sdt_nguoi_nhan' => $sdt_nguoi_nhan,
            'dia_chi_giao_hang' => $dia_chi,
            'phuong_thuc_thanh_toan' => $ten_pt_thanh_toan,
            'tong_tien_hang' => $tong_tam_tinh,
            'tong_tien' => $thanh_tien,
            'giam_gia' => $tong_giam_gia,
            'phi_van_chuyen' => $phi_van_chuyen_thuc_te,
            'id_voucher' => $id_voucher_db,
            'ghi_chu' => $ghi_chu,
            'trang_thai_thanh_toan' => 0,
            'products' => $products_data
        ];

        $donHangModel = new DonHangModel();
        $result = $donHangModel->taoDonHang($orderData);

        if ($result['success']) {
            // Xóa giỏ hàng
            $gioHangService->clearCart($userId);
            unset($_SESSION['cart_vouchers']);

            // Gửi thông báo + email xác nhận đơn hàng
            try {
                $don_hang = $donHangModel->layChiTiet($result['id_don_hang']);
                if ($don_hang) {
                    $items = $donHangModel->laySanPhamDonHang($result['id_don_hang']);
                    $notif = new ThongBaoService();
                    $notif->orderCreated($don_hang);
                    ThuDienTuService::sendOrderConfirmation($don_hang, $items);
                }
            } catch (\Exception $ex) {
                error_log('[Checkout] Lỗi gửi mail/thông báo: ' . $ex->getMessage());
            }

            header('Location: ' . APP_URL . '/dat-hang-thanh-cong?id=' . $result['id_don_hang']);
            exit;
        } else {
            $_SESSION['flash_message'] = 'Đặt hàng thất bại: ' . $result['message'];
            $_SESSION['flash_type'] = 'error';
            header('Location: ' . APP_URL . '/thanh-toan');
            exit;
        }
    }

    public function success() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . APP_URL . '/dang-nhap');
            exit;
        }

        $id_don_hang = $_GET['id'] ?? '';
        if (empty($id_don_hang)) {
            header('Location: ' . APP_URL . '/');
            exit;
        }

        $donHangModel = new DonHangModel();
        $order_info = $donHangModel->layChiTiet($id_don_hang);

        if (!$order_info || $order_info['id_nguoi_dung'] != $_SESSION['user_id']) {
            header('Location: ' . APP_URL . '/');
            exit;
        }

        $this->view('dat_hang_thanh_cong', [
            'title' => 'Đặt hàng thành công - Chuỗi Ngọc',
            'order_info' => $order_info
        ]);
    }
}
