<!-- Section: Ưu đãi hôm nay -->
<section class="py-16 md:py-20" style="background: linear-gradient(135deg, #fdf2f2 0%, #FAF7F2 100%);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-10 text-center" data-aos="fade-up">
            <h2 class="text-3xl md:text-4xl font-bold mb-2" style="color: #111;">Ưu đãi hôm nay</h2>
            <p style="color: #888;">Nhanh tay — số lượng có hạn!</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Left: Vouchers -->
            <div class="lg:col-span-1 space-y-4" data-aos="fade-right">
                <h3 class="text-xl font-bold mb-4 flex items-center gap-2" style="color: #111;">
                    <svg class="w-6 h-6" style="color: #8b0000;" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                    </svg>
                    Mã giảm giá
                </h3>
                
                <?php
                $ma_giam_gia = [
                    ['tieu_de' => 'Giảm 10%', 'mo_ta' => 'Cho đơn từ 500K', 'ma_code' => 'NGOC10'],
                    ['tieu_de' => 'Freeship', 'mo_ta' => 'Cho đơn từ 300K', 'ma_code' => 'FREESHIP'],
                    ['tieu_de' => 'Giảm 50K', 'mo_ta' => 'Khách hàng mới', 'ma_code' => 'NEW50'],
                ];
                foreach($ma_giam_gia as $ma): ?>
                <div class="bg-white rounded-xl p-4 flex items-center justify-between relative overflow-hidden group transition-all duration-300 hover:shadow-md" style="border: 2px dashed #f5c6cb;">
                    <!-- Decor Circles -->
                    <div class="absolute top-1/2 -left-3 w-6 h-6 rounded-full -translate-y-1/2" style="background: #fdf2f2;"></div>
                    <div class="absolute top-1/2 -right-3 w-6 h-6 rounded-full -translate-y-1/2" style="background: #fdf2f2;"></div>
                    
                    <div class="pl-4">
                        <h4 class="font-bold text-lg" style="color: #8b0000;"><?= $ma['tieu_de'] ?></h4>
                        <p class="text-sm" style="color: #888;"><?= $ma['mo_ta'] ?></p>
                    </div>
                    <div class="pr-2 text-right">
                        <button class="px-4 py-1.5 text-sm font-semibold rounded-lg transition-all duration-300 border" style="background: #fdf2f2; color: #8b0000; border-color: #f5c6cb;" onmouseover="this.style.background='#8b0000';this.style.color='#fff';this.style.borderColor='#8b0000'" onmouseout="this.style.background='#fdf2f2';this.style.color='#8b0000';this.style.borderColor='#f5c6cb'">
                            Lưu mã
                        </button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Right: Flash Sale -->
            <div class="lg:col-span-2" data-aos="fade-left">
                <div class="flex flex-col sm:flex-row items-center justify-between mb-6">
                    <h3 class="text-xl font-bold flex items-center gap-2 mb-4 sm:mb-0" style="color: #111;">
                        <svg class="w-6 h-6 animate-pulse" style="color: #8b0000;" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.381z" clip-rule="evenodd"/>
                        </svg>
                        Flash Sale
                    </h3>
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-medium" style="color: #666;">Kết thúc sau:</span>
                        <div class="flex items-center gap-1 font-bold" id="flash-sale-timer">
                            <span class="px-2.5 py-1 rounded text-white text-sm shadow-sm" style="background: #8b0000;">05</span>
                            <span style="color: #8b0000;">:</span>
                            <span class="px-2.5 py-1 rounded text-white text-sm shadow-sm" style="background: #8b0000;">23</span>
                            <span style="color: #8b0000;">:</span>
                            <span class="px-2.5 py-1 rounded text-white text-sm shadow-sm" style="background: #8b0000;">18</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <?php
                    $giam_gia_soc = [
                        ['ten' => 'Vòng Trầm Hương Mộc Lâm', 'gia' => '1.500.000đ', 'gia_cu' => '2.500.000đ', 'da_ban' => 85, 'tong_cong' => 100, 'hinh_anh' => APP_URL . '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg'],
                        ['ten' => 'Chuỗi Đá Mã Não', 'gia' => '450.000đ', 'gia_cu' => '650.000đ', 'da_ban' => 120, 'tong_cong' => 150, 'hinh_anh' => APP_URL . '/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-1.jpg'],
                    ];
                    foreach($giam_gia_soc as $gg):
                        $phan_tram = round(($gg['da_ban'] / $gg['tong_cong']) * 100);
                    ?>
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 flex p-3 gap-4 group hover:shadow-lg transition-all duration-300">
                        <div class="w-1/3 aspect-square rounded-xl overflow-hidden relative">
                            <img src="<?= $gg['hinh_anh'] ?>" alt="<?= $gg['ten'] ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div class="absolute top-0 left-0 text-white text-[10px] font-bold px-2 py-0.5 rounded-br-lg" style="background: #d4af37;">
                                FLASH
                            </div>
                        </div>
                        <div class="w-2/3 flex flex-col justify-between py-1">
                            <div>
                                <h4 class="font-bold text-sm line-clamp-2 transition-colors" style="color: #111;">
                                    <a href="#" class="hover:opacity-75"><?= $gg['ten'] ?></a>
                                </h4>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="font-bold" style="color: #8b0000;"><?= $gg['gia'] ?></span>
                                    <span class="text-xs line-through" style="color: #bbb;"><?= $gg['gia_cu'] ?></span>
                                </div>
                            </div>
                            
                            <div class="mt-2">
                                <div class="flex justify-between text-[10px] font-medium mb-1" style="color: #999;">
                                    <span>Đã bán <?= $gg['da_ban'] ?></span>
                                </div>
                                <div class="w-full rounded-full h-1.5 overflow-hidden" style="background: #f0f0f0;">
                                    <div class="h-1.5 rounded-full" style="width: <?= $phan_tram ?>%; background: linear-gradient(90deg, #8b0000, #c0392b);"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
