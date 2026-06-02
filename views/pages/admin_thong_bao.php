<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Hộp thư & Thông báo</h1>
            <p class="text-sm text-gray-500 mt-1">Quản lý toàn bộ tin nhắn và thông báo từ hệ thống</p>
        </div>
        <div class="flex gap-2">
            <button onclick="markAllAsRead()" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 hover:text-red-900 transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:check-all"></span>
                Đánh dấu tất cả đã đọc
            </button>
            <a href="<?= defined('APP_URL') ? APP_URL : '' ?>/admin/notification/them" class="px-4 py-2 bg-[#8B0000] text-white rounded-lg text-sm font-medium hover:bg-red-900 transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:plus"></span>
                Gửi thông báo mới
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden flex flex-col md:flex-row min-h-[600px]">
        <!-- Sidebar / Filter Tabs (Desktop vertical, Mobile horizontal) -->
        <?php require_once __DIR__ . '/../components/Admin/thong_bao/tabs_filter.php'; ?>

        <!-- Messages List -->
        <div class="flex-1 flex flex-col border-l border-gray-200 bg-gray-50/30 relative overflow-hidden">
            <!-- Toolbar -->
            <div class="px-4 py-3 border-b border-gray-200 bg-white flex items-center justify-between sticky top-0 z-10">
                <div class="flex items-center gap-3">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <div class="relative flex items-center">
                            <input type="checkbox" id="selectAll" class="peer sr-only">
                            <div class="w-5 h-5 border-2 border-gray-300 rounded transition-all peer-checked:bg-red-600 peer-checked:border-red-600 group-hover:border-red-400"></div>
                            <span class="iconify absolute text-white opacity-0 peer-checked:opacity-100 top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 pointer-events-none" data-icon="mdi:check"></span>
                        </div>
                    </label>
                    <div class="h-6 w-px bg-gray-300 mx-1 hidden sm:block"></div>
                    <button class="p-1.5 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition-colors tooltip" title="Tải lại" onclick="window.location.reload()">
                        <span class="iconify text-xl" data-icon="mdi:refresh"></span>
                    </button>
                    <div class="flex gap-1 hidden" id="bulkActions">
                        <button class="p-1.5 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded transition-colors tooltip" title="Đánh dấu đã đọc" onclick="bulkMarkRead()">
                            <span class="iconify text-xl" data-icon="mdi:email-open-outline"></span>
                        </button>
                        <button class="p-1.5 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded transition-colors tooltip" title="Xóa" onclick="bulkDelete()">
                            <span class="iconify text-xl" data-icon="mdi:delete-outline"></span>
                        </button>
                    </div>
                </div>
                
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <span class="hidden sm:inline">1-5 của 24</span>
                    <div class="flex items-center gap-1">
                        <button class="p-1 text-gray-400 hover:text-gray-900 hover:bg-gray-100 rounded transition-colors disabled:opacity-50" disabled>
                            <span class="iconify text-xl" data-icon="mdi:chevron-left"></span>
                        </button>
                        <button class="p-1 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded transition-colors">
                            <span class="iconify text-xl" data-icon="mdi:chevron-right"></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- List -->
            <div class="flex-1 overflow-y-auto">
                <?php require_once __DIR__ . '/../components/Admin/thong_bao/table_list.php'; ?>
            </div>
        </div>
    </div>
</div>

<!-- Drawer View Message -->
<?php require_once __DIR__ . '/../components/Admin/thong_bao/drawer_detail.php'; ?>

<!-- Script for Checkbox logic -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const selectAll = document.getElementById('selectAll');
        const itemCheckboxes = document.querySelectorAll('.msg-checkbox');
        const bulkActions = document.getElementById('bulkActions');

        function updateBulkActions() {
            const checkedCount = document.querySelectorAll('.msg-checkbox:checked').length;
            if (checkedCount > 0) {
                bulkActions.classList.remove('hidden');
                selectAll.checked = checkedCount === itemCheckboxes.length;
            } else {
                bulkActions.classList.add('hidden');
                selectAll.checked = false;
            }
        }

        if(selectAll) {
            selectAll.addEventListener('change', (e) => {
                itemCheckboxes.forEach(cb => {
                    cb.checked = e.target.checked;
                });
                updateBulkActions();
            });
        }

        itemCheckboxes.forEach(cb => {
            cb.addEventListener('change', updateBulkActions);
        });

        // Tự động mở thông báo nếu có tham số open_id trên URL
        <?php if(isset($_GET['open_id'])): ?>
            const openId = <?= json_encode($_GET['open_id']) ?>;
            setTimeout(() => {
                if(typeof openNotificationDetail === 'function') {
                    openNotificationDetail(openId);
                }
            }, 300); // Đợi DOM & Drawer transition sẵn sàng
        <?php endif; ?>
    });

    function getSelectedIds() {
        return Array.from(document.querySelectorAll('.msg-checkbox:checked')).map(cb => cb.value);
    }

    async function processAction(url, ids, extraData = {}) {
        if (!ids.length) return;
        try {
            const res = await fetch(url, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ ids, ...extraData })
            });
            const data = await res.json();
            if (data.success) {
                window.location.reload();
            } else {
                alert(data.message || 'Có lỗi xảy ra');
            }
        } catch (e) {
            alert('Lỗi kết nối');
        }
    }

    function bulkMarkRead() {
        processAction('<?= defined('APP_URL') ? APP_URL : '' ?>/admin/notification/read', getSelectedIds(), { status: 1 });
    }

    function bulkDelete() {
        if(confirm('Bạn có chắc chắn muốn xóa các thông báo đã chọn?')) {
            processAction('<?= defined('APP_URL') ? APP_URL : '' ?>/admin/notification/delete', getSelectedIds());
        }
    }

    function toggleRead(id, status) {
        processAction('<?= defined('APP_URL') ? APP_URL : '' ?>/admin/notification/read', [id], { status });
    }

    function deleteItem(id) {
        if(confirm('Bạn có chắc chắn muốn xóa thông báo này?')) {
            processAction('<?= defined('APP_URL') ? APP_URL : '' ?>/admin/notification/delete', [id]);
        }
    }

    function markAllAsRead() {
        fetch('<?= defined('APP_URL') ? APP_URL : '' ?>/admin/notification/read-all', { method: 'POST' })
        .then(res => res.json())
        .then(data => {
            if(data.success) window.location.reload();
        });
    }
</script>
