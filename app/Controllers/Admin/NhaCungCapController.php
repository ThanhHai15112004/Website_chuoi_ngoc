<?php
// app/Controllers/Admin/NhaCungCapController.php

namespace App\Controllers\Admin;

use App\Core\Controller;

class NhaCungCapController extends Controller
{
    private function getMockDanhSach()
    {
        return [
            [
                'id' => 'NCC001',
                'ten' => 'Xưởng Chế Tác Đá Quý Phú Nhuận',
                'nhom' => 'Xưởng gia công',
                'sdt' => '0988123456',
                'dia_chi' => 'Phường 5, Quận Phú Nhuận, TP.HCM',
                'tong_mua' => 1500000000,
                'cong_no' => 200000000,
                'trang_thai' => 'Đang giao dịch'
            ],
            [
                'id' => 'NCC002',
                'ten' => 'Đại Lý Vàng Bạc Đá Quý Doji',
                'nhom' => 'Đối tác Vàng Bạc',
                'sdt' => '0909123456',
                'dia_chi' => 'Lê Ngọc Hân, Hai Bà Trưng, Hà Nội',
                'tong_mua' => 850000000,
                'cong_no' => 0,
                'trang_thai' => 'Đang giao dịch'
            ],
            [
                'id' => 'NCC003',
                'ten' => 'Kho Đá Thạch Anh Lục Yên',
                'nhom' => 'Chợ đá quý',
                'sdt' => '0912345678',
                'dia_chi' => 'Chợ Đá Quý Lục Yên, Yên Bái',
                'tong_mua' => 420000000,
                'cong_no' => -50000000, // Đã trả trước
                'trang_thai' => 'Ngừng giao dịch'
            ],
        ];
    }

    public function index()
    {
        $danhSach = $this->getMockDanhSach();
        
        $stats = [
            'tong_ncc' => count($danhSach),
            'tong_no' => 150000000 // 150tr (200tr nợ - 50tr trả trước)
        ];

        $this->view('admin_nha_cung_cap', [
            'current_page' => 'nha_cung_cap',
            'danhSach' => $danhSach,
            'stats' => $stats
        ], 'admin');
    }

    public function create()
    {
        $this->view('admin_nha_cung_cap_them', [
            'current_page' => 'nha_cung_cap',
            'mode' => 'create'
        ], 'admin');
    }

    public function edit($id)
    {
        // Mock data
        $ncc = [
            'id' => $id,
            'ten' => 'Xưởng Chế Tác Đá Quý Phú Nhuận',
            'nhom' => 'Xưởng gia công',
            'sdt' => '0988123456',
            'email' => 'xuongpn@gmail.com',
            'dia_chi' => 'Phường 5, Quận Phú Nhuận, TP.HCM',
            'mst' => '0312345678',
            'stk' => '123456789 - VCB - Nguyen Van A',
            'ghi_chu' => 'Giao hàng đúng hẹn, thợ giỏi'
        ];

        $this->view('admin_nha_cung_cap_them', [
            'current_page' => 'nha_cung_cap',
            'mode' => 'edit',
            'ncc' => $ncc
        ], 'admin');
    }

    public function show($id)
    {
        $ncc = [
            'id' => $id,
            'ten' => 'Xưởng Chế Tác Đá Quý Phú Nhuận',
            'nhom' => 'Xưởng gia công',
            'sdt' => '0988123456',
            'email' => 'xuongpn@gmail.com',
            'dia_chi' => 'Phường 5, Quận Phú Nhuận, TP.HCM',
            'stk' => '123456789 - VCB - Nguyen Van A',
            'tong_mua' => 1500000000,
            'da_tra' => 1300000000,
            'cong_no' => 200000000
        ];

        $lichSuNhap = [
            ['id' => 'PN2310-001', 'ngay' => '15/10/2023', 'tong_tien' => 500000000, 'da_tra' => 400000000, 'con_no' => 100000000, 'trang_thai' => 'Nợ 1 phần'],
            ['id' => 'PN2309-005', 'ngay' => '20/09/2023', 'tong_tien' => 1000000000, 'da_tra' => 900000000, 'con_no' => 100000000, 'trang_thai' => 'Nợ 1 phần']
        ];

        $lichSuCongNo = [
            ['ngay' => '15/10/2023', 'loai' => 'Nhập nợ', 'chung_tu' => 'PN2310-001', 'so_tien' => 500000000, 'du_no_cuoi' => 300000000],
            ['ngay' => '16/10/2023', 'loai' => 'Thanh toán', 'chung_tu' => 'PC2310-002', 'so_tien' => -100000000, 'du_no_cuoi' => 200000000]
        ];

        $this->view('admin_nha_cung_cap_chitiet', [
            'current_page' => 'nha_cung_cap',
            'ncc' => $ncc,
            'lichSuNhap' => $lichSuNhap,
            'lichSuCongNo' => $lichSuCongNo
        ], 'admin');
    }
}
