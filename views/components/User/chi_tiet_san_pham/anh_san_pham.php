<?php
/**
 * Component: Ảnh sản phẩm (Left Column)
 */
?>
<div class="product-gallery sticky top-24 font-inter w-full flex flex-col gap-4">
    
    <!-- Main Image -->
    <div class="relative w-full aspect-square md:h-[500px] md:aspect-auto rounded-2xl overflow-hidden bg-[#F9F8F6] shadow-sm mb-4 md:mb-0 group cursor-zoom-in border border-gray-100 flex items-center justify-center">
        <img id="main-product-image" src="<?= htmlspecialchars($san_pham['anh_chinh']) ?>" alt="<?= htmlspecialchars($san_pham['ten']) ?>" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
        
        <!-- Badges -->
        <div class="absolute top-4 left-4 flex flex-col gap-2">
            <?php if (!empty($san_pham['phan_tram_giam'])): ?>
                <span class="bg-[#8B0000] text-white text-[11px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wide">
                    Giảm <?= $san_pham['phan_tram_giam'] ?>%
                </span>
            <?php endif; ?>
            
            <?php if ($san_pham['da_ban'] > 100): ?>
                <span class="bg-gradient-to-r from-yellow-500 to-yellow-400 text-white text-[11px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wide shadow-sm">
                    Bán chạy
                </span>
            <?php endif; ?>
        </div>
    </div>

    <!-- Thumbnails (Below Main Image) -->
    <?php if (!empty($san_pham['danh_sach_anh']) && count($san_pham['danh_sach_anh']) > 1): ?>
        <div class="flex gap-3 overflow-x-auto pb-2 scrollbar-hide flex-shrink-0">
            <?php foreach ($san_pham['danh_sach_anh'] as $index => $anh): ?>
                <button type="button" 
                        class="thumbnail-btn flex-shrink-0 w-12 h-12 md:w-14 md:h-14 lg:w-16 lg:h-16 rounded-xl overflow-hidden border-2 transition-all duration-200 <?= $index === 0 ? 'border-[#8B0000] opacity-100' : 'border-transparent opacity-70 hover:opacity-100' ?> flex items-center justify-center bg-[#F9F8F6]"
                        data-image="<?= htmlspecialchars($anh) ?>"
                        onclick="changeMainImage(this, '<?= htmlspecialchars($anh) ?>')">
                    <img src="<?= htmlspecialchars($anh) ?>" alt="Thumbnail <?= $index + 1 ?>" class="w-full h-full object-cover">
                </button>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</div>

<script>
    function changeMainImage(button, imageUrl) {
        // Update main image source
        document.getElementById('main-product-image').src = imageUrl;
        
        // Update active state on thumbnails
        const thumbnails = document.querySelectorAll('.thumbnail-btn');
        thumbnails.forEach(btn => {
            btn.classList.remove('border-[#8B0000]', 'opacity-100');
            btn.classList.add('border-transparent', 'opacity-70');
        });
        
        // Set active state on clicked button
        button.classList.remove('border-transparent', 'opacity-70');
        button.classList.add('border-[#8B0000]', 'opacity-100');
    }
</script>
