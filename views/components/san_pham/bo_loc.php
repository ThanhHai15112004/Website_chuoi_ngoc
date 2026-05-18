<!-- Sidebar bộ lọc sản phẩm -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="bg-gradient-to-r from-crimson-600 to-crimson-700 px-5 py-4">
        <div class="flex items-center justify-between">
            <h3 class="text-white font-semibold flex items-center gap-2">
                <iconify-icon icon="heroicons:funnel" class="text-xl"></iconify-icon>
                Bộ lọc sản phẩm
            </h3>
            <button class="text-crimson-200 hover:text-white text-xs font-medium transition">Đặt lại</button>
        </div>
    </div>
    <div class="p-5 space-y-5">
        <!-- Danh mục -->
        <div class="filter-group">
            <button class="filter-toggle w-full flex items-center justify-between text-sm font-semibold text-charcoal-800" onclick="toggleFilter(this)">
                <span class="flex items-center gap-2"><iconify-icon icon="mdi:format-list-bulleted" class="text-crimson-500 text-lg"></iconify-icon>Danh mục</span>
                <iconify-icon icon="heroicons:chevron-down" class="filter-arrow text-base text-gray-400 transition-transform duration-300"></iconify-icon>
            </button>
            <div class="filter-content mt-3 space-y-1">
                <?php $danh_muc_list = [['Vòng ngọc','48'],['Tràng hạt','32'],['Trầm hương & Nhang','25'],['Bột xông nhà','15']]; ?>
                <?php foreach($danh_muc_list as $i => $dm): ?>
                <label class="flex items-center gap-3 cursor-pointer group px-2 py-1.5 rounded-lg hover:bg-ivory-50 transition">
                    <input type="checkbox" class="w-4 h-4 accent-crimson-600 rounded" <?= $i===0?'checked':'' ?>>
                    <span class="text-sm text-charcoal-700"><?= $dm[0] ?></span>
                    <span class="ml-auto text-xs text-gray-400">(<?= $dm[1] ?>)</span>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
        <hr class="border-gray-100">
        <!-- Mệnh -->
        <div class="filter-group">
            <button class="filter-toggle w-full flex items-center justify-between text-sm font-semibold text-charcoal-800" onclick="toggleFilter(this)">
                <span class="flex items-center gap-2"><iconify-icon icon="mdi:yin-yang" class="text-gold-500 text-lg"></iconify-icon>Mệnh phong thủy</span>
                <iconify-icon icon="heroicons:chevron-down" class="filter-arrow text-base text-gray-400 transition-transform duration-300"></iconify-icon>
            </button>
            <div class="filter-content mt-3 flex flex-wrap gap-2">
                <button class="px-4 py-2 flex items-center gap-1.5 text-xs font-medium rounded-full border-2 border-green-200 text-green-700 bg-green-50 hover:bg-green-100 transition-all"><iconify-icon icon="mdi:leaf" class="text-sm"></iconify-icon> Mộc</button>
                <button class="px-4 py-2 flex items-center gap-1.5 text-xs font-medium rounded-full border-2 border-red-200 text-red-700 bg-red-50 hover:bg-red-100 transition-all"><iconify-icon icon="mdi:fire" class="text-sm"></iconify-icon> Hỏa</button>
                <button class="px-4 py-2 flex items-center gap-1.5 text-xs font-medium rounded-full border-2 border-amber-200 text-amber-700 bg-amber-50 hover:bg-amber-100 transition-all"><iconify-icon icon="mdi:terrain" class="text-sm"></iconify-icon> Thổ</button>
                <button class="px-4 py-2 flex items-center gap-1.5 text-xs font-medium rounded-full border-2 border-yellow-200 text-yellow-700 bg-yellow-50 hover:bg-yellow-100 transition-all"><iconify-icon icon="mdi:sword-cross" class="text-sm"></iconify-icon> Kim</button>
                <button class="px-4 py-2 flex items-center gap-1.5 text-xs font-medium rounded-full border-2 border-blue-200 text-blue-700 bg-blue-50 hover:bg-blue-100 transition-all"><iconify-icon icon="mdi:water-drop" class="text-sm"></iconify-icon> Thủy</button>
            </div>
        </div>
        <hr class="border-gray-100">
        <!-- Loại đá -->
        <div class="filter-group">
            <button class="filter-toggle w-full flex items-center justify-between text-sm font-semibold text-charcoal-800" onclick="toggleFilter(this)">
                <span class="flex items-center gap-2"><iconify-icon icon="mdi:diamond-stone" class="text-emerald-500 text-lg"></iconify-icon>Loại đá</span>
                <iconify-icon icon="heroicons:chevron-down" class="filter-arrow text-base text-gray-400 transition-transform duration-300"></iconify-icon>
            </button>
            <div class="filter-content mt-3 space-y-1">
                <?php foreach(['Ngọc bích','Thạch anh','Mã não','Trầm hương'] as $da): ?>
                <label class="flex items-center gap-3 cursor-pointer group px-2 py-1.5 rounded-lg hover:bg-ivory-50 transition">
                    <input type="checkbox" class="w-4 h-4 accent-crimson-600 rounded">
                    <span class="text-sm text-charcoal-700"><?= $da ?></span>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
        <hr class="border-gray-100">
        <!-- Khoảng giá -->
        <div class="filter-group">
            <button class="filter-toggle w-full flex items-center justify-between text-sm font-semibold text-charcoal-800" onclick="toggleFilter(this)">
                <span class="flex items-center gap-2"><iconify-icon icon="mdi:cash-multiple" class="text-violet-500 text-lg"></iconify-icon>Khoảng giá</span>
                <iconify-icon icon="heroicons:chevron-down" class="filter-arrow text-base text-gray-400 transition-transform duration-300"></iconify-icon>
            </button>
            <div class="filter-content mt-3 space-y-1">
                <?php foreach(['Dưới 300.000đ','300k – 700k','700k – 1.500k','Trên 1.500.000đ'] as $gia_range): ?>
                <label class="flex items-center gap-3 cursor-pointer group px-2 py-1.5 rounded-lg hover:bg-ivory-50 transition">
                    <input type="radio" name="gia" class="w-4 h-4 accent-crimson-600">
                    <span class="text-sm text-charcoal-700"><?= $gia_range ?></span>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
        <hr class="border-gray-100">
        <!-- Nhu cầu -->
        <div class="filter-group">
            <button class="filter-toggle w-full flex items-center justify-between text-sm font-semibold text-charcoal-800" onclick="toggleFilter(this)">
                <span class="flex items-center gap-2"><iconify-icon icon="mdi:heart-outline" class="text-rose-500 text-lg"></iconify-icon>Nhu cầu</span>
                <iconify-icon icon="heroicons:chevron-down" class="filter-arrow text-base text-gray-400 transition-transform duration-300"></iconify-icon>
            </button>
            <div class="filter-content mt-3 space-y-1">
                <?php 
                $nhu_cau_list = [
                    ['icon' => 'mdi:bamboo', 'text' => 'Cầu tài lộc', 'color' => 'text-green-600'],
                    ['icon' => 'mdi:dove', 'text' => 'Cầu bình an', 'color' => 'text-blue-400'],
                    ['icon' => 'mdi:heart', 'text' => 'Cầu tình duyên', 'color' => 'text-rose-500'],
                    ['icon' => 'mdi:clover', 'text' => 'Cầu may mắn', 'color' => 'text-emerald-500'],
                    ['icon' => 'mdi:briefcase', 'text' => 'Hỗ trợ công việc', 'color' => 'text-amber-700'],
                    ['icon' => 'mdi:gift', 'text' => 'Quà tặng', 'color' => 'text-crimson-500']
                ];
                foreach($nhu_cau_list as $nc): ?>
                <label class="flex items-center gap-3 cursor-pointer group px-2 py-1.5 rounded-lg hover:bg-ivory-50 transition">
                    <input type="checkbox" class="w-4 h-4 accent-crimson-600 rounded">
                    <span class="text-sm text-charcoal-700 flex items-center gap-2">
                        <iconify-icon icon="<?= $nc['icon'] ?>" class="text-lg <?= $nc['color'] ?>"></iconify-icon>
                        <?= $nc['text'] ?>
                    </span>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="p-5 border-t border-gray-100 lg:hidden">
        <button class="w-full bg-crimson-600 text-white font-semibold py-3 rounded-xl hover:bg-crimson-700 transition shadow-lg shadow-crimson-200" onclick="closeMobileFilter()">Áp dụng bộ lọc</button>
    </div>
</div>
