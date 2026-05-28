<?php

namespace App\Models;

use App\Core\Database;
use PDO;

class KhachHangModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getList($filters = [], $limit = 10, $offset = 0)
    {
        $sql = "SELECT nd.id, nd.ma_nd as ma, nd.ho_ten as ten, nd.email, nd.so_dien_thoai as sdt, 
                       nd.gioi_tinh, nd.ngay_sinh, nd.nam_sinh, nd.anh_dai_dien, nd.tong_chi_tieu, nd.trang_thai, nd.ngay_tao,
                       nd.ghi_chu_vip,
                       htv.ten_hang as hang,
                       mpt.ten_menh as menh,
                       (SELECT COUNT(*) FROM don_hang dh WHERE dh.id_nguoi_dung = nd.id) as tong_don,
                       (SELECT COUNT(*) FROM don_hang dh2 WHERE dh2.id_nguoi_dung = nd.id AND dh2.trang_thai_don_hang = 4) as so_don_huy,
                       (SELECT ma_don_hang FROM don_hang dh3 WHERE dh3.id_nguoi_dung = nd.id ORDER BY dh3.ngay_tao DESC LIMIT 1) as ma_don_gan_nhat,
                       (SELECT ngay_tao FROM don_hang dh4 WHERE dh4.id_nguoi_dung = nd.id ORDER BY dh4.ngay_tao DESC LIMIT 1) as ngay_don_gan_nhat
                FROM nguoi_dung nd
                LEFT JOIN hang_thanh_vien htv ON nd.id_hang_thanh_vien = htv.id
                LEFT JOIN menh_phong_thuy mpt ON nd.id_menh = mpt.id
                WHERE nd.id_vai_tro IS NULL";

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
                $sql .= " AND htv.ten_hang = 'Gold'";
            } elseif ($filters['tab'] === 'diamond') {
                $sql .= " AND htv.ten_hang = 'Diamond'";
            } elseif ($filters['tab'] === 'bi_khoa') {
                $sql .= " AND nd.trang_thai = 0";
            }
        }

        $sql .= " ORDER BY nd.ngay_tao DESC LIMIT :limit OFFSET :offset";

        $stmt = $this->db->prepare($sql);

        foreach ($params as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        $stmt->bindValue(":limit", (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", (int)$offset, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countList($filters = [])
    {
        $sql = "SELECT COUNT(*) as total FROM nguoi_dung nd
                LEFT JOIN hang_thanh_vien htv ON nd.id_hang_thanh_vien = htv.id
                WHERE nd.id_vai_tro IS NULL";

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
                $sql .= " AND htv.ten_hang = 'Gold'";
            } elseif ($filters['tab'] === 'diamond') {
                $sql .= " AND htv.ten_hang = 'Diamond'";
            } elseif ($filters['tab'] === 'bi_khoa') {
                $sql .= " AND nd.trang_thai = 0";
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

    public function getStats()
    {
        $sql = "SELECT 
                    COUNT(*) as tong,
                    SUM(CASE WHEN ngay_tao >= DATE_SUB(NOW(), INTERVAL 30 DAY) THEN 1 ELSE 0 END) as khach_moi,
                    SUM(CASE WHEN tong_chi_tieu > 0 THEN 1 ELSE 0 END) as da_mua,
                    SUM(CASE WHEN tong_chi_tieu = 0 THEN 1 ELSE 0 END) as chua_mua,
                    SUM(CASE WHEN trang_thai = 0 THEN 1 ELSE 0 END) as bi_khoa,
                    (SELECT COUNT(*) FROM nguoi_dung nd2 LEFT JOIN hang_thanh_vien htv2 ON nd2.id_hang_thanh_vien = htv2.id WHERE nd2.id_vai_tro IS NULL AND htv2.ten_hang = 'Diamond') as diamond
                FROM nguoi_dung
                WHERE id_vai_tro IS NULL";
        
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

    public function findById($id)
    {
        $sql = "SELECT * FROM nguoi_dung WHERE id = ? AND id_vai_tro IS NULL";
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
                WHERE nd.ma_nd = ? AND nd.id_vai_tro IS NULL";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$ma]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrdersByUser($userId)
    {
        $sql = "SELECT id, ma_don_hang as ma, tong_tien, pt_thanh_toan as phuong_thuc_thanh_toan, trang_thai_don_hang, trang_thai_thanh_toan, ngay_tao 
                FROM don_hang 
                WHERE id_nguoi_dung = ? 
                ORDER BY ngay_tao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVouchersByUser($userId)
    {
        // Hệ thống hiện tại không có bảng liên kết voucher với user.
        // Tạm thời trả về danh sách rỗng, hoặc có thể lấy các voucher user đã dùng qua đơn hàng.
        // Ở đây trả về rỗng để hiển thị "Chưa có voucher nào" tránh lỗi.
        return [];
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

    public function toggleStatus($id)
    {
        $stmt = $this->db->prepare("UPDATE nguoi_dung SET trang_thai = 1 - trang_thai WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function insert($data)
    {
        $fields = array_keys($data);
        $placeholders = array_fill(0, count($fields), '?');
        
        $sql = "INSERT INTO nguoi_dung (" . implode(', ', $fields) . ") VALUES (" . implode(', ', $placeholders) . ")";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute(array_values($data));
    }

    public function update($id, $data)
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
}
