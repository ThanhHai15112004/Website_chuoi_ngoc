            
            <!-- 1. Thông tin cơ bản -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-red-50 text-[#6B0D18] flex items-center justify-center text-sm">1</span> Thông tin cơ bản
                </h3>
                <div class="space-y-4 ml-8">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tiêu đề thông báo <span class="text-red-500">*</span></label>
                        <input type="text" id="noti-title" placeholder="Ví dụ: Voucher mới dành riêng cho bạn tháng này" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all" oninput="updatePreview()">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Loại thông báo <span class="text-red-500">*</span></label>
                            <select id="noti-type" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all bg-white" onchange="updatePreview()">
                                <option value="tin_nhan">Tin nhắn từ cửa hàng</option>
                                <option value="voucher">Voucher / Khuyến mãi</option>
                                <option value="don_hang">Thông báo đơn hàng</option>
                                <option value="tai_khoan">Tài khoản & Hạng</option>
                                <option value="he_thong">Thông báo hệ thống</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mức độ ưu tiên</label>
                            <div class="flex items-center gap-3 h-[42px]">
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="priority" value="normal" checked class="text-[#6B0D18] focus:ring-[#6B0D18]" onchange="updatePreview()">
                                    <span class="text-sm text-gray-600">Bình thường</span>
                                </label>
                                <label class="flex items-center gap-2 cursor-pointer">
                                    <input type="radio" name="priority" value="high" class="text-red-600 focus:ring-red-600" onchange="updatePreview()">
                                    <span class="text-sm font-medium text-red-600">Quan trọng</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Cảnh báo quan trọng -->
                    <div id="priority-warning" class="hidden bg-red-50 p-3 rounded-lg border border-red-100 flex gap-2">
                        <span class="iconify text-red-500 shrink-0 text-lg" data-icon="mdi:alert-circle-outline"></span>
                        <p class="text-xs text-red-700">Chỉ dùng mức Quan trọng cho các thông báo khẩn, thay đổi chính sách, hoặc xử lý sự cố. Không dùng để quảng cáo.</p>
                    </div>
                </div>
            </div>

            <!-- 2. Đối tượng nhận -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-red-50 text-[#6B0D18] flex items-center justify-center text-sm">2</span> Đối tượng nhận
                </h3>
                <div class="space-y-4 ml-8">
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <label class="border border-gray-200 rounded-lg p-3 cursor-pointer hover:border-[#6B0D18] hover:bg-red-50/30 transition-colors flex flex-col gap-1 target-label">
                            <input type="radio" name="target" value="all" class="hidden" checked onchange="handleTargetChange(this)">
                            <div class="font-medium text-sm text-gray-800">Tất cả khách hàng</div>
                            <div class="text-xs text-gray-500">~ 2.540 người</div>
                        </label>
                        <label class="border border-gray-200 rounded-lg p-3 cursor-pointer hover:border-[#6B0D18] hover:bg-red-50/30 transition-colors flex flex-col gap-1 target-label">
                            <input type="radio" name="target" value="group" class="hidden" onchange="handleTargetChange(this)">
                            <div class="font-medium text-sm text-gray-800">Theo nhóm / Hạng</div>
                            <div class="text-xs text-gray-500">Lọc theo Gold, Silver...</div>
                        </label>
                        <label class="border border-gray-200 rounded-lg p-3 cursor-pointer hover:border-[#6B0D18] hover:bg-red-50/30 transition-colors flex flex-col gap-1 target-label">
                            <input type="radio" name="target" value="specific" class="hidden" onchange="handleTargetChange(this)">
                            <div class="font-medium text-sm text-gray-800">Khách cụ thể</div>
                            <div class="text-xs text-gray-500">Chọn 1 hoặc nhiều người</div>
                        </label>
                        <label class="border border-gray-200 rounded-lg p-3 cursor-pointer hover:border-[#6B0D18] hover:bg-red-50/30 transition-colors flex flex-col gap-1 target-label">
                            <input type="radio" name="target" value="internal" class="hidden" onchange="handleTargetChange(this)">
                            <div class="font-medium text-sm text-gray-800">Nội bộ Admin</div>
                            <div class="text-xs text-gray-500">Tin nhắn hệ thống</div>
                        </label>
                    </div>

                    <!-- Vùng mở rộng khi chọn Nhóm -->
                    <div id="target-group-panel" class="hidden bg-gray-50 p-4 rounded-lg border border-gray-200 mt-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Chọn nhóm khách hàng</label>
                        <div class="flex flex-wrap gap-2">
                            <label class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-gray-200 rounded-full cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" class="text-[#6B0D18] rounded focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Hạng Silver</span>
                            </label>
                            <label class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-gray-200 rounded-full cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" class="text-[#6B0D18] rounded focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Hạng Gold</span>
                            </label>
                            <label class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-gray-200 rounded-full cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" class="text-[#6B0D18] rounded focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Hạng Diamond</span>
                            </label>
                            <label class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-gray-200 rounded-full cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" class="text-[#6B0D18] rounded focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Khách chưa mua hàng</span>
                            </label>
                            <label class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-white border border-gray-200 rounded-full cursor-pointer hover:bg-gray-50">
                                <input type="checkbox" class="text-[#6B0D18] rounded focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Khách mệnh Kim</span>
                            </label>
                        </div>
                    </div>

                    <!-- Vùng mở rộng khi chọn Khách cụ thể -->
                    <div id="target-specific-panel" class="hidden bg-gray-50 p-4 rounded-lg border border-gray-200 mt-2">
                        <div class="relative">
                            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                            <input type="text" placeholder="Tìm theo tên, số điện thoại, email khách hàng..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        </div>
                        <!-- Khách đã chọn -->
                        <div class="flex flex-wrap gap-2 mt-3">
                            <span class="inline-flex items-center gap-1 pl-2.5 pr-1 py-1 rounded-md bg-white border border-gray-200 text-gray-700 text-xs font-medium">
                                Nguyễn Văn A (090123***)
                                <button class="p-0.5 hover:bg-red-50 hover:text-red-500 rounded"><span class="iconify" data-icon="mdi:close"></span></button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 3. Nội dung -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-base font-bold text-gray-800 flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-red-50 text-[#6B0D18] flex items-center justify-center text-sm">3</span> Nội dung thông báo
                    </h3>
                    <div class="text-xs text-gray-500"><span id="char-count">0</span> / 500 ký tự</div>
                </div>
                
                <div class="space-y-3 ml-8">
                    <!-- Toolbar chèn biến -->
                    <div class="flex flex-wrap items-center gap-2 bg-gray-50 p-2 rounded-t-lg border border-gray-200 border-b-0">
                        <span class="text-xs text-gray-500 font-medium mr-2">Chèn cá nhân hóa:</span>
                        <button type="button" class="px-2 py-1 bg-white border border-gray-200 rounded text-xs text-gray-600 hover:border-[#6B0D18] hover:text-[#6B0D18] transition-colors" onclick="insertVar('{ten_khach_hang}')">{Tên_khách}</button>
                        <button type="button" class="px-2 py-1 bg-white border border-gray-200 rounded text-xs text-gray-600 hover:border-[#6B0D18] hover:text-[#6B0D18] transition-colors" onclick="insertVar('{ma_voucher}')">{Mã_voucher}</button>
                        <button type="button" class="px-2 py-1 bg-white border border-gray-200 rounded text-xs text-gray-600 hover:border-[#6B0D18] hover:text-[#6B0D18] transition-colors" onclick="insertVar('{ma_don_hang}')">{Mã_đơn}</button>
                        <button type="button" class="px-2 py-1 bg-white border border-gray-200 rounded text-xs text-gray-600 hover:border-[#6B0D18] hover:text-[#6B0D18] transition-colors" onclick="insertVar('{hang_thanh_vien}')">{Hạng}</button>
                    </div>
                    <textarea id="noti-content" rows="6" placeholder="Nhập nội dung thông báo. Viết ngắn gọn, súc tích..." class="w-full px-4 py-3 border border-gray-200 rounded-b-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all -mt-3 resize-none" oninput="updatePreview(); countChars(this)"></textarea>

                    <!-- Link liên kết -->
                    <div class="mt-4 pt-4 border-t border-gray-100">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Đính kèm liên kết (Tùy chọn)</label>
                        <div class="flex gap-2">
                            <select class="w-1/3 px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] bg-white">
                                <option value="">Không có link</option>
                                <option value="voucher">Trang Voucher</option>
                                <option value="product">Sản phẩm cụ thể</option>
                                <option value="order">Đơn hàng</option>
                                <option value="custom">Link tùy chỉnh</option>
                            </select>
                            <input type="text" placeholder="Nhập đường dẫn hoặc chọn sản phẩm..." class="flex-1 px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] bg-gray-50" disabled>
                        </div>
                    </div>
                </div>
            </div>

            <!-- 4. Lịch gửi -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
                <h3 class="text-base font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-red-50 text-[#6B0D18] flex items-center justify-center text-sm">4</span> Thời gian gửi
                </h3>
                
                <div class="space-y-4 ml-8">
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="schedule" value="now" checked class="text-[#6B0D18] focus:ring-[#6B0D18]" onchange="handleScheduleChange(this)">
                            <span class="text-sm font-medium text-gray-800">Gửi ngay</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="schedule" value="later" class="text-[#6B0D18] focus:ring-[#6B0D18]" onchange="handleScheduleChange(this)">
                            <span class="text-sm font-medium text-gray-800">Lên lịch gửi</span>
                        </label>
                    </div>

                    <div id="schedule-panel" class="hidden flex gap-3 p-4 bg-blue-50/50 border border-blue-100 rounded-lg">
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Ngày gửi</label>
                            <input type="date" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-500 mb-1">Giờ gửi</label>
                            <input type="time" class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-end gap-3 pt-2">
                <button class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy</button>
                <button class="px-6 py-2.5 bg-gray-100 border border-transparent text-gray-700 rounded-lg hover:bg-gray-200 transition-colors font-medium text-sm">Lưu nháp</button>
                <button onclick="confirmSend()" id="btn-submit" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:send-outline"></span>
                    Gửi thông báo
                </button>
            </div>
