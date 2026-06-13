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
                                <?php if (isset($voucher['giam_toi_da'])): ?>
                                    <div class="text-xs text-gray-500"><?= $voucher['giam_toi_da'] ?></div>
                                <?php endif; ?>
                                <div>
                                    <?php
                                        $loai_bg = 'bg-gray-100 text-gray-600';
                                        if ($voucher['loai_giam'] === 'Giảm phần trăm') $loai_bg = 'bg-rose-50 text-rose-700';
                                        if ($voucher['loai_giam'] === 'Giảm số tiền') $loai_bg = 'bg-amber-50 text-amber-700';
                                        if ($voucher['loai_giam'] === 'Freeship') $loai_bg = 'bg-teal-50 text-teal-700';
                                        if ($voucher['loai_giam'] === 'Quà tặng') $loai_bg = 'bg-purple-50 text-purple-700';
                                        if ($voucher['loai_giam'] === 'Ưu đãi thành viên') $loai_bg = 'bg-yellow-50 text-yellow-700';
                                    ?>
                                    <span class="inline-flex px-2 py-0.5 rounded text-[10px] font-medium <?= $loai_bg ?>"><?= $voucher['loai_giam'] ?></span>
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
                                    <?php foreach ($voucher['doi_tuong'] as $dt): ?>
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
                                <div class="text-xs text-gray-600"><?= $voucher['ngay_bat_dau'] ?> - <?= $voucher['ngay_ket_thuc'] ?></div>
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
                                    $luot = $voucher['tong_luot'] == -1 ? '∞' : $voucher['tong_luot'];
                                    $percent = 0;
                                    if ($voucher['tong_luot'] > 0) {
                                        $percent = min(100, round(($voucher['da_dung'] / $voucher['tong_luot']) * 100));
                                    }
                                    
                                    $progress_color = 'bg-[#6B0D18]';
                                    if ($percent > 80) $progress_color = 'bg-amber-500';
                                    if ($percent >= 100) $progress_color = 'bg-red-500';
                                    if ($voucher['tong_luot'] == -1) {
                                        $percent = 100;
                                        $progress_color = 'bg-emerald-500';
                                    }
                                ?>
                                <div class="text-sm font-medium text-gray-800">
                                    <?= number_format($voucher['da_dung']) ?> / <span class="text-gray-500 text-xs font-normal"><?= $luot ?></span>
                                </div>
                                <?php if ($voucher['tong_luot'] != -1): ?>
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
                                if ($voucher['trang_thai'] === 'Sắp hết hạn') $status_classes = 'bg-amber-50 text-amber-700 border border-amber-200';
                                if ($voucher['trang_thai'] === 'Hết hạn' || $voucher['trang_thai'] === 'Đã tắt') $status_classes = 'bg-gray-100 text-gray-600 border border-gray-200';
                                if ($voucher['trang_thai'] === 'Chưa bắt đầu') $status_classes = 'bg-blue-50 text-blue-700 border border-blue-200';
                                if ($voucher['trang_thai'] === 'Hết lượt dùng') $status_classes = 'bg-red-50 text-red-700 border border-red-200';
                            ?>
                            <span class="inline-flex px-2 py-1 rounded-md text-xs font-medium <?= $status_classes ?>">
                                <?= $voucher['trang_thai'] ?>
                            </span>
                            
                            <?php if ($voucher['trang_thai'] === 'Đang hoạt động' || $voucher['trang_thai'] === 'Sắp hết hạn' || $voucher['trang_thai'] === 'Chưa bắt đầu'): ?>
                                <div class="mt-2 flex items-center w-max cursor-pointer toggle-switch" onclick="toggleVoucherStatus(this)">
                                    <div class="relative inline-flex h-5 w-9 shrink-0 rounded-full transition-colors duration-200 ease-in-out bg-[#6B0D18]">
                                        <div class="absolute left-0.5 top-0.5 h-4 w-4 rounded-full bg-white transition-transform duration-200 ease-in-out translate-x-4 shadow"></div>
                                    </div>
                                </div>
                            <?php elseif ($voucher['trang_thai'] === 'Đã tắt'): ?>
                                <div class="mt-2 flex items-center w-max cursor-pointer toggle-switch" onclick="toggleVoucherStatus(this)">
                                    <div class="relative inline-flex h-5 w-9 shrink-0 rounded-full transition-colors duration-200 ease-in-out bg-gray-300">
                                        <div class="absolute left-0.5 top-0.5 h-4 w-4 rounded-full bg-white transition-transform duration-200 ease-in-out translate-x-0 shadow"></div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <a href="<?= APP_URL ?>/admin/ma-giam-gia/sua" class="p-1.5 text-gray-500 hover:text-[#6B0D18] hover:bg-red-50 rounded transition-colors" title="Sửa">
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
                                            <?php if ($voucher['trang_thai'] !== 'Hết hạn' && $voucher['trang_thai'] !== 'Hết lượt dùng'): ?>
                                                <?php if ($voucher['trang_thai'] === 'Đã tắt'): ?>
                                                    <a href="#" class="action-toggle-btn flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50" onclick="triggerToggleFromMenu(this)"><span class="iconify" data-icon="mdi:play-circle-outline"></span> <span>Bật lại</span></a>
                                                <?php else: ?>
                                                    <a href="#" class="action-toggle-btn flex items-center gap-2 px-4 py-2 text-sm text-amber-600 hover:bg-amber-50" onclick="triggerToggleFromMenu(this)"><span class="iconify" data-icon="mdi:pause-circle-outline"></span> <span>Tạm tắt</span></a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50" onclick="confirmDeleteVoucher('<?= $voucher['ma_voucher'] ?>', <?= $voucher['da_dung'] ?>, this)"><span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa voucher</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
