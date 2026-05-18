<?php
// views/components/khuyen_mai/banner.php
// Banner khuyến mãi chính - Nền đỏ thẳm, bộ đếm giờ, sang trọng
?>
<section class="relative w-full overflow-hidden bg-gradient-to-br from-[#4a0000] via-[#8B0000] to-[#5a0000] flex items-center min-h-[450px] lg:h-[580px] py-16">
    <!-- Background Patterns -->
    <div class="absolute inset-0 opacity-10 pointer-events-none mix-blend-overlay">
        <svg class="absolute inset-0 w-full h-full" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="km-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M0 40L40 0H20L0 20M40 40V20L20 40" fill="currentColor" fill-opacity="0.2"></path>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#km-pattern)"></rect>
        </svg>
    </div>
    <!-- Golden glowing orbs -->
    <div class="absolute -bottom-20 -left-20 w-96 h-96 bg-[#D4AF37]/15 rounded-full blur-[100px] z-0"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#D4AF37]/10 rounded-full blur-[120px] z-0"></div>
    <div class="absolute top-1/2 left-1/3 w-60 h-60 bg-[#D4AF37]/5 rounded-full blur-[80px] z-0"></div>

    <div class="container max-w-7xl mx-auto px-4 lg:px-8 relative z-10 h-full flex flex-col justify-center">
        <div class="flex flex-col md:flex-row items-center gap-8 md:gap-16">
            
            <!-- Trái: Nội dung -->
            <div class="w-full md:w-1/2 text-center md:text-left space-y-5">
                <div class="inline-flex items-center bg-white/10 backdrop-blur-sm px-4 py-1.5 rounded-full border border-white/20 text-xs text-[#D4AF37] font-semibold animate-km-fade-in">
                    <iconify-icon icon="mdi:sparkles" class="mr-1.5"></iconify-icon>
                    Ưu đãi tháng này
                </div>
                
                <h1 class="text-3xl lg:text-4xl text-white leading-tight font-bold animate-km-fade-in" style="animation-delay: 0.1s;">
                    Săn ưu đãi phong thủy <br/>
                    <span class="text-[#D4AF37]">Rinh vòng may mắn</span>
                </h1>
                
                <p class="text-sm md:text-base text-gray-300 max-w-lg mx-auto md:mx-0 leading-relaxed animate-km-fade-in" style="animation-delay: 0.2s;">
                    Khám phá các mẫu vòng ngọc, chuỗi đá phong thủy đang được ưu đãi cùng voucher freeship, giảm giá và quà tặng đặc biệt.
                </p>

                <!-- Countdown Timer -->
                <div class="animate-km-fade-in" style="animation-delay: 0.3s;">
                    <p class="text-white/70 text-xs font-medium mb-3 uppercase tracking-wider flex items-center justify-center md:justify-start gap-2">
                        <iconify-icon icon="ph:clock-countdown-fill" class="text-[#D4AF37] text-lg"></iconify-icon> Ưu đãi kết thúc sau
                    </p>
                    <div class="flex items-center justify-center md:justify-start gap-3" id="km-banner-countdown">
                        <div class="flex flex-col items-center">
                            <div class="w-14 h-14 md:w-16 md:h-16 rounded-xl bg-black/30 border border-white/15 backdrop-blur-sm flex items-center justify-center">
                                <span class="text-2xl md:text-3xl font-bold text-white km-countdown-days">02</span>
                            </div>
                            <span class="text-[10px] text-gray-400 mt-1.5 uppercase tracking-wider">Ngày</span>
                        </div>
                        <span class="text-lg text-white/40 font-bold -mt-5">:</span>
                        <div class="flex flex-col items-center">
                            <div class="w-14 h-14 md:w-16 md:h-16 rounded-xl bg-black/30 border border-white/15 backdrop-blur-sm flex items-center justify-center">
                                <span class="text-2xl md:text-3xl font-bold text-white km-countdown-hours">14</span>
                            </div>
                            <span class="text-[10px] text-gray-400 mt-1.5 uppercase tracking-wider">Giờ</span>
                        </div>
                        <span class="text-lg text-white/40 font-bold -mt-5">:</span>
                        <div class="flex flex-col items-center">
                            <div class="w-14 h-14 md:w-16 md:h-16 rounded-xl bg-black/30 border border-white/15 backdrop-blur-sm flex items-center justify-center">
                                <span class="text-2xl md:text-3xl font-bold text-white km-countdown-minutes">30</span>
                            </div>
                            <span class="text-[10px] text-gray-400 mt-1.5 uppercase tracking-wider">Phút</span>
                        </div>
                        <span class="text-lg text-white/40 font-bold -mt-5">:</span>
                        <div class="flex flex-col items-center">
                            <div class="w-14 h-14 md:w-16 md:h-16 rounded-xl bg-black/30 border border-[#D4AF37]/30 backdrop-blur-sm flex items-center justify-center">
                                <span class="text-2xl md:text-3xl font-bold text-[#D4AF37] km-countdown-seconds">59</span>
                            </div>
                            <span class="text-[10px] text-[#D4AF37]/70 mt-1.5 uppercase tracking-wider">Giây</span>
                        </div>
                    </div>
                </div>
                
                <div class="flex flex-col sm:flex-row items-center justify-center md:justify-start gap-4 pt-2 animate-km-fade-in" style="animation-delay: 0.4s;">
                    <a href="#san-pham-sale" class="w-full sm:w-auto px-8 py-3 bg-gradient-to-r from-[#D4AF37] to-[#B8860B] text-black text-sm font-bold rounded-full transition-all shadow-[0_0_20px_rgba(212,175,55,0.3)] hover:shadow-[0_0_30px_rgba(212,175,55,0.5)] hover:-translate-y-0.5 text-center flex items-center justify-center">
                        Xem sản phẩm giảm giá <iconify-icon icon="mdi:arrow-right" class="ml-2"></iconify-icon>
                    </a>
                    <a href="#voucher-noi-bat" class="w-full sm:w-auto px-8 py-3 bg-transparent border-2 border-[#D4AF37]/60 text-[#D4AF37] text-sm font-semibold rounded-full hover:bg-[#D4AF37]/10 transition-all text-center flex items-center justify-center">
                        <iconify-icon icon="mdi:ticket-percent-outline" class="mr-2 text-lg"></iconify-icon> Lưu voucher ngay
                    </a>
                </div>

                <!-- Stats row - lấp đầy khoảng trống -->
                <div class="flex items-center justify-center md:justify-start gap-6 pt-3 animate-km-fade-in" style="animation-delay: 0.5s;">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-full bg-white/10 border border-white/15 flex items-center justify-center">
                            <iconify-icon icon="mdi:shield-check" class="text-[#D4AF37] text-xl"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-white text-sm font-bold">100%</p>
                            <p class="text-gray-400 text-[10px] uppercase tracking-wide">Chính hãng</p>
                        </div>
                    </div>
                    <div class="w-px h-8 bg-white/15"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-full bg-white/10 border border-white/15 flex items-center justify-center">
                            <iconify-icon icon="mdi:star-circle" class="text-[#D4AF37] text-xl"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-white text-sm font-bold">10,000+</p>
                            <p class="text-gray-400 text-[10px] uppercase tracking-wide">Đã bán</p>
                        </div>
                    </div>
                    <div class="w-px h-8 bg-white/15"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-full bg-white/10 border border-white/15 flex items-center justify-center">
                            <iconify-icon icon="mdi:cash-refund" class="text-[#D4AF37] text-xl"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-white text-sm font-bold">30 ngày</p>
                            <p class="text-gray-400 text-[10px] uppercase tracking-wide">Đổi trả</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Phải: Hình ảnh -->
            <div class="w-full md:w-1/2 relative mt-4 md:mt-0 animate-km-fade-in hidden md:flex items-center justify-center" style="animation-delay: 0.5s;">
                <div class="relative w-full max-w-lg mx-auto rounded-2xl overflow-hidden shadow-2xl border border-white/10 aspect-[4/3]">
                    <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg" alt="Vòng ngọc ưu đãi" class="w-full h-full object-cover object-center" onerror="this.src='https://images.unsplash.com/photo-1611085583191-a3b181a88401?auto=format&fit=crop&q=80';">
                    <!-- Overlay gradient -->
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
                    <!-- Badge trên ảnh -->

                </div>
                
                <!-- Floating cards -->
                <div class="absolute -bottom-3 -left-3 md:-left-6 bg-white p-3 rounded-xl shadow-xl border border-gray-100 flex items-center gap-2.5 animate-km-float z-20">
                    <div class="w-9 h-9 rounded-full bg-red-100 flex items-center justify-center text-[#8B0000]">
                        <iconify-icon icon="mdi:percent" class="text-xl"></iconify-icon>
                    </div>
                    <div>
                        <p class="text-xs text-gray-500 font-medium">Giảm giá lên đến</p>
                        <p class="text-xl font-bold text-[#8B0000]">30% OFF</p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const endDate = new Date();
    endDate.setDate(endDate.getDate() + 2);
    endDate.setHours(endDate.getHours() + 14);
    endDate.setMinutes(endDate.getMinutes() + 30);

    function updateBannerCountdown() {
        const now = new Date();
        const diff = endDate - now;
        if (diff > 0) {
            const d = Math.floor(diff / (1000 * 60 * 60 * 24));
            const h = Math.floor((diff / (1000 * 60 * 60)) % 24);
            const m = Math.floor((diff / 1000 / 60) % 60);
            const s = Math.floor((diff / 1000) % 60);
            const el = (sel) => document.querySelector(sel);
            if(el('.km-countdown-days')) el('.km-countdown-days').textContent = d.toString().padStart(2, '0');
            if(el('.km-countdown-hours')) el('.km-countdown-hours').textContent = h.toString().padStart(2, '0');
            if(el('.km-countdown-minutes')) el('.km-countdown-minutes').textContent = m.toString().padStart(2, '0');
            if(el('.km-countdown-seconds')) el('.km-countdown-seconds').textContent = s.toString().padStart(2, '0');
        }
    }
    updateBannerCountdown();
    setInterval(updateBannerCountdown, 1000);
});
</script>

<style>
@keyframes km-fade-in {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
}
.animate-km-fade-in {
    animation: km-fade-in 0.7s ease-out forwards;
    opacity: 0;
}
@keyframes km-float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}
.animate-km-float {
    animation: km-float 4s ease-in-out infinite;
}
</style>
