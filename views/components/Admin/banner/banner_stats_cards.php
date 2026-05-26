<?php
// views/components/Admin/banner/banner_stats_cards.php
?>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
    <!-- Card 1 -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-gray-50 flex items-center justify-center text-gray-500">
                <span class="iconify text-xl" data-icon="mdi:image-multiple-outline"></span>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium">Tổng banner</p>
                <h3 class="text-xl font-bold text-gray-800">32</h3>
            </div>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-green-50 flex items-center justify-center text-green-600">
                <span class="iconify text-xl" data-icon="mdi:eye-check-outline"></span>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium">Đang hiển thị</p>
                <h3 class="text-xl font-bold text-gray-800">12</h3>
            </div>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                <span class="iconify text-xl" data-icon="mdi:eye-off-outline"></span>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium">Đang ẩn</p>
                <h3 class="text-xl font-bold text-gray-800">8</h3>
            </div>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-500">
                <span class="iconify text-xl" data-icon="mdi:clock-fast"></span>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium">Sắp hiển thị</p>
                <h3 class="text-xl font-bold text-gray-800">4</h3>
            </div>
        </div>
    </div>

    <!-- Card 5 -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400">
                <span class="iconify text-xl" data-icon="mdi:timer-off-outline"></span>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium">Hết hạn</p>
                <h3 class="text-xl font-bold text-gray-800">6</h3>
            </div>
        </div>
    </div>

    <!-- Card 6 -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-lg bg-yellow-50 flex items-center justify-center text-yellow-600">
                <span class="iconify text-xl" data-icon="mdi:alert-circle-outline"></span>
            </div>
            <div>
                <p class="text-xs text-gray-500 font-medium">Thiếu cấu hình</p>
                <h3 class="text-xl font-bold text-gray-800">2</h3>
            </div>
        </div>
    </div>
</div>
