<?php
// views/pages/admin_xuat_kho_them.php
$pageTitle = 'Tạo phiếu xuất kho | Admin';
$current_page = 'xuat_kho';
?>

<div class="max-w-6xl mx-auto">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6 mt-4">
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/xuat-kho" class="p-2 -ml-2 text-gray-500 hover:text-[#6B0D18] hover:bg-red-50 rounded-lg transition-colors">
                <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <h1 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                    Tạo phiếu xuất kho mới
                </h1>
                <div class="text-sm text-gray-500 mt-0.5">Vui lòng nhập đầy đủ thông tin để lưu phiếu</div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button type="button" class="px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm">
                Hủy bỏ
            </button>
            <button type="button" class="px-6 py-2 bg-white border border-[#6B0D18] text-[#6B0D18] rounded-lg hover:bg-red-50 font-medium text-sm transition-colors shadow-sm">
                Lưu nháp
            </button>
            <button type="button" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify text-lg" data-icon="mdi:send-check-outline"></span> Gửi duyệt
            </button>
        </div>
    </div>

    <form action="#" method="POST">
        <!-- Khối 1: Thông tin chung & Kho xuất -->
        <?php require_once __DIR__ . '/../components/Admin/xuat_kho/form/form_info.php'; ?>

        <!-- Khối 2: Đơn hàng / Đối tượng nhận -->
        <?php require_once __DIR__ . '/../components/Admin/xuat_kho/form/form_receiver.php'; ?>

        <!-- Khối 3: Bảng Sản phẩm -->
        <?php require_once __DIR__ . '/../components/Admin/xuat_kho/form/form_products.php'; ?>

        <!-- Khối 4: Tóm tắt phiếu & Ghi chú -->
        <?php require_once __DIR__ . '/../components/Admin/xuat_kho/form/form_summary.php'; ?>
    </form>
</div>

<!-- Modal Thêm Sản Phẩm -->
<?php require_once __DIR__ . '/../components/Admin/shared/modal_add_product.php'; ?>
