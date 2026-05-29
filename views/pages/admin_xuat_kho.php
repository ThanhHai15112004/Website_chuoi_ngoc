<?php
// views/pages/admin_xuat_kho.php
$pageTitle = 'Phiếu xuất kho | Admin';
$current_page = 'xuat_kho';
?>

<div class="max-w-7xl mx-auto space-y-6">
    <!-- Modal Overlay -->
    <div id="modalOverlay" class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm hidden z-50 transition-opacity"></div>
    
    <!-- Page Header -->
                <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Phiếu xuất kho</h1>
                        <p class="text-sm text-gray-500 mt-1">Quản lý các phiếu xuất hàng khỏi kho, bao gồm xuất cho đơn hàng, xuất lỗi, xuất trả nhà cung cấp và xuất điều chỉnh.</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <button class="px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                            <span class="iconify text-lg text-gray-500" data-icon="mdi:printer-outline"></span> In danh sách
                        </button>
                        <a href="<?= APP_URL ?>/admin/xuat-kho/them" class="px-4 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                            <span class="iconify text-lg" data-icon="mdi:package-up"></span> Tạo phiếu xuất
                        </a>
                    </div>
                </div>

                <!-- Thống kê nhanh -->
                <?php require_once __DIR__ . '/../components/Admin/xuat_kho/stats_cards.php'; ?>

                <!-- Main Data Card -->
                <div class="bg-white rounded-xl shadow-[0_2px_10px_-3px_rgba(107,13,24,0.1)] border border-gray-100 flex flex-col">
                    <!-- Tabs & Bộ lọc -->
                    <?php require_once __DIR__ . '/../components/Admin/xuat_kho/tabs_filter.php'; ?>

                    <!-- Action Bar (Khi chọn checkbox) - Ban đầu ẩn -->
                    <div id="bulkActionBar" class="px-4 py-3 bg-red-50 border-b border-red-100 items-center justify-between hidden">
                    <div class="flex items-center gap-3">
                        <span class="text-sm text-gray-600 font-medium px-2">Đã chọn <span id="selectedCount" class="text-[#6B0D18] font-bold">0</span> phiếu</span>
                        <div class="h-4 w-px bg-gray-300"></div>
                        <button type="button" class="px-3 py-1.5 bg-white border border-gray-300 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50">
                            <span class="iconify text-sm mr-1" data-icon="mdi:shield-check-outline"></span> Duyệt phiếu
                        </button>
                        <button type="button" class="px-3 py-1.5 bg-white border border-gray-300 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50">
                            <span class="iconify text-sm mr-1" data-icon="mdi:package-variant-closed"></span> Xác nhận xuất
                        </button>
                        <button type="button" class="px-3 py-1.5 bg-white border border-gray-300 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50">
                            <span class="iconify text-sm mr-1" data-icon="mdi:printer-outline"></span> In phiếu
                        </button>
                        <button type="button" class="px-3 py-1.5 bg-white border border-rose-200 rounded-lg text-xs font-medium text-rose-600 hover:bg-rose-50">
                            <span class="iconify text-sm mr-1" data-icon="mdi:trash-can-outline"></span> Hủy phiếu
                        </button>
                    </div>
                </div>

                <!-- Bảng danh sách phiếu xuất -->
                <?php require_once __DIR__ . '/../components/Admin/xuat_kho/table_list.php'; ?>
                </div>
</div>

<!-- Drawer & Modals -->
<?php 
require_once __DIR__ . '/../components/Admin/xuat_kho/drawer_chi_tiet.php';
require_once __DIR__ . '/../components/Admin/xuat_kho/modals.php'; 
?>

<!-- Scripts chung cho trang này -->
<script>
    function toggleAll(source) {
        const checkboxes = document.querySelectorAll('.row-checkbox');
        for(let i=0, n=checkboxes.length; i<n; i++) {
            checkboxes[i].checked = source.checked;
        }
        updateBulkActionBar();
    }

    function toggleRow(source) {
        updateBulkActionBar();
    }

    function updateBulkActionBar() {
        const bulkActionBar = document.getElementById('bulkActionBar');
        const count = document.querySelectorAll('.row-checkbox:checked').length;
        
        if (count > 0) {
            bulkActionBar.classList.remove('hidden');
            bulkActionBar.classList.add('flex');
            document.getElementById('selectedCount').innerText = count;
        } else {
            bulkActionBar.classList.add('hidden');
            bulkActionBar.classList.remove('flex');
        }
        
        const selectAllCheckbox = document.getElementById('selectAll');
        const rowCheckboxes = document.querySelectorAll('.row-checkbox');
        if(selectAllCheckbox) {
            selectAllCheckbox.checked = count === rowCheckboxes.length && rowCheckboxes.length > 0;
        }
    }

    // Modal logic
    function openModal(id) {
        const modal = document.getElementById(id);
        const overlay = document.getElementById('modalOverlay');
        if (modal && overlay) {
            overlay.classList.remove('hidden');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                const content = document.getElementById(id + 'Content');
                if(content) {
                    content.classList.remove('scale-95', 'opacity-0');
                    content.classList.add('scale-100', 'opacity-100');
                }
            }, 10);
        }
    }

    function closeModal(id) {
        const modal = document.getElementById(id);
        const overlay = document.getElementById('modalOverlay');
        if (modal && overlay) {
            const content = document.getElementById(id + 'Content');
            if(content) {
                content.classList.remove('scale-100', 'opacity-100');
                content.classList.add('scale-95', 'opacity-0');
            }
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                if (document.querySelectorAll('.drawer-open').length === 0) {
                    overlay.classList.add('hidden');
                }
            }, 300);
        }
    }

    // Drawer logic
    function openDrawer(id) {
        const drawer = document.getElementById('drawerChiTietPhieu');
        const overlay = document.getElementById('modalOverlay');
        if (drawer && overlay) {
            overlay.classList.remove('hidden');
            drawer.classList.remove('translate-x-full');
            drawer.classList.add('translate-x-0', 'drawer-open');
        }
    }

    function closeDrawer() {
        const drawer = document.getElementById('drawerChiTietPhieu');
        const overlay = document.getElementById('modalOverlay');
        if (drawer && overlay) {
            drawer.classList.remove('translate-x-0', 'drawer-open');
            drawer.classList.add('translate-x-full');
            setTimeout(() => {
                if (document.querySelectorAll('.scale-100.opacity-100').length === 0) {
                    overlay.classList.add('hidden');
                }
            }, 300);
        }
    }
</script>
