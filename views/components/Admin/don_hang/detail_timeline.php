<?php
    $currentStatus = $don_hang['trang_thai_don_hang'];
    $isCanceled = $currentStatus == 4;
    
    if ($isCanceled) {
        $steps = [
            ['id' => 0, 'label' => 'Chờ xác nhận'],
            ['id' => 4, 'label' => 'Đã hủy']
        ];
    } else {
        $steps = [
            ['id' => 0, 'label' => 'Chờ xác nhận'],
            ['id' => 1, 'label' => 'Đang chuẩn bị'],
            ['id' => 2, 'label' => 'Đang giao'],
            ['id' => 3, 'label' => 'Thành công']
        ];
    }
?>
    <!-- Timeline Xử lý đơn hàng -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-6 overflow-x-auto hide-scrollbar">
        <div class="flex items-center min-w-[700px]">
            <?php foreach ($steps as $index => $step): ?>
                <?php
                    $isCompleted = false;
                    $isActive = false;
                    
                    if ($isCanceled) {
                        if ($step['id'] == 4) {
                            $isActive = true;
                            $isCompleted = true; // Hủy là completed step của trạng thái hủy
                        } else {
                            $isCompleted = true;
                        }
                    } else {
                        if ($currentStatus > $step['id']) {
                            $isCompleted = true;
                        } elseif ($currentStatus == $step['id']) {
                            $isActive = true;
                        }
                    }
                    
                    $isLast = $index === count($steps) - 1;
                    $isFirst = $index === 0;
                ?>
                
                <div class="relative flex flex-col items-center flex-1">
                    <?php if ($isCompleted && !$isActive && !$isCanceled): ?>
                        <!-- Completed -->
                        <div class="w-8 h-8 rounded-full bg-[#6B0D18] text-white flex items-center justify-center relative z-10 shadow-md">
                            <span class="iconify" data-icon="mdi:check"></span>
                        </div>
                    <?php elseif ($isActive): ?>
                        <!-- Active -->
                        <div class="w-8 h-8 rounded-full bg-white border-2 <?= $isCanceled ? 'border-red-600' : 'border-[#6B0D18]' ?> flex items-center justify-center relative z-10 shadow-sm">
                            <div class="w-2.5 h-2.5 <?= $isCanceled ? 'bg-red-600' : 'bg-[#6B0D18]' ?> rounded-full"></div>
                        </div>
                    <?php else: ?>
                        <!-- Pending -->
                        <div class="w-8 h-8 rounded-full bg-gray-50 border-2 border-gray-200 text-gray-300 flex items-center justify-center relative z-10">
                            <div class="w-2.5 h-2.5 bg-gray-300 rounded-full"></div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Lines -->
                    <?php if (!$isFirst): ?>
                        <div class="absolute top-4 left-0 w-1/2 h-0.5 <?= ($isCompleted || $isActive) ? ($isCanceled ? 'bg-red-600' : 'bg-[#6B0D18]') : 'bg-gray-200' ?>"></div>
                    <?php endif; ?>
                    
                    <?php if (!$isLast): ?>
                        <div class="absolute top-4 left-1/2 w-full h-0.5 <?= $isCompleted && !$isCanceled ? 'bg-[#6B0D18]' : 'bg-gray-200' ?>"></div>
                    <?php endif; ?>
                    
                    <!-- Label -->
                    <div class="mt-3 text-center">
                        <div class="text-sm <?= $isActive || $isCompleted ? 'font-bold' : 'font-medium' ?> <?= $isActive && $isCanceled ? 'text-red-600' : ($isActive || $isCompleted ? 'text-gray-900' : 'text-gray-400') ?>">
                            <?= $step['label'] ?>
                        </div>
                        <?php if ($isActive): ?>
                            <div class="text-xs text-gray-500 mt-0.5">Hiện tại</div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
