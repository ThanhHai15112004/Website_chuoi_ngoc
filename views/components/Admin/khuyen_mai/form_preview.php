        <!-- RIGHT COLUMN: Live Preview -->
        <div class="w-full lg:w-[320px] xl:w-[360px] shrink-0">
            <div class="sticky top-6">
                <div class="bg-gray-100 rounded-xl p-4 border border-gray-200">
                    <h3 class="text-sm font-bold text-gray-800 mb-3 flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:eye-outline"></span> Xem trước hiển thị thẻ sản phẩm
                    </h3>
                    
                    <!-- Storefront Product Card Mockup -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden relative group">
                        
                        <!-- Badges -->
                        <div id="prev-sale-badge" class="absolute top-2 left-2 bg-[#6B0D18] text-white text-[10px] font-bold px-2 py-1 rounded shadow-sm z-10 transition-opacity">
                            <span id="prev-discount-val">-20%</span>
                        </div>
                        <div id="prev-flash-badge" class="absolute top-2 right-2 bg-gradient-to-r from-orange-500 to-red-500 text-white text-[10px] font-bold px-2 py-1 rounded-full shadow-sm z-10 flex items-center gap-1 transition-opacity">
                            <span class="iconify text-[10px]" data-icon="mdi:lightning-bolt"></span> FLASH SALE
                        </div>

                        <!-- Image -->
                        <div class="aspect-square bg-gray-50 relative overflow-hidden">
                            <img id="prev-img" src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            
                            <!-- Countdown Overlay -->
                            <div id="prev-countdown" class="absolute bottom-0 left-0 w-full bg-black/60 backdrop-blur-sm text-white text-[10px] py-1.5 flex justify-center items-center gap-1.5 transition-opacity">
                                <span>Kết thúc sau:</span>
                                <div class="flex items-center gap-0.5 font-mono font-bold">
                                    <span class="bg-white/20 px-1 rounded">03</span>:
                                    <span class="bg-white/20 px-1 rounded">15</span>:
                                    <span class="bg-white/20 px-1 rounded">42</span>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3">
                            <h4 id="prev-name" class="text-[13px] font-medium text-gray-800 line-clamp-2 leading-tight mb-2 hover:text-[#6B0D18] transition-colors cursor-pointer">Vòng Ngọc Bích Tài Lộc Hảo Hạng Tự Nhiên</h4>
                            
                            <div class="flex items-center gap-1.5 mb-2">
                                <span class="text-sm font-bold text-[#6B0D18]" id="prev-price-sale">680.000đ</span>
                                <span class="text-[11px] text-gray-400 line-through" id="prev-price-original">1.000.000đ</span>
                            </div>

                            <!-- Progress Bar -->
                            <div id="prev-progress" class="w-full bg-red-100 rounded-full h-3 relative overflow-hidden mb-2 transition-opacity">
                                <div class="bg-gradient-to-r from-red-500 to-[#6B0D18] h-full" style="width: 45%;"></div>
                                <span class="absolute inset-0 flex items-center justify-center text-[8px] font-bold text-white uppercase tracking-wider drop-shadow-md">Đã bán 45</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 text-xs text-gray-500 text-center">
                        * Giao diện xem trước có thể khác biệt đôi chút so với thực tế trên thiết bị di động.
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

