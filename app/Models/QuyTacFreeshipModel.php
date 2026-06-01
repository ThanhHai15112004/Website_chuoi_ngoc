<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class QuyTacFreeshipModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM quy_tac_freeship ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM quy_tac_freeship WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO quy_tac_freeship (ten, khu_vuc_ap_dung, dieu_kien, trang_thai) VALUES (?,?,?,?)");
        $stmt->execute([$data['ten'], $data['khu_vuc_ap_dung'] ?? '', $data['dieu_kien'] ?? '', $data['trang_thai'] ?? 1]);
        return $this->db->lastInsertId();
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE quy_tac_freeship SET ten=?, khu_vuc_ap_dung=?, dieu_kien=?, trang_thai=? WHERE id=?");
        return $stmt->execute([$data['ten'], $data['khu_vuc_ap_dung'] ?? '', $data['dieu_kien'] ?? '', $data['trang_thai'] ?? 1, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM quy_tac_freeship WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function toggleStatus($id)
    {
        $stmt = $this->db->prepare("UPDATE quy_tac_freeship SET trang_thai = NOT trang_thai WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
