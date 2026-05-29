<!-- ============================================== -->
<!-- POPUPS & DRAWERS -->
<!-- ============================================== -->

                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal Nâng/Hạ Hạng -->
<div id="rankModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:chevron-double-up"></span> Cập Nhật Hạng Thành Viên</h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="document.getElementById('rankModal').classList.add('hidden')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-4">
            <div class="bg-blue-50 border border-blue-100 p-3 rounded-lg text-sm text-blue-700 mb-2">
                Bạn đang thực hiện thao tác cập nhật hạng cho khách hàng này.
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Chọn hạng mới <span class="text-red-500">*</span></label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    <?php foreach ($hang_thanh_viens ?? [] as $htv): ?>
                        <option value="<?= $htv['id'] ?>"><?= $htv['ten_hang'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Lý do cập nhật (Bắt buộc) <span class="text-red-500">*</span></label>
                <textarea rows="2" placeholder="Vd: Thưởng đặc biệt, Điều chỉnh lỗi..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"></textarea>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('rankModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="submitSingleRank()">Lưu thay đổi</button>
        </div>
    </div>
</div>

<!-- Modal Khóa Tài Khoản -->
<div id="lockModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="p-6">
            <div class="w-12 h-12 rounded-full bg-amber-50 text-amber-500 flex items-center justify-center mb-4 mx-auto">
                <span class="iconify text-2xl" data-icon="mdi:lock"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 text-center mb-2">Khóa tài khoản khách hàng?</h3>
            <p class="text-sm text-gray-500 text-center mb-5">Khách hàng sẽ không thể đăng nhập hoặc đặt hàng bằng tài khoản này cho đến khi được mở khóa.</p>
            
            <div class="bg-gray-50 rounded-lg p-3 mb-4 flex items-center gap-3 border border-gray-100">
                <div>
                    <p class="text-sm font-bold text-gray-800">Xác nhận thao tác trên tài khoản khách hàng</p>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Lý do khóa <span class="text-red-500">*</span></label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18]">
                    <option value="">-- Chọn lý do --</option>
                    <option value="1">Spam / Đặt hàng ảo nhiều lần</option>
                    <option value="2">Vi phạm chính sách đánh giá</option>
                    <option value="3">Nghi ngờ bị chiếm quyền</option>
                    <option value="4">Khách hàng yêu cầu</option>
                </select>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('lockModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-amber-600 text-white rounded-lg text-sm font-bold hover:bg-amber-700 shadow-sm" onclick="submitSingleLock()">Xác nhận khóa</button>
        </div>
    </div>
</div>

<!-- Modal Xóa Tài Khoản -->
<div id="deleteModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="p-6">
            <div class="w-12 h-12 rounded-full bg-red-50 text-red-500 flex items-center justify-center mb-4 mx-auto">
                <span class="iconify text-2xl" data-icon="mdi:alert-circle-outline"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 text-center mb-2">Cảnh báo: Xóa vĩnh viễn?</h3>
            <p class="text-sm text-gray-500 text-center mb-5">Dữ liệu tài khoản của khách hàng này sẽ bị xóa sạch khỏi hệ thống. Nếu chỉ để cấm truy cập, hãy dùng chức năng <strong>Khóa tài khoản</strong>.</p>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('deleteModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm font-bold hover:bg-red-700 shadow-sm" onclick="submitSingleDelete()">Vẫn xóa</button>
        </div>
    </div>
</div>

<!-- Modal Gửi Thông Báo -->
<div id="notifyModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:bell-ring-outline"></span> Gửi thông báo riêng</h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="document.getElementById('notifyModal').classList.add('hidden')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Người nhận</label>
                <div class="px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-600 font-medium">Khách hàng được chọn</div>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Loại thông báo</label>
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    <option>Tin nhắn từ cửa hàng</option>
                    <option>Hỗ trợ đơn hàng</option>
                    <option>Tặng Voucher</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Tiêu đề</label>
                <input type="text" placeholder="Vd: Chuỗi Ngọc tặng bạn voucher sinh nhật" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
            </div>
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Nội dung</label>
                <textarea rows="3" placeholder="Nhập nội dung thông báo..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"></textarea>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('notifyModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="submitSingleNotify()"><span class="iconify" data-icon="mdi:send"></span> Gửi ngay</button>
        </div>
    </div>
</div>

<!-- Modal Gán Voucher -->
<div id="voucherModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:ticket-percent-outline"></span> Gán Voucher Nhanh</h3>
            <button class="text-gray-400 hover:text-gray-700" onclick="document.getElementById('voucherModal').classList.add('hidden')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6">
            <p class="text-sm text-gray-500 mb-4">Chọn voucher đang có hiệu lực để tặng riêng cho khách hàng này.</p>
            
            <div class="space-y-3 max-h-60 overflow-y-auto pr-2">
                <!-- Voucher Item -->
                <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:border-[#6B0D18] hover:bg-red-50/30 transition-colors">
                    <div class="mt-1">
                        <input type="radio" name="select_voucher" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="px-2 py-0.5 bg-[#6B0D18] text-white text-[10px] font-bold rounded">GIẢM 50K</span>
                            <span class="text-sm font-bold text-gray-800">VIP50K</span>
                        </div>
                        <p class="text-[11px] text-gray-500">Đơn tối thiểu 500k. Hạn: 30/12/2026</p>
                    </div>
                </label>
                <!-- Voucher Item -->
                <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:border-[#6B0D18] hover:bg-red-50/30 transition-colors">
                    <div class="mt-1">
                        <input type="radio" name="select_voucher" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="px-2 py-0.5 bg-[#6B0D18] text-white text-[10px] font-bold rounded">FREESHIP</span>
                            <span class="text-sm font-bold text-gray-800">FREESHIP</span>
                        </div>
                        <p class="text-[11px] text-gray-500">Không giới hạn đơn tối thiểu. Hạn: 01/06/2026</p>
                    </div>
                </label>
            </div>
            
            <div class="mt-4 pt-4 border-t border-gray-100">
                <input type="text" placeholder="Hoặc ghi chú nội bộ (không bắt buộc)..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('voucherModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-bold hover:bg-[#8A111F] shadow-sm flex items-center gap-2" onclick="submitSingleAssignVoucher()"><span class="iconify" data-icon="mdi:check"></span> Hoàn tất gán</button>
        </div>
    </div>
</div>
