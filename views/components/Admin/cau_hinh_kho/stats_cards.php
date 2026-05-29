<?php
// views/components/Admin/cau_hinh_kho/stats_cards.php
?>
<div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-7 gap-4">
    <!-- Card 1: Tổng kho -->
    <div class="bg-white rounded-2xl p-4 border border-gray-100 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] transition-all duration-300 xl:col-span-1 flex flex-col justify-between">
        <div class="flex items-start justify-between">
            <p class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1">Tổng kho</p>
            <span class="iconify text-gray-400 text-lg" data-icon="mdi:warehouse"></span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mt-2"><?= $stats['tong_kho'] ?> <span class="text-xs font-normal text-gray-500">kho</span></h3>
    </div>

    <!-- Card 2: Đang hoạt động -->
    <div class="bg-white rounded-2xl p-4 border border-emerald-100 shadow-[0_2px_10px_-3px_rgba(16,185,129,0.1)] transition-all duration-300 xl:col-span-1 flex flex-col justify-between">
        <div class="flex items-start justify-between">
            <p class="text-[11px] font-semibold text-emerald-600 uppercase tracking-wider mb-1">Đang hoạt động</p>
            <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle-outline"></span>
        </div>
        <h3 class="text-2xl font-bold text-emerald-700 mt-2"><?= $stats['dang_hoat_dong'] ?> <span class="text-xs font-normal text-emerald-600/70">kho</span></h3>
    </div>

    <!-- Card 3: Khu vực lưu trữ -->
    <div class="bg-white rounded-2xl p-4 border border-gray-100 shadow-[0_2px_10px_-3px_rgba(0,0,0,0.05)] transition-all duration-300 xl:col-span-1 flex flex-col justify-between">
        <div class="flex items-start justify-between">
            <p class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1">Khu vực lưu trữ</p>
            <span class="iconify text-gray-400 text-lg" data-icon="mdi:view-grid-outline"></span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mt-2"><?= $stats['khu_vuc'] ?> <span class="text-xs font-normal text-gray-500">khu vực</span></h3>
    </div>

    <!-- Card 4: Kệ / ngăn -->
    <div class="bg-white rounded-2xl p-4 border border-gray-100 shadow-[0_2px_10px_-3px_rgba(0,0,0,0.05)] transition-all duration-300 xl:col-span-1 flex flex-col justify-between">
        <div class="flex items-start justify-between">
            <p class="text-[11px] font-semibold text-gray-500 uppercase tracking-wider mb-1">Kệ / Ngăn</p>
            <span class="iconify text-gray-400 text-lg" data-icon="mdi:bookshelf"></span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mt-2"><?= $stats['vi_tri'] ?> <span class="text-xs font-normal text-gray-500">vị trí</span></h3>
    </div>

    <!-- Card 5: Sản phẩm chưa gắn vị trí -->
    <div class="bg-white rounded-2xl p-4 border border-amber-200 bg-amber-50/30 shadow-[0_2px_10px_-3px_rgba(245,158,11,0.15)] transition-all duration-300 xl:col-span-1 flex flex-col justify-between cursor-pointer hover:bg-amber-50">
        <div class="flex items-start justify-between">
            <p class="text-[11px] font-bold text-amber-700 uppercase tracking-wider mb-1">Chưa gắn vị trí</p>
            <span class="iconify text-amber-500 text-lg" data-icon="mdi:map-marker-question-outline"></span>
        </div>
        <h3 class="text-2xl font-bold text-amber-700 mt-2"><?= $stats['chua_gan_vi_tri'] ?> <span class="text-xs font-medium text-amber-600/80">sản phẩm</span></h3>
    </div>

    <!-- Card 6: Cấu hình cần kiểm tra -->
    <div class="bg-white rounded-2xl p-4 border border-rose-200 bg-rose-50/30 shadow-[0_2px_10px_-3px_rgba(225,29,72,0.15)] transition-all duration-300 xl:col-span-1 flex flex-col justify-between cursor-pointer hover:bg-rose-50">
        <div class="flex items-start justify-between">
            <p class="text-[11px] font-bold text-rose-700 uppercase tracking-wider mb-1">Cần kiểm tra</p>
            <span class="iconify text-rose-500 text-lg" data-icon="mdi:alert-circle-outline"></span>
        </div>
        <h3 class="text-2xl font-bold text-rose-700 mt-2"><?= $stats['can_kiem_tra'] ?> <span class="text-xs font-medium text-rose-600/80">mục</span></h3>
    </div>

    <!-- Card 7: Kho mặc định -->
    <div class="bg-white rounded-2xl p-4 border border-[#6B0D18]/20 shadow-[0_2px_10px_-3px_rgba(107,13,24,0.1)] transition-all duration-300 xl:col-span-1 flex flex-col justify-between relative overflow-hidden">
        <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-red-50 rounded-full"></div>
        <div class="flex items-start justify-between relative z-10">
            <p class="text-[11px] font-semibold text-[#6B0D18] uppercase tracking-wider mb-1">Kho mặc định</p>
            <span class="iconify text-[#6B0D18] text-lg" data-icon="mdi:star"></span>
        </div>
        <h3 class="text-sm font-bold text-gray-900 mt-2 relative z-10 leading-tight"><?= htmlspecialchars($stats['kho_mac_dinh'] ?? 'Chưa đặt') ?></h3>
    </div>
</div>
