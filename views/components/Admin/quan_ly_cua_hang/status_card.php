<?php
// views/components/Admin/quan_ly_cua_hang/status_card.php
?>
<div class="bg-white rounded-[20px] p-5 md:p-6 border border-gray-200 shadow-sm mb-6 flex flex-col md:flex-row md:items-center gap-6">
    <!-- Progress Circle (Mock CSS) -->
    <div class="relative w-20 h-20 shrink-0">
        <svg class="w-20 h-20 transform -rotate-90">
            <circle cx="40" cy="40" r="36" stroke="currentColor" stroke-width="8" fill="transparent" class="text-gray-100" />
            <circle cx="40" cy="40" r="36" stroke="currentColor" stroke-width="8" fill="transparent" stroke-dasharray="226.2" stroke-dashoffset="33.93" class="text-[#6B0D18]" /> <!-- 85% -->
        </svg>
        <div class="absolute inset-0 flex items-center justify-center">
            <span class="text-xl font-bold text-[#6B0D18]">85%</span>
        </div>
    </div>
    
    <!-- Info -->
    <div class="flex-1">
        <h3 class="text-lg font-bold text-gray-900 mb-1">Hồ sơ cửa hàng</h3>
        <p class="text-sm text-gray-500 mb-4">Hoàn thiện hồ sơ giúp tăng độ tin cậy và tối ưu trải nghiệm khách hàng.</p>
        
        <!-- Checklist -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-y-3 gap-x-4 text-sm">
            <div class="flex items-center gap-2 text-gray-700">
                <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle"></span> Logo & Thương hiệu
            </div>
            <div class="flex items-center gap-2 text-gray-700">
                <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle"></span> Liên hệ chính
            </div>
            <div class="flex items-center gap-2 text-gray-700">
                <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle"></span> Thông tin SEO
            </div>
            <div class="flex items-center gap-2 text-amber-600 font-medium">
                <span class="iconify text-amber-500 text-lg" data-icon="mdi:alert-circle"></span> Địa chỉ & Bản đồ
            </div>
        </div>
    </div>
</div>
