<?php

namespace App\Services\User;

use App\Models\Admin\CauHinhModel;
use App\Models\Admin\LienHeModel;
use Exception;

class LienHeService
{
    private $cauHinhModel;
    private $lienHeModel;

    public function __construct()
    {
        $this->cauHinhModel = new CauHinhModel();
        $this->lienHeModel = new LienHeModel();
    }

    public function getThongTinCuaHang()
    {
        // Lấy tất cả cấu hình
        $config = $this->cauHinhModel->getAll();
        
        // Mảng cấu hình mặc định (phòng trường hợp DB chưa có)
        $defaultConfig = [
            'ten_cua_hang' => 'Chuỗi Ngọc Phong Thủy',
            'hotline_chinh' => '0901234567',
            'sdt_cskh' => '0909876543',
            'email' => 'hotro@chuoingoc.com',
            'dia_chi_chi_tiet' => '613 Âu Cơ',
            'phuong_xa' => 'Phú Trung',
            'quan_huyen' => 'Tân Phú',
            'tinh_thanh' => 'Hồ Chí Minh',
            'gio_lam_viec' => '08:00 - 21:00, Thứ 2 - Chủ nhật',
            'google_map_iframe' => '',
            'zalo' => '',
            'zalo_active' => '0',
            'facebook' => '',
            'facebook_active' => '0'
        ];

        return array_merge($defaultConfig, $config);
    }

    public function guiLienHe($data)
    {
        // Validation cơ bản
        if (empty($data['ho_ten']) || empty($data['so_dien_thoai']) || empty($data['chu_de']) || empty($data['noi_dung'])) {
            throw new Exception("Vui lòng điền đầy đủ các trường bắt buộc.");
        }

        // Tạo UUID
        $data['id'] = 'lh_' . uniqid();
        
        // Ensure kenh_lien_he is a valid JSON string if it's an array
        if (isset($data['kenh_lien_he']) && is_array($data['kenh_lien_he'])) {
            $data['kenh_lien_he'] = json_encode($data['kenh_lien_he']);
        } else if (!isset($data['kenh_lien_he'])) {
            $data['kenh_lien_he'] = json_encode([]);
        }

        $result = $this->lienHeModel->themMoi([
            'id' => $data['id'],
            'ho_ten' => trim($data['ho_ten']),
            'so_dien_thoai' => trim($data['so_dien_thoai']),
            'email' => isset($data['email']) ? trim($data['email']) : null,
            'chu_de' => trim($data['chu_de']),
            'menh_nam_sinh' => isset($data['menh_nam_sinh']) ? trim($data['menh_nam_sinh']) : null,
            'noi_dung' => trim($data['noi_dung']),
            'kenh_lien_he' => $data['kenh_lien_he'],
            'trang_thai' => 0 // 0 = Chưa xử lý
        ]);

        if (!$result) {
            throw new Exception("Có lỗi xảy ra khi lưu thông tin liên hệ. Vui lòng thử lại sau.");
        }

        return $data;
    }
}
