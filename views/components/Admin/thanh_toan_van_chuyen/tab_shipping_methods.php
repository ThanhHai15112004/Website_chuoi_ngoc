<?php
// views/components/Admin/thanh_toan_van_chuyen/tab_shipping_methods.php
?>
<div class="bg-white rounded-[20px] shadow-sm border border-gray-200 overflow-hidden">
    <!-- Header -->
    <div class="px-6 py-4 border-b border-gray-200 flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-gray-50/50">
        <div>
            <h3 class="text-lg font-bold text-gray-900">Phương thức vận chuyển</h3>
            <p class="text-sm text-gray-500">Quản lý các hình thức giao hàng hiển thị cho khách chọn.</p>
        </div>
        <button onclick="addShipping()" class="px-4 py-2 bg-[#6B0D18] text-white text-sm font-medium rounded-lg hover:bg-red-900 transition-colors shadow-sm flex items-center gap-1">
            <span class="iconify" data-icon="mdi:plus"></span> Thêm vận chuyển
        </button>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-xs text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-3 font-medium">Phương thức</th>
                    <th class="px-6 py-3 font-medium">Khu vực & Thời gian</th>
                    <th class="px-6 py-3 font-medium">Phí mặc định</th>
                    <th class="px-6 py-3 font-medium text-center">Trạng thái</th>
                    <th class="px-6 py-3 font-medium text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if(empty($shipping_methods)): ?>
                <tr><td colspan="5" class="px-6 py-12 text-center text-gray-400"><span class="iconify text-4xl mb-2 mx-auto block" data-icon="mdi:truck-outline"></span>Chưa có phương thức vận chuyển nào.</td></tr>
                <?php else: ?>
                <?php foreach($shipping_methods as $ship): ?>
                <tr class="hover:bg-gray-50 transition-colors group <?= !$ship['trang_thai'] ? 'opacity-75' : '' ?>" data-id="<?= $ship['id'] ?>">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-600 shrink-0">
                                <span class="iconify text-xl" data-icon="<?= htmlspecialchars($ship['icon'] ?? 'mdi:truck-outline') ?>"></span>
                            </div>
                            <div>
                                <span class="font-bold text-gray-900 text-sm whitespace-nowrap block"><?= htmlspecialchars($ship['ten']) ?></span>
                                <span class="text-xs text-gray-500"><?= htmlspecialchars($ship['mo_ta'] ?? '') ?></span>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm text-gray-900 font-medium mb-1"><span class="iconify inline-block text-gray-400" data-icon="mdi:map-marker"></span> <?= htmlspecialchars($ship['khu_vuc'] ?? '') ?></div>
                        <div class="text-xs text-gray-500"><span class="iconify inline-block" data-icon="mdi:clock-outline"></span> <?= htmlspecialchars($ship['thoi_gian'] ?? '') ?></div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-sm font-bold <?= $ship['phi_mac_dinh'] > 0 ? 'text-[#6B0D18]' : 'text-emerald-600' ?> mb-1">
                            <?= $ship['phi_mac_dinh'] == 0 ? 'Miễn phí' : number_format($ship['phi_mac_dinh'],0,',','.') . 'đ' ?>
                        </div>
                        <?php if($ship['freeship_tu'] > 0): ?>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-100 text-emerald-700">
                                Freeship từ <?= number_format($ship['freeship_tu']/1000,0,',','.') ?>K
                            </span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <label class="inline-flex items-center cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" class="sr-only toggle-switch" <?= $ship['trang_thai'] ? 'checked' : '' ?> onchange="toggleEntity('shipping', <?= $ship['id'] ?>)">
                                <div class="block bg-gray-200 w-10 h-6 rounded-full transition-colors toggle-bg"></div>
                                <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform toggle-dot shadow-sm"></div>
                            </div>
                        </label>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick='editShipping(<?= $ship["id"] ?>, <?= json_encode($ship, JSON_HEX_APOS|JSON_HEX_QUOT|JSON_UNESCAPED_UNICODE) ?>)' class="w-8 h-8 rounded-lg text-blue-600 hover:bg-blue-50 flex items-center justify-center transition-colors" title="Sửa">
                                <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                            </button>
                            <button onclick="requestDelete('shipping', <?= $ship['id'] ?>, '<?= htmlspecialchars($ship['ten'], ENT_QUOTES) ?>')" class="w-8 h-8 rounded-lg text-red-500 hover:bg-red-50 flex items-center justify-center transition-colors" title="Xóa">
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
