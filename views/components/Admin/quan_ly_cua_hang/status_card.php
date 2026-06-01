<?php
// views/components/Admin/quan_ly_cua_hang/status_card.php
// Sử dụng $completionStatus truyền từ controller
$percent = $completionStatus['percent'] ?? 0;
$completedCount = $completionStatus['completed_count'] ?? 0;
$total = $completionStatus['total'] ?? 6;
$allGroups = $completionStatus['all'] ?? [];

// Tính stroke-dashoffset cho SVG circle
// Circle circumference = 2 * PI * r = 2 * 3.14159 * 36 ≈ 226.2
$circumference = 226.2;
$offset = $circumference - ($circumference * $percent / 100);

// Màu theo %
$progressColor = $percent >= 100 ? 'text-emerald-500' : ($percent >= 50 ? 'text-[#6B0D18]' : 'text-amber-500');
$percentColor = $percent >= 100 ? 'text-emerald-600' : ($percent >= 50 ? 'text-[#6B0D18]' : 'text-amber-600');
?>
<div class="bg-white rounded-[20px] p-5 md:p-6 border border-gray-200 shadow-sm mb-6 flex flex-col md:flex-row md:items-center gap-6" id="status-card">
    <!-- Progress Circle -->
    <div class="relative w-20 h-20 shrink-0">
        <svg class="w-20 h-20 transform -rotate-90">
            <circle cx="40" cy="40" r="36" stroke="currentColor" stroke-width="8" fill="transparent" class="text-gray-100" />
            <circle cx="40" cy="40" r="36" stroke="currentColor" stroke-width="8" fill="transparent" 
                stroke-dasharray="<?= $circumference ?>" 
                stroke-dashoffset="<?= $offset ?>" 
                class="<?= $progressColor ?> transition-all duration-1000"
                stroke-linecap="round"
                id="progress-circle" />
        </svg>
        <div class="absolute inset-0 flex items-center justify-center">
            <span class="text-xl font-bold <?= $percentColor ?>" id="progress-percent"><?= $percent ?>%</span>
        </div>
    </div>
    
    <!-- Info -->
    <div class="flex-1">
        <div class="flex items-center gap-2 mb-1">
            <h3 class="text-lg font-bold text-gray-900">Hồ sơ cửa hàng</h3>
            <?php if ($percent >= 100): ?>
            <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 text-xs font-bold rounded-full">Hoàn thiện</span>
            <?php elseif ($percent >= 50): ?>
            <span class="px-2 py-0.5 bg-amber-100 text-amber-700 text-xs font-bold rounded-full"><?= $completedCount ?>/<?= $total ?> mục</span>
            <?php else: ?>
            <span class="px-2 py-0.5 bg-red-100 text-red-700 text-xs font-bold rounded-full">Cần bổ sung</span>
            <?php endif; ?>
        </div>
        <p class="text-sm text-gray-500 mb-4">Hoàn thiện hồ sơ giúp tăng độ tin cậy và tối ưu trải nghiệm khách hàng.</p>
        
        <!-- Checklist động -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-<?= min(count($allGroups), 4) ?> gap-y-3 gap-x-4 text-sm" id="completion-checklist">
            <?php foreach ($allGroups as $group): ?>
            <div class="flex items-center gap-2 <?= $group['done'] ? 'text-gray-700' : 'text-amber-600 font-medium' ?>">
                <?php if ($group['done']): ?>
                    <span class="iconify text-emerald-500 text-lg shrink-0" data-icon="mdi:check-circle"></span>
                <?php else: ?>
                    <span class="iconify text-amber-500 text-lg shrink-0" data-icon="mdi:alert-circle"></span>
                <?php endif; ?>
                <?= $group['label'] ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
