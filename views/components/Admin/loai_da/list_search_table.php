    <!-- Search & Filters -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-4">
        <form method="GET" action="<?= APP_URL ?>/admin/loai-da" class="flex flex-col lg:flex-row gap-3" id="filterForm">
            <div class="relative flex-1">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" name="keyword" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" placeholder="Tìm theo tên đá, mã đá, tên tiếng Anh..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
            </div>
            
            <div class="flex flex-wrap gap-2">
                <select name="trang_thai" onchange="this.form.submit()" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Trạng thái</option>
                    <option value="1" <?= (isset($_GET['trang_thai']) && $_GET['trang_thai'] === '1') ? 'selected' : '' ?>>Đang hiển thị</option>
                    <option value="0" <?= (isset($_GET['trang_thai']) && $_GET['trang_thai'] === '0') ? 'selected' : '' ?>>Đang ẩn</option>
                </select>

                <select name="nhom" onchange="this.form.submit()" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Nhóm chất liệu</option>
                    <option value="Ngọc" <?= (isset($_GET['nhom']) && $_GET['nhom'] === 'Ngọc') ? 'selected' : '' ?>>Ngọc</option>
                    <option value="Đá tự nhiên" <?= (isset($_GET['nhom']) && $_GET['nhom'] === 'Đá tự nhiên') ? 'selected' : '' ?>>Đá tự nhiên</option>
                    <option value="Đá cao cấp" <?= (isset($_GET['nhom']) && $_GET['nhom'] === 'Đá cao cấp') ? 'selected' : '' ?>>Đá cao cấp</option>
                </select>

                <select name="menh" onchange="this.form.submit()" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Mệnh phù hợp</option>
                    <option value="Kim" <?= (isset($_GET['menh']) && $_GET['menh'] === 'Kim') ? 'selected' : '' ?>>Kim</option>
                    <option value="Mộc" <?= (isset($_GET['menh']) && $_GET['menh'] === 'Mộc') ? 'selected' : '' ?>>Mộc</option>
                    <option value="Thủy" <?= (isset($_GET['menh']) && $_GET['menh'] === 'Thủy') ? 'selected' : '' ?>>Thủy</option>
                    <option value="Hỏa" <?= (isset($_GET['menh']) && $_GET['menh'] === 'Hỏa') ? 'selected' : '' ?>>Hỏa</option>
                    <option value="Thổ" <?= (isset($_GET['menh']) && $_GET['menh'] === 'Thổ') ? 'selected' : '' ?>>Thổ</option>
                </select>
                
                <button type="submit" class="px-3 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm flex items-center gap-1">
                    Lọc
                </button>
            </div>
        </form>
        
        <!-- Active Filter Chips -->
        <?php
        $activeFilters = [];
        if (!empty($_GET['keyword'])) {
            $activeFilters['keyword'] = 'Từ khóa: ' . $_GET['keyword'];
        }
        if (isset($_GET['trang_thai']) && $_GET['trang_thai'] !== '') {
            $activeFilters['trang_thai'] = $_GET['trang_thai'] === '1' ? 'Trạng thái: Đang hiển thị' : 'Trạng thái: Đang ẩn';
        }
        if (!empty($_GET['nhom'])) {
            $activeFilters['nhom'] = 'Nhóm: ' . $_GET['nhom'];
        }
        if (!empty($_GET['menh'])) {
            $activeFilters['menh'] = 'Mệnh: ' . $_GET['menh'];
        }
        
        if (!empty($activeFilters)):
        ?>
        <div class="flex flex-wrap gap-2 pt-2 border-t border-gray-100">
            <?php foreach ($activeFilters as $key => $label): 
                $queryParams = $_GET;
                unset($queryParams[$key]);
                if (isset($queryParams['page'])) unset($queryParams['page']);
                $removeUrl = '?' . http_build_query($queryParams);
            ?>
            <a href="<?= $removeUrl ?>" class="inline-flex items-center gap-1.5 px-3 py-1 bg-red-50 text-[#6B0D18] rounded-md text-[11px] font-medium hover:bg-red-100 transition-colors group/chip">
                <?= htmlspecialchars($label) ?> 
                <span class="iconify text-sm opacity-60 group-hover/chip:opacity-100" data-icon="mdi:close"></span>
            </a>
            <?php endforeach; ?>
            
            <a href="<?= APP_URL ?>/admin/loai-da" class="inline-flex items-center px-3 py-1 text-gray-500 hover:text-[#6B0D18] rounded-md text-[11px] font-medium transition-colors underline decoration-transparent hover:decoration-[#6B0D18] underline-offset-4">
                Xóa bộ lọc
            </a>
        </div>
        <?php endif; ?>
    </div>

    <!-- Action Bar & Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-3 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
            <span class="text-sm text-gray-500 px-2 border-r border-gray-300">Đã chọn: <strong class="text-gray-800" id="selected-count">0</strong></span>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-emerald-600 rounded-md hover:bg-emerald-50 hover:border-emerald-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Hiện</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-100 transition-colors text-sm font-medium disabled:opacity-50" disabled>Ẩn</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-md hover:bg-red-50 hover:border-red-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Xóa</button>
        </div>

        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 uppercase text-[11px] font-bold sticky top-0 z-10 tracking-wider">
                    <tr>
                        <th class="px-4 py-3 w-10">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </th>
                        <?php 
                        $sorts = [
                            'ten_loai_da' => 'Loại đá / ngọc',
                            'so_san_pham' => 'Số sản phẩm',
                            'ngay_tao' => 'Ngày tạo'
                        ];
                        $currentSort = $_GET['sort_by'] ?? 'ngay_tao';
                        $currentDir = $_GET['sort_dir'] ?? 'DESC';
                        
                        function buildSortLink($column, $label, $currentSort, $currentDir) {
                            $isCurrent = $currentSort === $column;
                            $nextDir = ($isCurrent && $currentDir === 'ASC') ? 'DESC' : 'ASC';
                            $icon = 'mdi:sort';
                            if ($isCurrent) {
                                $icon = $currentDir === 'ASC' ? 'mdi:sort-ascending' : 'mdi:sort-descending';
                            }
                            $params = array_merge($_GET, ['sort_by' => $column, 'sort_dir' => $nextDir]);
                            $url = '?' . http_build_query($params);
                            return "<a href=\"$url\" class=\"inline-flex items-center gap-1 hover:text-[#6B0D18] transition-colors group/sort " . ($isCurrent ? "text-[#6B0D18]" : "") . "\">$label <span class=\"iconify text-[14px] " . ($isCurrent ? "opacity-100" : "opacity-0 group-hover/sort:opacity-50") . "\" data-icon=\"$icon\"></span></a>";
                        }
                        ?>
                        <th class="px-4 py-3"><?= buildSortLink('ten_loai_da', 'Loại đá / ngọc', $currentSort, $currentDir) ?></th>
                        <th class="px-4 py-3">Nhóm & Màu sắc</th>
                        <th class="px-4 py-3">Phong thủy</th>
                        <th class="px-4 py-3 text-center"><?= buildSortLink('so_san_pham', 'Số sản phẩm', $currentSort, $currentDir) ?></th>
                        <th class="px-4 py-3">Trạng thái</th>
                        <th class="px-4 py-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                    <?php if (empty($danh_sach)): ?>
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                Không tìm thấy loại đá / ngọc nào.
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php foreach ($danh_sach as $da): ?>
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top w-[280px]">
                            <div class="flex items-start gap-3">
                                <?php if (!empty($da['hinh_anh_url'])): ?>
                                    <img src="<?= $da['hinh_anh_url'] ?>" class="w-14 h-14 rounded-lg object-cover border border-gray-200 shrink-0">
                                <?php else: ?>
                                    <div class="w-14 h-14 rounded-lg bg-gray-100 border border-gray-200 flex items-center justify-center shrink-0">
                                        <span class="iconify text-gray-400 text-2xl" data-icon="mdi:diamond-stone"></span>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="flex flex-col whitespace-normal">
                                    <div class="font-bold text-gray-800 text-[14px] hover:text-[#6B0D18] cursor-pointer" onclick="viewStoneDetails('<?= $da['ma_loai_da'] ?>')"><?= $da['ten_loai_da'] ?></div>
                                    <div class="text-[11px] text-gray-400 font-mono mt-0.5"><?= $da['ma_loai_da'] ?></div>
                                    <?php if (!empty($da['ten_tieng_anh'])): ?>
                                        <div class="text-[11px] text-gray-500 mt-0.5">AKA: <?= $da['ten_tieng_anh'] ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex flex-col gap-2">
                                <div>
                                    <span class="inline-flex px-2 py-0.5 rounded text-[11px] bg-gray-100 text-gray-600 border border-gray-200"><?= $da['nhom'] ?? 'Không phân nhóm' ?></span>
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <span class="w-3 h-3 rounded-full border border-gray-300 shadow-sm" style="background-color: <?= $da['mau_sac']['hex'] ?>"></span>
                                    <span class="text-xs text-gray-600"><?= $da['mau_sac']['ten'] ?></span>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top w-[250px]">
                            <div class="flex flex-col gap-2 whitespace-normal">
                                <div class="flex flex-wrap gap-1">
                                    <?php if (!empty($da['menh'])): ?>
                                        <?php foreach ($da['menh'] as $menh): ?>
                                            <span class="inline-flex px-2 py-0.5 rounded-full text-[10px] font-bold bg-red-50 text-[#6B0D18] border border-red-100"><?= trim($menh) ?></span>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <span class="text-xs text-gray-400">Chưa có</span>
                                    <?php endif; ?>
                                </div>
                                <div class="flex flex-wrap gap-1">
                                    <?php if (!empty($da['nhu_cau'])): ?>
                                        <?php $count = 0; foreach ($da['nhu_cau'] as $nhu_cau): $count++; ?>
                                            <?php if ($count <= 2): ?>
                                                <span class="inline-flex px-1.5 py-0.5 rounded text-[10px] bg-amber-50 text-amber-700 border border-amber-100"><?= $nhu_cau ?></span>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (count($da['nhu_cau']) > 2): ?>
                                            <span class="inline-flex px-1.5 py-0.5 rounded text-[10px] bg-gray-50 text-gray-500 border border-gray-200">+<?= count($da['nhu_cau']) - 2 ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top text-center">
                            <?php if ($da['so_san_pham'] > 0): ?>
                                <a href="<?= APP_URL ?>/admin/san-pham?loai_da=<?= urlencode($da['ten_loai_da']) ?>" class="inline-flex flex-col items-center hover:bg-gray-50 p-1.5 rounded transition-colors group/link">
                                    <span class="font-bold text-gray-800 text-[14px] group-hover/link:text-[#6B0D18]"><?= $da['so_san_pham'] ?></span>
                                    <span class="text-[10px] text-gray-400 group-hover/link:text-[#6B0D18]">Sản phẩm</span>
                                </a>
                            <?php else: ?>
                                <span class="inline-flex px-2 py-1 rounded text-[10px] font-medium bg-gray-100 text-gray-500 border border-gray-200 mt-1">Chưa dùng</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <?php if ($da['trang_thai'] === 'Đang hiển thị'): ?>
                                <span class="inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 status-badge uppercase tracking-wider">
                                    Đang hiển thị
                                </span>
                            <?php else: ?>
                                <span class="inline-flex px-2 py-1 rounded-md text-[11px] font-bold bg-gray-100 text-gray-500 border border-gray-200 status-badge uppercase tracking-wider">
                                    Đang ẩn
                                </span>
                            <?php endif; ?>
                            <div class="text-[10px] text-gray-400 mt-2">Cập nhật: <?= $da['ngay_cap_nhat_format'] ?? 'N/A' ?></div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <a href="<?= APP_URL ?>/admin/loai-da/sua/<?= $da['id'] ?>" class="p-1.5 text-[#6B0D18] hover:bg-red-50 rounded transition-colors" title="Sửa">
                                    <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                </a>
                                <div class="relative inline-block text-left menu-dropdown-container">
                                    <button class="p-1.5 text-gray-500 hover:bg-gray-100 rounded transition-colors" onclick="toggleStoneDropdown(this)">
                                        <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                    </button>
                                    <div class="absolute right-0 mt-1 w-48 bg-white rounded-md shadow-lg border border-gray-100 hidden z-20 dropdown-menu text-left">
                                        <div class="py-1">
                                            <button type="button" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="viewStoneDetails('<?= $da['id'] ?>')"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem chi tiết</button>
                                            <?php if ($da['so_san_pham'] > 0): ?>
                                                <a href="<?= APP_URL ?>/admin/san-pham?loai_da=<?= urlencode($da['ten_loai_da']) ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"><span class="iconify text-gray-400" data-icon="mdi:package-variant"></span> Xem sản phẩm</a>
                                            <?php endif; ?>
                                            <hr class="my-1 border-gray-100">
                                            <?php if ($da['trang_thai'] === 'Đang hiển thị'): ?>
                                                <form method="POST" action="<?= APP_URL ?>/admin/loai-da/an-hien/<?= $da['id'] ?>" class="inline">
                                                    <button type="submit" class="w-full text-left btn-toggle flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"><span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn loại đá</button>
                                                </form>
                                            <?php else: ?>
                                                <form method="POST" action="<?= APP_URL ?>/admin/loai-da/an-hien/<?= $da['id'] ?>" class="inline">
                                                    <button type="submit" class="w-full text-left btn-toggle flex items-center gap-2 px-4 py-2 text-sm text-emerald-600 hover:bg-emerald-50"><span class="iconify" data-icon="mdi:eye-outline"></span> Hiện loại đá</button>
                                                </form>
                                            <?php endif; ?>
                                            <form method="POST" action="<?= APP_URL ?>/admin/loai-da/xoa/<?= $da['id'] ?>" class="inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa loại đá này?');">
                                                <button type="submit" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50"><span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-gray-100 flex flex-col md:flex-row items-center justify-between bg-white gap-4">
            <div class="text-sm text-gray-500">
                Hiển thị <span class="font-medium text-gray-800"><?= count($danh_sach) > 0 ? (($pagination['page'] - 1) * $pagination['limit'] + 1) : 0 ?></span> - <span class="font-medium text-gray-800"><?= min($pagination['page'] * $pagination['limit'], $pagination['total_items']) ?></span> trong <span class="font-medium text-gray-800"><?= $pagination['total_items'] ?></span> loại đá / ngọc
            </div>
            
            <?php if ($pagination['total_pages'] > 1): ?>
            <div class="flex items-center gap-1">
                <?php
                $currentPage = $pagination['page'];
                $totalPages = $pagination['total_pages'];
                
                // Nút Previous
                if ($currentPage > 1): ?>
                    <a href="?<?= http_build_query(array_merge($_GET, ['page' => $currentPage - 1])) ?>" class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-left"></span></a>
                <?php else: ?>
                    <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-300 cursor-not-allowed" disabled><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <?php endif; ?>

                <?php
                // Logic hiển thị số trang
                $start = max(1, $currentPage - 1);
                $end = min($totalPages, $currentPage + 1);

                if ($start > 1) {
                    echo '<a href="?' . http_build_query(array_merge($_GET, ['page' => 1])) . '" class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">1</a>';
                    if ($start > 2) {
                        echo '<span class="px-2 text-gray-400">...</span>';
                    }
                }

                for ($i = $start; $i <= $end; $i++) {
                    if ($i == $currentPage) {
                        echo '<button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-md text-sm font-medium shadow-sm">' . $i . '</button>';
                    } else {
                        echo '<a href="?' . http_build_query(array_merge($_GET, ['page' => $i])) . '" class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">' . $i . '</a>';
                    }
                }

                if ($end < $totalPages) {
                    if ($end < $totalPages - 1) {
                        echo '<span class="px-2 text-gray-400">...</span>';
                    }
                    echo '<a href="?' . http_build_query(array_merge($_GET, ['page' => $totalPages])) . '" class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">' . $totalPages . '</a>';
                }
                ?>

                <?php
                // Nút Next
                if ($currentPage < $totalPages): ?>
                    <a href="?<?= http_build_query(array_merge($_GET, ['page' => $currentPage + 1])) ?>" class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></a>
                <?php else: ?>
                    <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-300 cursor-not-allowed" disabled><span class="iconify" data-icon="mdi:chevron-right"></span></button>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

