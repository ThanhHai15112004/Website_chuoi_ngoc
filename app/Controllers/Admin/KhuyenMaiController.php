<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class KhuyenMaiController extends Controller {
    public function index() {
        $thong_ke = [
            'tong_chuong_trinh' => 24,
            'dang_dien_ra' => 8,
            'sap_bat_dau' => 3,
            'sap_ket_thuc' => 4,
            'san_pham_giam_gia' => 56,
            'doanh_thu_km' => 42500000
        ];

        $danh_sach = [
            [
                'ma_km' => 'FLASH-T5',
                'ten_chuong_trinh' => 'Flash Sale Vòng Ngọc Tháng 5',
                'loai_km' => 'Flash Sale',
                'san_pham' => [
                    'hinh_anh' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg',
                    'ten_sp' => 'Vòng Ngọc Bích Tài Lộc',
                    'ma_sp' => 'NB-TL-001'
                ],
                'muc_giam' => [
                    'kieu' => 'phan_tram',
                    'gia_tri' => '-20%',
                    'gia_goc' => '850.000đ',
                    'gia_sale' => '680.000đ'
                ],
                'thoi_gian' => [
                    'chi_tiet' => '01/05/2026 - 31/05/2026',
                    'trang_thai' => 'Còn 5 ngày',
                    'class' => 'text-emerald-600'
                ],
                'so_luong' => [
                    'tong' => 100,
                    'da_ban' => 45
                ],
                'doanh_thu' => '30.600.000đ',
                'trang_thai' => 'Đang diễn ra',
                'nguoi_tao' => 'Hải Admin',
                'ngay_tao' => '01/05/2026'
            ],
            [
                'ma_km' => 'M-HOA',
                'ten_chuong_trinh' => 'Giảm giá vòng mệnh Hỏa',
                'loai_km' => 'Giảm số tiền',
                'san_pham' => [
                    'nhieu_sp' => true,
                    'so_luong' => 12,
                    'loai' => 'Mệnh Hỏa'
                ],
                'muc_giam' => [
                    'kieu' => 'so_tien',
                    'gia_tri' => '-100.000đ',
                ],
                'thoi_gian' => [
                    'chi_tiet' => '25/05/2026 - 30/05/2026',
                    'trang_thai' => 'Bắt đầu sau 5 ngày',
                    'class' => 'text-blue-500'
                ],
                'so_luong' => [
                    'tong' => -1, // Không giới hạn
                    'da_ban' => 0
                ],
                'doanh_thu' => '0đ',
                'trang_thai' => 'Sắp bắt đầu',
                'nguoi_tao' => 'Hải Admin',
                'ngay_tao' => '20/05/2026'
            ],
            [
                'ma_km' => 'CLEARANCE',
                'ten_chuong_trinh' => 'Xả kho sản phẩm bán chậm',
                'loai_km' => 'Xả kho',
                'san_pham' => [
                    'nhieu_sp' => true,
                    'so_luong' => 8,
                    'loai' => 'Tồn kho > 6 tháng'
                ],
                'muc_giam' => [
                    'kieu' => 'phan_tram',
                    'gia_tri' => '-50%',
                ],
                'thoi_gian' => [
                    'chi_tiet' => '01/04/2026 - 30/04/2026',
                    'trang_thai' => 'Đã kết thúc',
                    'class' => 'text-gray-400'
                ],
                'so_luong' => [
                    'tong' => -1,
                    'da_ban' => 32
                ],
                'doanh_thu' => '15.200.000đ',
                'trang_thai' => 'Đã kết thúc',
                'nguoi_tao' => 'Hệ thống',
                'ngay_tao' => '01/04/2026'
            ]
        ];

        $data = [
            'tieu_de' => 'Khuyến mãi sản phẩm - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'khuyen_mai',
            'thong_ke' => $thong_ke,
            'danh_sach' => $danh_sach
        ];

        $this->view('admin_khuyen_mai', $data, 'admin');
    }

    public function taoMoi() {
        $data = [
            'tieu_de' => 'Thêm khuyến mãi - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'khuyen_mai',
            'is_edit' => false
        ];
        $this->view('admin_khuyen_mai_form', $data, 'admin');
    }

    public function trangCapNhat() {
        $data = [
            'tieu_de' => 'Sửa khuyến mãi - Chuỗi Ngọc Phong Thủy',
            'current_page' => 'khuyen_mai',
            'is_edit' => true,
            'mock_data' => [
                'ten' => 'Flash Sale Vòng Ngọc Tháng 5',
                'ma' => 'FLASH-T5',
                'loai' => 'flash_sale',
                'muc_giam' => 20,
                'ngay_bd' => '2026-05-01T00:00',
                'ngay_kt' => '2026-05-31T23:59',
                'sp_ap_dung' => 'NB-TL-001'
            ]
        ];
        $this->view('admin_khuyen_mai_form', $data, 'admin');
    }
}
