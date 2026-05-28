<?php

namespace App\Models;

use App\Core\Database;
use PDO;
use App\Constants\SystemConstants;

class VoucherModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getActiveVouchers()
    {
        $sql = "SELECT id, ma_voucher, loai_giam, gia_tri, don_toi_thieu, giam_toi_da, so_luong, da_dung, ngay_ket_thuc 
                FROM voucher 
                WHERE trang_thai = " . SystemConstants::STATUS_ACTIVE . " AND ngay_ket_thuc >= NOW()
                ORDER BY ngay_ket_thuc ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
