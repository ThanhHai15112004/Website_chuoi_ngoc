<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use Exception;

class PhieuKhoModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layDanhSachPhieu($loai_phieu, $filters = [], $limit = 20, $offset = 0)
    {
        $sql = "SELECT pk.*, 
                       ncc.ten_ncc as ncc, ncc.ma_ncc,
                       nd1.ho_ten as nguoi_tao,
                       nd2.ho_ten as nguoi_kiem,
                       (SELECT COUNT(*) FROM chi_tiet_phieu_kho WHERE id_phieu_kho = pk.id) as tong_sp,
                       (SELECT SUM(so_luong) FROM chi_tiet_phieu_kho WHERE id_phieu_kho = pk.id) as tong_so_luong,
                       (SELECT SUM(so_luong_nhan) FROM chi_tiet_phieu_kho WHERE id_phieu_kho = pk.id) as tong_so_luong_nhan,
                       (SELECT SUM(so_luong_loi) FROM chi_tiet_phieu_kho WHERE id_phieu_kho = pk.id) as tong_loi_thieu,
                       (SELECT GROUP_CONCAT(DISTINCT k.ten_kho SEPARATOR ', ') 
                        FROM chi_tiet_phieu_kho ct 
                        JOIN khu_vuc_kho kv ON ct.id_vi_tri = kv.id 
                        JOIN kho_hang k ON kv.id_kho = k.id 
                        WHERE ct.id_phieu_kho = pk.id) as danh_sach_kho
                FROM phieu_kho pk
                LEFT JOIN nha_cung_cap ncc ON pk.id_nha_cung_cap = ncc.id
                LEFT JOIN nguoi_dung nd1 ON pk.id_nguoi_tao = nd1.id
                LEFT JOIN nguoi_dung nd2 ON pk.id_nguoi_kiem = nd2.id
                WHERE pk.loai_phieu = :loai_phieu";
        
        $params = [':loai_phieu' => $loai_phieu];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (pk.ma_phieu LIKE :keyword OR ncc.ten_ncc LIKE :keyword OR pk.id_don_hang LIKE :keyword)";
            $params[':keyword'] = '%' . $filters['keyword'] . '%';
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND pk.trang_thai = :trang_thai";
            $params[':trang_thai'] = $filters['trang_thai'];
        }

        $sql .= " ORDER BY pk.ngay_tao DESC LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue($key, $val);
        }
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function demDanhSachPhieu($loai_phieu, $filters = [])
    {
        $sql = "SELECT COUNT(*) as total 
                FROM phieu_kho pk
                LEFT JOIN nha_cung_cap ncc ON pk.id_nha_cung_cap = ncc.id
                WHERE pk.loai_phieu = :loai_phieu";
        
        $params = [':loai_phieu' => $loai_phieu];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (pk.ma_phieu LIKE :keyword OR ncc.ten_ncc LIKE :keyword OR pk.id_don_hang LIKE :keyword)";
            $params[':keyword'] = '%' . $filters['keyword'] . '%';
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

        $row = $stmt->fetch();
        return $row ? (int)$row['total'] : 0;
    }

    public function taoPhieuKho($phieu, $chiTiet)
    {
        try {
            $this->db->beginTransaction();

            $stmt = $this->db->prepare("SELECT UUID() as uuid");
            $stmt->execute();
            $idPhieu = $stmt->fetchColumn();

            $sqlPhieu = "INSERT INTO phieu_kho (
                            id, ma_phieu, loai_phieu, id_nguoi_tao, id_nha_cung_cap, id_don_hang,
                            tong_tien, tien_da_tra, trang_thai_thanh_toan, ngay_du_kien, 
                            muc_do_uu_tien, ly_do, ghi_chu, trang_thai
                        ) VALUES (
                            ?, ?, ?, ?, ?, ?,
                            ?, ?, ?, ?, 
                            ?, ?, ?, ?
                        )";
            $stmtPhieu = $this->db->prepare($sqlPhieu);
            $stmtPhieu->execute([
                $idPhieu,
                $phieu['ma_phieu'],
                $phieu['loai_phieu'],
                $phieu['id_nguoi_tao'],
                $phieu['id_nha_cung_cap'] ?? null,
                $phieu['id_don_hang'] ?? null,
                $phieu['tong_tien'],
                $phieu['tien_da_tra'],
                $phieu['trang_thai_thanh_toan'],
                $phieu['ngay_du_kien'],
                $phieu['muc_do_uu_tien'],
                $phieu['ly_do'],
                $phieu['ghi_chu'],
                $phieu['trang_thai']
            ]);

            $sqlCt = "INSERT INTO chi_tiet_phieu_kho (
                          id, id_phieu_kho, id_bien_the, id_vi_tri, so_luong, don_gia, ghi_chu_ct
                      ) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmtCt = $this->db->prepare($sqlCt);

            foreach ($chiTiet as $ct) {
                $stmtUuid = $this->db->prepare("SELECT UUID() as uuid");
                $stmtUuid->execute();
                $idCt = $stmtUuid->fetchColumn();

                $stmtCt->execute([
                    $idCt,
                    $idPhieu,
                    $ct['id_bien_the'],
                    $ct['id_vi_tri'] ?? null,
                    $ct['so_luong'],
                    $ct['don_gia'],
                    $ct['ghi_chu_ct'] ?? null
                ]);
            }

            // Nếu nhập kho hoàn thành luôn
            if ($phieu['loai_phieu'] == 1 && $phieu['trang_thai'] == 3) {
                $this->congTonKhoThucTe($idPhieu);
                $stmtUpdate = $this->db->prepare("UPDATE phieu_kho SET ngay_nhap = NOW() WHERE id = ?");
                $stmtUpdate->execute([$idPhieu]);
            } 
            // Nếu xuất kho hoàn thành luôn
            else if ($phieu['loai_phieu'] == 2 && $phieu['trang_thai'] == 3) {
                $this->truTonKhoThucTe($idPhieu);
                $stmtUpdate = $this->db->prepare("UPDATE phieu_kho SET ngay_nhap = NOW() WHERE id = ?");
                $stmtUpdate->execute([$idPhieu]);
            }

            $this->db->commit();
            return $idPhieu;
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Lỗi tạo phiếu kho: " . $e->getMessage());
            return false;
        }
    }

    public function layChiTietPhieu($id)
    {
        $sql = "SELECT pk.*, 
                       ncc.ten_ncc, ncc.ma_ncc as ncc_code, ncc.sdt as ncc_phone, ncc.dia_chi as ncc_address,
                       nd1.ho_ten as nguoi_tao, nd2.ho_ten as nguoi_kiem
                FROM phieu_kho pk
                LEFT JOIN nha_cung_cap ncc ON pk.id_nha_cung_cap = ncc.id
                LEFT JOIN nguoi_dung nd1 ON pk.id_nguoi_tao = nd1.id
                LEFT JOIN nguoi_dung nd2 ON pk.id_nguoi_kiem = nd2.id
                WHERE pk.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $phieu = $stmt->fetch();

        if (!$phieu) return null;

        $sqlCt = "SELECT ct.*, 
                         bt.thuoc_tinh as variant_name, bt.so_luong_ton as current_stock,
                         sp.ten_sp as product_name, sp.ma_sp as sku, sp.don_vi_tinh as don_vi_tinh,
                         dm.ten_danh_muc as category_name,
                         sp.hinh_anh_chinh as image,
                         kv.ten_vi_tri as ten_vi_tri, kv.ma_vi_tri as ma_vi_tri,
                         k.ten_kho as ten_kho
                  FROM chi_tiet_phieu_kho ct
                  LEFT JOIN san_pham_bien_the bt ON ct.id_bien_the = bt.id
                  LEFT JOIN san_pham sp ON bt.id_san_pham = sp.id
                  LEFT JOIN danh_muc dm ON sp.id_danh_muc = dm.id
                  LEFT JOIN khu_vuc_kho kv ON ct.id_vi_tri = kv.id
                  LEFT JOIN kho_hang k ON kv.id_kho = k.id
                  WHERE ct.id_phieu_kho = ?";
        $stmtCt = $this->db->prepare($sqlCt);
        $stmtCt->execute([$id]);
        $chiTiet = $stmtCt->fetchAll();

        return [
            'phieu' => $phieu,
            'chi_tiet' => $chiTiet
        ];
    }

    public function kiemHangVaNhapKho($idPhieu, $nguoiKiemId, $dataKiem)
    {
        try {
            $this->db->beginTransaction();

            $sqlUpdateCt = "UPDATE chi_tiet_phieu_kho 
                            SET so_luong_nhan = ?, so_luong_loi = ?, loi_thieu_chi_tiet = ?, id_vi_tri = ?
                            WHERE id = ? AND id_phieu_kho = ?";
            $stmtUpdateCt = $this->db->prepare($sqlUpdateCt);

            foreach ($dataKiem as $ct) {
                $idViTri = !empty($ct['id_vi_tri']) ? $ct['id_vi_tri'] : null;
                $stmtUpdateCt->execute([
                    $ct['so_luong_nhan'],
                    $ct['so_luong_loi'],
                    $ct['ly_do'],
                    $idViTri,
                    $ct['id_chi_tiet'],
                    $idPhieu
                ]);
            }

            $sqlUpdatePhieu = "UPDATE phieu_kho 
                               SET trang_thai = 3, id_nguoi_kiem = ?, ngay_nhap = NOW() 
                               WHERE id = ?";
            $stmtUpdatePhieu = $this->db->prepare($sqlUpdatePhieu);
            $stmtUpdatePhieu->execute([$nguoiKiemId, $idPhieu]);

            $this->congTonKhoThucTe($idPhieu);

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Lỗi kiểm hàng: " . $e->getMessage());
            return false;
        }
    }

    public function kiemHangVaXuatKho($idPhieu, $nguoiKiemId, $dataKiem)
    {
        try {
            $this->db->beginTransaction();

            $sqlUpdateCt = "UPDATE chi_tiet_phieu_kho 
                            SET so_luong_nhan = ?, so_luong_loi = ?, loi_thieu_chi_tiet = ? 
                            WHERE id = ? AND id_phieu_kho = ?";
            $stmtUpdateCt = $this->db->prepare($sqlUpdateCt);

            foreach ($dataKiem as $ct) {
                $stmtUpdateCt->execute([
                    $ct['so_luong_nhan'], // Thực tế đã xuất
                    $ct['so_luong_loi'],
                    $ct['ly_do'],
                    $ct['id_chi_tiet'],
                    $idPhieu
                ]);
            }

            $sqlUpdatePhieu = "UPDATE phieu_kho 
                               SET trang_thai = 3, id_nguoi_kiem = ?, ngay_nhap = NOW() 
                               WHERE id = ?";
            $stmtUpdatePhieu = $this->db->prepare($sqlUpdatePhieu);
            $stmtUpdatePhieu->execute([$nguoiKiemId, $idPhieu]);

            $this->truTonKhoThucTe($idPhieu);

            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            error_log("Lỗi xuất hàng: " . $e->getMessage());
            return false;
        }
    }

    private function congTonKhoThucTe($idPhieu)
    {
        $sql = "SELECT id_bien_the, id_vi_tri, COALESCE(so_luong_nhan, so_luong) as sl_nhan, so_luong_loi 
                FROM chi_tiet_phieu_kho WHERE id_phieu_kho = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idPhieu]);
        $chiTiet = $stmt->fetchAll();

        $stmtUpdateBt = $this->db->prepare("UPDATE san_pham_bien_the SET so_luong_ton = so_luong_ton + ? WHERE id = ?");
        $stmtGetSp = $this->db->prepare("SELECT id_san_pham FROM san_pham_bien_the WHERE id = ?");
        $sanPhamIds = [];

        foreach ($chiTiet as $ct) {
            $slThucNhap = max(0, $ct['sl_nhan'] - $ct['so_luong_loi']);
            if ($slThucNhap > 0 && $ct['id_bien_the']) {
                $stmtUpdateBt->execute([$slThucNhap, $ct['id_bien_the']]);
                
                // Cập nhật vị trí kho nếu có
                if (!empty($ct['id_vi_tri'])) {
                    $spvtModel = new \App\Models\Admin\SanPhamViTriModel();
                    $spvtModel->congSoLuong($ct['id_vi_tri'], $ct['id_bien_the'], $slThucNhap);
                }
                
                $stmtGetSp->execute([$ct['id_bien_the']]);
                $sp = $stmtGetSp->fetch();
                if ($sp) {
                    $sanPhamIds[$sp['id_san_pham']] = true;
                }
            }
        }

        if (!empty($sanPhamIds)) {
            $stmtUpdateSp = $this->db->prepare("
                UPDATE san_pham 
                SET tong_ton_kho = (SELECT SUM(so_luong_ton) FROM san_pham_bien_the WHERE id_san_pham = ?) 
                WHERE id = ?
            ");
            foreach (array_keys($sanPhamIds) as $idSp) {
                $stmtUpdateSp->execute([$idSp, $idSp]);
            }
        }
    }

    private function truTonKhoThucTe($idPhieu)
    {
        $sql = "SELECT id_bien_the, id_vi_tri, COALESCE(so_luong_nhan, so_luong) as sl_nhan
                FROM chi_tiet_phieu_kho WHERE id_phieu_kho = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$idPhieu]);
        $chiTiet = $stmt->fetchAll();

        $stmtUpdateBt = $this->db->prepare("UPDATE san_pham_bien_the SET so_luong_ton = so_luong_ton - ? WHERE id = ?");
        $stmtGetSp = $this->db->prepare("SELECT id_san_pham FROM san_pham_bien_the WHERE id = ?");
        $sanPhamIds = [];

        foreach ($chiTiet as $ct) {
            $slThucXuat = max(0, $ct['sl_nhan']); // Số lượng thực tế đã xuất đi
            if ($slThucXuat > 0 && $ct['id_bien_the']) {
                $stmtUpdateBt->execute([$slThucXuat, $ct['id_bien_the']]);
                
                // Trừ khỏi vị trí kho nếu có
                if (!empty($ct['id_vi_tri'])) {
                    $spvtModel = new \App\Models\Admin\SanPhamViTriModel();
                    $spvtModel->truSoLuong($ct['id_vi_tri'], $ct['id_bien_the'], $slThucXuat);
                }
                
                $stmtGetSp->execute([$ct['id_bien_the']]);
                $sp = $stmtGetSp->fetch();
                if ($sp) {
                    $sanPhamIds[$sp['id_san_pham']] = true;
                }
            }
        }

        if (!empty($sanPhamIds)) {
            $stmtUpdateSp = $this->db->prepare("
                UPDATE san_pham 
                SET tong_ton_kho = (SELECT SUM(so_luong_ton) FROM san_pham_bien_the WHERE id_san_pham = ?) 
                WHERE id = ?
            ");
            foreach (array_keys($sanPhamIds) as $idSp) {
                $stmtUpdateSp->execute([$idSp, $idSp]);
            }
        }
    }

    public function xoaPhieu($id)
    {
        $stmt = $this->db->prepare("UPDATE phieu_kho SET trang_thai = 4 WHERE id = ? AND trang_thai != 3");
        return $stmt->execute([$id]);
    }
    
    public function capNhatTrangThai($id, $trangThai) {
        $stmt = $this->db->prepare("UPDATE phieu_kho SET trang_thai = ? WHERE id = ?");
        return $stmt->execute([$trangThai, $id]);
    }
}
