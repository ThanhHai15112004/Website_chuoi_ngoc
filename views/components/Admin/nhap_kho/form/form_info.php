<?php
// views/components/Admin/nhap_kho/form/form_info.php
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:information-outline"></span>
            Thông tin phiếu nhập
        </h3>
    </div>
    <div class="p-5">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            <!-- Mã phiếu -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mã phiếu nhập</label>
                <input type="text" id="nk_ma_phieu" class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm font-bold text-[#6B0D18] bg-gray-50" placeholder="Tự động sinh">
                <p class="mt-1 text-[11px] text-gray-500">Để trống để hệ thống tự động sinh mã</p>
            </div>

            <!-- Loại phiếu -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Loại phiếu nhập <span class="text-red-500">*</span></label>
                <select id="nk_loai_phieu" class="block w-full pl-3 pr-10 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-lg shadow-sm">
                    <option value="Nhập hàng từ nhà cung cấp" selected>Nhập hàng từ nhà cung cấp</option>
                    <option value="Nhập trả hàng từ khách">Nhập trả hàng từ khách</option>
                    <option value="Nhập chuyển kho nội bộ">Nhập chuyển kho nội bộ</option>
                    <option value="Nhập điều chỉnh kiểm kê">Nhập điều chỉnh kiểm kê</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>

            <!-- Mức độ ưu tiên -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mức độ ưu tiên</label>
                <select id="nk_muc_do_uu_tien" class="block w-full pl-3 pr-10 py-2 text-sm border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] rounded-lg shadow-sm">
                    <option value="0" selected>Bình thường</option>
                    <option value="1">Gấp</option>
                </select>
            </div>

            <!-- Ngày dự kiến nhận -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Ngày dự kiến nhận hàng</label>
                <input type="date" id="nk_ngay_du_kien" value="<?= date('Y-m-d') ?>" class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
            </div>

        </div>
    </div>
</div>
