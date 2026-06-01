<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class KhuVucGiaoHangModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM khu_vuc_giao_hang ORDER BY id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM khu_vuc_giao_hang WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO khu_vuc_giao_hang (ten, danh_sach_tinh, phi_tieu_chuan, phi_nhanh, freeship_tu, thoi_gian, trang_thai) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([
            $data['ten'], $data['danh_sach_tinh'] ?? '', $data['phi_tieu_chuan'] ?? 0,
            $data['phi_nhanh'] ?? 0, $data['freeship_tu'] ?? 0,
            $data['thoi_gian'] ?? '', $data['trang_thai'] ?? 1
        ]);
        return $this->db->lastInsertId();
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE khu_vuc_giao_hang SET ten=?, danh_sach_tinh=?, phi_tieu_chuan=?, phi_nhanh=?, freeship_tu=?, thoi_gian=?, trang_thai=? WHERE id=?");
        return $stmt->execute([
            $data['ten'], $data['danh_sach_tinh'] ?? '', $data['phi_tieu_chuan'] ?? 0,
            $data['phi_nhanh'] ?? 0, $data['freeship_tu'] ?? 0,
            $data['thoi_gian'] ?? '', $data['trang_thai'] ?? 1, $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM khu_vuc_giao_hang WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function toggleStatus($id)
    {
        $stmt = $this->db->prepare("UPDATE khu_vuc_giao_hang SET trang_thai = NOT trang_thai WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
