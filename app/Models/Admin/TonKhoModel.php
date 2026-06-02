<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;

class TonKhoModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layDanhSachTonKho($filters = [], $limit = 20, $offset = 0)
    {
        $sql = "SELECT 
                bt.id as variant_id, 
                sp.id as product_id,
                sp.ten_sp as name,
                sp.ma_sp as sku,
                sp.don_vi_tinh as don_vi_tinh,
                COALESCE(bt.thuoc_tinh, 'Mặc định') as variant,
                COALESCE(bt.so_luong_ton, sp.tong_ton_kho) as stock_current,
                COALESCE(bt.nguong_canh_bao, 5) as stock_threshold,
                dm.ten_danh_muc as category,
                ld.ten_loai_da as gemstone,
                sp.hinh_anh_chinh as image,
                sp.gia_ban as original_price,
                sp.gia_nhap as cost_price,
                -- Giá bán thực tế: ưu tiên gia_khuyen_mai (nếu có KM đang chạy), rồi gia_ban
                CASE 
                    WHEN km_active.id IS NOT NULL THEN
                        CASE 
                            WHEN km_sp.gia_tri_giam_tuy_chinh IS NOT NULL AND km_sp.gia_tri_giam_tuy_chinh > 0 THEN km_sp.gia_tri_giam_tuy_chinh
                            WHEN km_active.kieu_giam = 'phan_tram' THEN ROUND(sp.gia_ban * (1 - km_active.gia_tri_giam / 100))
                            WHEN km_active.kieu_giam = 'so_tien' THEN GREATEST(0, sp.gia_ban - km_active.gia_tri_giam)
                            ELSE sp.gia_ban
                        END
                    WHEN sp.gia_khuyen_mai IS NOT NULL AND sp.gia_khuyen_mai > 0 AND sp.gia_khuyen_mai < sp.gia_ban THEN sp.gia_khuyen_mai
                    ELSE sp.gia_ban
                END as price,
                CASE WHEN km_active.id IS NOT NULL OR (sp.gia_khuyen_mai IS NOT NULL AND sp.gia_khuyen_mai > 0 AND sp.gia_khuyen_mai < sp.gia_ban) THEN 1 ELSE 0 END as is_on_sale,
                (
                    SELECT COALESCE(SUM(ctdh.so_luong), 0)
                    FROM chi_tiet_don_hang ctdh
                    JOIN don_hang dh ON ctdh.id_don_hang = dh.id
                    WHERE ctdh.id_bien_the = bt.id
                    AND dh.ngay_tao >= DATE_SUB(NOW(), INTERVAL 30 DAY)
                    AND dh.trang_thai_don_hang != 4
                ) as sales_30d
            FROM san_pham_bien_the bt
            JOIN san_pham sp ON bt.id_san_pham = sp.id
            LEFT JOIN danh_muc dm ON sp.id_danh_muc = dm.id
            LEFT JOIN loai_da ld ON sp.id_loai_da = ld.id
            -- LEFT JOIN chương trình khuyến mãi đang hoạt động
            LEFT JOIN chuong_trinh_khuyen_mai_san_pham km_sp ON km_sp.id_san_pham = sp.id
            LEFT JOIN chuong_trinh_khuyen_mai km_active ON km_active.id = km_sp.id_khuyen_mai
                AND km_active.trang_thai = 1 
                AND km_active.ngay_bat_dau <= NOW() 
                AND km_active.ngay_ket_thuc >= NOW()
            WHERE sp.da_xoa = 0";

        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (sp.ten_sp LIKE :keyword1 OR sp.ma_sp LIKE :keyword2 OR bt.thuoc_tinh LIKE :keyword3)";
            $params['keyword1'] = '%' . $filters['keyword'] . '%';
            $params['keyword2'] = '%' . $filters['keyword'] . '%';
            $params['keyword3'] = '%' . $filters['keyword'] . '%';
        }

        if (!empty($filters['category'])) {
            $sql .= " AND sp.id_danh_muc = :category";
            $params['category'] = $filters['category'];
        }

        if (!empty($filters['gemstone'])) {
            $sql .= " AND sp.id_loai_da = :gemstone";
            $params['gemstone'] = $filters['gemstone'];
        }

        if (isset($filters['stock_status']) && $filters['stock_status'] !== '') {
            $status = $filters['stock_status'];
            if ($status === '0') {
                $sql .= " AND bt.so_luong_ton <= 0";
            } elseif ($status === 'under_5') {
                $sql .= " AND bt.so_luong_ton > 0 AND bt.so_luong_ton < COALESCE(bt.nguong_canh_bao, 5)";
            } elseif ($status === '10_50') {
                $sql .= " AND bt.so_luong_ton >= 10 AND bt.so_luong_ton <= 50";
            } elseif ($status === 'over_50') {
                $sql .= " AND bt.so_luong_ton > 50";
            }
        }

        if (!empty($filters['tab'])) {
            $tab = $filters['tab'];
            if ($tab === 'in_stock') {
                $sql .= " AND bt.so_luong_ton > 0";
            } elseif ($tab === 'low_stock') {
                $sql .= " AND bt.so_luong_ton > 0 AND bt.so_luong_ton < COALESCE(bt.nguong_canh_bao, 5)";
            } elseif ($tab === 'out_of_stock') {
                $sql .= " AND bt.so_luong_ton <= 0";
            } elseif ($tab === 'high_stock') {
                $sql .= " AND bt.so_luong_ton > 50";
            }
        }

        $sql .= " GROUP BY bt.id ORDER BY sp.ngay_tao DESC, bt.thuoc_tinh ASC LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->bindValue(":limit", (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function demDanhSachTonKho($filters = [])
    {
        $sql = "SELECT COUNT(*) as total
            FROM san_pham_bien_the bt
            JOIN san_pham sp ON bt.id_san_pham = sp.id
            WHERE sp.da_xoa = 0";

        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (sp.ten_sp LIKE :keyword1 OR sp.ma_sp LIKE :keyword2 OR bt.thuoc_tinh LIKE :keyword3)";
            $params['keyword1'] = '%' . $filters['keyword'] . '%';
            $params['keyword2'] = '%' . $filters['keyword'] . '%';
            $params['keyword3'] = '%' . $filters['keyword'] . '%';
        }

        if (!empty($filters['category'])) {
            $sql .= " AND sp.id_danh_muc = :category";
            $params['category'] = $filters['category'];
        }

        if (!empty($filters['gemstone'])) {
            $sql .= " AND sp.id_loai_da = :gemstone";
            $params['gemstone'] = $filters['gemstone'];
        }

        if (isset($filters['stock_status']) && $filters['stock_status'] !== '') {
            $status = $filters['stock_status'];
            if ($status === '0') {
                $sql .= " AND bt.so_luong_ton <= 0";
            } elseif ($status === 'under_5') {
                $sql .= " AND bt.so_luong_ton > 0 AND bt.so_luong_ton < COALESCE(bt.nguong_canh_bao, 5)";
            } elseif ($status === '10_50') {
                $sql .= " AND bt.so_luong_ton >= 10 AND bt.so_luong_ton <= 50";
            } elseif ($status === 'over_50') {
                $sql .= " AND bt.so_luong_ton > 50";
            }
        }

        if (!empty($filters['tab'])) {
            $tab = $filters['tab'];
            if ($tab === 'in_stock') {
                $sql .= " AND bt.so_luong_ton > 0";
            } elseif ($tab === 'low_stock') {
                $sql .= " AND bt.so_luong_ton > 0 AND bt.so_luong_ton < COALESCE(bt.nguong_canh_bao, 5)";
            } elseif ($tab === 'out_of_stock') {
                $sql .= " AND bt.so_luong_ton <= 0";
            } elseif ($tab === 'high_stock') {
                $sql .= " AND bt.so_luong_ton > 50";
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

    public function layThongKe()
    {
        $sql = "SELECT 
            COUNT(bt.id) as total_products,
            SUM(CASE WHEN bt.so_luong_ton > 0 THEN 1 ELSE 0 END) as in_stock,
            SUM(CASE WHEN bt.so_luong_ton > 0 AND bt.so_luong_ton < COALESCE(bt.nguong_canh_bao, 5) THEN 1 ELSE 0 END) as low_stock,
            SUM(CASE WHEN bt.so_luong_ton <= 0 THEN 1 ELSE 0 END) as out_of_stock,
            SUM(CASE WHEN bt.so_luong_ton > 50 THEN 1 ELSE 0 END) as high_stock,
            SUM(bt.so_luong_ton) as total_items,
            SUM(bt.so_luong_ton * sp.gia_nhap) as inventory_value
        FROM san_pham_bien_the bt
        JOIN san_pham sp ON bt.id_san_pham = sp.id
        WHERE sp.da_xoa = 0";

        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function thucThiThaoTacKho($data)
    {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("SELECT id_san_pham FROM san_pham_bien_the WHERE id = ?");
            $stmt->execute([$data['variant_id']]);
            $variant = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if (!$variant) {
                $this->db->rollBack();
                return false;
            }
            $productId = $variant['id_san_pham'];

            $stmt = $this->db->prepare("SELECT UUID() as uuid");
            $stmt->execute();
            $idPhieu = $stmt->fetchColumn();

            $stmt = $this->db->prepare("INSERT INTO phieu_kho (id, ma_phieu, loai_phieu, id_nguoi_tao, ly_do, trang_thai, tong_tien) VALUES (?, ?, ?, ?, ?, 1, 0)");
            $stmt->execute([
                $idPhieu, 
                $data['ma_phieu'], 
                $data['loai_phieu'], 
                $data['user_id'], 
                $data['note']
            ]);

            $stmt = $this->db->prepare("SELECT UUID() as uuid");
            $stmt->execute();
            $idCt = $stmt->fetchColumn();

            $stmt = $this->db->prepare("INSERT INTO chi_tiet_phieu_kho (id, id_phieu_kho, id_bien_the, so_luong, don_gia, ghi_chu_ct) VALUES (?, ?, ?, ?, 0, ?)");
            $stmt->execute([
                $idCt,
                $idPhieu,
                $data['variant_id'],
                $data['quantity_diff'],
                'Điều chỉnh kho'
            ]);

            $stmt = $this->db->prepare("UPDATE san_pham_bien_the SET so_luong_ton = ? WHERE id = ?");
            $stmt->execute([
                $data['actual_stock'],
                $data['variant_id']
            ]);

            $stmt = $this->db->prepare("
                UPDATE san_pham 
                SET tong_ton_kho = (SELECT SUM(so_luong_ton) FROM san_pham_bien_the WHERE id_san_pham = ?) 
                WHERE id = ?
            ");
            $stmt->execute([$productId, $productId]);

            $this->db->commit();
            return true;
        } catch (\Exception $e) {
            $this->db->rollBack();
            error_log("Lỗi thucThiThaoTacKho: " . $e->getMessage());
            return false;
        }
    }
}
