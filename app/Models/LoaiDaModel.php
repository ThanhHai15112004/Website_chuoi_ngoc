<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class LoaiDaModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        $sql = "SELECT id, ten_loai_da as ten, ma_loai_da as ma, ten_tieng_anh, trang_thai FROM loai_da WHERE da_xoa = 0 ORDER BY ten_loai_da ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getList($filters = [], $limit = 10, $offset = 0)
    {
        $sql = "SELECT ld.*,
                (SELECT COUNT(*) FROM san_pham sp WHERE sp.id_loai_da = ld.id AND sp.da_xoa = 0) as so_san_pham,
                (
                    SELECT GROUP_CONCAT(mpt.ten_menh SEPARATOR ',') 
                    FROM loai_da_menh ldm 
                    JOIN menh_phong_thuy mpt ON ldm.id_menh = mpt.id 
                    WHERE ldm.id_loai_da = ld.id
                ) as menh_phong_thuy
            FROM loai_da ld
            WHERE ld.da_xoa = 0";

        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (ld.ten_loai_da LIKE :keyword1 OR ld.ten_tieng_anh LIKE :keyword2 OR ld.ma_loai_da LIKE :keyword3)";
            $params['keyword1'] = '%' . $filters['keyword'] . '%';
            $params['keyword2'] = '%' . $filters['keyword'] . '%';
            $params['keyword3'] = '%' . $filters['keyword'] . '%';
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND ld.trang_thai = :trang_thai";
            $params['trang_thai'] = $filters['trang_thai'];
        }
        
        if (!empty($filters['nhom'])) {
            $sql .= " AND ld.nhom = :nhom";
            $params['nhom'] = $filters['nhom'];
        }

        if (!empty($filters['menh'])) {
            $sql .= " AND EXISTS (
                SELECT 1 FROM loai_da_menh ldm2 
                JOIN menh_phong_thuy mpt2 ON ldm2.id_menh = mpt2.id 
                WHERE ldm2.id_loai_da = ld.id AND mpt2.ten_menh = :menh
            )";
            $params['menh'] = $filters['menh'];
        }

        $sortBy = 'ld.ngay_tao';
        $sortDir = 'DESC';

        if (!empty($filters['sort_by'])) {
            $allowedSorts = [
                'ten_loai_da' => 'ld.ten_loai_da', 
                'so_san_pham' => 'so_san_pham', 
                'ngay_tao' => 'ld.ngay_tao'
            ];
            if (array_key_exists($filters['sort_by'], $allowedSorts)) {
                $sortBy = $allowedSorts[$filters['sort_by']];
                $sortDir = (!empty($filters['sort_dir']) && strtoupper($filters['sort_dir']) === 'ASC') ? 'ASC' : 'DESC';
            }
        }

        $sql .= " ORDER BY $sortBy $sortDir LIMIT :limit OFFSET :offset";
        
        $stmt = $this->db->prepare($sql);
        
        foreach ($params as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->bindValue(":limit", (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", (int)$offset, PDO::PARAM_INT);
        
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Parse JSON nhu_cau and menh_phong_thuy string
        foreach ($results as &$row) {
            $row['nhu_cau'] = !empty($row['nhu_cau']) ? json_decode($row['nhu_cau'], true) : [];
            $row['menh'] = !empty($row['menh_phong_thuy']) ? explode(',', $row['menh_phong_thuy']) : [];
        }
        
        return $results;
    }

    public function countList($filters = [])
    {
        $sql = "SELECT COUNT(*) as total FROM loai_da ld WHERE ld.da_xoa = 0";
        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (ld.ten_loai_da LIKE :keyword1 OR ld.ten_tieng_anh LIKE :keyword2 OR ld.ma_loai_da LIKE :keyword3)";
            $params['keyword1'] = '%' . $filters['keyword'] . '%';
            $params['keyword2'] = '%' . $filters['keyword'] . '%';
            $params['keyword3'] = '%' . $filters['keyword'] . '%';
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND ld.trang_thai = :trang_thai";
            $params['trang_thai'] = $filters['trang_thai'];
        }
        
        if (!empty($filters['nhom'])) {
            $sql .= " AND ld.nhom = :nhom";
            $params['nhom'] = $filters['nhom'];
        }

        if (!empty($filters['menh'])) {
            $sql .= " AND EXISTS (
                SELECT 1 FROM loai_da_menh ldm2 
                JOIN menh_phong_thuy mpt2 ON ldm2.id_menh = mpt2.id 
                WHERE ldm2.id_loai_da = ld.id AND mpt2.ten_menh = :menh
            )";
            $params['menh'] = $filters['menh'];
        }

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? (int)$row['total'] : 0;
    }

    public function findById($id)
    {
        $stmt = $this->db->prepare("
            SELECT ld.*,
                (
                    SELECT GROUP_CONCAT(mpt.id SEPARATOR ',') 
                    FROM loai_da_menh ldm 
                    JOIN menh_phong_thuy mpt ON ldm.id_menh = mpt.id 
                    WHERE ldm.id_loai_da = ld.id
                ) as menh_phong_thuy_ids,
                (
                    SELECT COUNT(*) FROM san_pham sp WHERE sp.id_loai_da = ld.id AND sp.da_xoa = 0
                ) as so_san_pham
            FROM loai_da ld WHERE ld.id = ? AND ld.da_xoa = 0
        ");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $row['nhu_cau'] = !empty($row['nhu_cau']) ? json_decode($row['nhu_cau'], true) : [];
            $row['menh_ids'] = !empty($row['menh_phong_thuy_ids']) ? explode(',', $row['menh_phong_thuy_ids']) : [];
        }
        return $row;
    }

    public function insert($data)
    {
        $sql = "INSERT INTO loai_da (id, ma_loai_da, ten_loai_da, ten_tieng_anh, slug, nhom, mau_sac_ten, mau_sac_hex, y_nghia, nhu_cau, hinh_anh, trang_thai) 
                VALUES (:id, :ma_loai_da, :ten_loai_da, :ten_tieng_anh, :slug, :nhom, :mau_sac_ten, :mau_sac_hex, :y_nghia, :nhu_cau, :hinh_anh, :trang_thai)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            'id' => $data['id'],
            'ma_loai_da' => $data['ma_loai_da'] ?? null,
            'ten_loai_da' => $data['ten_loai_da'],
            'ten_tieng_anh' => $data['ten_tieng_anh'] ?? null,
            'slug' => $data['slug'],
            'nhom' => $data['nhom'] ?? null,
            'mau_sac_ten' => $data['mau_sac_ten'] ?? null,
            'mau_sac_hex' => $data['mau_sac_hex'] ?? null,
            'y_nghia' => $data['y_nghia'] ?? null,
            'nhu_cau' => isset($data['nhu_cau']) ? json_encode($data['nhu_cau'], JSON_UNESCAPED_UNICODE) : null,
            'hinh_anh' => $data['hinh_anh'] ?? null,
            'trang_thai' => $data['trang_thai'] ?? 1
        ]);

        if ($result && !empty($data['menh_ids'])) {
            $this->syncMenh($data['id'], $data['menh_ids']);
        }
        return $result;
    }

    public function update($id, $data)
    {
        $sql = "UPDATE loai_da SET 
                    ma_loai_da = :ma_loai_da,
                    ten_loai_da = :ten_loai_da,
                    ten_tieng_anh = :ten_tieng_anh,
                    slug = :slug,
                    nhom = :nhom,
                    mau_sac_ten = :mau_sac_ten,
                    mau_sac_hex = :mau_sac_hex,
                    y_nghia = :y_nghia,
                    nhu_cau = :nhu_cau,
                    trang_thai = :trang_thai";
        
        if (isset($data['hinh_anh'])) {
            $sql .= ", hinh_anh = :hinh_anh";
        }
        $sql .= " WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        
        $params = [
            'id' => $id,
            'ma_loai_da' => $data['ma_loai_da'] ?? null,
            'ten_loai_da' => $data['ten_loai_da'],
            'ten_tieng_anh' => $data['ten_tieng_anh'] ?? null,
            'slug' => $data['slug'],
            'nhom' => $data['nhom'] ?? null,
            'mau_sac_ten' => $data['mau_sac_ten'] ?? null,
            'mau_sac_hex' => $data['mau_sac_hex'] ?? null,
            'y_nghia' => $data['y_nghia'] ?? null,
            'nhu_cau' => isset($data['nhu_cau']) ? json_encode($data['nhu_cau'], JSON_UNESCAPED_UNICODE) : null,
            'trang_thai' => $data['trang_thai'] ?? 1
        ];

        if (isset($data['hinh_anh'])) {
            $params['hinh_anh'] = $data['hinh_anh'];
        }

        $result = $stmt->execute($params);

        if ($result && isset($data['menh_ids'])) {
            $this->syncMenh($id, $data['menh_ids']);
        }
        return $result;
    }

    public function softDelete($id)
    {
        $stmt = $this->db->prepare("UPDATE loai_da SET da_xoa = 1 WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function toggleStatus($id)
    {
        $stmt = $this->db->prepare("UPDATE loai_da SET trang_thai = 1 - trang_thai WHERE id = ?");
        return $stmt->execute([$id]);
    }

    private function syncMenh($loaiDaId, $menhIds)
    {
        // Xóa cũ
        $stmt = $this->db->prepare("DELETE FROM loai_da_menh WHERE id_loai_da = ?");
        $stmt->execute([$loaiDaId]);

        // Thêm mới
        if (!empty($menhIds) && is_array($menhIds)) {
            $sql = "INSERT INTO loai_da_menh (id_loai_da, id_menh) VALUES (?, ?)";
            $stmt = $this->db->prepare($sql);
            foreach ($menhIds as $menhId) {
                $stmt->execute([$loaiDaId, $menhId]);
            }
        }
    }
}
