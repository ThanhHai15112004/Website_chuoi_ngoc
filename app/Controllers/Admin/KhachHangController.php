<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class KhachHangController extends Controller
{
    public function index()
    {
        $service = new \App\Services\Admin\KhachHangService();
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        if ($page < 1) $page = 1;
        
        $limit = 20;
        $filters = $_GET;
        
        $dataResponse = $service->getAdminCustomerData($filters, $page, $limit);
        $thong_ke = $service->layThongKe();

        $data = [
            'tieu_de' => 'Quản lý Khách Hàng',
            'current_page' => 'khach_hang',
            'customers' => $dataResponse['list'],
            'pagination' => $dataResponse['pagination'],
            'thong_ke' => $thong_ke
        ];

        $this->view('admin_khach_hang', $data, 'admin');
    }


    public function taoMoi()
    {
        $rankModel = new \App\Models\HangThanhVienModel();
        $ranks = $rankModel->layTatCa();

        $data = [
            'current_page' => 'them_khach_hang',
            'tieu_de' => 'Thêm khách hàng mới - Admin',
            'ranks' => $ranks
        ];
        $this->view('admin_khach_hang_them', $data, 'admin');
    }

    public function ranks()
    {
        $service = new \App\Services\Admin\HangThanhVienService();
        $ranks = $service->layDuLieuHang();
        $history = $service->layLichSuHang();
        $khach_sap_len_hang = $service->layNguoiDungGanLenHang();

        $voucherModel = new \App\Models\VoucherModel();
        $vouchers = $voucherModel->getActiveVouchers();

        $data = [
            'current_page' => 'hang_thanh_vien',
            'tieu_de' => 'Quản lý hạng thành viên - Admin',
            'ranks' => $ranks,
            'history' => $history,
            'khach_sap_len_hang' => $khach_sap_len_hang,
            'vouchers' => $vouchers
        ];
        $this->view('admin_hang_thanh_vien', $data, 'admin');
    }

    public function apiDetailRank($id)
    {
        header('Content-Type: application/json');
        $model = new \App\Models\HangThanhVienModel();
        $rank = $model->timTheoId($id);
        
        if ($rank) {
            echo json_encode([
                'success' => true, 
                'data' => [
                    'id' => $rank['id'],
                    'ten_hang' => $rank['ten_hang'],
                    'mo_ta' => $rank['mo_ta'],
                    'chi_tieu_toi_thieu' => (int)$rank['chi_tieu_toi_thieu'],
                    'phan_tram_giam' => (float)$rank['phan_tram_giam'],
                    'mau_sac' => $rank['mau_sac'] ?? 'yellow',
                    'dac_quyen' => $rank['dac_quyen'] ? json_decode($rank['dac_quyen'], true) : [],
                    'danh_sach_voucher' => $rank['danh_sach_voucher'] ? json_decode($rank['danh_sach_voucher'], true) : [],
                ]
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Không tìm thấy hạng']);
        }
    }

    public function chiTiet($ma_nd)
    {
        $model = new \App\Models\KhachHangModel();
        $kh_db = $model->findByMa($ma_nd);

        if (!$kh_db) {
            header('Location: ' . APP_URL . '/admin/khach-hang');
            exit;
        }

        $don_hangs = $model->getOrdersByUser($kh_db['id']);
        $vouchers = $model->getVouchersByUser($kh_db['id']);
        $logs = $model->getLogsByUser($kh_db['id']);

        // Format data to match the old view's expectations
        $khach_hang = [
            'id' => $kh_db['id'],
            'ma' => $kh_db['ma_nd'],
            'ten' => $kh_db['ho_ten'],
            'gioi_tinh' => $kh_db['gioi_tinh'] === 'nam' ? 'Nam' : ($kh_db['gioi_tinh'] === 'nu' ? 'Nữ' : 'Khác'),
            'ngay_sinh' => $kh_db['ngay_sinh'] ? date('d/m/Y', strtotime($kh_db['ngay_sinh'])) : 'Chưa cập nhật',
            'nam_sinh' => $kh_db['nam_sinh'] ?? '',
            'sdt' => $kh_db['so_dien_thoai'],
            'email' => $kh_db['email'],
            'hang' => $kh_db['ten_hang'] ?? 'Thành viên',
            'trang_thai' => $kh_db['trang_thai'] == 1 ? 'hoat_dong' : 'bi_khoa',
            'ngay_dang_ky' => date('d/m/Y', strtotime($kh_db['ngay_tao'])),
            'lan_dang_nhap_cuoi' => 'Chưa có dữ liệu',
            'tong_chi_tieu' => $kh_db['tong_chi_tieu'] ?? 0,
            'dieu_kien_hang_hien_tai' => 0,
            'muc_len_hang_tiep_theo' => 0,
            'tong_don' => count($don_hangs),
            'don_thanh_cong' => count(array_filter($don_hangs, fn($d) => $d['trang_thai_don_hang'] == 3)),
            'so_voucher' => count($vouchers),
            'so_yeu_thich' => 0,
            'so_danh_gia' => 0,
            'menh' => $kh_db['ten_menh'] ?? 'Chưa xác định',
            'mau_phu_hop' => [],
            'da_goi_y' => [],
            'ghi_chu_noibo' => !empty($kh_db['ghi_chu_vip']) ? [
                ['id' => 1, 'noi_dung' => $kh_db['ghi_chu_vip'], 'nguoi_tao' => 'Ghi chú VIP', 'thoi_gian' => date('d/m/Y')]
            ] : [],
            'dia_chi' => [],
            'don_hang' => array_map(function($d) {
                $status = 'Đang xử lý';
                if ($d['trang_thai_don_hang'] == 3) $status = 'Thành công';
                if ($d['trang_thai_don_hang'] == 4) $status = 'Đã hủy';
                return [
                    'id' => $d['id'],
                    'ma' => $d['ma'],
                    'ngay_dat' => date('d/m/Y', strtotime($d['ngay_tao'])),
                    'san_pham' => 'Sản phẩm trong đơn',
                    'tong_tien' => $d['tong_tien'],
                    'trang_thai' => $status
                ];
            }, $don_hangs),
            'voucher' => [],
            'yeu_thich' => [],
            'danh_gia' => [],
            'lich_su' => array_map(function($l) {
                return [
                    'loai' => 'activity',
                    'noi_dung' => $l['hanh_dong'] . ' - ' . $l['ghi_chu'],
                    'thoi_gian' => date('H:i d/m/Y', strtotime($l['ngay_tao']))
                ];
            }, $logs),
            'canh_bao' => []
        ];

        $data = [
            'current_page' => 'khach_hang',
            'tieu_de' => 'Chi tiết khách hàng - Admin',
            'id' => $kh_db['id'],
            'kh' => $khach_hang
        ];
        
        $this->view('admin_khach_hang_chi_tiet', $data, 'admin');
    }

    public function trangCapNhat($id)
    {
        $model = new \App\Models\KhachHangModel();
        $kh = $model->timTheoId($id);
        
        if (!$kh) {
            header('Location: ' . APP_URL . '/admin/khach-hang');
            exit;
        }

        $rankModel = new \App\Models\HangThanhVienModel();
        $ranks = $rankModel->layTatCa();

        $data = [
            'tieu_de' => 'Sửa khách hàng - Admin',
            'current_page' => 'khach_hang',
            'ranks' => $ranks,
            'kh' => $kh
        ];
        $this->view('admin_khach_hang_sua', $data, 'admin');
    }

    private function calculateMenh($namSinh) {
        if (!$namSinh) return null;
        
        $canList = [4 => 'Giáp', 5 => 'Ất', 6 => 'Bính', 7 => 'Đinh', 8 => 'Mậu', 9 => 'Kỷ', 0 => 'Canh', 1 => 'Tân', 2 => 'Nhâm', 3 => 'Quý'];
        $canValues = ['Giáp' => 1, 'Ất' => 1, 'Bính' => 2, 'Đinh' => 2, 'Mậu' => 3, 'Kỷ' => 3, 'Canh' => 4, 'Tân' => 4, 'Nhâm' => 5, 'Quý' => 5];
        
        $chiList = [4 => 'Tý', 5 => 'Sửu', 6 => 'Dần', 7 => 'Mão', 8 => 'Thìn', 9 => 'Tỵ', 10 => 'Ngọ', 11 => 'Mùi', 0 => 'Thân', 1 => 'Dậu', 2 => 'Tuất', 3 => 'Hợi'];
        $chiValues = ['Tý' => 0, 'Sửu' => 0, 'Ngọ' => 0, 'Mùi' => 0, 'Dần' => 1, 'Mão' => 1, 'Thân' => 1, 'Dậu' => 1, 'Thìn' => 2, 'Tỵ' => 2, 'Tuất' => 2, 'Hợi' => 2];
        
        $canIndex = $namSinh % 10;
        $chiIndex = $namSinh % 12;
        
        $canName = $canList[$canIndex] ?? '';
        $chiName = $chiList[$chiIndex] ?? '';
        
        if(!$canName || !$chiName) return null;

        $menhValue = $canValues[$canName] + $chiValues[$chiName];
        if ($menhValue > 5) $menhValue -= 5;
        
        $menhMap = [1 => 'Kim', 2 => 'Thủy', 3 => 'Hỏa', 4 => 'Thổ', 5 => 'Mộc'];
        $tenMenh = $menhMap[$menhValue] ?? null;

        if ($tenMenh) {
            $menhModel = new \App\Models\MenhPhongThuyModel();
            $menhRecord = $menhModel->timTheoTen($tenMenh);
            if ($menhRecord) return $menhRecord['id'];
        }
        return null;
    }

    public function luuMoi()
    {
        header('Content-Type: application/json');
        
        $ho_ten = $_POST['ho_ten'] ?? '';
        $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
        $email = $_POST['email'] ?? '';
        $gioi_tinh = $_POST['gioi_tinh'] ?? null;
        $ngay_sinh = !empty($_POST['ngay_sinh']) ? $_POST['ngay_sinh'] : null;
        $nam_sinh = $ngay_sinh ? (int)date('Y', strtotime($ngay_sinh)) : null;
        $id_hang_thanh_vien = !empty($_POST['id_hang_thanh_vien']) && $_POST['id_hang_thanh_vien'] !== 'none' ? $_POST['id_hang_thanh_vien'] : null;
        $trang_thai = $_POST['trang_thai'] === 'active' ? 1 : 0;
        $ghi_chu_vip = $_POST['ghi_chu_vip'] ?? '';
        $mat_khau_input = $_POST['mat_khau'] ?? '123456';

        if (empty($ho_ten) || empty($so_dien_thoai)) {
            echo json_encode(['success' => false, 'message' => 'Họ tên và số điện thoại là bắt buộc']);
            return;
        }

        $model = new \App\Models\KhachHangModel();
        
        $id = uniqid('kh_');
        $ma_nd = 'KH' . strtoupper(substr(uniqid(), -4));
        $id_menh = $this->calculateMenh($nam_sinh);
        $mat_khau = password_hash($mat_khau_input, PASSWORD_DEFAULT);
        
        $anh_dai_dien = null;
        if (isset($_FILES['anh_dai_dien']) && $_FILES['anh_dai_dien']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../../public/uploads/users/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            
            $ext = pathinfo($_FILES['anh_dai_dien']['name'], PATHINFO_EXTENSION);
            $fileName = $id . '.' . $ext;
            
            if (move_uploaded_file($_FILES['anh_dai_dien']['tmp_name'], $uploadDir . $fileName)) {
                $anh_dai_dien = '/uploads/users/' . $fileName;
            }
        }

        $data = [
            'id' => $id,
            'ma_nd' => $ma_nd,
            'ho_ten' => $ho_ten,
            'so_dien_thoai' => $so_dien_thoai,
            'email' => $email ? $email : "$ma_nd@noemail.com",
            'mat_khau' => $mat_khau,
            'gioi_tinh' => $gioi_tinh,
            'ngay_sinh' => $ngay_sinh,
            'nam_sinh' => $nam_sinh,
            'id_menh' => $id_menh,
            'id_hang_thanh_vien' => $id_hang_thanh_vien,
            'trang_thai' => $trang_thai,
            'ghi_chu_vip' => $ghi_chu_vip,
            'anh_dai_dien' => $anh_dai_dien,
            'id_vai_tro' => null
        ];

        try {
            $model->themMoi($data);
            
            $logModel = new \App\Models\NhatKyHoatDongModel();
            $logModel->log('Thêm mới', 'Khách hàng', $id, "Thêm mới khách hàng: $ho_ten");

            echo json_encode(['success' => true, 'message' => 'Tạo khách hàng thành công']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
    }

    public function updateCustomer($id)
    {
        header('Content-Type: application/json');
        
        $ho_ten = $_POST['ho_ten'] ?? '';
        $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
        $email = $_POST['email'] ?? '';
        $gioi_tinh = $_POST['gioi_tinh'] ?? null;
        $ngay_sinh = !empty($_POST['ngay_sinh']) ? $_POST['ngay_sinh'] : null;
        $nam_sinh = $ngay_sinh ? (int)date('Y', strtotime($ngay_sinh)) : null;
        $id_hang_thanh_vien = !empty($_POST['id_hang_thanh_vien']) && $_POST['id_hang_thanh_vien'] !== 'none' ? $_POST['id_hang_thanh_vien'] : null;
        $trang_thai = $_POST['trang_thai'] === 'active' ? 1 : 0;
        $ghi_chu_vip = $_POST['ghi_chu_vip'] ?? '';
        $mat_khau_input = $_POST['mat_khau'] ?? '';

        if (empty($ho_ten) || empty($so_dien_thoai)) {
            echo json_encode(['success' => false, 'message' => 'Họ tên và số điện thoại là bắt buộc']);
            return;
        }

        $model = new \App\Models\KhachHangModel();
        
        $id_menh = $this->calculateMenh($nam_sinh);
        
        $data = [
            'ho_ten' => $ho_ten,
            'so_dien_thoai' => $so_dien_thoai,
            'email' => $email,
            'gioi_tinh' => $gioi_tinh,
            'ngay_sinh' => $ngay_sinh,
            'nam_sinh' => $nam_sinh,
            'id_menh' => $id_menh,
            'id_hang_thanh_vien' => $id_hang_thanh_vien,
            'trang_thai' => $trang_thai,
            'ghi_chu_vip' => $ghi_chu_vip
        ];

        if (!empty($mat_khau_input)) {
            $data['mat_khau'] = password_hash($mat_khau_input, PASSWORD_DEFAULT);
        }

        if (isset($_FILES['anh_dai_dien']) && $_FILES['anh_dai_dien']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../../public/uploads/users/';
            if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);
            
            $ext = pathinfo($_FILES['anh_dai_dien']['name'], PATHINFO_EXTENSION);
            $fileName = $id . '.' . $ext;
            
            if (move_uploaded_file($_FILES['anh_dai_dien']['tmp_name'], $uploadDir . $fileName)) {
                $data['anh_dai_dien'] = '/uploads/users/' . $fileName;
            }
        }

        try {
            $model->capNhat($id, $data);
            
            $logModel = new \App\Models\NhatKyHoatDongModel();
            $logModel->log('Cập nhật', 'Khách hàng', $id, "Cập nhật thông tin khách hàng: $ho_ten");

            echo json_encode(['success' => true, 'message' => 'Cập nhật thành công']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
    }

    public function assignVouchersRank()
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);
        
        $id = $input['id'] ?? '';
        $vouchers = $input['vouchers'] ?? [];
        
        if (!$id) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
            return;
        }

        $model = new \App\Models\HangThanhVienModel();
        $logModel = new \App\Models\NhatKyHoatDongModel();

        try {
            $model->capNhat($id, [
                'danh_sach_voucher' => json_encode($vouchers, JSON_UNESCAPED_UNICODE)
            ]);
            $logModel->log('Cập nhật voucher hạng', 'Hạng thành viên', $id, "Đã gán " . count($vouchers) . " voucher cho hạng " . $id);
            echo json_encode(['success' => true, 'message' => 'Gán voucher thành công']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
        }
    }

    public function storeRank()
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (!$input) {
            echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ']);
            return;
        }

        $id = $input['id'] ?? '';
        $isEdit = $input['isEdit'] ?? false;
        
        $data = [
            'ten_hang' => $input['ten_hang'],
            'mo_ta' => $input['mo_ta'],
            'chi_tieu_toi_thieu' => $input['chi_tieu_toi_thieu'],
            'phan_tram_giam' => $input['phan_tram_giam'],
            'mau_sac' => $input['mau_sac'],
            'dac_quyen' => json_encode($input['dac_quyen'], JSON_UNESCAPED_UNICODE)
        ];

        $model = new \App\Models\HangThanhVienModel();
        $logModel = new \App\Models\NhatKyHoatDongModel();

        try {
            if ($isEdit) {
                $model->capNhat($id, $data);
                $logModel->log('Cập nhật hạng', 'Hạng thành viên', $id, "Cập nhật hạng: " . $data['ten_hang']);
            } else {
                // Check if ID already exists
                $existing = $model->timTheoId($id);
                if ($existing) {
                    echo json_encode(['success' => false, 'message' => 'Lỗi: Tên định danh (ID) này đã tồn tại. Vui lòng nhập ID khác.']);
                    return;
                }
                
                $data['id'] = $id; // User defined ID for rank
                $model->themMoi($data);
                $logModel->log('Thêm mới hạng', 'Hạng thành viên', $id, "Thêm mới hạng: " . $data['ten_hang']);
            }
            echo json_encode(['success' => true, 'message' => 'Lưu thành công']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi hệ thống: ' . $e->getMessage()]);
        }
    }

    public function deleteRank($id)
    {
        header('Content-Type: application/json');
        $model = new \App\Models\HangThanhVienModel();
        $logModel = new \App\Models\NhatKyHoatDongModel();
        
        try {
            $model->xoa($id);
            $logModel->log('Xóa hạng', 'Hạng thành viên', $id, "Xóa hạng: " . $id);
            echo json_encode(['success' => true]);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi: Khách hàng đang dùng hạng này']);
        }
    }

    public function toggleRankStatus($id)
    {
        header('Content-Type: application/json');
        $input = json_decode(file_get_contents('php://input'), true);
        $status = $input['status'] ?? 1;
        
        $model = new \App\Models\HangThanhVienModel();
        $logModel = new \App\Models\NhatKyHoatDongModel();
        
        try {
            $model->capNhat($id, ['trang_thai' => $status]);
            $logModel->log('Cập nhật trạng thái hạng', 'Hạng thành viên', $id, "Trạng thái mới: " . $status);
            echo json_encode(['success' => true]);
        } catch (\Exception $e) {
            echo json_encode(['success' => false]);
        }
    }
}
