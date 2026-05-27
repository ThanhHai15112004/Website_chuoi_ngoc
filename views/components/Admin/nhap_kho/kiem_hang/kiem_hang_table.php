<?php
// views/components/Admin/nhap_kho/kiem_hang/kiem_hang_table.php
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mb-6">
    
    <!-- Quét mã vạch -->
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50 flex flex-col md:flex-row items-center gap-4">
        <div class="relative w-full md:w-96">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:barcode-scan"></span>
            </div>
            <input type="text" id="barcodeScanner" class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-lg shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm font-medium" placeholder="Quét hoặc nhập SKU / Barcode...">
        </div>
        <label class="flex items-center gap-2 cursor-pointer">
            <input type="checkbox" id="autoIncrement" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" checked>
            <span class="text-sm text-gray-700">Tự động tăng số lượng khi quét</span>
        </label>
    </div>

    <!-- Bảng sản phẩm -->
    <div class="overflow-x-auto w-full">
        <table class="w-full text-left border-collapse min-w-[1200px]">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-200 text-[11px] uppercase text-gray-500 tracking-wider">
                    <th class="py-3 px-4 font-semibold w-16 text-center">Trạng thái</th>
                    <th class="py-3 px-4 font-semibold w-72">Sản phẩm / SKU</th>
                    <th class="py-3 px-4 font-semibold text-center w-24">Dự kiến</th>
                    <th class="py-3 px-4 font-semibold text-center w-32">Thực nhận</th>
                    <th class="py-3 px-4 font-semibold text-center w-24">Hàng lỗi</th>
                    <th class="py-3 px-4 font-semibold w-40">Kết quả</th>
                    <th class="py-3 px-4 font-semibold w-48">Lý do lỗi / Ghi chú</th>
                    <th class="py-3 px-4 font-semibold text-center w-20">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                
                <?php foreach ($danhSachKiem as $sp): ?>
                <tr class="sku-row hover:bg-gray-50 transition-colors <?= $sp['ket_qua'] === 'Có hàng lỗi' || $sp['ket_qua'] === 'Thiếu hàng' ? 'bg-rose-50/20' : '' ?>" data-sku="<?= $sp['sku'] ?>">
                    <!-- Trạng thái -->
                    <td class="py-3 px-4 text-center">
                        <?php if($sp['ket_qua'] === 'Đạt'): ?>
                            <span class="iconify text-2xl text-emerald-500" data-icon="mdi:check-circle"></span>
                        <?php elseif($sp['ket_qua'] === 'Chưa kiểm'): ?>
                            <span class="iconify text-2xl text-gray-300" data-icon="mdi:circle-outline"></span>
                        <?php else: ?>
                            <span class="iconify text-2xl text-rose-500" data-icon="mdi:alert-circle"></span>
                        <?php endif; ?>
                    </td>

                    <!-- Sản phẩm -->
                    <td class="py-3 px-4">
                        <div class="flex items-start gap-3">
                            <img src="<?= $sp['anh'] ?>" class="w-12 h-12 rounded object-cover border border-gray-200" alt="">
                            <div>
                                <div class="font-medium text-gray-900 text-sm"><?= $sp['ten'] ?></div>
                                <div class="text-xs text-gray-500 mt-0.5">SKU: <?= $sp['sku'] ?></div>
                                <div class="text-[11px] text-gray-400 mt-0.5"><?= $sp['bien_the'] ?></div>
                            </div>
                        </div>
                    </td>

                    <!-- Dự kiến -->
                    <td class="py-3 px-4 text-center font-bold text-gray-900 text-sm">
                        <?= $sp['so_luong'] ?>
                    </td>

                    <!-- Thực nhận -->
                    <td class="py-3 px-4">
                        <div class="flex items-center justify-center gap-1">
                            <button class="w-7 h-7 rounded border border-gray-300 flex items-center justify-center text-gray-500 hover:bg-gray-100"><span class="iconify" data-icon="mdi:minus"></span></button>
                            <input type="number" min="0" value="<?= $sp['so_luong_nhan'] ?>" class="qty-received w-14 px-2 py-1 text-center border-gray-300 rounded shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm font-bold <?= $sp['so_luong_nhan'] > 0 ? 'text-[#6B0D18]' : 'text-gray-900' ?>">
                            <button class="w-7 h-7 rounded border border-gray-300 flex items-center justify-center text-gray-500 hover:bg-gray-100"><span class="iconify" data-icon="mdi:plus"></span></button>
                        </div>
                    </td>

                    <!-- Hàng lỗi -->
                    <td class="py-3 px-4 text-center">
                        <input type="number" min="0" value="<?= $sp['loi'] ?>" class="w-14 px-2 py-1 text-center border border-gray-300 rounded shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm font-bold <?= $sp['loi'] > 0 ? 'text-rose-600 border-rose-300 bg-rose-50' : 'text-gray-900' ?>">
                    </td>

                    <!-- Kết quả -->
                    <td class="py-3 px-4">
                        <?php if($sp['ket_qua'] === 'Đạt'): ?>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">Đạt</span>
                        <?php elseif($sp['ket_qua'] === 'Thiếu hàng'): ?>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-orange-50 text-orange-700 border border-orange-200">Thiếu: <?= $sp['thieu'] ?></span>
                        <?php elseif($sp['ket_qua'] === 'Có hàng lỗi'): ?>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold bg-rose-50 text-rose-700 border border-rose-200">Có lỗi: <?= $sp['loi'] ?></span>
                        <?php else: ?>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-medium bg-gray-100 text-gray-600 border border-gray-200">Chưa kiểm</span>
                        <?php endif; ?>
                    </td>

                    <!-- Lý do / Ghi chú -->
                    <td class="py-3 px-4">
                        <?php if($sp['loi'] > 0 || $sp['thieu'] > 0): ?>
                            <select class="block w-full py-1 pl-2 pr-6 text-xs border-gray-300 rounded-md focus:ring-[#6B0D18] focus:border-[#6B0D18] mb-1">
                                <option value="" disabled <?= !isset($sp['ly_do']) ? 'selected' : '' ?>>-- Chọn lý do --</option>
                                <option value="1" <?= isset($sp['ly_do']) && strpos($sp['ly_do'], 'thiếu') !== false ? 'selected' : '' ?>>Nhà cung cấp giao thiếu</option>
                                <option value="2" <?= isset($sp['ly_do']) && strpos($sp['ly_do'], 'nứt') !== false ? 'selected' : '' ?>>Vỡ / nứt mẻ</option>
                                <option value="3">Sai màu / sai mẫu</option>
                                <option value="4">Lý do khác</option>
                            </select>
                            <input type="text" placeholder="Ghi chú thêm..." value="<?= $sp['ghi_chu'] ?? '' ?>" class="block w-full py-1 px-2 text-xs border-gray-300 rounded-md shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18]">
                        <?php else: ?>
                            <input type="text" placeholder="Ghi chú..." class="block w-full py-1.5 px-2 text-xs border-gray-300 rounded-md shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18]">
                        <?php endif; ?>
                    </td>

                    <!-- Thao tác -->
                    <td class="py-3 px-4 text-center">
                        <button onclick="openModal('modalGhiNhanLoi')" class="p-1.5 text-rose-600 hover:bg-rose-50 rounded transition-colors tooltip border border-rose-200 bg-white shadow-sm" title="Ghi nhận lỗi chi tiết">
                            <span class="iconify text-lg" data-icon="mdi:alert-box-outline"></span>
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const barcodeScanner = document.getElementById('barcodeScanner');
    const autoIncrement = document.getElementById('autoIncrement');
    
    if(barcodeScanner) {
        barcodeScanner.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const sku = this.value.trim();
                if (!sku) return;
                
                const row = document.querySelector(`.sku-row[data-sku="${sku}"]`);
                if (row) {
                    if (autoIncrement.checked) {
                        const qtyInput = row.querySelector('.qty-received');
                        if (qtyInput) {
                            qtyInput.value = parseInt(qtyInput.value) + 1;
                            qtyInput.classList.add('text-[#6B0D18]');
                        }
                    }
                    
                    // Hiệu ứng highlight dòng
                    row.classList.add('bg-yellow-50');
                    setTimeout(() => row.classList.remove('bg-yellow-50'), 1500);
                    
                    if (typeof showToast === 'function') {
                        showToast(`Đã ghi nhận SKU: ${sku}`);
                    } else {
                        alert(`Đã ghi nhận SKU: ${sku}`);
                    }
                    
                    this.value = ''; // Reset input
                } else {
                    if (typeof showToast === 'function') {
                        // showToast is configured in admin_nhap_kho, but this is admin_nhap_kho_kiem.
                        // I will assume there's a global showToast or just use alert for mockup if missing.
                        alert(`Không tìm thấy SKU: ${sku} trong phiếu nhập!`);
                    } else {
                        alert(`Không tìm thấy SKU: ${sku} trong phiếu nhập!`);
                    }
                }
            }
        });
    }
});
</script>
