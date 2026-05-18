<?php

namespace App\Models;

use App\Core\Database;
use PDO;
use PDOException;

class Order
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = Database::getInstance()->getConnection();
        } catch (PDOException $e) {
            $this->db = null;
        }
    }

    /**
     * Lấy thông tin chi tiết của một đơn hàng
     */
    public function getOrderById($id)
    {
        if (!$this->db) return null;
        try {
            $stmt = $this->db->prepare("SELECT * FROM orders WHERE id = :id OR order_code = :order_code");
            $stmt->execute(['id' => $id, 'order_code' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Log error
            return null;
        }
    }

    /**
     * Lấy danh sách sản phẩm trong đơn hàng
     */
    public function getOrderItems($orderId)
    {
        if (!$this->db) return [];
        try {
            $stmt = $this->db->prepare("SELECT * FROM order_items WHERE order_id = :order_id");
            $stmt->execute(['order_id' => $orderId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Lấy lịch sử cập nhật của đơn hàng
     */
    public function getOrderHistory($orderId)
    {
        if (!$this->db) return [];
        try {
            $stmt = $this->db->prepare("SELECT * FROM order_history WHERE order_id = :order_id ORDER BY created_at DESC");
            $stmt->execute(['order_id' => $orderId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return [];
        }
    }

    /**
     * Cập nhật trạng thái đơn hàng (ví dụ: Hủy đơn)
     */
    public function updateOrderStatus($orderId, $status, $cancelReason = null)
    {
        if (!$this->db) return false;
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("UPDATE orders SET status = :status, cancel_reason = :cancel_reason, updated_at = NOW() WHERE id = :id");
            $stmt->execute([
                'status' => $status,
                'cancel_reason' => $cancelReason,
                'id' => $orderId
            ]);

            // Thêm vào lịch sử
            $historyStmt = $this->db->prepare("INSERT INTO order_history (order_id, status, description, created_at) VALUES (:order_id, :status, :description, NOW())");
            $desc = $status == 'cancelled' ? "Đơn hàng đã bị hủy. Lý do: " . $cancelReason : "Cập nhật trạng thái thành: " . $status;
            $historyStmt->execute([
                'order_id' => $orderId,
                'status' => $status,
                'description' => $desc
            ]);

            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollBack();
            return false;
        }
    }
}
