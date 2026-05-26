<?php
// views/components/Admin/nhap_kho/form/form_payment.php
?>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    
    <!-- Ghi chú và Đính kèm -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50">
            <h3 class="font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-gray-500" data-icon="mdi:note-text-outline"></span>
                Ghi chú & Đính kèm
            </h3>
        </div>
        <div class="p-5 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú phiếu nhập</label>
                <textarea class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm" rows="3" placeholder="Nhập ghi chú cho phiếu nhập..."></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tệp đính kèm</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:bg-gray-50 transition-colors cursor-pointer">
                    <span class="iconify text-gray-400 text-4xl mx-auto mb-2" data-icon="mdi:cloud-upload-outline"></span>
                    <p class="text-sm text-gray-600 font-medium">Kéo thả hoặc click để tải lên</p>
                    <p class="text-xs text-gray-400 mt-1">Hỗ trợ: PDF, JPG, PNG (Tối đa 5MB)</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Thanh toán & Tóm tắt -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50">
            <h3 class="font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-gray-500" data-icon="mdi:cash-register"></span>
                Thanh toán
            </h3>
        </div>
        <div class="p-5">
            <div class="space-y-3 mb-6">
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500">Tổng tiền hàng:</span>
                    <span class="font-medium text-gray-900">17.500.000đ</span>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500">Chiết khấu toàn phiếu:</span>
                    <div class="flex items-center gap-2 w-32">
                        <input type="text" value="0" class="block w-full px-2 py-1 text-right border-gray-300 rounded focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
                    </div>
                </div>
                <div class="flex justify-between items-center text-sm">
                    <span class="text-gray-500">Phí vận chuyển / Phụ phí:</span>
                    <div class="flex items-center gap-2 w-32">
                        <input type="text" value="0" class="block w-full px-2 py-1 text-right border-gray-300 rounded focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
                    </div>
                </div>
                <div class="pt-3 border-t border-gray-200 flex justify-between items-center">
                    <span class="text-base font-bold text-gray-900">Tổng cần thanh toán:</span>
                    <span class="text-2xl font-bold text-[#6B0D18]">17.500.000đ</span>
                </div>
            </div>

            <!-- Khối thanh toán -->
            <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Số tiền đã trả</label>
                        <input type="text" value="0" class="block w-full px-3 py-2 text-right border-gray-300 rounded-md shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm font-semibold">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-1">Phương thức</label>
                        <select class="block w-full px-3 py-2 border-gray-300 rounded-md shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
                            <option>Chưa thanh toán</option>
                            <option>Chuyển khoản</option>
                            <option>Tiền mặt</option>
                        </select>
                    </div>
                </div>
                <div class="flex justify-between items-center border-t border-gray-200 pt-3">
                    <span class="text-sm font-medium text-gray-700">Ghi nhận vào công nợ:</span>
                    <span class="text-lg font-bold text-orange-600">17.500.000đ</span>
                </div>
            </div>
        </div>
    </div>

</div>
