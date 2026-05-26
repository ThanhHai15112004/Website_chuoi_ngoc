<?php
// views/pages/admin_destiny.php
$destinies = $destinies ?? [];
?>
<div class="animate-[fadeInPage_0.3s_ease-out] max-w-7xl mx-auto pb-12">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Mệnh phong thủy</h2>
            <p class="text-sm text-gray-500 mt-1">Quản lý thông tin ngũ hành, màu sắc, loại đá và sản phẩm gợi ý theo từng bản mệnh.</p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:refresh"></span> Làm mới
            </button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm flex items-center gap-2 shadow-md">
                <span class="iconify" data-icon="mdi:export-variant"></span> Xuất danh sách
            </button>
        </div>
    </div>

    <?php include __DIR__ . '/../components/Admin/menh_phong_thuy/list_stats_cards.php'; ?>
    <?php include __DIR__ . '/../components/Admin/menh_phong_thuy/list_overview.php'; ?>
    <?php include __DIR__ . '/../components/Admin/menh_phong_thuy/list_search_table.php'; ?>
    <?php include __DIR__ . '/../components/Admin/menh_phong_thuy/list_modals.php'; ?>
    <?php include __DIR__ . '/../components/Admin/menh_phong_thuy/list_scripts.php'; ?>
