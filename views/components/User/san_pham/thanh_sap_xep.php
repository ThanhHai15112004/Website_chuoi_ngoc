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
            <select class="appearance-none bg-white border border-gray-200 rounded-xl text-sm text-charcoal-700 pl-4 pr-10 py-2.5 focus:outline-none focus:border-crimson-400 focus:ring-1 focus:ring-crimson-400 transition shadow-sm cursor-pointer" 
                    onchange="document.getElementById('hidden_sap_xep').value = this.value; document.getElementById('filter-form').submit();">
                <?php
                $sortOptions = [
                    '' => 'Đề xuất (Thông minh)',
                    'moi_nhat' => 'Mới nhất',
                    'gia_tang' => 'Giá: Thấp → Cao',
                    'gia_giam' => 'Giá: Cao → Thấp',
                    'ban_chay' => 'Bán chạy nhất',
                    'khuyen_mai' => 'Đang khuyến mãi'
                ];
                $currentSort = $_GET['sap_xep'] ?? '';
                foreach ($sortOptions as $val => $label):
                ?>
                <option value="<?= $val ?>" <?= $currentSort === $val ? 'selected' : '' ?>><?= $label ?></option>
                <?php endforeach; ?>
            </select>
            <iconify-icon icon="heroicons:chevron-down" class="absolute right-3 top-1/2 -translate-y-1/2 text-base text-gray-400 pointer-events-none"></iconify-icon>
        </div>

        <!-- View mode toggle -->
        <div class="hidden sm:flex items-center bg-white border border-gray-200 rounded-xl overflow-hidden shadow-sm">
            <button id="grid-view-btn" class="p-2.5 text-crimson-600 bg-crimson-50 transition-colors" title="Dạng lưới">
                <iconify-icon icon="heroicons:squares-2x2" class="text-base"></iconify-icon>
            </button>
            <button id="list-view-btn" class="p-2.5 text-gray-400 hover:text-crimson-600 transition-colors" title="Dạng danh sách">
                <iconify-icon icon="heroicons:bars-4" class="text-base"></iconify-icon>
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const gridBtn = document.getElementById('grid-view-btn');
    const listBtn = document.getElementById('list-view-btn');
    const productGrid = document.getElementById('product-grid');
    
    if (!gridBtn || !listBtn || !productGrid) return;

    function setViewMode(mode) {
        if (mode === 'list') {
            productGrid.classList.add('list-mode');
            
            // Cập nhật giao diện nút
            listBtn.classList.replace('text-gray-400', 'text-crimson-600');
            listBtn.classList.add('bg-crimson-50');
            
            gridBtn.classList.replace('text-crimson-600', 'text-gray-400');
            gridBtn.classList.remove('bg-crimson-50');
            
            localStorage.setItem('product_view_mode', 'list');
        } else {
            productGrid.classList.remove('list-mode');
            
            // Cập nhật giao diện nút
            gridBtn.classList.replace('text-gray-400', 'text-crimson-600');
            gridBtn.classList.add('bg-crimson-50');
            
            listBtn.classList.replace('text-crimson-600', 'text-gray-400');
            listBtn.classList.remove('bg-crimson-50');
            
            localStorage.setItem('product_view_mode', 'grid');
        }
    }

    // Lấy chế độ đã lưu, mặc định là grid
    const currentMode = localStorage.getItem('product_view_mode') || 'grid';
    setViewMode(currentMode);

    gridBtn.addEventListener('click', () => setViewMode('grid'));
    listBtn.addEventListener('click', () => setViewMode('list'));
});
</script>
