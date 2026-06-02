<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;

class CauHinhModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function get($key, $default = null)
    {
        $sql = "SELECT gia_tri FROM cau_hinh WHERE ma_cau_hinh = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$key]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['gia_tri'] : $default;
    }

    public function set($key, $value, $mo_ta = null)
    {
        $id = uniqid('ch_');
        $sql = "INSERT INTO cau_hinh (id, ma_cau_hinh, ten_cau_hinh, gia_tri, mo_ta) VALUES (?, ?, ?, ?, ?) 
                ON DUPLICATE KEY UPDATE gia_tri = ?, mo_ta = COALESCE(?, mo_ta)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id, $key, $key, $value, $mo_ta, $value, $mo_ta]);
    }
    
    public function getAll()
    {
        $sql = "SELECT * FROM cau_hinh";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $config = [];
        foreach ($results as $row) {
            $config[$row['ma_cau_hinh']] = $row['gia_tri'];
        }
        return $config;
    }
}
