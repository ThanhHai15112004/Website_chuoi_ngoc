<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use Exception;

class PhieuKiemKeModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Lấy danh sách phiếu kiểm kê
     */
    public function layDanhSach($filters = [], $limit = 20, $offset = 0)
    {
        $sql = "SELECT pk.*,
                       kh.ten_kho,
                       nd1.ho_ten as nguoi_tao_ten,
                       nd2.ho_ten as nguoi_duyet_ten,
                       (SELECT COUNT(*) FROM chi_tiet_kiem_ke WHERE id_phieu_kiem_ke = pk.id) as tong_sp,
                       (SELECT COUNT(*) FROM chi_tiet_kiem_ke WHERE id_phieu_kiem_ke = pk.id AND trang_thai_kiem != 'Chưa kiểm') as da_kiem,
                       (SELECT COALESCE(SUM(chenh_lech), 0) FROM chi_tiet_kiem_ke WHERE id_phieu_kiem_ke = pk.id AND chenh_lech IS NOT NULL) as tong_chenh_lech,
                       (SELECT COALESCE(SUM(thanh_tien_lech), 0) FROM chi_tiet_kiem_ke WHERE id_phieu_kiem_ke = pk.id AND thanh_tien_lech IS NOT NULL) as gia_tri_lech
                FROM phieu_kiem_ke pk
                LEFT JOIN kho_hang kh ON pk.id_kho = kh.id
                LEFT JOIN nguoi_dung nd1 ON pk.id_nguoi_tao = nd1.id
                LEFT JOIN nguoi_dung nd2 ON pk.id_nguoi_duyet = nd2.id
                WHERE 1=1";

        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (pk.ma_phieu LIKE :kw1 OR pk.ten_dot LIKE :kw2 OR kh.ten_kho LIKE :kw3)";
            $params[':kw1'] = '%' . $filters['keyword'] . '%';
            $params[':kw2'] = '%' . $filters['keyword'] . '%';
            $params[':kw3'] = '%' . $filters['keyword'] . '%';
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND pk.trang_thai = :trang_thai";
            $params[':trang_thai'] = $filters['trang_thai'];
        }

        if (!empty($filters['id_kho'])) {
            $sql .= " AND pk.id_kho = :id_kho";
            $params[':id_kho'] = $filters['id_kho'];
        }

        $sql .= " ORDER BY pk.ngay_tao DESC LIMIT :limit OFFSET :offset";

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
     * Đếm tổng phiếu kiểm kê
     */
    public function demDanhSach($filters = [])
    {
        $sql = "SELECT COUNT(*) as total
                FROM phieu_kiem_ke pk
                LEFT JOIN kho_hang kh ON pk.id_kho = kh.id
                WHERE 1=1";

        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (pk.ma_phieu LIKE :kw1 OR pk.ten_dot LIKE :kw2 OR kh.ten_kho LIKE :kw3)";
            $params[':kw1'] = '%' . $filters['keyword'] . '%';
            $params[':kw2'] = '%' . $filters['keyword'] . '%';
            $params[':kw3'] = '%' . $filters['keyword'] . '%';
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND pk.trang_thai = :trang_thai";
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
                    COUNT(*) as tat_ca,
                    SUM(CASE WHEN trang_thai = 1 THEN 1 ELSE 0 END) as dang_kiem_ke,
                    SUM(CASE WHEN trang_thai = 2 THEN 1 ELSE 0 END) as cho_duyet,
                    SUM(CASE WHEN trang_thai IN (4, 5) THEN 1 ELSE 0 END) as da_hoan_tat,
                    SUM(CASE WHEN trang_thai = 6 THEN 1 ELSE 0 END) as da_huy
                FROM phieu_kiem_ke";

        $stmt = $this->db->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Tính số phiếu có chênh lệch
        $sqlLech = "SELECT 
                        COUNT(DISTINCT pk.id) as co_chenh_lech,
                        COALESCE(SUM(ABS(ct.chenh_lech)), 0) as san_pham_lech,
                        COALESCE(SUM(ct.thanh_tien_lech), 0) as gia_tri_lech
                    FROM phieu_kiem_ke pk
                    JOIN chi_tiet_kiem_ke ct ON pk.id = ct.id_phieu_kiem_ke
                    WHERE ct.chenh_lech IS NOT NULL AND ct.chenh_lech != 0";
        $stmtLech = $this->db->query($sqlLech);
        $rowLech = $stmtLech->fetch(PDO::FETCH_ASSOC);

        return [
            'tat_ca' => (int)($row['tat_ca'] ?? 0),
            'dang_kiem_ke' => (int)($row['dang_kiem_ke'] ?? 0),
            'cho_duyet' => (int)($row['cho_duyet'] ?? 0),
            'da_hoan_tat' => (int)($row['da_hoan_tat'] ?? 0),
            'da_huy' => (int)($row['da_huy'] ?? 0),
            'co_chenh_lech' => (int)($rowLech['co_chenh_lech'] ?? 0),
            'san_pham_lech' => (int)($rowLech['san_pham_lech'] ?? 0),
            'gia_tri_lech' => (float)($rowLech['gia_tri_lech'] ?? 0)
        ];
    }

    /**
     * Tạo phiếu kiểm kê + snapshot tồn kho
     */
    public function taoPhieu($phieu, $danhSachBienThe)
    {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->query("SELECT UUID() as uuid");
            $idPhieu = $stmt->fetchColumn();

            $sqlPhieu = "INSERT INTO phieu_kiem_ke (
                            id, ma_phieu, ten_dot, id_kho, loai_kiem_ke, 
                            trang_thai, ghi_chu, id_nguoi_tao, nguoi_kiem_ke, han_hoan_tat
                         ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmtPhieu = $this->db->prepare($sqlPhieu);
            $stmtPhieu->execute([
                $idPhieu,
                $phieu['ma_phieu'],
                $phieu['ten_dot'] ?? null,
                $phieu['id_kho'],
                $phieu['loai_kiem_ke'] ?? 'Toàn kho',
                $phieu['trang_thai'] ?? 0,
                $phieu['ghi_chu'] ?? null,
                $phieu['id_nguoi_tao'],
                $phieu['nguoi_kiem_ke'] ?? null,
                $phieu['han_hoan_tat'] ?? null
            ]);

            // Snapshot tồn kho từng biến thể + vị trí
            $sqlCt = "INSERT INTO chi_tiet_kiem_ke (id, id_phieu_kiem_ke, id_bien_the, id_vi_tri, ton_he_thong, gia_von) VALUES (?, ?, ?, ?, ?, ?)";
            $stmtCt = $this->db->prepare($sqlCt);

            $stmtTon = $this->db->prepare("SELECT so_luong_ton FROM san_pham_bien_the WHERE id = ?");
            $stmtGia = $this->db->prepare("SELECT sp.gia_nhap FROM san_pham_bien_the bt JOIN san_pham sp ON bt.id_san_pham = sp.id WHERE bt.id = ?");

            foreach ($danhSachBienThe as $item) {
                // If it's old structure (just id string) or new structure (array)
                $idBienThe = is_array($item) ? $item['id'] : $item;
                $idViTri = (is_array($item) && !empty($item['id_vi_tri'])) ? $item['id_vi_tri'] : null;
                $tonHt = (is_array($item) && isset($item['ton_he_thong'])) ? (int)$item['ton_he_thong'] : 0;

                $stmtUuid = $this->db->query("SELECT UUID() as uuid");
                $idCt = $stmtUuid->fetchColumn();

                // Nếu không có tonHt từ frontend gửi lên (tương thích cũ), query lại
                if (!is_array($item)) {
                    $stmtTon->execute([$idBienThe]);
                    $tonHt = (int)($stmtTon->fetchColumn() ?? 0);
                }

                // Lấy giá vốn
                $stmtGia->execute([$idBienThe]);
                $giaVon = (float)($stmtGia->fetchColumn() ?? 0);

                $stmtCt->execute([
                    $idCt,
                    $idPhieu,
                    $idBienThe,
                    $idViTri,
                    $tonHt,
                    $giaVon
                ]);
            }

            $this->db->commit();
            return $idPhieu;
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Lỗi tạo phiếu kiểm kê: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Lấy chi tiết phiếu kiểm kê
     */
    public function layChiTiet($id)
    {
        $sql = "SELECT pk.*,
                       kh.ten_kho,
                       nd1.ho_ten as nguoi_tao_ten,
                       nd2.ho_ten as nguoi_duyet_ten
                FROM phieu_kiem_ke pk
                LEFT JOIN kho_hang kh ON pk.id_kho = kh.id
                LEFT JOIN nguoi_dung nd1 ON pk.id_nguoi_tao = nd1.id
                LEFT JOIN nguoi_dung nd2 ON pk.id_nguoi_duyet = nd2.id
                WHERE pk.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $phieu = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$phieu) return null;

        // Lấy chi tiết kiểm kê + thông tin SP + thông tin vị trí
        $sqlCt = "SELECT ct.*,
                         bt.thuoc_tinh as variant_name,
                         sp.ten_sp as product_name, sp.ma_sp as sku, sp.don_vi_tinh,
                         sp.hinh_anh_chinh as image,
                         kvk.ten_vi_tri
                  FROM chi_tiet_kiem_ke ct
                  LEFT JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
                  LEFT JOIN san_pham sp ON bt.id_san_pham = sp.id
                  LEFT JOIN khu_vuc_kho kvk ON ct.id_vi_tri = kvk.id
                  WHERE ct.id_phieu_kiem_ke = ?
                  ORDER BY ct.trang_thai_kiem ASC, sp.ten_sp ASC, kvk.ten_vi_tri ASC";
        $stmtCt = $this->db->prepare($sqlCt);
        $stmtCt->execute([$id]);
        $chiTiet = $stmtCt->fetchAll(PDO::FETCH_ASSOC);

        // Tính summary
        $tongSp = count($chiTiet);
        $daKiem = 0;
        $tongChenhLech = 0;
        $giaTriLech = 0;
        foreach ($chiTiet as $ct) {
            if ($ct['trang_thai_kiem'] !== 'Chưa kiểm') $daKiem++;
            if ($ct['chenh_lech'] !== null) $tongChenhLech += (int)$ct['chenh_lech'];
            if ($ct['thanh_tien_lech'] !== null) $giaTriLech += (float)$ct['thanh_tien_lech'];
        }

        $phieu['tong_sp'] = $tongSp;
        $phieu['da_kiem'] = $daKiem;
        $phieu['tong_chenh_lech'] = $tongChenhLech;
        $phieu['gia_tri_lech'] = $giaTriLech;

        return [
            'phieu' => $phieu,
            'chi_tiet' => $chiTiet
        ];
    }

    /**
     * Cập nhật kết quả kiểm đếm
     */
    public function capNhatKetQua($idPhieu, $dataKiem)
    {
        try {
            $this->db->beginTransaction();

            $sqlUpdate = "UPDATE chi_tiet_kiem_ke 
                          SET ton_thuc_te = ?, chenh_lech = ?, thanh_tien_lech = ?, 
                              ly_do = ?, ghi_chu = ?, trang_thai_kiem = ?
                          WHERE id = ? AND id_phieu_kiem_ke = ?";
            $stmtUpdate = $this->db->prepare($sqlUpdate);

            foreach ($dataKiem as $ct) {
                $tonThucTe = isset($ct['ton_thuc_te']) ? (int)$ct['ton_thuc_te'] : null;
                $tonHt = (int)($ct['ton_he_thong'] ?? 0);
                $giaVon = (float)($ct['gia_von'] ?? 0);

                if ($tonThucTe !== null) {
                    $chenhLech = $tonThucTe - $tonHt;
                    $thanhTienLech = $chenhLech * $giaVon;
                    $trangThai = ($chenhLech != 0) ? 'Có chênh lệch' : 'Đã kiểm';
                } else {
                    $chenhLech = null;
                    $thanhTienLech = 0;
                    $trangThai = 'Chưa kiểm';
                }

                $stmtUpdate->execute([
                    $tonThucTe,
                    $chenhLech,
                    $thanhTienLech,
                    $ct['ly_do'] ?? null,
                    $ct['ghi_chu'] ?? null,
                    $trangThai,
                    $ct['id_chi_tiet'],
                    $idPhieu
                ]);
            }

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Lỗi cập nhật kết quả kiểm kê: " . $e->getMessage());
            return false;
        }
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
        $sql = "UPDATE phieu_kiem_ke SET " . implode(', ', $setClauses) . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Duyệt + Điều chỉnh kho theo chênh lệch
     */
    public function duyetVaDieuChinh($id, $userId)
    {
        try {
            $this->db->beginTransaction();

            // Lấy các chi tiết có chênh lệch
            $sql = "SELECT ct.id_bien_the, ct.id_vi_tri, ct.chenh_lech, ct.ton_thuc_te
                    FROM chi_tiet_kiem_ke ct 
                    WHERE ct.id_phieu_kiem_ke = ? AND ct.chenh_lech IS NOT NULL AND ct.chenh_lech != 0";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            $chiTietLech = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Tồn kho tổng của biến thể sẽ được tính lại dựa trên SUM(san_pham_vi_tri) HOẶC tự tính bằng cách cộng chênh lệch.
            // Phương án an toàn là cộng chênh lệch thẳng vào san_pham_bien_the (vì có thể có tồn không thuộc vị trí nào).
            $stmtUpdateBt = $this->db->prepare("UPDATE san_pham_bien_the SET so_luong_ton = so_luong_ton + ? WHERE id = ?");
            
            // Xử lý Cập nhật / Insert vào san_pham_vi_tri
            $stmtCheckViTri = $this->db->prepare("SELECT id FROM san_pham_vi_tri WHERE id_bien_the = ? AND id_vi_tri = ?");
            $stmtUpdateViTri = $this->db->prepare("UPDATE san_pham_vi_tri SET so_luong = so_luong + ? WHERE id_bien_the = ? AND id_vi_tri = ?");
            // Nếu có tồn mà chưa có record thì insert tồn thực tế (thường là trường hợp chenh_lech = ton_thuc_te)
            $stmtInsertViTri = $this->db->prepare("INSERT INTO san_pham_vi_tri (id, id_vi_tri, id_bien_the, so_luong) VALUES (UUID(), ?, ?, ?)");

            $stmtGetSp = $this->db->prepare("SELECT id_san_pham FROM san_pham_bien_the WHERE id = ?");
            $sanPhamIds = [];

            foreach ($chiTietLech as $ct) {
                // Cộng chênh lệch vào tồn tổng
                $stmtUpdateBt->execute([$ct['chenh_lech'], $ct['id_bien_the']]);

                // Xử lý cập nhật vị trí
                if (!empty($ct['id_vi_tri'])) {
                    $stmtCheckViTri->execute([$ct['id_bien_the'], $ct['id_vi_tri']]);
                    if ($stmtCheckViTri->fetch()) {
                        // Đã có record, cộng chênh lệch
                        $stmtUpdateViTri->execute([$ct['chenh_lech'], $ct['id_bien_the'], $ct['id_vi_tri']]);
                    } else {
                        // Chưa có record, tạo mới bằng số tồn thực tế
                        $stmtInsertViTri->execute([$ct['id_vi_tri'], $ct['id_bien_the'], $ct['ton_thuc_te']]);
                    }
                }

                $stmtGetSp->execute([$ct['id_bien_the']]);
                $sp = $stmtGetSp->fetch(PDO::FETCH_ASSOC);
                if ($sp) {
                    $sanPhamIds[$sp['id_san_pham']] = true;
                }
            }

            // Cập nhật tổng tồn sản phẩm
            if (!empty($sanPhamIds)) {
                $stmtUpdateSp = $this->db->prepare("
                    UPDATE san_pham 
                    SET tong_ton_kho = (SELECT COALESCE(SUM(so_luong_ton), 0) FROM san_pham_bien_the WHERE id_san_pham = ?) 
                    WHERE id = ?
                ");
                foreach (array_keys($sanPhamIds) as $idSp) {
                    $stmtUpdateSp->execute([$idSp, $idSp]);
                }
            }

            // Cập nhật trạng thái phiếu
            $this->capNhatTrangThai($id, 5, [
                'id_nguoi_duyet' => $userId,
                'ngay_duyet' => date('Y-m-d H:i:s')
            ]);

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Lỗi duyệt kiểm kê: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Lấy tất cả biến thể thuộc 1 kho (dùng khi tạo phiếu kiểm kê toàn kho)
     */
    public function layBienTheTheoKho($idKho)
    {
        // JOIN san_pham_vi_tri để lấy chi tiết tồn theo từng kệ/ngăn
        $sql = "SELECT bt.id as id_bien_the, bt.thuoc_tinh as variant_name, 
                       sp.ten_sp, sp.ma_sp as sku, sp.hinh_anh_chinh as image, sp.gia_nhap,
                       spvt.id_vi_tri, kvk.ten_vi_tri, spvt.so_luong as so_luong_ton
                FROM san_pham_bien_the bt
                JOIN san_pham sp ON bt.id_san_pham = sp.id
                JOIN san_pham_vi_tri spvt ON bt.id = spvt.id_bien_the
                JOIN khu_vuc_kho kvk ON spvt.id_vi_tri = kvk.id
                WHERE sp.da_xoa = 0 AND kvk.id_kho = ?
                ORDER BY sp.ten_sp ASC, bt.thuoc_tinh ASC, kvk.ten_vi_tri ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idKho]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
