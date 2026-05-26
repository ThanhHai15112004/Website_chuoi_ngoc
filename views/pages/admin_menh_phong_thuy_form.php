<?php
// views/pages/admin_destiny_form.php
$mock = $mock ?? [];
$is_edit = true; // Trang này chủ yếu là sửa 5 mệnh có sẵn
?>
<div class="animate-[fadeInPage_0.3s_ease-out] max-w-5xl mx-auto pb-12">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
                <a href="<?= APP_URL ?>/admin/menh-phong-thuy" class="hover:text-[#6B0D18]">Mệnh phong thủy</a>
                <span class="iconify text-xs" data-icon="mdi:chevron-right"></span>
                <span class="text-gray-800 font-medium">Chỉnh sửa Mệnh Mộc</span>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury flex items-center gap-2">
                Chỉnh sửa Mệnh Mộc
                <span class="w-4 h-4 rounded-full shadow-[0_0_0_1px_rgba(0,0,0,0.1)]" style="background-color: #10B981"></span>
            </h2>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <a href="<?= APP_URL ?>/admin/menh-phong-thuy" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy</a>
            <button class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md" onclick="showFormToast()">
                Lưu thông tin mệnh
            </button>
        </div>
    </div>

    <!-- Alert Cần bổ sung -->
    <?php if (isset($mock['trang_thai']) && $mock['trang_thai'] === 2): ?>
    <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-6 flex items-start gap-3">
        <span class="iconify text-amber-500 text-xl mt-0.5" data-icon="mdi:alert-circle-outline"></span>
        <div>
            <h4 class="font-bold text-amber-800 text-sm">Dữ liệu cần hoàn thiện</h4>
            <ul class="text-sm text-amber-700 mt-1 list-disc list-inside">
                <li>Mệnh này chưa có Sản phẩm gợi ý.</li>
            </ul>
        </div>
    </div>
    <?php endif; ?>

    <div class="space-y-6">
        
    <?php include __DIR__ . '/../components/Admin/menh_phong_thuy/form_basic.php'; ?>
    <?php include __DIR__ . '/../components/Admin/menh_phong_thuy/form_modals.php'; ?>
    <?php include __DIR__ . '/../components/Admin/menh_phong_thuy/form_scripts.php'; ?>
