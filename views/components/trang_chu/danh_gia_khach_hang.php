<!-- Section: Đánh giá khách hàng -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10" data-aos="fade-up">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-2" style="color: #111;">
                    Khách hàng <span class="font-bold" style="color: #8b0000;">nói gì</span>
                </h2>
                <div class="w-16 h-1 rounded-full" style="background: linear-gradient(90deg, #d4af37, #e6d490);"></div>
            </div>
            <a href="<?= APP_URL ?>/reviews" class="inline-flex items-center gap-1 font-semibold transition-opacity mt-4 md:mt-0 hover:opacity-75" style="color: #8b0000;">
                Xem tất cả đánh giá
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $danh_gia = [
                [
                    'noi_dung' => '"Từ ngày thỉnh vòng Ngọc Bích bên shop, công việc kinh doanh của mình trôi chảy hẳn. Nhân viên tư vấn rất nhiệt tình, chọn đá chuẩn theo mệnh Mộc của mình. Sẽ ủng hộ dài dài!"',
                    'ten' => 'Chị Lan Anh',
                    'dia_chi' => 'TP. Hồ Chí Minh · Mệnh Mộc',
                    'avatar_bg' => '#8b0000',
                    'sao' => 5,
                ],
                [
                    'noi_dung' => '"Mình mua vòng tặng sinh nhật mẹ, đá rất sáng và trong, có cả giấy kiểm định nên rất yên tâm. Đóng gói hộp quà đỏ đô cực kỳ sang trọng."',
                    'ten' => 'Anh Hữu Thắng',
                    'dia_chi' => 'Hà Nội · Mệnh Kim',
                    'avatar_bg' => '#d4af37',
                    'sao' => 5,
                ],
                [
                    'noi_dung' => '"Vòng Thạch Anh Tím thật sự đẹp hơn trong hình. Mình đeo thấy ngủ ngon hơn hẳn. Điểm trừ nhỏ là giao hàng hơi lâu một chút, nhưng chất lượng thì hoàn toàn hài lòng."',
                    'ten' => 'Chị Thu Hà',
                    'dia_chi' => 'Đà Nẵng · Mệnh Hỏa',
                    'avatar_bg' => '#333',
                    'sao' => 4,
                ],
            ];
            foreach ($danh_gia as $index => $dg): ?>
            <div class="p-8 rounded-2xl relative" style="background: #FAF7F2;" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <!-- Stars -->
                <div class="flex gap-0.5 mb-4">
                    <?php for($i=1; $i<=5; $i++): ?>
                    <svg class="w-5 h-5" style="color: <?= $i <= $dg['sao'] ? '#d4af37' : '#ddd' ?>;" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    <?php endfor; ?>
                </div>

                <p class="italic mb-6 leading-relaxed" style="color: #444;"><?= $dg['noi_dung'] ?></p>
                
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-full overflow-hidden mr-4 border-2" style="border-color: rgba(212,175,55,0.3);">
                        <img src="https://ui-avatars.com/api/?name=<?= urlencode($dg['ten']) ?>&background=<?= ltrim($dg['avatar_bg'], '#') ?>&color=fff&size=96" alt="<?= $dg['ten'] ?>" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-semibold" style="color: #111;"><?= $dg['ten'] ?></h4>
                        <p class="text-xs" style="color: #999;"><?= $dg['dia_chi'] ?></p>
                    </div>
                </div>

                <!-- Quote Icon -->
                <div class="absolute top-6 right-6" style="color: rgba(139,0,0,0.08);">
                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 32 32"><path d="M10 8c-3.3 0-6 2.7-6 6v10h10V14H8c0-1.1.9-2 2-2h2V8h-2zm14 0c-3.3 0-6 2.7-6 6v10h10V14h-6c0-1.1.9-2 2-2h2V8h-2z"/></svg>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
