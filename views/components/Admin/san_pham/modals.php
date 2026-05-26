<!-- ================= MODALS ================= -->

<!-- Overlay -->
<div id="modalOverlay" class="fixed inset-0 bg-gray-900/40 z-40 hidden backdrop-blur-sm transition-opacity opacity-0" onclick="closeAllModals()"></div>

<!-- Quick View Modal -->
<div id="viewModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-3xl hidden opacity-0 scale-95 transition-all duration-300 max-h-[90vh] flex flex-col overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
        <h3 class="font-bold text-lg text-gray-900 font-luxury">Thông tin sản phẩm</h3>
        <button onclick="closeModal('viewModal')" class="text-gray-400 hover:text-gray-700 bg-gray-100 hover:bg-gray-200 p-1.5 rounded-full transition-colors">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>
    <div class="p-6 overflow-y-auto flex-1">
        <div class="flex flex-col md:flex-row gap-6">
            <div class="w-full md:w-2/5">
                <div class="aspect-square bg-gray-100 rounded-[18px] border border-gray-200 overflow-hidden flex items-center justify-center">
                    <span class="iconify text-6xl text-gray-300" data-icon="mdi:image-outline"></span>
                </div>
            </div>
            <div class="w-full md:w-3/5 space-y-4">
                <div>
                    <h4 class="text-xl font-bold text-gray-900" id="viewModalTitle">Vòng Ngọc Bích Tài Lộc</h4>
                    <p class="text-sm text-gray-500 font-mono mt-1">Mã SP: NB-TL-001</p>
                </div>
                
                <div class="grid grid-cols-2 gap-y-4 gap-x-2 text-sm">
                    <div>
                        <span class="text-gray-500 block mb-1 text-xs">Danh mục</span>
                        <span class="font-medium text-gray-900">Vòng tay phong thủy</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block mb-1 text-xs">Loại đá</span>
                        <span class="font-medium text-gray-900">Ngọc bích</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block mb-1 text-xs">Giá bán</span>
                        <span class="font-bold text-[#6B0D18] text-base">850.000đ</span>
                    </div>
                    <div>
                        <span class="text-gray-500 block mb-1 text-xs">Tồn kho / Đã bán</span>
                        <span class="font-medium text-gray-900">25 / 128</span>
                    </div>
                </div>
                
                <div class="h-px bg-gray-100 w-full my-2"></div>
                
                <div>
                    <span class="text-gray-500 block mb-1 text-xs">Mô tả ngắn</span>
                    <p class="text-gray-700 text-sm">Sản phẩm làm từ ngọc bích tự nhiên nguyên khối, được mài dũa thủ công. Phù hợp cho người mệnh Mộc và Hỏa, mang lại tài lộc, bình an.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-3 bg-gray-50/50">
        <button onclick="closeModal('viewModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-200 bg-gray-100 rounded-xl font-medium text-sm transition-colors">Đóng</button>
        <button class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
            <span class="iconify" data-icon="mdi:pencil"></span> Chỉnh sửa SP
        </button>
    </div>
</div>

<!-- Stock Update Modal -->
<div id="stockModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-sm hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-5">
        <h3 class="font-bold text-lg text-gray-900 mb-1">Cập nhật tồn kho</h3>
        <p class="text-sm text-gray-500" id="stockModalTitle">Vòng Ngọc Bích Tài Lộc</p>
        
        <div class="mt-5 space-y-4">
            <div>
                <label class="block text-xs font-medium text-gray-700 mb-1.5 uppercase tracking-wider">Số lượng thực tế trong kho</label>
                <input type="number" id="stockInput" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:bg-white text-lg font-bold transition-colors" min="0">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-700 mb-1.5 uppercase tracking-wider">Ghi chú (Tùy chọn)</label>
                <input type="text" placeholder="VD: Nhập thêm lô hàng mới" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:bg-white text-sm transition-colors">
            </div>
        </div>
    </div>
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-2 bg-gray-50/50 rounded-b-[24px]">
        <button onclick="closeModal('stockModal')" class="px-4 py-2 text-gray-600 hover:bg-gray-200 bg-gray-100 rounded-lg font-medium text-sm transition-colors">Hủy</button>
        <button onclick="submitStockModal()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm">Lưu cập nhật</button>
    </div>
</div>

<!-- Promo Modal -->
<div id="promoModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-sm hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-5">
        <h3 class="font-bold text-lg text-gray-900 mb-1">Tạo khuyến mãi</h3>
        <p class="text-sm text-gray-500" id="promoModalTitle">Sản phẩm</p>
        
        <div class="mt-5 space-y-4">
            <div>
                <label class="block text-xs font-medium text-gray-700 mb-1.5 uppercase tracking-wider">Mức giảm giá (%)</label>
                <input type="number" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:bg-white text-lg font-bold transition-colors" min="1" max="100" placeholder="VD: 15">
            </div>
            <div>
                <label class="block text-xs font-medium text-gray-700 mb-1.5 uppercase tracking-wider">Thời gian kết thúc</label>
                <input type="date" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:bg-white text-sm transition-colors">
            </div>
        </div>
    </div>
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-2 bg-gray-50/50 rounded-b-[24px]">
        <button onclick="closeModal('promoModal')" class="px-4 py-2 text-gray-600 hover:bg-gray-200 bg-gray-100 rounded-lg font-medium text-sm transition-colors">Hủy</button>
        <button onclick="submitPromoModal()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm">Lưu khuyến mãi</button>
    </div>
</div>

<!-- Tag Modal -->
<div id="tagModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-sm hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-5">
        <h3 class="font-bold text-lg text-gray-900 mb-1">Gắn nhãn sản phẩm</h3>
        <p class="text-sm text-gray-500">Chọn nhãn cho các sản phẩm đã chọn</p>
        
        <div class="mt-5 flex flex-wrap gap-2">
            <label class="cursor-pointer">
                <input type="checkbox" class="peer sr-only">
                <div class="px-3 py-1.5 rounded-lg border border-gray-200 text-sm text-gray-600 peer-checked:bg-[#FAF8F5] peer-checked:text-[#6B0D18] peer-checked:border-[#E4D5C3] peer-checked:font-medium hover:bg-gray-50 transition-colors">Mới</div>
            </label>
            <label class="cursor-pointer">
                <input type="checkbox" class="peer sr-only">
                <div class="px-3 py-1.5 rounded-lg border border-gray-200 text-sm text-gray-600 peer-checked:bg-[#FAF8F5] peer-checked:text-[#6B0D18] peer-checked:border-[#E4D5C3] peer-checked:font-medium hover:bg-gray-50 transition-colors">Bán chạy</div>
            </label>
            <label class="cursor-pointer">
                <input type="checkbox" class="peer sr-only">
                <div class="px-3 py-1.5 rounded-lg border border-gray-200 text-sm text-gray-600 peer-checked:bg-[#FAF8F5] peer-checked:text-[#6B0D18] peer-checked:border-[#E4D5C3] peer-checked:font-medium hover:bg-gray-50 transition-colors">Flash sale</div>
            </label>
            <label class="cursor-pointer">
                <input type="checkbox" class="peer sr-only">
                <div class="px-3 py-1.5 rounded-lg border border-gray-200 text-sm text-gray-600 peer-checked:bg-[#FAF8F5] peer-checked:text-[#6B0D18] peer-checked:border-[#E4D5C3] peer-checked:font-medium hover:bg-gray-50 transition-colors">Cao cấp</div>
            </label>
        </div>
    </div>
    <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-2 bg-gray-50/50 rounded-b-[24px]">
        <button onclick="closeModal('tagModal')" class="px-4 py-2 text-gray-600 hover:bg-gray-200 bg-gray-100 rounded-lg font-medium text-sm transition-colors">Hủy</button>
        <button onclick="submitTagModal()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm">Lưu nhãn</button>
    </div>
</div>

<!-- Hide Modal -->
<div id="hideModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-sm hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-3xl text-gray-600" data-icon="mdi:eye-off-outline"></span>
        </div>
        <h3 class="font-bold text-lg text-gray-900 mb-2">Ẩn sản phẩm khỏi website?</h3>
        <p class="text-sm text-gray-500">Sản phẩm <strong class="text-gray-700" id="hideModalTitle"></strong> sẽ không còn hiển thị ở trang người dùng, nhưng dữ liệu vẫn được lưu trong hệ thống.</p>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('hideModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1">Hủy</button>
        <button onclick="submitHideModal()" class="px-5 py-2.5 bg-gray-800 text-white rounded-xl hover:bg-gray-900 font-medium text-sm transition-colors flex-1 shadow-sm">Xác nhận ẩn</button>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-3xl text-red-500" data-icon="mdi:alert-outline"></span>
        </div>
        <h3 class="font-bold text-lg text-gray-900 mb-2">Xác nhận xóa sản phẩm</h3>
        <p class="text-sm text-gray-500">Bạn có chắc muốn xóa sản phẩm <strong class="text-gray-700" id="deleteModalTitle"></strong> không? Thao tác này không thể hoàn tác.</p>
        
        <div id="deleteWarning" class="mt-4 p-3 bg-orange-50 border border-orange-100 rounded-xl text-left flex gap-3 hidden">
            <span class="iconify text-orange-500 text-xl flex-shrink-0 mt-0.5" data-icon="mdi:information-outline"></span>
            <p class="text-xs text-orange-800">Sản phẩm này đã phát sinh <strong>đơn hàng</strong>. Bạn nên <span class="font-bold">Ẩn sản phẩm</span> thay vì xóa để tránh lỗi dữ liệu thống kê doanh thu.</p>
        </div>
    </div>
    <div class="px-6 pb-6 flex flex-col gap-2">
        <button onclick="closeModal('deleteModal')" class="w-full py-3 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm hidden" id="btnAlternativeHide">
            Ẩn sản phẩm thay thế
        </button>
        <div class="flex items-center gap-2">
            <button onclick="closeModal('deleteModal')" class="flex-1 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors">Hủy</button>
            <button onclick="submitDeleteModal()" class="flex-1 py-2.5 bg-red-100 text-red-700 hover:bg-red-200 rounded-xl font-medium text-sm transition-colors">Vẫn xóa</button>
        </div>
    </div>
</div>
