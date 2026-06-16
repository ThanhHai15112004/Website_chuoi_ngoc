<?php
    $statusMap = [
        0 => 'Chờ xác nhận',
        1 => 'Đang chuẩn bị',
        2 => 'Đang giao',
        3 => 'Thành công',
        4 => 'Đã hủy'
    ];
    $ttText = $statusMap[$dh['trang_thai_don_hang']] ?? 'Không xác định';
    if ($dh['trang_thai_don_hang'] == 4 && ($dh['ly_do_huy'] ?? '') === 'Giao hàng thất bại') {
        $ttText = 'Giao thất bại';
    }
    
    $paymentStatus = $dh['trang_thai_thanh_toan'] == 1 ? 'Đã thanh toán' : 'Chưa thanh toán';
    $so_luong_khac = max(0, $dh['tong_so_luong_sp'] - 1);
    
    $iconMau = 'bg-emerald-50 text-emerald-700'; // Default
    $iconChu = 'SP';
?>
                        <tr class="hover:bg-gray-50/50 transition-colors group">
                            <td class="p-3 text-center">
                                <input type="checkbox" class="row-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] cursor-pointer opacity-50 group-hover:opacity-100 transition-opacity">
                            </td>
                            <td class="p-3">
                                <button onclick="openQuickView('<?= $dh['id'] ?>')" class="font-bold text-[#6B0D18] hover:underline tracking-tight"><?= $dh['ma_don_hang'] ?></button>
                            </td>
                            <td class="p-3">
                                <div class="font-bold text-gray-900"><?= $dh['ten_nguoi_nhan'] ?></div>
                                <div class="text-xs text-gray-500 mt-0.5"><?= $dh['sdt_nguoi_nhan'] ?></div>
                            </td>
                            <td class="p-3">
                                <div class="flex items-center gap-2">
                                    <div class="w-10 h-10 rounded-lg flex items-center justify-center font-bold text-xs shadow-sm shrink-0 overflow-hidden <?= empty($dh['hinh_anh_chinh']) ? $iconMau : 'bg-white border border-gray-100' ?>">
                                        <?php if (!empty($dh['hinh_anh_chinh'])): ?>
                                            <img src="<?= APP_URL ?>/<?= $dh['hinh_anh_chinh'] ?>" alt="Product" class="w-full h-full object-cover">
                                        <?php else: ?>
                                            <?= $iconChu ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex flex-col">
                                        <span class="text-sm text-gray-900 truncate max-w-[180px]" title="<?= htmlspecialchars($dh['san_pham_chinh'] ?? 'Sản phẩm') ?>"><?= htmlspecialchars($dh['san_pham_chinh'] ?? 'Sản phẩm') ?></span>
                                        <div class="flex items-center gap-1 mt-0.5 text-xs text-gray-500">
                                            <span><?= $dh['tong_so_luong_sp'] ?> sản phẩm</span>
                                            <?php if($so_luong_khac > 0): ?>
                                                <span class="text-gray-300">•</span>
                                                <button onclick="openQuickView('<?= $dh['id'] ?>')" class="text-[#6B0D18] hover:underline">+<?= $so_luong_khac ?> sp khác</button>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="p-3">
                                <div class="text-gray-900"><?= date('d/m/Y', strtotime($dh['ngay_tao'])) ?></div>
                                <div class="text-xs text-gray-500 mt-0.5"><?= date('H:i', strtotime($dh['ngay_tao'])) ?></div>
                            </td>
                            <td class="p-3 text-right font-bold text-[#6B0D18]">
                                <?= number_format($dh['thanh_tien'], 0, ',', '.') ?>đ
                            </td>
                            <td class="p-3">
                                <div class="flex flex-col items-center gap-1">
                                    <div class="text-xs font-medium text-gray-700"><?= $dh['pt_thanh_toan'] ?></div>
                                    <?php
                                        $tt_class = $dh['trang_thai_thanh_toan'] == 1 ? 'bg-blue-50 text-blue-700 border-blue-200' : 'bg-yellow-50 text-yellow-700 border-yellow-200';
                                    ?>
                                    <span class="text-[10px] font-medium px-2 py-0.5 rounded-md border <?= $tt_class ?> tracking-wide whitespace-nowrap">
                                        <?= $paymentStatus ?>
                                    </span>
                                </div>
                            </td>
                            <td class="p-3 text-center">
                                <div class="text-sm text-gray-700">Giao tiêu chuẩn</div>
                            </td>
                            <td class="p-3 text-center">
                                <?php
                                    $st_class = '';
                                    if($dh['trang_thai_don_hang'] == 0) $st_class = 'bg-red-50 text-[#6B0D18] border-red-200 font-bold';
                                    elseif($dh['trang_thai_don_hang'] == 1) $st_class = 'bg-blue-50 text-blue-700 border-blue-200';
                                    elseif($dh['trang_thai_don_hang'] == 2) $st_class = 'bg-teal-50 text-teal-700 border-teal-200';
                                    elseif($dh['trang_thai_don_hang'] == 3) $st_class = 'bg-emerald-50 text-emerald-700 border-emerald-200 font-bold';
                                    elseif($dh['trang_thai_don_hang'] == 4) {
                                        if (($dh['ly_do_huy'] ?? '') === 'Giao hàng thất bại') {
                                            $st_class = 'bg-amber-50 text-amber-700 border-amber-200 font-bold';
                                        } else {
                                            $st_class = 'bg-gray-100 text-gray-600 border-gray-200';
                                        }
                                    }
                                    else $st_class = 'bg-gray-50 text-gray-600 border-gray-200';
                                ?>
                                <span class="text-[11px] px-2.5 py-1 rounded-full border <?= $st_class ?> inline-block shadow-[0_1px_2px_rgba(0,0,0,0.02)]">
                                    <?= $ttText ?>
                                </span>
                            </td>
                            <td class="p-3 text-center">
                                <span class="text-sm font-medium text-gray-800">Chưa xử lý</span>
                            </td>
                            <td class="p-3 text-center relative">
                                <div class="flex items-center justify-center gap-1.5 relative">
                                    <?php if($dh['trang_thai_don_hang'] == 0): ?>
                                        <button onclick="capNhatTrangThai('<?= $dh['id'] ?>', 1)" class="px-2.5 py-1.5 bg-[#6B0D18] text-white rounded-lg text-xs font-medium hover:bg-[#4C0519] transition-colors shadow-sm" title="Xác nhận đơn">Xác nhận</button>
                                    <?php elseif($dh['trang_thai_don_hang'] == 1): ?>
                                        <button onclick="capNhatTrangThai('<?= $dh['id'] ?>', 2)" class="px-2.5 py-1.5 bg-blue-600 text-white rounded-lg text-xs font-medium hover:bg-blue-700 transition-colors shadow-sm" title="Chuyển sang Đang giao">Giao hàng</button>
                                    <?php elseif($dh['trang_thai_don_hang'] == 2): ?>
                                        <button onclick="capNhatTrangThai('<?= $dh['id'] ?>', 3)" class="px-2.5 py-1.5 bg-emerald-600 text-white rounded-lg text-xs font-medium hover:bg-emerald-700 transition-colors shadow-sm" title="Hoàn tất">Thành công</button>
                                    <?php else: ?>
                                        <a href="<?= APP_URL ?>/admin/don-hang/chi-tiet/<?= $dh['id'] ?>" class="px-2.5 py-1.5 bg-gray-100 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-200 transition-colors border border-gray-200">Xem</a>
                                    <?php endif; ?>

                                    <button class="action-btn p-1.5 text-gray-400 hover:text-gray-900 hover:bg-gray-200 rounded-lg transition-colors border border-transparent" onclick="toggleActionMenu(this)">
                                        <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                    </button>

                                    <!-- Dropdown Menu -->
                                    <div class="w-52 bg-white border border-gray-100 rounded-xl shadow-xl z-[99] hidden action-menu py-1.5 fixed text-left right-0 origin-top-right">
                                        <a href="<?= APP_URL ?>/admin/don-hang/chi-tiet/<?= $dh['id'] ?>" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                            <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết
                                        </a>
                                        <?php if($dh['trang_thai_don_hang'] == 0): ?>
                                            <div class="h-px bg-gray-100 my-1.5 w-full"></div>
                                            <button onclick="huyDonHang('<?= $dh['id'] ?>')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors font-medium">
                                                <span class="iconify" data-icon="mdi:cancel"></span> Hủy đơn hàng
                                            </button>
                                        <?php elseif($dh['trang_thai_don_hang'] == 2): ?>
                                            <div class="h-px bg-gray-100 my-1.5 w-full"></div>
                                            <button onclick="giaoHangThatBai('<?= $dh['id'] ?>')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-amber-600 hover:bg-amber-50 transition-colors font-medium">
                                                <span class="iconify" data-icon="mdi:close-circle-outline"></span> Giao hàng thất bại
                                            </button>
                                        <?php elseif($dh['trang_thai_don_hang'] == 4): ?>
                                            <div class="h-px bg-gray-100 my-1.5 w-full"></div>
                                            <button onclick="xoaDonHang('<?= $dh['id'] ?>')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors font-medium">
                                                <span class="iconify" data-icon="mdi:delete-outline"></span> Xóa đơn hàng
                                            </button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </td>
                        </tr>
