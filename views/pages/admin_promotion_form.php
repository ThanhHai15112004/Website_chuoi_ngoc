<?php
// views/pages/admin_promotion_form.php
$is_edit = $is_edit ?? false;
$mock = $mock_data ?? [];
?>
<div class="animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
                <a href="<?= APP_URL ?>/admin/khuyen-mai" class="hover:text-[#6B0D18]">Khuyến mãi sản phẩm</a>
                <span class="iconify text-xs" data-icon="mdi:chevron-right"></span>
                <span class="text-gray-800 font-medium"><?= $is_edit ? 'Chỉnh sửa' : 'Thêm mới' ?></span>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury"><?= $is_edit ? 'Chỉnh sửa khuyến mãi' : 'Tạo khuyến mãi mới' ?></h2>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/khuyen-mai" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy bỏ</a>
            <button class="px-4 py-2 bg-white border border-[#6B0D18] text-[#6B0D18] rounded-lg hover:bg-red-50 transition-colors font-medium text-sm">Lưu nháp</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md" onclick="showFormToast()">
                <?= $is_edit ? 'Cập nhật khuyến mãi' : 'Tạo & Kích hoạt ngay' ?>
            </button>
        </div>
    </div>

    <!-- Alert if Editing Active Promo -->
    <?php if ($is_edit): ?>
    <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-6 flex items-start gap-3">
        <span class="iconify text-amber-500 text-xl mt-0.5" data-icon="mdi:alert-circle-outline"></span>
        <div>
            <h4 class="font-bold text-amber-800 text-sm">Chương trình đang diễn ra</h4>
            <p class="text-sm text-amber-700 mt-0.5">Việc thay đổi giá giảm hoặc thời gian lúc này có thể ảnh hưởng đến trải nghiệm của khách hàng đang xem trang web. Hãy cẩn trọng.</p>
        </div>
    </div>
    <?php endif; ?>

    <!-- Two Columns Layout -->
    <div class="flex flex-col lg:flex-row gap-6">
        
    <?php include __DIR__ . '/../components/Admin/promotion/form_config.php'; ?>
    <?php include __DIR__ . '/../components/Admin/promotion/form_preview.php'; ?>
    <?php include __DIR__ . '/../components/Admin/promotion/form_modals.php'; ?>
    <?php include __DIR__ . '/../components/Admin/promotion/form_scripts.php'; ?>
