<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class DonHangController extends Controller
{
    private $donHangModel;

    public function __construct()
    {
        $this->donHangModel = new \App\Models\DonHangModel();
    }

    public function index()
    {
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 20;
        $offset = ($page - 1) * $limit;

        $filters = [
            'keyword' => $_GET['keyword'] ?? '',
            'trang_thai_don_hang' => isset($_GET['trang_thai']) && $_GET['trang_thai'] !== '' ? (int)$_GET['trang_thai'] : '',
            'thoi_gian' => $_GET['thoi_gian'] ?? '',
            'thanh_toan' => isset($_GET['thanh_toan']) && $_GET['thanh_toan'] !== '' ? (int)$_GET['thanh_toan'] : '',
            'hinh_thuc' => $_GET['hinh_thuc'] ?? '',
        ];

        $don_hang_list = $this->donHangModel->layDanhSach($filters, $limit, $offset);
        $total = $this->donHangModel->demDanhSach($filters);
        $stats = $this->donHangModel->layThongKe();

        $data = [
            'tieu_de' => 'Quản lý đơn hàng - Admin',
            'current_page' => 'don_hang',
            'stats' => $stats,
            'don_hang_list' => $don_hang_list,
            'pagination' => [
                'current' => $page,
                'limit' => $limit,
                'total_records' => $total,
                'total_pages' => ceil($total / $limit)
            ]
        ];

        $this->view('admin_don_hang', $data, 'admin');
    }

    public function chiTiet($id)
    {
        $don_hang = $this->donHangModel->layChiTiet($id);
        if (!$don_hang) {
            header('Location: ' . APP_URL . '/admin/don-hang');
            exit;
        }

        $don_hang['san_pham'] = $this->donHangModel->laySanPhamDonHang($id);
        $don_hang['lich_su'] = $this->donHangModel->layLichSuDonHang($id);

        $data = [
            'tieu_de' => 'Chi tiết đơn hàng ' . $don_hang['ma_don_hang'] . ' - Admin',
            'current_page' => 'don_hang',
            'don_hang' => $don_hang
        ];

        $this->view('admin_don_hang_chi_tiet', $data, 'admin');
    }

    public function apiCapNhatTrangThai($id)
    {
        header('Content-Type: application/json');
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $trangThai = $data['trang_thai'] ?? null;
            $lyDo = $data['ly_do'] ?? '';

            if ($trangThai === null) {
                echo json_encode(['success' => false, 'message' => 'Trạng thái không hợp lệ']);
                return;
            }

            $success = $this->donHangModel->capNhatTrangThai($id, $trangThai, $lyDo);
            if ($success) {
                echo json_encode(['success' => true, 'message' => 'Cập nhật trạng thái thành công']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Có lỗi xảy ra khi cập nhật']);
            }
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function apiCapNhatThanhToan($id)
    {
        header('Content-Type: application/json');
        try {
            $data = json_decode(file_get_contents('php://input'), true);
            $trangThai = $data['trang_thai'] ?? null;

            if ($trangThai === null) {
                echo json_encode(['success' => false, 'message' => 'Trạng thái thanh toán không hợp lệ']);
                return;
            }

            $success = $this->donHangModel->capNhatThanhToan($id, $trangThai);
            if ($success) {
                echo json_encode(['success' => true, 'message' => 'Cập nhật trạng thái thanh toán thành công']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Lỗi khi cập nhật thanh toán']);
            }
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function taoMoi()
    {
        $data = [
            'tieu_de' => 'Tạo đơn hàng mới (POS)',
            'current_page' => 'don_hang'
        ];
        $this->view('admin_don_hang_tao', $data, 'admin');
    }

    public function luuMoi()
    {
        header('Content-Type: application/json');
        
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (empty($input) || empty($input['products'])) {
            echo json_encode(['success' => false, 'message' => 'Giỏ hàng trống!']);
            return;
        }
        if (empty($input['id_khach_hang'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng chọn khách hàng!']);
            return;
        }

        $donHangModel = new \App\Models\DonHangModel();
        
        try {
            $result = $donHangModel->taoDonHang($input);
            if ($result['success']) {
                echo json_encode(['success' => true, 'message' => 'Tạo đơn hàng thành công!', 'id_don_hang' => $result['id_don_hang']]);
            } else {
                echo json_encode(['success' => false, 'message' => $result['message']]);
            }
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
        }
    }
}
