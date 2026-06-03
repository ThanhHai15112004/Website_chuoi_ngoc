<?php
namespace App\Models\Admin;

use App\Core\Database;
use PDO;
use Exception;

class BaiVietModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function layDanhSach($params = [], $limit = 10, $offset = 0) {
        $sql = "SELECT bv.*, 
                       dm.ten_danh_muc, 
                       nd.ho_ten as ten_nguoi_tao, nd.anh_dai_dien as anh_nguoi_tao
                FROM bai_viet bv
                LEFT JOIN danh_muc_bai_viet dm ON bv.id_danh_muc = dm.id
                LEFT JOIN nguoi_dung nd ON bv.id_nguoi_tao = nd.id
                WHERE 1=1 ";
        
        $bind = [];

        // Trạng thái: 1=Đã đăng (Xuất bản), 0=Bản nháp, 2=Đã ẩn
        if (isset($params['status']) && $params['status'] !== '') {
            if ($params['status'] == 'published') {
                $sql .= " AND bv.trang_thai = 1 ";
            } elseif ($params['status'] == 'draft') {
                $sql .= " AND bv.trang_thai = 0 ";
            } elseif ($params['status'] == 'hidden') {
                $sql .= " AND bv.trang_thai = 2 ";
            }
        }

        // Tối ưu SEO
        if (isset($params['seo']) && $params['seo'] !== '') {
            if ($params['seo'] == 'missing') {
                $sql .= " AND (bv.seo_title IS NULL OR bv.seo_title = '' OR bv.seo_description IS NULL OR bv.seo_description = '' OR bv.hinh_anh IS NULL OR bv.hinh_anh = '')";
            } elseif ($params['seo'] == 'good') {
                $sql .= " AND (bv.seo_title IS NOT NULL AND bv.seo_title != '' AND bv.seo_description IS NOT NULL AND bv.seo_description != '' AND bv.hinh_anh IS NOT NULL AND bv.hinh_anh != '')";
            }
        }

        // Tìm kiếm
        if (!empty($params['q'])) {
            $sql .= " AND (bv.tieu_de LIKE ? OR bv.tags LIKE ?)";
            $bind[] = "%{$params['q']}%";
            $bind[] = "%{$params['q']}%";
        }

        // Danh mục
        if (!empty($params['id_danh_muc'])) {
            $sql .= " AND bv.id_danh_muc = ?";
            $bind[] = $params['id_danh_muc'];
        }

        // Sắp xếp
        $sql .= " ORDER BY bv.ngay_tao DESC ";

        // Tổng số dòng
        $stmtTotal = $this->db->prepare(str_replace("bv.*, 
                       dm.ten_danh_muc, 
                       nd.ho_ten as ten_nguoi_tao, nd.anh_dai_dien as anh_nguoi_tao", "COUNT(bv.id)", $sql));
        $stmtTotal->execute($bind);
        $total = $stmtTotal->fetchColumn();

        // Phân trang
        $sql .= " LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($bind);
        
        return [
            'data' => $stmt->fetchAll(PDO::FETCH_ASSOC),
            'total' => $total
        ];
    }

    public function layChiTiet($id) {
        $sql = "SELECT bv.*, dm.ten_danh_muc
                FROM bai_viet bv
                LEFT JOIN danh_muc_bai_viet dm ON bv.id_danh_muc = dm.id
                WHERE bv.id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function themMoi($data) {
        $sql = "INSERT INTO bai_viet (
                    id, tieu_de, slug, tom_tat, noi_dung, hinh_anh, 
                    id_danh_muc, tags, san_pham_lien_quan, 
                    seo_title, seo_description, 
                    trang_thai, ngay_xuat_ban, id_nguoi_tao, luot_xem, ngay_tao
                ) VALUES (
                    :id, :tieu_de, :slug, :tom_tat, :noi_dung, :hinh_anh,
                    :id_danh_muc, :tags, :san_pham_lien_quan,
                    :seo_title, :seo_description,
                    :trang_thai, :ngay_xuat_ban, :id_nguoi_tao, 0, NOW()
                )";
                
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id' => $data['id'],
            ':tieu_de' => $data['tieu_de'],
            ':slug' => $data['slug'],
            ':tom_tat' => $data['tom_tat'] ?? null,
            ':noi_dung' => $data['noi_dung'] ?? '',
            ':hinh_anh' => $data['hinh_anh'] ?? null,
            ':id_danh_muc' => $data['id_danh_muc'] ?? null,
            ':tags' => isset($data['tags']) ? json_encode($data['tags'], JSON_UNESCAPED_UNICODE) : null,
            ':san_pham_lien_quan' => isset($data['san_pham_lien_quan']) ? json_encode($data['san_pham_lien_quan']) : null,
            ':seo_title' => $data['seo_title'] ?? null,
            ':seo_description' => $data['seo_description'] ?? null,
            ':trang_thai' => $data['trang_thai'] ?? 1,
            ':ngay_xuat_ban' => $data['ngay_xuat_ban'] ?? null,
            ':id_nguoi_tao' => $data['id_nguoi_tao'] ?? null
        ]);
    }

    public function capNhat($id, $data) {
        $fields = [];
        $params = [];
        
        $allowed = ['tieu_de', 'slug', 'tom_tat', 'noi_dung', 'hinh_anh', 'id_danh_muc', 'seo_title', 'seo_description', 'trang_thai', 'ngay_xuat_ban'];
        
        foreach ($allowed as $field) {
            if (array_key_exists($field, $data)) {
                $fields[] = "$field = ?";
                $params[] = $data[$field];
            }
        }
        
        if (array_key_exists('tags', $data)) {
            $fields[] = "tags = ?";
            $params[] = is_array($data['tags']) ? json_encode($data['tags'], JSON_UNESCAPED_UNICODE) : $data['tags'];
        }
        
        if (array_key_exists('san_pham_lien_quan', $data)) {
            $fields[] = "san_pham_lien_quan = ?";
            $params[] = is_array($data['san_pham_lien_quan']) ? json_encode($data['san_pham_lien_quan']) : $data['san_pham_lien_quan'];
        }

        if (empty($fields)) return true;

        $params[] = $id;
        $sql = "UPDATE bai_viet SET " . implode(', ', $fields) . " WHERE id = ?";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($params);
    }

    public function xoa($id) {
        $stmt = $this->db->prepare("DELETE FROM bai_viet WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function kiemTraSlugTonTai($slug, $exclude_id = null) {
        $sql = "SELECT id FROM bai_viet WHERE slug = ?";
        $params = [$slug];
        
        if ($exclude_id) {
            $sql .= " AND id != ?";
            $params[] = $exclude_id;
        }
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->rowCount() > 0;
    }

    public function layTatCaDanhMuc() {
        $stmt = $this->db->query("SELECT * FROM danh_muc_bai_viet ORDER BY thu_tu ASC, ten_danh_muc ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function thongKeTrangThai() {
        $sql = "SELECT 
                COUNT(*) as total,
                COALESCE(SUM(CASE WHEN trang_thai = 1 THEN 1 ELSE 0 END), 0) as published,
                COALESCE(SUM(CASE WHEN trang_thai = 0 THEN 1 ELSE 0 END), 0) as draft,
                COALESCE(SUM(CASE WHEN trang_thai = 2 THEN 1 ELSE 0 END), 0) as hidden,
                0 as pending,
                COALESCE(SUM(luot_xem), 0) as total_views,
                COALESCE(SUM(CASE WHEN (seo_title IS NULL OR seo_title = '' OR seo_description IS NULL OR seo_description = '' OR hinh_anh IS NULL OR hinh_anh = '') THEN 1 ELSE 0 END), 0) as missing_seo
                FROM bai_viet";
        $stmt = $this->db->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getLatestPosts($limit = 3) {
        $sql = "SELECT bv.*, 
                       dm.ten_danh_muc, 
                       nd.ho_ten as ten_nguoi_tao, nd.anh_dai_dien as anh_nguoi_tao
                FROM bai_viet bv
                LEFT JOIN danh_muc_bai_viet dm ON bv.id_danh_muc = dm.id
                LEFT JOIN nguoi_dung nd ON bv.id_nguoi_tao = nd.id
                WHERE bv.trang_thai = 1 
                ORDER BY bv.ngay_tao DESC 
                LIMIT :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function timTheoSlug($slug) {
        $sql = "SELECT bv.*, dm.ten_danh_muc, nd.ho_ten as ten_nguoi_tao, nd.anh_dai_dien as anh_nguoi_tao
                FROM bai_viet bv
                LEFT JOIN danh_muc_bai_viet dm ON bv.id_danh_muc = dm.id
                LEFT JOIN nguoi_dung nd ON bv.id_nguoi_tao = nd.id
                WHERE bv.slug = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$slug]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tangLuotXem($id) {
        $sql = "UPDATE bai_viet SET luot_xem = luot_xem + 1 WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function layBaiVietNoiBat($limit = 3) {
        $sql = "SELECT bv.*, dm.ten_danh_muc, nd.ho_ten as ten_nguoi_tao
                FROM bai_viet bv
                LEFT JOIN danh_muc_bai_viet dm ON bv.id_danh_muc = dm.id
                LEFT JOIN nguoi_dung nd ON bv.id_nguoi_tao = nd.id
                WHERE bv.trang_thai = 1 
                ORDER BY bv.luot_xem DESC, bv.ngay_tao DESC 
                LIMIT :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layBaiVietLienQuan($id_danh_muc, $exclude_id, $limit = 3) {
        $sql = "SELECT bv.*, dm.ten_danh_muc, nd.ho_ten as ten_nguoi_tao
                FROM bai_viet bv
                LEFT JOIN danh_muc_bai_viet dm ON bv.id_danh_muc = dm.id
                LEFT JOIN nguoi_dung nd ON bv.id_nguoi_tao = nd.id
                WHERE bv.trang_thai = 1 AND bv.id_danh_muc = ? AND bv.id != ?
                ORDER BY bv.ngay_tao DESC 
                LIMIT ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $id_danh_muc);
        $stmt->bindValue(2, $exclude_id);
        $stmt->bindValue(3, (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layDanhMucKemSoLuong() {
        $sql = "SELECT dm.*, COUNT(bv.id) as so_luong_bai_viet
                FROM danh_muc_bai_viet dm
                LEFT JOIN bai_viet bv ON dm.id = bv.id_danh_muc AND bv.trang_thai = 1
                GROUP BY dm.id
                ORDER BY dm.thu_tu ASC, dm.ten_danh_muc ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function layTagsPhoBien($limit = 10) {
        // In MySQL 5.7+ we could extract JSON, but for simplicity we will just fetch all non-empty tags 
        // and process them in PHP or use a LIKE query. Here we just fetch all tags.
        $sql = "SELECT tags FROM bai_viet WHERE trang_thai = 1 AND tags IS NOT NULL AND tags != '' AND tags != '[]'";
        $stmt = $this->db->query($sql);
        $allTagsRows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $tagCounts = [];
        foreach ($allTagsRows as $row) {
            $tagsArray = json_decode($row['tags'], true);
            if (is_array($tagsArray)) {
                foreach ($tagsArray as $tag) {
                    $tag = trim($tag);
                    if (!empty($tag)) {
                        if (!isset($tagCounts[$tag])) $tagCounts[$tag] = 0;
                        $tagCounts[$tag]++;
                    }
                }
            }
        }
        
        arsort($tagCounts);
        return array_slice(array_keys($tagCounts), 0, $limit);
    }
}
