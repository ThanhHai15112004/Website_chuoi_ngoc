<!-- ========================================== -->
<!-- POPUPS MODAL -->
<!-- ========================================== -->

<!-- Popup Xem Chi Tiết Hạng -->
<div id="rankDetailModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2 text-lg">
                <span class="iconify text-yellow-500 text-2xl" data-icon="mdi:crown"></span> Thông tin hạng: <span class="uppercase text-yellow-600">GOLD</span>
            </h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="closeModal('rankDetailModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-4">
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <span class="text-sm text-gray-500">Trạng thái</span>
                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-bold rounded border border-emerald-100 uppercase">Hoạt động</span>
            </div>
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <span class="text-sm text-gray-500">Mô tả</span>
                <span class="text-sm font-bold text-gray-800">Hạng thân thiết dành cho khách mua thường xuyên</span>
            </div>
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <span class="text-sm text-gray-500">Điều kiện lên hạng</span>
                <span class="text-sm font-bold text-[#6B0D18]">Từ 3.000.000đ</span>
            </div>
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <span class="text-sm text-gray-500">Số lượng khách</span>
                <a href="<?= APP_URL ?>/admin/khach-hang?rank=gold" class="text-sm font-bold text-blue-600 hover:text-blue-800 hover:underline flex items-center gap-1">520 khách <span class="iconify" data-icon="mdi:open-in-new"></span></a>
            </div>
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <span class="text-sm text-gray-500">Voucher liên kết</span>
                <div class="flex gap-1">
                    <span class="px-2 py-0.5 border border-red-200 border-dashed text-[#6B0D18] text-[10px] font-bold rounded bg-red-50">GOLD5</span>
                </div>
            </div>
            <div>
                <span class="text-sm text-gray-500 block mb-2">Quyền lợi:</span>
                <ul class="space-y-1.5 text-sm font-medium text-gray-800 ml-2">
                    <li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> Giảm 5% mọi đơn hàng</li>
                    <li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> Freeship định kỳ</li>
                    <li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> Nhận ưu đãi sớm</li>
                </ul>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-50" onclick="closeModal('rankDetailModal')">Đóng</button>
            <button class="px-4 py-2 bg-yellow-50 text-yellow-700 border border-yellow-200 rounded-lg text-sm font-bold hover:bg-yellow-100 shadow-sm flex items-center gap-2" onclick="closeModal('rankDetailModal'); openEditRankModal('gold');">
                <span class="iconify" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
            </button>
        </div>
    </div>
</div>

<!-- Popup Cấu hình tự động lên hạng -->
<div id="configModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:cog-outline"></span> Cấu hình hệ thống hạng</h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="closeModal('configModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-5">
            <div class="flex items-start gap-3 p-3 bg-red-50 rounded-xl border border-red-100">
                <span class="iconify text-red-500 text-xl shrink-0 mt-0.5" data-icon="mdi:alert-circle-outline"></span>
                <p class="text-[11px] text-red-800">Thay đổi các cài đặt này sẽ ảnh hưởng trực tiếp đến logic xét duyệt hạng của toàn bộ khách hàng trên hệ thống. Vui lòng cân nhắc kỹ.</p>
            </div>
            
            <label class="flex items-center justify-between cursor-pointer">
                <div>
                    <p class="text-sm font-bold text-gray-800">Tự động xét hạng</p>
                    <p class="text-[11px] text-gray-500">Tự động nâng/hạ hạng khi khách đạt hoặc rớt điều kiện.</p>
                </div>
                <div class="relative">
                    <input type="checkbox" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                </div>
            </label>
            
            <label class="flex items-center justify-between cursor-pointer">
                <div>
                    <p class="text-sm font-bold text-gray-800">Gửi thông báo thăng hạng</p>
                    <p class="text-[11px] text-gray-500">Gửi mail và chuông thông báo khi khách được thăng hạng.</p>
                </div>
                <div class="relative">
                    <input type="checkbox" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                </div>
            </label>

            <div>
                <label class="block text-sm font-bold text-gray-800 mb-1">Thời điểm chốt doanh số xét hạng</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    <option>Cộng dồn trọn đời (Không bao giờ hạ hạng)</option>
                    <option>Xét theo chu kỳ 1 Năm (12 tháng)</option>
                    <option>Xét theo chu kỳ 6 Tháng</option>
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-bold text-gray-800 mb-1">Tính đơn hàng hợp lệ</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    <option>Chỉ tính đơn đã Giao thành công</option>
                    <option>Tính ngay khi Đã thanh toán</option>
                </select>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="closeModal('configModal')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="showToast('Đã lưu cấu hình!'); closeModal('configModal');">Lưu cấu hình</button>
        </div>
    </div>
</div>

<!-- Popup Chỉnh sửa Hạng (Massive UI) -->
<div id="editRankModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-5xl overflow-hidden animate-[fadeInPage_0.2s_ease-out] flex flex-col max-h-[90vh]">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50 shrink-0">
            <h3 class="font-bold text-gray-800 flex items-center gap-2 text-lg">
                <span class="iconify text-yellow-500 text-2xl" data-icon="mdi:crown"></span> Chỉnh sửa hạng: <span class="uppercase text-yellow-600">GOLD</span>
            </h3>
            <div class="flex items-center gap-3">
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-50" onclick="closeModal('editRankModal')">Đóng</button>
                <button id="btn-save-rank" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm" onclick="saveRank()">Lưu thay đổi</button>
            </div>
        </div>
        
        <!-- Body (Scrollable) -->
        <div class="flex-1 overflow-y-auto p-6 bg-gray-50/30">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Column: Form Settings -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Thông tin cơ bản -->
                    <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                        <h4 class="font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">1. Thông tin hiển thị</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-1">Tên định danh (Hệ thống)</label>
                                <input type="text" id="rank-id-input" value="Gold" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-800 focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-1">Tên hiển thị cho Khách hàng <span class="text-red-500">*</span></label>
                                <input type="text" id="rank-display-name-input" onkeyup="updateRankPreview()" value="Thành viên Gold" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-gray-700 mb-1">Mô tả hạng <span class="text-red-500">*</span></label>
                                <input type="text" id="rank-desc-input" value="Hạng thân thiết dành cho khách mua thường xuyên" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                            </div>
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-gray-700 mb-2">Màu sắc chủ đạo <span class="text-red-500">*</span></label>
                                <div class="flex items-center gap-3">
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="rank_color" value="gray" class="sr-only peer" onchange="updateRankPreview()">
                                        <div class="w-8 h-8 rounded-full bg-gray-500 ring-2 ring-transparent peer-checked:ring-gray-500 peer-checked:ring-offset-2 transition-all"></div>
                                    </label>
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="rank_color" value="yellow" class="sr-only peer" checked onchange="updateRankPreview()">
                                        <div class="w-8 h-8 rounded-full bg-yellow-500 ring-2 ring-transparent peer-checked:ring-yellow-500 peer-checked:ring-offset-2 transition-all"></div>
                                    </label>
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="rank_color" value="red" class="sr-only peer" onchange="updateRankPreview()">
                                        <div class="w-8 h-8 rounded-full bg-red-600 ring-2 ring-transparent peer-checked:ring-red-600 peer-checked:ring-offset-2 transition-all"></div>
                                    </label>
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="rank_color" value="blue" class="sr-only peer" onchange="updateRankPreview()">
                                        <div class="w-8 h-8 rounded-full bg-blue-500 ring-2 ring-transparent peer-checked:ring-blue-500 peer-checked:ring-offset-2 transition-all"></div>
                                    </label>
                                    <label class="cursor-pointer group">
                                        <input type="radio" name="rank_color" value="emerald" class="sr-only peer" onchange="updateRankPreview()">
                                        <div class="w-8 h-8 rounded-full bg-emerald-500 ring-2 ring-transparent peer-checked:ring-emerald-500 peer-checked:ring-offset-2 transition-all"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Điều kiện -->
                    <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                        <h4 class="font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">2. Điều kiện đạt hạng</h4>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-gray-700 mb-1">Tổng chi tiêu tối thiểu (VNĐ) <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <input type="text" id="rank-condition-input" onkeyup="updateRankPreview()" value="3.000.000" class="w-full pl-3 pr-10 py-2 border border-gray-300 rounded-lg text-sm font-bold text-[#6B0D18] focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                                    <span class="absolute right-3 top-2 text-gray-400 font-bold">đ</span>
                                </div>
                                <p class="text-[11px] text-gray-500 mt-1">Khách hàng cần đạt mức chi tiêu này để được cấp huy hiệu Gold.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Quyền lợi -->
                    <div class="bg-white p-5 rounded-xl border border-gray-200 shadow-sm">
                        <h4 class="font-bold text-gray-800 border-b border-gray-100 pb-2 mb-4">3. Quyền lợi & Ưu đãi</h4>
                        <div class="mb-4">
                            <label class="block text-xs font-bold text-gray-700 mb-1">Giảm giá mặc định cho mọi đơn hàng (%)</label>
                            <div class="relative w-32">
                                <input type="number" id="rank-discount-input" onkeyup="updateRankPreview()" onchange="updateRankPreview()" value="5" class="w-full pl-3 pr-8 py-2 border border-gray-300 rounded-lg text-sm font-bold text-[#6B0D18] focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                                <span class="absolute right-3 top-2 text-gray-400 font-bold">%</span>
                            </div>
                        </div>
                        
                        <label class="block text-xs font-bold text-gray-700 mb-2">Các đặc quyền khác (Chọn để hiển thị cho khách)</label>
                        <div class="grid grid-cols-2 gap-3" id="rank-privileges-container">
                            <label class="flex items-center gap-2 cursor-pointer p-2 border border-gray-200 hover:bg-gray-50 rounded-lg transition-colors">
                                <input type="checkbox" checked value="Freeship định kỳ" class="rank-privilege-checkbox text-[#6B0D18] focus:ring-[#6B0D18]" onchange="updateRankPreview()">
                                <span class="text-sm font-medium text-gray-800">Freeship định kỳ</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer p-2 border border-gray-200 hover:bg-gray-50 rounded-lg transition-colors">
                                <input type="checkbox" checked value="Nhận ưu đãi sớm" class="rank-privilege-checkbox text-[#6B0D18] focus:ring-[#6B0D18]" onchange="updateRankPreview()">
                                <span class="text-sm font-medium text-gray-800">Nhận ưu đãi sớm</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer p-2 border border-gray-200 hover:bg-gray-50 rounded-lg transition-colors">
                                <input type="checkbox" value="Quà tặng đặc biệt dịp lễ" class="rank-privilege-checkbox text-[#6B0D18] focus:ring-[#6B0D18]" onchange="updateRankPreview()">
                                <span class="text-sm font-medium text-gray-600">Quà tặng đặc biệt dịp lễ</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer p-2 border border-gray-200 hover:bg-gray-50 rounded-lg transition-colors">
                                <input type="checkbox" value="Tư vấn chọn vòng riêng" class="rank-privilege-checkbox text-[#6B0D18] focus:ring-[#6B0D18]" onchange="updateRankPreview()">
                                <span class="text-sm font-medium text-gray-600">Tư vấn chọn vòng riêng</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer p-2 border border-gray-200 hover:bg-gray-50 rounded-lg transition-colors">
                                <input type="checkbox" value="Voucher sinh nhật" class="rank-privilege-checkbox text-[#6B0D18] focus:ring-[#6B0D18]" onchange="updateRankPreview()">
                                <span class="text-sm font-medium text-gray-600">Voucher sinh nhật</span>
                            </label>
                        </div>
                    </div>

                </div>

                <!-- Right Column: Preview -->
                <div class="lg:col-span-1">
                    <div class="sticky top-0">
                        <h4 class="font-bold text-gray-800 mb-3 text-sm flex items-center gap-2"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Preview (Giao diện khách)</h4>
                        
                        <!-- Mockup Card Khách Hàng -->
                        <div id="preview-card-bg" class="bg-gradient-to-br from-[#FAF8F5] to-white rounded-2xl shadow-lg border border-yellow-200 p-6 relative overflow-hidden transition-all duration-300">
                            <div id="preview-bg-glow" class="absolute top-0 right-0 w-32 h-32 bg-yellow-100 rounded-full opacity-20 -mr-10 -mt-10 blur-xl transition-colors duration-300"></div>
                            
                            <div class="flex items-center justify-between mb-6 relative z-10">
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Hạng của bạn</p>
                                    <h3 id="preview-rank-name" class="text-2xl font-black text-yellow-600 uppercase tracking-wide flex items-center gap-2 transition-colors duration-300">
                                        <span id="preview-icon-1" class="iconify" data-icon="mdi:crown"></span> <span id="preview-name-text">GOLD</span>
                                    </h3>
                                </div>
                                <div id="preview-icon-box" class="w-12 h-12 rounded-full border border-yellow-300 bg-yellow-50 flex items-center justify-center text-yellow-600 shadow-sm transition-colors duration-300">
                                    <span id="preview-icon-2" class="iconify text-2xl" data-icon="mdi:crown"></span>
                                </div>
                            </div>
                            
                            <div class="space-y-4 relative z-10">
                                <div id="preview-discount-box" class="p-3 bg-white/80 backdrop-blur rounded-xl border border-yellow-100 shadow-sm transition-colors duration-300">
                                    <p class="text-xs text-gray-500 mb-1">Ưu đãi giảm giá trực tiếp</p>
                                    <p id="preview-discount-text" class="text-lg font-bold text-[#6B0D18]">Giảm 5% mọi đơn hàng</p>
                                </div>
                                
                                <div>
                                    <p class="text-xs font-bold text-gray-800 mb-2">Đặc quyền của bạn:</p>
                                    <ul id="preview-privileges-list" class="space-y-1.5 text-xs text-gray-600">
                                        <li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> Freeship định kỳ</li>
                                        <li class="flex items-center gap-2"><span class="iconify text-emerald-500" data-icon="mdi:check-circle"></span> Nhận ưu đãi sớm</li>
                                    </ul>
                                </div>
                                
                                <div id="preview-divider" class="pt-4 border-t border-yellow-200/50 transition-colors duration-300">
                                    <div class="flex justify-between text-[10px] font-bold text-gray-500 mb-1">
                                        <span>Đã chi tiêu: 3tr</span>
                                        <span id="preview-condition-text">Cần 10tr</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-1.5">
                                        <div id="preview-progress-bar" class="bg-gradient-to-r from-yellow-400 to-[#6B0D18] h-1.5 rounded-full transition-colors duration-300" style="width: 30%"></div>
                                    </div>
                                    <p class="text-[10px] text-center text-gray-500 mt-1.5">Chi tiêu thêm <strong class="text-[#6B0D18]">7.000.000đ</strong> để thăng hạng <strong>DIAMOND</strong></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4 p-3 bg-blue-50 border border-blue-100 rounded-xl flex gap-2 text-blue-800 text-xs">
                            <span class="iconify shrink-0 mt-0.5" data-icon="mdi:information-outline"></span>
                            <p>Đây là giao diện mô phỏng hạng thành viên hiển thị trên ứng dụng/web của khách hàng khi họ đăng nhập.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Popup Gán Voucher -->
<div id="assignVoucherModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2">
                <span class="iconify text-blue-500 text-xl" data-icon="mdi:ticket-percent-outline"></span> Gán Voucher cho hạng <span id="assign-rank-name" class="uppercase text-blue-600"></span>
            </h3>
            <button class="text-gray-400 hover:text-gray-600 transition-colors focus:outline-none" onclick="closeModal('assignVoucherModal')">
                <span class="iconify text-2xl" data-icon="mdi:close"></span>
            </button>
        </div>
        
        <div class="p-6">
            <p class="text-sm text-gray-500 mb-4">Chọn các voucher mặc định sẽ tự động được thêm vào ví của khách hàng đạt hạng này.</p>
            
            <div class="relative mb-4">
                <span class="iconify absolute left-3 top-2.5 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm kiếm voucher theo mã hoặc tên..." class="w-full pl-10 pr-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-300 focus:bg-white transition-colors">
            </div>
            
            <div class="space-y-2 max-h-[280px] overflow-y-auto pr-2 custom-scrollbar" id="voucher-list-container">
                <?php if(!empty($vouchers)): ?>
                    <?php foreach($vouchers as $vc): ?>
                    <label class="flex items-start gap-3 p-3 border border-gray-100 rounded-xl hover:bg-gray-50 cursor-pointer transition-colors has-[:checked]:bg-blue-50 has-[:checked]:border-blue-200 group">
                        <input type="checkbox" value="<?= $vc['ma_voucher'] ?>" class="rank-voucher-checkbox mt-1 text-blue-600 focus:ring-blue-500 rounded border-gray-300 cursor-pointer">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-gray-800 text-sm group-has-[:checked]:text-blue-900"><?= $vc['ma_voucher'] ?></span>
                                <?php if($vc['loai_giam'] == 1): ?>
                                <span class="px-1.5 py-0.5 bg-red-100 text-red-600 text-[10px] font-bold rounded">Giảm <?= $vc['gia_tri'] ?>%</span>
                                <?php else: ?>
                                <span class="px-1.5 py-0.5 bg-red-100 text-red-600 text-[10px] font-bold rounded">Giảm <?= number_format($vc['gia_tri'], 0, ',', '.') ?>đ</span>
                                <?php endif; ?>
                            </div>
                            <p class="text-xs text-gray-500 mt-1 line-clamp-1 group-has-[:checked]:text-blue-700/80">
                                Đơn tối thiểu: <?= number_format($vc['don_toi_thieu'], 0, ',', '.') ?>đ 
                                <?php if($vc['giam_toi_da'] > 0) echo '- Tối đa: ' . number_format($vc['giam_toi_da'], 0, ',', '.') . 'đ'; ?>
                            </p>
                        </div>
                    </label>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center text-sm text-gray-500 py-4">Chưa có voucher nào đang hoạt động</p>
                <?php endif; ?>
            </div>
            
            <input type="hidden" id="assign-rank-id-input">

            <div class="flex items-center gap-3 mt-6 pt-4 border-t border-gray-100">
                <button class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg text-sm font-bold hover:bg-gray-200 transition-colors" onclick="closeModal('assignVoucherModal')">Hủy</button>
                <button id="btn-save-vouchers" class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-lg text-sm font-bold hover:bg-blue-700 transition-colors shadow-sm flex justify-center items-center gap-2" onclick="saveAssignVoucher()">
                    <span class="iconify" data-icon="mdi:check"></span> Lưu thay đổi
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-4 right-4 z-[90] flex flex-col gap-2"></div>

