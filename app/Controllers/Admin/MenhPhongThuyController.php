<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class MenhPhongThuyController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new \App\Services\Admin\MenhPhongThuyService();
    }

    public function index()
    {
        $destinies = $this->service->getAdminList($_GET);
        $stats = $this->service->layThongKe();

        $data = [
            'destinies' => $destinies,
            'stats' => $stats,
            'current_page' => 'menh_phong_thuy',
            'tieu_de' => 'Mệnh Phong Thủy - Admin'
        ];
        $this->view('admin_menh_phong_thuy', $data, 'admin');
    }

    public function trangCapNhat($id)
    {
        $destiny = $this->service->getDestinyDetails($id);
        if (!$destiny) {
            header("Location: " . APP_URL . "/admin/menh-phong-thuy");
            exit;
        }

        $data = [
            'destiny' => $destiny,
            'current_page' => 'menh_phong_thuy',
            'tieu_de' => 'Chỉnh sửa ' . $destiny['ten_menh'] . ' - Admin'
        ];
        $this->view('admin_menh_phong_thuy_form', $data, 'admin');
    }

    public function luuMoi($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->service->updateDestiny($id, $_POST);
            $_SESSION['flash_success'] = 'Cập nhật mệnh phong thủy thành công!';
            header("Location: " . APP_URL . "/admin/menh-phong-thuy/sua/" . $id);
            exit;
        }
    }

    public function doiTrangThai($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->service->doiTrangThai($id);
            $_SESSION['flash_success'] = 'Đã thay đổi trạng thái mệnh!';
            header("Location: " . APP_URL . "/admin/menh-phong-thuy");
            exit;
        }
    }

    public function apiDetail($id)
    {
        $destiny = $this->service->getDestinyDetails($id);
        
        header('Content-Type: application/json');
        if ($destiny) {
            echo json_encode(['success' => true, 'data' => $destiny]);
        } else {
            http_response_code(404);
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy thông tin mệnh']);
        }
        exit;
    }
}
