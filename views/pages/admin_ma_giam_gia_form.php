<?php
// views/pages/admin_ma_giam_gia_form.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <a href="<?= APP_URL ?>/admin/ma-giam-gia" class="text-sm text-gray-500 hover:text-[#6B0D18] flex items-center gap-1 transition-colors">
                    <span class="iconify" data-icon="mdi:arrow-left"></span>
                    Quay lại
                </a>
                <span class="text-gray-300">|</span>
                <span class="text-sm font-medium text-[#6B0D18]"><?= $is_edit ? 'Chỉnh sửa' : 'Thêm mới' ?></span>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury"><?= $tieu_de ?></h2>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/ma-giam-gia" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy</a>
            <button class="px-5 py-2.5 bg-white border border-[#6B0D18] text-[#6B0D18] rounded-lg hover:bg-red-50 transition-colors font-medium text-sm">Lưu nháp</button>
            <button onclick="saveVoucher(this)" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md shadow-[#6B0D18]/20 flex items-center gap-2">
                <span class="iconify" data-icon="mdi:content-save-outline"></span>
                <span><?= $is_edit ? 'Cập nhật voucher' : 'Tạo voucher' ?></span>
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col xl:flex-row gap-6">
        
    <?php include __DIR__ . '/../components/Admin/ma_giam_gia/form_area.php'; ?>
    <?php include __DIR__ . '/../components/Admin/ma_giam_gia/form_preview_area.php'; ?>
    <?php include __DIR__ . '/../components/Admin/ma_giam_gia/form_modals.php'; ?>
    <?php include __DIR__ . '/../components/Admin/ma_giam_gia/form_scripts.php'; ?>
