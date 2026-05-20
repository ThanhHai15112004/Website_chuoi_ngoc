<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class DashboardController extends Controller {
    public function index() {
        // Mock data for Dashboard
        $data = [
            'tieu_de' => 'Dashboard - Chuỗi Ngọc Phong Thủy',
            'thong_ke_nhanh' => [
                'doanh_thu_hom_nay' => 12500000,
                'tang_truong_doanh_thu' => 15,
                'don_hang_moi' => 24,
                'don_cho_xac_nhan' => 5,
                'khach_hang_moi' => 12,
                'tang_truong_khach' => 3,
                'sap_het_hang' => 8,
                'voucher_dang_chay' => 6,
                'voucher_sap_het_han' => 2
            ],
            'don_hang_moi_nhat' => [
                ['ma_don' => 'DH202600123', 'khach_hang' => 'Nguyễn Văn A', 'tong_tien' => 850000, 'trang_thai' => 'Chờ xác nhận'],
                ['ma_don' => 'DH202600124', 'khach_hang' => 'Trần Thị B', 'tong_tien' => 1250000, 'trang_thai' => 'Đang giao'],
                ['ma_don' => 'DH202600125', 'khach_hang' => 'Lê Văn C', 'tong_tien' => 3400000, 'trang_thai' => 'Đã giao'],
                ['ma_don' => 'DH202600126', 'khach_hang' => 'Phạm Thị D', 'tong_tien' => 500000, 'trang_thai' => 'Đã hủy'],
                ['ma_don' => 'DH202600127', 'khach_hang' => 'Hoàng Văn E', 'tong_tien' => 2100000, 'trang_thai' => 'Xác nhận đơn hàng'],
            ],
            'san_pham_ban_chay' => [
                ['ten' => 'Vòng Ngọc Bích Tài Lộc', 'da_ban' => 45, 'doanh_thu' => 38250000, 'ton_kho' => 12, 'anh' => 'https://ui-avatars.com/api/?name=Ngoc+Bich&background=E4D5C3&color=6B0D18'],
                ['ten' => 'Chuỗi Thạch Anh Hồng', 'da_ban' => 32, 'doanh_thu' => 21760000, 'ton_kho' => 8, 'anh' => 'https://ui-avatars.com/api/?name=Thach+Anh&background=E4D5C3&color=6B0D18'],
                ['ten' => 'Vòng Tay Trầm Hương', 'da_ban' => 28, 'doanh_thu' => 15400000, 'ton_kho' => 25, 'anh' => 'https://ui-avatars.com/api/?name=Tram+Huong&background=E4D5C3&color=6B0D18'],
            ],
            'san_pham_ban_cham' => [
                ['ten' => 'Vòng Mắt Hổ Nâu', 'ton_kho' => 45, 'da_ban_30_ngay' => 1, 'goi_y' => 'Tạo khuyến mãi', 'anh' => 'https://ui-avatars.com/api/?name=Mat+Ho&background=f3f4f6&color=6B0D18'],
                ['ten' => 'Chuỗi Cẩm Thạch Xanh', 'ton_kho' => 30, 'da_ban_30_ngay' => 0, 'goi_y' => 'Đẩy lên trang chủ', 'anh' => 'https://ui-avatars.com/api/?name=Cam+Thach&background=f3f4f6&color=6B0D18'],
            ],
            'canh_bao_ton_kho' => [
                ['noi_dung' => 'Vòng Ngọc Bích Tài Lộc chỉ còn 2 sản phẩm', 'loai' => 'sap_het'],
                ['noi_dung' => 'Chuỗi Mã Não Đỏ đã hết hàng', 'loai' => 'het_hang'],
                ['noi_dung' => 'Vòng Cẩm Thạch Trắng tồn kho 60 sản phẩm', 'loai' => 'ton_nhieu']
            ],
            'khach_hang_moi_nhat' => [
                ['ten' => 'Nguyễn Văn A', 'ngay_dang_ky' => '17/05/2026', 'hang' => 'Silver'],
                ['ten' => 'Trần Thị B', 'ngay_dang_ky' => '17/05/2026', 'hang' => 'Gold'],
            ],
            'khuyen_mai_dang_chay' => [
                ['ma' => 'GIAM50K', 'uu_dai' => 'Giảm 50K', 'da_dung' => '32/100', 'het_han' => '31/05/2026'],
                ['ma' => 'FREESHIP', 'uu_dai' => 'Freeship', 'da_dung' => '78/200', 'het_han' => '31/05/2026'],
            ],
            'hoat_dong_gan_day' => [
                ['thoi_gian' => '10 phút trước', 'noi_dung' => 'Admin Hải đã thêm sản phẩm <span class="font-medium text-[#6B0D18]">Vòng Ngọc Bích Tài Lộc</span>.'],
                ['thoi_gian' => '30 phút trước', 'noi_dung' => 'Nhân viên Lan đã xác nhận đơn <span class="font-medium text-[#6B0D18]">#DH202600123</span>.'],
                ['thoi_gian' => '1 giờ trước', 'noi_dung' => 'Sản phẩm <span class="font-medium text-[#6B0D18]">Chuỗi Mã Não Đỏ</span> đã hết hàng.'],
            ]
        ];

        $this->view('admin_dashboard', $data, 'admin');
    }
}
