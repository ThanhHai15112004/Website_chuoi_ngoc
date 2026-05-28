<?php
$vouchers = $vouchers ?? [];
?>
<div class="p-6 bg-gray-50/30">
    <?php if(empty($vouchers)): ?>
        <div class="text-center py-12">
            <span class="iconify text-gray-300 text-6xl mx-auto mb-4" data-icon="mdi:ticket-percent-outline"></span>
            <h4 class="text-lg font-medium text-gray-800 mb-1">Chưa có voucher nào</h4>
            <p class="text-gray-500 text-sm">Khách hàng chưa được cấp hoặc sưu tầm voucher nào.</p>
        </div>
    <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($vouchers as $v): 
                // Xử lý giá trị
                $giaTri = $v['gia_tri'];
                if ($v['loai_giam_gia'] === 'phan_tram') {
                    $giaTriStr = $giaTri . '%';
                } else {
                    if ($giaTri >= 1000) {
                        $giaTriStr = ($giaTri / 1000) . 'K';
                    } else {
                        $giaTriStr = $giaTri . 'đ';
                    }
                }
                
                // Trạng thái
                $isUsed = $v['trang_thai'] == 1;
                $isExpired = !$isUsed && strtotime($v['ngay_ket_thuc']) < time();
                
                $statusColor = 'green';
                $statusText = 'Khả dụng';
                if ($isUsed) {
                    $statusColor = 'gray';
                    $statusText = 'Đã dùng ' . date('d/m/Y', strtotime($v['ngay_su_dung']));
                } elseif ($isExpired) {
                    $statusColor = 'red';
                    $statusText = 'Hết hạn';
                }
            ?>
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden flex <?= $isUsed || $isExpired ? 'opacity-70 grayscale-[50%]' : '' ?> hover:shadow-md transition-shadow relative">
                <!-- Tear line effect -->
                <div class="w-1/3 bg-gradient-to-br from-[#6B0D18] to-[#9B1B26] p-4 flex flex-col justify-center items-center text-white text-center relative border-r-2 border-dashed border-gray-200">
                    <div class="absolute -left-2 -top-2 w-4 h-4 bg-white rounded-full"></div>
                    <div class="absolute -left-2 -bottom-2 w-4 h-4 bg-white rounded-full"></div>
                    
                    <span class="text-sm font-medium opacity-90 mb-1">GIẢM</span>
                    <span class="text-3xl font-black tracking-tighter"><?= $giaTriStr ?></span>
                </div>
                
                <div class="w-2/3 p-4 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-1">
                            <span class="px-2 py-0.5 bg-gray-100 text-gray-700 text-[10px] font-bold rounded uppercase tracking-wider">
                                <?= htmlspecialchars($v['ma_voucher'] ?? '') ?>
                            </span>
                        </div>
                        <h4 class="font-bold text-gray-800 text-sm line-clamp-2 leading-tight mb-2">
                            <?= htmlspecialchars($v['ten_voucher'] ?? '') ?>
                        </h4>
                    </div>
                    
                    <div class="mt-auto">
                        <div class="flex items-center justify-between">
                            <span class="text-[10px] text-gray-500 flex items-center gap-1">
                                <span class="iconify" data-icon="mdi:clock-outline"></span> 
                                HSD: <?= date('d/m/Y', strtotime($v['ngay_ket_thuc'])) ?>
                            </span>
                            <span class="text-[10px] font-bold uppercase tracking-wider text-<?= $statusColor ?>-600 bg-<?= $statusColor ?>-50 px-2 py-0.5 rounded-full">
                                <?= $statusText ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
