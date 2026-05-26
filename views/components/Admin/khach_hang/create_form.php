    <!-- Form -->
    <div class="bg-white rounded-b-2xl shadow-sm border border-gray-100 p-8 pt-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Cột trái: Thông tin cá nhân -->
            <div class="space-y-5">
                <div class="flex items-center gap-2 border-b border-gray-100 pb-2 mb-4">
                    <span class="iconify text-gray-400 text-lg" data-icon="mdi:card-account-details-outline"></span>
                    <h4 class="text-sm font-bold text-gray-800 uppercase tracking-wide">Thông tin cá nhân</h4>
                </div>
                
                <!-- Upload Avatar -->
                <div class="flex items-center gap-4 mb-2">
                    <div class="relative group cursor-pointer">
                        <div class="w-20 h-20 rounded-full bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center text-gray-400 overflow-hidden group-hover:border-[#6B0D18] group-hover:text-[#6B0D18] transition-colors">
                            <span class="iconify text-2xl" data-icon="mdi:camera-plus-outline"></span>
                            <!-- Hidden input file -->
                            <input type="file" class="absolute inset-0 opacity-0 cursor-pointer" accept="image/*">
                        </div>
                    </div>
                    <div>
                        <h4 class="text-[13px] font-bold text-gray-800">Ảnh đại diện</h4>
                        <p class="text-[11px] text-gray-500 mt-0.5">Hỗ trợ JPG, PNG hoặc GIF.<br>Dung lượng tối đa 2MB.</p>
                    </div>
                </div>
                
                <div>
                    <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Họ và tên <span class="text-red-500">*</span></label>
                    <input type="text" placeholder="Nhập họ tên đầy đủ..." class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Số điện thoại <span class="text-red-500">*</span></label>
                        <input type="text" placeholder="Nhập số điện thoại..." class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
                    </div>
                    <div>
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Giới tính</label>
                        <select class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] transition-all">
                            <option value="nam">Nam</option>
                            <option value="nu">Nữ</option>
                            <option value="khac">Khác</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Email liên hệ</label>
                    <input type="email" placeholder="Nhập địa chỉ email..." class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
                </div>
                
                <div>
                    <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Năm sinh / Tuổi</label>
                    <input type="number" placeholder="Ví dụ: 1995" class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
                    <p class="text-[11px] text-gray-500 mt-1.5 flex items-start gap-1">
                        <span class="iconify shrink-0 mt-0.5 text-blue-500" data-icon="mdi:information-outline"></span>
                        Hệ thống sẽ tự động tính Mệnh phong thủy (Kim, Mộc, Thủy, Hỏa, Thổ) dựa trên năm sinh này để đưa ra gợi ý sản phẩm phù hợp.
                    </p>
                </div>
            </div>

            <!-- Cột phải: Cài đặt tài khoản & Ghi chú -->
            <div class="space-y-5">
                <div class="flex items-center gap-2 border-b border-gray-100 pb-2 mb-4">
                    <span class="iconify text-gray-400 text-lg" data-icon="mdi:shield-account-outline"></span>
                    <h4 class="text-sm font-bold text-gray-800 uppercase tracking-wide">Tài khoản & Ghi chú</h4>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Hạng khởi tạo</label>
                        <select class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] transition-all">
                            <option value="none">Chưa có hạng</option>
                            <option value="silver">Silver</option>
                            <option value="gold">Gold</option>
                            <option value="diamond">Diamond</option>
                        </select>
                    </div>
                    <div class="col-span-2 md:col-span-1">
                        <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Trạng thái</label>
                        <select class="w-full px-4 py-2.5 bg-emerald-50 text-emerald-700 border border-emerald-100 rounded-xl text-sm font-medium focus:outline-none focus:border-emerald-300 transition-all">
                            <option value="active">Kích hoạt ngay</option>
                            <option value="inactive">Tạm khóa</option>
                        </select>
                    </div>
                </div>
                
                <div>
                    <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Mật khẩu khởi tạo</label>
                    <div class="relative">
                        <input type="password" value="123456" class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all" readonly>
                        <button class="absolute right-3 top-2.5 text-xs font-bold text-[#6B0D18] hover:underline">Đổi ngẫu nhiên</button>
                    </div>
                    <p class="text-[11px] text-gray-500 mt-1.5">Mặc định hệ thống dùng `123456`. Khách hàng có thể đổi lại sau khi đăng nhập.</p>
                </div>
                
                <div>
                    <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Ghi chú nội bộ</label>
                    <textarea rows="4" placeholder="Nhập ghi chú hỗ trợ chăm sóc khách hàng (chỉ nhân viên xem được)..." class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all resize-none"></textarea>
                </div>
            </div>
            
        </div>

        <!-- Submit actions -->
        <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
            <a href="<?= APP_URL ?>/admin/khach-hang" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-xl font-bold text-sm hover:bg-gray-50 transition-colors">Hủy bỏ</a>
            <button class="px-8 py-2.5 bg-[#6B0D18] text-white rounded-xl font-bold text-sm hover:bg-[#8A111F] transition-colors shadow-md flex items-center gap-2" onclick="alert('Tính năng lưu khách hàng đang phát triển!'); window.location.href='<?= APP_URL ?>/admin/khach-hang';">
                <span class="iconify" data-icon="mdi:check"></span> Tạo hồ sơ
            </button>
        </div>
    </div>
</div>
