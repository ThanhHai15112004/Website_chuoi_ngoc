<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex items-center gap-2 mb-4">
        <i class="fas fa-credit-card text-[#8b0000]"></i>
        <h3 class="font-bold text-gray-900">Thông tin thanh toán</h3>
    </div>
    
    <div class="mb-4">
        <p class="text-sm text-gray-500 mb-1">Phương thức</p>
        <p class="text-sm font-medium text-gray-900"><?= htmlspecialchars($order['payment_method']) ?></p>
    </div>
    <div>
        <p class="text-sm text-gray-500 mb-1">Trạng thái</p>
        <?php if($order['payment_status'] === 'Đã thanh toán'): ?>
            <span class="inline-block px-3 py-1 bg-green-50 text-green-700 text-xs font-medium rounded-full border border-green-100">Đã thanh toán</span>
        <?php else: ?>
            <span class="inline-block px-3 py-1 bg-yellow-50 text-yellow-700 text-xs font-medium rounded-full border border-yellow-100">Chưa thanh toán</span>
            <p class="text-xs text-gray-500 mt-2 italic">Bạn sẽ thanh toán bằng tiền mặt khi nhận được sản phẩm.</p>
        <?php endif; ?>
    </div>
</div>
