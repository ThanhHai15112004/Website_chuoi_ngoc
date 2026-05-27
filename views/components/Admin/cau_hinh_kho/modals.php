<?php
// views/components/Admin/cau_hinh_kho/modals.php
?>
<!-- Modal Tạm ngừng kho -->
<div id="modalPause" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalPauseContent">
        <div class="p-6">
            <div class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center text-amber-600 mb-4 mx-auto">
                <span class="iconify text-2xl" data-icon="mdi:pause-circle-outline"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-900 text-center mb-2">Tạm ngừng kho này?</h3>
            <p class="text-sm text-gray-500 text-center mb-4">Kho sẽ không được dùng cho nhập, xuất hoặc bán hàng mới, nhưng dữ liệu tồn kho vẫn được giữ lại.</p>
            
            <div class="p-3 bg-rose-50 border border-rose-100 rounded-lg text-xs text-rose-700 mb-6 text-center">
                Kho này hiện còn <span class="font-bold">1.240</span> sản phẩm. Đảm bảo không có đơn hàng đang xử lý trước khi tạm ngừng.
            </div>

            <div class="flex items-center gap-3">
                <button type="button" onclick="closeModal('modalPause')" class="flex-1 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                    Hủy bỏ
                </button>
                <button type="button" class="flex-1 py-2.5 bg-amber-600 text-white rounded-lg hover:bg-amber-700 font-medium transition-colors shadow-sm">
                    Xác nhận tạm ngừng
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ngừng dùng kho (Xóa kho) -->
<div id="modalDelete" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalDeleteContent">
        <div class="p-6">
            <div class="w-12 h-12 rounded-full bg-rose-100 flex items-center justify-center text-rose-600 mb-4 mx-auto">
                <span class="iconify text-2xl" data-icon="mdi:alert-outline"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-900 text-center mb-2">Ngừng dùng kho?</h3>
            <p class="text-sm text-gray-500 text-center mb-4">Kho sẽ được lưu trữ và không thể chọn trong các thao tác mới. Lịch sử tồn kho vẫn được giữ lại.</p>
            
            <div class="p-3 bg-rose-50 border border-rose-100 rounded-lg text-xs text-rose-700 mb-6 text-center font-medium">
                Kho này vẫn còn hàng. Hãy chuyển hàng sang kho khác trước khi ngừng dùng.
            </div>

            <div class="flex flex-col gap-3">
                <button type="button" class="w-full py-2.5 bg-white border border-[#6B0D18] text-[#6B0D18] rounded-lg hover:bg-red-50 font-medium transition-colors">
                    Chuyển hàng sang kho khác
                </button>
                <div class="flex items-center gap-3">
                    <button type="button" onclick="closeModal('modalDelete')" class="flex-1 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                        Hủy bỏ
                    </button>
                    <button type="button" class="flex-1 py-2.5 bg-gray-300 text-white rounded-lg cursor-not-allowed font-medium transition-colors shadow-sm" disabled>
                        Ngừng dùng kho
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Thêm Vị Trí Khu Vực -->
<div id="modalThemViTri" class="fixed inset-0 bg-gray-900/50 z-[60] hidden items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-lg overflow-hidden transform scale-95 opacity-0 transition-all duration-300" id="modalThemViTriContent">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
            <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:plus-box-outline"></span> Thêm vị trí mới
            </h3>
            <button onclick="closeModal('modalThemViTri')" class="p-2 text-gray-400 hover:text-gray-700 hover:bg-gray-200 rounded-full transition-colors focus:outline-none">
                <span class="iconify text-xl" data-icon="mdi:close"></span>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6 space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kho trực thuộc <span class="text-red-500">*</span></label>
                <select class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                    <option>Kho Online</option>
                    <option>Kho Tổng</option>
                </select>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Cấp độ vị trí <span class="text-red-500">*</span></label>
                    <select class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                        <option>Khu vực (Zone)</option>
                        <option>Kệ (Rack)</option>
                        <option>Ngăn (Bin)</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Vị trí cha (Tùy chọn)</label>
                    <select class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm text-gray-500">
                        <option value="">-- Chọn Khu vực cha --</option>
                        <option>Khu A - Vòng ngọc</option>
                        <option>Khu B - Nhẫn</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mã vị trí <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="VD: KV-C">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tên vị trí <span class="text-red-500">*</span></label>
                    <input type="text" class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="VD: Khu C - Hộp quà">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Sức chứa tối đa (Số lượng SP)</label>
                <input type="number" class="w-full px-4 py-2 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="Để trống nếu không giới hạn">
            </div>
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-end gap-3">
            <button type="button" onclick="closeModal('modalThemViTri')" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors text-sm">
                Hủy bỏ
            </button>
            <button type="button" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium transition-colors shadow-sm flex items-center gap-2 text-sm">
                <span class="iconify" data-icon="mdi:check"></span> Thêm vị trí
            </button>
        </div>
    </div>
</div>

<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        const content = document.getElementById(modalId + 'Content');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
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
            modal.classList.remove('flex');
        }, 300);
    }
</script>
