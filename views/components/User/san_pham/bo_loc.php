<!-- Sidebar bộ lọc sản phẩm -->
<form action="<?= APP_URL ?>/san-pham" method="GET" id="filter-form" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <!-- Keep existing q if search -->
    <?php if (!empty($filters['q'])): ?>
    <input type="hidden" name="q" value="<?= htmlspecialchars($filters['q']) ?>">
    <?php endif; ?>
    <!-- Keep sort if exists -->
    <input type="hidden" name="sap_xep" id="hidden_sap_xep" value="<?= htmlspecialchars($filters['sap_xep'] ?? '') ?>">

    <div class="bg-gradient-to-r from-crimson-600 to-crimson-700 px-5 py-4">
        <div class="flex items-center justify-between">
            <h3 class="text-white font-semibold flex items-center gap-2">
                <iconify-icon icon="heroicons:funnel" class="text-xl"></iconify-icon>
                Bộ lọc sản phẩm
            </h3>
            <a href="<?= APP_URL ?>/san-pham" class="text-crimson-200 hover:text-white text-xs font-medium transition">Đặt lại</a>
        </div>
    </div>
    <div class="p-5 space-y-5">
        <!-- Danh mục -->
        <div class="filter-group">
            <button type="button" class="filter-toggle w-full flex items-center justify-between text-sm font-semibold text-charcoal-800" onclick="toggleFilter(this)">
                <span class="flex items-center gap-2"><iconify-icon icon="mdi:format-list-bulleted" class="text-crimson-500 text-lg"></iconify-icon>Danh mục</span>
                <iconify-icon icon="heroicons:chevron-down" class="filter-arrow text-base text-gray-400 transition-transform duration-300"></iconify-icon>
            </button>
            <div class="filter-content mt-3 space-y-1">
                <?php foreach($danh_muc_list as $dm): 
                    $isChecked = (isset($filters['danh_muc']) && $filters['danh_muc'] === $dm['slug']);
                ?>
                <label class="flex items-center gap-3 cursor-pointer group px-2 py-1.5 rounded-lg hover:bg-ivory-50 transition">
                    <input type="radio" name="danh_muc" value="<?= $dm['slug'] ?>" class="w-4 h-4 accent-crimson-600 rounded" <?= $isChecked ? 'checked' : '' ?> onchange="document.getElementById('filter-form').submit()">
                    <span class="text-sm text-charcoal-700"><?= htmlspecialchars($dm['ten']) ?></span>
                    <span class="ml-auto text-xs text-gray-400">(<?= $dm['count'] ?>)</span>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
        <hr class="border-gray-100">
        <!-- Mệnh -->
        <div class="filter-group">
            <button type="button" class="filter-toggle w-full flex items-center justify-between text-sm font-semibold text-charcoal-800" onclick="toggleFilter(this)">
                <span class="flex items-center gap-2"><iconify-icon icon="mdi:yin-yang" class="text-gold-500 text-lg"></iconify-icon>Mệnh phong thủy</span>
                <iconify-icon icon="heroicons:chevron-down" class="filter-arrow text-base text-gray-400 transition-transform duration-300"></iconify-icon>
            </button>
            <div class="filter-content mt-3 flex flex-wrap gap-2">
                <?php 
                $menhIcons = [
                    'Mộc' => ['icon' => 'mdi:leaf', 'color' => 'green'],
                    'Hỏa' => ['icon' => 'mdi:fire', 'color' => 'red'],
                    'Thổ' => ['icon' => 'mdi:terrain', 'color' => 'amber'],
                    'Kim' => ['icon' => 'mdi:sword-cross', 'color' => 'yellow'],
                    'Thủy' => ['icon' => 'mdi:water-drop', 'color' => 'blue']
                ];
                foreach($menh_list as $m): 
                    $menhName = $m['ten_menh'];
                    $iconDef = $menhIcons[$menhName] ?? ['icon' => 'mdi:yin-yang', 'color' => 'gray'];
                    $color = $iconDef['color'];
                    $isChecked = (isset($filters['menh']) && in_array($menhName, (array)$filters['menh']));
                ?>
                <label class="cursor-pointer">
                    <input type="checkbox" name="menh[]" value="<?= htmlspecialchars($menhName) ?>" class="hidden peer" <?= $isChecked ? 'checked' : '' ?> onchange="document.getElementById('filter-form').submit()">
                    <div class="px-4 py-2 flex items-center gap-1.5 text-xs font-medium rounded-full border-2 border-<?= $color ?>-200 text-<?= $color ?>-700 bg-<?= $color ?>-50 peer-checked:bg-<?= $color ?>-600 peer-checked:text-white peer-checked:border-<?= $color ?>-600 hover:bg-<?= $color ?>-100 transition-all">
                        <iconify-icon icon="<?= $iconDef['icon'] ?>" class="text-sm"></iconify-icon> <?= htmlspecialchars($menhName) ?>
                    </div>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
        <hr class="border-gray-100">
        <!-- Loại đá -->
        <div class="filter-group">
            <button type="button" class="filter-toggle w-full flex items-center justify-between text-sm font-semibold text-charcoal-800" onclick="toggleFilter(this)">
                <span class="flex items-center gap-2"><iconify-icon icon="mdi:diamond-stone" class="text-emerald-500 text-lg"></iconify-icon>Loại đá</span>
                <iconify-icon icon="heroicons:chevron-down" class="filter-arrow text-base text-gray-400 transition-transform duration-300"></iconify-icon>
            </button>
            <div class="filter-content mt-3 space-y-1">
                <?php foreach($loai_da_list as $da): 
                    $daName = $da['ten_loai_da'];
                    $isChecked = (isset($filters['loai_da']) && in_array($daName, (array)$filters['loai_da']));
                ?>
                <label class="flex items-center gap-3 cursor-pointer group px-2 py-1.5 rounded-lg hover:bg-ivory-50 transition">
                    <input type="checkbox" name="loai_da[]" value="<?= htmlspecialchars($daName) ?>" class="w-4 h-4 accent-crimson-600 rounded" <?= $isChecked ? 'checked' : '' ?> onchange="document.getElementById('filter-form').submit()">
                    <span class="text-sm text-charcoal-700"><?= htmlspecialchars($daName) ?></span>
                    <span class="ml-auto text-xs text-gray-400">(<?= $da['so_san_pham'] ?>)</span>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
        <hr class="border-gray-100">
        <!-- Khoảng giá -->
        <div class="filter-group">
            <button type="button" class="filter-toggle w-full flex items-center justify-between text-sm font-semibold text-charcoal-800" onclick="toggleFilter(this)">
                <span class="flex items-center gap-2"><iconify-icon icon="mdi:cash-multiple" class="text-violet-500 text-lg"></iconify-icon>Khoảng giá</span>
                <iconify-icon icon="heroicons:chevron-down" class="filter-arrow text-base text-gray-400 transition-transform duration-300"></iconify-icon>
            </button>
            <div class="filter-content mt-3 space-y-1">
                <?php 
                $gia_ranges = [
                    'under_300k' => 'Dưới 300.000đ',
                    '300k_700k' => '300k – 700k',
                    '700k_1500k' => '700k – 1.500k',
                    'over_1500k' => 'Trên 1.500.000đ'
                ];
                $currentGiaRange = $_GET['gia_range'] ?? '';
                foreach($gia_ranges as $val => $label): 
                ?>
                <label class="flex items-center gap-3 cursor-pointer group px-2 py-1.5 rounded-lg hover:bg-ivory-50 transition">
                    <input type="radio" name="gia_range" value="<?= $val ?>" class="w-4 h-4 accent-crimson-600" <?= $currentGiaRange === $val ? 'checked' : '' ?> onchange="document.getElementById('filter-form').submit()">
                    <span class="text-sm text-charcoal-700"><?= $label ?></span>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="p-5 border-t border-gray-100 lg:hidden">
        <button type="submit" class="w-full bg-crimson-600 text-white font-semibold py-3 rounded-xl hover:bg-crimson-700 transition shadow-lg shadow-crimson-200" onclick="closeMobileFilter()">Áp dụng bộ lọc</button>
    </div>
</form>
