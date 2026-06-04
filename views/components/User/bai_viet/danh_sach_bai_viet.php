<?php if (!empty($recent_articles)): ?>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach ($recent_articles as $article): ?>
    <article class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg border border-gray-100 transition-all duration-300 group flex flex-col">
        <!-- Thumbnail -->
        <a href="<?= APP_URL ?>/chi-tiet-bai-viet?slug=<?= htmlspecialchars($article['slug']) ?>" class="block h-48 overflow-hidden relative">
            <img src="<?= $article['image'] ?>" alt="<?= htmlspecialchars($article['title']) ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            <!-- Overlay Category -->
            <span class="absolute top-3 left-3 px-3 py-1 bg-white/90 text-red-800 text-xs font-semibold rounded-full shadow-sm backdrop-blur-sm">
                <?= htmlspecialchars($article['category']) ?>
            </span>
        </a>
        
        <!-- Content -->
        <div class="p-5 flex-1 flex flex-col">
            <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
                <span class="flex items-center gap-1"><iconify-icon icon="ph:calendar-blank"></iconify-icon> <?= $article['date'] ?></span>
            </div>
            
            <a href="<?= APP_URL ?>/chi-tiet-bai-viet?slug=<?= htmlspecialchars($article['slug']) ?>" class="block mb-2 flex-1">
                <h3 class="text-lg font-serif text-gray-900 leading-snug group-hover:text-red-800 transition-colors line-clamp-2">
                    <?= htmlspecialchars($article['title']) ?>
                </h3>
            </a>
            
            <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                <?= htmlspecialchars($article['excerpt']) ?>
            </p>
            
            <div class="mt-auto pt-4 border-t border-gray-100">
                <a href="<?= APP_URL ?>/chi-tiet-bai-viet?slug=<?= htmlspecialchars($article['slug']) ?>" class="inline-flex items-center gap-1 text-red-800 font-medium text-sm hover:text-red-600 transition-colors group/link">
                    Đọc tiếp 
                    <iconify-icon icon="ph:arrow-right" class="transition-transform group-hover/link:translate-x-1"></iconify-icon>
                </a>
            </div>
        </div>
    </article>
    <?php endforeach; ?>
</div>
<?php else: ?>
    <div class="text-center py-10 bg-white rounded-xl border border-gray-100">
        <iconify-icon icon="ph:article-light" class="text-6xl text-gray-300 mb-3"></iconify-icon>
        <p class="text-gray-500">Chưa có bài viết nào trong mục này.</p>
    </div>
<?php endif; ?>
