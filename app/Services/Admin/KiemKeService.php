<?php

namespace App\Services\Admin;

use App\Models\PhieuKiemKeModel;
use App\Models\KhoHangModel;

class KiemKeService
{
    private $model;
    private $khoModel;

    public function __construct()
    {
        $this->model = new PhieuKiemKeModel();
        $this->khoModel = new KhoHangModel();
    }

    /**
     * Lấy danh sách phiếu kiểm kê + phân trang + stats
     */
    public function layDanhSach($filters = [], $page = 1, $limit = 20)
    {
        $offset = ($page - 1) * $limit;
        $list = $this->model->layDanhSach($filters, $limit, $offset);
        $total = $this->model->demDanhSach($filters);

        // Format trạng thái text
        foreach ($list as &$item) {
            $item['trang_thai_text'] = $this->getTrangThaiText($item['trang_thai']);
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
     * Tạo phiếu kiểm kê mới
     */
    public function luuPhieu($data)
    {
        // Validate
        if (empty($data['id_kho'])) {
            return ['success' => false, 'message' => 'Vui lòng chọn kho kiểm kê.'];
        }

        if (empty($data['danh_sach_bien_the']) || !is_array($data['danh_sach_bien_the'])) {
            return ['success' => false, 'message' => 'Vui lòng chọn ít nhất 1 sản phẩm.'];
        }

        $phieu = [
            'ma_phieu' => empty($data['ma_phieu']) ? 'KK' . date('Ymd') . rand(100, 999) : $data['ma_phieu'],
            'ten_dot' => $data['ten_dot'] ?? null,
            'id_kho' => $data['id_kho'],
            'loai_kiem_ke' => $data['loai_kiem_ke'] ?? 'Toàn kho',
            'trang_thai' => $data['trang_thai'] ?? 1, // 1: Đang kiểm kê
            'ghi_chu' => $data['ghi_chu'] ?? null,
            'id_nguoi_tao' => $data['user_id'],
            'nguoi_kiem_ke' => $data['nguoi_kiem_ke'] ?? null,
            'han_hoan_tat' => !empty($data['han_hoan_tat']) ? $data['han_hoan_tat'] : null
        ];

        $idPhieu = $this->model->taoPhieu($phieu, $data['danh_sach_bien_the']);
        if ($idPhieu) {
            return ['success' => true, 'id' => $idPhieu, 'message' => 'Tạo phiếu kiểm kê thành công.'];
        }
        return ['success' => false, 'message' => 'Có lỗi khi tạo phiếu kiểm kê.'];
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
     * Lưu kết quả kiểm đếm
     */
    public function luuKetQua($id, $dataKiem)
    {
        $ok = $this->model->capNhatKetQua($id, $dataKiem);
        if ($ok) {
            return ['success' => true, 'message' => 'Đã lưu kết quả kiểm đếm.'];
        }
        return ['success' => false, 'message' => 'Lỗi khi lưu kết quả kiểm đếm.'];
    }

    /**
     * Gửi duyệt
     */
    public function guiDuyet($id)
    {
        $ok = $this->model->capNhatTrangThai($id, 2);
        if ($ok) {
            return ['success' => true, 'message' => 'Đã gửi phiếu kiểm kê chờ duyệt.'];
        }
        return ['success' => false, 'message' => 'Lỗi khi gửi duyệt.'];
    }

    /**
     * Duyệt + Điều chỉnh kho
     */
    public function duyetVaDieuChinh($id, $userId)
    {
        $ok = $this->model->duyetVaDieuChinh($id, $userId);
        if ($ok) {
            return ['success' => true, 'message' => 'Đã duyệt và điều chỉnh kho theo kết quả kiểm kê.'];
        }
        return ['success' => false, 'message' => 'Lỗi khi duyệt phiếu kiểm kê.'];
    }

    /**
     * Hủy phiếu
     */
    public function huyPhieu($id)
    {
        // Chỉ hủy nếu chưa điều chỉnh kho (trạng thái < 4)
        $data = $this->model->layChiTiet($id);
        if (!$data) {
            return ['success' => false, 'message' => 'Phiếu không tồn tại.'];
        }

        if ($data['phieu']['trang_thai'] >= 4 && $data['phieu']['trang_thai'] != 6) {
            return ['success' => false, 'message' => 'Không thể hủy phiếu đã duyệt/điều chỉnh kho.'];
        }

        $ok = $this->model->capNhatTrangThai($id, 6);
        if ($ok) {
            return ['success' => true, 'message' => 'Đã hủy phiếu kiểm kê.'];
        }
        return ['success' => false, 'message' => 'Lỗi khi hủy phiếu.'];
    }

    /**
     * Lấy danh sách kho cho dropdown
     */
    public function layDanhSachKho()
    {
        return $this->khoModel->layDanhSachChoSelect();
    }

    /**
     * Lấy danh sách biến thể theo kho
     */
    public function layBienTheTheoKho($idKho)
    {
        return $this->model->layBienTheTheoKho($idKho);
    }

    /**
     * Helper: Text trạng thái
     */
    private function getTrangThaiText($trangThai)
    {
        $map = [
            0 => 'Nháp',
            1 => 'Đang kiểm kê',
            2 => 'Chờ duyệt',
            3 => 'Đã duyệt',
            4 => 'Đã điều chỉnh kho',
            5 => 'Hoàn tất',
            6 => 'Đã hủy'
        ];
        return $map[$trangThai] ?? 'Không xác định';
    }
}
