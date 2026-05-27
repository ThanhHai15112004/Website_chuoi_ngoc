<?php
// views/components/Admin/nhat_ky/tabs_filter.php
?>
<div class="border-b border-gray-100">
    <!-- Tabs cuộn ngang -->
    <div class="px-2 pt-2 overflow-x-auto custom-scrollbar">
        <div class="flex items-center gap-1 min-w-max px-2">
            <button class="px-4 py-2.5 text-sm font-bold bg-[#6B0D18] text-white rounded-t-lg relative">
                Tất cả <span class="bg-white/20 text-white text-xs px-1.5 py-0.5 rounded ml-1">128</span>
            </button>
            <button class="px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-t-lg transition-colors">
                Đăng nhập <span class="bg-gray-100 text-gray-500 text-xs px-1.5 py-0.5 rounded ml-1">24</span>
            </button>
            <button class="px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-t-lg transition-colors">
                Sản phẩm <span class="bg-gray-100 text-gray-500 text-xs px-1.5 py-0.5 rounded ml-1">15</span>
            </button>
            <button class="px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-t-lg transition-colors">
                Đơn hàng <span class="bg-gray-100 text-gray-500 text-xs px-1.5 py-0.5 rounded ml-1">42</span>
            </button>
            <button class="px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-t-lg transition-colors">
                Kho hàng <span class="bg-gray-100 text-gray-500 text-xs px-1.5 py-0.5 rounded ml-1">18</span>
            </button>
            <button class="px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-t-lg transition-colors">
                Nhân sự <span class="bg-gray-100 text-gray-500 text-xs px-1.5 py-0.5 rounded ml-1">5</span>
            </button>
            <button class="px-4 py-2.5 text-sm font-medium text-gray-600 hover:bg-gray-50 rounded-t-lg transition-colors">
                Cấu hình <span class="bg-gray-100 text-gray-500 text-xs px-1.5 py-0.5 rounded ml-1">6</span>
            </button>
            <button class="px-4 py-2.5 text-sm font-bold text-red-600 hover:bg-red-50 rounded-t-lg transition-colors flex items-center gap-1">
                <span class="iconify" data-icon="mdi:shield-alert-outline"></span> Nguy hiểm <span class="bg-red-100 text-red-600 text-xs px-1.5 py-0.5 rounded ml-1">3</span>
            </button>
        </div>
    </div>
</div>

<div class="p-4 md:p-6 bg-white border-b border-gray-100 space-y-4">
    <!-- Thanh tìm kiếm & Bộ lọc nâng cao -->
    <div class="flex flex-col md:flex-row gap-3">
        <!-- Input tìm kiếm -->
        <div class="flex-1 relative">
            <span class="iconify absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
            <input type="text" placeholder="Tìm theo nhân viên, hành động, mã đơn, đối tượng, IP..." class="w-full pl-10 pr-4 py-2.5 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-colors">
        </div>
        
        <!-- Filter Selects -->
        <div class="flex flex-wrap md:flex-nowrap gap-3 shrink-0">
            <select class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 bg-white focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] min-w-[150px]">
                <option value="">Tất cả nhân viên</option>
                <option value="super_admin">Hải Admin</option>
                <option value="kho">Tuấn Kho</option>
                <option value="cskh">Lan CSKH</option>
            </select>
            
            <select class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 bg-white focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] min-w-[150px]">
                <option value="">Tất cả mức độ</option>
                <option value="normal">Bình thường</option>
                <option value="important">Quan trọng</option>
                <option value="danger">Nguy hiểm</option>
                <option value="security">Bảo mật</option>
            </select>

            <select class="px-3 py-2.5 border border-gray-200 rounded-lg text-sm text-gray-700 bg-white focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] min-w-[150px]">
                <option value="today">Hôm nay</option>
                <option value="yesterday">Hôm qua</option>
                <option value="7days">7 ngày qua</option>
                <option value="30days">30 ngày qua</option>
                <option value="custom">Tùy chọn ngày...</option>
            </select>

            <button class="px-6 py-2.5 bg-[#6B0D18] text-white font-medium rounded-lg hover:bg-red-900 transition-colors text-sm shadow-sm flex items-center gap-2 shrink-0">
                <span class="iconify" data-icon="mdi:filter-variant"></span> Lọc
            </button>
        </div>
    </div>
    
    <!-- Active filters -->
    <div class="flex items-center gap-2">
        <span class="text-xs text-gray-500 font-medium">Đang lọc theo:</span>
        <div class="flex flex-wrap gap-2">
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-gray-100 text-gray-700 text-xs font-medium border border-gray-200">
                Hôm nay
                <button class="text-gray-400 hover:text-red-600"><span class="iconify" data-icon="mdi:close"></span></button>
            </span>
            <button class="text-xs text-gray-500 hover:text-[#6B0D18] hover:underline px-1">Xóa bộ lọc</button>
        </div>
    </div>
</div>
