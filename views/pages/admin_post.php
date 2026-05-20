<?php
// views/pages/admin_post.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Quản lý bài viết</h2>
            <p class="text-sm text-gray-500 mt-1">Tạo, chỉnh sửa và quản lý các bài viết kiến thức, tin tức và nội dung phong thủy trên website.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-3 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm hidden md:flex items-center gap-2">
                <span class="iconify" data-icon="mdi:shape-outline"></span>
                Danh mục
            </button>
            <button class="px-3 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm hidden md:flex items-center gap-2">
                <span class="iconify" data-icon="mdi:tag-outline"></span>
                Quản lý Tag
            </button>
            <a href="<?= APP_URL ?>/admin/post/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md shadow-[#6B0D18]/20 flex items-center gap-2">
                <span class="iconify text-lg" data-icon="mdi:plus"></span>
                Thêm bài viết
            </a>
        </div>
    </div>

    <?php include __DIR__ . '/../components/Admin/post/list_stats_cards.php'; ?>
    <?php include __DIR__ . '/../components/Admin/post/list_main_content.php'; ?>
    <?php include __DIR__ . '/../components/Admin/post/list_modals.php'; ?>
    <?php include __DIR__ . '/../components/Admin/post/list_scripts.php'; ?>
