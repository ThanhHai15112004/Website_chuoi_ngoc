<?php
$userVouchers = $vouchers ?? [];
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Kho Voucher</h2>
        <p class="text-gray-500 mt-1">Các mã giảm giá và ưu đãi dành riêng cho bạn</p>
    </div>

    <?php if (!empty($userVouchers)): ?>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php foreach ($userVouchers as $v): ?>
        <?php 
        $isPercent = ($v['loai_giam'] ?? '') === 'phan_tram';
        $bgColor = $isPercent ? 'bg-[#8b0000]' : 'bg-green-600';
        $giaTriDisplay = $isPercent ? ((int)$v['gia_tri'] . '%') : number_format($v['gia_tri'], 0, ',', '.') . 'đ';
        $labelTop = $isPercent ? 'Giảm' : 'Giảm';
        $hetHan = !empty($v['ngay_ket_thuc']) && strtotime($v['ngay_ket_thuc']) < time();
        $daSuDung = ($v['tinh_trang_su_dung'] ?? 0) == 1;
        ?>
        <div class="border border-gray-200 rounded-xl overflow-hidden flex h-[120px] hover:shadow-md transition-shadow relative <?= ($hetHan || $daSuDung) ? 'opacity-60' : '' ?>">
            <div class="w-[100px] <?= $bgColor ?> flex flex-col justify-center items-center text-white shrink-0 border-r border-dashed border-gray-300 relative">
                <div class="absolute -top-3 -right-3 w-6 h-6 bg-white rounded-full"></div>
                <div class="absolute -bottom-3 -right-3 w-6 h-6 bg-white rounded-full"></div>
                
                <span class="text-xs uppercase opacity-80 mb-1 tracking-wider"><?= $labelTop ?></span>
                <span class="text-2xl font-bold"><?= $giaTriDisplay ?></span>
            </div>
            <div class="p-4 flex-1 flex flex-col justify-between bg-white">
                <div>
                    <h3 class="font-bold text-gray-900 text-sm leading-snug line-clamp-2">
                        <?php if ($isPercent): ?>
                        Giảm <?= (int)$v['gia_tri'] ?>%<?= !empty($v['giam_toi_da']) ? ' tối đa ' . number_format($v['giam_toi_da'], 0, ',', '.') . 'đ' : '' ?><?= !empty($v['don_toi_thieu']) ? ' cho đơn từ ' . number_format($v['don_toi_thieu'], 0, ',', '.') . 'đ' : '' ?>
                        <?php else: ?>
                        Giảm trực tiếp <?= number_format($v['gia_tri'], 0, ',', '.') ?>đ<?= !empty($v['don_toi_thieu']) ? ' cho đơn từ ' . number_format($v['don_toi_thieu'], 0, ',', '.') . 'đ' : '' ?>
                        <?php endif; ?>
                    </h3>
                    <p class="text-xs text-gray-500 mt-1">
                        Mã: <span class="font-medium text-gray-700"><?= htmlspecialchars($v['ma'] ?? '') ?></span>
                        · HSD: <?= !empty($v['ngay_ket_thuc']) ? date('d/m/Y', strtotime($v['ngay_ket_thuc'])) : 'Không thời hạn' ?>
                    </p>
                </div>
                <div class="flex justify-between items-center mt-2">
                    <?php if ($hetHan): ?>
                    <span class="text-xs text-red-500 font-medium">Đã hết hạn</span>
                    <?php elseif ($daSuDung): ?>
                    <span class="text-xs text-gray-500 font-medium">Đã sử dụng</span>
                    <?php else: ?>
                    <span class="text-xs text-[#8b0000] font-medium cursor-pointer hover:underline">Điều kiện</span>
                    <a href="<?= APP_URL ?>/san-pham" class="px-4 py-1.5 bg-[#8b0000] text-white text-xs font-medium rounded hover:bg-[#700000] transition-colors">Sử dụng</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center py-16">
        <iconify-icon icon="ph:ticket" class="text-5xl text-gray-300 mb-3"></iconify-icon>
        <h3 class="text-lg font-bold text-gray-900 mb-2">Chưa có voucher nào</h3>
        <p class="text-gray-500 mb-6">Hãy theo dõi trang khuyến mãi để nhận ưu đãi!</p>
        <a href="<?= APP_URL ?>/khuyen-mai" class="px-6 py-2.5 bg-[#8b0000] text-white rounded-xl font-medium hover:bg-[#700000] transition-colors text-sm">Xem khuyến mãi</a>
    </div>
    <?php endif; ?>
</div>
