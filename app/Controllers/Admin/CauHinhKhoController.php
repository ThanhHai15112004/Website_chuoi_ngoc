<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Services\Admin\CauHinhKhoService;

class CauHinhKhoController extends Controller
{
    private $service;

    public function __construct()
    {
        $this->service = new CauHinhKhoService();
    }

    /**
     * Trang chính - Danh sách kho + Tabs
     */
    public function index()
    {
        $stats = $this->service->thongKe();
        $danhSachKho = $this->service->layDanhSachKho();
        $treeKhuVuc = $this->service->layTreeKhuVuc();
        $cauHinh = $this->service->layCauHinh();
        $danhSachKhoSelect = $this->service->layDanhSachKhoChoSelect();

        // Lịch kiểm kê, Nhân viên, Nhật ký thật từ CSDL
        $danhSachLich = $this->service->layDanhSachLichKiemKe();
        $danhSachNhanVien = $this->service->layNhanVien();
        $nhatKy = $this->service->layNhatKyHoatDong();

        $this->view('admin_cau_hinh_kho', [
            'current_page' => 'cau_hinh_kho',
            'stats' => $stats,
            'danhSachKho' => $danhSachKho,
            'treeKhuVuc' => $treeKhuVuc,
            'nhatKy' => $nhatKy,
            'cauHinh' => $cauHinh,
            'danhSachKhoSelect' => $danhSachKhoSelect,
            'danhSachLich' => $danhSachLich,
            'danhSachNhanVien' => $danhSachNhanVien
        ], 'admin');
    }

    /**
     * Form Thêm kho mới
     */
    public function taoMoi()
    {
        $nhanVien = $this->service->layNhanVien();

        $this->view('admin_cau_hinh_kho_them', [
            'current_page' => 'cau_hinh_kho',
            'isEdit' => false,
            'nhanVien' => $nhanVien,
            'kho' => null
        ], 'admin');
    }

    /**
     * Form Sửa kho
     */
    public function trangCapNhat($id)
    {
        $kho = $this->service->chiTietKho($id);
        if (!$kho) {
            header('Location: ' . APP_URL . '/admin/cau-hinh-kho');
            exit;
        }

        $nhanVien = $this->service->layNhanVien();

        $this->view('admin_cau_hinh_kho_them', [
            'current_page' => 'cau_hinh_kho',
            'isEdit' => true,
            'khoId' => $id,
            'kho' => $kho,
            'nhanVien' => $nhanVien
        ], 'admin');
    }

    /**
     * API: Lưu kho mới (POST JSON)
     */
    public function luuMoi()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data || empty($data['ten_kho'])) {
            echo json_encode(['success' => false, 'message' => 'Thiếu thông tin bắt buộc.']);
            return;
        }

        $result = $this->service->themKho($data);
        echo json_encode($result);
    }

    /**
     * API: Cập nhật kho (POST JSON)
     */
    public function capNhat($id)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data || empty($data['ten_kho'])) {
            echo json_encode(['success' => false, 'message' => 'Thiếu thông tin bắt buộc.']);
            return;
        }

        $result = $this->service->capNhatKho($id, $data);
        echo json_encode($result);
    }

    /**
     * API: Đổi trạng thái kho (POST JSON)
     */
    public function doiTrangThai($id)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $trangThai = $data['trang_thai'] ?? null;

        if ($trangThai === null) {
            echo json_encode(['success' => false, 'message' => 'Thiếu trạng thái.']);
            return;
        }

        $result = $this->service->doiTrangThai($id, (int)$trangThai);
        echo json_encode($result);
    }

    /**
     * API: Đặt kho mặc định
     */
    public function datMacDinh($id)
    {
        $result = $this->service->datMacDinh($id);
        echo json_encode($result);
    }

    /**
     * API: Chi tiết kho (JSON - cho Drawer)
     */
    public function apiChiTiet($id)
    {
        $kho = $this->service->chiTietKho($id);
        if (!$kho) {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy kho.']);
            return;
        }
        echo json_encode(['success' => true, 'data' => $kho]);
    }

    /**
     * API: Lưu vị trí khu vực (POST JSON)
     */
    public function luuViTri()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
            return;
        }

        $result = $this->service->themViTri($data);
        echo json_encode($result);
    }

    /**
     * API: Xóa vị trí khu vực
     */
    public function xoaViTri($id)
    {
        $result = $this->service->xoaViTri($id);
        echo json_encode($result);
    }

    /**
     * API: Lưu cấu hình quy tắc & cảnh báo (POST JSON)
     */
    public function luuCauHinh()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
            return;
        }

        $result = $this->service->luuCauHinh($data);
        echo json_encode($result);
    }
}
