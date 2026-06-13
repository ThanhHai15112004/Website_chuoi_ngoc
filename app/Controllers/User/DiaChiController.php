<?php
namespace App\Controllers\User;

use App\Core\Controller;
use App\Models\User\SoDiaChiModel;

class DiaChiController extends Controller
{
    private $soDiaChiModel;

    public function __construct()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(['success' => false, 'message' => 'Vui lòng đăng nhập.']);
            exit;
        }
        $this->soDiaChiModel = new SoDiaChiModel();
    }

    /**
     * Lấy danh sách địa chỉ của user hiện tại
     */
    public function getList()
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $userId = $_SESSION['user_id'];
            $addresses = $this->soDiaChiModel->getAllByUserId($userId);
            echo json_encode(['success' => true, 'data' => $addresses]);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Thêm địa chỉ mới
     */
    public function add()
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
            
            $ho_ten = trim($data['ho_ten'] ?? '');
            $sdt = trim($data['so_dien_thoai'] ?? '');
            $tinh_thanh = trim($data['tinh_thanh'] ?? '');
            $quan_huyen = trim($data['quan_huyen'] ?? '');
            $phuong_xa = trim($data['phuong_xa'] ?? '');
            $dia_chi_cu_the = trim($data['dia_chi_cu_the'] ?? '');
            $la_mac_dinh = !empty($data['la_mac_dinh']) ? 1 : 0;

            if (!$ho_ten || !$sdt || !$tinh_thanh || !$quan_huyen || !$phuong_xa || !$dia_chi_cu_the) {
                echo json_encode(['success' => false, 'message' => 'Vui lòng điền đầy đủ thông tin.']);
                return;
            }

            $userId = $_SESSION['user_id'];

            $id = $this->soDiaChiModel->add([
                'id_nguoi_dung' => $userId,
                'ho_ten' => $ho_ten,
                'so_dien_thoai' => $sdt,
                'tinh_thanh' => $tinh_thanh,
                'quan_huyen' => $quan_huyen,
                'phuong_xa' => $phuong_xa,
                'dia_chi_cu_the' => $dia_chi_cu_the,
                'la_mac_dinh' => $la_mac_dinh
            ]);

            if ($id) {
                // Trả về địa chỉ vừa tạo để update UI
                $newAddress = $this->soDiaChiModel->getById($id, $userId);
                echo json_encode(['success' => true, 'message' => 'Thêm địa chỉ thành công.', 'data' => $newAddress]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Thêm địa chỉ thất bại.']);
            }
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Cập nhật địa chỉ
     */
    public function update()
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
            
            $id = trim($data['id'] ?? '');
            if (!$id) {
                echo json_encode(['success' => false, 'message' => 'Mã địa chỉ không hợp lệ.']);
                return;
            }

            $ho_ten = trim($data['ho_ten'] ?? '');
            $sdt = trim($data['so_dien_thoai'] ?? '');
            $tinh_thanh = trim($data['tinh_thanh'] ?? '');
            $quan_huyen = trim($data['quan_huyen'] ?? '');
            $phuong_xa = trim($data['phuong_xa'] ?? '');
            $dia_chi_cu_the = trim($data['dia_chi_cu_the'] ?? '');
            $la_mac_dinh = !empty($data['la_mac_dinh']) ? 1 : 0;

            if (!$ho_ten || !$sdt || !$tinh_thanh || !$quan_huyen || !$phuong_xa || !$dia_chi_cu_the) {
                echo json_encode(['success' => false, 'message' => 'Vui lòng điền đầy đủ thông tin.']);
                return;
            }

            $userId = $_SESSION['user_id'];

            $success = $this->soDiaChiModel->update($id, $userId, [
                'ho_ten' => $ho_ten,
                'so_dien_thoai' => $sdt,
                'tinh_thanh' => $tinh_thanh,
                'quan_huyen' => $quan_huyen,
                'phuong_xa' => $phuong_xa,
                'dia_chi_cu_the' => $dia_chi_cu_the,
                'la_mac_dinh' => $la_mac_dinh
            ]);

            if ($success) {
                $updatedAddress = $this->soDiaChiModel->getById($id, $userId);
                echo json_encode(['success' => true, 'message' => 'Cập nhật địa chỉ thành công.', 'data' => $updatedAddress]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Cập nhật thất bại.']);
            }
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Set mặc định
     */
    public function setDefault()
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
            $id = trim($data['id'] ?? '');
            $userId = $_SESSION['user_id'];

            if ($this->soDiaChiModel->setDefault($id, $userId)) {
                echo json_encode(['success' => true, 'message' => 'Đã đặt làm mặc định.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Thao tác thất bại.']);
            }
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Xóa địa chỉ
     */
    public function delete()
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $data = json_decode(file_get_contents('php://input'), true) ?? $_POST;
            $id = trim($data['id'] ?? '');
            $userId = $_SESSION['user_id'];

            if ($this->soDiaChiModel->delete($id, $userId)) {
                echo json_encode(['success' => true, 'message' => 'Đã xóa địa chỉ.']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Xóa thất bại.']);
            }
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
