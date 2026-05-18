<?php
// Xác định trang hiện tại để highlight menu
$trang_hien_tai = $trang_hien_tai ?? 'trang_chu';

$menu_items = [
    ['key' => 'trang_chu', 'label' => 'Trang chủ', 'url' => APP_URL . '/'],
    ['key' => 'san_pham', 'label' => 'Sản phẩm', 'url' => APP_URL . '/san-pham'],
    ['key' => 'vong_theo_menh', 'label' => 'Vòng Theo Mệnh', 'url' => APP_URL . '/vong-theo-menh'],
    ['key' => 'khuyen_mai', 'label' => 'Khuyến mãi', 'url' => APP_URL . '/khuyen-mai'],
    ['key' => 'bai_viet', 'label' => 'Bài viết', 'url' => APP_URL . '/bai-viet'],
    ['key' => 'lien_he', 'label' => 'Liên hệ', 'url' => APP_URL . '/lien-he'],
];
?>

<!-- Top Utility Bar -->
<div style="background: #111; color: #fff; font-size: 12px; letter-spacing: 0.02em;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-9">
            <div class="flex items-center gap-5">
                <a href="tel:0909123456" class="flex items-center gap-1.5 transition-opacity hover:opacity-80" style="color: #e5e5e5; text-decoration: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    <span class="hidden sm:inline">0909 123 456</span>
                </a>
                <a href="mailto:info@chuoingoc.vn" class="flex items-center gap-1.5 transition-opacity hover:opacity-80 hidden sm:flex" style="color: #e5e5e5; text-decoration: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>info@chuoingoc.vn</span>
                </a>
            </div>
            <div class="flex items-center gap-4">
                <span class="hidden md:inline" style="color: #d4af37;">✦ Miễn phí vận chuyển đơn từ 500K</span>
                <div class="flex items-center gap-3" style="border-left: 1px solid #333; padding-left: 12px; margin-left: 4px;">
                    <a href="#" style="color: #e5e5e5; text-decoration: none;" class="transition-opacity hover:opacity-80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" style="color: #e5e5e5; text-decoration: none;" class="transition-opacity hover:opacity-80">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738.098.119.112.224.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.359-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24 12.017 24c6.624 0 11.99-5.367 11.99-11.988C24.007 5.367 18.641.001 12.017.001z"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="sticky top-0 z-50" style="background: #fff; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-[72px]">

            <!-- Logo + Brand -->
            <div class="flex-shrink-0">
                <a href="<?= APP_URL ?>/" class="flex items-center gap-3" style="text-decoration: none;">
                    <img src="<?= APP_URL ?>/images/Logo_.jpg" alt="Chuỗi Ngọc Phong Thủy" 
                         style="height: 48px; width: 48px; border-radius: 10px; object-fit: cover; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                    <div class="hidden sm:block">
                        <div class="text-lg font-bold leading-tight" style="color: #8b0000;">Chuỗi Ngọc</div>
                        <div class="text-[10px] uppercase font-semibold" style="color: #d4af37; letter-spacing: 0.2em;">Phong Thủy</div>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation (centered) -->
            <nav class="hidden lg:flex items-center">
                <ul class="flex items-center gap-1">
                    <?php foreach($menu_items as $item):
                        $is_active = $trang_hien_tai === $item['key'];
                    ?>
                    <li>
                        <a href="<?= $item['url'] ?>" 
                           class="px-4 py-2 rounded-full text-sm font-medium transition-all"
                           style="color: <?= $is_active ? '#fff' : '#333' ?>; background: <?= $is_active ? '#8b0000' : 'transparent' ?>; text-decoration: none;"
                           onmouseover="<?= !$is_active ? "this.style.background='rgba(139,0,0,0.06)'; this.style.color='#8b0000'" : '' ?>"
                           onmouseout="<?= !$is_active ? "this.style.background='transparent'; this.style.color='#333'" : '' ?>">
                            <?= $item['label'] ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <!-- Right Actions -->
            <div class="flex items-center gap-2">
                <!-- Search Toggle -->
                <button onclick="document.getElementById('search-overlay').classList.toggle('hidden')" 
                        class="p-2.5 rounded-full transition-all" 
                        style="color: #555; background: transparent;"
                        onmouseover="this.style.background='#f5f5f5'; this.style.color='#8b0000'"
                        onmouseout="this.style.background='transparent'; this.style.color='#555'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                </button>

                <!-- Wishlist -->
                <a href="#" class="p-2.5 rounded-full transition-all hidden sm:flex" 
                   style="color: #555; background: transparent; text-decoration: none;"
                   onmouseover="this.style.background='#f5f5f5'; this.style.color='#8b0000'"
                   onmouseout="this.style.background='transparent'; this.style.color='#555'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </a>

                <!-- Cart Button -->
                <a href="<?= APP_URL ?>/gio-hang" class="p-2.5 rounded-full transition-all relative group" 
                   style="color: #555; background: transparent; text-decoration: none;"
                   onmouseover="this.style.background='#f5f5f5'; this.style.color='#8b0000'"
                   onmouseout="this.style.background='transparent'; this.style.color='#555'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    <span class="absolute -top-1 -right-1 text-white text-[10px] font-bold rounded-full flex items-center justify-center animate-bounce-slow shadow-sm" 
                          style="background: #8b0000; min-width: 18px; height: 18px; padding: 0 4px; box-shadow: 0 0 0 2px #fff;">3</span>
                </a>

                <!-- Divider -->
                <div class="hidden sm:block w-px h-7 mx-1" style="background: #e5e5e5;"></div>

                <!-- Account Dropdown -->
                <div class="relative group hidden sm:block">
                    <a href="<?= APP_URL ?>/tai-khoan" class="flex items-center gap-2 p-1.5 pr-3 rounded-full transition-all"
                       style="border: 1px solid rgba(139,0,0,0.2); background: rgba(139,0,0,0.02); text-decoration: none;">
                        <div class="w-7 h-7 rounded-full flex items-center justify-center text-white" style="background: #8b0000;">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <span class="text-sm font-medium" style="color: #8b0000;">Tài khoản</span>
                    </a>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-right z-50"
                         style="border: 1px solid #f0f0f0;">
                        <div class="p-2 space-y-1">
                            <a href="<?= APP_URL ?>/tai-khoan" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-800 rounded-lg transition-colors" style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Hồ sơ của tôi
                            </a>
                            <a href="<?= APP_URL ?>/tai-khoan" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-800 rounded-lg transition-colors" style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                Đơn mua
                            </a>
                            <a href="<?= APP_URL ?>/tai-khoan" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-800 rounded-lg transition-colors" style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                </svg>
                                Kho Voucher
                            </a>
                            <div class="h-px bg-gray-100 my-1"></div>
                            <a href="<?= APP_URL ?>/login" class="flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-colors" style="text-decoration: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                Đăng xuất
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Hotline CTA Button -->
                <a href="tel:0909123456" class="hidden md:flex items-center gap-1.5 px-4 py-2 rounded-full text-sm font-semibold transition-all"
                   style="background: #8b0000; color: #fff; text-decoration: none; box-shadow: 0 2px 8px rgba(139,0,0,0.25);"
                   onmouseover="this.style.background='#a01010'; this.style.boxShadow='0 4px 12px rgba(139,0,0,0.35)'"
                   onmouseout="this.style.background='#8b0000'; this.style.boxShadow='0 2px 8px rgba(139,0,0,0.25)'">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    Hotline
                </a>

                <!-- Mobile Menu Button -->
                <button id="btn-mobile-menu" class="lg:hidden p-2.5 rounded-full transition-all" 
                        style="color: #333; background: transparent;"
                        onmouseover="this.style.background='#f5f5f5'"
                        onmouseout="this.style.background='transparent'"
                        onclick="
                            var menu = document.getElementById('mobile-menu');
                            var isHidden = menu.classList.contains('hidden');
                            if(isHidden) {
                                menu.classList.remove('hidden');
                                menu.style.maxHeight = menu.scrollHeight + 'px';
                                menu.style.opacity = '1';
                            } else {
                                menu.style.maxHeight = '0';
                                menu.style.opacity = '0';
                                setTimeout(function(){ menu.classList.add('hidden'); }, 300);
                            }
                        ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Search Overlay -->
    <div id="search-overlay" class="hidden" style="background: #fff; border-top: 1px solid #f0f0f0; box-shadow: 0 8px 24px rgba(0,0,0,0.08);">
        <div class="max-w-3xl mx-auto px-4 py-5">
            <div class="relative">
                <input type="text" placeholder="Tìm kiếm vòng ngọc, đá phong thủy, trầm hương..." 
                       class="w-full pl-12 pr-24 py-3.5 rounded-2xl text-sm focus:outline-none transition-all"
                       style="border: 2px solid #e5e5e5; background: #fafafa; color: #333;"
                       onfocus="this.style.borderColor='#8b0000'; this.style.background='#fff'; this.style.boxShadow='0 0 0 4px rgba(139,0,0,0.06)'"
                       onblur="this.style.borderColor='#e5e5e5'; this.style.background='#fafafa'; this.style.boxShadow='none'">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 absolute left-4 top-1/2 -translate-y-1/2" fill="none" viewBox="0 0 24 24" stroke="#999" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <button class="absolute right-2 top-1/2 -translate-y-1/2 px-5 py-2 rounded-xl text-sm font-semibold transition-all"
                        style="background: #8b0000; color: #fff;"
                        onmouseover="this.style.background='#a01010'"
                        onmouseout="this.style.background='#8b0000'">
                    Tìm kiếm
                </button>
            </div>
            <!-- Quick search tags -->
            <div class="flex flex-wrap gap-2 mt-3">
                <?php $tags = ['Vòng ngọc bích', 'Trầm hương', 'Đá thạch anh', 'Vòng mệnh Kim', 'Tràng hạt']; ?>
                <?php foreach($tags as $tag): ?>
                <a href="<?= APP_URL ?>/san-pham?q=<?= urlencode($tag) ?>" 
                   class="px-3 py-1 rounded-full text-xs font-medium transition-all"
                   style="background: #f5f5f5; color: #666; text-decoration: none;"
                   onmouseover="this.style.background='rgba(139,0,0,0.08)'; this.style.color='#8b0000'"
                   onmouseout="this.style.background='#f5f5f5'; this.style.color='#666'">
                    <?= $tag ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden overflow-hidden transition-all" 
         style="max-height: 0; opacity: 0; transition: max-height 0.3s ease, opacity 0.3s ease; border-top: 1px solid #f0f0f0; background: #fff;">
        <nav class="px-4 py-3 space-y-1">
            <?php foreach($menu_items as $item):
                $is_active = $trang_hien_tai === $item['key'];
            ?>
            <a href="<?= $item['url'] ?>" class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all" 
               style="color: <?= $is_active ? '#8b0000' : '#333' ?>; background: <?= $is_active ? 'rgba(139,0,0,0.06)' : 'transparent' ?>; text-decoration: none;"
               onmouseover="<?= !$is_active ? "this.style.background='#f9f9f9'" : '' ?>"
               onmouseout="<?= !$is_active ? "this.style.background='transparent'" : '' ?>">
                <?php if($is_active): ?>
                <span style="width: 4px; height: 4px; border-radius: 50%; background: #8b0000;"></span>
                <?php endif; ?>
                <?= $item['label'] ?>
            </a>
            <?php endforeach; ?>
        </nav>

        <!-- Mobile Action Buttons -->
        <div class="px-4 pb-4 space-y-2">
            <div class="relative">
                <input type="text" placeholder="Tìm kiếm sản phẩm..." 
                       class="w-full rounded-xl px-4 py-3 text-sm focus:outline-none"
                       style="border: 1px solid #e5e5e5; background: #fafafa;">
            </div>
            <div class="flex gap-2">
                <a href="<?= APP_URL ?>/login" class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-xl text-sm font-medium transition-all"
                   style="border: 1px solid #ddd; color: #333; text-decoration: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Đăng nhập
                </a>
                <a href="tel:0909123456" class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-xl text-sm font-semibold transition-all"
                   style="background: #8b0000; color: #fff; text-decoration: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    Hotline
                </a>
            </div>
        </div>
    </div>
</header>
