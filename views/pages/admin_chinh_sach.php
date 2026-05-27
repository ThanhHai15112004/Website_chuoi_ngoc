<?php
// views/pages/admin_chinh_sach.php
?>
<div class="px-4 md:px-6 py-6 max-w-[1400px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-4">
        <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18] transition-colors">Admin</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <a href="<?= APP_URL ?>/admin/quan-ly-cua-hang" class="hover:text-[#6B0D18] transition-colors">Cấu hình cửa hàng</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span class="text-gray-900 font-medium">Chính sách cửa hàng</span>
    </nav>

    <!-- Tiêu đề trang & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">Chính sách cửa hàng</h1>
            <p class="text-gray-500 mt-1 text-sm">Quản lý các chính sách đổi trả, bảo hành, vận chuyển, thanh toán, bảo mật.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm tooltip" title="Làm mới dữ liệu">
                <span class="iconify" data-icon="mdi:refresh"></span> <span class="hidden md:inline">Làm mới</span>
            </button>
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:export-variant"></span> Xuất danh sách
            </button>
            <a href="<?= APP_URL ?>/admin/chinh-sach/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:plus"></span> Thêm chính sách
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <?php require_once __DIR__ . '/../components/Admin/chinh_sach/stats_cards.php'; ?>

    <!-- Main Content Area -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mt-6">
        
        <!-- Filter Bar -->
        <?php require_once __DIR__ . '/../components/Admin/chinh_sach/filter_bar.php'; ?>
        
        <!-- Action Bar (hiện khi chọn nhiều dòng) -->
        <div id="bulkActionBar" class="hidden bg-gray-50 border-b border-gray-200 px-6 py-3 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="iconify text-blue-600" data-icon="mdi:information"></span>
                <span class="text-sm font-bold text-gray-900">Đã chọn <span id="selectedCount">0</span> chính sách</span>
            </div>
            <div class="flex items-center gap-2">
                <button class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Hiển thị</button>
                <button class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Ẩn</button>
                <button class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Gắn vào Footer</button>
                <button class="px-3 py-1.5 bg-red-50 text-red-600 text-sm font-medium rounded-lg hover:bg-red-100 transition-colors border border-red-100 flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa
                </button>
            </div>
        </div>

        <!-- Table List -->
        <?php require_once __DIR__ . '/../components/Admin/chinh_sach/table_list.php'; ?>
        
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between bg-gray-50/50">
            <p class="text-sm text-gray-500">Hiển thị <span class="font-bold text-gray-900">1</span> đến <span class="font-bold text-gray-900">8</span> của <span class="font-bold text-gray-900">8</span> chính sách</p>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 rounded border border-gray-300 bg-white text-gray-400 flex items-center justify-center cursor-not-allowed" disabled>
                    <span class="iconify" data-icon="mdi:chevron-left"></span>
                </button>
                <button class="w-8 h-8 rounded border border-[#6B0D18] bg-[#6B0D18] text-white flex items-center justify-center text-sm font-medium">1</button>
                <button class="w-8 h-8 rounded border border-gray-300 bg-white text-gray-400 flex items-center justify-center cursor-not-allowed" disabled>
                    <span class="iconify" data-icon="mdi:chevron-right"></span>
                </button>
            </div>
        </div>
    </div>

</div>

<!-- Quick View Drawer -->
<?php require_once __DIR__ . '/../components/Admin/chinh_sach/quick_view_drawer.php'; ?>

<!-- Modals -->
<?php require_once __DIR__ . '/../components/Admin/chinh_sach/modals.php'; ?>

<script>
    // Handle select all checkbox
    function toggleSelectAll(source) {
        const checkboxes = document.querySelectorAll('.policy-checkbox');
        let count = 0;
        checkboxes.forEach(cb => {
            cb.checked = source.checked;
            if(cb.checked) count++;
        });
        updateBulkAction(count);
    }

    // Handle individual checkbox
    function updateBulkAction(forceCount = -1) {
        let count = 0;
        if(forceCount >= 0) {
            count = forceCount;
        } else {
            const checkboxes = document.querySelectorAll('.policy-checkbox:checked');
            count = checkboxes.length;
        }

        const bar = document.getElementById('bulkActionBar');
        if(count > 0) {
            document.getElementById('selectedCount').textContent = count;
            bar.classList.remove('hidden');
        } else {
            bar.classList.add('hidden');
            document.getElementById('selectAll').checked = false;
        }
    }
    // Handle dropdown menus
    function toggleActionMenu(id) {
        // Close all other menus first
        document.querySelectorAll('[id^="actionMenu-"]').forEach(menu => {
            if(menu.id !== 'actionMenu-' + id) {
                menu.classList.add('hidden');
            }
        });
        
        const menu = document.getElementById('actionMenu-' + id);
        menu.classList.toggle('hidden');
    }

    // Close menu when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown-container')) {
            document.querySelectorAll('[id^="actionMenu-"]').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });
</script>
