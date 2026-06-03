<?php
// views/components/User/khuyen_mai/uu_dai_thanh_vien.php

$tiers = $hang_thanh_vien ?? [];
?>

<div class="mb-12 text-center pt-10">
    <span class="inline-block py-1 px-3 rounded-full bg-[#8B0000]/10 text-[#8B0000] text-sm font-semibold mb-3 tracking-wide">Chương Trình Khách Hàng Thân Thiết</span>
    <h2 class="text-3xl md:text-4xl font-sans font-bold text-gray-900 mb-4">Đặc Quyền Hội Viên</h2>
    <p class="text-gray-500 max-w-2xl mx-auto text-base leading-relaxed">Gắn kết cùng Chuỗi Ngọc để tận hưởng những ưu đãi và dịch vụ chăm sóc đặc quyền dành riêng cho bạn.</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 xl:gap-8 max-w-7xl mx-auto px-4 pb-16">
    <?php 
    foreach($tiers as $index => $t): 
        // Map classes directly in the view to ensure Tailwind CLI scans them
        $themeBg = 'bg-gray-50';
        $themeText = 'text-gray-600';
        $themeBorder = 'border-gray-200';
        $btnClass = 'border-gray-300 text-gray-600 hover:bg-gray-500 hover:text-white';
        $icon = 'ph:medal-light';
        
        $tenHang = mb_strtolower($t['name'], 'UTF-8');
        if (strpos($tenHang, 'đồng') !== false) {
            $icon = 'ph:medal-light';
            $themeBg = 'bg-orange-50';
            $themeText = 'text-orange-700';
            $themeBorder = 'border-orange-200';
            $btnClass = 'border-orange-300 text-orange-700 hover:bg-orange-600 hover:text-white hover:border-orange-600';
        } elseif (strpos($tenHang, 'bạc') !== false) {
            $icon = 'ph:medal-light';
            $themeBg = 'bg-slate-50';
            $themeText = 'text-slate-500';
            $themeBorder = 'border-slate-200';
            $btnClass = 'border-slate-300 text-slate-600 hover:bg-slate-500 hover:text-white hover:border-slate-500';
        } elseif (strpos($tenHang, 'vàng') !== false) {
            $icon = 'ph:crown-simple-light';
            $themeBg = 'bg-[#D4AF37]/10';
            $themeText = 'text-[#D4AF37]';
            $themeBorder = 'border-[#D4AF37]/30';
            $btnClass = 'border-[#D4AF37] text-[#B8860B] hover:bg-[#D4AF37] hover:text-white hover:border-[#D4AF37]';
        } elseif (strpos($tenHang, 'kim cương') !== false) {
            $icon = 'ph:diamond-light';
            $themeBg = 'bg-cyan-50';
            $themeText = 'text-cyan-600';
            $themeBorder = 'border-cyan-200';
            $btnClass = 'border-cyan-300 text-cyan-700 hover:bg-cyan-600 hover:text-white hover:border-cyan-600';
        }
    ?>
    <div class="relative bg-white rounded-2xl border <?= $themeBorder ?> shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col p-8 <?= !empty($t['is_popular']) ? 'md:-translate-y-4 ring-1 ring-[#D4AF37]/50 shadow-md' : '' ?>">
        
        <?php if(!empty($t['is_popular'])): ?>
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-10">
            <span class="bg-[#8B0000] text-white text-[10px] font-bold uppercase tracking-widest py-1.5 px-4 rounded-full shadow-sm">Phổ Biến Nhất</span>
        </div>
        <?php endif; ?>

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-5 <?= $themeBg ?> <?= $themeText ?>">
                <iconify-icon icon="<?= $icon ?>" class="text-3xl"></iconify-icon>
            </div>
            <h3 class="font-sans text-2xl font-bold tracking-wide <?= $themeText ?> mb-1"><?= htmlspecialchars($t['name']) ?></h3>
            <p class="text-gray-500 text-sm"><?= htmlspecialchars($t['subtitle']) ?></p>
        </div>
        
        <!-- Requirement -->
        <div class="bg-gray-50 rounded-lg py-3 text-center mb-8 border border-gray-100">
            <span class="text-[#8B0000] font-medium text-sm"><?= $t['req'] ?></span>
        </div>
        
        <!-- Benefits -->
        <ul class="space-y-4 mb-10 flex-1">
            <?php foreach($t['benefits'] as $idx => $benefit): ?>
            <li class="flex items-start">
                <iconify-icon icon="ph:check-circle-fill" class="mt-0.5 mr-3 text-lg <?= $themeText ?> flex-shrink-0"></iconify-icon>
                <span class="text-gray-600 text-sm leading-relaxed"><?= htmlspecialchars($benefit) ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
        
        <!-- CTA -->
        <div class="mt-auto">
            <button class="w-full py-3 rounded-lg border bg-transparent font-medium transition-colors duration-300 <?= $btnClass ?>">
                Khám Phá Chi Tiết
            </button>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Đăng ký nhận tin -->
<div class="bg-[#faf9f6] border-y border-[#D4AF37]/20 py-16 mt-8">
    <div class="max-w-5xl mx-auto px-4 text-center">
        <iconify-icon icon="ph:envelope-simple-open-light" class="text-5xl text-[#D4AF37] mb-4"></iconify-icon>
        <h3 class="text-2xl md:text-3xl font-sans font-bold text-gray-900 mb-3">Đăng Ký Nhận Thông Tin Ưu Đãi</h3>
        <p class="text-gray-500 mb-8 max-w-xl mx-auto">Để lại email để nhận ngay những thông báo sớm nhất về bộ sưu tập mới và các chương trình tri ân khách hàng từ Chuỗi Ngọc.</p>
        
        <form class="max-w-md mx-auto relative group">
            <input type="email" placeholder="Email của bạn..." class="w-full px-6 py-4 rounded-full border border-gray-200 outline-none text-gray-700 pr-36 focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all bg-white shadow-sm">
            <button type="button" class="absolute right-1.5 top-1.5 bottom-1.5 px-6 bg-[#8B0000] hover:bg-[#6a0000] text-white font-medium text-sm rounded-full transition-colors flex items-center">
                Đăng ký
            </button>
        </form>
    </div>
</div>


