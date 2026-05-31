<?php
// views/components/Admin/kiem_ke/tabs_filter.php
$currentTab = $_GET['trang_thai'] ?? '';
$tabs = [
    '' => 'Tất cả (' . ($stats['tat_ca'] ?? 0) . ')',
    '1' => 'Đang kiểm kê (' . ($stats['dang_kiem_ke'] ?? 0) . ')',
    '2' => 'Chờ duyệt (' . ($stats['cho_duyet'] ?? 0) . ')',
    '4' => 'Đã hoàn tất (' . ($stats['da_hoan_tat'] ?? 0) . ')',
    '6' => 'Đã hủy (' . ($stats['da_huy'] ?? 0) . ')',
];
?>
<!-- Tabs trạng thái -->
<div class="flex items-center gap-2 overflow-x-auto pb-2 mb-4 sidebar-scroll">
    <?php foreach ($tabs as $val => $label): ?>
        <?php $isActive = ($currentTab === (string)$val); ?>
        <a href="<?= APP_URL ?>/admin/kiem-ke?trang_thai=<?= $val ?>" 
           class="px-5 py-2 <?= $isActive ? 'bg-[#6B0D18] text-white shadow-sm border-transparent' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50' ?> border rounded-full text-sm font-medium whitespace-nowrap transition-colors">
            <?= $label ?>
        </a>
    <?php endforeach; ?>
</div>

<!-- Bộ lọc -->
<form method="GET" action="<?= APP_URL ?>/admin/kiem-ke" class="flex flex-col md:flex-row md:items-center gap-4 mb-4">
    <div class="relative flex-1 max-w-md">
        <input type="text" name="keyword" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" placeholder="Tìm theo mã phiếu, tên đợt, kho..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
        <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-[#6B0D18] text-lg" data-icon="mdi:magnify"></span>
    </div>
    <input type="hidden" name="trang_thai" value="<?= htmlspecialchars($currentTab) ?>">
    <button type="submit" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2">
        <span class="iconify" data-icon="mdi:magnify"></span> Tìm kiếm
    </button>
</form>
