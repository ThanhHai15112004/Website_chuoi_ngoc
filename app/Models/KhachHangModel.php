<?php

namespace App\Models;

use App\Core\Database;
use PDO;
use App\Constants\SystemConstants;
use App\Constants\HangThanhVienConstants;
use App\Constants\DonHangConstants;

class KhachHangModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layDanhSach($filters = [], $limit = 10, $offset = 0)
    {
        $sql = "SELECT nd.id, nd.ma_nd as ma, nd.ho_ten as ten, nd.email, nd.so_dien_thoai as sdt, 
                       nd.gioi_tinh, nd.ngay_sinh, nd.nam_sinh, nd.anh_dai_dien, nd.tong_chi_tieu, nd.trang_thai, nd.ngay_tao,
                       nd.ghi_chu_vip,
                       htv.ten_hang as hang,
                       mpt.ten_menh as menh,
                       (SELECT COUNT(*) FROM don_hang dh WHERE dh.id_nguoi_dung = nd.id) as tong_don,
                       (SELECT COUNT(*) FROM don_hang dh2 WHERE dh2.id_nguoi_dung = nd.id AND dh2.trang_thai_don_hang = " . DonHangConstants::TRANG_THAI_DA_HUY . ") as so_don_huy,
                       (SELECT ma_don_hang FROM don_hang dh3 WHERE dh3.id_nguoi_dung = nd.id ORDER BY dh3.ngay_tao DESC LIMIT 1) as ma_don_gan_nhat,
                       (SELECT ngay_tao FROM don_hang dh4 WHERE dh4.id_nguoi_dung = nd.id ORDER BY dh4.ngay_tao DESC LIMIT 1) as ngay_don_gan_nhat
                FROM nguoi_dung nd
                LEFT JOIN hang_thanh_vien htv ON nd.id_hang_thanh_vien = htv.id
                LEFT JOIN menh_phong_thuy mpt ON nd.id_menh = mpt.id
                WHERE nd.id_vai_tro IS NULL AND nd.deleted_at IS NULL";

        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (nd.ho_ten LIKE :keyword1 OR nd.so_dien_thoai LIKE :keyword2 OR nd.email LIKE :keyword3 OR nd.ma_nd LIKE :keyword4)";
            $keyword = '%' . $filters['keyword'] . '%';
            $params['keyword1'] = $keyword;
            $params['keyword2'] = $keyword;
            $params['keyword3'] = $keyword;
            $params['keyword4'] = $keyword;
        }

        if (isset($filters['tab'])) {
            if ($filters['tab'] === 'khach_moi') {
                $sql .= " AND nd.ngay_tao >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
            } elseif ($filters['tab'] === 'da_mua') {
                $sql .= " AND nd.tong_chi_tieu > 0";
            } elseif ($filters['tab'] === 'chua_mua') {
                $sql .= " AND nd.tong_chi_tieu = 0";
            } elseif ($filters['tab'] === 'gold') {
                $sql .= " AND htv.ten_hang = '" . HangThanhVienConstants::HANG_GOLD . "'";
            } elseif ($filters['tab'] === 'diamond') {
                $sql .= " AND htv.ten_hang = '" . HangThanhVienConstants::HANG_DIAMOND . "'";
            } elseif ($filters['tab'] === 'bi_khoa') {
                $sql .= " AND nd.trang_thai = " . SystemConstants::STATUS_INACTIVE;
            }
        }

        if (!empty($filters['id_hang_thanh_vien'])) {
            $sql .= " AND nd.id_hang_thanh_vien = :id_hang_thanh_vien";
            $params['id_hang_thanh_vien'] = $filters['id_hang_thanh_vien'];
        }

        if (!empty($filters['id_menh'])) {
            $sql .= " AND nd.id_menh = :id_menh";
            $params['id_menh'] = $filters['id_menh'];
        }

        if (!empty($filters['thang_sinh'])) {
            $sql .= " AND MONTH(nd.ngay_sinh) = :thang_sinh";
            $params['thang_sinh'] = $filters['thang_sinh'];
        }

        if (isset($filters['trang_thai_loc']) && $filters['trang_thai_loc'] !== '') {
            $sql .= " AND nd.trang_thai = :trang_thai_loc";
            $params['trang_thai_loc'] = $filters['trang_thai_loc'];
        }

        if (isset($filters['chi_tieu_tu']) && $filters['chi_tieu_tu'] !== '') {
            $sql .= " AND nd.tong_chi_tieu >= :chi_tieu_tu";
            $params['chi_tieu_tu'] = $filters['chi_tieu_tu'];
        }

        if (isset($filters['chi_tieu_den']) && $filters['chi_tieu_den'] !== '') {
            $sql .= " AND nd.tong_chi_tieu <= :chi_tieu_den";
            $params['chi_tieu_den'] = $filters['chi_tieu_den'];
        }

        if (!empty($filters['sort'])) {
            if ($filters['sort'] === 'chi_tieu_desc') {
                $sql .= " ORDER BY nd.tong_chi_tieu DESC, nd.ngay_tao DESC";
            } elseif ($filters['sort'] === 'chi_tieu_asc') {
                $sql .= " ORDER BY nd.tong_chi_tieu ASC, nd.ngay_tao DESC";
            } else {
                $sql .= " ORDER BY nd.ngay_tao DESC";
            }
        } else {
            $sql .= " ORDER BY nd.ngay_tao DESC";
        }

        $sql .= " LIMIT :limit OFFSET :offset";

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
        $sql = "SELECT COUNT(*) as total FROM nguoi_dung nd
                LEFT JOIN hang_thanh_vien htv ON nd.id_hang_thanh_vien = htv.id
                WHERE nd.id_vai_tro IS NULL AND nd.deleted_at IS NULL";

        $params = [];

        if (!empty($filters['keyword'])) {
            $sql .= " AND (nd.ho_ten LIKE :keyword1 OR nd.so_dien_thoai LIKE :keyword2 OR nd.email LIKE :keyword3 OR nd.ma_nd LIKE :keyword4)";
            $keyword = '%' . $filters['keyword'] . '%';
            $params['keyword1'] = $keyword;
            $params['keyword2'] = $keyword;
            $params['keyword3'] = $keyword;
            $params['keyword4'] = $keyword;
        }

        if (isset($filters['tab'])) {
            if ($filters['tab'] === 'khach_moi') {
                $sql .= " AND nd.ngay_tao >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
            } elseif ($filters['tab'] === 'da_mua') {
                $sql .= " AND nd.tong_chi_tieu > 0";
            } elseif ($filters['tab'] === 'chua_mua') {
                $sql .= " AND nd.tong_chi_tieu = 0";
            } elseif ($filters['tab'] === 'gold') {
                $sql .= " AND htv.ten_hang = '" . HangThanhVienConstants::HANG_GOLD . "'";
            } elseif ($filters['tab'] === 'diamond') {
                $sql .= " AND htv.ten_hang = '" . HangThanhVienConstants::HANG_DIAMOND . "'";
            } elseif ($filters['tab'] === 'bi_khoa') {
                $sql .= " AND nd.trang_thai = " . SystemConstants::STATUS_INACTIVE;
            }
        }

        if (!empty($filters['id_hang_thanh_vien'])) {
            $sql .= " AND nd.id_hang_thanh_vien = :id_hang_thanh_vien";
            $params['id_hang_thanh_vien'] = $filters['id_hang_thanh_vien'];
        }

        if (!empty($filters['id_menh'])) {
            $sql .= " AND nd.id_menh = :id_menh";
            $params['id_menh'] = $filters['id_menh'];
        }

        if (!empty($filters['thang_sinh'])) {
            $sql .= " AND MONTH(nd.ngay_sinh) = :thang_sinh";
            $params['thang_sinh'] = $filters['thang_sinh'];
        }

        if (isset($filters['trang_thai_loc']) && $filters['trang_thai_loc'] !== '') {
            $sql .= " AND nd.trang_thai = :trang_thai_loc";
            $params['trang_thai_loc'] = $filters['trang_thai_loc'];
        }

        if (isset($filters['chi_tieu_tu']) && $filters['chi_tieu_tu'] !== '') {
            $sql .= " AND nd.tong_chi_tieu >= :chi_tieu_tu";
            $params['chi_tieu_tu'] = $filters['chi_tieu_tu'];
        }

        if (isset($filters['chi_tieu_den']) && $filters['chi_tieu_den'] !== '') {
            $sql .= " AND nd.tong_chi_tieu <= :chi_tieu_den";
            $params['chi_tieu_den'] = $filters['chi_tieu_den'];
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
                    COUNT(*) as tong,
                    SUM(CASE WHEN ngay_tao >= DATE_SUB(NOW(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) as khach_moi,
                    SUM(CASE WHEN tong_chi_tieu > 0 THEN 1 ELSE 0 END) as da_mua,
                    SUM(CASE WHEN tong_chi_tieu = 0 THEN 1 ELSE 0 END) as chua_mua,
                    SUM(CASE WHEN trang_thai = " . SystemConstants::STATUS_INACTIVE . " THEN 1 ELSE 0 END) as bi_khoa,
                    (SELECT COUNT(*) FROM nguoi_dung nd2 LEFT JOIN hang_thanh_vien htv2 ON nd2.id_hang_thanh_vien = htv2.id WHERE nd2.id_vai_tro IS NULL AND htv2.ten_hang = '" . HangThanhVienConstants::HANG_DIAMOND . "') as diamond
                FROM nguoi_dung
                WHERE id_vai_tro IS NULL AND deleted_at IS NULL";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return [
            'tong' => (int)($row['tong'] ?? 0),
            'khach_moi' => (int)($row['khach_moi'] ?? 0),
            'da_mua' => (int)($row['da_mua'] ?? 0),
            'chua_mua' => (int)($row['chua_mua'] ?? 0),
            'bi_khoa' => (int)($row['bi_khoa'] ?? 0),
            'diamond' => (int)($row['diamond'] ?? 0)
        ];
    }

    public function timTheoId($id)
    {
        $sql = "SELECT * FROM nguoi_dung WHERE id = ? AND id_vai_tro IS NULL AND deleted_at IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function findByMa($ma)
    {
        $sql = "SELECT nd.*, htv.ten_hang, mpt.ten_menh 
                FROM nguoi_dung nd 
                LEFT JOIN hang_thanh_vien htv ON nd.id_hang_thanh_vien = htv.id 
                LEFT JOIN menh_phong_thuy mpt ON nd.id_menh = mpt.id
                WHERE nd.ma_nd = ? AND nd.id_vai_tro IS NULL AND nd.deleted_at IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$ma]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrdersByUser($userId)
    {
        $sql = "SELECT dh.id, dh.ma_don_hang as ma, dh.thanh_tien, dh.pt_thanh_toan as phuong_thuc_thanh_toan, 
                       dh.trang_thai_don_hang, dh.trang_thai_thanh_toan, dh.ngay_tao,
                       (SELECT sp.ten_sp FROM chi_tiet_don_hang ct JOIN san_pham_bien_the spbt ON ct.id_bien_the = spbt.id JOIN san_pham sp ON spbt.id_san_pham = sp.id WHERE ct.id_don_hang = dh.id LIMIT 1) as ten_san_pham,
                       (SELECT sp.hinh_anh_chinh FROM chi_tiet_don_hang ct JOIN san_pham_bien_the spbt ON ct.id_bien_the = spbt.id JOIN san_pham sp ON spbt.id_san_pham = sp.id WHERE ct.id_don_hang = dh.id LIMIT 1) as hinh_anh
                FROM don_hang dh
                WHERE dh.id_nguoi_dung = ? 
                ORDER BY dh.ngay_tao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVouchersByUser($userId)
    {
        $sql = "SELECT v.id, v.ma_voucher as ma, v.loai_giam, v.gia_tri, v.don_toi_thieu, v.giam_toi_da, 
                       v.ngay_ket_thuc, ndv.trang_thai as tinh_trang_su_dung
                FROM nguoi_dung_voucher ndv
                JOIN voucher v ON ndv.id_voucher = v.id
                WHERE ndv.id_nguoi_dung = ?
                ORDER BY ndv.ngay_tao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLogsByUser($userId)
    {
        $sql = "SELECT hanh_dong, module, gia_tri_moi as ghi_chu, ngay_tao 
                FROM nhat_ky_hoat_dong 
                WHERE id_nguoi_dung = ? 
                ORDER BY ngay_tao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function doiTrangThai($id)
    {
        $stmt = $this->db->prepare("UPDATE nguoi_dung SET trang_thai = CASE WHEN trang_thai = " . SystemConstants::STATUS_ACTIVE . " THEN " . SystemConstants::STATUS_INACTIVE . " ELSE " . SystemConstants::STATUS_ACTIVE . " END WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function themMoi($data)
    {
        $fields = array_keys($data);
        $placeholders = array_fill(0, count($fields), '?');
        
        $sql = "INSERT INTO nguoi_dung (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute(array_values($data));
    }

    public function capNhat($id, $data)
    {
        $fields = [];
        $values = [];
        
        foreach ($data as $key => $val) {
            $fields[] = "$key = ?";
            $values[] = $val;
        }
        
        $values[] = $id;
        
        $sql = "UPDATE nguoi_dung SET " . implode(', ', $fields) . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute($values);
    }

    public function xoa($id)
    {
        $sql = "UPDATE nguoi_dung SET deleted_at = NOW() WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function layVoucher($userId)
    {
        $sql = "SELECT v.ma_voucher as ma, v.loai_giam, v.gia_tri, v.giam_toi_da, v.don_toi_thieu, v.ngay_ket_thuc as han_dung,
                       ndv.trang_thai
                FROM nguoi_dung_voucher ndv
                JOIN voucher v ON ndv.id_voucher = v.id
                WHERE ndv.id_nguoi_dung = ?
                ORDER BY ndv.ngay_tao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layYeuThich($userId)
    {
        $sql = "SELECT sp.id, sp.ten_sp as ten, sp.gia_ban as gia, sp.trang_thai, sp.hinh_anh_chinh as hinh_anh,
                       mpt.ten_menh as menh
                FROM san_pham_yeu_thich spy
                JOIN san_pham sp ON spy.id_san_pham = sp.id
                LEFT JOIN menh_phong_thuy mpt ON sp.id_menh_phong_thuy = mpt.id
                WHERE spy.id_nguoi_dung = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layDanhGia($userId)
    {
        $sql = "SELECT dg.so_sao as sao, dg.noi_dung, dg.ngay_tao as ngay, dg.trang_thai, sp.ten_sp as san_pham, sp.hinh_anh_chinh as hinh_anh
                FROM danh_gia dg
                JOIN san_pham sp ON dg.id_san_pham = sp.id
                WHERE dg.id_nguoi_dung = ?
                ORDER BY dg.ngay_tao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function timKiemNhanh($keyword, $limit = 10)
    {
        $sql = "SELECT nd.id, nd.ho_ten, nd.so_dien_thoai as sdt, nd.email, nd.tong_chi_tieu, nd.diem_tich_luy, nd.dia_chi,
                       htv.ten_hang, htv.phan_tram_giam
                FROM nguoi_dung nd
                LEFT JOIN hang_thanh_vien htv ON nd.id_hang_thanh_vien = htv.id
                WHERE nd.id_vai_tro IS NULL AND nd.deleted_at IS NULL
                AND (nd.ho_ten LIKE :kw1 OR nd.so_dien_thoai LIKE :kw2)
                LIMIT :limit";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':kw1', "%$keyword%");
        $stmt->bindValue(':kw2', "%$keyword%");
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ========== AUTH METHODS ==========

    /**
     * Tìm người dùng theo email (cho login)
     */
    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM nguoi_dung WHERE email = ? AND deleted_at IS NULL LIMIT 1");
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    /**
     * Kiểm tra email đã tồn tại chưa
     */
    public function emailDaTonTai(string $email): bool
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM nguoi_dung WHERE email = ? AND deleted_at IS NULL");
        $stmt->execute([$email]);
        return (int)$stmt->fetchColumn() > 0;
    }

    /**
     * Tạo mã khách hàng tự động: KH0001, KH0002...
     */
    public function taoMaKH(): string
    {
        $stmt = $this->db->query("SELECT MAX(CAST(SUBSTRING(ma_nd, 3) AS UNSIGNED)) as max_num FROM nguoi_dung WHERE ma_nd LIKE 'KH%'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $next = ($row['max_num'] ?? 0) + 1;
        return 'KH' . str_pad($next, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Cập nhật mật khẩu (cho quên mật khẩu)
     */
    public function capNhatMatKhau(string $email, string $hashedPassword): bool
    {
        $stmt = $this->db->prepare("UPDATE nguoi_dung SET mat_khau = ? WHERE email = ? AND deleted_at IS NULL");
        return $stmt->execute([$hashedPassword, $email]);
    }
}
