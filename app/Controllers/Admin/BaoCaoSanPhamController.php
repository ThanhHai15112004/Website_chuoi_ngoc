<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class BaoCaoSanPhamController extends Controller
{
    /**
     * Hiển thị trang báo cáo sản phẩm
     */
    public function index()
    {
        // ============================================
        // MOCKUP DATA CHO TRANG BÁO CÁO SẢN PHẨM
        // ============================================

        // 1. Chỉ số tổng quan (KPIs)
        $overview = [
            'san_pham_da_ban' => [
                'gia_tri' => 520,
                'tang_truong' => 12, // %
                'xu_huong' => 'tang'
            ],
            'doanh_thu_san_pham' => [
                'gia_tri' => 185000000,
                'tang_truong' => 15,
                'xu_huong' => 'tang'
            ],
            'sp_ban_chay_nhat' => [
                'ten' => 'Vòng Ngọc Bích Tài Lộc',
                'da_ban' => 45,
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg'
            ],
            'sp_ban_cham' => [
                'so_luong' => 18,
                'hanh_dong' => 'Cần tối ưu'
            ],
            'sap_het_hang' => [
                'so_luong' => 12,
                'hanh_dong' => 'Cần nhập thêm'
            ],
            'ton_kho_cao' => [
                'so_luong' => 24,
                'hanh_dong' => 'Nên khuyến mãi'
            ]
        ];

        // 2. Biểu đồ Top sản phẩm bán chạy (Horizontal Bar Chart)
        $chartTopProducts = [
            'labels' => [
                'Vòng Ngọc Bích Tài Lộc', 
                'Chuỗi Trầm Hương 108 Hạt', 
                'Vòng Thạch Anh Tóc Vàng', 
                'Vòng Tay Mã Não Đỏ', 
                'Nhẫn Tỳ Hưu Thạch Anh'
            ],
            'da_ban' => [45, 32, 28, 25, 18],
            'doanh_thu' => [38250000, 25600000, 19500000, 8750000, 12600000]
        ];

        // 3. Biểu đồ doanh thu theo danh mục (Doughnut)
        $chartCategories = [
            'Vòng tay phong thủy' => 85000000,
            'Chuỗi ngọc' => 52000000,
            'Vòng đá tự nhiên' => 32000000,
            'Quà tặng phong thủy' => 16000000
        ];

        // 4. Báo cáo theo loại đá / ngọc
        $stoneReport = [
            ['ten' => 'Ngọc bích', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg', 'sp_dang_ban' => 18, 'da_ban' => 120, 'doanh_thu' => 86000000, 'ty_trong' => 46.5, 'top_sp' => 'Vòng Ngọc Bích Tài Lộc', 'ton_kho' => 45],
            ['ten' => 'Thạch anh', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-2.jpg', 'sp_dang_ban' => 25, 'da_ban' => 95, 'doanh_thu' => 42000000, 'ty_trong' => 22.7, 'top_sp' => 'Vòng Thạch Anh Tóc Vàng', 'ton_kho' => 112],
            ['ten' => 'Trầm hương', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg', 'sp_dang_ban' => 12, 'da_ban' => 65, 'doanh_thu' => 38000000, 'ty_trong' => 20.5, 'top_sp' => 'Chuỗi Trầm Hương 108 Hạt', 'ton_kho' => 28],
            ['ten' => 'Mã não', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Nước Thơm/nuoc-thom-1.jpg', 'sp_dang_ban' => 30, 'da_ban' => 110, 'doanh_thu' => 19000000, 'ty_trong' => 10.3, 'top_sp' => 'Vòng Tay Mã Não Đỏ', 'ton_kho' => 156]
        ];

        // 5. Báo cáo theo mệnh phong thủy
        $destinyReport = [
            ['ten' => 'Mệnh Kim', 'badge' => 'bg-gray-100 text-gray-800', 'sp_phu_hop' => 45, 'da_ban' => 85, 'doanh_thu' => 35000000, 'ty_trong' => 18.9, 'da_noi_bat' => 'Thạch anh trắng, Mã não trắng'],
            ['ten' => 'Mệnh Mộc', 'badge' => 'bg-green-100 text-green-800', 'sp_phu_hop' => 42, 'da_ban' => 110, 'doanh_thu' => 62000000, 'ty_trong' => 33.5, 'da_noi_bat' => 'Ngọc bích, Cẩm thạch, Diopside'],
            ['ten' => 'Mệnh Thủy', 'badge' => 'bg-blue-100 text-blue-800', 'sp_phu_hop' => 38, 'da_ban' => 75, 'doanh_thu' => 28000000, 'ty_trong' => 15.1, 'da_noi_bat' => 'Aquamarine, Thạch anh đen'],
            ['ten' => 'Mệnh Hỏa', 'badge' => 'bg-red-100 text-red-800', 'sp_phu_hop' => 52, 'da_ban' => 95, 'doanh_thu' => 45000000, 'ty_trong' => 24.3, 'da_noi_bat' => 'Thạch anh tím, Ruby, Mã não đỏ'],
            ['ten' => 'Mệnh Thổ', 'badge' => 'bg-yellow-100 text-yellow-800', 'sp_phu_hop' => 48, 'da_ban' => 65, 'doanh_thu' => 15000000, 'ty_trong' => 8.2, 'da_noi_bat' => 'Mắt hổ vàng, Thạch anh vàng'],
        ];

        // 6. Bảng cảnh báo tồn kho
        $inventoryWarnings = [
            ['ten_sp' => 'Vòng Ngọc Bích Tài Lộc', 'ma_sp' => 'SP001', 'ton_kho' => 3, 'canh_bao' => 'Hết hàng', 'badge' => 'bg-red-50 text-red-700', 'da_ban_ky' => 45, 'toc_do_ban' => '1.5/ngày', 'du_kien_het' => '2 ngày'],
            ['ten_sp' => 'Chuỗi Trầm Hương 108 Hạt', 'ma_sp' => 'SP042', 'ton_kho' => 8, 'canh_bao' => 'Sắp hết', 'badge' => 'bg-yellow-50 text-yellow-700', 'da_ban_ky' => 32, 'toc_do_ban' => '1.1/ngày', 'du_kien_het' => '7 ngày'],
            ['ten_sp' => 'Vòng Mã Não Xanh Lục', 'ma_sp' => 'SP088', 'ton_kho' => 156, 'canh_bao' => 'Tồn cao', 'badge' => 'bg-orange-50 text-orange-700', 'da_ban_ky' => 2, 'toc_do_ban' => '0.1/ngày', 'du_kien_het' => '> 6 tháng'],
        ];

        // 7. Bảng sản phẩm bán chậm (Cần tối ưu)
        $slowProducts = [
            ['ten_sp' => 'Vòng Tay Đá Mắt Hổ Đỏ', 'ma_sp' => 'SP075', 'danh_muc' => 'Vòng đá tự nhiên', 'ton_kho' => 45, 'da_ban_ky' => 0, 'doanh_thu' => 0, 'ngay_tao' => '15/01/2026', 'ngay_chua_ban' => 42, 'ly_do' => 'Chưa có khuyến mãi', 'de_xuat' => 'Tạo khuyến mãi'],
            ['ten_sp' => 'Nhẫn Bạc Đính Đá Ruby', 'ma_sp' => 'SP112', 'danh_muc' => 'Nhẫn phong thủy', 'ton_kho' => 28, 'da_ban_ky' => 1, 'doanh_thu' => 1250000, 'ngay_tao' => '10/02/2026', 'ngay_chua_ban' => 28, 'ly_do' => 'Giá cao hơn trung bình', 'de_xuat' => 'Điều chỉnh giá'],
            ['ten_sp' => 'Bộ Thất Tinh Trận Đồ', 'ma_sp' => 'SP150', 'danh_muc' => 'Vật phẩm phong thủy', 'ton_kho' => 12, 'da_ban_ky' => 0, 'doanh_thu' => 0, 'ngay_tao' => '05/03/2026', 'ngay_chua_ban' => 82, 'ly_do' => 'Thiếu ảnh thực tế', 'de_xuat' => 'Cập nhật ảnh'],
        ];

        // 8. Bảng hiệu quả khuyến mãi
        $promoEfficiency = [
            ['ten_sp' => 'Vòng Thạch Anh Tóc Vàng', 'chuong_trinh' => 'Flash Sale Cuối Tuần', 'gia_goc' => 850000, 'gia_sale' => 699000, 'ban_truoc' => 5, 'ban_trong' => 28, 'doanh_thu' => 19572000, 'tong_giam' => 4228000, 'hieu_qua' => 'Tốt', 'badge' => 'bg-green-100 text-green-800'],
            ['ten_sp' => 'Vòng Tay Mã Não Đỏ', 'chuong_trinh' => 'Tháng Mệnh Hỏa', 'gia_goc' => 450000, 'gia_sale' => 350000, 'ban_truoc' => 12, 'ban_trong' => 25, 'doanh_thu' => 8750000, 'tong_giam' => 2500000, 'hieu_qua' => 'Trung bình', 'badge' => 'bg-blue-100 text-blue-800'],
            ['ten_sp' => 'Chuỗi Trầm Hương Cảnh', 'chuong_trinh' => 'Lễ Phật Đản', 'gia_goc' => 1500000, 'gia_sale' => 1200000, 'ban_truoc' => 2, 'ban_trong' => 3, 'doanh_thu' => 3600000, 'tong_giam' => 900000, 'hieu_qua' => 'Không hiệu quả', 'badge' => 'bg-red-100 text-red-800'],
        ];

        // 9. Gợi ý hành động (Action Suggestions)
        $actionSuggestions = [
            [
                'title' => '12 sản phẩm sắp hết hàng',
                'desc' => 'Nên kiểm tra và nhập thêm để tránh mất đơn bán hàng.',
                'icon' => 'mdi:alert-circle-outline',
                'color' => 'yellow',
                'btn_text' => 'Xem sản phẩm',
                'btn_class' => 'border-yellow-600 text-yellow-700 hover:bg-yellow-50'
            ],
            [
                'title' => '18 sản phẩm bán chậm',
                'desc' => 'Có thể tạo khuyến mãi giảm giá hoặc đưa vào banner trang chủ để đẩy hàng.',
                'icon' => 'mdi:trending-down',
                'color' => 'orange',
                'btn_text' => 'Tạo khuyến mãi',
                'btn_class' => 'border-orange-600 text-orange-700 hover:bg-orange-50'
            ],
            [
                'title' => 'Ngọc bích chiếm 46.5% doanh thu',
                'desc' => 'Nên ưu tiên nhập thêm đa dạng mẫu mã hoặc tạo bộ sưu tập nổi bật riêng.',
                'icon' => 'mdi:diamond-stone',
                'color' => 'red',
                'btn_text' => 'Nhập thêm Ngọc Bích',
                'btn_class' => 'bg-[#6B0D18] text-white hover:bg-red-900 border-transparent'
            ],
            [
                'title' => 'Mệnh Mộc đang mua sắm nhiều',
                'desc' => 'Có thể viết bài blog tư vấn hoặc tạo banner ưu đãi riêng cho người mệnh Mộc.',
                'icon' => 'mdi:leaf',
                'color' => 'green',
                'btn_text' => 'Tạo bài viết mới',
                'btn_class' => 'border-green-600 text-green-700 hover:bg-green-50'
            ]
        ];

        // 10. Danh sách tất cả sản phẩm
        $allProducts = [
            ['id' => 'SP001', 'ten' => 'Vòng Ngọc Bích Tài Lộc', 'anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg', 'danh_muc' => 'Vòng tay phong thủy', 'da' => 'Ngọc bích', 'menh' => 'Mộc, Hỏa', 'gia' => 850000, 'ton_kho' => 3, 'da_ban' => 45, 'doanh_thu' => 38250000, 'ty_trong' => 20.6, 'trang_thai' => 'Bán chạy'],
            ['id' => 'SP042', 'ten' => 'Chuỗi Trầm Hương 108 Hạt', 'anh' => APP_URL . '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg', 'danh_muc' => 'Chuỗi ngọc', 'da' => 'Trầm hương', 'menh' => 'Tất cả', 'gia' => 800000, 'ton_kho' => 8, 'da_ban' => 32, 'doanh_thu' => 25600000, 'ty_trong' => 13.8, 'trang_thai' => 'Bán chạy'],
            ['id' => 'SP118', 'ten' => 'Vòng Thạch Anh Tóc Vàng', 'anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-2.jpg', 'danh_muc' => 'Vòng đá tự nhiên', 'da' => 'Thạch anh', 'menh' => 'Thổ, Kim', 'gia' => 699000, 'ton_kho' => 25, 'da_ban' => 28, 'doanh_thu' => 19572000, 'ty_trong' => 10.5, 'trang_thai' => 'Ổn định'],
            ['id' => 'SP075', 'ten' => 'Vòng Tay Đá Mắt Hổ Đỏ', 'anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-3.jpg', 'danh_muc' => 'Vòng đá tự nhiên', 'da' => 'Đá mắt hổ', 'menh' => 'Thổ, Hỏa', 'gia' => 450000, 'ton_kho' => 45, 'da_ban' => 0, 'doanh_thu' => 0, 'ty_trong' => 0, 'trang_thai' => 'Chưa có đơn'],
        ];

        $this->view('admin_bao_cao_san_pham', [
            'tieu_de' => 'Báo cáo sản phẩm',
            'current_page' => 'bao_cao_san_pham',
            'overview' => $overview,
            'chartTopProducts' => $chartTopProducts,
            'chartCategories' => $chartCategories,
            'stoneReport' => $stoneReport,
            'destinyReport' => $destinyReport,
            'inventoryWarnings' => $inventoryWarnings,
            'slowProducts' => $slowProducts,
            'promoEfficiency' => $promoEfficiency,
            'actionSuggestions' => $actionSuggestions,
            'allProducts' => $allProducts
        ], 'admin');
    }
}
