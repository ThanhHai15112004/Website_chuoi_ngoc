<?php
namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use Exception;

class BannerModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll($filters = [])
    {
        $sql = "SELECT * FROM banner WHERE 1=1";
        $params = [];

        if (!empty($filters['vi_tri']) && $filters['vi_tri'] !== 'all') {
            $sql .= " AND vi_tri = ?";
            $params[] = $filters['vi_tri'];
        }

        if (!empty($filters['trang_thai']) && $filters['trang_thai'] !== 'all') {
            $sql .= " AND trang_thai = ?";
            $params[] = $filters['trang_thai'];
        }

        $sql .= " ORDER BY thu_tu ASC, ngay_tao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM banner WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO banner (
                    id, ten, tieu_de_hien_thi, cta, mo_ta, anh_desktop, anh_mobile, 
                    vi_tri, thiet_bi, loai_link, link, thu_tu, trang_thai, 
                    khong_gioi_han, bat_dau, ket_thuc, luot_click, ngay_tao, ngay_cap_nhat
                ) VALUES (
                    :id, :ten, :tieu_de_hien_thi, :cta, :mo_ta, :anh_desktop, :anh_mobile, 
                    :vi_tri, :thiet_bi, :loai_link, :link, :thu_tu, :trang_thai, 
                    :khong_gioi_han, :bat_dau, :ket_thuc, 0, :ngay_tao, :ngay_cap_nhat
                )";
                
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $data['id'],
            ':ten' => $data['ten'],
            ':tieu_de_hien_thi' => $data['tieu_de_hien_thi'] ?? null,
            ':cta' => $data['cta'] ?? null,
            ':mo_ta' => $data['mo_ta'] ?? null,
            ':anh_desktop' => $data['anh_desktop'],
            ':anh_mobile' => $data['anh_mobile'] ?? null,
            ':vi_tri' => $data['vi_tri'],
            ':thiet_bi' => $data['thiet_bi'],
            ':loai_link' => $data['loai_link'],
            ':link' => $data['link'],
            ':thu_tu' => $data['thu_tu'] ?? 1,
            ':trang_thai' => $data['trang_thai'] ?? 'nhap',
            ':khong_gioi_han' => $data['khong_gioi_han'] ?? 0,
            ':bat_dau' => $data['bat_dau'] ?: null,
            ':ket_thuc' => $data['ket_thuc'] ?: null,
            ':ngay_tao' => $data['ngay_tao'],
            ':ngay_cap_nhat' => $data['ngay_cap_nhat']
        ]);
    }

    public function update($id, $data)
    {
        $fields = [];
        $params = [':id' => $id];
        
        foreach ($data as $key => $value) {
            $fields[] = "$key = :$key";
            $params[":$key"] = $value ?: null;
        }
        
        $sql = "UPDATE banner SET " . implode(", ", $fields) . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM banner WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function updateStatus($id, $status)
    {
        $stmt = $this->db->prepare("UPDATE banner SET trang_thai = ?, ngay_cap_nhat = NOW() WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    public function incrementClick($id)
    {
        $stmt = $this->db->prepare("UPDATE banner SET luot_click = luot_click + 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
