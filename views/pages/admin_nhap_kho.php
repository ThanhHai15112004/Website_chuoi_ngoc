<?php
// views/pages/admin_nhap_kho.php
$current_page = 'nhap_kho';
?>
<div class="max-w-7xl mx-auto space-y-6">
    
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 tracking-tight">Phiếu nhập kho</h1>
            <p class="text-sm text-gray-500 mt-1">Quản lý các phiếu nhập hàng từ nhà cung cấp, kiểm hàng và cập nhật tồn kho.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:microsoft-excel"></span> Nhập từ Excel
            </button>
            <a href="<?= APP_URL ?>/admin/nhap-kho/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:plus"></span> Tạo phiếu nhập
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <?php require_once __DIR__ . '/../components/Admin/nhap_kho/stats_cards.php'; ?>

    <!-- Main Data Card -->
    <div class="bg-white rounded-xl shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] border border-gray-100 flex flex-col">
        
        <!-- Tabs & Filter -->
        <?php require_once __DIR__ . '/../components/Admin/nhap_kho/tabs_filter.php'; ?>

        <!-- Action Bar (Khi chọn checkbox) - Ban đầu ẩn -->
        <div class="px-4 py-3 bg-red-50 border-b border-red-100 flex items-center justify-between hidden">
            <div class="flex items-center gap-2">
                <span class="text-sm font-medium text-[#6B0D18]">Đã chọn 2 phiếu nhập</span>
            </div>
            <div class="flex items-center gap-2">
                <button class="px-3 py-1.5 bg-white border border-gray-300 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50">Duyệt phiếu</button>
                <button class="px-3 py-1.5 bg-white border border-gray-300 rounded-lg text-xs font-medium text-gray-700 hover:bg-gray-50">In phiếu</button>
                <button class="px-3 py-1.5 bg-white border border-rose-200 rounded-lg text-xs font-medium text-rose-600 hover:bg-rose-50">Hủy phiếu</button>
            </div>
        </div>

        <!-- Table -->
        <?php require_once __DIR__ . '/../components/Admin/nhap_kho/table_list.php'; ?>

    </div>
</div>

<!-- Modals & Drawer -->
<?php require_once __DIR__ . '/../components/Admin/nhap_kho/drawer_chi_tiet.php'; ?>
<?php require_once __DIR__ . '/../components/Admin/nhap_kho/modals.php'; ?>

<!-- Toast Notification (Global) -->
<div id="toastNotification" class="fixed bottom-4 right-4 bg-gray-900 text-white px-4 py-3 rounded-lg shadow-lg flex items-center gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[100]">
    <span class="iconify text-emerald-400 text-xl" data-icon="mdi:check-circle"></span>
    <span id="toastMessage" class="text-sm font-medium">Thao tác thành công!</span>
    <button onclick="hideToast()" class="text-gray-400 hover:text-white ml-2">
        <span class="iconify" data-icon="mdi:close"></span>
    </button>
</div>

<script>
    function showToast(message) {
        const toast = document.getElementById('toastNotification');
        document.getElementById('toastMessage').innerText = message;
        toast.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(hideToast, 3000);
    }

    function hideToast() {
        const toast = document.getElementById('toastNotification');
        toast.classList.add('translate-y-20', 'opacity-0');
    }
</script>
