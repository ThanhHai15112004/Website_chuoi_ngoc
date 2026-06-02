<?php
// views/pages/admin_chinh_sach_form.php
$p = $policy ?? null;
$isEdit = isset($id) && $p;
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
        <span class="text-gray-900 font-medium"><?= $isEdit ? 'Sửa chính sách' : 'Thêm chính sách' ?></span>
    </nav>

    <!-- Tiêu đề trang & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">
                <?= $isEdit ? 'Chỉnh sửa chính sách' : 'Soạn thảo chính sách' ?>
            </h1>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/chinh-sach" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:arrow-left"></span> Hủy
            </a>
            <button onclick="previewPolicy()" class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm tooltip" title="Xem trước nội dung ngoài website">
                <span class="iconify" data-icon="mdi:eye-outline"></span> Xem trước
            </button>
            <button onclick="savePolicy()" id="btnSave" class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:content-save-outline"></span> Lưu chính sách
            </button>
        </div>
    </div>

    <!-- Nút chọn mẫu chính sách (chỉ hiện khi thêm mới) -->
    <?php if (!$isEdit): ?>
    <div class="mb-6 flex justify-end">
        <button onclick="openModal('modalTemplates')" class="px-4 py-2 bg-amber-50 text-amber-700 border border-amber-200 rounded-lg hover:bg-amber-100 transition-colors text-sm font-bold flex items-center gap-2">
            <span class="iconify" data-icon="mdi:file-document-multiple-outline"></span> Sử dụng mẫu có sẵn
        </button>
    </div>
    <?php endif; ?>

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

<script>
    function savePolicy() {
        const btn = document.getElementById('btnSave');
        btn.disabled = true;
        btn.innerHTML = '<span class="iconify animate-spin" data-icon="mdi:loading"></span> Đang lưu...';

        const formData = new FormData();
        
        <?php if ($isEdit): ?>
        formData.append('id', '<?= $id ?>');
        <?php endif; ?>

        formData.append('ten', document.getElementById('policyName').value);
        formData.append('loai', document.getElementById('policyLoai').value);
        formData.append('slug', document.getElementById('policySlug').value);
        formData.append('mo_ta_ngan', document.getElementById('policyMoTa').value);
        formData.append('noi_dung', document.getElementById('policyEditor').value);
        formData.append('seo_title', document.getElementById('seoTitleInput').value);
        formData.append('seo_description', document.getElementById('seoDescInput').value);

        // Trạng thái
        const isVisible = document.getElementById('toggleStatus').checked;
        formData.append('trang_thai', isVisible ? 'dang_hien_thi' : 'ban_nhap');

        // Vị trí hiển thị (checkboxes)
        document.querySelectorAll('input[name="vi_tri[]"]:checked').forEach(cb => {
            formData.append('vi_tri[]', cb.value);
        });

        fetch('<?= APP_URL ?>/admin/chinh-sach/api/luu', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                // Toast
                showToast(data.message);
                setTimeout(() => {
                    <?php if ($isEdit): ?>
                    location.reload();
                    <?php else: ?>
                    window.location.href = '<?= APP_URL ?>/admin/chinh-sach/sua/' + data.id;
                    <?php endif; ?>
                }, 800);
            } else {
                alert(data.message || 'Lỗi lưu chính sách');
                btn.disabled = false;
                btn.innerHTML = '<span class="iconify" data-icon="mdi:content-save-outline"></span> Lưu chính sách';
            }
        })
        .catch(err => {
            console.error(err);
            alert('Lỗi kết nối server');
            btn.disabled = false;
            btn.innerHTML = '<span class="iconify" data-icon="mdi:content-save-outline"></span> Lưu chính sách';
        });
    }

    function previewPolicy() {
        const slug = document.getElementById('policySlug').value;
        if (slug) {
            window.open('<?= APP_URL ?>/chinh-sach/' + slug, '_blank');
        } else {
            alert('Vui lòng nhập slug trước khi xem trước.');
        }
    }

    function showToast(message) {
        const toast = document.createElement('div');
        toast.className = 'fixed bottom-6 right-6 bg-gray-900 text-white px-5 py-3 rounded-xl shadow-2xl z-[100] flex items-center gap-2';
        toast.innerHTML = '<span class="iconify" data-icon="mdi:check-circle"></span> ' + message;
        document.body.appendChild(toast);
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transition = 'opacity 0.3s';
            setTimeout(() => toast.remove(), 300);
        }, 2500);
    }
</script>
