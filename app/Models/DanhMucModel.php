<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class DanhMucModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT id, ten_danh_muc FROM danh_muc WHERE trang_thai = 1 ORDER BY ten_danh_muc ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
