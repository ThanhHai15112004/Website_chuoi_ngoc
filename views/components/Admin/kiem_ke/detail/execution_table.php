<?php
// views/components/Admin/kiem_ke/detail/execution_table.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50">
        
        <?php if($phieu['trang_thai'] === 'Đang kiểm kê'): ?>
        <!-- Quét Barcode -->
        <div class="flex flex-col md:flex-row gap-4 justify-between items-center mb-4 pb-4 border-b border-gray-200">
            <div class="relative w-full md:w-1/2 lg:w-1/3">
                <input type="text" placeholder="Quét hoặc nhập mã SKU/Barcode..." class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors shadow-inner" autofocus>
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 text-xl" data-icon="mdi:barcode-scan"></span>
            </div>
            <div class="flex items-center gap-3 text-sm">
                <label class="flex items-center gap-2 cursor-pointer text-gray-700">
                    <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20"> Tự động tăng số lượng khi quét
                </label>
            </div>
        </div>
        <?php endif; ?>

        <!-- Bộ lọc bảng -->
        <div class="flex items-center gap-3 overflow-x-auto pb-2 sidebar-scroll">
            <button class="px-3 py-1.5 bg-gray-800 text-white rounded text-xs font-medium whitespace-nowrap">Tất cả (<?= count($chiTiet) ?>)</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 rounded text-xs font-medium whitespace-nowrap">Chưa kiểm (1)</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-emerald-600 hover:bg-emerald-50 rounded text-xs font-medium whitespace-nowrap">Đã khớp (1)</button>
            <button class="px-3 py-1.5 bg-red-50 border border-red-200 text-red-700 rounded text-xs font-bold whitespace-nowrap">Có chênh lệch (2)</button>
        </div>
    </div>

    <!-- Bảng thực hiện kiểm kê -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[1200px]">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                    <th class="py-3 px-4 font-semibold w-12 text-center">STT</th>
                    <th class="py-3 px-4 font-semibold w-16 text-center"><span class="iconify text-lg" data-icon="mdi:check-circle-outline"></span></th>
                    <th class="py-3 px-4 font-semibold">Mã / SKU</th>
                    <th class="py-3 px-4 font-semibold">Sản phẩm</th>
                    <th class="py-3 px-4 font-semibold text-center w-28">Tồn HT</th>
                    <th class="py-3 px-4 font-semibold text-center w-36">Tồn Thực Tế</th>
                    <th class="py-3 px-4 font-semibold text-center w-28">Chênh Lệch</th>
                    <th class="py-3 px-4 font-semibold w-48">Lý do chênh lệch</th>
                    <th class="py-3 px-4 font-semibold">Ghi chú</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php foreach ($chiTiet as $index => $item): ?>
                    <?php 
                        $isChecked = $item['trang_thai_kiem'] !== 'Chưa kiểm';
                        $hasDiff = $item['chenh_lech'] !== 0 && $item['chenh_lech'] !== null;
                        
                        $rowBg = '';
                        if ($item['chenh_lech'] < 0) $rowBg = 'bg-red-50/30';
                        elseif ($item['chenh_lech'] > 0) $rowBg = 'bg-blue-50/30';
                    ?>
                    <tr class="hover:bg-gray-50 transition-colors <?= $rowBg ?>">
                        <td class="py-3 px-4 text-center text-sm text-gray-500"><?= $index + 1 ?></td>
                        
                        <!-- Trạng thái đánh dấu -->
                        <td class="py-3 px-4 text-center status-col">
                            <?php if($isChecked): ?>
                                <span class="iconify text-emerald-500 text-xl" data-icon="mdi:check-circle"></span>
                            <?php else: ?>
                                <span class="iconify text-gray-300 text-xl" data-icon="mdi:circle-outline"></span>
                            <?php endif; ?>
                        </td>

                        <td class="py-3 px-4 font-bold text-gray-700 text-sm"><?= $item['ma_sp'] ?></td>
                        
                        <td class="py-3 px-4">
                            <div class="font-medium text-gray-900 text-sm"><?= $item['ten_sp'] ?></div>
                        </td>

                        <td class="py-3 px-4 text-center">
                            <span class="font-medium text-gray-500" title="Tại thời điểm tạo phiếu"><?= $item['ton_he_thong'] ?></span>
                        </td>

                        <!-- Ô nhập tồn thực tế -->
                        <td class="py-3 px-4 text-center">
                            <?php if($phieu['trang_thai'] === 'Đang kiểm kê'): ?>
                                <input type="number" min="0" value="<?= $item['ton_thuc_te'] ?>" oninput="updateRowCalc(this, <?= $item['ton_he_thong'] ?>)" placeholder="Nhập SL..." class="qty-input w-full max-w-[100px] px-2 py-1.5 border <?= $hasDiff ? ($item['chenh_lech'] < 0 ? 'border-red-300 bg-red-50 text-red-700' : 'border-blue-300 bg-blue-50 text-blue-700') : 'border-gray-300' ?> rounded text-center font-bold text-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors shadow-inner mx-auto">
                            <?php else: ?>
                                <span class="font-bold text-gray-900 text-lg"><?= $item['ton_thuc_te'] ?? '-' ?></span>
                            <?php endif; ?>
                        </td>

                        <!-- Chênh lệch -->
                        <td class="py-3 px-4 text-center diff-col">
                            <?php if ($item['chenh_lech'] === null): ?>
                                <span class="text-gray-400">-</span>
                            <?php elseif ($item['chenh_lech'] < 0): ?>
                                <span class="inline-flex items-center gap-1 font-bold text-red-700 bg-red-100 border border-red-200 px-2.5 py-1 rounded-md text-sm">
                                    <?= $item['chenh_lech'] ?>
                                </span>
                            <?php elseif ($item['chenh_lech'] > 0): ?>
                                <span class="inline-flex items-center gap-1 font-bold text-blue-700 bg-blue-100 border border-blue-200 px-2.5 py-1 rounded-md text-sm">
                                    +<?= $item['chenh_lech'] ?>
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-md text-sm">
                                    Khớp
                                </span>
                            <?php endif; ?>
                        </td>

                        <!-- Lý do -->
                        <td class="py-3 px-4">
                            <?php if($phieu['trang_thai'] === 'Đang kiểm kê'): ?>
                                <select class="reason-select w-full px-2 py-1.5 border <?= $hasDiff && empty($item['ly_do']) ? 'border-amber-400 bg-amber-50' : 'border-transparent bg-transparent hover:border-gray-300' ?> rounded text-sm focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:bg-white" <?= !$hasDiff ? 'disabled' : '' ?>>
                                    <option value="">-- Chọn lý do --</option>
                                    <option value="mat_hang" <?= $item['ly_do'] === 'Mất hàng' ? 'selected' : '' ?>>Mất hàng / Thất lạc</option>
                                    <option value="chua_nhap" <?= $item['ly_do'] === 'Khách trả hàng chưa nhập kho' ? 'selected' : '' ?>>Chưa cập nhật nhập/xuất kho</option>
                                    <option value="nham_bien_the">Nhầm biến thể</option>
                                    <option value="hang_loi">Hàng lỗi / Hỏng</option>
                                    <option value="khac">Lý do khác...</option>
                                </select>
                            <?php else: ?>
                                <span class="text-sm text-gray-700 <?= $hasDiff && empty($item['ly_do']) ? 'text-red-500 font-medium' : '' ?>"><?= $item['ly_do'] ?: ($hasDiff ? 'Chưa chọn lý do' : '-') ?></span>
                            <?php endif; ?>
                        </td>

                        <!-- Ghi chú -->
                        <td class="py-3 px-4">
                            <?php if($phieu['trang_thai'] === 'Đang kiểm kê'): ?>
                                <input type="text" value="<?= $item['ghi_chu'] ?>" placeholder="Ghi chú thêm..." class="w-full px-2 py-1.5 border border-transparent bg-transparent hover:border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:bg-white">
                            <?php else: ?>
                                <span class="text-sm text-gray-500 italic"><?= $item['ghi_chu'] ?: '-' ?></span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function updateRowCalc(input, tonHT) {
    const row = input.closest('tr');
    let val = input.value;
    
    // Nếu rỗng thì coi như chưa nhập (reset)
    if (val === '') {
        // Reset trạng thái
        row.querySelector('.status-col').innerHTML = '<span class="iconify text-gray-300 text-xl" data-icon="mdi:circle-outline"></span>';
        row.querySelector('.diff-col').innerHTML = '<span class="text-gray-400">-</span>';
        
        input.className = "qty-input w-full max-w-[100px] px-2 py-1.5 border border-gray-300 rounded text-center font-bold text-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors shadow-inner mx-auto";
        row.className = "hover:bg-gray-50 transition-colors";
        
        const reasonSelect = row.querySelector('.reason-select');
        if(reasonSelect) {
            reasonSelect.disabled = true;
            reasonSelect.className = "reason-select w-full px-2 py-1.5 border border-transparent bg-transparent hover:border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:bg-white";
        }
        return;
    }
    
    val = parseInt(val);
    if(isNaN(val) || val < 0) {
        val = 0;
        input.value = 0;
    }

    const diff = val - tonHT;

    // Cập nhật icon check
    row.querySelector('.status-col').innerHTML = '<span class="iconify text-emerald-500 text-xl" data-icon="mdi:check-circle"></span>';

    const diffCol = row.querySelector('.diff-col');
    const reasonSelect = row.querySelector('.reason-select');

    if (diff < 0) {
        // Thiếu
        diffCol.innerHTML = `<span class="inline-flex items-center gap-1 font-bold text-red-700 bg-red-100 border border-red-200 px-2.5 py-1 rounded-md text-sm">${diff}</span>`;
        input.className = "qty-input w-full max-w-[100px] px-2 py-1.5 border border-red-300 bg-red-50 text-red-700 rounded text-center font-bold text-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors shadow-inner mx-auto";
        row.className = "hover:bg-gray-50 transition-colors bg-red-50/30";
        if(reasonSelect) {
            reasonSelect.disabled = false;
            if(reasonSelect.value === '') {
                reasonSelect.className = "reason-select w-full px-2 py-1.5 border border-amber-400 bg-amber-50 rounded text-sm focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:bg-white";
            } else {
                reasonSelect.className = "reason-select w-full px-2 py-1.5 border border-transparent bg-transparent hover:border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:bg-white";
            }
        }
    } else if (diff > 0) {
        // Thừa
        diffCol.innerHTML = `<span class="inline-flex items-center gap-1 font-bold text-blue-700 bg-blue-100 border border-blue-200 px-2.5 py-1 rounded-md text-sm">+${diff}</span>`;
        input.className = "qty-input w-full max-w-[100px] px-2 py-1.5 border border-blue-300 bg-blue-50 text-blue-700 rounded text-center font-bold text-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors shadow-inner mx-auto";
        row.className = "hover:bg-gray-50 transition-colors bg-blue-50/30";
        if(reasonSelect) {
            reasonSelect.disabled = false;
            if(reasonSelect.value === '') {
                reasonSelect.className = "reason-select w-full px-2 py-1.5 border border-amber-400 bg-amber-50 rounded text-sm focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:bg-white";
            } else {
                reasonSelect.className = "reason-select w-full px-2 py-1.5 border border-transparent bg-transparent hover:border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:bg-white";
            }
        }
    } else {
        // Khớp
        diffCol.innerHTML = `<span class="inline-flex items-center gap-1 font-bold text-emerald-700 bg-emerald-50 px-2.5 py-1 rounded-md text-sm">Khớp</span>`;
        input.className = "qty-input w-full max-w-[100px] px-2 py-1.5 border border-gray-300 rounded text-center font-bold text-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors shadow-inner mx-auto";
        row.className = "hover:bg-gray-50 transition-colors";
        if(reasonSelect) {
            reasonSelect.disabled = true;
            reasonSelect.value = '';
            reasonSelect.className = "reason-select w-full px-2 py-1.5 border border-transparent bg-transparent hover:border-gray-300 rounded text-sm focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:bg-white";
        }
    }
}
</script>
