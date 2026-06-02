<?php
// views/components/Admin/nhat_ky/table_list.php

function getLevelBadge($action, $desc) {
    $action = mb_strtolower($action);
    $desc = mb_strtolower($desc ?? '');
    
    if (str_contains($action, 'xóa') || str_contains($desc, 'thất bại')) {
        return '<span class="px-2.5 py-1 rounded-md text-xs font-bold bg-red-50 text-red-700 border border-red-100 flex items-center gap-1 w-max"><span class="iconify" data-icon="mdi:alert-rhombus-outline"></span> Nguy hiểm</span>';
    }
    if (str_contains($action, 'cập nhật') || str_contains($action, 'đổi') || str_contains($action, 'tạo') || str_contains($action, 'thêm')) {
        return '<span class="px-2.5 py-1 rounded-md text-xs font-bold bg-amber-50 text-amber-700 border border-amber-100 flex items-center gap-1 w-max"><span class="iconify" data-icon="mdi:star-circle-outline"></span> Quan trọng</span>';
    }
    if (str_contains($action, 'đăng nhập')) {
        return '<span class="px-2.5 py-1 rounded-md text-xs font-bold bg-blue-50 text-blue-700 border border-blue-100 flex items-center gap-1 w-max"><span class="iconify" data-icon="mdi:shield-lock-outline"></span> Bình thường</span>';
    }
    return '<span class="px-2.5 py-1 rounded-md text-xs font-medium bg-gray-50 text-gray-600 border border-gray-200 flex items-center gap-1 w-max"><span class="iconify" data-icon="mdi:information-outline"></span> Bình thường</span>';
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
?>
<div class="overflow-x-auto min-h-[400px]">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50/50 border-b border-gray-200 text-xs uppercase tracking-wider text-gray-500 font-bold">
                <th class="px-6 py-4 w-32">Thời gian</th>
                <th class="px-6 py-4 w-48">Nhân viên</th>
                <th class="px-6 py-4 w-48">Hành động</th>
                <th class="px-6 py-4 min-w-[250px]">Nội dung thay đổi</th>
                <th class="px-6 py-4 w-32">IP / Thiết bị</th>
                <th class="px-6 py-4 w-28">Mức độ</th>
                <th class="px-6 py-4 w-16 text-right"></th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100 text-sm">
            <?php foreach ($logs as $log): 
                $dateParts = explode(' ', $log['ngay_thuc_hien']);
                $date = $dateParts[0] ?? '';
                $time = $dateParts[1] ?? '';
                $isDanger = str_contains(mb_strtolower($log['hanh_dong']), 'xóa');
            ?>
            <tr class="hover:bg-gray-50/50 transition-colors group">
                <!-- Thời gian -->
                <td class="px-6 py-4 align-top">
                    <div class="font-medium text-gray-900 whitespace-nowrap"><?= htmlspecialchars($date) ?></div>
                    <div class="text-xs text-gray-500 mt-0.5"><?= htmlspecialchars($time) ?></div>
                </td>
                
                <!-- Nhân viên -->
                <td class="px-6 py-4 align-top">
                    <div class="flex items-start gap-3">
                        <img src="<?= htmlspecialchars($log['avatar'] ?? 'https://ui-avatars.com/api/?name='.urlencode($log['ho_ten'] ?? 'Unknown').'&background=random') ?>" alt="Avatar" class="w-8 h-8 rounded-full border border-gray-200 object-cover">
                        <div>
                            <p class="font-bold text-gray-900 line-clamp-1"><?= htmlspecialchars($log['ho_ten'] ?? $log['nguoi_thuc_hien'] ?? 'Hệ thống') ?></p>
                            <p class="text-xs text-gray-500 mt-0.5 line-clamp-1"><?= htmlspecialchars($log['vai_tro'] ?? 'N/A') ?></p>
                        </div>
                    </div>
                </td>
                
                <!-- Hành động & Module -->
                <td class="px-6 py-4 align-top">
                    <div class="flex items-center gap-1.5 font-bold <?= $isDanger ? 'text-red-700' : 'text-gray-900' ?>">
                        <span class="iconify text-gray-400" data-icon="<?= getActionIcon($log['hanh_dong']) ?>"></span>
                        <?= htmlspecialchars($log['hanh_dong']) ?>
                    </div>
                </td>
                
                <!-- Nội dung & Đối tượng -->
                <td class="px-6 py-4 align-top">
                    <div class="text-sm text-gray-700 break-words"><?= nl2br(htmlspecialchars($log['mo_ta'] ?? 'Không có mô tả')) ?></div>
                </td>
                
                <!-- IP / Thiết bị -->
                <td class="px-6 py-4 align-top">
                    <?php if ($log['ip_address']): ?>
                        <div class="text-xs font-mono text-gray-600 bg-gray-50 px-1.5 py-0.5 rounded w-max border border-gray-200 mb-1"><?= htmlspecialchars($log['ip_address']) ?></div>
                    <?php endif; ?>
                    <?php if ($log['thiet_bi']): ?>
                        <div class="text-xs text-gray-500 line-clamp-2" title="<?= htmlspecialchars($log['thiet_bi']) ?>"><?= htmlspecialchars($log['thiet_bi']) ?></div>
                    <?php endif; ?>
                </td>
                
                <!-- Mức độ -->
                <td class="px-6 py-4 align-top">
                    <?= getLevelBadge($log['hanh_dong'], $log['mo_ta']) ?>
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
                        <a href="?tab=<?= urlencode($params['tab'] ?? 'all') ?>" class="mt-4 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 text-sm font-medium transition-colors">Xóa bộ lọc</a>
                    </div>
                </td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
