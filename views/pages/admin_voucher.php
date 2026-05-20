<?php
// views/pages/admin_voucher.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Quản lý voucher</h2>
            <p class="text-sm text-gray-500 mt-1">Tạo và quản lý các mã giảm giá áp dụng cho khách hàng khi mua vòng ngọc, chuỗi đá và trang sức phong thủy.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:export-variant"></span>
                Xuất danh sách
            </button>
            <a href="<?= APP_URL ?>/admin/voucher/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md shadow-[#6B0D18]/20 flex items-center gap-2">
                <span class="iconify" data-icon="mdi:plus"></span>
                Tạo voucher
            </a>
        </div>
    </div>

    <?php include __DIR__ . '/../components/Admin/voucher/list_stats_cards.php'; ?>
    <?php include __DIR__ . '/../components/Admin/voucher/list_search_filter.php'; ?>
    <?php include __DIR__ . '/../components/Admin/voucher/list_table_section.php'; ?>
    <?php include __DIR__ . '/../components/Admin/voucher/list_modals.php'; ?>
    <?php include __DIR__ . '/../components/Admin/voucher/list_scripts.php'; ?>
