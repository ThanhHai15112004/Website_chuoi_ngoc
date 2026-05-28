<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class HangThanhVienModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layTatCa()
    {
        $sql = "SELECT htv.*, 
                       (SELECT COUNT(*) FROM nguoi_dung nd WHERE nd.id_hang_thanh_vien = htv.id AND nd.id_vai_tro IS NULL) as customer_count
                FROM hang_thanh_vien htv
                ORDER BY htv.chi_tieu_toi_thieu ASC";
        
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function timTheoId($id)
    {
        $sql = "SELECT * FROM hang_thanh_vien WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function capNhat($id, $data)
    {
        $fields = [];
        $params = [];
        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $params[] = $value;
        }
        
        if (empty($fields)) {
            return false;
        }

        $params[] = $id;
        
        $sql = "UPDATE hang_thanh_vien SET " . implode(", ", $fields) . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    public function themMoi($data)
    {
        $fields = array_keys($data);
        $placeholders = array_fill(0, count($fields), '?');
        
        $sql = "INSERT INTO hang_thanh_vien (" . implode(", ", $fields) . ") VALUES (" . implode(", ", $placeholders) . ")";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array_values($data));
    }

    public function xoa($id)
    {
        $sql = "DELETE FROM hang_thanh_vien WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
