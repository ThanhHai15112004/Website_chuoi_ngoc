<!-- Section: Sản phẩm bán chạy -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10" data-aos="fade-up">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-2" style="color: #111;">Sản phẩm bán chạy</h2>
                <p style="color: #888;">Những mẫu vòng được khách hàng yêu thích nhất</p>
            </div>
            <a href="<?= APP_URL ?>/san-pham" class="inline-flex items-center gap-1 font-semibold transition-colors mt-4 md:mt-0 group" style="color: #8b0000;">
                Xem tất cả
                <svg class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-5 md:gap-6">
            <?php if (!empty($san_pham_ban_chay)): ?>
                <?php foreach ($san_pham_ban_chay as $index => $sp): ?>
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col" data-aos="fade-up" data-aos-delay="<?= $index * 80 ?>">
                    <!-- Image -->
                    <div class="relative aspect-square overflow-hidden group/img" style="background: #f9f9f9;">
                        <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $sp['id'] ?>" class="block w-full h-full">
                            <img src="<?= APP_URL . '/' . ltrim($sp['hinh_anh_chinh'] ?? 'images/placeholder.jpg', '/') ?>" alt="<?= htmlspecialchars($sp['ten_sp']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        </a>
                        
                        <?php if ($sp['gia_khuyen_mai']): ?>
                        <div class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-xs font-bold text-white shadow-md z-10" style="background: #8b0000;">
                            Giảm giá
                        </div>
                        <?php endif; ?>

                        <button class="absolute top-3 right-3 p-2 rounded-full shadow-sm transition-all z-10" style="background: rgba(255,255,255,0.85); color: #999;" onmouseover="this.style.color='#8b0000'" onmouseout="this.style.color='#999'">
                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                        </button>
                        
                        <!-- Quick View Overlay -->
                        <div class="absolute inset-x-0 bottom-4 flex justify-center gap-2 opacity-0 group-hover/img:opacity-100 translate-y-4 group-hover/img:translate-y-0 transition-all duration-300 pointer-events-none z-10">
                            <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $sp['id'] ?>" class="w-10 h-10 bg-white/95 backdrop-blur-sm text-gray-700 rounded-full flex items-center justify-center shadow-lg hover:bg-[#8B0000] hover:text-white transition pointer-events-auto" title="Xem chi tiết">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </a>
                            <button class="w-10 h-10 bg-white/95 backdrop-blur-sm text-gray-700 rounded-full flex items-center justify-center shadow-lg hover:bg-[#8B0000] hover:text-white transition pointer-events-auto" title="Thêm vào giỏ">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-4 flex flex-col flex-grow">
                        <h3 class="font-bold text-sm md:text-base line-clamp-1 mb-1" style="color: #111;">
                            <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $sp['id'] ?>" class="hover:opacity-75 transition-opacity"><?= htmlspecialchars($sp['ten_sp']) ?></a>
                        </h3>
                        <p class="text-xs mb-3" style="color: #999;"><?= htmlspecialchars($sp['ten_danh_muc']) ?></p>
                        
                        <div class="mt-auto">
                            <div class="flex items-center gap-2 mb-3">
                                <?php if ($sp['gia_khuyen_mai']): ?>
                                    <span class="text-base font-bold" style="color: #8b0000;"><?= number_format($sp['gia_khuyen_mai'], 0, ',', '.') ?>đ</span>
                                    <span class="text-xs line-through" style="color: #bbb;"><?= number_format($sp['gia_ban'], 0, ',', '.') ?>đ</span>
                                <?php else: ?>
                                    <span class="text-base font-bold" style="color: #8b0000;"><?= number_format($sp['gia_ban'], 0, ',', '.') ?>đ</span>
                                <?php endif; ?>
                            </div>
                            <button class="w-full py-2.5 text-white text-sm font-medium rounded-xl transition-all duration-300 shadow-sm" style="background: linear-gradient(135deg, #8b0000, #9b111e);" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                                Thêm vào giỏ
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
