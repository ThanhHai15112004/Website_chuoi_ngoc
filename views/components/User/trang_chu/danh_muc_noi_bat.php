<!-- Section: Danh mục nổi bật -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-3" style="color: #111;">Danh mục nổi bật</h2>
            <div class="w-16 h-1 mx-auto rounded-full" style="background: linear-gradient(90deg, #d4af37, #e6d490);"></div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-6">
            <?php
            $danh_muc = [
                ['ten' => 'Vòng Ngọc', 'icon' => '💎', 'so_luong' => 24, 'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (1).jpg'],
                ['ten' => 'Tràng Hạt', 'icon' => '📿', 'so_luong' => 18, 'hinh_anh' => APP_URL . '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-2.jpg'],
                ['ten' => 'Trầm Hương', 'icon' => '🌬️', 'so_luong' => 15, 'hinh_anh' => APP_URL . '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg'],
                ['ten' => 'Bột Xông', 'icon' => '🍃', 'so_luong' => 12, 'hinh_anh' => APP_URL . '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg'],
                ['ten' => 'Hồng Lư', 'icon' => '🏮', 'so_luong' => 10, 'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-2.jpg'],
            ];
            foreach ($danh_muc as $index => $dm): ?>
            <a href="<?= APP_URL ?>/products?category=<?= urlencode($dm['ten']) ?>" class="group block" data-aos="fade-up" data-aos-delay="<?= $index * 80 ?>">
                <div class="relative rounded-2xl overflow-hidden aspect-square mb-4 shadow-sm">
                    <img src="<?= $dm['hinh_anh'] ?>" alt="<?= $dm['ten'] ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300" style="background: rgba(139,0,0,0.35);">
                        <span class="text-white text-4xl"><?= $dm['icon'] ?></span>
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="font-bold transition-colors group-hover:opacity-75" style="color: #111;"><?= $dm['ten'] ?></h3>
                    <p class="text-sm" style="color: #999;"><?= $dm['so_luong'] ?> sản phẩm</p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
