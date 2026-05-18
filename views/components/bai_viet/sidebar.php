<aside class="space-y-8">
    <!-- Bài đọc nhiều -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h3 class="text-lg font-serif text-red-900 mb-5 pb-3 border-b border-gray-100 flex items-center gap-2">
            <iconify-icon icon="ph:trend-up" class="text-red-700"></iconify-icon>
            Bài đọc nhiều
        </h3>
        
        <div class="space-y-5">
            <?php 
            // Giả lập lấy 4 bài đọc nhiều nhất từ recent_articles
            $popular_articles = !empty($recent_articles) ? array_slice($recent_articles, 0, 4) : [];
            foreach ($popular_articles as $index => $article): 
            ?>
            <a href="<?= APP_URL ?>/bai-viet/chi-tiet" class="flex gap-4 group">
                <div class="w-20 h-20 shrink-0 overflow-hidden rounded-lg">
                    <img src="<?= $article['image'] ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                </div>
                <div class="flex flex-col justify-center">
                    <h4 class="text-sm font-medium text-gray-800 line-clamp-2 leading-snug group-hover:text-red-800 transition-colors mb-1">
                        <?= htmlspecialchars($article['title']) ?>
                    </h4>
                    <span class="text-xs text-gray-500 flex items-center gap-1">
                        <iconify-icon icon="ph:calendar-blank"></iconify-icon> <?= $article['date'] ?>
                    </span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Từ khóa nổi bật -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
        <h3 class="text-lg font-serif text-red-900 mb-5 pb-3 border-b border-gray-100 flex items-center gap-2">
            <iconify-icon icon="ph:tag" class="text-red-700"></iconify-icon>
            Từ khóa nổi bật
        </h3>
        <div class="flex flex-wrap gap-2">
            <?php
            $tags = ['Vòng ngọc', 'Đá phong thủy', 'Mệnh Kim', 'Tài lộc', 'Bình an', 'Tình duyen', 'Quà tặng mẹ', 'Trầm hương', 'Thạch anh'];
            foreach ($tags as $tag):
            ?>
            <a href="#" class="px-3 py-1.5 bg-gray-50 border border-gray-200 rounded text-sm text-gray-600 hover:bg-red-50 hover:text-red-800 hover:border-red-200 transition-colors">
                <?= htmlspecialchars($tag) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Banner QC nhỏ -->
    <a href="<?= APP_URL ?>/vong-theo-menh" class="block overflow-hidden rounded-xl relative group">
        <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-1.jpg" alt="Tìm vòng theo mệnh" class="w-full h-64 object-cover transition-transform duration-700 group-hover:scale-105">
        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition-colors"></div>
        <div class="absolute inset-0 p-6 flex flex-col justify-center text-center items-center">
            <iconify-icon icon="ph:magic-wand" class="text-3xl text-yellow-400 mb-3"></iconify-icon>
            <h4 class="text-xl font-serif text-white mb-2">Tìm vòng hợp mệnh</h4>
            <p class="text-sm text-gray-200 mb-4">Nhập năm sinh để tìm vật phẩm phù hợp nhất với bạn</p>
            <span class="inline-block px-5 py-2 bg-yellow-500 text-red-900 font-medium rounded text-sm group-hover:bg-yellow-400 transition-colors">Tra cứu ngay</span>
        </div>
    </a>
</aside>
