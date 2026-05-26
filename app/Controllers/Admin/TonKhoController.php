<?php

namespace App\Controllers\Admin;

use App\Core\Controller;

class TonKhoController extends Controller
{
    public function index()
    {
        // Mock data cho danh sách sản phẩm trong kho
        $inventoryProducts = [
            [
                'id' => 1,
                'sku' => 'NB-TL-001',
                'name' => 'Vòng Ngọc Bích Tài Lộc',
                'category' => 'Vòng tay phong thủy',
                'gemstone' => 'Ngọc bích',
                'variant' => 'Size 16cm · Hạt 8mm',
                'stock_current' => 25,
                'stock_threshold' => 10,
                'sales_30d' => 45,
                'expected_out' => 7, // days
                'status' => 'Còn hàng', // Còn hàng, Sắp hết hàng, Hết hàng, Tồn kho cao
                'last_updated' => '18/05/2026, 09:30',
                'updated_by' => 'Hải Admin',
                'image' => 'images/products/ngoc_bich.jpg' // Giả sử có sẵn hoặc xài placeholder
            ],
            [
                'id' => 2,
                'sku' => 'CT-PA-002',
                'name' => 'Chuỗi Cẩm Thạch Bình An',
                'category' => 'Chuỗi ngọc',
                'gemstone' => 'Cẩm thạch',
                'variant' => 'Size 18cm · Hạt 10mm',
                'stock_current' => 4,
                'stock_threshold' => 5,
                'sales_30d' => 12,
                'expected_out' => 10,
                'status' => 'Sắp hết hàng',
                'last_updated' => '15/05/2026, 14:20',
                'updated_by' => 'Hải Admin',
                'image' => 'images/products/cam_thach.jpg'
            ],
            [
                'id' => 3,
                'sku' => 'TA-T-003',
                'name' => 'Vòng Thạch Anh Tím Cao Cấp',
                'category' => 'Vòng cao cấp',
                'gemstone' => 'Thạch anh',
                'variant' => 'Mặc định',
                'stock_current' => 0,
                'stock_threshold' => 3,
                'sales_30d' => 8,
                'expected_out' => 0,
                'status' => 'Hết hàng',
                'last_updated' => '10/05/2026, 11:15',
                'updated_by' => 'Hệ thống (DH0012)',
                'image' => 'images/products/thach_anh_tim.jpg'
            ],
            [
                'id' => 4,
                'sku' => 'MH-B-004',
                'name' => 'Vòng Đá Mắt Hổ Bảo Vệ',
                'category' => 'Vòng đá tự nhiên',
                'gemstone' => 'Đá mắt hổ',
                'variant' => 'Size 17cm · Hạt 12mm',
                'stock_current' => 85,
                'stock_threshold' => 15,
                'sales_30d' => 5,
                'expected_out' => 999,
                'status' => 'Tồn kho cao',
                'last_updated' => '01/05/2026, 08:00',
                'updated_by' => 'Kho tổng',
                'image' => 'images/products/mat_ho.jpg'
            ],
            [
                'id' => 5,
                'sku' => 'RB-H-005',
                'name' => 'Vòng Tay Ruby Huyết',
                'category' => 'Vòng cao cấp',
                'gemstone' => 'Ruby',
                'variant' => 'Size 15cm · Vàng 18k',
                'stock_current' => 12,
                'stock_threshold' => 5,
                'sales_30d' => 2,
                'expected_out' => 60,
                'status' => 'Còn hàng',
                'last_updated' => '20/05/2026, 16:45',
                'updated_by' => 'Hải Admin',
                'image' => 'images/products/ruby.jpg'
            ],
            [
                'id' => 6,
                'sku' => 'ERR-006',
                'name' => 'Tượng Tỳ Hưu Cẩm Thạch',
                'category' => 'Vật phẩm phong thủy',
                'gemstone' => 'Cẩm thạch',
                'variant' => 'Size Nhỏ',
                'stock_current' => -2,
                'stock_threshold' => 2,
                'sales_30d' => 15,
                'expected_out' => 0,
                'status' => 'Lỗi kho',
                'last_updated' => '25/05/2026, 10:10',
                'updated_by' => 'Hệ thống (DH0099)',
                'image' => 'images/products/ty_huu.jpg'
            ]
        ];

        // Mock data thống kê
        $stats = [
            'total_products' => 256,
            'in_stock' => 218,
            'low_stock' => 18,
            'out_of_stock' => 8,
            'high_stock' => 12,
            'total_items' => 3420,
            'inventory_value' => 285000000 // 285 triệu
        ];

        // Pass data to view
        $this->view('admin_ton_kho', [
            'title' => 'Tồn Kho Hiện Tại - Admin',
            'current_page' => 'ton_kho',
            'inventoryProducts' => $inventoryProducts,
            'stats' => $stats
        ], 'admin');
    }
}
