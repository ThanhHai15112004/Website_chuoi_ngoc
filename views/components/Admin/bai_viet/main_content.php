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

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Bulk Actions -->
        <div class="p-3 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
            <span class="text-sm text-gray-500 px-2 border-r border-gray-300">Đã chọn: <strong class="text-gray-800">0</strong></span>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-sm font-medium disabled:opacity-50" disabled>Đăng bài</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-sm font-medium disabled:opacity-50" disabled>Ẩn bài</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-md hover:bg-red-50 hover:border-red-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Xóa</button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 uppercase text-[11px] font-semibold sticky top-0 z-10 tracking-wider">
                    <tr>
                        <th class="px-4 py-3 w-10">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </th>
                        <th class="px-4 py-3">Bài viết</th>
                        <th class="px-4 py-3">Danh mục & Tag</th>
                        <th class="px-4 py-3 text-center">Tương tác</th>
                        <th class="px-4 py-3">Trạng thái & SEO</th>
                        <th class="px-4 py-3">Thời gian & Tác giả</th>
                        <th class="px-4 py-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <!-- Bài 1: Đã đăng, SEO Tốt -->
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top max-w-[280px]">
                            <div class="flex gap-3">
                                <div class="w-[72px] h-[48px] bg-gray-200 rounded-[10px] overflow-hidden shrink-0">
                                    <img src="https://images.unsplash.com/photo-1611080352516-724bbba96ee7?w=150&q=80" alt="thumbnail" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0 cursor-pointer" onclick="openPostDrawer(1)">
                                    <div class="font-bold text-gray-900 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors text-sm leading-tight">
                                        Cách chọn vòng phong thủy theo mệnh chuẩn và dễ hiểu
                                    </div>
                                    <div class="text-[11px] text-gray-400 mt-1 truncate">/cach-chon-vong-phong-thuy-theo-menh</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-0.5 rounded text-[11px] font-medium bg-red-50 text-[#6B0D18] border border-red-100 mb-2">Chọn vòng theo mệnh</span>
                            <div class="flex flex-wrap gap-1">
                                <span class="inline-flex px-1.5 py-0.5 rounded-full bg-gray-100 text-gray-600 text-[10px]">Mệnh Hỏa</span>
                                <span class="inline-flex px-1.5 py-0.5 rounded-full bg-gray-100 text-gray-600 text-[10px]">Ngọc bích</span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top text-center">
                            <div class="flex flex-col gap-1.5 items-center">
                                <div class="flex items-center gap-1 font-bold text-[#6B0D18]" title="Lượt xem">
                                    <span class="iconify text-sm" data-icon="mdi:eye"></span> 1.2K
                                </div>
                                <div class="flex items-center gap-1 text-gray-600 text-xs" title="Bình luận">
                                    <span class="iconify text-sm" data-icon="mdi:comment-text-outline"></span> 12
                                </div>
                                <a href="#" class="text-[10px] text-blue-600 hover:underline flex items-center gap-0.5 mt-1">
                                    <span class="iconify" data-icon="mdi:link-variant"></span> 4 SP liên quan
                                </a>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-2 items-start">
                                <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-emerald-50 text-emerald-700">Đã đăng</span>
                                <span class="inline-flex px-1.5 py-0.5 rounded border border-emerald-200 text-[10px] font-medium bg-white text-emerald-600 flex items-center gap-1">
                                    <span class="iconify" data-icon="mdi:check-circle"></span> SEO Tốt
                                </span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs text-gray-800 mb-0.5">17/05/2026</div>
                            <div class="text-[10px] text-gray-400 mb-2">Cập nhật: 18/05</div>
                            <div class="flex items-center gap-1.5">
                                <div class="w-4 h-4 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-[8px]">HA</div>
                                <span class="text-xs font-medium text-gray-700">Hải Admin</span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-1">
                                <a href="<?= APP_URL ?>/admin/post/sua" class="px-2.5 py-1.5 bg-white border border-gray-200 text-[#6B0D18] rounded-md hover:bg-red-50 transition-colors text-xs font-medium">Sửa</a>
                                <button class="p-1.5 text-gray-400 hover:text-gray-700 hover:bg-gray-100 rounded transition-colors" onclick="toggleRowMenu(this)">
                                    <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                </button>
                                <!-- Menu -->
                                <div class="absolute right-0 top-10 mt-1 w-40 bg-white rounded-md shadow-lg border border-gray-100 hidden z-20 row-menu">
                                    <div class="py-1">
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="openPostDrawer(1)"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem trước</a>
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"><span class="iconify text-gray-400" data-icon="mdi:content-copy"></span> Nhân bản</a>
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="openHideModal()"><span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn bài viết</a>
                                        <hr class="my-1 border-gray-100">
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50" onclick="openDeleteModal()"><span class="iconify text-red-400" data-icon="mdi:trash-can-outline"></span> Xóa bài</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Bài 2: Bản nháp, Thiếu SEO -->
                    <tr class="hover:bg-gray-50/80 transition-colors group bg-gray-50/30">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top max-w-[280px]">
                            <div class="flex gap-3">
                                <div class="w-[72px] h-[48px] bg-gray-100 border border-gray-200 border-dashed rounded-[10px] flex items-center justify-center shrink-0">
                                    <span class="iconify text-gray-300 text-xl" data-icon="mdi:image-outline"></span>
                                </div>
                                <div class="flex-1 min-w-0 cursor-pointer">
                                    <div class="font-bold text-gray-900 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors text-sm leading-tight">
                                        Bí quyết bảo quản vòng đá thạch anh luôn sáng bóng
                                    </div>
                                    <div class="text-[11px] text-gray-400 mt-1 truncate">/bao-quan-vong-da</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100 text-gray-600 mb-2">Hướng dẫn bảo quản</span>
                        </td>
                        <td class="px-4 py-4 align-top text-center">
                            <div class="text-gray-400 text-xs">-</div>
                            <span class="inline-flex px-1.5 py-0.5 rounded-full bg-yellow-50 text-amber-600 text-[10px] mt-2 border border-amber-100">Chưa gắn SP</span>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-2 items-start">
                                <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">Bản nháp</span>
                                <span class="inline-flex px-1.5 py-0.5 rounded border border-red-200 text-[10px] font-medium bg-red-50 text-red-600 flex items-center gap-1" title="Thiếu ảnh đại diện, meta description">
                                    <span class="iconify" data-icon="mdi:alert-circle-outline"></span> Thiếu thông tin
                                </span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs text-gray-800 mb-2">Hôm nay</div>
                            <div class="flex items-center gap-1.5">
                                <div class="w-4 h-4 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold text-[8px]">NV</div>
                                <span class="text-xs text-gray-600">Nhân viên nội dung</span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-1">
                                <a href="#" class="px-2.5 py-1.5 bg-white border border-gray-200 text-[#6B0D18] rounded-md hover:bg-red-50 transition-colors text-xs font-medium">Sửa</a>
                            </div>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-white">
            <div class="text-sm text-gray-500">
                Hiển thị <span class="font-medium text-gray-800">1</span> - <span class="font-medium text-gray-800">2</span> trong <span class="font-medium text-gray-800">128</span> bài viết
            </div>
            <div class="flex items-center gap-1">
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-md text-sm font-medium shadow-sm">1</button>
                <button class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">2</button>
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
            </div>
        </div>
    </div>
</div>

