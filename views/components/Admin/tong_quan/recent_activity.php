<?php
// views/components/admin/tong-quan/recent_activity.php
?>
<!-- Recent Activity Timeline -->
<div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
    <h3 class="text-lg font-bold text-gray-800 mb-4">Hoạt động gần đây</h3>
    <div class="relative pl-4 border-l border-gray-200 space-y-6">
        <?php foreach($hoat_dong_gan_day as $act): ?>
        <div class="relative">
            <span class="absolute -left-[21px] top-1 w-2.5 h-2.5 rounded-full bg-white border-2 border-red-900"></span>
            <p class="text-xs text-gray-400 mb-0.5"><?= $act['thoi_gian'] ?></p>
            <p class="text-sm text-gray-700"><?= $act['noi_dung'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="mt-4 pt-4 border-t border-gray-100 text-center">
        <?php $base = defined('APP_URL') ? APP_URL : ''; ?>
        <a href="<?= $base ?>/admin/nhat-ky-hoat-dong" class="text-sm font-medium text-red-900 hover:text-red-700 hover:underline inline-flex items-center gap-1">
            Xem tất cả
            <span class="iconify" data-icon="mdi:arrow-right"></span>
        </a>
    </div>
</div>
