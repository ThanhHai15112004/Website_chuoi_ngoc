<?php if (!empty($featured_articles)): ?>
    <?php
    $main_article = null;
    $side_articles = [];
    foreach ($featured_articles as $article) {
        if (!empty($article['is_main'])) {
            $main_article = $article;
        } else {
            $side_articles[] = $article;
        }
    }
    // Nếu không có bài main nào được chỉ định, lấy bài đầu tiên
    if (!$main_article && count($featured_articles) > 0) {
        $main_article = array_shift($featured_articles);
        $side_articles = $featured_articles;
    }
    ?>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Bài chính (Cột trái) -->
        <?php if ($main_article): ?>
        <div class="lg:col-span-8 group">
            <a href="<?= APP_URL ?>/bai-viet/chi-tiet" class="block overflow-hidden rounded-xl relative shadow-md h-[400px] lg:h-[500px]">
                <img src="<?= $main_article['image'] ?>" alt="<?= htmlspecialchars($main_article['title']) ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
                
                <!-- Content -->
                <div class="absolute bottom-0 left-0 w-full p-6 lg:p-8">
                    <span class="inline-block px-3 py-1 bg-red-800 text-white text-xs font-semibold rounded mb-3">
                        <?= htmlspecialchars($main_article['category']) ?>
                    </span>
                    <h3 class="text-2xl lg:text-3xl font-serif text-white leading-tight mb-3 group-hover:text-yellow-400 transition-colors">
                        <?= htmlspecialchars($main_article['title']) ?>
                    </h3>
                    <p class="text-gray-200 line-clamp-2 mb-4">
                        <?= htmlspecialchars($main_article['excerpt']) ?>
                    </p>
                    <div class="flex items-center gap-4 text-sm text-gray-300">
                        <span class="flex items-center gap-1"><iconify-icon icon="ph:calendar-blank"></iconify-icon> <?= $main_article['date'] ?></span>
                        <span class="flex items-center gap-1"><iconify-icon icon="ph:user"></iconify-icon> <?= htmlspecialchars($main_article['author']) ?></span>
                        <span class="flex items-center gap-1"><iconify-icon icon="ph:eye"></iconify-icon> <?= $main_article['views'] ?> lượt xem</span>
                    </div>
                </div>
            </a>
        </div>
        <?php endif; ?>

        <!-- Bài phụ (Cột phải) -->
        <?php if (!empty($side_articles)): ?>
        <div class="lg:col-span-4 flex flex-col gap-6">
            <?php foreach (array_slice($side_articles, 0, 2) as $article): ?>
            <a href="<?= APP_URL ?>/bai-viet/chi-tiet" class="block group flex-1 bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md border border-gray-100 transition-all flex flex-col">
                <div class="h-48 overflow-hidden relative">
                    <img src="<?= $article['image'] ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                    <span class="absolute top-3 left-3 px-2 py-1 bg-white/90 text-red-800 text-xs font-semibold rounded shadow-sm">
                        <?= htmlspecialchars($article['category']) ?>
                    </span>
                </div>
                <div class="p-5 flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-serif text-gray-900 leading-snug mb-2 group-hover:text-red-800 transition-colors line-clamp-2">
                            <?= htmlspecialchars($article['title']) ?>
                        </h3>
                        <div class="flex items-center gap-3 text-xs text-gray-500 mb-2">
                            <span class="flex items-center gap-1"><iconify-icon icon="ph:calendar-blank"></iconify-icon> <?= $article['date'] ?></span>
                            <span class="flex items-center gap-1"><iconify-icon icon="ph:eye"></iconify-icon> <?= $article['views'] ?></span>
                        </div>
                    </div>
                    <p class="text-gray-600 text-sm line-clamp-2">
                        <?= htmlspecialchars($article['excerpt']) ?>
                    </p>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
