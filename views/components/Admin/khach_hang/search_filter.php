    <!-- Tabs Phân Loại -->
    <div class="flex items-center gap-2 overflow-x-auto scrollbar-hide mb-4">
        <?php $currentTab = $_GET['tab'] ?? ''; ?>
        <a href="?tab=" class="px-4 py-2 <?= $currentTab === '' ? 'bg-[#6B0D18] text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' ?> rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Tất cả (<?= $thong_ke['tong'] ?>)</a>
        <a href="?tab=khach_moi" class="px-4 py-2 <?= $currentTab === 'khach_moi' ? 'bg-[#6B0D18] text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' ?> rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Khách mới (<?= $thong_ke['khach_moi'] ?>)</a>
        <a href="?tab=da_mua" class="px-4 py-2 <?= $currentTab === 'da_mua' ? 'bg-[#6B0D18] text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' ?> rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Đã mua hàng (<?= $thong_ke['da_mua'] ?>)</a>
        <a href="?tab=gold" class="px-4 py-2 <?= $currentTab === 'gold' ? 'bg-yellow-500 text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-yellow-50' ?> rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Gold</a>
        <a href="?tab=diamond" class="px-4 py-2 <?= $currentTab === 'diamond' ? 'bg-red-500 text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-red-50' ?> rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Diamond (<?= $thong_ke['diamond'] ?>)</a>
        <a href="?tab=bi_khoa" class="px-4 py-2 <?= $currentTab === 'bi_khoa' ? 'bg-gray-800 text-white' : 'bg-white border border-red-200 text-red-600 hover:bg-red-50' ?> rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Bị khóa (<?= $thong_ke['bi_khoa'] ?>)</a>
    </div>

    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6 flex flex-col xl:flex-row xl:items-center justify-between gap-4">
        <form method="GET" action="" class="relative w-full xl:w-80 shrink-0 flex items-center">
            <?php if (!empty($_GET['tab'])): ?>
                <input type="hidden" name="tab" value="<?= htmlspecialchars($_GET['tab']) ?>">
            <?php endif; ?>
            <input type="text" name="keyword" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" placeholder="Tìm tên, email, sđt, mã KH..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-shadow">
            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
            <button type="submit" class="hidden">Search</button>
        </form>
        <div class="flex items-center gap-3 overflow-x-auto pb-1 xl:pb-0 scrollbar-hide w-full xl:w-auto">
            <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors shrink-0 flex items-center gap-2">
                Bộ lọc nâng cao <span class="iconify" data-icon="mdi:filter-variant"></span>
            </button>
            <a href="<?= APP_URL ?>/admin/khach-hang" class="px-3 py-2 text-[#6B0D18] text-sm font-medium hover:underline whitespace-nowrap shrink-0">
                Xóa lọc
            </a>
        </div>
    </div>
