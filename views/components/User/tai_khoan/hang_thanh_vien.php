<?php
$hangHienTai = $user['hang_thanh_vien'] ?? null;
$chiTieu = (float)($user['tong_chi_tieu'] ?? 0);
$allHangs = $tat_ca_hang ?? [];
$tenHangHienTai = $hangHienTai['ten_hang'] ?? '';

// Color map cho từng hạng
$hangColors = [
    'Đồng'      => ['grad' => 'from-amber-50 via-orange-100 to-amber-200', 'border' => 'border-amber-300', 'text' => 'text-amber-800', 'textLight' => 'text-amber-700', 'bar' => 'bg-amber-500', 'bar_bg' => 'bg-amber-200', 'icon' => '🥉', 'dot' => 'bg-amber-500', 'ring' => 'ring-amber-300', 'badge_bg' => 'bg-amber-100', 'badge_text' => 'text-amber-700', 'step_bg' => 'bg-amber-50'],
    'Bạc'       => ['grad' => 'from-gray-50 via-slate-100 to-gray-200', 'border' => 'border-gray-300', 'text' => 'text-slate-700', 'textLight' => 'text-slate-600', 'bar' => 'bg-slate-500', 'bar_bg' => 'bg-gray-200', 'icon' => '🥈', 'dot' => 'bg-slate-400', 'ring' => 'ring-gray-300', 'badge_bg' => 'bg-gray-100', 'badge_text' => 'text-gray-600', 'step_bg' => 'bg-gray-50'],
    'Vàng'      => ['grad' => 'from-yellow-50 via-amber-100 to-yellow-200', 'border' => 'border-yellow-300', 'text' => 'text-yellow-800', 'textLight' => 'text-yellow-700', 'bar' => 'bg-yellow-500', 'bar_bg' => 'bg-yellow-200', 'icon' => '🥇', 'dot' => 'bg-yellow-500', 'ring' => 'ring-yellow-300', 'badge_bg' => 'bg-yellow-100', 'badge_text' => 'text-yellow-700', 'step_bg' => 'bg-yellow-50'],
    'Kim Cương'  => ['grad' => 'from-cyan-50 via-blue-100 to-indigo-200', 'border' => 'border-indigo-300', 'text' => 'text-indigo-800', 'textLight' => 'text-indigo-700', 'bar' => 'bg-indigo-500', 'bar_bg' => 'bg-indigo-200', 'icon' => '💎', 'dot' => 'bg-indigo-500', 'ring' => 'ring-indigo-300', 'badge_bg' => 'bg-indigo-100', 'badge_text' => 'text-indigo-700', 'step_bg' => 'bg-indigo-50'],
];
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900">Hạng thành viên</h2>
        <p class="text-gray-500 mt-1">Mua sắm nhiều hơn để nhận ưu đãi đặc biệt</p>
    </div>

    <!-- Current Tier Hero Card -->
    <?php if ($hangHienTai): 
        $c = $hangColors[$tenHangHienTai] ?? $hangColors['Đồng'];
    ?>
    <div class="bg-gradient-to-br <?= $c['grad'] ?> rounded-2xl p-6 lg:p-8 border <?= $c['border'] ?> mb-10 relative overflow-hidden">
        <div class="absolute top-0 right-0 -mt-6 -mr-6 w-40 h-40 bg-white/20 rounded-full blur-2xl"></div>
        <div class="absolute bottom-0 left-0 -mb-8 -ml-8 w-32 h-32 bg-white/15 rounded-full blur-2xl"></div>
        <div class="relative z-10">
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <p class="text-sm font-medium <?= $c['textLight'] ?> opacity-80 mb-1">Hạng hiện tại của bạn</p>
                    <h3 class="text-4xl font-bold <?= $c['text'] ?>"><?= $c['icon'] ?> <?= htmlspecialchars($tenHangHienTai) ?></h3>
                </div>
                <div class="text-right sm:text-right">
                    <p class="text-sm <?= $c['textLight'] ?> opacity-80">Ưu đãi giảm giá</p>
                    <p class="text-4xl font-bold <?= $c['text'] ?>"><?= (int)$hangHienTai['phan_tram_giam'] ?>%</p>
                </div>
            </div>
            
            <?php if ($hang_tiep_theo): ?>
            <?php 
            $chiTieuHangTiep = (float)$hang_tiep_theo['chi_tieu_toi_thieu'];
            $progress = $chiTieuHangTiep > 0 ? min(100, ($chiTieu / $chiTieuHangTiep) * 100) : 0;
            $conThieu = max(0, $chiTieuHangTiep - $chiTieu);
            $cNext = $hangColors[$hang_tiep_theo['ten_hang']] ?? $hangColors['Đồng'];
            ?>
            <div class="mt-2 bg-white/40 rounded-xl p-4">
                <div class="flex justify-between text-sm <?= $c['text'] ?> mb-2 font-medium">
                    <span>Tổng chi tiêu: <?= number_format($chiTieu, 0, ',', '.') ?>đ</span>
                    <span><?= $cNext['icon'] ?> <?= htmlspecialchars($hang_tiep_theo['ten_hang']) ?>: <?= number_format($chiTieuHangTiep, 0, ',', '.') ?>đ</span>
                </div>
                <div class="w-full bg-white/60 rounded-full h-3 shadow-inner">
                    <div class="<?= $c['bar'] ?> h-3 rounded-full transition-all duration-700 shadow-sm relative" style="width: <?= $progress ?>%">
                        <?php if ($progress > 5): ?>
                        <span class="absolute right-1 top-1/2 -translate-y-1/2 text-[10px] text-white font-bold"><?= round($progress) ?>%</span>
                        <?php endif; ?>
                    </div>
                </div>
                <p class="text-xs <?= $c['textLight'] ?> mt-2 text-center font-medium">
                    Mua thêm <strong><?= number_format($conThieu, 0, ',', '.') ?>đ</strong> để lên hạng <strong><?= htmlspecialchars($hang_tiep_theo['ten_hang']) ?></strong>
                </p>
            </div>
            <?php else: ?>
            <div class="mt-2 bg-white/40 rounded-xl p-4 text-center">
                <p class="text-sm <?= $c['text'] ?> font-medium">🎉 Chúc mừng! Bạn đang ở hạng cao nhất!</p>
                <p class="text-xs <?= $c['textLight'] ?> mt-1">Tổng chi tiêu: <strong><?= number_format($chiTieu, 0, ',', '.') ?>đ</strong></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php else: ?>
    <div class="bg-gray-50 rounded-2xl p-8 border border-gray-200 mb-10 text-center">
        <div class="text-5xl mb-3">🎯</div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Bắt đầu hành trình thành viên</h3>
        <p class="text-gray-500 mb-2">Mua sắm để tích lũy chi tiêu và nhận hạng thành viên với nhiều ưu đãi!</p>
        <p class="text-sm text-gray-400">Tổng chi tiêu hiện tại: <strong class="text-gray-700"><?= number_format($chiTieu, 0, ',', '.') ?>đ</strong></p>
    </div>
    <?php endif; ?>

    <!-- Membership Roadmap Stepper -->
    <h3 class="text-lg font-bold text-gray-900 mb-6">Lộ trình thăng hạng</h3>
    
    <!-- Desktop Stepper -->
    <div class="hidden md:block mb-8">
        <div class="relative">
            <!-- Connection Line -->
            <div class="absolute top-8 left-0 right-0 h-1 bg-gray-200 rounded-full mx-16"></div>
            <?php 
            $totalHangs = count($allHangs);
            $currentFound = false;
            $currentIndex = -1;
            foreach ($allHangs as $idx => $h) {
                if ($hangHienTai && $hangHienTai['id'] === $h['id']) {
                    $currentIndex = $idx;
                    break;
                }
            }
            ?>
            <!-- Active progress line -->
            <?php if ($currentIndex >= 0 && $totalHangs > 1): ?>
            <div class="absolute top-8 left-0 h-1 bg-[#8b0000] rounded-full mx-16 transition-all duration-700" style="width: calc(<?= ($currentIndex / ($totalHangs - 1)) * 100 ?>% - 128px + <?= ($currentIndex / ($totalHangs - 1)) * 128 ?>px)"></div>
            <?php endif; ?>
            
            <div class="relative flex justify-between">
                <?php foreach ($allHangs as $idx => $hang): 
                    $hc = $hangColors[$hang['ten_hang']] ?? $hangColors['Đồng'];
                    $isActive = $hangHienTai && $hangHienTai['id'] === $hang['id'];
                    $isPassed = $currentIndex >= 0 && $idx < $currentIndex;
                    $isFuture = $currentIndex >= 0 && $idx > $currentIndex;
                    $isNoRank = $currentIndex < 0; // user chưa có hạng
                ?>
                <div class="flex flex-col items-center group relative" style="width: <?= 100 / $totalHangs ?>%">
                    <!-- Step Circle -->
                    <div class="w-16 h-16 rounded-full flex items-center justify-center text-2xl border-4 transition-all duration-300 shadow-sm
                        <?php if ($isActive): ?>
                            <?= $hc['step_bg'] ?> border-[#8b0000] ring-4 <?= $hc['ring'] ?> scale-110 shadow-lg
                        <?php elseif ($isPassed): ?>
                            bg-white border-green-400
                        <?php else: ?>
                            bg-gray-50 border-gray-200
                        <?php endif; ?>
                    ">
                        <?php if ($isPassed): ?>
                            <iconify-icon icon="ph:check-bold" class="text-green-500 text-xl"></iconify-icon>
                        <?php elseif ($isFuture || $isNoRank): ?>
                            <span class="opacity-40"><?= $hc['icon'] ?></span>
                        <?php else: ?>
                            <?= $hc['icon'] ?>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Label -->
                    <h4 class="text-sm font-bold mt-3 <?= $isActive ? 'text-[#8b0000]' : ($isPassed ? 'text-green-600' : 'text-gray-400') ?>"><?= htmlspecialchars($hang['ten_hang']) ?></h4>
                    
                    <?php if ($isActive): ?>
                    <span class="text-[10px] font-bold px-2 py-0.5 bg-[#8b0000] text-white rounded-full mt-1">Hiện tại</span>
                    <?php endif; ?>
                    
                    <p class="text-xs text-gray-400 mt-1"><?= number_format($hang['chi_tieu_toi_thieu'], 0, ',', '.') ?>đ</p>
                    <span class="text-xs font-bold <?= $isActive ? 'text-[#8b0000]' : ($isPassed ? 'text-green-600' : 'text-gray-400') ?>">-<?= (int)$hang['phan_tram_giam'] ?>%</span>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    
    <!-- Mobile Cards -->
    <div class="md:hidden space-y-3 mb-8">
        <?php foreach ($allHangs as $idx => $hang): 
            $hc = $hangColors[$hang['ten_hang']] ?? $hangColors['Đồng'];
            $isActive = $hangHienTai && $hangHienTai['id'] === $hang['id'];
            $isPassed = $currentIndex >= 0 && $idx < $currentIndex;
        ?>
        <div class="border rounded-xl p-4 flex items-center gap-4 transition-all
            <?= $isActive ? $hc['border'] . ' bg-gradient-to-r ' . $hc['grad'] . ' shadow-md' : ($isPassed ? 'border-green-200 bg-green-50/30' : 'border-gray-100 bg-white') ?>
        ">
            <div class="w-12 h-12 rounded-full flex items-center justify-center text-xl border-2 shrink-0
                <?= $isActive ? 'border-[#8b0000] ' . $hc['step_bg'] : ($isPassed ? 'border-green-400 bg-green-50' : 'border-gray-200 bg-gray-50') ?>
            ">
                <?php if ($isPassed): ?>
                    <iconify-icon icon="ph:check-bold" class="text-green-500"></iconify-icon>
                <?php else: ?>
                    <span class="<?= !$isActive ? 'opacity-40' : '' ?>"><?= $hc['icon'] ?></span>
                <?php endif; ?>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2">
                    <h4 class="font-bold <?= $isActive ? $hc['text'] : ($isPassed ? 'text-green-700' : 'text-gray-500') ?>"><?= htmlspecialchars($hang['ten_hang']) ?></h4>
                    <?php if ($isActive): ?>
                    <span class="text-[10px] font-bold px-2 py-0.5 bg-[#8b0000] text-white rounded-full">Hiện tại</span>
                    <?php endif; ?>
                </div>
                <p class="text-xs text-gray-400 mt-0.5">Chi tiêu tối thiểu: <strong class="text-gray-600"><?= number_format($hang['chi_tieu_toi_thieu'], 0, ',', '.') ?>đ</strong></p>
            </div>
            <span class="font-bold text-lg <?= $isActive ? 'text-[#8b0000]' : ($isPassed ? 'text-green-600' : 'text-gray-300') ?> shrink-0">-<?= (int)$hang['phan_tram_giam'] ?>%</span>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Benefits Comparison -->
    <h3 class="text-lg font-bold text-gray-900 mb-4">Quyền lợi theo hạng</h3>
    <div class="overflow-x-auto rounded-xl border border-gray-100">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-50">
                    <th class="text-left py-3 px-4 font-semibold text-gray-600 border-b border-gray-100">Quyền lợi</th>
                    <?php foreach ($allHangs as $hang): 
                        $hc = $hangColors[$hang['ten_hang']] ?? $hangColors['Đồng'];
                        $isActive = $hangHienTai && $hangHienTai['id'] === $hang['id'];
                    ?>
                    <th class="text-center py-3 px-3 border-b border-gray-100 <?= $isActive ? 'bg-red-50' : '' ?>">
                        <span class="text-lg"><?= $hc['icon'] ?></span>
                        <div class="text-xs font-bold <?= $isActive ? 'text-[#8b0000]' : 'text-gray-600' ?> mt-1"><?= htmlspecialchars($hang['ten_hang']) ?></div>
                    </th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-50">
                <tr>
                    <td class="py-3 px-4 text-gray-600 font-medium">Giảm giá đơn hàng</td>
                    <?php foreach ($allHangs as $hang): 
                        $isActive = $hangHienTai && $hangHienTai['id'] === $hang['id'];
                    ?>
                    <td class="text-center py-3 px-3 font-bold <?= $isActive ? 'text-[#8b0000] bg-red-50/50' : 'text-gray-700' ?>"><?= (int)$hang['phan_tram_giam'] ?>%</td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td class="py-3 px-4 text-gray-600 font-medium">Chi tiêu tối thiểu</td>
                    <?php foreach ($allHangs as $hang): 
                        $isActive = $hangHienTai && $hangHienTai['id'] === $hang['id'];
                    ?>
                    <td class="text-center py-3 px-3 <?= $isActive ? 'text-[#8b0000] bg-red-50/50 font-semibold' : 'text-gray-500' ?>"><?= number_format($hang['chi_tieu_toi_thieu'], 0, ',', '.') ?>đ</td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td class="py-3 px-4 text-gray-600 font-medium">Voucher độc quyền</td>
                    <?php foreach ($allHangs as $idx => $hang): 
                        $isActive = $hangHienTai && $hangHienTai['id'] === $hang['id'];
                    ?>
                    <td class="text-center py-3 px-3 <?= $isActive ? 'bg-red-50/50' : '' ?>">
                        <?php if ($idx >= 2): ?>
                        <iconify-icon icon="ph:check-circle-fill" class="text-green-500 text-lg"></iconify-icon>
                        <?php else: ?>
                        <iconify-icon icon="ph:minus" class="text-gray-300 text-lg"></iconify-icon>
                        <?php endif; ?>
                    </td>
                    <?php endforeach; ?>
                </tr>
                <tr>
                    <td class="py-3 px-4 text-gray-600 font-medium">Ưu tiên hỗ trợ CSKH</td>
                    <?php foreach ($allHangs as $idx => $hang): 
                        $isActive = $hangHienTai && $hangHienTai['id'] === $hang['id'];
                    ?>
                    <td class="text-center py-3 px-3 <?= $isActive ? 'bg-red-50/50' : '' ?>">
                        <?php if ($idx >= 1): ?>
                        <iconify-icon icon="ph:check-circle-fill" class="text-green-500 text-lg"></iconify-icon>
                        <?php else: ?>
                        <iconify-icon icon="ph:minus" class="text-gray-300 text-lg"></iconify-icon>
                        <?php endif; ?>
                    </td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>
