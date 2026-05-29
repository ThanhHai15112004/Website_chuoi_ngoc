<?php
namespace App\Models;

use App\Core\Database;
use PDO;
use PDOException;

class LichKiemKeModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layDanhSach()
    {
        $sql = "SELECT l.*, kh.ten_kho, nd.ho_ten as nguoi_thuc_hien 
                FROM lich_kiem_ke l
                JOIN kho_hang kh ON l.id_kho = kh.id
                LEFT JOIN nguoi_dung nd ON l.id_nguoi_thuc_hien = nd.id
                ORDER BY l.id DESC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function themLich($data)
    {
        $sql = "INSERT INTO lich_kiem_ke (ten_lich, id_kho, pham_vi, chu_ky, thoi_gian_tao, nhac_truoc_ngay, id_nguoi_thuc_hien, trang_thai)
                VALUES (:ten, :id_kho, :pham_vi, :chu_ky, :thoi_gian, :nhac, :id_nd, :trang_thai)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'ten' => $data['ten_lich'],
            'id_kho' => $data['id_kho'],
            'pham_vi' => $data['pham_vi'],
            'chu_ky' => $data['chu_ky'],
            'thoi_gian' => $data['thoi_gian_tao'],
            'nhac' => (int)$data['nhac_truoc_ngay'],
            'id_nd' => !empty($data['id_nguoi_thuc_hien']) ? $data['id_nguoi_thuc_hien'] : null,
            'trang_thai' => isset($data['trang_thai']) ? (int)$data['trang_thai'] : 1
        ]);
    }

    public function capNhatTrangThai($id, $trangThai)
    {
        $sql = "UPDATE lich_kiem_ke SET trang_thai = :tt WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['tt' => $trangThai, 'id' => $id]);
    }

    public function xoaLich($id)
    {
        $sql = "DELETE FROM lich_kiem_ke WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
