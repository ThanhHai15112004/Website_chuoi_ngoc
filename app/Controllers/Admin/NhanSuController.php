<?php

namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\NhanSuModel;
use Exception;

class NhanSuController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new NhanSuModel();
    }

    /**
     * Trang danh sách nhân sự
     */
    public function index()
    {
        $tab     = $_GET['tab'] ?? 'all';
        $vaiTro  = $_GET['vai_tro'] ?? '';
        $dangNhap = $_GET['dang_nhap'] ?? '';
        $search  = $_GET['search'] ?? '';
        $page    = max(1, (int)($_GET['page'] ?? 1));
        $limit   = 10;
        $offset  = ($page - 1) * $limit;

        $result = $this->model->layDanhSach([
            'tab'      => $tab,
            'vai_tro'  => $vaiTro,
            'dang_nhap' => $dangNhap,
            'search'   => $search,
        ], $limit, $offset);

        $staffs     = $result['data'];
        $total      = $result['total'];
        $totalPages = max(1, ceil($total / $limit));
        $stats      = $this->model->thongKe();

        $this->view('admin_nhan_su', [
            'title'        => 'Quản lý nhân sự',
            'current_page' => 'nhan_su',
            'staffs'       => $staffs,
            'stats'        => $stats,
            'total'        => $total,
            'page'         => $page,
            'totalPages'   => $totalPages,
            'limit'        => $limit,
            'tab'          => $tab,
            'vai_tro'      => $vaiTro,
            'dang_nhap'    => $dangNhap,
            'search'       => $search,
        ], 'admin');
    }

    /**
     * Form thêm mới
     */
    public function taoMoi()
    {
        $maNV = $this->model->taoMaNV();
        $this->view('admin_nhan_su_form', [
            'title'        => 'Thêm nhân viên',
            'current_page' => 'nhan_su',
            'staff'        => null,
            'quyen'        => [],
            'mode'         => 'create',
            'ma_nv_moi'    => $maNV,
        ], 'admin');
    }

    /**
     * Trang chi tiết nhân viên
     */
    public function chiTiet($id)
    {
        $staff = $this->model->layChiTiet($id);
        if (!$staff) {
            header('Location: ' . APP_URL . '/admin/nhan-su');
            exit;
        }

        $quyen           = $this->model->layQuyen($id);
        $lichSu          = $this->model->layLichSu($id);
        $lichSuDangNhap  = $this->model->layLichSuDangNhap($id);

        $this->view('admin_nhan_su_view', [
            'title'            => 'Chi tiết nhân viên',
            'current_page'     => 'nhan_su',
            'staff'            => $staff,
            'quyen'            => $quyen,
            'lichSu'           => $lichSu,
            'lichSuDangNhap'   => $lichSuDangNhap,
            'id'               => $id,
        ], 'admin');
    }

    /**
     * Form sửa nhân viên
     */
    public function trangCapNhat($id)
    {
        $staff = $this->model->layChiTiet($id);
        if (!$staff) {
            header('Location: ' . APP_URL . '/admin/nhan-su');
            exit;
        }

        $quyen = $this->model->layQuyen($id);

        $this->view('admin_nhan_su_form', [
            'title'        => 'Sửa thông tin nhân viên',
            'current_page' => 'nhan_su',
            'staff'        => $staff,
            'quyen'        => $quyen,
            'mode'         => 'edit',
            'id'           => $id,
        ], 'admin');
    }

    /**
     * Trang vai trò (giữ nguyên)
     */
    public function roles()
    {
        $this->view('admin_vai_tro', [
            'title'        => 'Quản lý vai trò',
            'current_page' => 'nhan_su'
        ], 'admin');
    }

    /**
     * API Lưu nhân viên (thêm/sửa)
     */
    public function apiLuu()
    {
        header('Content-Type: application/json');
        try {
            $id      = $_POST['id'] ?? '';
            $isEdit  = !empty($id);
            $hoTen   = trim($_POST['ho_ten'] ?? '');
            $email   = trim($_POST['email'] ?? '');
            $maNV    = trim($_POST['ma_nv'] ?? '');
            $dienThoai = trim($_POST['dien_thoai'] ?? '');
            $vaiTro  = $_POST['vai_tro'] ?? 'Nhân viên bán hàng';
            $phongBan = trim($_POST['phong_ban'] ?? '');
            $trangThai = $_POST['trang_thai'] ?? 'cho_kich_hoat';
            $ngaySinh = $_POST['ngay_sinh'] ?? '';
            $diaChi  = trim($_POST['dia_chi'] ?? '');
            $ghiChu  = trim($_POST['ghi_chu'] ?? '');
            $matKhau = $_POST['mat_khau'] ?? 'AutoPass123!';
            $yeuCauDoiMK = isset($_POST['yeu_cau_doi_mk']) ? 1 : 0;
            $ngayVaoLam = $_POST['ngay_vao_lam'] ?? '';

            if (empty($hoTen)) throw new Exception('Vui lòng nhập họ tên.');
            if (empty($email)) throw new Exception('Vui lòng nhập email.');

            $excludeId = $isEdit ? $id : null;
            if ($this->model->kiemTraEmail($email, $excludeId)) {
                throw new Exception('Email "' . $email . '" đã tồn tại.');
            }

            if (empty($maNV) && !$isEdit) {
                $maNV = $this->model->taoMaNV();
            }

            $nguoi = $_SESSION['admin_name'] ?? 'Admin';

            $data = [
                'ho_ten'        => $hoTen,
                'email'         => $email,
                'dien_thoai'    => $dienThoai ?: null,
                'vai_tro'       => $vaiTro,
                'phong_ban'     => $phongBan ?: null,
                'trang_thai'    => $trangThai,
                'ngay_sinh'     => $ngaySinh ?: null,
                'dia_chi'       => $diaChi ?: null,
                'ghi_chu'       => $ghiChu ?: null,
                'yeu_cau_doi_mk' => $yeuCauDoiMK,
                'ngay_vao_lam'  => $ngayVaoLam ?: null,
                'nguoi_cap_nhat' => $nguoi,
            ];

            if ($isEdit) {
                $this->model->capNhat($id, $data);

                $this->model->themLichSu([
                    'id_nhan_vien'    => $id,
                    'hanh_dong'       => 'Cập nhật thông tin',
                    'mo_ta'           => 'Cập nhật thông tin nhân viên "' . $hoTen . '"',
                    'nguoi_thuc_hien' => $nguoi,
                ]);

                // Cập nhật quyền nếu có
                $this->luuQuyen($id);

                echo json_encode(['success' => true, 'message' => 'Cập nhật thành công!', 'id' => $id]);
            } else {
                $data['ma_nv'] = $maNV;
                $data['mat_khau'] = $matKhau;
                $data['nguoi_tao'] = $nguoi;
                $newId = $this->model->themMoi($data);

                $this->model->themLichSu([
                    'id_nhan_vien'    => $newId,
                    'hanh_dong'       => 'Tạo tài khoản',
                    'mo_ta'           => 'Tạo tài khoản nhân viên "' . $hoTen . '" (' . $maNV . ')',
                    'nguoi_thuc_hien' => $nguoi,
                ]);

                // Lưu quyền
                $this->luuQuyen($newId);

                echo json_encode(['success' => true, 'message' => 'Thêm nhân viên thành công!', 'id' => $newId]);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * Helper: Lưu quyền từ POST
     */
    private function luuQuyen($idNV)
    {
        $modules = ['Dashboard & Thống kê', 'Sản phẩm & Danh mục', 'Đơn hàng & Thanh toán', 'Quản lý Kho', 'Cấu hình & Nhân sự'];
        $quyenArr = [];

        foreach ($modules as $i => $module) {
            $key = 'perm_' . $i;
            $quyenArr[] = [
                'module'   => $module,
                'xem'      => isset($_POST[$key . '_xem']) ? 1 : 0,
                'them'     => isset($_POST[$key . '_them']) ? 1 : 0,
                'sua'      => isset($_POST[$key . '_sua']) ? 1 : 0,
                'xoa'      => isset($_POST[$key . '_xoa']) ? 1 : 0,
                'dac_biet' => isset($_POST[$key . '_dac_biet']) ? 1 : 0,
            ];
        }

        $this->model->capNhatQuyen($idNV, $quyenArr);
    }

    /**
     * API Xóa 1
     */
    public function apiXoa()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? '';
            if (!$id) throw new Exception("Không tìm thấy ID.");

            $staff = $this->model->layChiTiet($id);
            if ($staff && $staff['vai_tro'] === 'Super Admin') {
                throw new Exception("Không thể xóa tài khoản Super Admin.");
            }

            $this->model->xoa($id);
            echo json_encode(['success' => true, 'message' => 'Xóa nhân viên thành công.']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Xóa nhiều
     */
    public function apiXoaNhieu()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $ids = $input['ids'] ?? [];
            if (empty($ids)) throw new Exception("Chưa chọn nhân viên.");

            $this->model->xoaNhieu($ids);
            echo json_encode(['success' => true, 'message' => 'Đã xóa ' . count($ids) . ' nhân viên.']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Đổi trạng thái (khóa/mở/kích hoạt)
     */
    public function apiTrangThai()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? '';
            $trangThai = $input['trang_thai'] ?? '';
            $lyDo = $input['ly_do'] ?? '';
            if (!$id || !$trangThai) throw new Exception("Dữ liệu không hợp lệ.");

            $this->model->doiTrangThai($id, $trangThai, $lyDo);

            $nguoi = $_SESSION['admin_name'] ?? 'Admin';
            $tenTT = NhanSuModel::tenTrangThai($trangThai);
            $this->model->themLichSu([
                'id_nhan_vien'    => $id,
                'hanh_dong'       => $trangThai === 'bi_khoa' ? 'Khóa tài khoản' : ($trangThai === 'hoat_dong' ? 'Mở khóa tài khoản' : 'Kích hoạt tài khoản'),
                'mo_ta'           => $lyDo ?: 'Chuyển trạng thái → ' . $tenTT,
                'nguoi_thuc_hien' => $nguoi,
            ]);

            echo json_encode(['success' => true, 'message' => 'Cập nhật trạng thái → ' . $tenTT]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Đổi trạng thái nhiều
     */
    public function apiTrangThaiNhieu()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $ids = $input['ids'] ?? [];
            $trangThai = $input['trang_thai'] ?? '';
            if (empty($ids) || !$trangThai) throw new Exception("Dữ liệu không hợp lệ.");

            $this->model->doiTrangThaiNhieu($ids, $trangThai);
            echo json_encode(['success' => true, 'message' => 'Đã cập nhật ' . count($ids) . ' nhân viên.']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Đặt lại mật khẩu
     */
    public function apiDatLaiMatKhau()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? '';
            $method = $input['method'] ?? 'temp';
            if (!$id) throw new Exception("Không tìm thấy ID.");

            $newPass = $this->model->datLaiMatKhau($id);

            $nguoi = $_SESSION['admin_name'] ?? 'Admin';
            $this->model->themLichSu([
                'id_nhan_vien'    => $id,
                'hanh_dong'       => 'Đặt lại mật khẩu',
                'mo_ta'           => 'Mật khẩu đã được đặt lại bởi Admin',
                'nguoi_thuc_hien' => $nguoi,
            ]);

            $msg = ($method === 'email') 
                ? 'Đã gửi link đặt lại mật khẩu qua email.' 
                : 'Mật khẩu tạm thời: ' . $newPass;

            echo json_encode(['success' => true, 'message' => $msg, 'temp_password' => ($method === 'temp' ? $newPass : null)]);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Chi tiết (JSON cho quick view)
     */
    public function apiChiTiet($id)
    {
        header('Content-Type: application/json');
        try {
            $staff = $this->model->layChiTiet($id);
            if (!$staff) throw new Exception("Không tìm thấy nhân viên.");

            $quyen          = $this->model->layQuyen($id);
            $lichSu         = $this->model->layLichSu($id, 10);
            $lichSuDangNhap = $this->model->layLichSuDangNhap($id, 10);
            $permissions    = $this->model->layQuyenChinh($id);

            echo json_encode([
                'success'           => true,
                'staff'             => $staff,
                'quyen'             => $quyen,
                'permissions'       => $permissions,
                'lich_su'           => $lichSu,
                'lich_su_dang_nhap' => $lichSuDangNhap,
                'trang_thai_text'   => NhanSuModel::tenTrangThai($staff['trang_thai']),
            ], JSON_UNESCAPED_UNICODE);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    /**
     * API Cập nhật quyền
     */
    public function apiCapNhatQuyen()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? '';
            $quyen = $input['quyen'] ?? [];
            if (!$id) throw new Exception("Không tìm thấy ID.");

            $this->model->capNhatQuyen($id, $quyen);

            $nguoi = $_SESSION['admin_name'] ?? 'Admin';
            $this->model->themLichSu([
                'id_nhan_vien'    => $id,
                'hanh_dong'       => 'Cập nhật phân quyền',
                'mo_ta'           => 'Cập nhật ma trận quyền',
                'nguoi_thuc_hien' => $nguoi,
            ]);

            echo json_encode(['success' => true, 'message' => 'Cập nhật quyền thành công.']);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
