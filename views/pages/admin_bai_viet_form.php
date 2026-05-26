<?php
// views/pages/admin_post_form.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out] pb-10">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 sticky top-0 bg-gray-50/80 backdrop-blur-md z-30 py-4 -mx-6 px-6 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/post" class="w-10 h-10 bg-white rounded-full flex items-center justify-center border border-gray-200 text-gray-500 hover:text-[#6B0D18] hover:border-[#6B0D18] transition-colors shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <h2 class="text-2xl font-bold text-gray-800 font-luxury"><?= $is_edit ? 'Chỉnh sửa bài viết' : 'Thêm bài viết mới' ?></h2>
                <div class="text-sm text-gray-500 flex items-center gap-2 mt-1">
                    Trạng thái: <span class="inline-flex px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100 text-gray-600">Bản nháp</span>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify text-gray-400" data-icon="mdi:content-save-outline"></span>
                Lưu nháp
            </button>
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2" onclick="openPreview()">
                <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span>
                Xem trước
            </button>
            <button class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md flex items-center gap-2" onclick="openPublishConfirm()">
                <span class="iconify" data-icon="mdi:publish"></span>
                Đăng bài
            </button>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-6">
    <?php include __DIR__ . '/../components/Admin/bai_viet/form_content.php'; ?>
    <?php include __DIR__ . '/../components/Admin/bai_viet/form_modals.php'; ?>
    <?php include __DIR__ . '/../components/Admin/bai_viet/form_scripts.php'; ?>
