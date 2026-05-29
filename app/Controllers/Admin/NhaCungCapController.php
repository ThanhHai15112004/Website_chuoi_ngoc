<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Services\Admin\NhaCungCapService;

class NhaCungCapController extends Controller
{
    private $nhaCungCapService;

    public function __construct()
    {
        $this->nhaCungCapService = new NhaCungCapService();
    }

    public function index()
    {
        $keyword = $_GET['keyword'] ?? '';
        $trang_thai = $_GET['trang_thai'] ?? '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        $filters = [];
        if ($keyword !== '') $filters['keyword'] = $keyword;
        if ($trang_thai !== '') $filters['trang_thai'] = $trang_thai;

        $stats = $this->nhaCungCapService->thongKe();
        $data = $this->nhaCungCapService->layDanhSach($filters, $page, 20);

        $this->view('admin_nha_cung_cap', [
            'current_page' => 'nha_cung_cap',
            'stats' => $stats,
            'danhSachNCC' => $data['list'],
            'total' => $data['total'],
            'pages' => $data['pages'],
            'currentPage' => $page,
            'filters' => $filters
        ], 'admin');
    }

    public function taoMoi()
    {
        $this->view('admin_nha_cung_cap_them', [
            'current_page' => 'nha_cung_cap',
            'isEdit' => false
        ], 'admin');
    }

    public function trangCapNhat($id)
    {
        $res = $this->nhaCungCapService->chiTiet($id);
        if (!$res['success']) {
            header("Location: " . APP_URL . "/admin/nha-cung-cap");
            exit;
        }

        $this->view('admin_nha_cung_cap_them', [
            'current_page' => 'nha_cung_cap',
            'isEdit' => true,
            'nccId' => $id,
            'ncc' => $res['data']
        ], 'admin');
    }

    public function luuMoi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
            
            $data = [
                'ma_ncc' => $input['ma_ncc'] ?? '',
                'ten_ncc' => $input['ten_ncc'] ?? '',
                'nguoi_lien_he' => $input['nguoi_lien_he'] ?? '',
                'sdt' => $input['sdt'] ?? '',
                'email' => $input['email'] ?? '',
                'dia_chi' => $input['dia_chi'] ?? '',
                'trang_thai' => isset($input['trang_thai']) ? (int)$input['trang_thai'] : 1
            ];

            $res = $this->nhaCungCapService->luuMoi($data);
            
            header('Content-Type: application/json');
            echo json_encode($res);
            exit;
        }
    }

    public function capNhat($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
            
            $data = [
                'ma_ncc' => $input['ma_ncc'] ?? '',
                'ten_ncc' => $input['ten_ncc'] ?? '',
                'nguoi_lien_he' => $input['nguoi_lien_he'] ?? '',
                'sdt' => $input['sdt'] ?? '',
                'email' => $input['email'] ?? '',
                'dia_chi' => $input['dia_chi'] ?? '',
                'trang_thai' => isset($input['trang_thai']) ? (int)$input['trang_thai'] : 1
            ];

            $res = $this->nhaCungCapService->capNhat($id, $data);
            
            header('Content-Type: application/json');
            echo json_encode($res);
            exit;
        }
    }

    public function capNhatTrangThai($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
            $trang_thai = isset($input['trang_thai']) ? (int)$input['trang_thai'] : 0;
            
            $res = $this->nhaCungCapService->capNhatTrangThai($id, $trang_thai);
            
            header('Content-Type: application/json');
            echo json_encode($res);
            exit;
        }
    }

    // API endpoints cho Drawer
    public function chiTiet($id)
    {
        $res = $this->nhaCungCapService->chiTiet($id);
        header('Content-Type: application/json');
        
        if ($res['success']) {
            echo json_encode(['status' => 'success', 'data' => $res['data']]);
        } else {
            echo json_encode(['status' => 'error', 'message' => $res['message']]);
        }
        exit;
    }
}
