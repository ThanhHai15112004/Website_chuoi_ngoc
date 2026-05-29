<?php
// views/components/Admin/xuat_kho/form/form_info.php
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:file-document-outline"></span>
            Thông tự chung
        </h3>
    </div>
    <div class="p-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Mã phiếu -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mã phiếu xuất <span class="text-red-500">*</span></label>
                <input type="text" id="xk_ma_phieu" value="XK<?= date('YmdHis') ?>" class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm font-bold text-[#6B0D18] bg-gray-50 cursor-not-allowed" readonly>
                <p class="mt-1 text-[11px] text-gray-500">Hệ thống tự động sinh mã</p>
            </div>

            <!-- Loại xuất -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Loại xuất kho <span class="text-red-500">*</span></label>
                <select id="xk_loai_phieu" onchange="toggleLienKetForm()" class="block w-full pl-3 pr-10 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-lg shadow-sm">
                    <option value="">-- Chọn loại phiếu --</option>
                    <option value="don_hang" selected>Xuất cho đơn hàng</option>
                    <option value="tra_ncc">Xuất trả nhà cung cấp</option>
                    <option value="hang_loi">Xuất hàng lỗi</option>
                    <option value="noi_bo">Xuất nội bộ</option>
                    <option value="khac">Khác</option>
                </select>
            </div>

            <!-- Kho xuất -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kho xuất hàng <span class="text-red-500">*</span></label>
                <select id="xk_kho_xuat" class="block w-full pl-3 pr-10 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-lg shadow-sm">
                    <option value="">-- Chọn kho xuất --</option>
                    <option value="online">Kho online</option>
                    <option value="tong">Kho tổng</option>
                    <option value="cuahang">Kho cửa hàng</option>
                </select>
            </div>
            
            <!-- Ngày dự kiến xuất -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ngày dự kiến xuất</label>
                <input type="datetime-local" id="xk_ngay_du_kien" class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm text-gray-700">
            </div>

            <!-- Mức độ ưu tiên -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mức độ ưu tiên</label>
                <select id="xk_muc_do_uu_tien" class="block w-full pl-3 pr-10 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-lg shadow-sm">
                    <option value="0" selected>Bình thường</option>
                    <option value="1">Gấp</option>
                </select>
            </div>

            <!-- Người duyệt dự kiến -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Người duyệt dự kiến</label>
                <select id="xk_nguoi_duyet" class="block w-full pl-3 pr-10 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-lg shadow-sm bg-gray-50">
                    <option>Thanh Admin (Quản lý cấp cao)</option>
                </select>
            </div>

        </div>
    </div>
</div>
