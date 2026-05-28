<?php

namespace App\Services\Admin;

use App\Models\KhachHangModel;
use Exception;

class KhachHangService
{
    private $khachHangModel;

    public function __construct()
    {
        $this->khachHangModel = new KhachHangModel();
    }

    public function getAdminCustomerData($filters = [], $page = 1, $limit = 20)
    {
        $offset = ($page - 1) * $limit;
        
        $totalItems = $this->khachHangModel->demDanhSach($filters);
        $totalPages = ceil($totalItems / $limit);
        
        $customers = $this->khachHangModel->layDanhSach($filters, $limit, $offset);

        $currentYear = (int)date('Y');

        // Format data
        foreach ($customers as &$kh) {
            $kh['trang_thai'] = $kh['trang_thai'] == 1 ? 'hoat_dong' : 'bi_khoa';
            
            // Age calculation
            if (!empty($kh['nam_sinh'])) {
                $kh['tuoi'] = $currentYear - (int)$kh['nam_sinh'];
            } else {
                $kh['tuoi'] = null;
            }

            // Ghi chú VIP & Nhieu don huy
            $kh['ghi_chu_vip'] = !empty($kh['ghi_chu_vip']) ? true : false;
            $kh['nhieu_don_huy'] = (isset($kh['so_don_huy']) && (int)$kh['so_don_huy'] >= 3) ? true : false;

            // Đơn gần nhất
            if (!empty($kh['ma_don_gan_nhat'])) {
                $kh['don_gan_nhat'] = [
                    'ma' => $kh['ma_don_gan_nhat'],
                    'ngay' => date('d/m/Y', strtotime($kh['ngay_don_gan_nhat']))
                ];
            } else {
                $kh['don_gan_nhat'] = null;
            }

            // Mệnh phong thủy (tự động nội suy nếu chưa có id_menh)
            // Vì query đã lấy mpt.ten_menh as menh, nên nếu có id_menh thì nó đã ra kết quả.
            // Nếu không có, ta sẽ tính tự động từ nam_sinh
            if (empty($kh['menh']) && !empty($kh['nam_sinh'])) {
                $kh['menh'] = $this->tinhMenhTuNamSinh($kh['nam_sinh']);
            }
        }

        return [
            'list' => $customers,
            'pagination' => [
                'total_items' => $totalItems,
                'total_pages' => $totalPages,
                'page' => $page,
                'limit' => $limit
            ]
        ];
    }

    public function layThongKe()
    {
        return $this->khachHangModel->layThongKe();
    }

    public function doiTrangThai($id)
    {
        return $this->khachHangModel->doiTrangThai($id);
    }

    private function tinhMenhTuNamSinh($nam_sinh)
    {
        if (!$nam_sinh) return null;
        
        // Tính Can
        $can_digit = (int)$nam_sinh % 10;
        $can_value = 0;
        switch ($can_digit) {
            case 4: case 5: $can_value = 1; break; // Giáp, Ất
            case 6: case 7: $can_value = 2; break; // Bính, Đinh
            case 8: case 9: $can_value = 3; break; // Mậu, Kỷ
            case 0: case 1: $can_value = 4; break; // Canh, Tân
            case 2: case 3: $can_value = 5; break; // Nhâm, Quý
        }

        // Tính Chi
        $chi_mod = (int)$nam_sinh % 12;
        $chi_value = 0;
        switch ($chi_mod) {
            case 4: case 10: case 5: case 11: $chi_value = 0; break; // Tý, Ngọ, Sửu, Mùi
            case 6: case 0: case 7: case 1: $chi_value = 1; break; // Dần, Thân, Mão, Dậu
            case 8: case 2: case 9: case 3: $chi_value = 2; break; // Thìn, Tuất, Tỵ, Hợi
        }

        // Tính Mệnh
        $menh_value = $can_value + $chi_value;
        if ($menh_value > 5) $menh_value -= 5;

        switch ($menh_value) {
            case 1: return 'Kim';
            case 2: return 'Thủy';
            case 3: return 'Hỏa';
            case 4: return 'Thổ';
            case 5: return 'Mộc';
        }
        return null;
    }
}
