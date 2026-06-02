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
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

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
<header id="main-header" class="sticky top-0 z-50 w-full transition-all duration-300" style="background: #fff; box-shadow: 0 2px 12px rgba(0,0,0,0.06);">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div id="header-container" class="flex items-center justify-between transition-all duration-300" style="height: 60px;">

            <!-- Logo + Brand -->
            <div class="flex-shrink-0">
                <a href="<?= APP_URL ?>/" class="flex items-center gap-3" style="text-decoration: none;">
                    <img id="header-logo" src="<?= APP_URL ?>/images/Logo_.jpg" alt="Chuỗi Ngọc Phong Thủy" 
                         class="transition-all duration-300"
                         style="height: 48px; width: 48px; border-radius: 10px; object-fit: cover; box-shadow: 0 2px 8px rgba(0,0,0,0.08);">
                    <div class="hidden sm:block">
                        <div id="header-brand-name" class="font-bold leading-tight transition-all duration-300" style="color: #8b0000; font-size: 1.125rem;">Chuỗi Ngọc</div>
                        <div class="text-[10px] uppercase font-semibold" style="color: #d4af37; letter-spacing: 0.2em;">Phong Thủy</div>
                    </div>
                </a>
            </div>

            <!-- Desktop Navigation (centered) -->
            <nav class="hidden lg:flex items-center">
                <ul class="flex items-center gap-0.5">
                    <?php foreach($menu_items as $item):
                        $is_active = $trang_hien_tai === $item['key'];
                    ?>
                    <li>
                        <a href="<?= $item['url'] ?>" 
                           class="px-3 py-2 rounded-full text-sm font-semibold whitespace-nowrap transition-all"
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
                <a href="<?= APP_URL ?>/tai-khoan#tab-yeu-thich" class="p-2.5 rounded-full transition-all hidden sm:flex relative group items-center justify-center cursor-pointer" 
                   style="color: #555; background: transparent; text-decoration: none;"
                   onmouseover="this.style.background='#f5f5f5'; this.style.color='#8b0000'"
                   onmouseout="this.style.background='transparent'; this.style.color='#555'">
                    <iconify-icon icon="ph:heart-bold" class="text-xl group-hover:scale-110 transition-transform"></iconify-icon>
                    <span class="absolute top-0 right-0 text-white text-[10px] font-bold rounded-full flex items-center justify-center shadow-sm" 
                          style="background: #8b0000; min-width: 16px; height: 16px; padding: 0 4px; box-shadow: 0 0 0 2px #fff; transform: translate(15%, -15%);">5</span>
                </a>

                <!-- Notification Dropdown -->
                <div class="relative group hidden sm:block">
                    <button class="p-2.5 rounded-full transition-all relative flex items-center justify-center cursor-pointer" 
                       style="color: #555; background: transparent; border: none; outline: none;"
                       onmouseover="this.style.background='#f5f5f5'; this.style.color='#8b0000'"
                       onmouseout="this.style.background='transparent'; this.style.color='#555'">
                        <iconify-icon icon="ph:bell-bold" class="text-xl group-hover:scale-110 transition-transform"></iconify-icon>
                        <span class="absolute top-0 right-0 text-white text-[10px] font-bold rounded-full flex items-center justify-center shadow-sm" 
                              style="background: #8b0000; min-width: 16px; height: 16px; padding: 0 4px; box-shadow: 0 0 0 2px #fff; transform: translate(15%, -15%);">3</span>
                    </button>
                    
                    <!-- Notification Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-80 bg-white rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right z-50 flex flex-col"
                         style="border: 1px solid rgba(139,0,0,0.1); overflow: hidden;">
                        
                        <!-- Dropdown Header -->
                        <div class="p-3 border-b flex justify-between items-center" style="border-color: #f0f0f0; background: #fafafa;">
                            <h3 class="text-sm font-bold m-0" style="color: #8b0000;">Thông báo mới nhận</h3>
                            <span class="text-xs text-gray-500 hover:text-red-700 cursor-pointer transition-colors">Đánh dấu đã đọc</span>
                        </div>
                        
                        <!-- Dropdown Body -->
                        <div class="max-h-[300px] overflow-y-auto" style="scrollbar-width: thin; scrollbar-color: #e5e5e5 transparent;">
                            <!-- Item 1 -->
                            <a href="<?= APP_URL ?>/tai-khoan#tab-hop-thu" class="flex gap-3 p-3 hover:bg-red-50 transition-colors border-b last:border-b-0 bg-red-50/40" style="border-color: #f5f5f5; text-decoration: none;">
                                <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center text-white shadow-sm" style="background: linear-gradient(135deg, #8b0000, #b22222);">
                                    <iconify-icon icon="ph:package-bold" class="text-lg"></iconify-icon>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-800 line-clamp-1 m-0">Đơn hàng #DH12345 đã được giao</h4>
                                    <p class="text-xs text-gray-500 mt-1 line-clamp-2 leading-relaxed">Đơn hàng vòng trầm hương của bạn đã giao thành công. Vui lòng xác nhận!</p>
                                    <span class="text-[10px] text-gray-400 mt-1.5 block font-medium">2 giờ trước</span>
                                </div>
                                <div class="w-2 h-2 rounded-full bg-red-600 mt-1.5 flex-shrink-0"></div>
                            </a>
                            <!-- Item 2 -->
                            <a href="<?= APP_URL ?>/tai-khoan#tab-hop-thu" class="flex gap-3 p-3 hover:bg-red-50 transition-colors border-b last:border-b-0" style="border-color: #f5f5f5; text-decoration: none;">
                                <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center text-white shadow-sm" style="background: linear-gradient(135deg, #d4af37, #f1c40f);">
                                    <iconify-icon icon="ph:ticket-bold" class="text-lg"></iconify-icon>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-800 line-clamp-1 m-0">Voucher giảm 20% tháng này!</h4>
                                    <p class="text-xs text-gray-500 mt-1 line-clamp-2 leading-relaxed">Lưu ngay mã GIAM20 để được giảm giá cho đơn hàng Vòng Mệnh Thuỷ.</p>
                                    <span class="text-[10px] text-gray-400 mt-1.5 block font-medium">5 giờ trước</span>
                                </div>
                            </a>
                            <!-- Item 3 -->
                            <a href="<?= APP_URL ?>/tai-khoan#tab-hop-thu" class="flex gap-3 p-3 hover:bg-red-50 transition-colors border-b last:border-b-0" style="border-color: #f5f5f5; text-decoration: none;">
                                <div class="w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center text-white shadow-sm" style="background: linear-gradient(135deg, #3b82f6, #2563eb);">
                                    <iconify-icon icon="ph:info-bold" class="text-lg"></iconify-icon>
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-semibold text-gray-800 line-clamp-1 m-0">Cập nhật chính sách đổi trả</h4>
                                    <p class="text-xs text-gray-500 mt-1 line-clamp-2 leading-relaxed">Từ ngày 01/06, chính sách đổi trả của Chuỗi Ngọc sẽ có một số thay đổi.</p>
                                    <span class="text-[10px] text-gray-400 mt-1.5 block font-medium">1 ngày trước</span>
                                </div>
                            </a>
                        </div>
                        
                        <!-- Dropdown Footer -->
                        <a href="<?= APP_URL ?>/tai-khoan#tab-hop-thu" class="block w-full text-center py-3 text-sm font-semibold transition-colors" 
                           style="background: #fff; color: #8b0000; border-top: 1px solid #f0f0f0; text-decoration: none;"
                           onmouseover="this.style.background='#fdf5f5'"
                           onmouseout="this.style.background='#fff'"
                           onclick="if(typeof switchTab === 'function') { switchTab('tab-hop-thu'); }">
                            Xem tất cả thông báo
                        </a>
                    </div>
                </div>

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
                    <?php if (!empty($_SESSION['user_id'])): ?>
                        <?php
                            $userAvatar = $_SESSION['user_avatar'] ?? null;
                            if (!$userAvatar) {
                                $userName = urlencode($_SESSION['user_name'] ?? 'User');
                                $userAvatar = "https://ui-avatars.com/api/?name={$userName}&background=8b0000&color=fff&bold=true&size=80";
                            }
                        ?>
                        <button class="flex items-center gap-2 p-1.5 pr-3 rounded-full transition-all cursor-pointer"
                           style="border: 1px solid rgba(139,0,0,0.2); background: rgba(139,0,0,0.02);">
                            <img src="<?= $userAvatar ?>" alt="Avatar" class="w-7 h-7 rounded-full object-cover">
                            <span class="text-sm font-medium max-w-[100px] truncate" style="color: #8b0000;"><?= htmlspecialchars($_SESSION['user_name'] ?? 'Tài khoản') ?></span>
                        </button>
                    
                        <!-- Dropdown Menu (Logged In) -->
                        <div class="absolute right-0 mt-2 w-52 bg-white rounded-xl shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-right z-50"
                             style="border: 1px solid #f0f0f0;">
                            <div class="px-4 py-3 border-b" style="border-color: #f0f0f0; background: #fafafa;">
                                <p class="text-sm font-bold text-gray-900 truncate"><?= htmlspecialchars($_SESSION['user_name'] ?? '') ?></p>
                                <p class="text-xs text-gray-500 truncate"><?= htmlspecialchars($_SESSION['user_email'] ?? '') ?></p>
                            </div>
                            <div class="p-2 space-y-1">
                                <a href="<?= APP_URL ?>/tai-khoan" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-800 rounded-lg transition-colors" style="text-decoration: none;">
                                    <iconify-icon icon="ph:user-circle-bold" class="text-base text-gray-400"></iconify-icon>
                                    Hồ sơ của tôi
                                </a>
                                <a href="<?= APP_URL ?>/tai-khoan#tab-don-hang" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-800 rounded-lg transition-colors" style="text-decoration: none;">
                                    <iconify-icon icon="ph:package-bold" class="text-base text-gray-400"></iconify-icon>
                                    Đơn mua
                                </a>
                                <a href="<?= APP_URL ?>/tai-khoan#tab-yeu-thich" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-800 rounded-lg transition-colors" style="text-decoration: none;">
                                    <iconify-icon icon="ph:heart-bold" class="text-base text-gray-400"></iconify-icon>
                                    Yêu thích
                                </a>
                                <a href="<?= APP_URL ?>/tai-khoan#tab-voucher" class="flex items-center gap-2 px-3 py-2 text-sm text-gray-700 hover:bg-red-50 hover:text-red-800 rounded-lg transition-colors" style="text-decoration: none;">
                                    <iconify-icon icon="ph:ticket-bold" class="text-base text-gray-400"></iconify-icon>
                                    Kho Voucher
                                </a>
                                <div class="h-px bg-gray-100 my-1"></div>
                                <a href="<?= APP_URL ?>/dang-xuat" class="flex items-center gap-2 px-3 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-colors" style="text-decoration: none;">
                                    <iconify-icon icon="ph:sign-out-bold" class="text-base"></iconify-icon>
                                    Đăng xuất
                                </a>
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="<?= APP_URL ?>/dang-nhap" class="flex items-center gap-2 p-1.5 pr-3 rounded-full transition-all"
                           style="border: 1px solid rgba(139,0,0,0.2); background: rgba(139,0,0,0.02); text-decoration: none;">
                            <div class="w-7 h-7 rounded-full flex items-center justify-center text-white" style="background: #8b0000;">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <span class="text-sm font-medium" style="color: #8b0000;">Đăng nhập</span>
                        </a>
                    <?php endif; ?>
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
                <a href="<?= !empty($_SESSION['user_id']) ? APP_URL . '/dang-xuat' : APP_URL . '/dang-nhap' ?>" class="flex-1 flex items-center justify-center gap-2 py-2.5 rounded-xl text-sm font-medium transition-all"
                   style="border: 1px solid #ddd; color: #333; text-decoration: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    <?= !empty($_SESSION['user_id']) ? 'Đăng xuất' : 'Đăng nhập' ?>
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const headerContainer = document.getElementById('header-container');
    const headerLogo = document.getElementById('header-logo');
    const headerBrandName = document.getElementById('header-brand-name');

    let headerState = 'compact'; // 'compact' (ở đầu trang) hoặc 'expanded' (khi cuộn xuống)

    // Khi cuộn xuống: header mở rộng, logo to hơn
    function setExpanded() {
        headerContainer.style.height = '72px';
        headerLogo.style.height = '52px';
        headerLogo.style.width = '52px';
        headerBrandName.style.fontSize = '1.2rem';
    }

    // Khi ở đầu trang: header thu gọn, nhỏ gọn
    function setCompact() {
        headerContainer.style.height = '60px';
        headerLogo.style.height = '44px';
        headerLogo.style.width = '44px';
        headerBrandName.style.fontSize = '1.05rem';
    }

    function applyHeaderState() {
        const y = window.scrollY;
        if (y > 50 && headerState !== 'expanded') {
            headerState = 'expanded';
            setExpanded();
        } else if (y <= 10 && headerState !== 'compact') {
            headerState = 'compact';
            setCompact();
        }
    }

    // Áp dụng trạng thái ban đầu khi load
    if (window.scrollY > 50) {
        headerState = 'expanded';
        setExpanded();
    } else {
        headerState = 'compact';
        setCompact();
    }
    window.addEventListener('scroll', applyHeaderState, { passive: true });
});
</script>
