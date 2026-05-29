<?php
// views/components/Admin/nhap_kho/form/form_payment.php
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-gray-500" data-icon="mdi:cash-register"></span>
            Thanh toán
        </h3>
    </div>
    <div class="p-5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="space-y-4">
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500 font-medium">Tổng số lượng sản phẩm:</span>
                    <span id="nk_tong_sl_hien_thi" class="font-bold text-gray-900">0</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500 font-medium">Tổng tiền hàng:</span>
                    <span id="nk_tong_tien_hien_thi" class="font-bold text-gray-900">0đ</span>
                    <input type="hidden" id="nk_tong_tien" value="0">
                </div>
            </div>
            
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Số tiền đã trả NCC</label>
                    <div class="relative">
                        <input type="number" id="nk_tien_da_tra" value="0" min="0" oninput="updateTienNo()" class="block w-full pr-8 py-2 text-right border border-gray-300 rounded-md shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] font-semibold">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-500 font-medium">đ</div>
                    </div>
                </div>
                <div class="flex justify-between items-center border-t border-gray-200 pt-3">
                    <span class="text-sm font-medium text-gray-700">Công nợ:</span>
                    <span id="nk_cong_no_hien_thi" class="text-lg font-bold text-orange-600">0đ</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function updateTienNo() {
    const tongTien = parseFloat(document.getElementById('nk_tong_tien').value) || 0;
    const daTra = parseFloat(document.getElementById('nk_tien_da_tra').value) || 0;
    const no = Math.max(0, tongTien - daTra);
    
    document.getElementById('nk_cong_no_hien_thi').innerText = no.toLocaleString('vi-VN') + 'đ';
}
</script>
