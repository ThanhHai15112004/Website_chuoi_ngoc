<?php
// views/pages/admin_customer_ranks.php
$ranks = $ranks ?? [];
$history = $history ?? [];
$khach_sap_len_hang = $khach_sap_len_hang ?? [];
?>
<div class="animate-[fadeInPage_0.3s_ease-out] max-w-7xl mx-auto pb-12">
    <!-- Breadcrumb -->
    <div class="mb-4">
        <div class="flex items-center text-xs text-gray-500 mb-2">
            <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18]">Admin</a>
            <span class="mx-2">/</span>
            <a href="<?= APP_URL ?>/admin/khach-hang" class="hover:text-[#6B0D18]">Quản lý khách hàng</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-bold">Hạng thành viên</span>
        </div>
    </div>

    <!-- Tiêu đề trang -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Quản lý hạng thành viên</h2>
            <p class="text-sm text-gray-500 mt-1">Thiết lập điều kiện lên hạng, quyền lợi và ưu đãi dành cho từng nhóm khách hàng.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-2" onclick="openConfigModal()">
                <span class="iconify text-lg" data-icon="mdi:cog-outline"></span> Cấu hình hệ thống
            </button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] transition-colors shadow-sm flex items-center gap-2" onclick="openAddRankModal()">
                <span class="iconify text-lg" data-icon="mdi:plus"></span> Thêm hạng mới
            </button>
            <button class="px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors shadow-sm" title="Làm mới dữ liệu">
                <span class="iconify text-lg" data-icon="mdi:refresh"></span>
            </button>
        </div>
    </div>

<?php include __DIR__ . '/../components/Admin/hang_thanh_vien/overview.php'; ?>
<?php include __DIR__ . '/../components/Admin/hang_thanh_vien/tabs_content.php'; ?>
<?php include __DIR__ . '/../components/Admin/hang_thanh_vien/modals.php'; ?>
<?php include __DIR__ . '/../components/Admin/hang_thanh_vien/scripts.php'; ?>
