                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="p-3 text-center">
                                <input type="checkbox" class="row-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] cursor-pointer opacity-50 group-hover:opacity-100 transition-opacity">
                            </td>
                            <td class="p-3">
                                <button onclick="openQuickView('<?= $dh['ma_don'] ?>')" class="font-bold text-[#6B0D18] hover:underline tracking-tight"><?= $dh['ma_don'] ?></button>
                                <?php if($dh['ma_van_don']): ?>
                                    <div class="text-[10px] text-gray-400 mt-0.5 flex items-center gap-1" title="Mã vận đơn">
                                        <span class="iconify" data-icon="mdi:barcode-scan"></span> <?= $dh['ma_van_don'] ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td class="p-3">
                                <div class="font-bold text-gray-900"><?= $dh['khach_hang'] ?></div>
                                <div class="text-xs text-gray-500 mt-0.5"><?= $dh['sdt'] ?></div>
                            </td>
                            <td class="p-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-xs <?= $dh['icon_mau'] ?> shadow-sm shrink-0">
                                        <?= $dh['icon_chu'] ?>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-sm text-gray-900 truncate max-w-[180px]" title="<?= $dh['san_pham_chinh'] ?>"><?= $dh['san_pham_chinh'] ?></span>
                                        <div class="flex items-center gap-1 mt-0.5 text-xs text-gray-500">
                                            <span><?= $dh['tong_so_luong'] ?> sản phẩm</span>
                                            <?php if($dh['so_luong_sp_khac'] > 0): ?>
                                                <span class="text-gray-300">•</span>
                                                <button onclick="openQuickView('<?= $dh['ma_don'] ?>')" class="text-[#6B0D18] hover:underline">+<?= $dh['so_luong_sp_khac'] ?> sp khác</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-3">
                                <div class="text-gray-900"><?= explode(' ', $dh['ngay_dat'])[0] ?></div>
                                <div class="text-xs text-gray-500 mt-0.5"><?= explode(' ', $dh['ngay_dat'])[1] ?></div>
                            </td>
                            <td class="p-3 text-right font-bold text-[#6B0D18]">
                                <?= number_format($dh['tong_tien'], 0, ',', '.') ?>đ
                            </td>
                            <td class="p-3">
                                <div class="flex flex-col items-center gap-1">
                                    <div class="text-xs font-medium text-gray-700"><?= $dh['hinh_thuc_thanh_toan'] ?></div>
                                    <?php
                                        $tt_class = '';
                                        if($dh['trang_thai_thanh_toan'] == 'Chưa thanh toán') $tt_class = 'bg-yellow-50 text-yellow-700 border-yellow-200';
                                        elseif($dh['trang_thai_thanh_toan'] == 'Chờ thanh toán') $tt_class = 'bg-orange-50 text-orange-700 border-orange-200';
                                        elseif($dh['trang_thai_thanh_toan'] == 'Đã thanh toán') $tt_class = 'bg-blue-50 text-blue-700 border-blue-200';
                                        elseif($dh['trang_thai_thanh_toan'] == 'Thanh toán thất bại') $tt_class = 'bg-red-50 text-red-700 border-red-200';
                                        else $tt_class = 'bg-gray-50 text-gray-700 border-gray-200';
                                    ?>
                                    <span class="text-[10px] font-medium px-2 py-0.5 rounded-md border <?= $tt_class ?> tracking-wide whitespace-nowrap">
                                        <?= $dh['trang_thai_thanh_toan'] ?>
                                    </span>
                                </div>
                            </td>
                            <td class="p-3 text-center">
                                <div class="text-sm text-gray-700"><?= $dh['van_chuyen'] ?></div>
                                <?php if(!$dh['ma_van_don']): ?>
                                    <div class="text-[10px] text-gray-400 mt-0.5">Chưa có vận đơn</div>
                                <?php endif; ?>
                            </td>
                            <td class="p-3 text-center">
                                <?php
                                    $st_class = '';
                                    if($dh['trang_thai'] == 'Chờ xác nhận') $st_class = 'bg-red-50 text-[#6B0D18] border-red-200 font-bold';
                                    elseif($dh['trang_thai'] == 'Xác nhận đơn hàng') $st_class = 'bg-blue-50 text-blue-700 border-blue-200';
                                    elseif($dh['trang_thai'] == 'Đang giao') $st_class = 'bg-teal-50 text-teal-700 border-teal-200';
                                    elseif($dh['trang_thai'] == 'Đã giao') $st_class = 'bg-purple-50 text-purple-700 border-purple-200';
                                    elseif($dh['trang_thai'] == 'Thành công') $st_class = 'bg-emerald-50 text-emerald-700 border-emerald-200 font-bold';
                                    elseif($dh['trang_thai'] == 'Đã hủy') $st_class = 'bg-gray-100 text-gray-600 border-gray-200';
                                    else $st_class = 'bg-gray-50 text-gray-600 border-gray-200';
                                ?>
                                <span class="text-[11px] px-2.5 py-1 rounded-full border <?= $st_class ?> inline-block shadow-[0_1px_2px_rgba(0,0,0,0.02)]">
                                    <?= $dh['trang_thai'] ?>
                                </span>
                            </td>
                            <td class="p-3 text-center">
                                <?php if($dh['nhan_vien'] == 'Chưa xử lý'): ?>
                                    <span class="text-[10px] font-medium px-2 py-0.5 rounded bg-yellow-50 text-yellow-700 border border-yellow-200">Chưa xử lý</span>
                                <?php else: ?>
                                    <div class="text-sm font-medium text-gray-800"><?= $dh['nhan_vien'] ?></div>
                                    <div class="text-[10px] text-gray-400 mt-0.5" title="Thời gian cập nhật">Cập nhật: <?= $dh['thoi_gian_xl'] ?></div>
                                <?php endif; ?>
                            </td>
                            <td class="p-3 text-center relative">
                                <div class="flex items-center justify-center gap-1.5 relative">
                                    <!-- Nút thao tác nhanh dựa trên trạng thái -->
                                    <?php if($dh['trang_thai'] == 'Chờ xác nhận'): ?>
                                        <button onclick="openConfirmModal('<?= $dh['ma_don'] ?>', '<?= $dh['khach_hang'] ?>')" class="px-2.5 py-1.5 bg-[#6B0D18] text-white rounded-lg text-xs font-medium hover:bg-[#4C0519] transition-colors shadow-sm" title="Xác nhận đơn">Xác nhận</button>
                                    <?php elseif($dh['trang_thai'] == 'Xác nhận đơn hàng'): ?>
                                        <button onclick="openShippingModal('<?= $dh['ma_don'] ?>')" class="px-2.5 py-1.5 bg-blue-600 text-white rounded-lg text-xs font-medium hover:bg-blue-700 transition-colors shadow-sm" title="Chuyển sang Đang giao">Giao hàng</button>
                                    <?php elseif($dh['trang_thai'] == 'Đang giao'): ?>
                                        <button onclick="openDeliveredModal('<?= $dh['ma_don'] ?>')" class="px-2.5 py-1.5 bg-purple-600 text-white rounded-lg text-xs font-medium hover:bg-purple-700 transition-colors shadow-sm" title="Đánh dấu Đã giao">Đã giao</button>
                                    <?php elseif($dh['trang_thai'] == 'Đã giao'): ?>
                                        <button onclick="openSuccessModal('<?= $dh['ma_don'] ?>')" class="px-2.5 py-1.5 bg-emerald-600 text-white rounded-lg text-xs font-medium hover:bg-emerald-700 transition-colors shadow-sm" title="Xác nhận Thành công">Hoàn tất</button>
                                    <?php else: ?>
                                        <button onclick="openQuickView('<?= $dh['ma_don'] ?>')" class="px-2.5 py-1.5 bg-gray-100 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-200 transition-colors border border-gray-200">Xem</button>
                                    <?php endif; ?>

                                    <button class="action-btn p-1.5 text-gray-400 hover:text-gray-900 hover:bg-gray-200 rounded-lg transition-colors border border-transparent" onclick="toggleActionMenu(this)">
                                        <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                    </button>

                                    <!-- Dropdown Menu -->
                                    <div class="w-52 bg-white border border-gray-100 rounded-xl shadow-xl z-[99] hidden action-menu py-1.5 fixed text-left right-0 origin-top-right">
                                        <button onclick="openQuickView('<?= $dh['ma_don'] ?>')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                            <span class="iconify text-gray-400" data-icon="mdi:flash-outline"></span> Xem nhanh
                                        </button>
                                        <a href="/shopbanhangchuoingoc/admin/don-hang/chi-tiet/<?= $dh['ma_don'] ?>" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                            <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết đầy đủ
                                        </a>
                                        <button onclick="openPrintModal('<?= $dh['ma_don'] ?>')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                            <span class="iconify text-gray-400" data-icon="mdi:printer-outline"></span> In hóa đơn
                                        </button>
                                        <?php if(in_array($dh['trang_thai'], ['Chờ xác nhận', 'Xác nhận đơn hàng'])): ?>
                                            <div class="h-px bg-gray-100 my-1.5 w-full"></div>
                                            <button onclick="openCancelModal('<?= $dh['ma_don'] ?>')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors font-medium">
                                                <span class="iconify" data-icon="mdi:cancel"></span> Hủy đơn hàng
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
