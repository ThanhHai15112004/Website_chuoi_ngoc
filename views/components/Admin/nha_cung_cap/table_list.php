<?php
// views/components/Admin/nha_cung_cap/table_list.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[1300px]">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                    <th class="py-3 px-4 font-semibold w-12 text-center">
                        <input type="checkbox" id="checkAll" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20" onchange="toggleAll(this)">
                    </th>
                    <th class="py-3 px-4 font-semibold">Nhà cung cấp</th>
                    <th class="py-3 px-4 font-semibold">Liên hệ</th>
                    <th class="py-3 px-4 font-semibold">Nhóm hàng</th>
                    <th class="py-3 px-4 font-semibold text-center w-28">Tổng đơn</th>
                    <th class="py-3 px-4 font-semibold text-right w-36">Tổng giá trị</th>
                    <th class="py-3 px-4 font-semibold text-right w-36">Công nợ</th>
                    <th class="py-3 px-4 font-semibold text-center w-24">Đánh giá</th>
                    <th class="py-3 px-4 font-semibold text-center w-36">Trạng thái</th>
                    <th class="py-3 px-4 font-semibold text-right w-16"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php foreach ($danhSachNCC as $ncc): ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-3 px-4 text-center">
                            <input type="checkbox" class="ncc-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20" value="<?= $ncc['id'] ?>" onchange="toggleRow(this)">
                        </td>
                        
                        <!-- 1. Cột nhà cung cấp -->
                        <td class="py-3 px-4">
                            <div class="flex flex-col">
                                <a href="javascript:void(0)" onclick="openDrawer('<?= $ncc['id'] ?>')" class="font-bold text-gray-900 hover:text-[#6B0D18] transition-colors text-sm"><?= $ncc['ten'] ?></a>
                                <div class="flex items-center gap-2 mt-1">
                                    <span class="text-xs font-medium text-[#6B0D18] bg-red-50 px-1.5 py-0.5 rounded cursor-pointer" title="Mã nhà cung cấp" onclick="navigator.clipboard.writeText('<?= $ncc['id'] ?>')">
                                        <?= $ncc['id'] ?>
                                    </span>
                                    <span class="text-xs text-gray-500">&bull; <?= $ncc['loai'] ?> &bull; <?= $ncc['khu_vuc'] ?></span>
                                </div>
                            </div>
                        </td>

                        <!-- 2. Cột Liên hệ -->
                        <td class="py-3 px-4">
                            <div class="text-sm">
                                <?php if(!empty($ncc['nguoi_lien_he'])): ?>
                                    <div class="font-medium text-gray-800"><?= $ncc['nguoi_lien_he'] ?> <span class="text-xs text-gray-500 font-normal">(<?= $ncc['chuc_vu'] ?>)</span></div>
                                    <div class="text-gray-500 mt-0.5 group flex items-center gap-1">
                                        <?= $ncc['sdt'] ?>
                                        <button class="text-gray-400 hover:text-[#6B0D18] opacity-0 group-hover:opacity-100 transition-opacity"><span class="iconify text-xs" data-icon="mdi:content-copy"></span></button>
                                    </div>
                                <?php else: ?>
                                    <span class="inline-flex items-center gap-1 bg-gray-100 text-gray-500 text-xs px-2 py-1 rounded">Chưa cập nhật</span>
                                <?php endif; ?>
                            </div>
                        </td>

                        <!-- 3. Nhóm hàng -->
                        <td class="py-3 px-4">
                            <div class="flex flex-wrap gap-1">
                                <?php 
                                    $count = count($ncc['nhom_hang']);
                                    if ($count > 0): 
                                        for($i=0; $i < min(2, $count); $i++):
                                ?>
                                    <span class="inline-block bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded border border-gray-200"><?= $ncc['nhom_hang'][$i] ?></span>
                                <?php 
                                        endfor;
                                        if ($count > 2):
                                ?>
                                    <span class="inline-block bg-gray-50 text-gray-500 text-xs px-2 py-1 rounded border border-gray-200 cursor-help" title="<?= implode(', ', $ncc['nhom_hang']) ?>">+<?= $count - 2 ?></span>
                                <?php 
                                        endif;
                                    else: 
                                ?>
                                    <span class="text-xs text-gray-400 italic">Chưa phân loại</span>
                                <?php endif; ?>
                            </div>
                        </td>

                        <!-- 4. Lịch sử nhập & Tổng đơn -->
                        <td class="py-3 px-4 text-center">
                            <div class="font-bold text-gray-900 text-sm"><?= $ncc['tong_phieu'] ?> <span class="font-normal text-xs text-gray-500">phiếu</span></div>
                            <?php if($ncc['lan_nhap_gan_nhat']): ?>
                                <div class="text-[11px] text-gray-500 mt-1" title="Phiếu gần nhất: <?= $ncc['phieu_nhap_gan_nhat'] ?>"><?= $ncc['lan_nhap_gan_nhat'] ?></div>
                            <?php else: ?>
                                <div class="text-[11px] text-gray-400 mt-1">-</div>
                            <?php endif; ?>
                        </td>

                        <!-- 5. Tổng giá trị -->
                        <td class="py-3 px-4 text-right">
                            <?php if($ncc['tong_gia_tri'] > 0): ?>
                                <span class="font-bold text-[#6B0D18] text-sm"><?= number_format($ncc['tong_gia_tri'], 0, ',', '.') ?>đ</span>
                            <?php else: ?>
                                <span class="text-sm text-gray-400">0đ</span>
                            <?php endif; ?>
                        </td>

                        <!-- 6. Công nợ -->
                        <td class="py-3 px-4 text-right">
                            <?php if($ncc['cong_no'] > 0): ?>
                                <?php $isOverdue = strpos($ncc['han_no'], '20/05') !== false; // Mock data check quá hạn ?>
                                <div class="font-bold <?= $isOverdue ? 'text-rose-600' : 'text-amber-600' ?> text-sm"><?= number_format($ncc['cong_no'], 0, ',', '.') ?>đ</div>
                                <div class="text-[11px] <?= $isOverdue ? 'text-rose-500 font-medium' : 'text-gray-500' ?> mt-0.5">Hạn: <?= $ncc['han_no'] ?> <?= $isOverdue ? '(Quá hạn)' : '' ?></div>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 bg-emerald-50 text-emerald-600 text-[11px] px-2 py-0.5 rounded font-medium border border-emerald-100">Không nợ</span>
                            <?php endif; ?>
                        </td>

                        <!-- 7. Đánh giá -->
                        <td class="py-3 px-4 text-center">
                            <?php if($ncc['danh_gia'] > 0): ?>
                                <div class="flex items-center justify-center gap-1 text-sm font-bold <?= $ncc['danh_gia'] < 3 ? 'text-amber-600' : 'text-gray-800' ?>">
                                    <span class="iconify <?= $ncc['danh_gia'] < 3 ? 'text-amber-500' : 'text-yellow-400' ?> text-lg" data-icon="mdi:star"></span>
                                    <?= number_format($ncc['danh_gia'], 1) ?>
                                </div>
                            <?php else: ?>
                                <span class="text-xs text-gray-400 italic">Chưa đánh giá</span>
                            <?php endif; ?>
                        </td>

                        <!-- 8. Trạng thái -->
                        <td class="py-3 px-4 text-center">
                            <?php
                                $badgeClass = '';
                                switch ($ncc['trang_thai']) {
                                    case 'Đang hợp tác':
                                        $badgeClass = 'bg-emerald-50 text-emerald-700 border border-emerald-200';
                                        break;
                                    case 'Tạm ngừng':
                                        $badgeClass = 'bg-amber-50 text-amber-700 border border-amber-200';
                                        break;
                                    case 'Ngừng hợp tác':
                                        $badgeClass = 'bg-gray-100 text-gray-600 border border-gray-200';
                                        break;
                                    case 'Chờ xác minh':
                                        $badgeClass = 'bg-blue-50 text-blue-700 border border-blue-200';
                                        break;
                                }
                            ?>
                            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-xs font-semibold <?= $badgeClass ?>">
                                <?= $ncc['trang_thai'] ?>
                            </span>
                        </td>

                        <!-- 9. Thao tác -->
                        <td class="py-3 px-4 text-right">
                            <div class="relative inline-block text-left dropdown-container">
                                <button type="button" class="p-1.5 text-gray-400 hover:text-gray-700 rounded-lg hover:bg-gray-100 transition-colors focus:outline-none" onclick="toggleDropdown(this)">
                                    <span class="iconify text-xl" data-icon="mdi:dots-vertical"></span>
                                </button>
                                <div class="dropdown-menu hidden absolute right-0 z-10 mt-1 w-48 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none border border-gray-100 overflow-hidden">
                                    <div class="py-1">
                                        <a href="javascript:void(0)" onclick="openDrawer('<?= $ncc['id'] ?>')" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors font-medium">
                                            <span class="iconify text-lg text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết
                                        </a>
                                        <a href="<?= APP_URL ?>/admin/nha-cung-cap/sua/<?= $ncc['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                            <span class="iconify text-lg text-gray-400" data-icon="mdi:pencil-outline"></span> Sửa thông tin
                                        </a>
                                        
                                        <div class="border-t border-gray-100 my-1"></div>
                                        
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                            <span class="iconify text-lg text-blue-500" data-icon="mdi:truck-plus-outline"></span> Tạo phiếu nhập
                                        </a>
                                        <?php if($ncc['cong_no'] > 0): ?>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                                <span class="iconify text-lg text-emerald-500" data-icon="mdi:cash-check"></span> Trả công nợ
                                            </a>
                                        <?php endif; ?>
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors">
                                            <span class="iconify text-lg text-yellow-500" data-icon="mdi:star-outline"></span> Đánh giá NCC
                                        </a>
                                        
                                        <div class="border-t border-gray-100 my-1"></div>
                                        
                                        <?php if($ncc['trang_thai'] === 'Đang hợp tác'): ?>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-amber-600 hover:bg-amber-50 transition-colors font-medium">
                                                <span class="iconify text-lg" data-icon="mdi:pause-circle-outline"></span> Tạm ngừng
                                            </a>
                                        <?php elseif($ncc['trang_thai'] === 'Tạm ngừng'): ?>
                                            <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50 transition-colors font-medium">
                                                <span class="iconify text-lg" data-icon="mdi:play-circle-outline"></span> Kích hoạt lại
                                            </a>
                                        <?php endif; ?>
                                        
                                        <a href="javascript:void(0)" onclick="openModal('modalDelete')" class="flex items-center gap-2 px-4 py-2 text-sm text-rose-600 hover:bg-rose-50 transition-colors font-medium">
                                            <span class="iconify text-lg" data-icon="mdi:trash-can-outline"></span> Xóa
                                        </a>
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
            Hiển thị <span class="font-medium text-gray-900">1</span> đến <span class="font-medium text-gray-900"><?= count($danhSachNCC) ?></span> trong tổng số <span class="font-medium text-gray-900"><?= $stats['tong'] ?></span> NCC
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
    // Dropdown toggle logic
    function toggleDropdown(button) {
        const menu = button.nextElementSibling;
        
        // Đóng tất cả menu khác
        document.querySelectorAll('.dropdown-menu').forEach(el => {
            if (el !== menu) {
                el.classList.add('hidden');
            }
        });

        menu.classList.toggle('hidden');
    }

    // Đóng menu khi click ra ngoài
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown-container')) {
            document.querySelectorAll('.dropdown-menu').forEach(el => {
                el.classList.add('hidden');
            });
        }
    });
</script>
