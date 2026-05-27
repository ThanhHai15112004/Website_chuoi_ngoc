<?php
// views/components/Admin/xuat_kho/form/form_receiver.php
?>
<!-- Đối tượng nhận / Liên kết (Hiển thị động dựa theo loại xuất) -->
<div id="lienKetBlock" class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6 hidden">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:link-variant"></span>
            Đối tượng nhận / Liên kết
        </h3>
    </div>
    <div class="p-5" id="lienKetContent">
        <!-- Nội dung render qua JS tùy theo Loại xuất -->
    </div>
</div>

<script>
    // Mock logic cho phần Đối tượng nhận động
    function toggleLienKetForm() {
        const loaiSelect = document.getElementById('loaiXuatSelect');
        const block = document.getElementById('lienKetBlock');
        const content = document.getElementById('lienKetContent');
        
        if (!loaiSelect) return;
        
        const loai = loaiSelect.value;
        
        if (!loai) {
            block.classList.add('hidden');
            return;
        }
        
        block.classList.remove('hidden');
        
        let html = '';
        if (loai === 'don_hang') {
            html = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tìm và liên kết đơn hàng <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="text" class="w-full px-3 py-2 border border-[#6B0D18] rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700" placeholder="Nhập mã đơn hàng hoặc số điện thoại...">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-2">
                                <button type="button" class="px-3 py-1 bg-red-50 text-[#6B0D18] rounded font-medium text-xs hover:bg-red-100 border border-red-100 transition-colors">Lấy SP</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-blue-50/50 border border-blue-100 rounded-lg p-3">
                        <div class="text-xs text-gray-500 uppercase tracking-wide font-bold mb-1">Thông tin giao hàng</div>
                        <div class="font-bold text-gray-900 text-sm">Chưa chọn đơn hàng</div>
                        <div class="text-xs text-gray-500 mt-0.5">Vui lòng nhập mã đơn để lấy thông tin.</div>
                    </div>
                </div>
            `;
        } else if (loai === 'tra_ncc') {
            html = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nhà cung cấp nhận trả <span class="text-red-500">*</span></label>
                        <select class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700">
                            <option>-- Chọn nhà cung cấp --</option>
                            <option>Công ty Ngọc An Phát</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phiếu nhập liên quan (Nếu có)</label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700" placeholder="Nhập mã phiếu nhập (VD: PN2026...)">
                    </div>
                </div>
            `;
        } else if (loai === 'hang_loi' || loai === 'noi_bo' || loai === 'dieu_chinh') {
            html = `
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lý do chi tiết <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700" placeholder="Ghi rõ mục đích xuất kho (Ví dụ: Xuất hàng vỡ do vận chuyển...)">
                    </div>
                </div>
            `;
        } else {
            html = `
                <div class="p-4 bg-gray-50 rounded-lg text-sm text-gray-500 italic text-center">
                    Không có thông tin liên kết bắt buộc cho loại xuất này.
                </div>
            `;
        }
        
        content.innerHTML = html;
    }

    // Khởi tạo trạng thái mặc định nếu cần
    document.addEventListener('DOMContentLoaded', function() {
        toggleLienKetForm();
    });
</script>
