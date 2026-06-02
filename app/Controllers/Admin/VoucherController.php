<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class VoucherController extends Controller {
    private $voucherModel;

    public function __construct()
    {
        $this->voucherModel = new \App\Models\Admin\VoucherModel();
    }

    public function index()
    {
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 20;
        $offset = ($page - 1) * $limit;

        $filters = [
            'keyword' => $_GET['keyword'] ?? '',
            'trang_thai' => isset($_GET['trang_thai']) && $_GET['trang_thai'] !== '' ? (int)$_GET['trang_thai'] : '',
            'loai_giam' => $_GET['loai_giam'] ?? '',
            'thoi_gian' => $_GET['thoi_gian'] ?? '',
            'doi_tuong' => $_GET['doi_tuong'] ?? '',
            'tab' => $_GET['tab'] ?? 'all'
        ];

        $voucher_list = $this->voucherModel->getAllVouchers($filters, $limit, $offset);
        
        // Format data for view
        foreach ($voucher_list as &$v) {
            // Giá trị giảm
            if ($v['loai_giam'] == 1) {
                $v['loai_giam_str'] = 'Giảm phần trăm';
                $v['gia_tri_giam'] = $v['gia_tri'] . '%';
                $v['giam_toi_da_str'] = $v['giam_toi_da'] > 0 ? 'Tối đa ' . number_format($v['giam_toi_da'], 0, ',', '.') . 'đ' : null;
            } elseif ($v['loai_giam'] == 2) {
                $v['loai_giam_str'] = 'Giảm số tiền';
                $v['gia_tri_giam'] = number_format($v['gia_tri'], 0, ',', '.') . 'đ';
                $v['giam_toi_da_str'] = null;
            } elseif ($v['loai_giam'] == 3) {
                $v['loai_giam_str'] = 'Freeship';
                $v['gia_tri_giam'] = 'Miễn phí vận chuyển';
                $v['giam_toi_da_str'] = $v['giam_toi_da'] > 0 ? 'Tối đa ' . number_format($v['giam_toi_da'], 0, ',', '.') . 'đ' : null;
            } else {
                $v['loai_giam_str'] = 'Quà tặng';
                $v['gia_tri_giam'] = 'Quà tặng';
                $v['giam_toi_da_str'] = null;
            }

            // Điều kiện
            $v['dieu_kien'] = $v['don_toi_thieu'] > 0 ? 'Đơn từ ' . number_format($v['don_toi_thieu'], 0, ',', '.') . 'đ' : 'Không yêu cầu';

            // Đối tượng
            $doi_tuong_arr = [];
            if ($v['doi_tuong'] === 'all') $doi_tuong_arr[] = 'Tất cả khách hàng';
            elseif ($v['doi_tuong'] === 'new') $doi_tuong_arr[] = 'Khách hàng mới';
            else {
                $htv = json_decode($v['hang_thanh_vien'], true) ?: [];
                $doi_tuong_arr = array_merge($doi_tuong_arr, $htv);
            }
            $v['doi_tuong_arr'] = empty($doi_tuong_arr) ? ['Tất cả khách hàng'] : $doi_tuong_arr;

            // Thời gian
            $v['ngay_bat_dau_str'] = date('d/m/Y H:i', strtotime($v['ngay_bat_dau']));
            $v['ngay_ket_thuc_str'] = date('d/m/Y H:i', strtotime($v['ngay_ket_thuc']));

            // Trạng thái thời gian
            $now = time();
            $start = strtotime($v['ngay_bat_dau']);
            $end = strtotime($v['ngay_ket_thuc']);
            
            if ($v['trang_thai'] == 0) {
                $v['trang_thai_thoi_gian'] = 'Đã tắt';
                $v['trang_thai_str'] = 'Đã tắt';
            } elseif ($now < $start) {
                $days = floor(($start - $now) / 86400);
                $v['trang_thai_thoi_gian'] = "Bắt đầu sau $days ngày";
                $v['trang_thai_str'] = 'Chưa bắt đầu';
            } elseif ($now > $end) {
                $v['trang_thai_thoi_gian'] = 'Đã qua';
                $v['trang_thai_str'] = 'Hết hạn';
            } else {
                $days = floor(($end - $now) / 86400);
                if ($days <= 7) {
                    $v['trang_thai_thoi_gian'] = "Sắp hết hạn ($days ngày)";
                    $v['trang_thai_str'] = 'Sắp hết hạn';
                } else {
                    $v['trang_thai_thoi_gian'] = "Còn $days ngày";
                    $v['trang_thai_str'] = 'Đang hoạt động';
                }
            }

            if ($v['so_luong'] != -1 && $v['da_dung'] >= $v['so_luong']) {
                $v['trang_thai_str'] = 'Hết lượt dùng';
            }
        }

        $total = $this->voucherModel->countAllVouchers($filters);
        $stats = $this->voucherModel->getThongKe();

        $data = [
            'tieu_de' => 'Quản lý voucher - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'voucher',
            'thong_ke' => $stats,
            'voucher_list' => $voucher_list,
            'pagination' => [
                'current' => $page,
                'limit' => $limit,
                'total_records' => $total,
                'total_pages' => ceil($total / $limit)
            ]
        ];

        $this->view('admin_voucher', $data, 'admin');
    }

    public function them()
    {
        $data = [
            'tieu_de' => 'Thêm mới Voucher',
            'current_page' => 'voucher',
            'is_edit' => false,
            'voucher' => null,
            'hang_thanh_vien_list' => (new \App\Models\Admin\HangThanhVienModel())->layTatCa(),
            'danh_muc_list' => (new \App\Models\Admin\DanhMucModel())->layTatCa(),
            'voucher_danh_muc' => [],
            'voucher_san_pham' => []
        ];
        $this->view('admin_voucher_form', $data, 'admin');
    }

    public function sua($id)
    {
        $voucher = $this->voucherModel->getVoucherById($id);
        if (!$voucher) {
            header('Location: ' . APP_URL . '/admin/voucher');
            exit;
        }

        $san_pham_list = $this->voucherModel->getVoucherProducts($id);
        foreach ($san_pham_list as &$sp) {
            if (strpos($sp['anh_chinh'], 'http') !== 0) {
                $sp['anh_chinh'] = APP_URL . '/public' . $sp['anh_chinh'];
            }
        }

        $data = [
            'tieu_de' => 'Chỉnh sửa Voucher: ' . $voucher['ma_voucher'],
            'current_page' => 'voucher',
            'is_edit' => true,
            'voucher' => $voucher,
            'hang_thanh_vien_list' => (new \App\Models\Admin\HangThanhVienModel())->layTatCa(),
            'danh_muc_list' => (new \App\Models\Admin\DanhMucModel())->layTatCa(),
            'voucher_danh_muc' => $this->voucherModel->getVoucherCategories($id),
            'voucher_san_pham' => $san_pham_list
        ];
        $this->view('admin_voucher_form', $data, 'admin');
    }

    public function store()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
            
            // Map types to integer
            $typeMap = ['percent' => 1, 'fixed' => 2, 'freeship' => 3, 'gift' => 4];
            $loai_giam = $typeMap[$input['loai_giam']] ?? 1;

            $data = [
                'ma_voucher' => strtoupper(trim($input['ma_voucher'])),
                'ten_chuong_trinh' => trim($input['ten_chuong_trinh']),
                'mo_ta' => trim($input['mo_ta'] ?? ''),
                'pham_vi_san_pham' => $input['pham_vi_san_pham'] ?? 'all',
                'doi_tuong' => $input['doi_tuong'] ?? 'all',
                'hang_thanh_vien' => !empty($input['hang_thanh_vien']) ? json_encode($input['hang_thanh_vien']) : null,
                'is_combine' => !empty($input['is_combine']) ? 1 : 0,
                'loai_giam' => $loai_giam,
                'gia_tri' => (float)($input['gia_tri'] ?? 0),
                'don_toi_thieu' => (float)($input['don_toi_thieu'] ?? 0),
                'giam_toi_da' => (float)($input['giam_toi_da'] ?? 0),
                'so_luong' => $input['is_unlimited_usage'] ? -1 : (int)($input['so_luong'] ?? -1),
                'ngay_bat_dau' => $input['ngay_bat_dau'],
                'ngay_ket_thuc' => $input['ngay_ket_thuc'],
                'trang_thai' => !empty($input['trang_thai']) ? 1 : 0,
                'danh_muc_ids' => $input['danh_muc_ids'] ?? [],
                'san_pham_ids' => $input['san_pham_ids'] ?? []
            ];

            $this->voucherModel->createVoucher($data);

            echo json_encode(['success' => true, 'message' => 'Tạo voucher thành công!']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
    }

    public function update($id)
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true) ?? $_POST;
            
            $typeMap = ['percent' => 1, 'fixed' => 2, 'freeship' => 3, 'gift' => 4];
            $loai_giam = $typeMap[$input['loai_giam']] ?? 1;

            $data = [
                'ma_voucher' => strtoupper(trim($input['ma_voucher'])),
                'ten_chuong_trinh' => trim($input['ten_chuong_trinh']),
                'mo_ta' => trim($input['mo_ta'] ?? ''),
                'pham_vi_san_pham' => $input['pham_vi_san_pham'] ?? 'all',
                'doi_tuong' => $input['doi_tuong'] ?? 'all',
                'hang_thanh_vien' => !empty($input['hang_thanh_vien']) ? json_encode($input['hang_thanh_vien']) : null,
                'is_combine' => !empty($input['is_combine']) ? 1 : 0,
                'loai_giam' => $loai_giam,
                'gia_tri' => (float)($input['gia_tri'] ?? 0),
                'don_toi_thieu' => (float)($input['don_toi_thieu'] ?? 0),
                'giam_toi_da' => (float)($input['giam_toi_da'] ?? 0),
                'so_luong' => $input['is_unlimited_usage'] ? -1 : (int)($input['so_luong'] ?? -1),
                'ngay_bat_dau' => $input['ngay_bat_dau'],
                'ngay_ket_thuc' => $input['ngay_ket_thuc'],
                'trang_thai' => !empty($input['trang_thai']) ? 1 : 0,
                'danh_muc_ids' => $input['danh_muc_ids'] ?? [],
                'san_pham_ids' => $input['san_pham_ids'] ?? []
            ];

            $this->voucherModel->updateVoucher($id, $data);

            echo json_encode(['success' => true, 'message' => 'Cập nhật voucher thành công!']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
    }

    public function xoa()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? null;
            if (!$id) throw new \Exception('Thiếu ID voucher');

            $this->voucherModel->deleteVoucher($id);
            echo json_encode(['success' => true, 'message' => 'Xóa voucher thành công!']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
    }

    public function toggle_status()
    {
        header('Content-Type: application/json');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $id = $input['id'] ?? null;
            $status = $input['status'] ?? 0;
            if (!$id) throw new \Exception('Thiếu ID voucher');

            $this->voucherModel->toggleStatus($id, $status);
            echo json_encode(['success' => true, 'message' => 'Cập nhật trạng thái thành công!']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi: ' . $e->getMessage()]);
        }
    }

    /**
     * API: Kiểm tra mã voucher và tính giảm giá
     * POST /admin/voucher/api/check
     * Body: { ma_voucher, tong_tien }
     */
    public function apiCheckVoucher()
    {
        header('Content-Type: application/json; charset=utf-8');
        try {
            $input = json_decode(file_get_contents('php://input'), true);
            $ma = $input['ma_voucher'] ?? '';
            $tongTien = (float)($input['tong_tien'] ?? 0);

            if (empty($ma)) {
                echo json_encode(['success' => false, 'message' => 'Vui lòng nhập mã voucher.'], JSON_UNESCAPED_UNICODE);
                return;
            }

            $result = $this->voucherModel->checkVoucherByCode($ma, $tongTien);
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Lỗi hệ thống: ' . $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    }
}
