<?php
// views/components/Admin/thanh_toan_van_chuyen/status_cards.php

$active_payments = array_filter($payments, fn($p) => $p['status'] == true);
$active_banks = array_filter($banks, fn($b) => $b['status'] == true);
$active_shipping = array_filter($shipping_methods, fn($s) => $s['status'] == true);
?>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-6">
    
    <!-- Thanh toán -->
    <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm flex flex-col relative overflow-hidden">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-gray-500">Thanh toán</span>
            <span class="iconify text-emerald-500 bg-emerald-50 p-1 rounded-md" data-icon="mdi:wallet-outline"></span>
        </div>
        <div class="flex items-end gap-2">
            <span class="text-xl font-bold text-gray-900"><?= count($active_payments) ?></span>
            <span class="text-xs text-gray-500 mb-1">PT đang bật</span>
        </div>
    </div>

    <!-- Ngân hàng -->
    <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm flex flex-col relative overflow-hidden">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-gray-500">Ngân hàng</span>
            <span class="iconify text-blue-500 bg-blue-50 p-1 rounded-md" data-icon="mdi:bank-outline"></span>
        </div>
        <div class="flex items-end gap-2">
            <span class="text-xl font-bold text-gray-900"><?= count($active_banks) ?></span>
            <span class="text-xs text-gray-500 mb-1">TK đang dùng</span>
        </div>
    </div>

    <!-- Vận chuyển -->
    <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm flex flex-col relative overflow-hidden">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-gray-500">Vận chuyển</span>
            <span class="iconify text-emerald-500 bg-emerald-50 p-1 rounded-md" data-icon="mdi:truck-outline"></span>
        </div>
        <div class="flex items-end gap-2">
            <span class="text-xl font-bold text-gray-900"><?= count($active_shipping) ?></span>
            <span class="text-xs text-gray-500 mb-1">PT đang bật</span>
        </div>
    </div>

    <!-- Freeship -->
    <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm flex flex-col relative overflow-hidden">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-gray-500">Freeship</span>
            <span class="iconify text-[#6B0D18] bg-red-50 p-1 rounded-md" data-icon="mdi:gift-outline"></span>
        </div>
        <div class="flex items-end gap-2">
            <span class="text-xl font-bold text-[#6B0D18]">500K</span>
            <span class="text-xs text-gray-500 mb-1">Đơn tối thiểu</span>
        </div>
    </div>

    <!-- Khu vực -->
    <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm flex flex-col relative overflow-hidden">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-gray-500">Khu vực giao</span>
            <span class="iconify text-purple-500 bg-purple-50 p-1 rounded-md" data-icon="mdi:map-marker-radius-outline"></span>
        </div>
        <div class="flex items-end gap-2">
            <span class="text-xl font-bold text-gray-900">Toàn quốc</span>
        </div>
    </div>

    <!-- Cần kiểm tra -->
    <div class="bg-yellow-50 rounded-xl p-4 border border-yellow-200 shadow-sm flex flex-col relative overflow-hidden">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-medium text-yellow-700">Cần kiểm tra</span>
            <span class="iconify text-amber-500 bg-white p-1 rounded-md" data-icon="mdi:alert-outline"></span>
        </div>
        <div class="flex items-end gap-2">
            <span class="text-xl font-bold text-amber-600">1</span>
            <span class="text-xs text-amber-600 mb-1">cấu hình</span>
        </div>
    </div>

</div>
