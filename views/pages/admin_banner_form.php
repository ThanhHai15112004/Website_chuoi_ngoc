<?php
// views/pages/admin_banner_form.php
$mode = $mode ?? 'create'; // create, edit
$banner = $banner ?? null;
$title = $mode === 'create' ? 'Thêm banner mới' : 'Chỉnh sửa banner';
?>

<div class="space-y-6 max-w-7xl mx-auto pb-20">
    
    <!-- Tiêu đề & Breadcrumb -->
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/banner" class="w-10 h-10 bg-white border border-gray-200 rounded-lg flex items-center justify-center text-gray-500 hover:text-[#6B0D18] hover:border-[#6B0D18] transition-colors shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <h2 class="text-2xl font-bold text-gray-800"><?= $title ?></h2>
                <div class="text-sm text-gray-500 mt-1 flex items-center gap-2">
                    <a href="<?= APP_URL ?>/admin/banner" class="hover:text-[#6B0D18] transition-colors">Quản lý banner</a>
                    <span class="iconify text-xs" data-icon="mdi:chevron-right"></span>
                    <span class="text-gray-700"><?= $mode === 'create' ? 'Thêm mới' : $banner['ten'] ?></span>
                </div>
            </div>
        </div>
        
        <?php if ($mode === 'edit'): ?>
            <div class="flex items-center gap-2">
                <span class="px-2.5 py-1 bg-green-50 text-green-700 text-xs font-medium rounded-full border border-green-100 flex items-center gap-1.5">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Đang hiển thị
                </span>
            </div>
        <?php endif; ?>
    </div>

    <!-- Alert cảnh báo nếu thiếu thông tin -->
    <div id="formAlert" class="hidden bg-red-50 border border-red-100 text-red-800 p-4 rounded-xl flex gap-3 items-start">
        <span class="iconify text-xl shrink-0 mt-0.5 text-red-500" data-icon="mdi:alert-circle-outline"></span>
        <div>
            <h4 class="font-bold text-sm">Vui lòng kiểm tra lại thông tin banner</h4>
            <ul class="text-sm mt-1 list-disc list-inside opacity-90" id="formAlertList">
                <!-- Chứa các dòng lỗi -->
            </ul>
        </div>
    </div>

    <!-- Form chia 2 cột -->
    <form action="" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-12 gap-6" onsubmit="return validateForm(event)">
        
        <!-- Cột trái: Thông tin & Hình ảnh (Chiếm 8 cột) -->
        <div class="lg:col-span-8 space-y-6">
            <?php require_once __DIR__ . '/../components/Admin/banner/form_info.php'; ?>
        </div>

        <!-- Cột phải: Cài đặt hiển thị & Preview (Chiếm 4 cột) -->
        <div class="lg:col-span-4 space-y-6">
            <?php require_once __DIR__ . '/../components/Admin/banner/form_settings.php'; ?>
            <?php require_once __DIR__ . '/../components/Admin/banner/form_preview.php'; ?>
        </div>

        <!-- Thanh Nút lưu (Cố định dưới đáy màn hình) -->
        <div class="fixed bottom-0 right-0 left-0 md:left-64 bg-white border-t border-gray-200 p-4 px-6 flex items-center justify-between z-30 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)]">
            <div class="text-sm text-gray-500">
                <?= $mode === 'edit' ? 'Lần cập nhật cuối: Hôm nay 10:30' : 'Mọi thay đổi chưa được lưu.' ?>
            </div>
            <div class="flex items-center gap-3">
                <a href="<?= APP_URL ?>/admin/banner" class="px-5 py-2.5 bg-white text-gray-700 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium">Hủy</a>
                <button type="submit" name="status" value="nhap" class="px-5 py-2.5 bg-gray-100 text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
                    Lưu nháp
                </button>
                <button type="submit" name="status" value="hien_thi" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A1120] transition-colors text-sm font-medium shadow-md">
                    <?= $mode === 'create' ? 'Lưu & Hiển thị ngay' : 'Cập nhật banner' ?>
                </button>
            </div>
        </div>
    </form>

</div>

<script>
    function validateForm(e) {
        // e.preventDefault(); // Uncomment để test giao diện lỗi
        const alertBox = document.getElementById('formAlert');
        const alertList = document.getElementById('formAlertList');
        alertList.innerHTML = '';
        let hasError = false;

        const name = document.getElementById('ten_banner').value;
        if (!name) {
            hasError = true;
            const li = document.createElement('li');
            li.textContent = 'Vui lòng nhập tên banner.';
            alertList.appendChild(li);
            document.getElementById('ten_banner').classList.add('border-red-500', 'focus:border-red-500', 'focus:ring-red-100');
        } else {
            document.getElementById('ten_banner').classList.remove('border-red-500', 'focus:border-red-500', 'focus:ring-red-100');
        }

        // Validate Desktop Image
        const previewDesktop = document.getElementById('preview_img_desktop');
        if (!previewDesktop.src && !document.getElementById('anh_desktop').value && '<?= $mode ?>' === 'create') {
             hasError = true;
             const li = document.createElement('li');
             li.textContent = 'Vui lòng tải ảnh banner cho Desktop.';
             alertList.appendChild(li);
        }

        if (hasError) {
            alertBox.classList.remove('hidden');
            window.scrollTo({ top: 0, behavior: 'smooth' });
            return false;
        }

        alertBox.classList.add('hidden');
        return true;
    }
</script>
