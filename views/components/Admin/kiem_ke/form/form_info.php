<?php
// views/components/Admin/kiem_ke/form/form_info.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50 flex justify-between items-center">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:information-outline"></span> 1. Thông tin phiếu kiểm kê
        </h3>
        <span class="text-sm font-bold text-[#6B0D18]">Mã: KK202600124 (Tự động)</span>
    </div>
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Tên đợt kiểm kê -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Tên đợt kiểm kê <span class="text-red-500">*</span></label>
                <input type="text" placeholder="Ví dụ: Kiểm kê kho tổng tháng 5" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" required>
            </div>

            <!-- Loại kiểm kê -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Loại kiểm kê <span class="text-red-500">*</span></label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                    <option value="toan_kho">Kiểm kê toàn kho</option>
                    <option value="danh_muc">Kiểm kê theo danh mục</option>
                    <option value="san_pham">Kiểm kê theo sản phẩm</option>
                    <option value="loai_da">Kiểm kê theo loại đá</option>
                    <option value="menh">Kiểm kê theo mệnh</option>
                    <option value="dinh_ky">Kiểm kê định kỳ</option>
                </select>
            </div>

            <!-- Phạm vi / Kho kiểm kê -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kho kiểm kê <span class="text-red-500">*</span></label>
                <select id="khoKiemKe" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" required onchange="resetList()">
                    <option value="">-- Chọn kho --</option>
                    <?php foreach ($danhSachKho as $kho): ?>
                        <option value="<?= $kho['id'] ?>"><?= $kho['ten'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Mức độ ưu tiên -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Mức độ ưu tiên</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                    <option value="normal">Bình thường</option>
                    <option value="high">Gấp</option>
                </select>
            </div>

            <!-- Hạn hoàn tất -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Hạn hoàn tất</label>
                <input type="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm text-gray-700">
            </div>

            <!-- Khu vực / Kệ -->
            <div class="md:col-span-3">
                <div class="bg-blue-50 border border-blue-100 p-4 rounded-lg flex items-start gap-3">
                    <span class="iconify text-blue-500 text-xl shrink-0 mt-0.5" data-icon="mdi:information-box-outline"></span>
                    <div>
                        <p class="text-sm text-blue-900 font-medium">Phạm vi kiểm kê</p>
                        <p class="text-xs text-blue-700 mt-1">Vui lòng chọn Kho kiểm kê để hệ thống tải danh sách sản phẩm. Việc kiểm kê toàn kho có thể mất nhiều thời gian, nên chia nhỏ thành từng đợt theo danh mục hoặc vị trí kệ.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
