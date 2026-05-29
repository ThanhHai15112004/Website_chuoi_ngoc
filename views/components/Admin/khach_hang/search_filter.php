    <!-- Tabs Phân Loại -->
    <div class="flex items-center gap-2 overflow-x-auto scrollbar-hide mb-4">
        <?php $currentTab = $_GET['tab'] ?? ''; ?>
        <a href="?tab=" class="px-4 py-2 <?= $currentTab === '' ? 'bg-[#6B0D18] text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' ?> rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Tất cả (<?= $thong_ke['tong'] ?>)</a>
        <a href="?tab=khach_moi" class="px-4 py-2 <?= $currentTab === 'khach_moi' ? 'bg-[#6B0D18] text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' ?> rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Khách mới (<?= $thong_ke['khach_moi'] ?>)</a>
        <a href="?tab=da_mua" class="px-4 py-2 <?= $currentTab === 'da_mua' ? 'bg-[#6B0D18] text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-gray-50' ?> rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Đã mua hàng (<?= $thong_ke['da_mua'] ?>)</a>
        <a href="?tab=gold" class="px-4 py-2 <?= $currentTab === 'gold' ? 'bg-yellow-500 text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-yellow-50' ?> rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Vàng</a>
        <a href="?tab=diamond" class="px-4 py-2 <?= $currentTab === 'diamond' ? 'bg-red-500 text-white' : 'bg-white border border-gray-200 text-gray-600 hover:bg-red-50' ?> rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Kim Cương (<?= $thong_ke['diamond'] ?? 0 ?>)</a>
        <a href="?tab=bi_khoa" class="px-4 py-2 <?= $currentTab === 'bi_khoa' ? 'bg-gray-800 text-white' : 'bg-white border border-red-200 text-red-600 hover:bg-red-50' ?> rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors">Bị khóa (<?= $thong_ke['bi_khoa'] ?>)</a>
    </div>

    <!-- Search & Filter Bar -->
    <form method="GET" action="" id="filterForm">
        <?php if (!empty($_GET['tab'])): ?>
            <input type="hidden" name="tab" value="<?= htmlspecialchars($_GET['tab']) ?>">
        <?php endif; ?>
        <?php if (!empty($_GET['sort'])): ?>
            <input type="hidden" name="sort" value="<?= htmlspecialchars($_GET['sort']) ?>">
        <?php endif; ?>
        
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-4 flex flex-col xl:flex-row xl:items-center justify-between gap-4">
            <div class="relative w-full xl:w-80 shrink-0 flex items-center">
                <input type="text" name="keyword" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" placeholder="Tìm tên, email, sđt, mã KH..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-shadow">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <button type="submit" class="hidden">Search</button>
            </div>
            <div class="flex items-center gap-3 overflow-x-auto pb-1 xl:pb-0 scrollbar-hide w-full xl:w-auto">
                <button type="button" onclick="document.getElementById('advancedFilterPanel').classList.toggle('hidden')" class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors shrink-0 flex items-center gap-2">
                    Bộ lọc nâng cao <span class="iconify" data-icon="mdi:filter-variant"></span>
                </button>
                <a href="<?= APP_URL ?>/admin/khach-hang" class="px-3 py-2 text-[#6B0D18] text-sm font-medium hover:underline whitespace-nowrap shrink-0">
                    Xóa lọc
                </a>
            </div>
        </div>
        
        <!-- Advanced Filter Panel -->
        <?php
            $hasAdvancedFilter = !empty($_GET['id_hang_thanh_vien']) || !empty($_GET['id_menh']) || !empty($_GET['thang_sinh']) || (isset($_GET['trang_thai_loc']) && $_GET['trang_thai_loc'] !== '') || (isset($_GET['chi_tieu_tu']) && $_GET['chi_tieu_tu'] !== '') || (isset($_GET['chi_tieu_den']) && $_GET['chi_tieu_den'] !== '');
        ?>
        <div id="advancedFilterPanel" class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 mb-6 <?= $hasAdvancedFilter ? '' : 'hidden' ?> animate-[fadeInPage_0.2s_ease-out]">
            <h3 class="text-sm font-bold text-gray-800 mb-4 flex items-center gap-2">
                <span class="iconify" data-icon="mdi:filter-outline"></span> Tiêu chí lọc nâng cao
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-4">
                <!-- Hạng thành viên -->
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Hạng thành viên</label>
                    <select name="id_hang_thanh_vien" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        <option value="">Tất cả hạng</option>
                        <?php foreach($hang_thanh_viens ?? [] as $htv): ?>
                            <option value="<?= $htv['id'] ?>" <?= ($_GET['id_hang_thanh_vien'] ?? '') == $htv['id'] ? 'selected' : '' ?>><?= $htv['ten_hang'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <!-- Mệnh -->
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Mệnh phong thủy</label>
                    <select name="id_menh" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        <option value="">Tất cả mệnh</option>
                        <?php foreach($menh_phong_thuys ?? [] as $mpt): ?>
                            <option value="<?= $mpt['id'] ?>" <?= ($_GET['id_menh'] ?? '') == $mpt['id'] ? 'selected' : '' ?>><?= $mpt['ten_menh'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <!-- Tháng sinh -->
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Tháng sinh</label>
                    <select name="thang_sinh" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        <option value="">Cả năm</option>
                        <?php for($i=1; $i<=12; $i++): ?>
                            <option value="<?= $i ?>" <?= ($_GET['thang_sinh'] ?? '') == $i ? 'selected' : '' ?>>Tháng <?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                
                <!-- Trạng thái -->
                <div>
                    <label class="block text-xs text-gray-500 mb-1">Trạng thái</label>
                    <select name="trang_thai_loc" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        <option value="">Tất cả trạng thái</option>
                        <option value="1" <?= (isset($_GET['trang_thai_loc']) && $_GET['trang_thai_loc'] === '1') ? 'selected' : '' ?>>Hoạt động</option>
                        <option value="0" <?= (isset($_GET['trang_thai_loc']) && $_GET['trang_thai_loc'] === '0') ? 'selected' : '' ?>>Bị khóa</option>
                    </select>
                </div>
                
                <!-- Chi tiêu -->
                <div class="col-span-1 md:col-span-2 lg:col-span-1">
                    <label class="block text-xs text-gray-500 mb-1">Tổng chi tiêu</label>
                    <div class="flex items-center gap-2">
                        <input type="number" name="chi_tieu_tu" placeholder="Từ..." value="<?= htmlspecialchars($_GET['chi_tieu_tu'] ?? '') ?>" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        <span class="text-gray-400">-</span>
                        <input type="number" name="chi_tieu_den" placeholder="Đến..." value="<?= htmlspecialchars($_GET['chi_tieu_den'] ?? '') ?>" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    </div>
                </div>
            </div>
            <div class="mt-4 flex justify-end">
                <button type="submit" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-[#8A111F] transition-colors">Áp dụng lọc</button>
            </div>
        </div>
    </form>
