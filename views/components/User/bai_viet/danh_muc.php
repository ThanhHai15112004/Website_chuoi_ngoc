<div class="w-full overflow-x-auto pb-4 no-scrollbar">
    <div class="flex items-center justify-center min-w-max gap-3 mx-auto">
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <?php
                    $cat_name = $category['name'] ?? $category['ten_danh_muc'] ?? '';
                    $cat_slug = $category['slug'] ?? '';
                    $is_active = false;
                    if (isset($category['active'])) {
                        $is_active = $category['active'];
                    } elseif (isset($current_category_slug)) {
                        $is_active = ($cat_slug === $current_category_slug);
                    }
                ?>
                <a href="<?= APP_URL ?>/bai-viet?danh_muc=<?= htmlspecialchars($cat_slug) ?>" 
                   class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300 border 
                   <?= $is_active 
                        ? 'bg-red-800 text-white border-red-800 shadow-md' 
                        : 'bg-white text-gray-600 border-gray-200 hover:border-red-300 hover:text-red-800 hover:bg-red-50' ?>">
                    <?= htmlspecialchars($cat_name) ?>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<style>
/* Hide scrollbar for Chrome, Safari and Opera */
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
/* Hide scrollbar for IE, Edge and Firefox */
.no-scrollbar {
    -ms-overflow-style: none;  /* IE and Edge */
    scrollbar-width: none;  /* Firefox */
}
</style>
