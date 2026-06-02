<?php

namespace App\Models\Admin;

use App\Core\Database;
use PDO;

class NhatKyHoatDongModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layDanhSach($params = [], $limit = 20, $offset = 0)
    {
        $sql = "SELECT ls.*, nv.ho_ten, nv.vai_tro, nv.avatar, nv.ma_nv
                FROM nhan_vien_lich_su ls
                LEFT JOIN nhan_vien nv ON ls.id_nhan_vien = nv.id
                WHERE 1=1";
        
        $bindings = [];

        if (!empty($params['search'])) {
            $sql .= " AND (nv.ho_ten LIKE ? OR ls.hanh_dong LIKE ? OR ls.mo_ta LIKE ? OR ls.ip_address LIKE ?)";
            $search = "%{$params['search']}%";
            $bindings[] = $search;
            $bindings[] = $search;
            $bindings[] = $search;
            $bindings[] = $search;
        }

        if (!empty($params['tab']) && $params['tab'] !== 'all' && $params['tab'] !== 'danger') {
            $sql .= " AND ls.hanh_dong LIKE ?";
            $bindings[] = "%{$params['tab']}%";
        }

        if (!empty($params['tab']) && $params['tab'] === 'danger') {
            $sql .= " AND (ls.mo_ta LIKE '%thất bại%' OR ls.hanh_dong LIKE '%Xóa%')";
        }

        if (!empty($params['nhan_vien'])) {
            $sql .= " AND ls.id_nhan_vien = ?";
            $bindings[] = $params['nhan_vien'];
        }

        if (!empty($params['thoi_gian'])) {
            if ($params['thoi_gian'] === 'today') {
                $sql .= " AND DATE(ls.ngay_thuc_hien) = CURDATE()";
            } elseif ($params['thoi_gian'] === 'yesterday') {
                $sql .= " AND DATE(ls.ngay_thuc_hien) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
            } elseif ($params['thoi_gian'] === '7days') {
                $sql .= " AND ls.ngay_thuc_hien >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
            } elseif ($params['thoi_gian'] === '30days') {
                $sql .= " AND ls.ngay_thuc_hien >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
            }
        }

        // Đếm tổng số lượng record
        $countSql = "SELECT COUNT(*) FROM (" . $sql . ") as total";
        $stmtCount = $this->db->prepare($countSql);
        $stmtCount->execute($bindings);
        $total = $stmtCount->fetchColumn();

        // Thêm order và limit
        $sql .= " ORDER BY ls.ngay_thuc_hien DESC LIMIT ? OFFSET ?";
        $bindings[] = (int) $limit;
        $bindings[] = (int) $offset;

        $stmt = $this->db->prepare($sql);
        
        // Cần bind value thủ công cho limit và offset vì PDO có thể hiểu nhầm thành string
        foreach ($bindings as $key => $val) {
            $stmt->bindValue($key + 1, $val, is_int($val) ? PDO::PARAM_INT : PDO::PARAM_STR);
        }
        
        $stmt->execute();
        $logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'data' => $logs,
            'total' => $total
        ];
    }

    public function thongKe()
    {
        $stats = [
            'tong' => 0,
            'dang_nhap' => 0,
            'quan_trong' => 0,
            'nguy_hiem' => 0,
            'dang_nhap_that_bai' => 0,
            'xuat_du_lieu' => 0,
            'module_nhieu_nhat' => 'Không có'
        ];

        // Tổng hôm nay
        $stmt = $this->db->query("SELECT COUNT(*) FROM nhan_vien_lich_su WHERE DATE(ngay_thuc_hien) = CURDATE()");
        $stats['tong'] = $stmt->fetchColumn();

        // Lượt đăng nhập hôm nay
        $stmt = $this->db->query("SELECT COUNT(*) FROM nhan_vien_lich_su WHERE hanh_dong LIKE '%Đăng nhập%' AND DATE(ngay_thuc_hien) = CURDATE()");
        $stats['dang_nhap'] = $stmt->fetchColumn();

        // Quan trọng (Tạo, Cập nhật)
        $stmt = $this->db->query("SELECT COUNT(*) FROM nhan_vien_lich_su WHERE (hanh_dong LIKE '%Tạo%' OR hanh_dong LIKE '%Cập nhật%') AND DATE(ngay_thuc_hien) = CURDATE()");
        $stats['quan_trong'] = $stmt->fetchColumn();

        // Nguy hiểm (Xóa)
        $stmt = $this->db->query("SELECT COUNT(*) FROM nhan_vien_lich_su WHERE hanh_dong LIKE '%Xóa%' AND DATE(ngay_thuc_hien) = CURDATE()");
        $stats['nguy_hiem'] = $stmt->fetchColumn();

        // Đăng nhập thất bại
        $stmt = $this->db->query("SELECT COUNT(*) FROM nhan_vien_lich_su WHERE hanh_dong LIKE '%Đăng nhập%' AND mo_ta LIKE '%thất bại%'");
        $stats['dang_nhap_that_bai'] = $stmt->fetchColumn();

        return $stats;
    }

    public function layChiTiet($id)
    {
        $sql = "SELECT ls.*, nv.ho_ten, nv.vai_tro, nv.avatar, nv.ma_nv
                FROM nhan_vien_lich_su ls
                LEFT JOIN nhan_vien nv ON ls.id_nhan_vien = nv.id
                WHERE ls.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function layDanhSachNhanVien()
    {
        $stmt = $this->db->query("SELECT id, ho_ten, vai_tro, ma_nv FROM nhan_vien WHERE trang_thai = 'hoat_dong'");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ghiLog($data)
    {
        $sql = "INSERT INTO nhan_vien_lich_su (id_nhan_vien, hanh_dong, mo_ta, ip_address, thiet_bi, nguoi_thuc_hien) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $data['id_nhan_vien'],
            $data['hanh_dong'],
            $data['mo_ta'] ?? null,
            $data['ip_address'] ?? $_SERVER['REMOTE_ADDR'] ?? null,
            $data['thiet_bi'] ?? $_SERVER['HTTP_USER_AGENT'] ?? null,
            $data['nguoi_thuc_hien'] ?? null
        ]);
    }
}
