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
                    <div class="flex items-center justify-between pb-4 border-b border-gray-200">
                        <span class="text-sm font-medium text-gray-600">Trạng thái sau lưu</span>
                        <span class="px-2.5 py-1 bg-yellow-50 text-amber-600 rounded-md text-xs font-bold uppercase border border-yellow-200">
                            Chờ duyệt
                        </span>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Tổng mã sản phẩm:</span>
                        <span id="xk_sum_qty" class="font-bold text-gray-900">0</span>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-gray-900 uppercase">Tổng giá trị xuất</span>
                            <span id="xk_sum_money" class="text-2xl font-black text-[#6B0D18]">0đ</span>
                            <input type="hidden" id="xk_tong_tien" value="0">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cột phải: Ghi chú & Đính kèm -->
            <div class="space-y-6">
                <!-- Ghi chú -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Ghi chú phiếu xuất</label>
                    <textarea id="xk_ghi_chu" rows="4" class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700 bg-white" placeholder="Nhập ghi chú hoặc hướng dẫn xuất kho (nếu có)..."></textarea>
                </div>
            </div>

        </div>
    </div>
</div>
