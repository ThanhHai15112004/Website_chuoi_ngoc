<?php
// views/pages/admin_thanh_toan_van_chuyen.php
?>
<div class="px-4 md:px-6 py-6 pb-24 max-w-[1400px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-4">
        <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18] transition-colors">Admin</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <a href="<?= APP_URL ?>/admin/quan-ly-cua-hang" class="hover:text-[#6B0D18] transition-colors">Cấu hình cửa hàng</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span class="text-gray-900 font-medium">Thanh toán & Vận chuyển</span>
    </nav>

    <!-- Tiêu đề trang & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">Thanh toán & vận chuyển</h1>
            <p class="text-gray-500 mt-1 text-sm">Cấu hình phương thức thanh toán, tài khoản nhận tiền, phí vận chuyển và khu vực giao hàng.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="location.reload()" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm" title="Làm mới dữ liệu">
                <span class="iconify" data-icon="mdi:refresh"></span> <span class="hidden md:inline">Làm mới</span>
            </button>
            <button onclick="switchTab('preview')" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:eye-outline"></span> Xem trang thanh toán
            </button>
        </div>
    </div>

    <!-- Cảnh báo cấu hình -->
    <?php if(empty($banks)): ?>
    <div class="mb-6 bg-red-50 border border-red-200 rounded-xl p-4 flex items-start gap-3 shadow-sm">
        <div class="text-red-600 mt-0.5"><span class="iconify text-xl" data-icon="mdi:alert-circle"></span></div>
        <div class="flex-1">
            <h4 class="font-bold text-red-800 text-sm">Chuyển khoản đang bật nhưng chưa có tài khoản ngân hàng</h4>
            <p class="text-red-700 text-sm mt-1 mb-2">Khách sẽ không thấy thông tin chuyển khoản nếu chưa cấu hình tài khoản nhận tiền.</p>
            <button onclick="switchTab('banks')" class="px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-800 text-xs font-bold rounded-lg transition-colors">
                Thêm tài khoản ngân hàng
            </button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Status Cards -->
    <?php require_once __DIR__ . '/../components/Admin/thanh_toan_van_chuyen/status_cards.php'; ?>

    <!-- Tabs Navigation -->
    <div class="flex flex-wrap gap-2 mb-6 border-b border-gray-200 pb-4">
        <button onclick="switchTab('payments')" id="btn-tab-payments" class="setting-tab active px-4 py-2 bg-[#6B0D18] text-white rounded-full text-sm font-medium transition-colors flex items-center gap-2 shadow-sm">
            <span class="iconify" data-icon="mdi:wallet-outline"></span> Phương thức thanh toán
        </button>
        <button onclick="switchTab('banks')" id="btn-tab-banks" class="setting-tab px-4 py-2 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-full text-sm font-medium transition-colors flex items-center gap-2">
            <span class="iconify text-gray-500" data-icon="mdi:bank-outline"></span> Tài khoản ngân hàng
        </button>
        <button onclick="switchTab('shipping_methods')" id="btn-tab-shipping_methods" class="setting-tab px-4 py-2 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-full text-sm font-medium transition-colors flex items-center gap-2">
            <span class="iconify text-gray-500" data-icon="mdi:truck-outline"></span> Phương thức vận chuyển
        </button>
        <button onclick="switchTab('shipping_zones')" id="btn-tab-shipping_zones" class="setting-tab px-4 py-2 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-full text-sm font-medium transition-colors flex items-center gap-2">
            <span class="iconify text-gray-500" data-icon="mdi:map-marker-radius-outline"></span> Khu vực & phí giao hàng
        </button>
        <button onclick="switchTab('freeship')" id="btn-tab-freeship" class="setting-tab px-4 py-2 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-full text-sm font-medium transition-colors flex items-center gap-2">
            <span class="iconify text-gray-500" data-icon="mdi:ticket-percent-outline"></span> Freeship & điều kiện
        </button>
        <button onclick="switchTab('preview')" id="btn-tab-preview" class="setting-tab px-4 py-2 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-full text-sm font-medium transition-colors flex items-center gap-2 ml-auto hidden lg:flex">
            <span class="iconify text-gray-500" data-icon="mdi:monitor-cellphone"></span> Preview thanh toán
        </button>
    </div>

    <!-- Tab Contents -->
    <div class="relative">
        <div id="tab-payments" class="tab-content block">
            <?php require_once __DIR__ . '/../components/Admin/thanh_toan_van_chuyen/tab_payments.php'; ?>
        </div>
        <div id="tab-banks" class="tab-content hidden">
            <?php require_once __DIR__ . '/../components/Admin/thanh_toan_van_chuyen/tab_banks.php'; ?>
        </div>
        <div id="tab-shipping_methods" class="tab-content hidden">
            <?php require_once __DIR__ . '/../components/Admin/thanh_toan_van_chuyen/tab_shipping_methods.php'; ?>
        </div>
        <div id="tab-shipping_zones" class="tab-content hidden">
            <?php require_once __DIR__ . '/../components/Admin/thanh_toan_van_chuyen/tab_shipping_zones.php'; ?>
        </div>
        <div id="tab-freeship" class="tab-content hidden">
            <?php require_once __DIR__ . '/../components/Admin/thanh_toan_van_chuyen/tab_freeship.php'; ?>
        </div>
        <div id="tab-preview" class="tab-content hidden">
            <?php require_once __DIR__ . '/../components/Admin/thanh_toan_van_chuyen/tab_preview.php'; ?>
        </div>
    </div>

</div>

<!-- Modals & Drawers -->
<?php require_once __DIR__ . '/../components/Admin/thanh_toan_van_chuyen/modals_and_drawers.php'; ?>

<!-- Toast Container -->
<div id="toastContainer" class="fixed top-6 right-6 z-[100] flex flex-col gap-3"></div>

<script>
    // Tab switching
    function switchTab(tabId) {
        document.querySelectorAll('.setting-tab').forEach(el => {
            el.classList.remove('bg-[#6B0D18]', 'text-white', 'shadow-sm', 'active');
            el.classList.add('bg-white', 'border', 'border-gray-200', 'text-gray-700', 'hover:bg-gray-50');
            let icon = el.querySelector('.iconify');
            if(icon) icon.classList.add('text-gray-500');
        });
        
        const activeBtn = document.getElementById('btn-tab-' + tabId);
        activeBtn.classList.add('bg-[#6B0D18]', 'text-white', 'shadow-sm', 'active');
        activeBtn.classList.remove('bg-white', 'border', 'border-gray-200', 'text-gray-700', 'hover:bg-gray-50');
        let activeIcon = activeBtn.querySelector('.iconify');
        if(activeIcon) activeIcon.classList.remove('text-gray-500');

        document.querySelectorAll('.tab-content').forEach(el => {
            el.classList.add('hidden');
            el.classList.remove('block');
        });
        document.getElementById('tab-' + tabId).classList.remove('hidden');
        document.getElementById('tab-' + tabId).classList.add('block');
    }

    // Toast notification
    function showToast(message, type = 'success') {
        const container = document.getElementById('toastContainer');
        const toast = document.createElement('div');
        const bgClass = type === 'success' ? 'bg-emerald-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500';
        const icon = type === 'success' ? 'mdi:check-circle' : type === 'error' ? 'mdi:alert-circle' : 'mdi:information';
        
        toast.className = `${bgClass} text-white px-5 py-3 rounded-xl shadow-lg flex items-center gap-3 min-w-[300px] transform translate-x-full transition-transform duration-300`;
        toast.innerHTML = `<span class="iconify text-xl shrink-0" data-icon="${icon}"></span><span class="text-sm font-medium">${message}</span>`;
        container.appendChild(toast);
        
        requestAnimationFrame(() => toast.classList.remove('translate-x-full'));
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
</script>
