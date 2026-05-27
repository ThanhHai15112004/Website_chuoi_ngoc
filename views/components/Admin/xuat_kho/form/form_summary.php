<?php
// views/components/Admin/xuat_kho/form/form_summary.php
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:cash-multiple"></span>
            Tóm tắt phiếu & Ghi chú
        </h3>
    </div>
    <div class="p-5">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- Cột trái: Tóm tắt phiếu -->
            <div class="space-y-5">
                <div class="bg-gray-50 rounded-lg p-5 border border-gray-100 space-y-4">
                    <!-- Trạng thái hiện tại -->
                    <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                        <span class="text-sm font-medium text-gray-600">Trạng thái sau lưu</span>
                        <span class="px-2.5 py-1 bg-yellow-50 text-amber-600 rounded-md text-xs font-bold uppercase border border-yellow-200">
                            Chờ duyệt
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Tổng mã sản phẩm:</span>
                        <span id="summary-total-products" class="font-bold text-gray-900">2</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Tổng số lượng cần xuất:</span>
                        <span id="summary-total-can-xuat" class="font-bold text-gray-900">5 món</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Tổng số lượng thực xuất:</span>
                        <span id="summary-total-thuc-xuat" class="font-bold text-[#6B0D18]">3 món</span>
                    </div>
                    
                    <!-- Cảnh báo -->
                    <div id="summary-warning-box" class="p-3 bg-rose-50 border border-rose-100 rounded-lg flex gap-2">
                        <span class="iconify text-rose-600 text-lg shrink-0 mt-0.5" data-icon="mdi:alert-circle"></span>
                        <div class="text-sm text-rose-700">
                            <span class="font-bold">Cảnh báo:</span> Phiếu xuất hiện đang thiếu <span id="summary-missing-qty" class="font-bold">2 món</span> so với yêu cầu. Cần kiểm tra tồn kho.
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-gray-900 uppercase">Tổng giá trị xuất</span>
                            <span id="summary-grand-total" class="text-2xl font-black text-[#6B0D18]">5.900.000đ</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cột phải: Ghi chú & Đính kèm -->
            <div class="space-y-6">
                <!-- Ghi chú -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ghi chú phiếu xuất</label>
                    <textarea rows="4" class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700 bg-white" placeholder="Nhập ghi chú hoặc hướng dẫn xuất kho (nếu có)..."></textarea>
                </div>
                
                <!-- Đính kèm -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Chứng từ đính kèm (Hình ảnh/PDF)</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 flex flex-col items-center justify-center bg-gray-50 hover:bg-gray-100 transition-colors cursor-pointer h-[120px]">
                        <span class="iconify text-3xl text-gray-400 mb-2" data-icon="mdi:cloud-upload-outline"></span>
                        <div class="text-sm text-gray-500 text-center">
                            <span class="font-medium text-[#6B0D18]">Nhấn để tải lên</span> hoặc kéo thả file vào đây
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
