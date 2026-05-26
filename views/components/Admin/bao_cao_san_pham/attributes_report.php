<!-- Báo cáo theo Loại Đá / Ngọc -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-full">
    <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:diamond-stone"></span> Hiệu quả theo loại đá / ngọc
        </h3>
    </div>
    
    <div class="overflow-x-auto flex-1">
        <table class="w-full text-left border-collapse min-w-[500px]">
            <thead>
                <tr class="bg-white text-[11px] uppercase tracking-wider text-gray-400 font-bold border-b border-gray-100">
                    <th class="py-3 px-4">Loại đá</th>
                    <th class="py-3 px-4 text-center">SP Đang bán</th>
                    <th class="py-3 px-4 text-center">Đã bán</th>
                    <th class="py-3 px-4 text-right">Doanh thu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-sm">
                <?php foreach($stoneReport as $stone): ?>
                <tr class="hover:bg-red-50/30 transition-colors group">
                    <td class="py-3 px-4">
                        <div class="flex items-center gap-3">
                            <img src="<?= $stone['hinh_anh'] ?>" alt="<?= $stone['ten'] ?>" class="w-10 h-10 rounded-lg object-cover border border-gray-100 shrink-0">
                            <div>
                                <div class="font-bold text-gray-800"><?= $stone['ten'] ?></div>
                                <div class="text-[11px] text-gray-500 w-32 truncate" title="Top: <?= $stone['top_sp'] ?>">Top: <?= $stone['top_sp'] ?></div>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4 text-center text-gray-600 font-medium"><?= $stone['sp_dang_ban'] ?></td>
                    <td class="py-3 px-4 text-center text-gray-800 font-bold"><?= $stone['da_ban'] ?></td>
                    <td class="py-3 px-4 text-right">
                        <div class="font-bold text-[#6B0D18]"><?= number_format($stone['doanh_thu']/1000000, 1, ',', '.') ?> Tr</div>
                        <div class="w-16 h-1 bg-gray-100 rounded-full mt-1.5 ml-auto">
                            <div class="h-full bg-red-400 rounded-full" style="width: <?= $stone['ty_trong'] ?>%"></div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="p-3 border-t border-gray-100 bg-gray-50 text-center">
        <a href="<?= APP_URL ?>/admin/loai-da" class="text-sm text-[#6B0D18] font-medium hover:underline">Xem tất cả loại đá</a>
    </div>
</div>

<!-- Báo cáo theo Mệnh Phong Thủy -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-full">
    <div class="p-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
        <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:yin-yang"></span> Hiệu quả theo Mệnh phong thủy
        </h3>
    </div>
    
    <div class="overflow-x-auto flex-1">
        <table class="w-full text-left border-collapse min-w-[500px]">
            <thead>
                <tr class="bg-white text-[11px] uppercase tracking-wider text-gray-400 font-bold border-b border-gray-100">
                    <th class="py-3 px-4">Mệnh</th>
                    <th class="py-3 px-4">Đá nổi bật</th>
                    <th class="py-3 px-4 text-center">Đã bán</th>
                    <th class="py-3 px-4 text-right">Doanh thu</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50 text-sm">
                <?php foreach($destinyReport as $destiny): ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold <?= $destiny['badge'] ?>">
                            <?= $destiny['ten'] ?>
                        </span>
                        <div class="text-[11px] text-gray-500 mt-1"><?= $destiny['sp_phu_hop'] ?> SP phù hợp</div>
                    </td>
                    <td class="py-3 px-4 text-xs text-gray-600 max-w-[150px] leading-relaxed">
                        <?= $destiny['da_noi_bat'] ?>
                    </td>
                    <td class="py-3 px-4 text-center font-bold text-gray-800">
                        <?= $destiny['da_ban'] ?>
                    </td>
                    <td class="py-3 px-4 text-right">
                        <div class="font-bold text-[#6B0D18]"><?= number_format($destiny['doanh_thu']/1000000, 1, ',', '.') ?> Tr</div>
                        <div class="text-[11px] text-gray-500 mt-0.5"><?= $destiny['ty_trong'] ?>% tổng DT</div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="p-3 border-t border-gray-100 bg-gray-50 text-center">
        <a href="<?= APP_URL ?>/admin/menh-phong-thuy" class="text-sm text-[#6B0D18] font-medium hover:underline">Phân tích chuyên sâu Mệnh</a>
    </div>
</div>
