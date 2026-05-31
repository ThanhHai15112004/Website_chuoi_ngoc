<?php

namespace App\Services\Admin;

use App\Models\ThuyenChuyenModel;
use App\Models\KhoHangModel;

class ThuyenChuyenService
{
    private $model;
    private $khoModel;

    public function __construct()
    {
        $this->model = new ThuyenChuyenModel();
        $this->khoModel = new KhoHangModel();
    }

    /**
     * Lấy danh sách phiếu thuyên chuyển + phân trang + stats
     */
    public function layDanhSach($filters = [], $page = 1, $limit = 20)
    {
        $offset = ($page - 1) * $limit;
        $list = $this->model->layDanhSach($filters, $limit, $offset);
        $total = $this->model->demDanhSach($filters);

        // Format trạng thái text
        foreach ($list as &$item) {
            $item['trang_thai_text'] = $this->getTrangThaiText($item['trang_thai']);

            // Lấy sản phẩm đầu tiên để preview
            $spDau = $this->model->laySanPhamDauTien($item['id']);
            $item['san_pham_dau'] = $spDau;
            
            // Tính chênh lệch nếu đã nhận hàng
            $item['chenh_lech'] = max(0, ($item['tong_so_luong'] ?? 0) - ($item['tong_thuc_nhan'] ?? 0));
        }

        return [
            'list' => $list,
            'pagination' => [
                'current' => $page,
                'limit' => $limit,
                'total_records' => $total,
                'total_pages' => $total > 0 ? ceil($total / $limit) : 1
            ]
        ];
    }

    /**
     * Lấy thống kê tổng quan
     */
    public function layThongKe()
    {
        return $this->model->layThongKe();
    }

    /**
     * Lưu phiếu thuyên chuyển mới
     */
    public function luuPhieu($data)
    {
        // Validate
        if (empty($data['id_kho_gui']) || empty($data['id_kho_nhan'])) {
            return ['success' => false, 'message' => 'Vui lòng chọn kho gửi và kho nhận.'];
        }

        if ($data['id_kho_gui'] === $data['id_kho_nhan']) {
            return ['success' => false, 'message' => 'Kho gửi và kho nhận không được trùng nhau.'];
        }

        if (empty($data['chi_tiet']) || !is_array($data['chi_tiet'])) {
            return ['success' => false, 'message' => 'Vui lòng chọn ít nhất 1 sản phẩm.'];
        }

        // Kiểm tra tồn kho đủ
        $db = \App\Core\Database::getInstance()->getConnection();
        $stmtStock = $db->prepare("SELECT so_luong_ton FROM san_pham_bien_the WHERE id = ?");

        foreach ($data['chi_tiet'] as $item) {
            if (empty($item['id_bien_the']) || $item['so_luong'] <= 0) {
                return ['success' => false, 'message' => 'Thông tin sản phẩm không hợp lệ.'];
            }

            $stmtStock->execute([$item['id_bien_the']]);
            $stock = $stmtStock->fetch(\PDO::FETCH_ASSOC);
            if (!$stock || $stock['so_luong_ton'] < $item['so_luong']) {
                return ['success' => false, 'message' => 'Số lượng chuyển vượt quá tồn kho hiện tại.'];
            }
        }

        // Tạo mã phiếu
        $phieu = [
            'ma_phieu' => empty($data['ma_phieu']) ? 'CK' . date('Ymd') . rand(100, 999) : $data['ma_phieu'],
            'id_kho_gui' => $data['id_kho_gui'],
            'id_kho_nhan' => $data['id_kho_nhan'],
            'loai_chuyen' => $data['loai_chuyen'] ?? 'Chuyển nội bộ',
            'muc_do_uu_tien' => $data['muc_do_uu_tien'] ?? 0,
            'trang_thai' => $data['trang_thai'] ?? 1, // 1: Chờ xác nhận
            'ghi_chu' => $data['ghi_chu'] ?? null,
            'id_nguoi_tao' => $data['user_id']
        ];

        $chiTiet = [];
        foreach ($data['chi_tiet'] as $item) {
            $chiTiet[] = [
                'id_bien_the' => $item['id_bien_the'],
                'so_luong' => $item['so_luong'],
                'id_vi_tri' => $item['id_vi_tri'] ?? null,
                'ghi_chu' => $item['ghi_chu'] ?? null
            ];
        }

        $idPhieu = $this->model->taoPhieu($phieu, $chiTiet);
        if ($idPhieu) {
            return ['success' => true, 'id' => $idPhieu, 'message' => 'Tạo phiếu chuyển kho thành công.'];
        }
        return ['success' => false, 'message' => 'Có lỗi khi tạo phiếu.'];
    }

    /**
     * Lấy chi tiết phiếu
     */
    public function chiTiet($id)
    {
        $data = $this->model->layChiTiet($id);
        if (!$data) return null;

        $data['phieu']['trang_thai_text'] = $this->getTrangThaiText($data['phieu']['trang_thai']);
        return $data;
    }

    /**
     * Duyệt phiếu
     */
    public function duyetPhieu($id, $userId)
    {
        $ok = $this->model->capNhatTrangThai($id, 2, [
            'id_nguoi_duyet' => $userId,
            'ngay_duyet' => date('Y-m-d H:i:s')
        ]);
        if ($ok) {
            return ['success' => true, 'message' => 'Đã duyệt phiếu thành công.'];
        }
        return ['success' => false, 'message' => 'Lỗi khi duyệt phiếu.'];
    }

    /**
     * Bắt đầu chuyển hàng
     */
    public function batDauChuyen($id)
    {
        $ok = $this->model->batDauChuyen($id);
        if ($ok) {
            return ['success' => true, 'message' => 'Đã bắt đầu chuyển hàng. Tồn kho kho gửi đã được trừ.'];
        }
        return ['success' => false, 'message' => 'Lỗi khi bắt đầu chuyển hàng.'];
    }

    /**
     * Xác nhận nhận hàng
     */
    public function nhanHang($id, $dataKiem)
    {
        $result = $this->model->nhanHang($id, $dataKiem);
        if ($result['success']) {
            $msg = $result['co_loi'] 
                ? 'Đã nhận hàng. Có chênh lệch/lỗi cần xử lý.' 
                : 'Đã nhận hàng đầy đủ. Phiếu chuyển hoàn tất.';
            return ['success' => true, 'message' => $msg, 'co_loi' => $result['co_loi']];
        }
        return ['success' => false, 'message' => 'Lỗi khi nhận hàng.'];
    }

    /**
     * Hủy phiếu
     */
    public function huyPhieu($id, $lyDo = '')
    {
        $ok = $this->model->huyPhieu($id, $lyDo);
        if ($ok) {
            return ['success' => true, 'message' => 'Đã hủy phiếu thành công.'];
        }
        return ['success' => false, 'message' => 'Không thể hủy phiếu. Phiếu đang chuyển hoặc đã hoàn tất.'];
    }

    /**
     * Lấy danh sách kho cho dropdown
     */
    public function layDanhSachKho()
    {
        return $this->khoModel->layDanhSachChoSelect();
    }

    /**
     * Helper: Text trạng thái
     */
    private function getTrangThaiText($trangThai)
    {
        $map = [
            0 => 'Nháp',
            1 => 'Chờ xác nhận',
            2 => 'Đã duyệt',
            3 => 'Đang chuyển',
            4 => 'Đã hoàn tất',
            5 => 'Có lỗi / thiếu hàng',
            6 => 'Đã hủy'
        ];
        return $map[$trangThai] ?? 'Không xác định';
    }
}
