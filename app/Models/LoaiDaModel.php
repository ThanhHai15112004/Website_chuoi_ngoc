<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class LoaiDaModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT id, ten_loai_da FROM loai_da ORDER BY ten_loai_da ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
