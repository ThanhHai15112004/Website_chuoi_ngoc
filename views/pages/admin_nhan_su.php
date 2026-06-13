<?php
// views/pages/admin_nhan_su.php
use App\Models\Admin\NhanSuModel;

$staffs     = $staffs ?? [];
$stats      = $stats ?? [];
$total      = $total ?? 0;
$page       = $page ?? 1;
$totalPages = $totalPages ?? 1;
$limit      = $limit ?? 10;
$tab        = $tab ?? 'all';
$search     = $search ?? '';
$vai_tro    = $vai_tro ?? '';
$dang_nhap  = $dang_nhap ?? '';

$from = min(($page - 1) * $limit + 1, $total);
$to   = min($page * $limit, $total);

// Build current filter query string
$filterQuery = http_build_query(array_filter([
    'tab' => $tab !== 'all' ? $tab : null,
    'search' => $search,
    'vai_tro' => $vai_tro,
    'dang_nhap' => $dang_nhap,
]));
?>
<div class="px-4 md:px-6 py-6 max-w-[1400px] mx-auto min-h-screen">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-4">
        <a href="<?= APP_URL ?>/admin/tong-quan" class="hover:text-[#6B0D18] transition-colors">Admin</a>
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
                <button onclick="handleBulkActivate()" class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded-md text-xs font-medium hover:bg-gray-50 shadow-sm flex items-center gap-1">
                    <span class="iconify text-emerald-500" data-icon="mdi:account-check"></span> Kích hoạt
                </button>
                <button onclick="handleBulkLock()" class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-md text-xs font-medium hover:bg-red-50 shadow-sm flex items-center gap-1">
                    <span class="iconify text-red-500" data-icon="mdi:lock-outline"></span> Khóa tài khoản
                </button>
                <button onclick="handleBulkDelete()" class="px-3 py-1.5 bg-red-600 text-white rounded-md text-xs font-medium hover:bg-red-700 shadow-sm flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:delete-outline"></span> Xóa
                </button>
            </div>
        </div>

        <!-- Bảng dữ liệu -->
        <?php require_once __DIR__ . '/../components/Admin/nhan_su/table_list.php'; ?>
        
        <!-- Pagination -->
        <?php if ($total > 0): ?>
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex items-center justify-between">
            <span class="text-sm text-gray-500">Hiển thị <span class="font-bold text-gray-900"><?= $from ?></span> đến <span class="font-bold text-gray-900"><?= $to ?></span> của <span class="font-bold text-gray-900"><?= $total ?></span> nhân viên</span>
            <div class="flex gap-1">
                <?php if ($page > 1): ?>
                    <a href="<?= APP_URL ?>/admin/nhan-su?page=<?= $page - 1 ?><?= $filterQuery ? '&' . $filterQuery : '' ?>" class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                        <span class="iconify" data-icon="mdi:chevron-left"></span>
                    </a>
                <?php else: ?>
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-500 disabled:opacity-50" disabled><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <a href="<?= APP_URL ?>/admin/nhan-su?page=<?= $i ?><?= $filterQuery ? '&' . $filterQuery : '' ?>" class="w-8 h-8 flex items-center justify-center rounded border font-medium text-sm <?= $i == $page ? 'border-[#6B0D18] bg-[#6B0D18] text-white' : 'border-gray-300 bg-white text-gray-700 hover:bg-gray-50' ?>">
                        <?= $i ?>
                    </a>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <a href="<?= APP_URL ?>/admin/nhan-su?page=<?= $page + 1 ?><?= $filterQuery ? '&' . $filterQuery : '' ?>" class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-500 hover:bg-gray-50">
                        <span class="iconify" data-icon="mdi:chevron-right"></span>
                    </a>
                <?php else: ?>
                    <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-300 bg-white text-gray-500 disabled:opacity-50" disabled><span class="iconify" data-icon="mdi:chevron-right"></span></button>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<!-- Quick View Drawer -->
<?php require_once __DIR__ . '/../components/Admin/nhan_su/quick_view_drawer.php'; ?>

<!-- Modals -->
<?php require_once __DIR__ . '/../components/Admin/nhan_su/modals.php'; ?>

<script>
    function toggleSelectAll(source) {
        document.querySelectorAll('.staff-checkbox').forEach(cb => cb.checked = source.checked);
        updateBulkAction();
    }

    function updateBulkAction() {
        const checked = document.querySelectorAll('.staff-checkbox:checked');
        const bulkActions = document.getElementById('bulkActions');
        const selectedCount = document.getElementById('selectedCount');
        
        if(checked.length > 0) {
            bulkActions.classList.remove('hidden');
            selectedCount.innerText = checked.length;
        } else {
            bulkActions.classList.add('hidden');
            document.getElementById('selectAll').checked = false;
        }
    }

    function getSelectedIds() {
        return Array.from(document.querySelectorAll('.staff-checkbox:checked')).map(cb => cb.value);
    }

    function handleBulkLock() {
        const ids = getSelectedIds();
        if (!ids.length) return;
        if (!confirm(`Bạn có chắc muốn khóa ${ids.length} tài khoản?`)) return;
        fetch(`${APP_URL}/admin/nhan-su/api/trang-thai-nhieu`, {
            method: 'POST', headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ids, trang_thai: 'bi_khoa'})
        }).then(r => r.json()).then(data => {
            showToast(data.message, data.success ? 'success' : 'error');
            if (data.success) setTimeout(() => location.reload(), 800);
        });
    }

    function handleBulkActivate() {
        const ids = getSelectedIds();
        if (!ids.length) return;
        fetch(`${APP_URL}/admin/nhan-su/api/trang-thai-nhieu`, {
            method: 'POST', headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ids, trang_thai: 'hoat_dong'})
        }).then(r => r.json()).then(data => {
            showToast(data.message, data.success ? 'success' : 'error');
            if (data.success) setTimeout(() => location.reload(), 800);
        });
    }

    function handleBulkDelete() {
        const ids = getSelectedIds();
        if (!ids.length) return;
        if (!confirm(`Xóa ${ids.length} nhân viên? Không thể hoàn tác!`)) return;
        fetch(`${APP_URL}/admin/nhan-su/api/xoa-nhieu`, {
            method: 'POST', headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ids})
        }).then(r => r.json()).then(data => {
            showToast(data.message, data.success ? 'success' : 'error');
            if (data.success) setTimeout(() => location.reload(), 800);
        });
    }

    // Dropdown Actions Toggle
    function toggleActionMenu(id) {
        document.querySelectorAll('[id^="actionMenu-"]').forEach(menu => {
            if(menu.id !== 'actionMenu-' + id) menu.classList.add('hidden');
        });
        const menu = document.getElementById('actionMenu-' + id);
        if(menu) {
            if(menu.classList.contains('hidden')) {
                menu.classList.remove('hidden');
                const btn = event.currentTarget;
                const rect = btn.getBoundingClientRect();
                menu.style.top = (rect.bottom + 5) + 'px';
                menu.style.right = (window.innerWidth - rect.right) + 'px';
                menu.style.left = 'auto';
            } else {
                menu.classList.add('hidden');
            }
        }
    }

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown-container')) {
            document.querySelectorAll('[id^="actionMenu-"]').forEach(menu => menu.classList.add('hidden'));
        }
    });
</script>
