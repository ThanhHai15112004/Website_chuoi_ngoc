    <!-- Tabs & Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-4">
        
        <form action="<?= APP_URL ?>/admin/khuyen-mai" method="GET" id="filterForm">
            <!-- Tabs -->
            <input type="hidden" name="tab" id="current-tab" value="<?= htmlspecialchars($filters['tab'] ?? 'tat_ca') ?>">
            
            <?php
                $tabs = [
                    'tat_ca' => ['label' => 'Tất cả', 'count' => $thong_ke['tong_chuong_trinh']],
                    'dang_dien_ra' => ['label' => 'Đang diễn ra', 'count' => $thong_ke['dang_dien_ra']],
                    'sap_bat_dau' => ['label' => 'Sắp bắt đầu', 'count' => $thong_ke['sap_bat_dau']],
                    'sap_ket_thuc' => ['label' => 'Sắp kết thúc', 'count' => $thong_ke['sap_ket_thuc']],
                    'da_ket_thuc' => ['label' => 'Đã kết thúc', 'count' => $thong_ke['da_ket_thuc']],
                    'da_tat' => ['label' => 'Đã tắt', 'count' => $thong_ke['da_tat']],
                    'flash_sale' => ['label' => 'Flash Sale', 'count' => $thong_ke['flash_sale']],
                ];
                $current_tab = $filters['tab'] ?? 'tat_ca';
            ?>
            <div class="flex space-x-1 border-b border-gray-100 overflow-x-auto hide-scrollbar mb-4" id="promo-tabs">
                <?php foreach ($tabs as $key => $tab): ?>
                    <?php if ($key === $current_tab): ?>
                        <button type="button" class="tab-btn px-4 py-2 border-b-2 border-[#6B0D18] text-[#6B0D18] font-medium text-sm whitespace-nowrap" onclick="switchPromoTab('<?= $key ?>')">
                            <?= $tab['label'] ?> (<?= $tab['count'] ?>)
                        </button>
                    <?php else: ?>
                        <button type="button" class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchPromoTab('<?= $key ?>')">
                            <?= $tab['label'] ?> (<?= $tab['count'] ?>)
                        </button>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>



            <!-- Search & Filters -->
            <div class="flex flex-col lg:flex-row gap-3">
                <div class="relative flex-1">
                    <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                    <input type="text" name="keyword" value="<?= htmlspecialchars($filters['keyword'] ?? '') ?>" placeholder="Tìm theo tên chương trình, mã, tên sản phẩm..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all" onkeypress="if(event.key === 'Enter') this.form.submit()">
                </div>
                
                <div class="flex flex-wrap gap-2">
                    <select name="loai_km" onchange="this.form.submit()" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                        <option value="">Loại khuyến mãi</option>
                        <option value="percent" <?= ($filters['loai_km'] ?? '') == 'percent' ? 'selected' : '' ?>>Giảm thông thường</option>
                        <option value="flash" <?= ($filters['loai_km'] ?? '') == 'flash' ? 'selected' : '' ?>>Flash Sale</option>
                        <option value="clearance" <?= ($filters['loai_km'] ?? '') == 'clearance' ? 'selected' : '' ?>>Xả kho</option>
                        <option value="bundle" <?= ($filters['loai_km'] ?? '') == 'bundle' ? 'selected' : '' ?>>Combo</option>
                    </select>

                    <select name="danh_muc" onchange="this.form.submit()" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                        <option value="">Danh mục áp dụng</option>
                        <?php if(!empty($danh_muc_list)): foreach($danh_muc_list as $dm): ?>
                            <option value="<?= $dm['id'] ?>" <?= ($filters['danh_muc'] ?? '') == $dm['id'] ? 'selected' : '' ?>><?= htmlspecialchars($dm['ten_danh_muc']) ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                    
                    <button type="submit" class="px-3 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm flex items-center gap-1">
                        Lọc
                    </button>
                    <?php if (!empty(array_filter($filters)) && $filters['tab'] !== 'tat_ca'): ?>
                    <a href="<?= APP_URL ?>/admin/khuyen-mai" class="px-3 py-2 bg-gray-50 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors font-medium text-sm flex items-center gap-1">
                        Xóa lọc
                    </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php 
        $active_filters = [];
        if (!empty($filters['keyword'])) $active_filters['keyword'] = 'Từ khóa: ' . $filters['keyword'];
        if (!empty($filters['loai_km'])) {
            $loai_map = ['percent' => 'Giảm thông thường', 'fixed' => 'Giảm số tiền', 'flash' => 'Flash Sale', 'clearance' => 'Xả kho', 'bundle' => 'Combo'];
            $active_filters['loai_km'] = 'Loại: ' . ($loai_map[$filters['loai_km']] ?? $filters['loai_km']);
        }
        if (!empty($filters['danh_muc'])) {
            $dm_name = '';
            foreach ($danh_muc_list as $dm) {
                if ($dm['id'] == $filters['danh_muc']) { $dm_name = $dm['ten_danh_muc']; break; }
            }
            $active_filters['danh_muc'] = 'Danh mục: ' . $dm_name;
        }
        ?>
        <?php if (!empty($active_filters)): ?>
        <div class="flex flex-wrap gap-2 pt-3">
            <?php foreach ($active_filters as $key => $label): ?>
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-red-50 text-[#6B0D18] text-xs font-medium">
                <?= htmlspecialchars($label) ?>
                <a href="<?= APP_URL ?>/admin/khuyen-mai?<?= http_build_query(array_merge($filters, [$key => ''])) ?>" class="hover:text-red-900"><span class="iconify" data-icon="mdi:close"></span></a>
            </span>
            <?php endforeach; ?>
            <a href="<?= APP_URL ?>/admin/khuyen-mai?tab=<?= $filters['tab'] ?>" class="text-xs text-gray-500 hover:text-[#6B0D18] underline font-medium mt-1">Xóa tất cả</a>
        </div>
        <?php endif; ?>
        </form>
    </div>

