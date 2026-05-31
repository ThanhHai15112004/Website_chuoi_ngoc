<div class="overflow-x-auto min-h-[400px]">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-50 border-b border-gray-200 text-xs uppercase text-gray-500">
                <th class="py-3 px-4 w-10"><input type="checkbox" class="rounded text-red-900 focus:ring-red-900 border-gray-300"></th>
                <th class="py-3 px-4">Sản phẩm</th>
                <th class="py-3 px-4">Biến thể</th>
                <th class="py-3 px-4 text-center">Trạng thái kho</th>
                <th class="py-3 px-4 text-center">Tồn kho</th>
                <th class="py-3 px-4 text-center">Cảnh báo</th>
                <th class="py-3 px-4 text-center">Đã bán 30 ngày</th>
                <th class="py-3 px-4">Cập nhật gần nhất</th>
                <th class="py-3 px-4 text-center">Thao tác</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php foreach ($inventoryProducts as $p): ?>
                <tr class="hover:bg-gray-50/50 transition-colors group">
                    <td class="py-3 px-4"><input type="checkbox" class="rounded text-red-900 focus:ring-red-900 border-gray-300"></td>
                    <td class="py-3 px-4">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center shrink-0 overflow-hidden">
                                <?php if (!empty($p['image']) && $p['image'] !== 'images/placeholder.jpg'): ?>
                                    <img src="<?= APP_URL ?>/<?= htmlspecialchars($p['image']) ?>" alt="<?= htmlspecialchars($p['name']) ?>" class="w-full h-full object-cover">
                                <?php else: ?>
                                    <span class="iconify text-gray-400 text-2xl" data-icon="mdi:image-outline"></span>
                                <?php endif; ?>
                            </div>
                            <div>
                                <div class="font-bold text-gray-900 line-clamp-1 hover:text-red-900 cursor-pointer"><?= $p['name'] ?></div>
                                <div class="text-xs text-gray-500 mt-0.5 flex items-center gap-2">
                                    <span class="font-mono text-gray-400">#<?= $p['sku'] ?></span>
                                    <span>•</span>
                                    <span><?= $p['category'] ?></span>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 bg-gray-100 text-gray-600 rounded text-xs"><?= $p['variant'] ?></span>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <?php if ($p['status'] === 'Còn hàng'): ?>
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 bg-emerald-50 text-emerald-700 rounded-md text-xs font-medium">
                                Còn hàng
                            </span>
                        <?php elseif ($p['status'] === 'Sắp hết hàng'): ?>
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 bg-amber-50 text-amber-700 rounded-md text-xs font-medium">
                                Sắp hết
                            </span>
                        <?php elseif ($p['status'] === 'Hết hàng'): ?>
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 bg-red-50 text-red-700 rounded-md text-xs font-medium">
                                Hết hàng
                            </span>
                        <?php elseif ($p['status'] === 'Tồn kho cao'): ?>
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 bg-purple-50 text-purple-700 rounded-md text-xs font-medium">
                                Tồn kho cao
                            </span>
                        <?php elseif ($p['status'] === 'Lỗi kho'): ?>
                            <span class="inline-flex items-center gap-1.5 px-2 py-1 bg-red-100 text-red-800 rounded-md text-xs font-bold border border-red-200">
                                <span class="iconify" data-icon="mdi:alert"></span> Lỗi kho
                            </span>
                        <?php endif; ?>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <span class="inline-block px-3 py-1.5 bg-gray-50 border border-gray-200 rounded-lg text-lg font-bold <?= $p['stock_current'] <= 0 ? 'text-red-600' : 'text-gray-900' ?>">
                            <?= $p['stock_current'] ?> <span class="text-xs font-normal text-gray-500"><?= htmlspecialchars($p['don_vi_tinh'] ?? '') ?></span>
                        </span>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <div class="text-xs text-gray-500">Ngưỡng: <?= $p['stock_threshold'] ?></div>
                        <?php if ($p['stock_current'] < $p['stock_threshold'] && $p['stock_current'] >= 0): ?>
                            <div class="text-[10px] text-amber-600 font-medium mt-0.5 flex items-center justify-center gap-1">
                                <span class="iconify" data-icon="mdi:alert-outline"></span> Dưới ngưỡng
                            </div>
                        <?php endif; ?>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <div class="font-bold text-gray-900"><?= $p['sales_30d'] ?> <span class="text-xs text-gray-500 font-normal">sp</span></div>
                        <div class="text-xs text-gray-500 mt-0.5">
                            <?php if ($p['expected_out'] === 0 && $p['stock_current'] <= 0): ?>
                                <span class="text-red-500">Đã hết hàng</span>
                            <?php elseif ($p['expected_out'] > 0 && $p['expected_out'] <= 14): ?>
                                <span class="text-amber-500">Dự kiến <?= $p['expected_out'] ?> ngày</span>
                            <?php elseif ($p['expected_out'] === 999): ?>
                                <span>Bán chậm</span>
                            <?php else: ?>
                                <span>Dự kiến <?= $p['expected_out'] ?> ngày</span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="py-3 px-4">
                        <div class="text-xs text-gray-900"><?= $p['last_updated'] ?></div>
                        <div class="text-xs text-gray-500 mt-0.5"><?= $p['updated_by'] ?></div>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <div class="flex items-center justify-center gap-2">
                            <button onclick="openDrawer('historyDrawer')" class="w-8 h-8 rounded-lg bg-gray-50 border border-gray-200 text-gray-600 hover:bg-gray-100 hover:text-[#6B0D18] flex items-center justify-center transition-colors" title="Lịch sử kho">
                                <span class="iconify" data-icon="mdi:history"></span>
                            </button>
                            <div class="relative action-dropdown">
                                <button onclick="toggleDropdown(this)" class="w-8 h-8 rounded-lg bg-gray-50 border border-gray-200 text-gray-600 hover:bg-gray-100 flex items-center justify-center transition-colors">
                                    <span class="iconify" data-icon="mdi:dots-vertical"></span>
                                </button>
                                <div class="dropdown-menu hidden absolute right-0 top-full mt-1 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50 py-1">
                                    <a href="<?= APP_URL ?>/admin/nhap-kho/them?variant_id=<?= $p['variant_id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-900">
                                        <span class="iconify text-lg" data-icon="mdi:tray-arrow-down"></span> Nhập kho sản phẩm này
                                    </a>
                                    <a href="<?= APP_URL ?>/admin/xuat-kho/them?variant_id=<?= $p['variant_id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-900">
                                        <span class="iconify text-lg" data-icon="mdi:tray-arrow-up"></span> Xuất kho
                                    </a>
                                    <button type="button" onclick="openAdjustmentModal('<?= $p['variant_id'] ?>', '<?= htmlspecialchars(addslashes($p['name'] . ' - ' . $p['variant'])) ?>', <?= $p['stock_current'] ?>)" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-red-900">
                                        <span class="iconify text-lg" data-icon="mdi:tune"></span> Điều chỉnh sai lệch
                                    </button>
                                    <hr class="my-1 border-gray-100">
                                    <a href="<?= APP_URL ?>/admin/san-pham/chi-tiet/<?= $p['product_id'] ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                        <span class="iconify text-lg" data-icon="mdi:eye-outline"></span> Xem trang sản phẩm
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
<?php
$currentPage = $pagination['current_page'] ?? 1;
$lastPage = $pagination['last_page'] ?? 1;
$total = $pagination['total'] ?? 0;
$perPage = $pagination['per_page'] ?? 20;

$startItem = ($currentPage - 1) * $perPage + 1;
if ($total == 0) $startItem = 0;
$endItem = min($currentPage * $perPage, $total);

$queryParams = $_GET;
unset($queryParams['page']);
$queryString = !empty($queryParams) ? '&' . http_build_query($queryParams) : '';
$baseUrl = APP_URL . '/admin/ton-kho?';
?>
<div class="p-4 border-t border-gray-200 bg-white flex flex-col sm:flex-row items-center justify-between gap-4">
    <div class="text-sm text-gray-500">
        Hiển thị <span class="font-medium text-gray-900"><?= $startItem ?></span> đến <span class="font-medium text-gray-900"><?= $endItem ?></span> trong tổng số <span class="font-medium text-gray-900"><?= $total ?></span> sản phẩm
    </div>
    
    <?php if ($lastPage > 1): ?>
    <div class="flex items-center gap-1">
        <?php if ($currentPage > 1): ?>
            <a href="<?= $baseUrl . 'page=' . ($currentPage - 1) . $queryString ?>" class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
                <span class="iconify" data-icon="mdi:chevron-left"></span>
            </a>
        <?php else: ?>
            <button disabled class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed">
                <span class="iconify" data-icon="mdi:chevron-left"></span>
            </button>
        <?php endif; ?>

        <?php
        $window = 2;
        for ($i = 1; $i <= $lastPage; $i++) {
            if ($i == 1 || $i == $lastPage || ($i >= $currentPage - $window && $i <= $currentPage + $window)) {
                if ($i == $currentPage) {
                    echo '<span class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#6B0D18] text-white font-medium text-sm shadow-sm">' . $i . '</span>';
                } else {
                    echo '<a href="' . $baseUrl . 'page=' . $i . $queryString . '" class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">' . $i . '</a>';
                }
            } elseif ($i == $currentPage - $window - 1 || $i == $currentPage + $window + 1) {
                echo '<span class="w-8 h-8 flex items-center justify-center text-gray-500">...</span>';
            }
        }
        ?>

        <?php if ($currentPage < $lastPage): ?>
            <a href="<?= $baseUrl . 'page=' . ($currentPage + 1) . $queryString ?>" class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
                <span class="iconify" data-icon="mdi:chevron-right"></span>
            </a>
        <?php else: ?>
            <button disabled class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed">
                <span class="iconify" data-icon="mdi:chevron-right"></span>
            </button>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>
