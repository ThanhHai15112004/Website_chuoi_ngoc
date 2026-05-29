<?php
// views/components/Admin/xuat_kho/form/form_receiver.php
?>
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
    function toggleLienKetForm() {
        const loaiSelect = document.getElementById('xk_loai_phieu');
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
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mã đơn hàng liên kết <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="text" id="xk_id_don_hang" class="w-full px-3 py-2 border border-[#6B0D18] rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700" placeholder="Nhập mã đơn hàng...">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lý do xuất</label>
                        <input type="text" id="xk_ly_do" value="Xuất bán hàng" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700" placeholder="Lý do">
                    </div>
                </div>
            `;
        } else if (loai === 'tra_ncc') {
            html = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nhà cung cấp nhận trả <span class="text-red-500">*</span></label>
                        <input type="text" id="xk_id_nha_cung_cap" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700" placeholder="ID/Mã nhà cung cấp">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lý do xuất</label>
                        <input type="text" id="xk_ly_do" value="Trả hàng nhà cung cấp" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700" placeholder="Lý do">
                    </div>
                </div>
            `;
        } else {
            html = `
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Lý do chi tiết <span class="text-red-500">*</span></label>
                        <input type="text" id="xk_ly_do" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700" placeholder="Ghi rõ mục đích xuất kho (Ví dụ: Xuất hàng vỡ do vận chuyển, xuất tặng...)">
                    </div>
                </div>
            `;
        }
        
        content.innerHTML = html;
    }

    document.addEventListener('DOMContentLoaded', function() {
        toggleLienKetForm();
    });
</script>
