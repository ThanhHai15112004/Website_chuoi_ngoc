<?php
namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use App\Constants\DanhGiaConstants;

class DanhGiaModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getById($id)
    {
        $sql = "SELECT dg.*, 
                sp.ten_sp, sp.ma_sp, sp.hinh_anh_chinh,
                nd.ho_ten as ten_khach, nd.so_dien_thoai as sdt_khach,
                htv.ten_hang as hang_thanh_vien,
                nv.ho_ten as ten_nhan_vien
                FROM danh_gia dg
                JOIN san_pham sp ON dg.id_san_pham = sp.id
                JOIN nguoi_dung nd ON dg.id_nguoi_dung = nd.id
                LEFT JOIN hang_thanh_vien htv ON nd.id_hang_thanh_vien = htv.id
                LEFT JOIN nguoi_dung nv ON dg.phan_hoi_boi = nv.id
                WHERE dg.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function layTatCa($filters = [], $page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        
        $sql = "SELECT dg.*, 
                sp.ten_sp, sp.ma_sp, sp.hinh_anh_chinh,
                nd.ho_ten as ten_khach,
                htv.ten_hang as hang_thanh_vien,
                nv.ho_ten as ten_nhan_vien
                FROM danh_gia dg
                JOIN san_pham sp ON dg.id_san_pham = sp.id
                JOIN nguoi_dung nd ON dg.id_nguoi_dung = nd.id
                LEFT JOIN hang_thanh_vien htv ON nd.id_hang_thanh_vien = htv.id
                LEFT JOIN nguoi_dung nv ON dg.phan_hoi_boi = nv.id";
        
        $conditions = [];
        $params = [];

        if (!empty($filters['status']) && $filters['status'] !== 'all') {
            if ($filters['status'] == 'cho_duyet') {
                $conditions[] = "dg.trang_thai = " . DanhGiaConstants::TRANG_THAI_CHO_DUYET;
            } elseif ($filters['status'] == 'da_duyet') {
                $conditions[] = "dg.trang_thai = " . DanhGiaConstants::TRANG_THAI_DA_DUYET;
            } elseif ($filters['status'] == 'da_an') {
                $conditions[] = "dg.trang_thai = " . DanhGiaConstants::TRANG_THAI_DA_AN;
            }
        }

        if (!empty($filters['type']) && $filters['type'] !== 'all') {
            if ($filters['type'] == 'co_phan_hoi') {
                $conditions[] = "(dg.phan_hoi_noi_dung IS NOT NULL AND dg.phan_hoi_noi_dung != '')";
            } elseif ($filters['type'] == 'binh_luan_bv') {
                $conditions[] = "1 = 0"; // Not implemented yet
            }
        }

        if (!empty($filters['sao']) && $filters['sao'] !== 'all') {
            $conditions[] = "dg.so_sao = :sao";
            $params['sao'] = $filters['sao'];
        }

        if (!empty($filters['keyword'])) {
            $conditions[] = "(dg.noi_dung LIKE :keyword OR nd.ho_ten LIKE :keyword OR sp.ten_sp LIKE :keyword)";
            $params['keyword'] = '%' . $filters['keyword'] . '%';
        }

        if (count($conditions) > 0) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $sql .= " ORDER BY dg.ngay_tao DESC LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);
        
        foreach ($params as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAll($filters = [])
    {
        $sql = "SELECT COUNT(dg.id) as total FROM danh_gia dg
                JOIN san_pham sp ON dg.id_san_pham = sp.id
                JOIN nguoi_dung nd ON dg.id_nguoi_dung = nd.id";
        
        $conditions = [];
        $params = [];

        if (!empty($filters['status']) && $filters['status'] !== 'all') {
            if ($filters['status'] == 'cho_duyet') {
                $conditions[] = "dg.trang_thai = " . DanhGiaConstants::TRANG_THAI_CHO_DUYET;
            } elseif ($filters['status'] == 'da_duyet') {
                $conditions[] = "dg.trang_thai = " . DanhGiaConstants::TRANG_THAI_DA_DUYET;
            } elseif ($filters['status'] == 'da_an') {
                $conditions[] = "dg.trang_thai = " . DanhGiaConstants::TRANG_THAI_DA_AN;
            }
        }

        if (!empty($filters['type']) && $filters['type'] !== 'all') {
            if ($filters['type'] == 'co_phan_hoi') {
                $conditions[] = "(dg.phan_hoi_noi_dung IS NOT NULL AND dg.phan_hoi_noi_dung != '')";
            } elseif ($filters['type'] == 'binh_luan_bv') {
                $conditions[] = "1 = 0"; // Not implemented yet
            }
        }

        if (!empty($filters['sao']) && $filters['sao'] !== 'all') {
            $conditions[] = "dg.so_sao = :sao";
            $params['sao'] = $filters['sao'];
        }

        if (!empty($filters['keyword'])) {
            $conditions[] = "(dg.noi_dung LIKE :keyword OR nd.ho_ten LIKE :keyword OR sp.ten_sp LIKE :keyword)";
            $params['keyword'] = '%' . $filters['keyword'] . '%';
        }

        if (count($conditions) > 0) {
            $sql .= " WHERE " . implode(" AND ", $conditions);
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function layThongKe()
    {
        $sql = "SELECT 
                COUNT(*) as tong,
                SUM(CASE WHEN trang_thai = " . DanhGiaConstants::TRANG_THAI_CHO_DUYET . " THEN 1 ELSE 0 END) as cho_duyet,
                SUM(CASE WHEN trang_thai = " . DanhGiaConstants::TRANG_THAI_DA_DUYET . " THEN 1 ELSE 0 END) as da_duyet,
                SUM(CASE WHEN trang_thai = " . DanhGiaConstants::TRANG_THAI_DA_AN . " THEN 1 ELSE 0 END) as da_an,
                AVG(so_sao) as diem_tb,
                SUM(CASE WHEN hinh_anh IS NOT NULL AND hinh_anh != '' THEN 1 ELSE 0 END) as co_anh,
                SUM(CASE WHEN phan_hoi_noi_dung IS NOT NULL AND phan_hoi_noi_dung != '' THEN 1 ELSE 0 END) as co_phan_hoi
                FROM danh_gia";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $stats = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Ensure values are not null
        return [
            'tong' => $stats['tong'] ?? 0,
            'cho_duyet' => $stats['cho_duyet'] ?? 0,
            'da_duyet' => $stats['da_duyet'] ?? 0,
            'da_an' => $stats['da_an'] ?? 0,
            'diem_tb' => round($stats['diem_tb'] ?? 0, 1),
            'co_anh' => $stats['co_anh'] ?? 0,
            'co_phan_hoi' => $stats['co_phan_hoi'] ?? 0,
            'binh_luan_bv' => 0
        ];
    }

    public function updateStatus($id, $status)
    {
        $statusMap = [
            'da_duyet' => DanhGiaConstants::TRANG_THAI_DA_DUYET,
            'da_an' => DanhGiaConstants::TRANG_THAI_DA_AN,
            'cho_duyet' => DanhGiaConstants::TRANG_THAI_CHO_DUYET
        ];
        
        if (!isset($statusMap[$status])) {
            return false;
        }

        $sql = "UPDATE danh_gia SET trang_thai = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'status' => $statusMap[$status],
            'id' => $id
        ]);
    }

    public function updateReply($id, $content, $adminId)
    {
        $sql = "UPDATE danh_gia SET 
                phan_hoi_noi_dung = :content,
                phan_hoi_ngay = NOW(),
                phan_hoi_boi = :admin_id
                WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'content' => $content,
            'admin_id' => $adminId,
            'id' => $id
        ]);
    }

    public function xoa($id)
    {
        $sql = "DELETE FROM danh_gia WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }
}
