<?php
// views/components/Admin/kiem_ke/table_list.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
    
    <!-- Table Wrapper cho cuộn ngang -->
    <div class="overflow-x-auto min-h-[400px]">
        <table class="w-full text-left border-collapse min-w-[1400px]">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase tracking-wider text-gray-500">
                    <th class="py-3 px-4 font-semibold w-10 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20"></th>
                    <th class="py-3 px-4 font-semibold">Mã Phiếu</th>
                    <th class="py-3 px-4 font-semibold">Kho Kiểm Kê</th>
                    <th class="py-3 px-4 font-semibold">Loại</th>
                    <th class="py-3 px-4 font-semibold text-center">SP Kiểm Kê</th>
                    <th class="py-3 px-4 font-semibold text-center">Chênh Lệch</th>
                    <th class="py-3 px-4 font-semibold">Người Tạo</th>
                    <th class="py-3 px-4 font-semibold">Người Kiểm Kê</th>
                    <th class="py-3 px-4 font-semibold">Người Duyệt</th>
                    <th class="py-3 px-4 font-semibold">Ngày Tạo</th>
                    <th class="py-3 px-4 font-semibold">Hạn Hoàn Tất</th>
                    <th class="py-3 px-4 font-semibold text-center">Trạng Thái</th>
                    <th class="py-3 px-4 font-semibold text-right">Thao Tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php foreach ($danhSachKK as $kk): ?>
                    <tr class="hover:bg-gray-50/70 transition-colors group">
                        <td class="py-3 px-4 text-center">
                            <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20">
                        </td>
                        
                        <!-- 1. Mã phiếu -->
                        <td class="py-3 px-4">
                            <a href="<?= APP_URL ?>/admin/kiem-ke/chi-tiet/<?= $kk['id'] ?>" class="font-bold text-[#6B0D18] hover:underline text-sm"><?= $kk['id'] ?></a>
                            <?php if(isset($kk['gap']) && $kk['gap']): ?>
                                <span class="ml-1 inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-bold bg-red-100 text-red-700">GẤP</span>
                            <?php endif; ?>
                        </td>
                        
                        <!-- 2. Kho kiểm kê -->
                        <td class="py-3 px-4">
                            <div class="font-medium text-gray-900 text-sm flex items-center gap-1.5">
                                <span class="iconify text-gray-400" data-icon="mdi:warehouse"></span> <?= $kk['kho'] ?>
                            </div>
                        </td>
                        
                        <!-- 3. Loại -->
                        <td class="py-3 px-4">
                            <?php 
                                $loaiBg = 'bg-gray-100 text-gray-600';
                                if($kk['loai'] == 'Toàn kho') $loaiBg = 'bg-red-50 text-red-600';
                                else if($kk['loai'] == 'Định kỳ') $loaiBg = 'bg-blue-50 text-blue-600';
                                else if($kk['loai'] == 'Ngẫu nhiên') $loaiBg = 'bg-amber-50 text-amber-600';
                            ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium <?= $loaiBg ?>">
                                <?= $kk['loai'] ?>
                            </span>
                        </td>
                        
                        <!-- 4. Số SP -->
                        <td class="py-3 px-4 text-center">
                            <span class="font-bold text-gray-900"><?= $kk['so_sp'] ?></span> <span class="text-xs text-gray-500">sp</span>
                        </td>
                        
                        <!-- 5. Chênh lệch -->
                        <td class="py-3 px-4 text-center">
                            <?php if ($kk['so_sai_lech'] < 0): ?>
                                <span class="inline-flex items-center justify-center gap-1 min-w-[80px] font-bold text-red-700 bg-red-50 border border-red-100 px-2 py-1 rounded-md text-xs">
                                    <span class="iconify" data-icon="mdi:trending-down"></span> Thiếu <?= abs($kk['so_sai_lech']) ?>
                                </span>
                            <?php elseif ($kk['so_sai_lech'] > 0): ?>
                                <span class="inline-flex items-center justify-center gap-1 min-w-[80px] font-bold text-blue-700 bg-blue-50 border border-blue-100 px-2 py-1 rounded-md text-xs">
                                    <span class="iconify" data-icon="mdi:trending-up"></span> Thừa <?= $kk['so_sai_lech'] ?>
                                </span>
                            <?php else: ?>
                                <?php if($kk['trang_thai'] === 'Nháp' || $kk['trang_thai'] === 'Đang kiểm kê'): ?>
                                    <span class="text-xs text-gray-400">-</span>
                                <?php else: ?>
                                    <span class="inline-flex items-center justify-center gap-1 min-w-[80px] font-bold text-emerald-700 bg-emerald-50 border border-emerald-100 px-2 py-1 rounded-md text-xs">
                                        <span class="iconify" data-icon="mdi:check"></span> Khớp
                                    </span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        
                        <!-- 6. Người tạo -->
                        <td class="py-3 px-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-[10px] font-bold text-gray-600 shrink-0">
                                    <?= mb_substr($kk['nguoi_tao'], 0, 1) ?>
                                </div>
                                <span class="text-sm font-medium text-gray-700 truncate max-w-[120px]"><?= $kk['nguoi_tao'] ?></span>
                            </div>
                        </td>
                        
                        <!-- 7. Người kiểm kê -->
                        <td class="py-3 px-4">
                            <?php if($kk['nguoi_kiem_ke'] === 'Chưa gán'): ?>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-amber-50 text-amber-600 border border-amber-100">Chưa gán</span>
                            <?php else: ?>
                                <span class="text-sm font-medium text-gray-700"><?= $kk['nguoi_kiem_ke'] ?></span>
                            <?php endif; ?>
                        </td>

                        <!-- 8. Người duyệt -->
                        <td class="py-3 px-4">
                            <?php if($kk['nguoi_duyet'] === 'Chưa duyệt'): ?>
                                <span class="text-xs text-gray-400 italic">Chưa duyệt</span>
                            <?php else: ?>
                                <span class="text-sm font-medium text-gray-900"><?= $kk['nguoi_duyet'] ?></span>
                            <?php endif; ?>
                        </td>
                        
                        <!-- 9. Ngày tạo -->
                        <td class="py-3 px-4">
                            <div class="text-sm font-medium text-gray-900"><?= $kk['ngay_tao'] ?></div>
                            <div class="text-xs text-gray-500"><?= $kk['gio_tao'] ?></div>
                        </td>

                        <!-- 10. Hạn hoàn tất -->
                        <td class="py-3 px-4">
                            <?php 
                                $isQuaHan = false; // Mock logic, should compare with today
                                if($kk['id'] === 'KK202600121') $isQuaHan = true;
                            ?>
                            <?php if($isQuaHan && $kk['trang_thai'] !== 'Hoàn tất' && $kk['trang_thai'] !== 'Đã hủy'): ?>
                                <span class="text-sm font-bold text-red-600"><?= $kk['han_hoan_tat'] ?></span>
                                <div class="text-[10px] text-red-500 font-medium">Quá hạn</div>
                            <?php else: ?>
                                <span class="text-sm text-gray-600"><?= $kk['han_hoan_tat'] ?></span>
                            <?php endif; ?>
                        </td>
                        
                        <!-- 11. Trạng thái -->
                        <td class="py-3 px-4 text-center">
                            <?php 
                                $statusClass = 'bg-gray-100 text-gray-700';
                                if ($kk['trang_thai'] === 'Nháp') $statusClass = 'bg-gray-100 text-gray-600 border border-gray-200';
                                elseif ($kk['trang_thai'] === 'Đang kiểm kê') $statusClass = 'bg-blue-50 text-blue-700 border border-blue-200';
                                elseif ($kk['trang_thai'] === 'Chờ duyệt') $statusClass = 'bg-amber-50 text-amber-700 border border-amber-200';
                                elseif ($kk['trang_thai'] === 'Hoàn tất') $statusClass = 'bg-emerald-50 text-emerald-700 border border-emerald-200';
                                elseif ($kk['trang_thai'] === 'Đã hủy') $statusClass = 'bg-gray-100 text-gray-400 border border-gray-200 line-through';
                            ?>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-[11px] font-bold uppercase tracking-wide w-full justify-center <?= $statusClass ?>">
                                <?= $kk['trang_thai'] ?>
                            </span>
                        </td>
                        
                        <!-- 12. Thao tác -->
                        <td class="py-3 px-4 text-right">
                            <div class="relative inline-block text-left dropdown-container">
                                <button type="button" class="p-1.5 text-gray-400 hover:text-gray-700 rounded-lg hover:bg-gray-100 transition-colors focus:outline-none" onclick="toggleDropdown(this)">
                                    <span class="iconify text-xl" data-icon="mdi:dots-vertical"></span>
                                </button>
                                <div class="dropdown-menu hidden absolute right-0 z-50 mt-1 w-48 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none border border-gray-100 overflow-hidden">
                                    <div class="py-1">
                                        <?php if($kk['trang_thai'] === 'Nháp' || $kk['trang_thai'] === 'Đang kiểm kê'): ?>
                                            <a href="<?= APP_URL ?>/admin/kiem-ke/chi-tiet/<?= $kk['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                                <span class="iconify text-lg text-blue-600" data-icon="mdi:play-circle-outline"></span> Tiếp tục
                                            </a>
                                        <?php elseif($kk['trang_thai'] === 'Chờ duyệt'): ?>
                                            <a href="<?= APP_URL ?>/admin/kiem-ke/chi-tiet/<?= $kk['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                                <span class="iconify text-lg text-amber-500" data-icon="mdi:shield-check-outline"></span> Duyệt phiếu
                                            </a>
                                        <?php else: ?>
                                            <a href="<?= APP_URL ?>/admin/kiem-ke/chi-tiet/<?= $kk['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                                <span class="iconify text-lg text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết
                                            </a>
                                        <?php endif; ?>
                                        
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                            <span class="iconify text-lg text-gray-400" data-icon="mdi:printer-outline"></span> In biên bản
                                        </a>
                                        
                                        <?php if($kk['trang_thai'] === 'Nháp' || $kk['trang_thai'] === 'Đang kiểm kê'): ?>
                                            <div class="border-t border-gray-100 my-1"></div>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors font-medium">
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
    <div class="p-4 border-t border-gray-200 bg-gray-50 flex items-center justify-between">
        <div class="text-sm text-gray-500">
            Hiển thị <span class="font-medium text-gray-900">1</span> đến <span class="font-medium text-gray-900">5</span> trong tổng số <span class="font-medium text-gray-900"><?= $stats['tat_ca'] ?></span> phiếu
        </div>
        <div class="flex items-center gap-1">
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed bg-white">
                <span class="iconify" data-icon="mdi:chevron-left"></span>
            </button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#6B0D18] text-white font-medium text-sm shadow-sm">1</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">2</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">3</button>
            <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors bg-white">
                <span class="iconify" data-icon="mdi:chevron-right"></span>
            </button>
        </div>
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
            const menuWidth = menu.offsetWidth || 192;
            const menuHeight = menu.offsetHeight || 200;
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
