<?php
// views/components/Admin/nhan_su/filter_bar.php
?>
<div class="px-6 py-4 border-b border-gray-200">
    <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4 mb-4">
        <!-- Tabs trạng thái -->
        <div class="flex items-center gap-2 overflow-x-auto pb-2 lg:pb-0 hide-scrollbar">
            <button class="whitespace-nowrap px-4 py-2 rounded-full text-sm font-bold bg-[#6B0D18] text-white transition-colors shadow-sm">
                Tất cả (12)
            </button>
            <button class="whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                Đang hoạt động (9)
            </button>
            <button class="whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                Chờ kích hoạt (2)
            </button>
            <button class="whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                Bị khóa (1)
            </button>
            <button class="whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                Super Admin
            </button>
            <button class="whitespace-nowrap px-4 py-2 rounded-full text-sm font-medium bg-white text-gray-600 border border-gray-200 hover:bg-gray-50 hover:text-gray-900 transition-colors">
                Kho
            </button>
        </div>
    </div>

    <div class="flex flex-col lg:flex-row gap-3">
        <!-- Tìm kiếm -->
        <div class="relative flex-1">
            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
            <input type="text" placeholder="Tìm theo tên, email, số điện thoại, vai trò..." class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-all">
        </div>

        <!-- Các dropdown lọc -->
        <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar">
            <select class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] cursor-pointer min-w-[150px]">
                <option value="">Lọc theo vai trò</option>
                <option value="Super Admin">Super Admin</option>
                <option value="Admin">Admin</option>
                <option value="Kho">Quản lý kho</option>
                <option value="NV Kho">Nhân viên kho</option>
                <option value="CSKH">CSKH</option>
                <option value="Kế toán">Kế toán / Báo cáo</option>
            </select>

            <select class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] cursor-pointer min-w-[180px]">
                <option value="">Lọc theo quyền truy cập</option>
                <option value="1">Có quyền xuất Excel</option>
                <option value="2">Có quyền xóa dữ liệu</option>
                <option value="3">Quản lý sản phẩm</option>
                <option value="4">Quản lý đơn hàng</option>
            </select>
            
            <select class="px-4 py-2 bg-white border border-gray-200 rounded-xl text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] cursor-pointer min-w-[160px]">
                <option value="">Lần đăng nhập cuối</option>
                <option value="today">Hôm nay</option>
                <option value="7days">7 ngày qua</option>
                <option value="30days">30 ngày qua</option>
                <option value="never">Chưa từng đăng nhập</option>
            </select>

            <!-- Nút Lọc (Áp dụng) -->
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-xl text-sm font-medium hover:bg-red-900 transition-colors flex items-center gap-2 whitespace-nowrap shadow-sm">
                <span class="iconify" data-icon="mdi:filter-variant"></span> Lọc
            </button>
        </div>
    </div>
    
    <!-- Active filters -->
    <div class="flex flex-wrap items-center gap-2 mt-4">
        <span class="text-xs text-gray-500 font-medium">Đang lọc theo:</span>
        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-red-50 text-red-700 border border-red-100">
            Có quyền xuất Excel
            <button class="hover:text-red-900"><span class="iconify text-[10px]" data-icon="mdi:close"></span></button>
        </span>
        <button class="text-xs font-medium text-gray-500 hover:text-gray-900 transition-colors">Xóa bộ lọc</button>
    </div>
</div>
