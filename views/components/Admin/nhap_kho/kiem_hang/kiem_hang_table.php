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
        <table class="w-full text-left border-collapse min-w-[1000px]" id="table-kiem-hang">
            <thead>
                <tr class="bg-gray-100 border-b border-gray-200 text-[11px] uppercase text-gray-500 tracking-wider">
                    <th class="py-3 px-4 font-semibold w-72">Sản phẩm / SKU</th>
                    <th class="py-3 px-4 font-semibold text-center w-24">Dự kiến</th>
                    <th class="py-3 px-4 font-semibold text-center w-32">Thực nhận</th>
                    <th class="py-3 px-4 font-semibold text-center w-24">Hàng lỗi</th>
                    <th class="py-3 px-4 font-semibold w-48">Lý do lỗi / Ghi chú</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                
                <?php foreach ($danhSachSP as $sp): ?>
                <tr class="sku-row hover:bg-gray-50 transition-colors" data-id="<?= $sp['id'] ?>" data-sku="<?= $sp['sku'] ?>">
                    <!-- Sản phẩm -->
                    <td class="py-3 px-4">
                        <div class="flex items-start gap-3">
                            <?php if ($sp['image']): ?>
                                <img src="<?= APP_URL ?>/<?= $sp['image'] ?>" class="w-12 h-12 rounded object-cover border border-gray-200" alt="">
                            <?php else: ?>
                                <div class="w-12 h-12 bg-gray-100 rounded border flex items-center justify-center"><span class="iconify text-gray-400" data-icon="mdi:image"></span></div>
                            <?php endif; ?>
                            <div>
                                <div class="font-medium text-gray-900 text-sm"><?= $sp['product_name'] ?></div>
                                <div class="text-xs text-gray-500 mt-0.5">SKU: <?= $sp['sku'] ?></div>
                                <div class="text-[11px] text-gray-400 mt-0.5"><?= $sp['variant_name'] ?></div>
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
                            <input type="number" min="0" value="<?= $sp['so_luong_nhan'] ?? $sp['so_luong'] ?>" class="qty-received w-16 px-2 py-1 text-center border-gray-300 rounded shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm font-bold text-[#6B0D18]">
                        </div>
                    </td>

                    <!-- Hàng lỗi -->
                    <td class="py-3 px-4 text-center">
                        <input type="number" min="0" value="<?= $sp['so_luong_loi'] ?? 0 ?>" class="qty-error w-16 px-2 py-1 text-center border border-gray-300 rounded shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm font-bold">
                    </td>

                    <!-- Lý do / Ghi chú -->
                    <td class="py-3 px-4">
                        <input type="text" placeholder="Ghi chú lỗi nếu có..." value="<?= $sp['loi_thieu_chi_tiet'] ?? '' ?>" class="note-error block w-full py-1.5 px-2 text-xs border-gray-300 rounded-md shadow-sm focus:ring-[#6B0D18] focus:border-[#6B0D18]">
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
                        }
                    }
                    
                    row.classList.add('bg-yellow-50');
                    setTimeout(() => row.classList.remove('bg-yellow-50'), 1500);
                    
                    this.value = ''; // Reset input
                } else {
                    alert(`Không tìm thấy SKU: ${sku} trong phiếu nhập!`);
                }
            }
        });
    }
});
</script>
