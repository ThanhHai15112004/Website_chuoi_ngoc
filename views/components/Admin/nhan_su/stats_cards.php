<?php
// views/components/Admin/nhan_su/stats_cards.php
$stats = $stats ?? ['total' => 0, 'hoat_dong' => 0, 'cho_kich_hoat' => 0, 'bi_khoa' => 0, 'super_admin' => 0, 'login_7_ngay' => 0, 'can_kiem_tra_quyen' => 0];
?>
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4">
    <!-- Card 1 -->
    <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col justify-between">
        <div class="w-8 h-8 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center mb-2">
            <span class="iconify text-lg" data-icon="mdi:account-group"></span>
        </div>
        <div>
            <p class="text-xs text-gray-500 font-medium mb-0.5">Tổng nhân viên</p>
            <p class="text-xl font-bold text-gray-900"><?= $stats['total'] ?></p>
        </div>
    </div>

    <!-- Card 2 -->
    <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col justify-between relative overflow-hidden">
        <div class="absolute -right-4 -top-4 w-16 h-16 rounded-full bg-emerald-50/50"></div>
        <div class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center mb-2 relative z-10">
            <span class="iconify text-lg" data-icon="mdi:account-check"></span>
        </div>
        <div class="relative z-10">
            <p class="text-xs text-emerald-600 font-medium mb-0.5">Đang hoạt động</p>
            <p class="text-xl font-bold text-gray-900"><?= $stats['hoat_dong'] ?></p>
        </div>
    </div>

    <!-- Card 3 -->
    <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col justify-between relative overflow-hidden">
        <div class="absolute -right-4 -top-4 w-16 h-16 rounded-full bg-amber-50/50"></div>
        <div class="w-8 h-8 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mb-2 relative z-10">
            <span class="iconify text-lg" data-icon="mdi:account-clock"></span>
        </div>
        <div class="relative z-10">
            <p class="text-xs text-amber-600 font-medium mb-0.5">Chờ kích hoạt</p>
            <p class="text-xl font-bold text-gray-900"><?= $stats['cho_kich_hoat'] ?></p>
        </div>
    </div>

    <!-- Card 4 -->
    <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col justify-between relative overflow-hidden">
        <div class="absolute -right-4 -top-4 w-16 h-16 rounded-full bg-red-50/50"></div>
        <div class="w-8 h-8 rounded-full bg-red-50 text-red-600 flex items-center justify-center mb-2 relative z-10">
            <span class="iconify text-lg" data-icon="mdi:account-lock"></span>
        </div>
        <div class="relative z-10">
            <p class="text-xs text-red-600 font-medium mb-0.5">Bị khóa</p>
            <p class="text-xl font-bold text-gray-900"><?= $stats['bi_khoa'] ?></p>
        </div>
    </div>

    <!-- Card 5 -->
    <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col justify-between">
        <div class="w-8 h-8 rounded-full bg-[#6B0D18]/10 text-[#6B0D18] flex items-center justify-center mb-2">
            <span class="iconify text-lg" data-icon="mdi:shield-crown-outline"></span>
        </div>
        <div>
            <p class="text-xs text-[#6B0D18] font-medium mb-0.5">Quản trị cao</p>
            <p class="text-xl font-bold text-gray-900"><?= $stats['super_admin'] ?></p>
        </div>
    </div>

    <!-- Card 6 -->
    <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col justify-between">
        <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mb-2">
            <span class="iconify text-lg" data-icon="mdi:login-variant"></span>
        </div>
        <div>
            <p class="text-xs text-gray-500 font-medium mb-0.5">Đăng nhập 7 ngày</p>
            <p class="text-xl font-bold text-gray-900"><?= $stats['login_7_ngay'] ?></p>
        </div>
    </div>

    <!-- Card 7 -->
    <div class="bg-white rounded-[18px] p-4 shadow-sm border border-orange-200 bg-orange-50/30 flex flex-col justify-between">
        <div class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center mb-2">
            <span class="iconify text-lg" data-icon="mdi:alert-outline"></span>
        </div>
        <div>
            <p class="text-xs text-orange-600 font-medium mb-0.5">Cần kiểm tra quyền</p>
            <p class="text-xl font-bold text-orange-700"><?= $stats['can_kiem_tra_quyen'] ?></p>
        </div>
    </div>
</div>
