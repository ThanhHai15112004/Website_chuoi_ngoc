<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Admin\NhatKyHoatDongModel;

class NhatKyHoatDongController extends Controller
{
    private $nhatKyModel;

    public function __construct()
    {
        $this->nhatKyModel = new NhatKyHoatDongModel();
    }

    public function index()
    {
        // Phân trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 20;
        $offset = ($page - 1) * $limit;

        // Bộ lọc
        $params = [
            'search' => $_GET['search'] ?? '',
            'tab' => $_GET['tab'] ?? 'all',
            'nhan_vien' => $_GET['nhan_vien'] ?? '',
            'thoi_gian' => $_GET['thoi_gian'] ?? '30days'
        ];

        // Lấy dữ liệu
        $stats = $this->nhatKyModel->thongKe();
        $result = $this->nhatKyModel->layDanhSach($params, $limit, $offset);
        $danhSachNV = $this->nhatKyModel->layDanhSachNhanVien();

        $logs = $result['data'];
        $total = $result['total'];
        $totalPages = ceil($total / $limit);

        // Render view
        $this->view('admin_nhat_ky', [
            'tieu_de' => 'Nhật ký hoạt động',
            'current_page' => 'nhat_ky',
            'logs' => $logs,
            'stats' => $stats,
            'danhSachNV' => $danhSachNV,
            'total' => $total,
            'page' => $page,
            'limit' => $limit,
            'totalPages' => $totalPages,
            'params' => $params
        ], 'admin');
    }

    public function apiChiTiet($id)
    {
        header('Content-Type: application/json');
        
        $log = $this->nhatKyModel->layChiTiet($id);
        
        if ($log) {
            echo json_encode([
                'status' => 'success',
                'data' => $log
            ]);
        } else {
            http_response_code(404);
            echo json_encode([
                'status' => 'error',
                'message' => 'Không tìm thấy nhật ký'
            ]);
        }
        exit;
    }
}
