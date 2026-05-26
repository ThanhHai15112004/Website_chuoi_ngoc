<div class="p-6 space-y-6 bg-gray-50/50 min-h-screen relative pb-24">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <a href="<?= APP_URL ?>/admin/nha-cung-cap" class="p-2 text-gray-400 hover:text-gray-900 hover:bg-gray-100 rounded-full transition-colors focus:outline-none">
            <span class="iconify text-2xl" data-icon="mdi:arrow-left"></span>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900"><?= $isEdit ? 'Chỉnh sửa nhà cung cấp' : 'Thêm nhà cung cấp mới' ?></h1>
            <p class="text-sm text-gray-500 mt-1"><?= $isEdit ? 'Cập nhật thông tin đối tác NCC001' : 'Điền thông tin để khởi tạo hồ sơ đối tác cung cấp mới.' ?></p>
        </div>
    </div>

    <!-- Layout 2 cột: Trái (Nội dung chính) - Phải (Cấu hình) -->
    <form id="supplierForm" class="grid grid-cols-1 lg:grid-cols-3 gap-6" onsubmit="event.preventDefault(); alert('Đã lưu thành công!'); window.location.href='<?= APP_URL ?>/admin/nha-cung-cap';">
        
        <!-- Cột trái (Rộng hơn) -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Thông tin cơ bản -->
            <?php require_once __DIR__ . '/../components/Admin/nha_cung_cap/form/form_basic.php'; ?>

            <!-- Thông tin liên hệ -->
            <?php require_once __DIR__ . '/../components/Admin/nha_cung_cap/form/form_contact.php'; ?>

            <!-- Nhóm hàng cung cấp -->
            <?php require_once __DIR__ . '/../components/Admin/nha_cung_cap/form/form_categories.php'; ?>
        </div>

        <!-- Cột phải (Hẹp hơn) -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Trạng thái & Ghi chú -->
            <?php require_once __DIR__ . '/../components/Admin/nha_cung_cap/form/form_status.php'; ?>

            <!-- Thông tin thanh toán -->
            <?php require_once __DIR__ . '/../components/Admin/nha_cung_cap/form/form_payment.php'; ?>
        </div>
        
        <!-- Sticky Bottom Actions -->
        <div class="fixed bottom-0 left-0 right-0 lg:left-64 bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-40">
            <div class="max-w-[1600px] mx-auto flex items-center justify-between">
                <div>
                    <span class="text-sm text-gray-500"><span class="text-red-500">*</span> Các trường bắt buộc nhập</span>
                </div>
                <div class="flex items-center gap-3">
                    <a href="<?= APP_URL ?>/admin/nha-cung-cap" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                        Hủy bỏ
                    </a>
                    <?php if(!$isEdit): ?>
                        <button type="button" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors">
                            Lưu nháp
                        </button>
                    <?php endif; ?>
                    <button type="submit" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium transition-colors shadow-sm flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:content-save"></span>
                        <?= $isEdit ? 'Lưu cập nhật' : 'Lưu nhà cung cấp' ?>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
