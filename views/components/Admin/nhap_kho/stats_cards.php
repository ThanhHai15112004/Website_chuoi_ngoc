<?php
// views/components/Admin/nhap_kho/stats_cards.php
?>
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-4 mb-6">
    <!-- Tổng phiếu nhập -->
    <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm flex flex-col justify-between">
        <div class="flex items-center gap-2 mb-2">
            <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-500 shrink-0">
                <span class="iconify text-lg" data-icon="mdi:tray-arrow-down"></span>
            </div>
            <p class="text-[11px] font-medium text-gray-500 uppercase tracking-wide">Tổng phiếu nhập</p>
        </div>
        <div>
            <h3 class="text-2xl font-bold text-gray-900">186</h3>
            <p class="text-xs text-gray-500 mt-1">phiếu</p>
        </div>
    </div>

    <!-- Chờ kiểm hàng -->
    <div class="bg-white rounded-xl p-4 border border-yellow-200 shadow-sm flex flex-col justify-between relative overflow-hidden">
        <div class="absolute right-0 top-0 w-12 h-12 bg-yellow-50 rounded-bl-full -z-10"></div>
        <div class="flex items-center gap-2 mb-2">
            <div class="w-8 h-8 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 shrink-0">
                <span class="iconify text-lg" data-icon="mdi:clipboard-text-clock-outline"></span>
            </div>
            <p class="text-[11px] font-medium text-yellow-700 uppercase tracking-wide">Chờ kiểm hàng</p>
        </div>
        <div>
            <h3 class="text-2xl font-bold text-yellow-600">12</h3>
            <p class="text-xs text-gray-500 mt-1">phiếu</p>
        </div>
    </div>

    <!-- Đang kiểm hàng -->
    <div class="bg-white rounded-xl p-4 border border-blue-200 shadow-sm flex flex-col justify-between relative overflow-hidden">
        <div class="absolute right-0 top-0 w-12 h-12 bg-blue-50 rounded-bl-full -z-10"></div>
        <div class="flex items-center gap-2 mb-2">
            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 shrink-0">
                <span class="iconify text-lg" data-icon="mdi:clipboard-check-outline"></span>
            </div>
            <p class="text-[11px] font-medium text-blue-700 uppercase tracking-wide">Đang kiểm hàng</p>
        </div>
        <div>
            <h3 class="text-2xl font-bold text-blue-600">5</h3>
            <p class="text-xs text-gray-500 mt-1">phiếu</p>
        </div>
    </div>

    <!-- Đã nhập kho -->
    <div class="bg-white rounded-xl p-4 border border-emerald-200 shadow-sm flex flex-col justify-between relative overflow-hidden">
        <div class="absolute right-0 top-0 w-12 h-12 bg-emerald-50 rounded-bl-full -z-10"></div>
        <div class="flex items-center gap-2 mb-2">
            <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 shrink-0">
                <span class="iconify text-lg" data-icon="mdi:check-circle-outline"></span>
            </div>
            <p class="text-[11px] font-medium text-emerald-700 uppercase tracking-wide">Đã nhập kho</p>
        </div>
        <div>
            <h3 class="text-2xl font-bold text-emerald-600">150</h3>
            <p class="text-xs text-gray-500 mt-1">phiếu</p>
        </div>
    </div>

    <!-- Có lỗi / thiếu hàng -->
    <div class="bg-white rounded-xl p-4 border border-rose-200 shadow-sm flex flex-col justify-between relative overflow-hidden">
        <div class="absolute right-0 top-0 w-12 h-12 bg-rose-50 rounded-bl-full -z-10"></div>
        <div class="flex items-center gap-2 mb-2">
            <div class="w-8 h-8 rounded-full bg-rose-100 flex items-center justify-center text-rose-600 shrink-0">
                <span class="iconify text-lg" data-icon="mdi:alert-circle-outline"></span>
            </div>
            <p class="text-[11px] font-medium text-rose-700 uppercase tracking-wide">Có lỗi / thiếu</p>
        </div>
        <div>
            <h3 class="text-2xl font-bold text-rose-600">6</h3>
            <p class="text-xs text-gray-500 mt-1">phiếu</p>
        </div>
    </div>

    <!-- Tổng giá trị nhập -->
    <div class="bg-white rounded-xl p-4 border border-red-200 shadow-sm flex flex-col justify-between lg:col-span-1">
        <div class="flex items-center gap-2 mb-2">
            <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-[#6B0D18] shrink-0">
                <span class="iconify text-lg" data-icon="mdi:currency-usd"></span>
            </div>
            <p class="text-[11px] font-medium text-[#6B0D18]/70 uppercase tracking-wide">Tổng giá trị nhập</p>
        </div>
        <div>
            <h3 class="text-xl font-bold text-[#6B0D18]">420TR</h3>
            <p class="text-xs text-gray-500 mt-1">Tháng này</p>
        </div>
    </div>

    <!-- Công nợ nhập hàng -->
    <div class="bg-white rounded-xl p-4 border border-orange-200 shadow-sm flex flex-col justify-between lg:col-span-1">
        <div class="flex items-center gap-2 mb-2">
            <div class="w-8 h-8 rounded-full bg-orange-50 flex items-center justify-center text-orange-600 shrink-0">
                <span class="iconify text-lg" data-icon="mdi:cash-clock"></span>
            </div>
            <p class="text-[11px] font-medium text-orange-700 uppercase tracking-wide">Công nợ nhập hàng</p>
        </div>
        <div>
            <h3 class="text-xl font-bold text-orange-600">58TR</h3>
            <p class="text-xs text-gray-500 mt-1">Cần thanh toán</p>
        </div>
    </div>
</div>
