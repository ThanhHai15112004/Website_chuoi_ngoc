<?php
    $statusLabels = [
        'pending' => ['label' => 'Chờ xác nhận', 'color' => 'bg-yellow-50 text-yellow-700', 'desc' => 'Đơn hàng đang chờ cửa hàng xác nhận.'],
        'confirmed' => ['label' => 'Đã xác nhận', 'color' => 'bg-blue-50 text-blue-700', 'desc' => 'Cửa hàng đã xác nhận đơn và chuẩn bị sản phẩm.'],
        'shipping' => ['label' => 'Đang giao', 'color' => 'bg-indigo-50 text-indigo-700', 'desc' => 'Đơn hàng đang được giao đến bạn.'],
        'delivered' => ['label' => 'Đã giao', 'color' => 'bg-teal-50 text-teal-700', 'desc' => 'Đơn hàng đã giao thành công.'],
        'completed' => ['label' => 'Thành công', 'color' => 'bg-green-50 text-green-700', 'desc' => 'Đơn hàng hoàn tất.'],
        'cancelled' => ['label' => 'Đã hủy', 'color' => 'bg-red-50 text-red-700', 'desc' => 'Đơn hàng đã bị hủy.']
    ];
    $currentStatus = $statusLabels[$order['status']] ?? $statusLabels['pending'];
    if ($order['status'] === 'cancelled' && ($order['is_delivery_failed'] ?? false)) {
        $currentStatus['desc'] = 'do giao hàng bị hủy hoặc không giao được.';
    }
    
    // Stepper config
    $isCancelled = $order['status'] === 'cancelled';
    $statusSteps = [
        ['key' => 'pending', 'label' => 'Chờ xác nhận', 'icon' => 'ph:clipboard-text'],
        ['key' => 'confirmed', 'label' => 'Đã xác nhận', 'icon' => 'ph:check-circle'],
        ['key' => 'shipping', 'label' => 'Đang giao', 'icon' => 'ph:truck'],
        ['key' => 'completed', 'label' => 'Hoàn thành', 'icon' => 'ph:gift'],
    ];
    $statusOrder = ['pending' => 0, 'confirmed' => 1, 'shipping' => 2, 'delivered' => 3, 'completed' => 3];
    $currentStep = $statusOrder[$order['status']] ?? 0;
?>

<!-- Order Summary Card -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-4 flex flex-col md:flex-row items-center justify-between gap-6">
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-full <?= explode(' ', $currentStatus['color'])[0] ?> flex items-center justify-center flex-shrink-0">
            <?php if ($isCancelled): ?>
            <iconify-icon icon="ph:x-circle" class="<?= explode(' ', $currentStatus['color'])[1] ?> text-xl"></iconify-icon>
            <?php else: ?>
            <iconify-icon icon="ph:box-arrow-down" class="<?= explode(' ', $currentStatus['color'])[1] ?> text-xl"></iconify-icon>
            <?php endif; ?>
        </div>
        <div>
            <p class="text-sm text-gray-500 mb-1">Trạng thái hiện tại</p>
            <div class="flex items-center gap-2">
                <span class="px-3 py-1 <?= $currentStatus['color'] ?> text-sm font-medium rounded-full"><?= $currentStatus['label'] ?></span>
                <span class="text-sm text-gray-600 hidden sm:inline-block">- <?= $currentStatus['desc'] ?></span>
            </div>
        </div>
    </div>
    
    <div class="flex flex-wrap md:flex-nowrap gap-6 w-full md:w-auto">
        <div class="w-1/2 md:w-auto">
            <p class="text-sm text-gray-500 mb-1">Phương thức thanh toán</p>
            <p class="text-sm font-medium text-gray-900"><?= htmlspecialchars($order['payment_method']) ?></p>
        </div>
        <div class="w-1/2 md:w-auto md:text-right">
            <p class="text-sm text-gray-500 mb-1">Tổng tiền</p>
            <p class="text-xl font-bold text-[#8b0000]"><?= number_format($order['total_amount'], 0, ',', '.') ?>đ</p>
        </div>
    </div>
</div>

<!-- Order Status Stepper -->
<?php if (!$isCancelled): ?>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-8">
    <div class="relative">
        <!-- Desktop Stepper -->
        <div class="hidden sm:block">
            <div class="flex items-center justify-between relative">
                <!-- Background line -->
                <div class="absolute top-5 left-[12.5%] right-[12.5%] h-1 bg-gray-200 rounded-full"></div>
                <!-- Active line -->
                <?php 
                $totalSteps = count($statusSteps);
                $progressWidth = $totalSteps > 1 ? ($currentStep / ($totalSteps - 1)) * 100 : 0;
                ?>
                <div class="absolute top-5 left-[12.5%] h-1 bg-green-500 rounded-full transition-all duration-700" style="width: calc(<?= $progressWidth ?>% * 0.75)"></div>
                
                <?php foreach ($statusSteps as $idx => $step): 
                    $isDone = $idx < $currentStep;
                    $isActive = $idx === $currentStep;
                    $isFuture = $idx > $currentStep;
                ?>
                <div class="flex flex-col items-center relative z-10" style="width: <?= 100 / $totalSteps ?>%">
                    <div class="w-10 h-10 rounded-full flex items-center justify-center border-2 transition-all duration-300
                        <?php if ($isDone): ?>
                            bg-green-500 border-green-500 text-white shadow-sm
                        <?php elseif ($isActive): ?>
                            bg-white border-[#8b0000] text-[#8b0000] shadow-md ring-4 ring-red-100
                        <?php else: ?>
                            bg-gray-100 border-gray-200 text-gray-400
                        <?php endif; ?>
                    ">
                        <?php if ($isDone): ?>
                        <iconify-icon icon="ph:check-bold" class="text-lg"></iconify-icon>
                        <?php else: ?>
                        <iconify-icon icon="<?= $step['icon'] ?>" class="text-lg"></iconify-icon>
                        <?php endif; ?>
                    </div>
                    <p class="text-xs font-medium mt-2 text-center
                        <?= $isDone ? 'text-green-600' : ($isActive ? 'text-[#8b0000] font-bold' : 'text-gray-400') ?>
                    "><?= $step['label'] ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Mobile Stepper (vertical) -->
        <div class="sm:hidden space-y-1">
            <?php foreach ($statusSteps as $idx => $step): 
                $isDone = $idx < $currentStep;
                $isActive = $idx === $currentStep;
                $isLast = $idx === count($statusSteps) - 1;
            ?>
            <div class="flex items-start gap-3">
                <div class="flex flex-col items-center">
                    <div class="w-8 h-8 rounded-full flex items-center justify-center border-2 shrink-0
                        <?= $isDone ? 'bg-green-500 border-green-500 text-white' : ($isActive ? 'bg-white border-[#8b0000] text-[#8b0000]' : 'bg-gray-100 border-gray-200 text-gray-400') ?>
                    ">
                        <?php if ($isDone): ?>
                        <iconify-icon icon="ph:check-bold" class="text-sm"></iconify-icon>
                        <?php else: ?>
                        <iconify-icon icon="<?= $step['icon'] ?>" class="text-sm"></iconify-icon>
                        <?php endif; ?>
                    </div>
                    <?php if (!$isLast): ?>
                    <div class="w-0.5 h-6 <?= $isDone ? 'bg-green-400' : 'bg-gray-200' ?>"></div>
                    <?php endif; ?>
                </div>
                <p class="text-sm pt-1 <?= $isDone ? 'text-green-600' : ($isActive ? 'text-[#8b0000] font-bold' : 'text-gray-400') ?>"><?= $step['label'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php else: ?>
<!-- Cancelled Banner -->
<div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-8 flex items-center gap-3">
    <iconify-icon icon="ph:warning-circle-fill" class="text-2xl text-red-500 shrink-0"></iconify-icon>
    <div>
        <?php if ($order['is_delivery_failed'] ?? false): ?>
            <p class="text-sm font-bold text-red-700">Giao hàng thất bại</p>
            <p class="text-xs text-red-600">Đơn hàng này bị hủy do giao hàng bị hủy hoặc không giao được.</p>
        <?php else: ?>
            <p class="text-sm font-bold text-red-700">Đơn hàng đã bị hủy</p>
            <p class="text-xs text-red-600">Đơn hàng này đã bị hủy và không thể thực hiện.</p>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
