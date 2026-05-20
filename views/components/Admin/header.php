<?php
// views/components/Admin/header.php
?>
<header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-10 h-20">
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
            <!-- Notifications (Bell icon) -->
            <button class="relative p-2 text-gray-600 hover:text-red-900 hover:bg-red-50 rounded-full transition-colors group" title="Thông báo">
                <span class="iconify text-2xl group-hover:animate-swing" data-icon="mdi:bell-outline"></span>
                <!-- Notification Badge -->
                <span class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-red-600 rounded-full ring-2 ring-white"></span>
            </button>

            <!-- User Profile Dropdown -->
            <div class="flex items-center gap-3 border-l pl-5 border-gray-200 cursor-pointer group">
                <img src="https://ui-avatars.com/api/?name=Admin&background=8B0000&color=fff&bold=true" alt="Admin Avatar" class="w-9 h-9 rounded-full object-cover border-2 border-transparent group-hover:border-red-900 transition-all shadow-sm">
                <div class="hidden lg:block">
                    <p class="text-sm font-bold text-gray-800 leading-none mb-1">Quản trị viên</p>
                    <p class="text-[11px] text-gray-500 font-medium leading-none">admin@chuoingoc.com</p>
                </div>
                <span class="iconify text-gray-400 group-hover:text-red-900 transition-colors ml-1" data-icon="mdi:chevron-down"></span>
            </div>
        </div>
    </div>
</header>

