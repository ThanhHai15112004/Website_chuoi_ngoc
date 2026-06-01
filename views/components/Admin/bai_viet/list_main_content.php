    <!-- Main Content Area -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-4">
        
        <!-- Tabs Trạng thái -->
        <div class="flex flex-wrap items-center gap-1 border-b border-gray-100 px-2 pt-2">
            <a href="?status=" class="px-5 py-3 text-sm font-medium border-b-2 transition-colors <?= !isset($_GET['status']) && !isset($_GET['seo']) ? 'border-[#6B0D18] text-[#6B0D18]' : 'border-transparent text-gray-500 hover:text-gray-700' ?>">Tất cả (<?= (int)$thong_ke['total'] ?>)</a>
            <a href="?status=published" class="px-5 py-3 text-sm font-medium border-b-2 transition-colors <?= (isset($_GET['status']) && $_GET['status'] == 'published') ? 'border-emerald-500 text-emerald-600' : 'border-transparent text-gray-500 hover:text-gray-700' ?>">Đã đăng (<?= (int)$thong_ke['published'] ?>)</a>
            <a href="?status=draft" class="px-5 py-3 text-sm font-medium border-b-2 transition-colors <?= (isset($_GET['status']) && $_GET['status'] == 'draft') ? 'border-gray-800 text-gray-800' : 'border-transparent text-gray-500 hover:text-gray-700' ?>">Bản nháp (<?= (int)$thong_ke['draft'] ?>)</a>
            <a href="?status=hidden" class="px-5 py-3 text-sm font-medium border-b-2 transition-colors <?= (isset($_GET['status']) && $_GET['status'] == 'hidden') ? 'border-gray-500 text-gray-600' : 'border-transparent text-gray-500 hover:text-gray-700' ?>">Đã ẩn (<?= (int)$thong_ke['hidden'] ?>)</a>
            <a href="?seo=missing" class="px-5 py-3 text-sm font-medium border-b-2 transition-colors <?= (isset($_GET['seo']) && $_GET['seo'] == 'missing') ? 'border-amber-500 text-amber-600' : 'border-transparent text-amber-600/70 hover:text-amber-600' ?> flex items-center gap-1">
                Cần tối ưu SEO (<?= (int)$thong_ke['missing_seo'] ?>) <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
            </a>
        </div>

        <!-- Search & Filters -->
        <form action="" method="GET" class="flex flex-col lg:flex-row gap-3 pt-2">
            <?php if (isset($_GET['status'])): ?><input type="hidden" name="status" value="<?= $_GET['status'] ?>"><?php endif; ?>
            <div class="relative flex-1">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" name="q" value="<?= $_GET['q'] ?? '' ?>" placeholder="Tìm theo tiêu đề, tác giả, tag, danh mục..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all" onchange="this.form.submit()">
            </div>
            
            <div class="flex flex-wrap gap-2">
                <select name="id_danh_muc" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white" onchange="this.form.submit()">
                    <option value="">Tất cả danh mục</option>
                    <?php foreach ($danh_mucs as $dm): ?>
                        <option value="<?= $dm['id'] ?>" <?= ($_GET['id_danh_muc'] ?? '') == $dm['id'] ? 'selected' : '' ?>><?= $dm['ten_danh_muc'] ?></option>
                    <?php endforeach; ?>
                </select>

                <select name="seo" class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white" onchange="this.form.submit()">
                    <option value="">Trạng thái SEO</option>
                    <option value="good" <?= ($_GET['seo'] ?? '') == 'good' ? 'selected' : '' ?>>Đã tối ưu SEO</option>
                    <option value="missing" <?= ($_GET['seo'] ?? '') == 'missing' ? 'selected' : '' ?>>Thiếu Meta/Ảnh</option>
                </select>

                <a href="?" class="px-3 py-2 bg-gray-50 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors font-medium text-sm flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:filter-variant-remove"></span>
                    Xóa lọc
                </a>
            </div>
        </form>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Bulk Actions -->
        <div class="p-3 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
            <span class="text-sm text-gray-500 px-2 border-r border-gray-300">Đã chọn: <strong class="text-gray-800">0</strong></span>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-sm font-medium disabled:opacity-50" disabled>Đăng bài</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-sm font-medium disabled:opacity-50" disabled>Ẩn bài</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-md hover:bg-red-50 hover:border-red-200 transition-colors text-sm font-medium disabled:opacity-50" disabled>Xóa</button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 uppercase text-[11px] font-semibold sticky top-0 z-10 tracking-wider">
                    <tr>
                        <th class="px-4 py-3 w-10">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </th>
                        <th class="px-4 py-3">Bài viết</th>
                        <th class="px-4 py-3">Danh mục & Tag</th>
                        <th class="px-4 py-3 text-center">Tương tác</th>
                        <th class="px-4 py-3">Trạng thái & SEO</th>
                        <th class="px-4 py-3">Thời gian & Tác giả</th>
                        <th class="px-4 py-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100" id="postTableBody">
                    <?php if (empty($bai_viet_list)): ?>
                        <tr>
                            <td colspan="7" class="px-4 py-12 text-center text-gray-500">
                                <span class="iconify text-4xl mb-2 text-gray-300 mx-auto" data-icon="mdi:file-document-outline"></span>
                                <p>Không tìm thấy bài viết nào.</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($bai_viet_list as $bv): 
                            $tags = json_decode($bv['tags'] ?? '[]', true) ?: [];
                            $sp_lien_quan = json_decode($bv['san_pham_lien_quan'] ?? '[]', true) ?: [];
                            $is_seo_good = (!empty($bv['seo_title']) && !empty($bv['seo_description']) && !empty($bv['hinh_anh']));
                        ?>
                        <tr class="hover:bg-gray-50/80 transition-colors group <?= $bv['trang_thai'] == 0 ? 'bg-gray-50/30' : '' ?>" data-id="<?= $bv['id'] ?>">
                            <td class="px-4 py-4 align-top">
                                <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18] row-checkbox">
                            </td>
                            <td class="px-4 py-4 align-top max-w-[280px]">
                                <div class="flex gap-3">
                                    <div class="w-[72px] h-[48px] bg-gray-200 rounded-[10px] overflow-hidden shrink-0 border border-gray-200 flex items-center justify-center">
                                        <?php if (!empty($bv['hinh_anh'])): ?>
                                            <img src="<?= htmlspecialchars($bv['hinh_anh']) ?>" alt="thumbnail" class="w-full h-full object-cover">
                                        <?php else: ?>
                                            <span class="iconify text-gray-300 text-xl" data-icon="mdi:image-outline"></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex-1 min-w-0 cursor-pointer" onclick="openPostDrawer('<?= $bv['id'] ?>')">
                                        <div class="font-bold text-gray-900 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors text-sm leading-tight">
                                            <?= htmlspecialchars($bv['tieu_de']) ?>
                                        </div>
                                        <div class="text-[11px] text-gray-400 mt-1 truncate">/<?= htmlspecialchars($bv['slug']) ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 align-top">
                                <span class="inline-flex px-2 py-0.5 rounded text-[11px] font-medium bg-red-50 text-[#6B0D18] border border-red-100 mb-2"><?= htmlspecialchars($bv['ten_danh_muc'] ?? 'Chưa phân loại') ?></span>
                                <div class="flex flex-wrap gap-1">
                                    <?php foreach ($tags as $tag): ?>
                                        <span class="inline-flex px-1.5 py-0.5 rounded-full bg-gray-100 text-gray-600 text-[10px]"><?= htmlspecialchars($tag) ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </td>
                            <td class="px-4 py-4 align-top text-center">
                                <div class="flex flex-col gap-1.5 items-center">
                                    <div class="flex items-center gap-1 font-bold text-[#6B0D18]" title="Lượt xem">
                                        <span class="iconify text-sm" data-icon="mdi:eye"></span> <?= number_format($bv['luot_xem']) ?>
                                    </div>
                                    <a href="#" class="text-[10px] text-blue-600 hover:underline flex items-center gap-0.5 mt-1">
                                        <span class="iconify" data-icon="mdi:shopping-outline"></span> <?= count($sp_lien_quan) ?> SP
                                    </a>
                                </div>
                            </td>
                            <td class="px-4 py-4 align-top">
                                <div class="flex flex-col gap-2 items-start">
                                    <?php if ($bv['trang_thai'] == 1): ?>
                                        <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">Đã đăng</span>
                                    <?php elseif ($bv['trang_thai'] == 0): ?>
                                        <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-600 border border-gray-200">Bản nháp</span>
                                    <?php else: ?>
                                        <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200">Đã ẩn</span>
                                    <?php endif; ?>
                                    
                                    <?php if ($is_seo_good): ?>
                                        <span class="inline-flex px-1.5 py-0.5 rounded border border-emerald-200 text-[10px] font-medium bg-white text-emerald-600 flex items-center gap-1">
                                            <span class="iconify" data-icon="mdi:check-circle"></span> SEO Tốt
                                        </span>
                                    <?php else: ?>
                                        <span class="inline-flex px-1.5 py-0.5 rounded border border-red-200 text-[10px] font-medium bg-red-50 text-red-600 flex items-center gap-1" title="Thiếu ảnh đại diện hoặc Meta SEO">
                                            <span class="iconify" data-icon="mdi:alert-circle-outline"></span> Thiếu thông tin
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </td>
                            <td class="px-4 py-4 align-top">
                                <div class="text-xs text-gray-800 mb-0.5"><?= date('d/m/Y', strtotime($bv['ngay_tao'])) ?></div>
                                <div class="flex items-center gap-1.5 mt-2">
                                    <?php if (!empty($bv['anh_nguoi_tao'])): ?>
                                        <img src="<?= htmlspecialchars($bv['anh_nguoi_tao']) ?>" class="w-4 h-4 rounded-full object-cover">
                                    <?php else: ?>
                                        <div class="w-4 h-4 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-[8px]"><?= strtoupper(substr($bv['ten_nguoi_tao'] ?? 'AD', 0, 2)) ?></div>
                                    <?php endif; ?>
                                    <span class="text-xs font-medium text-gray-700"><?= htmlspecialchars($bv['ten_nguoi_tao'] ?? 'Admin') ?></span>
                                </div>
                            </td>
                            <td class="px-4 py-4 align-top text-right relative">
                                <div class="flex items-center justify-end gap-1">
                                    <a href="<?= APP_URL ?>/admin/post/sua/<?= $bv['id'] ?>" class="px-2.5 py-1.5 bg-white border border-gray-200 text-[#6B0D18] rounded-md hover:bg-red-50 transition-colors text-xs font-medium">Sửa</a>
                                    <button class="p-1.5 text-gray-400 hover:text-gray-700 hover:bg-gray-100 rounded transition-colors" onclick="toggleRowMenu(this)">
                                        <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                    </button>
                                    <!-- Menu -->
                                    <div class="absolute right-0 top-10 mt-1 w-40 bg-white rounded-md shadow-lg border border-gray-100 hidden z-20 row-menu">
                                        <div class="py-1 text-left">
                                            <!-- <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="openPostDrawer('<?= $bv['id'] ?>')"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Xem trước</a> -->
                                            <a href="javascript:void(0)" onclick="duplicatePost('<?= $bv['id'] ?>')" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"><span class="iconify text-gray-400" data-icon="mdi:content-copy"></span> Nhân bản</a>
                                            
                                            <?php if ($bv['trang_thai'] != 2): ?>
                                                <a href="javascript:void(0)" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="toggleStatus('<?= $bv['id'] ?>', 2)"><span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Ẩn bài viết</a>
                                            <?php else: ?>
                                                <a href="javascript:void(0)" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50" onclick="toggleStatus('<?= $bv['id'] ?>', 1)"><span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span> Hiện bài viết</a>
                                            <?php endif; ?>
                                            
                                            <hr class="my-1 border-gray-100">
                                            <a href="javascript:void(0)" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50" onclick="deletePost('<?= $bv['id'] ?>')"><span class="iconify text-red-400" data-icon="mdi:trash-can-outline"></span> Xóa bài</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-white">
            <div class="text-sm text-gray-500">
                Hiển thị <span class="font-medium text-gray-800"><?= min($pagination['total'], ($pagination['page'] - 1) * $pagination['limit'] + 1) ?></span> - 
                <span class="font-medium text-gray-800"><?= min($pagination['total'], $pagination['page'] * $pagination['limit']) ?></span> 
                trong <span class="font-medium text-gray-800"><?= $pagination['total'] ?></span> bài viết
            </div>
            <div class="flex items-center gap-1">
                <?php
                $qParams = $_GET;
                unset($qParams['page']);
                $baseUrl = '?' . http_build_query($qParams) . (empty($qParams) ? '' : '&');
                ?>
                <?php if ($pagination['page'] > 1): ?>
                    <a href="<?= $baseUrl ?>page=<?= $pagination['page'] - 1 ?>" class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-left"></span></a>
                <?php else: ?>
                    <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-300 cursor-not-allowed" disabled><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <?php endif; ?>

                <?php for($i = 1; $i <= $pagination['total_pages']; $i++): ?>
                    <?php if ($i == $pagination['page']): ?>
                        <button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-md text-sm font-medium shadow-sm"><?= $i ?></button>
                    <?php else: ?>
                        <a href="<?= $baseUrl ?>page=<?= $i ?>" class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <?php if ($pagination['page'] < $pagination['total_pages']): ?>
                    <a href="<?= $baseUrl ?>page=<?= $pagination['page'] + 1 ?>" class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></a>
                <?php else: ?>
                    <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-300 cursor-not-allowed" disabled><span class="iconify" data-icon="mdi:chevron-right"></span></button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

