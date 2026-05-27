<?php
// views/components/Admin/nhat_ky/table_list.php

function getLevelBadge($level) {
    switch ($level) {
        case 'Nguy hiểm':
            return '<span class="px-2.5 py-1 rounded-md text-xs font-bold bg-red-50 text-red-700 border border-red-100 flex items-center gap-1 w-max"><span class="iconify" data-icon="mdi:alert-rhombus-outline"></span> Nguy hiểm</span>';
        case 'Quan trọng':
            return '<span class="px-2.5 py-1 rounded-md text-xs font-bold bg-amber-50 text-amber-700 border border-amber-100 flex items-center gap-1 w-max"><span class="iconify" data-icon="mdi:star-circle-outline"></span> Quan trọng</span>';
        case 'Bảo mật':
            return '<span class="px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100 flex items-center gap-1 w-max"><span class="iconify" data-icon="mdi:shield-lock-outline"></span> Bảo mật</span>';
        default:
            return '<span class="px-2.5 py-1 rounded-md text-xs font-medium bg-gray-50 text-gray-600 border border-gray-200 flex items-center gap-1 w-max"><span class="iconify" data-icon="mdi:information-outline"></span> Bình thường</span>';
    }
}

function getActionIcon($action) {
    $action = mb_strtolower($action);
    if (str_contains($action, 'đăng nhập')) return 'mdi:login';
    if (str_contains($action, 'xóa')) return 'mdi:delete-outline';
    if (str_contains($action, 'cập nhật') || str_contains($action, 'đổi')) return 'mdi:pencil-outline';
    if (str_contains($action, 'tạo') || str_contains($action, 'thêm')) return 'mdi:plus-circle-outline';
    if (str_contains($action, 'điều chỉnh')) return 'mdi:tune-variant';
    return 'mdi:checkbox-blank-circle-outline';
}

function formatChange($changes) {
    if (!$changes) return '<span class="text-gray-400 italic text-xs">Không có chi tiết</span>';
    return '<div class="text-xs flex flex-col sm:flex-row sm:items-center gap-1 sm:gap-2">
                <span class="text-gray-500 line-through">' . htmlspecialchars($changes['old']) . '</span>
                <span class="iconify text-gray-300 hidden sm:block" data-icon="mdi:arrow-right"></span>
                <span class="iconify text-gray-300 sm:hidden" data-icon="mdi:arrow-down"></span>
                <span class="font-medium text-gray-900">' . htmlspecialchars($changes['new']) . '</span>
            </div>';
}
?>
<div class="overflow-x-auto min-h-[400px]">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50/50 border-b border-gray-200 text-xs uppercase tracking-wider text-gray-500 font-bold">
                <th class="px-6 py-4 w-32">Thời gian</th>
                <th class="px-6 py-4 w-48">Nhân viên</th>
                <th class="px-6 py-4 w-48">Hành động / Module</th>
                <th class="px-6 py-4 min-w-[250px]">Nội dung thay đổi</th>
                <th class="px-6 py-4 w-32">IP / Thiết bị</th>
                <th class="px-6 py-4 w-28">Mức độ</th>
                <th class="px-6 py-4 w-16 text-right"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 text-sm">
            <?php foreach ($logs as $index => $log): ?>
            <tr class="hover:bg-gray-50/50 transition-colors group">
                <!-- Thời gian -->
                <td class="px-6 py-4 align-top">
                    <div class="font-medium text-gray-900 whitespace-nowrap"><?= explode(' ', $log['time'])[0] ?></div>
                    <div class="text-xs text-gray-500 mt-0.5"><?= explode(' ', $log['time'])[1] ?></div>
                </td>
                
                <!-- Nhân viên -->
                <td class="px-6 py-4 align-top">
                    <div class="flex items-start gap-3">
                        <img src="<?= $log['user']['avatar'] ?>" alt="Avatar" class="w-8 h-8 rounded-full border border-gray-200">
                        <div>
                            <p class="font-bold text-gray-900 line-clamp-1"><?= $log['user']['name'] ?></p>
                            <p class="text-xs text-gray-500 mt-0.5 line-clamp-1"><?= $log['user']['role'] ?></p>
                        </div>
                    </div>
                </td>
                
                <!-- Hành động & Module -->
                <td class="px-6 py-4 align-top">
                    <div class="flex items-center gap-1.5 font-bold <?= $log['level'] === 'Nguy hiểm' ? 'text-red-700' : 'text-gray-900' ?>">
                        <span class="iconify text-gray-400" data-icon="<?= getActionIcon($log['action']) ?>"></span>
                        <?= $log['action'] ?>
                    </div>
                    <div class="mt-1">
                        <span class="inline-flex px-1.5 py-0.5 rounded text-[10px] font-bold bg-gray-100 text-gray-600 uppercase tracking-wider"><?= $log['module'] ?></span>
                    </div>
                </td>
                
                <!-- Nội dung & Đối tượng -->
                <td class="px-6 py-4 align-top">
                    <?php if ($log['target']): ?>
                        <div class="mb-1.5 flex items-center gap-1 flex-wrap">
                            <span class="text-xs text-gray-500">Đối tượng:</span>
                            <a href="#" class="text-xs font-bold text-[#6B0D18] hover:underline"><?= $log['target'] ?></a>
                            <?php if ($log['target_name']): ?>
                                <span class="text-xs text-gray-700 font-medium ml-1 truncate max-w-[200px]">- <?= $log['target_name'] ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                    <?= formatChange($log['changes']) ?>
                </td>
                
                <!-- IP / Thiết bị -->
                <td class="px-6 py-4 align-top">
                    <div class="text-xs font-mono text-gray-600 bg-gray-50 px-1.5 py-0.5 rounded w-max border border-gray-200"><?= $log['ip'] ?></div>
                    <div class="text-xs text-gray-500 mt-1 line-clamp-1"><?= $log['device'] ?></div>
                    <?php if (str_contains($log['device'], 'iOS') || str_contains($log['ip'], '103.22')): ?>
                        <span class="inline-block mt-1 px-1.5 py-0.5 rounded bg-orange-100 text-orange-700 text-[10px] font-bold">Thiết bị lạ</span>
                    <?php endif; ?>
                </td>
                
                <!-- Mức độ -->
                <td class="px-6 py-4 align-top">
                    <?= getLevelBadge($log['level']) ?>
                </td>
                
                <!-- Thao tác -->
                <td class="px-6 py-4 align-top text-right">
                    <div class="relative dropdown-container flex justify-end">
                        <button onclick="openLogDetail('<?= $log['id'] ?>')" class="w-8 h-8 flex items-center justify-center rounded-lg hover:bg-gray-200 text-gray-500 transition-colors" title="Xem chi tiết">
                            <span class="iconify text-xl" data-icon="mdi:eye-outline"></span>
                        </button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
            
            <?php if (empty($logs)): ?>
            <tr>
                <td colspan="7" class="px-6 py-16 text-center">
                    <div class="flex flex-col items-center justify-center">
                        <span class="iconify text-gray-300 text-6xl mb-3" data-icon="mdi:text-box-search-outline"></span>
                        <p class="text-gray-500 font-medium">Không tìm thấy nhật ký phù hợp</p>
                        <p class="text-sm text-gray-400 mt-1">Hãy thử thay đổi từ khóa, module hoặc khoảng thời gian lọc.</p>
                        <button class="mt-4 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 text-sm font-medium">Xóa bộ lọc</button>
                    </div>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
