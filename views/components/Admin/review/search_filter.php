    <!-- Search & Filter Bar -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="relative w-full md:w-96 shrink-0">
            <input type="text" placeholder="Tìm tên khách, sản phẩm, nội dung..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-shadow">
            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
        </div>
        <div class="flex items-center gap-3 overflow-x-auto pb-1 md:pb-0 scrollbar-hide w-full md:w-auto">
            <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="">Tất cả sao</option>
                <option value="5">5 Sao</option>
                <option value="4">4 Sao</option>
                <option value="1-2">1 - 2 Sao (Cần chú ý)</option>
            </select>
            <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0">
                <option value="">Loại đính kèm</option>
                <option value="has_img">Có hình ảnh</option>
                <option value="no_img">Không có hình ảnh</option>
            </select>
            <button class="px-3 py-2 bg-gray-100 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-200 transition-colors shrink-0">
                Xóa lọc
            </button>
        </div>
    </div>

