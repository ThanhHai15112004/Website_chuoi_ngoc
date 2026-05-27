<?php
// views/components/Admin/xuat_kho/tabs_filter.php
?>
<div class="bg-white rounded-t-xl border-t border-l border-r border-gray-100">
    <!-- Tabs trạng thái -->
    <div class="overflow-x-auto custom-scrollbar border-b border-gray-100">
        <div class="flex items-center px-2 py-2 min-w-max">
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-white bg-[#6B0D18] shadow-sm whitespace-nowrap transition-colors flex items-center gap-1.5">
                Tất cả <span class="bg-white/20 text-white py-0.5 px-1.5 rounded-full text-xs">236</span>
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 whitespace-nowrap transition-colors flex items-center gap-1.5">
                Nháp <span class="bg-gray-100 text-gray-600 py-0.5 px-1.5 rounded-full text-xs">4</span>
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-yellow-700 hover:bg-yellow-50 whitespace-nowrap transition-colors flex items-center gap-1.5">
                Chờ duyệt <span class="bg-yellow-50 text-yellow-700 py-0.5 px-1.5 rounded-full text-xs">12</span>
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-blue-700 hover:bg-blue-50 whitespace-nowrap transition-colors flex items-center gap-1.5">
                Đã duyệt <span class="bg-blue-50 text-blue-700 py-0.5 px-1.5 rounded-full text-xs">3</span>
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-amber-700 hover:bg-amber-50 whitespace-nowrap transition-colors flex items-center gap-1.5">
                Chờ xuất kho <span class="bg-amber-50 text-amber-700 py-0.5 px-1.5 rounded-full text-xs">8</span>
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-teal-700 hover:bg-teal-50 whitespace-nowrap transition-colors flex items-center gap-1.5">
                Đang chuẩn bị <span class="bg-teal-50 text-teal-700 py-0.5 px-1.5 rounded-full text-xs">2</span>
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-emerald-700 hover:bg-emerald-50 whitespace-nowrap transition-colors flex items-center gap-1.5">
                Đã xuất kho <span class="bg-emerald-50 text-emerald-700 py-0.5 px-1.5 rounded-full text-xs">190</span>
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-rose-700 hover:bg-rose-50 whitespace-nowrap transition-colors flex items-center gap-1.5">
                Có lỗi <span class="bg-rose-50 text-rose-700 py-0.5 px-1.5 rounded-full text-xs">5</span>
            </button>
            <button class="px-4 py-2 text-sm font-medium rounded-lg text-gray-500 hover:text-gray-900 hover:bg-gray-100 whitespace-nowrap transition-colors flex items-center gap-1.5">
                Đã hủy <span class="bg-gray-100 text-gray-600 py-0.5 px-1.5 rounded-full text-xs">9</span>
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
            <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] sm:text-sm transition-colors" placeholder="Tìm theo mã phiếu, đơn hàng, SKU, kho xuất...">
        </div>

        <!-- Bộ lọc -->
        <div class="flex items-center gap-3 w-full md:w-auto overflow-x-auto custom-scrollbar pb-1 md:pb-0">
            <!-- Loại xuất -->
            <select class="block w-full md:w-auto pl-3 pr-8 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-md border text-gray-700 bg-white shadow-sm shrink-0">
                <option value="">Tất cả loại xuất</option>
                <option value="don_hang">Đơn hàng</option>
                <option value="tra_ncc">Trả nhà cung cấp</option>
                <option value="hang_loi">Hàng lỗi</option>
                <option value="bao_hanh">Bảo hành</option>
                <option value="dieu_chinh">Điều chỉnh kho</option>
            </select>
            
            <!-- Kho xuất -->
            <select class="block w-full md:w-auto pl-3 pr-8 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-md border text-gray-700 bg-white shadow-sm shrink-0">
                <option value="">Tất cả kho xuất</option>
                <option value="online">Kho online</option>
                <option value="tong">Kho tổng</option>
                <option value="cua_hang">Kho cửa hàng</option>
            </select>

            <!-- Bộ lọc nâng cao -->
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm shrink-0">
                <span class="iconify text-lg text-[#6B0D18]" data-icon="mdi:filter-variant"></span>
                Lọc thêm
            </button>
        </div>
    </div>

    <!-- Hiển thị các filter đang áp dụng (chips) -->
    <div class="px-4 pb-4 bg-gray-50/50 flex flex-wrap items-center gap-2 border-b border-gray-100">
        <span class="text-xs text-gray-500 font-medium mr-1">Đang lọc theo:</span>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-white text-gray-700 border border-gray-200 shadow-sm">
            Loại xuất: Đơn hàng
            <button class="text-gray-400 hover:text-gray-600 focus:outline-none"><span class="iconify" data-icon="mdi:close"></span></button>
        </span>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-white text-gray-700 border border-gray-200 shadow-sm">
            Kho xuất: Kho online
            <button class="text-gray-400 hover:text-gray-600 focus:outline-none"><span class="iconify" data-icon="mdi:close"></span></button>
        </span>
        <button class="text-xs text-red-600 hover:text-red-700 hover:underline font-medium ml-1">Xóa bộ lọc</button>
    </div>
</div>
