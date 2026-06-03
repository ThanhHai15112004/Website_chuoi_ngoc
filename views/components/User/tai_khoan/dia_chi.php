<?php
$diaChi = $user['dia_chi'] ?? '';
?>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-10">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-8 pb-6 border-b border-gray-100">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-1">Sổ địa chỉ</h2>
            <p class="text-gray-500 text-sm">Quản lý thông tin giao hàng để thanh toán nhanh chóng hơn.</p>
        </div>
    </div>

    <div class="space-y-5">
        <?php if (!empty($diaChi)): ?>
        <!-- Default Address -->
        <div class="group border-2 border-red-100 bg-gradient-to-br from-red-50/50 to-white rounded-2xl p-6 relative transition-all hover:shadow-md hover:border-[#8b0000]/30 overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-red-100/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-3">
                    <h3 class="text-xl font-bold text-gray-900"><?= htmlspecialchars($user['ho_ten'] ?? '') ?></h3>
                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                    <span class="text-gray-600 font-medium"><?= !empty($user['so_dien_thoai']) ? format_phone_number($user['so_dien_thoai']) : '' ?></span>
                    <span class="ml-2 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-[#8b0000] text-white shadow-sm">
                        <iconify-icon icon="ph:check-circle-fill"></iconify-icon>
                        Mặc định
                    </span>
                </div>
                
                <div class="flex items-start gap-3 text-gray-600">
                    <iconify-icon icon="ph:map-pin-line-duotone" class="text-xl text-[#8b0000] mt-0.5 flex-shrink-0"></iconify-icon>
                    <div class="space-y-1 leading-relaxed">
                        <p><?= htmlspecialchars($diaChi) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-16">
            <iconify-icon icon="ph:map-pin" class="text-5xl text-gray-300 mb-3"></iconify-icon>
            <h3 class="text-lg font-bold text-gray-900 mb-2">Chưa có địa chỉ</h3>
            <p class="text-gray-500 mb-6">Cập nhật địa chỉ trong phần Hồ sơ cá nhân để giao hàng nhanh hơn.</p>
            <button onclick="document.querySelector('[data-target=\'tab-ho-so\']').click()" class="px-6 py-2.5 bg-[#8b0000] text-white rounded-xl font-medium hover:bg-[#700000] transition-colors text-sm">
                Cập nhật hồ sơ
            </button>
        </div>
        <?php endif; ?>
    </div>
</div>
