<?php
$userYeuThich = $yeu_thich ?? [];
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Sản phẩm yêu thích</h2>
        <p class="text-gray-500 mt-1">Danh sách sản phẩm bạn đã lưu để mua sau</p>
    </div>

    <?php if (!empty($userYeuThich)): ?>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php foreach ($userYeuThich as $sp): ?>
        <div class="border border-gray-100 rounded-xl overflow-hidden hover:shadow-md transition-all duration-300 group bg-white">
            <!-- Product Image -->
            <div class="relative aspect-square bg-gray-50 overflow-hidden">
                <?php if (!empty($sp['hinh_anh'])): ?>
                <img src="<?= get_image_url($sp['hinh_anh']) ?>" alt="<?= htmlspecialchars($sp['ten']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <?php else: ?>
                <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                    <iconify-icon icon="ph:image" class="text-4xl text-gray-300"></iconify-icon>
                </div>
                <?php endif; ?>
                
                <!-- Remove button -->
                <button class="absolute top-3 right-3 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-sm text-red-500 hover:bg-red-500 hover:text-white transition-colors" title="Bỏ yêu thích">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
                </button>

                <?php if (!empty($sp['menh'])): ?>
                <span class="absolute top-3 left-3 px-2 py-1 text-xs font-medium bg-white/90 backdrop-blur-sm rounded-full text-[#8b0000]"><?= htmlspecialchars($sp['menh']) ?></span>
                <?php endif; ?>
            </div>
            
            <!-- Product Info -->
            <div class="p-4">
                <h3 class="font-bold text-gray-900 text-sm line-clamp-2 mb-2 min-h-[40px]"><?= htmlspecialchars($sp['ten']) ?></h3>
                <div class="flex items-center justify-between">
                    <span class="text-lg font-bold text-[#8b0000]"><?= number_format($sp['gia'] ?? 0, 0, ',', '.') ?>đ</span>
                    <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= htmlspecialchars($sp['id']) ?>" class="px-3 py-1.5 bg-[#8b0000] text-white text-xs font-medium rounded-lg hover:bg-[#700000] transition-colors">Xem</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center py-16">
        <iconify-icon icon="ph:heart" class="text-5xl text-gray-300 mb-3"></iconify-icon>
        <h3 class="text-lg font-bold text-gray-900 mb-2">Chưa có sản phẩm yêu thích</h3>
        <p class="text-gray-500 mb-6">Nhấn ❤️ trên sản phẩm để lưu lại và mua sau!</p>
        <a href="<?= APP_URL ?>/san-pham" class="px-6 py-2.5 bg-[#8b0000] text-white rounded-xl font-medium hover:bg-[#700000] transition-colors text-sm">Khám phá sản phẩm</a>
    </div>
    <?php endif; ?>
</div>
