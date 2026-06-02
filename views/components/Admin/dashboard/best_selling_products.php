<?php
// views/components/Admin/dashboard/best_selling_products.php
?>
<!-- Best Selling Products -->
<div class="bg-white rounded-xl border border-gray-100 shadow-sm p-5">
    <h3 class="text-lg font-bold text-gray-800 mb-4">Sản phẩm bán chạy</h3>
    <div class="space-y-4">
        <?php foreach($san_pham_ban_chay as $sp): ?>
        <div class="flex items-center gap-3">
            <img src="<?= $sp['anh'] ?>" alt="<?= $sp['ten'] ?>" class="w-12 h-12 rounded-lg object-cover border border-gray-100">
            <div class="flex-1 min-w-0">
                <h4 class="text-sm font-semibold text-gray-800 truncate"><?= $sp['ten'] ?></h4>
                <p class="text-xs text-gray-500">Đã bán: <?= $sp['da_ban'] ?> | Tồn: <?= $sp['ton_kho'] ?></p>
            </div>
            <div class="text-right">
                <p class="text-sm font-bold text-red-900"><?= format_currency_short($sp['doanh_thu']) ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
