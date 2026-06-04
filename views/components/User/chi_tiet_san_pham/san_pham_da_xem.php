<?php
/**
 * Component: Sản phẩm đã xem
 */
?>

<div class="mt-8 border-t border-gray-100 pt-16">
    <div class="flex justify-between items-end mb-8 pb-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">
                Sản Phẩm Bạn Vừa Xem
            </h2>
            <p class="text-sm text-gray-500 mt-1">Lịch sử duyệt sản phẩm gần đây của bạn</p>
        </div>
        <div class="flex items-center gap-4">
            <!-- Navigation buttons for Swiper -->
            <div class="hidden md:flex gap-2">
                <button class="viewed-swiper-prev w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:border-crimson-600 hover:bg-crimson-50 hover:text-crimson-600 transition-all">
                    <iconify-icon icon="heroicons:arrow-left" class="text-lg"></iconify-icon>
                </button>
                <button class="viewed-swiper-next w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-600 hover:border-crimson-600 hover:bg-crimson-50 hover:text-crimson-600 transition-all">
                    <iconify-icon icon="heroicons:arrow-right" class="text-lg"></iconify-icon>
                </button>
            </div>
        </div>
    </div>

    <!-- Swiper Container -->
    <div class="swiper viewed-products-swiper -mx-4 px-4 sm:mx-0 sm:px-0 py-4">
        <div class="swiper-wrapper">
            <?php foreach ($san_pham_da_xem as $sp): ?>
                <?php
                    // Xác định màu badge
                    $badge_class = '';
                    if (!empty($sp['nhan'])) {
                        if ($sp['nhan'] === 'Bán chạy') $badge_class = 'bg-gradient-to-r from-crimson-500 to-rose-500 text-white';
                        elseif ($sp['nhan'] === 'Mới') $badge_class = 'bg-gradient-to-r from-emerald-500 to-teal-500 text-white';
                        elseif ($sp['nhan'] === 'Cao cấp') $badge_class = 'bg-gradient-to-r from-amber-500 to-yellow-500 text-white';
                        elseif (str_starts_with($sp['nhan'], '-')) $badge_class = 'bg-gradient-to-r from-orange-500 to-red-500 text-white';
                        else $badge_class = 'bg-crimson-600 text-white';
                    }
                ?>
                <div class="swiper-slide h-auto">
                    <div class="product-card group h-full bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:shadow-crimson-100/50 hover:-translate-y-1 transition-all duration-300 flex flex-col">
                        
                        <!-- Ảnh sản phẩm -->
                        <div class="relative overflow-hidden aspect-square bg-ivory-50 group/img shrink-0">
                            <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $sp['id'] ?>" class="block w-full h-full">
                                <img src="<?= $sp['hinh_anh'] ?>" 
                                     alt="<?= htmlspecialchars($sp['ten']) ?>" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                                     loading="lazy">
                            </a>
                            
                            <!-- Badge -->
                            <?php if (!empty($sp['nhan'])): ?>
                            <span class="absolute top-3 left-3 <?= $badge_class ?> text-[11px] font-bold px-3 py-1 rounded-full shadow-lg">
                                <?= $sp['nhan'] ?>
                            </span>
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
                                <button class="w-10 h-10 bg-white/95 backdrop-blur-sm text-charcoal-800 rounded-full flex items-center justify-center shadow-lg hover:bg-crimson-600 hover:text-white transition pointer-events-auto" title="Thêm vào giỏ" data-add-cart="<?= $sp['id'] ?>">
                                    <iconify-icon icon="heroicons:shopping-bag" class="text-xl"></iconify-icon>
                                </button>
                            </div>
                        </div>

                        <!-- Thông tin sản phẩm -->
                        <div class="p-4 flex flex-col flex-grow">
                            <!-- Tên sản phẩm -->
                            <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $sp['id'] ?>" class="block mt-1">
                                <h3 class="text-[15px] font-semibold text-gray-800 line-clamp-2 hover:text-crimson-600 transition-colors h-11">
                                    <?= htmlspecialchars($sp['ten']) ?>
                                </h3>
                            </a>
                            
                            <div class="flex items-center gap-2 mt-2">
                                <div class="flex items-center text-amber-400 gap-0.5">
                                    <iconify-icon icon="heroicons:star-solid" class="text-sm"></iconify-icon>
                                    <span class="text-xs font-medium text-gray-600 ml-0.5"><?= number_format($sp['danh_gia'], 1) ?></span>
                                </div>
                                <span class="text-gray-300 text-xs">|</span>
                                <div class="text-xs text-gray-500">
                                    Đã bán <?= $sp['da_ban'] ?>
                                </div>
                            </div>

                            <!-- Giá -->
                            <div class="mt-auto pt-3 flex items-end gap-2 h-[28px]">
                                <span class="text-lg font-bold text-[#8B0000] leading-none"><?= number_format($sp['gia'], 0, ',', '.') ?>đ</span>
                                <?php if (!empty($sp['gia_cu'])): ?>
                                    <span class="text-xs text-gray-400 line-through mb-0.5 leading-none"><?= number_format($sp['gia_cu'], 0, ',', '.') ?>đ</span>
                                <?php endif; ?>
                            </div>
                            
                            <!-- Nút Thêm vào giỏ -->
                            <button class="w-full mt-4 py-2.5 bg-[#8B0000] text-white rounded-lg text-sm font-semibold hover:bg-[#7A0C0C] transition-colors flex items-center justify-center gap-2" data-add-cart="<?= $sp['id'] ?>">
                                Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    if (typeof Swiper !== 'undefined') {
        new Swiper('.viewed-products-swiper', {
            slidesPerView: 2,
            spaceBetween: 16,
            navigation: {
                nextEl: '.viewed-swiper-next',
                prevEl: '.viewed-swiper-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 24,
                },
                1280: {
                    slidesPerView: 5,
                    spaceBetween: 24,
                }
            }
        });
    }
});
</script>
