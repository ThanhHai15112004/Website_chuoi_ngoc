                                    <tr class="hover:bg-gray-50/50 transition-colors group">
                                        <td class="p-4 text-center">
                                            <input type="checkbox" class="row-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] cursor-pointer opacity-50 group-hover:opacity-100 transition-opacity">
                                        </td>
                                        <td class="p-4">
                                            <div class="w-12 h-12 rounded-xl flex items-center justify-center font-bold text-lg <?= $dm['mau_sac_icon'] ?> shadow-sm">
                                                <?= $dm['chu_cai'] ?>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex flex-col gap-0.5">
                                                <div class="flex items-center gap-1.5 flex-wrap">
                                                    <span class="text-[10px] text-gray-500 font-medium font-mono whitespace-nowrap shrink-0"><?= $dm['ma_dm'] ?></span>
                                                </div>
                                                <a href="#" class="font-bold text-gray-900 hover:text-[#6B0D18] transition-colors leading-tight text-base"><?= $dm['ten_dm'] ?></a>
                                                <span class="text-xs text-gray-500 mt-0.5 max-w-xs truncate" title="<?= $dm['mo_ta'] ?>"><?= $dm['mo_ta'] ?></span>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex items-center gap-1 text-gray-500 text-xs">
                                                /<?= $dm['slug'] ?>
                                                <button class="text-gray-400 hover:text-[#6B0D18] p-1 rounded" onclick="copyToClipboard('/<?= $dm['slug'] ?>')" title="Sao chép">
                                                    <span class="iconify" data-icon="mdi:content-copy"></span>
                                                </button>
                                            </div>
                                        </td>
                                        <td class="p-4 text-center">
                                            <?php if($dm['so_san_pham'] > 0): ?>
                                                <a href="<?= APP_URL ?>/admin/san-pham" class="font-bold text-gray-900 hover:text-[#6B0D18] hover:underline"><?= $dm['so_san_pham'] ?></a>
                                            <?php else: ?>
                                                <span class="text-[11px] font-bold px-2 py-0.5 rounded bg-yellow-50 text-yellow-700 border border-yellow-200 uppercase tracking-wide">Trống</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="p-4">
                                            <div class="flex flex-col gap-1 items-center">
                                                <?php $count = 0; foreach($dm['vi_tri'] as $vt): $count++; if($count > 2) break; ?>
                                                    <span class="text-[10px] font-medium bg-gray-100 text-gray-600 px-2 py-0.5 rounded-full whitespace-nowrap"><?= $vt ?></span>
                                                <?php endforeach; ?>
                                                <?php if(count($dm['vi_tri']) > 2): ?>
                                                    <span class="text-[9px] font-bold text-gray-400">+<?= count($dm['vi_tri']) - 2 ?></span>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td class="p-4 text-center">
                                            <div class="font-bold text-gray-700 bg-white border border-gray-200 w-8 h-8 rounded-lg flex items-center justify-center mx-auto shadow-sm">
                                                <?= $dm['thu_tu'] ?>
                                            </div>
                                        </td>
                                        <td class="p-4 text-center">
                                            <?php if($dm['trang_thai'] === 'Đang hiển thị'): ?>
                                                <span class="text-[11px] font-medium px-2 py-1 rounded-full border bg-emerald-50 text-emerald-700 border-emerald-200 inline-block whitespace-nowrap">Đang hiển thị</span>
                                            <?php else: ?>
                                                <span class="text-[11px] font-medium px-2 py-1 rounded-full border bg-gray-100 text-gray-600 border-gray-200 inline-block whitespace-nowrap">Đang ẩn</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="p-4 text-right">
                                            <div class="flex items-center justify-end gap-1 relative">
                                                <button onclick="openModal('categoryModal', 'edit', '<?= $dm['ten_dm'] ?>')" class="p-1.5 text-gray-400 hover:text-[#6B0D18] hover:bg-red-50 rounded-lg transition-colors" title="Sửa">
                                                    <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                                </button>
                                                <button class="action-btn p-1.5 text-gray-400 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors" onclick="toggleActionMenu(this)">
                                                    <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                                </button>
                                                <!-- Dropdown Menu -->
                                                <div class="w-48 bg-white border border-gray-100 rounded-xl shadow-lg z-[9999] hidden action-menu py-1 fixed">
                                                    <button onclick="showToast('Mở popup chọn sản phẩm thêm vào danh mục này...', 'success')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                        <span class="iconify text-gray-400" data-icon="mdi:plus-box-outline"></span> Thêm sản phẩm
                                                    </button>
                                                    <a href="<?= APP_URL ?>/admin/san-pham" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                        <span class="iconify text-gray-400" data-icon="mdi:format-list-bulleted"></span> Xem DS sản phẩm
                                                    </a>
                                                    <?php if($dm['trang_thai'] === 'Đang hiển thị'): ?>
                                                        <button onclick="openHideModal('<?= $dm['ten_dm'] ?>', <?= $dm['so_san_pham'] ?>, this)" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                            <span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn danh mục
                                                        </button>
                                                    <?php else: ?>
                                                        <button onclick="showToast('Đã hiển thị danh mục', 'success')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                            <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Hiện danh mục
                                                        </button>
                                                    <?php endif; ?>
                                                    <button onclick="showToast('Đã dừng hoạt động danh mục', 'success'); this.closest('tr').querySelector('td:nth-child(8) span').className='text-[11px] font-medium px-2 py-1 rounded-full border bg-red-50 text-red-700 border-red-200 inline-block whitespace-nowrap'; this.closest('tr').querySelector('td:nth-child(8) span').textContent='Dừng hoạt động';" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                        <span class="iconify text-gray-400" data-icon="mdi:power"></span> Dừng hoạt động
                                                    </button>
                                                    <div class="h-px bg-gray-100 my-1 w-full"></div>
                                                    <button onclick="openDeleteModal('<?= $dm['ten_dm'] ?>', <?= $dm['so_san_pham'] ?>, this)" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                                        <span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa danh mục
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
