<?php
// views/components/chi_tiet_bai_viet/header_bai_viet.php
?>
<div class="mb-8 border-b border-gray-100 pb-8">
    <div class="inline-block px-3 py-1 bg-[#8B1538]/10 text-[#8B1538] text-sm font-medium rounded-full mb-4">
        <?= htmlspecialchars($article['category']) ?>
    </div>
    
    <h1 class="text-3xl lg:text-4xl font-serif text-gray-900 leading-tight mb-6 font-bold">
        <?= htmlspecialchars($article['title']) ?>
    </h1>
    
    <div class="flex flex-wrap items-center text-sm text-gray-500 gap-4 mb-8">
        <div class="flex items-center gap-2">
            <span class="iconify text-lg" data-icon="ph:user-circle-light"></span>
            <span class="font-medium text-gray-700"><?= htmlspecialchars($article['author']) ?></span>
        </div>
        <div class="flex items-center gap-2">
            <span class="iconify text-lg" data-icon="ph:calendar-blank-light"></span>
            <span><?= htmlspecialchars($article['date']) ?></span>
        </div>
        <div class="flex items-center gap-2">
            <span class="iconify text-lg" data-icon="ph:clock-light"></span>
            <span><?= htmlspecialchars($article['reading_time']) ?></span>
        </div>
        <div class="flex items-center gap-2">
            <span class="iconify text-lg" data-icon="ph:eye-light"></span>
            <span><?= number_format($article['views']) ?> lượt xem</span>
        </div>
    </div>
    
    <div class="mx-auto w-full max-w-[800px] h-[400px] rounded-2xl overflow-hidden shadow-sm">
        <img src="<?= htmlspecialchars($article['image'] ?? '') ?>" alt="<?= htmlspecialchars($article['title'] ?? '') ?>" class="w-full h-full object-cover transition-transform duration-700" onerror="this.src='https://images.unsplash.com/photo-1611591437281-460bfbe1220a?q=80&w=1200&auto=format&fit=crop'">
    </div>
</div>
