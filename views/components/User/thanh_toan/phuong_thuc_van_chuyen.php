<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 lg:p-6 mb-4">
    <div class="flex items-center gap-2 mb-4 pb-4 border-b border-gray-100">
        <iconify-icon icon="mdi:truck-fast-outline" class="text-xl text-[#8B0000]"></iconify-icon>
        <h2 class="text-lg font-bold text-gray-800">Phương thức vận chuyển</h2>
    </div>

    <div class="space-y-3">
        <!-- Tiêu chuẩn -->
        <label class="flex items-start gap-4 p-4 border rounded-xl cursor-pointer transition-colors relative group shipping-method-label border-[#8B0000] bg-red-50/20">
            <div class="mt-1">
                <input type="radio" name="phuong_thuc_van_chuyen" value="tieu_chuan" data-fee="0" class="w-4 h-4 text-[#8B0000] focus:ring-[#8B0000]" checked onchange="handleShippingChange(this)">
            </div>
            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-gray-800">Giao hàng tiêu chuẩn</span>
                    <span class="font-bold text-[#8B0000]">Miễn phí</span>
                </div>
                <span class="text-sm text-gray-500 mt-1 block">Nhận hàng trong 2-4 ngày</span>
            </div>
        </label>

        <!-- Giao nhanh -->
        <label class="flex items-start gap-4 p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors relative group shipping-method-label">
            <div class="mt-1">
                <input type="radio" name="phuong_thuc_van_chuyen" value="giao_nhanh" data-fee="25000" class="w-4 h-4 text-[#8B0000] focus:ring-[#8B0000]" onchange="handleShippingChange(this)">
            </div>
            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-gray-800">Giao nhanh</span>
                    <span class="font-bold text-[#8B0000]">25.000đ</span>
                </div>
                <span class="text-sm text-gray-500 mt-1 block">Nhận hàng trong 1-2 ngày</span>
            </div>
        </label>

        <!-- Hỏa tốc -->
        <label class="flex items-start gap-4 p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors relative group shipping-method-label">
            <div class="mt-1">
                <input type="radio" name="phuong_thuc_van_chuyen" value="hoa_toc" data-fee="35000" class="w-4 h-4 text-[#8B0000] focus:ring-[#8B0000]" onchange="handleShippingChange(this)">
            </div>
            <div class="flex-1">
                <div class="flex items-center justify-between">
                    <span class="font-bold text-gray-800">Hỏa tốc nội thành</span>
                    <span class="font-bold text-[#8B0000]">35.000đ</span>
                </div>
                <span class="text-sm text-gray-500 mt-1 block">Nhận trong ngày, áp dụng một số khu vực</span>
            </div>
        </label>
    </div>

    <div class="mt-4 flex items-center gap-2 text-sm text-green-700 bg-green-50 p-3 rounded-lg border border-green-100">
        <iconify-icon icon="mdi:shield-check" class="text-lg"></iconify-icon>
        <p>Đơn hàng được đóng gói chống sốc trước khi bàn giao cho đơn vị vận chuyển.</p>
    </div>
    
    <!-- Hidden input để gửi phí ship lên server -->
    <input type="hidden" name="phi_ship_input" id="phi_ship_input" value="0">
</div>

<script>
function handleShippingChange(radio) {
    // Reset styles
    document.querySelectorAll('.shipping-method-label').forEach(label => {
        label.classList.remove('border-[#8B0000]', 'bg-red-50/20');
        label.classList.add('border-gray-200', 'hover:bg-gray-50');
    });

    // Apply active style
    if (radio.checked) {
        const parent = radio.closest('.shipping-method-label');
        parent.classList.add('border-[#8B0000]', 'bg-red-50/20');
        parent.classList.remove('border-gray-200', 'hover:bg-gray-50');
    }

    // Cập nhật phí ship vào biến hidden
    const fee = parseInt(radio.getAttribute('data-fee'));
    document.getElementById('phi_ship_input').value = fee;

    // Trigger update UI tổng tiền (cần gọi function trong chi_tiet_thanh_toan)
    if (typeof updateCheckoutTotals === 'function') {
        updateCheckoutTotals(fee);
    }
}
</script>
