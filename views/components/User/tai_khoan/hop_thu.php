<?php
$userThongBao = $thong_bao ?? [];

// Map icon theo loại thông báo
$iconMap = [
    'don_hang' => ['icon' => 'ph:package', 'bg' => 'bg-blue-50', 'color' => 'text-blue-600'],
    'khuyen_mai' => ['icon' => 'ph:tag', 'bg' => 'bg-green-50', 'color' => 'text-green-600'],
    'he_thong' => ['icon' => 'ph:gear', 'bg' => 'bg-gray-100', 'color' => 'text-gray-600'],
    'thanh_vien' => ['icon' => 'ph:crown-simple', 'bg' => 'bg-yellow-50', 'color' => 'text-yellow-600'],
];
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Thông báo</h2>
            <p class="text-gray-500 mt-1">Cập nhật mới nhất về đơn hàng và ưu đãi</p>
        </div>
        <?php if (!empty($userThongBao)): ?>
        <button onclick="docTatCaThongBao()" class="text-sm text-[#8b0000] font-medium hover:opacity-80 transition-opacity flex items-center gap-1">
            <iconify-icon icon="ph:checks"></iconify-icon> Đọc tất cả
        </button>
        <?php endif; ?>
    </div>

    <?php if (!empty($userThongBao)): ?>
    <div class="space-y-3">
        <?php foreach ($userThongBao as $tb): ?>
        <?php 
        $loai = $tb['loai_thong_bao'] ?? 'he_thong';
        $ic = $iconMap[$loai] ?? $iconMap['he_thong'];
        $chuaDoc = !$tb['da_doc'];
        ?>
        <div class="flex items-start gap-4 p-4 rounded-xl border transition-all <?= $chuaDoc ? 'border-red-100 bg-red-50/30' : 'border-gray-100 bg-white hover:bg-gray-50' ?>" id="tb-<?= htmlspecialchars($tb['id']) ?>">
            <div class="w-10 h-10 rounded-full <?= $ic['bg'] ?> <?= $ic['color'] ?> flex items-center justify-center shrink-0">
                <iconify-icon icon="<?= $ic['icon'] ?>" class="text-xl"></iconify-icon>
            </div>
            <div class="flex-1 min-w-0">
                <div class="flex items-start justify-between gap-2">
                    <h3 class="font-semibold text-gray-900 text-sm <?= $chuaDoc ? '' : 'font-normal' ?>"><?= htmlspecialchars($tb['tieu_de']) ?></h3>
                    <?php if ($chuaDoc): ?>
                    <span class="w-2.5 h-2.5 bg-[#8b0000] rounded-full shrink-0 mt-1.5"></span>
                    <?php endif; ?>
                </div>
                <p class="text-sm text-gray-600 mt-1 line-clamp-2"><?= htmlspecialchars($tb['noi_dung']) ?></p>
                <div class="flex items-center justify-between mt-2">
                    <span class="text-xs text-gray-400"><?= date('d/m/Y H:i', strtotime($tb['ngay_tao'])) ?></span>
                    <?php if (!empty($tb['link'])): ?>
                    <a href="<?= htmlspecialchars($tb['link']) ?>" class="text-xs text-[#8b0000] font-medium hover:opacity-80 transition-opacity">Xem chi tiết →</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center py-16">
        <iconify-icon icon="ph:bell-slash" class="text-5xl text-gray-300 mb-3"></iconify-icon>
        <h3 class="text-lg font-bold text-gray-900 mb-2">Chưa có thông báo nào</h3>
        <p class="text-gray-500">Bạn sẽ nhận thông báo khi có cập nhật về đơn hàng hoặc ưu đãi mới.</p>
    </div>
    <?php endif; ?>
</div>

<script>
function docTatCaThongBao() {
    fetch('<?= APP_URL ?>/tai-khoan/doc-thong-bao', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id=all'
    }).then(r => r.json()).then(data => {
        if (data.success) {
            document.querySelectorAll('[id^="tb-"]').forEach(el => {
                el.classList.remove('border-red-100', 'bg-red-50/30');
                el.classList.add('border-gray-100', 'bg-white');
                const dot = el.querySelector('.bg-\\[\\#8b0000\\]');
                if (dot) dot.remove();
            });
            Toast.fire({ icon: 'success', title: 'Đã đọc tất cả thông báo' });
        }
    });
}
</script>
