<?php
// views/components/Admin/quan_ly_cua_hang/form_seo.php
$socialShareImage = $storeConfig['social_share_image'] ?? '';
?>
<div class="bg-white rounded-[20px] border border-gray-200 shadow-sm overflow-hidden" id="section-seo">
    <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center gap-2">
        <span class="iconify text-gray-400 text-xl" data-icon="mdi:google"></span>
        <h2 class="font-bold text-gray-900 text-lg">SEO & Chia sẻ (Trang chủ)</h2>
    </div>
    
    <div class="p-5 md:p-6 grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Form nhập liệu -->
        <div class="space-y-4">
            <div class="space-y-1">
                <div class="flex justify-between items-center">
                    <label class="block text-sm font-medium text-gray-700">Meta Title (Tiêu đề SEO)</label>
                    <span class="text-xs text-gray-400"><span id="count-title"><?= mb_strlen($storeConfig['meta_title'] ?? '') ?></span>/60 ký tự</span>
                </div>
                <input type="text" name="meta_title" id="inp-meta-title" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= htmlspecialchars($storeConfig['meta_title'] ?? '', ENT_QUOTES) ?>">
            </div>

            <div class="space-y-1">
                <div class="flex justify-between items-center">
                    <label class="block text-sm font-medium text-gray-700">Meta Description (Mô tả SEO)</label>
                    <span class="text-xs text-gray-400"><span id="count-desc"><?= mb_strlen($storeConfig['meta_description'] ?? '') ?></span>/160 ký tự</span>
                </div>
                <textarea name="meta_description" id="inp-meta-desc" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]"><?= htmlspecialchars($storeConfig['meta_description'] ?? '', ENT_QUOTES) ?></textarea>
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Từ khóa (Keywords)</label>
                <input type="text" name="keywords" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= htmlspecialchars($storeConfig['keywords'] ?? '', ENT_QUOTES) ?>" placeholder="Cách nhau bằng dấu phẩy">
            </div>
            
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Ảnh chia sẻ (Social Share Image)</label>
                <div class="flex items-center gap-4 relative">
                    <div class="w-32 h-20 bg-gray-100 rounded-lg border border-gray-200 overflow-hidden relative shrink-0">
                        <img id="preview-social-share-image" src="<?= $socialShareImage ?>" class="w-full h-full object-cover <?= $socialShareImage ? '' : 'hidden' ?>" alt="Social Share">
                        <div class="absolute inset-0 flex items-center justify-center <?= $socialShareImage ? 'hidden' : '' ?>" id="placeholder-social-share-image">
                            <span class="iconify text-gray-300 text-xl" data-icon="mdi:image-outline"></span>
                        </div>
                    </div>
                    <div class="relative">
                        <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*" onchange="uploadSocialImage(this)">
                        <button type="button" class="px-3 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 pointer-events-none">Tải ảnh lên (1200x630)</button>
                    </div>
                    <?php if ($socialShareImage): ?>
                    <button type="button" class="shrink-0 bg-red-100 text-red-600 p-1.5 rounded-lg" onclick="removeStoreImage(event, 'social_share_image')" title="Xóa ảnh">
                        <span class="iconify" data-icon="mdi:trash-can-outline"></span>
                    </button>
                    <?php endif; ?>
                    <div id="loading-social-share-image" class="absolute inset-0 bg-white/80 flex items-center justify-center rounded-lg hidden z-30">
                        <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-[#6B0D18]"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SEO Preview -->
        <div class="space-y-4">
            <h3 class="text-sm font-medium text-gray-700 mb-2">Xem trước kết quả tìm kiếm (Google)</h3>
            <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                <div class="text-[#1a0dab] text-lg font-medium hover:underline cursor-pointer leading-tight mb-1" id="preview-seo-title"><?= htmlspecialchars($storeConfig['meta_title'] ?? 'Tiêu đề trang', ENT_QUOTES) ?></div>
                <div class="text-[#006621] text-sm mb-1 flex items-center gap-1">https://chuoingoc.com <span class="iconify text-xs" data-icon="mdi:menu-down"></span></div>
                <div class="text-[#545454] text-sm leading-snug" id="preview-seo-desc"><?= htmlspecialchars($storeConfig['meta_description'] ?? 'Mô tả trang web...', ENT_QUOTES) ?></div>
            </div>
            
            <h3 class="text-sm font-medium text-gray-700 mt-6 mb-2">Xem trước khi chia sẻ (Facebook, Zalo)</h3>
            <div class="bg-[#f2f3f5] border border-gray-300 rounded-lg overflow-hidden max-w-[400px]">
                <div class="h-[210px] bg-gray-200 relative overflow-hidden">
                    <img id="preview-social-share-fb" src="<?= $socialShareImage ?>" class="w-full h-full object-cover <?= $socialShareImage ? '' : 'hidden' ?>" alt="Social preview">
                    <div class="absolute inset-0 flex items-center justify-center text-gray-400 flex-col <?= $socialShareImage ? 'hidden' : '' ?>" id="placeholder-social-fb">
                        <span class="iconify text-3xl mb-1" data-icon="mdi:image-outline"></span>
                        <span class="text-xs">Ảnh chia sẻ 1200x630</span>
                    </div>
                </div>
                <div class="p-3 bg-white">
                    <div class="text-[12px] text-gray-500 uppercase tracking-wide mb-1">CHUOINGOC.COM</div>
                    <div class="text-base font-bold text-gray-900 leading-tight mb-1 line-clamp-1" id="preview-social-title"><?= htmlspecialchars($storeConfig['meta_title'] ?? 'Tiêu đề trang', ENT_QUOTES) ?></div>
                    <div class="text-sm text-gray-500 line-clamp-1" id="preview-social-desc"><?= htmlspecialchars($storeConfig['meta_description'] ?? 'Mô tả trang web...', ENT_QUOTES) ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('inp-meta-title').addEventListener('input', function(e) {
        document.getElementById('preview-seo-title').textContent = e.target.value || 'Tiêu đề trang';
        document.getElementById('preview-social-title').textContent = e.target.value || 'Tiêu đề trang';
        const count = e.target.value.length;
        const countEl = document.getElementById('count-title');
        countEl.textContent = count;
        countEl.className = count > 60 ? 'text-red-500 font-bold' : '';
    });
    
    document.getElementById('inp-meta-desc').addEventListener('input', function(e) {
        document.getElementById('preview-seo-desc').textContent = e.target.value || 'Mô tả trang web...';
        document.getElementById('preview-social-desc').textContent = e.target.value || 'Mô tả trang web...';
        const count = e.target.value.length;
        const countEl = document.getElementById('count-desc');
        countEl.textContent = count;
        countEl.className = count > 160 ? 'text-red-500 font-bold' : '';
    });

    /**
     * Upload ảnh social share — wrapper gọi uploadStoreImage + cập nhật preview Facebook
     */
    function uploadSocialImage(input) {
        if (!input.files || !input.files[0]) return;

        const file = input.files[0];
        const maxSize = 5 * 1024 * 1024;
        if (file.size > maxSize) {
            showToast('File không được vượt quá 5MB.', 'error');
            input.value = '';
            return;
        }

        // Show loading
        const loadingEl = document.getElementById('loading-social-share-image');
        if (loadingEl) loadingEl.classList.remove('hidden');

        const formData = new FormData();
        formData.append('image', file);
        formData.append('type', 'social_share_image');

        fetch(`<?= APP_URL ?>/admin/quan-ly-cua-hang/api/upload-image`, {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (loadingEl) loadingEl.classList.add('hidden');

            if (data.success) {
                // Cập nhật preview nhỏ bên trái
                const previewImg = document.getElementById('preview-social-share-image');
                const placeholder = document.getElementById('placeholder-social-share-image');
                if (previewImg) {
                    previewImg.src = data.url;
                    previewImg.classList.remove('hidden');
                }
                if (placeholder) placeholder.classList.add('hidden');

                // Cập nhật preview Facebook/Zalo share bên phải
                const fbImg = document.getElementById('preview-social-share-fb');
                const fbPlaceholder = document.getElementById('placeholder-social-fb');
                if (fbImg) {
                    fbImg.src = data.url;
                    fbImg.classList.remove('hidden');
                }
                if (fbPlaceholder) fbPlaceholder.classList.add('hidden');

                showToast(data.message, 'success');

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

        input.value = '';
    }
</script>
