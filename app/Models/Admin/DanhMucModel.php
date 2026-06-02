<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use App\Constants\SystemConstants;

class DanhMucModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layTatCa($filters = [])
    {
        $sortBy = 'dm.thu_tu ASC, dm.ten_danh_muc ASC';
        
        if (!empty($filters['sort_by'])) {
            $allowedSorts = ['ten_danh_muc' => 'dm.ten_danh_muc', 'so_san_pham' => 'so_san_pham', 'thu_tu' => 'dm.thu_tu'];
            if (array_key_exists($filters['sort_by'], $allowedSorts)) {
                $dir = (!empty($filters['sort_dir']) && strtoupper($filters['sort_dir']) === 'DESC') ? 'DESC' : 'ASC';
                $sortBy = $allowedSorts[$filters['sort_by']] . ' ' . $dir;
            }
        }

        $sql = "
            SELECT dm.*, 
                (SELECT COUNT(*) FROM san_pham sp WHERE sp.id_danh_muc = dm.id AND sp.da_xoa = 0) as so_san_pham
            FROM danh_muc dm
            WHERE dm.da_xoa = 0 
        ";
        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (dm.ten_danh_muc LIKE :keyword OR dm.ma_danh_muc LIKE :keyword)";
            $params['keyword'] = '%' . $filters['keyword'] . '%';
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND dm.trang_thai = :trang_thai";
            $params['trang_thai'] = $filters['trang_thai'];
        }

        if (!empty($filters['san_pham'])) {
            if ($filters['san_pham'] === 'co') {
                $sql .= " AND (SELECT COUNT(*) FROM san_pham sp WHERE sp.id_danh_muc = dm.id AND sp.da_xoa = 0) > 0";
            } elseif ($filters['san_pham'] === 'trong') {
                $sql .= " AND (SELECT COUNT(*) FROM san_pham sp WHERE sp.id_danh_muc = dm.id AND sp.da_xoa = 0) = 0";
            }
        }

        $sql .= " ORDER BY $sortBy";

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function timTheoId($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM danh_muc WHERE id = ? AND da_xoa = 0");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function themMoi($data)
    {
        $sql = "INSERT INTO danh_muc (id, ten_danh_muc, ma_danh_muc, slug, hinh_anh, mo_ta, vi_tri, thu_tu, trang_thai) 
                VALUES (:id, :ten_danh_muc, :ma_danh_muc, :slug, :hinh_anh, :mo_ta, :vi_tri, :thu_tu, :trang_thai)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id' => $data['id'],
            'ten_danh_muc' => $data['ten_danh_muc'],
            'ma_danh_muc' => $data['ma_danh_muc'] ?? null,
            'slug' => $data['slug'],
            'hinh_anh' => $data['hinh_anh'] ?? null,
            'mo_ta' => $data['mo_ta'] ?? null,
            'vi_tri' => $data['vi_tri'] ?? 'Menu chính',
            'thu_tu' => $data['thu_tu'] ?? 1,
            'trang_thai' => $data['trang_thai'] ?? 1
        ]);
    }

    public function capNhat($id, $data)
    {
        $fields = [];
        foreach ($data as $key => $value) {
            $fields[] = "$key = :$key";
        }
        $fieldsStr = implode(', ', $fields);
        $sql = "UPDATE danh_muc SET $fieldsStr WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $data['id'] = $id;
        return $stmt->execute($data);
    }

    public function xoaMem($id)
    {
        $stmt = $this->db->prepare("UPDATE danh_muc SET da_xoa = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function doiTrangThai($id)
    {
        $stmt = $this->db->prepare("UPDATE danh_muc SET trang_thai = CASE WHEN trang_thai = " . SystemConstants::STATUS_ACTIVE . " THEN " . SystemConstants::STATUS_INACTIVE . " ELSE " . SystemConstants::STATUS_ACTIVE . " END WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
