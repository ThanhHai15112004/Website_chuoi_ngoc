<?php
// views/components/Admin/nhan_su/filter_bar.php
use App\Models\NhanSuModel;

$currentTab   = $tab ?? 'all';
$currentSearch = $search ?? '';
$currentVaiTro = $vai_tro ?? '';
$currentDangNhap = $dang_nhap ?? '';
$statsLocal   = $stats ?? ['total' => 0, 'hoat_dong' => 0, 'cho_kich_hoat' => 0, 'bi_khoa' => 0];

$tabs = [
    ['key' => 'all',           'label' => 'Tất cả',         'count' => $statsLocal['total']],
    ['key' => 'hoat_dong',     'label' => 'Đang hoạt động', 'count' => $statsLocal['hoat_dong']],
    ['key' => 'cho_kich_hoat', 'label' => 'Chờ kích hoạt',  'count' => $statsLocal['cho_kich_hoat']],
    ['key' => 'bi_khoa',       'label' => 'Bị khóa',        'count' => $statsLocal['bi_khoa']],
    ['key' => 'super_admin',   'label' => 'Super Admin',    'count' => null],
    ['key' => 'kho',           'label' => 'Kho',            'count' => null],
];

// Giữ lại filter params hiện tại khi chuyển tab
function buildFilterUrl($tabKey, $params = []) {
    $base = APP_URL . '/admin/nhan-su?tab=' . $tabKey;
    if (!empty($params['search'])) $base .= '&search=' . urlencode($params['search']);
    if (!empty($params['vai_tro'])) $base .= '&vai_tro=' . urlencode($params['vai_tro']);
    if (!empty($params['dang_nhap'])) $base .= '&dang_nhap=' . urlencode($params['dang_nhap']);
    return $base;
}
$filterParams = ['search' => $currentSearch, 'vai_tro' => $currentVaiTro, 'dang_nhap' => $currentDangNhap];
?>
<div class="px-6 py-4 border-b border-gray-200">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-4">
        <!-- Tabs trạng thái -->
        <div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 hide-scrollbar">
            <?php foreach ($tabs as $t): ?>
                <a href="<?= buildFilterUrl($t['key'], $filterParams) ?>"
                   class="whitespace-nowrap px-4 py-2 rounded-full text-sm transition-colors
                          <?= $currentTab === $t['key'] ? 'font-bold bg-[#6B0D18] text-white shadow-sm' : 'font-medium bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 hover:text-gray-900' ?>">
                    <?= $t['label'] ?><?= $t['count'] !== null ? ' (' . $t['count'] . ')' : '' ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <form method="GET" action="<?= APP_URL ?>/admin/nhan-su" class="flex flex-col lg:flex-row gap-3">
        <input type="hidden" name="tab" value="<?= htmlspecialchars($currentTab) ?>">

        <!-- Tìm kiếm -->
        <div class="relative flex-1">
            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
            <input type="text" name="search" placeholder="Tìm theo tên, email, số điện thoại, vai trò..."
                   value="<?= htmlspecialchars($currentSearch) ?>"
                   class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-all">
        </div>

        <!-- Các dropdown lọc -->
        <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar">
            <select name="vai_tro" class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] cursor-pointer min-w-[150px]">
                <option value="">Lọc theo vai trò</option>
                <?php 
                $danhSachVaiTro = ['Super Admin', 'Admin', 'Quản lý kho', 'CSKH', 'Kế toán / báo cáo', 'Nhân viên bán hàng'];
                foreach ($danhSachVaiTro as $vt): ?>
                    <option value="<?= $vt ?>" <?= $currentVaiTro === $vt ? 'selected' : '' ?>><?= $vt ?></option>
                <?php endforeach; ?>
            </select>

            <select name="dang_nhap" class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] cursor-pointer min-w-[160px]">
                <option value="">Lần đăng nhập cuối</option>
                <option value="today" <?= $currentDangNhap === 'today' ? 'selected' : '' ?>>Hôm nay</option>
                <option value="7days" <?= $currentDangNhap === '7days' ? 'selected' : '' ?>>7 ngày qua</option>
                <option value="30days" <?= $currentDangNhap === '30days' ? 'selected' : '' ?>>30 ngày qua</option>
                <option value="never" <?= $currentDangNhap === 'never' ? 'selected' : '' ?>>Chưa từng đăng nhập</option>
            </select>

            <!-- Nút Lọc -->
            <button type="submit" class="px-4 py-2 bg-[#6B0D18] text-white rounded-xl text-sm font-medium hover:bg-red-900 transition-colors flex items-center gap-2 whitespace-nowrap shadow-sm">
                <span class="iconify" data-icon="mdi:filter-variant"></span> Lọc
            </button>
        </div>
    </form>
    
    <!-- Active filters -->
    <?php if ($currentSearch || $currentVaiTro || $currentDangNhap): ?>
    <div class="flex flex-wrap items-center gap-2 mt-4">
        <span class="text-xs text-gray-500 font-medium">Đang lọc theo:</span>
        <?php if ($currentSearch): ?>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-red-50 text-red-700 border border-red-100">
                Tìm: "<?= htmlspecialchars($currentSearch) ?>"
                <a href="<?= buildFilterUrl($currentTab, array_merge($filterParams, ['search' => ''])) ?>" class="hover:text-red-900"><span class="iconify text-[10px]" data-icon="mdi:close"></span></a>
            </span>
        <?php endif; ?>
        <?php if ($currentVaiTro): ?>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-red-50 text-red-700 border border-red-100">
                Vai trò: <?= htmlspecialchars($currentVaiTro) ?>
                <a href="<?= buildFilterUrl($currentTab, array_merge($filterParams, ['vai_tro' => ''])) ?>" class="hover:text-red-900"><span class="iconify text-[10px]" data-icon="mdi:close"></span></a>
            </span>
        <?php endif; ?>
        <?php if ($currentDangNhap): ?>
            <?php $dnMap = ['today' => 'Hôm nay', '7days' => '7 ngày qua', '30days' => '30 ngày qua', 'never' => 'Chưa đăng nhập']; ?>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-red-50 text-red-700 border border-red-100">
                ĐN: <?= $dnMap[$currentDangNhap] ?? '' ?>
                <a href="<?= buildFilterUrl($currentTab, array_merge($filterParams, ['dang_nhap' => ''])) ?>" class="hover:text-red-900"><span class="iconify text-[10px]" data-icon="mdi:close"></span></a>
            </span>
        <?php endif; ?>
        <a href="<?= APP_URL ?>/admin/nhan-su" class="text-xs font-medium text-gray-500 hover:text-gray-900 transition-colors">Xóa bộ lọc</a>
    </div>
    <?php endif; ?>
</div>
