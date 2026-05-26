<?php
// views/components/Admin/nhap_kho/modals.php
?>
<!-- Modal Duyệt Phiếu Nhập -->
<div id="modalDuyetPhieu" class="fixed inset-0 bg-gray-900/50 z-[60] hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform transition-all">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-orange-500" data-icon="mdi:check-decagram-outline"></span>
                Duyệt phiếu nhập kho?
            </h3>
            <button onclick="closeModal('modalDuyetPhieu')" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        
        <!-- Body -->
        <div class="p-6 space-y-4">
            <p class="text-sm text-gray-600">
                Sau khi duyệt, phiếu có thể được xác nhận nhập kho và cập nhật tồn kho sản phẩm.
            </p>

            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500 mb-1">Mã phiếu</p>
                        <p class="font-bold text-[#6B0D18]">NK202600126</p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Kho nhập</p>
                        <p class="font-medium text-gray-900">Kho tổng</p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Tổng sản phẩm</p>
                        <p class="font-medium text-gray-900">2 sản phẩm (1000 món)</p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Hàng lỗi / thiếu</p>
                        <p class="font-medium text-emerald-600">0 (Nhận đủ)</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-gray-500 mb-1">Nhà cung cấp</p>
                        <p class="font-medium text-gray-900">Hộp Quà Cao Cấp Bảo Tín</p>
                    </div>
                    <div class="col-span-2 border-t border-gray-200 pt-3">
                        <p class="text-gray-500 mb-1">Tổng tiền</p>
                        <p class="font-bold text-lg text-gray-900">15.000.000đ</p>
                    </div>
                </div>
            </div>

            <div class="space-y-2 pt-2">
                <label class="flex items-start gap-2 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors bg-orange-50/50 border-orange-200">
                    <div class="flex items-center h-5">
                        <input type="radio" name="duyet_action" class="text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-gray-900">Duyệt và chờ nhập kho</span>
                        <span class="text-xs text-gray-500">Người quản lý kho sẽ xác nhận nhập kho sau.</span>
                    </div>
                </label>
                <label class="flex items-start gap-2 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors">
                    <div class="flex items-center h-5">
                        <input type="radio" name="duyet_action" class="text-[#6B0D18] focus:ring-[#6B0D18]">
                    </div>
                    <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-900">Duyệt và nhập kho ngay</span>
                        <span class="text-xs text-gray-500">Cộng trực tiếp vào tồn kho hệ thống.</span>
                    </div>
                </label>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú duyệt</label>
                <textarea class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm" rows="2" placeholder="Ghi chú thêm nếu cần..."></textarea>
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3">
            <button onclick="closeModal('modalDuyetPhieu')" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                Hủy
            </button>
            <button class="px-4 py-2 bg-white border border-orange-500 rounded-lg text-sm font-medium text-orange-600 hover:bg-orange-50 transition-colors">
                Yêu cầu kiểm lại
            </button>
            <button onclick="closeModal('modalDuyetPhieu'); showToast('Đã duyệt phiếu nhập kho thành công')" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors shadow-sm">
                Duyệt phiếu
            </button>
        </div>
    </div>
</div>

<!-- Modal Hủy Phiếu -->
<div id="modalHuyPhieu" class="fixed inset-0 bg-gray-900/50 z-[60] hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform transition-all">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-rose-500" data-icon="mdi:alert"></span>
                Hủy phiếu nhập kho?
            </h3>
            <button onclick="closeModal('modalHuyPhieu')" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6">
            <p class="text-sm text-gray-600 mb-4">
                Bạn có chắc chắn muốn hủy phiếu nhập này? Thao tác này không thể hoàn tác.
            </p>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Lý do hủy <span class="text-red-500">*</span></label>
                <select class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm mb-3">
                    <option value="">-- Chọn lý do --</option>
                    <option value="1">Tạo nhầm phiếu</option>
                    <option value="2">Sai nhà cung cấp / Sai kho</option>
                    <option value="3">Hàng không được giao</option>
                    <option value="4">Nhà cung cấp hủy đơn</option>
                    <option value="5">Lý do khác</option>
                </select>
                <textarea class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm" rows="2" placeholder="Chi tiết lý do..."></textarea>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3">
            <button onclick="closeModal('modalHuyPhieu')" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                Không hủy
            </button>
            <button onclick="closeModal('modalHuyPhieu'); showToast('Đã hủy phiếu nhập kho')" class="px-4 py-2 bg-rose-600 text-white rounded-lg text-sm font-medium hover:bg-rose-700 shadow-sm">
                Xác nhận hủy phiếu
            </button>
        </div>
    </div>
</div>

<!-- Modal Ghi nhận thanh toán -->
<div id="modalThanhToan" class="fixed inset-0 bg-gray-900/50 z-[60] hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform transition-all">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-emerald-500" data-icon="mdi:cash-register"></span>
                Ghi nhận thanh toán
            </h3>
            <button onclick="closeModal('modalThanhToan')" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6 space-y-4">
            <div class="bg-orange-50 rounded-lg p-4 border border-orange-100 flex justify-between items-center">
                <div>
                    <p class="text-sm text-orange-700 font-medium mb-1">Số tiền còn nợ</p>
                    <p class="text-2xl font-bold text-orange-600">12.000.000đ</p>
                </div>
                <div class="text-right text-sm">
                    <p class="text-gray-500 mb-1">Tổng thanh toán: 35.600.000đ</p>
                    <p class="text-emerald-600 font-medium">Đã trả: 23.600.000đ</p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Số tiền thanh toán <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <input type="text" value="12,000,000" class="block w-full pr-8 py-2 border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-lg font-bold text-[#6B0D18] text-right">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-500 font-medium">
                            đ
                        </div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phương thức <span class="text-red-500">*</span></label>
                    <select class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
                        <option value="bank">Chuyển khoản</option>
                        <option value="cash">Tiền mặt</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ngày thanh toán <span class="text-red-500">*</span></label>
                    <input type="date" value="<?= date('Y-m-d') ?>" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Chứng từ đính kèm</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center hover:bg-gray-50 transition-colors cursor-pointer">
                        <span class="iconify text-gray-400 text-3xl mx-auto mb-2" data-icon="mdi:cloud-upload-outline"></span>
                        <p class="text-sm text-gray-600">Kéo thả hoặc click để tải lên chứng từ, ảnh UNC</p>
                    </div>
                </div>
                <div class="col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú</label>
                    <textarea class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm" rows="2"></textarea>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3">
            <button onclick="closeModal('modalThanhToan')" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                Hủy
            </button>
            <button onclick="closeModal('modalThanhToan'); showToast('Đã ghi nhận thanh toán thành công')" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-red-900 shadow-sm">
                Lưu thanh toán
            </button>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>
