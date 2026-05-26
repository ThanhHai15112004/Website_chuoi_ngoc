<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-base font-bold text-gray-800">Doanh thu theo Hạng TV</h3>
    </div>
    
    <div class="space-y-3">
        <?php foreach($customerRanks as $rank): ?>
        <div class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50 border border-transparent hover:border-gray-100">
            <div>
                <span class="px-2 py-0.5 rounded text-xs font-bold <?= $rank['badge'] ?>"><?= $rank['hang'] ?></span>
                <div class="text-[11px] text-gray-500 mt-1"><?= $rank['khach'] ?> khách &bull; <?= $rank['so_don'] ?> đơn</div>
            </div>
            <div class="text-right">
                <div class="text-sm font-bold text-[#6B0D18]"><?= number_format($rank['doanh_thu']/1000000, 1, ',', '.') ?> Tr</div>
                <div class="text-[11px] text-gray-400 mt-1">TB: <?= number_format($rank['tb_don']/1000, 0, ',', '.') ?>k/đơn</div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
