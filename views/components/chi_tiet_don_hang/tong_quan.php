<?php
    $statusLabels = [
        'pending' => ['label' => 'Chờ xác nhận', 'color' => 'bg-yellow-50 text-yellow-700', 'desc' => 'Đơn hàng đang chờ cửa hàng xác nhận.'],
        'confirmed' => ['label' => 'Đã xác nhận', 'color' => 'bg-blue-50 text-blue-700', 'desc' => 'Cửa hàng đã xác nhận đơn và chuẩn bị sản phẩm.'],
        'shipping' => ['label' => 'Đang giao', 'color' => 'bg-indigo-50 text-indigo-700', 'desc' => 'Đơn hàng đang được giao đến bạn.'],
        'delivered' => ['label' => 'Đã giao', 'color' => 'bg-teal-50 text-teal-700', 'desc' => 'Đơn hàng đã giao thành công.'],
        'completed' => ['label' => 'Thành công', 'color' => 'bg-green-50 text-green-700', 'desc' => 'Đơn hàng hoàn tất.'],
        'cancelled' => ['label' => 'Đã hủy', 'color' => 'bg-red-50 text-red-700', 'desc' => 'Đơn hàng đã bị hủy.']
    ];
    $currentStatus = $statusLabels[$order['status']] ?? $statusLabels['pending'];
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8 flex flex-col md:flex-row items-center justify-between gap-6">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-full <?= explode(' ', $currentStatus['color'])[0] ?> flex items-center justify-center flex-shrink-0">
            <i class="fas fa-box-open <?= explode(' ', $currentStatus['color'])[1] ?> text-xl"></i>
        </div>
        <div>
            <p class="text-sm text-gray-500 mb-1">Trạng thái hiện tại</p>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 <?= $currentStatus['color'] ?> text-sm font-medium rounded-full"><?= $currentStatus['label'] ?></span>
                <span class="text-sm text-gray-600 hidden sm:inline-block">- <?= $currentStatus['desc'] ?></span>
            </div>
        </div>
    </div>
    
    <div class="flex flex-wrap md:flex-nowrap gap-6 w-full md:w-auto">
        <div class="w-1/2 md:w-auto">
            <p class="text-sm text-gray-500 mb-1">Phương thức thanh toán</p>
            <p class="text-sm font-medium text-gray-900"><?= htmlspecialchars($order['payment_method']) ?></p>
        </div>
        <div class="w-1/2 md:w-auto md:text-right">
            <p class="text-sm text-gray-500 mb-1">Tổng tiền</p>
            <p class="text-xl font-bold text-[#8b0000]"><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</p>
        </div>
    </div>
</div>
