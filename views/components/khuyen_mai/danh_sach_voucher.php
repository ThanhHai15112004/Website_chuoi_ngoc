<?php
// views/components/khuyen_mai/danh_sach_voucher.php

$vouchers = [
    [
        'title' => 'GIẢM 50K',
        'desc' => 'Cho đơn từ 500.000đ',
        'code' => 'CN50K',
        'date' => 'HSD: 30/12/2026',
        'type' => 'discount'
    ],
    [
        'title' => 'FREESHIP',
        'desc' => 'Tối đa 30K cho đơn từ 0đ',
        'code' => 'FSCN30',
        'date' => 'HSD: 15/11/2026',
        'type' => 'shipping'
    ],
    [
        'title' => 'GIẢM 10%',
        'desc' => 'Cho khách hàng mới',
        'code' => 'NEW10',
        'date' => 'HSD: Không giới hạn',
        'type' => 'new'
    ],
    [
        'title' => 'GIẢM 200K',
        'desc' => 'Cho đơn từ 3.000.000đ',
        'code' => 'CNVIP200',
        'date' => 'HSD: 30/12/2026',
        'type' => 'vip'
    ],
];
?>
<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-3xl font-semibold text-[#8B0000] mb-2 flex items-center gap-2">
            <iconify-icon icon="ph:ticket-fill" class="text-[#D4AF37]"></iconify-icon> Kho Voucher Siêu Hot
        </h2>
        <p class="text-gray-500 text-sm">Số lượng có hạn, lưu ngay kẻo lỡ!</p>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <?php foreach($vouchers as $index => $v): ?>
    <div class="relative group cursor-pointer animate-fade-in-up" style="animation-delay: <?= $index * 0.1 ?>s;">
        <!-- Card Container -->
        <div class="flex h-[120px] rounded-[18px] overflow-hidden bg-white shadow-sm border border-dashed border-[#8B0000]/40 group-hover:shadow-xl group-hover:border-[#8B0000] transition-all duration-300">
            
            <!-- Left part (Icon/Value) -->
            <div class="w-1/3 flex flex-col items-center justify-center relative
                <?php 
                    if($v['type'] == 'shipping') echo 'bg-teal-50 text-teal-700';
                    elseif($v['type'] == 'new') echo 'bg-blue-50 text-blue-700';
                    elseif($v['type'] == 'vip') echo 'bg-amber-50 text-amber-700';
                    else echo 'bg-[#8B0000]/5 text-[#8B0000]';
                ?>
            ">
                <!-- Left jagged edge effect via CSS pseudo if possible, or just a dotted line -->
                <div class="absolute right-0 top-0 bottom-0 w-px border-r-2 border-dashed border-[#8B0000]/30"></div>
                
                <iconify-icon icon="ph:<?= $v['type'] == 'shipping' ? 'truck' : ($v['type'] == 'vip' ? 'crown' : 'tag') ?>-fill" class="text-2xl mb-1"></iconify-icon>
                <div class="font-bold text-center leading-tight text-lg"><?= $v['title'] ?></div>
                
                <!-- Ticket cutouts -->
                <div class="absolute -top-3 -right-3 w-6 h-6 rounded-full bg-[#FAF9F6] border-b border-l border-dashed border-[#8B0000]/40"></div>
                <div class="absolute -bottom-3 -right-3 w-6 h-6 rounded-full bg-[#FAF9F6] border-t border-l border-dashed border-[#8B0000]/40"></div>
            </div>

            <!-- Right part (Details) -->
            <div class="w-2/3 p-4 flex flex-col justify-between relative bg-white">
                <div>
                    <h4 class="font-semibold text-gray-700 text-sm line-clamp-1 mb-1"><?= $v['desc'] ?></h4>
                    <p class="text-[10px] text-gray-400"><?= $v['date'] ?></p>
                </div>
                
                <div class="flex items-center justify-between mt-2">
                    <span class="text-xs font-mono font-bold text-[#8B0000] bg-[#8B0000]/5 px-2 py-0.5 rounded border border-[#8B0000]/20"><?= $v['code'] ?></span>
                    <?php if($index === 1): // Example of saved state ?>
                        <button class="text-xs font-bold px-3 py-1.5 rounded-full transition-colors bg-gray-100 text-[#8B0000] flex items-center gap-1 cursor-default">
                            <iconify-icon icon="ph:check-circle-fill"></iconify-icon> Đã lưu
                        </button>
                    <?php else: ?>
                        <button class="text-xs font-bold px-4 py-1.5 rounded-full transition-colors bg-[#8B0000] text-white hover:bg-red-900 shadow-sm">
                            Lưu
                        </button>
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
    </div>
    <?php endforeach; ?>
</div>
