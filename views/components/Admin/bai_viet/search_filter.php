    <!-- Main Content Area -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-4">
        
        <!-- Tabs Trạng thái -->
        <div class="flex space-x-1 border-b border-gray-100 overflow-x-auto hide-scrollbar pb-1">
            <button class="tab-btn px-4 py-2 bg-[#6B0D18] text-white rounded-t-lg font-medium text-sm whitespace-nowrap transition-colors">Tất cả (128)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Đã đăng (96)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Bản nháp (18)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Chờ duyệt (6)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Đã ẩn (8)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-amber-600 hover:text-amber-800 font-medium text-sm whitespace-nowrap transition-colors relative">Cần tối ưu SEO <span class="absolute top-1 right-1 w-2 h-2 rounded-full bg-amber-500"></span></button>
        </div>

        <!-- Search & Filters -->
        <div class="flex flex-col lg:flex-row gap-3 pt-2">
            <div class="relative flex-1">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm theo tiêu đề, tác giả, tag, danh mục..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
            </div>
            
            <div class="flex flex-wrap gap-2">
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Danh mục</option>
                    <option value="kt">Kiến thức phong thủy</option>
                    <option value="cv">Chọn vòng theo mệnh</option>
                    <option value="yn">Ý nghĩa đá / ngọc</option>
                </select>

                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">SEO</option>
                    <option value="good">Đã tối ưu SEO</option>
                    <option value="missing">Thiếu Meta/Ảnh</option>
                </select>

                <button class="px-3 py-2 bg-gray-50 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors font-medium text-sm flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:filter-variant"></span>
                    Bộ lọc
                </button>
            </div>
        </div>
    </div>
