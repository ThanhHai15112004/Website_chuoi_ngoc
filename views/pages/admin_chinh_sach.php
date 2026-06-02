<?php
// views/pages/admin_chinh_sach.php
use App\Models\Admin\ChinhSachModel;
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
            <a href="<?= APP_URL ?>/admin/chinh-sach" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm tooltip" title="Làm mới dữ liệu">
                <span class="iconify" data-icon="mdi:refresh"></span> <span class="hidden md:inline">Làm mới</span>
            </a>
            <button onclick="exportPolicies()" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
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
                <button onclick="handleBulkStatus('dang_hien_thi')" class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Hiển thị</button>
                <button onclick="handleBulkStatus('dang_an')" class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors">Ẩn</button>
                <button onclick="handleBulkDelete()" class="px-3 py-1.5 bg-red-50 text-red-600 text-sm font-medium rounded-lg hover:bg-red-100 transition-colors border border-red-100 flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa
                </button>
            </div>
        </div>

        <!-- Table List -->
        <?php require_once __DIR__ . '/../components/Admin/chinh_sach/table_list.php'; ?>
        
        <!-- Pagination -->
        <?php
            $startRecord = $total > 0 ? ($page - 1) * $limit + 1 : 0;
            $endRecord = min($page * $limit, $total);
            
            // Xây dựng URL pagination giữ lại params filter
            $paginationParams = [];
            if (!empty($tab) && $tab !== 'all') $paginationParams['tab'] = $tab;
            if (!empty($loai)) $paginationParams['loai'] = $loai;
            if (!empty($vi_tri)) $paginationParams['vi_tri'] = $vi_tri;
            if (!empty($search)) $paginationParams['search'] = $search;
        ?>
        <div class="px-6 py-4 border-t border-gray-200 flex items-center justify-between bg-gray-50/50">
            <p class="text-sm text-gray-500">
                Hiển thị <span class="font-bold text-gray-900"><?= $startRecord ?></span> đến 
                <span class="font-bold text-gray-900"><?= $endRecord ?></span> của 
                <span class="font-bold text-gray-900"><?= $total ?></span> chính sách
            </p>
            <?php if ($totalPages > 1): ?>
            <div class="flex items-center gap-1">
                <!-- Prev -->
                <?php if ($page > 1): 
                    $prevParams = array_merge($paginationParams, ['page' => $page - 1]);
                ?>
                    <a href="<?= APP_URL ?>/admin/chinh-sach?<?= http_build_query($prevParams) ?>" class="w-8 h-8 rounded border border-gray-300 bg-white text-gray-600 flex items-center justify-center hover:bg-gray-50 transition-colors">
                        <span class="iconify" data-icon="mdi:chevron-left"></span>
                    </a>
                <?php else: ?>
                    <button class="w-8 h-8 rounded border border-gray-300 bg-white text-gray-400 flex items-center justify-center cursor-not-allowed" disabled>
                        <span class="iconify" data-icon="mdi:chevron-left"></span>
                    </button>
                <?php endif; ?>

                <!-- Page Numbers -->
                <?php for ($i = 1; $i <= $totalPages; $i++): 
                    $pageParams = array_merge($paginationParams, ['page' => $i]);
                ?>
                    <?php if ($i == $page): ?>
                        <button class="w-8 h-8 rounded border border-[#6B0D18] bg-[#6B0D18] text-white flex items-center justify-center text-sm font-medium"><?= $i ?></button>
                    <?php else: ?>
                        <a href="<?= APP_URL ?>/admin/chinh-sach?<?= http_build_query($pageParams) ?>" class="w-8 h-8 rounded border border-gray-300 bg-white text-gray-700 flex items-center justify-center text-sm font-medium hover:bg-gray-50 transition-colors"><?= $i ?></a>
                    <?php endif; ?>
                <?php endfor; ?>

                <!-- Next -->
                <?php if ($page < $totalPages): 
                    $nextParams = array_merge($paginationParams, ['page' => $page + 1]);
                ?>
                    <a href="<?= APP_URL ?>/admin/chinh-sach?<?= http_build_query($nextParams) ?>" class="w-8 h-8 rounded border border-gray-300 bg-white text-gray-600 flex items-center justify-center hover:bg-gray-50 transition-colors">
                        <span class="iconify" data-icon="mdi:chevron-right"></span>
                    </a>
                <?php else: ?>
                    <button class="w-8 h-8 rounded border border-gray-300 bg-white text-gray-400 flex items-center justify-center cursor-not-allowed" disabled>
                        <span class="iconify" data-icon="mdi:chevron-right"></span>
                    </button>
                <?php endif; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>

</div>

<!-- Quick View Drawer -->
<?php require_once __DIR__ . '/../components/Admin/chinh_sach/quick_view_drawer.php'; ?>

<!-- Modals -->
<?php require_once __DIR__ . '/../components/Admin/chinh_sach/modals.php'; ?>

<script>
    // === Checkbox Select All ===
    function toggleSelectAll(source) {
        const checkboxes = document.querySelectorAll('.policy-checkbox');
        let count = 0;
        checkboxes.forEach(cb => {
            cb.checked = source.checked;
            if(cb.checked) count++;
        });
        updateBulkAction(count);
    }

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

    // === Get Selected IDs ===
    function getSelectedIds() {
        return Array.from(document.querySelectorAll('.policy-checkbox:checked')).map(cb => parseInt(cb.value));
    }

    // === Dropdown Menu ===
    function toggleActionMenu(id) {
        document.querySelectorAll('[id^="actionMenu-"]').forEach(menu => {
            if(menu.id !== 'actionMenu-' + id) {
                menu.classList.add('hidden');
            }
        });
        const menu = document.getElementById('actionMenu-' + id);
        menu.classList.toggle('hidden');
    }

    document.addEventListener('click', function(event) {
        if (!event.target.closest('.dropdown-container')) {
            document.querySelectorAll('[id^="actionMenu-"]').forEach(menu => {
                menu.classList.add('hidden');
            });
        }
    });

    // === Copy to clipboard ===
    function copyToClipboard(text) {
        navigator.clipboard.writeText(window.location.origin + text).then(() => {
            showToast('Đã sao chép link!');
        });
    }

    // === API Handlers ===
    function handleDelete(id, name) {
        if (!confirm('Bạn có chắc muốn xóa chính sách "' + name + '"?')) return;
        
        fetch('<?= APP_URL ?>/admin/chinh-sach/api/xoa', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ id: id })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showToast(data.message);
                setTimeout(() => location.reload(), 500);
            } else {
                alert(data.message || 'Lỗi xóa chính sách');
            }
        });
    }

    function handleToggleStatus(id, newStatus) {
        fetch('<?= APP_URL ?>/admin/chinh-sach/api/trang-thai', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ id: id, trang_thai: newStatus })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showToast(data.message);
                setTimeout(() => location.reload(), 500);
            } else {
                alert(data.message || 'Lỗi cập nhật trạng thái');
            }
        });
    }

    function handleDuplicate(id) {
        if (!confirm('Nhân bản chính sách này?')) return;
        
        fetch('<?= APP_URL ?>/admin/chinh-sach/api/nhan-ban', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ id: id })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showToast(data.message);
                setTimeout(() => location.reload(), 500);
            } else {
                alert(data.message || 'Lỗi nhân bản');
            }
        });
    }

    // === Bulk Actions ===
    function handleBulkStatus(status) {
        const ids = getSelectedIds();
        if (ids.length === 0) return;

        fetch('<?= APP_URL ?>/admin/chinh-sach/api/trang-thai-nhieu', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ ids: ids, trang_thai: status })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showToast(data.message);
                setTimeout(() => location.reload(), 500);
            } else {
                alert(data.message || 'Lỗi cập nhật hàng loạt');
            }
        });
    }

    function handleBulkDelete() {
        const ids = getSelectedIds();
        if (ids.length === 0) return;
        if (!confirm('Xóa ' + ids.length + ' chính sách đã chọn? Hành động này không thể hoàn tác.')) return;

        fetch('<?= APP_URL ?>/admin/chinh-sach/api/xoa-nhieu', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({ ids: ids })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showToast(data.message);
                setTimeout(() => location.reload(), 500);
            } else {
                alert(data.message || 'Lỗi xóa hàng loạt');
            }
        });
    }

    // === Toast notification ===
    function showToast(message) {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-6 right-6 bg-gray-900 text-white px-5 py-3 rounded-xl shadow-2xl z-[100] flex items-center gap-2 animate-fade-in-up';
        toast.innerHTML = '<span class="iconify" data-icon="mdi:check-circle"></span> ' + message;
        document.body.appendChild(toast);
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transition = 'opacity 0.3s';
            setTimeout(() => toast.remove(), 300);
        }, 2500);
    }

    // === Export (placeholder) ===
    function exportPolicies() {
        showToast('Tính năng xuất danh sách sẽ được cập nhật.');
    }
</script>

<style>
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up { animation: fadeInUp 0.3s ease-out; }
</style>
