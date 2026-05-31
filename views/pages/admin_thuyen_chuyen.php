<?php
// views/pages/admin_thuyen_chuyen.php
$current_page = 'thuyen_chuyen_kho';

// Helper function trạng thái
function getTrangThaiStyleTC($tt) {
    $tt = (int)$tt;
    $map = [
        0 => ['bg' => 'bg-gray-100', 'text' => 'text-gray-700', 'icon' => 'mdi:file-edit-outline', 'label' => 'Nháp'],
        1 => ['bg' => 'bg-amber-100', 'text' => 'text-amber-700', 'icon' => 'mdi:clock-outline', 'label' => 'Chờ xác nhận'],
        2 => ['bg' => 'bg-blue-100', 'text' => 'text-blue-700', 'icon' => 'mdi:check-circle-outline', 'label' => 'Đã duyệt'],
        3 => ['bg' => 'bg-cyan-100', 'text' => 'text-cyan-700', 'icon' => 'mdi:truck-fast-outline', 'label' => 'Đang chuyển'],
        4 => ['bg' => 'bg-emerald-100', 'text' => 'text-emerald-700', 'icon' => 'mdi:check-all', 'label' => 'Đã hoàn tất'],
        5 => ['bg' => 'bg-red-100', 'text' => 'text-[#6B0D18]', 'icon' => 'mdi:alert-circle-outline', 'label' => 'Có lỗi / thiếu hàng'],
        6 => ['bg' => 'bg-gray-100', 'text' => 'text-gray-500', 'icon' => 'mdi:close-circle-outline', 'label' => 'Đã hủy'],
    ];
    return $map[$tt] ?? $map[0];
}
?>

<!-- Trang Thuyên Chuyển Kho Admin -->
<div class="px-6 py-6 pb-20 max-w-[1600px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Tiêu đề & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <div class="flex items-center gap-3">
                <h2 class="text-3xl font-bold text-gray-900 leading-tight">Thuyên chuyển kho</h2>
            </div>
            <p class="text-sm text-gray-500 mt-1">Tạo và theo dõi các phiếu chuyển sản phẩm giữa các kho, chi nhánh hoặc khu vực lưu trữ.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="window.location.reload()" class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg text-gray-400" data-icon="mdi:refresh"></span> Làm mới
            </button>
            <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho/them" class="flex items-center gap-2 px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20">
                <span class="iconify text-lg" data-icon="mdi:plus"></span> Tạo phiếu chuyển
            </a>
        </div>
    </div>

    <!-- 7 Card Thống Kê Nhanh -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4 mb-6">
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Tổng phiếu chuyển</p>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($stats['tong']) ?> <span class="text-xs font-normal text-gray-400">phiếu</span></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-amber-400"></span> Chờ xác nhận
            </p>
            <div class="text-2xl font-bold text-amber-600"><?= number_format($stats['cho_xac_nhan']) ?></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-blue-400"></span> Đang chuyển
            </p>
            <div class="text-2xl font-bold text-blue-600"><?= number_format($stats['dang_chuyen']) ?></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-emerald-400"></span> Đã hoàn tất
            </p>
            <div class="text-2xl font-bold text-emerald-600"><?= number_format($stats['hoan_tat']) ?></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-gray-400"></span> Đã hủy
            </p>
            <div class="text-2xl font-bold text-gray-600"><?= number_format($stats['da_huy']) ?></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Sản phẩm đã chuyển</p>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($stats['sp_chuyen']) ?> <span class="text-xs font-normal text-gray-400">món</span></div>
        </div>
        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm flex flex-col justify-center">
            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-red-500"></span> Có lỗi / Thiếu
            </p>
            <div class="text-2xl font-bold text-red-600"><?= number_format($stats['co_loi']) ?></div>
        </div>
    </div>

    <!-- Tabs Trạng thái -->
    <?php
    $currentTab = $_GET['trang_thai'] ?? '';
    $tabs = [
        '' => 'Tất cả (' . $stats['tong'] . ')',
        '1' => 'Chờ xác nhận (' . $stats['cho_xac_nhan'] . ')',
        '2' => 'Đã duyệt (' . $stats['da_duyet'] . ')',
        '3' => 'Đang chuyển (' . $stats['dang_chuyen'] . ')',
        '4' => 'Đã hoàn tất (' . $stats['hoan_tat'] . ')',
        '6' => 'Đã hủy (' . $stats['da_huy'] . ')',
        '5' => 'Có lỗi (' . $stats['co_loi'] . ')',
    ];
    ?>
    <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-2 sidebar-scroll">
        <?php foreach ($tabs as $val => $label): ?>
            <?php $isActive = ($currentTab === (string)$val); ?>
            <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho?trang_thai=<?= $val ?>" 
               class="px-5 py-2 <?= $isActive ? 'bg-[#6B0D18] text-white shadow-sm border-transparent' : 'bg-white text-gray-600 border-gray-200 hover:bg-gray-50' ?> border rounded-full text-sm font-medium whitespace-nowrap transition-colors">
                <?= $label ?>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Bảng danh sách -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
        <!-- Toolbar bộ lọc -->
        <form method="GET" action="<?= APP_URL ?>/admin/thuyen-chuyen-kho" class="p-4 border-b border-gray-200 bg-white flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="relative w-full md:max-w-md">
                <input type="text" name="keyword" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" placeholder="Tìm theo mã phiếu, kho gửi, kho nhận..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-[#6B0D18] text-lg" data-icon="mdi:magnify"></span>
            </div>
            <input type="hidden" name="trang_thai" value="<?= htmlspecialchars($currentTab) ?>">
            <button type="submit" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2">
                <span class="iconify" data-icon="mdi:magnify"></span> Tìm kiếm
            </button>
        </form>

        <!-- Bảng -->
        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-200 text-xs uppercase text-gray-500">
                        <th class="py-3 px-4 font-semibold">Mã phiếu</th>
                        <th class="py-3 px-4 font-semibold">Kho gửi <span class="mx-1">→</span> Kho nhận</th>
                        <th class="py-3 px-4 font-semibold">Sản phẩm & SL</th>
                        <th class="py-3 px-4 font-semibold">Người tạo</th>
                        <th class="py-3 px-4 font-semibold">Thời gian</th>
                        <th class="py-3 px-4 font-semibold text-center">Trạng thái</th>
                        <th class="py-3 px-4 font-semibold text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <?php if (empty($danhSach)): ?>
                        <tr>
                            <td colspan="7" class="py-12 text-center text-gray-500">
                                <span class="iconify text-4xl text-gray-300 mx-auto mb-2" data-icon="mdi:package-variant"></span>
                                <p class="font-medium">Chưa có phiếu chuyển kho nào</p>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($danhSach as $phieu): ?>
                            <?php $style = getTrangThaiStyleTC($phieu['trang_thai']); ?>
                            <tr class="hover:bg-gray-50/50 transition-colors group">
                                <td class="py-3 px-4 align-top">
                                    <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho/chi-tiet/<?= $phieu['id'] ?>" class="font-bold text-[#6B0D18] hover:underline">
                                        <?= htmlspecialchars($phieu['ma_phieu']) ?>
                                    </a>
                                    <?php if ($phieu['muc_do_uu_tien'] == 1): ?>
                                        <span class="inline-block mt-1 px-1.5 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-700">GẤP</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-3 px-4 align-top">
                                    <div class="flex items-center gap-3">
                                        <div class="flex items-center gap-1.5">
                                            <span class="iconify text-gray-400" data-icon="mdi:warehouse"></span>
                                            <span class="text-sm font-medium text-gray-600"><?= htmlspecialchars($phieu['ten_kho_gui'] ?? '') ?></span>
                                        </div>
                                        <span class="iconify text-[#6B0D18] text-lg" data-icon="mdi:arrow-right"></span>
                                        <div class="flex items-center gap-1.5">
                                            <span class="iconify text-[#6B0D18]" data-icon="mdi:warehouse"></span>
                                            <span class="text-sm font-bold text-gray-900"><?= htmlspecialchars($phieu['ten_kho_nhan'] ?? '') ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-3 px-4 align-top">
                                    <?php if ($phieu['san_pham_dau']): ?>
                                        <div class="flex items-start gap-3">
                                            <div class="w-10 h-10 rounded border border-gray-200 overflow-hidden shrink-0 bg-gray-100 flex items-center justify-center">
                                                <?php if (!empty($phieu['san_pham_dau']['image'])): ?>
                                                    <img src="<?= APP_URL ?>/<?= htmlspecialchars($phieu['san_pham_dau']['image']) ?>" class="w-full h-full object-cover">
                                                <?php else: ?>
                                                    <span class="iconify text-gray-400" data-icon="mdi:image-outline"></span>
                                                <?php endif; ?>
                                            </div>
                                            <div>
                                                <div class="text-sm font-bold text-gray-900 truncate max-w-[200px]"><?= htmlspecialchars($phieu['san_pham_dau']['ten_sp'] ?? '') ?></div>
                                                <div class="text-xs text-gray-500 mt-0.5"><?= htmlspecialchars($phieu['san_pham_dau']['sku'] ?? '') ?></div>
                                                <?php if ($phieu['tong_loai_sp'] > 1): ?>
                                                    <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho/chi-tiet/<?= $phieu['id'] ?>" class="text-[11px] font-medium text-[#6B0D18] hover:underline mt-1 block">
                                                        +<?= $phieu['tong_loai_sp'] - 1 ?> sản phẩm khác
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="mt-2 text-sm">
                                        <span class="font-semibold text-gray-900">SL: <?= $phieu['tong_so_luong'] ?></span> món
                                    </div>
                                </td>
                                <td class="py-3 px-4 align-top">
                                    <div class="text-sm font-medium text-gray-900"><?= htmlspecialchars($phieu['nguoi_tao_ten'] ?? 'N/A') ?></div>
                                    <?php if ($phieu['nguoi_duyet_ten']): ?>
                                        <div class="text-xs text-gray-500 mt-1">Duyệt: <?= htmlspecialchars($phieu['nguoi_duyet_ten']) ?></div>
                                    <?php elseif ($phieu['trang_thai'] == 1): ?>
                                        <span class="inline-block mt-1 px-1.5 py-0.5 rounded text-[10px] font-medium bg-amber-100 text-amber-700">Chờ duyệt</span>
                                    <?php endif; ?>
                                </td>
                                <td class="py-3 px-4 align-top">
                                    <div class="text-sm text-gray-900 mb-1">
                                        <span class="text-gray-500 text-xs">Tạo:</span><br>
                                        <span class="font-medium"><?= $phieu['ngay_tao'] ? date('d/m/Y', strtotime($phieu['ngay_tao'])) : '' ?></span>
                                        <span class="text-xs text-gray-500 ml-1"><?= $phieu['ngay_tao'] ? date('H:i', strtotime($phieu['ngay_tao'])) : '' ?></span>
                                    </div>
                                    <?php if ($phieu['ngay_chuyen']): ?>
                                        <div class="text-sm text-gray-900">
                                            <span class="text-gray-500 text-xs">Chuyển:</span><br>
                                            <span class="font-medium"><?= date('d/m/Y', strtotime($phieu['ngay_chuyen'])) ?></span>
                                        </div>
                                    <?php else: ?>
                                        <div class="text-xs text-gray-400">Chưa chuyển</div>
                                    <?php endif; ?>
                                </td>
                                <td class="py-3 px-4 align-top text-center">
                                    <span class="inline-flex items-center justify-center gap-1.5 px-2.5 py-1.5 rounded-full text-[11px] font-bold uppercase tracking-wide <?= $style['bg'] ?> <?= $style['text'] ?>">
                                        <span class="iconify text-sm" data-icon="<?= $style['icon'] ?>"></span> <?= $style['label'] ?>
                                    </span>
                                </td>
                                <td class="py-3 px-4 align-top text-center">
                                    <div class="flex items-center justify-center gap-2">
                                        <a href="<?= APP_URL ?>/admin/thuyen-chuyen-kho/chi-tiet/<?= $phieu['id'] ?>" class="w-8 h-8 flex items-center justify-center rounded-lg bg-gray-50 hover:bg-[#6B0D18] text-gray-600 hover:text-white transition-colors" title="Xem chi tiết">
                                            <span class="iconify" data-icon="mdi:eye-outline"></span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Phân trang -->
        <?php
        $pCurrent = $pagination['current'] ?? 1;
        $pTotal = $pagination['total_records'] ?? 0;
        $pPages = $pagination['total_pages'] ?? 1;
        $pLimit = $pagination['limit'] ?? 20;
        $startItem = ($pCurrent - 1) * $pLimit + 1;
        if ($pTotal == 0) $startItem = 0;
        $endItem = min($pCurrent * $pLimit, $pTotal);
        $qp = $_GET; unset($qp['page']);
        $qs = !empty($qp) ? '&' . http_build_query($qp) : '';
        $baseUrl = APP_URL . '/admin/thuyen-chuyen-kho?';
        ?>
        <div class="p-4 border-t border-gray-200 bg-gray-50/50 flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Hiển thị <span class="font-medium text-gray-900"><?= $startItem ?></span> đến <span class="font-medium text-gray-900"><?= $endItem ?></span> trong số <span class="font-medium text-gray-900"><?= $pTotal ?></span> phiếu
            </div>
            <?php if ($pPages > 1): ?>
            <div class="flex items-center gap-1">
                <?php if ($pCurrent > 1): ?>
                    <a href="<?= $baseUrl . 'page=' . ($pCurrent - 1) . $qs ?>" class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50">
                        <span class="iconify" data-icon="mdi:chevron-left"></span>
                    </a>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $pPages; $i++): ?>
                    <?php if ($i == $pCurrent): ?>
                        <span class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#6B0D18] text-white font-medium text-sm shadow-sm"><?= $i ?></span>
                    <?php elseif ($i <= 3 || $i >= $pPages - 1 || abs($i - $pCurrent) <= 1): ?>
                        <a href="<?= $baseUrl . 'page=' . $i . $qs ?>" class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 text-sm font-medium"><?= $i ?></a>
                    <?php elseif ($i == 4 || $i == $pPages - 2): ?>
                        <span class="w-8 h-8 flex items-center justify-center text-gray-400">...</span>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if ($pCurrent < $pPages): ?>
                    <a href="<?= $baseUrl . 'page=' . ($pCurrent + 1) . $qs ?>" class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50">
                        <span class="iconify" data-icon="mdi:chevron-right"></span>
                    </a>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
