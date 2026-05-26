<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class BaoCaoDoanhThuController extends Controller
{
    /**
     * Hiển thị trang báo cáo doanh thu
     */
    public function index()
    {
        // ============================================
        // MOCKUP DATA CHO TRANG BÁO CÁO DOANH THU
        // ============================================

        // 1. Chỉ số tổng quan (KPIs)
        $overview = [
            'tong_doanh_thu' => [
                'gia_tri' => 185000000,
                'tang_truong' => 12.5,
                'xu_huong' => 'tang' // tang, giam
            ],
            'don_thanh_cong' => [
                'gia_tri' => 246,
                'tang_truong' => 18, // Số lượng đơn
                'xu_huong' => 'tang'
            ],
            'gia_tri_trung_binh' => [
                'gia_tri' => 752000,
                'tang_truong' => 5, // %
                'xu_huong' => 'tang'
            ],
            'san_pham_da_ban' => [
                'gia_tri' => 520,
                'tang_truong' => null,
                'xu_huong' => null
            ],
            'tong_giam_gia' => [
                'gia_tri' => 18500000,
                'tang_truong' => null,
                'xu_huong' => null
            ],
            'doanh_thu_thuc_nhan' => [
                'gia_tri' => 166500000,
                'tang_truong' => null,
                'xu_huong' => null
            ]
        ];

        // 2. Dữ liệu biểu đồ doanh thu theo thời gian (Line chart)
        $chartRevenue = [
            'labels' => ['01/05', '05/05', '10/05', '15/05', '20/05', '25/05', '30/05'],
            'ky_nay' => [12000000, 15000000, 11000000, 25000000, 18000000, 22000000, 19500000], // Doanh thu kỳ này
            'ky_truoc' => [10000000, 12000000, 14000000, 18000000, 16000000, 20000000, 17000000], // Doanh thu kỳ trước
        ];

        // 3. Dữ liệu biểu đồ trạng thái đơn hàng (Donut chart)
        $chartOrderStatus = [
            'Thành công' => 246,
            'Đang giao' => 45,
            'Chờ xác nhận' => 28,
            'Đã hủy' => 15
        ];

        // 4. Bảng doanh thu theo thời gian (Chi tiết ngày)
        $tableTime = [
            ['ngay' => '18/05/2026', 'don_thanh_cong' => 18, 'don_huy' => 2, 'sp_ban' => 36, 'tong_doanh_thu' => 12500000, 'giam_gia' => 800000, 'thuc_nhan' => 11700000],
            ['ngay' => '17/05/2026', 'don_thanh_cong' => 15, 'don_huy' => 1, 'sp_ban' => 28, 'tong_doanh_thu' => 10200000, 'giam_gia' => 500000, 'thuc_nhan' => 9700000],
            ['ngay' => '16/05/2026', 'don_thanh_cong' => 22, 'don_huy' => 3, 'sp_ban' => 45, 'tong_doanh_thu' => 15800000, 'giam_gia' => 1200000, 'thuc_nhan' => 14600000],
            ['ngay' => '15/05/2026', 'don_thanh_cong' => 30, 'don_huy' => 0, 'sp_ban' => 62, 'tong_doanh_thu' => 25000000, 'giam_gia' => 2500000, 'thuc_nhan' => 22500000],
            ['ngay' => '14/05/2026', 'don_thanh_cong' => 14, 'don_huy' => 2, 'sp_ban' => 25, 'tong_doanh_thu' => 9800000, 'giam_gia' => 400000, 'thuc_nhan' => 9400000],
        ];

        // 5. Doanh thu theo sản phẩm (Top bán chạy)
        $topProducts = [
            [
                'ma_sp' => 'SP001',
                'ten_sp' => 'Vòng Ngọc Bích Tài Lộc',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg',
                'danh_muc' => 'Vòng tay phong thủy',
                'da_ban' => 45,
                'doanh_thu' => 38250000,
                'ty_trong' => 20.6,
                'ton_kho' => 12
            ],
            [
                'ma_sp' => 'SP042',
                'ten_sp' => 'Chuỗi Trầm Hương 108 Hạt',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg',
                'danh_muc' => 'Chuỗi ngọc',
                'da_ban' => 32,
                'doanh_thu' => 25600000,
                'ty_trong' => 13.8,
                'ton_kho' => 8
            ],
            [
                'ma_sp' => 'SP118',
                'ten_sp' => 'Vòng Thạch Anh Tóc Vàng',
                'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-2.jpg',
                'danh_muc' => 'Vòng đá tự nhiên',
                'da_ban' => 28,
                'doanh_thu' => 19500000,
                'ty_trong' => 10.5,
                'ton_kho' => 25
            ]
        ];

        // 6. Sản phẩm bán chậm
        $slowProducts = [
            [
                'ten_sp' => 'Vòng Mắt Hổ Đỏ Huyết',
                'ton_kho' => 45,
                'da_ban_ky' => 2,
                'doanh_thu' => 900000,
                'ngay_tao' => '2026-01-15'
            ],
            [
                'ten_sp' => 'Nhẫn Mã Não Xanh',
                'ton_kho' => 32,
                'da_ban_ky' => 0,
                'doanh_thu' => 0,
                'ngay_tao' => '2026-02-10'
            ]
        ];

        // 7. Doanh thu theo danh mục
        $revenueByCategory = [
            ['ten' => 'Vòng tay phong thủy', 'so_don' => 120, 'sp_ban' => 250, 'doanh_thu' => 85000000, 'ty_trong' => 45.9],
            ['ten' => 'Chuỗi ngọc', 'so_don' => 65, 'sp_ban' => 115, 'doanh_thu' => 52000000, 'ty_trong' => 28.1],
            ['ten' => 'Vòng đá tự nhiên', 'so_don' => 45, 'sp_ban' => 85, 'doanh_thu' => 32000000, 'ty_trong' => 17.3],
            ['ten' => 'Quà tặng phong thủy', 'so_don' => 16, 'sp_ban' => 70, 'doanh_thu' => 16000000, 'ty_trong' => 8.7],
        ];

        // 8. Doanh thu theo loại đá / ngọc
        $revenueByStone = [
            ['ten' => 'Ngọc bích', 'sp_ban' => 150, 'doanh_thu' => 75000000, 'ty_trong' => 40.5, 'top_sp' => 'Vòng Ngọc Bích Tài Lộc'],
            ['ten' => 'Thạch anh', 'sp_ban' => 120, 'doanh_thu' => 45000000, 'ty_trong' => 24.3, 'top_sp' => 'Vòng Thạch Anh Tóc Vàng'],
            ['ten' => 'Trầm hương', 'sp_ban' => 80, 'doanh_thu' => 35000000, 'ty_trong' => 18.9, 'top_sp' => 'Chuỗi Trầm Hương 108 Hạt'],
            ['ten' => 'Khác', 'sp_ban' => 170, 'doanh_thu' => 30000000, 'ty_trong' => 16.3, 'top_sp' => 'Vòng Mã Não Đỏ'],
        ];

        // 9. Doanh thu theo mệnh
        $revenueByDestiny = [
            ['ten' => 'Kim', 'badge' => 'bg-gray-100 text-gray-800', 'sp_ban' => 95, 'so_don' => 60, 'doanh_thu' => 35000000, 'ty_trong' => 18.9, 'top_da' => 'Thạch anh trắng'],
            ['ten' => 'Mộc', 'badge' => 'bg-green-100 text-green-800', 'sp_ban' => 125, 'so_don' => 85, 'doanh_thu' => 52000000, 'ty_trong' => 28.1, 'top_da' => 'Ngọc bích'],
            ['ten' => 'Thủy', 'badge' => 'bg-blue-100 text-blue-800', 'sp_ban' => 80, 'so_don' => 50, 'doanh_thu' => 28000000, 'ty_trong' => 15.1, 'top_da' => 'Aquamarine'],
            ['ten' => 'Hỏa', 'badge' => 'bg-red-100 text-red-800', 'sp_ban' => 110, 'so_don' => 75, 'doanh_thu' => 45000000, 'ty_trong' => 24.3, 'top_da' => 'Thạch anh tím'],
            ['ten' => 'Thổ', 'badge' => 'bg-yellow-100 text-yellow-800', 'sp_ban' => 110, 'so_don' => 70, 'doanh_thu' => 25000000, 'ty_trong' => 13.5, 'top_da' => 'Mắt hổ vàng'],
        ];

        // 10. Báo cáo voucher / khuyến mãi
        $marketingReport = [
            'tong_don_dung_voucher' => 145,
            'tong_giam_tu_voucher' => 12500000,
            'doanh_thu_tu_don_voucher' => 95000000,
            'ty_le_don_co_giam_gia' => 58.9, // %
            'danh_sach_voucher' => [
                ['ma' => 'WELCOME50', 'luot_dung' => 85, 'tong_giam' => 4250000, 'doanh_thu' => 45000000, 'trang_thai' => 'active'],
                ['ma' => 'VIP100K', 'luot_dung' => 40, 'tong_giam' => 4000000, 'doanh_thu' => 32000000, 'trang_thai' => 'active'],
                ['ma' => 'FREESHIP', 'luot_dung' => 20, 'tong_giam' => 600000, 'doanh_thu' => 18000000, 'trang_thai' => 'expired']
            ]
        ];

        // 11. Báo cáo thanh toán
        $paymentMethods = [
            ['ten' => 'COD (Thanh toán khi nhận hàng)', 'so_don' => 120, 'doanh_thu' => 85000000, 'ty_le' => 45.9],
            ['ten' => 'Chuyển khoản ngân hàng', 'so_don' => 86, 'doanh_thu' => 72000000, 'ty_le' => 38.9],
            ['ten' => 'VNPay', 'so_don' => 40, 'doanh_thu' => 28000000, 'ty_le' => 15.1]
        ];

        // 12. Báo cáo hạng thành viên
        $customerRanks = [
            ['hang' => 'Diamond', 'badge' => 'bg-purple-100 text-purple-800', 'khach' => 15, 'so_don' => 45, 'doanh_thu' => 65000000, 'tb_don' => 1444000],
            ['hang' => 'Gold', 'badge' => 'bg-yellow-100 text-yellow-800', 'khach' => 45, 'so_don' => 85, 'doanh_thu' => 75000000, 'tb_don' => 882000],
            ['hang' => 'Silver', 'badge' => 'bg-gray-100 text-gray-800', 'khach' => 120, 'so_don' => 116, 'doanh_thu' => 45000000, 'tb_don' => 387000],
        ];

        // 13. Bảng chi tiết đơn hàng (Tính vào doanh thu)
        $recentOrders = [
            ['ma_don' => 'DH12345', 'khach_hang' => 'Nguyễn Văn A', 'ngay_ht' => '18/05/2026 14:30', 'tong_tien' => 1500000, 'giam_gia' => 50000, 'phi_vc' => 30000, 'thuc_nhan' => 1480000, 'thanh_toan' => 'Chuyển khoản', 'trang_thai' => 'Thành công'],
            ['ma_don' => 'DH12346', 'khach_hang' => 'Trần Thị B', 'ngay_ht' => '18/05/2026 10:15', 'tong_tien' => 850000, 'giam_gia' => 0, 'phi_vc' => 30000, 'thuc_nhan' => 880000, 'thanh_toan' => 'COD', 'trang_thai' => 'Thành công'],
            ['ma_don' => 'DH12347', 'khach_hang' => 'Lê Văn C', 'ngay_ht' => '17/05/2026 16:45', 'tong_tien' => 2500000, 'giam_gia' => 100000, 'phi_vc' => 0, 'thuc_nhan' => 2400000, 'thanh_toan' => 'VNPay', 'trang_thai' => 'Thành công'],
            ['ma_don' => 'DH12348', 'khach_hang' => 'Phạm Thị D', 'ngay_ht' => '17/05/2026 09:20', 'tong_tien' => 450000, 'giam_gia' => 0, 'phi_vc' => 30000, 'thuc_nhan' => 480000, 'thanh_toan' => 'COD', 'trang_thai' => 'Thành công'],
            ['ma_don' => 'DH12349', 'khach_hang' => 'Hoàng Văn E', 'ngay_ht' => '16/05/2026 11:10', 'tong_tien' => 5500000, 'giam_gia' => 500000, 'phi_vc' => 0, 'thuc_nhan' => 5000000, 'thanh_toan' => 'Chuyển khoản', 'trang_thai' => 'Thành công'],
        ];


        $this->view('admin_bao_cao_doanh_thu', [
            'tieu_de' => 'Báo cáo doanh thu',
            'current_page' => 'bao_cao_doanh_thu',
            'overview' => $overview,
            'chartRevenue' => $chartRevenue,
            'chartOrderStatus' => $chartOrderStatus,
            'tableTime' => $tableTime,
            'topProducts' => $topProducts,
            'slowProducts' => $slowProducts,
            'revenueByCategory' => $revenueByCategory,
            'revenueByStone' => $revenueByStone,
            'revenueByDestiny' => $revenueByDestiny,
            'marketingReport' => $marketingReport,
            'paymentMethods' => $paymentMethods,
            'customerRanks' => $customerRanks,
            'recentOrders' => $recentOrders
        ], 'admin');
    }
}
