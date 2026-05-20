<div class="flex flex-col sm:flex-row justify-end gap-3 mt-4 pt-6 border-t border-gray-200">
    <button type="button" class="w-full sm:w-auto px-6 py-3 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 rounded-lg font-medium transition-colors text-center order-2 sm:order-1">
        <i class="fas fa-headset mr-2"></i>Liên hệ hỗ trợ
    </button>
    <?php if(in_array($order['status'], ['pending', 'confirmed'])): ?>
    <button type="button" onclick="openCancelModal()" class="w-full sm:w-auto px-6 py-3 border border-[#8b0000] text-[#8b0000] hover:bg-red-50 rounded-lg font-medium transition-colors text-center order-1 sm:order-2">
        Hủy đơn hàng
    </button>
    <?php endif; ?>
</div>
