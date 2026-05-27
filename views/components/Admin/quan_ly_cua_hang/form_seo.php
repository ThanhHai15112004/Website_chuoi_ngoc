<?php
// views/components/Admin/quan_ly_cua_hang/form_seo.php
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
                    <span class="text-xs text-gray-400"><span id="count-title">53</span>/60 ký tự</span>
                </div>
                <input type="text" id="inp-meta-title" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= $storeConfig['meta_title'] ?? '' ?>">
            </div>

            <div class="space-y-1">
                <div class="flex justify-between items-center">
                    <label class="block text-sm font-medium text-gray-700">Meta Description (Mô tả SEO)</label>
                    <span class="text-xs text-gray-400"><span id="count-desc">106</span>/160 ký tự</span>
                </div>
                <textarea id="inp-meta-desc" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]"><?= $storeConfig['meta_description'] ?? '' ?></textarea>
            </div>

            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Từ khóa (Keywords)</label>
                <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:border-[#6B0D18]" value="<?= $storeConfig['keywords'] ?? '' ?>" placeholder="Cách nhau bằng dấu phẩy">
            </div>
            
            <div class="space-y-1">
                <label class="block text-sm font-medium text-gray-700">Ảnh chia sẻ (Social Share Image)</label>
                <div class="flex items-center gap-4">
                    <div class="w-32 h-20 bg-gray-100 rounded-lg border border-gray-200 overflow-hidden relative">
                        <img src="<?= APP_URL ?>/public/images/logo_placeholder.png" class="w-full h-full object-cover">
                    </div>
                    <button type="button" class="px-3 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50">Tải ảnh lên (1200x630)</button>
                </div>
            </div>
        </div>

        <!-- SEO Preview -->
        <div class="space-y-4">
            <h3 class="text-sm font-medium text-gray-700 mb-2">Xem trước kết quả tìm kiếm (Google)</h3>
            <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                <div class="text-[#1a0dab] text-lg font-medium hover:underline cursor-pointer leading-tight mb-1" id="preview-seo-title"><?= $storeConfig['meta_title'] ?></div>
                <div class="text-[#006621] text-sm mb-1 flex items-center gap-1">https://chuoingoc.com <span class="iconify text-xs" data-icon="mdi:menu-down"></span></div>
                <div class="text-[#545454] text-sm leading-snug" id="preview-seo-desc"><?= $storeConfig['meta_description'] ?></div>
            </div>
            
            <h3 class="text-sm font-medium text-gray-700 mt-6 mb-2">Xem trước khi chia sẻ (Facebook, Zalo)</h3>
            <div class="bg-[#f2f3f5] border border-gray-300 rounded-lg overflow-hidden max-w-[400px]">
                <div class="h-[210px] bg-gray-200 relative">
                    <!-- Ảnh share mô phỏng -->
                    <img src="<?= APP_URL ?>/public/images/logo_placeholder.png" class="w-full h-full object-cover">
                </div>
                <div class="p-3 bg-white">
                    <div class="text-[12px] text-gray-500 uppercase tracking-wide mb-1">CHUOINGOC.COM</div>
                    <div class="text-base font-bold text-gray-900 leading-tight mb-1 line-clamp-1" id="preview-social-title"><?= $storeConfig['meta_title'] ?></div>
                    <div class="text-sm text-gray-500 line-clamp-1" id="preview-social-desc"><?= $storeConfig['meta_description'] ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('inp-meta-title').addEventListener('input', function(e) {
        document.getElementById('preview-seo-title').textContent = e.target.value || 'Tiêu đề trang';
        document.getElementById('preview-social-title').textContent = e.target.value || 'Tiêu đề trang';
        document.getElementById('count-title').textContent = e.target.value.length;
    });
    
    document.getElementById('inp-meta-desc').addEventListener('input', function(e) {
        document.getElementById('preview-seo-desc').textContent = e.target.value || 'Mô tả trang web...';
        document.getElementById('preview-social-desc').textContent = e.target.value || 'Mô tả trang web...';
        document.getElementById('count-desc').textContent = e.target.value.length;
    });
</script>
