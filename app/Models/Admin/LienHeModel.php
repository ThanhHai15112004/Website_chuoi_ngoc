<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;

class LienHeModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function themMoi($data)
    {
        $fields = array_keys($data);
        $placeholders = array_map(function($f) { return ":$f"; }, $fields);
        
        $sql = "INSERT INTO lien_he (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";
        $stmt = $this->db->prepare($sql);
        
        foreach ($data as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        
        return $stmt->execute();
    }

    public function layDanhSach($filters = [], $limit = 10, $offset = 0)
    {
        $sql = "SELECT * FROM lien_he WHERE 1=1";
        $params = [];

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND trang_thai = :trang_thai";
            $params['trang_thai'] = $filters['trang_thai'];
        }

        $sql .= " ORDER BY ngay_tao DESC LIMIT :limit OFFSET :offset";
        
        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->bindValue(":limit", (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", (int)$offset, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function demDanhSach($filters = [])
    {
        $sql = "SELECT COUNT(*) as total FROM lien_he WHERE 1=1";
        $params = [];

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND trang_thai = :trang_thai";
            $params['trang_thai'] = $filters['trang_thai'];
        }

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? (int)$row['total'] : 0;
    }

    public function capNhatTrangThai($id, $trang_thai)
    {
        $sql = "UPDATE lien_he SET trang_thai = :trang_thai WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':trang_thai', (int)$trang_thai, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }
}
