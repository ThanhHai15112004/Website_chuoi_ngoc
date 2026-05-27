<?php
// views/components/Admin/header.php
?>
<header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-50 h-20">
    <div class="px-6 h-full flex items-center justify-between">
        <!-- Left side actions (Hamburger / Search) -->
        <div class="flex items-center gap-4 flex-1">
            <button class="md:hidden p-2 text-gray-600 hover:text-red-900 hover:bg-red-50 rounded-lg transition-colors">
                <span class="iconify text-2xl" data-icon="mdi:menu"></span>
            </button>
            
            <!-- Search bar -->
            <div class="hidden sm:flex items-center max-w-md w-full relative">
                <span class="iconify absolute left-3 text-gray-400 text-xl" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm kiếm đơn hàng, sản phẩm, khách hàng..." class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-all placeholder-gray-400">
                <!-- Kbd shortcut hint -->
                <div class="absolute right-3 hidden lg:flex items-center gap-1">
                    <kbd class="px-2 py-1 bg-white border border-gray-200 rounded text-[10px] text-gray-400 font-sans shadow-sm">Ctrl</kbd>
                    <span class="text-gray-400 text-xs">+</span>
                    <kbd class="px-2 py-1 bg-white border border-gray-200 rounded text-[10px] text-gray-400 font-sans shadow-sm">K</kbd>
                </div>
            </div>
        </div>

        <!-- Right side actions -->
        <div class="flex items-center gap-5">
            <!-- Notifications Dropdown -->
            <div class="relative" id="notificationDropdownContainer">
                <button id="notificationBtn" onclick="toggleNotificationDropdown()" class="relative p-2 text-gray-600 hover:text-red-900 hover:bg-red-50 rounded-full transition-colors group focus:outline-none" title="Thông báo">
                    <span class="iconify text-2xl group-hover:animate-swing" data-icon="mdi:bell-outline"></span>
                    <!-- Notification Badge -->
                    <span class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-red-600 rounded-full ring-2 ring-white"></span>
                </button>

                <!-- Dropdown Menu -->
                <div id="notificationDropdown" class="absolute right-0 mt-2 w-80 sm:w-96 bg-white rounded-xl shadow-xl border border-gray-100 hidden z-50 transform origin-top-right transition-all duration-200 opacity-0 scale-95">
                    <div class="flex items-center justify-between px-4 py-3 border-b border-gray-100">
                        <h3 class="font-bold text-gray-900">Thông báo mới</h3>
                        <span class="px-2 py-0.5 rounded-full bg-red-100 text-red-600 text-xs font-bold">5 chưa đọc</span>
                    </div>
                    
                    <div class="max-h-[350px] overflow-y-auto custom-scrollbar">
                        <!-- Item 1 -->
                        <a href="<?= APP_URL ?>/admin/notification?open_id=1" class="flex gap-3 px-4 py-3 hover:bg-gray-50 border-b border-gray-50 transition-colors bg-blue-50/30">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                                <span class="iconify text-xl" data-icon="mdi:receipt-text-outline"></span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 mb-0.5">Đơn hàng mới #DH001</p>
                                <p class="text-xs text-gray-600 line-clamp-1">Khách hàng Nguyễn Văn A vừa đặt Vòng tay Thạch Anh.</p>
                                <p class="text-[10px] text-blue-600 font-medium mt-1">2 phút trước</p>
                            </div>
                        </a>
                        
                        <!-- Item 2 -->
                        <a href="<?= APP_URL ?>/admin/notification?open_id=2" class="flex gap-3 px-4 py-3 hover:bg-gray-50 border-b border-gray-50 transition-colors bg-red-50/30">
                            <div class="w-10 h-10 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                                <span class="iconify text-xl" data-icon="mdi:shield-alert-outline"></span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-bold text-gray-900 mb-0.5">Cảnh báo bảo mật</p>
                                <p class="text-xs text-gray-600 line-clamp-1">Có đăng nhập bất thường từ IP lạ.</p>
                                <p class="text-[10px] text-red-600 font-medium mt-1">15 phút trước</p>
                            </div>
                        </a>
                        
                        <!-- Item 3 -->
                        <a href="<?= APP_URL ?>/admin/notification?open_id=3" class="flex gap-3 px-4 py-3 hover:bg-gray-50 border-b border-gray-50 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0">
                                <span class="iconify text-xl" data-icon="mdi:star-circle-outline"></span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-700 mb-0.5">Khách hàng đánh giá 5 sao</p>
                                <p class="text-xs text-gray-500 line-clamp-1">Trần B: "Sản phẩm rất đẹp, đóng gói cẩn thận."</p>
                                <p class="text-[10px] text-gray-400 mt-1">1 giờ trước</p>
                            </div>
                        </a>
                        
                        <!-- Item 4 -->
                        <a href="<?= APP_URL ?>/admin/notification?open_id=4" class="flex gap-3 px-4 py-3 hover:bg-gray-50 border-b border-gray-50 transition-colors">
                            <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                                <span class="iconify text-xl" data-icon="mdi:account-plus-outline"></span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-700 mb-0.5">Thành viên mới</p>
                                <p class="text-xs text-gray-500 line-clamp-1">Lê Văn C vừa đăng ký tài khoản.</p>
                                <p class="text-[10px] text-gray-400 mt-1">Hôm qua</p>
                            </div>
                        </a>
                    </div>
                    
                    <div class="p-3 border-t border-gray-100 bg-gray-50/50 rounded-b-xl text-center">
                        <a href="<?= APP_URL ?>/admin/notification" class="text-sm font-bold text-[#6B0D18] hover:text-red-900 transition-colors">Xem tất cả hộp thư</a>
                    </div>
                </div>
            </div>

            <!-- User Profile Dropdown -->
            <div class="relative" id="accountDropdownContainer">
                <div onclick="toggleAccountDropdown()" class="flex items-center gap-3 border-l pl-5 border-gray-200 cursor-pointer group select-none">
                    <img src="https://ui-avatars.com/api/?name=Admin&background=8B0000&color=fff&bold=true" alt="Admin Avatar" class="w-9 h-9 rounded-full object-cover border-2 border-transparent group-hover:border-red-900 transition-all shadow-sm">
                    <div class="hidden lg:block">
                        <p class="text-sm font-bold text-gray-800 leading-none mb-1">Quản trị viên</p>
                        <p class="text-[11px] text-gray-500 font-medium leading-none">admin@chuoingoc.com</p>
                    </div>
                    <span class="iconify text-gray-400 group-hover:text-red-900 transition-colors ml-1" data-icon="mdi:chevron-down"></span>
                </div>

                <!-- Account Dropdown Menu -->
                <div id="accountDropdown" class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-xl border border-gray-100 hidden z-50 transform origin-top-right transition-all duration-200 opacity-0 scale-95 overflow-hidden">
                    <div class="px-4 py-3 border-b border-gray-100 bg-gray-50/50">
                        <p class="text-sm font-bold text-gray-900 truncate">Hải Admin</p>
                        <p class="text-xs text-gray-500 truncate">admin@chuoingoc.com</p>
                    </div>
                    
                    <div class="py-1">
                        <a href="<?= APP_URL ?>/admin/tai-khoan" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-red-50 hover:text-red-900 transition-colors">
                            <span class="iconify text-lg text-gray-400" data-icon="mdi:account-circle-outline"></span>
                            Hồ sơ cá nhân
                        </a>
                        <a href="<?= APP_URL ?>/admin/tai-khoan?tab=security" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-700 hover:bg-red-50 hover:text-red-900 transition-colors">
                            <span class="iconify text-lg text-gray-400" data-icon="mdi:cog-outline"></span>
                            Cài đặt tài khoản
                        </a>
                    </div>
                    
                    <div class="border-t border-gray-100 py-1">
                        <a href="<?= APP_URL ?>/admin/dang-nhap" class="flex items-center gap-3 px-4 py-2.5 text-sm font-medium text-red-600 hover:bg-red-50 transition-colors">
                            <span class="iconify text-lg" data-icon="mdi:logout"></span>
                            Đăng xuất
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<script>
    // --- Notification Dropdown ---
    function toggleNotificationDropdown() {
        const dropdown = document.getElementById('notificationDropdown');
        const accDropdown = document.getElementById('accountDropdown');
        
        // Đóng Account dropdown nếu đang mở
        if (!accDropdown.classList.contains('hidden')) {
            toggleAccountDropdown();
        }

        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
            setTimeout(() => {
                dropdown.classList.remove('opacity-0', 'scale-95');
                dropdown.classList.add('opacity-100', 'scale-100');
            }, 10);
        } else {
            dropdown.classList.remove('opacity-100', 'scale-100');
            dropdown.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                dropdown.classList.add('hidden');
            }, 200);
        }
    }

    // --- Account Dropdown ---
    function toggleAccountDropdown() {
        const dropdown = document.getElementById('accountDropdown');
        const notiDropdown = document.getElementById('notificationDropdown');

        // Đóng Notification dropdown nếu đang mở
        if (!notiDropdown.classList.contains('hidden')) {
            toggleNotificationDropdown();
        }

        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
            setTimeout(() => {
                dropdown.classList.remove('opacity-0', 'scale-95');
                dropdown.classList.add('opacity-100', 'scale-100');
            }, 10);
        } else {
            dropdown.classList.remove('opacity-100', 'scale-100');
            dropdown.classList.add('opacity-0', 'scale-95');
            setTimeout(() => {
                dropdown.classList.add('hidden');
            }, 200);
        }
    }

    // Close when clicking outside
    document.addEventListener('click', function(event) {
        // Notification
        const notiContainer = document.getElementById('notificationDropdownContainer');
        const notiDropdown = document.getElementById('notificationDropdown');
        if (notiContainer && !notiContainer.contains(event.target) && !notiDropdown.classList.contains('hidden')) {
            toggleNotificationDropdown();
        }

        // Account
        const accContainer = document.getElementById('accountDropdownContainer');
        const accDropdown = document.getElementById('accountDropdown');
        if (accContainer && !accContainer.contains(event.target) && !accDropdown.classList.contains('hidden')) {
            toggleAccountDropdown();
        }
    });
</script>
