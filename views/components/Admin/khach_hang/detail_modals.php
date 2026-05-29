<!-- ========================================== -->
<!-- POPUPS -->
<!-- ========================================== -->

<!-- Popup Gửi Thông Báo -->
<div id="notifyModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-2xl overflow-hidden animate-[fadeInPage_0.2s_ease-out] flex flex-col md:flex-row">
        <!-- Form -->
        <div class="w-full md:w-3/5 p-6 border-b md:border-b-0 md:border-r border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:bell-outline"></span> Gửi Thông Báo Riêng</h3>
                <button class="md:hidden text-gray-400 hover:text-gray-700" onclick="closeModal('notifyModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
            </div>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Loại thông báo</label>
                    <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        <option>Tin nhắn từ cửa hàng</option>
                        <option>Tặng Voucher ưu đãi</option>
                        <option>Tư vấn phong thủy</option>
                        <option>Hỗ trợ đơn hàng</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Tiêu đề</label>
                    <input type="text" id="notifyTitle" placeholder="Nhập tiêu đề..." value="Quà tặng đặc biệt dành cho bạn!" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 mb-1">Nội dung</label>
                    <textarea id="notifyContent" rows="4" placeholder="Nhập nội dung..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none">Chuỗi Ngọc xin tặng bạn mã giảm giá 10% cho lần mua sắm tiếp theo. Cảm ơn bạn đã luôn ủng hộ!</textarea>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end gap-3">
                <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="closeModal('notifyModal')">Hủy</button>
                <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="submitNotify('<?= $khach_hang['id'] ?? '' ?>')">Gửi thông báo</button>
            </div>
        </div>
        
        <!-- Preview -->
        <div class="w-full md:w-2/5 bg-gray-50 p-6 flex flex-col items-center justify-center relative">
            <button class="hidden md:block absolute top-4 right-4 text-gray-400 hover:text-gray-700" onclick="closeModal('notifyModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
            
            <p class="text-xs font-bold text-gray-400 uppercase mb-4 text-center">Xem trước tin nhắn</p>
            <!-- Mock Phone Notification -->
            <div class="bg-white p-3 rounded-xl shadow-md border border-gray-100 w-full max-w-[250px] relative">
                <div class="flex items-center gap-2 mb-2">
                    <div class="w-6 h-6 rounded bg-red-50 text-[#6B0D18] flex items-center justify-center">
                        <span class="iconify text-sm" data-icon="mdi:diamond-stone"></span>
                    </div>
                    <div>
                        <p class="text-[10px] font-bold text-gray-800 leading-tight">Chuỗi Ngọc</p>
                        <p class="text-[8px] text-gray-400">Vừa xong</p>
                    </div>
                </div>
                <p class="text-xs font-bold text-gray-800 mb-0.5">Quà tặng đặc biệt dành cho bạn!</p>
                <p class="text-[10px] text-gray-600 leading-relaxed line-clamp-3">Chuỗi Ngọc xin tặng bạn mã giảm giá 10% cho lần mua sắm tiếp theo. Cảm ơn bạn đã luôn ủng hộ!</p>
            </div>
        </div>
    </div>
</div>

<!-- Popup Gán Voucher -->
<div id="voucherModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-lg overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:ticket-percent-outline"></span> Gán Voucher Cho Khách</h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="closeModal('voucherModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6">
            <div class="relative mb-4">
                <span class="iconify absolute left-3 top-2.5 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm mã voucher..." class="w-full pl-9 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
            </div>
            
            <div class="space-y-3 max-h-60 overflow-y-auto pr-1">
                <!-- Voucher Item Active -->
                <label class="flex items-start gap-3 p-3 border-2 border-[#6B0D18] bg-red-50/30 rounded-xl cursor-pointer">
                    <input type="radio" name="selectVoucher" class="mt-1 text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-[#6B0D18] text-base">FREESHIP</span>
                            <span class="text-[10px] bg-red-100 text-red-800 px-2 py-0.5 rounded font-bold">SL: 100</span>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">Miễn phí vận chuyển cho đơn từ 0đ</p>
                        <p class="text-[10px] text-gray-400 mt-1">HSD: 30/06/2026</p>
                    </div>
                </label>
                <!-- Voucher Item Normal -->
                <label class="flex items-start gap-3 p-3 border border-gray-200 hover:border-[#6B0D18] rounded-xl cursor-pointer transition-colors">
                    <input type="radio" name="selectVoucher" class="mt-1 text-[#6B0D18] focus:ring-[#6B0D18]">
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <span class="font-bold text-gray-800 text-base">VIP10</span>
                            <span class="text-[10px] bg-gray-100 text-gray-600 px-2 py-0.5 rounded font-bold">SL: 10</span>
                        </div>
                        <p class="text-xs text-gray-600 mt-1">Giảm 10% (Tối đa 500k)</p>
                        <p class="text-[10px] text-gray-400 mt-1">HSD: 30/12/2026</p>
                    </div>
                </label>
            </div>
            
            <div class="mt-4 pt-4 border-t border-gray-100">
                <label class="block text-xs font-bold text-gray-700 mb-1">Ghi chú (Tùy chọn)</label>
                <input type="text" placeholder="Lý do tặng: Đền bù lỗi vận chuyển..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="closeModal('voucherModal')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="submitAssignVoucher('<?= $khach_hang['id'] ?? '' ?>')"><span class="iconify" data-icon="mdi:check"></span> Gán Voucher</button>
        </div>
    </div>
</div>

<!-- Popup Cập Nhật Hạng -->
<div id="rankModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:chevron-double-up"></span> Cập Nhật Hạng Thành Viên</h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="closeModal('rankModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-5">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl border border-gray-100">
                <span class="text-sm font-medium text-gray-600">Hạng hiện tại:</span>
                <span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded border border-yellow-200 uppercase"><?= htmlspecialchars($khach_hang['hang'] ?? 'Chưa có') ?></span>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Chọn hạng mới <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-3 gap-2" id="rankSelectionGrid">
                    <?php if(!empty($hang_thanh_viens)): foreach($hang_thanh_viens as $hang): ?>
                    <label class="border border-gray-200 rounded-lg p-2 text-center cursor-pointer hover:bg-gray-50 flex flex-col items-center gap-1 radio-rank-label">
                        <input type="radio" name="newRank" value="<?= $hang['id'] ?>" class="hidden" onchange="highlightRankRadio(this)">
                        <span class="w-6 h-6 rounded-full bg-gray-100 flex items-center justify-center text-gray-500"><span class="iconify text-sm" data-icon="mdi:medal-outline"></span></span>
                        <span class="text-xs font-bold text-gray-600"><?= htmlspecialchars($hang['ten_hang']) ?></span>
                    </label>
                    <?php endforeach; endif; ?>
                </div>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Lý do cập nhật (Bắt buộc) <span class="text-red-500">*</span></label>
                <textarea rows="2" placeholder="Vd: Thưởng đặc biệt, Hỗ trợ sự cố..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"></textarea>
            </div>
            <div class="p-3 bg-blue-50 border border-blue-100 rounded-lg flex gap-2 text-blue-800 text-xs">
                <span class="iconify shrink-0 mt-0.5" data-icon="mdi:information-outline"></span>
                <p>Khách hàng sẽ nhận được thông báo về việc thay đổi hạng thành viên trên hệ thống.</p>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="closeModal('rankModal')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="submitUpdateRank('<?= $khach_hang['id'] ?? '' ?>')">Lưu thay đổi</button>
        </div>
    </div>
</div>

<!-- Popup Khóa Tài Khoản -->
<div id="lockModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="p-6 relative">
            <button class="absolute top-4 right-4 text-gray-400 hover:text-gray-700" onclick="closeModal('lockModal')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
            <div class="w-16 h-16 rounded-full bg-red-50 text-red-500 flex items-center justify-center mb-4 mx-auto border-4 border-white shadow-sm">
                <span class="iconify text-3xl" data-icon="mdi:lock"></span>
            </div>
            <h3 class="text-xl font-bold text-gray-800 text-center mb-2">Khóa tài khoản khách hàng?</h3>
            <p class="text-sm text-gray-500 text-center mb-6 px-4">Khách hàng sẽ bị đăng xuất khỏi tất cả thiết bị và không thể đăng nhập cho đến khi bạn mở khóa.</p>
            
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Lý do khóa <span class="text-red-500">*</span></label>
                    <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-red-500">
                        <option value="">-- Chọn lý do --</option>
                        <option value="1">Spam / Đặt hàng ảo liên tục</option>
                        <option value="2">Nghi ngờ bị chiếm quyền (Bảo mật)</option>
                        <option value="3">Vi phạm chính sách cộng đồng</option>
                        <option value="4">Lý do khác</option>
                    </select>
                </div>
                
                <label class="flex items-center gap-2 cursor-pointer bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <input type="checkbox" class="w-4 h-4 text-red-600 rounded border-gray-300 focus:ring-red-500" checked>
                    <span class="text-sm text-gray-700 font-medium">Gửi email thông báo khóa cho khách</span>
                </label>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="closeModal('lockModal')">Hủy bỏ</button>
            <button class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-bold hover:bg-red-700 shadow-sm" onclick="submitLock('<?= $khach_hang['id'] ?? '' ?>')">Xác nhận Khóa</button>
        </div>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-4 right-4 z-[90] flex flex-col gap-2"></div>

<!-- Scripts -->
