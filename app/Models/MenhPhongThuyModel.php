<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class MenhPhongThuyModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT id, ten_menh FROM menh_phong_thuy ORDER BY ten_menh ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
