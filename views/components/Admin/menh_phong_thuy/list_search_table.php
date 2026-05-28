    <!-- Search & Filter Bar -->
    <form method="GET" action="<?= APP_URL ?>/admin/menh-phong-thuy" id="searchForm" class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div class="relative w-full md:w-96 shrink-0">
            <input type="text" name="keyword" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" placeholder="Tìm theo tên mệnh, màu sắc, loại đá, năm sinh..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-shadow" onkeypress="if(event.key === 'Enter') document.getElementById('searchForm').submit();">
            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
        </div>
        <div class="flex items-center gap-3 overflow-x-auto pb-1 md:pb-0 scrollbar-hide">
            <select name="status" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0" onchange="document.getElementById('searchForm').submit();">
                <option value="">Tất cả trạng thái</option>
                <option value="1" <?= (isset($_GET['status']) && $_GET['status'] === '1') ? 'selected' : '' ?>>Đang hiển thị</option>
                <option value="0" <?= (isset($_GET['status']) && $_GET['status'] === '0') ? 'selected' : '' ?>>Đang ẩn</option>
                <option value="2" <?= (isset($_GET['status']) && $_GET['status'] === '2') ? 'selected' : '' ?>>Cần bổ sung</option>
            </select>
            <select name="data_filter" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] bg-white cursor-pointer shrink-0" onchange="document.getElementById('searchForm').submit();">
                <option value="">Tất cả dữ liệu</option>
                <option value="has_product" <?= (isset($_GET['data_filter']) && $_GET['data_filter'] === 'has_product') ? 'selected' : '' ?>>Có sản phẩm</option>
                <option value="no_product" <?= (isset($_GET['data_filter']) && $_GET['data_filter'] === 'no_product') ? 'selected' : '' ?>>Chưa có SP</option>
                <option value="no_stone" <?= (isset($_GET['data_filter']) && $_GET['data_filter'] === 'no_stone') ? 'selected' : '' ?>>Chưa gắn đá</option>
            </select>
        </div>
    </form>

    <!-- Data Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[1200px]">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-100">
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider w-[220px]">Tên mệnh</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Màu đại diện</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Màu phù hợp / kỵ</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Đá / Ngọc liên kết</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Gợi ý & SP</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Trạng thái</th>
                        <th class="px-6 py-4 text-right text-xs font-bold text-gray-500 uppercase tracking-wider w-[120px]">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($destinies as $index => $item): ?>
                    <tr class="hover:bg-red-50/20 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full flex items-center justify-center border border-gray-200/60 shadow-sm" style="background-color: <?= $item['mau_dai_dien_hex'] ?>20">
                                    <span class="iconify text-xl" style="color: <?= $item['mau_dai_dien_hex'] ?>" data-icon="mdi:yin-yang"></span>
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-gray-800 cursor-pointer hover:text-[#6B0D18]" onclick="openDestinyDrawer('<?= $item['id'] ?>')"><?= $item['ten_menh'] ?></h4>
                                    <p class="text-xs text-gray-500 mt-0.5 truncate max-w-[140px]" title="<?= htmlspecialchars($item['mo_ta'] ?? '') ?>"><?= htmlspecialchars($item['mo_ta'] ?? '') ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full" style="background-color: <?= $item['mau_dai_dien_hex'] ?>; box-shadow: 0 0 0 1px rgba(0,0,0,0.1)"></span>
                                <span class="text-sm text-gray-700 font-medium font-mono"><?= $item['mau_dai_dien_hex'] ?></span>
                            </div>
                        </td>
                        <td class="px-6 py-4 space-y-2">
                            <!-- Màu hợp -->
                            <div class="flex flex-wrap gap-1.5">
                                <span class="text-[10px] font-bold text-emerald-600 uppercase w-8 flex-shrink-0 mt-0.5">Hợp:</span>
                                <?php foreach (array_slice($item['mau_hop'], 0, 3) as $m): ?>
                                    <span class="px-2 py-0.5 bg-gray-50 border border-gray-200 rounded text-xs text-gray-600"><?= $m ?></span>
                                <?php endforeach; ?>
                                <?php if (count($item['mau_hop']) > 3): ?>
                                    <span class="px-1.5 py-0.5 bg-gray-100 rounded text-[10px] text-gray-500">+<?= count($item['mau_hop']) - 3 ?></span>
                                <?php endif; ?>
                            </div>
                            <!-- Màu kỵ -->
                            <div class="flex flex-wrap gap-1.5">
                                <span class="text-[10px] font-bold text-red-500 uppercase w-8 flex-shrink-0 mt-0.5">Kỵ:</span>
                                <?php foreach ($item['mau_ky'] as $m): ?>
                                    <span class="px-2 py-0.5 bg-red-50/50 border border-red-100 rounded text-xs text-red-600"><?= $m ?></span>
                                <?php endforeach; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-1.5">
                                <span class="px-2.5 py-1 bg-white border border-gray-200 rounded-full text-xs text-gray-700 font-medium shadow-sm"><?= $item['da_hop_count'] ?> loại đá phù hợp</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4 text-sm">
                                <a href="<?= APP_URL ?>/admin/san-pham?menh=<?= urlencode($item['ten_menh']) ?>" class="text-gray-600 cursor-pointer hover:text-[#6B0D18] flex flex-col group/info">
                                    <span class="font-bold text-gray-800 group-hover/info:text-[#6B0D18]"><?= $item['so_san_pham'] ?></span>
                                    <span class="text-[10px] text-gray-400">Sản phẩm</span>
                                </a>
                                <div class="w-px h-6 bg-gray-200"></div>
                                <div class="text-gray-600 cursor-pointer hover:text-[#6B0D18] flex flex-col group/info">
                                    <span class="font-bold text-gray-800 group-hover/info:text-[#6B0D18]"><?= $item['so_nam_sinh'] ?></span>
                                    <span class="text-[10px] text-gray-400">Năm sinh</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <?php if ($item['trang_thai'] == 1): ?>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-emerald-50 text-emerald-700 text-xs font-medium border border-emerald-100">
                                    Hiển thị
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-gray-100 text-gray-600 text-xs font-medium border border-gray-200">
                                    Đang ẩn
                                </span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="<?= APP_URL ?>/admin/menh-phong-thuy/sua/<?= $item['id'] ?>" class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-[#6B0D18] hover:bg-red-50 transition-colors" title="Chỉnh sửa">
                                    <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                                </a>
                                <div class="relative">
                                    <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-gray-700 hover:bg-gray-100 transition-colors" onclick="toggleActionMenu(this)" title="Thêm thao tác">
                                        <span class="iconify text-xl" data-icon="mdi:dots-vertical"></span>
                                    </button>
                                    <div class="absolute right-0 mt-1 w-48 bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.1)] border border-gray-100 py-2 hidden z-50 transform origin-top-right transition-all">
                                        <a href="<?= APP_URL ?>/admin/menh-phong-thuy/sua/<?= $item['id'] ?>" class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50 flex items-center gap-2"><span class="iconify text-gray-400" data-icon="mdi:pencil-outline"></span> Chỉnh sửa</a>
                                        <div class="h-px bg-gray-100 my-1"></div>
                                        <?php if ($item['trang_thai'] == 1): ?>
                                            <button type="button" class="w-full px-4 py-2 text-left text-sm text-amber-600 hover:bg-amber-50 flex items-center gap-2" onclick="openToggleModal('<?= $item['id'] ?>', '<?= $item['ten_menh'] ?>', <?= $item['so_san_pham'] ?>, 'hide')"><span class="iconify" data-icon="mdi:eye-off-outline"></span> Ẩn mệnh này</button>
                                        <?php else: ?>
                                            <button type="button" class="w-full px-4 py-2 text-left text-sm text-emerald-600 hover:bg-emerald-50 flex items-center gap-2" onclick="openToggleModal('<?= $item['id'] ?>', '<?= $item['ten_menh'] ?>', <?= $item['so_san_pham'] ?>, 'show')"><span class="iconify" data-icon="mdi:eye-outline"></span> Hiển thị mệnh</button>
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
    </div>
</div>

