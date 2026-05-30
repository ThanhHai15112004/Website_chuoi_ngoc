<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class SanPhamModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layThongKe()
    {
        $sql = "SELECT 
            COUNT(*) AS tong_san_pham,
            SUM(CASE WHEN trang_thai = " . \App\Constants\SanPhamConstants::TRANG_THAI_HIEN_THI . " THEN 1 ELSE 0 END) AS dang_hien_thi,
            SUM(CASE WHEN trang_thai = " . \App\Constants\SanPhamConstants::TRANG_THAI_AN . " THEN 1 ELSE 0 END) AS dang_an,
            SUM(CASE WHEN tong_ton_kho = 0 THEN 1 ELSE 0 END) AS het_hang,
            SUM(CASE WHEN gia_khuyen_mai IS NOT NULL AND gia_khuyen_mai > 0 THEN 1 ELSE 0 END) AS dang_giam_gia,
            SUM(CASE 
                WHEN tong_ton_kho > 0 AND (
                    (gia_ban >= " . \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP . " AND tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_CAO_CAP . ") OR
                    (gia_ban >= " . \App\Constants\SanPhamConstants::MUC_GIA_RE . " AND gia_ban < " . \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP . " AND tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_MAC_DINH . ") OR
                    (gia_ban < " . \App\Constants\SanPhamConstants::MUC_GIA_RE . " AND tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_GIA_RE . ")
                ) THEN 1 ELSE 0 
            END) AS sap_het_hang
        FROM san_pham WHERE da_xoa = 0";

        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function layDanhSach($filters = [], $limit = 10, $offset = 0)
    {
        $sql = "SELECT 
                sp.id, sp.ma_sp, sp.ten_sp, sp.hinh_anh_chinh, sp.mo_ta_ngan, sp.don_vi_tinh,
                sp.gia_ban, sp.gia_khuyen_mai, sp.tong_ton_kho, sp.trang_thai, sp.ngay_tao, sp.luot_xem,
                dm.ten_danh_muc, 
                ld.ten_loai_da, 
                mpt.ten_menh 
            FROM san_pham sp
            LEFT JOIN danh_muc dm ON sp.id_danh_muc = dm.id
            LEFT JOIN loai_da ld ON sp.id_loai_da = ld.id
            LEFT JOIN menh_phong_thuy mpt ON sp.id_menh_phong_thuy = mpt.id
            WHERE sp.da_xoa = 0";

        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (sp.ten_sp LIKE :keyword1 OR sp.ma_sp LIKE :keyword2)";
            $params['keyword1'] = '%' . $filters['keyword'] . '%';
            $params['keyword2'] = '%' . $filters['keyword'] . '%';
        }

        // Lọc theo danh mục
        if (!empty($filters['danh_muc'])) {
            $sql .= " AND dm.ten_danh_muc = :danh_muc";
            $params['danh_muc'] = $filters['danh_muc'];
        }

        // Lọc theo loại đá
        if (!empty($filters['loai_da'])) {
            $sql .= " AND ld.ten_loai_da = :loai_da";
            $params['loai_da'] = $filters['loai_da'];
        }

        // Lọc theo mệnh
        if (!empty($filters['menh'])) {
            $sql .= " AND mpt.ten_menh = :menh";
            $params['menh'] = $filters['menh'];
        }

        // Lọc theo trạng thái
        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND sp.trang_thai = :trang_thai";
            $params['trang_thai'] = $filters['trang_thai'];
        }

        // Lọc theo tồn kho
        if (!empty($filters['ton_kho'])) {
            if ($filters['ton_kho'] === \App\Constants\SanPhamConstants::TON_KHO_HET_HANG) {
                $sql .= " AND sp.tong_ton_kho = 0";
            } elseif ($filters['ton_kho'] === \App\Constants\SanPhamConstants::TON_KHO_SAP_HET) {
                $sql .= " AND sp.tong_ton_kho > 0 AND (
                    (sp.gia_ban >= " . \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP . " AND sp.tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_CAO_CAP . ") OR
                    (sp.gia_ban >= " . \App\Constants\SanPhamConstants::MUC_GIA_RE . " AND sp.gia_ban < " . \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP . " AND sp.tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_MAC_DINH . ") OR
                    (sp.gia_ban < " . \App\Constants\SanPhamConstants::MUC_GIA_RE . " AND sp.tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_GIA_RE . ")
                )";
            } elseif ($filters['ton_kho'] === \App\Constants\SanPhamConstants::TON_KHO_CON_HANG) {
                $sql .= " AND sp.tong_ton_kho > 0 AND NOT (
                    (sp.gia_ban >= " . \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP . " AND sp.tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_CAO_CAP . ") OR
                    (sp.gia_ban >= " . \App\Constants\SanPhamConstants::MUC_GIA_RE . " AND sp.gia_ban < " . \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP . " AND sp.tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_MAC_DINH . ") OR
                    (sp.gia_ban < " . \App\Constants\SanPhamConstants::MUC_GIA_RE . " AND sp.tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_GIA_RE . ")
                )";
            }
        }

        $sortBy = 'sp.ngay_tao';
        $sortDir = 'DESC';

        if (!empty($filters['sort_by'])) {
            $allowedSorts = ['ten_sp' => 'sp.ten_sp', 'gia_ban' => 'sp.gia_ban', 'ton_kho' => 'sp.tong_ton_kho', 'ngay_tao' => 'sp.ngay_tao'];
            if (array_key_exists($filters['sort_by'], $allowedSorts)) {
                $sortBy = $allowedSorts[$filters['sort_by']];
            }
        }
        
        if (!empty($filters['sort_dir'])) {
            $sortDir = strtoupper($filters['sort_dir']) === 'ASC' ? 'ASC' : 'DESC';
        }

        $sql .= " ORDER BY $sortBy $sortDir LIMIT :limit OFFSET :offset";
        
        $stmt = $this->db->prepare($sql);
        
        foreach ($params as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->bindValue(":limit", (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", (int)$offset, PDO::PARAM_INT);
        
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function demDanhSach($filters = [])
    {
        $sql = "SELECT COUNT(*) as total
            FROM san_pham sp
            LEFT JOIN danh_muc dm ON sp.id_danh_muc = dm.id
            LEFT JOIN loai_da ld ON sp.id_loai_da = ld.id
            LEFT JOIN menh_phong_thuy mpt ON sp.id_menh_phong_thuy = mpt.id
            WHERE sp.da_xoa = 0";

        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (sp.ten_sp LIKE :keyword1 OR sp.ma_sp LIKE :keyword2)";
            $params['keyword1'] = '%' . $filters['keyword'] . '%';
            $params['keyword2'] = '%' . $filters['keyword'] . '%';
        }

        if (!empty($filters['danh_muc'])) {
            $sql .= " AND dm.ten_danh_muc = :danh_muc";
            $params['danh_muc'] = $filters['danh_muc'];
        }

        if (!empty($filters['loai_da'])) {
            $sql .= " AND ld.ten_loai_da = :loai_da";
            $params['loai_da'] = $filters['loai_da'];
        }

        if (!empty($filters['menh'])) {
            $sql .= " AND mpt.ten_menh = :menh";
            $params['menh'] = $filters['menh'];
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND sp.trang_thai = :trang_thai";
            $params['trang_thai'] = $filters['trang_thai'];
        }

        if (!empty($filters['ton_kho'])) {
            if ($filters['ton_kho'] === \App\Constants\SanPhamConstants::TON_KHO_HET_HANG) {
                $sql .= " AND sp.tong_ton_kho = 0";
            } elseif ($filters['ton_kho'] === \App\Constants\SanPhamConstants::TON_KHO_SAP_HET) {
                $sql .= " AND sp.tong_ton_kho > 0 AND (
                    (sp.gia_ban >= " . \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP . " AND sp.tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_CAO_CAP . ") OR
                    (sp.gia_ban >= " . \App\Constants\SanPhamConstants::MUC_GIA_RE . " AND sp.gia_ban < " . \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP . " AND sp.tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_MAC_DINH . ") OR
                    (sp.gia_ban < " . \App\Constants\SanPhamConstants::MUC_GIA_RE . " AND sp.tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_GIA_RE . ")
                )";
            } elseif ($filters['ton_kho'] === \App\Constants\SanPhamConstants::TON_KHO_CON_HANG) {
                $sql .= " AND sp.tong_ton_kho > 0 AND NOT (
                    (sp.gia_ban >= " . \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP . " AND sp.tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_CAO_CAP . ") OR
                    (sp.gia_ban >= " . \App\Constants\SanPhamConstants::MUC_GIA_RE . " AND sp.gia_ban < " . \App\Constants\SanPhamConstants::MUC_GIA_CAO_CAP . " AND sp.tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_MAC_DINH . ") OR
                    (sp.gia_ban < " . \App\Constants\SanPhamConstants::MUC_GIA_RE . " AND sp.tong_ton_kho <= " . \App\Constants\SanPhamConstants::NGUONG_SAP_HET_GIA_RE . ")
                )";
            }
        }

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? (int)$row['total'] : 0;
    }

    public function timTheoId($id)
    {
        $sql = "SELECT sp.*, dm.ten_danh_muc, ld.ten_loai_da, mpt.ten_menh 
            FROM san_pham sp
            LEFT JOIN danh_muc dm ON sp.id_danh_muc = dm.id
            LEFT JOIN loai_da ld ON sp.id_loai_da = ld.id
            LEFT JOIN menh_phong_thuy mpt ON sp.id_menh_phong_thuy = mpt.id
            WHERE sp.id = :id AND sp.da_xoa = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function themMoi($data)
    {
        $fields = array_keys($data);
        $placeholders = array_map(function($f) { return ":$f"; }, $fields);
        $sql = "INSERT INTO san_pham (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";
        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        return $stmt->execute();
    }

    public function capNhat($id, $data)
    {
        $sets = [];
        foreach ($data as $key => $val) {
            $sets[] = "$key = :$key";
        }
        $sql = "UPDATE san_pham SET " . implode(', ', $sets) . " WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        foreach ($data as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function updateStatus($id, $status)
    {
        $sql = "UPDATE san_pham SET trang_thai = :status WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':status', (int)$status, \PDO::PARAM_INT);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function xoaMem($id)
    {
        $sql = "UPDATE san_pham SET da_xoa = 1 WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function getProductImages($productId)
    {
        $sql = "SELECT duong_dan FROM san_pham_hinh_anh WHERE id_san_pham = :id_san_pham";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_san_pham', $productId);
        $stmt->execute();
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $paths = [];
        foreach ($images as $img) {
            $paths[] = $img['duong_dan'];
        }
        return $paths;
    }

    public function insertProductImage($id_san_pham, $duong_dan)
    {
        $id = 'img_' . uniqid();
        $sql = "INSERT INTO san_pham_hinh_anh (id, id_san_pham, duong_dan) VALUES (:id, :id_san_pham, :duong_dan)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':id_san_pham', $id_san_pham);
        $stmt->bindValue(':duong_dan', $duong_dan);
        return $stmt->execute();
    }

    public function deleteProductImages($id_san_pham)
    {
        $sql = "DELETE FROM san_pham_hinh_anh WHERE id_san_pham = :id_san_pham";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_san_pham', $id_san_pham);
        return $stmt->execute();
    }

    public function getBienTheByProductId($productId)
    {
        $sql = "SELECT * FROM san_pham_bien_the WHERE id_san_pham = :id_san_pham ORDER BY thuoc_tinh ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_san_pham', $productId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteBienThe($id_san_pham)
    {
        $sql = "DELETE FROM san_pham_bien_the WHERE id_san_pham = :id_san_pham";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_san_pham', $id_san_pham);
        return $stmt->execute();
    }

    public function insertBienThe($id_san_pham, $thuoc_tinh, $so_luong_ton, $gia_cong_them)
    {
        $id = 'bt_' . uniqid();
        $sql = "INSERT INTO san_pham_bien_the (id, id_san_pham, thuoc_tinh, so_luong_ton, gia_cong_them) VALUES (:id, :id_san_pham, :thuoc_tinh, :so_luong_ton, :gia_cong_them)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':id_san_pham', $id_san_pham);
        $stmt->bindValue(':thuoc_tinh', $thuoc_tinh);
        $stmt->bindValue(':so_luong_ton', (int)$so_luong_ton, PDO::PARAM_INT);
        $stmt->bindValue(':gia_cong_them', (float)$gia_cong_them);
        return $stmt->execute();
    }
}
