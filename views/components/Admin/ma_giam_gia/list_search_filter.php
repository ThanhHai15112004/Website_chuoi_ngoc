<?php 
$filters = $_GET ?? []; 
$kw = $filters['keyword'] ?? '';
$loai_sel = $filters['loai_giam'] ?? '';
$time_sel = $filters['thoi_gian'] ?? '';
$dt_sel = $filters['doi_tuong'] ?? '';
?>
    <!-- Tabs & Filters Container -->
    <form method="GET" action="" class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-4">
        
        <?php
        $current_tab = $_GET['tab'] ?? 'all';
        function getTabClass($tabName, $current_tab) {
            if ($tabName === $current_tab) {
                return 'tab-btn px-4 py-2 border-b-2 border-[#6B0D18] text-[#6B0D18] font-medium text-sm whitespace-nowrap';
            }
            return 'tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap';
        }
        function getTabUrl($tabName) {
            $q = $_GET;
            $q['tab'] = $tabName;
            if (isset($q['page'])) unset($q['page']);
            return '?' . http_build_query($q);
        }
        ?>
        <!-- Tabs -->
        <div class="flex space-x-1 border-b border-gray-100 overflow-x-auto hide-scrollbar" id="voucher-tabs">
            <a href="<?= getTabUrl('all') ?>" class="<?= getTabClass('all', $current_tab) ?>">Tất cả (<?= $thong_ke['tong_voucher'] ?? 0 ?>)</a>
            <a href="<?= getTabUrl('active') ?>" class="<?= getTabClass('active', $current_tab) ?>">Đang hoạt động (<?= $thong_ke['dang_hoat_dong'] ?? 0 ?>)</a>
            <a href="<?= getTabUrl('expiring') ?>" class="<?= getTabClass('expiring', $current_tab) ?>">Sắp hết hạn (<?= $thong_ke['sap_het_han'] ?? 0 ?>)</a>
            <a href="<?= getTabUrl('expired') ?>" class="<?= getTabClass('expired', $current_tab) ?>">Hết hạn (<?= $thong_ke['het_han'] ?? 0 ?>)</a>
            <a href="<?= getTabUrl('upcoming') ?>" class="<?= getTabClass('upcoming', $current_tab) ?>">Chưa bắt đầu (<?= $thong_ke['chua_bat_dau'] ?? 0 ?>)</a>
            <a href="<?= getTabUrl('out_of_stock') ?>" class="<?= getTabClass('out_of_stock', $current_tab) ?>">Hết lượt (<?= $thong_ke['het_luot'] ?? 0 ?>)</a>
            <a href="<?= getTabUrl('disabled') ?>" class="<?= getTabClass('disabled', $current_tab) ?>">Đã tắt (<?= $thong_ke['da_tat'] ?? 0 ?>)</a>
        </div>

        <!-- Search & Filters -->
        <div class="flex flex-col lg:flex-row gap-3">
            <div class="relative flex-1">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" name="keyword" value="<?= htmlspecialchars($kw) ?>" placeholder="Tìm theo mã voucher, tên chương trình..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
            </div>
            
            <div class="flex flex-wrap gap-2">
                <!-- Bộ lọc Loại -->
                <select name="loai_giam" onchange="this.form.submit()" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Loại giảm giá</option>
                    <option value="percent" <?= $loai_sel === 'percent' ? 'selected' : '' ?>>Giảm phần trăm</option>
                    <option value="fixed" <?= $loai_sel === 'fixed' ? 'selected' : '' ?>>Giảm số tiền cố định</option>
                    <option value="freeship" <?= $loai_sel === 'freeship' ? 'selected' : '' ?>>Miễn phí vận chuyển</option>
                    <option value="gift" <?= $loai_sel === 'gift' ? 'selected' : '' ?>>Quà tặng</option>
                </select>

                <!-- Bộ lọc Thời gian -->
                <select name="thoi_gian" onchange="this.form.submit()" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Thời gian</option>
                    <option value="active" <?= $time_sel === 'active' ? 'selected' : '' ?>>Đang hiệu lực</option>
                    <option value="upcoming" <?= $time_sel === 'upcoming' ? 'selected' : '' ?>>Sắp diễn ra</option>
                    <option value="expired" <?= $time_sel === 'expired' ? 'selected' : '' ?>>Đã hết hạn</option>
                </select>
                
                <!-- Bộ lọc Đối tượng -->
                <select name="doi_tuong" onchange="this.form.submit()" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Đối tượng</option>
                    <option value="all" <?= $dt_sel === 'all' ? 'selected' : '' ?>>Tất cả khách hàng</option>
                    <option value="new" <?= $dt_sel === 'new' ? 'selected' : '' ?>>Khách hàng mới</option>
                    <option value="silver" <?= $dt_sel === 'silver' ? 'selected' : '' ?>>Hạng Silver</option>
                    <option value="gold" <?= $dt_sel === 'gold' ? 'selected' : '' ?>>Hạng Gold</option>
                    <option value="diamond" <?= $dt_sel === 'diamond' ? 'selected' : '' ?>>Hạng Diamond</option>
                </select>

                <button type="submit" class="px-3 py-2 bg-gray-50 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors font-medium text-sm flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:filter-variant"></span>
                    Lọc thêm
                </button>
            </div>
        </div>

        <!-- Active Filters Chips -->
        <?php
        $activeFilters = [];
        if (!empty($kw)) {
            $activeFilters['keyword'] = 'Từ khóa: ' . $kw;
        }
        if (!empty($loai_sel)) {
            $l_labels = ['percent' => 'Giảm %', 'fixed' => 'Giảm số tiền', 'freeship' => 'Freeship', 'gift' => 'Quà tặng'];
            $activeFilters['loai_giam'] = 'Loại: ' . ($l_labels[$loai_sel] ?? $loai_sel);
        }
        if (!empty($time_sel)) {
            $t_labels = ['active' => 'Đang hiệu lực', 'upcoming' => 'Sắp diễn ra', 'expired' => 'Đã hết hạn'];
            $activeFilters['thoi_gian'] = 'Thời gian: ' . ($t_labels[$time_sel] ?? $time_sel);
        }
        if (!empty($dt_sel)) {
            $d_labels = ['all' => 'Tất cả khách', 'new' => 'Khách mới', 'silver' => 'Hạng Silver', 'gold' => 'Hạng Gold', 'diamond' => 'Hạng Diamond'];
            $activeFilters['doi_tuong'] = 'Đối tượng: ' . ($d_labels[$dt_sel] ?? $dt_sel);
        }
        
        if (!empty($activeFilters) || isset($_GET['trang_thai'])):
        ?>
        <div class="flex flex-wrap gap-2 pt-2">
            
            <?php if (isset($_GET['trang_thai']) && $_GET['trang_thai'] !== ''): 
                $tt_labels = [0 => 'Đã tắt', 1 => 'Đang bật'];
                $q = $_GET; unset($q['trang_thai']); if(isset($q['page'])) unset($q['page']);
            ?>
            <a href="?<?= http_build_query($q) ?>" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-gray-100 text-gray-600 text-xs font-medium hover:bg-red-50 hover:text-red-600 group">
                Trạng thái: <?= $tt_labels[$_GET['trang_thai']] ?? $_GET['trang_thai'] ?>
                <span class="iconify text-gray-400 group-hover:text-red-500" data-icon="mdi:close"></span>
            </a>
            <?php endif; ?>

            <?php foreach ($activeFilters as $key => $label): 
                $queryParams = $_GET;
                unset($queryParams[$key]);
                if (isset($queryParams['page'])) unset($queryParams['page']);
                $removeUrl = '?' . http_build_query($queryParams);
            ?>
            <a href="<?= $removeUrl ?>" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-gray-100 text-gray-600 text-xs font-medium hover:bg-red-50 hover:text-red-600 group">
                <?= htmlspecialchars($label) ?>
                <span class="iconify text-gray-400 group-hover:text-red-500" data-icon="mdi:close"></span>
            </a>
            <?php endforeach; ?>
            
            <a href="?" class="text-xs text-gray-500 hover:text-[#6B0D18] underline font-medium ml-1">Xóa bộ lọc</a>
        </div>
        <?php endif; ?>
    </form>

