    <!-- Tabs & Filters Container -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-4">
        
        <!-- Tabs -->
        <div class="flex space-x-1 border-b border-gray-100 overflow-x-auto hide-scrollbar" id="voucher-tabs">
            <button class="tab-btn px-4 py-2 border-b-2 border-[#6B0D18] text-[#6B0D18] font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Tất cả (48)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Đang hoạt động (12)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Sắp hết hạn (5)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Hết hạn (18)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Chưa bắt đầu (8)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Hết lượt (3)</button>
            <button class="tab-btn px-4 py-2 border-b-2 border-transparent text-gray-500 hover:text-gray-700 font-medium text-sm whitespace-nowrap" onclick="switchTab(this)">Đã tắt (2)</button>
        </div>

        <!-- Search & Filters -->
        <div class="flex flex-col lg:flex-row gap-3">
            <div class="relative flex-1">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm theo mã voucher, tên chương trình..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
            </div>
            
            <div class="flex flex-wrap gap-2">
                <!-- Bộ lọc Loại -->
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Loại giảm giá</option>
                    <option value="percent">Giảm phần trăm</option>
                    <option value="fixed">Giảm số tiền cố định</option>
                    <option value="freeship">Miễn phí vận chuyển</option>
                    <option value="gift">Quà tặng</option>
                </select>

                <!-- Bộ lọc Thời gian -->
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Thời gian</option>
                    <option value="active">Đang hiệu lực</option>
                    <option value="upcoming">Sắp diễn ra</option>
                    <option value="expired">Đã hết hạn</option>
                </select>
                
                <!-- Bộ lọc Đối tượng -->
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Đối tượng</option>
                    <option value="all">Tất cả khách hàng</option>
                    <option value="new">Khách hàng mới</option>
                    <option value="silver">Hạng Silver</option>
                    <option value="gold">Hạng Gold</option>
                    <option value="diamond">Hạng Diamond</option>
                </select>

                <button class="px-3 py-2 bg-gray-50 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors font-medium text-sm flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:filter-variant"></span>
                    Lọc thêm
                </button>
            </div>
        </div>

        <!-- Active Filters Chips -->
        <div class="flex flex-wrap gap-2 pt-2">
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-red-50 text-[#6B0D18] text-xs font-medium">
                Đang hoạt động
                <button class="hover:text-red-900"><span class="iconify" data-icon="mdi:close"></span></button>
            </span>
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-gray-100 text-gray-600 text-xs font-medium">
                Loại: Giảm số tiền
                <button class="hover:text-gray-900"><span class="iconify" data-icon="mdi:close"></span></button>
            </span>
            <button class="text-xs text-gray-500 hover:text-[#6B0D18] underline font-medium">Xóa bộ lọc</button>
        </div>
    </div>

