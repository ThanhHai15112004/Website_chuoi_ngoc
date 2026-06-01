<?php
// views/components/Admin/quan_ly_cua_hang/form_branding.php
$logoChinhUrl = $storeConfig['logo_chinh'] ?? '';
$logoToiUrl = $storeConfig['logo_toi'] ?? '';
$faviconUrl = $storeConfig['favicon'] ?? '';
$mauThuongHieu = $storeConfig['mau_thuong_hieu'] ?? '#6B0D18';
?>
<div class="bg-white rounded-[20px] border border-gray-200 shadow-sm overflow-hidden" id="section-branding">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center gap-2">
        <span class="iconify text-gray-400 text-xl" data-icon="mdi:image-outline"></span>
        <h2 class="font-bold text-gray-900 text-lg">Logo & Nhận diện thương hiệu</h2>
    </div>
    
    <div class="p-5 md:p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
        
        <!-- Logo chính -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Logo chính (Nền sáng)</label>
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:bg-gray-50 transition-colors relative group <?= $logoChinhUrl ? 'border-solid border-emerald-200 bg-emerald-50/30' : '' ?>" id="upload-logo-main">
                <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*" onchange="uploadStoreImage(this, 'logo_chinh')">
                <div class="flex flex-col items-center justify-center h-32 <?= $logoChinhUrl ? 'hidden' : '' ?>" id="placeholder-logo-chinh">
                    <span class="iconify text-gray-300 text-4xl mb-2" data-icon="mdi:cloud-upload-outline"></span>
                    <p class="text-sm font-medium text-[#6B0D18]">Tải ảnh lên</p>
                    <p class="text-xs text-gray-400 mt-1">PNG, JPG, SVG (300x100px)</p>
                </div>
                <img id="preview-logo-chinh" src="<?= $logoChinhUrl ?>" class="w-full h-32 object-contain p-2 bg-white rounded-xl <?= $logoChinhUrl ? '' : 'hidden' ?>" alt="Logo chính">
                <button type="button" class="absolute top-2 right-2 bg-red-100 text-red-600 p-1.5 rounded-lg <?= $logoChinhUrl ? 'block' : 'hidden' ?> group-hover:block z-20" onclick="removeStoreImage(event, 'logo_chinh')" title="Xóa ảnh">
                    <span class="iconify" data-icon="mdi:trash-can-outline"></span>
                </button>
                <!-- Loading spinner -->
                <div id="loading-logo-chinh" class="absolute inset-0 bg-white/80 flex items-center justify-center rounded-xl hidden z-30">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-[#6B0D18]"></div>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-2">Sử dụng cho header, footer và email.</p>
        </div>

        <!-- Logo nền tối -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Logo âm bản (Nền tối)</label>
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:bg-gray-800 transition-colors relative group bg-gray-900 <?= $logoToiUrl ? 'border-solid border-gray-600' : '' ?>" id="upload-logo-dark">
                <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*" onchange="uploadStoreImage(this, 'logo_toi')">
                <div class="flex flex-col items-center justify-center h-32 <?= $logoToiUrl ? 'hidden' : '' ?>" id="placeholder-logo-toi">
                    <span class="iconify text-gray-600 text-4xl mb-2" data-icon="mdi:cloud-upload-outline"></span>
                    <p class="text-sm font-medium text-white">Tải ảnh lên</p>
                </div>
                <img id="preview-logo-toi" src="<?= $logoToiUrl ?>" class="w-full h-32 object-contain p-2 bg-gray-900 rounded-xl <?= $logoToiUrl ? '' : 'hidden' ?>" alt="Logo âm bản">
                <button type="button" class="absolute top-2 right-2 bg-white/20 text-white p-1.5 rounded-lg <?= $logoToiUrl ? 'block' : 'hidden' ?> group-hover:block z-20" onclick="removeStoreImage(event, 'logo_toi')" title="Xóa ảnh">
                    <span class="iconify" data-icon="mdi:trash-can-outline"></span>
                </button>
                <div id="loading-logo-toi" class="absolute inset-0 bg-gray-900/80 flex items-center justify-center rounded-xl hidden z-30">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-white"></div>
                </div>
            </div>
            <p class="text-xs text-gray-500 mt-2">Dùng khi nền web màu đỏ thẳm hoặc đen.</p>
        </div>

        <!-- Favicon -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Favicon</label>
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:bg-gray-50 transition-colors relative group flex items-center gap-4 <?= $faviconUrl ? 'border-solid border-emerald-200' : '' ?>">
                <div class="w-16 h-16 rounded-lg bg-gray-100 flex items-center justify-center relative overflow-hidden shrink-0">
                    <img id="preview-favicon" src="<?= $faviconUrl ?>" class="w-full h-full object-cover <?= $faviconUrl ? '' : 'hidden' ?>" alt="Favicon">
                    <span class="iconify text-gray-300 text-2xl <?= $faviconUrl ? 'hidden' : '' ?>" id="favicon-icon" data-icon="mdi:image-outline"></span>
                </div>
                <div class="text-left flex-1 relative">
                    <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/png, image/x-icon, image/vnd.microsoft.icon" onchange="uploadStoreImage(this, 'favicon')">
                    <button type="button" class="px-3 py-1.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 pointer-events-none">Chọn file</button>
                    <p class="text-xs text-gray-400 mt-1.5">64x64px, .ICO hoặc .PNG</p>
                </div>
                <?php if ($faviconUrl): ?>
                <button type="button" class="shrink-0 bg-red-100 text-red-600 p-1.5 rounded-lg" onclick="removeStoreImage(event, 'favicon')" title="Xóa ảnh">
                    <span class="iconify" data-icon="mdi:trash-can-outline"></span>
                </button>
                <?php endif; ?>
                <div id="loading-favicon" class="absolute inset-0 bg-white/80 flex items-center justify-center rounded-xl hidden z-30">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-[#6B0D18]"></div>
                </div>
            </div>
        </div>

        <!-- Màu thương hiệu -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Màu thương hiệu chủ đạo</label>
            <div class="flex items-center gap-4 border border-gray-200 rounded-xl p-3">
                <input type="color" name="mau_thuong_hieu" id="inp-mau-thuong-hieu" value="<?= htmlspecialchars($mauThuongHieu) ?>" class="w-10 h-10 rounded cursor-pointer border-0 p-0" title="Chọn màu chính" oninput="updateColorDisplay(this.value)">
                <div>
                    <p class="text-sm font-bold text-gray-900" id="color-display"><?= htmlspecialchars($mauThuongHieu) ?></p>
                    <p class="text-xs text-gray-500">Mã màu nhận diện chính trên website.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    function updateColorDisplay(hex) {
        document.getElementById('color-display').textContent = hex.toUpperCase();
    }

    /**
     * Upload ảnh lên server ngay khi chọn file
     */
    function uploadStoreImage(input, type) {
        if (!input.files || !input.files[0]) return;

        const file = input.files[0];

        // Validate client-side
        const maxSize = 5 * 1024 * 1024; // 5MB
        if (file.size > maxSize) {
            showToast('File không được vượt quá 5MB.', 'error');
            input.value = '';
            return;
        }

        const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml', 'image/x-icon', 'image/vnd.microsoft.icon'];
        if (!allowedTypes.includes(file.type) && !file.name.match(/\.(jpg|jpeg|png|gif|webp|svg|ico)$/i)) {
            showToast('Định dạng file không hỗ trợ.', 'error');
            input.value = '';
            return;
        }

        // Show loading
        const loadingEl = document.getElementById('loading-' + type.replace(/_/g, '-'));
        if (loadingEl) loadingEl.classList.remove('hidden');

        // Upload via API
        const formData = new FormData();
        formData.append('image', file);
        formData.append('type', type);

        fetch(`<?= APP_URL ?>/admin/quan-ly-cua-hang/api/upload-image`, {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (loadingEl) loadingEl.classList.add('hidden');

            if (data.success) {
                // Hiển thị ảnh preview
                const previewImg = document.getElementById('preview-' + type.replace(/_/g, '-'));
                const placeholder = document.getElementById('placeholder-' + type.replace(/_/g, '-'));
                
                if (previewImg) {
                    previewImg.src = data.url;
                    previewImg.classList.remove('hidden');
                }
                if (placeholder) {
                    placeholder.classList.add('hidden');
                }

                // Hiển thị nút xóa
                const container = previewImg?.closest('.relative');
                const deleteBtn = container?.querySelector('button[onclick*="removeStoreImage"]');
                if (deleteBtn) deleteBtn.classList.remove('hidden');

                // Nếu là favicon, ẩn icon placeholder
                if (type === 'favicon') {
                    const faviconIcon = document.getElementById('favicon-icon');
                    if (faviconIcon) faviconIcon.classList.add('hidden');
                }

                showToast(data.message, 'success');

                // Cập nhật logo trong preview panel
                if (type === 'logo_chinh' || type === 'logo_toi') {
                    if (typeof updatePreviewLogo === 'function') {
                        updatePreviewLogo(data.url, type);
                    }
                }

                // Đánh dấu có thay đổi
                if (!hasUnsavedChanges) {
                    hasUnsavedChanges = true;
                    document.getElementById('stickySaveBar')?.classList.remove('translate-y-full');
                }
            } else {
                showToast(data.message || 'Lỗi upload ảnh.', 'error');
            }
        })
        .catch(err => {
            if (loadingEl) loadingEl.classList.add('hidden');
            showToast('Lỗi kết nối server.', 'error');
            console.error('Upload error:', err);
        });

        // Reset input để có thể chọn lại cùng file
        input.value = '';
    }

    /**
     * Xóa ảnh đã upload
     */
    function removeStoreImage(event, type) {
        event.preventDefault();
        event.stopPropagation();

        if (!confirm('Bạn có chắc muốn xóa ảnh này?')) return;

        fetch(`<?= APP_URL ?>/admin/quan-ly-cua-hang/api/remove-image`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ type: type })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                const previewImg = document.getElementById('preview-' + type.replace(/_/g, '-'));
                const placeholder = document.getElementById('placeholder-' + type.replace(/_/g, '-'));
                
                if (previewImg) {
                    previewImg.src = '';
                    previewImg.classList.add('hidden');
                }
                if (placeholder) {
                    placeholder.classList.remove('hidden');
                }

                // Ẩn nút xóa
                const container = previewImg?.closest('.relative');
                const deleteBtn = container?.querySelector('button[onclick*="removeStoreImage"]');
                if (deleteBtn) deleteBtn.classList.add('hidden');

                // Favicon icon
                if (type === 'favicon') {
                    const faviconIcon = document.getElementById('favicon-icon');
                    if (faviconIcon) faviconIcon.classList.remove('hidden');
                }

                showToast('Đã xóa ảnh.', 'success');
            } else {
                showToast(data.message || 'Lỗi xóa ảnh.', 'error');
            }
        })
        .catch(err => {
            showToast('Lỗi kết nối server.', 'error');
            console.error('Remove error:', err);
        });
    }
</script>
