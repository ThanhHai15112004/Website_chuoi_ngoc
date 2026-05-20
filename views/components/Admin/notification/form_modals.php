<!-- Modal Xác nhận gửi -->
<div id="confirmModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[450px] max-w-[90%] transform scale-95 transition-transform duration-300 p-6 flex flex-col">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center shrink-0">
                <span class="iconify text-2xl" data-icon="mdi:send-check-outline"></span>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-800">Xác nhận gửi thông báo?</h3>
            </div>
        </div>
        
        <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 mb-6 text-sm text-gray-600 space-y-2">
            <p>Thông báo này dự kiến sẽ gửi đến <strong class="text-gray-900">Tất cả khách hàng (~2.540 người)</strong>.</p>
            <p>Vui lòng kiểm tra kỹ nội dung, đặc biệt là các mã voucher giảm giá (nếu có) trước khi xác nhận.</p>
            
            <label class="flex items-start gap-2 mt-4 cursor-pointer">
                <input type="checkbox" id="check-confirm" class="text-[#6B0D18] rounded focus:ring-[#6B0D18] mt-0.5" onchange="document.getElementById('btn-final-send').disabled = !this.checked">
                <span class="text-gray-800 font-medium text-sm">Tôi đã kiểm tra kỹ nội dung và người nhận.</span>
            </label>
        </div>
        
        <div class="flex gap-3 justify-end">
            <button onclick="closeConfirmModal()" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Kiểm tra lại</button>
            <button onclick="closeConfirmModal(); alert('Đã gửi thông báo thành công!')" id="btn-final-send" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md disabled:opacity-50 disabled:cursor-not-allowed" disabled>Xác nhận gửi</button>
        </div>
    </div>
</div>
