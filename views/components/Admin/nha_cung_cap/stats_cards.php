<?php
// views/components/Admin/nha_cung_cap/stats_cards.php
?>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 xl:grid-cols-7">
    <!-- Card 1: Tổng nhà cung cấp -->
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.1)] hover:shadow-[0_8px_20px_-6px_rgba(6,81,237,0.15)] transition-all duration-300 xl:col-span-1">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Tổng NCC</p>
                <h3 class="text-2xl font-bold text-gray-900"><?= number_format($stats['tong']) ?></h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-600 border border-gray-100">
                <span class="iconify text-xl" data-icon="mdi:domain"></span>
            </div>
        </div>
        <div class="mt-3 text-xs text-gray-500">Đối tác cung cấp</div>
    </div>

    <!-- Card 2: Đang hợp tác -->
    <div class="bg-white rounded-2xl p-5 border border-emerald-100 shadow-[0_2px_10px_-3px_rgba(16,185,129,0.1)] hover:shadow-[0_8px_20px_-6px_rgba(16,185,129,0.15)] transition-all duration-300 xl:col-span-1 relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-emerald-50 rounded-full transition-transform group-hover:scale-150 duration-500"></div>
        <div class="flex items-start justify-between relative">
            <div>
                <p class="text-xs font-semibold text-emerald-600 uppercase tracking-wider mb-1">Đang hợp tác</p>
                <h3 class="text-2xl font-bold text-emerald-700"><?= number_format($stats['dang_hop_tac']) ?></h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">
                <span class="iconify text-xl" data-icon="mdi:handshake"></span>
            </div>
        </div>
        <div class="mt-3 text-xs text-emerald-600 relative">Đối tác hoạt động</div>
    </div>

    <!-- Card 3: Tạm ngừng -->
    <div class="bg-white rounded-2xl p-5 border border-amber-100 shadow-[0_2px_10px_-3px_rgba(245,158,11,0.1)] hover:shadow-[0_8px_20px_-6px_rgba(245,158,11,0.15)] transition-all duration-300 xl:col-span-1 relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-amber-50 rounded-full transition-transform group-hover:scale-150 duration-500"></div>
        <div class="flex items-start justify-between relative">
            <div>
                <p class="text-xs font-semibold text-amber-600 uppercase tracking-wider mb-1">Tạm ngừng</p>
                <h3 class="text-2xl font-bold text-amber-700"><?= number_format($stats['tam_ngung']) ?></h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-amber-100 flex items-center justify-center text-amber-600">
                <span class="iconify text-xl" data-icon="mdi:pause-circle"></span>
            </div>
        </div>
        <div class="mt-3 text-xs text-amber-600 relative">Cần theo dõi</div>
    </div>

    <!-- Card 4: Ngừng hợp tác -->
    <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-[0_2px_10px_-3px_rgba(0,0,0,0.05)] hover:shadow-[0_8px_20px_-6px_rgba(0,0,0,0.1)] transition-all duration-300 xl:col-span-1">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Ngừng hợp tác</p>
                <h3 class="text-2xl font-bold text-gray-700"><?= number_format($stats['ngung_hop_tac']) ?></h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-500">
                <span class="iconify text-xl" data-icon="mdi:cancel"></span>
            </div>
        </div>
        <div class="mt-3 text-xs text-gray-400">Lịch sử cũ</div>
    </div>

    <!-- Card 5: Tổng giá trị nhập -->
    <div class="bg-white rounded-2xl p-5 border border-red-100 shadow-[0_2px_10px_-3px_rgba(107,13,24,0.1)] hover:shadow-[0_8px_20px_-6px_rgba(107,13,24,0.15)] transition-all duration-300 md:col-span-2 xl:col-span-1 relative overflow-hidden group">
        <div class="absolute -right-6 -bottom-6 w-24 h-24 bg-red-50 rounded-full transition-transform group-hover:scale-150 duration-500"></div>
        <div class="flex items-start justify-between relative">
            <div>
                <p class="text-xs font-semibold text-red-700 uppercase tracking-wider mb-1">Tổng giá trị nhập</p>
                <h3 class="text-2xl font-bold text-[#6B0D18]"><?= format_currency_short($stats['tong_gia_tri'] ?? 0) ?></h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-red-100 flex items-center justify-center text-[#6B0D18]">
                <span class="iconify text-xl" data-icon="mdi:cash-multiple"></span>
            </div>
        </div>
        <div class="mt-3 text-xs text-[#6B0D18]/70 relative font-medium">Chi phí nhập hàng</div>
    </div>

    <!-- Card 6: Có công nợ -->
    <div class="bg-white rounded-2xl p-5 border border-rose-100 shadow-[0_2px_10px_-3px_rgba(225,29,72,0.1)] hover:shadow-[0_8px_20px_-6px_rgba(225,29,72,0.15)] transition-all duration-300 xl:col-span-1">
        <div class="flex items-start justify-between">
            <div>
                <p class="text-xs font-semibold text-rose-600 uppercase tracking-wider mb-1">Có công nợ</p>
                <h3 class="text-2xl font-bold text-rose-700"><?= number_format($stats['co_cong_no']) ?></h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-rose-50 flex items-center justify-center text-rose-600 border border-rose-100">
                <span class="iconify text-xl" data-icon="mdi:credit-card-outline"></span>
            </div>
        </div>
        <div class="mt-3 text-xs text-rose-600">Cần thanh toán</div>
    </div>

    <!-- Card 7: Đánh giá tốt -->
    <div class="bg-white rounded-2xl p-5 border border-yellow-100 shadow-[0_2px_10px_-3px_rgba(234,179,8,0.1)] hover:shadow-[0_8px_20px_-6px_rgba(234,179,8,0.15)] transition-all duration-300 xl:col-span-1 relative overflow-hidden group">
        <div class="absolute -right-4 -top-4 w-16 h-16 bg-yellow-50 rounded-full transition-transform group-hover:scale-150 duration-500"></div>
        <div class="flex items-start justify-between relative">
            <div>
                <p class="text-xs font-semibold text-yellow-600 uppercase tracking-wider mb-1">Đánh giá cao</p>
                <h3 class="text-2xl font-bold text-yellow-600"><?= number_format($stats['danh_gia_tot']) ?></h3>
            </div>
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-yellow-100 to-yellow-200 flex items-center justify-center text-yellow-600">
                <span class="iconify text-xl" data-icon="mdi:star"></span>
            </div>
        </div>
        <div class="mt-3 text-xs text-yellow-600 relative">≥ 4 sao</div>
    </div>
</div>
