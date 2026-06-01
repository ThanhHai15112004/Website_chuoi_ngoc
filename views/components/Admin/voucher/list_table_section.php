    <!-- Action Bar & Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Bulk Actions -->
        <div class="p-3 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
            <span class="text-sm text-gray-500 px-2 border-r border-gray-300">Đã chọn: <strong class="text-gray-800" id="selected-count">0</strong></span>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-emerald-600 rounded-md hover:bg-emerald-50 hover:border-emerald-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Bật</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-amber-600 rounded-md hover:bg-amber-50 hover:border-amber-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Tắt</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-md hover:bg-red-50 hover:border-red-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Xóa</button>
        </div>

        <!-- Table Responsive Container -->
        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold sticky top-0 z-10">
                    <tr>
                        <th class="px-4 py-3 w-10">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </th>
                        <th class="px-4 py-3">Mã & Chương trình</th>
                        <th class="px-4 py-3">Mức giảm & Loại</th>
                        <th class="px-4 py-3">Điều kiện & Đối tượng</th>
                        <th class="px-4 py-3">Thời gian</th>
                        <th class="px-4 py-3">Sử dụng</th>
                        <th class="px-4 py-3">Trạng thái</th>
                        <th class="px-4 py-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($voucher_list as $voucher): ?>
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1.5">
                                <div class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded border border-dashed border-[#6B0D18]/50 bg-red-50 w-max group/code cursor-pointer relative" onclick="copyCode('<?= $voucher['ma_voucher'] ?>')">
                                    <span class="font-bold text-[#6B0D18] tracking-wider"><?= $voucher['ma_voucher'] ?></span>
                                    <span class="iconify text-[#6B0D18]/60 group-hover/code:text-[#6B0D18]" data-icon="mdi:content-copy"></span>
                                    <div class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-[10px] px-2 py-1 rounded opacity-0 transition-opacity pointer-events-none" id="tooltip-<?= $voucher['ma_voucher'] ?>">Đã copy</div>
                                </div>
                                <div class="font-medium text-gray-800 whitespace-normal line-clamp-1 max-w-[250px]" title="<?= $voucher['ten_chuong_trinh'] ?>"><?= $voucher['ten_chuong_trinh'] ?></div>
                                <div class="text-xs text-gray-500 whitespace-normal line-clamp-1 max-w-[250px]" title="<?= $voucher['mo_ta'] ?>"><?= $voucher['mo_ta'] ?></div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1">
                                <div class="font-bold text-[#6B0D18] text-base"><?= $voucher['gia_tri_giam'] ?></div>
                                <?php if (!empty($voucher['giam_toi_da_str'])): ?>
                                    <div class="text-xs text-gray-500"><?= $voucher['giam_toi_da_str'] ?></div>
                                <?php endif; ?>
                                <div>
                                    <?php
                                        $loai_bg = 'bg-gray-100 text-gray-600';
                                        if ($voucher['loai_giam_str'] === 'Giảm phần trăm') $loai_bg = 'bg-rose-50 text-rose-700';
                                        if ($voucher['loai_giam_str'] === 'Giảm số tiền') $loai_bg = 'bg-amber-50 text-amber-700';
                                        if ($voucher['loai_giam_str'] === 'Freeship') $loai_bg = 'bg-teal-50 text-teal-700';
                                        if ($voucher['loai_giam_str'] === 'Quà tặng') $loai_bg = 'bg-purple-50 text-purple-700';
                                    ?>
                                    <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-medium <?= $loai_bg ?>"><?= $voucher['loai_giam_str'] ?></span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1.5">
                                <div class="text-sm font-medium text-gray-700 flex items-center gap-1">
                                    <span class="iconify text-gray-400 text-xs" data-icon="mdi:cart-outline"></span>
                                    <?= $voucher['dieu_kien'] ?>
                                </div>
                                <div class="flex flex-wrap gap-1">
                                    <?php foreach ($voucher['doi_tuong_arr'] as $dt): ?>
                                        <?php
                                            $dt_bg = 'bg-gray-100 text-gray-600 border border-gray-200';
                                            if ($dt === 'Gold') $dt_bg = 'bg-yellow-50 border-yellow-200 text-yellow-700';
                                            if ($dt === 'Diamond') $dt_bg = 'bg-red-50 border-red-200 text-[#6B0D18]';
                                            if ($dt === 'Silver') $dt_bg = 'bg-slate-50 border-slate-200 text-slate-600';
                                            if ($dt === 'Khách hàng mới') $dt_bg = 'bg-emerald-50 border-emerald-200 text-emerald-700';
                                        ?>
                                        <span class="inline-flex px-1.5 py-0.5 rounded text-[10px] font-medium <?= $dt_bg ?>"><?= $dt ?></span>
                                    <?php endforeach; ?>
                                </div>
                                <a href="#" class="text-xs text-blue-600 hover:underline mt-0.5 inline-block">Xem chi tiết ĐK</a>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1">
                                <div class="text-xs text-gray-600"><?= $voucher['ngay_bat_dau_str'] ?> - <?= $voucher['ngay_ket_thuc_str'] ?></div>
                                <?php
                                    $time_color = 'text-gray-500';
                                    if (strpos($voucher['trang_thai_thoi_gian'], 'Còn') !== false) $time_color = 'text-emerald-600 font-medium';
                                    if (strpos($voucher['trang_thai_thoi_gian'], 'Sắp hết hạn') !== false || strpos($voucher['trang_thai_thoi_gian'], 'Hết hạn sau') !== false) $time_color = 'text-amber-600 font-bold';
                                    if (strpos($voucher['trang_thai_thoi_gian'], 'Đã qua') !== false) $time_color = 'text-gray-400';
                                    if (strpos($voucher['trang_thai_thoi_gian'], 'Bắt đầu sau') !== false) $time_color = 'text-blue-500';
                                    if (strpos($voucher['trang_thai_thoi_gian'], 'Đã tắt') !== false) $time_color = 'text-gray-400';
                                ?>
                                <div class="text-[11px] <?= $time_color ?>"><?= $voucher['trang_thai_thoi_gian'] ?></div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-1.5 w-32">
                                <?php
                                    $luot = $voucher['so_luong'] == -1 ? '∞' : $voucher['so_luong'];
                                    $percent = 0;
                                    if ($voucher['so_luong'] > 0) {
                                        $percent = min(100, round(($voucher['da_dung'] / $voucher['so_luong']) * 100));
                                    }
                                    
                                    $progress_color = 'bg-[#6B0D18]';
                                    if ($percent > 80) $progress_color = 'bg-amber-500';
                                    if ($percent >= 100) $progress_color = 'bg-red-500';
                                    if ($voucher['so_luong'] == -1) {
                                        $percent = 100;
                                        $progress_color = 'bg-emerald-500';
                                    }
                                ?>
                                <div class="text-sm font-medium text-gray-800">
                                    <?= number_format($voucher['da_dung']) ?> / <span class="text-gray-500 text-xs font-normal"><?= $luot ?></span>
                                </div>
                                <?php if ($voucher['so_luong'] != -1): ?>
                                <div class="w-full bg-gray-100 rounded-full h-1.5">
                                    <div class="<?= $progress_color ?> h-1.5 rounded-full" style="width: <?= $percent ?>%"></div>
                                </div>
                                <div class="text-[10px] text-gray-500 text-right"><?= $percent ?>%</div>
                                <?php else: ?>
                                <span class="text-[10px] text-gray-400 border border-gray-200 px-1.5 py-0.5 rounded bg-gray-50 w-max">Không giới hạn</span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <?php
                                $status_classes = 'bg-emerald-50 text-emerald-700 border border-emerald-200'; // Đang hoạt động
                                if ($voucher['trang_thai_str'] === 'Sắp hết hạn') $status_classes = 'bg-amber-50 text-amber-700 border border-amber-200';
                                if ($voucher['trang_thai_str'] === 'Hết hạn' || $voucher['trang_thai_str'] === 'Đã tắt') $status_classes = 'bg-gray-100 text-gray-600 border border-gray-200';
                                if ($voucher['trang_thai_str'] === 'Chưa bắt đầu') $status_classes = 'bg-blue-50 text-blue-700 border border-blue-200';
                                if ($voucher['trang_thai_str'] === 'Hết lượt dùng') $status_classes = 'bg-red-50 text-red-700 border border-red-200';
                            ?>
                            <span class="inline-flex px-2 py-1 rounded-md text-xs font-medium <?= $status_classes ?>">
                                <?= $voucher['trang_thai_str'] ?>
                            </span>
                            
                            <?php if ($voucher['trang_thai'] == 1): ?>
                                <div class="mt-2 flex items-center w-max cursor-pointer toggle-switch" onclick="toggleVoucherStatus('<?= $voucher['id'] ?>', 0)">
                                    <div class="relative inline-flex h-5 w-9 shrink-0 rounded-full transition-colors duration-200 ease-in-out bg-[#6B0D18]">
                                        <div class="absolute left-0.5 top-0.5 h-4 w-4 rounded-full bg-white transition-transform duration-200 ease-in-out translate-x-4 shadow"></div>
                                    </div>
                                </div>
                            <?php else: ?>
                                <div class="mt-2 flex items-center w-max cursor-pointer toggle-switch" onclick="toggleVoucherStatus('<?= $voucher['id'] ?>', 1)">
                                    <div class="relative inline-flex h-5 w-9 shrink-0 rounded-full transition-colors duration-200 ease-in-out bg-gray-300">
                                        <div class="absolute left-0.5 top-0.5 h-4 w-4 rounded-full bg-white transition-transform duration-200 ease-in-out translate-x-0 shadow"></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <a href="<?= APP_URL ?>/admin/voucher/sua/<?= $voucher['id'] ?>" class="p-1.5 text-gray-500 hover:text-[#6B0D18] hover:bg-red-50 rounded transition-colors" title="Sửa">
                                    <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                </a>
                                <div class="relative inline-block text-left menu-dropdown-container">
                                    <button class="p-1.5 text-gray-500 hover:bg-gray-100 rounded transition-colors" onclick="toggleDropdown(this)">
                                        <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                    </button>
                                    <div class="absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg border border-gray-100 hidden z-20 dropdown-menu">
                                        <div class="py-1">
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="openDetailsModal('<?= $voucher['ma_voucher'] ?>')"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết</a>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="duplicateVoucher('<?= $voucher['ma_voucher'] ?>', this)"><span class="iconify text-gray-400" data-icon="mdi:content-copy"></span> Nhân bản</a>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="openHistoryModal('<?= $voucher['ma_voucher'] ?>')"><span class="iconify text-gray-400" data-icon="mdi:receipt-text-outline"></span> Lịch sử sử dụng</a>
                                            <hr class="my-1 border-gray-100">
                                            <?php if ($voucher['trang_thai'] == 0): ?>
                                                <a href="#" class="action-toggle-btn flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50" onclick="toggleVoucherStatus('<?= $voucher['id'] ?>', 1)"><span class="iconify" data-icon="mdi:play-circle-outline"></span> <span>Bật lại</span></a>
                                            <?php else: ?>
                                                <a href="#" class="action-toggle-btn flex items-center gap-2 px-4 py-2 text-sm text-amber-600 hover:bg-amber-50" onclick="toggleVoucherStatus('<?= $voucher['id'] ?>', 0)"><span class="iconify" data-icon="mdi:pause-circle-outline"></span> <span>Tạm tắt</span></a>
                                            <?php endif; ?>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50" onclick="confirmDeleteVoucher('<?= $voucher['id'] ?>', '<?= $voucher['ma_voucher'] ?>', <?= $voucher['da_dung'] ?>, this)"><span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa voucher</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-white">
            <div class="text-sm text-gray-500">
                Hiển thị <span class="font-medium text-gray-800"><?= min(($pagination['current'] - 1) * $pagination['limit'] + 1, $pagination['total_records']) ?></span> - 
                <span class="font-medium text-gray-800"><?= min($pagination['current'] * $pagination['limit'], $pagination['total_records']) ?></span> 
                trong <span class="font-medium text-gray-800"><?= $pagination['total_records'] ?></span> voucher
            </div>
            <div class="flex items-center gap-1">
                <?php if($pagination['current'] > 1): ?>
                <a href="?page=<?= $pagination['current'] - 1 ?>" class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-left"></span></a>
                <?php else: ?>
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 opacity-50 cursor-not-allowed" disabled><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <?php endif; ?>

                <?php for($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                    <?php if($i == $pagination['current']): ?>
                        <button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-md text-sm font-medium shadow-sm"><?= $i ?></button>
                    <?php else: ?>
                        <a href="?page=<?= $i ?>" class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if($pagination['current'] < $pagination['total_pages']): ?>
                <a href="?page=<?= $pagination['current'] + 1 ?>" class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></a>
                <?php else: ?>
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 opacity-50 cursor-not-allowed" disabled><span class="iconify" data-icon="mdi:chevron-right"></span></button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

