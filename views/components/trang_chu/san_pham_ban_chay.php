<!-- Section: Sản phẩm bán chạy -->
<section class="py-16 md:py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-10" data-aos="fade-up">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold mb-2" style="color: #111;">Sản phẩm bán chạy</h2>
                <p style="color: #888;">Những mẫu vòng được khách hàng yêu thích nhất</p>
            </div>
            <a href="<?= APP_URL ?>/products" class="inline-flex items-center gap-1 font-semibold transition-colors mt-4 md:mt-0 group" style="color: #8b0000;">
                Xem tất cả
                <svg class="h-4 w-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-5 md:gap-8">
            <?php
            $san_pham_ban_chay = [
                ['ten' => 'Ngọc Tụ Nham Vân Mây', 'hop_menh' => 'Hợp mệnh Mộc, Hỏa', 'gia' => '850.000đ', 'gia_cu' => '1.000.000đ', 'danh_gia' => 4.9, 'nhan' => 'Bán chạy', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-3.jpg'],
                ['ten' => 'Vòng Thời Trang Xinh Yêu', 'hop_menh' => 'Hợp mệnh Kim, Thủy', 'gia' => '550.000đ', 'gia_cu' => null, 'danh_gia' => 4.8, 'nhan' => 'Mới', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Tràng Hạt/Vòng Thời Trang Xinh Yêu/thoi-trang-xinh-yeu-3.jpg'],
                ['ten' => 'Nhang Trầm Hương', 'hop_menh' => 'Tịnh tâm, an thần', 'gia' => '250.000đ', 'gia_cu' => '300.000đ', 'danh_gia' => 5.0, 'nhan' => '-10%', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-3.jpg'],
                ['ten' => 'Vòng Ngọc Tụ Nham Đẹp', 'hop_menh' => 'Cầu tài lộc, bình an', 'gia' => '1.200.000đ', 'gia_cu' => null, 'danh_gia' => 4.9, 'nhan' => 'Bán chạy', 'hinh_anh' => APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-4.jpg'],
            ];
            foreach ($san_pham_ban_chay as $index => $sp): ?>
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-xl transition-all duration-300 flex flex-col" data-aos="fade-up" data-aos-delay="<?= $index * 80 ?>">
                <!-- Image -->
                <div class="relative aspect-[4/5] overflow-hidden group/img" style="background: #f9f9f9;">
                    <a href="<?= APP_URL ?>/chi-tiet-san-pham" class="block w-full h-full">
                        <img src="<?= $sp['hinh_anh'] ?>" alt="<?= $sp['ten'] ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                    </a>
                    
                    <?php if($sp['nhan']): ?>
                    <div class="absolute top-3 left-3 px-2.5 py-1 rounded-md text-xs font-bold text-white shadow-md z-10" style="background: #8b0000;">
                        <?= $sp['nhan'] ?>
                    </div>
                    <?php endif; ?>

                    <button class="absolute top-3 right-3 p-2 rounded-full shadow-sm transition-all z-10" style="background: rgba(255,255,255,0.85); color: #999;" onmouseover="this.style.color='#8b0000'" onmouseout="this.style.color='#999'">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                    
                    <!-- Quick View Overlay -->
                    <div class="absolute inset-x-0 bottom-4 flex justify-center gap-2 opacity-0 group-hover/img:opacity-100 translate-y-4 group-hover/img:translate-y-0 transition-all duration-300 pointer-events-none z-10">
                        <a href="<?= APP_URL ?>/chi-tiet-san-pham" class="w-10 h-10 bg-white/95 backdrop-blur-sm text-gray-700 rounded-full flex items-center justify-center shadow-lg hover:bg-[#8B0000] hover:text-white transition pointer-events-auto" title="Xem chi tiết">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                        <button class="w-10 h-10 bg-white/95 backdrop-blur-sm text-gray-700 rounded-full flex items-center justify-center shadow-lg hover:bg-[#8B0000] hover:text-white transition pointer-events-auto" title="Thêm vào giỏ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-4 md:p-5 flex flex-col flex-grow">
                    <!-- Rating -->
                    <div class="flex items-center gap-1 mb-2">
                        <?php for($i=1; $i<=5; $i++): ?>
                        <svg class="w-3.5 h-3.5" style="color: <?= $i <= floor($sp['danh_gia']) ? '#d4af37' : '#ddd' ?>;" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <?php endfor; ?>
                        <span class="text-xs ml-1" style="color: #999;"><?= $sp['danh_gia'] ?></span>
                    </div>
                    
                    <h3 class="font-bold text-base md:text-lg line-clamp-2 mb-1" style="color: #111;">
                        <a href="#" class="hover:opacity-75 transition-opacity"><?= $sp['ten'] ?></a>
                    </h3>
                    <p class="text-xs mb-4" style="color: #999;"><?= $sp['hop_menh'] ?></p>
                    
                    <div class="mt-auto">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-lg font-bold" style="color: #8b0000;"><?= $sp['gia'] ?></span>
                            <?php if($sp['gia_cu']): ?>
                            <span class="text-sm line-through" style="color: #bbb;"><?= $sp['gia_cu'] ?></span>
                            <?php endif; ?>
                        </div>
                        <button class="w-full py-2.5 text-white font-medium rounded-xl transition-all duration-300 shadow-sm" style="background: linear-gradient(135deg, #8b0000, #9b111e);" onmouseover="this.style.opacity='0.9'" onmouseout="this.style.opacity='1'">
                            Thêm vào giỏ
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
