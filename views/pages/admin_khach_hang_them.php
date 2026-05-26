<?php
// views/pages/admin_customer_create.php
?>
<div class="animate-[fadeInPage_0.3s_ease-out] max-w-5xl mx-auto pb-12">
    <!-- Breadcrumb & Quay lại -->
    <div class="mb-4">
        <div class="flex items-center text-xs text-gray-500 mb-2">
            <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18]">Admin</a>
            <span class="mx-2">/</span>
            <a href="<?= APP_URL ?>/admin/khach-hang" class="hover:text-[#6B0D18]">Quản lý khách hàng</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-bold">Thêm khách hàng</span>
        </div>
        <a href="<?= APP_URL ?>/admin/khach-hang" class="inline-flex items-center gap-1 text-sm font-medium text-gray-600 hover:text-[#6B0D18] transition-colors bg-white px-3 py-1.5 rounded-lg border border-gray-200 shadow-sm">
            <span class="iconify" data-icon="mdi:arrow-left"></span> Quay lại danh sách
        </a>
    </div>

    <!-- Header -->
    <div class="bg-white rounded-t-2xl border-b-0 shadow-sm border border-gray-100 p-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-gradient-to-bl from-red-50 to-transparent rounded-bl-full opacity-50 pointer-events-none"></div>
        <div class="relative z-10 flex items-center gap-4">
            <div class="w-16 h-16 rounded-full bg-red-50 border-4 border-white shadow-sm flex items-center justify-center text-[#6B0D18]">
                <span class="iconify text-3xl" data-icon="mdi:account-plus-outline"></span>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-800 font-luxury">Thêm Khách Hàng Mới</h2>
                <p class="text-sm text-gray-500 mt-1">Khởi tạo hồ sơ khách hàng mới để quản lý thông tin mua sắm, tích điểm và hạng thành viên.</p>
            </div>
        </div>
    </div>

    <?php include __DIR__ . '/../components/Admin/khach_hang/create_form.php'; ?>
