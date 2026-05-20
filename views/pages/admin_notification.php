<?php
// views/pages/admin_notification.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Hộp thư / Thông báo</h2>
            <p class="text-sm text-gray-500 mt-1">Quản lý thông báo hệ thống, tin nhắn gửi khách hàng và các cảnh báo cần xử lý.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:email-fast-outline"></span>
                Gửi hàng loạt
            </button>
            <a href="<?= APP_URL ?>/admin/notification/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md shadow-[#6B0D18]/20 flex items-center gap-2">
                <span class="iconify" data-icon="mdi:plus"></span>
                Tạo thông báo
            </a>
        </div>
    </div>

<?php include __DIR__ . '/../components/Admin/notification/stats_cards.php'; ?>

<?php include __DIR__ . '/../components/Admin/notification/search_filter.php'; ?>

    <!-- Action Bar & Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Bulk Actions -->
        <div class="p-3 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
            <span class="text-sm text-gray-500 px-2 border-r border-gray-300">Đã chọn: <strong class="text-gray-800" id="selected-count">0</strong></span>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-sm font-medium disabled:opacity-50 flex items-center gap-1" disabled><span class="iconify text-base" data-icon="mdi:email-open-outline"></span> Đánh dấu đã đọc</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-sm font-medium disabled:opacity-50 flex items-center gap-1" disabled><span class="iconify text-base" data-icon="mdi:archive-arrow-down-outline"></span> Lưu trữ</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-md hover:bg-red-50 hover:border-red-200 transition-colors text-sm font-medium disabled:opacity-50 flex items-center gap-1" disabled><span class="iconify text-base" data-icon="mdi:trash-can-outline"></span> Xóa</button>
        </div>

        <!-- Table Responsive Container -->
        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold sticky top-0 z-10">
                    <tr>
                        <th class="px-4 py-3 w-10">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </th>
                        <th class="px-4 py-3">Loại</th>
                        <th class="px-4 py-3 w-[250px]">Tiêu đề</th>
                        <th class="px-4 py-3">Người nhận</th>
                        <th class="px-4 py-3 min-w-[200px]">Nội dung ngắn</th>
                        <th class="px-4 py-3">Trạng thái gửi</th>
                        <th class="px-4 py-3">Đã đọc</th>
                        <th class="px-4 py-3">Người tạo</th>
                        <th class="px-4 py-3">Thời gian</th>
                        <th class="px-4 py-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
<?php include __DIR__ . '/../components/Admin/notification/table_row.php'; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-white">
            <div class="text-sm text-gray-500 flex items-center gap-2">
                <span>Hiển thị</span>
                <select class="border border-gray-200 rounded p-1 text-sm bg-white focus:outline-none">
                    <option>10</option>
                    <option>20</option>
                    <option>50</option>
                </select>
                <span>trong 1.248 thông báo</span>
            </div>
            <div class="flex items-center gap-1">
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-md text-sm font-medium shadow-sm">1</button>
                <button class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">2</button>
                <button class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">3</button>
                <span class="px-2 text-gray-400">...</span>
                <button class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">125</button>
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../components/Admin/notification/modals.php'; ?>

<?php include __DIR__ . '/../components/Admin/notification/scripts.php'; ?>
