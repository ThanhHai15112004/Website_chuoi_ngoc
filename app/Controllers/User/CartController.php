<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Services\User\CartService;

class CartController extends Controller {
    private $cartService;

    public function __construct() {
        $this->cartService = new CartService();
    }

    /**
     * GET /gio-hang — Trang giỏ hàng
     */
    public function index() {
        $gio_hang = $this->cartService->getCart();

        // Tính tổng tạm tính
        $tong_tam_tinh = 0;
        $tong_tiet_kiem = 0;
        foreach ($gio_hang as $item) {
            if ($item['con_hang']) {
                $tong_tam_tinh += $item['gia'] * $item['so_luong'];
                if ($item['gia_goc']) {
                    $tong_tiet_kiem += ($item['gia_goc'] - $item['gia']) * $item['so_luong'];
                }
            }
        }

        // Lọc giỏ hàng hợp lệ để tính voucher
        $gio_hang_hop_le = array_filter($gio_hang, fn($i) => $i['con_hang']);

        // Logic check voucher khi tải lại trang, cần update lại mức giảm giá nếu tổng tiền thay đổi
        $applied_vouchers = $_SESSION['cart_vouchers'] ?? [];
        $tong_giam_gia = 0; // Giữ lại tên biến tong_giam_gia cho tương thích với view nhưng nó chỉ là order_discount
        
        if (!empty($applied_vouchers)) {
            $userId = $_SESSION['user']['id'] ?? null;
            $voucherModel = new \App\Models\Admin\VoucherModel();
            foreach ($applied_vouchers as $id => $vc) {
                $check = $voucherModel->checkVoucherByCode($vc['ma_voucher'], $gio_hang_hop_le, $userId);
                if ($check['success']) {
                    $_SESSION['cart_vouchers'][$id] = $check;
                    if ($check['loai_giam'] != 3) {
                        $tong_giam_gia += $check['giam_gia']; // Trang giỏ hàng chỉ trừ tiền hàng
                    }
                } else {
                    unset($_SESSION['cart_vouchers'][$id]); // Đơn hàng k còn đủ đk
                }
            }
            $applied_vouchers = $_SESSION['cart_vouchers'];
        }

        $this->view('gio_hang', [
            'tieu_de' => 'Giỏ hàng của bạn - Chuỗi Ngọc',
            'trang_hien_tai' => 'gio_hang',
            'gio_hang' => $gio_hang,
            'tong_tam_tinh' => $tong_tam_tinh,
            'tong_tiet_kiem' => $tong_tiet_kiem,
            'tong_giam_gia' => $tong_giam_gia,
            'applied_vouchers' => $applied_vouchers
        ]);
    }

    /**
     * POST /gio-hang/them — API thêm SP vào giỏ
     */
    public function add() {
        header('Content-Type: application/json; charset=utf-8');

        $id_san_pham = $_POST['id_san_pham'] ?? null;
        $id_bien_the = $_POST['id_bien_the'] ?? null;
        $so_luong = isset($_POST['so_luong']) ? max(1, (int)$_POST['so_luong']) : 1;

        if (empty($id_san_pham)) {
            echo json_encode(['success' => false, 'message' => 'Thiếu thông tin sản phẩm.']);
            return;
        }

        // Trim empty string to null
        if ($id_bien_the === '') $id_bien_the = null;

        $result = $this->cartService->addItem($id_san_pham, $id_bien_the, $so_luong);
        echo json_encode($result);
    }

    /**
     * POST /gio-hang/cap-nhat — API cập nhật số lượng
     */
    public function update() {
        header('Content-Type: application/json; charset=utf-8');

        $cart_id = $_POST['cart_id'] ?? null;
        $so_luong = isset($_POST['so_luong']) ? max(1, (int)$_POST['so_luong']) : 1;

        if ($cart_id === null || $cart_id === '') {
            echo json_encode(['success' => false, 'message' => 'Thiếu thông tin.']);
            return;
        }

        // For session cart, cart_id is numeric index
        if (is_numeric($cart_id)) {
            $cart_id = (int)$cart_id;
        }

        $result = $this->cartService->updateItem($cart_id, $so_luong);
        echo json_encode($result);
    }

    /**
     * POST /gio-hang/xoa — API xóa SP khỏi giỏ
     */
    public function remove() {
        header('Content-Type: application/json; charset=utf-8');

        $cart_id = $_POST['cart_id'] ?? null;

        if ($cart_id === null || $cart_id === '') {
            echo json_encode(['success' => false, 'message' => 'Thiếu thông tin.']);
            return;
        }

        if (is_numeric($cart_id)) {
            $cart_id = (int)$cart_id;
        }

        $result = $this->cartService->removeItem($cart_id);
        echo json_encode($result);
    }

    /**
     * GET /gio-hang/count — API đếm số SP trong giỏ
     */
    public function count() {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode(['count' => $this->cartService->getCount()]);
    }

    /**
     * POST /gio-hang/variants — API lấy biến thể của SP (cho modal chọn biến thể)
     */
    public function variants() {
        header('Content-Type: application/json; charset=utf-8');

        $id_san_pham = $_POST['id_san_pham'] ?? $_GET['id'] ?? null;
        if (!$id_san_pham) {
            echo json_encode(['success' => false, 'message' => 'Thiếu ID sản phẩm.']);
            return;
        }

        $data = $this->cartService->getProductVariants($id_san_pham);
        if (!$data) {
            echo json_encode(['success' => false, 'message' => 'Sản phẩm không tồn tại.']);
            return;
        }

        echo json_encode(['success' => true, 'data' => $data]);
    }

    public function getVouchersForCart() {
        header('Content-Type: application/json; charset=utf-8');
        
        $gio_hang = $this->cartService->getCart();
        $gio_hang_hop_le = array_filter($gio_hang, fn($i) => $i['con_hang']);

        $userId = $_SESSION['user_id'] ?? $_SESSION['user']['id'] ?? null;
        $voucherModel = new \App\Models\Admin\VoucherModel();
        $vouchers = $voucherModel->getEligibleVouchersForCart($gio_hang_hop_le, $userId);

        echo json_encode(['success' => true, 'data' => $vouchers]);
    }

    public function applyVoucher() {
        header('Content-Type: application/json; charset=utf-8');
        
        $ma = $_POST['ma_voucher'] ?? '';
        if (empty($ma)) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng nhập mã ưu đãi.']);
            return;
        }

        $gio_hang = $this->cartService->getCart();
        $gio_hang_hop_le = array_filter($gio_hang, fn($i) => $i['con_hang']);

        if (empty($gio_hang_hop_le)) {
            echo json_encode(['success' => false, 'message' => 'Giỏ hàng trống hoặc các sản phẩm đã hết hàng.']);
            return;
        }

        $userId = $_SESSION['user_id'] ?? $_SESSION['user']['id'] ?? null;
        $voucherModel = new \App\Models\Admin\VoucherModel();
        $result = $voucherModel->checkVoucherByCode($ma, $gio_hang_hop_le, $userId);

        if (!$result['success']) {
            echo json_encode($result);
            return;
        }

        // Logic giới hạn 2 voucher (1 freeship, 1 discount)
        if (!isset($_SESSION['cart_vouchers'])) {
            $_SESSION['cart_vouchers'] = [];
        }

        $loaiGiam = $result['loai_giam'];
        $isFreeship = $loaiGiam == 3;

        // Check if already applied
        if (isset($_SESSION['cart_vouchers'][$result['id_voucher']])) {
            echo json_encode(['success' => false, 'message' => 'Mã ưu đãi này đã được áp dụng.']);
            return;
        }

        // Thay thế mã cùng loại nếu đã tồn tại
        foreach ($_SESSION['cart_vouchers'] as $id => $vc) {
            $existingIsFreeship = $vc['loai_giam'] == 3;
            if ($isFreeship && $existingIsFreeship) {
                unset($_SESSION['cart_vouchers'][$id]); // Xóa freeship cũ
            } elseif (!$isFreeship && !$existingIsFreeship) {
                unset($_SESSION['cart_vouchers'][$id]); // Xóa discount cũ
            }
        }

        $_SESSION['cart_vouchers'][$result['id_voucher']] = $result;

        // Tính lại tổng giảm giá
        $order_discount = 0;
        $shipping_discount_max = 0;
        foreach ($_SESSION['cart_vouchers'] as $vc) {
            if ($vc['loai_giam'] == 3) { // freeship
                $shipping_discount_max += $vc['giam_gia'];
            } else {
                $order_discount += $vc['giam_gia'];
            }
        }

        echo json_encode([
            'success' => true, 
            'message' => $result['message'], 
            'order_discount' => $order_discount,
            'shipping_discount_max' => $shipping_discount_max,
            'applied_vouchers' => array_values($_SESSION['cart_vouchers'])
        ]);
    }

    public function removeVoucher() {
        header('Content-Type: application/json; charset=utf-8');
        
        $id = $_POST['id_voucher'] ?? '';
        if (isset($_SESSION['cart_vouchers'][$id])) {
            unset($_SESSION['cart_vouchers'][$id]);
        }

        $order_discount = 0;
        $shipping_discount_max = 0;
        if (isset($_SESSION['cart_vouchers'])) {
            foreach ($_SESSION['cart_vouchers'] as $vc) {
                if ($vc['loai_giam'] == 3) {
                    $shipping_discount_max += $vc['giam_gia'];
                } else {
                    $order_discount += $vc['giam_gia'];
                }
            }
        }

        echo json_encode([
            'success' => true, 
            'order_discount' => $order_discount,
            'shipping_discount_max' => $shipping_discount_max,
            'applied_vouchers' => array_values($_SESSION['cart_vouchers'] ?? [])
        ]);
    }
}
