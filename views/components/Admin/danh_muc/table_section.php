    <!-- Main Table Section -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden flex flex-col">
                    
                    <!-- Search & Filter Bar -->
                    <div class="p-4 border-b border-gray-100 flex flex-col md:flex-row gap-4 items-center justify-between bg-white">
                        <div class="relative w-full md:w-80 group">
                            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-[#6B0D18] transition-colors" data-icon="mdi:magnify"></span>
                            <input type="text" placeholder="Tìm theo tên, mã danh mục..." class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                        </div>
                        <div class="flex items-center gap-3 w-full md:w-auto">
                            <select class="w-full md:w-auto px-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 cursor-pointer">
                                <option value="">Trạng thái: Tất cả</option>
                                <option value="hien">Đang hiển thị</option>
                                <option value="an">Đang ẩn</option>
                            </select>
                            <select class="w-full md:w-auto px-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 cursor-pointer">
                                <option value="">Sản phẩm: Tất cả</option>
                                <option value="co">Đã có sản phẩm</option>
                                <option value="trong">Danh mục trống</option>
                            </select>
                            <button class="px-4 py-2 text-gray-500 bg-gray-50 border border-gray-200 rounded-xl hover:bg-gray-100 text-sm font-medium transition-colors whitespace-nowrap shrink-0 flex items-center gap-1">
                                Lọc
                            </button>
                        </div>
                    </div>

                    <!-- Bulk Actions Bar (Hidden by default) -->
                    <div id="bulkActions" class="bg-[#FAF8F5] px-4 py-3 border-b border-[#E4D5C3] hidden items-center justify-between">
                        <div class="flex items-center gap-2 text-sm">
                            <span class="font-bold text-[#6B0D18] id="selectedCount">0</span>
                            <span class="text-gray-600">danh mục đang chọn</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-1.5">
                                <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Hiện
                            </button>
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-1.5">
                                <span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn
                            </button>
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-lg text-xs font-medium hover:bg-red-50 hover:border-red-200 transition-colors shadow-sm flex items-center gap-1.5">
                                <span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa
                            </button>
                        </div>
                    </div>

                    <div class="px-4 py-2 border-b border-gray-100 flex items-center justify-end">
                        <button onclick="openModal('sortModal')" class="px-4 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-2">
                            <span class="iconify text-gray-400" data-icon="mdi:swap-vertical"></span> Sắp xếp thứ tự
                        </button>
                    </div>

                    <!-- Table -->
                    <div class="overflow-x-auto min-h-[400px]">
                        <table class="w-full text-left border-collapse">
                            <?php
                            $qParams = $_GET;
                            if (!function_exists('getSortUrl')) {
                                function getSortUrl($column, $currentParams) {
                                    $dir = 'ASC';
                                    if (($currentParams['sort_by'] ?? '') === $column) {
                                        $dir = (strtoupper($currentParams['sort_dir'] ?? '') === 'ASC') ? 'DESC' : 'ASC';
                                    }
                                    $params = $currentParams;
                                    $params['sort_by'] = $column;
                                    $params['sort_dir'] = $dir;
                                    return '?' . http_build_query($params);
                                }
                            }
                            if (!function_exists('getSortIcon')) {
                                function getSortIcon($column, $currentParams) {
                                    if (($currentParams['sort_by'] ?? '') === $column) {
                                        $dir = strtoupper($currentParams['sort_dir'] ?? 'ASC');
                                        return $dir === 'ASC' ? 'mdi:arrow-up' : 'mdi:arrow-down';
                                    }
                                    return 'mdi:swap-vertical';
                                }
                            }
                            if (!function_exists('getSortClass')) {
                                function getSortClass($column, $currentParams) {
                                    return (($currentParams['sort_by'] ?? '') === $column) ? 'text-[#6B0D18] opacity-100' : 'opacity-0 group-hover:opacity-100';
                                }
                            }
                            ?>
                            <thead>
                                <tr class="bg-gray-50/50 border-b border-gray-100 text-xs text-gray-500 uppercase tracking-wider font-semibold">
                                    <th class="p-4 w-12 text-center">
                                        <input type="checkbox" id="selectAll" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] cursor-pointer">
                                    </th>
                                    <th class="p-4 w-16">Icon</th>
                                    <th class="p-4">
                                        <a href="<?= getSortUrl('ten_danh_muc', $qParams) ?>" class="flex items-center gap-1 hover:text-[#6B0D18] group cursor-pointer transition-colors">
                                            Danh mục <span class="iconify inline-block transition-opacity <?= getSortClass('ten_danh_muc', $qParams) ?>" data-icon="<?= getSortIcon('ten_danh_muc', $qParams) ?>"></span>
                                        </a>
                                    </th>
                                    <th class="p-4">Đường dẫn (Slug)</th>
                                    <th class="p-4 text-center">
                                        <a href="<?= getSortUrl('so_san_pham', $qParams) ?>" class="flex items-center justify-center gap-1 hover:text-[#6B0D18] group cursor-pointer transition-colors">
                                            Sản phẩm <span class="iconify inline-block transition-opacity <?= getSortClass('so_san_pham', $qParams) ?>" data-icon="<?= getSortIcon('so_san_pham', $qParams) ?>"></span>
                                        </a>
                                    </th>
                                    <th class="p-4 text-center">Vị trí</th>
                                    <th class="p-4 text-center">
                                        <a href="<?= getSortUrl('thu_tu', $qParams) ?>" class="flex items-center justify-center gap-1 hover:text-[#6B0D18] group cursor-pointer transition-colors">
                                            Thứ tự <span class="iconify inline-block transition-opacity <?= getSortClass('thu_tu', $qParams) ?>" data-icon="<?= getSortIcon('thu_tu', $qParams) ?>"></span>
                                        </a>
                                    </th>
                                    <th class="p-4 text-center">Trạng thái</th>
                                    <th class="p-4 text-right w-20">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm divide-y divide-gray-50">
                                <?php foreach($danh_muc_list as $dm): ?>
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
                                                    <span class="text-[10px] text-gray-500 font-medium font-mono whitespace-nowrap shrink-0"><?= $dm['ma_danh_muc'] ?? 'N/A' ?></span>
                                                </div>
                                                <a href="#" class="font-bold text-gray-900 hover:text-[#6B0D18] transition-colors leading-tight text-base"><?= $dm['ten_danh_muc'] ?></a>
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
                                                <a href="<?= APP_URL ?>/admin/san-pham?danh_muc=<?= urlencode($dm['ten_danh_muc']) ?>" class="font-bold text-gray-900 hover:text-[#6B0D18] hover:underline"><?= $dm['so_san_pham'] ?></a>
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
                                            <?php if($dm['trang_thai'] == 1): ?>
                                                <span class="text-[11px] font-medium px-2 py-1 rounded-full border bg-emerald-50 text-emerald-700 border-emerald-200 inline-block whitespace-nowrap">Đang hiển thị</span>
                                            <?php else: ?>
                                                <span class="text-[11px] font-medium px-2 py-1 rounded-full border bg-gray-100 text-gray-600 border-gray-200 inline-block whitespace-nowrap">Đang ẩn</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="p-4 text-right">
                                            <div class="flex items-center justify-end gap-1 relative">
                                                <button onclick='openEditModal(<?= json_encode($dm, JSON_HEX_APOS | JSON_HEX_QUOT) ?>)' class="p-1.5 text-gray-400 hover:text-[#6B0D18] hover:bg-red-50 rounded-lg transition-colors" title="Sửa">
                                                    <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                                </button>
                                                <button class="action-btn p-1.5 text-gray-400 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition-colors" onclick="toggleActionMenu(this)">
                                                    <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                                </button>
                                                <!-- Dropdown Menu -->
                                                <div class="w-48 bg-white border border-gray-100 rounded-xl shadow-lg z-[9999] hidden action-menu py-1 fixed">
                                                    <a href="<?= APP_URL ?>/admin/san-pham?danh_muc=<?= urlencode($dm['ten_danh_muc']) ?>" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                        <span class="iconify text-gray-400" data-icon="mdi:format-list-bulleted"></span> Xem DS sản phẩm
                                                    </a>
                                                    <?php if($dm['trang_thai'] == 1): ?>
                                                        <button onclick="submitToggleStatus('<?= $dm['id'] ?>')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                            <span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn danh mục
                                                        </button>
                                                    <?php else: ?>
                                                        <button onclick="submitToggleStatus('<?= $dm['id'] ?>')" class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#6B0D18] transition-colors">
                                                            <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Hiện danh mục
                                                        </button>
                                                    <?php endif; ?>
                                                    <div class="h-px bg-gray-100 my-1 w-full"></div>
                                                    <button onclick='openDeleteModal(<?= json_encode($dm, JSON_HEX_APOS | JSON_HEX_QUOT) ?>, this)' class="w-full text-left flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50 transition-colors">
                                                        <span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa danh mục
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

