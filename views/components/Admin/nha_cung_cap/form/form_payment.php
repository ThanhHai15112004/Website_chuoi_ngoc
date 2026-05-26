<?php
// views/components/Admin/nha_cung_cap/form/form_payment.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
        <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:credit-card-outline"></span>
            Thông tin thanh toán
        </h2>
    </div>
    
    <div class="p-6 space-y-6">
        
        <div class="p-3 bg-blue-50 border border-blue-100 rounded-lg flex items-start gap-2">
            <span class="iconify text-blue-500 mt-0.5" data-icon="mdi:information"></span>
            <p class="text-[11px] text-blue-800 leading-tight">Thông tin thanh toán chỉ hiển thị cho nhân sự có quyền Quản trị hoặc Kế toán.</p>
        </div>

        <div class="space-y-4">
            <!-- Tên ngân hàng -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ngân hàng</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="iconify text-gray-400" data-icon="mdi:bank-outline"></span>
                    </div>
                    <input type="text" value="<?= $isEdit ? 'Vietcombank' : '' ?>" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors" placeholder="Ví dụ: Vietcombank">
                </div>
            </div>

            <!-- Số tài khoản -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Số tài khoản</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="iconify text-gray-400" data-icon="mdi:numeric"></span>
                    </div>
                    <input type="text" value="<?= $isEdit ? '1234567890' : '' ?>" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors" placeholder="Nhập số tài khoản">
                </div>
            </div>

            <!-- Chủ tài khoản -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Chủ tài khoản</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="iconify text-gray-400" data-icon="mdi:account-cash-outline"></span>
                    </div>
                    <input type="text" value="<?= $isEdit ? 'CONG TY TNHH NGOC AN PHAT' : '' ?>" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors uppercase" placeholder="Tên chủ tài khoản">
                </div>
            </div>

            <div class="border-t border-gray-200 pt-4 mt-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Điều khoản thanh toán</label>
                <select class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors">
                    <option value="ngay">Thanh toán ngay khi giao hàng</option>
                    <option value="truoc">Thanh toán trước 100%</option>
                    <option value="no_7">Công nợ 7 ngày</option>
                    <option value="no_15" <?= $isEdit ? 'selected' : '' ?>>Công nợ 15 ngày</option>
                    <option value="no_30">Công nợ 30 ngày</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Hạn mức công nợ (Tùy chọn)</label>
                <div class="relative">
                    <input type="text" value="<?= $isEdit ? '50,000,000' : '' ?>" class="w-full pl-4 pr-10 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors text-right" placeholder="0">
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                        <span class="text-gray-500 font-medium">VNĐ</span>
                    </div>
                </div>
                <p class="text-[11px] text-gray-500 mt-1">Hệ thống sẽ cảnh báo khi nợ vượt hạn mức này.</p>
            </div>

        </div>
    </div>
</div>
