<?php
// views/components/Admin/dashboard/quick_stats.php
?>
<!-- Quick Stats Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <!-- Stat Card 1 -->
    <div class="bg-white rounded-xl border border-gray-100 p-5 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-red-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
        <div class="flex justify-between items-start relative z-10">
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Doanh thu hôm nay</p>
                <h3 class="text-2xl font-bold text-gray-800 font-luxury"><?= number_format($thong_ke_nhanh['doanh_thu_hom_nay'], 0, ',', '.') ?>đ</h3>
            </div>
            <div class="w-10 h-10 rounded-lg bg-red-100 text-red-900 flex items-center justify-center">
                <span class="iconify text-xl" data-icon="mdi:currency-vnd"></span>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2 text-sm relative z-10">
            <span class="flex items-center gap-1 text-green-600 font-medium bg-green-50 px-2 py-0.5 rounded">
                <span class="iconify text-sm" data-icon="mdi:trending-up"></span>
                +<?= $thong_ke_nhanh['tang_truong_doanh_thu'] ?>%
            </span>
            <span class="text-gray-400 text-xs">So với hôm qua</span>
        </div>
    </div>

    <!-- Stat Card 2 -->
    <div class="bg-white rounded-xl border border-gray-100 p-5 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-[#E4D5C3]/30 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
        <div class="flex justify-between items-start relative z-10">
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Đơn hàng mới</p>
                <h3 class="text-2xl font-bold text-gray-800 font-luxury"><?= $thong_ke_nhanh['don_hang_moi'] ?></h3>
            </div>
            <div class="w-10 h-10 rounded-lg bg-[#E4D5C3]/50 text-[#9A7B56] flex items-center justify-center">
                <span class="iconify text-xl" data-icon="mdi:shopping-outline"></span>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2 text-sm relative z-10">
            <span class="flex items-center gap-1 text-red-600 font-medium bg-red-50 px-2 py-0.5 rounded">
                <?= $thong_ke_nhanh['don_cho_xac_nhan'] ?> đơn chờ
            </span>
            <span class="text-gray-400 text-xs">Cần xử lý</span>
        </div>
    </div>

    <!-- Stat Card 3 -->
    <div class="bg-white rounded-xl border border-gray-100 p-5 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-blue-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
        <div class="flex justify-between items-start relative z-10">
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Khách hàng mới</p>
                <h3 class="text-2xl font-bold text-gray-800 font-luxury"><?= $thong_ke_nhanh['khach_hang_moi'] ?></h3>
            </div>
            <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-700 flex items-center justify-center">
                <span class="iconify text-xl" data-icon="mdi:account-multiple-outline"></span>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2 text-sm relative z-10">
            <span class="flex items-center gap-1 text-green-600 font-medium bg-green-50 px-2 py-0.5 rounded">
                <span class="iconify text-sm" data-icon="mdi:trending-up"></span>
                +<?= $thong_ke_nhanh['tang_truong_khach'] ?>%
            </span>
            <span class="text-gray-400 text-xs">Tuần này</span>
        </div>
    </div>

    <!-- Stat Card 4 -->
    <div class="bg-white rounded-xl border border-gray-100 p-5 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-24 h-24 bg-orange-50 rounded-full opacity-50 group-hover:scale-110 transition-transform"></div>
        <div class="flex justify-between items-start relative z-10">
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Cảnh báo tồn kho</p>
                <h3 class="text-2xl font-bold text-gray-800 font-luxury"><?= $thong_ke_nhanh['sap_het_hang'] ?></h3>
            </div>
            <div class="w-10 h-10 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center">
                <span class="iconify text-xl" data-icon="mdi:alert-circle-outline"></span>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-2 text-sm relative z-10">
            <span class="text-gray-400 text-xs">Sản phẩm sắp hết hàng</span>
        </div>
    </div>
</div>
