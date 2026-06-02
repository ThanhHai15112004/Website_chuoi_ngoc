<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Services\Admin\XuatKhoService;

class XuatKhoController extends Controller
{
    private $xuatKhoService;

    public function __construct()
    {
        $this->xuatKhoService = new XuatKhoService();
    }

    public function index()
    {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $filters = [
            'keyword' => $_GET['keyword'] ?? '',
            'trang_thai' => $_GET['trang_thai'] ?? ''
        ];

        $dataResponse = $this->xuatKhoService->layDanhSach($filters, $page, 20);

        $this->view('admin_xuat_kho', [
            'title' => 'Quản lý Phiếu Xuất Kho',
            'current_page' => 'xuat_kho',
            'phieuXuatList' => $dataResponse['list'],
            'pagination' => $dataResponse['pagination'],
            'stats' => $dataResponse['stats']
        ], 'admin');
    }

    public function taoMoi()
    {
        $khoModel = new \App\Models\Admin\KhoHangModel();
        $danhSachKho = $khoModel->layDanhSachChoSelect();
        $this->view('admin_xuat_kho_them', [
            'title' => 'Tạo Phiếu Xuất Kho Mới',
            'current_page' => 'xuat_kho',
            'danhSachKho' => $danhSachKho
        ], 'admin');
    }

    public function luuMoi()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            if (!$input) $input = $_POST;

            $input['user_id'] = $_SESSION['user']['id'] ?? null;
            
            $result = $this->xuatKhoService->luuPhieuXuat($input);

            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    public function chiTiet($id)
    {
        $data = $this->xuatKhoService->chiTiet($id);
        if (!$data) {
            die('Phiếu không tồn tại');
        }

        $this->view('admin_xuat_kho_chitiet', [
            'title' => 'Chi Tiết Phiếu Xuất Kho: ' . $id,
            'current_page' => 'xuat_kho',
            'phieuXuat' => $data['phieu'],
            'danhSachSP' => $data['chi_tiet']
        ], 'admin');
    }

    public function duyet($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->xuatKhoService->duyetPhieu($id);
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    public function prepare($id)
    {
        $data = $this->xuatKhoService->chiTiet($id);
        if (!$data) {
            die('Phiếu không tồn tại');
        }

        if ($data['phieu']['trang_thai'] == 3) {
            // Đã hoàn thành
            header('Location: ' . APP_URL . '/admin/xuat-kho');
            exit;
        }

        $this->view('admin_xuat_kho_chuan_bi', [
            'title' => 'Chuẩn bị hàng xuất kho: ' . $id,
            'current_page' => 'xuat_kho',
            'id' => $id,
            'phieuXuat' => $data['phieu'],
            'danhSachSP' => $data['chi_tiet']
        ], 'admin');
    }

    public function luuPrepare($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $input = json_decode(file_get_contents('php://input'), true);
            $chiTietKiem = $input['chi_tiet'] ?? [];
            $userId = $_SESSION['user']['id'] ?? null;

            $result = $this->xuatKhoService->hoanThanhXuatKho($id, $userId, $chiTietKiem);
            
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }

    public function huy($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->xuatKhoService->huyPhieu($id);
            header('Content-Type: application/json');
            echo json_encode($result);
            exit;
        }
    }
}
