<?php

namespace App\Models;

use App\Core\Database;
use PDO;
use Exception;

class KhuyenMaiModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll($filters = [], $limit = null, $offset = 0) {
        $sql = "SELECT km.*, nd.ho_ten as nguoi_tao_ten 
                FROM chuong_trinh_khuyen_mai km 
                LEFT JOIN nguoi_dung nd ON km.nguoi_tao = nd.id 
                WHERE 1=1";
        
        $params = [];
        
        if (!empty($filters['keyword'])) {
            $sql .= " AND (km.ten_chuong_trinh LIKE ? OR km.ma_km LIKE ? OR EXISTS(
                SELECT 1 FROM chuong_trinh_khuyen_mai_san_pham kmsp
                JOIN san_pham sp ON kmsp.id_san_pham = sp.id
                WHERE kmsp.id_khuyen_mai = km.id AND sp.ten_sp LIKE ?
            ))";
            $keyword = "%{$filters['keyword']}%";
            $params[] = $keyword;
            $params[] = $keyword;
            $params[] = $keyword;
        }

        if (!empty($filters['loai_km'])) {
            $sql .= " AND km.loai_km = ?";
            $params[] = $filters['loai_km'];
        }

        if (!empty($filters['danh_muc'])) {
            $sql .= " AND EXISTS (
                SELECT 1 FROM chuong_trinh_khuyen_mai_san_pham kmsp 
                JOIN san_pham sp ON kmsp.id_san_pham = sp.id 
                WHERE kmsp.id_khuyen_mai = km.id AND sp.id_danh_muc = ?
            )";
            $params[] = $filters['danh_muc'];
        }

        if (!empty($filters['tab']) && $filters['tab'] !== 'tat_ca') {
            $tab = $filters['tab'];
            if ($tab === 'dang_dien_ra') {
                $sql .= " AND km.trang_thai = 1 AND km.ngay_bat_dau <= NOW() AND km.ngay_ket_thuc >= NOW()";
            } elseif ($tab === 'sap_bat_dau') {
                $sql .= " AND km.trang_thai = 1 AND km.ngay_bat_dau > NOW()";
            } elseif ($tab === 'sap_ket_thuc') {
                $sql .= " AND km.trang_thai = 1 AND km.ngay_bat_dau <= NOW() AND km.ngay_ket_thuc >= NOW() AND TIMESTAMPDIFF(DAY, NOW(), km.ngay_ket_thuc) <= 3";
            } elseif ($tab === 'da_ket_thuc') {
                $sql .= " AND (km.trang_thai = 2 OR (km.trang_thai = 1 AND km.ngay_ket_thuc < NOW()))";
            } elseif ($tab === 'da_tat') {
                $sql .= " AND km.trang_thai = 0";
            } elseif ($tab === 'flash_sale') {
                $sql .= " AND km.loai_km = 'flash'";
            }
        }

        $sql .= " ORDER BY km.ngay_tao DESC";
        
        if ($limit !== null) {
            $sql .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
        }
        
        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue($key + 1, $val);
        }
        
        $stmt->execute();
        $promotions = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($promotions as &$promo) {
            $promo['so_luong_san_pham'] = $this->getProductCountByPromotionId($promo['id']);
            $promo['san_pham_demo'] = $this->getDemoProductByPromotionId($promo['id']);
        }
        return $promotions;
    }

    public function countAll($filters = []) {
        $sql = "SELECT COUNT(*) FROM chuong_trinh_khuyen_mai km WHERE 1=1";
        $params = [];
        
        if (!empty($filters['keyword'])) {
            $sql .= " AND (km.ten_chuong_trinh LIKE ? OR km.ma_km LIKE ? OR EXISTS(
                SELECT 1 FROM chuong_trinh_khuyen_mai_san_pham kmsp
                JOIN san_pham sp ON kmsp.id_san_pham = sp.id
                WHERE kmsp.id_khuyen_mai = km.id AND sp.ten_sp LIKE ?
            ))";
            $keyword = "%{$filters['keyword']}%";
            $params[] = $keyword;
            $params[] = $keyword;
            $params[] = $keyword;
        }

        if (!empty($filters['loai_km'])) {
            $sql .= " AND km.loai_km = ?";
            $params[] = $filters['loai_km'];
        }

        if (!empty($filters['danh_muc'])) {
            $sql .= " AND EXISTS (
                SELECT 1 FROM chuong_trinh_khuyen_mai_san_pham kmsp 
                JOIN san_pham sp ON kmsp.id_san_pham = sp.id 
                WHERE kmsp.id_khuyen_mai = km.id AND sp.id_danh_muc = ?
            )";
            $params[] = $filters['danh_muc'];
        }

        if (!empty($filters['tab']) && $filters['tab'] !== 'tat_ca') {
            $tab = $filters['tab'];
            if ($tab === 'dang_dien_ra') {
                $sql .= " AND km.trang_thai = 1 AND km.ngay_bat_dau <= NOW() AND km.ngay_ket_thuc >= NOW()";
            } elseif ($tab === 'sap_bat_dau') {
                $sql .= " AND km.trang_thai = 1 AND km.ngay_bat_dau > NOW()";
            } elseif ($tab === 'sap_ket_thuc') {
                $sql .= " AND km.trang_thai = 1 AND km.ngay_bat_dau <= NOW() AND km.ngay_ket_thuc >= NOW() AND TIMESTAMPDIFF(DAY, NOW(), km.ngay_ket_thuc) <= 3";
            } elseif ($tab === 'da_ket_thuc') {
                $sql .= " AND (km.trang_thai = 2 OR (km.trang_thai = 1 AND km.ngay_ket_thuc < NOW()))";
            } elseif ($tab === 'da_tat') {
                $sql .= " AND km.trang_thai = 0";
            } elseif ($tab === 'flash_sale') {
                $sql .= " AND km.loai_km = 'flash'";
            }
        }

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue($key + 1, $val);
        }
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function getThongKe() {
        $sql = "SELECT 
                    COUNT(*) as tong_chuong_trinh,
                    SUM(CASE WHEN trang_thai = 1 AND ngay_bat_dau <= NOW() AND ngay_ket_thuc >= NOW() THEN 1 ELSE 0 END) as dang_dien_ra,
                    SUM(CASE WHEN trang_thai = 1 AND ngay_bat_dau > NOW() THEN 1 ELSE 0 END) as sap_bat_dau,
                    SUM(CASE WHEN trang_thai = 1 AND ngay_bat_dau <= NOW() AND ngay_ket_thuc >= NOW() AND TIMESTAMPDIFF(DAY, NOW(), ngay_ket_thuc) <= 3 THEN 1 ELSE 0 END) as sap_ket_thuc,
                    SUM(CASE WHEN trang_thai = 2 OR (trang_thai = 1 AND ngay_ket_thuc < NOW()) THEN 1 ELSE 0 END) as da_ket_thuc,
                    SUM(CASE WHEN trang_thai = 0 THEN 1 ELSE 0 END) as da_tat,
                    SUM(CASE WHEN loai_km = 'flash' THEN 1 ELSE 0 END) as flash_sale
                FROM chuong_trinh_khuyen_mai";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $stats = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return [
            'tong_chuong_trinh' => $stats['tong_chuong_trinh'] ?? 0,
            'dang_dien_ra' => $stats['dang_dien_ra'] ?? 0,
            'sap_bat_dau' => $stats['sap_bat_dau'] ?? 0,
            'sap_ket_thuc' => $stats['sap_ket_thuc'] ?? 0,
            'da_ket_thuc' => $stats['da_ket_thuc'] ?? 0,
            'da_tat' => $stats['da_tat'] ?? 0,
            'flash_sale' => $stats['flash_sale'] ?? 0,
            'san_pham_giam_gia' => 0,
            'doanh_thu_km' => 0
        ];
    }

    public function getById($id) {
        $sql = "SELECT km.*, nd.ho_ten as nguoi_tao_ten 
                FROM chuong_trinh_khuyen_mai km 
                LEFT JOIN nguoi_dung nd ON km.nguoi_tao = nd.id 
                WHERE km.id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $promo = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($promo) {
            $promo['san_pham_ap_dung'] = $this->getProductsByPromotionId($id);
        }
        return $promo;
    }

    public function create($data, $products = []) {
        try {
            $this->db->beginTransaction();

            $id = $this->generateUuid();
            // Sinh mã tự động nếu không có
            $ma_km = $data['ma_km'] ?? 'KM-' . strtoupper(substr(uniqid(), -6));

            $sql = "INSERT INTO chuong_trinh_khuyen_mai 
                    (id, ma_km, ten_chuong_trinh, loai_km, kieu_giam, gia_tri_giam, ngay_bat_dau, ngay_ket_thuc, 
                    gioi_han_tong, gioi_han_khach, hien_thi_badge, hien_thi_countdown, hien_thi_progress, trang_thai, nguoi_tao) 
                    VALUES 
                    (:id, :ma_km, :ten_chuong_trinh, :loai_km, :kieu_giam, :gia_tri_giam, :ngay_bat_dau, :ngay_ket_thuc, 
                    :gioi_han_tong, :gioi_han_khach, :hien_thi_badge, :hien_thi_countdown, :hien_thi_progress, :trang_thai, :nguoi_tao)";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ma_km' => $ma_km,
                ':ten_chuong_trinh' => $data['ten_chuong_trinh'],
                ':loai_km' => $data['loai_km'],
                ':kieu_giam' => $data['kieu_giam'],
                ':gia_tri_giam' => $data['gia_tri_giam'],
                ':ngay_bat_dau' => $data['ngay_bat_dau'],
                ':ngay_ket_thuc' => $data['ngay_ket_thuc'],
                ':gioi_han_tong' => $data['gioi_han_tong'] ?? -1,
                ':gioi_han_khach' => $data['gioi_han_khach'] ?? -1,
                ':hien_thi_badge' => $data['hien_thi_badge'] ?? 1,
                ':hien_thi_countdown' => $data['hien_thi_countdown'] ?? 0,
                ':hien_thi_progress' => $data['hien_thi_progress'] ?? 0,
                ':trang_thai' => $data['trang_thai'] ?? 1,
                ':nguoi_tao' => $data['nguoi_tao'] ?? null
            ]);

            // Thêm sản phẩm áp dụng
            if (!empty($products)) {
                $this->addProductsToPromotion($id, $products);
            }

            $this->db->commit();
            
            // Đồng bộ giá nếu trạng thái hoạt động
            if (($data['trang_thai'] ?? 1) == 1) {
                $this->syncPromotionPrices();
            }

            return $id;
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    public function update($id, $data, $products = null) {
        try {
            $this->db->beginTransaction();

            $sql = "UPDATE chuong_trinh_khuyen_mai SET 
                    ten_chuong_trinh = :ten_chuong_trinh, 
                    loai_km = :loai_km, 
                    kieu_giam = :kieu_giam, 
                    gia_tri_giam = :gia_tri_giam, 
                    ngay_bat_dau = :ngay_bat_dau, 
                    ngay_ket_thuc = :ngay_ket_thuc, 
                    gioi_han_tong = :gioi_han_tong, 
                    gioi_han_khach = :gioi_han_khach, 
                    hien_thi_badge = :hien_thi_badge, 
                    hien_thi_countdown = :hien_thi_countdown, 
                    hien_thi_progress = :hien_thi_progress, 
                    trang_thai = :trang_thai 
                    WHERE id = :id";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':id' => $id,
                ':ten_chuong_trinh' => $data['ten_chuong_trinh'],
                ':loai_km' => $data['loai_km'],
                ':kieu_giam' => $data['kieu_giam'],
                ':gia_tri_giam' => $data['gia_tri_giam'],
                ':ngay_bat_dau' => $data['ngay_bat_dau'],
                ':ngay_ket_thuc' => $data['ngay_ket_thuc'],
                ':gioi_han_tong' => $data['gioi_han_tong'] ?? -1,
                ':gioi_han_khach' => $data['gioi_han_khach'] ?? -1,
                ':hien_thi_badge' => $data['hien_thi_badge'] ?? 1,
                ':hien_thi_countdown' => $data['hien_thi_countdown'] ?? 0,
                ':hien_thi_progress' => $data['hien_thi_progress'] ?? 0,
                ':trang_thai' => $data['trang_thai'] ?? 1
            ]);

            // Cập nhật sản phẩm nếu có
            if ($products !== null) {
                // Xóa cũ
                $stmtDel = $this->db->prepare("DELETE FROM chuong_trinh_khuyen_mai_san_pham WHERE id_khuyen_mai = :id_khuyen_mai");
                $stmtDel->execute([':id_khuyen_mai' => $id]);
                // Thêm mới
                if (!empty($products)) {
                    $this->addProductsToPromotion($id, $products);
                }
            }

            $this->db->commit();
            
            // Luôn gọi đồng bộ để dọn dẹp hoặc kích hoạt giá
            $this->syncPromotionPrices();

            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    public function updateStatus($id, $status) {
        $sql = "UPDATE chuong_trinh_khuyen_mai SET trang_thai = :trang_thai WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $res = $stmt->execute([':id' => $id, ':trang_thai' => $status]);
        
        $this->syncPromotionPrices();
        return $res;
    }

    public function delete($id) {
        $sql = "DELETE FROM chuong_trinh_khuyen_mai WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $res = $stmt->execute([':id' => $id]);
        
        $this->syncPromotionPrices();
        return $res;
    }

    private function addProductsToPromotion($id_km, $products) {
        $sql = "INSERT INTO chuong_trinh_khuyen_mai_san_pham (id, id_khuyen_mai, id_san_pham) VALUES (:id, :id_khuyen_mai, :id_san_pham)";
        $stmt = $this->db->prepare($sql);
        foreach ($products as $sp_id) {
            $stmt->execute([
                ':id' => $this->generateUuid(),
                ':id_khuyen_mai' => $id_km,
                ':id_san_pham' => $sp_id
            ]);
        }
    }

    public function getProductsByPromotionId($id_km) {
        $sql = "SELECT sp.id, sp.ma_sp, sp.ten_sp, sp.hinh_anh_chinh, sp.gia_ban, sp.tong_ton_kho, ksp.so_luong_da_ban 
                FROM chuong_trinh_khuyen_mai_san_pham ksp 
                JOIN san_pham sp ON ksp.id_san_pham = sp.id 
                WHERE ksp.id_khuyen_mai = :id_km";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id_km' => $id_km]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    private function getProductCountByPromotionId($id_km) {
        $sql = "SELECT COUNT(*) FROM chuong_trinh_khuyen_mai_san_pham WHERE id_khuyen_mai = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id_km]);
        return $stmt->fetchColumn();
    }

    private function getDemoProductByPromotionId($id_km) {
        $sql = "SELECT sp.ten_sp, sp.ma_sp, sp.hinh_anh_chinh, sp.gia_ban 
                FROM chuong_trinh_khuyen_mai_san_pham ksp 
                JOIN san_pham sp ON ksp.id_san_pham = sp.id 
                WHERE ksp.id_khuyen_mai = :id_km LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id_km' => $id_km]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Đồng bộ giá khuyến mãi vào bảng san_pham
     */
    public function syncPromotionPrices() {
        try {
            $this->db->beginTransaction();

            // 1. Reset toàn bộ giá khuyến mãi về NULL
            $this->db->exec("UPDATE san_pham SET gia_khuyen_mai = NULL");

            // 2. Lấy các chương trình đang hoạt động (trang_thai = 1) và đang trong thời gian hiệu lực
            $sqlActive = "SELECT km.id, km.kieu_giam, km.gia_tri_giam 
                          FROM chuong_trinh_khuyen_mai km
                          WHERE km.trang_thai = 1 
                          AND km.ngay_bat_dau <= NOW() 
                          AND km.ngay_ket_thuc >= NOW()
                          ORDER BY km.ngay_tao DESC"; // Ưu tiên chương trình tạo sau cùng nếu trùng
            $stmt = $this->db->query($sqlActive);
            $activePromos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // 3. Áp dụng giá mới
            $sqlUpdate = $this->db->prepare("
                UPDATE san_pham sp
                JOIN chuong_trinh_khuyen_mai_san_pham ksp ON sp.id = ksp.id_san_pham
                SET sp.gia_khuyen_mai = CASE 
                    WHEN :kieu_giam1 = 'phan_tram' THEN sp.gia_ban - (sp.gia_ban * :gia_tri_giam / 100)
                    WHEN :kieu_giam2 = 'so_tien' THEN GREATEST(0, sp.gia_ban - :gia_tri_giam2)
                    WHEN :kieu_giam3 = 'gia_co_dinh' THEN :gia_tri_giam3
                    ELSE sp.gia_khuyen_mai
                END
                WHERE ksp.id_khuyen_mai = :id_km AND sp.gia_khuyen_mai IS NULL
            ");

            foreach ($activePromos as $promo) {
                $sqlUpdate->execute([
                    ':kieu_giam1' => $promo['kieu_giam'],
                    ':kieu_giam2' => $promo['kieu_giam'],
                    ':kieu_giam3' => $promo['kieu_giam'],
                    ':gia_tri_giam' => $promo['gia_tri_giam'],
                    ':gia_tri_giam2' => $promo['gia_tri_giam'],
                    ':gia_tri_giam3' => $promo['gia_tri_giam'],
                    ':id_km' => $promo['id']
                ]);
            }

            // Tự động chuyển các chương trình đã quá hạn thành trạng thái kết thúc (2)
            $this->db->exec("UPDATE chuong_trinh_khuyen_mai SET trang_thai = 2 WHERE trang_thai = 1 AND ngay_ket_thuc < NOW()");

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            // log error...
            return false;
        }
    }

    private function generateUuid() {
        return sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}
