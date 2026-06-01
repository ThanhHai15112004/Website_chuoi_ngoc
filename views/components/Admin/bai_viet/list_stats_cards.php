<?php
function formatViews($num) {
    if ($num >= 1000000) return round($num / 1000000, 1) . 'M';
    if ($num >= 1000) return round($num / 1000, 1) . 'K';
    return $num;
}
?>
<!-- Statistics Cards -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
    <a href="<?= APP_URL ?>/admin/post" class="bg-white p-4 rounded-xl shadow-sm border <?= !isset($_GET['status']) && !isset($_GET['seo']) ? 'border-[#6B0D18]' : 'border-gray-100 hover:border-gray-300' ?> flex flex-col justify-between transition-colors">
        <div class="flex items-center gap-2 text-gray-500 mb-2">
            <span class="iconify text-lg" data-icon="mdi:file-document-multiple-outline"></span>
            <span class="text-xs font-medium uppercase tracking-wider">Tổng bài viết</span>
        </div>
        <div class="text-2xl font-bold text-gray-800"><?= (int)$thong_ke['total'] ?> <span class="text-sm font-normal text-gray-500">bài</span></div>
    </a>

    <a href="<?= APP_URL ?>/admin/post?status=published" class="bg-emerald-50 p-4 rounded-xl shadow-sm border <?= (isset($_GET['status']) && $_GET['status'] == 'published') ? 'border-emerald-500' : 'border-emerald-100 hover:border-emerald-300' ?> flex flex-col justify-between transition-colors">
        <div class="flex items-center gap-2 text-emerald-600 mb-2">
            <span class="iconify text-lg" data-icon="mdi:check-circle-outline"></span>
            <span class="text-xs font-medium uppercase tracking-wider">Đã đăng</span>
        </div>
        <div class="text-2xl font-bold text-emerald-800"><?= (int)$thong_ke['published'] ?> <span class="text-sm font-normal text-emerald-700/70">bài</span></div>
    </a>

    <a href="<?= APP_URL ?>/admin/post?status=draft" class="bg-gray-50 p-4 rounded-xl shadow-sm border <?= (isset($_GET['status']) && $_GET['status'] == 'draft') ? 'border-gray-500' : 'border-gray-200 hover:border-gray-300' ?> flex flex-col justify-between transition-colors">
        <div class="flex items-center gap-2 text-gray-600 mb-2">
            <span class="iconify text-lg" data-icon="mdi:file-edit-outline"></span>
            <span class="text-xs font-medium uppercase tracking-wider">Bản nháp</span>
        </div>
        <div class="text-2xl font-bold text-gray-800"><?= (int)$thong_ke['draft'] ?> <span class="text-sm font-normal text-gray-500">bài</span></div>
    </a>

    <a href="<?= APP_URL ?>/admin/post?status=pending" class="bg-yellow-50 p-4 rounded-xl shadow-sm border border-yellow-100 flex flex-col justify-between transition-colors opacity-60 cursor-not-allowed" onclick="event.preventDefault();">
        <div class="flex items-center gap-2 text-amber-600 mb-2">
            <span class="iconify text-lg" data-icon="mdi:clock-outline"></span>
            <span class="text-xs font-medium uppercase tracking-wider">Chờ duyệt</span>
        </div>
        <div class="text-2xl font-bold text-amber-700">0 <span class="text-sm font-normal text-amber-600/70">bài</span></div>
    </a>

    <a href="<?= APP_URL ?>/admin/post?status=hidden" class="bg-white p-4 rounded-xl shadow-sm border <?= (isset($_GET['status']) && $_GET['status'] == 'hidden') ? 'border-gray-500' : 'border-gray-100 hover:border-gray-300' ?> flex flex-col justify-between transition-colors">
        <div class="flex items-center gap-2 text-gray-400 mb-2">
            <span class="iconify text-lg" data-icon="mdi:eye-off-outline"></span>
            <span class="text-xs font-medium uppercase tracking-wider">Đã ẩn</span>
        </div>
        <div class="text-2xl font-bold text-gray-500"><?= (int)$thong_ke['hidden'] ?> <span class="text-sm font-normal text-gray-400">bài</span></div>
    </a>

    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
        <div class="flex items-center gap-2 text-[#6B0D18] mb-2">
            <span class="iconify text-lg" data-icon="mdi:eye-outline"></span>
            <span class="text-xs font-medium uppercase tracking-wider">Tổng lượt xem</span>
        </div>
        <div class="text-2xl font-bold text-[#6B0D18]"><?= formatViews((int)$thong_ke['total_views']) ?> <span class="text-sm font-normal text-gray-500">lượt</span></div>
    </div>
</div>
