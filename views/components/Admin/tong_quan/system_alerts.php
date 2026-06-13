<?php
// views/components/admin/tong-quan/system_alerts.php
?>
<!-- Slow Moving Products & Alerts (Combined into Tabs or List) -->
<div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
    <div class="flex items-center justify-between mb-4 border-b border-gray-100 pb-2">
        <h3 class="text-sm font-bold text-gray-800 uppercase tracking-wide">Cảnh báo hệ thống</h3>
        <span class="iconify text-orange-500" data-icon="mdi:alert-outline"></span>
    </div>
    <div class="space-y-3">
        <?php foreach($canh_bao_ton_kho as $alert): ?>
        <div class="flex items-start gap-2 text-sm p-2 <?= $alert['loai'] == 'het_hang' ? 'bg-red-50 text-red-800' : 'bg-orange-50 text-orange-800' ?> rounded-lg border <?= $alert['loai'] == 'het_hang' ? 'border-red-100' : 'border-orange-100' ?>">
            <span class="iconify mt-0.5 flex-shrink-0" data-icon="<?= $alert['loai'] == 'het_hang' ? 'mdi:close-circle-outline' : 'mdi:alert-circle-outline' ?>"></span>
            <p class="leading-snug"><?= $alert['noi_dung'] ?></p>
        </div>
        <?php endforeach; ?>
    </div>
</div>
