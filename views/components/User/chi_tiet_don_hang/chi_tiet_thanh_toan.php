<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <h3 class="font-bold text-gray-900 mb-4">Chi tiết thanh toán</h3>
    
    <div class="space-y-3">
        <div class="flex justify-between text-sm text-gray-600">
            <span>Tạm tính (<?= count($orderItems) ?> sản phẩm)</span>
            <span class="font-medium text-gray-900"><?= number_format($order['subtotal'], 0, ',', '.') ?>đ</span>
        </div>
        <div class="flex justify-between text-sm text-gray-600">
            <span>Phí vận chuyển</span>
            <span class="font-medium text-gray-900"><?= number_format($order['shipping_fee'], 0, ',', '.') ?>đ</span>
        </div>
        <div class="flex justify-between text-sm text-gray-600">
            <span>Dịch vụ thêm</span>
            <span class="font-medium text-gray-900"><?= number_format($order['gift_fee'], 0, ',', '.') ?>đ</span>
        </div>
        
        <?php if($order['discount'] > 0): ?>
        <div class="flex justify-between text-sm text-green-600 pb-3 border-b border-gray-100">
            <span>Voucher/Giảm giá</span>
            <span class="font-medium">-<?= number_format($order['discount'], 0, ',', '.') ?>đ</span>
        </div>
        <?php endif; ?>
        
        <div class="flex justify-between items-center pt-2 border-t border-gray-100">
            <span class="font-bold text-gray-900">Tổng thanh toán</span>
            <span class="text-2xl font-bold text-[#8b0000]"><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</span>
        </div>
    </div>
</div>
