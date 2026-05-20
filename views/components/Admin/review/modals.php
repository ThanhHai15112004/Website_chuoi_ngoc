<!-- Drawer Xem chi tiết & Phản hồi -->
<div id="reviewDrawerOverlay" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[60] hidden opacity-0 transition-opacity duration-300" onclick="closeReviewDrawer()"></div>
<div id="reviewDrawer" class="fixed top-0 right-0 h-full w-full max-w-lg bg-[#FAF8F5] shadow-2xl z-[70] transform translate-x-full transition-transform duration-300 ease-out flex flex-col">
    <!-- Drawer Header -->
    <div class="bg-white px-6 py-4 border-b border-gray-100 flex items-center justify-between shrink-0">
        <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
            Chi tiết đánh giá
        </h3>
        <button class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-gray-800 transition-colors" onclick="closeReviewDrawer()">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>
    
    <!-- Drawer Content -->
    <div class="flex-1 overflow-y-auto p-6 scrollbar-hide space-y-5">
        <!-- Khách hàng -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 flex items-center gap-4">
            <div class="w-12 h-12 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center font-bold text-gray-500 uppercase text-lg">
                T
            </div>
            <div>
                <h4 class="font-bold text-gray-800 text-base">Trần Thị B</h4>
                <div class="flex items-center gap-2 mt-1">
                    <span class="px-1.5 py-0.5 bg-gray-100 text-gray-700 text-[10px] font-bold rounded">SILVER</span>
                    <span class="text-[10px] text-gray-400">• 090123xxxx</span>
                </div>
            </div>
        </div>

        <!-- Nội dung gốc -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex text-yellow-400 text-lg mb-2">
                <span class="iconify" data-icon="mdi:star"></span>
                <span class="iconify" data-icon="mdi:star"></span>
                <span class="iconify" data-icon="mdi:star-outline"></span>
                <span class="iconify" data-icon="mdi:star-outline"></span>
                <span class="iconify" data-icon="mdi:star-outline"></span>
            </div>
            <p class="text-sm text-gray-700 leading-relaxed">Màu đá hơi tối so với ảnh trên web. Mình tay nhỏ đeo dây này cảm giác hơi lỏng lẻo, shop có nhận đổi size dây không ạ?</p>
            <p class="text-xs text-gray-400 mt-2">1 ngày trước qua Web</p>
        </div>

        <!-- Trả lời -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <h4 class="text-sm font-bold text-gray-800 mb-3 flex items-center gap-2"><span class="iconify text-[#6B0D18]" data-icon="mdi:reply"></span> Phản hồi khách hàng</h4>
            
            <div class="mb-3">
                <select class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-gray-50 cursor-pointer">
                    <option value="">-- Chọn mẫu phản hồi nhanh --</option>
                    <option value="1">Cảm ơn đánh giá tích cực 5 sao</option>
                    <option value="2">Xin lỗi và hỗ trợ vấn đề (1-2 sao)</option>
                    <option value="3">Hướng dẫn đổi trả / bảo hành</option>
                </select>
            </div>

            <textarea rows="4" placeholder="Nhập phản hồi của cửa hàng..." class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none leading-relaxed">Chào bạn, Chuỗi Ngọc xin ghi nhận phản hồi của bạn. Các mẫu Obsidian tự nhiên sẽ có tông đen đặc trưng. Về phần dây rộng, nhân viên CSKH sẽ liên hệ qua SĐT để hỗ trợ bạn đổi size miễn phí nhé ạ!</textarea>
            
            <div class="mt-3 flex items-center justify-between">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="checkbox" checked class="w-4 h-4 text-[#6B0D18] rounded focus:ring-[#6B0D18] border-gray-300">
                    <span class="text-sm text-gray-600">Hiển thị công khai</span>
                </label>
                <button class="px-5 py-2 bg-[#6B0D18] text-white rounded-lg font-bold text-sm hover:bg-[#8A111F] transition-colors shadow-sm" onclick="showReviewToast('Đã gửi phản hồi thành công!')">Gửi phản hồi</button>
            </div>
        </div>

        <!-- Lịch sử xử lý -->
        <div>
            <h4 class="text-xs font-bold text-gray-500 uppercase mb-3">Lịch sử xử lý</h4>
            <div class="relative border-l-2 border-gray-200 ml-3 pl-4 space-y-4">
                <div class="relative">
                    <div class="absolute w-2.5 h-2.5 bg-[#6B0D18] rounded-full -left-[21px] top-1 ring-4 ring-[#FAF8F5]"></div>
                    <p class="text-xs font-bold text-gray-800">Hải Admin phản hồi</p>
                    <p class="text-[10px] text-gray-400 mt-0.5">1 ngày trước</p>
                </div>
                <div class="relative">
                    <div class="absolute w-2.5 h-2.5 bg-gray-300 rounded-full -left-[21px] top-1 ring-4 ring-[#FAF8F5]"></div>
                    <p class="text-xs font-bold text-gray-700">Hải Admin duyệt đánh giá</p>
                    <p class="text-[10px] text-gray-400 mt-0.5">1 ngày trước</p>
                </div>
                <div class="relative">
                    <div class="absolute w-2.5 h-2.5 bg-gray-300 rounded-full -left-[21px] top-1 ring-4 ring-[#FAF8F5]"></div>
                    <p class="text-xs font-bold text-gray-700">Khách gửi đánh giá</p>
                    <p class="text-[10px] text-gray-400 mt-0.5">1 ngày trước</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ẩn nội dung -->
<div id="hideModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-amber-500 text-xl" data-icon="mdi:eye-off-outline"></span> Ẩn nội dung này?</h3>
            <button class="text-gray-400 hover:text-gray-700 transition-colors" onclick="document.getElementById('hideModal').classList.add('hidden')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-4">
            <p class="text-sm text-gray-600">Nội dung sẽ không còn hiển thị ngoài trang người dùng nhưng vẫn được lưu trong hệ thống.</p>
            
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">Lý do ẩn <span class="text-red-500">*</span></label>
                <div class="space-y-2">
                    <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-700">
                        <input type="radio" name="hide_reason" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]"> Ngôn từ thiếu lịch sự / Xúc phạm
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-700">
                        <input type="radio" name="hide_reason" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]"> Spam / Quảng cáo
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-700">
                        <input type="radio" name="hide_reason" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]"> Nhầm sản phẩm / Không liên quan
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer text-sm text-gray-700">
                        <input type="radio" name="hide_reason" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]"> Khách yêu cầu ẩn
                    </label>
                </div>
            </div>
            
            <textarea rows="2" placeholder="Ghi chú thêm (không bắt buộc)..." class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"></textarea>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('hideModal').classList.add('hidden')">Hủy</button>
            <button class="px-4 py-2 bg-amber-500 text-white rounded-lg text-sm font-medium hover:bg-amber-600 shadow-sm" onclick="document.getElementById('hideModal').classList.add('hidden'); showReviewToast('Đã ẩn nội dung');">Xác nhận ẩn</button>
        </div>
    </div>
</div>

<!-- Modal Cài đặt duyệt tự động -->
<div id="autoApproveModal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[80] hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden animate-[fadeInPage_0.2s_ease-out]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="font-bold text-gray-800 flex items-center gap-2"><span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:cog-outline"></span> Cài đặt duyệt tự động</h3>
            <button class="text-gray-400 hover:text-gray-700 transition-colors" onclick="document.getElementById('autoApproveModal').classList.add('hidden')"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        <div class="p-6 space-y-5">
            
            <div class="flex items-center justify-between bg-emerald-50 border border-emerald-100 p-3 rounded-lg">
                <div>
                    <h5 class="text-sm font-bold text-emerald-800">Tự động duyệt 4-5 sao</h5>
                    <p class="text-[11px] text-emerald-600 mt-0.5">Bỏ qua bước duyệt thủ công với đánh giá tích cực.</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                </label>
            </div>

            <div class="flex items-center justify-between border border-gray-200 p-3 rounded-lg">
                <div>
                    <h5 class="text-sm font-bold text-gray-800">Treo duyệt nếu có hình ảnh</h5>
                    <p class="text-[11px] text-gray-500 mt-0.5">Yêu cầu Admin kiểm duyệt thủ công ảnh tải lên.</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" value="" class="sr-only peer" checked>
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                </label>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-800 mb-2">Từ khóa chặn / Đưa vào danh sách đen</label>
                <div class="p-3 border border-gray-200 rounded-lg flex flex-wrap gap-2">
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded border border-gray-200 flex items-center gap-1">đồ giả <span class="iconify cursor-pointer hover:text-red-500" data-icon="mdi:close"></span></span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded border border-gray-200 flex items-center gap-1">lừa đảo <span class="iconify cursor-pointer hover:text-red-500" data-icon="mdi:close"></span></span>
                    <span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs rounded border border-gray-200 flex items-center gap-1">kém chất lượng <span class="iconify cursor-pointer hover:text-red-500" data-icon="mdi:close"></span></span>
                    <input type="text" placeholder="+ Thêm từ khóa..." class="outline-none text-xs w-24 bg-transparent ml-1">
                </div>
                <p class="text-[10px] text-gray-400 mt-1">Bình luận chứa các từ khóa này sẽ bị tự động Ẩn (Không duyệt).</p>
            </div>

        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex justify-end gap-3 bg-gray-50/50">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50" onclick="document.getElementById('autoApproveModal').classList.add('hidden')">Đóng</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-[#8A111F] shadow-sm" onclick="document.getElementById('autoApproveModal').classList.add('hidden'); showReviewToast('Đã lưu cài đặt!');">Lưu cài đặt</button>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="reviewToast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[90]">
    <div class="text-emerald-500 mt-0.5"><span class="iconify text-xl" data-icon="mdi:check-circle"></span></div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="toastMsg">Thao tác thành công.</p>
    </div>
</div>

