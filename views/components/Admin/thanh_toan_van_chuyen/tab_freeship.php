<?php
// views/components/Admin/thanh_toan_van_chuyen/tab_freeship.php
?>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <h3 class="text-lg font-bold text-gray-900">Quy tắc Miễn phí vận chuyển</h3>
        <p class="text-sm text-gray-500">Tạo các chương trình khuyến mãi freeship tự động áp dụng khi khách đạt điều kiện.</p>
    </div>
    <button onclick="openModal('modalFreeship')" class="px-4 py-2 bg-[#6B0D18] text-white text-sm font-medium rounded-lg hover:bg-red-900 transition-colors shadow-sm flex items-center gap-1">
        <span class="iconify" data-icon="mdi:plus"></span> Thêm quy tắc
    </button>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach($freeship_rules as $rule): ?>
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5 relative overflow-hidden group <?= !$rule['status'] ? 'opacity-70 grayscale-[50%]' : '' ?>">
        
        <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-red-50 text-[#6B0D18] flex items-center justify-center">
                <span class="iconify text-3xl" data-icon="mdi:gift-outline"></span>
            </div>
            <label class="inline-flex items-center cursor-pointer">
                <div class="relative">
                    <input type="checkbox" class="sr-only toggle-switch" <?= $rule['status'] ? 'checked' : '' ?> onchange="markUnsaved()">
                    <div class="block bg-gray-200 w-10 h-6 rounded-full transition-colors toggle-bg"></div>
                    <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform toggle-dot shadow-sm"></div>
                </div>
            </label>
        </div>

        <h4 class="font-bold text-gray-900 text-lg mb-1"><?= $rule['name'] ?></h4>
        <div class="space-y-2 mt-4 text-sm">
            <div class="flex items-center gap-2 text-gray-600">
                <span class="iconify text-gray-400" data-icon="mdi:tag-outline"></span>
                <span class="font-medium text-gray-900"><?= $rule['condition'] ?></span>
            </div>
            <div class="flex items-center gap-2 text-gray-600">
                <span class="iconify text-gray-400" data-icon="mdi:map-marker-outline"></span>
                <span><?= $rule['zone'] ?></span>
            </div>
        </div>

        <!-- Hover Actions -->
        <div class="absolute top-4 right-16 flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
            <button onclick="openModal('modalFreeship')" class="w-8 h-8 rounded-lg bg-gray-100 text-blue-600 hover:bg-blue-100 flex items-center justify-center transition-colors shadow-sm">
                <span class="iconify text-sm" data-icon="mdi:pencil"></span>
            </button>
            <button class="w-8 h-8 rounded-lg bg-gray-100 text-gray-500 hover:text-gray-900 hover:bg-gray-200 flex items-center justify-center transition-colors shadow-sm">
                <span class="iconify text-sm" data-icon="mdi:content-copy"></span>
            </button>
        </div>
    </div>
    <?php endforeach; ?>
</div>
