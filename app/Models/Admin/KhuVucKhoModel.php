<?php
namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use PDOException;

class KhuVucKhoModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Lấy toàn bộ khu vực dạng cây, nhóm theo kho
     */
    public function layTreeKhuVuc()
    {
        $sql = "SELECT kv.*, kh.ten_kho, kh.ma_kho,
                       (SELECT COALESCE(SUM(so_luong), 0) FROM san_pham_vi_tri WHERE id_vi_tri = kv.id) as so_luong_hien_tai
                FROM khu_vuc_kho kv
                JOIN kho_hang kh ON kv.id_kho = kh.id
                WHERE kh.trang_thai = 1
                ORDER BY kh.ten_kho, kv.cap_do, kv.ten_vi_tri";
        $stmt = $this->db->query($sql);
        $allItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Build tree grouped by kho
        $tree = [];
        $itemsById = [];

        // Index all items by id
        foreach ($allItems as $item) {
            $item['children'] = [];
            $itemsById[$item['id']] = $item;
        }

        // Build tree
        foreach ($allItems as $item) {
            $id = $item['id'];
            $idKho = $item['id_kho'];
            $idCha = $item['id_cha'];

            if (!isset($tree[$idKho])) {
                $tree[$idKho] = [
                    'ten' => $item['ten_kho'],
                    'ma_kho' => $item['ma_kho'],
                    'children' => []
                ];
            }

            if (empty($idCha)) {
                // Root level
                $tree[$idKho]['children'][] = &$itemsById[$id];
            } else {
                // Child
                if (isset($itemsById[$idCha])) {
                    $itemsById[$idCha]['children'][] = &$itemsById[$id];
                }
            }
        }

        // Also add kho that have no khu vuc
        $sqlKho = "SELECT id, ten_kho, ma_kho FROM kho_hang WHERE trang_thai = 1 ORDER BY ten_kho";
        $stmtKho = $this->db->query($sqlKho);
        $allKho = $stmtKho->fetchAll(PDO::FETCH_ASSOC);
        foreach ($allKho as $kho) {
            if (!isset($tree[$kho['id']])) {
                $tree[$kho['id']] = [
                    'ten' => $kho['ten_kho'],
                    'ma_kho' => $kho['ma_kho'],
                    'children' => []
                ];
            }
        }

        return $tree;
    }

    /**
     * Lấy danh sách khu vực phẳng của 1 kho (cho bảng chi tiết)
     */
    public function layDanhSachTheoKho($idKho)
    {
        $sql = "SELECT kv.*, kvc.ten_vi_tri as ten_cha
                FROM khu_vuc_kho kv
                LEFT JOIN khu_vuc_kho kvc ON kv.id_cha = kvc.id
                WHERE kv.id_kho = :id_kho
                ORDER BY kv.cap_do, kv.ten_vi_tri";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_kho' => $idKho]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy danh sách khu vực cấp cha (để chọn vị trí cha trong modal)
     */
    public function layDanhSachCha($idKho)
    {
        $sql = "SELECT id, ma_vi_tri, ten_vi_tri, cap_do
                FROM khu_vuc_kho 
                WHERE id_kho = :id_kho AND cap_do IN ('khu','ke')
                ORDER BY cap_do, ten_vi_tri";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_kho' => $idKho]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy chi tiết một vị trí
     */
    public function layChiTietViTri($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM khu_vuc_kho WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy tổng sức chứa của các vị trí con
     */
    public function layTongSucChuaCon($id_cha, $exclude_id = null)
    {
        $sql = "SELECT SUM(suc_chua) as total FROM khu_vuc_kho WHERE id_cha = :id_cha AND suc_chua IS NOT NULL";
        $params = ['id_cha' => $id_cha];
        
        if ($exclude_id) {
            $sql .= " AND id != :exclude_id";
            $params['exclude_id'] = $exclude_id;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? (int)$result['total'] : 0;
    }

    public function themViTri($data)
    {
        try {
            $stmt = $this->db->prepare("SELECT UUID() as uuid");
            $stmt->execute();
            $id = $stmt->fetchColumn();

            $sql = "INSERT INTO khu_vuc_kho (id, id_kho, id_cha, ma_vi_tri, ten_vi_tri, cap_do, suc_chua, trang_thai)
                    VALUES (:id, :id_kho, :id_cha, :ma_vi_tri, :ten_vi_tri, :cap_do, :suc_chua, 1)";

            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                'id' => $id,
                'id_kho' => $data['id_kho'],
                'id_cha' => !empty($data['id_cha']) ? $data['id_cha'] : null,
                'ma_vi_tri' => $data['ma_vi_tri'],
                'ten_vi_tri' => $data['ten_vi_tri'],
                'cap_do' => $data['cap_do'] ?? 'khu',
                'suc_chua' => !empty($data['suc_chua']) ? (int)$data['suc_chua'] : null
            ]);

            return $id;
        } catch (PDOException $e) {
            error_log("Lỗi thêm vị trí: " . $e->getMessage());
            return false;
        }
    }

    public function capNhatViTri($id, $data)
    {
        $sql = "UPDATE khu_vuc_kho SET 
                    ma_vi_tri = :ma_vi_tri, ten_vi_tri = :ten_vi_tri, 
                    cap_do = :cap_do, suc_chua = :suc_chua
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'ma_vi_tri' => $data['ma_vi_tri'],
            'ten_vi_tri' => $data['ten_vi_tri'],
            'cap_do' => $data['cap_do'] ?? 'khu',
            'suc_chua' => !empty($data['suc_chua']) ? (int)$data['suc_chua'] : null
        ]);
    }

    public function xoaViTri($id)
    {
        // Kiểm tra có con không
        $stmtCheck = $this->db->prepare("SELECT COUNT(*) FROM khu_vuc_kho WHERE id_cha = :id");
        $stmtCheck->execute(['id' => $id]);
        if ($stmtCheck->fetchColumn() > 0) {
            return false; // Không thể xóa nếu có con
        }

        // Kiểm tra có sản phẩm đang chứa không
        $stmtCheckSp = $this->db->prepare("SELECT COALESCE(SUM(so_luong), 0) FROM san_pham_vi_tri WHERE id_vi_tri = :id");
        $stmtCheckSp->execute(['id' => $id]);
        if ($stmtCheckSp->fetchColumn() > 0) {
            return false; // Không thể xóa nếu có sản phẩm
        }

        $stmt = $this->db->prepare("DELETE FROM khu_vuc_kho WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
