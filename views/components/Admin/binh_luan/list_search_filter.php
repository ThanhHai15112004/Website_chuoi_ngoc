    <!-- Search & Filter Bar -->
    <!-- Search & Filter Bar -->
    <form method="GET" action="<?= APP_URL ?>/admin/binh-luan" id="searchForm" class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <!-- Preserve current tab status and type -->
        <?php if(!empty($_GET['status'])): ?>
            <input type="hidden" name="status" value="<?= htmlspecialchars($_GET['status']) ?>">
        <?php endif; ?>
        <?php if(!empty($_GET['type'])): ?>
            <input type="hidden" name="type" value="<?= htmlspecialchars($_GET['type']) ?>">
        <?php endif; ?>

        <div class="relative w-full md:w-96 shrink-0">
            <input type="text" name="keyword" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" placeholder="Tìm tên khách, sản phẩm, nội dung..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-shadow">
            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
            <!-- Bắt phím Enter để submit form ngầm định -->
            <button type="submit" class="hidden"></button>
        </div>
        <div class="flex items-center gap-3 overflow-x-auto pb-1 md:pb-0 scrollbar-hide w-full md:w-auto">
            <select name="sao" onchange="document.getElementById('searchForm').submit()" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="all">Tất cả sao</option>
                <option value="5" <?= (($_GET['sao'] ?? '') == '5') ? 'selected' : '' ?>>5 Sao</option>
                <option value="4" <?= (($_GET['sao'] ?? '') == '4') ? 'selected' : '' ?>>4 Sao</option>
                <option value="3" <?= (($_GET['sao'] ?? '') == '3') ? 'selected' : '' ?>>3 Sao</option>
                <option value="2" <?= (($_GET['sao'] ?? '') == '2') ? 'selected' : '' ?>>2 Sao</option>
                <option value="1" <?= (($_GET['sao'] ?? '') == '1') ? 'selected' : '' ?>>1 Sao</option>
            </select>
            <?php
            $clearParams = [];
            if (!empty($_GET['status'])) $clearParams['status'] = $_GET['status'];
            if (!empty($_GET['type'])) $clearParams['type'] = $_GET['type'];
            $clearQuery = !empty($clearParams) ? '?' . http_build_query($clearParams) : '';
            ?>
            <a href="<?= APP_URL ?>/admin/binh-luan<?= $clearQuery ?>" class="px-3 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors shrink-0">
                Xóa lọc
            </a>
        </div>
    </form>

