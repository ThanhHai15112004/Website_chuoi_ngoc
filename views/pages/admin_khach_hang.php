<?php
// views/pages/admin_customer.php
$thong_ke = $thong_ke ?? [];
$customers = $customers ?? [];
?>
<div class="animate-[fadeInPage_0.3s_ease-out] max-w-7xl mx-auto pb-12">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Quản lý khách hàng</h2>
            <p class="text-sm text-gray-500 mt-1">Theo dõi thông tin khách hàng, hạng thành viên, lịch sử mua hàng và trạng thái tài khoản.</p>
        </div>
        <div class="flex items-center gap-3 shrink-0">
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm flex items-center gap-2 shadow-md" onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/them'">
                <span class="iconify" data-icon="mdi:plus"></span> Thêm khách hàng
            </button>
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:refresh"></span> Làm mới
            </button>
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:export-variant"></span> Xuất danh sách
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <?php include __DIR__ . '/../components/Admin/khach_hang/stats_cards.php'; ?>


    <!-- Search & Filter Bar -->
    <?php include __DIR__ . '/../components/Admin/khach_hang/search_filter.php'; ?>

    <!-- Thanh thao tác hàng loạt (ẩn mặc định) -->
    <div id="bulkActionBar" class="hidden bg-white border border-[#6B0D18]/20 rounded-xl shadow-sm mb-4 px-4 py-3 flex items-center justify-between animate-[fadeInPage_0.2s_ease-out]">
        <div class="flex items-center gap-2 text-sm text-gray-700">
            <span id="bulkSelectedCount" class="w-6 h-6 rounded bg-[#6B0D18]/10 text-[#6B0D18] font-bold flex items-center justify-center">0</span>
            <span>Khách hàng đang chọn</span>
        </div>
        <div class="flex items-center gap-2">
            <button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded text-xs font-medium hover:bg-[#8A111F]" onclick="submitBulkNotify()">Gửi thông báo</button>
            <button class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 rounded text-xs font-medium hover:bg-gray-50" onclick="submitBulkAssignVoucher()">Gán voucher</button>
            <button class="px-3 py-1.5 border border-red-200 text-red-600 rounded text-xs font-medium hover:bg-red-50" onclick="submitBulkLock()">Khóa tài khoản</button>
            <button class="px-3 py-1.5 bg-red-600 text-white rounded text-xs font-medium hover:bg-red-700" onclick="submitBulkDelete()">Xóa</button>
        </div>
    </div>

    <!-- Bảng danh sách Khách hàng -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        
        <!-- Desktop Table -->
        <div class="hidden lg:block overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-100 text-xs text-gray-500 uppercase tracking-wider">
                        <th class="py-4 pl-6 pr-3 w-12">
                            <input type="checkbox" id="selectAllCheckbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18] cursor-pointer" onchange="toggleAllCheckboxes(this)">
                        </th>
                        <th class="py-4 px-3 font-bold">Khách hàng</th>
                        <th class="py-4 px-3 font-bold">Liên hệ</th>
                        <th class="py-4 px-3 font-bold">Hạng</th>
                        <th class="py-4 px-3 font-bold group">
                            <?php
                                $currentSort = $_GET['sort'] ?? '';
                                $nextSort = ($currentSort === 'chi_tieu_desc') ? 'chi_tieu_asc' : 'chi_tieu_desc';
                                $queryParams = $_GET;
                                $queryParams['sort'] = $nextSort;
                                $sortUrl = '?' . http_build_query($queryParams);
                            ?>
                            <a href="<?= $sortUrl ?>" class="flex items-center gap-1 hover:text-[#6B0D18] transition-colors w-fit">
                                Lịch sử mua
                                <div class="flex flex-col text-[10px] opacity-20 group-hover:opacity-100 transition-opacity">
                                    <span class="iconify <?= $currentSort === 'chi_tieu_asc' ? 'text-[#6B0D18] opacity-100' : 'text-gray-400' ?> -mb-1.5" data-icon="mdi:menu-up"></span>
                                    <span class="iconify <?= $currentSort === 'chi_tieu_desc' ? 'text-[#6B0D18] opacity-100' : 'text-gray-400' ?>" data-icon="mdi:menu-down"></span>
                                </div>
                            </a>
                        </th>
                        <th class="py-4 px-3 font-bold">Mệnh</th>
                        <th class="py-4 px-3 font-bold">Trạng thái</th>
                        <th class="py-4 pr-6 pl-3 font-bold text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php foreach ($customers as $kh): ?>
                    <tr class="hover:bg-gray-50/50 transition-colors group">
                        <?php include __DIR__ . '/../components/Admin/khach_hang/table_row.php'; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Mobile Card List -->
        <div class="lg:hidden flex flex-col divide-y divide-gray-100">
            <?php foreach ($customers as $kh): ?>
            <div class="p-4 flex gap-4">
                <div class="shrink-0 pt-1">
                    <input type="checkbox" value="<?= $kh['id'] ?>" class="user-checkbox w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" onchange="toggleBulkAction(this)">
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start mb-2">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center font-bold text-gray-500 uppercase">
                                <?= mb_substr($kh['ten'], 0, 1) ?>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800 text-sm"><?= $kh['ten'] ?></h4>
                                <div class="flex items-center gap-1.5 mt-0.5">
                                    <span class="text-xs text-gray-500"><?= $kh['sdt'] ?></span>
                                    <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                    <?php if ($kh['hang'] === 'Gold'): ?>
                                        <span class="text-[10px] font-bold text-yellow-600">GOLD</span>
                                    <?php elseif ($kh['hang'] === 'Diamond'): ?>
                                        <span class="text-[10px] font-bold text-[#6B0D18]">DIAMOND</span>
                                    <?php else: ?>
                                        <span class="text-[10px] font-bold text-gray-500">SILVER</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <button onclick="toggleActionMenu(this)" class="p-1 text-gray-400 hover:text-gray-700">
                            <span class="iconify" data-icon="mdi:dots-vertical"></span>
                        </button>
                        <div class="absolute right-4 mt-8 w-48 bg-white rounded-xl shadow-[0_4px_20px_rgba(0,0,0,0.1)] border border-gray-100 py-2 hidden z-10">
                            <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50" onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['ma'] ?>'">Xem đơn hàng</button>
                            <button class="w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-50" onclick="openRankModal('<?= $kh['id'] ?>')">Cập nhật hạng</button>
                            <button class="w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50" onclick="openDeleteModal('<?= $kh['id'] ?>')">Xóa tài khoản</button>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 p-2.5 rounded-lg border border-gray-100 flex justify-between items-center mb-3">
                        <div>
                            <p class="text-[10px] text-gray-500 uppercase tracking-wide">Chi tiêu</p>
                            <p class="font-bold text-[#6B0D18] text-sm"><?= number_format($kh['tong_chi_tieu'], 0, ',', '.') ?>đ</p>
                        </div>
                        <div class="w-px h-6 bg-gray-200"></div>
                        <div>
                            <p class="text-[10px] text-gray-500 uppercase tracking-wide">Đơn hàng</p>
                            <p class="font-bold text-gray-800 text-sm"><?= $kh['tong_don'] ?> đơn</p>
                        </div>
                        <div class="w-px h-6 bg-gray-200"></div>
                        <div>
                            <p class="text-[10px] text-gray-500 uppercase tracking-wide">Trạng thái</p>
                            <?php if ($kh['trang_thai'] === 'hoat_dong'): ?>
                                <p class="font-bold text-emerald-600 text-xs mt-0.5">Hoạt động</p>
                            <?php elseif ($kh['trang_thai'] === 'bi_khoa'): ?>
                                <p class="font-bold text-red-600 text-xs mt-0.5">Bị khóa</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <button onclick="window.location.href='<?= APP_URL ?>/admin/khach-hang/chi-tiet/<?= $kh['ma'] ?>'" class="w-full py-2 border border-blue-100 text-blue-600 bg-blue-50 rounded-lg text-sm font-bold hover:bg-blue-100 transition-colors text-center flex items-center justify-center gap-2">
                        <span class="iconify text-lg" data-icon="mdi:eye-outline"></span> Xem chi tiết sơ
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Phân trang -->
    <div class="mt-6 flex flex-col md:flex-row items-center justify-between gap-4">
        <?php
        $page = $pagination['page'] ?? 1;
        $limit = $pagination['limit'] ?? 20;
        $totalItems = $pagination['total_items'] ?? 0;
        $totalPages = $pagination['total_pages'] ?? 1;
        
        $startItem = ($page - 1) * $limit + 1;
        $endItem = min($page * $limit, $totalItems);
        
        // Build query string for pagination links
        $queryParams = $_GET;
        unset($queryParams['page']);
        $queryString = http_build_query($queryParams);
        $baseUrl = APP_URL . '/admin/khach-hang?' . ($queryString ? $queryString . '&' : '');
        ?>
        <span class="text-sm text-gray-500">Hiển thị <?= $totalItems > 0 ? "$startItem - $endItem" : "0" ?> trong <?= number_format($totalItems, 0, ',', '.') ?> khách hàng</span>
        
        <?php if ($totalPages > 1): ?>
        <div class="flex items-center gap-1">
            <?php if ($page > 1): ?>
                <a href="<?= $baseUrl ?>page=<?= $page - 1 ?>" class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 bg-white"><span class="iconify" data-icon="mdi:chevron-left"></span></a>
            <?php else: ?>
                <button disabled class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-100 text-gray-300 bg-gray-50 cursor-not-allowed"><span class="iconify" data-icon="mdi:chevron-left"></span></button>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <?php if ($i == $page): ?>
                    <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#6B0D18] text-white font-bold text-sm shadow-md"><?= $i ?></button>
                <?php elseif ($i == 1 || $i == $totalPages || abs($i - $page) <= 1): ?>
                    <a href="<?= $baseUrl ?>page=<?= $i ?>" class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 font-medium text-sm bg-white"><?= $i ?></a>
                <?php elseif (abs($i - $page) == 2): ?>
                    <span class="w-8 h-8 flex items-center justify-center text-gray-500 text-sm">...</span>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="<?= $baseUrl ?>page=<?= $page + 1 ?>" class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 bg-white"><span class="iconify" data-icon="mdi:chevron-right"></span></a>
            <?php else: ?>
                <button disabled class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-100 text-gray-300 bg-gray-50 cursor-not-allowed"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- ============================================== -->
<!-- POPUPS & DRAWERS -->
<!-- ============================================== -->

                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal Nâng/Hạ Hạng -->
<?php include __DIR__ . '/../components/Admin/khach_hang/modals.php'; ?>

<?php include __DIR__ . '/../components/Admin/khach_hang/scripts.php'; ?>
