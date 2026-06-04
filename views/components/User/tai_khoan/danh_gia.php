<?php
$userDanhGia = $danh_gia ?? [];
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Đánh giá của tôi</h2>
        <p class="text-gray-500 mt-1">Lịch sử đánh giá sản phẩm bạn đã mua</p>
    </div>

    <?php if (!empty($userDanhGia)): ?>
    <div class="space-y-4">
        <?php foreach ($userDanhGia as $dg): ?>
        <div class="border border-gray-100 rounded-xl p-5 hover:shadow-sm transition-shadow">
            <div class="flex gap-4">
                <!-- Product Image -->
                <div class="w-16 h-16 rounded-xl bg-gray-50 overflow-hidden shrink-0 border border-gray-100">
                    <?php if (!empty($dg['hinh_anh'])): ?>
                    <img src="<?= get_image_url($dg['hinh_anh']) ?>" alt="<?= htmlspecialchars($dg['san_pham']) ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                    <div class="w-full h-full bg-[#8b0000] opacity-20"></div>
                    <?php endif; ?>
                </div>
                
                <div class="flex-1 min-w-0">
                    <!-- Product Name -->
                    <h3 class="font-bold text-gray-900 text-sm truncate mb-1"><?= htmlspecialchars($dg['san_pham']) ?></h3>
                    
                    <!-- Stars -->
                    <div class="flex items-center gap-1 mb-2">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                        <iconify-icon icon="heroicons:star-solid" class="w-4 h-4 <?= $i <= ($dg['sao'] ?? 0) ? 'text-[#D4AF37]' : 'text-gray-300' ?>"></iconify-icon>
                        <?php endfor; ?>
                        <span class="text-xs text-gray-400 ml-2"><?= date('d/m/Y', strtotime($dg['ngay'])) ?></span>
                    </div>
                    
                    <!-- Review Content -->
                    <?php if (!empty($dg['noi_dung'])): ?>
                    <p class="text-sm text-gray-600 leading-relaxed"><?= htmlspecialchars($dg['noi_dung']) ?></p>
                    <?php endif; ?>
                    
                    <!-- Status -->
                    <div class="mt-2">
                        <?php if ($dg['trang_thai'] == 1): ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-700">Đã duyệt</span>
                        <?php elseif ($dg['trang_thai'] == 0): ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-700">Chờ duyệt</span>
                        <?php else: ?>
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-700">Đã ẩn</span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php else: ?>
    <div class="text-center py-16">
        <iconify-icon icon="ph:star" class="text-5xl text-gray-300 mb-3"></iconify-icon>
        <h3 class="text-lg font-bold text-gray-900 mb-2">Chưa có đánh giá nào</h3>
        <p class="text-gray-500">Mua hàng và chia sẻ cảm nhận của bạn về sản phẩm!</p>
    </div>
    <?php endif; ?>
</div>
