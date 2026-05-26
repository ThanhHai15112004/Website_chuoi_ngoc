<?php
// views/pages/admin_nhap_kho_them.php
$current_page = 'nhap_kho';
$isEdit = $isEdit ?? false;
$id = $id ?? '';
$title = $isEdit ? 'Sửa phiếu nhập kho' : 'Tạo phiếu nhập kho';
?>
<div class="max-w-6xl mx-auto">
    
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/nhap-kho" class="p-2 text-gray-400 hover:text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                <span class="iconify text-2xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <h1 class="text-2xl font-bold text-gray-900 tracking-tight"><?= $title ?></h1>
                <div class="text-sm text-gray-500 mt-0.5 flex items-center gap-2">
                    <a href="<?= APP_URL ?>/admin/nhap-kho" class="hover:text-[#6B0D18]">Phiếu nhập kho</a>
                    <span class="iconify text-xs" data-icon="mdi:chevron-right"></span>
                    <span><?= $isEdit ? $id : 'Tạo mới' ?></span>
                </div>
            </div>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-6 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors shadow-sm">
                Hủy bỏ
            </button>
            <button class="px-6 py-2 bg-white border border-[#6B0D18] text-[#6B0D18] rounded-lg hover:bg-red-50 font-medium text-sm transition-colors shadow-sm">
                Lưu nháp
            </button>
            <button onclick="saveAndSend()" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:send"></span> Gửi kiểm hàng
            </button>
        </div>
    </div>

    <form action="#" method="POST">
        <!-- Khối 1: Thông tin phiếu -->
        <?php require_once __DIR__ . '/../components/Admin/nhap_kho/form/form_info.php'; ?>

        <!-- Khối 2: Nhà cung cấp & Kho nhập -->
        <?php require_once __DIR__ . '/../components/Admin/nhap_kho/form/form_supplier.php'; ?>

        <!-- Khối 3: Bảng Sản phẩm -->
        <?php require_once __DIR__ . '/../components/Admin/nhap_kho/form/form_products.php'; ?>

        <!-- Khối 4: Thanh toán & Ghi chú -->
        <?php require_once __DIR__ . '/../components/Admin/nhap_kho/form/form_payment.php'; ?>
    </form>

</div>

<script>
    function saveAndSend() {
        // Giả lập lưu thành công
        window.location.href = '<?= APP_URL ?>/admin/nhap-kho';
    }
</script>
