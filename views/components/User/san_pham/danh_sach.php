<!-- Danh sách sản phẩm dạng Grid -->
<div id="product-grid" class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-5">
    <?php foreach ($danh_sach_san_pham as $sp): ?>
    <?php
        // Xác định màu badge
        $badge_class = '';
        if (!empty($sp['nhan'])) {
            if ($sp['nhan'] === 'Bán chạy') $badge_class = 'bg-gradient-to-r from-crimson-500 to-rose-500 text-white';
            elseif ($sp['nhan'] === 'Mới') $badge_class = 'bg-gradient-to-r from-emerald-500 to-teal-500 text-white';
            elseif ($sp['nhan'] === 'Cao cấp') $badge_class = 'bg-gradient-to-r from-amber-500 to-yellow-500 text-white';
            elseif (str_starts_with($sp['nhan'], '-')) $badge_class = 'bg-gradient-to-r from-orange-500 to-red-500 text-white';
        }
        $het_hang = ($sp['tinh_trang'] ?? 'con_hang') === 'het_hang';
    ?>
    <div class="product-card group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:shadow-crimson-100/50 hover:-translate-y-1 transition-all duration-300">
        <!-- Ảnh sản phẩm -->
        <div class="relative overflow-hidden aspect-[4/5] bg-ivory-50 group/img">
            <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $sp['id'] ?>" class="block w-full h-full">
                <img src="<?= $sp['hinh_anh'] ?>" 
                     alt="<?= htmlspecialchars($sp['ten']) ?>" 
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out <?= $het_hang ? 'opacity-50 grayscale' : '' ?>"
                     loading="lazy">
            </a>
            
            <!-- Badge -->
            <?php if (!empty($sp['nhan'])): ?>
            <span class="absolute top-3 left-3 <?= $badge_class ?> text-[11px] font-bold px-3 py-1 rounded-full shadow-lg">
                <?= $sp['nhan'] ?>
            </span>
            <?php endif; ?>

            <?php if ($het_hang): ?>
            <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                <span class="bg-charcoal-800 text-white text-sm font-bold px-5 py-2 rounded-full">Hết hàng</span>
            </div>
            <?php endif; ?>

            <!-- Nút yêu thích -->
            <button class="absolute top-3 right-3 w-9 h-9 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-crimson-50 hover:text-crimson-600 transition-all opacity-0 group-hover:opacity-100 translate-y-2 group-hover:translate-y-0 duration-300">
                <iconify-icon icon="heroicons:heart" class="text-base"></iconify-icon>
            </button>

            <!-- Quick view overlay -->
            <div class="absolute inset-x-0 bottom-4 flex justify-center gap-2 opacity-0 group-hover:opacity-100 translate-y-4 group-hover:translate-y-0 transition-all duration-300 pointer-events-none z-10">
                <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $sp['id'] ?>" class="w-10 h-10 bg-white/95 backdrop-blur-sm text-charcoal-800 rounded-full flex items-center justify-center shadow-lg hover:bg-crimson-600 hover:text-white transition pointer-events-auto" title="Xem chi tiết">
                    <iconify-icon icon="heroicons:eye" class="text-xl"></iconify-icon>
                </a>
                <button class="w-10 h-10 bg-white/95 backdrop-blur-sm text-charcoal-800 rounded-full flex items-center justify-center shadow-lg hover:bg-crimson-600 hover:text-white transition pointer-events-auto" title="Thêm vào giỏ" <?= $het_hang ? 'disabled' : '' ?>>
                    <iconify-icon icon="heroicons:shopping-bag" class="text-xl"></iconify-icon>
                </button>
            </div>
        </div>

        <!-- Thông tin sản phẩm -->
        <div class="p-4">
            <!-- Tên sản phẩm -->
            <h3 class="text-sm font-semibold text-charcoal-800 line-clamp-2 min-h-[40px] group-hover:text-crimson-600 transition-colors leading-snug">
                <?= htmlspecialchars($sp['ten']) ?>
            </h3>

            <!-- Mô tả ngắn -->
            <p class="text-xs text-charcoal-400 mt-1 line-clamp-1"><?= htmlspecialchars($sp['mo_ta_ngan'] ?? '') ?></p>

            <!-- Đánh giá + đã bán -->
            <div class="flex items-center gap-2 mt-2.5">
                <div class="flex items-center gap-0.5">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                    <iconify-icon icon="heroicons:star-solid" class="text-sm <?= $i <= floor($sp['danh_gia']) ? 'text-amber-400' : 'text-gray-200' ?>"></iconify-icon>
                    <?php endfor; ?>
                    <span class="text-xs text-charcoal-500 ml-1"><?= $sp['danh_gia'] ?></span>
                </div>
                <span class="text-xs text-gray-300">|</span>
                <span class="text-xs text-charcoal-400">Đã bán <?= $sp['da_ban'] ?></span>
            </div>

            <!-- Giá -->
            <div class="flex items-end gap-2 mt-3">
                <span class="text-lg font-bold text-crimson-600"><?= number_format($sp['gia'], 0, ',', '.') ?>đ</span>
                <?php if (!empty($sp['gia_cu'])): ?>
                <span class="text-sm text-gray-400 line-through"><?= number_format($sp['gia_cu'], 0, ',', '.') ?>đ</span>
                <?php endif; ?>
            </div>

            <!-- Nút thêm vào giỏ -->
            <button class="mt-3 w-full flex items-center justify-center gap-2 py-2.5 rounded-xl text-sm font-semibold transition-all duration-300 <?= $het_hang ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : 'bg-crimson-50 text-crimson-600 hover:bg-crimson-600 hover:text-white hover:shadow-lg hover:shadow-crimson-200' ?>" <?= $het_hang ? 'disabled' : '' ?>>
                <iconify-icon icon="heroicons:shopping-bag" class="text-base"></iconify-icon>
                <?= $het_hang ? 'Hết hàng' : 'Thêm vào giỏ' ?>
            </button>
        </div>
    </div>
    <?php endforeach; ?>
</div>
