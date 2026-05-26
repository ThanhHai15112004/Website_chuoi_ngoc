<?php
// views/components/Admin/nhap_kho/tabs_filter.php
?>
<div class="bg-white rounded-t-xl border-t border-l border-r border-gray-200">
    <!-- Tabs trạng thái (Scrollable on mobile) -->
    <div class="overflow-x-auto custom-scrollbar border-b border-gray-200">
        <div class="flex items-center px-2 py-2 min-w-max">
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-white bg-[#6B0D18] shadow-sm whitespace-nowrap transition-colors">
                Tất cả (186)
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 whitespace-nowrap transition-colors">
                Nháp (5)
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-yellow-700 hover:bg-yellow-50 whitespace-nowrap transition-colors">
                Chờ kiểm hàng (12)
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-blue-700 hover:bg-blue-50 whitespace-nowrap transition-colors">
                Đang kiểm hàng (5)
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 whitespace-nowrap transition-colors">
                Chờ duyệt (8)
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-emerald-700 hover:bg-emerald-50 whitespace-nowrap transition-colors">
                Đã nhập kho (150)
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-rose-700 hover:bg-rose-50 whitespace-nowrap transition-colors">
                Có lỗi (6)
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 whitespace-nowrap transition-colors">
                Đã hủy (3)
            </button>
        </div>
    </div>

    <!-- Thanh tìm kiếm & Lọc nâng cao -->
    <div class="p-4 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 bg-gray-50/50">
        <!-- Tìm kiếm -->
        <div class="relative w-full md:w-96">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="iconify text-[#6B0D18] text-lg" data-icon="mdi:magnify"></span>
            </div>
            <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] sm:text-sm transition-colors" placeholder="Tìm theo mã phiếu, nhà cung cấp, sản phẩm, SKU...">
        </div>

        <!-- Bộ lọc -->
        <div class="flex items-center gap-3 w-full md:w-auto overflow-x-auto custom-scrollbar pb-1 md:pb-0">
            <select class="block w-full md:w-auto pl-3 pr-8 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-md border text-gray-700 bg-white shadow-sm shrink-0">
                <option value="">Tất cả kho nhập</option>
                <option value="tong">Kho tổng</option>
                <option value="online">Kho online</option>
                <option value="cua_hang">Kho cửa hàng Q1</option>
                <option value="cho_kiem">Kho chờ kiểm</option>
            </select>
            
            <select class="block w-full md:w-auto pl-3 pr-8 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-md border text-gray-700 bg-white shadow-sm shrink-0">
                <option value="">Thời gian: Tháng này</option>
                <option value="today">Hôm nay</option>
                <option value="7days">7 ngày qua</option>
                <option value="30days">30 ngày qua</option>
                <option value="custom">Tùy chọn...</option>
            </select>

            <button class="flex items-center gap-2 px-3 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 shadow-sm shrink-0">
                <span class="iconify" data-icon="mdi:filter-variant"></span> Bộ lọc khác
            </button>
        </div>
    </div>

    <!-- Active Filters (Ví dụ) -->
    <div class="px-4 pb-4 bg-gray-50/50 flex flex-wrap items-center gap-2 border-b border-gray-100 hidden">
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-red-50 text-[#6B0D18] border border-red-100">
            Kho online
            <button class="text-[#6B0D18]/60 hover:text-[#6B0D18] focus:outline-none">
                <span class="iconify" data-icon="mdi:close"></span>
            </button>
        </span>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-red-50 text-[#6B0D18] border border-red-100">
            Có công nợ
            <button class="text-[#6B0D18]/60 hover:text-[#6B0D18] focus:outline-none">
                <span class="iconify" data-icon="mdi:close"></span>
            </button>
        </span>
        <button class="text-xs text-gray-500 hover:text-gray-900 underline ml-2">Xóa tất cả</button>
    </div>
</div>
