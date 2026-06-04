<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;

class ThongBaoModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Lấy thông báo cho Admin (id_nguoi_dung IS NULL)
     */
    public function getAdminNotifications()
    {
        $sql = "SELECT * FROM thong_bao WHERE id_nguoi_dung IS NULL ORDER BY ngay_tao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy thông báo cho 1 người dùng cụ thể
     */
    public function getUserNotifications($userId)
    {
        $sql = "SELECT * FROM thong_bao WHERE id_nguoi_dung = ? ORDER BY ngay_tao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Thêm 1 thông báo
     */
    public function themMoi($data)
    {
        $id = uniqid('tb_');
        $sql = "INSERT INTO thong_bao (id, id_nguoi_dung, tieu_de, noi_dung, loai_thong_bao, link, da_doc, ngay_tao) 
                VALUES (?, ?, ?, ?, ?, ?, 0, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            $id,
            $data['id_nguoi_dung'] ?? null,
            $data['tieu_de'],
            $data['noi_dung'],
            $data['loai_thong_bao'],
            $data['link'] ?? null
        ]);
        return $id;
    }

    /**
     * Thêm thông báo cho nhiều người dùng (Tất cả hoặc 1 nhóm)
     */
    public function insertMultiple($userIds, $data)
    {
        try {
            $this->db->beginTransaction();
            $sql = "INSERT INTO thong_bao (id, id_nguoi_dung, tieu_de, noi_dung, loai_thong_bao, link, da_doc, ngay_tao) 
                    VALUES (?, ?, ?, ?, ?, ?, 0, NOW())";
            $stmt = $this->db->prepare($sql);
            
            foreach ($userIds as $userId) {
                $stmt->execute([
                    uniqid('tb_'),
                    $userId,
                    $data['tieu_de'],
                    $data['noi_dung'],
                    $data['loai_thong_bao'],
                    $data['link'] ?? null
                ]);
            }
            $this->db->commit();
            return true;
        } catch (\Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    /**
     * Đánh dấu đã đọc
     */
    public function markAsRead($id)
    {
        $sql = "UPDATE thong_bao SET da_doc = 1 WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
    
    /**
     * Đánh dấu chưa đọc
     */
    public function markAsUnread($id)
    {
        $sql = "UPDATE thong_bao SET da_doc = 0 WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    /**
     * Đánh dấu tất cả đã đọc
     */
    public function markAllAsRead($is_admin = true, $userId = null)
    {
        if ($is_admin) {
            $sql = "UPDATE thong_bao SET da_doc = 1 WHERE id_nguoi_dung IS NULL";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute();
        } else {
            $sql = "UPDATE thong_bao SET da_doc = 1 WHERE id_nguoi_dung = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$userId]);
        }
    }

    /**
     * Xóa thông báo
     */
    public function xoa($id)
    {
        $sql = "DELETE FROM thong_bao WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    /**
     * Xóa tất cả thông báo đã đọc của user
     */
    public function xoaTatCaDaDoc($userId)
    {
        $sql = "DELETE FROM thong_bao WHERE id_nguoi_dung = ? AND da_doc = 1";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$userId]);
    }
}
