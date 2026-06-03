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
            <?php if (!empty($ngu_hanh)): ?>
                <?php 
                $icon_map = [
                    'kim' => ['icon' => 'mdi:sword-cross', 'color' => 'text-gray-500', 'bg' => '#f3f4f6', 'border' => '#e5e7eb'],
                    'mộc' => ['icon' => 'mdi:leaf', 'color' => 'text-green-600', 'bg' => '#f0fdf4', 'border' => '#bbf7d0'],
                    'thủy' => ['icon' => 'mdi:water-drop', 'color' => 'text-blue-500', 'bg' => '#eff6ff', 'border' => '#bfdbfe'],
                    'hỏa' => ['icon' => 'mdi:fire', 'color' => 'text-red-500', 'bg' => '#fef2f2', 'border' => '#fecaca'],
                    'thổ' => ['icon' => 'mdi:terrain', 'color' => 'text-amber-600', 'bg' => '#fefce8', 'border' => '#fef08a']
                ];
                foreach ($ngu_hanh as $index => $nh): 
                    $ten_menh_lower = mb_strtolower($nh['ten_menh'], 'UTF-8');
                    $matched_key = 'thủy'; // default
                    foreach ($icon_map as $key => $style) {
                        if (strpos($ten_menh_lower, $key) !== false) {
                            $matched_key = $key;
                            break;
                        }
                    }
                    $style = $icon_map[$matched_key];
                ?>
                <div class="bg-white rounded-2xl shadow-sm p-6 flex flex-col h-full hover:-translate-y-1 hover:shadow-lg transition-all duration-300" style="border: 1px solid <?= $style['border'] ?>;" data-aos="fade-up" data-aos-delay="<?= $index * 80 ?>">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center text-2xl shadow-inner" style="background: <?= $style['bg'] ?>;">
                            <iconify-icon icon="<?= $style['icon'] ?>" class="<?= $style['color'] ?>"></iconify-icon>
                        </div>
                        <h3 class="text-lg font-bold" style="color: #111;"><?= htmlspecialchars($nh['ten_menh']) ?></h3>
                    </div>
                    <div class="space-y-3 flex-grow mb-6">
                        <div>
                            <p class="text-xs uppercase tracking-wider font-semibold" style="color: #999;">Màu hợp</p>
                            <p class="text-sm font-medium" style="color: #333;"><?= htmlspecialchars($nh['mau_sac_hop'] ?? 'Đang cập nhật') ?></p>
                        </div>
                        <div>
                            <p class="text-xs uppercase tracking-wider font-semibold" style="color: #999;">Sản phẩm phù hợp</p>
                            <p class="text-sm font-medium" style="color: #333;"><?= $nh['so_san_pham'] ?? 0 ?> sản phẩm</p>
                        </div>
                    </div>
                    <a href="<?= APP_URL ?>/products?menh=<?= $nh['id'] ?>" class="block w-full py-2.5 text-center font-medium rounded-lg transition-all duration-300 border-2" style="border-color: #8b0000; color: #8b0000; background: transparent;" onmouseover="this.style.background='#8b0000';this.style.color='#fff'" onmouseout="this.style.background='transparent';this.style.color='#8b0000'">
                        Xem vòng <?= htmlspecialchars($nh['ten_menh']) ?>
                    </a>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
