<?php
// app/Controllers/Admin/ThuyenChuyenController.php

namespace App\Controllers\Admin;

use App\Core\Controller;

class ThuyenChuyenController extends Controller
{
    private function getMockDanhSachKho()
    {
        return [
            ['id' => 'KHO001', 'ten' => 'Kho Tổng - Hà Nội', 'dia_chi' => '123 Cầu Giấy, Hà Nội'],
            ['id' => 'KHO002', 'ten' => 'Kho Cửa Hàng - Cầu Giấy', 'dia_chi' => '456 Xuân Thủy, Hà Nội'],
            ['id' => 'KHO003', 'ten' => 'Kho Cửa Hàng - Q1 HCM', 'dia_chi' => '789 Nguyễn Trãi, Q1, HCM'],
        ];
    }

    private function getMockThuyenChuyenList()
    {
        return [
            [
                'id' => 'TC2310-001',
                'kho_xuat' => 'Kho Tổng - Hà Nội',
                'kho_nhap' => 'Kho Cửa Hàng - Cầu Giấy',
                'so_luong_sp' => 150,
                'nguoi_tao' => 'Admin',
                'ngay_tao' => '24/10/2023 09:30',
                'trang_thai' => 'Đã nhập kho'
            ],
            [
                'id' => 'TC2310-002',
                'kho_xuat' => 'Kho Cửa Hàng - Cầu Giấy',
                'kho_nhap' => 'Kho Cửa Hàng - Q1 HCM',
                'so_luong_sp' => 50,
                'nguoi_tao' => 'Tran Van A',
                'ngay_tao' => '25/10/2023 14:15',
                'trang_thai' => 'Đang vận chuyển'
            ],
            [
                'id' => 'TC2310-003',
                'kho_xuat' => 'Kho Tổng - Hà Nội',
                'kho_nhap' => 'Kho Cửa Hàng - Cầu Giấy',
                'so_luong_sp' => 300,
                'nguoi_tao' => 'Admin',
                'ngay_tao' => '26/10/2023 10:00',
                'trang_thai' => 'Chờ duyệt'
            ],
        ];
    }

    public function index()
    {
        $phieuThuyenChuyenList = $this->getMockThuyenChuyenList();
        
        $stats = [
            'tat_ca' => count($phieuThuyenChuyenList),
            'cho_duyet' => 1,
            'dang_van_chuyen' => 1,
            'hoan_thanh' => 1
        ];

        $this->view('admin_thuyen_chuyen', [
            'current_page' => 'thuyen_chuyen_kho',
            'phieuThuyenChuyenList' => $phieuThuyenChuyenList,
            'stats' => $stats
        ], 'admin');
    }

    public function create()
    {
        $danhSachKho = $this->getMockDanhSachKho();
        
        // Giả lập danh sách sản phẩm để chọn
        $sanPhamList = [
            ['id' => 'SP001', 'ten' => 'Chuỗi Tỳ Hưu Thạch Anh Tóc Vàng', 'ton_kho' => 150],
            ['id' => 'SP002', 'ten' => 'Vòng Ngọc Bích Tự Nhiên', 'ton_kho' => 85],
            ['id' => 'SP003', 'ten' => 'Mặt Dây Chuyền Hồ Ly Cửu Vĩ', 'ton_kho' => 30],
        ];

        $this->view('admin_thuyen_chuyen_them', [
            'current_page' => 'thuyen_chuyen_kho',
            'danhSachKho' => $danhSachKho,
            'sanPhamList' => $sanPhamList
        ], 'admin');
    }

    public function show($id)
    {
        // Mock data chi tiết phiếu thuyên chuyển
        $phieu = [
            'id' => $id,
            'kho_xuat' => 'Kho Tổng - Hà Nội',
            'kho_nhap' => 'Kho Cửa Hàng - Cầu Giấy',
            'nguoi_tao' => 'Admin',
            'ngay_tao' => '24/10/2023 09:30',
            'ngay_duyet' => '24/10/2023 10:00',
            'ngay_xuat' => '24/10/2023 10:30',
            'ngay_nhap' => '24/10/2023 15:00',
            'trang_thai' => 'Đã nhập kho', // 'Chờ duyệt', 'Đang xuất kho', 'Đang vận chuyển', 'Đã nhập kho'
            'ghi_chu' => 'Chuyển hàng bù kho bán lẻ',
            'tong_so_luong' => 150
        ];

        $chiTiet = [
            ['ma_sp' => 'SP001', 'ten_sp' => 'Chuỗi Tỳ Hưu Thạch Anh Tóc Vàng', 'so_luong' => 100],
            ['ma_sp' => 'SP002', 'ten_sp' => 'Vòng Ngọc Bích Tự Nhiên', 'so_luong' => 50],
        ];

        $this->view('admin_thuyen_chuyen_chitiet', [
            'current_page' => 'thuyen_chuyen_kho',
            'phieu' => $phieu,
            'chiTiet' => $chiTiet
        ], 'admin');
    }
}
