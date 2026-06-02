<?php
namespace App\Models;

use App\Core\Database;
use PDO;
use Exception;

class ChinhSachModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    /**
     * Lấy danh sách chính sách có filter + phân trang
     */
    public function layDanhSach($params = [], $limit = 10, $offset = 0)
    {
        $sql = "SELECT * FROM chinh_sach WHERE 1=1 ";
        $bind = [];

        // Filter theo tab trạng thái
        if (!empty($params['tab']) && $params['tab'] !== 'all') {
            if ($params['tab'] === 'checkout') {
                $sql .= " AND JSON_CONTAINS(vi_tri_hien_thi, '\"Checkout\"')";
            } else {
                $sql .= " AND trang_thai = ?";
                $bind[] = $params['tab'];
            }
        }

        // Filter theo loại chính sách
        if (!empty($params['loai'])) {
            $sql .= " AND loai = ?";
            $bind[] = $params['loai'];
        }

        // Filter theo vị trí hiển thị
        if (!empty($params['vi_tri'])) {
            $viTriMap = [
                'footer' => 'Footer',
                'checkout' => 'Checkout',
                'product' => 'Trang sản phẩm',
                'register' => 'Đăng ký'
            ];
            $viTriValue = $viTriMap[$params['vi_tri']] ?? $params['vi_tri'];
            $sql .= " AND JSON_CONTAINS(vi_tri_hien_thi, ?)";
            $bind[] = '"' . $viTriValue . '"';
        }

        // Tìm kiếm theo tên, slug, người cập nhật
        if (!empty($params['search'])) {
            $sql .= " AND (ten LIKE ? OR slug LIKE ? OR nguoi_cap_nhat LIKE ?)";
            $searchTerm = "%" . $params['search'] . "%";
            $bind[] = $searchTerm;
            $bind[] = $searchTerm;
            $bind[] = $searchTerm;
        }

        $sql .= " ORDER BY ngay_cap_nhat DESC";

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

        // Decode JSON vi_tri_hien_thi
        foreach ($data as &$row) {
            $row['vi_tri_hien_thi'] = json_decode($row['vi_tri_hien_thi'], true) ?: [];
            $row['seo_status'] = $this->tinhTrangSeo($row);
        }

        return [
            'data' => $data,
            'total' => $total
        ];
    }

    /**
     * Lấy chi tiết 1 chính sách
     */
    public function layChiTiet($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM chinh_sach WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $row['vi_tri_hien_thi'] = json_decode($row['vi_tri_hien_thi'], true) ?: [];
            $row['seo_status'] = $this->tinhTrangSeo($row);
        }

        return $row;
    }

    /**
     * Thêm mới chính sách
     */
    public function themMoi($data)
    {
        $sql = "INSERT INTO chinh_sach (
                    ten, loai, slug, mo_ta_ngan, noi_dung, vi_tri_hien_thi,
                    trang_thai, seo_title, seo_description,
                    nguoi_tao, nguoi_cap_nhat, ngay_tao, ngay_cap_nhat
                ) VALUES (
                    :ten, :loai, :slug, :mo_ta_ngan, :noi_dung, :vi_tri_hien_thi,
                    :trang_thai, :seo_title, :seo_description,
                    :nguoi_tao, :nguoi_cap_nhat, NOW(), NOW()
                )";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':ten' => $data['ten'],
            ':loai' => $data['loai'],
            ':slug' => $data['slug'],
            ':mo_ta_ngan' => $data['mo_ta_ngan'] ?? null,
            ':noi_dung' => $data['noi_dung'] ?? '',
            ':vi_tri_hien_thi' => is_array($data['vi_tri_hien_thi']) ? json_encode($data['vi_tri_hien_thi'], JSON_UNESCAPED_UNICODE) : ($data['vi_tri_hien_thi'] ?? '[]'),
            ':trang_thai' => $data['trang_thai'] ?? 'ban_nhap',
            ':seo_title' => $data['seo_title'] ?? null,
            ':seo_description' => $data['seo_description'] ?? null,
            ':nguoi_tao' => $data['nguoi_tao'] ?? 'Admin',
            ':nguoi_cap_nhat' => $data['nguoi_cap_nhat'] ?? 'Admin',
        ]);

        return $this->db->lastInsertId();
    }

    /**
     * Cập nhật chính sách
     */
    public function capNhat($id, $data)
    {
        $fields = [];
        $params = [];

        $allowed = ['ten', 'loai', 'slug', 'mo_ta_ngan', 'noi_dung', 'trang_thai', 'seo_title', 'seo_description', 'nguoi_cap_nhat'];

        foreach ($allowed as $field) {
            if (array_key_exists($field, $data)) {
                $fields[] = "$field = ?";
                $params[] = $data[$field];
            }
        }

        // Xử lý riêng vi_tri_hien_thi (JSON)
        if (array_key_exists('vi_tri_hien_thi', $data)) {
            $fields[] = "vi_tri_hien_thi = ?";
            $params[] = is_array($data['vi_tri_hien_thi']) ? json_encode($data['vi_tri_hien_thi'], JSON_UNESCAPED_UNICODE) : $data['vi_tri_hien_thi'];
        }

        if (empty($fields)) return true;

        $fields[] = "ngay_cap_nhat = NOW()";
        $params[] = $id;

        $sql = "UPDATE chinh_sach SET " . implode(', ', $fields) . " WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Xóa 1 chính sách
     */
    public function xoa($id)
    {
        $stmt = $this->db->prepare("DELETE FROM chinh_sach WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * Xóa nhiều chính sách
     */
    public function xoaNhieu($ids)
    {
        if (empty($ids)) return false;
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "DELETE FROM chinh_sach WHERE id IN ($placeholders)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($ids);
    }

    /**
     * Đổi trạng thái 1 chính sách
     */
    public function doiTrangThai($id, $trangThai)
    {
        $stmt = $this->db->prepare("UPDATE chinh_sach SET trang_thai = ?, ngay_cap_nhat = NOW() WHERE id = ?");
        return $stmt->execute([$trangThai, $id]);
    }

    /**
     * Đổi trạng thái nhiều chính sách
     */
    public function doiTrangThaiNhieu($ids, $trangThai)
    {
        if (empty($ids)) return false;
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $params = array_merge([$trangThai], $ids);
        $sql = "UPDATE chinh_sach SET trang_thai = ?, ngay_cap_nhat = NOW() WHERE id IN ($placeholders)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    /**
     * Nhân bản chính sách
     */
    public function nhanBan($id)
    {
        $original = $this->layChiTiet($id);
        if (!$original) return false;

        $data = $original;
        $data['ten'] = $original['ten'] . ' (Bản sao)';
        $data['slug'] = $original['slug'] . '-ban-sao-' . time();
        $data['trang_thai'] = 'ban_nhap';
        $data['vi_tri_hien_thi'] = $original['vi_tri_hien_thi']; // Already decoded array

        return $this->themMoi($data);
    }

    /**
     * Kiểm tra slug đã tồn tại chưa
     */
    public function kiemTraSlug($slug, $excludeId = null)
    {
        $sql = "SELECT id FROM chinh_sach WHERE slug = ?";
        $params = [$slug];

        if ($excludeId) {
            $sql .= " AND id != ?";
            $params[] = $excludeId;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount() > 0;
    }

    /**
     * Thống kê (cho stats_cards)
     */
    public function thongKe()
    {
        $sql = "SELECT
                    COUNT(*) as total,
                    COALESCE(SUM(CASE WHEN trang_thai = 'dang_hien_thi' THEN 1 ELSE 0 END), 0) as dang_hien_thi,
                    COALESCE(SUM(CASE WHEN trang_thai = 'dang_an' THEN 1 ELSE 0 END), 0) as dang_an,
                    COALESCE(SUM(CASE WHEN trang_thai = 'ban_nhap' THEN 1 ELSE 0 END), 0) as ban_nhap,
                    COALESCE(SUM(CASE WHEN trang_thai = 'can_cap_nhat' THEN 1 ELSE 0 END), 0) as can_cap_nhat,
                    COALESCE(SUM(CASE WHEN JSON_CONTAINS(vi_tri_hien_thi, '\"Checkout\"') THEN 1 ELSE 0 END), 0) as in_checkout
                FROM chinh_sach";

        $stmt = $this->db->query($sql);
        $stats = $stmt->fetch(PDO::FETCH_ASSOC);

        // Lấy thông tin cập nhật gần nhất
        $stmtLast = $this->db->query("SELECT ngay_cap_nhat, nguoi_cap_nhat FROM chinh_sach ORDER BY ngay_cap_nhat DESC LIMIT 1");
        $last = $stmtLast->fetch(PDO::FETCH_ASSOC);

        $stats['last_updated_at'] = $last ? $last['ngay_cap_nhat'] : null;
        $stats['last_updater'] = $last ? $last['nguoi_cap_nhat'] : null;

        return $stats;
    }

    /**
     * Tính trạng thái SEO
     */
    public function tinhTrangSeo($policy)
    {
        $hasSeoTitle = !empty($policy['seo_title']);
        $hasSeoDesc = !empty($policy['seo_description']);

        if ($hasSeoTitle && $hasSeoDesc) {
            return 'Tốt';
        } elseif ($hasSeoTitle || $hasSeoDesc) {
            return 'Cần tối ưu';
        } elseif (!$hasSeoTitle && !$hasSeoDesc) {
            // Kiểm tra xem có mô tả ngắn không (fallback)
            if (!empty($policy['mo_ta_ngan'])) {
                return 'Thiếu meta';
            }
            return 'Chưa kiểm tra';
        }
        return 'Chưa kiểm tra';
    }

    /**
     * Thêm lịch sử chỉnh sửa
     */
    public function themLichSu($data)
    {
        $sql = "INSERT INTO chinh_sach_lich_su (id_chinh_sach, hanh_dong, mo_ta, nguoi_thuc_hien)
                VALUES (:id_cs, :hanh_dong, :mo_ta, :nguoi)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id_cs' => $data['id_chinh_sach'],
            ':hanh_dong' => $data['hanh_dong'],
            ':mo_ta' => $data['mo_ta'] ?? null,
            ':nguoi' => $data['nguoi_thuc_hien'] ?? 'Admin',
        ]);
    }

    /**
     * Lấy lịch sử chỉnh sửa
     */
    public function layLichSu($idChinhSach)
    {
        $stmt = $this->db->prepare("SELECT * FROM chinh_sach_lich_su WHERE id_chinh_sach = ? ORDER BY ngay_thuc_hien DESC");
        $stmt->execute([$idChinhSach]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Helper: Map tên trạng thái sang tiếng Việt hiển thị
     */
    public static function tenTrangThai($trangThai)
    {
        $map = [
            'dang_hien_thi' => 'Đang hiển thị',
            'dang_an' => 'Đang ẩn',
            'ban_nhap' => 'Bản nháp',
            'can_cap_nhat' => 'Cần cập nhật',
        ];
        return $map[$trangThai] ?? $trangThai;
    }
}
