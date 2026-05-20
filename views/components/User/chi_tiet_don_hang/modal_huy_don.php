<!-- Cancel Order Modal -->
<div id="cancelModal" class="fixed inset-0 z-50 hidden opacity-0 transition-opacity duration-300 ease-out">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm" onclick="closeCancelModal()"></div>
    
    <!-- Modal Content -->
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-[90%] max-w-md bg-white rounded-2xl shadow-xl overflow-hidden scale-95 transition-transform duration-300 ease-out" id="cancelModalContent">
        
        <form action="<?= APP_URL ?>/chi-tiet-don-hang/huy" method="POST">
            <input type="hidden" name="order_id" value="<?= htmlspecialchars($order['id']) ?>">
            <div class="p-6">
                <div class="flex items-center gap-3 mb-4 text-[#8b0000]">
                    <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <h3 class="text-xl font-bold">Hủy đơn hàng</h3>
                </div>
                
                <p class="text-gray-600 text-sm mb-6">Bạn có chắc chắn muốn hủy đơn hàng <strong><?= htmlspecialchars($order['order_code']) ?></strong>? Sau khi hủy, đơn hàng sẽ không thể khôi phục và tiếp tục xử lý.</p>
                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lý do hủy đơn *</label>
                    <div class="space-y-2">
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer p-2 rounded hover:bg-gray-50">
                            <input type="radio" name="cancel_reason" value="Cập nhật địa chỉ/sđt" class="text-[#8b0000] focus:ring-[#8b0000]" required>
                            Tôi muốn cập nhật địa chỉ/sđt nhận hàng
                        </label>
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer p-2 rounded hover:bg-gray-50">
                            <input type="radio" name="cancel_reason" value="Thay đổi voucher" class="text-[#8b0000] focus:ring-[#8b0000]">
                            Tôi muốn thêm/thay đổi mã Voucher
                        </label>
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer p-2 rounded hover:bg-gray-50">
                            <input type="radio" name="cancel_reason" value="Thay đổi sản phẩm" class="text-[#8b0000] focus:ring-[#8b0000]">
                            Tôi muốn thay đổi sản phẩm
                        </label>
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer p-2 rounded hover:bg-gray-50">
                            <input type="radio" name="cancel_reason" value="Đổi ý, không mua nữa" class="text-[#8b0000] focus:ring-[#8b0000]">
                            Tôi đổi ý, không muốn mua nữa
                        </label>
                        <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer p-2 rounded hover:bg-gray-50" onchange="document.getElementById('other-reason').classList.remove('hidden'); document.getElementById('other-reason').required = true;">
                            <input type="radio" name="cancel_reason" value="Khác" id="radio-other" class="text-[#8b0000] focus:ring-[#8b0000]">
                            Lý do khác
                        </label>
                    </div>
                    <textarea id="other-reason" name="cancel_reason_other" rows="2" class="mt-3 w-full border border-gray-300 rounded-lg p-3 text-sm focus:ring-[#8b0000] focus:border-[#8b0000] hidden" placeholder="Nhập lý do của bạn..."></textarea>
                </div>
                
            </div>
            
            <div class="bg-gray-50 p-4 border-t border-gray-100 flex gap-3 justify-end">
                <button type="button" onclick="closeCancelModal()" class="px-5 py-2.5 text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 rounded-lg text-sm font-medium transition-colors">
                    Giữ lại đơn
                </button>
                <button type="submit" class="px-5 py-2.5 text-white bg-[#8b0000] hover:bg-[#7a0000] rounded-lg text-sm font-medium transition-colors">
                    Xác nhận hủy
                </button>
            </div>
        </form>
        
    </div>
</div>

<script>
    // Copy Order ID logic
    function copyOrderId() {
        const orderId = document.getElementById('order-id').innerText;
        navigator.clipboard.writeText(orderId).then(() => {
            alert('Đã sao chép mã đơn hàng: ' + orderId);
        }).catch(err => {
            console.error('Không thể sao chép', err);
        });
    }

    // Modal logic
    const modal = document.getElementById('cancelModal');
    const modalContent = document.getElementById('cancelModalContent');

    function openCancelModal() {
        const radioBtns = document.querySelectorAll('input[name="cancel_reason"]');
        const otherReasonText = document.getElementById('other-reason');
        const radioOther = document.getElementById('radio-other');
        
        radioBtns.forEach(radio => {
            radio.addEventListener('change', () => {
                if(radioOther.checked) {
                    otherReasonText.classList.remove('hidden');
                    otherReasonText.required = true;
                } else {
                    otherReasonText.classList.add('hidden');
                    otherReasonText.required = false;
                }
            });
        });

        // Show Modal
        modal.classList.remove('hidden');
        void modal.offsetWidth;
        modal.classList.remove('opacity-0');
        modalContent.classList.remove('scale-95');
        modalContent.classList.add('scale-100');
    }

    function closeCancelModal() {
        modal.classList.add('opacity-0');
        modalContent.classList.remove('scale-100');
        modalContent.classList.add('scale-95');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>
