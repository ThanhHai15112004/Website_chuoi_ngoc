<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use App\Constants\SystemConstants;

class MenhPhongThuyModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layTatCa($filters = [])
    {
        $sql = "SELECT m.*, 
                (SELECT COUNT(ldm.id_loai_da) FROM loai_da_menh ldm WHERE ldm.id_menh = m.id) as da_hop_count,
                (SELECT COUNT(DISTINCT sp.id) FROM san_pham sp 
                 LEFT JOIN loai_da_menh ldm2 ON sp.id_loai_da = ldm2.id_loai_da
                 WHERE (ldm2.id_menh = m.id OR FIND_IN_SET(m.id, sp.id_menh_phong_thuy) > 0) AND sp.da_xoa = 0) as so_san_pham
                FROM menh_phong_thuy m";
        
        $conditions = [];
        $params = [];
        $havings = [];

        if (!empty($filters['keyword'])) {
            $conditions[] = "(m.ten_menh LIKE :keyword OR m.mau_sac_hop LIKE :keyword OR m.nam_sinh LIKE :keyword OR m.mo_ta LIKE :keyword)";
            $params['keyword'] = '%' . $filters['keyword'] . '%';
        }

        if (isset($filters['status']) && $filters['status'] !== '') {
            if ($filters['status'] == '2') {
                $havings[] = "(so_san_pham = 0 OR da_hop_count = 0)";
            } else {
                $conditions[] = "m.trang_thai = :status";
                $params['status'] = $filters['status'];
            }
        }

        if (isset($filters['data_filter']) && $filters['data_filter'] !== '') {
            if ($filters['data_filter'] === 'has_product') {
                $havings[] = "so_san_pham > 0";
            } elseif ($filters['data_filter'] === 'no_product') {
                $havings[] = "so_san_pham = 0";
            } elseif ($filters['data_filter'] === 'no_stone') {
                $havings[] = "da_hop_count = 0";
            }
        }

        if (count($conditions) > 0) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        if (count($havings) > 0) {
            $sql .= " HAVING " . implode(" AND ", $havings);
        }

        $sql .= " ORDER BY m.ten_menh ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function timTheoId($id)
    {
        $sql = "SELECT * FROM menh_phong_thuy WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function capNhat($id, $data)
    {
        $fields = [];
        foreach ($data as $key => $value) {
            $fields[] = "$key = :$key";
        }

        $sql = "UPDATE menh_phong_thuy SET " . implode(", ", $fields) . " WHERE id = :id";
        $data['id'] = $id;

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    public function timTheoTen($name)
    {
        $sql = "SELECT * FROM menh_phong_thuy WHERE ten_menh = :name LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['name' => $name]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function doiTrangThai($id)
    {
        $sql = "UPDATE menh_phong_thuy SET trang_thai = CASE WHEN trang_thai = " . SystemConstants::STATUS_ACTIVE . " THEN " . SystemConstants::STATUS_INACTIVE . " ELSE " . SystemConstants::STATUS_ACTIVE . " END WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
