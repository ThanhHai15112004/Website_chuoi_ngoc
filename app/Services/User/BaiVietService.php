<?php
namespace App\Services\User;

use App\Models\Admin\BaiVietModel;
use App\Models\Admin\BinhLuanBaiVietModel;
use App\Models\Admin\SanPhamModel;

class BaiVietService {
    private $baiVietModel;
    private $binhLuanModel;
    private $sanPhamModel;

    public function __construct() {
        $this->baiVietModel = new BaiVietModel();
        $this->binhLuanModel = new BinhLuanBaiVietModel();
        
        // We assume SanPhamModel exists in Admin as per standard. If not, we will need to create it, 
        // but we can check if class exists first.
        if (class_exists('App\Models\Admin\SanPhamModel')) {
            $this->sanPhamModel = new SanPhamModel();
        }
    }

    public function getDanhMucBaiViet() {
        return $this->baiVietModel->layDanhMucKemSoLuong();
    }

    public function getBaiVietNoiBat($limit = 3) {
        return $this->baiVietModel->layBaiVietNoiBat($limit);
    }

    public function getDanhSachBaiViet($params = [], $page = 1, $perPage = 6) {
        $offset = ($page - 1) * $perPage;
        $params['status'] = 'published'; // Only show published articles
        return $this->baiVietModel->layDanhSach($params, $perPage, $offset);
    }

    public function getBaiDocNhieu($limit = 4) {
        // Reusing layBaiVietNoiBat which orders by luot_xem
        return $this->baiVietModel->layBaiVietNoiBat($limit);
    }

    public function getChiTietBaiViet($slug) {
        $article = $this->baiVietModel->timTheoSlug($slug);
        if ($article) {
            $this->baiVietModel->tangLuotXem($article['id']);
            $article['luot_xem'] += 1;
            
            // Calculate reading time (approx 200 words per minute)
            $wordCount = str_word_count(strip_tags($article['noi_dung'] ?? ''));
            $minutes = ceil($wordCount / 200);
            $article['reading_time'] = $minutes . ' phút đọc';
        }
        return $article;
    }

    public function getBaiVietLienQuan($id_danh_muc, $exclude_id, $limit = 3) {
        if (!$id_danh_muc) return [];
        return $this->baiVietModel->layBaiVietLienQuan($id_danh_muc, $exclude_id, $limit);
    }

    public function getSanPhamLienQuan($json_san_pham_ids) {
        if (empty($json_san_pham_ids) || !$this->sanPhamModel) return [];
        
        $ids = json_decode($json_san_pham_ids, true);
        if (!is_array($ids) || empty($ids)) return [];
        
        // Fetch products. Assuming SanPhamModel has a getProductsByIds or similar.
        // We'll write a custom query here to be safe if SanPhamModel doesn't have it.
        $db = \App\Core\Database::getInstance()->getConnection();
        $placeholders = implode(',', array_fill(0, count($ids), '?'));
        $sql = "SELECT sp.id, sp.ten_sp as ten_san_pham, sp.gia_ban, sp.gia_khuyen_mai as gia_goc, sp.hinh_anh_chinh as hinh_anh, sp.slug
                FROM san_pham sp
                WHERE sp.id IN ($placeholders) AND sp.trang_thai = 1
                LIMIT 4";
        $stmt = $db->prepare($sql);
        $stmt->execute($ids);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTags() {
        return $this->baiVietModel->layTagsPhoBien(15);
    }
    
    public function getBinhLuan($id_bai_viet) {
        return $this->binhLuanModel->layBinhLuanTheoBaiViet($id_bai_viet);
    }
    
    public function themBinhLuan($data) {
        $data['id'] = 'bl_' . uniqid();
        return $this->binhLuanModel->themBinhLuan($data);
    }
}
