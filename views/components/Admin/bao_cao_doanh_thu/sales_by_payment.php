<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-base font-bold text-gray-800">Doanh thu theo Thanh toán</h3>
    </div>
    
    <div class="space-y-3">
        <?php foreach($paymentMethods as $pm): ?>
        <div>
            <div class="flex justify-between items-center mb-1">
                <span class="text-sm font-medium text-gray-700"><?= $pm['ten'] ?></span>
                <span class="text-sm font-bold text-[#6B0D18]"><?= number_format($pm['doanh_thu']/1000000, 1, ',', '.') ?> Tr</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="flex-1 h-1.5 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-gray-400 rounded-full" style="width: <?= $pm['ty_le'] ?>%"></div>
                </div>
                <span class="text-xs font-medium text-gray-500 w-8 text-right"><?= $pm['ty_le'] ?>%</span>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
