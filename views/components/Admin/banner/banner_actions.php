<?php
// views/components/Admin/banner/banner_actions.php
?>
<div class="px-4 py-3 bg-white flex items-center justify-between opacity-50 pointer-events-none transition-opacity" id="bulkActionsBar">
    <!-- Khi có checkbox được chọn, sẽ xóa opacity-50 và pointer-events-none -->
    <div class="flex items-center gap-2">
        <span class="text-sm font-medium text-gray-700 mr-2">Đã chọn <span id="selectedCount">0</span> banner</span>
        <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded text-sm hover:bg-gray-50 transition-colors">
            Bật
        </button>
        <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded text-sm hover:bg-gray-50 transition-colors">
            Tắt
        </button>
        <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded text-sm hover:bg-gray-50 transition-colors">
            Đổi vị trí
        </button>
        <button class="px-3 py-1.5 bg-white border border-red-200 text-red-600 rounded text-sm hover:bg-red-50 transition-colors ml-2">
            Xóa
        </button>
    </div>
    
    <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-700 rounded text-sm hover:bg-gray-50 transition-colors flex items-center gap-1.5">
        <span class="iconify" data-icon="mdi:export-variant"></span>
        Xuất danh sách
    </button>
</div>

<script>
    // Logic đơn giản để hiển thị thanh thao tác khi check
    document.addEventListener('DOMContentLoaded', () => {
        const checkAll = document.getElementById('checkAll');
        const checkboxes = document.querySelectorAll('.banner-checkbox');
        const bulkBar = document.getElementById('bulkActionsBar');
        const selectedCount = document.getElementById('selectedCount');

        function updateBulkBar() {
            const count = document.querySelectorAll('.banner-checkbox:checked').length;
            selectedCount.textContent = count;
            if (count > 0) {
                bulkBar.classList.remove('opacity-50', 'pointer-events-none');
            } else {
                bulkBar.classList.add('opacity-50', 'pointer-events-none');
            }
            if (checkAll) {
                checkAll.checked = count === checkboxes.length && count > 0;
            }
        }

        if (checkAll) {
            checkAll.addEventListener('change', (e) => {
                checkboxes.forEach(cb => cb.checked = e.target.checked);
                updateBulkBar();
            });
        }

        checkboxes.forEach(cb => {
            cb.addEventListener('change', updateBulkBar);
        });
    });
</script>
