<?php 
$filters = $_GET ?? []; 
$kw = $filters['keyword'] ?? '';
$time_sel = $filters['thoi_gian'] ?? '';
$tt_sel = $filters['thanh_toan'] ?? '';
$ht_sel = $filters['hinh_thuc'] ?? '';
?>
        <!-- Search & Filter Bar -->
        <form method="GET" action="" class="p-4 border-b border-gray-100 flex flex-col gap-3">
            <div class="flex flex-col lg:flex-row gap-3">
                <!-- Search -->
                <div class="relative flex-1 group">
                    <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 group-focus-within:text-[#6B0D18] transition-colors" data-icon="mdi:magnify"></span>
                    <input type="text" name="keyword" value="<?= htmlspecialchars($kw) ?>" placeholder="Tìm theo mã đơn, tên khách hàng, số điện thoại..." class="w-full pl-10 pr-4 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                </div>
                
                <!-- Filters -->
                <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar">
                    <select name="thoi_gian" onchange="this.form.submit()" class="px-3 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 min-w-[140px] cursor-pointer">
                        <option value="">Thời gian: Tất cả</option>
                        <option value="today" <?= $time_sel === 'today' ? 'selected' : '' ?>>Hôm nay</option>
                        <option value="7days" <?= $time_sel === '7days' ? 'selected' : '' ?>>7 ngày qua</option>
                        <option value="30days" <?= $time_sel === '30days' ? 'selected' : '' ?>>30 ngày qua</option>
                        <option value="month" <?= $time_sel === 'month' ? 'selected' : '' ?>>Tháng này</option>
                    </select>
                    
                    <select name="thanh_toan" onchange="this.form.submit()" class="px-3 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 min-w-[140px] cursor-pointer">
                        <option value="">Thanh toán: Tất cả</option>
                        <option value="0" <?= $tt_sel === '0' ? 'selected' : '' ?>>Chưa thanh toán</option>
                        <option value="1" <?= $tt_sel === '1' ? 'selected' : '' ?>>Đã thanh toán</option>
                    </select>
                    
                    <select name="hinh_thuc" onchange="this.form.submit()" class="px-3 py-2 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-sm text-gray-600 min-w-[160px] cursor-pointer">
                        <option value="">Hình thức: Tất cả</option>
                        <option value="cod" <?= $ht_sel === 'cod' ? 'selected' : '' ?>>Thanh toán khi nhận hàng</option>
                        <option value="ck" <?= $ht_sel === 'ck' ? 'selected' : '' ?>>Chuyển khoản</option>
                        <option value="vnpay" <?= $ht_sel === 'vnpay' ? 'selected' : '' ?>>VNPay</option>
                    </select>
                    
                    <button type="submit" class="px-4 py-2 text-white bg-[#6B0D18] rounded-xl hover:bg-[#4C0519] text-sm font-medium transition-colors whitespace-nowrap flex items-center gap-1.5 shadow-sm">
                        <span class="iconify" data-icon="mdi:filter-variant"></span> Lọc
                    </button>
                </div>
            </div>
            
            <!-- Active Filters Chips -->
            <?php
            $activeFilters = [];
            if (!empty($kw)) {
                $activeFilters['keyword'] = 'Từ khóa: ' . $kw;
            }
            if (!empty($time_sel)) {
                $time_labels = ['today' => 'Hôm nay', '7days' => '7 ngày qua', '30days' => '30 ngày qua', 'month' => 'Tháng này'];
                $activeFilters['thoi_gian'] = 'Thời gian: ' . ($time_labels[$time_sel] ?? $time_sel);
            }
            if ($tt_sel !== '') {
                $activeFilters['thanh_toan'] = 'Thanh toán: ' . ($tt_sel === '1' ? 'Đã thanh toán' : 'Chưa thanh toán');
            }
            if (!empty($ht_sel)) {
                $ht_labels = ['cod' => 'COD', 'ck' => 'Chuyển khoản', 'vnpay' => 'VNPay'];
                $activeFilters['hinh_thuc'] = 'Hình thức: ' . ($ht_labels[$ht_sel] ?? $ht_sel);
            }
            
            if (!empty($activeFilters) || isset($_GET['trang_thai'])):
            ?>
            <div class="flex items-center gap-2 flex-wrap pt-2">
                <span class="text-xs text-gray-500 font-medium">Đang lọc theo:</span>
                
                <?php if (isset($_GET['trang_thai']) && $_GET['trang_thai'] !== ''): 
                    $tt_dh_labels = [0 => 'Chờ xác nhận', 1 => 'Đang chuẩn bị', 2 => 'Đang giao', 3 => 'Thành công', 4 => 'Đã hủy'];
                    $q = $_GET; unset($q['trang_thai']); if(isset($q['page'])) unset($q['page']);
                ?>
                <a href="?<?= http_build_query($q) ?>" class="flex items-center gap-1 px-2.5 py-1 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-700 hover:bg-red-50 group">
                    Trạng thái đơn: <?= $tt_dh_labels[$_GET['trang_thai']] ?? $_GET['trang_thai'] ?>
                    <span class="text-gray-400 group-hover:text-red-500 ml-1 iconify" data-icon="mdi:close"></span>
                </a>
                <?php endif; ?>

                <?php foreach ($activeFilters as $key => $label): 
                    $queryParams = $_GET;
                    unset($queryParams[$key]);
                    if (isset($queryParams['page'])) unset($queryParams['page']);
                    $removeUrl = '?' . http_build_query($queryParams);
                ?>
                <a href="<?= $removeUrl ?>" class="flex items-center gap-1 px-2.5 py-1 bg-gray-50 border border-gray-200 rounded-lg text-xs text-gray-700 hover:bg-red-50 group">
                    <?= htmlspecialchars($label) ?>
                    <span class="text-gray-400 group-hover:text-red-500 ml-1 iconify" data-icon="mdi:close"></span>
                </a>
                <?php endforeach; ?>
                
                <a href="?" class="text-xs text-[#6B0D18] hover:underline ml-2 font-medium">Xóa bộ lọc</a>
            </div>
            <?php endif; ?>
        </form>
