    <?php
        $totalRanks = count($ranks);
        $totalCustomersWithRank = array_sum(array_column($ranks, 'customer_count'));
        $nearRankCount = count($khach_sap_len_hang);
        $topRanks = array_slice($ranks, 0, 3); // Get up to 3 ranks for the stat cards
    ?>
    <!-- 1. Card Thống Kê Nhanh -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        <div class="bg-white rounded-[20px] shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-gray-50 text-gray-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:format-list-bulleted"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Tổng số hạng</p>
            <p class="text-xl font-bold text-gray-800"><?= $totalRanks ?> <span class="text-[10px] font-normal text-gray-400">hạng</span></p>
        </div>

        <?php foreach($topRanks as $r): 
            $baseColor = 'gray';
            if (!empty($r['badge'])) {
                $parts = explode('-', $r['badge']);
                if (isset($parts[1])) $baseColor = $parts[1];
            }
            if ($baseColor === '#6B0D18' || strpos($r['badge'], 'red') !== false) $baseColor = 'red';
            
            $icon = 'mdi:medal-outline';
            if ($baseColor === 'yellow') $icon = 'mdi:crown';
            elseif ($baseColor === 'red') $icon = 'mdi:diamond-stone';
            elseif ($baseColor === 'emerald') $icon = 'mdi:leaf';
            elseif ($baseColor === 'blue') $icon = 'mdi:shield-star';

            $iconColor = "text-{$baseColor}-600";
            if ($baseColor === 'red') $iconColor = 'text-[#6B0D18]';
        ?>
        <div class="bg-gradient-to-b from-<?= $baseColor ?>-50 to-white rounded-[20px] shadow-sm border border-<?= $baseColor ?>-200 p-4 relative overflow-hidden">
            <div class="absolute -right-2 -bottom-2 text-<?= $baseColor ?>-200 opacity-50"><span class="iconify text-6xl" data-icon="<?= $icon ?>"></span></div>
            <div class="w-8 h-8 rounded-full bg-<?= $baseColor ?>-100 <?= $iconColor ?> flex items-center justify-center mb-3 relative z-10">
                <span class="iconify" data-icon="<?= $icon ?>"></span>
            </div>
            <p class="text-xs text-<?= $baseColor ?>-800 mb-0.5 relative z-10">Khách <?= $r['name'] ?></p>
            <p class="text-xl font-bold text-<?= $baseColor ?>-700 relative z-10"><?= number_format($r['customer_count'], 0, ',', '.') ?> <span class="text-[10px] font-normal text-<?= $baseColor ?>-600/60">người</span></p>
        </div>
        <?php endforeach; ?>

        <?php 
        // If there are less than 3 ranks, fill with empty slots to maintain layout
        for($i = count($topRanks); $i < 3; $i++): ?>
        <div class="bg-gray-50 rounded-[20px] shadow-sm border border-gray-100 p-4 relative overflow-hidden opacity-50">
            <p class="text-xs text-gray-400 mb-0.5">Chưa thiết lập</p>
            <p class="text-xl font-bold text-gray-300">0</p>
        </div>
        <?php endfor; ?>

        <div class="bg-white rounded-[20px] shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:account-group"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Tổng khách có hạng</p>
            <p class="text-xl font-bold text-gray-800"><?= number_format($totalCustomersWithRank, 0, ',', '.') ?> <span class="text-[10px] font-normal text-gray-400">người</span></p>
        </div>
        <div class="bg-amber-50 rounded-[20px] shadow-sm border border-amber-200 p-4">
            <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:trending-up"></span>
            </div>
            <p class="text-xs text-amber-800 mb-0.5">Sắp lên hạng</p>
            <p class="text-xl font-bold text-amber-600"><?= $nearRankCount ?> <span class="text-[10px] font-normal text-amber-600/60">người</span></p>
        </div>
    </div>

    <!-- 2. Khối Tổng Quan 3 Hạng -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <?php foreach($ranks as $rank): ?>
            <?php 
                $baseColor = 'gray';
                if (!empty($rank['badge'])) {
                    $parts = explode('-', $rank['badge']);
                    if (isset($parts[1])) $baseColor = $parts[1];
                }
                
                $borderClass = "border-{$baseColor}-200";
                if ($baseColor !== 'gray') {
                    $borderClass = "border-{$baseColor}-300 ring-2 ring-{$baseColor}-50";
                }
                
                // Fallback specific colors if needed
                if ($baseColor === '#6B0D18' || strpos($rank['badge'], 'red') !== false) {
                    $baseColor = 'red';
                    $borderClass = 'border-red-300 ring-2 ring-red-50';
                }

                $icon = 'mdi:medal-outline';
                if ($baseColor === 'yellow') $icon = 'mdi:crown';
                elseif ($baseColor === 'red') $icon = 'mdi:diamond-stone';
                elseif ($baseColor === 'emerald') $icon = 'mdi:leaf';
                elseif ($baseColor === 'blue') $icon = 'mdi:shield-star';

                $iconColor = "text-{$baseColor}-500";
                if ($baseColor === 'red') $iconColor = 'text-[#6B0D18]';
            ?>
            <div class="bg-white rounded-3xl shadow-sm border <?= $borderClass ?> p-6 relative overflow-hidden flex flex-col">
                <div class="absolute top-0 right-0 w-24 h-24 bg-gradient-to-bl from-gray-50 to-transparent opacity-50 pointer-events-none rounded-bl-full"></div>
                
                <div class="flex items-center gap-4 mb-4 relative z-10">
                    <div class="w-14 h-14 rounded-full border-2 <?= $borderClass ?> flex items-center justify-center <?= $iconColor ?> bg-white shadow-sm">
                        <span class="iconify text-3xl" data-icon="<?= $icon ?>"></span>
                    </div>
                    <div>
                        <h3 class="text-2xl font-black uppercase <?= $iconColor ?>"><?= $rank['name'] ?></h3>
                        <p class="text-xs text-gray-500 line-clamp-1"><?= $rank['desc'] ?></p>
                    </div>
                </div>
                
                <div class="space-y-3 mb-6 flex-1">
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Chi tiêu tối thiểu:</span>
                        <span class="font-bold text-gray-800"><?= number_format($rank['condition_spend'], 0, ',', '.') ?>đ</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Giảm giá mặc định:</span>
                        <span class="font-bold text-[#6B0D18]"><?= $rank['discount'] ?>%</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <span class="text-gray-500">Khách hiện tại:</span>
                        <span class="font-bold text-gray-800"><?= number_format($rank['customer_count'], 0, ',', '.') ?></span>
                    </div>
                </div>
                
                <div class="flex items-center gap-2 mt-auto border-t border-gray-100 pt-4">
                    <button class="flex-1 py-2 bg-white border border-gray-200 rounded-xl text-sm font-bold text-gray-700 hover:bg-gray-50 transition-colors" onclick="openRankDetailModal('<?= $rank['id'] ?>')">Xem chi tiết</button>
                    <button class="flex-1 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm font-bold <?= $iconColor ?> hover:bg-gray-100 transition-colors flex items-center justify-center gap-1" onclick="openEditRankModal('<?= $rank['id'] ?>')">
                        <span class="iconify" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

