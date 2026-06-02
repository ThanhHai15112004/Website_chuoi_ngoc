<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="p-5 border-b border-gray-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h3 class="text-lg font-bold text-gray-800">Bảng chi tiết toàn bộ sản phẩm</h3>
            <p class="text-sm text-gray-500 mt-1">Chi tiết doanh thu, tồn kho và trạng thái của từng sản phẩm.</p>
        </div>
        <div class="flex items-center gap-2">
            <form method="GET" action="<?= APP_URL ?>/admin/bao-cao-san-pham" class="relative">
                <input type="hidden" name="thoiGian" value="<?= $params['thoiGian'] ?>">
                <input type="hidden" name="tuNgay" value="<?= $params['tuNgay'] ?>">
                <input type="hidden" name="denNgay" value="<?= $params['denNgay'] ?>">
                <?php if (!empty($filters['danh_muc'])): ?><input type="hidden" name="danh_muc" value="<?= $filters['danh_muc'] ?>"><?php endif; ?>
                <?php if (!empty($filters['loai_da'])): ?><input type="hidden" name="loai_da" value="<?= $filters['loai_da'] ?>"><?php endif; ?>
                <?php if (!empty($filters['menh'])): ?><input type="hidden" name="menh" value="<?= $filters['menh'] ?>"><?php endif; ?>
                <?php if (!empty($filters['hieu_qua'])): ?><input type="hidden" name="hieu_qua" value="<?= $filters['hieu_qua'] ?>"><?php endif; ?>
                
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" data-icon="mdi:magnify"></span>
                <input type="text" name="keyword" value="<?= htmlspecialchars($filters['keyword'] ?? '') ?>" placeholder="Tìm sản phẩm, mã SP..." class="pl-9 pr-4 py-1.5 border border-gray-200 rounded-lg text-sm w-48 focus:border-[#6B0D18] focus:ring-0 outline-none">
            </form>
            <button onclick="openExportModal()" class="px-3 py-1.5 border border-gray-200 rounded-lg text-sm text-[#6B0D18] hover:bg-red-50 flex items-center gap-1 font-medium whitespace-nowrap">
                <span class="iconify" data-icon="mdi:export"></span> Xuất Excel
            </button>
        </div>
    </div>
    
    <div class="overflow-x-auto">
        <?php if (empty($allProducts)): ?>
            <div class="flex flex-col items-center justify-center py-12">
                <span class="iconify text-gray-300 text-5xl mb-3" data-icon="mdi:package-variant-closed"></span>
                <p class="text-gray-500 font-medium">Không tìm thấy sản phẩm nào phù hợp với bộ lọc.</p>
                <a href="<?= APP_URL ?>/admin/bao-cao-san-pham" class="mt-4 px-4 py-2 bg-red-50 text-[#6B0D18] rounded-lg text-sm font-medium hover:bg-red-100 transition-colors">Xóa bộ lọc</a>
            </div>
        <?php else: ?>
        <table class="w-full text-left border-collapse min-w-[1200px]">
            <thead>
                <tr class="bg-gray-50 text-xs uppercase tracking-wider text-gray-500 font-medium">
                    <th class="py-3 px-4 w-10 text-center"><input type="checkbox" class="text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18]"></th>
                    <th class="py-3 px-4 w-16">Ảnh</th>
                    <th class="py-3 px-4">Sản phẩm</th>
                    <th class="py-3 px-4">Đá / Mệnh</th>
                    <th class="py-3 px-4 text-right">Giá bán</th>
                    <th class="py-3 px-4 text-center cursor-pointer hover:text-[#6B0D18]">Tồn kho <span class="iconify inline-block align-middle" data-icon="mdi:swap-vertical"></span></th>
                    <th class="py-3 px-4 text-center cursor-pointer hover:text-[#6B0D18]">Đã bán <span class="iconify inline-block align-middle" data-icon="mdi:swap-vertical"></span></th>
                    <th class="py-3 px-4 text-right cursor-pointer text-[#6B0D18]">Doanh thu <span class="iconify inline-block align-middle" data-icon="mdi:arrow-down"></span></th>
                    <th class="py-3 px-4 text-center">Trạng thái</th>
                    <th class="py-3 px-4 text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm">
                <?php foreach($allProducts as $p): ?>
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="py-3 px-4 text-center"><input type="checkbox" class="text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18]"></td>
                    <td class="py-3 px-4">
                        <?php if($p['anh']): ?>
                        <img src="<?= $p['anh'] ?>" alt="<?= $p['ten_sp'] ?>" class="w-10 h-10 rounded object-cover border border-gray-200">
                        <?php else: ?>
                        <div class="w-10 h-10 rounded bg-gray-100 border border-gray-200 flex items-center justify-center">
                            <span class="iconify text-gray-400" data-icon="mdi:image-outline"></span>
                        </div>
                        <?php endif; ?>
                    </td>
                    <td class="py-3 px-4">
                        <a href="<?= APP_URL ?>/admin/san-pham/sua/<?= $p['id'] ?>" class="font-bold text-gray-800 hover:text-[#6B0D18] block truncate max-w-[200px]" title="<?= $p['ten_sp'] ?>"><?= $p['ten_sp'] ?></a>
                        <div class="text-[11px] text-gray-500 mt-0.5">ID: <?= $p['id'] ?> &bull; <?= $p['danh_muc'] ?? 'Không có' ?></div>
                    </td>
                    <td class="py-3 px-4 text-xs text-gray-600">
                        <div>Đá: <span class="font-medium text-gray-800"><?= $p['da'] ?? 'Không' ?></span></div>
                        <div class="mt-0.5">Mệnh: <span class="font-medium text-gray-800"><?= $p['menh'] ?? 'Không' ?></span></div>
                    </td>
                    <td class="py-3 px-4 text-right text-gray-800 font-medium"><?= number_format($p['gia'], 0, ',', '.') ?>đ</td>
                    <td class="py-3 px-4 text-center">
                        <span class="<?= $p['ton_kho'] <= 5 ? 'text-red-600 font-bold' : 'text-gray-800' ?>"><?= $p['ton_kho'] ?></span>
                    </td>
                    <td class="py-3 px-4 text-center font-bold text-gray-800"><?= $p['da_ban'] ?></td>
                    <td class="py-3 px-4 text-right">
                        <div class="font-bold text-[#6B0D18]"><?= number_format($p['doanh_thu'], 0, ',', '.') ?>đ</div>
                        <div class="text-[11px] text-gray-400 mt-0.5"><?= $p['ty_trong'] ?>% tổng DT</div>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <?php 
                        $badgeClass = 'bg-gray-100 text-gray-800 border-gray-200';
                        if($p['trang_thai'] == 'Bán chạy') $badgeClass = 'bg-green-100 text-green-800 border-green-200';
                        if($p['trang_thai'] == 'Chưa có đơn') $badgeClass = 'bg-red-50 text-red-700 border-red-200';
                        ?>
                        <span class="inline-block px-2.5 py-1 rounded text-xs font-medium border <?= $badgeClass ?>"><?= $p['trang_thai'] ?></span>
                    </td>
                    <td class="py-3 px-4 text-center">
                        <a href="<?= APP_URL ?>/admin/san-pham/sua/<?= $p['id'] ?>" class="text-[#6B0D18] hover:bg-red-50 p-1.5 rounded inline-flex" title="Xem chi tiết">
                            <span class="iconify text-lg" data-icon="mdi:eye-outline"></span>
                        </a>
                        <a href="<?= APP_URL ?>/admin/khuyen-mai/them" class="text-gray-500 hover:text-[#6B0D18] hover:bg-gray-100 p-1.5 rounded inline-flex" title="Thêm khuyến mãi">
                            <span class="iconify text-lg" data-icon="mdi:ticket-percent-outline"></span>
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>
    </div>
    
    <!-- Phân trang -->
    <?php if ($totalPages > 1): 
        // Build query string for pagination links
        $queryParams = $_GET;
        unset($queryParams['url']);
        unset($queryParams['page']);
        $queryString = http_build_query($queryParams);
        $baseUrl = APP_URL . '/admin/bao-cao-san-pham?' . ($queryString ? $queryString . '&' : '');
    ?>
    <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-gray-50">
        <span class="text-sm text-gray-500">
            Hiển thị <?= min($offset + 1, $totalProducts) ?>-<?= min($offset + $limit, $totalProducts) ?> trên tổng số <?= $totalProducts ?> sản phẩm
        </span>
        <div class="flex items-center gap-1">
            <?php if ($page > 1): ?>
                <a href="<?= $baseUrl . 'page=' . ($page - 1) ?>" class="px-2.5 py-1.5 rounded border border-gray-200 bg-white text-gray-600 hover:bg-gray-50">
                    <span class="iconify" data-icon="mdi:chevron-left"></span>
                </a>
            <?php else: ?>
                <button class="px-2.5 py-1.5 rounded border border-gray-200 bg-white text-gray-400 cursor-not-allowed" disabled>
                    <span class="iconify" data-icon="mdi:chevron-left"></span>
                </button>
            <?php endif; ?>
            
            <?php 
                $startPage = max(1, $page - 2);
                $endPage = min($totalPages, $page + 2);
                if ($startPage > 1): 
            ?>
                <a href="<?= $baseUrl . 'page=1' ?>" class="px-3 py-1.5 rounded border border-gray-200 bg-white text-gray-600 hover:bg-gray-50 text-sm font-medium">1</a>
                <?php if ($startPage > 2): ?>
                    <span class="px-2 text-gray-400">...</span>
                <?php endif; ?>
            <?php endif; ?>

            <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                <?php if ($i == $page): ?>
                    <button class="px-3 py-1.5 rounded border border-[#6B0D18] bg-[#6B0D18] text-white text-sm font-medium"><?= $i ?></button>
                <?php else: ?>
                    <a href="<?= $baseUrl . 'page=' . $i ?>" class="px-3 py-1.5 rounded border border-gray-200 bg-white text-gray-600 hover:bg-gray-50 text-sm font-medium"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($endPage < $totalPages): ?>
                <?php if ($endPage < $totalPages - 1): ?>
                    <span class="px-2 text-gray-400">...</span>
                <?php endif; ?>
                <a href="<?= $baseUrl . 'page=' . $totalPages ?>" class="px-3 py-1.5 rounded border border-gray-200 bg-white text-gray-600 hover:bg-gray-50 text-sm font-medium"><?= $totalPages ?></a>
            <?php endif; ?>

            <?php if ($page < $totalPages): ?>
                <a href="<?= $baseUrl . 'page=' . ($page + 1) ?>" class="px-2.5 py-1.5 rounded border border-gray-200 bg-white text-gray-600 hover:bg-gray-50">
                    <span class="iconify" data-icon="mdi:chevron-right"></span>
                </a>
            <?php else: ?>
                <button class="px-2.5 py-1.5 rounded border border-gray-200 bg-white text-gray-400 cursor-not-allowed" disabled>
                    <span class="iconify" data-icon="mdi:chevron-right"></span>
                </button>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
