<!-- Section: Danh mục nổi bật -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-3" style="color: #111;">Danh mục nổi bật</h2>
            <div class="w-16 h-1 mx-auto rounded-full" style="background: linear-gradient(90deg, #d4af37, #e6d490);"></div>
        </div>

        <?php 
        $dm_count = count($danh_muc ?? []);
        // Auto grid: 4 items -> 4 cols, 5+ -> 5 cols, 3 -> 3 cols
        $grid_cols = $dm_count <= 3 ? 3 : ($dm_count <= 4 ? 4 : 5);
        ?>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-<?= $grid_cols ?> gap-6 justify-items-center">
            <?php if (!empty($danh_muc)): ?>
                <?php foreach ($danh_muc as $index => $dm): ?>
                <?php 
                    // Fix image path: DB stores just filename, actual path is uploads/danh_muc/
                    $dm_img = $dm['hinh_anh'] ?? '';
                    if (!empty($dm_img) && strpos($dm_img, '/') === false && strpos($dm_img, 'http') !== 0) {
                        $dm_img = 'uploads/danh_muc/' . $dm_img;
                    }
                    $dm_img_src = APP_URL . '/' . ltrim($dm_img, '/');
                ?>
                <a href="<?= APP_URL ?>/san-pham?danh_muc=<?= htmlspecialchars($dm['slug'] ?? $dm['id']) ?>" class="group block w-full" data-aos="fade-up" data-aos-delay="<?= $index * 80 ?>">
                    <div class="relative rounded-2xl overflow-hidden aspect-square mb-4 shadow-sm bg-gray-100">
                        <img src="<?= $dm_img_src ?>" alt="<?= htmlspecialchars($dm['ten_danh_muc']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300" style="background: rgba(139,0,0,0.35);">
                            <span class="text-white text-4xl">✨</span>
                        </div>
                    </div>
                    <div class="text-center">
                        <h3 class="font-bold transition-colors group-hover:opacity-75" style="color: #111;"><?= htmlspecialchars($dm['ten_danh_muc']) ?></h3>
                        <p class="text-sm" style="color: #999;"><?= $dm['so_san_pham'] ?? 0 ?> sản phẩm</p>
                    </div>
                </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
