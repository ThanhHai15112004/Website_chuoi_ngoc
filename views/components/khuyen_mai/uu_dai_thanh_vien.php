<?php
// views/components/khuyen_mai/uu_dai_thanh_vien.php

$tiers = [
    [
        'name' => 'SILVER',
        'subtitle' => 'Hội Viên Bạc',
        'icon' => 'ph:medal-light',
        'theme_text' => 'text-slate-500',
        'theme_bg' => 'bg-slate-50',
        'theme_border' => 'border-slate-200',
        'btn_class' => 'border-slate-300 text-slate-600 hover:bg-slate-500 hover:text-white hover:border-slate-500',
        'req' => 'Chi tiêu từ 1tr - 5tr',
        'benefits' => [
            'Giảm 2% mọi đơn hàng',
            'Tặng voucher 50K dịp sinh nhật',
            'Miễn phí đánh bóng 1 lần/năm'
        ]
    ],
    [
        'name' => 'GOLD',
        'subtitle' => 'Hội Viên Vàng',
        'icon' => 'ph:crown-simple-light',
        'theme_text' => 'text-[#D4AF37]',
        'theme_bg' => 'bg-[#D4AF37]/10',
        'theme_border' => 'border-[#D4AF37]/30',
        'btn_class' => 'border-[#D4AF37] text-[#B8860B] hover:bg-[#D4AF37] hover:text-white hover:border-[#D4AF37]',
        'req' => 'Chi tiêu từ 5tr - 20tr',
        'benefits' => [
            'Giảm 5% mọi đơn hàng',
            'Tặng voucher 200K dịp sinh nhật',
            'Miễn phí đánh bóng 3 lần/năm',
            'Freeship toàn quốc'
        ],
        'is_popular' => true
    ],
    [
        'name' => 'DIAMOND',
        'subtitle' => 'Hội Viên Kim Cương',
        'icon' => 'ph:diamond-light',
        'theme_text' => 'text-cyan-600',
        'theme_bg' => 'bg-cyan-50',
        'theme_border' => 'border-cyan-200',
        'btn_class' => 'border-cyan-300 text-cyan-700 hover:bg-cyan-600 hover:text-white hover:border-cyan-600',
        'req' => 'Chi tiêu trên 20tr',
        'benefits' => [
            'Giảm 10% mọi đơn hàng',
            'Tặng voucher 500K dịp sinh nhật',
            'Miễn phí bảo dưỡng trọn đời',
            'Freeship hỏa tốc',
            'Quà tặng độc quyền Lễ/Tết'
        ]
    ]
];
?>

<div class="mb-12 text-center pt-10">
    <span class="inline-block py-1 px-3 rounded-full bg-[#8B0000]/10 text-[#8B0000] text-sm font-semibold mb-3 tracking-wide">Chương Trình Khách Hàng Thân Thiết</span>
    <h2 class="text-3xl md:text-4xl font-serif text-gray-900 mb-4">Đặc Quyền Hội Viên</h2>
    <p class="text-gray-500 max-w-2xl mx-auto text-base leading-relaxed">Gắn kết cùng Chuỗi Ngọc để tận hưởng những ưu đãi và dịch vụ chăm sóc đặc quyền dành riêng cho bạn.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto px-4 pb-16">
    <?php foreach($tiers as $index => $t): ?>
    <div class="relative bg-white rounded-2xl border <?= $t['theme_border'] ?> shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col p-8 <?= !empty($t['is_popular']) ? 'md:-translate-y-4 ring-1 ring-[#D4AF37]/50 shadow-md' : '' ?>">
        
        <?php if(!empty($t['is_popular'])): ?>
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 z-10">
            <span class="bg-[#8B0000] text-white text-[10px] font-bold uppercase tracking-widest py-1.5 px-4 rounded-full shadow-sm">Phổ Biến Nhất</span>
        </div>
        <?php endif; ?>

        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full mb-5 <?= $t['theme_bg'] ?> <?= $t['theme_text'] ?>">
                <iconify-icon icon="<?= $t['icon'] ?>" class="text-3xl"></iconify-icon>
            </div>
            <h3 class="font-serif text-2xl font-bold tracking-wide <?= $t['theme_text'] ?> mb-1"><?= $t['name'] ?></h3>
            <p class="text-gray-500 text-sm"><?= $t['subtitle'] ?></p>
        </div>
        
        <!-- Requirement -->
        <div class="bg-gray-50 rounded-lg py-3 text-center mb-8 border border-gray-100">
            <span class="text-[#8B0000] font-medium text-sm"><?= $t['req'] ?></span>
        </div>
        
        <!-- Benefits -->
        <ul class="space-y-4 mb-10 flex-1">
            <?php foreach($t['benefits'] as $idx => $benefit): ?>
            <li class="flex items-start">
                <iconify-icon icon="ph:check-circle-fill" class="mt-0.5 mr-3 text-lg <?= $t['theme_text'] ?> flex-shrink-0"></iconify-icon>
                <span class="text-gray-600 text-sm leading-relaxed"><?= $benefit ?></span>
            </li>
            <?php endforeach; ?>
        </ul>
        
        <!-- CTA -->
        <div class="mt-auto">
            <button class="w-full py-3 rounded-lg border bg-transparent font-medium transition-colors duration-300 <?= $t['btn_class'] ?>">
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
        <h3 class="text-2xl md:text-3xl font-serif text-gray-900 mb-3">Đăng Ký Nhận Thông Tin Ưu Đãi</h3>
        <p class="text-gray-500 mb-8 max-w-xl mx-auto">Để lại email để nhận ngay những thông báo sớm nhất về bộ sưu tập mới và các chương trình tri ân khách hàng từ Chuỗi Ngọc.</p>
        
        <form class="max-w-md mx-auto relative group">
            <input type="email" placeholder="Email của bạn..." class="w-full px-6 py-4 rounded-full border border-gray-200 outline-none text-gray-700 pr-36 focus:border-[#D4AF37] focus:ring-1 focus:ring-[#D4AF37] transition-all bg-white shadow-sm">
            <button type="button" class="absolute right-1.5 top-1.5 bottom-1.5 px-6 bg-[#8B0000] hover:bg-[#6a0000] text-white font-medium text-sm rounded-full transition-colors flex items-center">
                Đăng ký
            </button>
        </form>
    </div>
</div>

