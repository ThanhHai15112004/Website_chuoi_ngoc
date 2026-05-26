<?php
// views/components/Admin/kiem_ke/tabs_filter.php
?>
<div class="flex flex-col gap-4 mb-4">
    <!-- Thanh tìm kiếm & Bộ lọc nâng cao -->
    <div class="flex flex-col md:flex-row gap-3">
        <div class="relative flex-1">
            <input type="text" placeholder="Tìm theo mã phiếu, sản phẩm, kho, người kiểm kê..." class="w-full pl-11 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm shadow-sm placeholder:text-gray-400">
            <span class="iconify absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-xl" data-icon="mdi:magnify"></span>
        </div>
        
        <div class="flex gap-2">
            <!-- Nút Lọc nâng cao -->
            <button class="flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm relative">
                <span class="iconify text-lg text-gray-500" data-icon="mdi:filter-variant"></span> Lọc nâng cao
                <!-- Badge active filter -->
                <span class="absolute -top-1.5 -right-1.5 w-5 h-5 bg-[#6B0D18] text-white text-[10px] font-bold rounded-full flex items-center justify-center border-2 border-white">2</span>
            </button>
            <!-- Nút Export/In -->
            <div class="relative group">
                <button class="flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                    <span class="iconify text-lg text-gray-500" data-icon="mdi:export-variant"></span> Xuất
                </button>
            </div>
        </div>
    </div>

    <!-- Active Filters (Chips) -->
    <div class="flex flex-wrap items-center gap-2">
        <span class="text-xs text-gray-500 font-medium">Đang lọc theo:</span>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white border border-gray-200 rounded-full text-xs font-medium text-gray-700 shadow-sm">
            Kho: Tổng - Hà Nội
            <button class="text-gray-400 hover:text-red-500 focus:outline-none"><span class="iconify text-sm" data-icon="mdi:close"></span></button>
        </span>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 bg-white border border-gray-200 rounded-full text-xs font-medium text-gray-700 shadow-sm">
            Tháng này
            <button class="text-gray-400 hover:text-red-500 focus:outline-none"><span class="iconify text-sm" data-icon="mdi:close"></span></button>
        </span>
        <button class="text-xs font-medium text-[#6B0D18] hover:underline px-2">Xóa tất cả bộ lọc</button>
    </div>

    <!-- Tabs trạng thái (Scrollable ngang) -->
    <div class="flex items-center gap-2 overflow-x-auto pb-2 sidebar-scroll">
        <button class="px-5 py-2 bg-[#6B0D18] text-white rounded-full text-sm font-medium whitespace-nowrap shadow-sm transition-transform active:scale-95">
            Tất cả (<?= $stats['tat_ca'] ?>)
        </button>
        <button class="px-5 py-2 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-all active:scale-95">
            Nháp (2)
        </button>
        <button class="px-5 py-2 bg-white border border-gray-200 text-blue-600 hover:bg-blue-50 rounded-full text-sm font-medium whitespace-nowrap transition-all active:scale-95">
            Đang kiểm kê (<?= $stats['dang_kiem_ke'] ?>)
        </button>
        <button class="px-5 py-2 bg-white border border-gray-200 text-amber-600 hover:bg-amber-50 rounded-full text-sm font-medium whitespace-nowrap transition-all active:scale-95">
            Chờ duyệt (<?= $stats['cho_duyet'] ?>)
        </button>
        <button class="px-5 py-2 bg-white border border-gray-200 text-emerald-600 hover:bg-emerald-50 rounded-full text-sm font-medium whitespace-nowrap transition-all active:scale-95">
            Đã duyệt & Hoàn tất (<?= $stats['da_hoan_tat'] ?>)
        </button>
        <button class="px-5 py-2 bg-white border border-gray-200 text-red-600 hover:bg-red-50 rounded-full text-sm font-medium whitespace-nowrap transition-all active:scale-95">
            Có chênh lệch (<?= $stats['co_chenh_lech'] ?>)
        </button>
        <button class="px-5 py-2 bg-white border border-gray-200 text-gray-500 hover:bg-gray-100 rounded-full text-sm font-medium whitespace-nowrap transition-all active:scale-95">
            Đã hủy (1)
        </button>
    </div>
</div>
