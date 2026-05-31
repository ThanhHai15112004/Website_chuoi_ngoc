<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Services\Admin\KiemKeService;

class KiemKeController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new KiemKeService();
    }

    /**
     * Danh sách phiếu kiểm kê
     */
    public function index()
    {
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $filters = [
            'keyword' => $_GET['keyword'] ?? '',
            'trang_thai' => $_GET['trang_thai'] ?? ''
        ];

        $dataResponse = $this->service->layDanhSach($filters, $page, 20);
        $stats = $this->service->layThongKe();

        $this->view('admin_kiem_ke', [
            'current_page' => 'kiem_ke',
            'danhSachKK' => $dataResponse['list'],
            'pagination' => $dataResponse['pagination'],
            'stats' => $stats
        ], 'admin');
    }

    /**
     * Form tạo phiếu kiểm kê mới
     */
    public function taoMoi()
    {
        $danhSachKho = $this->service->layDanhSachKho();

        $this->view('admin_kiem_ke_them', [
            'current_page' => 'kiem_ke',
            'danhSachKho' => $danhSachKho
        ], 'admin');
    }

    /**
     * API: Lưu phiếu kiểm kê mới
     */
    public function luuMoi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            if (!$input) $input = $_POST;

            $input['user_id'] = $_SESSION['user']['id'] ?? null;

            $result = $this->service->luuPhieu($input);

            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    /**
     * Chi tiết phiếu kiểm kê
     */
    public function chiTiet($id)
    {
        $data = $this->service->chiTiet($id);
        if (!$data) {
            die('Phiếu kiểm kê không tồn tại');
        }

        $this->view('admin_kiem_ke_chitiet', [
            'current_page' => 'kiem_ke',
            'phieu' => $data['phieu'],
            'chiTiet' => $data['chi_tiet']
        ], 'admin');
    }

    /**
     * API: Lưu kết quả kiểm đếm
     */
    public function luuKetQua($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            $dataKiem = $input['chi_tiet'] ?? [];

            $result = $this->service->luuKetQua($id, $dataKiem);
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    /**
     * API: Gửi duyệt kết quả
     */
    public function guiDuyet($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->service->guiDuyet($id);
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    /**
     * API: Duyệt + Điều chỉnh kho
     */
    public function duyet($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user']['id'] ?? null;
            $result = $this->service->duyetVaDieuChinh($id, $userId);
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    /**
     * API: Hủy phiếu
     */
    public function huy($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->service->huyPhieu($id);
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    /**
     * API: Lấy danh sách biến thể theo kho (cho form tạo phiếu)
     */
    public function apiBienTheTheoKho()
    {
        $idKho = $_GET['id_kho'] ?? null;
        if (!$idKho) {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Thiếu ID kho.']);
            exit;
        }

        $list = $this->service->layBienTheTheoKho($idKho);
        header('Content-Type: application/json');
        echo json_encode(['success' => true, 'data' => $list]);
        exit;
    }

    /**
     * API: Tìm kiếm biến thể theo kho (cho search box)
     */
    public function apiSearchVariants()
    {
        $idKho = $_GET['id_kho'] ?? null;
        $keyword = $_GET['keyword'] ?? '';
        
        if (!$idKho) {
            header('Content-Type: application/json');
            echo json_encode([]);
            exit;
        }

        // Tái sử dụng layBienTheTheoKho và filter bằng PHP cho nhanh
        $list = $this->service->layBienTheTheoKho($idKho);
        
        $result = [];
        $kw = mb_strtolower($keyword, 'UTF-8');
        foreach ($list as $item) {
            $name = mb_strtolower($item['ten_sp'], 'UTF-8');
            $sku = mb_strtolower($item['sku'] ?? '', 'UTF-8');
            if (empty($kw) || strpos($name, $kw) !== false || strpos($sku, $kw) !== false) {
                $result[] = [
                    'id' => $item['id_bien_the'],
                    'name' => $item['ten_sp'],
                    'variant' => $item['variant_name'],
                    'sku' => $item['sku'],
                    'image' => $item['image'],
                    'stock' => $item['so_luong_ton'],
                    'id_vi_tri' => $item['id_vi_tri'],
                    'ten_vi_tri' => $item['ten_vi_tri']
                ];
            }
        }
        
        header('Content-Type: application/json');
        echo json_encode(array_slice($result, 0, 20));
        exit;
    }
}
