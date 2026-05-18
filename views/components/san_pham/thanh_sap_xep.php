<!-- Thanh sắp xếp + điều khiển -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
    <div class="flex items-center gap-3">
        <!-- Nút mở bộ lọc mobile -->
        <button id="btn-open-filter" class="lg:hidden flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-medium text-charcoal-700 hover:border-crimson-300 hover:text-crimson-600 transition shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/></svg>
            Bộ lọc
        </button>
        <p class="text-sm text-charcoal-500">
            Hiển thị <span class="font-semibold text-charcoal-800"><?= count($danh_sach_san_pham) ?></span> / <span class="font-semibold text-crimson-600"><?= $tong_san_pham ?></span> sản phẩm
        </p>
    </div>

    <div class="flex items-center gap-3">
        <!-- Sắp xếp -->
        <div class="relative">
            <select class="appearance-none bg-white border border-gray-200 rounded-xl text-sm text-charcoal-700 pl-4 pr-10 py-2.5 focus:outline-none focus:border-crimson-400 focus:ring-1 focus:ring-crimson-400 transition shadow-sm cursor-pointer">
                <option>Mới nhất</option>
                <option>Giá: Thấp → Cao</option>
                <option>Giá: Cao → Thấp</option>
                <option>Bán chạy nhất</option>
                <option>Đánh giá cao</option>
            </select>
            <svg class="absolute right-3 top-1/2 -translate-y-1/2 h-4 w-4 text-gray-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
        </div>

        <!-- View mode toggle -->
        <div class="hidden sm:flex items-center bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
            <button class="grid-view-btn p-2.5 text-crimson-600 bg-crimson-50" title="Dạng lưới">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
            </button>
            <button class="list-view-btn p-2.5 text-gray-400 hover:text-crimson-600" title="Dạng danh sách">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
            </button>
        </div>
    </div>
</div>
