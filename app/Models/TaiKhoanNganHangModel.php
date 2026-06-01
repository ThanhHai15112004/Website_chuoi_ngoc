<?php
namespace App\Models;

use App\Core\Database;
use PDO;

class TaiKhoanNganHangModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $stmt = $this->db->query("SELECT * FROM tai_khoan_ngan_hang ORDER BY la_mac_dinh DESC, id ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tai_khoan_ngan_hang WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $stmt = $this->db->prepare("INSERT INTO tai_khoan_ngan_hang (ten_ngan_hang, chu_tai_khoan, so_tai_khoan, chi_nhanh, qr_image, la_mac_dinh, trang_thai) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([
            $data['ten_ngan_hang'], $data['chu_tai_khoan'], $data['so_tai_khoan'],
            $data['chi_nhanh'] ?? '', $data['qr_image'] ?? '',
            $data['la_mac_dinh'] ?? 0, $data['trang_thai'] ?? 1
        ]);
        $newId = $this->db->lastInsertId();
        if (!empty($data['la_mac_dinh'])) {
            $this->setDefault($newId);
        }
        return $newId;
    }

    public function update($id, $data)
    {
        $stmt = $this->db->prepare("UPDATE tai_khoan_ngan_hang SET ten_ngan_hang=?, chu_tai_khoan=?, so_tai_khoan=?, chi_nhanh=?, qr_image=COALESCE(?,qr_image), la_mac_dinh=?, trang_thai=? WHERE id=?");
        $stmt->execute([
            $data['ten_ngan_hang'], $data['chu_tai_khoan'], $data['so_tai_khoan'],
            $data['chi_nhanh'] ?? '', $data['qr_image'] ?? null,
            $data['la_mac_dinh'] ?? 0, $data['trang_thai'] ?? 1, $id
        ]);
        if (!empty($data['la_mac_dinh'])) {
            $this->setDefault($id);
        }
        return true;
    }

    public function delete($id)
    {
        // Xóa QR image file nếu có
        $bank = $this->getById($id);
        if ($bank && !empty($bank['qr_image'])) {
            $this->deleteQrFile($bank['qr_image']);
        }
        $stmt = $this->db->prepare("DELETE FROM tai_khoan_ngan_hang WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function setDefault($id)
    {
        $this->db->exec("UPDATE tai_khoan_ngan_hang SET la_mac_dinh = 0");
        $stmt = $this->db->prepare("UPDATE tai_khoan_ngan_hang SET la_mac_dinh = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function toggleStatus($id)
    {
        $stmt = $this->db->prepare("UPDATE tai_khoan_ngan_hang SET trang_thai = NOT trang_thai WHERE id = ?");
        return $stmt->execute([$id]);
    }

    private function deleteQrFile($url)
    {
        if (empty($url) || !defined('APP_URL')) return;
        $base = APP_URL . '/public/uploads/bank/';
        if (strpos($url, $base) === 0) {
            $file = __DIR__ . '/../../public/uploads/bank/' . str_replace($base, '', $url);
            if (file_exists($file)) unlink($file);
        }
    }
}
