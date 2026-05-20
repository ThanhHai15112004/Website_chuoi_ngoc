<?php
// views/pages/admin_voucher_form.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <a href="<?= APP_URL ?>/admin/voucher" class="text-sm text-gray-500 hover:text-[#6B0D18] flex items-center gap-1 transition-colors">
                    <span class="iconify" data-icon="mdi:arrow-left"></span>
                    Quay lại
                </a>
                <span class="text-gray-300">|</span>
                <span class="text-sm font-medium text-[#6B0D18]"><?= $is_edit ? 'Chỉnh sửa' : 'Thêm mới' ?></span>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury"><?= $tieu_de ?></h2>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/voucher" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy</a>
            <button class="px-5 py-2.5 bg-white border border-[#6B0D18] text-[#6B0D18] rounded-lg hover:bg-red-50 transition-colors font-medium text-sm">Lưu nháp</button>
            <button onclick="saveVoucher(this)" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md shadow-[#6B0D18]/20 flex items-center gap-2">
                <span class="iconify" data-icon="mdi:content-save-outline"></span>
                <span><?= $is_edit ? 'Cập nhật voucher' : 'Tạo voucher' ?></span>
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col xl:flex-row gap-6">
        
        <!-- Form Area -->
        <div class="flex-1 space-y-6">
            <!-- Thông tin cơ bản -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-5">
                <h4 class="font-semibold text-gray-800 flex items-center gap-2 border-b border-gray-50 pb-3 text-lg">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:information-outline"></span>
                    Thông tin cơ bản
                </h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Mã voucher <span class="text-red-500">*</span></label>
                        <div class="flex gap-2">
                            <input type="text" id="input_ma" oninput="updatePreview()" placeholder="VD: GIAM50K" class="flex-1 uppercase px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <button type="button" onclick="generateRandomCode()" class="px-4 py-2.5 bg-gray-50 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-100 transition-colors text-sm font-medium whitespace-nowrap flex items-center gap-1" title="Tạo mã ngẫu nhiên">
                                <span class="iconify" data-icon="mdi:refresh"></span> Tạo mã
                            </button>
                        </div>
                    </div>
                    
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Tên chương trình <span class="text-red-500">*</span></label>
                        <input type="text" id="input_ten" oninput="updatePreview()" placeholder="VD: Giảm 50K cho đơn từ 500K" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-sm font-medium text-gray-700">Mô tả chi tiết</label>
                    <textarea rows="3" placeholder="Nhập mô tả chi tiết về chương trình..." class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm resize-y transition-colors"></textarea>
                </div>
            </div>

            <!-- Loại và giá trị giảm -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-5">
                <h4 class="font-semibold text-gray-800 flex items-center gap-2 border-b border-gray-50 pb-3 text-lg">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:percent-outline"></span>
                    Loại & Giá trị giảm
                </h4>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-2">
                    <label class="cursor-pointer">
                        <input type="radio" name="loai_giam" value="percent" class="peer sr-only" checked onchange="toggleDiscountType()">
                        <div class="px-4 py-3 border border-gray-200 rounded-xl text-center text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:text-[#6B0D18] peer-checked:bg-red-50 hover:bg-gray-50 transition-all flex flex-col items-center gap-1.5">
                            <span class="iconify text-xl" data-icon="mdi:percent"></span>
                            Phần trăm
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="loai_giam" value="fixed" class="peer sr-only" onchange="toggleDiscountType()">
                        <div class="px-4 py-3 border border-gray-200 rounded-xl text-center text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:text-[#6B0D18] peer-checked:bg-red-50 hover:bg-gray-50 transition-all flex flex-col items-center gap-1.5">
                            <span class="iconify text-xl" data-icon="mdi:currency-usd"></span>
                            Số tiền
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="loai_giam" value="freeship" class="peer sr-only" onchange="toggleDiscountType()">
                        <div class="px-4 py-3 border border-gray-200 rounded-xl text-center text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:text-[#6B0D18] peer-checked:bg-red-50 hover:bg-gray-50 transition-all flex flex-col items-center gap-1.5">
                            <span class="iconify text-xl" data-icon="mdi:truck-outline"></span>
                            Freeship
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="loai_giam" value="gift" class="peer sr-only" onchange="toggleDiscountType()">
                        <div class="px-4 py-3 border border-gray-200 rounded-xl text-center text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:text-[#6B0D18] peer-checked:bg-red-50 hover:bg-gray-50 transition-all flex flex-col items-center gap-1.5">
                            <span class="iconify text-xl" data-icon="mdi:gift-outline"></span>
                            Quà tặng
                        </div>
                    </label>
                </div>

                <!-- Dynamic Fields based on Type -->
                <div id="discountFieldsPercent" class="grid grid-cols-1 md:grid-cols-2 gap-5 transition-all">
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Mức giảm (%) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="number" id="input_gia_tri" oninput="updatePreview()" placeholder="VD: 10" class="w-full px-4 py-2.5 pr-8 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">%</span>
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Giảm tối đa (VNĐ)</label>
                        <div class="relative">
                            <input type="number" placeholder="Không giới hạn thì để trống" class="w-full px-4 py-2.5 pr-8 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">đ</span>
                        </div>
                    </div>
                </div>

                <div id="discountFieldsFixed" class="hidden transition-all">
                    <div class="space-y-1.5 w-full md:w-1/2">
                        <label class="block text-sm font-medium text-gray-700">Số tiền giảm (VNĐ) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="number" id="input_gia_tri_fixed" oninput="updatePreview()" placeholder="VD: 50000" class="w-full px-4 py-2.5 pr-8 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">đ</span>
                        </div>
                    </div>
                </div>
            </div>

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
            
        </div>

        <!-- Preview Area (Right Side) -->
        <div class="w-full xl:w-96 flex flex-col gap-6">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 sticky top-24">
                <h4 class="font-semibold text-gray-800 flex items-center gap-2 mb-6 text-lg border-b border-gray-50 pb-3">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:eye-outline"></span>
                    Xem trước giao diện
                </h4>
                
                <!-- Ticket Mockup -->
                <div class="relative mx-auto w-full max-w-sm rounded-xl overflow-hidden shadow-lg border border-red-100 bg-gradient-to-br from-red-50 to-white transition-all hover:shadow-xl">
                    <!-- Serrated edges top & bottom -->
                    <div class="absolute top-0 left-0 w-full h-2 bg-repeat-x flex justify-around">
                        <?php for($i=0; $i<20; $i++): ?><div class="w-3 h-3 bg-white rounded-full -mt-1.5 shadow-inner"></div><?php endfor; ?>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-2 bg-repeat-x flex justify-around">
                        <?php for($i=0; $i<20; $i++): ?><div class="w-3 h-3 bg-white rounded-full mt-0.5 shadow-inner"></div><?php endfor; ?>
                    </div>

                    <div class="p-6 pt-8 pb-8 relative z-10 border-l-4 border-[#6B0D18] flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-red-100 text-[#6B0D18] flex items-center justify-center mb-4 shadow-sm">
                            <span class="iconify text-2xl" data-icon="mdi:ticket-percent"></span>
                        </div>
                        
                        <h3 class="text-2xl font-black text-[#6B0D18] tracking-widest uppercase mb-2" id="preview_ma">MÃ_VOUCHER</h3>
                        
                        <div class="w-full border-t-2 border-dashed border-red-200 my-4 relative">
                            <div class="absolute -left-7 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-white border-r border-red-100 shadow-inner"></div>
                            <div class="absolute -right-7 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-white border-l border-red-100 shadow-inner"></div>
                        </div>

                        <div class="space-y-1.5 w-full">
                            <p class="font-bold text-gray-800 text-xl" id="preview_gia_tri">Giảm 0%</p>
                            <p class="text-base font-medium text-gray-600" id="preview_ten">Tên chương trình</p>
                            <p class="text-sm text-gray-500 mt-2 bg-gray-50/80 py-1.5 px-3 rounded-md inline-block border border-gray-100" id="preview_dieu_kien">Đơn từ 0đ</p>
                        </div>
                        
                        <div class="mt-6 pt-4 border-t border-gray-100 w-full flex justify-between items-center text-xs text-gray-500">
                            <span class="flex items-center gap-1.5 font-medium"><span class="iconify" data-icon="mdi:clock-outline"></span> <span id="preview_date">HSD: Chưa đặt</span></span>
                            <span class="font-bold text-[#6B0D18]">Tất cả KH</span>
                        </div>
                    </div>
                </div>

                <div class="mt-8 p-4 bg-amber-50 border border-amber-100 rounded-xl text-sm text-amber-800 flex items-start gap-3">
                    <span class="iconify mt-0.5 shrink-0 text-xl text-amber-500" data-icon="mdi:lightbulb-on-outline"></span>
                    <p class="leading-relaxed">Khách hàng sẽ thấy voucher này trong ví voucher của họ và ở trang giỏ hàng nếu đủ điều kiện áp dụng.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]">
    <div class="text-emerald-500 mt-0.5">
        <span class="iconify text-xl" data-icon="mdi:check-circle"></span>
    </div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="toast-msg">Đã tạo voucher thành công.</p>
    </div>
    <button onclick="hideToast()" class="text-gray-400 hover:text-gray-600 ml-4"><span class="iconify" data-icon="mdi:close"></span></button>
</div>

<!-- Scripts -->
<script>
    // Interactive Preview updating
    function updatePreview() {
        const ma = document.getElementById('input_ma').value.trim().toUpperCase() || 'MÃ_VOUCHER';
        const ten = document.getElementById('input_ten').value.trim() || 'Tên chương trình';
        const dk = document.getElementById('input_dieu_kien').value;
        const date = document.getElementById('input_date').value;
        
        // Update Code
        document.getElementById('input_ma').value = ma;
        document.getElementById('preview_ma').textContent = ma;
        document.getElementById('preview_ten').textContent = ten;
        
        // Update Condition
        if (dk && dk > 0) {
            document.getElementById('preview_dieu_kien').textContent = `Đơn từ ${parseInt(dk).toLocaleString('vi-VN')}đ`;
        } else {
            document.getElementById('preview_dieu_kien').textContent = 'Không yêu cầu';
        }
        
        // Update Date
        if (date) {
            const d = new Date(date);
            document.getElementById('preview_date').textContent = `HSD: ${d.toLocaleDateString('vi-VN')}`;
        }

        // Update Value based on Type
        const type = document.querySelector('input[name="loai_giam"]:checked').value;
        let gia_tri = '';
        if (type === 'percent') {
            const val = document.getElementById('input_gia_tri').value;
            gia_tri = val ? `Giảm ${val}%` : 'Giảm 0%';
        } else if (type === 'fixed') {
            const val = document.getElementById('input_gia_tri_fixed').value;
            gia_tri = val ? `Giảm ${parseInt(val).toLocaleString('vi-VN')}đ` : 'Giảm 0đ';
        } else if (type === 'freeship') {
            gia_tri = 'Miễn phí vận chuyển';
        } else {
            gia_tri = 'Quà tặng bí mật';
        }
        document.getElementById('preview_gia_tri').textContent = gia_tri;
    }

    function toggleDiscountType() {
        const type = document.querySelector('input[name="loai_giam"]:checked').value;
        const divPercent = document.getElementById('discountFieldsPercent');
        const divFixed = document.getElementById('discountFieldsFixed');
        
        if (type === 'percent') {
            divPercent.classList.remove('hidden');
            divFixed.classList.add('hidden');
        } else if (type === 'fixed') {
            divPercent.classList.add('hidden');
            divFixed.classList.remove('hidden');
        } else {
            divPercent.classList.add('hidden');
            divFixed.classList.add('hidden');
        }
        updatePreview();
    }

    function generateRandomCode() {
        const prefixes = ['NGOC', 'CHUOI', 'LIXI', 'SALE', 'NEW', 'VIP'];
        const p = prefixes[Math.floor(Math.random() * prefixes.length)];
        const num = Math.floor(10 + Math.random() * 90);
        const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        const str = chars.charAt(Math.floor(Math.random() * chars.length)) + chars.charAt(Math.floor(Math.random() * chars.length));
        
        const input = document.getElementById('input_ma');
        input.value = `${p}${num}${str}`;
        updatePreview();
    }

    // Save button mock
    function saveVoucher(btn) {
        const originalContent = btn.innerHTML;
        btn.innerHTML = `<span class="iconify animate-spin text-xl" data-icon="mdi:loading"></span> Đang xử lý...`;
        btn.disabled = true;
        
        setTimeout(() => {
            btn.innerHTML = originalContent;
            btn.disabled = false;
            showToast("Đã lưu voucher thành công!");
            setTimeout(() => {
                window.location.href = '<?= APP_URL ?>/admin/voucher';
            }, 1500);
        }, 1000);
    }

    // Toast functionality
    let toastTimeout;
    function showToast(msg) {
        const toast = document.getElementById('toast');
        document.getElementById('toast-msg').textContent = msg;
        
        toast.classList.remove('translate-y-20', 'opacity-0');
        
        clearTimeout(toastTimeout);
        toastTimeout = setTimeout(() => {
            hideToast();
        }, 3000);
    }

    function hideToast() {
        const toast = document.getElementById('toast');
        toast.classList.add('translate-y-20', 'opacity-0');
    }

    // Mock population for Edit Mode
    <?php if ($is_edit): ?>
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('input_ma').value = 'GIAM50K';
        document.getElementById('input_ten').value = 'Giảm 50K cho đơn từ 500K';
        document.getElementById('input_dieu_kien').value = 500000;
        document.querySelector('input[name="loai_giam"][value="fixed"]').checked = true;
        toggleDiscountType();
        document.getElementById('input_gia_tri_fixed').value = 50000;
        updatePreview();
    });
    <?php else: ?>
    document.addEventListener('DOMContentLoaded', updatePreview);
    <?php endif; ?>
</script>
