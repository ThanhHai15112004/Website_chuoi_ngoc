<?php
// views/pages/admin_notification_form.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 mb-1">
                <a href="<?= APP_URL ?>/admin/notification" class="text-gray-500 hover:text-[#6B0D18] transition-colors"><span class="iconify text-xl" data-icon="mdi:arrow-left"></span></a>
                <h2 class="text-2xl font-bold text-gray-800 font-luxury">Tạo thông báo mới</h2>
            </div>
            <p class="text-sm text-gray-500 ml-8">Soạn và gửi thông báo, voucher, hoặc tin nhắn đến khách hàng.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="openTemplateModal()" class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:format-list-bulleted-type"></span>
                Mẫu thông báo
            </button>
        </div>
    </div>

    <!-- Main Form Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
        <!-- Cột Form (Bên trái) -->
        <div class="lg:col-span-8 space-y-6">
<?php include __DIR__ . '/../components/Admin/thong_bao/form_content.php'; ?>
        </div>

<?php include __DIR__ . '/../components/Admin/thong_bao/form_preview.php'; ?>
    </div>
</div>

<?php include __DIR__ . '/../components/Admin/thong_bao/form_modals.php'; ?>

<?php include __DIR__ . '/../components/Admin/thong_bao/form_scripts.php'; ?>
