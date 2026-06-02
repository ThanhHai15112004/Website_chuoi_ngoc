<?php

namespace App\Services\Admin;

use App\Models\Admin\PhieuKhoModel;

class XuatKhoService
{
    private $phieuKhoModel;

    public function __construct()
    {
        $this->phieuKhoModel = new PhieuKhoModel();
    }

    public function layDanhSach($filters, $page = 1, $limit = 20)
    {
        $offset = ($page - 1) * $limit;
        $list = $this->phieuKhoModel->layDanhSachPhieu(2, $filters, $limit, $offset); // loai_phieu = 2 (Xuất kho)
        $total = $this->phieuKhoModel->demDanhSachPhieu(2, $filters);

        // Format data
        foreach ($list as &$item) {
            $item['tong_tien'] = (float)$item['tong_tien'];
            
            // 0: Nháp, 1: Chờ duyệt, 2: Đang xuất, 3: Hoàn thành, 4: Đã hủy
            if ($item['trang_thai'] == 0) $item['status_text'] = 'Nháp';
            elseif ($item['trang_thai'] == 1) $item['status_text'] = 'Chờ duyệt';
            elseif ($item['trang_thai'] == 2) $item['status_text'] = 'Đang xuất';
            elseif ($item['trang_thai'] == 3) $item['status_text'] = 'Hoàn thành';
            elseif ($item['trang_thai'] == 4) $item['status_text'] = 'Đã hủy';
            else $item['status_text'] = 'Không xác định';
        }

        return [
            'list' => $list,
            'pagination' => [
                'current' => $page,
                'limit' => $limit,
                'total_records' => $total,
                'total_pages' => ceil($total / $limit)
            ],
            'stats' => [
                'tat_ca' => $total,
                // These should ideally be separate queries, but for now we mock them or just use total
                'cho_duyet' => 0, 
                'dang_xuat' => 0,
                'hoan_thanh' => 0
            ]
        ];
    }

    public function luuPhieuXuat($data)
    {
        // $data chứa thông tin phiếu và mảng chi tiết
        $phieu = [
            'ma_phieu' => empty($data['ma_phieu']) ? 'XK-' . date('Ymd-His') . '-' . rand(10, 99) : $data['ma_phieu'],
            'loai_phieu' => 2, // 2: Xuất kho
            'id_nguoi_tao' => $data['user_id'],
            'id_don_hang' => !empty($data['id_don_hang']) ? $data['id_don_hang'] : null,
            'tong_tien' => $data['tong_tien'] ?? 0,
            'tien_da_tra' => 0,
            'trang_thai_thanh_toan' => 0,
            'ngay_du_kien' => !empty($data['ngay_du_kien']) ? $data['ngay_du_kien'] : null,
            'muc_do_uu_tien' => $data['muc_do_uu_tien'] ?? 0,
            'ly_do' => $data['ly_do'] ?? 'Xuất kho',
            'ghi_chu' => $data['ghi_chu'] ?? null,
            'trang_thai' => $data['trang_thai'] ?? 0 // 0: Lưu nháp, 1: Gửi duyệt
        ];

        $chiTiet = [];
        if (!empty($data['chi_tiet']) && is_array($data['chi_tiet'])) {
            $db = \App\Core\Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT so_luong FROM san_pham_vi_tri WHERE id_vi_tri = ? AND id_bien_the = ?");
            
            foreach ($data['chi_tiet'] as $item) {
                if (!empty($item['id_bien_the']) && $item['so_luong'] > 0) {
                    $idViTri = !empty($item['id_vi_tri']) ? $item['id_vi_tri'] : null;
                    
                    if ($idViTri) {
                        $stmt->execute([$idViTri, $item['id_bien_the']]);
                        $slTaiViTri = (int)$stmt->fetchColumn();
                        if ($item['so_luong'] > $slTaiViTri) {
                            return ['success' => false, 'message' => 'Số lượng xuất lớn hơn số lượng có sẵn tại vị trí được chọn.'];
                        }
                    }

                    $chiTiet[] = [
                        'id_bien_the' => $item['id_bien_the'],
                        'so_luong' => $item['so_luong'],
                        'don_gia' => $item['don_gia'] ?? 0,
                        'ghi_chu_ct' => $item['ghi_chu_ct'] ?? null,
                        'id_vi_tri' => $idViTri
                    ];
                }
            }
        }

        if (empty($chiTiet)) {
            return ['success' => false, 'message' => 'Vui lòng chọn ít nhất 1 sản phẩm.'];
        }

        $idPhieu = $this->phieuKhoModel->taoPhieuKho($phieu, $chiTiet);
        
        if ($idPhieu) {
            return ['success' => true, 'id' => $idPhieu, 'message' => 'Lưu phiếu xuất kho thành công.'];
        }
        return ['success' => false, 'message' => 'Có lỗi xảy ra khi lưu vào database.'];
    }

    public function chiTiet($id)
    {
        return $this->phieuKhoModel->layChiTietPhieu($id);
    }

    public function duyetPhieu($id)
    {
        $success = $this->phieuKhoModel->capNhatTrangThai($id, 2); // 2: Đang xuất
        if ($success) {
            return ['success' => true, 'message' => 'Đã duyệt phiếu. Chuyển sang chuẩn bị hàng.'];
        }
        return ['success' => false, 'message' => 'Lỗi khi duyệt phiếu.'];
    }

    public function hoanThanhXuatKho($idPhieu, $userId, $dataKiem)
    {
        $success = $this->phieuKhoModel->kiemHangVaXuatKho($idPhieu, $userId, $dataKiem);
        if ($success) {
            return ['success' => true, 'message' => 'Xuất kho thành công. Số lượng tồn kho đã được trừ.'];
        }
        return ['success' => false, 'message' => 'Lỗi khi xuất kho.'];
    }

    public function huyPhieu($id)
    {
        $success = $this->phieuKhoModel->xoaPhieu($id); // xoaPhieu set trang_thai = 4
        if ($success) {
            return ['success' => true, 'message' => 'Đã hủy phiếu thành công.'];
        }
        return ['success' => false, 'message' => 'Lỗi khi hủy phiếu. Không thể hủy phiếu đã hoàn thành.'];
    }
}
