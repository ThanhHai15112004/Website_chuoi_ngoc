<?php
// views/components/Admin/nhap_kho/form/form_supplier.php
?>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Cột Nhà cung cấp -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
            <h3 class="font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-gray-500" data-icon="mdi:truck-outline"></span>
                Nhà cung cấp
            </h3>
        </div>
        <div class="p-5 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nhà cung cấp <span class="text-red-500">*</span></label>
                <select id="nk_id_nha_cung_cap" class="block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
                    <option value="">-- Chọn nhà cung cấp --</option>
                    <?php foreach ($nhaCungCapList ?? [] as $ncc): ?>
                        <option value="<?= htmlspecialchars($ncc['id']) ?>"><?= htmlspecialchars($ncc['ten_ncc']) ?> (<?= htmlspecialchars($ncc['ma_ncc']) ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kho nhập <span class="text-red-500">*</span></label>
                <select id="nk_id_kho" class="block w-full py-2 px-3 border border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm">
                    <option value="">-- Chọn kho nhập --</option>
                    <?php foreach ($danhSachKho ?? [] as $kho): ?>
                        <option value="<?= htmlspecialchars($kho['id']) ?>" <?= $kho['mac_dinh'] ? 'selected' : '' ?>><?= htmlspecialchars($kho['ten_kho']) ?> (<?= htmlspecialchars($kho['ma_kho']) ?>)<?= $kho['mac_dinh'] ? ' ★' : '' ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <!-- Cột Ghi chú & Đính kèm (Thay thế Kho nhập) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
            <h3 class="font-bold text-gray-900 flex items-center gap-2">
                <span class="iconify text-gray-500" data-icon="mdi:note-text-outline"></span>
                Ghi chú phiếu nhập
            </h3>
        </div>
        <div class="p-5">
            <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú / Lý do</label>
            <textarea id="nk_ghi_chu" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm" rows="2" placeholder="Nhập ghi chú cho phiếu nhập..."></textarea>
        </div>
    </div>
</div>
