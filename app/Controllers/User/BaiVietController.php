<?php

namespace App\Controllers\User;

use App\Core\Controller;
use App\Services\User\BaiVietService;

class BaiVietController extends Controller {
    private $baiVietService;

    public function __construct() {
        $this->baiVietService = new BaiVietService();
    }

    public function index() {
        $slug_danh_muc = $_GET['danh_muc'] ?? '';
        $keyword = $_GET['q'] ?? '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        $perPage = 6;

        $categories = $this->baiVietService->getDanhMucBaiViet();
        
        $id_danh_muc = null;
        if ($slug_danh_muc) {
            foreach ($categories as $cat) {
                if ($cat['slug'] === $slug_danh_muc) {
                    $id_danh_muc = $cat['id'];
                    break;
                }
            }
        }

        $params = [
            'q' => $keyword,
            'id_danh_muc' => $id_danh_muc
        ];

        $featured_articles = $this->baiVietService->getBaiVietNoiBat(3);
        $recent_articles_data = $this->baiVietService->getDanhSachBaiViet($params, $page, $perPage);
        $popular_articles = $this->baiVietService->getBaiDocNhieu(4);
        $tags = $this->baiVietService->getTags();

        $total_pages = ceil($recent_articles_data['total'] / $perPage);

        $data = [
            'tieu_de' => 'Góc Tư Vấn - Kiến Thức Trang Sức Phong Thuỷ',
            'trang_hien_tai' => 'bai_viet', // Để menu header active
            'breadcrumbs' => [
                ['ten' => 'Trang chủ', 'url' => APP_URL . '/'],
                ['ten' => 'Góc tư vấn', 'url' => APP_URL . '/bai-viet']
            ],
            'categories' => $categories,
            'featured_articles' => $featured_articles,
            'recent_articles' => $recent_articles_data['data'],
            'popular_articles' => $popular_articles,
            'tags' => $tags,
            'current_page' => $page,
            'total_pages' => $total_pages,
            'current_category_slug' => $slug_danh_muc,
            'keyword' => $keyword
        ];
        
        $this->view('bai_viet', $data);
    }

    public function detail() {
        $slug = $_GET['slug'] ?? '';
        if (empty($slug)) {
            header("Location: " . APP_URL . "/bai-viet");
            exit;
        }

        $article = $this->baiVietService->getChiTietBaiViet($slug);
        
        if (!$article) {
            header("Location: " . APP_URL . "/bai-viet");
            exit;
        }

        $related_articles = $this->baiVietService->getBaiVietLienQuan($article['id_danh_muc'], $article['id'], 3);
        $related_products = $this->baiVietService->getSanPhamLienQuan($article['san_pham_lien_quan']);
        $popular_articles = $this->baiVietService->getBaiDocNhieu(4);
        $tags = $this->baiVietService->getTags();
        $comments = $this->baiVietService->getBinhLuan($article['id']);

        $data = [
            'tieu_de' => $article['tieu_de'] . ' - Góc Tư Vấn',
            'trang_hien_tai' => 'bai_viet', 
            'breadcrumbs' => [
                ['ten' => 'Trang chủ', 'url' => APP_URL . '/'],
                ['ten' => 'Góc tư vấn', 'url' => APP_URL . '/bai-viet'],
                ['ten' => $article['tieu_de'], 'url' => null]
            ],
            'article' => $article,
            'related_articles' => $related_articles,
            'related_products' => $related_products,
            'popular_articles' => $popular_articles,
            'tags' => $tags,
            'comments' => $comments
        ];

        $this->view('chi_tiet_bai_viet', $data);
    }

    public function submitComment() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id_bai_viet = $_POST['id_bai_viet'] ?? '';
            $slug = $_POST['slug'] ?? '';
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = $_POST['email'] ?? '';
            $noi_dung = $_POST['noi_dung'] ?? '';
            $id_phan_hoi = $_POST['id_phan_hoi'] ?? null;
            
            if (empty($id_phan_hoi)) {
                $id_phan_hoi = null;
            }

            if (!empty($id_bai_viet) && !empty($ho_ten) && !empty($noi_dung)) {
                $id_nguoi_dung = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;
                
                $this->baiVietService->themBinhLuan([
                    'id_bai_viet' => $id_bai_viet,
                    'id_nguoi_dung' => $id_nguoi_dung,
                    'ho_ten' => $ho_ten,
                    'email' => $email,
                    'noi_dung' => $noi_dung,
                    'id_phan_hoi' => $id_phan_hoi
                ]);
            }
            
            header("Location: " . APP_URL . "/chi-tiet-bai-viet?slug=" . urlencode($slug) . "#comments-section");
            exit;
        }
    }
}
