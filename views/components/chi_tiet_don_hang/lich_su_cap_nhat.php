<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <h3 class="font-bold text-gray-900 mb-6">Lịch sử cập nhật</h3>
    <div class="space-y-6 ml-2 border-l-2 border-gray-100 pl-4 relative">
        <?php foreach($orderHistory as $index => $history): ?>
        <div class="relative">
            <span class="absolute -left-[21px] top-1 w-3 h-3 rounded-full <?= $index === 0 ? 'bg-[#8b0000]' : 'bg-gray-300' ?>"></span>
            <p class="text-xs text-gray-500 mb-1"><?= date('d/m/Y, H:i', strtotime($history['created_at'])) ?></p>
            <p class="text-sm <?= $index === 0 ? 'text-gray-900 font-medium' : 'text-gray-600' ?>"><?= htmlspecialchars($history['description']) ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>
