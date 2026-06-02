<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Services\Admin\TonKhoService;
use App\Models\Admin\DanhMucModel;
use App\Models\Admin\LoaiDaModel;

class TonKhoController extends Controller
{
    private $tonKhoService;
    private $danhMucModel;
    private $loaiDaModel;

    public function __construct()
    {
        $this->tonKhoService = new TonKhoService();
        $this->danhMucModel = new DanhMucModel();
        $this->loaiDaModel = new LoaiDaModel();
    }

    public function index()
    {
        $filters = [
            'keyword' => $_GET['keyword'] ?? '',
            'category' => $_GET['category'] ?? '',
            'gemstone' => $_GET['gemstone'] ?? '',
            'stock_status' => $_GET['stock_status'] ?? '',
            'tab' => $_GET['tab'] ?? ''
        ];

        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $limit = 20;

        $dataResponse = $this->tonKhoService->getInventoryData($filters, $page, $limit);
        $stats = $this->tonKhoService->getStats();
        
        $categories = $this->danhMucModel->layTatCa();
        $gemstones = $this->loaiDaModel->layTatCa();

        $this->view('admin_ton_kho', [
            'title' => 'Tồn Kho Hiện Tại - Admin',
            'current_page' => 'ton_kho',
            'inventoryProducts' => $dataResponse['list'],
            'pagination' => $dataResponse['pagination'],
            'stats' => $stats,
            'categories' => $categories,
            'gemstones' => $gemstones
        ], 'admin');
    }

    public function dieuChinh()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'variant_id' => $_POST['variant_id'] ?? '',
                'current_stock' => (int)($_POST['current_stock'] ?? 0),
                'actual_stock' => (int)($_POST['actual_stock'] ?? 0),
                'note' => trim($_POST['note'] ?? ''),
                'user_id' => $_SESSION['user']['id'] ?? null
            ];

            $result = $this->tonKhoService->dieuChinhKho($data);

            if ($result['success']) {
                $_SESSION['success_msg'] = 'Điều chỉnh tồn kho thành công!';
            } else {
                $_SESSION['error_msg'] = $result['message'] ?? 'Có lỗi xảy ra khi điều chỉnh kho.';
            }

            $redirectUrl = APP_URL . '/admin/ton-kho';
            if (!empty($_SERVER['HTTP_REFERER'])) {
                $redirectUrl = $_SERVER['HTTP_REFERER'];
            }
            header('Location: ' . $redirectUrl);
            exit;
        }
    }

    public function apiSearchVariants()
    {
        $keyword = $_GET['keyword'] ?? '';
        
        $filters = [];
        if (!empty($keyword)) {
            $filters['keyword'] = $keyword;
        }
        
        $result = $this->tonKhoService->getInventoryData($filters, 1, 50);
        
        // Return only what's needed for the autocomplete
        $list = array_map(function($item) {
            return [
                'id' => $item['variant_id'],
                'name' => $item['name'],
                'variant' => $item['variant'],
                'sku' => $item['sku'],
                'don_vi_tinh' => $item['don_vi_tinh'],
                'image' => $item['image'],
                'price' => $item['price'] ?? 0,
                'original_price' => $item['original_price'] ?? 0,
                'is_on_sale' => $item['is_on_sale'] ?? 0,
                'stock' => $item['stock_current'] ?? 0
            ];
        }, $result['list'] ?? []);

        header('Content-Type: application/json');
        echo json_encode($list);
        exit;
    }

    public function apiViTriCuaBienThe($idBienThe)
    {
        $spvtModel = new \App\Models\Admin\SanPhamViTriModel();
        $locations = $spvtModel->layViTriCuaBienThe($idBienThe);
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $locations]);
        exit;
    }
}
