<!-- Overlay Modals -->
<div id="modalOverlay" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden z-40 transition-opacity" onclick="closeAllModals()"></div>

<!-- Modal: Cập nhật tồn kho nhanh -->
<div id="updateStockModal" class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full max-w-md bg-white rounded-2xl shadow-2xl hidden z-50 overflow-hidden transform scale-95 opacity-0 transition-all">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
        <h3 class="text-lg font-bold text-gray-900">Cập nhật tồn kho</h3>
        <button onclick="closeModal('updateStockModal')" class="text-gray-400 hover:text-red-600 transition-colors">
            <span class="iconify text-2xl" data-icon="mdi:close"></span>
        </button>
    </div>
    <div class="p-6">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-16 h-16 rounded-xl bg-gray-100 border border-gray-200 flex items-center justify-center shrink-0">
                <span class="iconify text-gray-400 text-3xl" data-icon="mdi:image-outline"></span>
            </div>
            <div>
                <h4 class="font-bold text-gray-900 line-clamp-1">Vòng Ngọc Bích Tài Lộc</h4>
                <div class="text-sm text-gray-500 mt-1">SKU: NB-TL-001 • Size 16cm</div>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tồn kho thực tế (kiểm kê)</label>
                <input type="number" value="25" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-lg font-bold text-gray-900">
                <p class="text-xs text-gray-500 mt-1">Chênh lệch: <span class="font-medium text-gray-900">0</span></p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Lý do điều chỉnh</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 bg-white text-sm">
                    <option>Kiểm kê định kỳ</option>
                    <option>Hàng hỏng / thất thoát</option>
                    <option>Cập nhật sai lệch</option>
                    <option>Khác</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú nội bộ</label>
                <textarea rows="2" placeholder="Ghi chú thêm về việc cập nhật này..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 text-sm"></textarea>
            </div>
        </div>
    </div>
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3">
        <button onclick="closeModal('updateStockModal')" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">Hủy</button>
        <button onclick="closeModal('updateStockModal')" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm">Lưu cập nhật</button>
    </div>
</div>


