<?php

namespace App\Models;

use App\Core\Database;
use PDO;
use Exception;

class ThuyenChuyenModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Lấy danh sách phiếu thuyên chuyển kho
     */
    public function layDanhSach($filters = [], $limit = 20, $offset = 0)
    {
        $sql = "SELECT tc.*,
                       kg.ten_kho as ten_kho_gui, kg.ma_kho as ma_kho_gui,
                       kn.ten_kho as ten_kho_nhan, kn.ma_kho as ma_kho_nhan,
                       nd1.ho_ten as nguoi_tao_ten,
                       nd2.ho_ten as nguoi_duyet_ten,
                       (SELECT COUNT(*) FROM chi_tiet_thuyen_chuyen WHERE id_phieu_chuyen = tc.id) as tong_loai_sp,
                       (SELECT COALESCE(SUM(so_luong), 0) FROM chi_tiet_thuyen_chuyen WHERE id_phieu_chuyen = tc.id) as tong_so_luong,
                       (SELECT COALESCE(SUM(so_luong_thuc_nhan), 0) FROM chi_tiet_thuyen_chuyen WHERE id_phieu_chuyen = tc.id AND so_luong_thuc_nhan IS NOT NULL) as tong_thuc_nhan
                FROM thuyen_chuyen_kho tc
                LEFT JOIN kho_hang kg ON tc.id_kho_gui = kg.id
                LEFT JOIN kho_hang kn ON tc.id_kho_nhan = kn.id
                LEFT JOIN nguoi_dung nd1 ON tc.id_nguoi_tao = nd1.id
                LEFT JOIN nguoi_dung nd2 ON tc.id_nguoi_duyet = nd2.id
                WHERE 1=1";

        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (tc.ma_phieu LIKE :kw1 OR kg.ten_kho LIKE :kw2 OR kn.ten_kho LIKE :kw3)";
            $params[':kw1'] = '%' . $filters['keyword'] . '%';
            $params[':kw2'] = '%' . $filters['keyword'] . '%';
            $params[':kw3'] = '%' . $filters['keyword'] . '%';
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND tc.trang_thai = :trang_thai";
            $params[':trang_thai'] = $filters['trang_thai'];
        }

        if (!empty($filters['id_kho_gui'])) {
            $sql .= " AND tc.id_kho_gui = :id_kho_gui";
            $params[':id_kho_gui'] = $filters['id_kho_gui'];
        }

        if (!empty($filters['id_kho_nhan'])) {
            $sql .= " AND tc.id_kho_nhan = :id_kho_nhan";
            $params[':id_kho_nhan'] = $filters['id_kho_nhan'];
        }

        $sql .= " ORDER BY tc.ngay_tao DESC LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue($key, $val);
        }
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Đếm tổng phiếu thuyên chuyển
     */
    public function demDanhSach($filters = [])
    {
        $sql = "SELECT COUNT(*) as total
                FROM thuyen_chuyen_kho tc
                LEFT JOIN kho_hang kg ON tc.id_kho_gui = kg.id
                LEFT JOIN kho_hang kn ON tc.id_kho_nhan = kn.id
                WHERE 1=1";

        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (tc.ma_phieu LIKE :kw1 OR kg.ten_kho LIKE :kw2 OR kn.ten_kho LIKE :kw3)";
            $params[':kw1'] = '%' . $filters['keyword'] . '%';
            $params[':kw2'] = '%' . $filters['keyword'] . '%';
            $params[':kw3'] = '%' . $filters['keyword'] . '%';
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND tc.trang_thai = :trang_thai";
            $params[':trang_thai'] = $filters['trang_thai'];
        }

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue($key, $val);
        }
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? (int)$row['total'] : 0;
    }

    /**
     * Thống kê nhanh
     */
    public function layThongKe()
    {
        $sql = "SELECT 
                    COUNT(*) as tong,
                    SUM(CASE WHEN trang_thai = 1 THEN 1 ELSE 0 END) as cho_xac_nhan,
                    SUM(CASE WHEN trang_thai = 2 THEN 1 ELSE 0 END) as da_duyet,
                    SUM(CASE WHEN trang_thai = 3 THEN 1 ELSE 0 END) as dang_chuyen,
                    SUM(CASE WHEN trang_thai = 4 THEN 1 ELSE 0 END) as hoan_tat,
                    SUM(CASE WHEN trang_thai = 5 THEN 1 ELSE 0 END) as co_loi,
                    SUM(CASE WHEN trang_thai = 6 THEN 1 ELSE 0 END) as da_huy,
                    (SELECT COALESCE(SUM(ct.so_luong), 0) FROM chi_tiet_thuyen_chuyen ct 
                     JOIN thuyen_chuyen_kho tc2 ON ct.id_phieu_chuyen = tc2.id 
                     WHERE tc2.trang_thai = 4) as sp_chuyen
                FROM thuyen_chuyen_kho";

        $stmt = $this->db->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return [
            'tong' => (int)($row['tong'] ?? 0),
            'cho_xac_nhan' => (int)($row['cho_xac_nhan'] ?? 0),
            'da_duyet' => (int)($row['da_duyet'] ?? 0),
            'dang_chuyen' => (int)($row['dang_chuyen'] ?? 0),
            'hoan_tat' => (int)($row['hoan_tat'] ?? 0),
            'co_loi' => (int)($row['co_loi'] ?? 0),
            'da_huy' => (int)($row['da_huy'] ?? 0),
            'sp_chuyen' => (int)($row['sp_chuyen'] ?? 0)
        ];
    }

    /**
     * Tạo phiếu thuyên chuyển mới
     */
    public function taoPhieu($phieu, $chiTiet)
    {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->query("SELECT UUID() as uuid");
            $idPhieu = $stmt->fetchColumn();

            $sql = "INSERT INTO thuyen_chuyen_kho (
                        id, ma_phieu, id_kho_gui, id_kho_nhan, loai_chuyen, 
                        muc_do_uu_tien, trang_thai, ghi_chu, id_nguoi_tao
                    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmtInsert = $this->db->prepare($sql);
            $stmtInsert->execute([
                $idPhieu,
                $phieu['ma_phieu'],
                $phieu['id_kho_gui'],
                $phieu['id_kho_nhan'],
                $phieu['loai_chuyen'] ?? 'Chuyển nội bộ',
                $phieu['muc_do_uu_tien'] ?? 0,
                $phieu['trang_thai'] ?? 0,
                $phieu['ghi_chu'] ?? null,
                $phieu['id_nguoi_tao']
            ]);

            $sqlCt = "INSERT INTO chi_tiet_thuyen_chuyen (id, id_phieu_chuyen, id_bien_the, id_vi_tri, so_luong, ghi_chu) VALUES (?, ?, ?, ?, ?, ?)";
            $stmtCt = $this->db->prepare($sqlCt);

            foreach ($chiTiet as $ct) {
                $stmtUuid = $this->db->query("SELECT UUID() as uuid");
                $idCt = $stmtUuid->fetchColumn();

                $stmtCt->execute([
                    $idCt,
                    $idPhieu,
                    $ct['id_bien_the'],
                    $ct['id_vi_tri'] ?? null,
                    $ct['so_luong'],
                    $ct['ghi_chu'] ?? null
                ]);
            }

            $this->db->commit();
            return $idPhieu;
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Lỗi tạo phiếu thuyên chuyển: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Lấy chi tiết phiếu thuyên chuyển
     */
    public function layChiTiet($id)
    {
        $sql = "SELECT tc.*,
                       kg.ten_kho as ten_kho_gui, kg.ma_kho as ma_kho_gui,
                       kn.ten_kho as ten_kho_nhan, kn.ma_kho as ma_kho_nhan,
                       nd1.ho_ten as nguoi_tao_ten,
                       nd2.ho_ten as nguoi_duyet_ten
                FROM thuyen_chuyen_kho tc
                LEFT JOIN kho_hang kg ON tc.id_kho_gui = kg.id
                LEFT JOIN kho_hang kn ON tc.id_kho_nhan = kn.id
                LEFT JOIN nguoi_dung nd1 ON tc.id_nguoi_tao = nd1.id
                LEFT JOIN nguoi_dung nd2 ON tc.id_nguoi_duyet = nd2.id
                WHERE tc.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $phieu = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$phieu) return null;

        $sqlCt = "SELECT ct.*,
                         bt.thuoc_tinh as variant_name,
                         sp.ten_sp as product_name, sp.ma_sp as sku, sp.don_vi_tinh,
                         sp.hinh_anh_chinh as image,
                         bt.so_luong_ton as ton_kho_hien_tai,
                         kvk.ten_vi_tri as ten_vi_tri,
                         kho_vt.ten_kho as ten_kho_vi_tri
                  FROM chi_tiet_thuyen_chuyen ct
                  LEFT JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
                  LEFT JOIN san_pham sp ON bt.id_san_pham = sp.id
                  LEFT JOIN khu_vuc_kho kvk ON ct.id_vi_tri = kvk.id
                  LEFT JOIN kho_hang kho_vt ON kvk.id_kho = kho_vt.id
                  WHERE ct.id_phieu_chuyen = ?";
        $stmtCt = $this->db->prepare($sqlCt);
        $stmtCt->execute([$id]);
        $chiTiet = $stmtCt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'phieu' => $phieu,
            'chi_tiet' => $chiTiet
        ];
    }

    /**
     * Cập nhật trạng thái phiếu
     */
    public function capNhatTrangThai($id, $trangThai, $extraFields = [])
    {
        $setClauses = ['trang_thai = ?'];
        $params = [$trangThai];

        foreach ($extraFields as $field => $value) {
            $setClauses[] = "$field = ?";
            $params[] = $value;
        }

        $params[] = $id;
        $sql = "UPDATE thuyen_chuyen_kho SET " . implode(', ', $setClauses) . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Bắt đầu chuyển hàng (trừ kho gửi)
     */
    public function batDauChuyen($id)
    {
        try {
            $this->db->beginTransaction();

            // Lấy chi tiết SP cần chuyển
            $sqlCt = "SELECT ct.id_bien_the, ct.so_luong, ct.id_vi_tri FROM chi_tiet_thuyen_chuyen ct WHERE ct.id_phieu_chuyen = ?";
            $stmt = $this->db->prepare($sqlCt);
            $stmt->execute([$id]);
            $chiTiet = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Trừ kho gửi (trừ san_pham_bien_the.so_luong_ton)
            $stmtUpdate = $this->db->prepare("UPDATE san_pham_bien_the SET so_luong_ton = so_luong_ton - ? WHERE id = ?");
            $stmtGetSp = $this->db->prepare("SELECT id_san_pham FROM san_pham_bien_the WHERE id = ?");
            // Trừ tồn kho tại vị trí cụ thể (san_pham_vi_tri)
            $stmtUpdateViTri = $this->db->prepare("UPDATE san_pham_vi_tri SET so_luong = so_luong - ? WHERE id_bien_the = ? AND id_vi_tri = ? AND so_luong >= ?");
            $sanPhamIds = [];

            foreach ($chiTiet as $ct) {
                if ($ct['so_luong'] > 0) {
                    $stmtUpdate->execute([$ct['so_luong'], $ct['id_bien_the']]);
                    
                    // Trừ tồn vị trí nếu có
                    if (!empty($ct['id_vi_tri'])) {
                        $stmtUpdateViTri->execute([$ct['so_luong'], $ct['id_bien_the'], $ct['id_vi_tri'], $ct['so_luong']]);
                    }
                    
                    $stmtGetSp->execute([$ct['id_bien_the']]);
                    $sp = $stmtGetSp->fetch(PDO::FETCH_ASSOC);
                    if ($sp) {
                        $sanPhamIds[$sp['id_san_pham']] = true;
                    }
                }
            }

            // Cập nhật tổng tồn sản phẩm
            $this->capNhatTongTonSanPham($sanPhamIds);

            // Cập nhật trạng thái phiếu
            $this->capNhatTrangThai($id, 3, ['ngay_chuyen' => date('Y-m-d H:i:s')]);

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Lỗi bắt đầu chuyển kho: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Xác nhận nhận hàng (cộng kho nhận)
     */
    public function nhanHang($id, $dataKiem)
    {
        try {
            $this->db->beginTransaction();

            // Cập nhật số lượng thực nhận cho từng chi tiết
            $sqlUpdateCt = "UPDATE chi_tiet_thuyen_chuyen 
                            SET so_luong_thuc_nhan = ?, so_luong_loi = ?, ghi_chu = ?, id_vi_tri_nhan = ?
                            WHERE id = ? AND id_phieu_chuyen = ?";
            $stmtUpdateCt = $this->db->prepare($sqlUpdateCt);

            $coLoi = false;
            $sanPhamIds = [];
            $stmtGetSp = $this->db->prepare("SELECT id_san_pham FROM san_pham_bien_the WHERE id = ?");
            $stmtCongKho = $this->db->prepare("UPDATE san_pham_bien_the SET so_luong_ton = so_luong_ton + ? WHERE id = ?");

            $stmtCheckViTri = $this->db->prepare("SELECT id FROM san_pham_vi_tri WHERE id_bien_the = ? AND id_vi_tri = ?");
            $stmtUpdateViTri = $this->db->prepare("UPDATE san_pham_vi_tri SET so_luong = so_luong + ? WHERE id_bien_the = ? AND id_vi_tri = ?");
            $stmtInsertViTri = $this->db->prepare("INSERT INTO san_pham_vi_tri (id, id_vi_tri, id_bien_the, so_luong) VALUES (UUID(), ?, ?, ?)");

            foreach ($dataKiem as $ct) {
                $thucNhan = (int)($ct['so_luong_thuc_nhan'] ?? 0);
                $soLoi = (int)($ct['so_luong_loi'] ?? 0);
                $idViTriNhan = !empty($ct['id_vi_tri_nhan']) ? $ct['id_vi_tri_nhan'] : null;

                $stmtUpdateCt->execute([
                    $thucNhan,
                    $soLoi,
                    $ct['ghi_chu'] ?? null,
                    $idViTriNhan,
                    $ct['id_chi_tiet'],
                    $id
                ]);

                // Cộng kho nhận theo số lượng thực nhận
                if ($thucNhan > 0) {
                    $stmtCongKho->execute([$thucNhan, $ct['id_bien_the']]);
                    
                    // Cộng vào vị trí kho nhận
                    if ($idViTriNhan) {
                        $stmtCheckViTri->execute([$ct['id_bien_the'], $idViTriNhan]);
                        if ($stmtCheckViTri->fetch()) {
                            $stmtUpdateViTri->execute([$thucNhan, $ct['id_bien_the'], $idViTriNhan]);
                        } else {
                            $stmtInsertViTri->execute([$idViTriNhan, $ct['id_bien_the'], $thucNhan]);
                        }
                    }
                    
                    $stmtGetSp->execute([$ct['id_bien_the']]);
                    $sp = $stmtGetSp->fetch(PDO::FETCH_ASSOC);
                    if ($sp) $sanPhamIds[$sp['id_san_pham']] = true;
                }

                // Kiểm tra có lỗi/thiếu không
                if ($soLoi > 0 || (isset($ct['so_luong_yeu_cau']) && $thucNhan < $ct['so_luong_yeu_cau'])) {
                    $coLoi = true;
                }
            }

            // Cập nhật tổng tồn sản phẩm
            $this->capNhatTongTonSanPham($sanPhamIds);

            // Cập nhật trạng thái phiếu
            $trangThai = $coLoi ? 5 : 4; // 5: Có lỗi, 4: Hoàn tất
            $this->capNhatTrangThai($id, $trangThai, ['ngay_nhan' => date('Y-m-d H:i:s')]);

            $this->db->commit();
            return ['success' => true, 'co_loi' => $coLoi];
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Lỗi nhận hàng chuyển kho: " . $e->getMessage());
            return ['success' => false];
        }
    }

    /**
     * Hủy phiếu (chỉ hủy được nếu chưa bắt đầu chuyển)
     */
    public function huyPhieu($id, $lyDo = '')
    {
        // Kiểm tra trạng thái hiện tại - chỉ hủy nếu chưa chuyển (0, 1, 2)
        $stmt = $this->db->prepare("SELECT trang_thai FROM thuyen_chuyen_kho WHERE id = ?");
        $stmt->execute([$id]);
        $phieu = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$phieu) return false;
        if ($phieu['trang_thai'] >= 3 && $phieu['trang_thai'] != 6) {
            return false; // Không thể hủy phiếu đang chuyển/hoàn tất
        }

        return $this->capNhatTrangThai($id, 6, ['ly_do_huy' => $lyDo]);
    }

    /**
     * Lấy sản phẩm đầu tiên của phiếu (dùng cho preview danh sách)
     */
    public function laySanPhamDauTien($idPhieu)
    {
        $sql = "SELECT ct.*, sp.ten_sp, sp.ma_sp as sku, sp.hinh_anh_chinh as image,
                       bt.thuoc_tinh as variant_name
                FROM chi_tiet_thuyen_chuyen ct
                LEFT JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
                LEFT JOIN san_pham sp ON bt.id_san_pham = sp.id
                WHERE ct.id_phieu_chuyen = ?
                LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idPhieu]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Helper: Cập nhật tổng tồn kho sản phẩm
     */
    private function capNhatTongTonSanPham($sanPhamIds)
    {
        if (empty($sanPhamIds)) return;

        $stmtUpdateSp = $this->db->prepare("
            UPDATE san_pham 
            SET tong_ton_kho = (SELECT COALESCE(SUM(so_luong_ton), 0) FROM san_pham_bien_the WHERE id_san_pham = ?) 
            WHERE id = ?
        ");
        foreach (array_keys($sanPhamIds) as $idSp) {
            $stmtUpdateSp->execute([$idSp, $idSp]);
        }
    }
}
