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
        $articles = $this->baiVietModel->layBaiVietNoiBat($limit);
        return array_map([$this, 'mapArticle'], $articles);
    }

    public function getDanhSachBaiViet($params = [], $page = 1, $perPage = 6) {
        $offset = ($page - 1) * $perPage;
        $params['status'] = 'published'; // Only show published articles
        $result = $this->baiVietModel->layDanhSach($params, $perPage, $offset);
        $result['data'] = array_map([$this, 'mapArticle'], $result['data']);
        return $result;
    }

    public function getBaiDocNhieu($limit = 4) {
        // Reusing layBaiVietNoiBat which orders by luot_xem
        $articles = $this->baiVietModel->layBaiVietNoiBat($limit);
        return array_map([$this, 'mapArticle'], $articles);
    }

    public function getChiTietBaiViet($slug) {
        $article = $this->baiVietModel->timTheoSlug($slug);
        if ($article) {
            $this->baiVietModel->tangLuotXem($article['id']);
            $article['luot_xem'] += 1;
            return $this->mapArticle($article);
        }
        return null;
    }

    public function getBaiVietLienQuan($id_danh_muc, $exclude_id, $limit = 3) {
        if (!$id_danh_muc) return [];
        $articles = $this->baiVietModel->layBaiVietLienQuan($id_danh_muc, $exclude_id, $limit);
        return array_map([$this, 'mapArticle'], $articles);
    }

    private function mapArticle($article) {
        if (!$article) return null;
        
        $bv_img = $article['hinh_anh'] ?? '';
        if (empty($bv_img)) {
            $bv_img_src = APP_URL . '/images/Logo_.jpg';
        } elseif (strpos($bv_img, 'http') === 0) {
            $bv_img_src = $bv_img;
        } elseif (strpos($bv_img, '/') === 0) {
            $bv_img_src = APP_URL . $bv_img;
        } else {
            $bv_img_src = APP_URL . '/uploads/bai_viet/' . $bv_img;
        }

        // Calculate reading time
        $wordCount = count(explode(' ', strip_tags($article['noi_dung'] ?? '')));
        $minutes = max(1, ceil($wordCount / 200));
        $reading_time = $minutes . ' phút đọc';

        return [
            'id' => $article['id'],
            'slug' => $article['slug'],
            'title' => $article['tieu_de'] ?? '',
            'tieu_de' => $article['tieu_de'] ?? '',
            'excerpt' => $article['tom_tat'] ?? '',
            'tom_tat' => $article['tom_tat'] ?? '',
            'content' => $article['noi_dung'] ?? '',
            'noi_dung' => $article['noi_dung'] ?? '',
            'image' => $bv_img_src,
            'hinh_anh' => $article['hinh_anh'] ?? '',
            'category' => $article['ten_danh_muc'] ?? 'Tin tức',
            'ten_danh_muc' => $article['ten_danh_muc'] ?? 'Tin tức',
            'id_danh_muc' => $article['id_danh_muc'] ?? '',
            'date' => isset($article['ngay_tao']) ? date('d/m/Y', strtotime($article['ngay_tao'])) : '',
            'ngay_tao' => $article['ngay_tao'] ?? '',
            'author' => $article['ten_nguoi_tao'] ?? 'Ban biên tập',
            'ten_nguoi_tao' => $article['ten_nguoi_tao'] ?? 'Ban biên tập',
            'views' => $article['luot_xem'] ?? 0,
            'luot_xem' => $article['luot_xem'] ?? 0,
            'reading_time' => $reading_time,
            'is_main' => $article['is_main'] ?? 0,
            'tags' => $article['tags'] ?? '[]',
            'san_pham_lien_quan' => $article['san_pham_lien_quan'] ?? '[]'
        ];
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
