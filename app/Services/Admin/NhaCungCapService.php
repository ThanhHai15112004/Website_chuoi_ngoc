<?php
namespace App\Services\Admin;

use App\Models\NhaCungCapModel;
use App\Core\Helpers;

class NhaCungCapService
{
    private $nhaCungCapModel;

    public function __construct()
    {
        $this->nhaCungCapModel = new NhaCungCapModel();
    }

    public function layDanhSach($filters = [], $page = 1, $limit = 50)
    {
        $offset = ($page - 1) * $limit;
        $list = $this->nhaCungCapModel->layDanhSach($filters, $limit, $offset);
        $total = $this->nhaCungCapModel->demDanhSach($filters);

        return [
            'list' => $list,
            'total' => $total,
            'pages' => ceil($total / $limit)
        ];
    }

    public function chiTiet($id)
    {
        $ncc = $this->nhaCungCapModel->layChiTiet($id);
        if (!$ncc) {
            return ['success' => false, 'message' => 'Không tìm thấy thông tin nhà cung cấp.'];
        }
        return ['success' => true, 'data' => $ncc];
    }

    public function luuMoi($data)
    {
        if (empty($data['ten_ncc'])) {
            return ['success' => false, 'message' => 'Tên nhà cung cấp là bắt buộc.'];
        }

        // Generate ma_ncc if empty
        if (empty($data['ma_ncc'])) {
            $data['ma_ncc'] = $this->generateMaNcc();
        } else {
            if ($this->nhaCungCapModel->kiemTraMaTonTai($data['ma_ncc'])) {
                return ['success' => false, 'message' => 'Mã nhà cung cấp đã tồn tại.'];
            }
        }

        // Generate UUID
        $data['id'] = $this->generateUUID();
        
        $result = $this->nhaCungCapModel->themNhaCungCap($data);
        if ($result) {
            return ['success' => true, 'message' => 'Thêm nhà cung cấp thành công.', 'id' => $data['id']];
        }
        return ['success' => false, 'message' => 'Có lỗi xảy ra khi lưu vào database.'];
    }

    public function capNhat($id, $data)
    {
        if (empty($data['ten_ncc'])) {
            return ['success' => false, 'message' => 'Tên nhà cung cấp là bắt buộc.'];
        }

        if (empty($data['ma_ncc'])) {
            return ['success' => false, 'message' => 'Mã nhà cung cấp là bắt buộc.'];
        }

        if ($this->nhaCungCapModel->kiemTraMaTonTai($data['ma_ncc'], $id)) {
            return ['success' => false, 'message' => 'Mã nhà cung cấp đã tồn tại ở đơn vị khác.'];
        }

        $result = $this->nhaCungCapModel->capNhatNhaCungCap($id, $data);
        if ($result) {
            return ['success' => true, 'message' => 'Cập nhật nhà cung cấp thành công.'];
        }
        return ['success' => false, 'message' => 'Có lỗi xảy ra khi cập nhật database.'];
    }

    public function capNhatTrangThai($id, $trang_thai)
    {
        $result = $this->nhaCungCapModel->capNhatTrangThai($id, $trang_thai);
        if ($result) {
            return ['success' => true, 'message' => 'Đã cập nhật trạng thái nhà cung cấp.'];
        }
        return ['success' => false, 'message' => 'Cập nhật trạng thái thất bại.'];
    }

    public function thongKe()
    {
        return $this->nhaCungCapModel->thongKe();
    }

    private function generateMaNcc()
    {
        $prefix = 'NCC';
        $timeStr = date('Ym');
        $random = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        return $prefix . $timeStr . $random;
    }

    private function generateUUID() {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
}
