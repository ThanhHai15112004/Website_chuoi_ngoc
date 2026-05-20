<?php
// views/pages/admin_customer_detail.php
$kh = $kh ?? [];
$id = $id ?? '';
$current_tab = $_GET['tab'] ?? 'tong_quan';

// Helpers
function getStatusColor($status) {
    if ($status === 'hoat_dong') return 'bg-emerald-50 text-emerald-700 border-emerald-100';
    if ($status === 'bi_khoa') return 'bg-red-50 text-red-700 border-red-100';
    return 'bg-amber-50 text-amber-700 border-amber-100';
}
function getStatusText($status) {
    if ($status === 'hoat_dong') return 'Đang hoạt động';
    if ($status === 'bi_khoa') return 'Bị khóa';
    return 'Chưa xác thực';
}
function getRankBadge($rank) {
    if ($rank === 'Gold') return 'bg-yellow-100 text-yellow-800 border border-yellow-200';
    if ($rank === 'Diamond') return 'bg-red-100 text-[#6B0D18] border border-red-200 shadow-sm';
    return 'bg-gray-100 text-gray-700 border border-gray-200';
}
?>

<div class="animate-[fadeInPage_0.3s_ease-out] max-w-7xl mx-auto pb-12">
    <!-- Breadcrumb & Quay lại -->
    <div class="mb-4">
        <div class="flex items-center text-xs text-gray-500 mb-2">
            <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18]">Admin</a>
            <span class="mx-2">/</span>
            <a href="<?= APP_URL ?>/admin/khach-hang" class="hover:text-[#6B0D18]">Quản lý khách hàng</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-bold">Chi tiết khách hàng</span>
        </div>
        <a href="<?= APP_URL ?>/admin/khach-hang" class="inline-flex items-center gap-1 text-sm font-medium text-gray-600 hover:text-[#6B0D18] transition-colors bg-white px-3 py-1.5 rounded-lg border border-gray-200 shadow-sm">
            <span class="iconify" data-icon="mdi:arrow-left"></span> Quay lại danh sách
        </a>
    </div>

<?php include __DIR__ . '/../components/Admin/customer/detail_profile.php'; ?>
<?php include __DIR__ . '/../components/Admin/customer/detail_stats.php'; ?>
<?php include __DIR__ . '/../components/Admin/customer/detail_orders.php'; ?>
<?php include __DIR__ . '/../components/Admin/customer/detail_modals.php'; ?>
<?php include __DIR__ . '/../components/Admin/customer/detail_scripts.php'; ?>
