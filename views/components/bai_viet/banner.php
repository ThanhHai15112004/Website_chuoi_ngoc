<div class="relative w-full bg-red-900 overflow-hidden mb-8">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="motif" width="40" height="40" patternUnits="userSpaceOnUse">
                    <path d="M20 0 L40 20 L20 40 L0 20 Z" fill="none" stroke="#FBBF24" stroke-width="1"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#motif)" />
        </svg>
    </div>

    <div class="container mx-auto px-4 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row items-center justify-between py-12 md:py-16 gap-8">
            <!-- Text Content -->
            <div class="w-full md:w-1/2 text-center md:text-left">
                <p class="text-yellow-500 font-medium tracking-widest text-sm uppercase mb-3 flex items-center justify-center md:justify-start gap-2">
                    <iconify-icon icon="ph:book-open-text"></iconify-icon>
                    Góc Tư Vấn
                </p>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-serif text-white mb-6 leading-tight">
                    Kiến Thức & Cẩm Nang <br class="hidden md:block" /> 
                    <span class="text-yellow-400">Trang Sức Phong Thuỷ</span>
                </h1>
                <p class="text-red-100 text-base md:text-lg mb-8 max-w-lg mx-auto md:mx-0 leading-relaxed">
                    Khám phá những câu chuyện đằng sau mỗi viên đá, cách chọn lựa và bảo quản vòng tay hợp mệnh để thu hút năng lượng bình an, tài lộc.
                </p>
            </div>
            
            <!-- Image Content -->
            <div class="w-full md:w-5/12 hidden md:block">
                <div class="relative rounded-t-full rounded-b-xl overflow-hidden border-4 border-red-800/50 shadow-2xl h-80">
                    <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg" 
                         alt="Góc tư vấn phong thủy" 
                         class="w-full h-full object-cover" />
                    <!-- Lớp phủ gradient nhẹ -->
                    <div class="absolute inset-0 bg-gradient-to-t from-red-900/60 to-transparent"></div>
                </div>
            </div>
        </div>
    </div>
</div>
