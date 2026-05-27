<?php
// views/components/Admin/thanh_toan_van_chuyen/tab_preview.php
?>
<div class="flex flex-col lg:flex-row gap-8">
    
    <!-- Bộ lọc giả lập -->
    <div class="w-full lg:w-64 shrink-0 space-y-4">
        <h3 class="font-bold text-gray-900 mb-4">Mô phỏng giỏ hàng</h3>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tổng tiền đơn hàng</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm bg-white" onchange="updatePreviewCheckout(this.value)">
                <option value="300000">300.000đ (Dưới freeship)</option>
                <option value="650000" selected>650.000đ (Đạt freeship)</option>
                <option value="1500000">1.500.000đ</option>
            </select>
        </div>
        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Khu vực giao hàng</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm bg-white">
                <option>Nội thành Hà Nội</option>
                <option>TP. Hồ Chí Minh</option>
                <option>Đà Nẵng</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Hạng thành viên</label>
            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm bg-white">
                <option>Thành viên mới</option>
                <option>Hạng Silver</option>
                <option>Hạng Diamond (Freeship)</option>
            </select>
        </div>
    </div>

    <!-- Khung xem trước (Mô phỏng Mobile Checkout) -->
    <div class="flex-1 max-w-[500px] mx-auto lg:mx-0">
        <div class="border-[8px] border-gray-900 rounded-[40px] overflow-hidden bg-gray-50 shadow-2xl relative h-[700px] flex flex-col">
            <!-- Mobile Header (Notch) -->
            <div class="h-6 bg-gray-900 w-40 rounded-b-3xl absolute top-0 left-1/2 -translate-x-1/2 z-10"></div>
            
            <div class="bg-white p-4 pt-10 border-b border-gray-200 text-center sticky top-0 z-0">
                <h2 class="font-bold text-gray-900">Thanh toán & Đặt hàng</h2>
            </div>
            
            <div class="flex-1 overflow-y-auto p-4 space-y-4 pb-20 custom-scrollbar">
                
                <!-- Địa chỉ nhận hàng -->
                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
                    <div class="flex items-center justify-between mb-2">
                        <span class="font-bold text-gray-900 text-sm">Giao tới</span>
                        <span class="text-blue-600 text-xs font-medium">Thay đổi</span>
                    </div>
                    <p class="font-medium text-gray-900 text-sm">Nguyễn Văn Khách | 0901234567</p>
                    <p class="text-gray-500 text-xs mt-1">123 Đường Xuân Thủy, Dịch Vọng Hậu, Quận Cầu Giấy, Hà Nội</p>
                </div>

                <!-- Phương thức vận chuyển -->
                <div>
                    <h3 class="font-bold text-gray-900 text-sm mb-2 px-1">Phương thức giao hàng</h3>
                    <div class="space-y-2">
                        <label class="flex items-start gap-3 p-3 bg-red-50 border border-red-200 rounded-xl cursor-pointer">
                            <input type="radio" name="shipping" class="mt-1 w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                            <div class="flex-1">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="font-medium text-gray-900 text-sm">Giao hàng tiêu chuẩn</span>
                                    <span class="font-bold text-[#6B0D18] text-sm" id="prev-ship-fee">0đ <del class="text-xs text-gray-400 font-normal ml-1">30.000đ</del></span>
                                </div>
                                <p class="text-xs text-gray-500">Nhận hàng trong 2 - 5 ngày tới</p>
                            </div>
                        </label>
                        <label class="flex items-start gap-3 p-3 bg-white border border-gray-200 rounded-xl cursor-pointer">
                            <input type="radio" name="shipping" class="mt-1 w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                            <div class="flex-1">
                                <div class="flex justify-between items-center mb-1">
                                    <span class="font-medium text-gray-900 text-sm">Giao hàng nhanh</span>
                                    <span class="font-bold text-gray-900 text-sm">50.000đ</span>
                                </div>
                                <p class="text-xs text-gray-500">Nhận hàng trong 1 - 2 ngày tới</p>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Phương thức thanh toán -->
                <div>
                    <h3 class="font-bold text-gray-900 text-sm mb-2 px-1">Phương thức thanh toán</h3>
                    <div class="space-y-2">
                        <label class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-xl cursor-pointer">
                            <div class="flex items-center gap-3">
                                <span class="iconify text-2xl text-blue-600" data-icon="mdi:bank-transfer"></span>
                                <span class="font-medium text-gray-900 text-sm">Chuyển khoản ngân hàng</span>
                            </div>
                            <input type="radio" name="payment" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                        </label>
                        
                        <!-- Box hướng dẫn chuyển khoản (hiện khi chọn CK) -->
                        <div class="bg-gray-50 rounded-xl p-3 border border-gray-200 text-sm mx-1">
                            <p class="text-gray-600 text-xs mb-2">Vui lòng chuyển khoản vào tài khoản dưới đây:</p>
                            <div class="flex justify-between items-center bg-white p-2 rounded mb-2 border border-gray-100">
                                <div>
                                    <p class="font-bold text-gray-900 text-xs">Vietcombank</p>
                                    <p class="text-gray-900 text-sm font-medium">123456789</p>
                                </div>
                                <span class="iconify text-gray-400" data-icon="mdi:content-copy"></span>
                            </div>
                            <p class="text-xs text-gray-500 italic">Ghi chú: Khách chuyển khoản trước khi shop xử lý đơn</p>
                        </div>

                        <label class="flex items-center justify-between p-3 bg-white border border-gray-200 rounded-xl cursor-pointer">
                            <div class="flex items-center gap-3">
                                <span class="iconify text-2xl text-emerald-600" data-icon="mdi:cash"></span>
                                <div>
                                    <span class="font-medium text-gray-900 text-sm block">Thanh toán khi nhận hàng (COD)</span>
                                </div>
                            </div>
                            <input type="radio" name="payment" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                        </label>
                    </div>
                </div>

                <!-- Tổng tiền -->
                <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 mt-4">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-600 text-sm">Tạm tính</span>
                        <span class="font-medium text-gray-900 text-sm" id="prev-subtotal">650.000đ</span>
                    </div>
                    <div class="flex justify-between items-center mb-3">
                        <span class="text-gray-600 text-sm">Phí vận chuyển</span>
                        <span class="font-medium text-gray-900 text-sm" id="prev-ship-fee-bottom">0đ</span>
                    </div>
                    <div class="pt-3 border-t border-gray-100 flex justify-between items-end">
                        <span class="font-bold text-gray-900">Tổng thanh toán</span>
                        <span class="font-bold text-[#6B0D18] text-xl" id="prev-total">650.000đ</span>
                    </div>
                    
                    <div class="mt-3 bg-emerald-50 text-emerald-700 text-xs font-medium p-2 rounded-lg text-center border border-emerald-100" id="prev-freeship-msg">
                        Đơn hàng của bạn được Miễn phí giao hàng
                    </div>
                </div>
            </div>
            
            <!-- Bottom Button -->
            <div class="bg-white p-4 border-t border-gray-200 absolute bottom-0 left-0 right-0">
                <button class="w-full py-3.5 bg-[#6B0D18] text-white rounded-xl font-bold shadow-md">ĐẶT HÀNG NGAY</button>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar { width: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
</style>

<script>
    function updatePreviewCheckout(totalValue) {
        let subtotal = parseInt(totalValue);
        let freeshipMsg = document.getElementById('prev-freeship-msg');
        let shipFeeTop = document.getElementById('prev-ship-fee');
        let shipFeeBottom = document.getElementById('prev-ship-fee-bottom');
        let totalDisplay = document.getElementById('prev-total');
        let subtotalDisplay = document.getElementById('prev-subtotal');

        subtotalDisplay.textContent = new Intl.NumberFormat('vi-VN').format(subtotal) + 'đ';

        if(subtotal >= 500000) {
            freeshipMsg.style.display = 'block';
            shipFeeTop.innerHTML = `0đ <del class="text-xs text-gray-400 font-normal ml-1">30.000đ</del>`;
            shipFeeBottom.textContent = '0đ';
            totalDisplay.textContent = new Intl.NumberFormat('vi-VN').format(subtotal) + 'đ';
        } else {
            freeshipMsg.style.display = 'none';
            shipFeeTop.innerHTML = `30.000đ`;
            shipFeeBottom.textContent = '30.000đ';
            totalDisplay.textContent = new Intl.NumberFormat('vi-VN').format(subtotal + 30000) + 'đ';
        }
    }
</script>
