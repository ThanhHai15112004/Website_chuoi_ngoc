<?php

namespace App\Services\Admin;

use App\Models\Admin\PhieuKhoModel;

class NhapKhoService
{
    private $phieuKhoModel;

    public function __construct()
    {
        $this->phieuKhoModel = new PhieuKhoModel();
    }

    public function layDanhSachNhaCungCap()
    {
        $db = \App\Core\Database::getInstance()->getConnection();
        $stmt = $db->prepare("SELECT id, ma_ncc, ten_ncc FROM nha_cung_cap WHERE trang_thai = 1 ORDER BY ten_ncc ASC");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function layDanhSach($filters, $page = 1, $limit = 20)
    {
        $offset = ($page - 1) * $limit;
        $list = $this->phieuKhoModel->layDanhSachPhieu(1, $filters, $limit, $offset); // loai_phieu = 1 (Nhập kho)
        $total = $this->phieuKhoModel->demDanhSachPhieu(1, $filters);

        // Format data
        foreach ($list as &$item) {
            $item['tong_tien'] = (float)$item['tong_tien'];
            $item['tien_da_tra'] = (float)$item['tien_da_tra'];
            $item['tien_no'] = max(0, $item['tong_tien'] - $item['tien_da_tra']);
            
            if ($item['trang_thai_thanh_toan'] == 0) $item['thanh_toan'] = 'Chưa thanh toán';
            elseif ($item['trang_thai_thanh_toan'] == 1) $item['thanh_toan'] = 'Thanh toán một phần';
            else $item['thanh_toan'] = 'Đã thanh toán';

            // 0: Nháp, 1: Chờ duyệt, 2: Đang kiểm, 3: Hoàn thành, 4: Đã hủy
            if ($item['trang_thai'] == 0) $item['status_text'] = 'Nháp';
            elseif ($item['trang_thai'] == 1) $item['status_text'] = 'Chờ duyệt';
            elseif ($item['trang_thai'] == 2) $item['status_text'] = 'Đang kiểm hàng';
            elseif ($item['trang_thai'] == 3) $item['status_text'] = 'Đã nhập kho';
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
                'cho_kiem' => 0,
                'dang_kiem' => 0,
                'da_nhap' => 0,
                'loi_thieu' => 0,
                'tong_tien' => 0,
                'cong_no' => 0
            ]
        ];
    }

    public function luuPhieuNhap($data)
    {
        // $data chứa thông tin phiếu và mảng chi tiết
        $phieu = [
            'ma_phieu' => empty($data['ma_phieu']) ? 'NK-' . date('Ymd-His') . '-' . rand(10, 99) : $data['ma_phieu'],
            'loai_phieu' => 1,
            'id_nguoi_tao' => $data['user_id'],
            'id_nha_cung_cap' => !empty($data['id_nha_cung_cap']) ? $data['id_nha_cung_cap'] : null,
            'tong_tien' => $data['tong_tien'] ?? 0,
            'tien_da_tra' => $data['tien_da_tra'] ?? 0,
            'trang_thai_thanh_toan' => $this->xacDinhTrangThaiThanhToan($data['tong_tien'], $data['tien_da_tra']),
            'ngay_du_kien' => !empty($data['ngay_du_kien']) ? $data['ngay_du_kien'] : null,
            'muc_do_uu_tien' => $data['muc_do_uu_tien'] ?? 0,
            'ly_do' => $data['ly_do'] ?? 'Nhập hàng từ NCC',
            'ghi_chu' => $data['ghi_chu'] ?? null,
            'trang_thai' => $data['trang_thai'] ?? 0 // 0: Lưu nháp, 1: Gửi kiểm
        ];

        $chiTiet = [];
        $spvtModel = new \App\Models\Admin\SanPhamViTriModel();
        
        if (!empty($data['chi_tiet']) && is_array($data['chi_tiet'])) {
            foreach ($data['chi_tiet'] as $item) {
                if (!empty($item['id_bien_the']) && $item['so_luong'] > 0) {
                    $idViTri = !empty($item['id_vi_tri']) ? $item['id_vi_tri'] : null;
                    
                    // Kiểm tra sức chứa
                    if ($idViTri && !$spvtModel->kiemTraSucChua($idViTri, $item['so_luong'])) {
                        return ['success' => false, 'message' => 'Vị trí được chọn không đủ sức chứa cho sản phẩm.'];
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
            return ['success' => true, 'id' => $idPhieu, 'message' => 'Lưu phiếu nhập kho thành công.'];
        }
        return ['success' => false, 'message' => 'Có lỗi xảy ra khi lưu vào database.'];
    }

    public function chiTiet($id)
    {
        return $this->phieuKhoModel->layChiTietPhieu($id);
    }

    private function xacDinhTrangThaiThanhToan($tongTien, $daTra)
    {
        $tongTien = (float)($tongTien ?? 0);
        $daTra = (float)($daTra ?? 0);
        if ($daTra <= 0) return 0; // Chưa thanh toán
        if ($daTra >= $tongTien) return 2; // Xong
        return 1; // 1 phần
    }

    public function hoanThanhKiemHang($idPhieu, $userId, $dataKiem)
    {
        $success = $this->phieuKhoModel->kiemHangVaNhapKho($idPhieu, $userId, $dataKiem);
        if ($success) {
            return ['success' => true, 'message' => 'Kiểm hàng thành công. Sản phẩm đã được nhập kho.'];
        }
        return ['success' => false, 'message' => 'Lỗi khi kiểm hàng.'];
    }

    public function duyetPhieu($id)
    {
        $success = $this->phieuKhoModel->capNhatTrangThai($id, 2); // 2: Đang kiểm hàng
        if ($success) {
            return ['success' => true, 'message' => 'Đã duyệt phiếu. Chuyển sang đang kiểm hàng.'];
        }
        return ['success' => false, 'message' => 'Lỗi khi duyệt phiếu.'];
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
