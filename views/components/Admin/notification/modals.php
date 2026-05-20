<!-- ================== OVERLAYS & MODALS ================== -->
<div id="modalOverlay" class="fixed inset-0 bg-black/50 z-40 hidden opacity-0 transition-opacity duration-300" onclick="closeAllDrawers()"></div>

<!-- Drawer Xem Chi Tiết -->
<div id="notificationDrawer" class="fixed top-0 right-0 h-full w-[600px] max-w-full bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col">
    <!-- Drawer Header -->
    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
        <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:email-open-outline"></span> Chi tiết thông báo
        </h3>
        <button onclick="closeNotificationDrawer()" class="text-gray-400 hover:text-gray-600 transition-colors"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
    </div>
    
    <!-- Drawer Content -->
    <div class="flex-1 overflow-y-auto p-6 space-y-6">
        <!-- Badge & Title -->
        <div>
            <span class="inline-flex px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-700 border border-yellow-200 mb-3 flex w-max items-center gap-1">
                <span class="iconify" data-icon="mdi:ticket-percent-outline"></span> Voucher
            </span>
            <h2 class="text-2xl font-bold text-gray-800 leading-tight">Voucher GOLD5 dành riêng cho bạn tháng này</h2>
            
            <div class="flex flex-wrap items-center gap-4 mt-3 text-sm text-gray-500">
                <div class="flex items-center gap-1">
                    <span class="iconify text-gray-400" data-icon="mdi:account-outline"></span>
                    Hải Admin
                </div>
                <div class="flex items-center gap-1">
                    <span class="iconify text-gray-400" data-icon="mdi:clock-outline"></span>
                    18/05/2026 09:00
                </div>
                <div class="flex items-center gap-1">
                    <span class="inline-flex px-1.5 py-0.5 rounded text-[10px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">Đã gửi</span>
                </div>
            </div>
        </div>

        <hr class="border-gray-100">

        <!-- Info List -->
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-50 rounded-lg p-3 border border-gray-100">
                <div class="text-xs text-gray-500 mb-1">Người nhận</div>
                <div class="font-medium text-gray-800">Nhóm Gold (520 khách)</div>
            </div>
            <div class="bg-gray-50 rounded-lg p-3 border border-gray-100">
                <div class="text-xs text-gray-500 mb-1">Thời gian gửi</div>
                <div class="font-medium text-gray-800">18/05/2026, 09:00</div>
            </div>
        </div>

        <!-- Message Content -->
        <div>
            <div class="text-sm font-medium text-gray-700 mb-2">Nội dung thông báo</div>
            <div class="bg-white border border-gray-200 rounded-xl p-5 text-gray-700 leading-relaxed text-sm shadow-sm relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-[#6B0D18] rounded-t-xl"></div>
                <p class="whitespace-pre-line">Xin chào [Tên_khách_hàng],
                
                Tháng mới, ưu đãi mới!
                Shop xin tặng riêng cho bạn (Hạng Gold) mã giảm giá 5% cho mọi đơn hàng vòng ngọc.
                
                Mã voucher: <strong>GOLD5-XYZ</strong>
                Hạn sử dụng: 31/05/2026
                
                Chúc bạn luôn gặp nhiều may mắn và bình an.</p>
                
                <div class="mt-4 pt-3 border-t border-dashed border-gray-200 text-center">
                    <a href="#" class="inline-block px-6 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-[#8A111F] transition-colors">Xem mã voucher</a>
                </div>
            </div>
        </div>

        <!-- Read Statistics -->
        <div>
            <div class="text-sm font-medium text-gray-700 mb-2">Thống kê đọc</div>
            <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm flex items-center justify-between">
                <div>
                    <div class="text-3xl font-bold text-[#6B0D18]">61%</div>
                    <div class="text-xs text-gray-500 mt-1">Tỷ lệ mở xem</div>
                </div>
                <div class="text-right space-y-2 text-sm">
                    <div class="flex justify-between gap-4">
                        <span class="text-gray-500">Tổng người nhận:</span>
                        <span class="font-medium text-gray-800">520</span>
                    </div>
                    <div class="flex justify-between gap-4">
                        <span class="text-gray-500">Đã đọc:</span>
                        <span class="font-medium text-emerald-600">320</span>
                    </div>
                    <div class="flex justify-between gap-4">
                        <span class="text-gray-500">Chưa đọc:</span>
                        <span class="font-medium text-amber-600">200</span>
                    </div>
                </div>
            </div>
            <div class="mt-2 text-right">
                <button class="text-[#6B0D18] text-xs font-medium hover:underline flex items-center justify-end gap-1 w-full"><span class="iconify" data-icon="mdi:format-list-bulleted"></span> Xem danh sách người nhận</button>
            </div>
        </div>
    </div>
    
    <!-- Drawer Footer -->
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between gap-3">
        <button class="px-4 py-2 bg-white border border-red-200 text-red-600 rounded-lg hover:bg-red-50 transition-colors font-medium text-sm flex items-center gap-1">
            <span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa
        </button>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-1">
                <span class="iconify" data-icon="mdi:content-copy"></span> Sao chép
            </button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md flex items-center gap-1">
                <span class="iconify" data-icon="mdi:refresh"></span> Gửi lại
            </button>
        </div>
    </div>
</div>

<!-- Modal Gửi Lại Lỗi -->
<div id="resendModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[450px] max-w-[90%] transform scale-95 transition-transform duration-300 p-6 flex flex-col">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                <span class="iconify text-2xl" data-icon="mdi:alert-circle-outline"></span>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-800">Gửi lại thông báo?</h3>
                <p class="text-gray-500 text-sm">Có 15 khách hàng chưa nhận được thông báo này do lỗi hệ thống.</p>
            </div>
        </div>
        
        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 mb-6 text-sm">
            <div class="space-y-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="resendOpt" class="text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                    <span class="text-gray-700">Chỉ gửi lại cho <strong>15 người</strong> bị lỗi</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="resendOpt" class="text-[#6B0D18] focus:ring-[#6B0D18]">
                    <span class="text-gray-700">Gửi lại cho toàn bộ <strong>2.500 người</strong></span>
                </label>
            </div>
        </div>
        
        <div class="flex gap-3 justify-end">
            <button onclick="closeResendModal()" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy</button>
            <button onclick="closeResendModal(); showToast('Đang tiến hành gửi lại thông báo...')" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md">Gửi lại ngay</button>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70] pointer-events-none">
    <div class="text-emerald-500 mt-0.5">
        <span class="iconify text-xl" data-icon="mdi:check-circle"></span>
    </div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="toast-msg">Thao tác thành công.</p>
    </div>
</div>
