<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Services\Admin\NhapKhoService;

class NhapKhoController extends Controller {
    private $nhapKhoService;

    public function __construct() {
        // Kiểm tra đăng nhập (giả lập)
        // Require role...
        $this->nhapKhoService = new NhapKhoService();
    }

    public function index() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $filters = [
            'keyword' => $_GET['keyword'] ?? '',
            'trang_thai' => $_GET['trang_thai'] ?? ''
        ];

        $dataResponse = $this->nhapKhoService->layDanhSach($filters, $page, 20);

        $this->view('admin_nhap_kho', [
            'danhSachPhieuNhap' => $dataResponse['list'],
            'pagination' => $dataResponse['pagination'],
            'stats' => $dataResponse['stats'] ?? []
        ], 'admin');
    }

    public function taoMoi() {
        $nhaCungCapList = $this->nhapKhoService->layDanhSachNhaCungCap();
        $khoModel = new \App\Models\Admin\KhoHangModel();
        $danhSachKho = $khoModel->layDanhSachChoSelect();
        $this->view('admin_nhap_kho_them', [
            'nhaCungCapList' => $nhaCungCapList,
            'danhSachKho' => $danhSachKho
        ], 'admin');
    }

    public function luuMoi() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            
            if (!$input) {
                // Fallback to normal post if needed, but UI will send JSON
                $input = $_POST;
            }

            $input['user_id'] = $_SESSION['user']['id'] ?? null;
            
            $result = $this->nhapKhoService->luuPhieuNhap($input);

            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    public function trangCapNhat($id) {
        $nhaCungCapList = $this->nhapKhoService->layDanhSachNhaCungCap();
        $this->view('admin_nhap_kho_them', ['id' => $id, 'isEdit' => true, 'nhaCungCapList' => $nhaCungCapList], 'admin');
    }

    public function chiTiet($id) {
        $data = $this->nhapKhoService->chiTiet($id);
        if (!$data) {
            die('Phiếu không tồn tại');
        }
        $this->view('admin_nhap_kho_chitiet', [
            'id' => $id, 
            'phieuNhap' => $data['phieu'],
            'danhSachSP' => $data['chi_tiet']
        ], 'admin');
    }

    public function check($id) {
        $data = $this->nhapKhoService->chiTiet($id);
        if (!$data) {
            die('Phiếu không tồn tại');
        }

        if ($data['phieu']['trang_thai'] == 3) {
            // Đã hoàn thành rồi thì không kiểm nữa, redirect về list
            header('Location: ' . APP_URL . '/admin/nhap-kho');
            exit;
        }

        // Đổi trạng thái thành Đang kiểm hàng (2) nếu đang ở Nháp/Chờ kiểm
        // ... (Optional, có thể update trạng thái ở đây)

        $db = \App\Core\Database::getInstance()->getConnection();
        $stmt = $db->query("SELECT kv.id, kv.ten_vi_tri, kv.ma_vi_tri, kv.cap_do, k.ten_kho 
                FROM khu_vuc_kho kv
                JOIN kho_hang k ON kv.id_kho = k.id
                WHERE kv.cap_do IN ('ke', 'ngan') AND k.trang_thai = 1
                ORDER BY k.ten_kho, kv.ten_vi_tri");
        $dsViTri = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $this->view('admin_nhap_kho_kiem', [
            'id' => $id, 
            'phieuNhap' => $data['phieu'],
            'danhSachSP' => $data['chi_tiet'],
            'dsViTri' => $dsViTri
        ], 'admin');
    }

    public function luuCheck($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            $chiTietKiem = $input['chi_tiet'] ?? [];
            $userId = $_SESSION['user']['id'] ?? null;

            $result = $this->nhapKhoService->hoanThanhKiemHang($id, $userId, $chiTietKiem);
            
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    public function duyet($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->nhapKhoService->duyetPhieu($id);
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    public function huy($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->nhapKhoService->huyPhieu($id);
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }
}
