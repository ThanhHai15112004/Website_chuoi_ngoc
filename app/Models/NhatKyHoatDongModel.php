<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class NhatKyHoatDongModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function log($hanhDong, $module, $doiTuongId = null, $ghiChu = '')
    {
        $id = uniqid('log_');
        // Giả sử lấy ID admin từ session, ở đây tạm fix cứng hoặc lấy từ SESSION
        $id_nguoi_dung = $_SESSION['admin']['id'] ?? 'user_1'; 
        
        $sql = "INSERT INTO nhat_ky_hoat_dong (id, id_nguoi_dung, hanh_dong, module, doi_tuong_id, gia_tri_moi) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $id,
            $id_nguoi_dung,
            $hanhDong,
            $module,
            $doiTuongId,
            $ghiChu
        ]);
    }
}
