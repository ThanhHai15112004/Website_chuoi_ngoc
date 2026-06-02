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
     * API: Lấy danh sách sản phẩm tại một vị trí
     */
    public function apiSanPhamTaiViTri($idViTri)
    {
        error_log("apiSanPhamTaiViTri called with ID: " . $idViTri);
        $danhSach = $this->service->laySanPhamTaiViTri($idViTri);
        error_log("Returned " . count($danhSach) . " items");
        echo json_encode(['success' => true, 'data' => $danhSach]);
    }

    /**
     * API: Lấy danh sách vị trí hợp lệ (để nhập kho)
     */
    public function apiDanhSachViTriHople()
    {
        $khuVucModel = new \App\Models\Admin\KhuVucKhoModel();
        $db = \App\Core\Database::getInstance()->getConnection();
        $sql = "SELECT kv.id, kv.ten_vi_tri, kv.ma_vi_tri, kv.cap_do, k.ten_kho 
                FROM khu_vuc_kho kv
                JOIN kho_hang k ON kv.id_kho = k.id
                WHERE kv.cap_do IN ('ke', 'ngan') AND k.trang_thai = 1
                ORDER BY k.ten_kho, kv.ten_vi_tri";
        $stmt = $db->query($sql);
        $danhSach = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode(['success' => true, 'data' => $danhSach]);
    }

    /**
     * API: Lấy danh sách vị trí hợp lệ cho 1 kho cụ thể (để nhận hàng thuyên chuyển)
     */
    public function apiDanhSachViTriTheoKho($idKho)
    {
        $db = \App\Core\Database::getInstance()->getConnection();
        $sql = "SELECT id, ten_vi_tri, cap_do
                FROM khu_vuc_kho 
                WHERE id_kho = ? AND cap_do IN ('ke', 'ngan')
                ORDER BY ten_vi_tri";
        $stmt = $db->prepare($sql);
        $stmt->execute([$idKho]);
        $danhSach = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        echo json_encode(['success' => true, 'data' => $danhSach]);
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

    /**
     * API: Lấy dữ liệu phân quyền kho
     */
    public function apiPhanQuyenKho()
    {
        $idKho = $_GET['id_kho'] ?? null;
        if (!$idKho) {
            echo json_encode(['success' => false, 'message' => 'Thiếu ID kho.']);
            return;
        }
        $quyen = $this->service->layPhanQuyenTheoKho($idKho);
        $nhanVienMoi = $this->service->layNhanVienChuaPhanQuyen($idKho);
        
        echo json_encode([
            'success' => true,
            'quyen' => $quyen,
            'nhan_vien_moi' => $nhanVienMoi
        ]);
    }

    /**
     * API: Lưu phân quyền kho
     */
    public function luuPhanQuyen()
    {
        $idKho = $_POST['id_kho'] ?? null;
        $idNhanVien = $_POST['id_nguoi_dung'] ?? null;
        $quyen = $_POST['quyen'] ?? [];

        if (!$idKho || !$idNhanVien) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ.']);
            return;
        }

        $result = $this->service->luuPhanQuyen($idKho, $idNhanVien, $quyen);
        echo json_encode(['success' => $result]);
    }

    /**
     * API: Lưu lịch kiểm kê
     */
    public function luuLichKiemKe()
    {
        $data = $_POST;
        if (empty($data['id_kho']) || empty($data['ten_lich'])) {
            echo json_encode(['success' => false, 'message' => 'Vui lòng nhập đủ thông tin.']);
            return;
        }
        $result = $this->service->themLichKiemKe($data);
        echo json_encode(['success' => $result]);
    }

    /**
     * API: Xóa lịch kiểm kê
     */
    public function xoaLichKiemKe($id)
    {
        $result = $this->service->xoaLichKiemKe($id);
        echo json_encode(['success' => $result]);
    }

    /**
     * API: Đổi trạng thái lịch kiểm kê
     */
    public function doiTrangThaiLich($id)
    {
        // Giả sử có hàm này trong service, nếu không thì tạm trả về true
        $db = \App\Core\Database::getInstance()->getConnection();
        $stmt = $db->prepare("UPDATE lich_kiem_ke SET trang_thai = 1 - trang_thai WHERE id = ?");
        $result = $stmt->execute([$id]);
        echo json_encode(['success' => $result]);
    }
}
