<?php
// views/components/User/khuyen_mai/khoi_freeship.php
?>
<section id="freeship" class="relative overflow-hidden rounded-2xl bg-[#8B0000] shadow-xl">
    <!-- Decorative SVG patterns -->
    <div class="absolute inset-0 opacity-10">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="dotPattern" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="2" fill="#ffffff" />
                </pattern>
            </defs>
            <rect x="0" y="0" width="100%" height="100%" fill="url(#dotPattern)" />
        </svg>
    </div>
    <div class="absolute -right-20 -top-20 w-64 h-64 bg-white/20 rounded-full blur-3xl"></div>
    
    <div class="relative z-10 p-8 md:p-12 flex flex-col md:flex-row items-center justify-between gap-8">
        <div class="flex items-center gap-6 md:gap-8">
            <div class="w-20 h-20 bg-white/10 rounded-full flex items-center justify-center backdrop-blur-sm border border-white/20 flex-shrink-0">
                <iconify-icon icon="mdi:truck-fast-outline" class="text-white text-4xl"></iconify-icon>
            </div>
            <div>
                <h3 class="font-semibold text-3xl md:text-4xl text-white font-bold mb-2">Miễn phí vận chuyển</h3>
                <div class="flex flex-col sm:flex-row sm:items-center gap-2 text-red-100">
                    <span class="bg-[#D4AF37] text-white text-xs uppercase font-bold px-2 py-1 rounded inline-block w-fit">Từ 500K</span>
                    <span>Áp dụng giao hàng tiêu chuẩn trên toàn quốc.</span>
                </div>
            </div>
        </div>
        
        <div class="w-full md:w-auto">
            <a href="#san-pham-sale" class="inline-flex items-center justify-center w-full md:w-auto px-8 py-3.5 bg-white text-[#8B0000] font-bold rounded-full hover:bg-gray-50 transition-colors shadow-lg hover:shadow-xl hover:-translate-y-0.5">
                Mua ngay nhận Freeship <iconify-icon icon="mdi:arrow-right" class="ml-2"></iconify-icon>
            </a>
        </div>
    </div>
</section>

