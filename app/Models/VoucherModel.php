<?php

namespace App\Models;

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

    /**
     * Kiểm tra voucher theo mã và tính giảm giá
     */
    public function checkVoucherByCode($ma, $tongTien)
    {
        $sql = "SELECT * FROM voucher WHERE ma_voucher = ? LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([strtoupper(trim($ma))]);
        $vc = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$vc) {
            return ['success' => false, 'message' => 'Mã voucher không tồn tại.'];
        }

        // Kiểm tra trạng thái
        if ($vc['trang_thai'] != 1) {
            return ['success' => false, 'message' => 'Voucher đã bị tắt.'];
        }

        // Kiểm tra thời hạn
        $now = time();
        $start = strtotime($vc['ngay_bat_dau']);
        $end = strtotime($vc['ngay_ket_thuc']);

        if ($now < $start) {
            return ['success' => false, 'message' => 'Voucher chưa đến thời gian sử dụng (bắt đầu: ' . date('d/m/Y', $start) . ').'];
        }
        if ($now > $end) {
            return ['success' => false, 'message' => 'Voucher đã hết hạn (hết hạn: ' . date('d/m/Y', $end) . ').'];
        }

        // Kiểm tra lượt dùng
        if ($vc['so_luong'] != -1 && $vc['da_dung'] >= $vc['so_luong']) {
            return ['success' => false, 'message' => 'Voucher đã hết lượt sử dụng.'];
        }

        // Kiểm tra đơn tối thiểu
        if ($vc['don_toi_thieu'] > 0 && $tongTien < $vc['don_toi_thieu']) {
            return ['success' => false, 'message' => 'Đơn hàng chưa đạt giá trị tối thiểu ' . number_format($vc['don_toi_thieu'], 0, ',', '.') . 'đ.'];
        }

        // Tính giảm giá
        $giamGia = 0;
        $loaiGiam = (int)$vc['loai_giam'];

        if ($loaiGiam == 1) {
            // Giảm phần trăm
            $giamGia = $tongTien * ($vc['gia_tri'] / 100);
            if ($vc['giam_toi_da'] > 0 && $giamGia > $vc['giam_toi_da']) {
                $giamGia = $vc['giam_toi_da'];
            }
        } elseif ($loaiGiam == 2) {
            // Giảm số tiền cố định
            $giamGia = $vc['gia_tri'];
        } elseif ($loaiGiam == 3) {
            // Freeship
            $giamGia = 0; // Freeship xử lý riêng ở phí vận chuyển
        }

        $giamGia = min($giamGia, $tongTien); // Không giảm quá tổng tiền

        $message = 'Áp dụng thành công: ' . $vc['ten_chuong_trinh'];
        if ($loaiGiam == 3) {
            $message = 'Áp dụng Freeship: ' . $vc['ten_chuong_trinh'];
        }

        return [
            'success' => true,
            'id_voucher' => $vc['id'],
            'ma_voucher' => $vc['ma_voucher'],
            'ten_chuong_trinh' => $vc['ten_chuong_trinh'],
            'loai_giam' => $loaiGiam,
            'giam_gia' => (int)$giamGia,
            'is_freeship' => $loaiGiam == 3,
            'message' => $message
        ];
    }
}
