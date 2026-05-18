<!-- Phân trang -->
<?php if ($tong_trang > 1): ?>
<nav class="mt-10 flex items-center justify-center gap-1.5" aria-label="Phân trang">
    <!-- Nút Previous -->
    <a href="#" class="flex items-center justify-center w-10 h-10 rounded-xl border border-gray-200 text-charcoal-400 hover:border-crimson-300 hover:text-crimson-600 hover:bg-crimson-50 transition <?= $trang_hien_tai_phan_trang <= 1 ? 'opacity-40 pointer-events-none' : '' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </a>

    <?php for ($i = 1; $i <= min($tong_trang, 5); $i++): ?>
    <a href="<?= APP_URL ?>/products?page=<?= $i ?>" 
       class="flex items-center justify-center w-10 h-10 rounded-xl text-sm font-medium transition
       <?= $i === $trang_hien_tai_phan_trang 
           ? 'bg-crimson-600 text-white shadow-lg shadow-crimson-200 scale-105' 
           : 'border border-gray-200 text-charcoal-600 hover:border-crimson-300 hover:text-crimson-600 hover:bg-crimson-50' ?>">
        <?= $i ?>
    </a>
    <?php endfor; ?>

    <?php if ($tong_trang > 5): ?>
    <span class="flex items-center justify-center w-10 h-10 text-gray-400 text-sm">...</span>
    <a href="<?= APP_URL ?>/products?page=<?= $tong_trang ?>" class="flex items-center justify-center w-10 h-10 rounded-xl text-sm font-medium border border-gray-200 text-charcoal-600 hover:border-crimson-300 hover:text-crimson-600 hover:bg-crimson-50 transition">
        <?= $tong_trang ?>
    </a>
    <?php endif; ?>

    <!-- Nút Next -->
    <a href="#" class="flex items-center justify-center w-10 h-10 rounded-xl border border-gray-200 text-charcoal-400 hover:border-crimson-300 hover:text-crimson-600 hover:bg-crimson-50 transition <?= $trang_hien_tai_phan_trang >= $tong_trang ? 'opacity-40 pointer-events-none' : '' ?>">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</nav>
<?php endif; ?>
