                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <td class="py-4 pl-6 pr-3">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18] cursor-pointer" onchange="toggleBulkAction(this)">
                        </td>
                        <td class="py-4 px-3">
                            <div class="flex items-center gap-3">
                                <?php if(!empty($kh['anh_dai_dien'])): ?>
                                    <img src="<?= APP_URL . '/public' . $kh['anh_dai_dien'] ?>" class="w-10 h-10 rounded-full object-cover border border-gray-200 shrink-0">
                                <?php else: ?>
                                    <div class="w-10 h-10 rounded-full bg-gray-100 border border-gray-200 flex items-center justify-center font-bold text-gray-500 uppercase shrink-0">
                                        <?= mb_substr($kh['ten'], 0, 1) ?>
                                    </div>
                                <?php endif; ?>
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <a href="<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['ma'] ?>" class="font-bold text-gray-800 hover:text-[#6B0D18] text-sm"><?= $kh['ten'] ?></a>
                                        <?php if ($kh['ghi_chu_vip']): ?>
                                            <span class="iconify text-amber-500 text-sm" data-icon="mdi:star" title="Khách VIP cần chú ý"></span>
                                        <?php endif; ?>
                                        <?php if ($kh['nhieu_don_huy'] ?? false): ?>
                                            <span class="iconify text-red-500 text-sm" data-icon="mdi:alert-circle" title="Có nhiều đơn hủy"></span>
                                        <?php endif; ?>
                                    </div>
                                    <?php
                                    $age_text = '';
                                    if (!empty($kh['ngay_sinh'])) {
                                        $age = date('Y') - date('Y', strtotime($kh['ngay_sinh']));
                                        $age_text = " • $age tuổi (" . date('d/m/Y', strtotime($kh['ngay_sinh'])) . ")";
                                    } elseif (!empty($kh['nam_sinh'])) {
                                        $age = date('Y') - $kh['nam_sinh'];
                                        $age_text = " • $age tuổi";
                                    }
                                    ?>
                                    <p class="text-[11px] text-gray-500 mt-0.5"><?= $kh['ma'] ?> • <?= $kh['gioi_tinh'] ?><?= $age_text ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-3">
                            <div class="text-sm text-gray-800 flex items-center gap-1 group/copy cursor-pointer" onclick="copyToClipboard('<?= $kh['sdt'] ?>')">
                                <?= $kh['sdt'] ?> <span class="iconify text-gray-300 opacity-0 group-hover/copy:opacity-100 transition-opacity" data-icon="mdi:content-copy"></span>
                            </div>
                            <div class="text-[11px] text-gray-500 flex items-center gap-1 mt-0.5 group/copy2 cursor-pointer" onclick="copyToClipboard('<?= $kh['email'] ?>')">
                                <?= $kh['email'] ?> <span class="iconify text-gray-300 opacity-0 group-hover/copy2:opacity-100 transition-opacity" data-icon="mdi:content-copy"></span>
                            </div>
                        </td>
                        <td class="py-4 px-3">
                            <?php if ($kh['hang'] === 'Gold'): ?>
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded">GOLD</span>
                            <?php elseif ($kh['hang'] === 'Diamond'): ?>
                                <span class="px-2 py-1 bg-red-100 text-[#6B0D18] text-xs font-bold rounded">DIAMOND</span>
                            <?php else: ?>
                                <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs font-bold rounded">SILVER</span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-3">
                            <div class="text-sm font-bold text-[#6B0D18]"><?= number_format($kh['tong_chi_tieu'], 0, ',', '.') ?>đ</div>
                            <div class="text-[11px] text-gray-500 mt-0.5 cursor-pointer hover:text-[#6B0D18]" onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['ma'] ?>'">
                                <?= $kh['tong_don'] ?> đơn 
                                <?php if ($kh['don_gan_nhat']): ?>
                                    • Gần nhất: <span class="font-medium"><?= $kh['don_gan_nhat']['ma'] ?></span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="py-4 px-3">
                            <?php if ($kh['menh']): ?>
                                <span class="px-2 py-1 bg-blue-50 border border-blue-100 text-blue-700 text-[11px] font-bold rounded-md">
                                    Mệnh <?= $kh['menh'] ?>
                                </span>
                            <?php else: ?>
                                <span class="px-2 py-1 bg-gray-50 border border-gray-200 text-gray-400 text-[11px] rounded-md">
                                    Thiếu
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 px-3">
                            <?php if ($kh['trang_thai'] === 'hoat_dong'): ?>
                                <span class="px-2.5 py-1 bg-emerald-50 text-emerald-700 text-xs font-bold rounded-md flex items-center gap-1.5 w-fit">
                                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Hoạt động
                                </span>
                            <?php elseif ($kh['trang_thai'] === 'bi_khoa'): ?>
                                <span class="px-2.5 py-1 bg-red-50 text-red-700 text-xs font-bold rounded-md flex items-center gap-1.5 w-fit border border-red-100">
                                    <span class="iconify" data-icon="mdi:lock"></span> Bị khóa
                                </span>
                            <?php else: ?>
                                <span class="px-2.5 py-1 bg-amber-50 text-amber-700 text-xs font-bold rounded-md flex items-center gap-1.5 w-fit border border-amber-100">
                                    <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Chưa xác thực
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="py-4 pr-6 pl-3 text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <button onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['ma'] ?>'" class="w-8 h-8 flex items-center justify-center rounded-full bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors" title="Xem chi tiết sơ">
                                    <span class="iconify text-lg" data-icon="mdi:eye-outline"></span>
                                </button>
                                
                                <button class="w-8 h-8 rounded-full hover:bg-gray-100 flex items-center justify-center text-gray-500 transition-colors" onclick="toggleActionMenu(this)">
                                    <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                </button>
                                
                                <!-- Dropdown Menu -->
                                <div class="absolute right-6 top-10 mt-1 w-56 bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.1)] border border-gray-100 py-2 hidden z-10 transform origin-top-right transition-all">
                                    <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2" onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/sua/<?= $kh['id'] ?>'"><span class="iconify text-gray-400" data-icon="mdi:account-edit-outline"></span> Chỉnh sửa hồ sơ</button>
                                    <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2" onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['ma'] ?>'"><span class="iconify text-gray-400" data-icon="mdi:cart-outline"></span> Xem đơn hàng</button>
                                    <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2" onclick="openNotifyModal()"><span class="iconify text-gray-400" data-icon="mdi:bell-outline"></span> Gửi thông báo</button>
                                    <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2" onclick="openVoucherModal()"><span class="iconify text-gray-400" data-icon="mdi:ticket-percent-outline"></span> Gán voucher</button>
                                    <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2" onclick="openRankModal()"><span class="iconify text-gray-400" data-icon="mdi:chevron-double-up"></span> Cập nhật hạng</button>
                                    <div class="h-px bg-gray-100 my-1"></div>
                                    <?php if ($kh['trang_thai'] === 'bi_khoa'): ?>
                                        <button class="w-full px-4 py-2 text-left text-sm text-emerald-600 hover:bg-emerald-50 flex items-center gap-2" onclick="alert('Đã mở khóa!')"><span class="iconify" data-icon="mdi:lock-open-outline"></span> Mở khóa tài khoản</button>
                                    <?php else: ?>
                                        <button class="w-full px-4 py-2 text-left text-sm text-amber-600 hover:bg-amber-50 flex items-center gap-2" onclick="openLockModal()"><span class="iconify" data-icon="mdi:lock-outline"></span> Khóa tài khoản</button>
                                    <?php endif; ?>
                                    <button class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50 flex items-center gap-2" onclick="openDeleteModal()"><span class="iconify" data-icon="mdi:delete-outline"></span> Xóa tài khoản</button>
                                </div>
                            </div>
                        </td>
                    </tr>
