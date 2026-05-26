<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class NhapKhoController extends Controller
{
    /**
     * Danh sách phiếu nhập kho
     */
    public function index()
    {
        // Mock data
        $phieuNhapList = [
            [
                'id' => 'PNK260501',
                'nha_cung_cap' => 'Xưởng Ngọc Bích HN',
                'ngay_tao' => '26/05/2026',
                'nguoi_tao' => 'Hải Admin',
                'tong_tien' => 12500000,
                'so_luong_sp' => 50,
                'trang_thai' => 'Hoàn thành'
            ],
            [
                'id' => 'PNK260502',
                'nha_cung_cap' => 'Đại lý Thạch Anh Tự nhiên',
                'ngay_tao' => '25/05/2026',
                'nguoi_tao' => 'Nhân viên Kho',
                'tong_tien' => 8400000,
                'so_luong_sp' => 25,
                'trang_thai' => 'Đang nhập hàng'
            ],
            [
                'id' => 'PNK260503',
                'nha_cung_cap' => 'Trầm Hương Quảng Nam',
                'ngay_tao' => '24/05/2026',
                'nguoi_tao' => 'Hải Admin',
                'tong_tien' => 45000000,
                'so_luong_sp' => 120,
                'trang_thai' => 'Chờ duyệt'
            ],
            [
                'id' => 'PNK260504',
                'nha_cung_cap' => 'Xưởng Chế Tác Ruby',
                'ngay_tao' => '20/05/2026',
                'nguoi_tao' => 'Nhân viên Kho',
                'tong_tien' => 15000000,
                'so_luong_sp' => 10,
                'trang_thai' => 'Đã hủy'
            ],
        ];

        $stats = [
            'tat_ca' => 45,
            'cho_duyet' => 5,
            'dang_nhap' => 3,
            'hoan_thanh' => 35
        ];

        $this->view('admin_nhap_kho', [
            'title' => 'Quản lý Phiếu Nhập Kho',
            'current_page' => 'nhap_kho',
            'phieuNhapList' => $phieuNhapList,
            'stats' => $stats
        ], 'admin');
    }

    /**
     * Màn hình tạo phiếu nhập kho
     */
    public function create()
    {
        $nhaCungCapList = [
            ['id' => 1, 'ten' => 'Xưởng Ngọc Bích HN'],
            ['id' => 2, 'ten' => 'Đại lý Thạch Anh Tự nhiên'],
            ['id' => 3, 'ten' => 'Trầm Hương Quảng Nam'],
            ['id' => 4, 'ten' => 'Xưởng Chế Tác Ruby']
        ];

        $this->view('admin_nhap_kho_them', [
            'title' => 'Tạo Phiếu Nhập Kho Mới',
            'current_page' => 'nhap_kho',
            'nhaCungCapList' => $nhaCungCapList
        ], 'admin');
    }

    /**
     * Màn hình chi tiết / duyệt phiếu nhập kho
     */
    public function show($id)
    {
        // Mock data chi tiết cho 1 phiếu
        $phieuNhap = [
            'id' => $id,
            'nha_cung_cap' => 'Xưởng Ngọc Bích HN',
            'ngay_tao' => '26/05/2026 10:30',
            'nguoi_tao' => 'Hải Admin',
            'ngay_duyet' => '26/05/2026 14:00',
            'nguoi_duyet' => 'Giám đốc',
            'ghi_chu' => 'Nhập bổ sung lô hàng vòng ngọc bích bị thiếu tháng trước.',
            'trang_thai' => 'Đang nhập hàng', // Khởi tạo, Chờ duyệt, Đang nhập hàng, Hoàn thành
            'tong_tien_yeu_cau' => 12500000,
            'tong_tien_thuc_te' => 12000000 // Do có 1 SP nhập thiếu
        ];

        $danhSachSP = [
            [
                'id' => 1,
                'sku' => 'NB-TL-001',
                'ten' => 'Vòng Ngọc Bích Tài Lộc',
                'bien_the' => 'Size 16cm',
                'don_gia' => 200000,
                'sl_yeu_cau' => 50,
                'sl_thuc_nhan' => 50,
                'thanh_tien' => 10000000
            ],
            [
                'id' => 2,
                'sku' => 'NB-TL-002',
                'ten' => 'Vòng Ngọc Bích Tài Lộc',
                'bien_the' => 'Size 18cm',
                'don_gia' => 250000,
                'sl_yeu_cau' => 10,
                'sl_thuc_nhan' => 8, // Thiếu 2 cái
                'thanh_tien' => 2000000
            ]
        ];

        $this->view('admin_nhap_kho_chitiet', [
            'title' => 'Chi Tiết Phiếu Nhập Kho: ' . $id,
            'current_page' => 'nhap_kho',
            'phieuNhap' => $phieuNhap,
            'danhSachSP' => $danhSachSP
        ], 'admin');
    }
}
