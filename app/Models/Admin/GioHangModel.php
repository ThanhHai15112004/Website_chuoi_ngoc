<?php

namespace App\Models\Admin;

use App\Core\Database;

class GioHangModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Lấy giỏ hàng của user (JOIN thông tin sản phẩm + biến thể)
     */
    public function layGioHangTheoUser($id_nguoi_dung) {
        $sql = "SELECT gh.id, gh.id_san_pham, gh.id_bien_the, gh.so_luong,
                       sp.ten_sp, sp.gia_ban, sp.gia_khuyen_mai, sp.hinh_anh_chinh, sp.tong_ton_kho, sp.trang_thai as sp_trang_thai,
                       sp.slug as sp_slug, sp.id_danh_muc,
                       dm.ten_danh_muc,
                       ld.ten_loai_da,
                       mpt.ten_menh,
                       bt.thuoc_tinh as ten_bien_the, bt.so_luong_ton as bt_ton_kho, bt.gia_cong_them
                FROM gio_hang gh
                JOIN san_pham sp ON gh.id_san_pham = sp.id
                LEFT JOIN danh_muc dm ON sp.id_danh_muc = dm.id
                LEFT JOIN loai_da ld ON sp.id_loai_da = ld.id
                LEFT JOIN menh_phong_thuy mpt ON sp.id_menh_phong_thuy = mpt.id
                LEFT JOIN san_pham_bien_the bt ON gh.id_bien_the = bt.id
                WHERE gh.id_nguoi_dung = :id_nguoi_dung
                ORDER BY gh.ngay_tao DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id_nguoi_dung' => $id_nguoi_dung]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Tìm item trong giỏ
     */
    public function timItem($id_nguoi_dung, $id_san_pham, $id_bien_the = null) {
        $sql = "SELECT * FROM gio_hang WHERE id_nguoi_dung = :uid AND id_san_pham = :spid";
        $params = ['uid' => $id_nguoi_dung, 'spid' => $id_san_pham];
        
        if ($id_bien_the) {
            $sql .= " AND id_bien_the = :btid";
            $params['btid'] = $id_bien_the;
        } else {
            $sql .= " AND id_bien_the IS NULL";
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Thêm item vào giỏ
     */
    public function themItem($id, $id_nguoi_dung, $id_san_pham, $id_bien_the, $so_luong) {
        $sql = "INSERT INTO gio_hang (id, id_nguoi_dung, id_san_pham, id_bien_the, so_luong)
                VALUES (:id, :uid, :spid, :btid, :sl)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'uid' => $id_nguoi_dung,
            'spid' => $id_san_pham,
            'btid' => $id_bien_the,
            'sl' => $so_luong
        ]);
    }

    /**
     * Cập nhật số lượng
     */
    public function capNhatSoLuong($id, $so_luong) {
        $sql = "UPDATE gio_hang SET so_luong = :sl WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['sl' => $so_luong, 'id' => $id]);
    }

    /**
     * Xóa item
     */
    public function xoaItem($id) {
        $sql = "DELETE FROM gio_hang WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    /**
     * Xóa toàn bộ giỏ của user
     */
    public function xoaTatCa($id_nguoi_dung) {
        $sql = "DELETE FROM gio_hang WHERE id_nguoi_dung = :uid";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['uid' => $id_nguoi_dung]);
    }

    /**
     * Đếm số item trong giỏ
     */
    public function demSoItem($id_nguoi_dung) {
        $sql = "SELECT COALESCE(SUM(so_luong), 0) as total FROM gio_hang WHERE id_nguoi_dung = :uid";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['uid' => $id_nguoi_dung]);
        return (int) $stmt->fetch(\PDO::FETCH_ASSOC)['total'];
    }

    /**
     * Lấy biến thể đầu tiên của sản phẩm
     */
    public function layBienTheDauTien($id_san_pham) {
        $sql = "SELECT * FROM san_pham_bien_the WHERE id_san_pham = :spid ORDER BY gia_cong_them ASC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['spid' => $id_san_pham]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Lấy tất cả biến thể của sản phẩm
     */
    public function layBienThe($id_san_pham) {
        $sql = "SELECT * FROM san_pham_bien_the WHERE id_san_pham = :spid ORDER BY gia_cong_them ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['spid' => $id_san_pham]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Lấy thông tin sản phẩm cơ bản (cho session cart)
     */
    public function layThongTinSanPham($id_san_pham) {
        $sql = "SELECT sp.*, dm.ten_danh_muc, ld.ten_loai_da, mpt.ten_menh
                FROM san_pham sp
                LEFT JOIN danh_muc dm ON sp.id_danh_muc = dm.id
                LEFT JOIN loai_da ld ON sp.id_loai_da = ld.id
                LEFT JOIN menh_phong_thuy mpt ON sp.id_menh_phong_thuy = mpt.id
                WHERE sp.id = :id AND sp.trang_thai = 1 AND sp.da_xoa = 0";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id_san_pham]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Lấy thông tin biến thể cụ thể
     */
    public function layThongTinBienThe($id_bien_the) {
        $sql = "SELECT * FROM san_pham_bien_the WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id_bien_the]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
