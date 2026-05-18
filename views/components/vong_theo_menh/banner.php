<section class="relative overflow-hidden" style="background: linear-gradient(135deg, #FAF7F2 0%, #fff 40%, #fdf2f2 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 md:py-24">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 lg:gap-16 items-center">
            <!-- Left Content -->
            <div class="relative z-10" data-aos="fade-right">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full text-sm font-medium mb-6" style="background: rgba(212,175,55,0.12); color: #b5952f;">
                    <iconify-icon icon="mdi:star" class="text-base"></iconify-icon>
                    Cá nhân hóa theo năm sinh & bản mệnh
                </div>
                <h1 class="text-4xl font-bold leading-tight mb-6 text-gray-900">
                    Vòng Theo Mệnh<br/>
                    <span style="color:#8b0000; font-size: 0.85em;">Tìm chiếc vòng dành riêng cho bạn</span>
                </h1>
                <p class="text-sm mb-8 max-w-lg leading-relaxed text-gray-600">
                    Nhập năm sinh hoặc ngày sinh để khám phá mệnh phong thủy, màu sắc phù hợp và những mẫu vòng ngọc giúp bạn gửi gắm bình an, tài lộc và may mắn.
                </p>
                <div class="flex flex-wrap gap-4 mb-10">
                    <button onclick="document.getElementById('tra-cuu').scrollIntoView({behavior:'smooth'})" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 text-white font-semibold rounded-full shadow-lg transition-all duration-300 transform hover:-translate-y-0.5" style="background:#8b0000; box-shadow:0 8px 25px rgba(139,0,0,0.25);">
                        <iconify-icon icon="mdi:magnify" class="text-xl"></iconify-icon>
                        Tra cứu ngay
                    </button>
                    <button onclick="document.getElementById('bo-suu-tap').scrollIntoView({behavior:'smooth'})" class="inline-flex items-center justify-center gap-2 px-8 py-3.5 font-semibold rounded-full border-2 transition-all duration-300 hover:bg-gray-50" style="border-color:#8b0000; color:#8b0000; background:#fff;">
                        Xem bộ sưu tập
                    </button>
                </div>
            </div>
            
            <!-- Right Image -->
            <div class="relative z-10" data-aos="fade-left" data-aos-delay="200">
                <div class="rounded-3xl overflow-hidden shadow-2xl relative border-4 border-white">
                    <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-1.jpg" alt="Vòng Theo Mệnh" class="w-full h-[400px] md:h-[500px] object-cover">
                    <!-- Ánh sáng mờ / Vòng năng lượng overlay -->
                    <div class="absolute inset-0 bg-gradient-to-tr from-white/40 via-transparent to-transparent pointer-events-none"></div>
                </div>
                
                <!-- Floating Card 1 -->
                <div class="absolute -bottom-6 left-4 md:-left-6 bg-white p-4 rounded-2xl shadow-xl border border-gray-100 z-20" style="animation:float 3s ease-in-out infinite;">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background:#fdf2f2; color:#8b0000;">
                            <iconify-icon icon="mdi:check-circle-outline" class="text-2xl"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">Hợp mệnh 100%</p>
                            <p class="text-xs font-medium text-gray-500">Cá nhân hóa cho bạn</p>
                        </div>
                    </div>
                </div>
                
                <!-- Floating Card 2 -->
                <div class="absolute -top-6 right-4 md:-right-6 bg-white p-4 rounded-2xl shadow-xl border border-gray-100 hidden md:block z-20" style="animation:float 3s ease-in-out 1.5s infinite;">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-full flex items-center justify-center" style="background:rgba(212,175,55,0.1); color:#d4af37;">
                            <iconify-icon icon="mdi:sparkles" class="text-2xl"></iconify-icon>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-900">Đá tự nhiên</p>
                            <p class="text-xs font-medium text-gray-500">Tuyển chọn kỹ càng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Background Decor -->
    <div class="absolute top-0 right-0 -translate-y-1/4 translate-x-1/4 w-[600px] h-[600px] rounded-full blur-3xl pointer-events-none" style="background:rgba(212,175,55,0.06);"></div>
    <div class="absolute bottom-0 left-0 translate-y-1/4 -translate-x-1/4 w-[400px] h-[400px] rounded-full blur-3xl pointer-events-none" style="background:rgba(139,0,0,0.04);"></div>
</section>
