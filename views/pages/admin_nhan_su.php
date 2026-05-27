<?php
// views/pages/admin_nhan_su.php
?>
<div class="px-4 md:px-6 py-6 max-w-[1400px] mx-auto min-h-screen">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-4">
        <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18] transition-colors">Admin</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <a href="<?= APP_URL ?>/admin/quan-ly-cua-hang" class="hover:text-[#6B0D18] transition-colors">Cấu hình cửa hàng</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span class="text-gray-900 font-medium">Quản lý nhân sự</span>
    </nav>

    <!-- Tiêu đề trang & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">Quản lý nhân sự</h1>
            <p class="text-gray-500 mt-1 text-sm">Quản lý tài khoản nhân viên, vai trò, quyền truy cập và lịch sử hoạt động trong hệ thống Admin.</p>
        </div>
        <div class="flex flex-wrap md:flex-nowrap items-center gap-3 shrink-0">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify text-gray-400" data-icon="mdi:file-export-outline"></span> Xuất danh sách
            </button>
            <a href="<?= APP_URL ?>/admin/vai-tro" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify text-gray-400" data-icon="mdi:shield-account-outline"></span> Quản lý vai trò
            </a>
            <a href="<?= APP_URL ?>/admin/nhan-su/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:plus"></span> Thêm nhân viên
            </a>
        </div>
    </div>

    <!-- Thống kê -->
    <?php require_once __DIR__ . '/../components/Admin/nhan_su/stats_cards.php'; ?>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden mt-6">
        
        <!-- Filter Bar -->
        <?php require_once __DIR__ . '/../components/Admin/nhan_su/filter_bar.php'; ?>

        <!-- Bulk Actions -->
        <div id="bulkActions" class="hidden bg-red-50 border-b border-red-100 px-6 py-3 flex items-center justify-between">
            <span class="text-sm font-bold text-red-900"><span id="selectedCount">0</span> nhân viên đã chọn</span>
            <div class="flex gap-2">
                <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-md text-xs font-medium hover:bg-gray-50 shadow-sm flex items-center gap-1">
                    <span class="iconify text-gray-400" data-icon="mdi:email-outline"></span> Gửi lời mời
                </button>
                <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-md text-xs font-medium hover:bg-gray-50 shadow-sm flex items-center gap-1">
                    <span class="iconify text-gray-400" data-icon="mdi:shield-account-outline"></span> Gán vai trò
                </button>
                <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-md text-xs font-medium hover:bg-red-50 shadow-sm flex items-center gap-1">
                    <span class="iconify text-red-500" data-icon="mdi:lock-outline"></span> Khóa tài khoản
                </button>
            </div>
        </div>

        <!-- Bảng dữ liệu -->
        <?php require_once __DIR__ . '/../components/Admin/nhan_su/table_list.php'; ?>
        
        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex items-center justify-between">
            <span class="text-sm text-gray-500">Hiển thị <span class="font-bold text-gray-900">1</span> đến <span class="font-bold text-gray-900">5</span> của <span class="font-bold text-gray-900">12</span> nhân viên</span>
            <div class="flex gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-500 hover:bg-gray-50 disabled:opacity-50"><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-[#6B0D18] bg-[#6B0D18] text-white font-medium text-sm">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 font-medium text-sm">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 font-medium text-sm">3</button>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-500 hover:bg-gray-50"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
<?php require_once __DIR__ . '/../components/Admin/nhan_su/modals.php'; ?>

<script>
    function toggleSelectAll(source) {
        checkboxes = document.querySelectorAll('.staff-checkbox');
        for (var i = 0, n = checkboxes.length; i < n; i++) {
            checkboxes[i].checked = source.checked;
        }
        updateBulkAction();
    }

    function updateBulkAction() {
        const checkboxes = document.querySelectorAll('.staff-checkbox:checked');
        const bulkActions = document.getElementById('bulkActions');
        const selectedCount = document.getElementById('selectedCount');
        
        if(checkboxes.length > 0) {
            bulkActions.classList.remove('hidden');
            selectedCount.innerText = checkboxes.length;
        } else {
            bulkActions.classList.add('hidden');
            document.getElementById('selectAll').checked = false;
        }
    }

    // Dropdown Actions Toggle
    function toggleActionMenu(id) {
        document.querySelectorAll('[id^="actionMenu-"]').forEach(menu => {
            if(menu.id !== 'actionMenu-' + id) {
                menu.classList.add('hidden');
            }
        });
        
        const menu = document.getElementById('actionMenu-' + id);
        if(menu) {
            if(menu.classList.contains('hidden')) {
                // Hiển thị menu
                menu.classList.remove('hidden');
                
                // Lấy vị trí nút
                const btn = event.currentTarget;
                const rect = btn.getBoundingClientRect();
                
                // Set vị trí fixed cho menu
                menu.style.top = (rect.bottom + 5) + 'px';
                menu.style.right = (window.innerWidth - rect.right) + 'px';
                menu.style.left = 'auto'; // Reset left
            } else {
                menu.classList.add('hidden');
            }
        }
    }

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown-container')) {
            document.querySelectorAll('[id^="actionMenu-"]').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });
</script>
