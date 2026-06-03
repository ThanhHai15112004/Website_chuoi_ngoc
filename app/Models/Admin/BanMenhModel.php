<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;

/**
 * BanMenhModel - Tương tác DB cho tính năng phân tích bản mệnh
 */
class BanMenhModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Lưu kết quả phân tích vào DB
     */
    public function luuKetQua(array $data): bool
    {
        $sql = "INSERT INTO ket_qua_ban_menh 
                (id, id_nguoi_dung, slug_ket_qua, loai_lich, ngay_sinh, thang_sinh, nam_sinh,
                 gioi_tinh, mong_muon, ten_menh, thien_can, dia_chi, cung_phi, ten_cung, nhom_menh, ket_qua_json, ngay_tra)
                VALUES 
                (:id, :id_nguoi_dung, :slug_ket_qua, :loai_lich, :ngay_sinh, :thang_sinh, :nam_sinh,
                 :gioi_tinh, :mong_muon, :ten_menh, :thien_can, :dia_chi, :cung_phi, :ten_cung, :nhom_menh, :ket_qua_json, NOW())";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * Lấy kết quả theo slug
     */
    public function layTheoSlug(string $slug): ?array
    {
        $sql = "SELECT * FROM ket_qua_ban_menh WHERE slug_ket_qua = :slug LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['slug' => $slug]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    /**
     * Lấy lịch sử tra cứu của người dùng
     */
    public function layLichSuCuaNguoiDung(string $idNguoiDung, int $limit = 10, int $offset = 0): array
    {
        $sql = "SELECT id, slug_ket_qua, loai_lich, ngay_sinh, thang_sinh, nam_sinh, gioi_tinh,
                       mong_muon, ten_menh, thien_can, dia_chi, cung_phi, ten_cung, nhom_menh, ngay_tra
                FROM ket_qua_ban_menh
                WHERE id_nguoi_dung = :id
                ORDER BY ngay_tra DESC
                LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $idNguoiDung);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Đếm tổng lịch sử của người dùng
     */
    public function demLichSuCuaNguoiDung(string $idNguoiDung): int
    {
        $sql = "SELECT COUNT(*) FROM ket_qua_ban_menh WHERE id_nguoi_dung = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $idNguoiDung]);
        return (int)$stmt->fetchColumn();
    }

    /**
     * Lấy sản phẩm gợi ý phù hợp với bản mệnh
     * - Ưu tiên 1: Sản phẩm cùng mệnh phong thủy
     * - Ưu tiên 2: Sản phẩm theo loại đá hợp mệnh (tương sinh + cùng hành)
     * - Fallback: Sản phẩm bán chạy nhất
     */
    public function laySanPhamHopMenh(string $idMenh, array $idLoaiDaTuongSinh = [], array $idLoaiDaCungHanh = [], int $limit = 8): array
    {
        $params = [];
        $cases = [];

        // Build dynamic CASE WHEN for priority
        $unionParts = [];

        // Priority 1: Cùng mệnh phong thủy (score = 3)
        if (!empty($idMenh)) {
            $unionParts[] = "SELECT sp.id, 3 as uu_tien FROM san_pham sp 
                             WHERE sp.id_menh_phong_thuy = :id_menh AND sp.da_xoa = 0 AND sp.trang_thai = 1 AND sp.tong_ton_kho > 0";
            $params['id_menh'] = $idMenh;
        }

        // Priority 2: Loại đá tương sinh (score = 2)
        if (!empty($idLoaiDaTuongSinh)) {
            $placeholders = [];
            foreach ($idLoaiDaTuongSinh as $i => $id) {
                $key = "da_ts_$i";
                $placeholders[] = ":$key";
                $params[$key] = $id;
            }
            $unionParts[] = "SELECT sp.id, 2 as uu_tien FROM san_pham sp 
                             WHERE sp.id_loai_da IN (" . implode(',', $placeholders) . ") 
                             AND sp.da_xoa = 0 AND sp.trang_thai = 1 AND sp.tong_ton_kho > 0";
        }

        // Priority 3: Loại đá cùng hành (score = 1)
        if (!empty($idLoaiDaCungHanh)) {
            $placeholders = [];
            foreach ($idLoaiDaCungHanh as $i => $id) {
                $key = "da_ch_$i";
                $placeholders[] = ":$key";
                $params[$key] = $id;
            }
            $unionParts[] = "SELECT sp.id, 1 as uu_tien FROM san_pham sp 
                             WHERE sp.id_loai_da IN (" . implode(',', $placeholders) . ") 
                             AND sp.da_xoa = 0 AND sp.trang_thai = 1 AND sp.tong_ton_kho > 0";
        }

        if (empty($unionParts)) {
            // Fallback: bán chạy nhất
            $sql = "SELECT sp.id, sp.ten_sp, sp.slug, sp.hinh_anh_chinh, sp.gia_ban, sp.gia_khuyen_mai,
                           sp.tong_ton_kho, mpt.ten_menh, mpt.slug as slug_menh, ld.ten_loai_da,
                           'fallback' as loai_goi_y
                    FROM san_pham sp
                    LEFT JOIN menh_phong_thuy mpt ON sp.id_menh_phong_thuy = mpt.id
                    LEFT JOIN loai_da ld ON sp.id_loai_da = ld.id
                    WHERE sp.da_xoa = 0 AND sp.trang_thai = 1 AND sp.tong_ton_kho > 0
                    ORDER BY sp.luot_xem DESC, sp.gia_khuyen_mai IS NOT NULL DESC
                    LIMIT :limit";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Union tất cả và lấy max priority
        $unionSQL = implode(" UNION ALL ", $unionParts);
        $sql = "SELECT sp.id, sp.ten_sp, sp.slug, sp.hinh_anh_chinh, sp.gia_ban, sp.gia_khuyen_mai,
                       sp.tong_ton_kho, mpt.ten_menh, mpt.slug as slug_menh, ld.ten_loai_da,
                       MAX(prio.uu_tien) as uu_tien,
                       CASE MAX(prio.uu_tien)
                           WHEN 3 THEN 'tuong_hop'
                           WHEN 2 THEN 'tuong_sinh'
                           ELSE 'phu_hop'
                       END as loai_goi_y
                FROM ($unionSQL) as prio
                JOIN san_pham sp ON prio.id = sp.id
                LEFT JOIN menh_phong_thuy mpt ON sp.id_menh_phong_thuy = mpt.id
                LEFT JOIN loai_da ld ON sp.id_loai_da = ld.id
                GROUP BY sp.id
                ORDER BY uu_tien DESC, sp.gia_khuyen_mai IS NOT NULL DESC, sp.luot_xem DESC
                LIMIT :limit";

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy ID mệnh phong thủy theo tên mệnh
     */
    public function layIdMenhTheoTen(string $tenMenh): ?string
    {
        $sql = "SELECT id FROM menh_phong_thuy WHERE ten_menh = :ten LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['ten' => $tenMenh]);
        return $stmt->fetchColumn() ?: null;
    }

    /**
     * Lấy các ID loại đá theo danh sách tên
     */
    public function layIdLoaiDaTheoTen(array $tenDaList): array
    {
        if (empty($tenDaList)) return [];
        $placeholders = implode(',', array_fill(0, count($tenDaList), '?'));
        $sql = "SELECT id FROM loai_da WHERE ten_loai_da IN ($placeholders)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($tenDaList);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
}
