<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
    
    <!-- Bộ lọc thời gian (Quick filters) -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4 pb-4 border-b border-gray-100">
        <div class="flex items-center gap-2 overflow-x-auto scrollbar-hide pb-1">
            <button class="px-4 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap">Hôm nay</button>
            <button class="px-4 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap">7 ngày qua</button>
            <button class="px-4 py-1.5 bg-[#6B0D18] text-white border border-[#6B0D18] rounded-full text-sm font-medium whitespace-nowrap shadow-sm">Tháng này</button>
            <button class="px-4 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap">Tháng trước</button>
            <button class="px-4 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap">Năm nay</button>
            <button class="px-4 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-50 whitespace-nowrap flex items-center gap-1.5">
                <span class="iconify" data-icon="mdi:calendar-range"></span> Tùy chọn
            </button>
        </div>
        
        <div class="flex items-center text-[13px] text-gray-500 shrink-0">
            <span class="iconify mr-1" data-icon="mdi:information-outline"></span> 
            Dữ liệu tính từ đơn hàng có trạng thái <strong class="text-green-600 ml-1">Thành công</strong>
        </div>
    </div>

    <!-- Bộ lọc nâng cao -->
    <div class="flex flex-wrap items-center gap-3">
        <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:border-[#6B0D18] focus:ring-0 outline-none w-full md:w-auto">
            <option>Tất cả trạng thái</option>
            <option selected>Thành công</option>
            <option>Đã giao</option>
            <option>Đang giao</option>
            <option>Đã hủy</option>
        </select>
        
        <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:border-[#6B0D18] focus:ring-0 outline-none w-full md:w-auto">
            <option>Phương thức TT</option>
            <option>COD</option>
            <option>Chuyển khoản</option>
            <option>VNPay</option>
        </select>

        <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:border-[#6B0D18] focus:ring-0 outline-none w-full md:w-auto">
            <option>Danh mục SP</option>
            <option>Vòng tay phong thủy</option>
            <option>Chuỗi ngọc</option>
            <option>Quà tặng</option>
        </select>

        <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:border-[#6B0D18] focus:ring-0 outline-none w-full md:w-auto">
            <option>Loại đá/ngọc</option>
            <option>Ngọc bích</option>
            <option>Thạch anh</option>
            <option>Trầm hương</option>
        </select>
        
        <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:border-[#6B0D18] focus:ring-0 outline-none w-full md:w-auto">
            <option>Mệnh</option>
            <option>Kim</option>
            <option>Mộc</option>
            <option>Thủy</option>
            <option>Hỏa</option>
            <option>Thổ</option>
        </select>

        <div class="flex-1"></div>

        <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors w-full md:w-auto text-center">
            Xóa bộ lọc
        </button>
        <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors w-full md:w-auto text-center">
            Áp dụng
        </button>
    </div>
    
    <!-- Chip đang lọc -->
    <div class="flex items-center gap-2 mt-4 pt-4 border-t border-gray-50">
        <span class="text-xs text-gray-500 font-medium">Đang lọc:</span>
        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-red-50 text-red-800 text-xs font-medium border border-red-100">
            Tháng này <span class="iconify cursor-pointer hover:text-red-900" data-icon="mdi:close"></span>
        </span>
        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-red-50 text-red-800 text-xs font-medium border border-red-100">
            Thành công <span class="iconify cursor-pointer hover:text-red-900" data-icon="mdi:close"></span>
        </span>
    </div>

</div>
