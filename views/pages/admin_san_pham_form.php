<?php
// views/pages/admin_san_pham_form.php
$is_edit = $is_edit ?? false;
$sp = $san_pham ?? [];
?>
<div class="space-y-6">
    <!-- Breadcrumb & Header -->
    <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                <a href="<?= APP_URL ?>/admin/san-pham" class="hover:text-[#6B0D18] transition-colors flex items-center gap-1">
                    <span class="iconify text-base" data-icon="mdi:arrow-left"></span>
                    Danh sách sản phẩm
                </a>
                <span>/</span>
                <span class="text-gray-900 font-medium"><?= $is_edit ? 'Chỉnh sửa sản phẩm' : 'Thêm sản phẩm mới' ?></span>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 font-luxury"><?= $is_edit ? 'Chỉnh sửa: ' . ($sp['ten_sp'] ?? '') : 'Thêm sản phẩm mới' ?></h2>
            <?php if($is_edit): ?>
            <p class="text-sm text-gray-500 mt-1 font-mono">Mã SP: <?= $sp['ma_sp'] ?? '' ?></p>
            <?php endif; ?>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-5 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                Hủy bỏ
            </button>
            <button class="flex items-center gap-2 px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:content-save-outline"></span>
                <?= $is_edit ? 'Lưu thay đổi' : 'Tạo sản phẩm' ?>
            </button>
        </div>
    </div>

    <!-- Form Area -->
    <form action="" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Cột Trái (2/3) -->
        <div class="lg:col-span-2 space-y-6">
            
<?php include __DIR__ . '/../components/Admin/san_pham/form_basic.php'; ?>

        </div>

        <!-- Cột Phải (1/3) -->
        <div class="lg:col-span-1 space-y-6">
            
<?php include __DIR__ . '/../components/Admin/san_pham/form_sidebar.php'; ?>

        </div>
    </form>
</div>
