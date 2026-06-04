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
            <a href="<?= APP_URL ?>/bai-viet" class="inline-flex items-center gap-1 font-semibold transition-opacity mt-4 md:mt-0 hover:opacity-75" style="color: #8b0000;">
                Xem tất cả bài viết
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php if (!empty($bai_viet)): ?>
                <?php foreach ($bai_viet as $index => $bv): ?>
                <?php
                    // Fix image: if external URL keep as is, if relative add APP_URL, if filename add uploads path
                    $bv_img = $bv['hinh_anh'] ?? '';
                    if (empty($bv_img)) {
                        $bv_img_src = APP_URL . '/images/Logo_.jpg';
                    } elseif (strpos($bv_img, 'http') === 0) {
                        $bv_img_src = $bv_img;
                    } elseif (strpos($bv_img, '/') === 0) {
                        $bv_img_src = APP_URL . $bv_img;
                    } else {
                        $bv_img_src = APP_URL . '/uploads/bai_viet/' . $bv_img;
                    }
                ?>
                <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition-all duration-300 group" data-aos="fade-up" data-aos-delay="<?= $index * 100 ?>">
                    <a href="<?= APP_URL ?>/chi-tiet-bai-viet?slug=<?= htmlspecialchars($bv['slug']) ?>" class="block overflow-hidden relative">
                        <div class="absolute top-4 left-4 px-3 py-1 text-xs font-semibold rounded-full z-10" style="background: rgba(255,255,255,0.92); color: #8b0000;">
                            <?= htmlspecialchars($bv['ten_danh_muc'] ?? 'Tin tức') ?>
                        </div>
                        <img src="<?= $bv_img_src ?>" onerror="this.onerror=null;this.src='<?= APP_URL ?>/images/Logo_.jpg';" alt="<?= htmlspecialchars($bv['tieu_de']) ?>" class="w-full h-56 object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <div class="p-6">
                        <div class="text-xs mb-3 flex items-center" style="color: #999;">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <?= date('d/m/Y', strtotime($bv['ngay_tao'])) ?>
                        </div>
                        <h3 class="text-lg font-semibold mb-3 line-clamp-2 transition-colors" style="color: #111;">
                            <a href="<?= APP_URL ?>/chi-tiet-bai-viet?slug=<?= htmlspecialchars($bv['slug']) ?>" class="hover:opacity-75"><?= htmlspecialchars($bv['tieu_de']) ?></a>
                        </h3>
                        <p class="text-sm mb-4 line-clamp-3" style="color: #666;"><?= htmlspecialchars(strip_tags($bv['tom_tat'] ?? $bv['noi_dung'])) ?></p>
                        <a href="<?= APP_URL ?>/chi-tiet-bai-viet?slug=<?= htmlspecialchars($bv['slug']) ?>" class="inline-flex items-center text-sm font-semibold transition-opacity hover:opacity-75" style="color: #111;">
                            Đọc tiếp
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </article>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-1 md:col-span-3 text-center py-8 text-gray-500">
                    Chưa có bài viết nào được xuất bản.
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
