<section class="py-16 bg-white hidden" id="goi-y-section">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 border-b pb-4">
            <div>
                <h2 class="text-3xl font-bold mb-2" style="color:#8b0000;">Vòng Ngọc Đề Xuất</h2>
                <p class="text-gray-600">Tuyển tập những mẫu vòng phù hợp nhất với bản mệnh của bạn.</p>
            </div>
            <a href="<?= APP_URL ?>/san-pham" class="mt-4 md:mt-0 inline-flex items-center gap-1 text-sm font-semibold hover:underline" style="color:#d4af37;">
                Xem tất cả sản phẩm
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6" id="suggested-products">
            <!-- Product 1 -->
            <div class="group cursor-pointer">
                <div class="relative rounded-2xl overflow-hidden mb-4 shadow-sm border border-gray-100 group-hover:shadow-xl transition-all duration-300">
                    <div class="absolute top-3 right-3 z-10">
                        <span class="px-2 py-1 text-xs font-bold bg-white/90 backdrop-blur-sm rounded-md shadow-sm" style="color:#8b0000;">Tương sinh</span>
                    </div>
                    <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg" alt="Vòng Ngọc" class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <h3 class="font-bold text-gray-900 group-hover:text-[#8b0000] transition-colors line-clamp-2">Chuỗi Ngọc Trầm Hương Mix Lu Thống</h3>
                <div class="mt-2 flex items-center justify-between">
                    <span class="font-bold text-lg" style="color:#8b0000;">1.250.000đ</span>
                </div>
            </div>
            
            <!-- Product 2 -->
            <div class="group cursor-pointer">
                <div class="relative rounded-2xl overflow-hidden mb-4 shadow-sm border border-gray-100 group-hover:shadow-xl transition-all duration-300">
                    <div class="absolute top-3 right-3 z-10">
                        <span class="px-2 py-1 text-xs font-bold bg-white/90 backdrop-blur-sm rounded-md shadow-sm text-green-700">Tương hợp</span>
                    </div>
                    <img src="<?= APP_URL ?>/public/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-1.jpg" alt="Vòng Ngọc" class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <h3 class="font-bold text-gray-900 group-hover:text-[#8b0000] transition-colors line-clamp-2">Vòng Tay Đá Mã Não Xanh Rêu</h3>
                <div class="mt-2 flex items-center justify-between">
                    <span class="font-bold text-lg" style="color:#8b0000;">850.000đ</span>
                </div>
            </div>
            
            <!-- Product 3 -->
            <div class="group cursor-pointer">
                <div class="relative rounded-2xl overflow-hidden mb-4 shadow-sm border border-gray-100 group-hover:shadow-xl transition-all duration-300">
                    <img src="<?= APP_URL ?>/public/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg" alt="Vòng Ngọc" class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <h3 class="font-bold text-gray-900 group-hover:text-[#8b0000] transition-colors line-clamp-2">Chuỗi Ngọc Bích Nephrite Chạm Khắc</h3>
                <div class="mt-2 flex items-center justify-between">
                    <span class="font-bold text-lg" style="color:#8b0000;">3.500.000đ</span>
                </div>
            </div>
            
            <!-- Product 4 -->
            <div class="group cursor-pointer">
                <div class="relative rounded-2xl overflow-hidden mb-4 shadow-sm border border-gray-100 group-hover:shadow-xl transition-all duration-300">
                    <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Sâm Panh Thuần/sam-panh-thuan-1.jpg" alt="Vòng Ngọc" class="w-full aspect-square object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <h3 class="font-bold text-gray-900 group-hover:text-[#8b0000] transition-colors line-clamp-2">Vòng Trầm Tốc Tự Nhiên 108 Hạt</h3>
                <div class="mt-2 flex items-center justify-between">
                    <span class="font-bold text-lg" style="color:#8b0000;">2.100.000đ</span>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Logic to show suggestions when form is submitted
document.getElementById('fengshuiForm').addEventListener('submit', function(e) {
    document.getElementById('goi-y-section').classList.remove('hidden');
});
</script>
