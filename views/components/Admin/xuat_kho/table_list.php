<?php
// views/components/Admin/xuat_kho/table_list.php
?>
    <!-- Table Wrapper cho cuộn ngang -->
    <div class="overflow-x-auto min-h-[400px]">
        <table class="w-full text-left border-collapse min-w-[1500px]">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase tracking-wider text-gray-500">
                    <th class="py-3 px-4 font-semibold w-10 text-center"><input type="checkbox" id="selectAll" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20" onchange="toggleAll(this)"></th>
                    <th class="py-3 px-4 font-semibold w-32">Mã Phiếu</th>
                    <th class="py-3 px-4 font-semibold w-36">Loại / Kho xuất</th>
                    <th class="py-3 px-4 font-semibold w-48">Đối tượng nhận</th>
                    <th class="py-3 px-4 font-semibold w-64">Sản phẩm xuất</th>
                    <th class="py-3 px-4 font-semibold text-center w-28">Tổng SL</th>
                    <th class="py-3 px-4 font-semibold text-right w-36">Giá trị xuất</th>
                    <th class="py-3 px-4 font-semibold w-32">Người tạo</th>
                    <th class="py-3 px-4 font-semibold w-32">Người xử lý</th>
                    <th class="py-3 px-4 font-semibold w-32">Thời gian</th>
                    <th class="py-3 px-4 font-semibold text-center w-36">Trạng Thái</th>
                    <th class="py-3 px-4 font-semibold text-right w-16"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php foreach ($danhSachPhieuXuat as $xk): ?>
                    <tr class="hover:bg-gray-50/70 transition-colors group">
                        <!-- 1. Checkbox -->
                        <td class="py-3 px-4 text-center">
                            <input type="checkbox" class="row-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20" value="<?= $xk['id'] ?>" onchange="toggleRow(this)">
                        </td>
                        
                        <!-- 2. Mã phiếu -->
                        <td class="py-3 px-4">
                            <a href="javascript:void(0)" onclick="openDrawer('<?= $xk['id'] ?>')" class="font-bold text-[#6B0D18] hover:underline text-sm"><?= $xk['id'] ?></a>
                            <?php if($xk['gap']): ?>
                                <span class="ml-1 inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-700 tooltip" title="Cần xử lý gấp">GẤP</span>
                            <?php endif; ?>
                        </td>
                        
                        <!-- 3. Loại / Kho xuất -->
                        <td class="py-3 px-4">
                            <?php 
                                $loaiBg = 'bg-gray-100 text-gray-600';
                                if($xk['loai'] == 'Đơn hàng') $loaiBg = 'bg-blue-50 text-blue-600';
                                else if($xk['loai'] == 'Trả nhà cung cấp') $loaiBg = 'bg-amber-50 text-amber-600';
                                else if($xk['loai'] == 'Hàng lỗi' || $xk['loai'] == 'Điều chỉnh kho') $loaiBg = 'bg-red-50 text-red-600';
                            ?>
                            <div class="mb-1">
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold <?= $loaiBg ?> tracking-wide uppercase">
                                    <?= $xk['loai'] ?>
                                </span>
                            </div>
                            <div class="font-medium text-gray-900 text-[13px] flex items-center gap-1.5" title="<?= $xk['vi_tri'] ?>">
                                <span class="iconify text-gray-400" data-icon="mdi:warehouse"></span> <?= $xk['kho_xuat'] ?>
                            </div>
                        </td>
                        
                        <!-- 4. Đối tượng nhận -->
                        <td class="py-3 px-4">
                            <div class="font-bold text-[#6B0D18] text-[13px] hover:underline cursor-pointer flex items-center gap-1">
                                <?php if($xk['loai'] == 'Đơn hàng'): ?>
                                    <span class="iconify text-gray-400" data-icon="mdi:shopping-outline"></span>
                                <?php else: ?>
                                    <span class="iconify text-gray-400" data-icon="mdi:account-box-outline"></span>
                                <?php endif; ?>
                                <?= $xk['lien_ket_id'] ?>
                            </div>
                            <div class="text-xs text-gray-500 mt-0.5 truncate max-w-[160px]" title="<?= $xk['lien_ket_ten'] ?>"><?= $xk['lien_ket_ten'] ?></div>
                        </td>
                        
                        <!-- 5. Sản phẩm xuất -->
                        <td class="py-3 px-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center shrink-0 overflow-hidden">
                                    <span class="iconify text-2xl text-gray-400" data-icon="mdi:image-outline"></span>
                                </div>
                                <div class="flex flex-col min-w-0">
                                    <div class="font-bold text-gray-900 text-sm truncate" title="<?= $xk['san_pham']['ten'] ?>"><?= $xk['san_pham']['ten'] ?></div>
                                    <div class="text-[11px] text-gray-500 flex items-center gap-2 mt-0.5">
                                        <span>SKU: <?= $xk['san_pham']['sku'] ?></span>
                                        <?php if($xk['san_pham']['so_luong_khac'] > 0): ?>
                                            <span class="text-[#6B0D18] font-medium cursor-pointer hover:underline" onclick="openDrawer('<?= $xk['id'] ?>')">+<?= $xk['san_pham']['so_luong_khac'] ?> sp khác</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                        <!-- 6. Tổng số lượng -->
                        <td class="py-3 px-4 text-center">
                            <div class="font-bold text-gray-900 text-sm"><?= $xk['tong_so_luong'] ?> <span class="text-[11px] font-normal text-gray-500">món</span></div>
                            <?php if ($xk['tong_so_luong'] > $xk['so_luong_thuc']): ?>
                                <span class="inline-flex items-center justify-center gap-1 mt-1 font-bold text-red-700 bg-red-50 border border-red-100 px-1.5 py-0.5 rounded text-[10px]">
                                    Thiếu <?= $xk['tong_so_luong'] - $xk['so_luong_thuc'] ?>
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center justify-center gap-1 mt-1 font-bold text-emerald-700 bg-emerald-50 border border-emerald-100 px-1.5 py-0.5 rounded text-[10px]">
                                    Đủ hàng
                                </span>
                            <?php endif; ?>
                        </td>
                        
                        <!-- 7. Giá trị xuất -->
                        <td class="py-3 px-4 text-right">
                            <div class="font-bold text-[#6B0D18] text-[13px]"><?= number_format($xk['gia_tri'], 0, ',', '.') ?>đ</div>
                        </td>
                        
                        <!-- 8. Người tạo -->
                        <td class="py-3 px-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-[10px] font-bold text-gray-600 shrink-0">
                                    <?= mb_substr($xk['nguoi_tao'], 0, 1) ?>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[13px] font-medium text-gray-700 truncate max-w-[100px]" title="<?= $xk['nguoi_tao'] ?>"><?= $xk['nguoi_tao'] ?></span>
                                    <span class="text-[10px] text-gray-400"><?= $xk['vai_tro_tao'] ?></span>
                                </div>
                            </div>
                        </td>
                        
                        <!-- 9. Người xử lý (Duyệt/Xuất) -->
                        <td class="py-3 px-4">
                            <div class="flex flex-col gap-1">
                                <div class="flex items-center justify-between text-[11px]">
                                    <span class="text-gray-500">Duyệt:</span>
                                    <?php if($xk['nguoi_duyet'] === 'Chưa duyệt'): ?>
                                        <span class="text-amber-600 font-medium bg-amber-50 px-1.5 rounded">Chờ</span>
                                    <?php else: ?>
                                        <span class="text-gray-900 font-medium truncate max-w-[80px]" title="<?= $xk['nguoi_duyet'] ?>"><?= $xk['nguoi_duyet'] ?></span>
                                    <?php endif; ?>
                                </div>
                                <div class="flex items-center justify-between text-[11px]">
                                    <span class="text-gray-500">Xuất:</span>
                                    <?php if($xk['nguoi_xuat'] === 'Chưa xuất' || $xk['nguoi_xuat'] === '-'): ?>
                                        <span class="text-gray-400 italic">--</span>
                                    <?php else: ?>
                                        <span class="text-emerald-700 font-medium truncate max-w-[80px]" title="<?= $xk['nguoi_xuat'] ?>"><?= $xk['nguoi_xuat'] ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        
                        <!-- 10. Thời gian (Tạo/Xuất) -->
                        <td class="py-3 px-4">
                            <div class="flex flex-col gap-1 text-[11px]">
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Tạo:</span>
                                    <span class="text-gray-900 font-medium" title="<?= $xk['gio_tao'] ?>"><?= $xk['ngay_tao'] ?></span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-400">Xuất:</span>
                                    <?php if($xk['ngay_xuat'] !== '-'): ?>
                                        <span class="text-gray-900 font-medium"><?= explode(' ', $xk['ngay_xuat'])[0] ?></span>
                                    <?php else: ?>
                                        <span class="text-gray-400 italic">--</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        
                        <!-- 11. Trạng thái -->
                        <td class="py-3 px-4 text-center">
                            <?php 
                                $statusClass = 'bg-gray-100 text-gray-700';
                                if ($xk['trang_thai'] === 'Nháp') $statusClass = 'bg-gray-100 text-gray-600 border border-gray-200';
                                elseif ($xk['trang_thai'] === 'Chờ duyệt') $statusClass = 'bg-yellow-50 text-amber-600 border border-yellow-200';
                                elseif ($xk['trang_thai'] === 'Đã duyệt') $statusClass = 'bg-blue-50 text-blue-700 border border-blue-200';
                                elseif ($xk['trang_thai'] === 'Chờ xuất kho') $statusClass = 'bg-orange-50 text-orange-600 border border-orange-200';
                                elseif ($xk['trang_thai'] === 'Đã xuất kho') $statusClass = 'bg-emerald-50 text-emerald-700 border border-emerald-200';
                                elseif ($xk['trang_thai'] === 'Có lỗi / thiếu hàng') $statusClass = 'bg-red-50 text-[#6B0D18] border border-red-200';
                                elseif ($xk['trang_thai'] === 'Đã hủy') $statusClass = 'bg-gray-100 text-gray-400 border border-gray-200 line-through';
                            ?>
                            <span class="inline-flex items-center px-2.5 py-1.5 rounded-md text-[11px] font-bold uppercase tracking-wide w-full justify-center <?= $statusClass ?>">
                                <?= $xk['trang_thai'] ?>
                            </span>
                        </td>
                        
                        <!-- 12. Thao tác -->
                        <td class="py-3 px-4 text-right">
                            <div class="relative inline-block text-left dropdown-container">
                                <button type="button" class="p-1.5 text-gray-400 hover:text-gray-700 rounded-lg hover:bg-gray-100 transition-colors focus:outline-none" onclick="toggleDropdown(this)">
                                    <span class="iconify text-xl" data-icon="mdi:dots-vertical"></span>
                                </button>
                                <div class="dropdown-menu hidden absolute right-0 z-50 mt-1 w-56 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none border border-gray-100 overflow-hidden">
                                    <div class="py-1">
                                        <!-- Actions based on status -->
                                        <?php if($xk['trang_thai'] === 'Chờ duyệt'): ?>
                                            <a href="javascript:void(0)" onclick="openModal('modalDuyetPhieu')" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-amber-50 hover:text-amber-700 transition-colors font-medium">
                                                <span class="iconify text-lg" data-icon="mdi:shield-check-outline"></span> Duyệt phiếu
                                            </a>
                                        <?php endif; ?>
                                        
                                        <?php if($xk['trang_thai'] === 'Đã duyệt' || $xk['trang_thai'] === 'Chờ xuất kho'): ?>
                                            <a href="<?= APP_URL ?>/admin/xuat-kho/chuan-bi/<?= $xk['id'] ?>" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-700 transition-colors font-medium">
                                                <span class="iconify text-lg" data-icon="mdi:package-variant-closed"></span> Chuẩn bị hàng & Xuất
                                            </a>
                                        <?php endif; ?>
                                        
                                        <a href="javascript:void(0)" onclick="openDrawer('<?= $xk['id'] ?>')" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                            <span class="iconify text-lg text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết
                                        </a>
                                        
                                        <a href="#" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                            <span class="iconify text-lg text-gray-400" data-icon="mdi:printer-outline"></span> In phiếu xuất
                                        </a>
                                        
                                        <?php if($xk['trang_thai'] === 'Đã xuất kho'): ?>
                                            <div class="border-t border-gray-100 my-1"></div>
                                            <a href="javascript:void(0)" onclick="openModal('modalHoanKho')" class="flex items-center gap-2 px-4 py-2.5 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                                <span class="iconify text-lg text-emerald-600" data-icon="mdi:undo-variant"></span> Tạo phiếu hoàn kho
                                            </a>
                                        <?php endif; ?>
                                        
                                        <?php if($xk['trang_thai'] !== 'Đã xuất kho' && $xk['trang_thai'] !== 'Đã hủy'): ?>
                                            <div class="border-t border-gray-100 my-1"></div>
                                            <a href="javascript:void(0)" onclick="openModal('modalHuyPhieu')" class="flex items-center gap-2 px-4 py-2.5 text-sm text-rose-600 hover:bg-rose-50 transition-colors font-medium">
                                                <span class="iconify text-lg" data-icon="mdi:trash-can-outline"></span> Hủy phiếu
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Phân trang -->
    <div class="p-4 border-t border-gray-200 bg-white flex flex-col md:flex-row items-center justify-between gap-4 rounded-b-xl">
        <div class="text-sm text-gray-500 text-center md:text-left">
            Hiển thị <span class="font-medium text-gray-900">1</span> đến <span class="font-medium text-gray-900">5</span> trong tổng số <span class="font-medium text-gray-900"><?= $stats['tong'] ?></span> phiếu
        </div>
        <div class="flex items-center gap-1">
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed bg-white shadow-sm">
                <span class="iconify" data-icon="mdi:chevron-left"></span>
            </button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#6B0D18] text-white font-medium text-sm shadow-sm">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm">2</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm">3</button>
            <span class="w-8 h-8 flex items-center justify-center text-gray-400">...</span>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm">48</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors bg-white shadow-sm">
                <span class="iconify" data-icon="mdi:chevron-right"></span>
            </button>
        </div>
    </div>

<script>
    function toggleDropdown(button) {
        const menu = button.nextElementSibling;
        const isHidden = menu.classList.contains('hidden');
        
        document.querySelectorAll('.dropdown-menu').forEach(el => {
            el.classList.add('hidden');
            el.style.position = '';
            el.style.top = '';
            el.style.left = '';
            el.style.right = '';
        });

        if (isHidden) {
            const rect = button.getBoundingClientRect();
            menu.classList.remove('hidden');
            menu.style.position = 'fixed';
            menu.style.zIndex = '9999';
            const menuWidth = menu.offsetWidth || 224; // w-56 is 14rem = 224px
            const menuHeight = menu.offsetHeight || 250;
            let top = rect.bottom + 4;
            let left = rect.right - menuWidth;
            if (top + menuHeight > window.innerHeight) top = rect.top - menuHeight - 4;
            if (left < 8) left = 8;
            menu.style.top = top + 'px';
            menu.style.left = left + 'px';
            menu.style.right = 'auto';
        }
    }

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(el => {
                el.classList.add('hidden');
                el.style.position = '';
                el.style.top = '';
                el.style.left = '';
                el.style.right = '';
            });
        }
    });

    document.addEventListener('scroll', function() {
        document.querySelectorAll('.dropdown-menu:not(.hidden)').forEach(el => {
            el.classList.add('hidden');
            el.style.position = '';
            el.style.top = '';
            el.style.left = '';
            el.style.right = '';
        });
    }, true);
</script>
