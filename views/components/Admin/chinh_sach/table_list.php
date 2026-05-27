<?php
// views/components/Admin/chinh_sach/table_list.php
?>
<div class="overflow-x-auto">
    <table class="w-full text-left border-collapse min-w-[1000px]">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-200 text-xs text-gray-500 uppercase tracking-wider">
                <th class="px-6 py-3 w-10 text-center">
                    <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" onchange="toggleSelectAll(this)">
                </th>
                <th class="px-6 py-3 font-medium">Tên & Loại chính sách</th>
                <th class="px-6 py-3 font-medium">Đường dẫn (Slug)</th>
                <th class="px-6 py-3 font-medium">Vị trí hiển thị</th>
                <th class="px-6 py-3 font-medium text-center">Trạng thái</th>
                <th class="px-6 py-3 font-medium text-center">SEO</th>
                <th class="px-6 py-3 font-medium">Cập nhật lúc</th>
                <th class="px-6 py-3 font-medium text-right">Thao tác</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php foreach($policies as $p): ?>
            <tr class="hover:bg-gray-50 transition-colors group">
                <td class="px-6 py-4 text-center">
                    <input type="checkbox" class="policy-checkbox rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" onchange="updateBulkAction()">
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-start gap-3">
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="font-bold text-gray-900 cursor-pointer hover:text-[#6B0D18] transition-colors" onclick="openQuickView(<?= $p['id'] ?>)"><?= $p['name'] ?></span>
                                <?php if(in_array($p['type'], ['Đổi trả', 'Bảo hành', 'Thanh toán', 'Bảo mật'])): ?>
                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-700">Quan trọng</span>
                                <?php endif; ?>
                            </div>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-medium bg-gray-100 text-gray-600 border border-gray-200">
                                <?= $p['type'] ?>
                            </span>
                        </div>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center gap-2 text-sm text-gray-600">
                        <span class="max-w-[150px] truncate" title="/chinh-sach/<?= $p['slug'] ?>">/chinh-sach/<?= $p['slug'] ?></span>
                        <button class="text-gray-400 hover:text-blue-600 tooltip" title="Copy link"><span class="iconify" data-icon="mdi:content-copy"></span></button>
                        <button class="text-gray-400 hover:text-blue-600 tooltip" title="Mở link"><span class="iconify" data-icon="mdi:open-in-new"></span></button>
                    </div>
                </td>
                <td class="px-6 py-4">
                    <?php if(empty($p['locations'])): ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200">Chưa gắn vị trí</span>
                    <?php else: ?>
                        <div class="flex flex-wrap gap-1">
                            <?php foreach($p['locations'] as $loc): ?>
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100"><?= $loc ?></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </td>
                <td class="px-6 py-4 text-center">
                    <?php
                        $statusClass = '';
                        if($p['status'] == 'Đang hiển thị') $statusClass = 'bg-emerald-50 text-emerald-700 border-emerald-200';
                        else if($p['status'] == 'Đang ẩn' || $p['status'] == 'Bản nháp') $statusClass = 'bg-gray-100 text-gray-600 border-gray-200';
                        else if($p['status'] == 'Cần cập nhật') $statusClass = 'bg-amber-50 text-amber-700 border-amber-200';
                    ?>
                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold border <?= $statusClass ?>">
                        <?= $p['status'] ?>
                    </span>
                </td>
                <td class="px-6 py-4 text-center">
                    <?php
                        $seoColor = 'text-emerald-500';
                        if($p['seo'] == 'Cần tối ưu') $seoColor = 'text-amber-500';
                        else if($p['seo'] == 'Thiếu meta') $seoColor = 'text-red-500';
                        else if($p['seo'] == 'Chưa kiểm tra') $seoColor = 'text-gray-400';
                    ?>
                    <span class="iconify text-xl mx-auto tooltip <?= $seoColor ?>" data-icon="<?= $p['seo'] == 'Tốt' ? 'mdi:check-circle' : 'mdi:alert-circle' ?>" title="<?= $p['seo'] ?>"></span>
                </td>
                <td class="px-6 py-4">
                    <div class="text-sm font-medium text-gray-900 mb-0.5"><?= $p['updated_at'] ?></div>
                    <div class="text-xs text-gray-500 flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:account-outline"></span> <?= $p['updater'] ?>
                    </div>
                </td>
                <td class="px-6 py-4 text-right">
                    <div class="relative inline-block text-left dropdown-container">
                        <button onclick="toggleActionMenu(<?= $p['id'] ?>)" class="w-8 h-8 rounded-lg bg-gray-100 text-gray-600 hover:bg-gray-200 flex items-center justify-center transition-colors">
                            <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                        </button>
                        
                        <!-- Dropdown menu -->
                        <div id="actionMenu-<?= $p['id'] ?>" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-xl bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                            <div class="py-1">
                                <button onclick="openQuickView(<?= $p['id'] ?>)" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 text-left">
                                    <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem nhanh
                                </button>
                                <a href="<?= APP_URL ?>/admin/chinh-sach/sua/<?= $p['id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                    <span class="iconify text-gray-400" data-icon="mdi:pencil-outline"></span> Chỉnh sửa
                                </a>
                                <button class="flex items-center gap-2 w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 text-left">
                                    <span class="iconify text-gray-400" data-icon="mdi:content-copy"></span> Nhân bản
                                </button>
                                <hr class="my-1 border-gray-100">
                                <button class="flex items-center gap-2 w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 text-left">
                                    <span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn hiển thị
                                </button>
                                <button class="flex items-center gap-2 w-full px-4 py-2 text-sm text-red-600 hover:bg-red-50 text-left group">
                                    <span class="iconify text-red-500 group-hover:text-red-600" data-icon="mdi:trash-can-outline"></span> Xóa
                                </button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
