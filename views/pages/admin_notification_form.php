<?php
// views/pages/admin_notification_form.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <a href="<?= APP_URL ?>/admin/notification" class="text-gray-500 hover:text-[#6B0D18] transition-colors"><span class="iconify text-xl" data-icon="mdi:arrow-left"></span></a>
                <h2 class="text-2xl font-bold text-gray-800 font-luxury">Tạo thông báo mới</h2>
            </div>
            <p class="text-sm text-gray-500 ml-8">Soạn và gửi thông báo, voucher, hoặc tin nhắn đến khách hàng.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:format-list-bulleted-type"></span>
                Mẫu thông báo
            </button>
        </div>
    </div>

    <!-- Main Form Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Cột Form (Bên trái) -->
        <div class="lg:col-span-8 space-y-6">
            
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
        </div>

        <!-- Cột Preview (Bên phải) -->
        <div class="lg:col-span-4">
            <div class="sticky top-6">
                <h3 class="text-base font-bold text-gray-800 mb-4 px-2">Preview hiển thị (Bản User)</h3>
                
                <div class="bg-gray-100 p-4 rounded-[24px] shadow-inner border border-gray-200 flex justify-center">
                    <!-- Mobile frame mockup -->
                    <div class="w-[320px] bg-gray-50 rounded-2xl shadow-xl overflow-hidden border-4 border-gray-800 relative">
                        <!-- Screen Header -->
                        <div class="bg-white px-4 py-3 border-b border-gray-100 flex items-center justify-between sticky top-0 z-10">
                            <span class="font-bold text-gray-800 text-sm">Hộp thư</span>
                            <span class="iconify text-gray-400" data-icon="mdi:dots-horizontal"></span>
                        </div>
                        
                        <!-- Screen Body -->
                        <div class="p-3 h-[400px] overflow-y-auto bg-gray-50/50">
                            
                            <!-- The Notification Card -->
                            <div class="bg-white rounded-xl p-3 shadow-sm border border-transparent transition-all relative overflow-hidden" id="preview-card">
                                <div class="absolute top-0 left-0 w-1 h-full bg-[#6B0D18] hidden" id="preview-priority-bar"></div>
                                <div class="flex gap-3 relative z-10">
                                    <div class="w-10 h-10 rounded-full bg-red-50 text-[#6B0D18] flex items-center justify-center shrink-0 mt-0.5" id="preview-icon-wrapper">
                                        <span class="iconify text-xl" data-icon="mdi:message-text-outline" id="preview-icon"></span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex justify-between items-start gap-2 mb-1">
                                            <h4 class="font-bold text-gray-900 text-[13px] leading-tight" id="preview-title">Tiêu đề thông báo</h4>
                                            <span class="text-[10px] text-gray-400 whitespace-nowrap mt-0.5">Vừa xong</span>
                                        </div>
                                        <p class="text-xs text-gray-600 line-clamp-2 leading-relaxed" id="preview-content">
                                            Nội dung thông báo sẽ hiển thị ở đây. Bạn có thể sử dụng các biến cá nhân hóa để làm thông báo thân thiện hơn.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Dummy past notification -->
                            <div class="bg-white rounded-xl p-3 shadow-sm border border-transparent mt-3 opacity-60">
                                <div class="flex gap-3">
                                    <div class="w-10 h-10 rounded-full bg-gray-100 text-gray-500 flex items-center justify-center shrink-0 mt-0.5">
                                        <span class="iconify text-xl" data-icon="mdi:shopping-outline"></span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <div class="flex justify-between items-start mb-1">
                                            <h4 class="font-medium text-gray-700 text-[13px]">Giao hàng thành công</h4>
                                            <span class="text-[10px] text-gray-400">2 ngày trước</span>
                                        </div>
                                        <p class="text-xs text-gray-500 line-clamp-1">Đơn hàng #DH12345 đã được giao.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
                <div class="mt-4 p-4 bg-blue-50 rounded-xl border border-blue-100">
                    <p class="text-xs text-blue-700 flex gap-2">
                        <span class="iconify text-lg shrink-0" data-icon="mdi:information-outline"></span>
                        Thông báo thực tế có thể thay đổi cách hiển thị tùy thuộc vào thiết bị của người dùng. Các biến {Tên_khách} sẽ tự động thay bằng dữ liệu thực.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Xác nhận gửi -->
<div id="confirmModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[450px] max-w-[90%] transform scale-95 transition-transform duration-300 p-6 flex flex-col">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0">
                <span class="iconify text-2xl" data-icon="mdi:send-check-outline"></span>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-800">Xác nhận gửi thông báo?</h3>
            </div>
        </div>
        
        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 mb-6 text-sm text-gray-600 space-y-2">
            <p>Thông báo này dự kiến sẽ gửi đến <strong class="text-gray-900">Tất cả khách hàng (~2.540 người)</strong>.</p>
            <p>Vui lòng kiểm tra kỹ nội dung, đặc biệt là các mã voucher giảm giá (nếu có) trước khi xác nhận.</p>
            
            <label class="flex items-start gap-2 mt-4 cursor-pointer">
                <input type="checkbox" id="check-confirm" class="text-[#6B0D18] rounded focus:ring-[#6B0D18] mt-0.5" onchange="document.getElementById('btn-final-send').disabled = !this.checked">
                <span class="text-gray-800 font-medium text-sm">Tôi đã kiểm tra kỹ nội dung và người nhận.</span>
            </label>
        </div>
        
        <div class="flex gap-3 justify-end">
            <button onclick="closeConfirmModal()" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Kiểm tra lại</button>
            <button onclick="closeConfirmModal(); alert('Đã gửi thông báo thành công!')" id="btn-final-send" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md disabled:opacity-50 disabled:cursor-not-allowed" disabled>Xác nhận gửi</button>
        </div>
    </div>
</div>

<script>
    // Styling states based on Target selection
    function handleTargetChange(radio) {
        // Reset styles for all labels
        document.querySelectorAll('.target-label').forEach(label => {
            label.classList.remove('border-[#6B0D18]', 'bg-red-50/20');
            label.classList.add('border-gray-200');
        });
        
        // Add active style to selected
        const parent = radio.closest('.target-label');
        parent.classList.remove('border-gray-200');
        parent.classList.add('border-[#6B0D18]', 'bg-red-50/20');

        // Show/Hide panels
        const val = radio.value;
        document.getElementById('target-group-panel').classList.toggle('hidden', val !== 'group');
        document.getElementById('target-specific-panel').classList.toggle('hidden', val !== 'specific');
    }

    // Initialize radio styles on load
    document.addEventListener('DOMContentLoaded', () => {
        const checkedTarget = document.querySelector('input[name="target"]:checked');
        if(checkedTarget) handleTargetChange(checkedTarget);
    });

    // Schedule panel logic
    function handleScheduleChange(radio) {
        document.getElementById('schedule-panel').classList.toggle('hidden', radio.value === 'now');
        const submitBtn = document.getElementById('btn-submit');
        if(radio.value === 'now') {
            submitBtn.innerHTML = '<span class="iconify" data-icon="mdi:send-outline"></span> Gửi thông báo';
        } else {
            submitBtn.innerHTML = '<span class="iconify" data-icon="mdi:calendar-clock-outline"></span> Lên lịch gửi';
        }
    }

    // Textarea var insertion
    function insertVar(val) {
        const textarea = document.getElementById('noti-content');
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const text = textarea.value;
        textarea.value = text.substring(0, start) + val + text.substring(end);
        textarea.focus();
        textarea.selectionEnd = start + val.length;
        updatePreview();
        countChars(textarea);
    }

    // Char counter
    function countChars(textarea) {
        document.getElementById('char-count').textContent = textarea.value.length;
        if(textarea.value.length > 500) {
            document.getElementById('char-count').classList.add('text-red-500');
        } else {
            document.getElementById('char-count').classList.remove('text-red-500');
        }
    }

    // Update Live Preview
    function updatePreview() {
        const title = document.getElementById('noti-title').value || 'Tiêu đề thông báo';
        const content = document.getElementById('noti-content').value || 'Nội dung thông báo sẽ hiển thị ở đây. Bạn có thể sử dụng các biến cá nhân hóa để làm thông báo thân thiện hơn.';
        const type = document.getElementById('noti-type').value;
        const isHighPriority = document.querySelector('input[name="priority"]:checked').value === 'high';
        
        // Map types to icons/colors
        const typeConfig = {
            'tin_nhan': { icon: 'mdi:message-text-outline', bg: 'bg-blue-50', text: 'text-blue-600' },
            'voucher': { icon: 'mdi:ticket-percent-outline', bg: 'bg-yellow-50', text: 'text-yellow-600' },
            'don_hang': { icon: 'mdi:shopping-outline', bg: 'bg-teal-50', text: 'text-teal-600' },
            'tai_khoan': { icon: 'mdi:account-star-outline', bg: 'bg-purple-50', text: 'text-purple-600' },
            'he_thong': { icon: 'mdi:shield-alert-outline', bg: 'bg-gray-100', text: 'text-gray-600' }
        };
        
        const config = typeConfig[type];

        // Update Text
        document.getElementById('preview-title').textContent = title;
        // Simple replace variables for preview
        let previewHtml = content.replace(/\n/g, '<br>')
                                .replace(/{ten_khach_hang}/g, '<strong>Nguyễn Văn A</strong>')
                                .replace(/{ma_voucher}/g, '<strong>GOLD5</strong>')
                                .replace(/{ma_don_hang}/g, '<strong>#DH123</strong>')
                                .replace(/{hang_thanh_vien}/g, '<strong>Gold</strong>');
        document.getElementById('preview-content').innerHTML = previewHtml;

        // Update Icon
        const iconWrapper = document.getElementById('preview-icon-wrapper');
        iconWrapper.className = `w-10 h-10 rounded-full flex items-center justify-center shrink-0 mt-0.5 ${config.bg} ${config.text}`;
        document.getElementById('preview-icon').setAttribute('data-icon', config.icon);

        // Priority Logic
        document.getElementById('preview-priority-bar').classList.toggle('hidden', !isHighPriority);
        document.getElementById('priority-warning').classList.toggle('hidden', !isHighPriority);
        
        const titleEl = document.getElementById('preview-title');
        if (isHighPriority) {
            titleEl.classList.remove('text-gray-900');
            titleEl.classList.add('text-[#6B0D18]');
        } else {
            titleEl.classList.add('text-gray-900');
            titleEl.classList.remove('text-[#6B0D18]');
        }
    }

    // Modal Confirmation
    const confirmModal = document.getElementById('confirmModal');
    
    function confirmSend() {
        // Reset checkbox
        document.getElementById('check-confirm').checked = false;
        document.getElementById('btn-final-send').disabled = true;

        confirmModal.classList.remove('hidden');
        setTimeout(() => {
            confirmModal.classList.remove('opacity-0');
            confirmModal.firstElementChild.classList.remove('scale-95');
        }, 10);
    }
    
    function closeConfirmModal() {
        confirmModal.classList.add('opacity-0');
        confirmModal.firstElementChild.classList.add('scale-95');
        setTimeout(() => {
            confirmModal.classList.add('hidden');
        }, 300);
    }
</script>
