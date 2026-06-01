<?php
// views/components/Admin/thanh_toan_van_chuyen/tab_freeship.php
?>
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
    <div>
        <h3 class="text-lg font-bold text-gray-900">Quy tắc Miễn phí vận chuyển</h3>
        <p class="text-sm text-gray-500">Tạo các chương trình khuyến mãi freeship tự động áp dụng khi khách đạt điều kiện.</p>
    </div>
    <button onclick="addFreeship()" class="px-4 py-2 bg-[#6B0D18] text-white text-sm font-medium rounded-lg hover:bg-red-900 transition-colors shadow-sm flex items-center gap-1">
        <span class="iconify" data-icon="mdi:plus"></span> Thêm quy tắc
    </button>
</div>

<?php if(empty($freeship_rules)): ?>
<div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-12 text-center">
    <span class="iconify text-gray-300 text-5xl mx-auto mb-3" data-icon="mdi:ticket-percent-outline"></span>
    <p class="text-gray-400">Chưa có quy tắc freeship nào.</p>
</div>
<?php else: ?>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <?php foreach($freeship_rules as $rule): ?>
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5 relative overflow-hidden group <?= !$rule['trang_thai'] ? 'opacity-70 grayscale-[50%]' : '' ?>" data-id="<?= $rule['id'] ?>">
        
        <div class="flex items-start justify-between mb-4">
            <div class="w-12 h-12 rounded-xl bg-red-50 text-[#6B0D18] flex items-center justify-center">
                <span class="iconify text-3xl" data-icon="mdi:gift-outline"></span>
            </div>
            <label class="inline-flex items-center cursor-pointer">
                <div class="relative">
                    <input type="checkbox" class="sr-only toggle-switch" <?= $rule['trang_thai'] ? 'checked' : '' ?> onchange="toggleEntity('freeship', <?= $rule['id'] ?>)">
                    <div class="block bg-gray-200 w-10 h-6 rounded-full transition-colors toggle-bg"></div>
                    <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition-transform toggle-dot shadow-sm"></div>
                </div>
            </label>
        </div>

        <h4 class="font-bold text-gray-900 text-lg mb-1"><?= htmlspecialchars($rule['ten']) ?></h4>
        <div class="space-y-2 mt-4 text-sm">
            <div class="flex items-center gap-2 text-gray-600">
                <span class="iconify text-gray-400" data-icon="mdi:tag-outline"></span>
                <span class="font-medium text-gray-900"><?= htmlspecialchars($rule['dieu_kien'] ?? '') ?></span>
            </div>
            <div class="flex items-center gap-2 text-gray-600">
                <span class="iconify text-gray-400" data-icon="mdi:map-marker-outline"></span>
                <span><?= htmlspecialchars($rule['khu_vuc_ap_dung'] ?? '') ?></span>
            </div>
        </div>

        <!-- Hover Actions -->
        <div class="absolute top-4 right-16 flex items-center gap-1 opacity-0 group-hover:opacity-100 transition-opacity">
            <button onclick='editFreeship(<?= $rule["id"] ?>, <?= json_encode($rule, JSON_HEX_APOS|JSON_HEX_QUOT|JSON_UNESCAPED_UNICODE) ?>)' class="w-8 h-8 rounded-lg bg-gray-100 text-blue-600 hover:bg-blue-100 flex items-center justify-center transition-colors shadow-sm" title="Sửa">
                <span class="iconify text-sm" data-icon="mdi:pencil"></span>
            </button>
            <button onclick="requestDelete('freeship', <?= $rule['id'] ?>, '<?= htmlspecialchars($rule['ten'], ENT_QUOTES) ?>')" class="w-8 h-8 rounded-lg bg-gray-100 text-red-500 hover:bg-red-100 flex items-center justify-center transition-colors shadow-sm" title="Xóa">
                <span class="iconify text-sm" data-icon="mdi:trash-can-outline"></span>
            </button>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
