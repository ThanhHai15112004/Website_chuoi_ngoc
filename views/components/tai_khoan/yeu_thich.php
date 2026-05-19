<?php
// Mock data cho danh sách sản phẩm yêu thích
$favorite_products = [
    [
        'id' => 1,
        'name' => 'Vòng Trầm Hương Sánh Chìm',
        'image' => APP_URL . '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg',
        'price' => 2975000,
        'old_price' => 3500000,
        'sale_percent' => 15,
        'bestseller' => true,
        'in_stock' => true,
        'attributes' => ['12mm', 'Trầm tự nhiên']
    ],
    [
        'id' => 2,
        'name' => 'Vòng Ngọc Hồng Anh Đào Ngọc Nương Tử',
        'image' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg',
        'price' => 1850000,
        'old_price' => null,
        'sale_percent' => null,
        'bestseller' => false,
        'in_stock' => true,
        'attributes' => ['10mm', 'Ngọc Hồng Anh Đào']
    ],
    [
        'id' => 3,
        'name' => 'Chuỗi Ngọc Mực Dục A Mix Lu Thống Bình An',
        'image' => APP_URL . '/images/Sản phẩm/Tràng Hạt/Chuỗi Ngọc Mực Dục A. Mix Lu Thống bình an Ngọc Bích/chuoi-ngoc-muc-duc-1.jpg',
        'price' => 4200000,
        'old_price' => 4500000,
        'sale_percent' => null,
        'bestseller' => true,
        'in_stock' => false,
        'attributes' => ['Lu thống', 'Ngọc Bích']
    ],
    [
        'id' => 4,
        'name' => 'Vòng Ngọc Tụ Nham Liu Ninh',
        'image' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Liu Ninh/ngoc-tu-nham-liu-ninh-1.jpg',
        'price' => 5500000,
        'old_price' => 6000000,
        'sale_percent' => null,
        'bestseller' => false,
        'in_stock' => true,
        'attributes' => ['8mm', 'Ngọc Tụ Nham']
    ],
    [
        'id' => 5,
        'name' => 'Vòng Thời Trang Xinh Yêu',
        'image' => APP_URL . '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-1.jpg',
        'price' => 850000,
        'old_price' => null,
        'sale_percent' => null,
        'bestseller' => false,
        'in_stock' => true,
        'attributes' => ['Thời trang', 'Đá phối']
    ]
];
?>

<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-1">Sản phẩm <span style="color: #8b0000;">yêu thích</span></h2>
            <p class="text-sm text-gray-500">Bạn đang có <span class="font-bold text-[#8b0000]"><?= count($favorite_products) ?></span> sản phẩm trong danh sách</p>
        </div>
        
        <!-- Bulk Actions -->
        <div class="flex flex-wrap items-center gap-3">
            <label class="flex items-center gap-2 cursor-pointer group">
                <input type="checkbox" id="selectAllFav" class="w-5 h-5 rounded border-gray-300 text-[#8b0000] focus:ring-[#8b0000] cursor-pointer transition-all shadow-sm">
                <span class="text-sm font-medium text-gray-700 group-hover:text-[#8b0000] transition-colors">Chọn tất cả</span>
            </label>
            <div class="hidden sm:block h-6 w-px bg-gray-200"></div>
            <button class="text-sm font-medium text-gray-500 hover:text-red-600 transition-colors flex items-center gap-1.5 px-3 py-1.5 rounded-lg hover:bg-red-50">
                <iconify-icon icon="ph:trash-bold"></iconify-icon>
                Bỏ chọn
            </button>
            <button class="text-sm font-medium text-white transition-colors flex items-center gap-1.5 px-4 py-2 rounded-lg shadow-sm" style="background: #8b0000;" onmouseover="this.style.background='#a01010'" onmouseout="this.style.background='#8b0000'">
                <iconify-icon icon="ph:shopping-cart-bold"></iconify-icon>
                Thêm tất cả vào giỏ
            </button>
        </div>
    </div>

    <?php if (empty($favorite_products)): ?>
    <div class="flex flex-col items-center justify-center py-16 text-center">
        <div class="w-24 h-24 mb-6 rounded-full bg-red-50 flex items-center justify-center text-[#8b0000]">
            <iconify-icon icon="ph:heart-break-bold" class="text-5xl"></iconify-icon>
        </div>
        <h3 class="text-lg font-bold text-gray-900 mb-2">Danh sách yêu thích trống</h3>
        <p class="text-gray-500 mb-6 max-w-sm mx-auto">Bạn chưa lưu sản phẩm nào. Hãy khám phá thêm các bộ sưu tập của chúng tôi.</p>
        <a href="<?= APP_URL ?>/san-pham" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white transition-colors" style="background: #8b0000;" onmouseover="this.style.background='#a01010'" onmouseout="this.style.background='#8b0000'">
            Khám phá ngay
        </a>
    </div>
    <?php else: ?>

    <!-- Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
        <?php foreach ($favorite_products as $product): ?>
        <!-- Product Item -->
        <div class="group relative flex flex-col bg-white rounded-2xl border border-gray-100 hover:border-red-200 hover:shadow-xl transition-all duration-300 overflow-hidden">
            <!-- Badges -->
            <div class="absolute top-3 left-3 z-10 flex flex-col gap-2">
                <?php if ($product['sale_percent']): ?>
                <span class="px-2.5 py-1 bg-red-500 text-white text-[10px] font-bold uppercase tracking-wider rounded-lg shadow-sm w-fit">
                    -<?= $product['sale_percent'] ?>%
                </span>
                <?php endif; ?>
                <?php if ($product['bestseller']): ?>
                <span class="px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider rounded-lg shadow-sm flex items-center gap-1 w-fit" style="background: linear-gradient(135deg, #d4af37, #f1c40f); color: #fff;">
                    <iconify-icon icon="ph:star-fill"></iconify-icon> Bestseller
                </span>
                <?php endif; ?>
            </div>

            <!-- Checkbox & Actions (Top Right) -->
            <div class="absolute top-3 right-3 z-20 flex flex-col gap-2 items-end">
                 <!-- Select Checkbox -->
                 <label class="cursor-pointer flex items-center justify-center transition-all">
                     <input type="checkbox" class="fav-checkbox w-5 h-5 rounded border-gray-900 bg-white text-[#8b0000] focus:ring-[#8b0000] cursor-pointer shadow-sm">
                 </label>
                 
                 <!-- Remove Button (Shows on Hover) -->
                 <button class="w-8 h-8 bg-white/90 backdrop-blur text-red-500 hover:text-white hover:bg-red-500 rounded-full flex items-center justify-center shadow-sm transition-all opacity-0 group-hover:opacity-100 translate-x-4 group-hover:translate-x-0" title="Xóa khỏi danh sách">
                    <iconify-icon icon="ph:trash-bold" class="text-lg"></iconify-icon>
                </button>
            </div>
            
            <!-- Image Area -->
            <a href="<?= APP_URL ?>/san-pham/chi-tiet" class="relative aspect-[4/3] overflow-hidden bg-gray-50 block">
                <!-- Sử dụng fallback image nếu không tìm thấy, thực tế sẽ là $product['image'] -->
                <div class="w-full h-full flex items-center justify-center bg-gray-100 group-hover:scale-105 transition-transform duration-500">
                    <img src="<?= $product['image'] ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="w-full h-full object-cover" onerror="this.onerror=null; this.src='<?= APP_URL ?>/images/vong-tram-huong-1.jpg';">
                </div>
                <?php if (!$product['in_stock']): ?>
                <!-- Out of stock overlay -->
                <div class="absolute inset-0 bg-white/50 backdrop-blur-[2px] flex items-center justify-center">
                    <span class="px-4 py-2 bg-gray-900 text-white text-xs font-bold uppercase tracking-widest rounded-lg shadow-lg">Hết hàng</span>
                </div>
                <?php endif; ?>
            </a>

            <!-- Content Area -->
            <div class="p-5 flex flex-col flex-1">
                <!-- Title -->
                <a href="<?= APP_URL ?>/san-pham/chi-tiet" class="text-[15px] font-bold text-gray-900 hover:text-[#8b0000] transition-colors line-clamp-2 mb-3" style="min-height: 45px;">
                    <?= htmlspecialchars($product['name']) ?>
                </a>
                
                <!-- Attributes -->
                <div class="flex flex-wrap gap-1.5 mb-4">
                    <?php foreach($product['attributes'] as $attr): ?>
                    <span class="inline-flex items-center gap-1 text-xs font-medium text-gray-600 bg-gray-100 px-2.5 py-1 rounded-md">
                        <?= htmlspecialchars($attr) ?>
                    </span>
                    <?php endforeach; ?>
                    <?php if ($product['in_stock']): ?>
                    <span class="inline-flex items-center gap-1 text-xs font-medium text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-md border border-emerald-100">
                        <iconify-icon icon="ph:check-circle-fill"></iconify-icon> Còn hàng
                    </span>
                    <?php else: ?>
                    <span class="inline-flex items-center gap-1 text-xs font-medium text-red-700 bg-red-50 px-2.5 py-1 rounded-md border border-red-100">
                        <iconify-icon icon="ph:x-circle-fill"></iconify-icon> Hết hàng
                    </span>
                    <?php endif; ?>
                </div>

                <!-- Price -->
                <div class="mt-auto flex items-end justify-between mb-4">
                    <div>
                        <?php if ($product['old_price']): ?>
                        <div class="text-xs text-gray-400 line-through mb-0.5"><?= number_format($product['old_price'], 0, ',', '.') ?>đ</div>
                        <?php endif; ?>
                        <div class="text-lg font-bold text-[#8b0000]"><?= number_format($product['price'], 0, ',', '.') ?>đ</div>
                    </div>
                </div>

                <!-- Add to cart -->
                <button <?= !$product['in_stock'] ? 'disabled' : '' ?> class="w-full py-2.5 px-4 rounded-xl font-semibold text-sm transition-colors flex items-center justify-center gap-2 group/btn <?= $product['in_stock'] ? 'text-[#8b0000] border-2 border-[#8b0000] hover:bg-[#8b0000] hover:text-white' : 'text-gray-400 border-2 border-gray-200 bg-gray-50 cursor-not-allowed' ?>">
                    <iconify-icon icon="ph:shopping-cart-bold" class="text-lg <?= $product['in_stock'] ? 'group-hover/btn:animate-bounce-slow' : '' ?>"></iconify-icon>
                    <?= $product['in_stock'] ? 'Thêm vào giỏ' : 'Tạm hết hàng' ?>
                </button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Paginator -->
    <div class="mt-10 flex justify-center">
        <nav class="flex items-center gap-1">
            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-500 hover:bg-red-50 hover:text-[#8b0000] hover:border-red-200 transition-all">
                <iconify-icon icon="ph:caret-left-bold"></iconify-icon>
            </a>
            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#8b0000] text-white font-medium shadow-sm transition-all">
                1
            </a>
            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-700 hover:bg-red-50 hover:text-[#8b0000] hover:border-red-200 font-medium transition-all">
                2
            </a>
            <a href="#" class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-500 hover:bg-red-50 hover:text-[#8b0000] hover:border-red-200 transition-all">
                <iconify-icon icon="ph:caret-right-bold"></iconify-icon>
            </a>
        </nav>
    </div>
    
    <?php endif; ?>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllBtn = document.getElementById('selectAllFav');
    const favCheckboxes = document.querySelectorAll('.fav-checkbox');
    
    if(selectAllBtn) {
        selectAllBtn.addEventListener('change', function() {
            favCheckboxes.forEach(cb => {
                cb.checked = this.checked;
            });
        });
    }
    
    // Update select all when individual checkbox changes
    favCheckboxes.forEach(cb => {
        cb.addEventListener('change', function() {
            if(selectAllBtn) {
                const allChecked = Array.from(favCheckboxes).every(c => c.checked);
                const someChecked = Array.from(favCheckboxes).some(c => c.checked);
                selectAllBtn.checked = allChecked;
                selectAllBtn.indeterminate = someChecked && !allChecked;
            }
        });
    });
});
</script>

<style>
@keyframes bounce-slow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-20%); }
}
.animate-bounce-slow {
    animation: bounce-slow 1s infinite;
}
</style>
