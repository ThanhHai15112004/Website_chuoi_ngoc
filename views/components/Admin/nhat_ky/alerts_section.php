<?php
// views/components/Admin/nhat_ky/alerts_section.php
?>
<div class="bg-amber-50 border border-amber-200 rounded-xl p-4 md:p-5 relative overflow-hidden">
    <!-- Icon mờ nền -->
    <span class="iconify absolute -right-6 -top-6 text-9xl text-amber-500/10" data-icon="mdi:shield-alert"></span>
    
    <div class="relative flex flex-col md:flex-row md:items-start gap-4">
        <!-- Icon -->
        <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center shrink-0">
            <span class="iconify text-amber-600 text-xl" data-icon="mdi:alert"></span>
        </div>
        
        <!-- Content -->
        <div class="flex-1">
            <h3 class="font-bold text-amber-900 mb-1 flex items-center gap-2">
                Cảnh báo hoạt động bất thường
                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-red-100 text-red-700">Mới</span>
            </h3>
            <p class="text-sm text-amber-800 mb-3">Hệ thống ghi nhận 2 hoạt động có rủi ro cao trong 24 giờ qua. Vui lòng kiểm tra và xác nhận.</p>
            
            <div class="space-y-2">
                <!-- Alert 1 -->
                <div class="bg-white/60 border border-amber-200/60 rounded-lg p-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <span class="iconify text-red-500 shrink-0" data-icon="mdi:login-variant"></span>
                        <p class="text-sm text-gray-800"><span class="font-bold">3 lần đăng nhập thất bại</span> từ cùng một IP <code class="bg-white px-1 py-0.5 rounded text-xs text-gray-600 border border-gray-200">103.22.11.5</code> trong 10 phút.</p>
                    </div>
                    <div class="flex gap-2 shrink-0">
                        <button class="text-xs font-medium text-amber-700 bg-amber-100 hover:bg-amber-200 px-3 py-1.5 rounded transition-colors">Xem chi tiết</button>
                        <button class="text-xs font-medium text-gray-600 bg-white hover:bg-gray-50 border border-gray-200 px-3 py-1.5 rounded transition-colors" onclick="this.parentElement.parentElement.remove()">Đã kiểm tra</button>
                    </div>
                </div>
                
                <!-- Alert 2 -->
                <div class="bg-white/60 border border-amber-200/60 rounded-lg p-3 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <span class="iconify text-orange-500 shrink-0" data-icon="mdi:account-convert"></span>
                        <p class="text-sm text-gray-800"><span class="font-bold">Hải Admin</span> đã đổi quyền nhân viên <span class="font-bold">Lan CSKH</span> sang quyền cao hơn.</p>
                    </div>
                    <div class="flex gap-2 shrink-0">
                        <button class="text-xs font-medium text-amber-700 bg-amber-100 hover:bg-amber-200 px-3 py-1.5 rounded transition-colors">Xem chi tiết</button>
                        <button class="text-xs font-medium text-gray-600 bg-white hover:bg-gray-50 border border-gray-200 px-3 py-1.5 rounded transition-colors" onclick="this.parentElement.parentElement.remove()">Đã kiểm tra</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
