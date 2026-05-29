<?php
namespace App\Services\Admin;

use App\Models\KhoHangModel;
use App\Models\KhuVucKhoModel;
use App\Models\CauHinhKhoConfigModel;
use App\Models\PhanQuyenKhoModel;
use App\Models\LichKiemKeModel;

class CauHinhKhoService
{
    private $khoModel;
    private $khuVucModel;
    private $configModel;
    private $phanQuyenModel;
    private $lichKiemKeModel;

    public function __construct()
    {
        $this->khoModel = new KhoHangModel();
        $this->khuVucModel = new KhuVucKhoModel();
        $this->configModel = new CauHinhKhoConfigModel();
        $this->phanQuyenModel = new PhanQuyenKhoModel();
        $this->lichKiemKeModel = new LichKiemKeModel();
    }

    // ==================== KHO ====================

    public function layDanhSachKho($filters = [])
    {
        $list = $this->khoModel->layDanhSach($filters);

        // Format trạng thái text
        foreach ($list as &$kho) {
            $kho['trang_thai_text'] = $this->getTrangThaiText($kho['trang_thai']);
            $kho['loai_kho_text'] = $this->getLoaiKhoText($kho['loai_kho']);
            $kho['so_san_pham'] = $kho['so_san_pham'] ?? 0;
            $kho['tong_ton'] = $kho['tong_ton'] ?? 0;
        }

        return $list;
    }

    public function chiTietKho($id)
    {
        $kho = $this->khoModel->layChiTiet($id);
        if (!$kho) return null;

        $kho['trang_thai_text'] = $this->getTrangThaiText($kho['trang_thai']);
        $kho['loai_kho_text'] = $this->getLoaiKhoText($kho['loai_kho']);

        return $kho;
    }

    public function themKho($data)
    {
        // Auto-generate mã kho nếu trống
        if (empty($data['ma_kho'])) {
            $ten = strtoupper(preg_replace('/[^a-zA-Z0-9]/', '-', $data['ten_kho'] ?? 'KHO'));
            $data['ma_kho'] = 'KHO-' . substr($ten, 0, 20) . '-' . rand(10, 99);
        }

        // Kiểm tra mã kho trùng
        if ($this->khoModel->kiemTraMaTonTai($data['ma_kho'])) {
            return ['success' => false, 'message' => 'Mã kho đã tồn tại. Vui lòng chọn mã khác.'];
        }

        $id = $this->khoModel->themKho($data);
        if ($id) {
            // Nếu đặt mặc định
            if (!empty($data['mac_dinh'])) {
                $this->khoModel->datMacDinh($id);
            }
            return ['success' => true, 'id' => $id, 'message' => 'Thêm kho hàng thành công.'];
        }
        return ['success' => false, 'message' => 'Có lỗi xảy ra khi tạo kho.'];
    }

    public function capNhatKho($id, $data)
    {
        // Kiểm tra mã kho trùng (loại trừ chính nó)
        if (!empty($data['ma_kho']) && $this->khoModel->kiemTraMaTonTai($data['ma_kho'], $id)) {
            return ['success' => false, 'message' => 'Mã kho đã tồn tại. Vui lòng chọn mã khác.'];
        }

        $ok = $this->khoModel->capNhatKho($id, $data);
        if ($ok) {
            return ['success' => true, 'message' => 'Cập nhật kho thành công.'];
        }
        return ['success' => false, 'message' => 'Có lỗi xảy ra khi cập nhật kho.'];
    }

    public function doiTrangThai($id, $trangThai)
    {
        $labels = [1 => 'Hoạt động', 2 => 'Tạm ngừng', 0 => 'Ngừng dùng'];
        $ok = $this->khoModel->capNhatTrangThai($id, $trangThai);
        if ($ok) {
            return ['success' => true, 'message' => 'Đã chuyển trạng thái sang: ' . ($labels[$trangThai] ?? 'Không xác định')];
        }
        return ['success' => false, 'message' => 'Lỗi khi đổi trạng thái.'];
    }

    public function datMacDinh($id)
    {
        $ok = $this->khoModel->datMacDinh($id);
        if ($ok) {
            return ['success' => true, 'message' => 'Đã đặt kho mặc định thành công.'];
        }
        return ['success' => false, 'message' => 'Lỗi khi đặt mặc định.'];
    }

    public function thongKe()
    {
        return $this->khoModel->thongKe();
    }

    public function layDanhSachKhoChoSelect()
    {
        return $this->khoModel->layDanhSachChoSelect();
    }

    public function layNhanVien()
    {
        return $this->khoModel->layNhanVien();
    }

    // ==================== KHU VỰC ====================

    public function layTreeKhuVuc()
    {
        return $this->khuVucModel->layTreeKhuVuc();
    }

    public function layDanhSachKhuVuc($idKho)
    {
        return $this->khuVucModel->layDanhSachTheoKho($idKho);
    }

    public function layDanhSachViTriCha($idKho)
    {
        return $this->khuVucModel->layDanhSachCha($idKho);
    }

    public function themViTri($data)
    {
        if (empty($data['id_kho']) || empty($data['ma_vi_tri']) || empty($data['ten_vi_tri'])) {
            return ['success' => false, 'message' => 'Vui lòng điền đầy đủ thông tin bắt buộc.'];
        }

        $id = $this->khuVucModel->themViTri($data);
        if ($id) {
            return ['success' => true, 'id' => $id, 'message' => 'Thêm vị trí thành công.'];
        }
        return ['success' => false, 'message' => 'Có lỗi xảy ra khi thêm vị trí.'];
    }

    public function xoaViTri($id)
    {
        $ok = $this->khuVucModel->xoaViTri($id);
        if ($ok) {
            return ['success' => true, 'message' => 'Đã xóa vị trí.'];
        }
        return ['success' => false, 'message' => 'Không thể xóa vị trí này (có thể đang chứa vị trí con).'];
    }

    // ==================== CẤU HÌNH ====================

    public function layCauHinh()
    {
        return $this->configModel->layTatCa();
    }

    public function luuCauHinh($data)
    {
        $ok = $this->configModel->luuNhieu($data);
        if ($ok) {
            return ['success' => true, 'message' => 'Đã lưu cấu hình thành công.'];
        }
        return ['success' => false, 'message' => 'Có lỗi khi lưu cấu hình.'];
    }

    // ==================== PHÂN QUYỀN ====================
    public function layPhanQuyenTheoKho($idKho) {
        return $this->phanQuyenModel->layQuyenTheoKho($idKho);
    }
    
    public function layNhanVienChuaPhanQuyen($idKho) {
        return $this->phanQuyenModel->layNhanVienChuaPhanQuyen($idKho);
    }
    
    public function luuPhanQuyen($idKho, $idNhanVien, $quyen) {
        return $this->phanQuyenModel->luuQuyen($idKho, $idNhanVien, $quyen);
    }

    // ==================== LỊCH KIỂM KÊ ====================
    public function layDanhSachLichKiemKe() {
        return $this->lichKiemKeModel->layDanhSach();
    }
    
    public function themLichKiemKe($data) {
        return $this->lichKiemKeModel->themLich($data);
    }
    
    public function xoaLichKiemKe($id) {
        return $this->lichKiemKeModel->xoaLich($id);
    }
    
    public function doiTrangThaiLich($id, $trangThai) {
        return $this->lichKiemKeModel->capNhatTrangThai($id, $trangThai);
    }

    // ==================== NHẬT KÝ ====================
    public function layNhatKyHoatDong() {
        // Lấy tạm từ config model hoặc db thông qua query raw (Do chưa có NhatKyModel riêng cho Cấu hình)
        $db = \App\Core\Database::getInstance()->getConnection();
        $stmt = $db->query("
            SELECT nk.*, nd.ho_ten as nguoi_thao_tac 
            FROM nhat_ky_hoat_dong nk
            LEFT JOIN nguoi_dung nd ON nk.id_nguoi_dung = nd.id
            WHERE nk.module = 'Hệ thống' OR nk.module = 'Kho hàng' 
            ORDER BY nk.ngay_tao DESC LIMIT 50
        ");
        if(!$stmt) return [];
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    // ==================== HELPERS ====================

    private function getTrangThaiText($trangThai)
    {
        switch ((int)$trangThai) {
            case 1: return 'Đang hoạt động';
            case 2: return 'Tạm ngừng';
            case 0: return 'Ngừng dùng';
            default: return 'Không xác định';
        }
    }

    private function getLoaiKhoText($loaiKho)
    {
        switch ($loaiKho) {
            case 'online': return 'Kho online';
            case 'tong': return 'Kho tổng';
            case 'cua_hang': return 'Kho cửa hàng';
            case 'loi': return 'Kho lỗi / bảo hành';
            default: return 'Không xác định';
        }
    }
}
