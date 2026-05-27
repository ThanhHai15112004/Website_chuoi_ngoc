<?php
// views/components/Admin/xuat_kho/stats_cards.php
?>
<div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-8 gap-4">
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
                <span class="text-2xl font-bold text-gray-900"><?= number_format($stats['tong'], 0, ',', '.') ?></span>
            </div>
        </div>
    </div>

    <!-- Chờ duyệt -->
    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group cursor-pointer" onclick="filterByStatus('Chờ duyệt')">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-yellow-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10 flex flex-col h-full">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-8 h-8 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-lg" data-icon="mdi:clock-outline"></span>
                </div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide line-clamp-1">Chờ duyệt</h3>
            </div>
            <div class="mt-auto">
                <span class="text-2xl font-bold text-gray-900"><?= number_format($stats['cho_duyet'], 0, ',', '.') ?></span>
            </div>
        </div>
    </div>

    <!-- Chờ xuất kho -->
    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group cursor-pointer" onclick="filterByStatus('Chờ xuất kho')">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-blue-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10 flex flex-col h-full">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-lg" data-icon="mdi:package-variant"></span>
                </div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide line-clamp-1">Chờ xuất</h3>
            </div>
            <div class="mt-auto">
                <span class="text-2xl font-bold text-gray-900"><?= number_format($stats['cho_xuat'], 0, ',', '.') ?></span>
            </div>
        </div>
    </div>

    <!-- Đã xuất kho -->
    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group cursor-pointer" onclick="filterByStatus('Đã xuất kho')">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-emerald-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10 flex flex-col h-full">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-8 h-8 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-lg" data-icon="mdi:check-circle-outline"></span>
                </div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide line-clamp-1">Đã xuất</h3>
            </div>
            <div class="mt-auto">
                <span class="text-2xl font-bold text-gray-900"><?= number_format($stats['da_xuat'], 0, ',', '.') ?></span>
            </div>
        </div>
    </div>

    <!-- Có lỗi / thiếu hàng -->
    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group cursor-pointer" onclick="filterByStatus('Có lỗi')">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-red-50 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10 flex flex-col h-full">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-8 h-8 rounded-lg bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-lg" data-icon="mdi:alert-circle-outline"></span>
                </div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide line-clamp-1">Thiếu hàng</h3>
            </div>
            <div class="mt-auto">
                <span class="text-2xl font-bold text-red-600"><?= number_format($stats['loi'], 0, ',', '.') ?></span>
            </div>
        </div>
    </div>

    <!-- Đã hủy -->
    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group cursor-pointer" onclick="filterByStatus('Đã hủy')">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-gray-100 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10 flex flex-col h-full">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-8 h-8 rounded-lg bg-gray-200 text-gray-600 flex items-center justify-center shrink-0">
                    <span class="iconify text-lg" data-icon="mdi:close-circle-outline"></span>
                </div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide line-clamp-1">Đã hủy</h3>
            </div>
            <div class="mt-auto">
                <span class="text-2xl font-bold text-gray-600"><?= number_format($stats['da_huy'], 0, ',', '.') ?></span>
            </div>
        </div>
    </div>

    <!-- Tổng số lượng xuất -->
    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group col-span-2 md:col-span-1">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-[#6B0D18]/5 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10 flex flex-col h-full">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-8 h-8 rounded-lg bg-[#6B0D18]/10 text-[#6B0D18] flex items-center justify-center shrink-0">
                    <span class="iconify text-lg" data-icon="mdi:layers-triple-outline"></span>
                </div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide line-clamp-1">SL xuất</h3>
            </div>
            <div class="mt-auto">
                <span class="text-2xl font-bold text-[#6B0D18]"><?= number_format($stats['so_luong'], 0, ',', '.') ?></span>
                <span class="text-xs font-medium text-gray-400 ml-1">món</span>
            </div>
        </div>
    </div>

    <!-- Giá trị hàng xuất -->
    <div class="bg-white p-4 rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group col-span-2 md:col-span-1">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-[#6B0D18]/5 rounded-full group-hover:scale-150 transition-transform duration-500 ease-out"></div>
        <div class="relative z-10 flex flex-col h-full">
            <div class="flex items-center gap-2 mb-2">
                <div class="w-8 h-8 rounded-lg bg-[#6B0D18]/10 text-[#6B0D18] flex items-center justify-center shrink-0">
                    <span class="iconify text-lg" data-icon="mdi:cash-multiple"></span>
                </div>
                <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wide line-clamp-1">Giá trị xuất</h3>
            </div>
            <div class="mt-auto">
                <span class="text-xl font-bold text-[#6B0D18] whitespace-nowrap"><?= number_format($stats['gia_tri']/1000000, 0, ',', '.') ?>TR</span>
            </div>
        </div>
    </div>
</div>
