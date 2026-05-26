<?php
// views/components/Admin/nha_cung_cap/modals.php
?>
<!-- Modal Confirm Delete -->
<div id="modalDelete" class="fixed inset-0 bg-gray-900/50 z-[60] hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalDeleteContent">
        <div class="p-6">
            <div class="w-12 h-12 rounded-full bg-rose-100 flex items-center justify-center text-rose-600 mb-4 mx-auto">
                <span class="iconify text-2xl" data-icon="mdi:alert-outline"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-900 text-center mb-2">Xác nhận xóa nhà cung cấp</h3>
            <p class="text-sm text-gray-500 text-center mb-6">Bạn có chắc chắn muốn xóa nhà cung cấp này? Thao tác này không thể hoàn tác nhưng hệ thống vẫn sẽ giữ lại lịch sử các phiếu nhập trước đó.</p>
            <div class="flex items-center gap-3">
                <button type="button" onclick="closeModal('modalDelete')" class="flex-1 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                    Hủy bỏ
                </button>
                <button type="button" class="flex-1 py-2.5 bg-rose-600 text-white rounded-lg hover:bg-rose-700 font-medium transition-colors shadow-sm">
                    Xóa dữ liệu
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        const content = document.getElementById(modalId + 'Content');
        modal.classList.remove('hidden');
        
        // Trigger animation
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        const content = document.getElementById(modalId + 'Content');
        
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>
