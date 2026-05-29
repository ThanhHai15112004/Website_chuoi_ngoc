<?php
// views/components/Admin/xuat_kho/tabs_filter.php
$currentStatus = $_GET['trang_thai'] ?? '';
?>
<div class="bg-white rounded-t-xl border-t border-l border-r border-gray-100">
    <!-- Tabs trạng thái -->
    <div class="overflow-x-auto custom-scrollbar border-b border-gray-100">
        <div class="flex items-center px-2 py-2 min-w-max">
            <button onclick="filterByStatus('')" class="px-4 py-2 text-sm font-medium rounded-lg <?= $currentStatus === '' ? 'text-white bg-[#6B0D18]' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-100' ?> shadow-sm whitespace-nowrap transition-colors flex items-center gap-1.5">
                Tất cả <span class="<?= $currentStatus === '' ? 'bg-white/20 text-white' : 'bg-gray-100 text-gray-600' ?> py-0.5 px-1.5 rounded-full text-xs"><?= $stats['tat_ca'] ?? 0 ?></span>
            </button>
            <button onclick="filterByStatus('1')" class="px-4 py-2 text-sm font-medium rounded-lg <?= $currentStatus === '1' ? 'text-white bg-yellow-600' : 'text-gray-500 hover:text-yellow-700 hover:bg-yellow-50' ?> whitespace-nowrap transition-colors flex items-center gap-1.5">
                Chờ duyệt <span class="<?= $currentStatus === '1' ? 'bg-white/20 text-white' : 'bg-yellow-50 text-yellow-700' ?> py-0.5 px-1.5 rounded-full text-xs"><?= $stats['cho_duyet'] ?? 0 ?></span>
            </button>
            <button onclick="filterByStatus('2')" class="px-4 py-2 text-sm font-medium rounded-lg <?= $currentStatus === '2' ? 'text-white bg-blue-600' : 'text-gray-500 hover:text-blue-700 hover:bg-blue-50' ?> whitespace-nowrap transition-colors flex items-center gap-1.5">
                Đang xuất <span class="<?= $currentStatus === '2' ? 'bg-white/20 text-white' : 'bg-blue-50 text-blue-700' ?> py-0.5 px-1.5 rounded-full text-xs"><?= $stats['dang_xuat'] ?? 0 ?></span>
            </button>
            <button onclick="filterByStatus('3')" class="px-4 py-2 text-sm font-medium rounded-lg <?= $currentStatus === '3' ? 'text-white bg-emerald-600' : 'text-gray-500 hover:text-emerald-700 hover:bg-emerald-50' ?> whitespace-nowrap transition-colors flex items-center gap-1.5">
                Hoàn thành <span class="<?= $currentStatus === '3' ? 'bg-white/20 text-white' : 'bg-emerald-50 text-emerald-700' ?> py-0.5 px-1.5 rounded-full text-xs"><?= $stats['hoan_thanh'] ?? 0 ?></span>
            </button>
        </div>
    </div>

    <!-- Thanh tìm kiếm & Lọc nâng cao -->
    <div class="p-4 flex flex-col md:flex-row items-start md:items-center justify-between gap-4 bg-gray-50/50">
        <form method="GET" action="<?= APP_URL ?>/admin/xuat-kho" class="w-full flex flex-col md:flex-row items-start md:items-center gap-4">
            <input type="hidden" name="trang_thai" id="filterStatus" value="<?= htmlspecialchars($currentStatus) ?>">
            
            <!-- Tìm kiếm -->
            <div class="relative w-full md:w-96">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="iconify text-[#6B0D18] text-lg" data-icon="mdi:magnify"></span>
                </div>
                <input type="text" name="keyword" value="<?= htmlspecialchars($_GET['keyword'] ?? '') ?>" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] sm:text-sm transition-colors" placeholder="Tìm theo mã phiếu, đơn hàng, người tạo...">
            </div>

            <!-- Nút tìm kiếm -->
            <button type="submit" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors shadow-sm shrink-0">
                Tìm kiếm
            </button>
        </form>
    </div>

    <?php if(!empty($_GET['keyword']) || !empty($_GET['trang_thai'])): ?>
    <!-- Hiển thị các filter đang áp dụng (chips) -->
    <div class="px-4 pb-4 bg-gray-50/50 flex flex-wrap items-center gap-2 border-b border-gray-100">
        <span class="text-xs text-gray-500 font-medium mr-1">Đang lọc theo:</span>
        <?php if(!empty($_GET['keyword'])): ?>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-white text-gray-700 border border-gray-200 shadow-sm">
            Từ khóa: <?= htmlspecialchars($_GET['keyword']) ?>
        </span>
        <?php endif; ?>
        <?php if($currentStatus !== ''): ?>
        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-white text-gray-700 border border-gray-200 shadow-sm">
            Trạng thái: 
            <?php 
                if ($currentStatus == '1') echo 'Chờ duyệt';
                elseif ($currentStatus == '2') echo 'Đang xuất';
                elseif ($currentStatus == '3') echo 'Hoàn thành';
                else echo 'Không xác định';
            ?>
        </span>
        <?php endif; ?>
        <a href="<?= APP_URL ?>/admin/xuat-kho" class="text-xs text-red-600 hover:text-red-700 hover:underline font-medium ml-1">Xóa bộ lọc</a>
    </div>
    <?php endif; ?>
</div>

<script>
    function filterByStatus(status) {
        document.getElementById('filterStatus').value = status;
        document.getElementById('filterStatus').closest('form').submit();
    }
</script>
