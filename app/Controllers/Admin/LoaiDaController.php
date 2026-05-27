<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class LoaiDaController extends Controller {
    public function index() {
        $service = new \App\Services\Admin\LoaiDaService();
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        
        $limit = 10;
        $filters = $_GET;
        
        $dataResponse = $service->getAdminStoneData($filters, $page, $limit);
        $thong_ke = $service->getStats();

        $data = [
            'tieu_de' => 'Quản lý Loại Đá / Ngọc',
            'current_page' => 'loai_da',
            'danh_sach' => $dataResponse['list'],
            'pagination' => $dataResponse['pagination'],
            'thong_ke' => $thong_ke
        ];

        $this->view('admin_loai_da', $data, 'admin');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \App\Services\Admin\LoaiDaService();
            $file = isset($_FILES['hinh_anh']) ? $_FILES['hinh_anh'] : null;
            
            // Xử lý nhu cầu (array)
            if (isset($_POST['nhu_cau']) && is_string($_POST['nhu_cau'])) {
                $_POST['nhu_cau'] = array_map('trim', explode(',', $_POST['nhu_cau']));
            }
            
            // Xử lý mệnh (array)
            if (isset($_POST['menh_ids']) && !is_array($_POST['menh_ids'])) {
                // If it's sent as a comma separated string
                $_POST['menh_ids'] = array_filter(array_map('trim', explode(',', $_POST['menh_ids'])));
            }

            $service->saveStone($_POST, $file);
            header("Location: " . APP_URL . "/admin/loai-da");
            exit;
        }
    }

    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \App\Services\Admin\LoaiDaService();
            $service->deleteStone($id);
            $referer = $_SERVER['HTTP_REFERER'] ?? (APP_URL . '/admin/loai-da');
            header("Location: $referer");
            exit;
        }
    }

    public function toggleStatus($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $service = new \App\Services\Admin\LoaiDaService();
            $service->toggleStatus($id);
            $referer = $_SERVER['HTTP_REFERER'] ?? (APP_URL . '/admin/loai-da');
            header("Location: $referer");
            exit;
        }
    }

    public function create() {
        $service = new \App\Services\Admin\LoaiDaService();
        $deps = $service->getFormDependencies();

        $data = [
            'tieu_de' => 'Thêm Loại Đá / Ngọc - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'loai_da',
            'is_edit' => false,
            'menh_list' => $deps['menh_list'],
            'mock_data' => null // Bỏ mock data
        ];
        $this->view('admin_loai_da_form', $data, 'admin');
    }

    public function edit($id)
    {
        $service = new \App\Services\Admin\LoaiDaService();
        $stone = $service->getStoneById($id);
        
        if (!$stone) {
            header("Location: " . APP_URL . "/admin/loai-da");
            exit;
        }

        $deps = $service->getFormDependencies();

        $data = [
            'tieu_de' => 'Sửa Loại Đá / Ngọc',
            'current_page' => 'loai_da',
            'is_edit' => true,
            'stone' => $stone,
            'menh_list' => $deps['menh_list']
        ];
        $this->view('admin_loai_da_form', $data, 'admin');
    }

    public function apiDetail($id)
    {
        $service = new \App\Services\Admin\LoaiDaService();
        $stone = $service->getStoneById($id);
        
        header('Content-Type: application/json');
        if ($stone) {
            $deps = $service->getFormDependencies();
            $stone['menh_list'] = $deps['menh_list']; // Extract menh_list array
            
            // Format hinh_anh_url properly
            if (!empty($stone['hinh_anh'])) {
                $stone['hinh_anh_url'] = APP_URL . '/public/uploads/loai_da/' . $stone['hinh_anh'];
            }
            
            echo json_encode(['success' => true, 'data' => $stone]);
        } else {
            http_response_code(404);
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy loại đá']);
        }
        exit;
    }
}
