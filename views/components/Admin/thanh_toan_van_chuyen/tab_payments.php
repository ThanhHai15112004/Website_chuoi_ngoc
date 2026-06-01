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
            <button onclick="addPayment()" class="px-4 py-2 bg-[#6B0D18] text-white text-sm font-medium rounded-lg hover:bg-red-900 transition-colors shadow-sm flex items-center gap-1">
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
            <tbody class="divide-y divide-gray-100">
                <?php if(empty($payments)): ?>
                <tr><td colspan="5" class="px-6 py-12 text-center text-gray-400"><span class="iconify text-4xl mb-2 mx-auto block" data-icon="mdi:wallet-outline"></span>Chưa có phương thức thanh toán nào.</td></tr>
                <?php else: ?>
                <?php foreach($payments as $pay): ?>
                <tr class="hover:bg-gray-50 transition-colors group" data-id="<?= $pay['id'] ?>">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-600 shrink-0">
                                <span class="iconify text-xl" data-icon="<?= htmlspecialchars($pay['icon'] ?? 'mdi:wallet') ?>"></span>
                            </div>
                            <div>
                                <span class="font-bold text-gray-900 text-sm whitespace-nowrap block"><?= htmlspecialchars($pay['ten']) ?></span>
                                <span class="text-xs text-gray-400"><?= htmlspecialchars($pay['ma']) ?></span>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="text-sm text-gray-600 line-clamp-2 w-48 lg:w-64"><?= htmlspecialchars($pay['mo_ta'] ?? '') ?></p>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-600 mb-1"><?= htmlspecialchars($pay['dieu_kien'] ?? '') ?></div>
                        <div class="text-sm font-medium <?= $pay['phi'] > 0 ? 'text-[#6B0D18]' : 'text-emerald-600' ?>">Phí: <?= $pay['phi'] == 0 ? '0đ' : number_format($pay['phi'],0,',','.') . 'đ' ?></div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <label class="inline-flex items-center cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" class="sr-only toggle-switch" <?= $pay['trang_thai'] ? 'checked' : '' ?> onchange="toggleEntity('payment', <?= $pay['id'] ?>)">
                                <div class="block bg-gray-200 w-10 h-6 rounded-full transition-colors toggle-bg"></div>
                                <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform toggle-dot shadow-sm"></div>
                            </div>
                        </label>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick='editPayment(<?= $pay["id"] ?>, <?= json_encode($pay, JSON_HEX_APOS|JSON_HEX_QUOT|JSON_UNESCAPED_UNICODE) ?>)' class="w-8 h-8 rounded-lg text-blue-600 hover:bg-blue-50 flex items-center justify-center transition-colors" title="Sửa">
                                <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                            </button>
                            <button onclick="requestDelete('payment', <?= $pay['id'] ?>, '<?= htmlspecialchars($pay['ten'], ENT_QUOTES) ?>')" class="w-8 h-8 rounded-lg text-red-500 hover:bg-red-50 flex items-center justify-center transition-colors" title="Xóa">
                                <span class="iconify text-lg" data-icon="mdi:trash-can-outline"></span>
                            </button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
    .toggle-switch:checked + .toggle-bg { background-color: #10B981; }
    .toggle-switch:checked ~ .toggle-dot { transform: translateX(100%); }
</style>
