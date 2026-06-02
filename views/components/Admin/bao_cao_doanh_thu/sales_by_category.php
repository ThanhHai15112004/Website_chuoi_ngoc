<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold text-gray-800">Doanh thu theo danh mục</h3>
        <button class="text-gray-400 hover:text-[#6B0D18]"><span class="iconify" data-icon="mdi:export"></span></button>
    </div>
    
    <div class="space-y-4">
        <?php if (empty($revenueByCategory)): ?>
            <div class="text-center text-gray-500 py-4">Chưa có dữ liệu.</div>
        <?php else: ?>
        <?php foreach($revenueByCategory as $cat): ?>
        <div>
            <div class="flex justify-between items-end mb-1">
                <span class="text-sm font-medium text-gray-700"><?= $cat['ten'] ?></span>
                <span class="text-sm font-bold text-[#6B0D18]"><?= number_format($cat['doanh_thu'], 0, ',', '.') ?>đ</span>
            </div>
            <div class="flex items-center gap-3">
                <div class="flex-1 h-2 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-red-400 rounded-full" style="width: <?= $cat['ty_trong'] ?>%"></div>
                </div>
                <span class="text-xs font-medium text-gray-500 w-10 text-right"><?= $cat['ty_trong'] ?>%</span>
            </div>
            <div class="text-[11px] text-gray-400 mt-1 text-right">
                <?= $cat['sp_ban'] ?> SP &bull; <?= $cat['so_don'] ?> Đơn
            </div>
        </div>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
