                    <!-- Search & Filter Bar -->
                    <div class="p-4 border-b border-gray-100 flex flex-col md:flex-row gap-4 items-center justify-between bg-white">
                        <div class="relative w-full md:w-80 group">
                            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-[#6B0D18] transition-colors" data-icon="mdi:magnify"></span>
                            <input type="text" placeholder="Tìm theo tên, mã danh mục..." class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                        </div>
                        <div class="flex items-center gap-3 w-full md:w-auto">
                            <select class="w-full md:w-auto px-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 cursor-pointer">
                                <option value="">Trạng thái: Tất cả</option>
                                <option value="hien">Đang hiển thị</option>
                                <option value="an">Đang ẩn</option>
                            </select>
                            <select class="w-full md:w-auto px-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 cursor-pointer">
                                <option value="">Sản phẩm: Tất cả</option>
                                <option value="co">Đã có sản phẩm</option>
                                <option value="trong">Danh mục trống</option>
                            </select>
                            <button class="px-4 py-2 text-gray-500 bg-gray-50 border border-gray-200 rounded-xl hover:bg-gray-100 text-sm font-medium transition-colors whitespace-nowrap shrink-0 flex items-center gap-1">
                                Lọc
                            </button>
                        </div>
                    </div>

                    <!-- Bulk Actions Bar (Hidden by default) -->
                    <div id="bulkActions" class="bg-[#FAF8F5] px-4 py-3 border-b border-[#E4D5C3] hidden items-center justify-between">
                        <div class="flex items-center gap-2 text-sm">
                            <span class="font-bold text-[#6B0D18] id="selectedCount">0</span>
                            <span class="text-gray-600">danh mục đang chọn</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-1.5">
                                <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Hiện
                            </button>
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-1.5">
                                <span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn
                            </button>
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-lg text-xs font-medium hover:bg-red-50 hover:border-red-200 transition-colors shadow-sm flex items-center gap-1.5">
                                <span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa
                            </button>
                        </div>
                    </div>

                    <div class="px-4 py-2 border-b border-gray-100 flex items-center justify-end">
                        <button onclick="openModal('sortModal')" class="px-4 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-2">
                            <span class="iconify text-gray-400" data-icon="mdi:swap-vertical"></span> Sắp xếp thứ tự
                        </button>
                    </div>
