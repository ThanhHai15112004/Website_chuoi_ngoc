<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Services\Admin\BinhLuanService;

class BinhLuanController extends Controller
{
    private $binhLuanService;

    public function __construct()
    {
        $this->binhLuanService = new BinhLuanService();
    }

    public function index()
    {
        $filters = [
            'type' => $_GET['type'] ?? 'all',
            'status' => $_GET['status'] ?? 'all',
            'sao' => $_GET['sao'] ?? 'all',
            'keyword' => trim($_GET['keyword'] ?? '')
        ];
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        $data = $this->binhLuanService->getAdminReviewsData($filters, $page, 10);
        $data['settings'] = $this->binhLuanService->getSettings();
        $data['current_page'] = 'binh_luan';
        $data['tieu_de'] = 'Bình luận / Đánh giá - Admin';
        $data['filters'] = $filters;

        $this->view('admin_binh_luan', $data, 'admin');
    }

    public function saveSettings()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            return;
        }

        $success = $this->binhLuanService->saveSettings($_POST);
        echo json_encode(['success' => $success]);
    }

    public function doiTrangThai()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            return;
        }

        $id = $_POST['id'] ?? null;
        $action = $_POST['action'] ?? null;

        if ($id && $action) {
            $success = $this->binhLuanService->doiTrangThai($id, $action);
            echo json_encode(['success' => $success]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Missing data']);
        }
    }

    public function detail()
    {
        $id = $_GET['id'] ?? '';
        $review = $this->binhLuanService->getDetail($id);
        if ($review) {
            echo json_encode(['success' => true, 'data' => $review]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy đánh giá']);
        }
    }

    public function reply()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            return;
        }

        $id = $_POST['id'] ?? null;
        $content = trim($_POST['content'] ?? '');
        $adminId = $_SESSION['user_id'] ?? null; // assuming admin is logged in

        if ($id && $content) {
            $success = $this->binhLuanService->reply($id, $content, $adminId);
            echo json_encode(['success' => $success]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Missing data']);
        }
    }

    public function xoa()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'message' => 'Invalid request']);
            return;
        }

        $id = $_POST['id'] ?? null;

        if ($id) {
            $success = $this->binhLuanService->xoa($id);
            echo json_encode(['success' => $success]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Missing ID']);
        }
    }
}
