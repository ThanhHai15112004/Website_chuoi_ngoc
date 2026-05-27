<?php
namespace App\Controllers\Admin;

use App\Core\Controller;

class ThanhToanVanChuyenController extends Controller
{
    public function index()
    {
        // Mock data
        $payments = [
            ['id' => 'COD', 'name' => 'Thanh toán khi nhận hàng', 'desc' => 'Khách thanh toán cho nhân viên giao hàng khi nhận sản phẩm', 'condition' => 'Áp dụng toàn bộ đơn hàng', 'fee' => 0, 'status' => true],
            ['id' => 'BANK', 'name' => 'Chuyển khoản ngân hàng', 'desc' => 'Khách chuyển khoản trước khi shop xử lý đơn', 'condition' => 'Đơn từ 0đ', 'fee' => 0, 'status' => true],
        ];

        $banks = [
            ['id' => 1, 'bank_name' => 'Vietcombank', 'owner' => 'CÔNG TY CHUỖI NGỌC', 'number' => '123456789', 'branch' => 'Chi nhánh Hội sở chính', 'is_default' => true, 'status' => true],
        ];

        $shipping_methods = [
            ['id' => 'STD', 'name' => 'Giao hàng tiêu chuẩn', 'desc' => 'Giao toàn quốc trong 2 - 5 ngày', 'zone' => 'Toàn quốc', 'time' => '2 - 5 ngày', 'fee' => 30000, 'freeship' => 500000, 'status' => true],
            ['id' => 'FAST', 'name' => 'Giao hàng nhanh', 'desc' => 'Giao tốc hành', 'zone' => 'Toàn quốc', 'time' => '1 - 2 ngày', 'fee' => 50000, 'freeship' => 0, 'status' => false],
            ['id' => 'STORE', 'name' => 'Nhận tại cửa hàng', 'desc' => 'Khách đến cửa hàng lấy', 'zone' => 'Hà Nội', 'time' => 'Lấy ngay', 'fee' => 0, 'freeship' => 0, 'status' => true],
        ];

        $shipping_zones = [
            ['id' => 1, 'name' => 'Nội thành Hà Nội', 'provinces' => 'Quận Cầu Giấy, Quận Đống Đa, Quận Ba Đình...', 'fee_std' => 20000, 'fee_fast' => 35000, 'freeship' => 500000, 'time' => '1 - 2 ngày', 'status' => true],
            ['id' => 2, 'name' => 'Toàn quốc', 'provinces' => 'Tất cả các tỉnh thành còn lại', 'fee_std' => 30000, 'fee_fast' => 50000, 'freeship' => 500000, 'time' => '2 - 5 ngày', 'status' => true],
        ];

        $freeship_rules = [
            ['id' => 1, 'name' => 'Freeship đơn từ 500.000đ', 'zone' => 'Áp dụng toàn quốc', 'condition' => 'Đơn từ 500.000đ', 'status' => true],
            ['id' => 2, 'name' => 'Freeship cho hạng Diamond', 'zone' => 'Áp dụng mọi đơn hàng', 'condition' => 'Hạng Diamond', 'status' => true],
        ];

        $this->view('admin_thanh_toan_van_chuyen', [
            'title' => 'Thanh toán & vận chuyển',
            'current_page' => 'thanh_toan_van_chuyen',
            'payments' => $payments,
            'banks' => $banks,
            'shipping_methods' => $shipping_methods,
            'shipping_zones' => $shipping_zones,
            'freeship_rules' => $freeship_rules
        ], 'admin');
    }
}
