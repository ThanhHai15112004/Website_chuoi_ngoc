<?php
/**
 * Common Loading Component
 *
 * Props:
 * - $id: string (default 'global-loader')
 * - $fullscreen: boolean (default false)
 * - $text: string (optional)
 * - $hidden: boolean (default true)
 */
$id = $id ?? 'global-loader';
$fullscreen = isset($fullscreen) && $fullscreen;
$text = $text ?? 'Đang xử lý...';
$hidden = !isset($hidden) || $hidden ? 'hidden' : 'flex';

$containerClass = $fullscreen 
    ? "fixed inset-0 z-[100] bg-white/80 backdrop-blur-sm $hidden flex-col items-center justify-center" 
    : "absolute inset-0 z-10 bg-white/80 backdrop-blur-sm $hidden flex-col items-center justify-center rounded-xl";
?>
<div id="<?= $id ?>" class="<?= $containerClass ?>">
    <svg class="animate-spin h-8 w-8 text-crimson-600 mb-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    <?php if ($text): ?>
        <span class="text-sm font-medium text-gray-600 animate-pulse"><?= htmlspecialchars($text) ?></span>
    <?php endif; ?>
</div>

<!-- Simple Loading JS Helper -->
<script>
    function showLoading(id = 'global-loader') {
        const loader = document.getElementById(id);
        if (loader) {
            loader.classList.remove('hidden');
            loader.classList.add('flex');
        }
    }
    
    function hideLoading(id = 'global-loader') {
        const loader = document.getElementById(id);
        if (loader) {
            loader.classList.add('hidden');
            loader.classList.remove('flex');
        }
    }
</script>
