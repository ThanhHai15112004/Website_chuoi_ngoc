<!-- Sidebar bộ lọc sản phẩm -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="bg-gradient-to-r from-crimson-600 to-crimson-700 px-5 py-4">
        <div class="flex items-center justify-between">
            <h3 class="text-white font-semibold flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
                Bộ lọc sản phẩm
            </h3>
            <button class="text-crimson-200 hover:text-white text-xs font-medium transition">Đặt lại</button>
        </div>
    </div>
    <div class="p-5 space-y-5">
        <!-- Danh mục -->
        <div class="filter-group">
            <button class="filter-toggle w-full flex items-center justify-between text-sm font-semibold text-charcoal-800" onclick="toggleFilter(this)">
                <span class="flex items-center gap-2"><span class="w-2 h-2 bg-crimson-500 rounded-full"></span>Danh mục</span>
                <svg class="filter-arrow h-4 w-4 text-gray-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
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
                <span class="flex items-center gap-2"><span class="w-2 h-2 bg-gold-500 rounded-full"></span>Mệnh phong thủy</span>
                <svg class="filter-arrow h-4 w-4 text-gray-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="filter-content mt-3 flex flex-wrap gap-2">
                <button class="px-4 py-2 text-xs font-medium rounded-full border-2 border-green-200 text-green-700 bg-green-50 hover:bg-green-100 transition-all">🌿 Mộc</button>
                <button class="px-4 py-2 text-xs font-medium rounded-full border-2 border-red-200 text-red-700 bg-red-50 hover:bg-red-100 transition-all">🔥 Hỏa</button>
                <button class="px-4 py-2 text-xs font-medium rounded-full border-2 border-amber-200 text-amber-700 bg-amber-50 hover:bg-amber-100 transition-all">🏔️ Thổ</button>
                <button class="px-4 py-2 text-xs font-medium rounded-full border-2 border-yellow-200 text-yellow-700 bg-yellow-50 hover:bg-yellow-100 transition-all">⚔️ Kim</button>
                <button class="px-4 py-2 text-xs font-medium rounded-full border-2 border-blue-200 text-blue-700 bg-blue-50 hover:bg-blue-100 transition-all">💧 Thủy</button>
            </div>
        </div>
        <hr class="border-gray-100">
        <!-- Loại đá -->
        <div class="filter-group">
            <button class="filter-toggle w-full flex items-center justify-between text-sm font-semibold text-charcoal-800" onclick="toggleFilter(this)">
                <span class="flex items-center gap-2"><span class="w-2 h-2 bg-emerald-500 rounded-full"></span>Loại đá</span>
                <svg class="filter-arrow h-4 w-4 text-gray-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
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
                <span class="flex items-center gap-2"><span class="w-2 h-2 bg-violet-500 rounded-full"></span>Khoảng giá</span>
                <svg class="filter-arrow h-4 w-4 text-gray-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
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
                <span class="flex items-center gap-2"><span class="w-2 h-2 bg-rose-500 rounded-full"></span>Nhu cầu</span>
                <svg class="filter-arrow h-4 w-4 text-gray-400 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="filter-content mt-3 space-y-1">
                <?php foreach(['🎋 Cầu tài lộc','🕊️ Cầu bình an','❤️ Cầu tình duyên','🍀 Cầu may mắn','💼 Hỗ trợ công việc','🎁 Quà tặng'] as $nc): ?>
                <label class="flex items-center gap-3 cursor-pointer group px-2 py-1.5 rounded-lg hover:bg-ivory-50 transition">
                    <input type="checkbox" class="w-4 h-4 accent-crimson-600 rounded">
                    <span class="text-sm text-charcoal-700"><?= $nc ?></span>
                </label>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="p-5 border-t border-gray-100 lg:hidden">
        <button class="w-full bg-crimson-600 text-white font-semibold py-3 rounded-xl hover:bg-crimson-700 transition shadow-lg shadow-crimson-200" onclick="closeMobileFilter()">Áp dụng bộ lọc</button>
    </div>
</div>
