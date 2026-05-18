<?php
// views/components/khuyen_mai/san_pham_giam_gia.php
$filters = [
    'Tất cả', 'Giảm dưới 10%', 'Giảm 10% - 20%', 'Giảm trên 20%', 'Dưới 500K', 'Theo mệnh Kim', 'Theo mệnh Mộc', 'Theo mệnh Thuỷ', 'Theo mệnh Hoả', 'Theo mệnh Thổ'
];

// Placeholder products
$discount_products = [
    [
        'id' => 1, 'name' => 'Vòng Ngọc Bích Bình An', 'stone' => 'Ngọc bích', 'element' => 'Mộc, Hỏa', 'rating' => 4.9, 'sold' => 128, 'price_old' => 850000, 'price_new' => 680000, 'discount' => 20, 'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg'
    ],
    [
        'id' => 2, 'name' => 'Vòng Tay Diệp Lục Đỉnh', 'stone' => 'Cẩm thạch', 'element' => 'Mộc', 'rating' => 4.8, 'sold' => 56, 'price_old' => 1200000, 'price_new' => 1080000, 'discount' => 10, 'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-1.jpg'
    ],
    [
        'id' => 3, 'name' => 'Chuỗi Hạt Gỗ Sưa Thơm Nhẹ', 'stone' => 'Gỗ sưa', 'element' => 'Thổ, Kim', 'rating' => 5.0, 'sold' => 210, 'price_old' => 550000, 'price_new' => 440000, 'discount' => 20, 'image' => APP_URL . '/public/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg'
    ],
    [
        'id' => 4, 'name' => 'Vòng Thạch Anh Tóc Vàng', 'stone' => 'Thạch anh', 'element' => 'Thổ, Kim', 'rating' => 4.7, 'sold' => 85, 'price_old' => 1500000, 'price_new' => 1125000, 'discount' => 25, 'image' => APP_URL . '/public/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-1.jpg', 'badge' => 'Sắp hết'
    ],
    [
        'id' => 5, 'name' => 'Ngọc Trúc Xanh Nhạt May Mắn', 'stone' => 'Ngọc trúc', 'element' => 'Mộc, Thuỷ', 'rating' => 4.9, 'sold' => 42, 'price_old' => 790000, 'price_new' => 711000, 'discount' => 10, 'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-2.jpg'
    ],
    [
        'id' => 6, 'name' => 'Chuỗi Đá Núi Lửa Obsidian', 'stone' => 'Đá núi lửa', 'element' => 'Thuỷ', 'rating' => 4.6, 'sold' => 19, 'price_old' => 450000, 'price_new' => 315000, 'discount' => 30, 'image' => APP_URL . '/public/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-2.jpg'
    ],
    [
        'id' => 7, 'name' => 'Vòng Huyết Long Đỏ Rực', 'stone' => 'Đá huyết long', 'element' => 'Hoả, Thổ', 'rating' => 4.8, 'sold' => 77, 'price_old' => 820000, 'price_new' => 697000, 'discount' => 15, 'image' => APP_URL . '/public/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-2.jpg'
    ],
    [
        'id' => 8, 'name' => 'Bộ Vòng Tứ Tượng Hộ Mệnh', 'stone' => 'Đá quý tổng hợp', 'element' => 'Tất cả', 'rating' => 5.0, 'sold' => 8, 'price_old' => 3200000, 'price_new' => 2560000, 'discount' => 20, 'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-2.jpg', 'badge' => 'Giới hạn'
    ],
];
?>
<section id="san-pham-sale">
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-6 gap-4">
        <div>
            <h2 class="font-semibold text-3xl text-gray-900 mb-2">Sản phẩm đang khuyến mãi</h2>
            <p class="text-gray-600">Những mẫu vòng ngọc và chuỗi đá đang có giá ưu đãi.</p>
        </div>
        
        <div class="flex items-center gap-2">
            <span class="text-sm text-gray-500 whitespace-nowrap">Sắp xếp:</span>
            <select class="border-gray-200 rounded-lg text-sm focus:border-[#8B0000] focus:ring-[#8B0000] bg-white py-2 pl-3 pr-8 shadow-sm">
                <option>Giảm nhiều nhất</option>
                <option>Giá thấp đến cao</option>
                <option>Giá cao đến thấp</option>
                <option>Bán chạy nhất</option>
                <option>Mới nhất</option>
                <option>Sắp hết ưu đãi</option>
            </select>
        </div>
    </div>

    <!-- Quick Filters -->
    <div class="flex flex-wrap gap-2 mb-8" id="quick-filters">
        <?php foreach($filters as $index => $filter): ?>
            <button data-filter="<?= htmlspecialchars($filter) ?>" class="filter-btn px-4 py-1.5 rounded-full text-sm font-medium transition-colors <?= $index === 0 ? 'active bg-[#8B0000] text-white border border-[#8B0000]' : 'bg-white text-gray-600 border border-gray-200 hover:border-[#8B0000] hover:text-[#8B0000]' ?>">
                <?= $filter ?>
            </button>
        <?php endforeach; ?>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6" id="product-grid">
        <?php foreach($discount_products as $p): ?>
        <div class="product-card bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 group border border-gray-100 flex flex-col h-full relative" 
             data-element="<?= htmlspecialchars(mb_strtolower($p['element'], 'UTF-8')) ?>" 
             data-discount="<?= $p['discount'] ?>" 
             data-price="<?= $p['price_new'] ?>">
            
            <!-- Badges -->
            <div class="absolute top-3 left-3 z-10 flex flex-col gap-1.5">
                <div class="bg-[#8B0000] text-white text-xs font-bold px-2 py-1 rounded-md shadow-sm">
                    -<?= $p['discount'] ?>%
                </div>
                <?php if(isset($p['badge'])): ?>
                <div class="bg-[#D4AF37] text-white text-[10px] uppercase font-bold px-2 py-0.5 rounded-md shadow-sm">
                    <?= $p['badge'] ?>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Wishlist Button -->
            <button class="absolute top-3 right-3 z-10 w-8 h-8 bg-white/80 backdrop-blur rounded-full flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-white transition-colors shadow-sm">
                <iconify-icon icon="mdi:heart-outline" class="text-lg"></iconify-icon>
            </button>

            <!-- Image -->
            <div class="relative aspect-square overflow-hidden bg-gray-50">
                <img src="<?= $p['image'] ?>" alt="<?= $p['name'] ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700 ease-out">
            </div>
            
            <!-- Content -->
            <div class="p-4 flex flex-col flex-1">
                <div class="text-xs text-gray-500 mb-1 line-clamp-1"><?= $p['stone'] ?> &bull; Hợp mệnh <?= $p['element'] ?></div>
                <h3 class="font-medium text-gray-900 mb-1 line-clamp-2 hover:text-[#8B0000] transition-colors">
                    <a href="<?= APP_URL ?>/chi-tiet-san-pham"><?= $p['name'] ?></a>
                </h3>
                
                <div class="flex items-center gap-1 text-xs text-gray-500 mb-3">
                    <div class="flex text-[#D4AF37]">
                        <iconify-icon icon="mdi:star"></iconify-icon>
                        <iconify-icon icon="mdi:star"></iconify-icon>
                        <iconify-icon icon="mdi:star"></iconify-icon>
                        <iconify-icon icon="mdi:star"></iconify-icon>
                        <iconify-icon icon="mdi:star-half"></iconify-icon>
                    </div>
                    <span class="font-medium text-gray-700"><?= $p['rating'] ?></span>
                    <span class="mx-1">&middot;</span>
                    <span>Đã bán <?= $p['sold'] ?></span>
                </div>
                
                <div class="mt-auto pt-2 flex flex-col gap-1">
                    <div class="flex items-end gap-2 flex-wrap">
                        <span class="text-lg font-bold text-[#8B0000]"><?= number_format($p['price_new'], 0, ',', '.') ?>đ</span>
                        <span class="text-sm text-gray-400 line-through mb-0.5"><?= number_format($p['price_old'], 0, ',', '.') ?>đ</span>
                    </div>
                </div>
                
                <!-- Add to cart -->
                <button class="w-full mt-4 py-2 border border-[#8B0000] text-[#8B0000] font-medium rounded-lg hover:bg-[#8B0000] hover:text-white transition-colors flex items-center justify-center gap-2 text-sm">
                    <iconify-icon icon="mdi:cart-plus"></iconify-icon> Thêm vào giỏ
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <div class="mt-10 flex justify-center">
        <button class="px-8 py-2.5 border border-gray-300 text-gray-600 font-medium rounded-full hover:border-[#8B0000] hover:text-[#8B0000] transition-colors">
            Xem thêm sản phẩm
        </button>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active state
            filterBtns.forEach(b => {
                b.classList.remove('active', 'bg-[#8B0000]', 'text-white', 'border-[#8B0000]');
                b.classList.add('bg-white', 'text-gray-600', 'border-gray-200');
            });
            this.classList.remove('bg-white', 'text-gray-600', 'border-gray-200');
            this.classList.add('active', 'bg-[#8B0000]', 'text-white', 'border-[#8B0000]');

            const filterValue = this.getAttribute('data-filter');

            productCards.forEach(card => {
                let show = false;
                const element = card.getAttribute('data-element') || '';
                const discount = parseInt(card.getAttribute('data-discount')) || 0;
                const price = parseInt(card.getAttribute('data-price')) || 0;

                if (filterValue === 'Tất cả') {
                    show = true;
                } else if (filterValue === 'Giảm dưới 10%') {
                    show = discount < 10;
                } else if (filterValue === 'Giảm 10% - 20%') {
                    show = discount >= 10 && discount <= 20;
                } else if (filterValue === 'Giảm trên 20%') {
                    show = discount > 20;
                } else if (filterValue === 'Dưới 500K') {
                    show = price < 500000;
                } else if (filterValue.startsWith('Theo mệnh')) {
                    const menh = filterValue.replace('Theo mệnh ', '').toLowerCase();
                    // "kim", "mộc", "thuỷ", "hoả", "thổ"
                    // Cần xử lý dấu tiếng việt nếu cần thiết, ở đây dùng includes() cơ bản
                    // Xử lý text data-element
                    const elStr = element.toLowerCase();
                    
                    // Simple map for Vietnamese accents
                    const mapMenh = {
                        'kim': 'kim',
                        'mộc': 'mộc',
                        'thuỷ': 'thuỷ', // or thủy
                        'thủy': 'thủy',
                        'hoả': 'hỏa', // or hỏa
                        'hỏa': 'hỏa',
                        'thổ': 'thổ'
                    };
                    
                    const searchTerm = mapMenh[menh] || menh;
                    
                    // Allow "tất cả" element to match anything
                    if (elStr.includes('tất cả') || elStr.includes(searchTerm) || 
                       (searchTerm === 'thuỷ' && elStr.includes('thủy')) ||
                       (searchTerm === 'hoả' && elStr.includes('hỏa'))) {
                        show = true;
                    }
                }

                if (show) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
});
</script>
