<?php
namespace App\Controllers\User;

use App\Core\Controller;

class CartController extends Controller {
    public function index() {
        // Dữ liệu giả định giỏ hàng (mock data)
        $gio_hang = [
            [
                'id' => 1,
                'ten' => 'Vòng Ngọc Bích Tài Lộc',
                'hinh_anh' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg',
                'loai_da' => 'Ngọc bích',
                'menh' => 'Mộc, Hỏa',
                'kich_thuoc_hat' => '8mm',
                'size_vong' => '16cm',
                'gia' => 850000,
                'gia_cu' => 0,
                'so_luong' => 1,
                'con_hang' => true,
                'ton_kho' => 5
            ],
            [
                'id' => 2,
                'ten' => 'Chuỗi Thạch Anh Hồng Tình Duyên',
                'hinh_anh' => APP_URL . '/public/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-1.jpg',
                'loai_da' => 'Thạch anh',
                'menh' => 'Hỏa, Thổ',
                'kich_thuoc_hat' => '10mm',
                'size_vong' => '17cm',
                'gia' => 680000,
                'gia_cu' => 850000,
                'so_luong' => 2,
                'con_hang' => true,
                'ton_kho' => 10
            ],
            [
                'id' => 3,
                'ten' => 'Vòng Trầm Hương Mắt Bầu',
                'hinh_anh' => APP_URL . '/public/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg',
                'loai_da' => 'Trầm hương tự nhiên',
                'menh' => 'Thủy, Mộc',
                'kich_thuoc_hat' => '12mm',
                'size_vong' => '18cm',
                'gia' => 1250000,
                'gia_cu' => 1500000,
                'so_luong' => 1,
                'con_hang' => false, // Hết hàng
                'ton_kho' => 0
            ]
        ];

        // Dữ liệu voucher gợi ý
        $vouchers = [
            [
                'ma' => 'GIAM50K',
                'ten' => 'Giảm 50K',
                'dieu_kien' => 'Đơn từ 500K',
                'han_su_dung' => '30/06/2026'
            ],
            [
                'ma' => 'FREESHIP',
                'ten' => 'Freeship',
                'dieu_kien' => 'Đơn từ 300K',
                'han_su_dung' => '30/06/2026'
            ]
        ];

        // Sản phẩm gợi ý mua thêm
        $san_pham_goi_y = [
            [
                'id' => 101,
                'ten' => 'Hộp quà cao cấp lót nhung đỏ',
                'hinh_anh' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-1.jpg',
                'gia' => 50000,
                'gia_cu' => 0,
                'nhan' => '',
                'danh_gia' => 5.0,
                'da_ban' => 1250
            ],
            [
                'id' => 102,
                'ten' => 'Túi gấm lụa bảo quản vòng ngọc',
                'hinh_anh' => APP_URL . '/public/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-2.jpg',
                'gia' => 35000,
                'gia_cu' => 0,
                'nhan' => 'Mới',
                'danh_gia' => 4.9,
                'da_ban' => 850
            ],
            [
                'id' => 103,
                'ten' => 'Dây thay dự phòng xỏ vòng tay',
                'hinh_anh' => APP_URL . '/public/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-2.jpg',
                'gia' => 15000,
                'gia_cu' => 20000,
                'nhan' => 'Sale',
                'danh_gia' => 4.8,
                'da_ban' => 3000
            ],
            [
                'id' => 104,
                'ten' => 'Nước thanh tẩy đá tự nhiên (50ml)',
                'hinh_anh' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-2.jpg',
                'gia' => 120000,
                'gia_cu' => 0,
                'nhan' => '',
                'danh_gia' => 4.7,
                'da_ban' => 420
            ]
        ];

        // Render view
        $this->view('gio_hang', [
            'title' => 'Giỏ hàng của bạn - Chuỗi Ngọc',
            'gio_hang' => $gio_hang,
            'vouchers' => $vouchers,
            'san_pham_goi_y' => $san_pham_goi_y
        ]);
    }
}
