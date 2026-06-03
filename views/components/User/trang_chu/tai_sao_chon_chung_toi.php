<!-- Section: Vì sao chọn Chuỗi Ngọc -->
<section class="py-16 md:py-20" style="background: linear-gradient(180deg, #fff 0%, #FAF7F2 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-4" style="color: #111;">
                <?= htmlspecialchars($tai_sao_chon_chung_toi['tieu_de'] ?? 'Vì sao chọn Chuỗi Ngọc') ?>
            </h2>
            <div class="w-20 h-1 mx-auto rounded-full mb-4" style="background: linear-gradient(90deg, #d4af37, #e6d490);"></div>
            <p class="max-w-2xl mx-auto" style="color: #666;">
                <?= htmlspecialchars($tai_sao_chon_chung_toi['mo_ta'] ?? 'Chúng tôi cam kết mang đến những giá trị phong thủy tốt nhất, giúp bạn thu hút tài lộc, bình an và may mắn.') ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $ly_do = [
                [
                    'tieu_de' => 'Đá Quý Tự Nhiên',
                    'mo_ta' => '100% đá tự nhiên mang năng lượng tích cực, được kiểm định chất lượng nghiêm ngặt.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>',
                    'mau' => '#8b0000',
                    'delay' => 0,
                ],
                [
                    'tieu_de' => 'Tư Vấn Chuyên Sâu',
                    'mo_ta' => 'Đội ngũ chuyên gia am hiểu phong thủy, tư vấn chuẩn xác theo bản mệnh từng khách hàng.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>',
                    'mau' => '#d4af37',
                    'delay' => 100,
                ],
                [
                    'tieu_de' => 'Chế Tác Thủ Công',
                    'mo_ta' => 'Sản phẩm được chế tác tỉ mỉ bởi các nghệ nhân lành nghề, mang đậm tính nghệ thuật.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>',
                    'mau' => '#8b0000',
                    'delay' => 200,
                ],
                [
                    'tieu_de' => 'Bảo Hành Trọn Đời',
                    'mo_ta' => 'Cam kết chất lượng tuyệt đối, hỗ trợ đánh sáng, thay dây miễn phí trọn đời sản phẩm.',
                    'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>',
                    'mau' => '#d4af37',
                    'delay' => 300,
                ],
            ];
            foreach ($ly_do as $item): ?>
            <div class="bg-white p-8 rounded-2xl shadow-sm hover:shadow-lg transition-all duration-300 text-center border border-gray-100 group" data-aos="fade-up" data-aos-delay="<?= $item['delay'] ?>">
                <div class="w-16 h-16 mx-auto rounded-full flex items-center justify-center mb-6 transition-all duration-300" style="background: <?= $item['mau'] ?>12;">
                    <svg class="w-7 h-7 transition-colors duration-300" style="color: <?= $item['mau'] ?>;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <?= $item['icon'] ?>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-3" style="color: #111;"><?= $item['tieu_de'] ?></h3>
                <p class="text-sm leading-relaxed" style="color: #666;"><?= $item['mo_ta'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Stats Section -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16 pt-12 border-t border-gray-200" id="stats-section">
            <?php
            $thong_ke = [
                ['so' => '15000', 'nhan' => 'Khách hàng tin dùng', 'hau_to' => '+', 'mau' => '#8b0000', 'delay' => 0],
                ['so' => '1200', 'nhan' => 'Mẫu trang sức', 'hau_to' => '+', 'mau' => '#d4af37', 'delay' => 100],
                ['so' => '100', 'nhan' => 'Đá tự nhiên', 'hau_to' => '%', 'mau' => '#8b0000', 'delay' => 200],
                ['so' => '5', 'nhan' => 'Đánh giá chất lượng', 'hau_to' => ' Sao', 'mau' => '#d4af37', 'delay' => 300],
            ];
            foreach ($thong_ke as $tk): ?>
            <div class="text-center" data-aos="fade-up" data-aos-delay="<?= $tk['delay'] ?>">
                <div class="text-4xl font-bold mb-2" style="color: <?= $tk['mau'] ?>;">
                    <span class="countup" data-target="<?= $tk['so'] ?>">0</span><?= $tk['hau_to'] ?>
                </div>
                <div class="text-sm uppercase tracking-wider font-medium" style="color: #888;"><?= $tk['nhan'] ?></div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
