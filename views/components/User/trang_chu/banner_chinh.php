<!-- Section: Hero Banner -->
<section class="relative overflow-hidden bg-[#FAF7F2]">
    
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <?php if (!empty($banners)): ?>
                <?php foreach ($banners as $index => $banner): ?>
                <div class="swiper-slide w-full h-full bg-[#FAF7F2]">
                    <?php
                    $tieu_de_hien_thi = $banner['tieu_de_hien_thi'] ?? $banner['ten'];
                    
                    // Xử lý link ảnh để không bị lỗi 404 (loại bỏ /public nếu có)
                    $img_desktop = $banner['anh_desktop'];
                    if (strpos($img_desktop, '/public/') === 0) {
                        $img_desktop = substr($img_desktop, 7);
                    }
                    $img_src = APP_URL . '/' . ltrim($img_desktop, '/');

                    // Thay đổi layout xen kẽ (Trái - Phải)
                    $is_reversed = ($index % 2 !== 0);
                    ?>
                    
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 lg:py-24">
                        <div class="flex flex-col md:flex-row items-center gap-10 lg:gap-16 <?= $is_reversed ? 'md:flex-row-reverse' : '' ?>">
                            
                            <!-- Text Content -->
                            <div class="w-full md:w-1/2 relative z-10 flex flex-col justify-center <?= $is_reversed ? 'md:pl-8 lg:pl-12' : 'md:pr-8 lg:pr-12' ?>">
                                <?php if (!empty($banner['badge_text'])): ?>
                                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-widest mb-6 text-yellow-700 bg-yellow-100 border border-yellow-200 self-start shadow-sm">
                                    <?= htmlspecialchars($banner['badge_text']) ?>
                                </div>
                                <?php endif; ?>
                                
                                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                                    <?= htmlspecialchars($tieu_de_hien_thi) ?>
                                </h1>
                                
                                <?php if (!empty($banner['mo_ta'])): ?>
                                <p class="text-base md:text-lg text-gray-600 mb-6 leading-relaxed">
                                    <?= htmlspecialchars($banner['mo_ta']) ?>
                                </p>
                                <?php endif; ?>
                                
                                <?php if (!empty($banner['dac_diem_1']) || !empty($banner['dac_diem_2'])): ?>
                                <div class="space-y-3 mb-8">
                                    <?php if (!empty($banner['dac_diem_1'])): ?>
                                    <div class="flex items-start gap-3">
                                        <div class="mt-0.5 shrink-0 w-5 h-5 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        <span class="text-gray-700 font-medium"><?= htmlspecialchars($banner['dac_diem_1']) ?></span>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($banner['dac_diem_2'])): ?>
                                    <div class="flex items-start gap-3">
                                        <div class="mt-0.5 shrink-0 w-5 h-5 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                        </div>
                                        <span class="text-gray-700 font-medium"><?= htmlspecialchars($banner['dac_diem_2']) ?></span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php else: ?>
                                <div class="mb-2"></div>
                                <?php endif; ?>
                                
                                <div class="flex flex-wrap items-center gap-4">
                                    <a href="<?= !empty($banner['link']) ? (strpos($banner['link'], 'http') === 0 ? $banner['link'] : APP_URL . '/' . ltrim($banner['link'], '/')) : '#' ?>" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-red-800 text-white font-medium rounded-full hover:bg-red-900 transition-all shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                                        <?= htmlspecialchars($banner['cta'] ?: 'Khám phá ngay') ?>
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                    
                                    <?php if (!empty($banner['btn_2_text'])): ?>
                                    <a href="<?= !empty($banner['btn_2_link']) ? (strpos($banner['btn_2_link'], 'http') === 0 ? $banner['btn_2_link'] : APP_URL . '/' . ltrim($banner['btn_2_link'], '/')) : '#' ?>" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-white text-gray-700 border-2 border-gray-200 font-medium rounded-full hover:bg-gray-50 hover:border-gray-300 transition-all shadow-sm">
                                        <?= htmlspecialchars($banner['btn_2_text']) ?>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <!-- Image Content -->
                            <div class="w-full md:w-1/2 relative z-10 mt-6 md:mt-0">
                                <div class="relative rounded-2xl md:rounded-[2rem] overflow-hidden shadow-2xl aspect-[4/3] md:aspect-square lg:aspect-[4/3] w-full group">
                                    <img src="<?= $img_src ?>" alt="<?= htmlspecialchars($banner['ten']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700 ease-in-out">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent pointer-events-none"></div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <!-- Fallback slide -->
                <div class="swiper-slide w-full h-full bg-[#FAF7F2]">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-16 lg:py-24">
                        <div class="flex flex-col md:flex-row items-center gap-10 lg:gap-16">
                            <!-- Left: Text Content -->
                            <div class="w-full md:w-1/2 relative z-10 flex flex-col justify-center md:pr-8 lg:pr-12">
                                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-xs font-semibold uppercase tracking-widest mb-6 text-yellow-700 bg-yellow-100 border border-yellow-200 self-start">
                                    Đá tự nhiên 100%
                                </div>
                                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight mb-6">
                                    Chuỗi Ngọc Phong Thủy
                                </h1>
                                <p class="text-base md:text-lg text-gray-600 mb-8 leading-relaxed">
                                    Khám phá bộ sưu tập vòng đá, chuỗi ngọc được chọn lọc kỹ càng theo mệnh, tuổi và phong cách cá nhân của riêng bạn.
                                </p>
                                <div class="flex">
                                    <a href="<?= APP_URL ?>/products" class="inline-flex items-center gap-2 px-8 py-3.5 bg-red-800 text-white font-medium rounded-full shadow-lg transition-all hover:bg-red-900 hover:-translate-y-0.5">
                                        Mua ngay
                                    </a>
                                </div>
                            </div>
                            <!-- Right: Image Content -->
                            <div class="w-full md:w-1/2 relative z-10 mt-6 md:mt-0">
                                <div class="relative rounded-2xl md:rounded-[2rem] overflow-hidden shadow-2xl aspect-[4/3] md:aspect-square lg:aspect-[4/3] w-full group">
                                    <img src="<?= APP_URL ?>/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (1).jpg" alt="Vòng ngọc" class="w-full h-full object-cover">
                                </div>
                                <div class="absolute -z-10 w-full h-full border-2 border-yellow-600 rounded-2xl md:rounded-[2rem] top-4 left-4 md:-left-4 lg:-left-6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        
        <!-- Pagination -->
        <div class="swiper-pagination !bottom-4"></div>
    </div>
</section>
