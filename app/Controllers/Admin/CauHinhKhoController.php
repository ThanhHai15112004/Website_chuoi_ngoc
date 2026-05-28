<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class CauHinhKhoController extends Controller
{
    public function index()
    {
        // Mock data cho Thống kê
        $stats = [
            'tong_kho' => 5,
            'dang_hoat_dong' => 4,
            'khu_vuc' => 28,
            'vi_tri' => 126,
            'chua_gan_vi_tri' => 18,
            'can_kiem_tra' => 3
        ];

        // Mock data cho Danh sách kho
        $danhSachKho = [
            [
                'id' => 'KHO-ONLINE',
                'ten' => 'Kho Online',
                'loai' => 'Kho online',
                'mo_ta' => 'Lưu hàng sẵn bán cho website',
                'dia_chi' => '123 Nguyễn Trãi, Quận 5, TP.HCM',
                'nguoi_phu_trach' => 'Hải Admin',
                'vai_tro_npt' => 'Quản lý kho',
                'so_khu_vuc' => 6,
                'so_ke' => 24,
                'so_san_pham' => 128,
                'tong_ton' => 2450,
                'mac_dinh' => true,
                'trang_thai' => 'Đang hoạt động',
                'cap_nhat_cuoi' => '18/05/2026'
            ],
            [
                'id' => 'KHO-TONG',
                'ten' => 'Kho Tổng',
                'loai' => 'Kho tổng',
                'mo_ta' => 'Lưu trữ lượng lớn hàng hóa',
                'dia_chi' => 'KCN Tân Bình, TP.HCM',
                'nguoi_phu_trach' => 'Trần Văn B',
                'vai_tro_npt' => 'Nhân viên kho',
                'so_khu_vuc' => 12,
                'so_ke' => 60,
                'so_san_pham' => 450,
                'tong_ton' => 15000,
                'mac_dinh' => false,
                'trang_thai' => 'Đang hoạt động',
                'cap_nhat_cuoi' => '10/05/2026'
            ],
            [
                'id' => 'KHO-CUA-HANG-Q1',
                'ten' => 'Kho Cửa Hàng Q1',
                'loai' => 'Kho cửa hàng',
                'mo_ta' => 'Hàng trưng bày và bán trực tiếp',
                'dia_chi' => '45 Lê Lợi, Quận 1, TP.HCM',
                'nguoi_phu_trach' => 'Lê Thị C',
                'vai_tro_npt' => 'Cửa hàng trưởng',
                'so_khu_vuc' => 4,
                'so_ke' => 15,
                'so_san_pham' => 85,
                'tong_ton' => 320,
                'mac_dinh' => false,
                'trang_thai' => 'Đang hoạt động',
                'cap_nhat_cuoi' => '12/05/2026'
            ],
            [
                'id' => 'KHO-CHO-KIEM',
                'ten' => 'Kho Chờ Kiểm',
                'loai' => 'Kho chờ kiểm',
                'mo_ta' => 'Hàng mới nhập chưa qua QC',
                'dia_chi' => 'Khu vực nội bộ, không hiển thị',
                'nguoi_phu_trach' => '',
                'vai_tro_npt' => '',
                'so_khu_vuc' => 2,
                'so_ke' => 5,
                'so_san_pham' => 12,
                'tong_ton' => 150,
                'mac_dinh' => false,
                'trang_thai' => 'Chờ cấu hình',
                'cap_nhat_cuoi' => '15/05/2026'
            ],
            [
                'id' => 'KHO-BAO-HANH',
                'ten' => 'Kho Bảo Hành / Lỗi',
                'loai' => 'Kho lỗi',
                'mo_ta' => 'Hàng lỗi từ khách hoặc NCC',
                'dia_chi' => '123 Nguyễn Trãi, Quận 5, TP.HCM',
                'nguoi_phu_trach' => 'Hải Admin',
                'vai_tro_npt' => 'Quản lý kho',
                'so_khu_vuc' => 4,
                'so_ke' => 22,
                'so_san_pham' => 35,
                'tong_ton' => 45,
                'mac_dinh' => false,
                'trang_thai' => 'Tạm ngừng',
                'cap_nhat_cuoi' => '01/05/2026'
            ]
        ];

        // Dữ liệu Sơ đồ khu vực (Tree View)
        $treeKhuVuc = [
            'KHO-ONLINE' => [
                'ten' => 'Kho Online',
                'children' => [
                    ['id' => 'KV-A', 'ten' => 'Khu A - Vòng ngọc', 'loai' => 'Khu', 'children' => [
                        ['id' => 'KE-A1', 'ten' => 'Kệ A1', 'loai' => 'Kệ'],
                        ['id' => 'KE-A2', 'ten' => 'Kệ A2', 'loai' => 'Kệ', 'children' => [
                            ['id' => 'NGAN-A2-01', 'ten' => 'Ngăn A2-01', 'loai' => 'Ngăn']
                        ]]
                    ]],
                    ['id' => 'KV-B', 'ten' => 'Khu B - Vòng đá', 'loai' => 'Khu', 'children' => [
                        ['id' => 'KE-B1', 'ten' => 'Kệ B1', 'loai' => 'Kệ']
                    ]]
                ]
            ]
        ];

        // Nhật ký cấu hình
        $nhatKy = [
            ['thoi_gian' => '18/05/2026 09:30', 'nguoi_thao_tac' => 'Hải Admin', 'hanh_dong' => 'Đổi kho mặc định', 'module' => 'Kho online', 'cu' => 'Kho tổng', 'moi' => 'Kho online'],
            ['thoi_gian' => '18/05/2026 10:15', 'nguoi_thao_tac' => 'Hải Admin', 'hanh_dong' => 'Bật cảnh báo tồn âm', 'module' => 'Cảnh báo kho', 'cu' => 'Tắt', 'moi' => 'Bật']
        ];

        $this->view('admin_cau_hinh_kho', [
            'current_page' => 'cau_hinh_kho',
            'stats' => $stats,
            'danhSachKho' => $danhSachKho,
            'treeKhuVuc' => $treeKhuVuc,
            'nhatKy' => $nhatKy
        ], 'admin');
    }

    public function taoMoi()
    {
        $this->view('admin_cau_hinh_kho_them', [
            'current_page' => 'cau_hinh_kho',
            'isEdit' => false
        ], 'admin');
    }

    public function trangCapNhat($id)
    {
        $this->view('admin_cau_hinh_kho_them', [
            'current_page' => 'cau_hinh_kho',
            'isEdit' => true,
            'khoId' => $id
        ], 'admin');
    }
}
