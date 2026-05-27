<?php
// views/pages/admin_quan_ly_cua_hang.php
?>
<div class="px-4 md:px-6 py-6 pb-24 max-w-[1400px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-4">
        <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18] transition-colors">Admin</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span>Quản lý cửa hàng</span>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span class="text-gray-900 font-medium">Thông tin cửa hàng</span>
    </nav>

    <!-- Tiêu đề trang & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">Thông tin cửa hàng</h1>
            <p class="text-gray-500 mt-1 text-sm">Cập nhật thông tin thương hiệu, liên hệ, địa chỉ và nội dung hiển thị trên website.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm tooltip" title="Làm mới dữ liệu">
                <span class="iconify" data-icon="mdi:refresh"></span> <span class="hidden md:inline">Làm mới</span>
            </button>
            <a href="<?= APP_URL ?>" target="_blank" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:eye-outline"></span> Xem ngoài website
            </a>
            <button onclick="saveStoreConfig()" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:content-save-outline"></span> Lưu thay đổi
            </button>
        </div>
    </div>

    <!-- Alert cảnh báo thiếu thông tin -->
    <div class="mb-6 bg-yellow-50 border border-yellow-200 rounded-xl p-4 flex items-start gap-3 shadow-sm">
        <div class="text-yellow-600 mt-0.5"><span class="iconify text-xl" data-icon="mdi:alert-circle-outline"></span></div>
        <div class="flex-1">
            <h4 class="font-bold text-yellow-800 text-sm">Hồ sơ cửa hàng chưa hoàn thiện</h4>
            <p class="text-yellow-700 text-sm mt-1 mb-2">Website của bạn còn thiếu một số thông tin quan trọng để vận hành tối ưu:</p>
            <ul class="text-sm text-yellow-700 list-disc list-inside mb-3">
                <li>Chưa có địa chỉ cửa hàng hoặc ghi chú bán online.</li>
                <li>Chưa gắn bản đồ Google Maps.</li>
            </ul>
            <button class="px-3 py-1.5 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 text-xs font-bold rounded-lg transition-colors">
                Hoàn thiện ngay
            </button>
        </div>
    </div>

    <!-- Card trạng thái tiến độ -->
    <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/status_card.php'; ?>

    <!-- Layout 2 Cột -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 relative">
        
        <!-- CỘT TRÁI: Form Cấu hình (7 cột) -->
        <div class="lg:col-span-8 space-y-6">
            <form id="storeConfigForm">
                <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/form_basic_info.php'; ?>
                <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/form_branding.php'; ?>
                <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/form_address.php'; ?>
                <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/form_contact_channels.php'; ?>
                <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/form_seo.php'; ?>
                <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/form_legal.php'; ?>
            </form>
        </div>

        <!-- CỘT PHẢI: Preview Panel (5 cột) -->
        <div class="lg:col-span-4">
            <?php require_once __DIR__ . '/../components/Admin/quan_ly_cua_hang/preview_panel.php'; ?>
        </div>

    </div>

    <!-- Thanh Lưu Thay Đổi Sticky (ẩn mặc định, hiện khi có thay đổi) -->
    <div id="stickySaveBar" class="fixed bottom-0 left-0 md:left-64 right-0 bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-40 transform translate-y-full transition-transform duration-300 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600">
                <span class="iconify text-xl" data-icon="mdi:content-save-edit-outline"></span>
            </div>
            <div>
                <p class="font-bold text-gray-900">Bạn có thay đổi chưa lưu</p>
                <p class="text-xs text-gray-500">Hãy lưu lại để cập nhật hiển thị ngoài website.</p>
            </div>
        </div>
        <div class="flex gap-3">
            <button onclick="cancelChanges()" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">Hủy thay đổi</button>
            <button onclick="saveStoreConfig()" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-md hover:shadow-lg">Lưu thay đổi</button>
        </div>
    </div>
</div>

<!-- Modal Xác nhận (Mock) -->
<div id="confirmModal" class="fixed inset-0 bg-black/50 z-[60] hidden flex items-center justify-center backdrop-blur-sm">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4 overflow-hidden transform transition-all scale-95 opacity-0" id="confirmModalContent">
        <div class="p-6 text-center">
            <div class="w-16 h-16 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center mx-auto mb-4">
                <span class="iconify text-3xl" data-icon="mdi:alert"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Xác nhận thay đổi quan trọng?</h3>
            <p class="text-sm text-gray-500 mb-6">Bạn đang thay đổi thông tin liên hệ chính (Hotline/Email). Thông tin này sẽ cập nhật trên toàn bộ website và hóa đơn.</p>
            <div class="flex gap-3 justify-center">
                <button onclick="closeConfirmModal()" class="px-4 py-2 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition-colors text-sm">Kiểm tra lại</button>
                <button onclick="confirmSave()" class="px-6 py-2 bg-[#6B0D18] text-white font-medium rounded-lg hover:bg-red-900 transition-colors text-sm shadow-md">Xác nhận lưu</button>
            </div>
        </div>
    </div>
</div>

<script>
    // JS Logic chung cho form
    let hasUnsavedChanges = false;
    
    // Theo dõi thay đổi trên form
    document.getElementById('storeConfigForm').addEventListener('input', function() {
        if(!hasUnsavedChanges) {
            hasUnsavedChanges = true;
            document.getElementById('stickySaveBar').classList.remove('translate-y-full');
        }
        updatePreview(); // Hàm này sẽ được định nghĩa trong preview_panel.php
    });

    function saveStoreConfig() {
        // Mô phỏng hiển thị popup xác nhận
        document.getElementById('confirmModal').classList.remove('hidden');
        setTimeout(() => {
            document.getElementById('confirmModalContent').classList.remove('scale-95', 'opacity-0');
            document.getElementById('confirmModalContent').classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeConfirmModal() {
        document.getElementById('confirmModalContent').classList.remove('scale-100', 'opacity-100');
        document.getElementById('confirmModalContent').classList.add('scale-95', 'opacity-0');
        setTimeout(() => {
            document.getElementById('confirmModal').classList.add('hidden');
        }, 300);
    }

    function confirmSave() {
        closeConfirmModal();
        hasUnsavedChanges = false;
        document.getElementById('stickySaveBar').classList.add('translate-y-full');
        
        // Hiện Toast thành công (Dùng Toastify nếu có, ở đây dùng alert tạm hoặc custom toast)
        alert("Đã cập nhật thông tin cửa hàng thành công!");
    }

    function cancelChanges() {
        if(confirm("Bạn có chắc muốn hủy các thay đổi chưa lưu?")) {
            document.getElementById('storeConfigForm').reset();
            hasUnsavedChanges = false;
            document.getElementById('stickySaveBar').classList.add('translate-y-full');
            updatePreview();
        }
    }
</script>
