<?php

namespace App\Services\Admin;

use App\Models\Admin\TonKhoModel;

class TonKhoService
{
    private $tonKhoModel;

    public function __construct()
    {
        $this->tonKhoModel = new TonKhoModel();
    }

    public function getInventoryData($filters, $page = 1, $limit = 20)
    {
        $offset = ($page - 1) * $limit;
        
        $list = $this->tonKhoModel->layDanhSachTonKho($filters, $limit, $offset);
        $total = $this->tonKhoModel->demDanhSachTonKho($filters);
        
        // Process calculated fields
        foreach ($list as &$item) {
            // expected out
            $salesPerDay = $item['sales_30d'] / 30;
            if ($salesPerDay > 0) {
                $expectedOutDays = round($item['stock_current'] / $salesPerDay);
                $item['expected_out'] = $expectedOutDays;
            } else {
                $item['expected_out'] = 999; // Bán chậm / Không bán được
            }

            // status
            if ($item['stock_current'] <= 0) {
                $item['status'] = 'Hết hàng';
            } elseif ($item['stock_current'] < $item['stock_threshold']) {
                $item['status'] = 'Sắp hết hàng';
            } elseif ($item['stock_current'] > 50) {
                $item['status'] = 'Tồn kho cao';
            } else {
                $item['status'] = 'Còn hàng';
            }

            // defaults
            if (!$item['category']) $item['category'] = 'Chưa phân loại';
            if (!$item['gemstone']) $item['gemstone'] = 'Khác';
            if (!$item['image']) $item['image'] = 'images/placeholder.jpg';

            $item['last_updated'] = 'Vừa xong';
            $item['updated_by'] = 'Hệ thống';
        }

        return [
            'list' => $list,
            'pagination' => [
                'total' => $total,
                'per_page' => $limit,
                'current_page' => $page,
                'last_page' => ceil($total / $limit)
            ]
        ];
    }

    public function getStats()
    {
        $stats = $this->tonKhoModel->layThongKe();
        
        return [
            'total_products' => $stats['total_products'] ?? 0,
            'in_stock' => $stats['in_stock'] ?? 0,
            'low_stock' => $stats['low_stock'] ?? 0,
            'out_of_stock' => $stats['out_of_stock'] ?? 0,
            'high_stock' => $stats['high_stock'] ?? 0,
            'total_items' => $stats['total_items'] ?? 0,
            'inventory_value' => $stats['inventory_value'] ?? 0
        ];
    }

    public function dieuChinhKho($data)
    {
        $variantId = $data['variant_id'];
        $actualStock = max(0, $data['actual_stock']);
        $currentStock = $data['current_stock'];
        $diff = $actualStock - $currentStock;

        if ($diff === 0) {
            return ['success' => false, 'message' => 'Tồn kho thực tế không thay đổi so với hiện tại.'];
        }

        if (empty($data['note'])) {
            return ['success' => false, 'message' => 'Vui lòng nhập lý do điều chỉnh.'];
        }

        $loaiPhieu = 4; // 4: Kiểm kê
        $maPhieu = 'KK-' . date('Ymd-His') . '-' . rand(100, 999);

        $success = $this->tonKhoModel->thucThiThaoTacKho([
            'variant_id' => $variantId,
            'ma_phieu' => $maPhieu,
            'loai_phieu' => $loaiPhieu,
            'user_id' => $data['user_id'],
            'note' => $data['note'],
            'quantity_diff' => $diff,
            'actual_stock' => $actualStock
        ]);

        return ['success' => $success];
    }
}
