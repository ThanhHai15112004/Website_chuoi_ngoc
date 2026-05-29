<!-- Overlay Modals -->
<div id="modalOverlay" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden z-40 transition-opacity" onclick="closeAdjustmentModal()"></div>

<!-- Adjustment Modal -->
<div id="adjustmentModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 sm:p-0 pointer-events-none">
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden pointer-events-auto transform transition-all translate-y-4 opacity-0" id="adjustmentModalContent">
        <form method="POST" action="<?= APP_URL ?>/admin/ton-kho/dieu-chinh">
            <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
                <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                    <span class="iconify text-purple-600" data-icon="mdi:tune"></span>
                    Điều chỉnh sai lệch kho
                </h3>
                <button type="button" onclick="closeAdjustmentModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <span class="iconify text-xl" data-icon="mdi:close"></span>
                </button>
            </div>
            
            <div class="p-6 space-y-4">
                <input type="hidden" name="variant_id" id="adj_variant_id">
                <input type="hidden" name="current_stock" id="adj_current_stock_input_hidden">
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Sản phẩm</label>
                    <div class="px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm text-gray-600 font-medium" id="adj_product_name">
                        Tên sản phẩm
                    </div>
                </div>
                
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tồn kho hiện tại</label>
                        <div class="px-3 py-2 bg-gray-50 border border-gray-200 rounded-lg text-sm font-bold text-gray-900" id="adj_current_stock">
                            0
                        </div>
                        <input type="hidden" id="adj_current_stock_input" value="0">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tồn kho thực tế <span class="text-red-500">*</span></label>
                        <input type="number" name="actual_stock" id="adj_actual_stock" required min="0" oninput="calculateDifference()" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-900/20 focus:border-purple-900 bg-white">
                    </div>
                </div>
                
                <div>
                    <div class="text-sm flex items-center justify-between mb-2">
                        <span class="text-gray-600">Mức chênh lệch:</span>
                        <span id="adj_difference" class="font-bold text-gray-900">0</span>
                    </div>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lý do điều chỉnh <span class="text-red-500">*</span></label>
                    <textarea name="note" required rows="2" placeholder="Ví dụ: Hàng bị hư hỏng, hao hụt, kiểm kê định kỳ..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-purple-900/20 focus:border-purple-900 bg-white resize-none"></textarea>
                </div>
            </div>
            
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex items-center justify-end gap-3">
                <button type="button" onclick="closeAdjustmentModal()" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    Hủy bỏ
                </button>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-purple-600 border border-transparent rounded-lg hover:bg-purple-700 transition-colors shadow-sm">
                    Xác nhận điều chỉnh
                </button>
            </div>
        </form>
    </div>
</div>

<script>
function openAdjustmentModal(variantId, productName, currentStock) {
    document.getElementById('adj_variant_id').value = variantId;
    document.getElementById('adj_product_name').textContent = productName;
    document.getElementById('adj_current_stock').textContent = currentStock;
    document.getElementById('adj_current_stock_input').value = currentStock;
    document.getElementById('adj_current_stock_input_hidden').value = currentStock;
    document.getElementById('adj_actual_stock').value = currentStock;
    
    calculateDifference();
    
    const overlay = document.getElementById('modalOverlay');
    const modal = document.getElementById('adjustmentModal');
    const content = document.getElementById('adjustmentModalContent');
    
    overlay.classList.remove('hidden');
    modal.classList.remove('hidden');
    
    // Trigger animation
    setTimeout(() => {
        content.classList.remove('translate-y-4', 'opacity-0');
    }, 10);
}

function closeAdjustmentModal() {
    const overlay = document.getElementById('modalOverlay');
    const modal = document.getElementById('adjustmentModal');
    const content = document.getElementById('adjustmentModalContent');
    
    content.classList.add('translate-y-4', 'opacity-0');
    
    setTimeout(() => {
        overlay.classList.add('hidden');
        modal.classList.add('hidden');
    }, 300);
}

function calculateDifference() {
    const current = parseInt(document.getElementById('adj_current_stock_input').value) || 0;
    const actual = parseInt(document.getElementById('adj_actual_stock').value) || 0;
    const diff = actual - current;
    
    const diffEl = document.getElementById('adj_difference');
    
    if (diff > 0) {
        diffEl.innerHTML = `<span class="text-emerald-600">+${diff}</span> (Nhập thêm)`;
    } else if (diff < 0) {
        diffEl.innerHTML = `<span class="text-red-600">${diff}</span> (Xuất đi)`;
    } else {
        diffEl.innerHTML = `<span class="text-gray-500">0</span> (Khớp)`;
    }
}
</script>
