<?php
// views/pages/admin_don_hang.php
?>
<div class="max-w-7xl mx-auto space-y-6 relative">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Quản lý đơn hàng</h1>
            <p class="text-gray-500 text-sm mt-1">Theo dõi, xác nhận và cập nhật trạng thái các đơn hàng của khách.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="showToast('Đang xuất danh sách đơn hàng ra file Excel...')" class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify text-lg" data-icon="mdi:file-excel-outline"></span>
                Xuất danh sách
            </button>
            <button onclick="showToast('Đã làm mới dữ liệu đơn hàng')" class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify text-lg" data-icon="mdi:refresh"></span>
                Làm mới
            </button>
        </div>
    </div>

<?php include __DIR__ . '/../components/Admin/don_hang/stats_cards.php'; ?>

<?php include __DIR__ . '/../components/Admin/don_hang/status_tabs.php'; ?>

    <!-- Main Table Container -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm mb-10">
        
<?php include __DIR__ . '/../components/Admin/don_hang/search_filter.php'; ?>

        <!-- Bulk Actions Bar (Hidden by default) -->
        <div id="bulkActions" class="bg-red-50/50 px-4 py-3 border-b border-red-100 hidden items-center justify-between">
            <div class="flex items-center gap-2 text-sm">
                <span class="font-bold text-[#6B0D18]" id="selectedCount">0</span>
                <span class="text-gray-700">đơn hàng đang chọn</span>
            </div>
            <div class="flex items-center gap-2">
                <button onclick="showToast('Đã xác nhận các đơn hàng được chọn!')" class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-1.5">
                    <span class="iconify text-emerald-500" data-icon="mdi:check-all"></span> Xác nhận đơn
                </button>
                <button onclick="openPrintModal()" class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-lg text-xs font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-1.5">
                    <span class="iconify text-gray-500" data-icon="mdi:printer-outline"></span> In phiếu giao
                </button>
                <button onclick="showToast('Đã hủy các đơn hàng được chọn!', 'error')" class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-lg text-xs font-medium hover:bg-red-50 hover:border-red-200 transition-colors shadow-sm flex items-center gap-1.5">
                    <span class="iconify" data-icon="mdi:cancel"></span> Hủy đơn
                </button>
            </div>
        </div>

        <!-- Table Container -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse whitespace-nowrap min-w-[1200px]">
                <thead class="sticky top-0 bg-white z-10 shadow-[0_1px_2px_rgba(0,0,0,0.05)]">
                    <tr class="bg-gray-50/80 backdrop-blur-sm border-b border-gray-200 text-xs text-gray-500 uppercase tracking-wider font-semibold">
                        <th class="p-3 w-10 text-center"><input type="checkbox" id="selectAll" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] cursor-pointer"></th>
                        <th class="p-3 w-32">Mã đơn hàng</th>
                        <th class="p-3 w-48">Khách hàng</th>
                        <th class="p-3 w-64">Sản phẩm</th>
                        <th class="p-3 w-32">Ngày đặt</th>
                        <th class="p-3 w-32 text-right">Tổng tiền</th>
                        <th class="p-3 w-40 text-center">Thanh toán</th>
                        <th class="p-3 w-40 text-center">Vận chuyển</th>
                        <th class="p-3 w-32 text-center">Trạng thái</th>
                        <th class="p-3 w-32 text-center">Nhân viên</th>
                        <th class="p-3 w-28 text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    <?php foreach($don_hang_list as $dh): ?>
                        <?php include __DIR__ . '/../components/Admin/don_hang/table_row.php'; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between shrink-0 bg-white rounded-b-2xl">
            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-500">Hiển thị</span>
                <select class="px-2 py-1.5 bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-[#6B0D18] text-sm text-gray-700">
                    <option>10</option>
                    <option selected>20</option>
                    <option>50</option>
                    <option>100</option>
                </select>
                <span class="text-sm text-gray-500">trong tổng số <?= number_format($stats['tong_don'], 0, ',', '.') ?> đơn</span>
            </div>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 cursor-not-allowed bg-gray-50"><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#6B0D18] text-white font-medium text-sm shadow-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">3</button>
                <span class="w-8 h-8 flex items-center justify-center text-gray-400">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">63</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
            </div>
        </div>
    </div>
</div>

<!-- ================= MODALS & PANELS ================= -->

<?php include __DIR__ . '/../components/Admin/don_hang/quick_view_panel.php'; ?>

<?php include __DIR__ . '/../components/Admin/don_hang/modals.php'; ?>

<?php include __DIR__ . '/../components/Admin/don_hang/scripts.php'; ?>
