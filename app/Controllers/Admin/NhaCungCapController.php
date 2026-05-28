<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class NhaCungCapController extends Controller
{
    public function index()
    {
        // Mock data cho thống kê
        $stats = [
            'tong' => 36,
            'dang_hop_tac' => 28,
            'tam_ngung' => 5,
            'ngung_hop_tac' => 3,
            'tong_gia_tri' => 420000000,
            'co_cong_no' => 4,
            'danh_gia_tot' => 18
        ];

        // Mock data danh sách
        $danhSachNCC = [
            [
                'id' => 'NCC001',
                'ten' => 'Công ty Ngọc An Phát',
                'loai' => 'Đá / ngọc thô',
                'khu_vuc' => 'TP.HCM',
                'nguoi_lien_he' => 'Anh Minh',
                'chuc_vu' => 'Kinh doanh',
                'sdt' => '0901234567',
                'email' => 'minh@ngocanphat.com',
                'nhom_hang' => ['Ngọc bích', 'Thạch anh', 'Ruby'],
                'lan_nhap_gan_nhat' => '18/05/2026',
                'phieu_nhap_gan_nhat' => 'NK202600123',
                'tong_phieu' => 24,
                'tong_gia_tri' => 85000000,
                'cong_no' => 12500000,
                'han_no' => '30/05/2026',
                'danh_gia' => 4.8,
                'trang_thai' => 'Đang hợp tác',
                'ngay_cap_nhat' => '18/05/2026',
                'nguoi_cap_nhat' => 'Hải Admin'
            ],
            [
                'id' => 'NCC002',
                'ten' => 'Xưởng Vòng Phong Thủy Minh Châu',
                'loai' => 'Sản phẩm hoàn thiện',
                'khu_vuc' => 'Hà Nội',
                'nguoi_lien_he' => 'Chị Lan',
                'chuc_vu' => 'Quản lý đơn hàng',
                'sdt' => '0987654321',
                'email' => 'lan@minhchau.vn',
                'nhom_hang' => ['Vòng tay', 'Chuỗi hạt', 'Charm'],
                'lan_nhap_gan_nhat' => '15/05/2026',
                'phieu_nhap_gan_nhat' => 'NK202600110',
                'tong_phieu' => 42,
                'tong_gia_tri' => 150000000,
                'cong_no' => 0,
                'han_no' => null,
                'danh_gia' => 4.9,
                'trang_thai' => 'Đang hợp tác',
                'ngay_cap_nhat' => '15/05/2026',
                'nguoi_cap_nhat' => 'Hải Admin'
            ],
            [
                'id' => 'NCC003',
                'ten' => 'Xưởng Mộc Trầm Hương',
                'loai' => 'Sản phẩm hoàn thiện',
                'khu_vuc' => 'Đà Nẵng',
                'nguoi_lien_he' => 'Anh Quốc',
                'chuc_vu' => 'Chủ xưởng',
                'sdt' => '0933112233',
                'email' => 'quoc.tramhuong@gmail.com',
                'nhom_hang' => ['Vòng trầm', 'Nhang trầm'],
                'lan_nhap_gan_nhat' => '02/04/2026',
                'phieu_nhap_gan_nhat' => 'NK202600085',
                'tong_phieu' => 15,
                'tong_gia_tri' => 45000000,
                'cong_no' => 5000000,
                'han_no' => '20/05/2026',
                'danh_gia' => 3.5,
                'trang_thai' => 'Tạm ngừng',
                'ngay_cap_nhat' => '10/05/2026',
                'nguoi_cap_nhat' => 'Quản lý Kho'
            ],
            [
                'id' => 'NCC004',
                'ten' => 'Công ty Bao Bì Tinh Tế',
                'loai' => 'Vật tư đóng gói',
                'khu_vuc' => 'TP.HCM',
                'nguoi_lien_he' => 'Chị Phương',
                'chuc_vu' => 'Sale',
                'sdt' => '0911223344',
                'email' => 'phuong@baobitnhte.vn',
                'nhom_hang' => ['Hộp quà', 'Túi nhung', 'Ruy băng'],
                'lan_nhap_gan_nhat' => null,
                'phieu_nhap_gan_nhat' => null,
                'tong_phieu' => 0,
                'tong_gia_tri' => 0,
                'cong_no' => 0,
                'han_no' => null,
                'danh_gia' => 0,
                'trang_thai' => 'Chờ xác minh',
                'ngay_cap_nhat' => '25/05/2026',
                'nguoi_cap_nhat' => 'Hải Admin'
            ],
            [
                'id' => 'NCC005',
                'ten' => 'Kho Đá Quý SJC',
                'loai' => 'Đá quý',
                'khu_vuc' => 'Hà Nội',
                'nguoi_lien_he' => '',
                'chuc_vu' => '',
                'sdt' => '',
                'email' => '',
                'nhom_hang' => [],
                'lan_nhap_gan_nhat' => '10/12/2025',
                'phieu_nhap_gan_nhat' => 'NK202500999',
                'tong_phieu' => 5,
                'tong_gia_tri' => 120000000,
                'cong_no' => 0,
                'han_no' => null,
                'danh_gia' => 2.5,
                'trang_thai' => 'Ngừng hợp tác',
                'ngay_cap_nhat' => '15/01/2026',
                'nguoi_cap_nhat' => 'Hải Admin'
            ]
        ];

        $this->view('admin_nha_cung_cap', [
            'current_page' => 'nha_cung_cap',
            'stats' => $stats,
            'danhSachNCC' => $danhSachNCC
        ], 'admin');
    }

    public function taoMoi()
    {
        $this->view('admin_nha_cung_cap_them', [
            'current_page' => 'nha_cung_cap',
            'isEdit' => false
        ], 'admin');
    }

    public function trangCapNhat($id)
    {
        $this->view('admin_nha_cung_cap_them', [
            'current_page' => 'nha_cung_cap',
            'isEdit' => true,
            'nccId' => $id
        ], 'admin');
    }

    // API endpoints cho Drawer
    public function chiTiet($id)
    {
        // Mock data chi tiết
        $data = [
            'id' => $id,
            'ten' => 'Công ty Ngọc An Phát',
            'loai' => 'Đá / ngọc thô',
            'khu_vuc' => 'TP.HCM',
            'nguoi_lien_he' => 'Anh Minh',
            'chuc_vu' => 'Kinh doanh',
            'sdt' => '0901234567',
            'email' => 'minh@ngocanphat.com',
            'zalo' => '0901234567',
            'website' => 'https://ngocanphat.com',
            'dia_chi' => '123 Đường 3/2, Quận 10, TP.HCM',
            'gio_lam_viec' => '8:00 - 17:00 (T2-T7)',
            'nhom_hang' => ['Ngọc bích', 'Thạch anh', 'Ruby', 'Sapphire'],
            'tong_phieu' => 24,
            'tong_gia_tri' => 85000000,
            'cong_no' => 12500000,
            'han_no' => '30/05/2026',
            'danh_gia' => 4.8,
            'trang_thai' => 'Đang hợp tác'
        ];
        
        echo json_encode(['status' => 'success', 'data' => $data]);
    }
}

