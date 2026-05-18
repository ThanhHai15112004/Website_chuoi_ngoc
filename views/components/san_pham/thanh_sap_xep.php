<!-- Thanh sắp xếp + điều khiển -->
<div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-6">
    <div class="flex items-center gap-3">
        <!-- Nút mở bộ lọc mobile -->
        <button id="btn-open-filter" class="lg:hidden flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-200 rounded-xl text-sm font-medium text-charcoal-700 hover:border-crimson-300 hover:text-crimson-600 transition shadow-sm">
            <iconify-icon icon="heroicons:funnel" class="text-base"></iconify-icon>
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
            <iconify-icon icon="heroicons:chevron-down" class="absolute right-3 top-1/2 -translate-y-1/2 text-base text-gray-400 pointer-events-none"></iconify-icon>
        </div>

        <!-- View mode toggle -->
        <div class="hidden sm:flex items-center bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
            <button class="grid-view-btn p-2.5 text-crimson-600 bg-crimson-50" title="Dạng lưới">
                <iconify-icon icon="heroicons:squares-2x2" class="text-base"></iconify-icon>
            </button>
            <button class="list-view-btn p-2.5 text-gray-400 hover:text-crimson-600" title="Dạng danh sách">
                <iconify-icon icon="heroicons:bars-4" class="text-base"></iconify-icon>
            </button>
        </div>
    </div>
</div>
