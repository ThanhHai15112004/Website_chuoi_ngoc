<?php
// views/components/Admin/kiem_ke/detail/modals.php
?>
<!-- Overlay (ẩn mặc định) -->
<div id="modalOverlay" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-50 hidden transition-opacity"></div>

<!-- Modal 1: Gửi duyệt kết quả (Dành cho người kiểm kê) -->
<div id="modalGuiDuyet" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300">
        <div class="p-6 border-b border-gray-100">
            <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="iconify text-2xl" data-icon="mdi:send-check-outline"></span>
            </div>
            <h3 class="text-xl font-bold text-center text-gray-900 mb-1">Gửi kết quả duyệt?</h3>
            <p class="text-sm text-center text-gray-500">Bạn đã hoàn tất việc kiểm đếm và muốn gửi kết quả cho quản lý.</p>
        </div>
        <div class="p-6 bg-gray-50/50 space-y-3 text-sm">
            <div class="flex justify-between">
                <span class="text-gray-500">Tổng sản phẩm:</span>
                <span class="font-bold text-gray-900">120</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Số lượng Khớp:</span>
                <span class="font-bold text-emerald-600">117</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Chênh lệch thiếu:</span>
                <span class="font-bold text-red-600">2 sản phẩm</span>
            </div>
            <div class="flex justify-between">
                <span class="text-gray-500">Chênh lệch thừa:</span>
                <span class="font-bold text-blue-600">1 sản phẩm</span>
            </div>
        </div>
        <div class="p-6 flex gap-3">
            <button onclick="closeModal('modalGuiDuyet')" class="flex-1 px-4 py-2 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors">Quay lại</button>
            <button onclick="alert('Đã gửi duyệt!'); closeModal('modalGuiDuyet')" class="flex-1 px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors shadow-sm shadow-blue-600/20">Xác nhận gửi</button>
        </div>
    </div>
</div>

<!-- Modal 2: Duyệt & Điều chỉnh kho (Dành cho Quản lý) -->
<div id="modalDuyet" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform scale-95 opacity-0 transition-all duration-300">
        <div class="p-6 border-b border-gray-100 flex items-start gap-4">
            <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-full flex items-center justify-center shrink-0">
                <span class="iconify text-2xl" data-icon="mdi:shield-check-outline"></span>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-900 mb-1">Duyệt & Điều chỉnh tồn kho</h3>
                <p class="text-sm text-gray-500">Thao tác này sẽ thay đổi tồn kho hiện tại của hệ thống để cân bằng với số lượng thực tế kiểm đếm được.</p>
            </div>
        </div>
        
        <div class="p-6">
            <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mb-4">
                <p class="text-sm font-medium text-amber-800 mb-2">Giá trị chênh lệch ước tính:</p>
                <p class="text-2xl font-bold text-red-600">- 4.500.000đ</p>
                <p class="text-xs text-amber-700 mt-1">Lưu ý: Có 2 sản phẩm bị thiếu hụt.</p>
            </div>

            <label class="flex items-start gap-3 p-3 border border-gray-200 rounded-lg cursor-pointer hover:bg-gray-50 transition-colors">
                <input type="checkbox" checked class="mt-0.5 rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20">
                <div>
                    <p class="text-sm font-medium text-gray-900">Tôi xác nhận duyệt kết quả này</p>
                    <p class="text-xs text-gray-500 mt-1">Hệ thống sẽ tự động tạo các phiếu Nhập/Xuất kho tương ứng để bù trừ số chênh lệch.</p>
                </div>
            </label>
        </div>

        <div class="p-4 bg-gray-50 border-t border-gray-100 flex justify-end gap-3">
            <button onclick="closeModal('modalDuyet')" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors">Hủy</button>
            <button onclick="closeModal('modalDuyet')" class="px-5 py-2.5 bg-red-50 border border-red-200 text-red-600 font-medium rounded-lg hover:bg-red-100 transition-colors">Yêu cầu đếm lại</button>
            <button onclick="alert('Đã cập nhật tồn kho hệ thống thành công!'); closeModal('modalDuyet')" class="px-5 py-2.5 bg-[#6B0D18] text-white font-medium rounded-lg hover:bg-red-900 transition-colors shadow-sm shadow-red-900/20">Duyệt & Điều chỉnh kho</button>
        </div>
    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById('modalOverlay').classList.remove('hidden');
        const modal = document.getElementById(id);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        setTimeout(() => {
            modal.firstElementChild.classList.remove('scale-95', 'opacity-0');
            modal.firstElementChild.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        modal.firstElementChild.classList.remove('scale-100', 'opacity-100');
        modal.firstElementChild.classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.getElementById('modalOverlay').classList.add('hidden');
        }, 300);
    }
</script>
