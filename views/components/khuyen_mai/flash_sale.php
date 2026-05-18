<?php
// views/components/khuyen_mai/flash_sale.php

$flash_sale_products = [
    [
        'ten' => 'Vòng Cổ Trầm Hương Tốc Kiến 108 Hạt',
        'hinh_anh' => APP_URL . '/images/san_pham/tram_huong_1.jpg',
        'gia_cu' => 2500000,
        'gia' => 1250000,
        'phan_tram_giam' => 50,
        'da_ban' => 85,
        'tong_so' => 100
    ],
    [
        'ten' => 'Vòng Tay Đá Ngọc Bích Tự Nhiên',
        'hinh_anh' => APP_URL . '/images/san_pham/ngoc_bich_1.jpg',
        'gia_cu' => 1800000,
        'gia' => 1080000,
        'phan_tram_giam' => 40,
        'da_ban' => 42,
        'tong_so' => 50
    ],
    [
        'ten' => 'Chuỗi Đá Thạch Anh Tóc Vàng',
        'hinh_anh' => APP_URL . '/images/san_pham/thach_anh_1.jpg',
        'gia_cu' => 3200000,
        'gia' => 2240000,
        'phan_tram_giam' => 30,
        'da_ban' => 12,
        'tong_so' => 20
    ],
    [
        'ten' => 'Vòng Đá Mã Não Đỏ May Mắn',
        'hinh_anh' => APP_URL . '/images/san_pham/ma_nao_1.jpg',
        'gia_cu' => 850000,
        'gia' => 425000,
        'phan_tram_giam' => 50,
        'da_ban' => 180,
        'tong_so' => 200
    ]
];
?>
<div class="bg-gradient-to-br from-[#1a1a1a] to-[#2a0808] rounded-3xl p-6 md:p-10 shadow-2xl relative overflow-hidden">
    <!-- Decorative background elements -->
    <div class="absolute top-0 right-0 w-64 h-64 bg-[#8B0000] rounded-full filter blur-[80px] opacity-30"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-[#D4AF37] rounded-full filter blur-[80px] opacity-10"></div>
    
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 relative z-10 border-b border-white/10 pb-6">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <iconify-icon icon="ph:lightning-fill" class="text-[#D4AF37] text-3xl animate-pulse"></iconify-icon>
                <h2 class="text-3xl md:text-4xl font-semibold font-bold text-white italic">FLASH SALE</h2>
            </div>
            <p class="text-gray-400">Giá hủy diệt - Giờ vàng giá sốc</p>
        </div>
        <div class="mt-4 md:mt-0 flex items-center gap-4">
            <span class="text-sm font-medium text-white/80">Kết thúc trong:</span>
            <div class="flex gap-2 text-center text-sm font-bold">
                <div class="bg-[#8B0000] text-white rounded w-10 h-10 flex items-center justify-center">02</div><span class="text-white mt-2">:</span>
                <div class="bg-[#8B0000] text-white rounded w-10 h-10 flex items-center justify-center">15</div><span class="text-white mt-2">:</span>
                <div class="bg-[#8B0000] text-white rounded w-10 h-10 flex items-center justify-center">45</div>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6 relative z-10">
        <?php foreach($flash_sale_products as $sp): 
            $percent = ($sp['da_ban'] / $sp['tong_so']) * 100;
        ?>
        <div class="bg-white rounded-2xl overflow-hidden group hover:shadow-[0_0_20px_rgba(212,175,55,0.3)] transition-all duration-300">
            <!-- Image Area -->
            <div class="relative aspect-square overflow-hidden bg-gray-100">
                <div class="absolute top-2 right-2 z-10 bg-[#8B0000] text-white text-xs font-bold px-2 py-1 rounded">
                    -<?= $sp['phan_tram_giam'] ?>%
                </div>
                
                <img src="<?= $sp['hinh_anh'] ?>" alt="<?= htmlspecialchars($sp['ten']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" onerror="this.src='<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg';">
                
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                    <button class="px-6 py-2 bg-[#D4AF37] text-white font-semibold rounded-full transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 hover:bg-amber-600">
                        Mua Ngay
                    </button>
                </div>
            </div>
            
            <!-- Info Area -->
            <div class="p-4">
                <a href="#" class="text-sm font-medium text-gray-800 hover:text-[#8B0000] line-clamp-2 mb-2 h-10">
                    <?= htmlspecialchars($sp['ten']) ?>
                </a>
                
                <div class="flex items-end gap-2 mb-3">
                    <span class="text-lg md:text-xl font-bold text-[#8B0000]"><?= number_format($sp['gia'], 0, ',', '.') ?>đ</span>
                    <span class="text-xs text-gray-400 line-through mb-1"><?= number_format($sp['gia_cu'], 0, ',', '.') ?>đ</span>
                </div>
                
                <!-- Progress Bar -->
                <div class="relative w-full h-4 bg-gray-200 rounded-full overflow-hidden">
                    <!-- Dynamic width based on percentage -->
                    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-red-500 to-[#8B0000] rounded-full" style="width: <?= $percent ?>%;"></div>
                    <!-- Text overlay -->
                    <div class="absolute inset-0 flex items-center justify-center text-[9px] font-bold text-white z-10 drop-shadow-md">
                        ĐÃ BÁN <?= $sp['da_ban'] ?>
                    </div>
                    <?php if($percent > 80): ?>
                        <!-- Fire icon for almost sold out -->
                        <iconify-icon icon="ph:fire-fill" class="absolute left-1 top-1/2 -translate-y-1/2 text-yellow-300 text-[10px] z-10 animate-pulse"></iconify-icon>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
