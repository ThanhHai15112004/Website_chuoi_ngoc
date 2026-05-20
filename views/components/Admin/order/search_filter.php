        <!-- Search & Filter Bar -->
        <div class="p-4 border-b border-gray-100 flex flex-col gap-3">
            <div class="flex flex-col lg:flex-row gap-3">
                <!-- Search -->
                <div class="relative flex-1 group">
                    <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-[#6B0D18] transition-colors" data-icon="mdi:magnify"></span>
                    <input type="text" placeholder="Tìm theo mã đơn, tên khách hàng, số điện thoại..." class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                </div>
                
                <!-- Filters -->
                <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar">
                    <select class="px-3 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 min-w-[140px] cursor-pointer">
                        <option value="">Thời gian: Tất cả</option>
                        <option value="today">Hôm nay</option>
                        <option value="7days">7 ngày qua</option>
                        <option value="30days">30 ngày qua</option>
                        <option value="month">Tháng này</option>
                    </select>
                    
                    <select class="px-3 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 min-w-[140px] cursor-pointer">
                        <option value="">Thanh toán: Tất cả</option>
                        <option value="chua_tt">Chưa thanh toán</option>
                        <option value="cho_tt">Chờ thanh toán</option>
                        <option value="da_tt">Đã thanh toán</option>
                        <option value="loi">Thanh toán thất bại</option>
                    </select>
                    
                    <select class="px-3 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 min-w-[160px] cursor-pointer">
                        <option value="">Hình thức: Tất cả</option>
                        <option value="cod">Thanh toán khi nhận hàng</option>
                        <option value="ck">Chuyển khoản</option>
                        <option value="vnpay">VNPay</option>
                    </select>
                    
                    <button class="px-4 py-2 text-white bg-[#6B0D18] rounded-xl hover:bg-[#4C0519] text-sm font-medium transition-colors whitespace-nowrap flex items-center gap-1.5 shadow-sm">
                        <span class="iconify" data-icon="mdi:filter-variant"></span> Lọc
                    </button>
                </div>
            </div>
            
            <!-- Active Filters Chips -->
            <div class="flex items-center gap-2 flex-wrap">
                <span class="text-xs text-gray-500 font-medium">Đang lọc theo:</span>
                <div class="flex items-center gap-1 px-2.5 py-1 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-700">
                    Thời gian: Tháng này
                    <button class="text-gray-400 hover:text-red-500 ml-1"><span class="iconify" data-icon="mdi:close"></span></button>
                </div>
                <div class="flex items-center gap-1 px-2.5 py-1 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-700">
                    Hình thức: COD
                    <button class="text-gray-400 hover:text-red-500 ml-1"><span class="iconify" data-icon="mdi:close"></span></button>
                </div>
                <button class="text-xs text-[#6B0D18] hover:underline ml-2 font-medium">Xóa bộ lọc</button>
            </div>
        </div>
