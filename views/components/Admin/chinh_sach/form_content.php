<?php
// views/components/Admin/chinh_sach/form_content.php
?>
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 space-y-6">
    
    <!-- Tiêu đề & Loại -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-2 space-y-1">
            <label class="block text-sm font-medium text-gray-700">Tên chính sách <span class="text-red-500">*</span></label>
            <input type="text" id="policyName" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:bg-white transition-colors" placeholder="Ví dụ: Chính sách đổi trả" onkeyup="updateSlug()">
        </div>
        <div class="space-y-1">
            <label class="block text-sm font-medium text-gray-700">Loại chính sách <span class="text-red-500">*</span></label>
            <select class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:bg-white transition-colors">
                <option value="">Chọn loại...</option>
                <option value="1">Đổi trả</option>
                <option value="2">Bảo hành</option>
                <option value="3">Vận chuyển</option>
                <option value="4">Thanh toán</option>
                <option value="5">Bảo mật</option>
                <option value="6">Điều khoản sử dụng</option>
                <option value="7">Hướng dẫn mua hàng</option>
            </select>
        </div>
    </div>

    <!-- Slug -->
    <div class="space-y-1">
        <label class="block text-sm font-medium text-gray-700">Đường dẫn (Slug)</label>
        <div class="flex items-center">
            <span class="px-4 py-2.5 bg-gray-100 border border-r-0 border-gray-300 rounded-l-xl text-gray-500 text-sm">/chinh-sach/</span>
            <input type="text" id="policySlug" class="flex-1 px-4 py-2.5 border border-gray-300 rounded-r-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] text-gray-900 text-sm" placeholder="chinh-sach-doi-tra">
        </div>
    </div>

    <!-- Mô tả ngắn -->
    <div class="space-y-1">
        <label class="block text-sm font-medium text-gray-700">Mô tả ngắn</label>
        <textarea rows="2" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-xl focus:outline-none focus:ring-1 focus:ring-[#6B0D18] focus:bg-white transition-colors text-sm" placeholder="Nhập mô tả ngắn hiển thị ở danh sách hoặc thẻ SEO meta..."></textarea>
    </div>

    <!-- Editor (Mô phỏng) -->
    <div class="space-y-1">
        <label class="block text-sm font-medium text-gray-700 mb-2">Nội dung chính sách <span class="text-red-500">*</span></label>
        
        <!-- Toolbar giả lập -->
        <div class="border border-gray-300 rounded-t-xl bg-gray-50 p-2 flex flex-wrap items-center gap-1">
            <div class="flex items-center border-r border-gray-300 pr-2 mr-1">
                <select class="bg-transparent text-sm text-gray-700 font-medium focus:outline-none cursor-pointer">
                    <option>Đoạn văn</option>
                    <option>Tiêu đề 2 (H2)</option>
                    <option>Tiêu đề 3 (H3)</option>
                </select>
            </div>
            <button class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center text-gray-700"><span class="iconify" data-icon="mdi:format-bold"></span></button>
            <button class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center text-gray-700"><span class="iconify" data-icon="mdi:format-italic"></span></button>
            <button class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center text-gray-700"><span class="iconify" data-icon="mdi:format-underline"></span></button>
            
            <div class="w-px h-6 bg-gray-300 mx-1"></div>
            
            <button class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center text-gray-700"><span class="iconify" data-icon="mdi:format-list-bulleted"></span></button>
            <button class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center text-gray-700"><span class="iconify" data-icon="mdi:format-list-numbered"></span></button>
            
            <div class="w-px h-6 bg-gray-300 mx-1"></div>
            
            <button class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center text-gray-700"><span class="iconify" data-icon="mdi:link-variant"></span></button>
            <button class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center text-gray-700"><span class="iconify" data-icon="mdi:image-outline"></span></button>
            <button class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center text-gray-700"><span class="iconify" data-icon="mdi:table"></span></button>
            
            <div class="flex-1"></div>
            <button class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center text-gray-500"><span class="iconify" data-icon="mdi:undo"></span></button>
            <button class="w-8 h-8 rounded hover:bg-gray-200 flex items-center justify-center text-gray-500"><span class="iconify" data-icon="mdi:redo"></span></button>
        </div>
        
        <!-- Vùng soạn thảo -->
        <textarea id="policyEditor" class="w-full h-[500px] border border-t-0 border-gray-300 rounded-b-xl p-4 focus:outline-none focus:ring-1 focus:ring-[#6B0D18] resize-y text-gray-800 leading-relaxed"></textarea>
    </div>

</div>

<script>
    function updateSlug() {
        const name = document.getElementById('policyName').value;
        const slugInput = document.getElementById('policySlug');
        // Simple slugify
        let slug = name.toLowerCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");
        slug = slug.replace(/đ/g, 'd');
        slug = slug.replace(/[^a-z0-9 ]/g, '');
        slug = slug.replace(/\s+/g, '-');
        slugInput.value = slug;
    }
</script>
