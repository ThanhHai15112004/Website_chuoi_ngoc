<?php 
$filters = $_GET ?? []; 
$kw = $filters['keyword'] ?? '';
$dm_sel = $filters['danh_muc'] ?? '';
$da_sel = $filters['loai_da'] ?? '';
$menh_sel = $filters['menh'] ?? '';
$tt_sel = $filters['trang_thai'] ?? '';
$tk_sel = $filters['ton_kho'] ?? '';
?>
    <!-- Search & Filters -->
    <form method="GET" action="" class="bg-white p-4 rounded-[18px] shadow-sm border border-gray-100 space-y-4">
        <!-- Search bar -->
        <div class="relative">
            <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-[#6B0D18] text-xl" data-icon="mdi:magnify"></span>
            <input type="text" name="keyword" value="<?= htmlspecialchars($kw) ?>" placeholder="Tìm theo tên sản phẩm, mã sản phẩm, loại đá..." 
                class="w-full pl-12 pr-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
        </div>
        
        <!-- Filters -->
        <div class="flex flex-wrap items-center gap-3">
            <select name="danh_muc" onchange="this.form.submit()" class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 relative bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Tất cả danh mục</option>
                <?php foreach($danh_muc_list as $dm): ?>
                    <option value="<?= htmlspecialchars($dm) ?>" <?= $dm_sel === $dm ? 'selected' : '' ?>><?= htmlspecialchars($dm) ?></option>
                <?php endforeach; ?>
            </select>
            
            <select name="loai_da" onchange="this.form.submit()" class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Tất cả loại đá</option>
                <?php foreach($loai_da_list as $da): ?>
                    <option value="<?= htmlspecialchars($da) ?>" <?= $da_sel === $da ? 'selected' : '' ?>><?= htmlspecialchars($da) ?></option>
                <?php endforeach; ?>
            </select>
            
            <select name="menh" onchange="this.form.submit()" class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Tất cả mệnh</option>
                <?php foreach($menh_list as $m): ?>
                    <option value="<?= htmlspecialchars($m) ?>" <?= $menh_sel === $m ? 'selected' : '' ?>><?= htmlspecialchars($m) ?></option>
                <?php endforeach; ?>
            </select>
            
            <select name="trang_thai" onchange="this.form.submit()" class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Trạng thái: Tất cả</option>
                <option value="1" <?= $tt_sel === '1' ? 'selected' : '' ?>>Đang hiển thị</option>
                <option value="0" <?= $tt_sel === '0' ? 'selected' : '' ?>>Đang ẩn</option>
            </select>
            
            <select name="ton_kho" onchange="this.form.submit()" class="px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-8 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_0.5rem_center] bg-[length:1em_1em]">
                <option value="">Tồn kho: Tất cả</option>
                <option value="con_hang" <?= $tk_sel === 'con_hang' ? 'selected' : '' ?>>Còn hàng</option>
                <option value="sap_het" <?= $tk_sel === 'sap_het' ? 'selected' : '' ?>>Sắp hết hàng</option>
                <option value="het_hang" <?= $tk_sel === 'het_hang' ? 'selected' : '' ?>>Hết hàng</option>
            </select>
            
            <div class="flex-1"></div>
            
            <button type="submit" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] transition-colors text-sm font-medium shadow-sm">
                Lọc
            </button>
        </div>
        
        <!-- Active Filter Chips -->
        <?php
        $activeFilters = [];
        if (!empty($kw)) {
            $activeFilters['keyword'] = 'Từ khóa: ' . $kw;
        }
        if (!empty($dm_sel)) {
            $activeFilters['danh_muc'] = 'Danh mục: ' . $dm_sel;
        }
        if (!empty($da_sel)) {
            $activeFilters['loai_da'] = 'Loại đá: ' . $da_sel;
        }
        if (!empty($menh_sel)) {
            $activeFilters['menh'] = 'Mệnh: ' . $menh_sel;
        }
        if ($tt_sel !== '') {
            $activeFilters['trang_thai'] = $tt_sel === '1' ? 'Trạng thái: Đang hiển thị' : 'Trạng thái: Đang ẩn';
        }
        if (!empty($tk_sel)) {
            $tk_labels = ['con_hang' => 'Tồn kho: Còn hàng', 'sap_het' => 'Tồn kho: Sắp hết', 'het_hang' => 'Tồn kho: Hết hàng'];
            $activeFilters['ton_kho'] = $tk_labels[$tk_sel] ?? 'Tồn kho: ' . $tk_sel;
        }
        
        if (!empty($activeFilters)):
        ?>
        <div class="flex flex-wrap gap-2 pt-3 border-t border-gray-100">
            <?php foreach ($activeFilters as $key => $label): 
                $queryParams = $_GET;
                unset($queryParams[$key]);
                if (isset($queryParams['page'])) unset($queryParams['page']);
                $removeUrl = '?' . http_build_query($queryParams);
            ?>
            <a href="<?= $removeUrl ?>" class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-50 text-[#6B0D18] rounded-md text-[11px] font-medium hover:bg-red-100 transition-colors group/chip">
                <?= htmlspecialchars($label) ?> 
                <span class="iconify text-sm opacity-60 group-hover/chip:opacity-100" data-icon="mdi:close"></span>
            </a>
            <?php endforeach; ?>
            
            <a href="?" class="inline-flex items-center px-3 py-1 text-gray-500 hover:text-[#6B0D18] rounded-md text-[11px] font-medium transition-colors underline decoration-transparent hover:decoration-[#6B0D18] underline-offset-4">
                Xóa bộ lọc
            </a>
        </div>
        <?php endif; ?>
    </form>
