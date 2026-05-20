<?php
// views/pages/admin_san_pham.php
?>
<div class="space-y-6" x-data="productManagement()">
    <!-- Header Area -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 font-luxury">Quản lý sản phẩm</h2>
            <p class="text-sm text-gray-500 mt-1">Theo dõi, chỉnh sửa và quản lý toàn bộ sản phẩm vòng ngọc, chuỗi đá và trang sức phong thủy.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">
                <span class="iconify" data-icon="mdi:file-excel-outline"></span>
                Nhập / Xuất
            </button>
            <a href="<?= APP_URL ?>/admin/san-pham/them" class="flex items-center gap-2 px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:plus"></span>
                Thêm sản phẩm
            </a>
        </div>
    </div>

<?php include __DIR__ . '/../components/Admin/product/stats_cards.php'; ?>

<?php include __DIR__ . '/../components/Admin/product/search_filter.php'; ?>

    <!-- Bulk Actions (Hidden by default, shown when items are selected) -->
    <div id="bulkActions" class="bg-white px-4 py-3 rounded-xl shadow-sm border border-[#6B0D18]/20 flex items-center justify-between hidden transition-all">
        <div class="flex items-center gap-3">
            <span class="text-[#6B0D18] font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:check-circle"></span>
                Đã chọn <span id="selectedCount">0</span> sản phẩm
            </span>
            <div class="h-4 w-px bg-gray-300 mx-1"></div>
            <button class="text-sm text-gray-600 hover:text-[#6B0D18] px-2 py-1 rounded transition-colors font-medium">Hiển thị</button>
            <button class="text-sm text-gray-600 hover:text-[#6B0D18] px-2 py-1 rounded transition-colors font-medium">Ẩn</button>
            <button class="text-sm text-gray-600 hover:text-[#6B0D18] px-2 py-1 rounded transition-colors font-medium">Gắn nhãn</button>
            <button class="text-sm text-gray-600 hover:text-[#6B0D18] px-2 py-1 rounded transition-colors font-medium">Tạo khuyến mãi</button>
        </div>
        <button class="text-sm text-red-600 hover:bg-red-50 px-3 py-1.5 rounded-lg transition-colors font-medium border border-transparent hover:border-red-200 flex items-center gap-1">
            <span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa
        </button>
    </div>

    <!-- Data Table -->
    <div class="bg-white border border-gray-200 rounded-[18px] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse" id="productTable">
                <thead>
                    <tr class="bg-gray-50/50 border-b border-gray-200 text-xs uppercase tracking-wider text-gray-500 font-bold">
                        <th class="p-4 w-12 text-center">
                            <input type="checkbox" id="selectAll" class="w-4 h-4 text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18] cursor-pointer">
                        </th>
                        <th class="p-4 w-20">Ảnh</th>
                        <th class="p-4 min-w-[250px] cursor-pointer hover:text-[#6B0D18] group">Sản phẩm <span class="iconify inline-block opacity-0 group-hover:opacity-100 transition-opacity" data-icon="mdi:arrow-down"></span></th>
                        <th class="p-4">Phân loại</th>
                        <th class="p-4">Mệnh</th>
                        <th class="p-4 text-right cursor-pointer hover:text-[#6B0D18] group">Giá <span class="iconify inline-block opacity-0 group-hover:opacity-100 transition-opacity" data-icon="mdi:arrow-down"></span></th>
                        <th class="p-4 text-right cursor-pointer hover:text-[#6B0D18] group">Tồn kho <span class="iconify inline-block opacity-0 group-hover:opacity-100 transition-opacity" data-icon="mdi:arrow-down"></span></th>
                        <th class="p-4 text-center">Trạng thái</th>
                        <th class="p-4 text-center w-24">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    <?php if (empty($san_pham_list)): ?>
                        <tr>
                            <td colspan="9" class="p-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <span class="iconify text-6xl mb-3" data-icon="mdi:package-variant-closed"></span>
                                    <p class="text-lg text-gray-600 font-medium mb-1">Chưa có sản phẩm nào</p>
                                    <p class="text-sm mb-4">Hãy thêm sản phẩm đầu tiên để bắt đầu bán vòng ngọc và chuỗi đá phong thủy.</p>
                                    <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#4C0519] transition-colors text-sm font-medium shadow-sm flex items-center gap-2">
                                        <span class="iconify" data-icon="mdi:plus"></span> Thêm sản phẩm
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach($san_pham_list as $sp): ?>
<?php include __DIR__ . '/../components/Admin/product/table_row.php'; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-4 py-3 border-t border-gray-200 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2 text-sm text-gray-500">
                Hiển thị 
                <select class="px-2 py-1 border border-gray-200 rounded-md bg-white focus:outline-none focus:border-[#6B0D18]">
                    <option>10</option>
                    <option>20</option>
                    <option>50</option>
                </select>
                trong 256 sản phẩm
            </div>
            
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-400 hover:bg-gray-50 transition-colors cursor-not-allowed">
                    <span class="iconify" data-icon="mdi:chevron-left"></span>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-[#6B0D18] bg-[#6B0D18] text-white transition-colors font-medium text-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18] hover:border-gray-300 transition-colors font-medium text-sm">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18] hover:border-gray-300 transition-colors font-medium text-sm">3</button>
                <span class="w-8 h-8 flex items-center justify-center text-gray-400">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18] hover:border-gray-300 transition-colors font-medium text-sm">26</button>
                <button class="w-8 h-8 flex items-center justify-center rounded-lg border border-gray-200 text-gray-600 hover:bg-gray-50 hover:border-gray-300 transition-colors">
                    <span class="iconify" data-icon="mdi:chevron-right"></span>
                </button>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../components/Admin/product/modals.php'; ?>

<?php include __DIR__ . '/../components/Admin/product/scripts.php'; ?>
