<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Models\Admin\DonHangModel;
use App\Services\MailService;
use App\Services\NotificationService;

class DonHangController extends Controller {
    public function detail() {
        if (!isset($_SESSION['user_id'])) {
            header('Location: ' . APP_URL . '/dang-nhap');
            exit;
        }

        $id_don_hang = $_GET['id'] ?? '';
        if (empty($id_don_hang)) {
            header('Location: ' . APP_URL . '/tai-khoan#tab-don-hang');
            exit;
        }

        $donHangModel = new DonHangModel();
        
        // Cần tìm ID thật (UUID) từ mã đơn hàng (order_code)
        // Vì trong route /chi-tiet-don-hang?id=DHxxxx nó là mã đơn hàng
        // Trong DonHangModel, layChiTiet nhận id (UUID).
        // Ta cần phải lấy id từ mã đơn hàng trước.
        $db = \App\Core\Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT id FROM don_hang WHERE ma_don_hang = ? AND id_nguoi_dung = ? LIMIT 1");
        $stmt->execute([$id_don_hang, $_SESSION['user_id']]);
        $realId = $stmt->fetchColumn();

        if (!$realId) {
            header('Location: ' . APP_URL . '/tai-khoan#tab-don-hang');
            exit;
        }

        $rawOrder = $donHangModel->layChiTiet($realId);
        
        if (!$rawOrder) {
            header('Location: ' . APP_URL . '/tai-khoan#tab-don-hang');
            exit;
        }

        $rawItems = $donHangModel->laySanPhamDonHang($realId);
        $rawHistory = $donHangModel->layLichSuDonHang($realId);

        // Mapping Order Data
        $statusMap = [
            0 => 'pending',
            1 => 'confirmed',
            2 => 'shipping',
            3 => 'completed',
            4 => 'cancelled'
        ];

        $paymentStatusMap = [
            0 => 'Chờ thanh toán',
            1 => 'Đã thanh toán',
            2 => 'Đã hoàn tiền' // Hoặc trạng thái khác
        ];

        $order = [
            'id' => $rawOrder['id'],
            'order_code' => $rawOrder['ma_don_hang'],
            'created_at' => $rawOrder['ngay_tao'],
            'status' => $statusMap[$rawOrder['trang_thai_don_hang']] ?? 'pending',
            'payment_method' => $rawOrder['pt_thanh_toan'],
            'payment_status' => $paymentStatusMap[$rawOrder['trang_thai_thanh_toan']] ?? 'Chờ thanh toán',
            'total_amount' => $rawOrder['thanh_tien'],
            'subtotal' => $rawOrder['tong_tien'], // tong_tien là tạm tính, thanh_tien là sau giảm + ship
            'shipping_fee' => $rawOrder['phi_van_chuyen'] ?? $rawOrder['phi_ship'] ?? 0,
            'gift_fee' => 0,
            'discount' => $rawOrder['giam_gia'] ?? $rawOrder['tien_giam_gia'] ?? 0,
            'customer_name' => $rawOrder['ten_nguoi_nhan'],
            'customer_phone' => $rawOrder['sdt_nguoi_nhan'],
            'customer_address' => $rawOrder['dia_chi_giao_hang'],
            'shipping_provider' => $rawOrder['don_vi_van_chuyen'] ?? 'Giao hàng tiêu chuẩn',
            'shipping_expected_dates' => $rawOrder['ngay_du_kien_giao'] ?? '2-4 ngày',
            'note' => $rawOrder['ghi_chu'],
            'extra_services' => $rawOrder['dich_vu_them'] ?? '[]'
        ];

        // Mapping Order Items
        $orderItems = [];
        foreach ($rawItems as $item) {
            $orderItems[] = [
                'product_image' => get_image_url($item['image']),
                'product_name' => $item['ten_sp'],
                'price' => $item['don_gia'],
                'note' => '', // Ghi chú riêng cho sản phẩm nếu có
                'variant' => $item['variant_name'],
                'quantity' => $item['so_luong']
            ];
        }

        // Mapping Order History
        $orderHistory = [];
        foreach ($rawHistory as $history) {
            $orderHistory[] = [
                'created_at' => $history['ngay_tao'],
                'description' => $history['ghi_chu'] ?: 'Cập nhật trạng thái thành ' . ($history['trang_thai_moi'] ?? '')
            ];
        }

        $this->view('chi_tiet_don_hang', [
            'title' => 'Chi tiết đơn hàng ' . $order['order_code'],
            'order' => $order,
            'orderItems' => $orderItems,
            'orderHistory' => $orderHistory
        ]);
    }

    public function cancel() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Không có quyền truy cập']);
            return;
        }

        $orderId = $_POST['order_id'] ?? '';
        $reason = $_POST['cancel_reason'] ?? '';

        if (empty($orderId)) {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy đơn hàng']);
            return;
        }

        $donHangModel = new DonHangModel();
        
        // Kiểm tra xem đơn hàng có thuộc về user hiện tại và có đang ở trạng thái cho phép hủy không
        $rawOrder = $donHangModel->layChiTiet($orderId);
        
        if (!$rawOrder || $rawOrder['id_nguoi_dung'] != $_SESSION['user_id']) {
            echo json_encode(['success' => false, 'message' => 'Đơn hàng không hợp lệ']);
            return;
        }

        if ($rawOrder['trang_thai_don_hang'] != 0) { // 0: Chờ xác nhận
            echo json_encode(['success' => false, 'message' => 'Không thể hủy đơn hàng ở trạng thái hiện tại']);
            return;
        }

        $note = "Khách hàng hủy đơn: " . $reason;
        
        // Cập nhật trạng thái thành 4 (Đã hủy)
        $result = $donHangModel->capNhatTrangThai($orderId, 4, $note);
        
        if ($result) {
            // Gửi thông báo + email cho user
            try {
                $notif = new NotificationService();
                $notif->orderStatusChanged($rawOrder, 4, $reason);
                MailService::sendOrderCancelled($rawOrder, $reason);
            } catch (\Exception $ex) {
                error_log('[DonHang] Lỗi gửi mail hủy đơn: ' . $ex->getMessage());
            }
            echo json_encode(['success' => true, 'message' => 'Đã hủy đơn hàng thành công']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Không thể hủy đơn hàng']);
        }
    }
}
