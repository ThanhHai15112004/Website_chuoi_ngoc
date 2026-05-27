<?php
// views/components/Admin/nhap_kho/modals.php
?>
<!-- Modal Duyệt Phiếu Nhập -->
<div id="modalDuyetPhieu" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform transition-all flex flex-col max-h-[90vh]">
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
        <div class="p-6 space-y-4 overflow-y-auto custom-scrollbar flex-grow">
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
<div id="modalHuyPhieu" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform transition-all flex flex-col max-h-[90vh]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-rose-500" data-icon="mdi:alert"></span>
                Hủy phiếu nhập kho?
            </h3>
            <button onclick="closeModal('modalHuyPhieu')" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto custom-scrollbar flex-grow">
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
<div id="modalThanhToan" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform transition-all flex flex-col max-h-[90vh]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-emerald-500" data-icon="mdi:cash-register"></span>
                Ghi nhận thanh toán
            </h3>
            <button onclick="closeModal('modalThanhToan')" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6 space-y-4 overflow-y-auto custom-scrollbar flex-grow">
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

<!-- Modal Yêu Cầu Kiểm Lại -->
<div id="modalYeuCauKiemLai" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform transition-all flex flex-col max-h-[90vh]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-orange-500" data-icon="mdi:refresh-circle"></span>
                Yêu cầu kiểm lại
            </h3>
            <button onclick="closeModal('modalYeuCauKiemLai')" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6 space-y-4 overflow-y-auto custom-scrollbar flex-grow">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Phạm vi kiểm lại</label>
                <select class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
                    <option value="all">Kiểm lại toàn bộ phiếu</option>
                    <option value="error">Chỉ kiểm lại các dòng có lỗi/thiếu</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Người kiểm lại</label>
                <select class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
                    <option value="1">Nguyễn Văn A (Nhân viên kho)</option>
                    <option value="2">Trần Thị B (Nhân viên kho)</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Hạn chót kiểm lại</label>
                <input type="datetime-local" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Lý do yêu cầu <span class="text-red-500">*</span></label>
                <textarea class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm" rows="3" placeholder="Ghi rõ lý do tại sao kết quả kiểm chưa đạt..."></textarea>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3">
            <button onclick="closeModal('modalYeuCauKiemLai')" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">Hủy</button>
            <button onclick="closeModal('modalYeuCauKiemLai'); showToast('Đã gửi yêu cầu kiểm lại')" class="px-4 py-2 bg-orange-600 text-white rounded-lg text-sm font-medium hover:bg-orange-700 shadow-sm">Gửi yêu cầu</button>
        </div>
    </div>
</div>

<!-- Modal Ghi Nhận Lỗi -->
<div id="modalGhiNhanLoi" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform transition-all flex flex-col max-h-[90vh]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-rose-500" data-icon="mdi:alert-box"></span>
                Ghi nhận hàng lỗi / thiếu
            </h3>
            <button onclick="closeModal('modalGhiNhanLoi')" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6 space-y-4 overflow-y-auto custom-scrollbar flex-grow">
            <div class="flex items-start gap-3 bg-gray-50 p-3 rounded-lg border border-gray-100">
                <div class="w-10 h-10 rounded bg-gray-200 flex items-center justify-center shrink-0">
                    <span class="iconify text-gray-400" data-icon="mdi:diamond-stone"></span>
                </div>
                <div>
                    <div class="font-medium text-gray-900 text-sm">Vòng Ngọc Bích Tài Lộc</div>
                    <div class="text-xs text-gray-500">SKU: NB-TL-16-8MM • Size 16cm</div>
                    <div class="text-xs text-gray-500 mt-0.5">Dự kiến: <span class="font-bold text-gray-900">50</span> món</div>
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Số lượng lỗi</label>
                    <input type="number" min="0" value="0" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-rose-600 font-bold bg-rose-50 border-rose-200">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Số lượng thiếu</label>
                    <input type="number" min="0" value="0" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-orange-600 font-bold bg-orange-50 border-orange-200">
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Lý do lỗi <span class="text-red-500">*</span></label>
                <select class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
                    <option value="">-- Chọn lý do --</option>
                    <option value="1">Vỡ / nứt mẻ</option>
                    <option value="2">Sai màu / sai mẫu</option>
                    <option value="3">Không nguyên vẹn, thiếu phụ kiện</option>
                    <option value="4">Lý do khác</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ảnh minh chứng</label>
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 flex justify-center items-center cursor-pointer hover:bg-gray-50 transition-colors">
                    <div class="text-center">
                        <span class="iconify text-gray-400 text-3xl mx-auto mb-1" data-icon="mdi:image-plus"></span>
                        <p class="text-xs text-gray-500">Kéo thả ảnh vào đây hoặc Click để tải lên</p>
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú</label>
                <textarea class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm" rows="2" placeholder="Ghi chú thêm..."></textarea>
            </div>
        </div>
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3">
            <button onclick="closeModal('modalGhiNhanLoi')" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">Hủy</button>
            <button onclick="closeModal('modalGhiNhanLoi'); alert('Đã lưu ghi nhận lỗi')" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-red-900 shadow-sm">Lưu ghi nhận</button>
        </div>
    </div>
</div>

<!-- Modal Nhập từ Excel -->
<div id="modalNhapExcel" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-2xl overflow-hidden transform transition-all flex flex-col max-h-[90vh]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-emerald-600" data-icon="mdi:microsoft-excel"></span>
                Nhập phiếu từ Excel
            </h3>
            <button onclick="closeModal('modalNhapExcel')" class="text-gray-400 hover:text-gray-600 transition-colors">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="p-6 overflow-y-auto custom-scrollbar flex-grow space-y-5" id="excelStep1">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nhà cung cấp <span class="text-red-500">*</span></label>
                    <select class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] sm:text-sm">
                        <option value="">-- Chọn NCC --</option>
                        <option value="1">Công ty Ngọc An Phát</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Kho nhập <span class="text-red-500">*</span></label>
                    <select class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] sm:text-sm">
                        <option value="tong">Kho tổng</option>
                        <option value="online">Kho online</option>
                    </select>
                </div>
            </div>
            <div>
                <div class="flex justify-between items-center mb-1">
                    <label class="block text-sm font-medium text-gray-700">Tải lên file Excel (.xlsx)</label>
                    <a href="#" class="text-xs text-blue-600 hover:underline flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:download"></span> Tải file mẫu
                    </a>
                </div>
                <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 flex flex-col justify-center items-center cursor-pointer hover:bg-gray-50 transition-colors bg-gray-50/50">
                    <span class="iconify text-emerald-500 text-5xl mb-2" data-icon="mdi:file-excel-outline"></span>
                    <p class="text-sm text-gray-900 font-medium mb-1">Kéo thả file vào đây hoặc nhấn để chọn</p>
                    <p class="text-xs text-gray-500">Chỉ hỗ trợ file .xlsx, tối đa 5MB</p>
                </div>
            </div>
        </div>

        <div class="p-6 overflow-y-auto custom-scrollbar flex-grow hidden" id="excelStep2">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-3 flex justify-between items-center mb-4">
                <div class="flex items-center gap-2">
                    <span class="iconify text-blue-500 text-xl" data-icon="mdi:information"></span>
                    <span class="text-sm text-blue-800">Tìm thấy <strong class="text-gray-900">12</strong> dòng dữ liệu hợp lệ, <strong class="text-rose-600">2</strong> dòng lỗi.</span>
                </div>
                <button class="text-xs bg-white border border-blue-200 px-2 py-1 rounded text-blue-600 hover:bg-blue-100">Tải file lỗi</button>
            </div>
            
            <div class="border border-gray-200 rounded-lg overflow-hidden">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-200 text-gray-500">
                            <th class="py-2 px-3 font-semibold">SKU</th>
                            <th class="py-2 px-3 font-semibold">Tên SP</th>
                            <th class="py-2 px-3 font-semibold text-center">Số lượng</th>
                            <th class="py-2 px-3 font-semibold text-right">Giá nhập</th>
                            <th class="py-2 px-3 font-semibold">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr>
                            <td class="py-2 px-3">NB-TL-16</td>
                            <td class="py-2 px-3 truncate max-w-[150px]">Vòng Ngọc Bích</td>
                            <td class="py-2 px-3 text-center font-medium">50</td>
                            <td class="py-2 px-3 text-right">350.000</td>
                            <td class="py-2 px-3"><span class="text-emerald-600 font-medium">Hợp lệ</span></td>
                        </tr>
                        <tr class="bg-rose-50/30">
                            <td class="py-2 px-3 text-rose-600 font-medium">SKU-SAI-01</td>
                            <td class="py-2 px-3 truncate max-w-[150px]">Sản phẩm không có</td>
                            <td class="py-2 px-3 text-center font-medium">10</td>
                            <td class="py-2 px-3 text-right text-rose-600">Giá sai</td>
                            <td class="py-2 px-3"><span class="text-rose-600 font-medium">Lỗi SKU/Giá</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3">
            <button onclick="closeModal('modalNhapExcel'); resetExcelModal()" class="px-4 py-2 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">Hủy</button>
            <button id="btnNextExcel" onclick="nextExcelStep()" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-red-900 shadow-sm">Tiếp tục</button>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        const el = document.getElementById(id);
        el.classList.remove('hidden');
        el.classList.add('flex');
    }
    
    function closeModal(id) {
        const el = document.getElementById(id);
        el.classList.add('hidden');
        el.classList.remove('flex');
    }

    // Logic giả lập chuyển bước Modal Excel
    function nextExcelStep() {
        const step1 = document.getElementById('excelStep1');
        const step2 = document.getElementById('excelStep2');
        const btnNext = document.getElementById('btnNextExcel');

        if (!step1.classList.contains('hidden')) {
            // Chuyển sang Step 2
            step1.classList.add('hidden');
            step2.classList.remove('hidden');
            btnNext.innerText = 'Tạo phiếu nhập';
        } else {
            // Xác nhận
            closeModal('modalNhapExcel');
            resetExcelModal();
            if (typeof showToast === 'function') {
                showToast('Đã tạo phiếu nhập kho từ Excel thành công!');
            } else {
                alert('Đã tạo phiếu nhập kho từ Excel thành công!');
            }
        }
    }

    function resetExcelModal() {
        document.getElementById('excelStep1').classList.remove('hidden');
        document.getElementById('excelStep2').classList.add('hidden');
        document.getElementById('btnNextExcel').innerText = 'Tiếp tục';
    }
</script>
