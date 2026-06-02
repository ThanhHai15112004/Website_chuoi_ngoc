<?php
// views/components/Admin/nhat_ky/tabs_filter.php
$currentTab = $params['tab'] ?? 'all';
function tabClass($tab, $currentTab, $isDanger = false) {
    if ($isDanger) {
        return $tab === $currentTab 
            ? "px-4 py-2.5 text-sm font-bold bg-red-600 text-white rounded-t-lg transition-colors flex items-center gap-1"
            : "px-4 py-2.5 text-sm font-bold text-red-600 hover:bg-red-50 rounded-t-lg transition-colors flex items-center gap-1";
    }
    return $tab === $currentTab 
        ? "px-4 py-2.5 text-sm font-bold bg-[#6B0D18] text-white rounded-t-lg relative"
        : "px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-t-lg transition-colors";
}
?>
<div class="border-b border-gray-100">
    <!-- Tabs cuộn ngang -->
    <div class="px-2 pt-2 overflow-x-auto custom-scrollbar">
        <div class="flex items-center gap-1 min-w-max px-2">
            <a href="?tab=all&search=<?= urlencode($params['search']) ?>&nhan_vien=<?= urlencode($params['nhan_vien']) ?>&thoi_gian=<?= urlencode($params['thoi_gian']) ?>" 
               class="<?= tabClass('all', $currentTab) ?>">
                Tất cả <span class="bg-white/20 text-<?= $currentTab === 'all' ? 'white' : 'gray-500 bg-gray-100' ?> text-xs px-1.5 py-0.5 rounded ml-1"><?= number_format($stats['tong']) ?></span>
            </a>
            <a href="?tab=Đăng nhập&search=<?= urlencode($params['search']) ?>&nhan_vien=<?= urlencode($params['nhan_vien']) ?>&thoi_gian=<?= urlencode($params['thoi_gian']) ?>" 
               class="<?= tabClass('Đăng nhập', $currentTab) ?>">
                Đăng nhập <span class="bg-white/20 text-<?= $currentTab === 'Đăng nhập' ? 'white' : 'gray-500 bg-gray-100' ?> text-xs px-1.5 py-0.5 rounded ml-1"><?= number_format($stats['dang_nhap']) ?></span>
            </a>
            <a href="?tab=Tạo&search=<?= urlencode($params['search']) ?>&nhan_vien=<?= urlencode($params['nhan_vien']) ?>&thoi_gian=<?= urlencode($params['thoi_gian']) ?>" 
               class="<?= tabClass('Tạo', $currentTab) ?>">
                Tạo mới
            </a>
            <a href="?tab=Cập nhật&search=<?= urlencode($params['search']) ?>&nhan_vien=<?= urlencode($params['nhan_vien']) ?>&thoi_gian=<?= urlencode($params['thoi_gian']) ?>" 
               class="<?= tabClass('Cập nhật', $currentTab) ?>">
                Cập nhật
            </a>
            <a href="?tab=danger&search=<?= urlencode($params['search']) ?>&nhan_vien=<?= urlencode($params['nhan_vien']) ?>&thoi_gian=<?= urlencode($params['thoi_gian']) ?>" 
               class="<?= tabClass('danger', $currentTab, true) ?>">
                <span class="iconify" data-icon="mdi:shield-alert-outline"></span> Nguy hiểm <span class="bg-white/20 text-<?= $currentTab === 'danger' ? 'white' : 'red-600 bg-red-100' ?> text-xs px-1.5 py-0.5 rounded ml-1"><?= number_format($stats['nguy_hiem'] + $stats['dang_nhap_that_bai']) ?></span>
            </a>
        </div>
    </div>
</div>

<form method="GET" action="" class="p-4 md:p-6 bg-white border-b border-gray-100 space-y-4">
    <input type="hidden" name="tab" value="<?= htmlspecialchars($currentTab) ?>">
    
    <!-- Thanh tìm kiếm & Bộ lọc nâng cao -->
    <div class="flex flex-col md:flex-row gap-3">
        <!-- Input tìm kiếm -->
        <div class="flex-1 relative">
            <span class="iconify absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
            <input type="text" name="search" value="<?= htmlspecialchars($params['search']) ?>" placeholder="Tìm theo nhân viên, hành động, mô tả, IP..." class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-colors">
        </div>
        
        <!-- Filter Selects -->
        <div class="flex flex-wrap md:flex-nowrap gap-3 shrink-0">
            <select name="nhan_vien" class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 bg-white focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] min-w-[150px]">
                <option value="">Tất cả nhân viên</option>
                <?php foreach ($danhSachNV as $nv): ?>
                    <option value="<?= $nv['id'] ?>" <?= $params['nhan_vien'] == $nv['id'] ? 'selected' : '' ?>><?= htmlspecialchars($nv['ho_ten']) ?> (<?= htmlspecialchars($nv['ma_nv']) ?>)</option>
                <?php endforeach; ?>
            </select>

            <select name="thoi_gian" class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 bg-white focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] min-w-[150px]">
                <option value="today" <?= $params['thoi_gian'] === 'today' ? 'selected' : '' ?>>Hôm nay</option>
                <option value="yesterday" <?= $params['thoi_gian'] === 'yesterday' ? 'selected' : '' ?>>Hôm qua</option>
                <option value="7days" <?= $params['thoi_gian'] === '7days' ? 'selected' : '' ?>>7 ngày qua</option>
                <option value="30days" <?= $params['thoi_gian'] === '30days' ? 'selected' : '' ?>>30 ngày qua</option>
                <option value="all" <?= $params['thoi_gian'] === 'all' ? 'selected' : '' ?>>Tất cả</option>
            </select>

            <button type="submit" class="px-6 py-2.5 bg-[#6B0D18] text-white font-medium rounded-lg hover:bg-red-900 transition-colors text-sm shadow-sm flex items-center gap-2 shrink-0">
                <span class="iconify" data-icon="mdi:filter-variant"></span> Lọc
            </button>
        </div>
    </div>
    
    <!-- Active filters -->
    <?php if (!empty($params['search']) || !empty($params['nhan_vien']) || $params['thoi_gian'] !== '30days'): ?>
    <div class="flex items-center gap-2 mt-3">
        <span class="text-xs text-gray-500 font-medium">Đang lọc theo:</span>
        <div class="flex flex-wrap gap-2">
            <?php if (!empty($params['search'])): ?>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-gray-100 text-gray-700 text-xs font-medium border border-gray-200">
                    Từ khóa: <?= htmlspecialchars($params['search']) ?>
                </span>
            <?php endif; ?>
            
            <?php if (!empty($params['nhan_vien'])): ?>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-gray-100 text-gray-700 text-xs font-medium border border-gray-200">
                    Nhân viên ID: <?= htmlspecialchars($params['nhan_vien']) ?>
                </span>
            <?php endif; ?>
            
            <?php if ($params['thoi_gian'] !== '30days'): ?>
                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-gray-100 text-gray-700 text-xs font-medium border border-gray-200">
                    Thời gian: <?= htmlspecialchars($params['thoi_gian']) ?>
                </span>
            <?php endif; ?>
            
            <a href="?tab=<?= urlencode($currentTab) ?>" class="text-xs text-gray-500 hover:text-[#6B0D18] hover:underline px-1 mt-1">Xóa bộ lọc</a>
        </div>
    </div>
    <?php endif; ?>
</form>
