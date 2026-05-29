<?php
// views/components/Admin/xuat_kho/stats_cards.php
?>
<div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-4 gap-4">
    <!-- Tổng phiếu xuất -->
    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-gray-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10 flex flex-col h-full">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-8 h-8 rounded-lg bg-gray-100 text-gray-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-lg" data-icon="mdi:file-document-multiple-outline"></span>
                </div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide line-clamp-1">Tổng phiếu</h3>
            </div>
            <div class="mt-auto">
                <span class="text-2xl font-bold text-gray-900"><?= number_format($stats['tat_ca'] ?? 0, 0, ',', '.') ?></span>
            </div>
        </div>
    </div>

    <!-- Chờ duyệt -->
    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group cursor-pointer" onclick="filterByStatus('1')">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-yellow-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10 flex flex-col h-full">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-8 h-8 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-lg" data-icon="mdi:clock-outline"></span>
                </div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide line-clamp-1">Chờ duyệt</h3>
            </div>
            <div class="mt-auto">
                <span class="text-2xl font-bold text-gray-900"><?= number_format($stats['cho_duyet'] ?? 0, 0, ',', '.') ?></span>
            </div>
        </div>
    </div>

    <!-- Đang xuất kho -->
    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group cursor-pointer" onclick="filterByStatus('2')">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10 flex flex-col h-full">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-lg" data-icon="mdi:package-variant"></span>
                </div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide line-clamp-1">Đang xuất</h3>
            </div>
            <div class="mt-auto">
                <span class="text-2xl font-bold text-gray-900"><?= number_format($stats['dang_xuat'] ?? 0, 0, ',', '.') ?></span>
            </div>
        </div>
    </div>

    <!-- Đã xuất kho -->
    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group cursor-pointer" onclick="filterByStatus('3')">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10 flex flex-col h-full">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-lg" data-icon="mdi:check-circle-outline"></span>
                </div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide line-clamp-1">Hoàn thành</h3>
            </div>
            <div class="mt-auto">
                <span class="text-2xl font-bold text-gray-900"><?= number_format($stats['hoan_thanh'] ?? 0, 0, ',', '.') ?></span>
            </div>
        </div>
    </div>

</div>
