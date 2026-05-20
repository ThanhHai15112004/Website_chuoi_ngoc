    <!-- Main Content Area -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-4">
        
        <!-- Tabs Loại Thông Báo -->
        <div class="flex space-x-1 border-b border-gray-100 overflow-x-auto hide-scrollbar pb-1">
            <button class="tab-btn px-4 py-2 bg-[#6B0D18] text-white rounded-t-lg font-medium text-sm whitespace-nowrap transition-colors">Tất cả (1248)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Đơn hàng (320)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Voucher (120)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Khuyến mãi (80)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Bình luận / đánh giá (45)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Hệ thống (45)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Tin nhắn gửi (210)</button>
        </div>

        <!-- Tabs Trạng thái -->
        <div class="flex space-x-4 overflow-x-auto hide-scrollbar pt-1">
            <button class="text-sm font-medium text-[#6B0D18] border-b-2 border-[#6B0D18] pb-1 whitespace-nowrap">Tất cả</button>
            <button class="text-sm font-medium text-gray-500 hover:text-gray-700 pb-1 whitespace-nowrap relative">Chưa đọc <span class="absolute -top-1 -right-3 w-2 h-2 rounded-full bg-red-500"></span></button>
            <button class="text-sm font-medium text-gray-500 hover:text-gray-700 pb-1 whitespace-nowrap">Đã đọc</button>
            <button class="text-sm font-medium text-gray-500 hover:text-gray-700 pb-1 whitespace-nowrap">Đã gửi</button>
            <button class="text-sm font-medium text-gray-500 hover:text-gray-700 pb-1 whitespace-nowrap">Đang lên lịch</button>
            <button class="text-sm font-medium text-gray-400 hover:text-gray-700 pb-1 whitespace-nowrap">Nháp</button>
            <button class="text-sm font-medium text-red-500 hover:text-red-700 pb-1 whitespace-nowrap">Gửi thất bại</button>
        </div>

        <!-- Search & Filters -->
        <div class="flex flex-col lg:flex-row gap-3 pt-2">
            <div class="relative flex-1">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm theo tiêu đề, nội dung, người nhận..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
            </div>
            
            <div class="flex flex-wrap gap-2">
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Người nhận</option>
                    <option value="kh">Một khách hàng</option>
                    <option value="gold">Nhóm Gold</option>
                    <option value="diamond">Nhóm Diamond</option>
                    <option value="admin">Nội bộ Admin</option>
                </select>

                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Thời gian</option>
                    <option value="today">Hôm nay</option>
                    <option value="7days">7 ngày qua</option>
                    <option value="this_month">Tháng này</option>
                </select>

                <button class="px-3 py-2 bg-gray-50 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors font-medium text-sm flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:filter-variant"></span>
                    Bộ lọc
                </button>
            </div>
        </div>

        <!-- Active Filters Chips -->
        <div class="flex flex-wrap gap-2">
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-gray-100 text-gray-600 text-xs font-medium border border-gray-200">
                Người nhận: Nhóm Gold
                <button class="hover:text-gray-900"><span class="iconify" data-icon="mdi:close"></span></button>
            </span>
            <button class="text-xs text-gray-500 hover:text-[#6B0D18] underline font-medium">Xóa bộ lọc</button>
        </div>
    </div>
