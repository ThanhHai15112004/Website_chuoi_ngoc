            <!-- Điều kiện áp dụng -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-5">
                <h4 class="font-semibold text-gray-800 flex items-center gap-2 border-b border-gray-50 pb-3 text-lg">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:format-list-checks"></span>
                    Điều kiện áp dụng
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Giá trị đơn hàng tối thiểu</label>
                        <div class="relative">
                            <input type="number" id="input_dieu_kien" oninput="updatePreview()" placeholder="0 = Không yêu cầu" class="w-full px-4 py-2.5 pr-8 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">đ</span>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Phạm vi sản phẩm</label>
                        <select class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm bg-white transition-colors">
                            <option value="all">Toàn bộ cửa hàng</option>
                            <option value="category">Danh mục cụ thể</option>
                            <option value="product">Sản phẩm cụ thể</option>
                        </select>
                    </div>
                </div>
                
                <div class="pt-2">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" class="w-5 h-5 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        <span class="text-sm text-gray-700 font-medium">Không áp dụng cùng lúc với sản phẩm đang giảm giá</span>
                    </label>
                </div>
            </div>

            <!-- Đối tượng & Thời gian -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Thời gian -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-5">
                    <h4 class="font-semibold text-gray-800 flex items-center gap-2 border-b border-gray-50 pb-3 text-lg">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:calendar-clock-outline"></span>
                        Thời gian & Giới hạn
                    </h4>

                    <div class="space-y-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider">Bắt đầu <span class="text-red-500">*</span></label>
                            <input type="datetime-local" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider">Kết thúc <span class="text-red-500">*</span></label>
                            <input type="datetime-local" id="input_date" onchange="updatePreview()" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                        </div>
                        <div class="space-y-1.5 pt-4 border-t border-gray-50">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider">Tổng số lượt sử dụng</label>
                            <div class="flex items-center gap-4">
                                <input type="number" placeholder="VD: 100" class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                                <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer whitespace-nowrap font-medium">
                                    <input type="checkbox" class="w-5 h-5 text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18]">
                                    Không giới hạn
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Đối tượng -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-5 flex flex-col">
                    <h4 class="font-semibold text-gray-800 flex items-center gap-2 border-b border-gray-50 pb-3 text-lg">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:account-group-outline"></span>
                        Khách hàng áp dụng
                    </h4>

                    <div class="space-y-2.5 flex-1 overflow-y-auto custom-scrollbar pr-2">
                        <label class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors border border-transparent hover:border-gray-200">
                            <input type="radio" name="doi_tuong" value="all" checked class="w-5 h-5 text-[#6B0D18] border-gray-300 focus:ring-[#6B0D18]">
                            <span class="text-sm font-medium text-gray-800">Tất cả khách hàng</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors border border-transparent hover:border-gray-200">
                            <input type="radio" name="doi_tuong" value="new" class="w-5 h-5 text-[#6B0D18] border-gray-300 focus:ring-[#6B0D18]">
                            <span class="text-sm font-medium text-gray-800">Khách hàng mới (chưa mua hàng)</span>
                        </label>
                        
                        <div class="px-3 pt-3 pb-2 border-t border-gray-100 mt-2">
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Hạng thành viên</span>
                        </div>
                        
                        <label class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors border border-transparent hover:border-gray-200">
                            <input type="checkbox" class="w-5 h-5 text-slate-500 rounded border-gray-300 focus:ring-slate-500">
                            <span class="px-2.5 py-1 rounded text-xs font-bold bg-slate-50 border border-slate-200 text-slate-600">Silver</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors border border-transparent hover:border-gray-200">
                            <input type="checkbox" class="w-5 h-5 text-yellow-600 rounded border-gray-300 focus:ring-yellow-600">
                            <span class="px-2.5 py-1 rounded text-xs font-bold bg-yellow-50 border border-yellow-200 text-yellow-700">Gold</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors border border-transparent hover:border-gray-200">
                            <input type="checkbox" class="w-5 h-5 text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18]">
                            <span class="px-2.5 py-1 rounded text-xs font-bold bg-red-50 border border-red-200 text-[#6B0D18]">Diamond</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Trạng thái -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                <div>
                    <h4 class="font-semibold text-gray-800 text-lg">Trạng thái Kích hoạt</h4>
                    <p class="text-sm text-gray-500 mt-1">Voucher sẽ hiển thị và có thể sử dụng nếu đang trong thời gian hiệu lực.</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                </label>
            </div>
