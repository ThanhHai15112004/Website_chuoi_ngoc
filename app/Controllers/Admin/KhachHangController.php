<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class KhachHangController extends Controller
{
    public function index()
    {
        $thong_ke = [
            'tong' => 2458,
            'khach_moi' => 126,
            'da_mua' => 1230,
            'chua_mua' => 1228,
            'bi_khoa' => 12,
            'diamond' => 36
        ];

        $customers = [
            [
                'ma' => 'KH000123',
                'ten' => 'Nguyễn Văn A',
                'gioi_tinh' => 'Nam',
                'tuoi' => '22',
                'sdt' => '0901234567',
                'email' => 'nguyenvana@gmail.com',
                'hang' => 'Gold',
                'tong_don' => 12,
                'tong_chi_tieu' => 3500000,
                'don_gan_nhat' => [
                    'ma' => '#DH202600123',
                    'ngay' => '17/05/2026',
                    'trang_thai' => 'Thành công'
                ],
                'nam_sinh' => '2004',
                'menh' => 'Thủy',
                'trang_thai' => 'hoat_dong',
                'ngay_dang_ky' => '18/05/2026',
                'ghi_chu_vip' => true
            ],
            [
                'ma' => 'CUS-000124',
                'ten' => 'Trần Thị B',
                'gioi_tinh' => 'Nữ',
                'tuoi' => '28',
                'sdt' => '0987654321',
                'email' => 'tranthib@gmail.com',
                'hang' => 'Diamond',
                'tong_don' => 45,
                'tong_chi_tieu' => 15600000,
                'don_gan_nhat' => [
                    'ma' => '#DH202600888',
                    'ngay' => '10/05/2026',
                    'trang_thai' => 'Đang giao'
                ],
                'nam_sinh' => '1998',
                'menh' => 'Mộc',
                'trang_thai' => 'hoat_dong',
                'ngay_dang_ky' => '01/01/2025',
                'ghi_chu_vip' => true
            ],
            [
                'ma' => 'KH000125',
                'ten' => 'Lê Hoàng C',
                'gioi_tinh' => 'Nam',
                'tuoi' => '',
                'sdt' => '0911222333',
                'email' => 'lehoangc@hotmail.com',
                'hang' => 'Silver',
                'tong_don' => 0,
                'tong_chi_tieu' => 0,
                'don_gan_nhat' => null,
                'nam_sinh' => '',
                'menh' => '',
                'trang_thai' => 'chua_xac_thuc',
                'ngay_dang_ky' => '19/05/2026',
                'ghi_chu_vip' => false
            ],
            [
                'ma' => 'KH000126',
                'ten' => 'Phạm D',
                'gioi_tinh' => 'Nữ',
                'tuoi' => '35',
                'sdt' => '0933444555',
                'email' => 'phamd@yahoo.com',
                'hang' => 'Silver',
                'tong_don' => 5,
                'tong_chi_tieu' => 1200000,
                'don_gan_nhat' => [
                    'ma' => '#DH202500444',
                    'ngay' => '20/12/2025',
                    'trang_thai' => 'Đã hủy'
                ],
                'nam_sinh' => '1991',
                'menh' => 'Hỏa',
                'trang_thai' => 'bi_khoa',
                'ngay_dang_ky' => '10/10/2025',
                'ghi_chu_vip' => false,
                'nhieu_don_huy' => true
            ]
        ];

        $data = [
            'thong_ke' => $thong_ke,
            'customers' => $customers,
            'current_page' => 'khach_hang',
            'tieu_de' => 'Quản lý khách hàng - Admin'
        ];

        $this->view('admin_khach_hang', $data, 'admin');
    }

    public function show($id)
    {
        $khach_hang = [
            'ma' => $id,
            'ten' => 'Nguyễn Văn A',
            'gioi_tinh' => 'Nam',
            'ngay_sinh' => '15/08/2004',
            'nam_sinh' => '2004',
            'sdt' => '0901234567',
            'email' => 'nguyenvana@gmail.com',
            'hang' => 'Gold',
            'trang_thai' => 'hoat_dong',
            'ngay_dang_ky' => '17/05/2026',
            'lan_dang_nhap_cuoi' => '20/05/2026',
            'tong_chi_tieu' => 3500000,
            'dieu_kien_hang_hien_tai' => 2000000,
            'muc_len_hang_tiep_theo' => 10000000,
            'tong_don' => 12,
            'don_thanh_cong' => 10,
            'so_voucher' => 5,
            'so_yeu_thich' => 8,
            'so_danh_gia' => 4,
            'menh' => 'Thủy',
            'mau_phu_hop' => ['Đen', 'Xanh dương', 'Trắng'],
            'da_goi_y' => ['Obsidian', 'Aquamarine', 'Thạch anh trắng'],
            'ghi_chu_noibo' => [
                ['id' => 1, 'noi_dung' => 'Khách thường mua làm quà tặng, nhớ đóng hộp cẩn thận nhé.', 'nguoi_tao' => 'Hải Admin', 'thoi_gian' => '10/05/2026']
            ],
            'dia_chi' => [
                ['id' => 1, 'ten_nguoi_nhan' => 'Nguyễn Văn A', 'sdt' => '0901234567', 'dia_chi' => '123 Đường Lê Lợi, Phường Bến Nghé, Quận 1, TP. HCM', 'mac_dinh' => true],
                ['id' => 2, 'ten_nguoi_nhan' => 'Trần Thị B', 'sdt' => '0987654321', 'dia_chi' => '456 Tôn Đức Thắng, Phường 5, Quận Phú Nhuận, TP. HCM', 'mac_dinh' => false]
            ],
            'don_hang' => [
                ['ma' => '#DH202600123', 'ngay_dat' => '17/05/2026', 'san_pham' => 'Vòng tay Tỳ Hưu Thạch Anh Tóc Vàng', 'tong_tien' => 1250000, 'trang_thai' => 'Thành công'],
                ['ma' => '#DH202600055', 'ngay_dat' => '10/02/2026', 'san_pham' => 'Nhẫn Kim Tiền Bạc Ý 925', 'tong_tien' => 450000, 'trang_thai' => 'Thành công'],
                ['ma' => '#DH202500892', 'ngay_dat' => '20/12/2025', 'san_pham' => 'Vòng gỗ Trầm Hương 108 hạt', 'tong_tien' => 1800000, 'trang_thai' => 'Đã hủy']
            ],
            'voucher' => [
                ['ma' => 'GOLD5', 'mota' => 'Giảm 5% cho đơn từ 500k', 'han_dung' => '31/05/2026', 'trang_thai' => 'Hợp lệ', 'nguon' => 'Hạng Gold'],
                ['ma' => 'WELCOME10', 'mota' => 'Giảm 10% cho khách mới', 'han_dung' => '01/01/2026', 'trang_thai' => 'Hết hạn', 'nguon' => 'Đăng ký']
            ],
            'yeu_thich' => [
                ['ten' => 'Lắc tay Thạch Anh Tím', 'gia' => 850000, 'da' => 'Thạch Anh Tím', 'menh' => 'Hỏa, Thổ', 'trang_thai' => 'Còn hàng', 'ngay_them' => '19/05/2026']
            ],
            'danh_gia' => [
                ['san_pham' => 'Vòng tay Tỳ Hưu Thạch Anh Tóc Vàng', 'sao' => 5, 'noi_dung' => 'Sản phẩm rất đẹp, đóng gói cẩn thận. Mình rất ưng ý. Sẽ ủng hộ shop thêm nhiều lần nữa.', 'ngay' => '18/05/2026', 'trang_thai' => 'Đã duyệt']
            ],
            'lich_su' => [
                ['loai' => 'login', 'noi_dung' => 'Đăng nhập', 'thoi_gian' => '2 giờ trước'],
                ['loai' => 'order', 'noi_dung' => 'Thanh toán thành công đơn #DH202600123', 'thoi_gian' => '17/05/2026'],
                ['loai' => 'rank', 'noi_dung' => 'Được thăng hạng lên GOLD', 'thoi_gian' => '17/05/2026']
            ],
            'canh_bao' => [
                // 'Khách có nhiều đơn hủy (2 đơn)'
            ]
        ];

        $data = [
            'current_page' => 'chi_tiet_khach_hang',
            'tieu_de' => 'Chi tiết khách hàng - Admin',
            'id' => $id,
            'kh' => $khach_hang
        ];
        $this->view('admin_khach_hang_chi_tiet', $data, 'admin');
    }

    public function create()
    {
        $data = [
            'current_page' => 'them_khach_hang',
            'tieu_de' => 'Thêm khách hàng mới - Admin'
        ];
        $this->view('admin_khach_hang_them', $data, 'admin');
    }

    public function ranks()
    {
        $ranks = [
            [
                'id' => 'silver',
                'name' => 'Silver',
                'badge' => 'bg-gray-100 text-gray-700 border-gray-200',
                'desc' => 'Hạng cơ bản cho khách hàng mới',
                'condition_spend' => 0,
                'discount' => 2,
                'benefits' => ['Voucher cơ bản', 'Ưu đãi sinh nhật', 'Theo dõi đơn hàng'],
                'customer_count' => 1820,
                'vouchers' => ['SILVER2'],
                'status' => 'active'
            ],
            [
                'id' => 'gold',
                'name' => 'Gold',
                'badge' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                'desc' => 'Hạng thân thiết dành cho khách mua thường xuyên',
                'condition_spend' => 3000000,
                'discount' => 5,
                'benefits' => ['Giảm giá cao hơn', 'Freeship định kỳ', 'Nhận ưu đãi sớm'],
                'customer_count' => 520,
                'vouchers' => ['GOLD5'],
                'status' => 'active'
            ],
            [
                'id' => 'diamond',
                'name' => 'Diamond',
                'badge' => 'bg-red-100 text-[#6B0D18] border-red-200 shadow-sm',
                'desc' => 'Hạng cao cấp dành cho khách hàng VIP',
                'condition_spend' => 10000000,
                'discount' => 10,
                'benefits' => ['Giảm giá cao nhất', 'Quà tặng đặc biệt', 'Ưu tiên hỗ trợ', 'Tư vấn chọn vòng riêng'],
                'customer_count' => 86,
                'vouchers' => ['DIAMOND10', 'FREESHIPVIP'],
                'status' => 'active'
            ]
        ];

        $history = [
            ['nguoi_tao' => 'Hải Admin', 'thoi_gian' => '18/05/2026, 10:00', 'noi_dung' => 'Gán voucher GOLD5 cho hạng Gold.'],
            ['nguoi_tao' => 'Hải Admin', 'thoi_gian' => '18/05/2026, 09:30', 'noi_dung' => 'Cập nhật điều kiện Gold từ 2.000.000đ thành 3.000.000đ.']
        ];

        $data = [
            'current_page' => 'hang_thanh_vien',
            'tieu_de' => 'Quản lý hạng thành viên - Admin',
            'ranks' => $ranks,
            'history' => $history
        ];
        $this->view('admin_hang_thanh_vien', $data, 'admin');
    }
}
