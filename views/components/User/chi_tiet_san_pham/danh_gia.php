<?php
/**
 * Component: Đánh giá sản phẩm
 */

$diem_tb = $thong_ke_danh_gia['diem_trung_binh'] ?? 0;
$tong_dg = $thong_ke_danh_gia['tong_danh_gia'] ?? 0;
$phan_bo = $thong_ke_danh_gia['phan_bo'] ?? [5=>0, 4=>0, 3=>0, 2=>0, 1=>0];
?>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-8">
    <h2 class="text-2xl font-semibold text-gray-900 mb-6 flex items-center">
        <i class="fas fa-star text-[#D4AF37] mr-3"></i>
        Đánh Giá Của Khách Hàng
    </h2>

    <?php if ($tong_dg > 0): ?>
    <!-- Overview -->
    <div class="flex flex-col md:flex-row items-center gap-8 mb-10 pb-10 border-b border-gray-100">
        <!-- Average Rating -->
        <div class="text-center md:w-1/3">
            <div class="text-5xl font-bold text-[#8B0000] mb-2"><?= number_format($diem_tb, 1) ?></div>
            <div class="flex justify-center text-[#D4AF37] text-xl mb-2">
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <?php if ($i <= floor($diem_tb)): ?>
                        <i class="fas fa-star"></i>
                    <?php elseif ($i == ceil($diem_tb) && $diem_tb - floor($diem_tb) >= 0.5): ?>
                        <i class="fas fa-star-half-alt"></i>
                    <?php else: ?>
                        <i class="far fa-star"></i>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <div class="text-gray-500 text-sm"><?= $tong_dg ?> đánh giá</div>
        </div>

        <!-- Rating Bars -->
        <div class="md:w-2/3 w-full space-y-3">
            <?php foreach ([5, 4, 3, 2, 1] as $sao): 
                $percent = $phan_bo[$sao] ?? 0;
            ?>
            <div class="flex items-center text-sm">
                <div class="w-12 font-medium text-gray-700 flex items-center justify-end pr-3">
                    <?= $sao ?> <i class="fas fa-star text-[#D4AF37] text-xs ml-1"></i>
                </div>
                <div class="flex-1 h-2 bg-gray-100 rounded-full overflow-hidden">
                    <div class="h-full bg-[#8B0000] rounded-full" style="width: <?= $percent ?>%"></div>
                </div>
                <div class="w-12 text-right text-gray-500 pl-3"><?= $percent ?>%</div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Review List -->
    <div class="space-y-8">
        <?php foreach ($danh_gia_list as $review): 
            $ten_khach = $review['ten_khach'] ?: 'Khách hàng';
            $chu_cai_dau = mb_substr($ten_khach, 0, 1, "UTF-8");
            // Ẩn bớt tên
            if (mb_strlen($ten_khach) > 3) {
                $ten_khach = mb_substr($ten_khach, 0, 2) . '***' . mb_substr($ten_khach, -1);
            }
        ?>
        <div class="border-b border-gray-100 pb-8 last:border-0 last:pb-0">
            <div class="flex justify-between items-start mb-3">
                <div class="flex items-center gap-3">
                    <?php if (!empty($review['avatar_khach'])): ?>
                        <img src="<?= APP_URL . '/' . ltrim($review['avatar_khach'], '/') ?>" class="w-10 h-10 rounded-full object-cover border border-gray-200">
                    <?php else: ?>
                        <div class="w-10 h-10 rounded-full bg-[#FAF7F2] flex items-center justify-center text-[#8B0000] font-semibold">
                            <?= mb_strtoupper($chu_cai_dau, "UTF-8") ?>
                        </div>
                    <?php endif; ?>
                    <div>
                        <div class="font-medium text-gray-900"><?= htmlspecialchars($ten_khach) ?></div>
                        <div class="flex items-center mt-1">
                            <div class="flex text-[#D4AF37] text-xs mr-2">
                                <?php for ($i = 0; $i < $review['so_sao']; $i++): ?>
                                    <i class="fas fa-star"></i>
                                <?php endfor; ?>
                                <?php for ($i = $review['so_sao']; $i < 5; $i++): ?>
                                    <i class="far fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <span class="text-xs text-green-600 bg-green-50 px-2 py-0.5 rounded-full flex items-center">
                                <i class="fas fa-check-circle mr-1"></i> Đã mua hàng
                            </span>
                        </div>
                    </div>
                </div>
                <div class="text-sm text-gray-400"><?= date('d/m/Y', strtotime($review['ngay_tao'])) ?></div>
            </div>

            <?php if (!empty($review['bien_the_mua'])): ?>
            <div class="text-sm text-gray-500 mb-3 ml-13">Phân loại: <?= htmlspecialchars($review['bien_the_mua']) ?></div>
            <?php endif; ?>
            
            <div class="text-gray-700 mb-4 ml-13 leading-relaxed">
                <?= nl2br(htmlspecialchars($review['noi_dung'])) ?>
            </div>

            <?php if (!empty($review['hinh_anh'])): 
                $hinh_anh = explode(',', $review['hinh_anh']);
            ?>
            <div class="flex flex-wrap gap-3 ml-13">
                <?php foreach ($hinh_anh as $img): ?>
                <div class="w-20 h-20 rounded-lg overflow-hidden border border-gray-200 cursor-pointer hover:opacity-90 transition group relative">
                    <img src="<?= APP_URL . '/' . ltrim(trim($img), '/') ?>" alt="Ảnh đánh giá" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition flex items-center justify-center">
                        <i class="fas fa-search-plus text-white"></i>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    
    <?php if ($tong_dg > count($danh_gia_list)): ?>
    <!-- Pagination/Load More -->
    <div class="mt-8 text-center">
        <button class="px-6 py-2.5 border border-[#8B0000] text-[#8B0000] font-medium rounded-full hover:bg-[#8B0000] hover:text-white transition duration-300">
            Xem Thêm Đánh Giá
        </button>
    </div>
    <?php endif; ?>
    
    <?php else: ?>
        <div class="text-center py-10">
            <div class="text-gray-400 mb-3"><i class="fas fa-comment-slash text-4xl"></i></div>
            <p class="text-gray-500">Chưa có đánh giá nào cho sản phẩm này.</p>
        </div>
    <?php endif; ?>
</div>
