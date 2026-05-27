<?php
// views/components/Admin/chinh_sach/form_settings.php
?>
<!-- 1. Trạng thái hiển thị -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5">
    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
        <span class="iconify text-gray-400" data-icon="mdi:toggle-switch-outline"></span> Trạng thái
    </h3>
    
    <div class="space-y-4">
        <label class="flex items-center justify-between cursor-pointer p-3 bg-gray-50 rounded-xl border border-gray-200">
            <div>
                <p class="font-bold text-gray-900 text-sm">Hiển thị ngoài website</p>
                <p class="text-xs text-gray-500 mt-0.5">Khách có thể xem chính sách này</p>
            </div>
            <div class="relative">
                <input type="checkbox" class="sr-only toggle-switch" checked>
                <div class="block bg-gray-300 w-12 h-7 rounded-full transition-colors toggle-bg"></div>
                <div class="dot absolute left-1 top-1 bg-white w-5 h-5 rounded-full transition-transform toggle-dot shadow-sm"></div>
            </div>
        </label>

        <div class="flex items-center gap-2 p-3 bg-blue-50 border border-blue-100 rounded-xl">
            <span class="iconify text-blue-500 text-xl shrink-0" data-icon="mdi:information-outline"></span>
            <p class="text-xs text-blue-800">Chính sách này đang được thiết lập là <span class="font-bold">Đang hiển thị</span>.</p>
        </div>
    </div>
</div>

<!-- 2. Vị trí hiển thị -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5">
    <h3 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
        <span class="iconify text-gray-400" data-icon="mdi:map-marker-path"></span> Vị trí hiển thị
    </h3>
    <p class="text-xs text-gray-500 mb-3">Chọn nơi chính sách này sẽ xuất hiện trên website.</p>
    
    <div class="space-y-3">
        <label class="flex items-start gap-3 cursor-pointer group">
            <div class="mt-0.5">
                <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" checked>
            </div>
            <div>
                <p class="font-medium text-gray-900 text-sm group-hover:text-[#6B0D18] transition-colors">Dưới chân trang (Footer)</p>
            </div>
        </label>
        
        <label class="flex items-start gap-3 cursor-pointer group">
            <div class="mt-0.5">
                <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
            </div>
            <div>
                <p class="font-medium text-gray-900 text-sm group-hover:text-[#6B0D18] transition-colors">Trang Thanh toán (Checkout)</p>
                <p class="text-[11px] text-gray-500 mt-0.5 italic">Khách phải tích đồng ý trước khi đặt hàng.</p>
            </div>
        </label>

        <label class="flex items-start gap-3 cursor-pointer group">
            <div class="mt-0.5">
                <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
            </div>
            <div>
                <p class="font-medium text-gray-900 text-sm group-hover:text-[#6B0D18] transition-colors">Chi tiết Sản phẩm</p>
                <p class="text-[11px] text-gray-500 mt-0.5 italic">Thường dùng cho Đổi trả, Bảo hành.</p>
            </div>
        </label>

        <label class="flex items-start gap-3 cursor-pointer group">
            <div class="mt-0.5">
                <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
            </div>
            <div>
                <p class="font-medium text-gray-900 text-sm group-hover:text-[#6B0D18] transition-colors">Form Đăng ký / Đăng nhập</p>
            </div>
        </label>
    </div>
</div>

<!-- 3. Tối ưu SEO -->
<div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-5">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-gray-400" data-icon="mdi:google"></span> Tối ưu SEO
        </h3>
        <span class="px-2 py-0.5 bg-emerald-100 text-emerald-700 text-[10px] font-bold rounded">Tốt</span>
    </div>
    
    <div class="space-y-4">
        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Meta Title</label>
            <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="Nhập tiêu đề SEO...">
            <p class="text-[10px] text-gray-400 mt-1 text-right">0/60 ký tự</p>
        </div>
        
        <div>
            <label class="block text-xs font-bold text-gray-700 mb-1">Meta Description</label>
            <textarea rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-1 focus:ring-[#6B0D18]" placeholder="Nhập mô tả SEO..."></textarea>
            <p class="text-[10px] text-gray-400 mt-1 text-right">0/160 ký tự</p>
        </div>
    </div>
</div>

<style>
    /* Custom Toggle Switch styling overrides if needed, already globally handled in some files but redefining here to be safe */
    .toggle-switch:checked + .toggle-bg { background-color: #10B981; } /* Emerald */
    .toggle-switch:checked ~ .toggle-dot { transform: translateX(100%); }
</style>
