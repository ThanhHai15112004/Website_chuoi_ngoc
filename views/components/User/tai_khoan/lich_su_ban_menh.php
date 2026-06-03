<?php
/**
 * Tab: Lịch Sử Tra Cứu Bản Mệnh Phong Thủy
 */

// $lich_su_ban_menh được truyền từ AccountController
$lichSu = $lich_su_ban_menh ?? [];

$menhColors = [
    'Kim'  => '#C0C0C0',
    'Mộc'  => '#228B22',
    'Thủy' => '#1C3A5E',
    'Hỏa'  => '#8B0000',
    'Thổ'  => '#8B4513',
];
$menhIcons = [
    'Kim' => '⚙️', 'Mộc' => '🌿', 'Thủy' => '💧', 'Hỏa' => '🔥', 'Thổ' => '🏔️',
];
$desireLabels = [
    'tai_loc'    => 'Tài Lộc & Công Danh',
    'binh_an'    => 'Bình An & Sức Khỏe',
    'tinh_duyen' => 'Tình Duyên & Gia Đạo',
    'ho_menh'    => 'Hộ Mệnh Chống Tà',
];
?>

<div id="tab-ban-menh" class="tab-content hidden">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-1">Bản Mệnh <span style="color:#8b0000;">Phong Thủy</span></h2>
        <p class="text-sm text-gray-500">Lịch sử các lần tra cứu bản mệnh của bạn tại Chuỗi Ngọc.</p>
    </div>

    <!-- CTA Tra cứu mới -->
    <div class="mb-6 p-5 rounded-2xl flex flex-col md:flex-row items-center gap-4 justify-between" style="background:linear-gradient(135deg,#1a1a1a,#2d2d2d);">
        <div class="text-white">
            <div class="font-bold text-lg mb-1">✨ Khám phá bản mệnh ngay</div>
            <p class="text-gray-400 text-sm">Tra cứu ngũ hành, cung phi, màu sắc cát tường và đá quý phù hợp nhất với bạn.</p>
        </div>
        <a href="<?= APP_URL ?>/vong-theo-menh" target="_blank" 
           class="shrink-0 inline-flex items-center gap-2 px-6 py-3 rounded-xl text-sm font-bold text-white transition-all hover:opacity-90"
           style="background:#8b0000;">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            Tra Cứu Bản Mệnh
        </a>
    </div>

    <?php if (empty($lichSu)): ?>
    <!-- Empty state -->
    <div class="text-center py-16 px-8 bg-white rounded-2xl border border-gray-100 shadow-sm">
        <div class="text-6xl mb-4">🔮</div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Chưa có lịch sử tra cứu</h3>
        <p class="text-gray-500 mb-6 max-w-sm mx-auto">Bạn chưa tra cứu bản mệnh lần nào. Hãy bắt đầu khám phá ngũ hành, cung phi và những gợi ý phong thủy dành riêng cho bạn.</p>
        <a href="<?= APP_URL ?>/vong-theo-menh" 
           class="inline-flex items-center gap-2 px-6 py-3 rounded-xl text-white font-semibold text-sm hover:opacity-90 transition-all"
           style="background:#8b0000;">
            Tra cứu ngay <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
        </a>
    </div>
    
    <?php else: ?>
    
    <!-- History list -->
    <div class="space-y-4">
        <?php foreach ($lichSu as $item):
            $menhColor = $menhColors[$item['ten_menh']] ?? '#8b0000';
            $menhIcon  = $menhIcons[$item['ten_menh']] ?? '☯';
            $ngayTra   = date('d/m/Y H:i', strtotime($item['ngay_tra']));
            $gioi      = $item['gioi_tinh'] === 'male' ? 'Nam' : 'Nữ';
            $lich      = $item['loai_lich'] === 'duong' ? 'DL' : 'ÂL';
            $desire    = $desireLabels[$item['mong_muon']] ?? null;
        ?>
        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden hover:shadow-md transition-shadow">
            <div class="flex items-center gap-4 p-5">
                <!-- Mệnh Badge -->
                <div class="shrink-0 w-16 h-16 rounded-2xl flex flex-col items-center justify-center text-white text-center shadow-md"
                     style="background:<?= $menhColor ?>;">
                    <span class="text-xl leading-none"><?= $menhIcon ?></span>
                    <span class="text-[10px] font-bold mt-1"><?= $item['ten_menh'] ?></span>
                </div>
                
                <!-- Thông tin -->
                <div class="flex-1 min-w-0">
                    <div class="flex items-start justify-between gap-2 flex-wrap">
                        <div>
                            <h4 class="font-bold text-gray-900">
                                <?= $item['thien_can'] ?> <?= $item['dia_chi'] ?>
                                – Mệnh <span style="color:<?= $menhColor ?>;"><?= $item['ten_menh'] ?></span>
                            </h4>
                            <p class="text-sm text-gray-500 mt-0.5">
                                <?= $gioi ?> · <?= sprintf('%02d/%02d/%d', $item['ngay_sinh'], $item['thang_sinh'], $item['nam_sinh']) ?> (<?= $lich ?>)
                                · Cung <?= $item['cung_phi'] ?> – <?= $item['ten_cung'] ?>
                                · <?= $item['nhom_menh'] ?>
                            </p>
                        </div>
                        <span class="text-xs text-gray-400 shrink-0"><?= $ngayTra ?></span>
                    </div>
                    
                    <div class="flex flex-wrap items-center gap-2 mt-2">
                        <?php if ($desire): ?>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-700">
                            <?= $desire ?>
                        </span>
                        <?php endif; ?>
                        <span class="px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-600">
                            <?= $item['nhom_menh'] ?>
                        </span>
                    </div>
                </div>
                
                <!-- Nút xem chi tiết -->
                <a href="<?= APP_URL ?>/vong-theo-menh/ket-qua/<?= $item['slug_ket_qua'] ?>"
                   class="shrink-0 inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-bold text-white transition-all hover:opacity-80 hover:shadow-md"
                   style="background:<?= $menhColor ?>;">
                    Xem Chi Tiết
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    
    <?php endif; ?>
</div>
