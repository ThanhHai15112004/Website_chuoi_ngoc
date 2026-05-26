<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold text-gray-800">Doanh thu theo loại đá</h3>
        <button class="text-gray-400 hover:text-[#6B0D18]"><span class="iconify" data-icon="mdi:export"></span></button>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 text-xs uppercase text-gray-500 font-medium border-y border-gray-100">
                    <th class="py-2 px-3">Loại đá</th>
                    <th class="py-2 px-3 text-right">Doanh thu</th>
                    <th class="py-2 px-3 text-right">Tỷ trọng</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                <?php foreach($revenueByStone as $stone): ?>
                <tr class="group hover:bg-gray-50">
                    <td class="py-2.5 px-3">
                        <div class="font-medium text-gray-800"><?= $stone['ten'] ?></div>
                        <div class="text-[11px] text-gray-400 truncate w-32" title="<?= $stone['top_sp'] ?>">Top: <?= $stone['top_sp'] ?></div>
                    </td>
                    <td class="py-2.5 px-3 text-right font-medium text-[#6B0D18]"><?= number_format($stone['doanh_thu']/1000000, 1, ',', '.') ?> Tr</td>
                    <td class="py-2.5 px-3 text-right">
                        <span class="inline-block bg-gray-100 text-gray-600 px-2 py-0.5 rounded text-xs"><?= $stone['ty_trong'] ?>%</span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
