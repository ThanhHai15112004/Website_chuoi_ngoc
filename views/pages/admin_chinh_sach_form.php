<?php
// views/pages/admin_chinh_sach_form.php
?>
<div class="px-4 md:px-6 py-6 pb-24 max-w-[1400px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-4">
        <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18] transition-colors">Admin</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <a href="<?= APP_URL ?>/admin/quan-ly-cua-hang" class="hover:text-[#6B0D18] transition-colors">Cấu hình cửa hàng</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <a href="<?= APP_URL ?>/admin/chinh-sach" class="hover:text-[#6B0D18] transition-colors">Chính sách cửa hàng</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span class="text-gray-900 font-medium"><?= isset($id) ? 'Sửa chính sách' : 'Thêm chính sách' ?></span>
    </nav>

    <!-- Tiêu đề trang & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">
                <?= isset($id) ? 'Chỉnh sửa chính sách' : 'Soạn thảo chính sách' ?>
            </h1>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="window.history.back()" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:arrow-left"></span> Hủy
            </button>
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm tooltip" title="Xem trước nội dung ngoài website">
                <span class="iconify" data-icon="mdi:eye-outline"></span> Xem trước
            </button>
            <button class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:content-save-outline"></span> Lưu chính sách
            </button>
        </div>
    </div>

    <!-- Nút chọn mẫu chính sách -->
    <div class="mb-6 flex justify-end">
        <button onclick="openModal('modalTemplates')" class="px-4 py-2 bg-amber-50 text-amber-700 border border-amber-200 rounded-lg hover:bg-amber-100 transition-colors text-sm font-bold flex items-center gap-2">
            <span class="iconify" data-icon="mdi:file-document-multiple-outline"></span> Sử dụng mẫu có sẵn
        </button>
    </div>

    <!-- Layout 2 cột -->
    <div class="flex flex-col xl:flex-row gap-6">
        
        <!-- Cột trái: Nội dung (70%) -->
        <div class="flex-1 min-w-0">
            <?php require_once __DIR__ . '/../components/Admin/chinh_sach/form_content.php'; ?>
        </div>

        <!-- Cột phải: Cài đặt (30%) -->
        <div class="w-full xl:w-[360px] shrink-0 space-y-6">
            <?php require_once __DIR__ . '/../components/Admin/chinh_sach/form_settings.php'; ?>
        </div>
        
    </div>
</div>

<!-- Modals -->
<?php require_once __DIR__ . '/../components/Admin/chinh_sach/modals.php'; ?>

<?php if(isset($id)): ?>
<script>
    // Mock data population for edit mode
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('policyName').value = "Chính sách đổi trả";
        document.getElementById('policySlug').value = "chinh-sach-doi-tra";
        document.querySelector('select').value = "1"; // Đổi trả
        document.querySelector('textarea').value = "Tìm hiểu chi tiết về điều kiện, thời gian và quy trình đổi trả các sản phẩm vòng ngọc, chuỗi đá và phụ kiện tại cửa hàng chúng tôi.";
        document.getElementById('policyEditor').value = "1. ĐIỀU KIỆN ĐỔI TRẢ:\n- Sản phẩm chưa qua sử dụng, còn nguyên tem mác.\n- Thời gian áp dụng: 7 ngày kể từ ngày nhận.\n\n2. CÁC BƯỚC ĐỔI TRẢ:\n- Bước 1: Liên hệ CSKH.\n- Bước 2: Gửi hàng về kho.\n- Bước 3: Nhận tiền hoàn lại.";
    });
</script>
<?php endif; ?>
