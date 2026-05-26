<?php
// app/Controllers/Admin/KiemKeController.php

namespace App\Controllers\Admin;

use App\Core\Controller;

class KiemKeController extends Controller
{
    private function getMockKho()
    {
        return [
            ['id' => 'KHO001', 'ten' => 'Kho Tổng - Hà Nội'],
            ['id' => 'KHO002', 'ten' => 'Kho Cửa Hàng - Cầu Giấy'],
        ];
    }

    private function getMockDanhSachKiemKe()
    {
        return [
            [
                'id' => 'KK2310-001',
                'kho' => 'Kho Tổng - Hà Nội',
                'ngay_tao' => '24/10/2023',
                'nguoi_tao' => 'Admin',
                'so_sp' => 50,
                'so_sai_lech' => 2,
                'trang_thai' => 'Đã cân bằng'
            ],
            [
                'id' => 'KK2310-002',
                'kho' => 'Kho Cửa Hàng - Cầu Giấy',
                'ngay_tao' => '26/10/2023',
                'nguoi_tao' => 'Tran Van A',
                'so_sp' => 120,
                'so_sai_lech' => -5,
                'trang_thai' => 'Đang kiểm kê'
            ],
        ];
    }

    public function index()
    {
        $danhSachKK = $this->getMockDanhSachKiemKe();
        
        $stats = [
            'tat_ca' => count($danhSachKK),
            'dang_kiem_ke' => 1,
            'da_can_bang' => 1,
        ];

        $this->view('admin_kiem_ke', [
            'current_page' => 'kiem_ke',
            'danhSachKK' => $danhSachKK,
            'stats' => $stats
        ], 'admin');
    }

    public function create()
    {
        $danhSachKho = $this->getMockKho();
        
        // Mock API products based on warehouse selection
        $sanPhamList = [
            ['id' => 'SP001', 'ten' => 'Chuỗi Tỳ Hưu Thạch Anh Tóc Vàng', 'ton_he_thong' => 150],
            ['id' => 'SP002', 'ten' => 'Vòng Ngọc Bích Tự Nhiên', 'ton_he_thong' => 85],
            ['id' => 'SP003', 'ten' => 'Mặt Dây Chuyền Hồ Ly Cửu Vĩ', 'ton_he_thong' => 30],
        ];

        $this->view('admin_kiem_ke_them', [
            'current_page' => 'kiem_ke',
            'danhSachKho' => $danhSachKho,
            'sanPhamList' => $sanPhamList
        ], 'admin');
    }

    public function show($id)
    {
        $phieu = [
            'id' => $id,
            'kho' => 'Kho Cửa Hàng - Cầu Giấy',
            'nguoi_tao' => 'Tran Van A',
            'nguoi_kiem_dem' => 'Nguyen Van B, Le Thi C',
            'ngay_tao' => '26/10/2023 08:30',
            'ngay_hoan_thanh' => '26/10/2023 17:00',
            'trang_thai' => 'Đang kiểm kê', // 'Đang kiểm kê', 'Đã cân bằng'
            'ghi_chu' => 'Kiểm kê định kỳ cuối tháng 10.',
            'tong_sp_kiem_ke' => 2,
            'tong_chenh_lech' => -2,
            'tong_gia_tri_lech' => -3000000 // -3 triệu VNĐ
        ];

        $chiTiet = [
            ['ma_sp' => 'SP001', 'ten_sp' => 'Chuỗi Tỳ Hưu Thạch Anh Tóc Vàng', 'ton_he_thong' => 150, 'ton_thuc_te' => 148, 'chenh_lech' => -2, 'gia_von' => 1500000, 'thanh_tien_lech' => -3000000, 'ghi_chu' => 'Rơi mất hạt, thất lạc'],
            ['ma_sp' => 'SP002', 'ten_sp' => 'Vòng Ngọc Bích Tự Nhiên', 'ton_he_thong' => 85, 'ton_thuc_te' => 85, 'chenh_lech' => 0, 'gia_von' => 2200000, 'thanh_tien_lech' => 0, 'ghi_chu' => ''],
        ];

        $this->view('admin_kiem_ke_chitiet', [
            'current_page' => 'kiem_ke',
            'phieu' => $phieu,
            'chiTiet' => $chiTiet
        ], 'admin');
    }
}
