<?php
namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use Exception;

class NhanSuModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Lấy danh sách nhân viên có filter + phân trang
     */
    public function layDanhSach($params = [], $limit = 10, $offset = 0)
    {
        $sql = "SELECT * FROM nhan_vien WHERE 1=1 ";
        $bind = [];

        // Filter theo tab trạng thái
        if (!empty($params['tab']) && $params['tab'] !== 'all') {
            if (in_array($params['tab'], ['hoat_dong', 'cho_kich_hoat', 'bi_khoa'])) {
                $sql .= " AND trang_thai = ?";
                $bind[] = $params['tab'];
            } elseif ($params['tab'] === 'super_admin') {
                $sql .= " AND vai_tro = 'Super Admin'";
            } elseif ($params['tab'] === 'kho') {
                $sql .= " AND phong_ban = 'Kho'";
            }
        }

        // Filter theo vai trò
        if (!empty($params['vai_tro'])) {
            $sql .= " AND vai_tro = ?";
            $bind[] = $params['vai_tro'];
        }

        // Filter theo đăng nhập
        if (!empty($params['dang_nhap'])) {
            switch ($params['dang_nhap']) {
                case 'today':
                    $sql .= " AND DATE(lan_dang_nhap_cuoi) = CURDATE()";
                    break;
                case '7days':
                    $sql .= " AND lan_dang_nhap_cuoi >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
                    break;
                case '30days':
                    $sql .= " AND lan_dang_nhap_cuoi >= DATE_SUB(NOW(), INTERVAL 30 DAY)";
                    break;
                case 'never':
                    $sql .= " AND lan_dang_nhap_cuoi IS NULL";
                    break;
            }
        }

        // Tìm kiếm
        if (!empty($params['search'])) {
            $sql .= " AND (ho_ten LIKE ? OR email LIKE ? OR dien_thoai LIKE ? OR ma_nv LIKE ? OR vai_tro LIKE ?)";
            $s = "%" . $params['search'] . "%";
            $bind = array_merge($bind, [$s, $s, $s, $s, $s]);
        }

        $sql .= " ORDER BY ngay_tao DESC";

        // Đếm tổng
        $countSql = preg_replace('/SELECT \* FROM/', 'SELECT COUNT(*) FROM', $sql);
        $stmtCount = $this->db->prepare($countSql);
        $stmtCount->execute($bind);
        $total = $stmtCount->fetchColumn();

        // Phân trang
        $sql .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
        $stmt = $this->db->prepare($sql);
        $stmt->execute($bind);

        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Thêm avatar fallback và quyền chính
        foreach ($data as &$row) {
            $row['avatar_url'] = $this->getAvatarUrl($row);
            $row['permissions'] = $this->layQuyenChinh($row['id']);
        }

        return ['data' => $data, 'total' => $total];
    }

    /**
     * Lấy chi tiết 1 nhân viên
     */
    public function layChiTiet($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM nhan_vien WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $row['avatar_url'] = $this->getAvatarUrl($row);
        }
        return $row;
    }

    /**
     * Thêm mới nhân viên
     */
    public function themMoi($data)
    {
        $sql = "INSERT INTO nhan_vien (ma_nv, ho_ten, email, dien_thoai, mat_khau, vai_tro, phong_ban, trang_thai, avatar, ngay_sinh, dia_chi, ghi_chu, yeu_cau_doi_mk, ngay_vao_lam, nguoi_tao, nguoi_cap_nhat)
                VALUES (:ma_nv, :ho_ten, :email, :dien_thoai, :mat_khau, :vai_tro, :phong_ban, :trang_thai, :avatar, :ngay_sinh, :dia_chi, :ghi_chu, :yeu_cau_doi_mk, :ngay_vao_lam, :nguoi_tao, :nguoi_cap_nhat)";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':ma_nv'          => $data['ma_nv'],
            ':ho_ten'         => $data['ho_ten'],
            ':email'          => $data['email'],
            ':dien_thoai'     => $data['dien_thoai'] ?? null,
            ':mat_khau'       => password_hash($data['mat_khau'] ?? 'AutoPass123!', PASSWORD_DEFAULT),
            ':vai_tro'        => $data['vai_tro'] ?? 'Nhân viên bán hàng',
            ':phong_ban'      => $data['phong_ban'] ?? null,
            ':trang_thai'     => $data['trang_thai'] ?? 'cho_kich_hoat',
            ':avatar'         => $data['avatar'] ?? null,
            ':ngay_sinh'      => !empty($data['ngay_sinh']) ? $data['ngay_sinh'] : null,
            ':dia_chi'        => $data['dia_chi'] ?? null,
            ':ghi_chu'        => $data['ghi_chu'] ?? null,
            ':yeu_cau_doi_mk' => $data['yeu_cau_doi_mk'] ?? 1,
            ':ngay_vao_lam'   => !empty($data['ngay_vao_lam']) ? $data['ngay_vao_lam'] : date('Y-m-d'),
            ':nguoi_tao'      => $data['nguoi_tao'] ?? 'Admin',
            ':nguoi_cap_nhat' => $data['nguoi_cap_nhat'] ?? 'Admin',
        ]);

        return $this->db->lastInsertId();
    }

    /**
     * Cập nhật nhân viên
     */
    public function capNhat($id, $data)
    {
        $fields = [];
        $params = [];

        $allowed = ['ho_ten', 'email', 'dien_thoai', 'vai_tro', 'phong_ban', 'trang_thai', 'avatar', 'ngay_sinh', 'dia_chi', 'ghi_chu', 'yeu_cau_doi_mk', 'ngay_vao_lam', 'nguoi_cap_nhat'];

        foreach ($allowed as $field) {
            if (array_key_exists($field, $data)) {
                $fields[] = "$field = ?";
                $params[] = $data[$field];
            }
        }

        if (empty($fields)) return true;

        $fields[] = "ngay_cap_nhat = NOW()";
        $params[] = $id;

        $sql = "UPDATE nhan_vien SET " . implode(', ', $fields) . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Xóa 1 nhân viên
     */
    public function xoa($id)
    {
        $stmt = $this->db->prepare("DELETE FROM nhan_vien WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * Xóa nhiều
     */
    public function xoaNhieu($ids)
    {
        if (empty($ids)) return false;
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $stmt = $this->db->prepare("DELETE FROM nhan_vien WHERE id IN ($placeholders)");
        return $stmt->execute($ids);
    }

    /**
     * Đổi trạng thái (khóa/mở/kích hoạt)
     */
    public function doiTrangThai($id, $trangThai, $lyDo = null)
    {
        $sql = "UPDATE nhan_vien SET trang_thai = ?, ly_do_khoa = ?, ngay_cap_nhat = NOW() WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$trangThai, $trangThai === 'bi_khoa' ? $lyDo : null, $id]);
    }

    /**
     * Đổi trạng thái nhiều
     */
    public function doiTrangThaiNhieu($ids, $trangThai)
    {
        if (empty($ids)) return false;
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $params = array_merge([$trangThai], $ids);
        $stmt = $this->db->prepare("UPDATE nhan_vien SET trang_thai = ?, ngay_cap_nhat = NOW() WHERE id IN ($placeholders)");
        return $stmt->execute($params);
    }

    /**
     * Đặt lại mật khẩu
     */
    public function datLaiMatKhau($id, $newPassword = null)
    {
        if (!$newPassword) {
            $newPassword = $this->sinhMatKhauNgauNhien();
        }
        $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE nhan_vien SET mat_khau = ?, yeu_cau_doi_mk = 1, ngay_cap_nhat = NOW() WHERE id = ?");
        $stmt->execute([$hashed, $id]);
        return $newPassword;
    }

    /**
     * Tự đổi mật khẩu (không yêu cầu đổi lại)
     */
    public function doiMatKhau($id, $newPassword)
    {
        $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE nhan_vien SET mat_khau = ?, yeu_cau_doi_mk = 0, ngay_cap_nhat = NOW() WHERE id = ?");
        return $stmt->execute([$hashed, $id]);
    }

    /**
     * Kiểm tra email unique
     */
    public function kiemTraEmail($email, $excludeId = null)
    {
        $sql = "SELECT id FROM nhan_vien WHERE email = ?";
        $params = [$email];
        if ($excludeId) {
            $sql .= " AND id != ?";
            $params[] = $excludeId;
        }
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount() > 0;
    }

    /**
     * Auto-generate mã NV
     */
    public function taoMaNV()
    {
        $stmt = $this->db->query("SELECT MAX(CAST(SUBSTRING(ma_nv, 3) AS UNSIGNED)) as max_num FROM nhan_vien WHERE ma_nv LIKE 'NV%'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $next = ($row['max_num'] ?? 0) + 1;
        return 'NV' . str_pad($next, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Thống kê (cho stats_cards)
     */
    public function thongKe()
    {
        $sql = "SELECT
                    COUNT(*) as total,
                    COALESCE(SUM(CASE WHEN trang_thai = 'hoat_dong' THEN 1 ELSE 0 END), 0) as hoat_dong,
                    COALESCE(SUM(CASE WHEN trang_thai = 'cho_kich_hoat' THEN 1 ELSE 0 END), 0) as cho_kich_hoat,
                    COALESCE(SUM(CASE WHEN trang_thai = 'bi_khoa' THEN 1 ELSE 0 END), 0) as bi_khoa,
                    COALESCE(SUM(CASE WHEN vai_tro IN ('Super Admin', 'Admin') THEN 1 ELSE 0 END), 0) as super_admin,
                    COALESCE(SUM(CASE WHEN lan_dang_nhap_cuoi >= DATE_SUB(NOW(), INTERVAL 7 DAY) THEN 1 ELSE 0 END), 0) as login_7_ngay
                FROM nhan_vien";
        $stmt = $this->db->query($sql);
        $stats = $stmt->fetch(PDO::FETCH_ASSOC);

        // Cần kiểm tra quyền: vai trò Tùy chỉnh mà chưa có quyền nào
        $stmtCheck = $this->db->query("
            SELECT COUNT(DISTINCT nv.id) as cnt
            FROM nhan_vien nv
            LEFT JOIN nhan_vien_quyen q ON nv.id = q.id_nhan_vien AND (q.xem = 1 OR q.them = 1 OR q.sua = 1 OR q.xoa = 1 OR q.dac_biet = 1)
            WHERE nv.vai_tro = 'Tùy chỉnh' AND q.id IS NULL
        ");
        $stats['can_kiem_tra_quyen'] = $stmtCheck->fetchColumn() ?: 0;

        return $stats;
    }

    /**
     * Lấy quyền chi tiết theo nhân viên
     */
    public function layQuyen($idNV)
    {
        $stmt = $this->db->prepare("SELECT * FROM nhan_vien_quyen WHERE id_nhan_vien = ? ORDER BY id");
        $stmt->execute([$idNV]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy danh sách quyền chính (cho hiển thị trong bảng danh sách)
     */
    public function layQuyenChinh($idNV)
    {
        $stmt = $this->db->prepare("SELECT module FROM nhan_vien_quyen WHERE id_nhan_vien = ? AND (xem = 1 OR them = 1 OR sua = 1 OR xoa = 1) ORDER BY id LIMIT 5");
        $stmt->execute([$idNV]);
        $rows = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Rút gọn tên module
        $shortened = array_map(function($m) {
            $map = [
                'Dashboard & Thống kê' => 'Dashboard',
                'Sản phẩm & Danh mục' => 'Sản phẩm',
                'Đơn hàng & Thanh toán' => 'Đơn hàng',
                'Quản lý Kho' => 'Kho',
                'Cấu hình & Nhân sự' => 'Cấu hình',
            ];
            return $map[$m] ?? $m;
        }, $rows);

        // Check nếu Super Admin
        $stmtRole = $this->db->prepare("SELECT vai_tro FROM nhan_vien WHERE id = ?");
        $stmtRole->execute([$idNV]);
        $role = $stmtRole->fetchColumn();
        if ($role === 'Super Admin') {
            return ['Toàn quyền hệ thống'];
        }

        return $shortened;
    }

    /**
     * Cập nhật quyền (upsert)
     */
    public function capNhatQuyen($idNV, $quyenArray)
    {
        // Xóa quyền cũ
        $this->db->prepare("DELETE FROM nhan_vien_quyen WHERE id_nhan_vien = ?")->execute([$idNV]);

        if (empty($quyenArray)) return true;

        $stmt = $this->db->prepare("INSERT INTO nhan_vien_quyen (id_nhan_vien, module, xem, them, sua, xoa, dac_biet) VALUES (?, ?, ?, ?, ?, ?, ?)");

        foreach ($quyenArray as $q) {
            $stmt->execute([
                $idNV,
                $q['module'],
                $q['xem'] ?? 0,
                $q['them'] ?? 0,
                $q['sua'] ?? 0,
                $q['xoa'] ?? 0,
                $q['dac_biet'] ?? 0,
            ]);
        }
        return true;
    }

    /**
     * Thêm lịch sử
     */
    public function themLichSu($data)
    {
        $sql = "INSERT INTO nhan_vien_lich_su (id_nhan_vien, hanh_dong, mo_ta, ip_address, thiet_bi, nguoi_thuc_hien)
                VALUES (:id_nv, :hanh_dong, :mo_ta, :ip, :thiet_bi, :nguoi)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id_nv'     => $data['id_nhan_vien'],
            ':hanh_dong' => $data['hanh_dong'],
            ':mo_ta'     => $data['mo_ta'] ?? null,
            ':ip'        => $data['ip_address'] ?? ($_SERVER['REMOTE_ADDR'] ?? null),
            ':thiet_bi'  => $data['thiet_bi'] ?? null,
            ':nguoi'     => $data['nguoi_thuc_hien'] ?? 'Admin',
        ]);
    }

    /**
     * Lấy lịch sử (nhật ký hoạt động - không phải đăng nhập)
     */
    public function layLichSu($idNV, $limit = 20)
    {
        $stmt = $this->db->prepare("SELECT * FROM nhan_vien_lich_su WHERE id_nhan_vien = ? AND hanh_dong NOT LIKE '%Đăng nhập%' ORDER BY ngay_thuc_hien DESC LIMIT " . (int)$limit);
        $stmt->execute([$idNV]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy lịch sử đăng nhập
     */
    public function layLichSuDangNhap($idNV, $limit = 20)
    {
        $stmt = $this->db->prepare("SELECT * FROM nhan_vien_lich_su WHERE id_nhan_vien = ? AND hanh_dong LIKE '%Đăng nhập%' ORDER BY ngay_thuc_hien DESC LIMIT " . (int)$limit);
        $stmt->execute([$idNV]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Map trạng thái sang tiếng Việt
     */
    public static function tenTrangThai($key)
    {
        $map = [
            'hoat_dong'     => 'Đang hoạt động',
            'cho_kich_hoat' => 'Chờ kích hoạt',
            'bi_khoa'       => 'Bị khóa',
        ];
        return $map[$key] ?? $key;
    }

    /**
     * Avatar URL fallback
     */
    private function getAvatarUrl($staff)
    {
        if (!empty($staff['avatar'])) return $staff['avatar'];
        $name = urlencode($staff['ho_ten'] ?? 'NV');
        $colors = ['6B0D18', 'e0f2fe', 'fef3c7', 'fee2e2', 'f3e8ff'];
        $bgColors = ['0369a1', 'b45309', '991b1b', '7e22ce', '6B0D18'];
        $idx = ($staff['id'] ?? 0) % count($colors);
        return "https://ui-avatars.com/api/?name={$name}&background={$colors[$idx]}&color={$bgColors[$idx]}";
    }

    /**
     * Sinh mật khẩu ngẫu nhiên
     */
    private function sinhMatKhauNgauNhien($length = 12)
    {
        $chars = 'abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789!@#$';
        $password = '';
        for ($i = 0; $i < $length; $i++) {
            $password .= $chars[random_int(0, strlen($chars) - 1)];
        }
        return $password;
    }

    /**
     * Tìm nhân viên theo email (cho login)
     */
    public function findByEmail(string $email): ?array
    {
        $stmt = $this->db->prepare("SELECT * FROM nhan_vien WHERE email = ? LIMIT 1");
        $stmt->execute([$email]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    /**
     * Cập nhật thời gian đăng nhập cuối
     */
    public function capNhatDangNhapCuoi(int $id): void
    {
        $stmt = $this->db->prepare("UPDATE nhan_vien SET lan_dang_nhap_cuoi = NOW() WHERE id = ?");
        $stmt->execute([$id]);
    }
}
