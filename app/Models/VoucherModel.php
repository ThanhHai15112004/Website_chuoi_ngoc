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

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchColumn();
    }

    public function getThongKe()
    {
        $sql = "SELECT 
                    COUNT(*) as tong_voucher,
                    SUM(CASE WHEN trang_thai = 1 AND ngay_ket_thuc >= NOW() THEN 1 ELSE 0 END) as dang_hoat_dong,
                    SUM(CASE WHEN trang_thai = 1 AND ngay_ket_thuc >= NOW() AND DATEDIFF(ngay_ket_thuc, NOW()) <= 7 THEN 1 ELSE 0 END) as sap_het_han,
                    SUM(CASE WHEN ngay_ket_thuc < NOW() THEN 1 ELSE 0 END) as het_han,
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
        $stmt->execute([
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
        return $stmt->execute([
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
}
