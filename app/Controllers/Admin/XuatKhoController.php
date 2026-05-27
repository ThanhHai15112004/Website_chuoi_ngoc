<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class XuatKhoController extends Controller
{
    /**
     * Danh sách phiếu xuất kho
     */
    public function index()
    {
        // Mock data
        $phieuXuatList = [
            [
                'id' => 'PXK260501',
                'ly_do' => 'Xuất bán hàng (Đơn Shopee)',
                'ngay_tao' => '26/05/2026',
                'nguoi_tao' => 'Hải Admin',
                'so_luong_sp' => 12,
                'trang_thai' => 'Hoàn thành'
            ],
            [
                'id' => 'PXK260502',
                'ly_do' => 'Xuất hàng hỏng/lỗi',
                'ngay_tao' => '25/05/2026',
                'nguoi_tao' => 'Nhân viên Kho',
                'so_luong_sp' => 2,
                'trang_thai' => 'Chờ duyệt'
            ],
            [
                'id' => 'PXK260503',
                'ly_do' => 'Xuất tặng/Tiêu hao nội bộ',
                'ngay_tao' => '24/05/2026',
                'nguoi_tao' => 'Giám đốc',
                'so_luong_sp' => 5,
                'trang_thai' => 'Đang xuất hàng'
            ],
            [
                'id' => 'PXK260504',
                'ly_do' => 'Xuất trả Nhà cung cấp',
                'ngay_tao' => '20/05/2026',
                'nguoi_tao' => 'Hải Admin',
                'so_luong_sp' => 10,
                'trang_thai' => 'Đã hủy'
            ],
        ];

        $stats = [
            'tat_ca' => 38,
            'cho_duyet' => 3,
            'dang_xuat' => 2,
            'hoan_thanh' => 32
        ];

        $this->view('admin_xuat_kho', [
            'title' => 'Quản lý Phiếu Xuất Kho',
            'current_page' => 'xuat_kho',
            'phieuXuatList' => $phieuXuatList,
            'stats' => $stats
        ], 'admin');
    }

    /**
     * Màn hình tạo phiếu xuất kho
     */
    public function create()
    {
        $this->view('admin_xuat_kho_them', [
            'title' => 'Tạo Phiếu Xuất Kho Mới',
            'current_page' => 'xuat_kho'
        ], 'admin');
    }

    /**
     * Màn hình chi tiết / duyệt phiếu xuất kho
     */
    public function show($id)
    {
        // Mock data chi tiết cho 1 phiếu
        $phieuXuat = [
            'id' => $id,
            'ly_do' => 'Xuất hàng hỏng/lỗi',
            'ngay_tao' => '26/05/2026 10:30',
            'nguoi_tao' => 'Nhân viên Kho',
            'ngay_duyet' => '',
            'nguoi_duyet' => '',
            'ghi_chu' => 'Xuất các sản phẩm bị nứt, xước trong quá trình kiểm kê kho tuần 4 tháng 5.',
            'trang_thai' => 'Chờ duyệt', // Khởi tạo, Chờ duyệt, Đang xuất hàng, Hoàn thành
            'tong_so_luong' => 2
        ];

        $danhSachSP = [
            [
                'id' => 1,
                'sku' => 'NB-TL-001',
                'ten' => 'Vòng Ngọc Bích Tài Lộc',
                'bien_the' => 'Size 16cm',
                'sl_ton_kho' => 25,
                'sl_xuat' => 1
            ],
            [
                'id' => 2,
                'sku' => 'TA-T-003',
                'ten' => 'Vòng Thạch Anh Tím Cao Cấp',
                'bien_the' => 'Mặc định',
                'sl_ton_kho' => 5,
                'sl_xuat' => 1
            ]
        ];

        $this->view('admin_xuat_kho_chitiet', [
            'title' => 'Chi Tiết Phiếu Xuất Kho: ' . $id,
            'current_page' => 'xuat_kho',
            'phieuXuat' => $phieuXuat,
            'danhSachSP' => $danhSachSP
        ], 'admin');
    }

    /**
     * Màn hình chuẩn bị hàng / xuất kho
     */
    public function prepare($id)
    {
        $this->view('admin_xuat_kho_chuan_bi', [
            'title' => 'Chuẩn bị hàng xuất kho: ' . $id,
            'current_page' => 'xuat_kho',
            'id' => $id
        ], 'admin');
    }
}
