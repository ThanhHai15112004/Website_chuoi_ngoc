<!-- Section: Chọn vòng hợp mệnh -->
<section id="chon-menh" class="py-16 md:py-20" style="background: #FAF7F2;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-4" style="color: #111;">
                Chọn vòng hợp <span class="font-bold" style="color: #8b0000;">mệnh của bạn</span>
            </h2>
            <div class="w-20 h-1 mx-auto rounded-full mb-4" style="background: linear-gradient(90deg, #d4af37, #e6d490);"></div>
            <p class="max-w-2xl mx-auto" style="color: #666;">Mỗi mệnh có màu sắc và loại đá phù hợp, giúp cân bằng năng lượng và tăng may mắn.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            <?php
            $ngu_hanh = [
                ['ten' => 'Mệnh Kim', 'bieu_tuong' => '<iconify-icon icon="mdi:sword-cross" class="text-gray-500"></iconify-icon>', 'mau_sac' => 'Trắng, Vàng, Nâu', 'loai_da' => 'Thạch anh trắng, Hổ phách', 'mau_nen' => '#f3f4f6', 'vien' => '#e5e7eb'],
                ['ten' => 'Mệnh Mộc', 'bieu_tuong' => '<iconify-icon icon="mdi:leaf" class="text-green-600"></iconify-icon>', 'mau_sac' => 'Xanh lá, Đen, Xanh dương', 'loai_da' => 'Ngọc bích, Thạch anh đen', 'mau_nen' => '#f0fdf4', 'vien' => '#bbf7d0'],
                ['ten' => 'Mệnh Thủy', 'bieu_tuong' => '<iconify-icon icon="mdi:water-drop" class="text-blue-500"></iconify-icon>', 'mau_sac' => 'Đen, Xanh dương, Trắng', 'loai_da' => 'Aquamarine, Đá vỏ chai', 'mau_nen' => '#eff6ff', 'vien' => '#bfdbfe'],
                ['ten' => 'Mệnh Hỏa', 'bieu_tuong' => '<iconify-icon icon="mdi:fire" class="text-red-500"></iconify-icon>', 'mau_sac' => 'Đỏ, Hồng, Tím, Xanh lá', 'loai_da' => 'Thạch anh hồng, Mã não đỏ', 'mau_nen' => '#fef2f2', 'vien' => '#fecaca'],
                ['ten' => 'Mệnh Thổ', 'bieu_tuong' => '<iconify-icon icon="mdi:terrain" class="text-amber-600"></iconify-icon>', 'mau_sac' => 'Vàng, Nâu, Đỏ, Hồng', 'loai_da' => 'Mắt hổ, Thạch anh vàng', 'mau_nen' => '#fefce8', 'vien' => '#fef08a'],
            ];
            foreach ($ngu_hanh as $index => $nh): ?>
            <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col h-full hover:-translate-y-1 hover:shadow-lg transition-all duration-300" style="border: 1px solid <?= $nh['vien'] ?>;" data-aos="fade-up" data-aos-delay="<?= $index * 80 ?>">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl shadow-inner" style="background: <?= $nh['mau_nen'] ?>;">
                        <?= $nh['bieu_tuong'] ?>
                    </div>
                    <h3 class="text-lg font-bold" style="color: #111;"><?= $nh['ten'] ?></h3>
                </div>
                <div class="space-y-3 flex-grow mb-6">
                    <div>
                        <p class="text-xs uppercase tracking-wider font-semibold" style="color: #999;">Màu hợp</p>
                        <p class="text-sm font-medium" style="color: #333;"><?= $nh['mau_sac'] ?></p>
                    </div>
                    <div>
                        <p class="text-xs uppercase tracking-wider font-semibold" style="color: #999;">Gợi ý đá</p>
                        <p class="text-sm font-medium" style="color: #333;"><?= $nh['loai_da'] ?></p>
                    </div>
                </div>
                <a href="<?= APP_URL ?>/products" class="block w-full py-2.5 text-center font-medium rounded-lg transition-all duration-300 border-2" style="border-color: #8b0000; color: #8b0000; background: transparent;" onmouseover="this.style.background='#8b0000';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#8b0000'">
                    Xem vòng <?= $nh['ten'] ?>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
