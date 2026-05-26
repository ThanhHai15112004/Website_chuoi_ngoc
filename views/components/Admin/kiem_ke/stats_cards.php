<?php
// views/components/Admin/kiem_ke/stats_cards.php
?>
<div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-7 gap-4 mb-6">
    <!-- Tổng phiếu -->
    <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-gray-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10 flex flex-col h-full justify-between">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wider">Tổng phiếu</p>
                <span class="iconify text-gray-400 text-lg" data-icon="mdi:clipboard-text-outline"></span>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-900"><?= $stats['tat_ca'] ?? 0 ?></h3>
                <p class="text-[10px] text-gray-400 mt-1">phiếu kiểm kê</p>
            </div>
        </div>
    </div>

    <!-- Đang kiểm kê -->
    <div class="bg-white p-4 rounded-[18px] border border-blue-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-blue-50/50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10 flex flex-col h-full justify-between">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-blue-600 uppercase tracking-wider">Đang kiểm kê</p>
                <span class="iconify text-blue-400 text-lg" data-icon="mdi:progress-clock"></span>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-blue-700"><?= $stats['dang_kiem_ke'] ?? 0 ?></h3>
                <p class="text-[10px] text-blue-400 mt-1">phiếu đang đếm</p>
            </div>
        </div>
    </div>

    <!-- Chờ duyệt -->
    <div class="bg-white p-4 rounded-[18px] border border-amber-200 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-amber-50/50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10 flex flex-col h-full justify-between">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-amber-700 uppercase tracking-wider">Chờ duyệt</p>
                <span class="iconify text-amber-500 text-lg" data-icon="mdi:clipboard-check-outline"></span>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-amber-700"><?= $stats['cho_duyet'] ?? 0 ?></h3>
                <p class="text-[10px] text-amber-500 mt-1">chờ quản lý duyệt</p>
            </div>
        </div>
    </div>

    <!-- Hoàn tất -->
    <div class="bg-white p-4 rounded-[18px] border border-emerald-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-emerald-50/50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10 flex flex-col h-full justify-between">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-emerald-600 uppercase tracking-wider">Đã hoàn tất</p>
                <span class="iconify text-emerald-400 text-lg" data-icon="mdi:check-decagram-outline"></span>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-emerald-700"><?= $stats['da_hoan_tat'] ?? 0 ?></h3>
                <p class="text-[10px] text-emerald-500 mt-1">đã cân bằng kho</p>
            </div>
        </div>
    </div>

    <!-- Có chênh lệch -->
    <div class="bg-white p-4 rounded-[18px] border border-red-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-red-50/50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10 flex flex-col h-full justify-between">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-red-600 uppercase tracking-wider">Có chênh lệch</p>
                <span class="iconify text-red-400 text-lg" data-icon="mdi:alert-outline"></span>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-red-700"><?= $stats['co_chenh_lech'] ?? 0 ?></h3>
                <p class="text-[10px] text-red-500 mt-1">phiếu phát hiện lệch</p>
            </div>
        </div>
    </div>

    <!-- Sản phẩm lệch kho -->
    <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-gray-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10 flex flex-col h-full justify-between">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-gray-600 uppercase tracking-wider leading-tight">SP lệch kho</p>
                <span class="iconify text-gray-400 text-lg" data-icon="mdi:package-variant-closed"></span>
            </div>
            <div>
                <h3 class="text-2xl font-bold text-gray-900"><?= $stats['san_pham_lech'] ?? 0 ?></h3>
                <p class="text-[10px] text-gray-400 mt-1">sản phẩm khác HT</p>
            </div>
        </div>
    </div>

    <!-- Giá trị chênh lệch -->
    <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-gray-50 rounded-full group-hover:scale-150 transition-transform duration-500"></div>
        <div class="relative z-10 flex flex-col h-full justify-between">
            <div class="flex items-center justify-between mb-2">
                <p class="text-xs font-medium text-[#6B0D18] uppercase tracking-wider leading-tight">Giá trị lệch</p>
                <span class="iconify text-red-900/50 text-lg" data-icon="mdi:cash-multiple"></span>
            </div>
            <div>
                <h3 class="text-lg font-bold <?= ($stats['gia_tri_lech'] ?? 0) < 0 ? 'text-[#6B0D18]' : 'text-emerald-700' ?>">
                    <?= number_format($stats['gia_tri_lech'] ?? 0, 0, ',', '.') ?>đ
                </h3>
                <p class="text-[10px] text-gray-400 mt-1">tổng ước tính</p>
            </div>
        </div>
    </div>
</div>
