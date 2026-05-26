<div class="p-6 space-y-6 bg-gray-50/50 min-h-screen relative">
    
    <!-- 1. Tiêu đề trang -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Nhà cung cấp</h1>
            <p class="text-sm text-gray-500 mt-1">Quản lý thông tin đối tác cung cấp sản phẩm, vật tư, lịch sử nhập hàng và đánh giá chất lượng.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:refresh"></span>
                Làm mới
            </button>
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:microsoft-excel"></span>
                Xuất danh sách
            </button>
            <a href="<?= APP_URL ?>/admin/nha-cung-cap/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:plus"></span>
                Thêm nhà cung cấp
            </a>
        </div>
    </div>

    <!-- 2. Thẻ thống kê (Stats Cards) -->
    <?php require_once __DIR__ . '/../components/Admin/nha_cung_cap/stats_cards.php'; ?>

    <!-- 3. Tabs Trạng thái & Bộ lọc (Tabs & Filters) -->
    <?php require_once __DIR__ . '/../components/Admin/nha_cung_cap/tabs_filter.php'; ?>

    <!-- 4. Thanh thao tác hàng loạt (Bulk Actions) -->
    <div class="hidden items-center justify-between bg-blue-50 border border-blue-100 rounded-lg p-3 mb-4 shadow-sm" id="bulkActionsBar">
        <div class="flex items-center gap-3">
            <span class="iconify text-blue-500 text-xl" data-icon="mdi:information"></span>
            <span class="text-sm font-medium text-blue-800">Đã chọn <span id="selectedCount" class="font-bold">0</span> nhà cung cấp</span>
        </div>
        <div class="flex items-center gap-2">
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded text-sm hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-1">
                <span class="iconify" data-icon="mdi:email-outline"></span> Gửi thông báo
            </button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded text-sm hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-1">
                <span class="iconify" data-icon="mdi:tag-outline"></span> Gắn nhóm hàng
            </button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-amber-600 rounded text-sm hover:bg-amber-50 transition-colors shadow-sm flex items-center gap-1 font-medium">
                <span class="iconify" data-icon="mdi:pause-circle-outline"></span> Tạm ngừng hợp tác
            </button>
        </div>
    </div>

    <!-- 5. Bảng danh sách nhà cung cấp -->
    <?php require_once __DIR__ . '/../components/Admin/nha_cung_cap/table_list.php'; ?>

    <!-- 6. Drawer Chi tiết Nhà cung cấp (ẩn mặc định) -->
    <?php require_once __DIR__ . '/../components/Admin/nha_cung_cap/drawer_detail.php'; ?>
    
    <!-- 7. Overlay cho Drawer -->
    <div id="drawerOverlay" class="fixed inset-0 bg-gray-900/40 z-40 hidden backdrop-blur-[2px] transition-opacity opacity-0" onclick="closeDrawer()"></div>

    <!-- 8. Modals -->
    <?php require_once __DIR__ . '/../components/Admin/nha_cung_cap/modals.php'; ?>
</div>

<!-- Script cho xử lý thao tác bảng -->
<script>
// Checkbox toàn bộ
function toggleAll(source) {
    const checkboxes = document.querySelectorAll('.ncc-checkbox');
    let checkedCount = 0;
    
    checkboxes.forEach(cb => {
        cb.checked = source.checked;
        if(source.checked) {
            cb.closest('tr').classList.add('bg-blue-50/30');
            checkedCount++;
        } else {
            cb.closest('tr').classList.remove('bg-blue-50/30');
        }
    });
    
    updateBulkActionsBar(checkedCount);
}

// Checkbox đơn lẻ
function toggleRow(checkbox) {
    if(checkbox.checked) {
        checkbox.closest('tr').classList.add('bg-blue-50/30');
    } else {
        checkbox.closest('tr').classList.remove('bg-blue-50/30');
        document.getElementById('checkAll').checked = false;
    }
    
    const checkedCount = document.querySelectorAll('.ncc-checkbox:checked').length;
    updateBulkActionsBar(checkedCount);
}

// Cập nhật thanh thao tác
function updateBulkActionsBar(count) {
    const bar = document.getElementById('bulkActionsBar');
    const countSpan = document.getElementById('selectedCount');
    
    if (count > 0) {
        bar.classList.remove('hidden');
        bar.classList.add('flex');
        countSpan.textContent = count;
    } else {
        bar.classList.add('hidden');
        bar.classList.remove('flex');
    }
}
</script>
