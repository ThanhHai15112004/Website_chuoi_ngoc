    <!-- 1. Card Thống Kê Nhanh -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        <div class="bg-white rounded-[20px] shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-gray-50 text-gray-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:format-list-bulleted"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Tổng số hạng</p>
            <p class="text-xl font-bold text-gray-800">3 <span class="text-[10px] font-normal text-gray-400">hạng</span></p>
        </div>
        <div class="bg-gradient-to-b from-gray-50 to-white rounded-[20px] shadow-sm border border-gray-200 p-4 relative overflow-hidden">
            <div class="absolute -right-2 -bottom-2 text-gray-200 opacity-50"><span class="iconify text-6xl" data-icon="mdi:medal-outline"></span></div>
            <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center mb-3 relative z-10">
                <span class="iconify" data-icon="mdi:medal-outline"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5 relative z-10">Khách Silver</p>
            <p class="text-xl font-bold text-gray-800 relative z-10">1.820 <span class="text-[10px] font-normal text-gray-400">người</span></p>
        </div>
        <div class="bg-gradient-to-b from-yellow-50 to-white rounded-[20px] shadow-sm border border-yellow-200 p-4 relative overflow-hidden">
            <div class="absolute -right-2 -bottom-2 text-yellow-200 opacity-50"><span class="iconify text-6xl" data-icon="mdi:crown"></span></div>
            <div class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center mb-3 relative z-10">
                <span class="iconify" data-icon="mdi:crown"></span>
            </div>
            <p class="text-xs text-yellow-800 mb-0.5 relative z-10">Khách Gold</p>
            <p class="text-xl font-bold text-yellow-700 relative z-10">520 <span class="text-[10px] font-normal text-yellow-600/60">người</span></p>
        </div>
        <div class="bg-gradient-to-b from-red-50 to-white rounded-[20px] shadow-sm border border-red-200 p-4 relative overflow-hidden">
            <div class="absolute -right-2 -bottom-2 text-red-200 opacity-50"><span class="iconify text-6xl" data-icon="mdi:diamond-stone"></span></div>
            <div class="w-8 h-8 rounded-full bg-red-100 text-[#6B0D18] flex items-center justify-center mb-3 relative z-10">
                <span class="iconify" data-icon="mdi:diamond-stone"></span>
            </div>
            <p class="text-xs text-red-800 mb-0.5 relative z-10">Khách Diamond</p>
            <p class="text-xl font-bold text-[#6B0D18] relative z-10">86 <span class="text-[10px] font-normal text-red-800/60">người</span></p>
        </div>
        <div class="bg-white rounded-[20px] shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:account-group"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Tổng khách có hạng</p>
            <p class="text-xl font-bold text-gray-800">2.426 <span class="text-[10px] font-normal text-gray-400">người</span></p>
        </div>
        <div class="bg-amber-50 rounded-[20px] shadow-sm border border-amber-200 p-4">
            <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:trending-up"></span>
            </div>
            <p class="text-xs text-amber-800 mb-0.5">Sắp lên hạng</p>
            <p class="text-xl font-bold text-amber-600">48 <span class="text-[10px] font-normal text-amber-600/60">người</span></p>
        </div>
    </div>

    <!-- 2. Khối Tổng Quan 3 Hạng -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <?php foreach($ranks as $rank): ?>
            <?php 
                $borderClass = 'border-gray-200';
                $icon = 'mdi:medal-outline';
                $iconColor = 'text-gray-500';
                
                if($rank['id'] === 'gold') {
                    $borderClass = 'border-yellow-300 ring-2 ring-yellow-50';
                    $icon = 'mdi:crown';
                    $iconColor = 'text-yellow-500';
                }
                if($rank['id'] === 'diamond') {
                    $borderClass = 'border-red-300 ring-2 ring-red-50';
                    $icon = 'mdi:diamond-stone';
                    $iconColor = 'text-[#6B0D18]';
                }
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

