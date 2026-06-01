<?php 
// Khởi tạo các biến nếu là edit
$tags = [];
$sp_lien_quan = [];
$hinh_anh = '';
$trang_thai = 1;
$is_seo_good = false;

if ($is_edit && $bai_viet) {
    $tags = json_decode($bai_viet['tags'] ?? '[]', true) ?: [];
    $sp_lien_quan = $san_pham_lien_quan_list ?? [];
    $hinh_anh = $bai_viet['hinh_anh'] ?? '';
    $trang_thai = (int)$bai_viet['trang_thai'];
    $is_seo_good = (!empty($bai_viet['seo_title']) && !empty($bai_viet['seo_description']) && !empty($hinh_anh));
}
?>
<input type="hidden" id="postId" value="<?= $is_edit ? $bai_viet['id'] : '' ?>">
<div class="flex-1 space-y-6">
    <!-- Thông tin cơ bản -->
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-5">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tiêu đề bài viết <span class="text-red-500">*</span></label>
            <input type="text" id="tieu_de" placeholder="Ví dụ: Cách chọn vòng phong thủy theo mệnh chuẩn và dễ hiểu" 
                   class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-colors text-lg font-bold text-gray-800" 
                   value="<?= $is_edit ? htmlspecialchars($bai_viet['tieu_de']) : '' ?>" onkeyup="generateSlug()">
        </div>

        <div>
            <div class="flex items-center justify-between mb-1">
                <label class="block text-sm font-medium text-gray-700">Slug đường dẫn</label>
            </div>
            <div class="flex items-center">
                <span class="px-3 py-2 bg-gray-50 border border-gray-300 border-r-0 rounded-l-lg text-sm text-gray-500">/bai-viet/</span>
                <input type="text" id="slug" class="flex-1 px-3 py-2 border border-gray-300 rounded-r-lg text-sm focus:outline-none focus:border-[#6B0D18]" 
                       value="<?= $is_edit ? htmlspecialchars($bai_viet['slug']) : '' ?>">
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between mb-1">
                <label class="block text-sm font-medium text-gray-700">Mô tả ngắn (Tóm tắt)</label>
            </div>
            <textarea id="tom_tat" rows="3" placeholder="Nhập đoạn tóm tắt ngắn hiển thị ở trang danh sách bài viết..." 
                      class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] transition-colors resize-none"><?= $is_edit ? htmlspecialchars($bai_viet['tom_tat']) : '' ?></textarea>
        </div>
    </div>

    <!-- Trình soạn thảo -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex flex-col h-[600px]">
        <!-- Toolbar (Trực quan cho Quill hoặc Summernote) -->
        <div id="editor-toolbar" class="border-b border-gray-200 bg-gray-50"></div>
        
        <!-- Editor Area -->
        <div id="editor-container" class="flex-1 p-0 overflow-y-auto bg-white" style="height: 100%;">
            <?= $is_edit ? $bai_viet['noi_dung'] : '' ?>
        </div>
    </div>
</div>

<!-- CỘT PHẢI (Cài đặt) -->
<div class="w-full lg:w-[320px] xl:w-[360px] space-y-6">
    
    <!-- Trạng thái & Lịch đăng -->
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
        <h3 class="font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100">Xuất bản</h3>
        
        <div class="space-y-3 mb-4">
            <label class="flex items-center gap-2 cursor-pointer group">
                <input type="radio" name="publish_type" value="1" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]" <?= $trang_thai == 1 || !$is_edit ? 'checked' : '' ?> onchange="toggleSchedule(false)">
                <span class="text-sm text-gray-700 group-hover:text-[#6B0D18] transition-colors">Đăng ngay</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer group">
                <input type="radio" name="publish_type" value="0" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]" <?= $trang_thai == 0 && $is_edit ? 'checked' : '' ?> onchange="toggleSchedule(false)">
                <span class="text-sm text-gray-700 group-hover:text-[#6B0D18] transition-colors">Lưu bản nháp</span>
            </label>
            <!-- (Mock tính năng Lên lịch hẹn) -->
        </div>
        
    </div>

    <!-- Ảnh đại diện -->
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
        <h3 class="font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100">Ảnh đại diện <span class="text-red-500">*</span></h3>
        <input type="hidden" id="hinh_anh" value="<?= htmlspecialchars($hinh_anh) ?>">
        <div id="imagePreview" class="relative group rounded-lg overflow-hidden border border-gray-200 aspect-video mb-3 <?= empty($hinh_anh) ? 'hidden' : '' ?>">
            <img id="previewImg" src="<?= htmlspecialchars($hinh_anh) ?>" alt="Thumbnail" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center gap-2">
                <button type="button" onclick="document.getElementById('imageUploadInput').click()" class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-gray-700 hover:text-[#6B0D18] hover:scale-110 transition-all"><span class="iconify" data-icon="mdi:pencil"></span></button>
                <button type="button" onclick="removeImage()" class="w-8 h-8 bg-white rounded-full flex items-center justify-center text-gray-700 hover:text-red-600 hover:scale-110 transition-all"><span class="iconify" data-icon="mdi:trash-can-outline"></span></button>
            </div>
        </div>
        
        <div id="imageUploadBtn" onclick="document.getElementById('imageUploadInput').click()" class="border-2 border-dashed border-gray-300 rounded-lg aspect-video flex flex-col items-center justify-center text-gray-400 hover:text-[#6B0D18] hover:border-[#6B0D18] hover:bg-red-50/30 transition-all cursor-pointer mb-3 <?= !empty($hinh_anh) ? 'hidden' : '' ?>">
            <span class="iconify text-3xl mb-1" data-icon="mdi:cloud-upload-outline"></span>
            <span class="text-sm font-medium" id="uploadText">Tải ảnh lên</span>
        </div>
        <input type="file" id="imageUploadInput" accept="image/*" class="hidden" onchange="uploadImage(this)">
    </div>

    <!-- Danh mục & Tag -->
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
        <h3 class="font-bold text-gray-800 mb-4 pb-2 border-b border-gray-100">Phân loại</h3>
        
        <div class="mb-5">
            <div class="flex items-center justify-between mb-1.5">
                <label class="block text-sm font-medium text-gray-700">Danh mục</label>
            </div>
            <select id="id_danh_muc" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                <option value="">Chọn danh mục</option>
                <?php foreach ($danh_mucs as $dm): ?>
                    <option value="<?= $dm['id'] ?>" <?= ($is_edit && $bai_viet['id_danh_muc'] == $dm['id']) ? 'selected' : '' ?>><?= $dm['ten_danh_muc'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1.5">Tags</label>
            <div class="border border-gray-300 rounded-lg p-2 focus-within:border-[#6B0D18] transition-colors flex flex-wrap gap-1 items-center bg-white" id="tagsContainer">
                <input type="text" id="tagInput" placeholder="Nhập tag và nhấn Enter..." class="flex-1 min-w-[120px] bg-transparent text-sm focus:outline-none px-1 py-0.5" onkeydown="handleTagInput(event)">
            </div>
        </div>
    </div>

    <!-- Gắn sản phẩm -->
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-100">
            <h3 class="font-bold text-gray-800">Sản phẩm liên quan</h3>
            <span id="relatedCount" class="bg-gray-100 text-gray-600 text-xs px-2 py-0.5 rounded-full font-bold">0</span>
        </div>
        
        <div class="relative mb-3">
            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" data-icon="mdi:magnify"></span>
            <input type="text" id="searchProductInput" placeholder="Tìm sản phẩm để gắn..." class="w-full pl-9 pr-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
            <div id="productSearchResults" class="absolute z-10 w-full bg-white border border-gray-200 rounded-lg shadow-lg mt-1 hidden max-h-60 overflow-y-auto"></div>
        </div>

        <!-- Danh sách đã chọn -->
        <div id="relatedProductsList" class="space-y-2">
            <!-- Render via JS -->
        </div>
    </div>

    <!-- SEO -->
    <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-4 pb-2 border-b border-gray-100">
            <h3 class="font-bold text-gray-800">Tối ưu SEO</h3>
            <?php if ($is_seo_good): ?>
                <span class="inline-flex px-1.5 py-0.5 rounded border border-emerald-200 text-[10px] font-medium bg-emerald-50 text-emerald-600 flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:check-circle"></span> Tốt
                </span>
            <?php elseif ($is_edit): ?>
                <span class="inline-flex px-1.5 py-0.5 rounded border border-red-200 text-[10px] font-medium bg-red-50 text-red-600 flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:alert-circle-outline"></span> Thiếu
                </span>
            <?php endif; ?>
        </div>
        
        <div class="space-y-4">
            <div>
                <label class="block text-xs font-medium text-gray-700 mb-1">Thẻ Meta Title</label>
                <input type="text" id="seo_title" placeholder="Nhập tiêu đề SEO..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]" value="<?= $is_edit ? htmlspecialchars($bai_viet['seo_title']) : '' ?>">
            </div>
            <div>
                <div class="flex items-center justify-between mb-1">
                    <label class="block text-xs font-medium text-gray-700">Meta Description</label>
                </div>
                <textarea id="seo_description" rows="3" placeholder="Nhập mô tả SEO (150-160 ký tự)..." class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"><?= $is_edit ? htmlspecialchars($bai_viet['seo_description']) : '' ?></textarea>
            </div>
        </div>
    </div>
</div>

<!-- Truyền dữ liệu vào JS -->
<script>
    const INITIAL_TAGS = <?= json_encode($tags) ?>;
    const INITIAL_RELATED_PRODUCTS = <?= json_encode($sp_lien_quan) ?>;
</script>
