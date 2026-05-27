<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class QuanLyCuaHangController extends Controller
{
    public function index()
    {
        // Mock data cho cấu hình cửa hàng
        $storeConfig = [
            'ten_cua_hang' => 'Chuỗi Ngọc Phong Thủy',
            'thuong_hieu' => 'Chuỗi Ngọc',
            'slogan' => 'Vòng ngọc hợp mệnh, gửi may mắn trong từng hạt đá',
            'mo_ta' => 'Chuyên cung cấp các loại vòng tay phong thủy, đá quý tự nhiên 100% đem lại tài lộc và bình an.',
            'email' => 'hotro@chuoingoc.com',
            'hotline_chinh' => '0901234567',
            'sdt_cskh' => '0909876543',
            'gio_lam_viec' => '08:00 - 21:00, Thứ 2 - Chủ nhật',
            'tinh_thanh' => 'Hà Nội',
            'quan_huyen' => 'Cầu Giấy',
            'phuong_xa' => 'Dịch Vọng Hậu',
            'dia_chi_chi_tiet' => '123 Đường Xuân Thủy',
            'chi_ban_online' => false,
            'zalo' => '0901234567',
            'facebook' => 'https://facebook.com/chuoingoc',
            'tiktok' => 'https://tiktok.com/@chuoingoc',
            'shopee' => '',
            'meta_title' => 'Chuỗi Ngọc Phong Thủy - Vòng tay đá tự nhiên hợp mệnh',
            'meta_description' => 'Mua vòng phong thủy, chuỗi ngọc, đá tự nhiên theo mệnh. Sản phẩm cao cấp, uy tín, giao hàng toàn quốc.',
            'keywords' => 'vòng phong thủy, chuỗi ngọc, vòng đá tự nhiên, vòng hợp mệnh'
        ];

        $this->view('admin_quan_ly_cua_hang', [
            'title' => 'Thông tin cửa hàng',
            'current_page' => 'thong_tin_cua_hang',
            'storeConfig' => $storeConfig
        ], 'admin');
    }
}
