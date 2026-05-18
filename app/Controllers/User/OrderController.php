<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function detail()
    {
        // Nếu không truyền ID, có thể redirect về trang lịch sử đơn hàng
        // Tạm thời mock một ID nếu null
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $id = 'DH202600123';
        }

        $orderModel = new Order();
        $order = $orderModel->getOrderById($id);
        $orderItems = $orderModel->getOrderItems($id);
        $orderHistory = $orderModel->getOrderHistory($id);

        // Fallback mock data nếu DB chưa có (để giao diện không bị lỗi)
        if (!$order) {
            $order = [
                'id' => 1,
                'order_code' => $id,
                'created_at' => '2026-05-17 20:35:00',
                'status' => 'confirmed', // pending, confirmed, shipping, delivered, completed, cancelled
                'customer_name' => 'Nguyễn Văn A',
                'customer_phone' => '090 123 4567',
                'customer_address' => '123 Nguyễn Trãi, Phường 2, Quận 5, TP. Hồ Chí Minh',
                'payment_method' => 'Thanh toán khi nhận hàng (COD)',
                'payment_status' => 'Chưa thanh toán',
                'shipping_provider' => 'Giao Hàng Tiết Kiệm',
                'shipping_expected_dates' => '19/05 - 21/05',
                'subtotal' => 1530000,
                'shipping_fee' => 30000,
                'gift_fee' => 20000,
                'discount' => 50000,
                'total_amount' => 1360000,
                'note' => 'Gói quà giúp mình và nhớ gọi trước khi giao khoảng 30 phút nhé.',
                'extra_services' => json_encode([
                    ['name' => 'Gói quà sang trọng', 'price' => 20000],
                    ['name' => 'Viết thiệp chúc mừng', 'price' => 0, 'note' => 'Chúc mẹ tuổi mới nhiều sức khỏe và bình an.']
                ])
            ];

            $orderItems = [
                [
                    'product_name' => 'Vòng Ngọc Bích Tài Lộc',
                    'product_image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg',
                    'price' => 850000,
                    'quantity' => 1,
                    'variant' => 'Kích thước hạt: 8mm · Size vòng: 16cm',
                    'note' => 'Ngọc bích · Hợp mệnh Mộc, Hỏa'
                ],
                [
                    'product_name' => 'Chuỗi Trầm Hương Hạt Vuông',
                    'product_image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-2.jpg',
                    'price' => 680000,
                    'quantity' => 1,
                    'variant' => 'Kích thước hạt: 6mm · 108 hạt',
                    'note' => 'Trầm hương tự nhiên · Hợp mọi mệnh'
                ]
            ];

            $orderHistory = [
                [
                    'status' => 'confirmed',
                    'description' => 'Cửa hàng đã xác nhận đơn hàng và đang chuẩn bị sản phẩm.',
                    'created_at' => '2026-05-18 09:10:00'
                ],
                [
                    'status' => 'pending',
                    'description' => 'Đơn hàng đã được tạo. Trạng thái: Chờ xác nhận.',
                    'created_at' => '2026-05-17 20:35:00'
                ]
            ];
        }

        $data = [
            'title' => 'Chi tiết đơn hàng - ' . $order['order_code'],
            'trang_hien_tai' => 'chi_tiet_don_hang',
            'order' => $order,
            'orderItems' => $orderItems,
            'orderHistory' => $orderHistory
        ];

        // Gọi method view từ Core Controller
        $this->view('chi_tiet_don_hang', $data);
    }

    public function cancel()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $orderId = $_POST['order_id'] ?? null;
            $reason = $_POST['cancel_reason'] ?? 'Không có lý do';
            
            if ($orderId) {
                $orderModel = new Order();
                $success = $orderModel->updateOrderStatus($orderId, 'cancelled', $reason);
                if ($success) {
                    // Flash message success...
                    header("Location: " . APP_URL . "/chi-tiet-don-hang?id=" . $orderId);
                    exit;
                }
            }
            // Flash message error...
            header("Location: " . APP_URL . "/tai-khoan");
            exit;
        }
    }
}
