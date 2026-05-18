<?php
// views/components/khuyen_mai/banner_chinh.php
?>
<section class="bg-[#FFFDF9] py-12 md:py-20 relative overflow-hidden">
    <!-- Background decorative elements -->
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-[#F9F3E5] to-transparent opacity-60"></div>
    <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-[#8B0000] rounded-full opacity-5 blur-3xl"></div>
    
    <div class="container mx-auto px-4 max-w-7xl relative z-10">
        <div class="flex flex-col md:flex-row items-center gap-10 md:gap-16">
            
            <!-- Trái: Nội dung -->
            <div class="w-full md:w-1/2 text-center md:text-left space-y-6">
                <div class="inline-flex items-center bg-white px-3 py-1.5 rounded-full border border-amber-200 shadow-sm text-sm text-[#8B0000] font-medium mb-2">
                    <iconify-icon icon="mdi:sparkles" class="text-[#D4AF37] mr-1.5"></iconify-icon>
                    Ưu đãi tháng này
                </div>
                
                <h1 class="font-semibold text-4xl md:text-5xl lg:text-6xl text-gray-900 leading-tight">
                    Săn ưu đãi phong thủy <br/>
                    <span class="text-[#8B0000] font-style-italic relative">
                        Rinh vòng may mắn
                        <svg class="absolute w-full h-3 -bottom-1 left-0 text-[#D4AF37] opacity-60" viewBox="0 0 100 10" preserveAspectRatio="none">
                            <path d="M0 5 Q 50 15 100 5" stroke="currentColor" stroke-width="2" fill="transparent"/>
                        </svg>
                    </span>
                </h1>
                
                <p class="text-gray-600 text-base md:text-lg max-w-md mx-auto md:mx-0 leading-relaxed">
                    Khám phá các mẫu vòng ngọc, chuỗi đá phong thủy đang được ưu đãi cùng voucher freeship, giảm giá và quà tặng đặc biệt.
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4 pt-4">
                    <a href="#san-pham-sale" class="w-full sm:w-auto px-8 py-3.5 bg-[#8B0000] text-white font-semibold rounded-full hover:bg-[#660000] transition-colors shadow-lg hover:shadow-xl hover:-translate-y-0.5 text-center flex items-center justify-center">
                        Xem sản phẩm giảm giá <iconify-icon icon="mdi:arrow-right" class="ml-2"></iconify-icon>
                    </a>
                    <a href="#voucher-noi-bat" class="w-full sm:w-auto px-8 py-3.5 bg-white border-2 border-[#8B0000] text-[#8B0000] font-semibold rounded-full hover:bg-red-50 transition-colors text-center flex items-center justify-center">
                        <iconify-icon icon="mdi:ticket-percent-outline" class="mr-2 text-lg"></iconify-icon> Lưu voucher ngay
                    </a>
                </div>
            </div>
            
            <!-- Phải: Hình ảnh -->
            <div class="w-full md:w-1/2 relative mt-8 md:mt-0">
                <div class="relative w-full max-w-lg mx-auto aspect-square md:aspect-[4/3] rounded-2xl overflow-hidden shadow-2xl">
                    <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg" alt="Vòng ngọc ưu đãi" class="w-full h-full object-cover">
                    <!-- Overlay gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
                </div>
                
                <!-- Floating cards -->
                <div class="absolute -bottom-6 -left-6 md:-left-10 bg-white p-4 rounded-xl shadow-xl border border-gray-100 flex items-center gap-3 animate-bounce" style="animation-duration: 3s;">
                    <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-[#8B0000]">
                        <iconify-icon icon="mdi:percent" class="text-xl"></iconify-icon>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Giảm giá lên đến</p>
                        <p class="text-lg font-bold text-[#8B0000]">30% OFF</p>
                    </div>
                </div>
                
                <div class="absolute -top-6 -right-6 md:-right-8 bg-white p-3 rounded-xl shadow-xl border border-gray-100 flex items-center gap-2 animate-bounce" style="animation-duration: 4s; animation-delay: 1s;">
                    <iconify-icon icon="mdi:truck-fast" class="text-[#D4AF37] text-2xl"></iconify-icon>
                    <p class="text-sm font-bold text-gray-800">Freeship từ 500K</p>
                </div>
            </div>
            
        </div>
    </div>
</section>
