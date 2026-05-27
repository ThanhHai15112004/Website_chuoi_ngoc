<?php
// views/components/Admin/quan_ly_cua_hang/form_contact_channels.php

$channels = [
    ['id' => 'zalo', 'name' => 'Zalo OA', 'icon' => 'mdi:chat-processing', 'color' => 'text-blue-500', 'placeholder' => 'Số điện thoại Zalo hoặc Link Zalo OA', 'value' => $storeConfig['zalo'] ?? '', 'active' => true],
    ['id' => 'facebook', 'name' => 'Facebook Fanpage', 'icon' => 'mdi:facebook', 'color' => 'text-blue-600', 'placeholder' => 'https://facebook.com/...', 'value' => $storeConfig['facebook'] ?? '', 'active' => true],
    ['id' => 'tiktok', 'name' => 'TikTok', 'icon' => 'mdi:music-note', 'color' => 'text-gray-900', 'placeholder' => 'https://tiktok.com/@...', 'value' => $storeConfig['tiktok'] ?? '', 'active' => true],
    ['id' => 'shopee', 'name' => 'Shopee Mall', 'icon' => 'mdi:shopping', 'color' => 'text-orange-500', 'placeholder' => 'Link gian hàng Shopee', 'value' => $storeConfig['shopee'] ?? '', 'active' => false],
    ['id' => 'youtube', 'name' => 'YouTube', 'icon' => 'mdi:youtube', 'color' => 'text-red-600', 'placeholder' => 'Link kênh YouTube', 'value' => '', 'active' => false],
];
?>
<div class="bg-white rounded-[20px] border border-gray-200 shadow-sm overflow-hidden" id="section-channels">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="iconify text-gray-400 text-xl" data-icon="mdi:share-variant-outline"></span>
            <h2 class="font-bold text-gray-900 text-lg">Kênh mạng xã hội</h2>
        </div>
    </div>
    
    <div class="p-5 md:p-6 space-y-4">
        <?php foreach($channels as $ch): ?>
        <div class="flex flex-col md:flex-row md:items-center gap-3 p-3 border border-gray-100 rounded-xl hover:bg-gray-50 transition-colors group">
            <div class="flex items-center gap-3 w-48 shrink-0">
                <span class="iconify text-2xl <?= $ch['color'] ?>" data-icon="<?= $ch['icon'] ?>"></span>
                <span class="font-medium text-gray-700 text-sm"><?= $ch['name'] ?></span>
            </div>
            
            <div class="flex-1 relative">
                <input type="text" class="w-full px-3 py-2 border <?= $ch['value'] ? 'border-gray-300' : 'border-gray-200 bg-gray-50' ?> rounded-lg focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18] text-sm" placeholder="<?= $ch['placeholder'] ?>" value="<?= $ch['value'] ?>">
                <?php if($ch['value']): ?>
                    <span class="iconify absolute right-3 top-2.5 text-emerald-500 text-lg" data-icon="mdi:check-circle"></span>
                <?php endif; ?>
            </div>
            
            <div class="flex items-center gap-3 shrink-0">
                <label class="flex items-center cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" class="sr-only toggle-channel" <?= $ch['active'] ? 'checked' : '' ?>>
                        <div class="block bg-gray-200 w-10 h-6 rounded-full transition-colors toggle-bg"></div>
                        <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform toggle-dot"></div>
                    </div>
                </label>
                <?php if($ch['value']): ?>
                <a href="<?= strpos($ch['value'], 'http') === 0 ? $ch['value'] : '#' ?>" target="_blank" class="w-8 h-8 flex items-center justify-center text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors tooltip" title="Kiểm tra link">
                    <span class="iconify" data-icon="mdi:open-in-new"></span>
                </a>
                <?php else: ?>
                <div class="w-8 h-8"></div>
                <?php endif; ?>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .toggle-channel:checked + .toggle-bg { background-color: #10B981; } /* Emerald-500 for success state */
    .toggle-channel:checked ~ .toggle-dot { transform: translateX(100%); }
</style>
