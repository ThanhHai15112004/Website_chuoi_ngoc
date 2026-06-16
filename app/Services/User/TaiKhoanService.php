<?php

namespace App\Services\User;

use App\Models\Admin\KhachHangModel;
use App\Models\Admin\DonHangModel;
use App\Models\Admin\ThongBaoModel;
use App\Models\Admin\HangThanhVienModel;
use App\Models\Admin\MaGiamGiaModel;
use App\Core\Database;
use PDO;

class TaiKhoanService
{
    private $khachHangModel;
    private $thongBaoModel;
    private $hangThanhVienModel;
    private $db;

    public function __construct()
    {
        $this->khachHangModel = new KhachHangModel();
        $this->thongBaoModel = new ThongBaoModel();
        $this->hangThanhVienModel = new HangThanhVienModel();
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Lấy thông tin user đầy đủ + hạng thành viên
     */
    public function getThongTinUser($userId)
    {
        $user = $this->khachHangModel->timTheoId($userId);
        if (!$user) return null;

        // Lấy thông tin hạng thành viên
        if (!empty($user['id_hang_thanh_vien'])) {
            $stmt = $this->db->prepare("SELECT * FROM hang_thanh_vien WHERE id = ?");
            $stmt->execute([$user['id_hang_thanh_vien']]);
            $user['hang_thanh_vien'] = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            $user['hang_thanh_vien'] = null;
        }

        // Lấy mệnh phong thủy
        if (!empty($user['id_menh'])) {
            $stmt = $this->db->prepare("SELECT ten_menh FROM menh_phong_thuy WHERE id = ?");
            $stmt->execute([$user['id_menh']]);
            $menh = $stmt->fetch(PDO::FETCH_ASSOC);
            $user['ten_menh'] = $menh ? $menh['ten_menh'] : null;
        }

        return $user;
    }

    /**
     * Lấy dữ liệu tổng quan cho dashboard
     */
    public function getTongQuan($userId)
    {
        // Đếm đơn hàng
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM don_hang WHERE id_nguoi_dung = ? AND da_xoa = 0");
        $stmt->execute([$userId]);
        $tongDon = (int)$stmt->fetchColumn();

        // Đếm voucher đã lưu
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM nguoi_dung_voucher WHERE id_nguoi_dung = ?");
        $stmt->execute([$userId]);
        $tongVoucher = (int)$stmt->fetchColumn();

        // Đếm yêu thích
        $tongYeuThich = 0;
        try {
            $stmt = $this->db->prepare("SELECT COUNT(*) FROM san_pham_yeu_thich WHERE id_nguoi_dung = ?");
            $stmt->execute([$userId]);
            $tongYeuThich = (int)$stmt->fetchColumn();
        } catch (\Exception $e) {}

        // Đếm thông báo chưa đọc
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM thong_bao WHERE id_nguoi_dung = ? AND da_doc = 0");
        $stmt->execute([$userId]);
        $thongBaoChuaDoc = (int)$stmt->fetchColumn();

        return [
            'tong_don' => $tongDon,
            'tong_voucher' => $tongVoucher,
            'tong_yeu_thich' => $tongYeuThich,
            'thong_bao_chua_doc' => $thongBaoChuaDoc,
        ];
    }

    /**
     * Lấy đơn hàng gần đây (3 đơn mới nhất)
     */
    public function getDonHangGanDay($userId, $limit = 3)
    {
        return $this->getDonHang($userId, null, 1, $limit)['items'];
    }

    /**
     * Lấy danh sách đơn hàng có phân trang + filter
     */
    public function getDonHang($userId, $trangThai = null, $page = 1, $limit = 5)
    {
        $offset = ($page - 1) * $limit;

        // Count total
        $countSql = "SELECT COUNT(*) FROM don_hang WHERE id_nguoi_dung = ? AND da_xoa = 0";
        $countParams = [$userId];
        if ($trangThai !== null && $trangThai !== '') {
            $countSql .= " AND trang_thai_don_hang = ?";
            $countParams[] = $trangThai;
        }
        $stmt = $this->db->prepare($countSql);
        $stmt->execute($countParams);
        $total = (int)$stmt->fetchColumn();

        // Fetch orders
        $sql = "SELECT dh.* FROM don_hang dh WHERE dh.id_nguoi_dung = ? AND dh.da_xoa = 0";
        $params = [$userId];
        if ($trangThai !== null && $trangThai !== '') {
            $sql .= " AND dh.trang_thai_don_hang = ?";
            $params[] = $trangThai;
        }
        $sql .= " ORDER BY dh.ngay_tao DESC LIMIT ? OFFSET ?";
        
        $stmt = $this->db->prepare($sql);
        foreach ($params as $i => $val) {
            $stmt->bindValue($i + 1, $val);
        }
        $stmt->bindValue(count($params) + 1, (int)$limit, PDO::PARAM_INT);
        $stmt->bindValue(count($params) + 2, (int)$offset, PDO::PARAM_INT);
        $stmt->execute();
        $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Fetch chi tiết cho mỗi đơn hàng
        foreach ($orders as &$order) {
            $stmtDetail = $this->db->prepare(
                "SELECT ct.id_bien_the, ct.so_luong, ct.don_gia, 
                        sp.id as id_san_pham, sp.ten_sp, sp.hinh_anh_chinh,
                        spbt.thuoc_tinh
                 FROM chi_tiet_don_hang ct
                 JOIN san_pham_bien_the spbt ON ct.id_bien_the = spbt.id
                 JOIN san_pham sp ON spbt.id_san_pham = sp.id
                 WHERE ct.id_don_hang = ?"
            );
            $stmtDetail->execute([$order['id']]);
            $order['chi_tiet'] = $stmtDetail->fetchAll(PDO::FETCH_ASSOC);
        }
        unset($order);

        return [
            'items' => $orders,
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'total_pages' => ceil($total / $limit),
        ];
    }

    /**
     * Lấy voucher đã lưu của user
     */
    public function getVouchers($userId)
    {
        return $this->khachHangModel->getVouchersByUser($userId);
    }

    /**
     * Lấy sản phẩm yêu thích
     */
    public function getYeuThich($userId)
    {
        try {
            return $this->khachHangModel->layYeuThich($userId);
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Lấy thông báo
     */
    public function getThongBao($userId)
    {
        return $this->thongBaoModel->getUserNotifications($userId);
    }

    /**
     * Lấy đánh giá
     */
    public function getDanhGia($userId)
    {
        return $this->khachHangModel->layDanhGia($userId);
    }

    /**
     * Lấy tất cả hạng thành viên (cho tab hạng thành viên)
     */
    public function getTatCaHang()
    {
        $stmt = $this->db->query("SELECT * FROM hang_thanh_vien WHERE trang_thai = 1 ORDER BY chi_tieu_toi_thieu ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Tìm hạng tiếp theo dựa trên tổng chi tiêu
     */
    public function getHangTiepTheo($tongChiTieu)
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM hang_thanh_vien WHERE chi_tieu_toi_thieu > ? AND trang_thai = 1 ORDER BY chi_tieu_toi_thieu ASC LIMIT 1"
        );
        $stmt->execute([$tongChiTieu]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Cập nhật hồ sơ cá nhân
     */
    public function capNhatHoSo($userId, $data)
    {
        $allowedFields = ['ho_ten', 'gioi_tinh', 'ngay_sinh', 'so_dien_thoai', 'dia_chi'];
        $updateData = [];
        foreach ($allowedFields as $field) {
            if (isset($data[$field])) {
                $updateData[$field] = trim($data[$field]);
            }
        }

        if (empty($updateData)) {
            return false;
        }

        return $this->khachHangModel->capNhat($userId, $updateData);
    }

    /**
     * Đổi mật khẩu
     */
    public function doiMatKhau($userId, $matKhauCu, $matKhauMoi)
    {
        $user = $this->khachHangModel->timTheoId($userId);
        if (!$user) {
            throw new \Exception('Không tìm thấy tài khoản.');
        }

        if (!password_verify($matKhauCu, $user['mat_khau'])) {
            throw new \Exception('Mật khẩu hiện tại không đúng.');
        }

        $hashed = password_hash($matKhauMoi, PASSWORD_DEFAULT);
        return $this->khachHangModel->capNhat($userId, ['mat_khau' => $hashed]);
    }
}
