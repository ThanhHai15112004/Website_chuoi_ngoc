<?php
// views/components/Admin/thanh_toan_van_chuyen/tab_payments.php
?>
<div class="bg-white rounded-[20px] shadow-sm border border-gray-200 overflow-hidden">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gray-50/50">
        <div>
            <h3 class="text-lg font-bold text-gray-900">Phương thức thanh toán</h3>
            <p class="text-sm text-gray-500">Quản lý các cách khách có thể thanh toán khi đặt hàng.</p>
        </div>
        <div class="flex items-center gap-2">
            <button class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-50 transition-colors tooltip" title="Tắt tất cả phương thức">Tắt tất cả</button>
            <button onclick="openDrawer('drawerPayment')" class="px-4 py-2 bg-[#6B0D18] text-white text-sm font-medium rounded-lg hover:bg-red-900 transition-colors shadow-sm flex items-center gap-1">
                <span class="iconify" data-icon="mdi:plus"></span> Thêm phương thức
            </button>
        </div>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-xs text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-3 font-medium">Phương thức</th>
                    <th class="px-6 py-3 font-medium">Mô tả hiển thị</th>
                    <th class="px-6 py-3 font-medium">Điều kiện & Phí</th>
                    <th class="px-6 py-3 font-medium text-center">Trạng thái</th>
                    <th class="px-6 py-3 font-medium text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100" id="payment-sortable">
                <?php foreach($payments as $index => $pay): ?>
                <tr class="hover:bg-gray-50 transition-colors group cursor-move">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <span class="iconify text-gray-400 cursor-grab" data-icon="mdi:drag-horizontal"></span>
                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-600 shrink-0">
                                <span class="iconify text-xl" data-icon="<?= $pay['id'] == 'COD' ? 'mdi:cash' : 'mdi:bank-transfer' ?>"></span>
                            </div>
                            <span class="font-bold text-gray-900 text-sm whitespace-nowrap"><?= $pay['name'] ?></span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-600 line-clamp-2 w-48 lg:w-64" title="<?= $pay['desc'] ?>"><?= $pay['desc'] ?></p>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-600 mb-1"><?= $pay['condition'] ?></div>
                        <div class="text-sm font-medium <?= $pay['fee'] > 0 ? 'text-[#6B0D18]' : 'text-emerald-600' ?>">Phí: <?= $pay['fee'] == 0 ? '0đ' : number_format($pay['fee'],0,',','.') . 'đ' ?></div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <label class="inline-flex items-center cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" class="sr-only toggle-switch" <?= $pay['status'] ? 'checked' : '' ?> onchange="markUnsaved()">
                                <div class="block bg-gray-200 w-10 h-6 rounded-full transition-colors toggle-bg"></div>
                                <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform toggle-dot shadow-sm"></div>
                            </div>
                        </label>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick="openDrawer('drawerPayment')" class="w-8 h-8 rounded-lg text-blue-600 hover:bg-blue-50 flex items-center justify-center transition-colors tooltip" title="Sửa">
                                <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                            </button>
                            <button class="w-8 h-8 rounded-lg text-gray-400 hover:text-gray-900 hover:bg-gray-100 flex items-center justify-center transition-colors tooltip" title="Xem trước">
                                <span class="iconify text-lg" data-icon="mdi:eye-outline"></span>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    .toggle-switch:checked + .toggle-bg { background-color: #10B981; } /* Emerald */
    .toggle-switch:checked ~ .toggle-dot { transform: translateX(100%); }
</style>
