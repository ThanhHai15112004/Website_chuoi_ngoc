<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class PhuongThucVanChuyenModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM phuong_thuc_van_chuyen ORDER BY thu_tu ASC, id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM phuong_thuc_van_chuyen WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO phuong_thuc_van_chuyen (ma, ten, mo_ta, khu_vuc, thoi_gian, phi_mac_dinh, freeship_tu, icon, thu_tu, trang_thai) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $stmt->execute([
            $data['ma'], $data['ten'], $data['mo_ta'] ?? '',
            $data['khu_vuc'] ?? 'Toàn quốc', $data['thoi_gian'] ?? '',
            $data['phi_mac_dinh'] ?? 0, $data['freeship_tu'] ?? 0,
            $data['icon'] ?? 'mdi:truck-outline', $data['thu_tu'] ?? 0, $data['trang_thai'] ?? 1
        ]);
        return $this->db->lastInsertId();
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE phuong_thuc_van_chuyen SET ten=?, mo_ta=?, khu_vuc=?, thoi_gian=?, phi_mac_dinh=?, freeship_tu=?, icon=?, trang_thai=? WHERE id=?");
        return $stmt->execute([
            $data['ten'], $data['mo_ta'] ?? '', $data['khu_vuc'] ?? 'Toàn quốc',
            $data['thoi_gian'] ?? '', $data['phi_mac_dinh'] ?? 0, $data['freeship_tu'] ?? 0,
            $data['icon'] ?? 'mdi:truck-outline', $data['trang_thai'] ?? 1, $id
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM phuong_thuc_van_chuyen WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function toggleStatus($id)
    {
        $stmt = $this->db->prepare("UPDATE phuong_thuc_van_chuyen SET trang_thai = NOT trang_thai WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
