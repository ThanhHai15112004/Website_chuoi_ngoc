<?php if (!empty($topProducts) && isset($topProducts[0])): 
    $bestProduct = $topProducts[0];
?>
<!-- Cảnh báo thông minh -->
<div class="bg-yellow-50 border border-yellow-200 rounded-xl p-4 flex items-start gap-4" id="alertSectionDoanhThu">
    <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center shrink-0">
        <span class="iconify text-yellow-600 text-xl" data-icon="mdi:lightbulb-on-outline"></span>
    </div>
    <div class="flex-1">
        <h4 class="text-sm font-bold text-yellow-800">Thông tin đáng chú ý</h4>
        <div class="mt-1 flex flex-col md:flex-row md:items-center gap-2 md:gap-6 text-sm text-yellow-700">
            <span class="flex items-center gap-1.5"><span class="iconify" data-icon="mdi:trending-up"></span> Sản phẩm "<?= htmlspecialchars($bestProduct['ten_sp']) ?>" chiếm <?= $bestProduct['ty_trong'] ?>% tổng doanh thu kỳ này.</span>
            <?php if (!empty($slowProducts)): ?>
            <span class="flex items-center gap-1.5"><span class="iconify text-red-500" data-icon="mdi:trending-down"></span> Có <?= count($slowProducts) ?> sản phẩm tồn kho nhưng bán chậm.</span>
            <?php endif; ?>
        </div>
    </div>
    <button class="text-gray-400 hover:text-gray-600" onclick="document.getElementById('alertSectionDoanhThu').remove()">
        <span class="iconify" data-icon="mdi:close"></span>
    </button>
</div>
<?php endif; ?>
