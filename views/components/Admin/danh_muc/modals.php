<!-- Category Modal (Add/Edit) -->
<div id="categoryModal" class="fixed inset-0 z-50 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-gray-900/40 backdrop-blur-sm" onclick="closeModal('categoryModal')"></div>
    <form id="categoryForm" method="POST" action="<?= APP_URL ?>/admin/danh-muc/luu" class="bg-white rounded-2xl shadow-xl w-full max-w-2xl mx-4 relative z-10 scale-95 transition-transform duration-300 flex flex-col max-h-[90vh]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between shrink-0">
            <h3 class="font-bold text-xl text-gray-900" id="categoryModalTitle">Thêm danh mục mới</h3>
            <button type="button" onclick="closeModal('categoryModal')" class="text-gray-400 hover:text-gray-700 transition-colors p-1 rounded-lg hover:bg-gray-100">
                <span class="iconify text-2xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="px-6 py-6 overflow-y-auto">
            <input type="hidden" name="id" id="catId">
            <div id="categoryProductWarning" class="bg-blue-50 border border-blue-100 rounded-xl p-4 flex gap-3 items-start mb-6 hidden">
                <span class="iconify text-blue-500 text-xl shrink-0 mt-0.5" data-icon="mdi:information-outline"></span>
                <div>
                    <p class="text-sm text-blue-800 font-medium">Danh mục này hiện có <span id="categoryProductCount">0</span> sản phẩm.</p>
                    <a href="<?= APP_URL ?>/admin/san-pham" class="text-xs text-blue-600 hover:text-blue-800 underline mt-1 inline-block">Xem sản phẩm thuộc danh mục</a>
                </div>
            </div>

            <div class="space-y-5">
                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Tên danh mục <span class="text-red-500">*</span></label>
                        <input type="text" name="ten_danh_muc" id="catName" placeholder="Ví dụ: Vòng tay phong thủy" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm" required>
                        <p class="text-red-500 text-xs mt-1 hidden" id="catNameError">Vui lòng nhập tên danh mục</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Mã danh mục</label>
                        <input type="text" name="ma_danh_muc" id="catCode" placeholder="Tự động sinh hoặc nhập (VD: DM001)" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Đường dẫn (Slug)</label>
                    <div class="flex items-center gap-2">
                        <span class="text-gray-400 text-sm bg-gray-50 border border-gray-200 px-3 py-2.5 rounded-xl border-r-0 rounded-r-none">/</span>
                        <input type="text" name="slug" id="catSlug" placeholder="vong-tay-phong-thuy" class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl rounded-l-none -ml-2 focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1.5">Mô tả ngắn</label>
                    <textarea name="mo_ta" id="catDesc" rows="2" placeholder="Nhập mô tả ngắn cho danh mục..." class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm resize-none"></textarea>
                </div>

                <div class="grid grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Vị trí hiển thị</label>
                        <div class="space-y-2 mt-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="vi_tri_menu" id="catPosMenu" value="1" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Hiển thị ở Menu chính</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="vi_tri_home" id="catPosHome" value="1" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Hiển thị ở Trang chủ</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="vi_tri_filter" id="catPosFilter" value="1" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Hiển thị trong Bộ lọc SP</span>
                            </label>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Thiết lập khác</label>
                        <div class="space-y-4 mt-2">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-700">Trạng thái</span>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" name="trang_thai" id="catStatus" value="1" class="sr-only peer" checked>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                                    <span class="ml-2 text-xs font-medium text-emerald-600 peer-checked:text-emerald-600 peer-checked:block hidden">Hiển thị</span>
                                    <span class="ml-2 text-xs font-medium text-gray-500 peer-checked:hidden">Đang ẩn</span>
                                </label>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-gray-700">Thứ tự ưu tiên</span>
                                <input type="number" name="thu_tu" id="catOrder" value="1" min="1" class="w-20 px-3 py-1.5 bg-white border border-gray-200 rounded-lg text-center text-sm focus:outline-none focus:border-[#6B0D18]">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-3 shrink-0 bg-gray-50/50 rounded-b-2xl">
            <button type="button" onclick="closeModal('categoryModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-200 bg-white border border-gray-200 rounded-xl font-medium text-sm transition-colors">Hủy</button>
            <button type="submit" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm" id="btnSubmitCategory">Lưu danh mục</button>
        </div>
    </form>
</div>

<!-- Sort Modal -->
<div id="sortModal" class="fixed inset-0 z-50 flex items-center justify-center hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-gray-900/40 backdrop-blur-sm" onclick="closeModal('sortModal')"></div>
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg mx-4 relative z-10 scale-95 transition-transform duration-300 flex flex-col max-h-[80vh]">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between shrink-0">
            <div>
                <h3 class="font-bold text-lg text-gray-900">Sắp xếp thứ tự danh mục</h3>
                <p class="text-xs text-gray-500 mt-0.5">Kéo thả để thay đổi vị trí hiển thị trên menu/trang chủ</p>
            </div>
            <button onclick="closeModal('sortModal')" class="text-gray-400 hover:text-gray-700 transition-colors p-1 rounded-lg hover:bg-gray-100">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>
        <div class="px-6 py-4 overflow-y-auto flex-1 bg-gray-50/50">
            <div class="space-y-2" id="sortableList">
                <!-- Mock draggable items -->
                <div draggable="true" class="sortable-item flex items-center gap-3 p-3 bg-white border border-gray-200 rounded-xl shadow-sm cursor-grab active:cursor-grabbing hover:border-[#6B0D18] transition-colors">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:drag"></span>
                    <div class="w-8 h-8 rounded-lg bg-red-50 text-red-700 flex items-center justify-center font-bold text-xs">VT</div>
                    <span class="font-medium text-sm text-gray-900">Vòng tay phong thủy</span>
                </div>
                <div draggable="true" class="sortable-item flex items-center gap-3 p-3 bg-white border border-gray-200 rounded-xl shadow-sm cursor-grab active:cursor-grabbing hover:border-[#6B0D18] transition-colors">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:drag"></span>
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-xs">CN</div>
                    <span class="font-medium text-sm text-gray-900">Chuỗi ngọc</span>
                </div>
                <div draggable="true" class="sortable-item flex items-center gap-3 p-3 bg-white border border-gray-200 rounded-xl shadow-sm cursor-grab active:cursor-grabbing hover:border-[#6B0D18] transition-colors">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:drag"></span>
                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-700 flex items-center justify-center font-bold text-xs">VĐ</div>
                    <span class="font-medium text-sm text-gray-900">Vòng đá tự nhiên</span>
                </div>
                <div draggable="true" class="sortable-item flex items-center gap-3 p-3 bg-white border border-gray-200 rounded-xl shadow-sm cursor-grab active:cursor-grabbing hover:border-[#6B0D18] transition-colors">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:drag"></span>
                    <div class="w-8 h-8 rounded-lg bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-xs">ND</div>
                    <span class="font-medium text-sm text-gray-900">Nhẫn đá phong thủy</span>
                </div>
            </div>
        </div>
        <div class="px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-3 shrink-0 bg-white rounded-b-2xl">
            <button onclick="closeModal('sortModal')" class="px-5 py-2 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors">Hủy</button>
            <button onclick="submitSort()" class="px-5 py-2 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm">Lưu thứ tự</button>
        </div>
    </div>
</div>

<!-- Hide Category Modal -->
<div id="hideModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-3xl text-gray-600" data-icon="mdi:eye-off-outline"></span>
        </div>
        <h3 class="font-bold text-lg text-gray-900 mb-2">Ẩn danh mục khỏi website?</h3>
        <p class="text-sm text-gray-500 mb-4">Danh mục <strong class="text-gray-700" id="hideModalTitle"></strong> sẽ không còn hiển thị ở trang người dùng.</p>
        <div id="hideModalWarning" class="bg-yellow-50 border border-yellow-100 rounded-xl p-3 text-sm text-yellow-800 text-left hidden">
            Danh mục này hiện có <strong id="hideModalCount">0</strong> sản phẩm. Các sản phẩm này vẫn tồn tại nhưng người dùng có thể khó tìm thấy chúng.
        </div>
    </div>
    <div class="px-6 pb-6 flex items-center justify-center gap-3">
        <button onclick="closeModal('hideModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Hủy</button>
        <button onclick="submitHide()" class="px-5 py-2.5 bg-gray-800 text-white rounded-xl hover:bg-gray-900 font-medium text-sm transition-colors flex-1 shadow-sm">Xác nhận ẩn</button>
    </div>
</div>

<!-- Delete Category Modal -->
<div id="deleteModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 bg-white rounded-[24px] shadow-xl w-full max-w-md hidden opacity-0 scale-95 transition-all duration-300">
    <div class="px-6 py-6 text-center">
        <div class="w-16 h-16 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4">
            <span class="iconify text-3xl text-red-600" data-icon="mdi:trash-can-outline"></span>
        </div>
        <h3 class="font-bold text-lg text-gray-900 mb-2">Xác nhận xóa danh mục</h3>
        <p class="text-sm text-gray-500 mb-4">Bạn có chắc muốn xóa danh mục <strong class="text-gray-700" id="deleteModalTitle"></strong> không? Hành động này không thể hoàn tác.</p>
        
        <div id="deleteModalWarning" class="bg-red-50 border border-red-100 rounded-xl p-3 text-sm text-red-800 text-left hidden">
            <span class="font-semibold block mb-1">CẢNH BÁO!</span>
            Danh mục này đang chứa <strong id="deleteModalCount">0</strong> sản phẩm. Vui lòng chuyển các sản phẩm này sang danh mục khác trước khi xóa, hoặc chọn <strong>"Ẩn danh mục"</strong> để an toàn hơn.
        </div>
    </div>
    <div class="px-6 pb-6 flex flex-col gap-2">
        <div class="flex items-center justify-center gap-3">
            <button onclick="closeModal('deleteModal')" class="px-5 py-2.5 text-gray-600 hover:bg-gray-100 rounded-xl font-medium text-sm transition-colors flex-1 border border-gray-200">Hủy</button>
            <button id="btnConfirmDelete" onclick="submitDelete()" class="px-5 py-2.5 bg-red-600 text-white rounded-xl hover:bg-red-700 font-medium text-sm transition-colors flex-1 shadow-sm">Xóa danh mục</button>
        </div>
        <button onclick="switchToHide()" id="btnSwitchToHide" class="px-5 py-2 text-gray-600 hover:text-gray-900 text-sm font-medium underline mt-2 hidden">
            Chuyển sang Ẩn danh mục thay thế
        </button>
    </div>
</div>

<!-- Toast Container -->
<div id="toastContainer" class="fixed bottom-6 right-6 z-50 flex flex-col gap-3"></div>

