<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex items-center gap-2 mb-4">
        <i class="fas fa-map-marker-alt text-[#8b0000]"></i>
        <h3 class="font-bold text-gray-900">Thông tin giao hàng</h3>
    </div>
    <div class="space-y-2 text-sm text-gray-700">
        <p class="font-bold text-gray-900 text-base"><?= htmlspecialchars($order['customer_name']) ?></p>
        <p><?= htmlspecialchars($order['customer_phone']) ?></p>
        <p class="text-gray-500"><?= htmlspecialchars($order['customer_address']) ?></p>
    </div>
    
    <div class="mt-4 pt-4 border-t border-gray-100 space-y-2">
        <p class="text-sm text-gray-600"><span class="font-medium text-gray-900">Đơn vị:</span> <?= htmlspecialchars($order['shipping_provider']) ?></p>
        <p class="text-sm text-gray-600"><span class="font-medium text-gray-900">Dự kiến:</span> <?= htmlspecialchars($order['shipping_expected_dates']) ?></p>
    </div>
</div>
