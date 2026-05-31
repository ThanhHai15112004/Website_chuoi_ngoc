<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Services\Admin\ThuyenChuyenService;

class ThuyenChuyenController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new ThuyenChuyenService();
    }

    /**
     * Danh sách phiếu thuyên chuyển
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

        $this->view('admin_thuyen_chuyen', [
            'current_page' => 'thuyen_chuyen_kho',
            'danhSach' => $dataResponse['list'],
            'pagination' => $dataResponse['pagination'],
            'stats' => $stats
        ], 'admin');
    }

    /**
     * Form tạo phiếu mới
     */
    public function taoMoi()
    {
        $danhSachKho = $this->service->layDanhSachKho();

        $this->view('admin_thuyen_chuyen_them', [
            'current_page' => 'thuyen_chuyen_kho',
            'danhSachKho' => $danhSachKho
        ], 'admin');
    }

    /**
     * API: Lưu phiếu mới
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
     * Chi tiết phiếu
     */
    public function chiTiet($id)
    {
        $data = $this->service->chiTiet($id);
        if (!$data) {
            die('Phiếu không tồn tại');
        }

        // Tạo timeline từ data thực
        $phieu = $data['phieu'];
        $timeline = $this->buildTimeline($phieu);

        $this->view('admin_thuyen_chuyen_chitiet', [
            'current_page' => 'thuyen_chuyen_kho',
            'phieu' => $phieu,
            'chiTiet' => $data['chi_tiet'],
            'timeline' => $timeline
        ], 'admin');
    }

    /**
     * API: Duyệt phiếu
     */
    public function duyet($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user']['id'] ?? null;
            $result = $this->service->duyetPhieu($id, $userId);
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    /**
     * API: Bắt đầu chuyển hàng
     */
    public function batDauChuyen($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->service->batDauChuyen($id);
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    /**
     * API: Xác nhận nhận hàng
     */
    public function nhanHang($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            $dataKiem = $input['chi_tiet'] ?? [];

            $result = $this->service->nhanHang($id, $dataKiem);
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
            $input = json_decode(file_get_contents('php://input'), true);
            $lyDo = $input['ly_do'] ?? '';

            $result = $this->service->huyPhieu($id, $lyDo);
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    /**
     * Tạo timeline cho trang chi tiết
     */
    private function buildTimeline($phieu)
    {
        $tt = (int)$phieu['trang_thai'];

        $timeline = [
            [
                'step' => 1,
                'title' => 'Tạo phiếu',
                'time' => $phieu['ngay_tao'] ? date('d/m/Y H:i', strtotime($phieu['ngay_tao'])) : '',
                'actor' => $phieu['nguoi_tao_ten'] ?? '',
                'status' => 'completed'
            ],
            [
                'step' => 2,
                'title' => 'Duyệt phiếu',
                'time' => $phieu['ngay_duyet'] ? date('d/m/Y H:i', strtotime($phieu['ngay_duyet'])) : '',
                'actor' => $phieu['nguoi_duyet_ten'] ?? '',
                'status' => $tt >= 2 ? 'completed' : 'pending'
            ],
            [
                'step' => 3,
                'title' => 'Bắt đầu chuyển',
                'time' => $phieu['ngay_chuyen'] ? date('d/m/Y H:i', strtotime($phieu['ngay_chuyen'])) : '',
                'actor' => '',
                'status' => $tt >= 3 ? 'completed' : 'pending'
            ],
            [
                'step' => 4,
                'title' => 'Nhận hàng',
                'time' => $phieu['ngay_nhan'] ? date('d/m/Y H:i', strtotime($phieu['ngay_nhan'])) : '',
                'actor' => '',
                'status' => ($tt == 4 || $tt == 5) ? 'completed' : 'pending'
            ]
        ];

        return $timeline;
    }
}
