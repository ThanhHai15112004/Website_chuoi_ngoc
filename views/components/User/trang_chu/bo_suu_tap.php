<!-- Section: Bộ sưu tập theo nhu cầu -->
<section class="py-16 md:py-20" style="background: #FAF7F2;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-3" style="color: #111;">Bộ sưu tập theo nhu cầu</h2>
            <p class="max-w-2xl mx-auto" style="color: #666;">Chọn lọc những món trang sức ý nghĩa nhất dành riêng cho mục đích của bạn.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php if (!empty($bo_suu_tap)): ?>
                <?php foreach (array_slice($bo_suu_tap, 0, 4) as $index => $bst): ?>
                <div class="group relative rounded-2xl overflow-hidden shadow-md h-72 flex items-end cursor-pointer" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <div class="absolute inset-0">
                        <img src="<?= APP_URL . '/' . ltrim($bst['hinh_anh_chinh'] ?? 'images/placeholder.jpg', '/') ?>" alt="<?= htmlspecialchars($bst['ten_sp']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(0,0,0,0.75) 0%, rgba(0,0,0,0.2) 50%, transparent 100%);"></div>
                    </div>
                    
                    <div class="relative z-10 p-5 w-full">
                        <h3 class="text-lg font-bold text-white mb-1 line-clamp-1"><?= htmlspecialchars($bst['ten_sp']) ?></h3>
                        <p class="text-xs mb-3 line-clamp-2" style="color: rgba(255,255,255,0.8);"><?= htmlspecialchars(strip_tags($bst['mo_ta_ngan'])) ?></p>
                        <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $bst['id'] ?>" class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-wider transition-colors" style="color: #e6d490;">
                            Khám phá 
                            <svg class="w-3.5 h-3.5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
