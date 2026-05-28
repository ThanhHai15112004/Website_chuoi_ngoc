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
            ['id' => 'KHO002', 'ten' => 'Kho Online - TP.HCM'],
            ['id' => 'KHO003', 'ten' => 'Kho Cửa Hàng - Cầu Giấy'],
        ];
    }

    private function getMockDanhSachKiemKe()
    {
        return [
            [
                'id' => 'KK202600123',
                'kho' => 'Kho Tổng - Hà Nội',
                'loai' => 'Toàn kho',
                'ngay_tao' => '26/05/2026',
                'gio_tao' => '09:30',
                'han_hoan_tat' => '30/05/2026',
                'nguoi_tao' => 'Admin (Quản trị)',
                'nguoi_kiem_ke' => 'Trần Văn A +2',
                'nguoi_duyet' => 'Chưa duyệt',
                'so_sp' => 120,
                'so_sai_lech' => 0,
                'trang_thai' => 'Nháp'
            ],
            [
                'id' => 'KK202600122',
                'kho' => 'Kho Online - TP.HCM',
                'loai' => 'Danh mục',
                'ngay_tao' => '25/05/2026',
                'gio_tao' => '14:20',
                'han_hoan_tat' => '25/05/2026',
                'nguoi_tao' => 'Lê Thị B',
                'nguoi_kiem_ke' => 'Trần Văn A',
                'nguoi_duyet' => 'Chưa duyệt',
                'so_sp' => 45,
                'so_sai_lech' => 0,
                'trang_thai' => 'Đang kiểm kê'
            ],
            [
                'id' => 'KK202600121',
                'kho' => 'Kho Cửa Hàng - Cầu Giấy',
                'loai' => 'Sản phẩm',
                'ngay_tao' => '23/05/2026',
                'gio_tao' => '10:00',
                'han_hoan_tat' => '24/05/2026',
                'nguoi_tao' => 'Nguyễn Văn C',
                'nguoi_kiem_ke' => 'Lê Thị B',
                'nguoi_duyet' => 'Chưa duyệt',
                'so_sp' => 15,
                'so_sai_lech' => -3, // Có lệch thiếu
                'trang_thai' => 'Chờ duyệt'
            ],
            [
                'id' => 'KK202600120',
                'kho' => 'Kho Cửa Hàng - Cầu Giấy',
                'loai' => 'Định kỳ',
                'ngay_tao' => '20/05/2026',
                'gio_tao' => '08:00',
                'han_hoan_tat' => '20/05/2026',
                'nguoi_tao' => 'Admin (Quản trị)',
                'nguoi_kiem_ke' => 'Nguyễn Văn C',
                'nguoi_duyet' => 'Admin (Quản trị)',
                'so_sp' => 50,
                'so_sai_lech' => 2, // Thừa
                'trang_thai' => 'Hoàn tất'
            ],
            [
                'id' => 'KK202600119',
                'kho' => 'Kho Tổng - Hà Nội',
                'loai' => 'Loại đá',
                'ngay_tao' => '15/05/2026',
                'gio_tao' => '11:15',
                'han_hoan_tat' => '16/05/2026',
                'nguoi_tao' => 'Admin (Quản trị)',
                'nguoi_kiem_ke' => 'Chưa gán',
                'nguoi_duyet' => 'Chưa duyệt',
                'so_sp' => 12,
                'so_sai_lech' => 0,
                'trang_thai' => 'Đã hủy'
            ]
        ];
    }

    public function index()
    {
        $danhSachKK = $this->getMockDanhSachKiemKe();
        
        $stats = [
            'tat_ca' => 86,
            'dang_kiem_ke' => 4,
            'cho_duyet' => 3,
            'da_hoan_tat' => 72,
            'co_chenh_lech' => 12,
            'san_pham_lech' => 38,
            'gia_tri_lech' => -6500000 // Âm là thất thoát
        ];

        $this->view('admin_kiem_ke', [
            'current_page' => 'kiem_ke',
            'danhSachKK' => $danhSachKK,
            'stats' => $stats
        ], 'admin');
    }

    public function taoMoi()
    {
        $danhSachKho = $this->getMockKho();
        
        $sanPhamList = [
            ['id' => 'SP001', 'ten' => 'Chuỗi Tỳ Hưu Thạch Anh Tóc Vàng', 'ton_he_thong' => 150],
            ['id' => 'SP002', 'ten' => 'Vòng Ngọc Bích Tự Nhiên', 'ton_he_thong' => 85],
            ['id' => 'SP003', 'ten' => 'Mặt Dây Chuyền Hồ Ly Cửu Vĩ', 'ton_he_thong' => 30],
            ['id' => 'SP004', 'ten' => 'Vòng Trầm Hương 108 Hạt', 'ton_he_thong' => 42],
            ['id' => 'SP005', 'ten' => 'Nhẫn Tỳ Hưu Mắt Hổ', 'ton_he_thong' => 18],
        ];

        $this->view('admin_kiem_ke_them', [
            'current_page' => 'kiem_ke',
            'danhSachKho' => $danhSachKho,
            'sanPhamList' => $sanPhamList
        ], 'admin');
    }

    public function chiTiet($id)
    {
        $phieu = [
            'id' => $id,
            'ten_dot' => 'Kiểm kê kho tổng tháng 5',
            'kho' => 'Kho Tổng - Hà Nội',
            'loai' => 'Toàn kho',
            'nguoi_tao' => 'Admin (Quản trị)',
            'nguoi_kiem_ke' => 'Trần Văn A, Lê Thị B',
            'nguoi_duyet' => 'Chưa duyệt',
            'ngay_tao' => '26/05/2026',
            'gio_tao' => '09:30',
            'han_hoan_tat' => '30/05/2026',
            'trang_thai' => 'Đang kiểm kê', // Nháp, Đang kiểm kê, Chờ duyệt, Đã duyệt, Đã điều chỉnh kho, Hoàn tất, Đã hủy
            'ghi_chu' => 'Ưu tiên kiểm tra khu vực vòng ngọc bích.',
            'tong_sp' => 120,
            'da_kiem' => 45,
            'tong_chenh_lech' => -3,
            'gia_tri_lech' => -4500000
        ];

        $chiTiet = [
            ['ma_sp' => 'SP001', 'ten_sp' => 'Chuỗi Tỳ Hưu Thạch Anh Tóc Vàng', 'ton_he_thong' => 150, 'ton_thuc_te' => 148, 'chenh_lech' => -2, 'gia_von' => 1500000, 'thanh_tien_lech' => -3000000, 'ly_do' => 'Mất hàng', 'ghi_chu' => 'Tìm không thấy ở kệ B', 'trang_thai_kiem' => 'Có chênh lệch'],
            ['ma_sp' => 'SP002', 'ten_sp' => 'Vòng Ngọc Bích Tự Nhiên', 'ton_he_thong' => 85, 'ton_thuc_te' => 85, 'chenh_lech' => 0, 'gia_von' => 2200000, 'thanh_tien_lech' => 0, 'ly_do' => '', 'ghi_chu' => '', 'trang_thai_kiem' => 'Đã kiểm'],
            ['ma_sp' => 'SP003', 'ten_sp' => 'Mặt Dây Chuyền Hồ Ly Cửu Vĩ', 'ton_he_thong' => 30, 'ton_thuc_te' => 32, 'chenh_lech' => 2, 'gia_von' => 800000, 'thanh_tien_lech' => 1600000, 'ly_do' => 'Khách trả hàng chưa nhập kho', 'ghi_chu' => 'Để trên bàn thu ngân', 'trang_thai_kiem' => 'Có chênh lệch'],
            ['ma_sp' => 'SP004', 'ten_sp' => 'Vòng Trầm Hương 108 Hạt', 'ton_he_thong' => 42, 'ton_thuc_te' => null, 'chenh_lech' => null, 'gia_von' => 4500000, 'thanh_tien_lech' => 0, 'ly_do' => '', 'ghi_chu' => '', 'trang_thai_kiem' => 'Chưa kiểm'],
        ];

        $this->view('admin_kiem_ke_chitiet', [
            'current_page' => 'kiem_ke',
            'phieu' => $phieu,
            'chiTiet' => $chiTiet
        ], 'admin');
    }
}
