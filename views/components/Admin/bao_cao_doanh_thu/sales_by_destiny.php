<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold text-gray-800">Doanh thu theo Mệnh</h3>
        <button class="text-gray-400 hover:text-[#6B0D18]"><span class="iconify" data-icon="mdi:export"></span></button>
    </div>
    
    <div class="space-y-3">
        <?php foreach($revenueByDestiny as $destiny): ?>
        <div class="flex items-center justify-between p-2 rounded-lg hover:bg-gray-50 transition-colors border border-transparent hover:border-gray-100">
            <div class="flex items-center gap-3">
                <span class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm <?= $destiny['badge'] ?>">
                    <?= $destiny['ten'] ?>
                </span>
                <div>
                    <div class="text-sm font-medium text-gray-800"><?= number_format($destiny['doanh_thu'], 0, ',', '.') ?>đ</div>
                    <div class="text-[11px] text-gray-500 mt-0.5">Top: <?= $destiny['top_da'] ?></div>
                </div>
            </div>
            <div class="text-right">
                <div class="text-sm font-bold text-[#6B0D18]"><?= $destiny['ty_trong'] ?>%</div>
                <div class="text-[11px] text-gray-400 mt-0.5"><?= $destiny['sp_ban'] ?> SP</div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
