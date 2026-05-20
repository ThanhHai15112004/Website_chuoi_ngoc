<div class="flex flex-col gap-6">
    <!-- Note -->
    <?php if(!empty($order['note'])): ?>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-2 mb-4">
            <i class="far fa-clipboard text-[#8b0000]"></i>
            <h3 class="font-bold text-gray-900">Ghi chú đơn hàng</h3>
        </div>
        <div class="bg-yellow-50/50 p-4 rounded-lg border border-yellow-100 h-full">
            <p class="text-sm text-gray-700 italic">"<?= nl2br(htmlspecialchars($order['note'])) ?>"</p>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Extras -->
    <?php 
    $extras = json_decode($order['extra_services'], true);
    if(!empty($extras)): 
    ?>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-2 mb-4">
            <i class="fas fa-gift text-[#8b0000]"></i>
            <h3 class="font-bold text-gray-900">Dịch vụ thêm</h3>
        </div>
        <ul class="space-y-3">
            <?php foreach($extras as $ex): ?>
            <li class="flex justify-between text-sm">
                <span class="text-gray-600"><?= htmlspecialchars($ex['name']) ?></span>
                <span class="font-medium <?= $ex['price'] == 0 ? 'text-green-600' : 'text-gray-900' ?>">
                    <?= $ex['price'] == 0 ? 'Miễn phí' : number_format($ex['price'], 0, ',', '.') . 'đ' ?>
                </span>
            </li>
            <?php if(!empty($ex['note'])): ?>
            <li class="text-sm text-gray-500 italic mt-1 border-t border-gray-100 pt-2">
                Nội dung: "<?= htmlspecialchars($ex['note']) ?>"
            </li>
            <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
</div>
