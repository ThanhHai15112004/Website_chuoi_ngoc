<?php
$logs = $logs ?? [];
?>
<div class="p-6">
    <?php if(empty($logs)): ?>
        <div class="text-center py-12">
            <span class="iconify text-gray-300 text-6xl mx-auto mb-4" data-icon="mdi:text-box-search-outline"></span>
            <h4 class="text-lg font-medium text-gray-800 mb-1">Chưa có nhật ký hoạt động</h4>
            <p class="text-gray-500 text-sm">Khách hàng chưa thực hiện thao tác nào đáng chú ý.</p>
        </div>
    <?php else: ?>
        <div class="relative max-w-3xl">
            <!-- Timeline line -->
            <div class="absolute left-6 top-4 bottom-4 w-px bg-gray-200"></div>
            
            <div class="space-y-6 relative">
                <?php foreach($logs as $log): 
                    // Set icon based on action
                    $icon = 'mdi:circle-small';
                    $iconColor = 'gray';
                    $action = mb_strtolower($log['hanh_dong']);
                    
                    if (strpos($action, 'đăng nhập') !== false) {
                        $icon = 'mdi:login'; $iconColor = 'blue';
                    } elseif (strpos($action, 'cập nhật') !== false || strpos($action, 'thay đổi') !== false) {
                        $icon = 'mdi:pencil'; $iconColor = 'amber';
                    } elseif (strpos($action, 'mua') !== false || strpos($action, 'đặt') !== false) {
                        $icon = 'mdi:cart-outline'; $iconColor = 'green';
                    } elseif (strpos($action, 'hủy') !== false || strpos($action, 'xóa') !== false) {
                        $icon = 'mdi:close-circle-outline'; $iconColor = 'red';
                    }
                ?>
                <div class="flex gap-4">
                    <!-- Icon -->
                    <div class="w-12 h-12 rounded-full bg-<?= $iconColor ?>-50 border-4 border-white flex items-center justify-center text-<?= $iconColor ?>-600 shrink-0 relative z-10 shadow-sm">
                        <span class="iconify text-xl" data-icon="<?= $icon ?>"></span>
                    </div>
                    
                    <!-- Content -->
                    <div class="flex-1 bg-gray-50/50 rounded-xl p-4 border border-gray-100 mt-1">
                        <div class="flex justify-between items-start mb-1">
                            <h5 class="font-bold text-gray-800 text-sm"><?= htmlspecialchars($log['hanh_dong'] ?? '') ?></h5>
                            <span class="text-[10px] text-gray-400 font-medium whitespace-nowrap ml-4 bg-white px-2 py-0.5 rounded-full border border-gray-100">
                                <?= date('H:i - d/m/Y', strtotime($log['ngay_tao'])) ?>
                            </span>
                        </div>
                        <div class="text-xs text-gray-500 mb-2 font-medium uppercase tracking-wider">
                            <?= htmlspecialchars($log['module'] ?? '') ?>
                        </div>
                        <?php if(!empty($log['ghi_chu'])): ?>
                            <div class="text-sm text-gray-600 bg-white p-3 rounded-lg border border-gray-100">
                                <?= nl2br(htmlspecialchars($log['ghi_chu'])) ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
