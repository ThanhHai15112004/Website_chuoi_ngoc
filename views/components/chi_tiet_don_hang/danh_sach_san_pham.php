<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-8">
    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h3 class="font-bold text-gray-900">Sản phẩm trong đơn hàng</h3>
        <span class="text-sm text-gray-500"><?= count($orderItems) ?> sản phẩm</span>
    </div>
    <div class="p-0">
        <?php foreach($orderItems as $item): ?>
        <!-- Product Item -->
        <div class="p-6 border-b border-gray-100 flex flex-col sm:flex-row gap-6 hover:bg-gray-50 transition-colors">
            <div class="w-24 h-24 rounded-lg overflow-hidden border border-gray-100 flex-shrink-0">
                <img src="<?= htmlspecialchars($item['product_image']) ?>" alt="<?= htmlspecialchars($item['product_name']) ?>" class="w-full h-full object-cover">
            </div>
            <div class="flex-1">
                <div class="flex justify-between items-start gap-4 mb-2">
                    <h4 class="font-bold text-gray-900 text-lg"><?= htmlspecialchars($item['product_name']) ?></h4>
                    <p class="font-bold text-gray-900"><?= number_format($item['price'], 0, ',', '.') ?>đ</p>
                </div>
                <p class="text-sm text-gray-500 mb-1"><?= htmlspecialchars($item['note']) ?></p>
                <p class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($item['variant']) ?></p>
                
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-600">Số lượng: <?= $item['quantity'] ?></span>
                    <a href="<?= APP_URL ?>/chi-tiet-san-pham" class="px-4 py-2 border border-[#8b0000] text-[#8b0000] hover:bg-[#8b0000] hover:text-white rounded-lg text-sm font-medium transition-colors text-center" style="text-decoration: none;">Xem sản phẩm</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
