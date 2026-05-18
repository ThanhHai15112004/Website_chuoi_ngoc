<!-- Section: Kiến thức phong thủy -->
<section class="py-16 md:py-20" style="background: #FAF7F2;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end mb-10" data-aos="fade-up">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-2" style="color: #111;">
                    Kiến thức <span class="font-bold" style="color: #8b0000;">phong thủy</span>
                </h2>
                <div class="w-16 h-1 rounded-full" style="background: linear-gradient(90deg, #d4af37, #e6d490);"></div>
            </div>
            <a href="<?= APP_URL ?>/blogs" class="inline-flex items-center gap-1 font-semibold transition-opacity mt-4 md:mt-0 hover:opacity-75" style="color: #8b0000;">
                Xem tất cả bài viết
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            $bai_viet = [
                [
                    'the_loai' => 'Kiến thức cơ bản',
                    'ngay' => '15 Tháng 5, 2024',
                    'tieu_de' => 'Hướng Dẫn Cách Chọn Đá Phong Thủy Theo Ngũ Hành Trúng Mệnh',
                    'mo_ta' => 'Việc lựa chọn đá phong thủy phù hợp với bản mệnh không chỉ giúp trang sức đẹp hơn mà còn mang lại năng lượng tích cực, thu hút tài lộc và may mắn cho người đeo...',
                    'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-3.jpg',
                    'link' => APP_URL . '/blogs/detail/1',
                ],
                [
                    'the_loai' => 'Thanh tẩy đá',
                    'ngay' => '12 Tháng 5, 2024',
                    'tieu_de' => '5 Cách Thanh Tẩy Đá Phong Thủy Mới Mua Về Đơn Giản Tại Nhà',
                    'mo_ta' => 'Đá phong thủy khi mới mua về thường mang nhiều năng lượng hỗn tạp. Việc thanh tẩy là bước quan trọng nhất để nạp lại năng lượng tinh khiết trước khi sử dụng...',
                    'hinh_anh' => APP_URL . '/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-2.jpg',
                    'link' => APP_URL . '/blogs/detail/2',
                ],
                [
                    'the_loai' => 'Xu hướng',
                    'ngay' => '05 Tháng 5, 2024',
                    'tieu_de' => 'Xu Hướng Trang Sức Phong Thủy Nổi Bật Nhất Năm 2024',
                    'mo_ta' => 'Năm 2024 đánh dấu sự trở lại của các thiết kế tối giản kết hợp với ngọc bích và thạch anh tóc. Khám phá ngay những mẫu trang sức đang được săn đón nhất...',
                    'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-3.jpg',
                    'link' => APP_URL . '/blogs/detail/3',
                ],
            ];
            foreach ($bai_viet as $index => $bv): ?>
            <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 group" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                <a href="<?= $bv['link'] ?>" class="block overflow-hidden relative">
                    <div class="absolute top-4 left-4 px-3 py-1 text-xs font-semibold rounded-full z-10" style="background: rgba(255,255,255,0.92); color: #8b0000;">
                        <?= $bv['the_loai'] ?>
                    </div>
                    <img src="<?= $bv['hinh_anh'] ?>" alt="<?= $bv['tieu_de'] ?>" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                </a>
                <div class="p-6">
                    <div class="text-xs mb-3 flex items-center" style="color: #999;">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <?= $bv['ngay'] ?>
                    </div>
                    <h3 class="text-lg font-semibold mb-3 line-clamp-2 transition-colors" style="color: #111;">
                        <a href="<?= $bv['link'] ?>" class="hover:opacity-75"><?= $bv['tieu_de'] ?></a>
                    </h3>
                    <p class="text-sm mb-4 line-clamp-3" style="color: #666;"><?= $bv['mo_ta'] ?></p>
                    <a href="<?= $bv['link'] ?>" class="inline-flex items-center text-sm font-semibold transition-opacity hover:opacity-75" style="color: #111;">
                        Đọc tiếp
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
