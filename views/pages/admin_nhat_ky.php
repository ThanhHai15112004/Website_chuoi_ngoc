<?php
// views/pages/admin_nhat_ky.php
?>
<div class="px-4 md:px-6 py-6 max-w-[1400px] mx-auto min-h-screen">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-4">
        <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18] transition-colors">Admin</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <a href="<?= APP_URL ?>/admin/quan-ly-cua-hang" class="hover:text-[#6B0D18] transition-colors">Cấu hình cửa hàng</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span class="text-gray-900 font-medium">Nhật ký hoạt động</span>
    </nav>

    <!-- Tiêu đề trang & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">Nhật ký hoạt động</h1>
            <p class="text-gray-500 mt-1 text-sm">Theo dõi các thao tác quan trọng của Admin và nhân viên trong hệ thống quản trị.</p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <button onclick="openConfigModal()" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify text-gray-400" data-icon="mdi:cog-outline"></span> Cấu hình
            </button>
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm" onclick="location.reload()">
                <span class="iconify text-gray-400" data-icon="mdi:refresh"></span> Làm mới
            </button>
            <button onclick="openExportModal()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:file-export-outline"></span> Xuất nhật ký
            </button>
        </div>
    </div>

    <!-- Thống kê nhanh -->
    <?php require_once __DIR__ . '/../components/Admin/nhat_ky/stats_cards.php'; ?>

    <div class="mt-6 flex flex-col gap-6">
        <!-- Cảnh báo bất thường -->
        <?php require_once __DIR__ . '/../components/Admin/nhat_ky/alerts_section.php'; ?>

        <!-- Container chính (Filter + Table) -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <!-- Filter Bar (Tabs + Search + Advanced Filters) -->
            <?php require_once __DIR__ . '/../components/Admin/nhat_ky/tabs_filter.php'; ?>
            
            <!-- Table List -->
            <?php require_once __DIR__ . '/../components/Admin/nhat_ky/table_list.php'; ?>
            
            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex flex-col sm:flex-row items-center justify-between gap-3">
                <span class="text-sm text-gray-500">Hiển thị <span class="font-bold text-gray-900">1</span> đến <span class="font-bold text-gray-900">7</span> của <span class="font-bold text-gray-900">128</span> nhật ký</span>
                <div class="flex gap-1">
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 disabled:opacity-50"><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-[#6B0D18] bg-[#6B0D18] text-white font-medium text-sm shadow-sm">1</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 font-medium text-sm transition-colors">2</button>
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 font-medium text-sm transition-colors">3</button>
                    <span class="w-8 h-8 flex items-center justify-center text-gray-500">...</span>
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Drawer Xem chi tiết -->
<?php require_once __DIR__ . '/../components/Admin/nhat_ky/drawer_detail.php'; ?>

<!-- Modals -->
<?php require_once __DIR__ . '/../components/Admin/nhat_ky/modals.php'; ?>
