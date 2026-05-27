<?php
// views/components/Admin/quan_ly_cua_hang/form_branding.php
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
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:bg-gray-50 transition-colors relative group" id="upload-logo-main">
                <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*" onchange="previewImage(this, 'preview-logo-main')">
                <div class="flex flex-col items-center justify-center h-32" id="preview-logo-main-container">
                    <span class="iconify text-gray-300 text-4xl mb-2" data-icon="mdi:cloud-upload-outline"></span>
                    <p class="text-sm font-medium text-[#6B0D18]">Tải ảnh lên</p>
                    <p class="text-xs text-gray-400 mt-1">PNG, JPG, SVG (300x100px)</p>
                </div>
                <img id="preview-logo-main" src="<?= APP_URL ?>/public/images/logo_placeholder.png" class="absolute inset-0 w-full h-full object-contain p-2 hidden bg-white rounded-xl" alt="Logo">
                <button type="button" class="absolute top-2 right-2 bg-red-100 text-red-600 p-1.5 rounded-lg hidden group-hover:block z-20" onclick="removeImage('preview-logo-main')" title="Xóa ảnh"><span class="iconify" data-icon="mdi:trash-can-outline"></span></button>
            </div>
            <p class="text-xs text-gray-500 mt-2">Sử dụng cho header, footer và email.</p>
        </div>

        <!-- Logo nền tối -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Logo âm bản (Nền tối)</label>
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:bg-gray-50 transition-colors relative group bg-gray-900" id="upload-logo-dark">
                <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*" onchange="previewImage(this, 'preview-logo-dark')">
                <div class="flex flex-col items-center justify-center h-32" id="preview-logo-dark-container">
                    <span class="iconify text-gray-600 text-4xl mb-2" data-icon="mdi:cloud-upload-outline"></span>
                    <p class="text-sm font-medium text-white">Tải ảnh lên</p>
                </div>
                <img id="preview-logo-dark" src="" class="absolute inset-0 w-full h-full object-contain p-2 hidden bg-gray-900 rounded-xl" alt="Logo âm bản">
                <button type="button" class="absolute top-2 right-2 bg-white/20 text-white p-1.5 rounded-lg hidden group-hover:block z-20" onclick="removeImage('preview-logo-dark')" title="Xóa ảnh"><span class="iconify" data-icon="mdi:trash-can-outline"></span></button>
            </div>
            <p class="text-xs text-gray-500 mt-2">Dùng khi nền web màu đỏ thẳm hoặc đen.</p>
        </div>

        <!-- Favicon -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Favicon</label>
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:bg-gray-50 transition-colors relative group flex items-center gap-4">
                <div class="w-16 h-16 rounded-lg bg-gray-100 flex items-center justify-center relative overflow-hidden">
                    <img id="preview-favicon" src="" class="w-full h-full object-cover hidden" alt="Favicon">
                    <span class="iconify text-gray-300 text-2xl" id="favicon-icon" data-icon="mdi:image-outline"></span>
                </div>
                <div class="text-left flex-1 relative">
                    <input type="file" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/png, image/x-icon" onchange="previewImage(this, 'preview-favicon', 'favicon-icon')">
                    <button type="button" class="px-3 py-1.5 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 pointer-events-none">Chọn file</button>
                    <p class="text-xs text-gray-400 mt-1.5">64x64px, .ICO hoặc .PNG</p>
                </div>
            </div>
        </div>

        <!-- Màu thương hiệu -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Màu thương hiệu chủ đạo</label>
            <div class="flex items-center gap-4 border border-gray-200 rounded-xl p-3">
                <input type="color" value="#6B0D18" class="w-10 h-10 rounded cursor-pointer border-0 p-0" title="Chọn màu chính">
                <div>
                    <p class="text-sm font-bold text-gray-900">#6B0D18 (Đỏ thẳm)</p>
                    <p class="text-xs text-gray-500">Mã màu nhận diện chính trên website.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
    // JS Mock cho upload ảnh tĩnh
    function previewImage(input, imgId, iconId = null) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                const imgElement = document.getElementById(imgId);
                imgElement.src = e.target.result;
                imgElement.classList.remove('hidden');
                
                // Hide container text/icons if exists
                const containerId = imgId + '-container';
                if(document.getElementById(containerId)) {
                    document.getElementById(containerId).style.opacity = '0';
                }
                if(iconId && document.getElementById(iconId)) {
                    document.getElementById(iconId).classList.add('hidden');
                }
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeImage(imgId) {
        const imgElement = document.getElementById(imgId);
        imgElement.src = '';
        imgElement.classList.add('hidden');
        
        const containerId = imgId + '-container';
        if(document.getElementById(containerId)) {
            document.getElementById(containerId).style.opacity = '1';
        }
        // reset input file
        imgElement.previousElementSibling.previousElementSibling.value = "";
    }
</script>
