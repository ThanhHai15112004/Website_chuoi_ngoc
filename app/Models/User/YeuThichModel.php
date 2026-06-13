<?php

namespace App\Models\User;

use App\Core\Database;
use PDO;

class YeuThichModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Kiểm tra user đã yêu thích sản phẩm chưa
     */
    public function isLiked($userId, $productId)
    {
        $sql = "SELECT COUNT(*) FROM san_pham_yeu_thich WHERE id_nguoi_dung = ? AND id_san_pham = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId, $productId]);
        return (int)$stmt->fetchColumn() > 0;
    }

    /**
     * Toggle yêu thích: thêm nếu chưa có, xóa nếu đã có
     * @return bool true = đã thêm, false = đã xóa
     */
    public function toggle($userId, $productId)
    {
        if ($this->isLiked($userId, $productId)) {
            $sql = "DELETE FROM san_pham_yeu_thich WHERE id_nguoi_dung = ? AND id_san_pham = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$userId, $productId]);
            return false; // đã xóa
        } else {
            $sql = "INSERT INTO san_pham_yeu_thich (id_nguoi_dung, id_san_pham) VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$userId, $productId]);
            return true; // đã thêm
        }
    }

    /**
     * Lấy danh sách ID sản phẩm đã yêu thích
     */
    public function getProductIds($userId)
    {
        $sql = "SELECT id_san_pham FROM san_pham_yeu_thich WHERE id_nguoi_dung = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Đếm tổng sản phẩm yêu thích
     */
    public function countByUser($userId)
    {
        $sql = "SELECT COUNT(*) FROM san_pham_yeu_thich WHERE id_nguoi_dung = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return (int)$stmt->fetchColumn();
    }
}
