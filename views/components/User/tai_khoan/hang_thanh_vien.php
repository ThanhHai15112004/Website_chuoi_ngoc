<?php
$hangHienTai = $user['hang_thanh_vien'] ?? null;
$chiTieu = (float)($user['tong_chi_tieu'] ?? 0);
$allHangs = $tat_ca_hang ?? [];

// Color map cho từng hạng
$hangColors = [
    'Đồng'     => ['from' => 'from-orange-100', 'to' => 'to-amber-200', 'border' => 'border-orange-300', 'text' => 'text-orange-700', 'bar' => 'bg-orange-400', 'icon' => '🥉'],
    'Bạc'      => ['from' => 'from-gray-100', 'to' => 'to-gray-300', 'border' => 'border-gray-400', 'text' => 'text-gray-700', 'bar' => 'bg-gray-400', 'icon' => '🥈'],
    'Vàng'     => ['from' => 'from-yellow-50', 'to' => 'to-yellow-200', 'border' => 'border-yellow-300', 'text' => 'text-yellow-700', 'bar' => 'bg-yellow-500', 'icon' => '🥇'],
    'Kim Cương' => ['from' => 'from-blue-50', 'to' => 'to-indigo-200', 'border' => 'border-indigo-300', 'text' => 'text-indigo-700', 'bar' => 'bg-indigo-500', 'icon' => '💎'],
];
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900">Hạng thành viên</h2>
        <p class="text-gray-500 mt-1">Mua sắm nhiều hơn để nhận ưu đãi đặc biệt</p>
    </div>

    <!-- Current Tier Card -->
    <?php if ($hangHienTai): 
        $c = $hangColors[$hangHienTai['ten_hang']] ?? $hangColors['Đồng'];
    ?>
    <div class="bg-gradient-to-br <?= $c['from'] ?> <?= $c['to'] ?> rounded-2xl p-6 border <?= $c['border'] ?> mb-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white/20 rounded-full blur-2xl"></div>
        <div class="relative z-10">
            <div class="flex items-center justify-between mb-4">
                <div>
                    <p class="text-sm font-medium <?= $c['text'] ?> opacity-80">Hạng hiện tại</p>
                    <h3 class="text-3xl font-bold <?= $c['text'] ?>"><?= $c['icon'] ?> <?= htmlspecialchars($hangHienTai['ten_hang']) ?></h3>
                </div>
                <div class="text-right">
                    <p class="text-sm <?= $c['text'] ?> opacity-80">Giảm giá</p>
                    <p class="text-2xl font-bold <?= $c['text'] ?>"><?= (int)$hangHienTai['phan_tram_giam'] ?>%</p>
                </div>
            </div>
            
            <?php if ($hang_tiep_theo): ?>
            <?php 
            $chiTieuHangTiep = (float)$hang_tiep_theo['chi_tieu_toi_thieu'];
            $progress = $chiTieuHangTiep > 0 ? min(100, ($chiTieu / $chiTieuHangTiep) * 100) : 0;
            $conThieu = max(0, $chiTieuHangTiep - $chiTieu);
            ?>
            <div class="mt-4">
                <div class="flex justify-between text-xs <?= $c['text'] ?> mb-1">
                    <span>Chi tiêu: <?= number_format($chiTieu, 0, ',', '.') ?>đ</span>
                    <span><?= htmlspecialchars($hang_tiep_theo['ten_hang']) ?>: <?= number_format($chiTieuHangTiep, 0, ',', '.') ?>đ</span>
                </div>
                <div class="w-full bg-white/50 rounded-full h-2.5">
                    <div class="<?= $c['bar'] ?> h-2.5 rounded-full transition-all duration-500" style="width: <?= $progress ?>%"></div>
                </div>
                <p class="text-xs <?= $c['text'] ?> mt-2 text-right">Mua thêm <?= number_format($conThieu, 0, ',', '.') ?>đ để lên hạng <?= htmlspecialchars($hang_tiep_theo['ten_hang']) ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php else: ?>
    <div class="bg-gray-50 rounded-2xl p-6 border border-gray-200 mb-8 text-center">
        <p class="text-gray-500">Bạn chưa có hạng thành viên. Mua sắm để bắt đầu tích lũy!</p>
        <p class="text-sm text-gray-400 mt-2">Tổng chi tiêu hiện tại: <strong class="text-gray-700"><?= number_format($chiTieu, 0, ',', '.') ?>đ</strong></p>
    </div>
    <?php endif; ?>

    <!-- All Tiers -->
    <h3 class="text-lg font-bold text-gray-900 mb-4">Các hạng thành viên</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <?php foreach ($allHangs as $hang): 
            $hc = $hangColors[$hang['ten_hang']] ?? $hangColors['Đồng'];
            $isActive = $hangHienTai && $hangHienTai['id'] === $hang['id'];
        ?>
        <div class="border rounded-xl p-5 <?= $isActive ? $hc['border'] . ' bg-gradient-to-br ' . $hc['from'] . ' ' . $hc['to'] : 'border-gray-100 bg-white' ?> transition-all">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-2">
                    <span class="text-2xl"><?= $hc['icon'] ?></span>
                    <h4 class="font-bold <?= $isActive ? $hc['text'] : 'text-gray-900' ?>"><?= htmlspecialchars($hang['ten_hang']) ?></h4>
                    <?php if ($isActive): ?>
                    <span class="text-xs font-medium px-2 py-0.5 bg-white/60 rounded-full <?= $hc['text'] ?>">Hiện tại</span>
                    <?php endif; ?>
                </div>
                <span class="font-bold <?= $isActive ? $hc['text'] : 'text-[#8b0000]' ?>">-<?= (int)$hang['phan_tram_giam'] ?>%</span>
            </div>
            <p class="text-sm text-gray-500">Chi tiêu tối thiểu: <strong class="text-gray-700"><?= number_format($hang['chi_tieu_toi_thieu'], 0, ',', '.') ?>đ</strong></p>
            <?php if (!empty($hang['mo_ta'])): ?>
            <p class="text-xs text-gray-400 mt-1"><?= htmlspecialchars($hang['mo_ta']) ?></p>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>
