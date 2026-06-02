<?php
// views/components/Admin/nhat_ky/stats_cards.php
?>
<div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-7 gap-4">
    <!-- Card 1 -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200 relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-gray-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative">
            <div class="w-8 h-8 rounded-lg bg-gray-100 text-gray-600 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:list-status"></span>
            </div>
            <p class="text-xs font-medium text-gray-500 mb-1">Hoạt động hôm nay</p>
            <p class="text-xl font-bold text-gray-900"><?= number_format($stats['tong']) ?> <span class="text-[10px] font-normal text-gray-500">thao tác</span></p>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200 relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-blue-50/50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative">
            <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:login"></span>
            </div>
            <p class="text-xs font-medium text-gray-500 mb-1">Đăng nhập Admin</p>
            <p class="text-xl font-bold text-gray-900"><?= number_format($stats['dang_nhap']) ?> <span class="text-[10px] font-normal text-gray-500">lượt</span></p>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200 relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-amber-50/50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative">
            <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-600 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:star-circle-outline"></span>
            </div>
            <p class="text-xs font-medium text-gray-500 mb-1">Thao tác quan trọng</p>
            <p class="text-xl font-bold text-gray-900"><?= number_format($stats['quan_trong']) ?> <span class="text-[10px] font-normal text-gray-500">thao tác</span></p>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="bg-red-50/30 p-4 rounded-xl shadow-sm border border-red-100 relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-red-100/50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative">
            <div class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:alert-rhombus-outline"></span>
            </div>
            <p class="text-xs font-bold text-red-800 mb-1">Thao tác nguy hiểm</p>
            <p class="text-xl font-bold text-red-700"><?= number_format($stats['nguy_hiem']) ?> <span class="text-[10px] font-normal text-red-600/70">thao tác</span></p>
        </div>
    </div>

    <!-- Card 5 -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200 relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-purple-50/50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative">
            <div class="w-8 h-8 rounded-lg bg-purple-50 text-purple-600 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:database-export-outline"></span>
            </div>
            <p class="text-xs font-medium text-gray-500 mb-1">Xuất dữ liệu</p>
            <p class="text-xl font-bold text-gray-900"><?= number_format($stats['xuat_du_lieu']) ?> <span class="text-[10px] font-normal text-gray-500">lượt</span></p>
        </div>
    </div>

    <!-- Card 6 -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-red-200 relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-red-50/50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative">
            <div class="w-8 h-8 rounded-lg bg-red-50 text-red-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:shield-lock-outline"></span>
            </div>
            <p class="text-xs font-medium text-red-600 mb-1">Đăng nhập thất bại</p>
            <p class="text-xl font-bold text-gray-900"><?= number_format($stats['dang_nhap_that_bai']) ?> <span class="text-[10px] font-normal text-gray-500">lượt</span></p>
        </div>
    </div>

    <!-- Card 7 -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-200 relative overflow-hidden group md:col-span-2 xl:col-span-1">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-emerald-50/50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative">
            <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-600 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:chart-pie"></span>
            </div>
            <p class="text-xs font-medium text-gray-500 mb-1">Module nhiều nhất</p>
            <p class="text-base font-bold text-gray-900 mt-1 truncate"><?= htmlspecialchars($stats['module_nhieu_nhat']) ?></p>
        </div>
    </div>
</div>
