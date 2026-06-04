<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use App\Constants\SystemConstants;

class VoucherModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getActiveVouchers()
    {
        $sql = "SELECT id, ma_voucher, ten_chuong_trinh, mo_ta, loai_giam, gia_tri, don_toi_thieu, giam_toi_da, so_luong, da_dung, ngay_ket_thuc 
                FROM voucher 
                WHERE trang_thai = " . SystemConstants::STATUS_ACTIVE . " AND ngay_ket_thuc >= NOW()
                ORDER BY ngay_ket_thuc ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllVouchers($filters = [], $limit = 20, $offset = 0)
    {
        $sql = "SELECT * FROM voucher WHERE 1=1";
        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (ma_voucher LIKE ? OR ten_chuong_trinh LIKE ?)";
            $params[] = "%{$filters['keyword']}%";
            $params[] = "%{$filters['keyword']}%";
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND trang_thai = ?";
            $params[] = $filters['trang_thai'];
        }

        if (!empty($filters['loai_giam'])) {
            $loaiMap = ['percent' => 1, 'fixed' => 2, 'freeship' => 3, 'gift' => 4];
            if (isset($loaiMap[$filters['loai_giam']])) {
                $sql .= " AND loai_giam = ?";
                $params[] = $loaiMap[$filters['loai_giam']];
            }
        }

        if (!empty($filters['thoi_gian'])) {
            $tg = $filters['thoi_gian'];
            if ($tg === 'active') {
                $sql .= " AND trang_thai = 1 AND ngay_bat_dau <= NOW() AND ngay_ket_thuc >= NOW()";
            } elseif ($tg === 'upcoming') {
                $sql .= " AND trang_thai = 1 AND ngay_bat_dau > NOW()";
            } elseif ($tg === 'expired') {
                $sql .= " AND ngay_ket_thuc < NOW()";
            }
        }

        if (!empty($filters['doi_tuong'])) {
            $dt = $filters['doi_tuong'];
            if (in_array($dt, ['all', 'new'])) {
                $sql .= " AND doi_tuong = ?";
                $params[] = $dt;
            } else {
                $sql .= " AND hang_thanh_vien LIKE ?";
                $params[] = '%"' . $dt . '"%';
            }
        }

        if (!empty($filters['tab']) && $filters['tab'] !== 'all') {
            $tab = $filters['tab'];
            if ($tab === 'active') {
                $sql .= " AND trang_thai = 1 AND ngay_bat_dau <= NOW() AND ngay_ket_thuc >= NOW() AND (so_luong = -1 OR da_dung < so_luong)";
            } elseif ($tab === 'expiring') {
                $sql .= " AND trang_thai = 1 AND ngay_ket_thuc >= NOW() AND DATEDIFF(ngay_ket_thuc, NOW()) <= 7 AND (so_luong = -1 OR da_dung < so_luong)";
            } elseif ($tab === 'expired') {
                $sql .= " AND ngay_ket_thuc < NOW()";
            } elseif ($tab === 'upcoming') {
                $sql .= " AND trang_thai = 1 AND ngay_bat_dau > NOW()";
            } elseif ($tab === 'out_of_stock') {
                $sql .= " AND so_luong != -1 AND da_dung >= so_luong";
            } elseif ($tab === 'disabled') {
                $sql .= " AND trang_thai = 0";
            }
        }

        $sql .= " ORDER BY ngay_tao DESC LIMIT $limit OFFSET $offset";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countAllVouchers($filters = [])
    {
        $sql = "SELECT COUNT(*) FROM voucher WHERE 1=1";
        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (ma_voucher LIKE ? OR ten_chuong_trinh LIKE ?)";
            $params[] = "%{$filters['keyword']}%";
            $params[] = "%{$filters['keyword']}%";
        }

        if (isset($filters['trang_thai']) && $filters['trang_thai'] !== '') {
            $sql .= " AND trang_thai = ?";
            $params[] = $filters['trang_thai'];
        }

        if (!empty($filters['loai_giam'])) {
            $loaiMap = ['percent' => 1, 'fixed' => 2, 'freeship' => 3, 'gift' => 4];
            if (isset($loaiMap[$filters['loai_giam']])) {
                $sql .= " AND loai_giam = ?";
                $params[] = $loaiMap[$filters['loai_giam']];
            }
        }

        if (!empty($filters['thoi_gian'])) {
            $tg = $filters['thoi_gian'];
            if ($tg === 'active') {
                $sql .= " AND trang_thai = 1 AND ngay_bat_dau <= NOW() AND ngay_ket_thuc >= NOW()";
            } elseif ($tg === 'upcoming') {
                $sql .= " AND trang_thai = 1 AND ngay_bat_dau > NOW()";
            } elseif ($tg === 'expired') {
                $sql .= " AND ngay_ket_thuc < NOW()";
            }
        }

        if (!empty($filters['doi_tuong'])) {
            $dt = $filters['doi_tuong'];
            if (in_array($dt, ['all', 'new'])) {
                $sql .= " AND doi_tuong = ?";
                $params[] = $dt;
            } else {
                $sql .= " AND hang_thanh_vien LIKE ?";
                $params[] = '%"' . $dt . '"%';
            }
        }

        if (!empty($filters['tab']) && $filters['tab'] !== 'all') {
            $tab = $filters['tab'];
            if ($tab === 'active') {
                $sql .= " AND trang_thai = 1 AND ngay_bat_dau <= NOW() AND ngay_ket_thuc >= NOW() AND (so_luong = -1 OR da_dung < so_luong)";
            } elseif ($tab === 'expiring') {
                $sql .= " AND trang_thai = 1 AND ngay_ket_thuc >= NOW() AND DATEDIFF(ngay_ket_thuc, NOW()) <= 7 AND (so_luong = -1 OR da_dung < so_luong)";
            } elseif ($tab === 'expired') {
                $sql .= " AND ngay_ket_thuc < NOW()";
            } elseif ($tab === 'upcoming') {
                $sql .= " AND trang_thai = 1 AND ngay_bat_dau > NOW()";
            } elseif ($tab === 'out_of_stock') {
                $sql .= " AND so_luong != -1 AND da_dung >= so_luong";
            } elseif ($tab === 'disabled') {
                $sql .= " AND trang_thai = 0";
            }
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn();
    }

    public function getThongKe()
    {
        $sql = "SELECT 
                    COUNT(*) as tong_voucher,
                    SUM(CASE WHEN trang_thai = 1 AND ngay_bat_dau <= NOW() AND ngay_ket_thuc >= NOW() AND (so_luong = -1 OR da_dung < so_luong) THEN 1 ELSE 0 END) as dang_hoat_dong,
                    SUM(CASE WHEN trang_thai = 1 AND ngay_ket_thuc >= NOW() AND DATEDIFF(ngay_ket_thuc, NOW()) <= 7 THEN 1 ELSE 0 END) as sap_het_han,
                    SUM(CASE WHEN ngay_ket_thuc < NOW() THEN 1 ELSE 0 END) as het_han,
                    SUM(CASE WHEN trang_thai = 1 AND ngay_bat_dau > NOW() THEN 1 ELSE 0 END) as chua_bat_dau,
                    SUM(CASE WHEN so_luong != -1 AND da_dung >= so_luong THEN 1 ELSE 0 END) as het_luot,
                    SUM(CASE WHEN trang_thai = 0 THEN 1 ELSE 0 END) as da_tat,
                    SUM(da_dung) as da_dung
                FROM voucher";
        $stmt = $this->db->query($sql);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Giả sử tổng giảm giá được lấy từ bảng chi tiết đơn hàng (nếu có lưu giá trị giảm cụ thể), ở đây fake tạm theo số lần đã dùng.
        $row['tong_giam_gia'] = $row['da_dung'] * 50000;

        return $row;
    }

    public function getVoucherById($id)
    {
        $sql = "SELECT * FROM voucher WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createVoucher($data)
    {
        $id = uniqid('vc_');
        $sql = "INSERT INTO voucher (
                    id, ma_voucher, ten_chuong_trinh, mo_ta, pham_vi_san_pham, doi_tuong, hang_thanh_vien, 
                    is_combine, loai_giam, gia_tri, don_toi_thieu, giam_toi_da, so_luong, da_dung, 
                    ngay_bat_dau, ngay_ket_thuc, trang_thai
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            $id,
            $data['ma_voucher'],
            $data['ten_chuong_trinh'],
            $data['mo_ta'],
            $data['pham_vi_san_pham'] ?? 'all',
            $data['doi_tuong'] ?? 'all',
            $data['hang_thanh_vien'] ?? null,
            $data['is_combine'] ?? 0,
            $data['loai_giam'],
            $data['gia_tri'],
            $data['don_toi_thieu'] ?? 0,
            $data['giam_toi_da'] ?? 0,
            $data['so_luong'] ?? -1,
            $data['ngay_bat_dau'],
            $data['ngay_ket_thuc'],
            $data['trang_thai'] ?? 1
        ]);

        if ($result) {
            $this->syncVoucherPivot($id, $data['pham_vi_san_pham'] ?? 'all', $data['danh_muc_ids'] ?? [], $data['san_pham_ids'] ?? []);
        }

        return $id;
    }

    public function updateVoucher($id, $data)
    {
        $sql = "UPDATE voucher SET 
                    ma_voucher = ?, 
                    ten_chuong_trinh = ?, 
                    mo_ta = ?, 
                    pham_vi_san_pham = ?, 
                    doi_tuong = ?, 
                    hang_thanh_vien = ?, 
                    is_combine = ?, 
                    loai_giam = ?, 
                    gia_tri = ?, 
                    don_toi_thieu = ?, 
                    giam_toi_da = ?, 
                    so_luong = ?, 
                    ngay_bat_dau = ?, 
                    ngay_ket_thuc = ?, 
                    trang_thai = ?
                WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute([
            $data['ma_voucher'],
            $data['ten_chuong_trinh'],
            $data['mo_ta'],
            $data['pham_vi_san_pham'] ?? 'all',
            $data['doi_tuong'] ?? 'all',
            $data['hang_thanh_vien'] ?? null,
            $data['is_combine'] ?? 0,
            $data['loai_giam'],
            $data['gia_tri'],
            $data['don_toi_thieu'] ?? 0,
            $data['giam_toi_da'] ?? 0,
            $data['so_luong'] ?? -1,
            $data['ngay_bat_dau'],
            $data['ngay_ket_thuc'],
            $data['trang_thai'] ?? 1,
            $id
        ]);

        if ($result) {
            $this->syncVoucherPivot($id, $data['pham_vi_san_pham'] ?? 'all', $data['danh_muc_ids'] ?? [], $data['san_pham_ids'] ?? []);
        }

        return $result;
    }

    private function syncVoucherPivot($id_voucher, $pham_vi, $danh_muc_ids, $san_pham_ids)
    {
        // Xóa pivot cũ
        $stmt_dm_del = $this->db->prepare("DELETE FROM voucher_danh_muc WHERE id_voucher = ?");
        $stmt_dm_del->execute([$id_voucher]);

        $stmt_sp_del = $this->db->prepare("DELETE FROM voucher_san_pham WHERE id_voucher = ?");
        $stmt_sp_del->execute([$id_voucher]);

        if ($pham_vi === 'category' && !empty($danh_muc_ids)) {
            $stmt_dm_ins = $this->db->prepare("INSERT INTO voucher_danh_muc (id_voucher, id_danh_muc) VALUES (?, ?)");
            foreach ($danh_muc_ids as $id_dm) {
                $stmt_dm_ins->execute([$id_voucher, $id_dm]);
            }
        } elseif ($pham_vi === 'product' && !empty($san_pham_ids)) {
            $stmt_sp_ins = $this->db->prepare("INSERT INTO voucher_san_pham (id_voucher, id_san_pham) VALUES (?, ?)");
            foreach ($san_pham_ids as $id_sp) {
                $stmt_sp_ins->execute([$id_voucher, $id_sp]);
            }
        }
    }

    public function getVoucherCategories($id_voucher)
    {
        $sql = "SELECT id_danh_muc FROM voucher_danh_muc WHERE id_voucher = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_voucher]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getVoucherProducts($id_voucher)
    {
        $sql = "SELECT vsp.id_san_pham, sp.ten_sp, sp.ma_sp, sp.hinh_anh_chinh as anh_chinh 
                FROM voucher_san_pham vsp
                JOIN san_pham sp ON vsp.id_san_pham = sp.id
                WHERE vsp.id_voucher = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id_voucher]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteVoucher($id)
    {
        $sql = "DELETE FROM voucher WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function toggleStatus($id, $status)
    {
        $sql = "UPDATE voucher SET trang_thai = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$status, $id]);
    }

    private function validateVoucherScope($vc, $gio_hang, $userRankId)
    {
        // 1. Kiểm tra hạng thành viên
        if (!empty($vc['hang_thanh_vien'])) {
            if ($userRankId !== $vc['hang_thanh_vien']) {
                return false; // Không thuộc hạng thành viên -> Ẩn
            }
        }

        // 2. Kiểm tra phạm vi sản phẩm & Tính $tongTienHopLe
        $tongTienHopLe = 0;
        $hasApplicableItems = false;

        if ($vc['pham_vi_san_pham'] === 'all' || empty($vc['pham_vi_san_pham'])) {
            $hasApplicableItems = true;
            foreach ($gio_hang as $item) {
                $tongTienHopLe += $item['gia'] * $item['so_luong'];
            }
        } elseif ($vc['pham_vi_san_pham'] === 'category') {
            $vcCategories = $this->getVoucherCategories($vc['id']);
            foreach ($gio_hang as $item) {
                if (in_array($item['id_danh_muc'], $vcCategories)) {
                    $hasApplicableItems = true;
                    $tongTienHopLe += $item['gia'] * $item['so_luong'];
                }
            }
        } elseif ($vc['pham_vi_san_pham'] === 'product') {
            $vcProducts = array_column($this->getVoucherProducts($vc['id']), 'id_san_pham');
            foreach ($gio_hang as $item) {
                if (in_array($item['id_san_pham'], $vcProducts)) {
                    $hasApplicableItems = true;
                    $tongTienHopLe += $item['gia'] * $item['so_luong'];
                }
            }
        }

        if (!$hasApplicableItems) {
            return false;
        }

        return $tongTienHopLe;
    }

    /**
     * Kiểm tra voucher theo mã và tính giảm giá
     */
    public function checkVoucherByCode($ma, $gio_hang, $userId = null)
    {
        $sql = "SELECT * FROM voucher WHERE ma_voucher = ? AND loai_giam != 4 LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([strtoupper(trim($ma))]);
        $vc = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$vc) return ['success' => false, 'message' => 'Mã voucher không tồn tại.'];
        if ($vc['trang_thai'] != 1) return ['success' => false, 'message' => 'Voucher đã bị tắt.'];

        $now = time();
        $start = strtotime($vc['ngay_bat_dau']);
        $end = strtotime($vc['ngay_ket_thuc']);
        if ($now < $start) return ['success' => false, 'message' => 'Voucher chưa đến thời gian sử dụng.'];
        if ($now > $end) return ['success' => false, 'message' => 'Voucher đã hết hạn.'];

        if ($vc['so_luong'] != -1 && $vc['da_dung'] >= $vc['so_luong']) {
            return ['success' => false, 'message' => 'Voucher đã hết lượt sử dụng.'];
        }

        if ($userId && isset($vc['gioi_han_moi_user']) && $vc['gioi_han_moi_user'] != -1) {
            if ($this->countUserVoucherUsage($userId, $vc['id']) >= $vc['gioi_han_moi_user']) {
                return ['success' => false, 'message' => 'Bạn đã hết lượt sử dụng mã này.'];
            }
        }

        $userRankId = null;
        if ($userId) {
            $stmtRank = $this->db->prepare("SELECT id_hang_thanh_vien FROM nguoi_dung WHERE id = ?");
            $stmtRank->execute([$userId]);
            $userRankId = $stmtRank->fetchColumn();
        }

        $tongTienHopLe = $this->validateVoucherScope($vc, $gio_hang, $userRankId);
        if ($tongTienHopLe === false) {
            return ['success' => false, 'message' => 'Mã voucher không áp dụng cho các sản phẩm trong giỏ hàng.'];
        }

        if ($vc['don_toi_thieu'] > 0 && $tongTienHopLe < $vc['don_toi_thieu']) {
            return ['success' => false, 'message' => 'Cần mua thêm ' . number_format($vc['don_toi_thieu'] - $tongTienHopLe, 0, ',', '.') . 'đ các sản phẩm hợp lệ để dùng mã này.'];
        }

        // Tính giảm giá
        $loaiGiam = $vc['loai_giam'];
        $giamGia = 0;
        if ($loaiGiam == 1) {
            $giamGia = $tongTienHopLe * ($vc['gia_tri'] / 100);
            if ($vc['giam_toi_da'] > 0 && $giamGia > $vc['giam_toi_da']) $giamGia = $vc['giam_toi_da'];
        } elseif ($loaiGiam == 2) {
            $giamGia = $vc['gia_tri'];
        } elseif ($loaiGiam == 3) {
            $giamGia = 0; // freeship handled elsewhere
        }
        $giamGia = min($giamGia, $tongTienHopLe);

        return [
            'success' => true,
            'id_voucher' => $vc['id'],
            'ma_voucher' => $vc['ma_voucher'],
            'ten_chuong_trinh' => $vc['ten_chuong_trinh'],
            'loai_giam' => $loaiGiam,
            'giam_gia' => (int)$giamGia,
            'is_freeship' => $loaiGiam == 3,
            'message' => $loaiGiam == 3 ? 'Áp dụng Freeship: ' . $vc['ten_chuong_trinh'] : 'Áp dụng thành công: ' . $vc['ten_chuong_trinh']
        ];
    }

    public function getApplicableVouchers($idSanPham, $idDanhMuc)
    {
        $sql = "SELECT DISTINCT v.* 
                FROM voucher v
                LEFT JOIN voucher_danh_muc vdm ON v.id = vdm.id_voucher
                LEFT JOIN voucher_san_pham vsp ON v.id = vsp.id_voucher
                WHERE v.trang_thai = 1 
                AND (v.ngay_bat_dau IS NULL OR v.ngay_bat_dau <= NOW())
                AND (v.ngay_ket_thuc IS NULL OR v.ngay_ket_thuc >= NOW())
                AND (v.so_luong = -1 OR v.da_dung < v.so_luong)
                AND (
                    v.doi_tuong = 'all' 
                    OR (v.doi_tuong = 'category' AND vdm.id_danh_muc = :id_danh_muc)
                    OR (v.doi_tuong = 'product' AND vsp.id_san_pham = :id_san_pham)
                )
                ORDER BY v.ngay_tao DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id_danh_muc', $idDanhMuc);
        $stmt->bindValue(':id_san_pham', $idSanPham);
        $stmt->execute();
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function countUserVoucherUsage($userId, $idVoucher)
    {
        // Hiện tại dùng chung bảng nguoi_dung_voucher. trang_thai = 1 là đã dùng
        $sql = "SELECT COUNT(*) FROM nguoi_dung_voucher WHERE id_nguoi_dung = ? AND id_voucher = ? AND trang_thai = 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId, $idVoucher]);
        return (int)$stmt->fetchColumn();
    }

    public function getEligibleVouchersForCart($gio_hang, $userId = null)
    {
        $sql = "SELECT * FROM voucher 
                WHERE trang_thai = 1 
                AND loai_giam != 4
                AND (ngay_bat_dau IS NULL OR ngay_bat_dau <= NOW())
                AND (ngay_ket_thuc IS NULL OR ngay_ket_thuc >= NOW())
                ORDER BY loai_giam DESC, gia_tri DESC";
        $stmt = $this->db->query($sql);
        $vouchers = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $userRankId = null;
        if ($userId) {
            $stmtRank = $this->db->prepare("SELECT id_hang_thanh_vien FROM nguoi_dung WHERE id = ?");
            $stmtRank->execute([$userId]);
            $userRankId = $stmtRank->fetchColumn();
        }

        $results = [];
        foreach ($vouchers as $vc) {
            $tongTienHopLe = $this->validateVoucherScope($vc, $gio_hang, $userRankId);
            if ($tongTienHopLe === false) {
                continue; // Ẩn hoàn toàn
            }

            $isEligible = true;
            $reason = '';

            if ($vc['so_luong'] != -1 && $vc['da_dung'] >= $vc['so_luong']) {
                $isEligible = false;
                $reason = 'Đã hết lượt sử dụng';
            } elseif ($vc['don_toi_thieu'] > 0 && $tongTienHopLe < $vc['don_toi_thieu']) {
                $isEligible = false;
                $reason = 'Đơn chưa đạt ' . number_format($vc['don_toi_thieu'], 0, ',', '.') . 'đ';
            } elseif ($userId && isset($vc['gioi_han_moi_user']) && $vc['gioi_han_moi_user'] != -1) {
                if ($this->countUserVoucherUsage($userId, $vc['id']) >= $vc['gioi_han_moi_user']) {
                    $isEligible = false;
                    $reason = 'Bạn đã hết lượt dùng';
                }
            }

            $giamGia = 0;
            if ($vc['loai_giam'] == 1) {
                $giamGia = $tongTienHopLe * ($vc['gia_tri'] / 100);
                if ($vc['giam_toi_da'] > 0 && $giamGia > $vc['giam_toi_da']) {
                    $giamGia = $vc['giam_toi_da'];
                }
            } elseif ($vc['loai_giam'] == 2) {
                $giamGia = $vc['gia_tri'];
            }
            $giamGia = min($giamGia, $tongTienHopLe);

            $results[] = [
                'id' => $vc['id'],
                'ma_voucher' => $vc['ma_voucher'],
                'ten_chuong_trinh' => $vc['ten_chuong_trinh'],
                'loai_giam' => $vc['loai_giam'],
                'gia_tri' => $vc['gia_tri'],
                'don_toi_thieu' => $vc['don_toi_thieu'],
                'giam_toi_da' => $vc['giam_toi_da'],
                'so_luong' => $vc['so_luong'],
                'da_dung' => $vc['da_dung'],
                'ngay_ket_thuc' => $vc['ngay_ket_thuc'],
                'is_eligible' => $isEligible,
                'reason' => $reason,
                'giam_gia_du_kien' => $giamGia
            ];
        }

        return $results;
    }
}
