<!-- Section: Bộ sưu tập theo nhu cầu -->
<section class="py-16 md:py-20" style="background: #FAF7F2;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-3" style="color: #111;">Bộ sưu tập theo nhu cầu</h2>
            <p class="max-w-2xl mx-auto" style="color: #666;">Chọn lọc những món trang sức ý nghĩa nhất dành riêng cho mục đích của bạn.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php
            $bo_suu_tap = [
                ['tieu_de' => 'Cầu Tài Lộc', 'mo_ta' => 'Những mẫu vòng mang sắc đỏ, vàng, xanh ngọc, phù hợp để cầu may mắn và thịnh vượng.', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2 (1).jpg'],
                ['tieu_de' => 'Cầu Bình An', 'mo_ta' => 'Chuỗi ngọc êm ái, đá tự nhiên thanh lọc năng lượng, mang lại sự tịnh tâm và sức khỏe.', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Tràng Hạt/Tràng Hạt Ngọc Hòa Điền/trang-hat-ngoc-2.jpg'],
                ['tieu_de' => 'Quà Tặng Ý Nghĩa', 'mo_ta' => 'Hộp quà sang trọng, thiết kế tinh tế dành tặng người thân yêu trong những dịp đặc biệt.', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-2.jpg'],
            ];
            foreach ($bo_suu_tap as $index => $bst): ?>
            <div class="group relative rounded-2xl overflow-hidden shadow-md h-80 flex items-end cursor-pointer" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <div class="absolute inset-0">
                    <img src="<?= $bst['hinh_anh'] ?>" alt="<?= $bst['tieu_de'] ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0" style="background: linear-gradient(to top, rgba(0,0,0,0.75) 0%, rgba(0,0,0,0.2) 50%, transparent 100%);"></div>
                </div>
                
                <div class="relative z-10 p-6 w-full">
                    <h3 class="text-2xl font-bold text-white mb-2"><?= $bst['tieu_de'] ?></h3>
                    <p class="text-sm mb-4 line-clamp-2" style="color: rgba(255,255,255,0.8);"><?= $bst['mo_ta'] ?></p>
                    <a href="<?= APP_URL ?>/products" class="inline-flex items-center gap-2 text-sm font-bold uppercase tracking-wider transition-colors" style="color: #e6d490;">
                        Khám phá 
                        <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
