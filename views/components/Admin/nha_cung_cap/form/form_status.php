<?php
// views/components/Admin/nha_cung_cap/form/form_status.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
        <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:shield-check-outline"></span>
            Trạng thái & Ghi chú
        </h2>
    </div>
    
    <div class="p-6 space-y-6">
        
        <!-- Trạng thái -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-3">Trạng thái hợp tác</label>
            <div class="space-y-3">
                <label class="flex items-center gap-3 p-3 rounded-lg border <?= $isEdit ? 'border-emerald-200 bg-emerald-50' : 'border-gray-200 hover:bg-gray-50' ?> cursor-pointer transition-colors group">
                    <input type="radio" name="trang_thai" value="dang_hop_tac" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]" <?= $isEdit ? 'checked' : '' ?>>
                    <div>
                        <span class="block text-sm font-semibold text-emerald-700">Đang hợp tác</span>
                        <span class="block text-xs text-gray-500 mt-0.5">Hiển thị khi tạo phiếu nhập hàng mới.</span>
                    </div>
                </label>
                
                <label class="flex items-center gap-3 p-3 rounded-lg border <?= !$isEdit ? 'border-blue-200 bg-blue-50' : 'border-gray-200 hover:bg-gray-50' ?> cursor-pointer transition-colors group">
                    <input type="radio" name="trang_thai" value="cho_xac_minh" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]" <?= !$isEdit ? 'checked' : '' ?>>
                    <div>
                        <span class="block text-sm font-semibold text-blue-700">Chờ xác minh</span>
                        <span class="block text-xs text-gray-500 mt-0.5">Đang chờ xác minh thông tin đối tác.</span>
                    </div>
                </label>
                
                <?php if($isEdit): ?>
                <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer transition-colors group">
                    <input type="radio" name="trang_thai" value="tam_ngung" class="w-4 h-4 text-amber-600 focus:ring-amber-500">
                    <div>
                        <span class="block text-sm font-semibold text-amber-600">Tạm ngừng hợp tác</span>
                        <span class="block text-xs text-gray-500 mt-0.5">Không xuất hiện khi tạo phiếu nhập mới.</span>
                    </div>
                </label>
                <?php endif; ?>
            </div>
        </div>

        <!-- Ghi chú nội bộ -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Ghi chú nội bộ</label>
            <p class="text-[11px] text-gray-500 mb-2">Chỉ quản trị viên mới thấy ghi chú này.</p>
            <textarea class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors h-28 resize-none" placeholder="Nhập ghi chú, đánh giá ban đầu về nhà cung cấp này..."><?= $isEdit ? 'Thường hay giao hàng trễ 1-2 ngày, cần nhắc nhở trước.' : '' ?></textarea>
        </div>

        <?php if($isEdit): ?>
        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200 text-sm">
            <div class="flex justify-between items-center mb-1">
                <span class="text-gray-500">Người tạo:</span>
                <span class="font-medium text-gray-900">Quản trị viên</span>
            </div>
            <div class="flex justify-between items-center mb-1">
                <span class="text-gray-500">Ngày tạo:</span>
                <span class="font-medium text-gray-900">10/05/2026</span>
            </div>
            <div class="flex justify-between items-center">
                <span class="text-gray-500">Lần cập nhật cuối:</span>
                <span class="font-medium text-gray-900">18/05/2026 (Hải Admin)</span>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
