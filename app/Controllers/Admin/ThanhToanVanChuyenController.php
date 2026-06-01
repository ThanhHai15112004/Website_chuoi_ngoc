<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Services\Admin\ThanhToanVanChuyenService;
use Exception;

class ThanhToanVanChuyenController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new ThanhToanVanChuyenService();
    }

    public function index()
    {
        $data = $this->service->getAllData();

        $this->view('admin_thanh_toan_van_chuyen', [
            'title' => 'Thanh toán & vận chuyển',
            'current_page' => 'thanh_toan_van_chuyen',
            'payments' => $data['payments'],
            'banks' => $data['banks'],
            'shipping_methods' => $data['shipping_methods'],
            'shipping_zones' => $data['shipping_zones'],
            'freeship_rules' => $data['freeship_rules']
        ], 'admin');
    }

    // ==================== API: Load All ====================
    public function apiLoad()
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $data = $this->service->getAllData();
            echo json_encode(['success' => true, 'data' => $data], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }

    // ==================== API: Payment ====================
    public function apiSavePayment()
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
            $result = $this->service->savePayment($_POST, $id);
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }

    public function apiTogglePayment()
    {
        header('Content-Type: application/json; charset=utf-8');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        if (!$id) { echo json_encode(['success' => false, 'message' => 'Thiếu ID.']); return; }
        echo json_encode($this->service->togglePayment($id), JSON_UNESCAPED_UNICODE);
    }

    public function apiDeletePayment()
    {
        header('Content-Type: application/json; charset=utf-8');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        if (!$id) { echo json_encode(['success' => false, 'message' => 'Thiếu ID.']); return; }
        echo json_encode($this->service->deletePayment($id), JSON_UNESCAPED_UNICODE);
    }

    // ==================== API: Bank ====================
    public function apiSaveBank()
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
            $data = $_POST;

            // Handle QR upload
            if (isset($_FILES['qr_image']) && $_FILES['qr_image']['error'] === UPLOAD_ERR_OK) {
                // Save bank first to get ID
                if (!$id) {
                    $result = $this->service->saveBank($data);
                    if (!$result['success']) { echo json_encode($result, JSON_UNESCAPED_UNICODE); return; }
                    $id = $result['id'];
                }
                $qrUrl = $this->service->uploadBankQr($_FILES['qr_image'], $id);
                $data['qr_image'] = $qrUrl;
                // Update with QR
                $this->service->saveBank($data, $id);
                echo json_encode(['success' => true, 'message' => 'Đã lưu tài khoản ngân hàng.', 'id' => $id], JSON_UNESCAPED_UNICODE);
            } else {
                $result = $this->service->saveBank($data, $id);
                echo json_encode($result, JSON_UNESCAPED_UNICODE);
            }
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }

    public function apiDeleteBank()
    {
        header('Content-Type: application/json; charset=utf-8');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        if (!$id) { echo json_encode(['success' => false, 'message' => 'Thiếu ID.']); return; }
        echo json_encode($this->service->deleteBank($id), JSON_UNESCAPED_UNICODE);
    }

    public function apiSetDefaultBank()
    {
        header('Content-Type: application/json; charset=utf-8');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        if (!$id) { echo json_encode(['success' => false, 'message' => 'Thiếu ID.']); return; }
        echo json_encode($this->service->setDefaultBank($id), JSON_UNESCAPED_UNICODE);
    }

    public function apiToggleBank()
    {
        header('Content-Type: application/json; charset=utf-8');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        if (!$id) { echo json_encode(['success' => false, 'message' => 'Thiếu ID.']); return; }
        echo json_encode($this->service->toggleBank($id), JSON_UNESCAPED_UNICODE);
    }

    // ==================== API: Shipping ====================
    public function apiSaveShipping()
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
            $result = $this->service->saveShipping($_POST, $id);
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }

    public function apiToggleShipping()
    {
        header('Content-Type: application/json; charset=utf-8');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        if (!$id) { echo json_encode(['success' => false, 'message' => 'Thiếu ID.']); return; }
        echo json_encode($this->service->toggleShipping($id), JSON_UNESCAPED_UNICODE);
    }

    public function apiDeleteShipping()
    {
        header('Content-Type: application/json; charset=utf-8');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        if (!$id) { echo json_encode(['success' => false, 'message' => 'Thiếu ID.']); return; }
        echo json_encode($this->service->deleteShipping($id), JSON_UNESCAPED_UNICODE);
    }

    // ==================== API: Zone ====================
    public function apiSaveZone()
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
            $result = $this->service->saveZone($_POST, $id);
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }

    public function apiDeleteZone()
    {
        header('Content-Type: application/json; charset=utf-8');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        if (!$id) { echo json_encode(['success' => false, 'message' => 'Thiếu ID.']); return; }
        echo json_encode($this->service->deleteZone($id), JSON_UNESCAPED_UNICODE);
    }

    // ==================== API: Freeship ====================
    public function apiSaveFreeship()
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $id = !empty($_POST['id']) ? (int)$_POST['id'] : null;
            $result = $this->service->saveFreeship($_POST, $id);
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }

    public function apiDeleteFreeship()
    {
        header('Content-Type: application/json; charset=utf-8');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        if (!$id) { echo json_encode(['success' => false, 'message' => 'Thiếu ID.']); return; }
        echo json_encode($this->service->deleteFreeship($id), JSON_UNESCAPED_UNICODE);
    }

    public function apiToggleFreeship()
    {
        header('Content-Type: application/json; charset=utf-8');
        $input = json_decode(file_get_contents('php://input'), true);
        $id = (int)($input['id'] ?? 0);
        if (!$id) { echo json_encode(['success' => false, 'message' => 'Thiếu ID.']); return; }
        echo json_encode($this->service->toggleFreeship($id), JSON_UNESCAPED_UNICODE);
    }
}
