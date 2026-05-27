<?php
namespace App\Controllers\Admin;
use App\Core\Controller;

class DanhMucController extends Controller {
    public function index() {
        $service = new \App\Services\Admin\DanhMucService();
        $danh_muc_list = $service->getAllCategories($_GET);

        // Stats
        $stats = [
            'tong' => count($danh_muc_list),
            'hien_thi' => count(array_filter($danh_muc_list, fn($c) => $c['trang_thai'] == 1)),
            'dang_an' => count(array_filter($danh_muc_list, fn($c) => $c['trang_thai'] == 0)),
            'co_sp' => count(array_filter($danh_muc_list, fn($c) => $c['so_san_pham'] > 0)),
            'trong' => count(array_filter($danh_muc_list, fn($c) => $c['so_san_pham'] == 0)),
        ];

        $data = [
            'tieu_de' => 'Quản lý danh mục',
            'current_page' => 'danh_muc',
            'danh_muc_list' => $danh_muc_list,
            'stats' => $stats
        ];

        $this->view('admin_danh_muc', $data, 'admin');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \App\Services\Admin\DanhMucService();
            $service->saveCategory($_POST);
            $referer = $_SERVER['HTTP_REFERER'] ?? (APP_URL . '/admin/danh-muc');
            header("Location: $referer");
            exit;
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \App\Services\Admin\DanhMucService();
            $service->deleteCategory($id);
            $referer = $_SERVER['HTTP_REFERER'] ?? (APP_URL . '/admin/danh-muc');
            header("Location: $referer");
            exit;
        }
    }

    public function toggleStatus($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \App\Services\Admin\DanhMucService();
            $service->toggleStatus($id);
            $referer = $_SERVER['HTTP_REFERER'] ?? (APP_URL . '/admin/danh-muc');
            header("Location: $referer");
            exit;
        }
    }
}
