<?php
// views/components/Admin/thanh_toan_van_chuyen/tab_shipping_zones.php
?>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <h3 class="text-lg font-bold text-gray-900">Khu vực & Phí giao hàng</h3>
        <p class="text-sm text-gray-500">Cấu hình phí ship theo từng tỉnh/thành hoặc nhóm khu vực.</p>
    </div>
    <button onclick="addZone()" class="px-4 py-2 bg-[#6B0D18] text-white text-sm font-medium rounded-lg hover:bg-red-900 transition-colors shadow-sm flex items-center gap-1">
        <span class="iconify" data-icon="mdi:plus"></span> Thêm khu vực
    </button>
</div>

<div class="bg-white rounded-[20px] shadow-sm border border-gray-200 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200 text-xs text-gray-500 uppercase tracking-wider">
                    <th class="px-6 py-3 font-medium w-1/3">Khu vực áp dụng</th>
                    <th class="px-6 py-3 font-medium">Phí / Thời gian</th>
                    <th class="px-6 py-3 font-medium">Điều kiện Freeship</th>
                    <th class="px-6 py-3 font-medium text-center">Trạng thái</th>
                    <th class="px-6 py-3 font-medium text-right">Thao tác</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <?php if(empty($shipping_zones)): ?>
                <tr><td colspan="5" class="px-6 py-12 text-center text-gray-400"><span class="iconify text-4xl mb-2 mx-auto block" data-icon="mdi:map-marker-radius-outline"></span>Chưa có khu vực giao hàng nào.</td></tr>
                <?php else: ?>
                <?php foreach($shipping_zones as $zone): ?>
                <tr class="hover:bg-gray-50 transition-colors" data-id="<?= $zone['id'] ?>">
                    <td class="px-6 py-4">
                        <h4 class="font-bold text-gray-900 text-sm mb-1"><?= htmlspecialchars($zone['ten']) ?></h4>
                        <p class="text-xs text-gray-500 line-clamp-2"><?= htmlspecialchars($zone['danh_sach_tinh'] ?? '') ?></p>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2 text-sm text-gray-900 mb-1">
                            <span class="w-20 text-gray-500 text-xs">Tiêu chuẩn:</span>
                            <span class="font-bold text-[#6B0D18]"><?= number_format($zone['phi_tieu_chuan'],0,',','.') ?>đ</span>
                        </div>
                        <div class="flex items-center gap-2 text-sm text-gray-900 mb-1">
                            <span class="w-20 text-gray-500 text-xs">Giao nhanh:</span>
                            <span class="font-bold text-[#6B0D18]"><?= number_format($zone['phi_nhanh'],0,',','.') ?>đ</span>
                        </div>
                        <div class="text-xs text-gray-500 mt-2"><span class="iconify inline-block" data-icon="mdi:clock-outline"></span> <?= htmlspecialchars($zone['thoi_gian'] ?? '') ?></div>
                    </td>
                    <td class="px-6 py-4">
                        <?php if($zone['freeship_tu'] > 0): ?>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-100 text-emerald-700">
                                Đơn từ <?= number_format($zone['freeship_tu'],0,',','.') ?>đ
                            </span>
                        <?php else: ?>
                            <span class="text-sm text-gray-400 italic">Không áp dụng</span>
                        <?php endif; ?>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <label class="inline-flex items-center cursor-pointer">
                            <div class="relative">
                                <input type="checkbox" class="sr-only toggle-switch" <?= $zone['trang_thai'] ? 'checked' : '' ?> onchange="toggleEntity('zone', <?= $zone['id'] ?>)">
                                <div class="block bg-gray-200 w-10 h-6 rounded-full transition-colors toggle-bg"></div>
                                <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform toggle-dot shadow-sm"></div>
                            </div>
                        </label>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <button onclick='editZone(<?= $zone["id"] ?>, <?= json_encode($zone, JSON_HEX_APOS|JSON_HEX_QUOT|JSON_UNESCAPED_UNICODE) ?>)' class="w-8 h-8 rounded-lg text-blue-600 hover:bg-blue-50 flex items-center justify-center transition-colors" title="Sửa">
                                <span class="iconify text-lg" data-icon="mdi:pencil-outline"></span>
                            </button>
                            <button onclick="requestDelete('zone', <?= $zone['id'] ?>, '<?= htmlspecialchars($zone['ten'], ENT_QUOTES) ?>')" class="w-8 h-8 rounded-lg text-red-600 hover:bg-red-50 flex items-center justify-center transition-colors" title="Xóa">
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
