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
                'hinh_anh' => 'https://images.unsplash.com/photo-1611591437281-460bfbe1220a?q=80&w=600&auto=format&fit=crop',
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
                'hinh_anh' => 'https://images.unsplash.com/photo-1599643478524-fb66645366f4?q=80&w=600&auto=format&fit=crop',
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
                'hinh_anh' => 'https://images.unsplash.com/photo-1606760227091-3dd870d97f1d?q=80&w=600&auto=format&fit=crop',
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
                'hinh_anh' => 'https://images.unsplash.com/photo-1549465220-1a8b9238cd48?q=80&w=600&auto=format&fit=crop',
                'gia' => 50000,
                'gia_cu' => 0,
                'nhan' => '',
                'danh_gia' => 5.0,
                'da_ban' => 1250
            ],
            [
                'id' => 102,
                'ten' => 'Túi gấm lụa bảo quản vòng ngọc',
                'hinh_anh' => 'https://images.unsplash.com/photo-1631541909061-71e34df0fe5c?q=80&w=600&auto=format&fit=crop',
                'gia' => 35000,
                'gia_cu' => 0,
                'nhan' => 'Mới',
                'danh_gia' => 4.9,
                'da_ban' => 850
            ],
            [
                'id' => 103,
                'ten' => 'Dây thay dự phòng xỏ vòng tay',
                'hinh_anh' => 'https://images.unsplash.com/photo-1596700867807-73d842d0cde0?q=80&w=600&auto=format&fit=crop',
                'gia' => 15000,
                'gia_cu' => 20000,
                'nhan' => 'Sale',
                'danh_gia' => 4.8,
                'da_ban' => 3000
            ],
            [
                'id' => 104,
                'ten' => 'Nước thanh tẩy đá tự nhiên (50ml)',
                'hinh_anh' => 'https://images.unsplash.com/photo-1616401784845-180882ba9ba8?q=80&w=600&auto=format&fit=crop',
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
