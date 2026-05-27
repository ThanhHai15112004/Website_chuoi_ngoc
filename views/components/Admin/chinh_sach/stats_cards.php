<?php
// views/components/Admin/chinh_sach/stats_cards.php
$total = count($policies);
$showing = count(array_filter($policies, fn($p) => $p['status'] == 'Đang hiển thị'));
$hidden = count(array_filter($policies, fn($p) => $p['status'] == 'Đang ẩn'));
$needUpdate = count(array_filter($policies, fn($p) => $p['status'] == 'Cần cập nhật'));
$inCheckout = count(array_filter($policies, fn($p) => in_array('Checkout', $p['locations'])));
?>
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
    <!-- Tổng -->
    <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm relative overflow-hidden group">
        <div class="flex justify-between items-start mb-2">
            <span class="text-sm font-medium text-gray-500">Tổng chính sách</span>
            <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-500">
                <span class="iconify" data-icon="mdi:file-document-multiple-outline"></span>
            </div>
        </div>
        <div class="flex items-end gap-2">
            <span class="text-2xl font-bold text-gray-900"><?= $total ?></span>
        </div>
    </div>

    <!-- Đang hiển thị -->
    <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm relative overflow-hidden group">
        <div class="flex justify-between items-start mb-2">
            <span class="text-sm font-medium text-emerald-600">Đang hiển thị</span>
            <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600">
                <span class="iconify" data-icon="mdi:eye-outline"></span>
            </div>
        </div>
        <div class="flex items-end gap-2">
            <span class="text-2xl font-bold text-gray-900"><?= $showing ?></span>
        </div>
    </div>

    <!-- Đang ẩn -->
    <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm relative overflow-hidden group">
        <div class="flex justify-between items-start mb-2">
            <span class="text-sm font-medium text-gray-500">Đang ẩn</span>
            <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                <span class="iconify" data-icon="mdi:eye-off-outline"></span>
            </div>
        </div>
        <div class="flex items-end gap-2">
            <span class="text-2xl font-bold text-gray-900"><?= $hidden ?></span>
        </div>
    </div>

    <!-- Cần cập nhật -->
    <div class="bg-amber-50 rounded-xl p-4 border border-amber-200 shadow-sm relative overflow-hidden group">
        <div class="flex justify-between items-start mb-2">
            <span class="text-sm font-medium text-amber-700">Cần cập nhật</span>
            <div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center text-amber-500 shadow-sm">
                <span class="iconify" data-icon="mdi:alert-outline"></span>
            </div>
        </div>
        <div class="flex items-end gap-2">
            <span class="text-2xl font-bold text-amber-600"><?= $needUpdate ?></span>
        </div>
    </div>

    <!-- Checkout -->
    <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm relative overflow-hidden group">
        <div class="flex justify-between items-start mb-2">
            <span class="text-sm font-medium text-[#6B0D18]">Checkout</span>
            <div class="w-8 h-8 rounded-lg bg-red-50 flex items-center justify-center text-[#6B0D18]">
                <span class="iconify" data-icon="mdi:cart-check"></span>
            </div>
        </div>
        <div class="flex items-end gap-2">
            <span class="text-2xl font-bold text-gray-900"><?= $inCheckout ?></span>
        </div>
    </div>

    <!-- Cập nhật gần nhất -->
    <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm relative overflow-hidden group">
        <div class="flex justify-between items-start mb-2">
            <span class="text-sm font-medium text-blue-600">Cập nhật lúc</span>
            <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600">
                <span class="iconify" data-icon="mdi:clock-outline"></span>
            </div>
        </div>
        <div class="flex flex-col mt-1">
            <span class="text-lg font-bold text-gray-900 leading-none mb-1">18/05/2026</span>
            <span class="text-xs text-gray-500">Hải Admin</span>
        </div>
    </div>
</div>
