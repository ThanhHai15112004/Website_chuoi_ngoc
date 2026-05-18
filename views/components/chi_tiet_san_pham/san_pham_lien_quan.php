<?php
/**
 * Component: Sản phẩm liên quan
 */
?>

<div class="mt-12">
    <div class="flex justify-between items-end mb-6">
        <h2 class="text-2xl font-semibold text-gray-900 border-b-2 border-[#8B0000] pb-2 inline-block">
            Sản Phẩm Tương Tự
        </h2>
        <a href="<?= APP_URL ?>/san-pham" class="text-[#8B0000] hover:text-[#7A0C0C] font-medium text-sm flex items-center group">
            Xem tất cả 
            <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
        </a>
    </div>

    <!-- Danh sách sản phẩm (Scroll ngang trên mobile, Grid trên desktop) -->
    <div class="flex overflow-x-auto lg:grid lg:grid-cols-4 gap-4 pb-4 snap-x hide-scrollbar">
        <?php foreach ($san_pham_lien_quan as $sp): ?>
            <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition duration-300 overflow-hidden flex-none w-[220px] lg:w-auto snap-start group border border-gray-100">
                <!-- Ảnh sản phẩm -->
                <div class="relative w-full aspect-[4/5] bg-[#FAF7F2] overflow-hidden group/img">
                    <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $sp['id'] ?>" class="block w-full h-full">
                        <img src="<?= $sp['hinh_anh'] ?>" alt="<?= htmlspecialchars($sp['ten']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    
                    <!-- Nhãn/Badge -->
                    <?php if (!empty($sp['nhan'])): ?>
                        <div class="absolute top-2 left-2 bg-[#8B0000] text-white text-xs font-bold px-2 py-1 rounded shadow-sm z-10">
                            <?= $sp['nhan'] ?>
                        </div>
                    <?php endif; ?>

                    <!-- Action buttons -->
                    <div class="absolute inset-x-0 bottom-3 flex justify-center gap-2 opacity-0 group-hover:opacity-100 translate-y-4 group-hover:translate-y-0 transition-all duration-300 pointer-events-none z-10">
                        <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $sp['id'] ?>" class="w-9 h-9 bg-white/95 backdrop-blur-sm text-gray-700 rounded-full flex items-center justify-center shadow-lg hover:bg-[#8B0000] hover:text-white transition pointer-events-auto" title="Xem chi tiết">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                        <button class="w-9 h-9 bg-white/95 backdrop-blur-sm text-gray-700 rounded-full flex items-center justify-center shadow-lg hover:bg-[#8B0000] hover:text-white transition pointer-events-auto" title="Thêm vào giỏ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Thông tin sản phẩm -->
                <div class="p-4 flex flex-col flex-1">
                    <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $sp['id'] ?>">
                        <h3 class="text-sm font-medium text-gray-800 mb-2 line-clamp-2 hover:text-[#8B0000] transition h-10">
                            <?= htmlspecialchars($sp['ten']) ?>
                        </h3>
                    </a>
                    
                    <div class="flex items-center flex-wrap gap-2 mb-3">
                        <span class="text-[#8B0000] font-bold text-base"><?= number_format($sp['gia'], 0, ',', '.') ?>đ</span>
                        <?php if (!empty($sp['gia_cu'])): ?>
                            <span class="text-gray-400 text-xs line-through"><?= number_format($sp['gia_cu'], 0, ',', '.') ?>đ</span>
                        <?php endif; ?>
                    </div>

                    <div class="flex items-center justify-between mt-auto mb-3">
                        <div class="flex items-center text-xs text-[#D4AF37]">
                            <i class="fas fa-star"></i>
                            <span class="text-gray-600 ml-1"><?= number_format($sp['danh_gia'], 1) ?></span>
                        </div>
                        <div class="text-xs text-gray-500">
                            Đã bán <?= $sp['da_ban'] ?>
                        </div>
                    </div>

                    <button class="w-full py-2.5 bg-[#8B0000] text-white hover:bg-[#7A0C0C] rounded-lg text-sm font-semibold transition-colors flex items-center justify-center gap-2 shadow-sm">
                        <i class="fas fa-cart-plus"></i> Thêm vào giỏ
                    </button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
/* Ẩn thanh cuộn cho danh sách cuộn ngang */
.hide-scrollbar::-webkit-scrollbar {
    display: none;
}
.hide-scrollbar {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
