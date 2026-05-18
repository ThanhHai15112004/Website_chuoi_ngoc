<?php
/**
 * Component: Đánh giá sản phẩm
 */

// Mock data for reviews
$danh_gia_list = [
    [
        'ten' => 'Ng*** A.',
        'sao' => 5,
        'ngay' => '12/05/2026',
        'phan_loai' => 'Size: 16cm, Hạt: 8mm',
        'noi_dung' => 'Vòng ngọc rất đẹp, màu xanh ngọc bích tự nhiên sáng bóng. Đeo vào tay cảm giác rất mát. Shop đóng gói cẩn thận, giao hàng nhanh. Sẽ ủng hộ thêm!',
        'hinh_anh' => [
            APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-3.jpg',
            APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-1.jpg'
        ]
    ],
    [
        'ten' => 'Tr*** T.',
        'sao' => 5,
        'ngay' => '08/05/2026',
        'phan_loai' => 'Size: 15cm, Hạt: 8mm',
        'noi_dung' => 'Sản phẩm đẹp như hình, mình mệnh Hỏa đeo rất hợp. Từ lúc đeo thấy tâm trạng thoải mái hơn hẳn.',
        'hinh_anh' => []
    ],
    [
        'ten' => 'L*** M.',
        'sao' => 4,
        'ngay' => '02/05/2026',
        'phan_loai' => 'Size: 17cm, Hạt: 10mm',
        'noi_dung' => 'Vòng đẹp, hạt đều, đá tự nhiên nên có vân mây nhìn rất hay. Tuy nhiên dây xỏ hơi căng một chút.',
        'hinh_anh' => [
            APP_URL . '/images/Sản phẩm/Vòng Ngọc/Ngọc Tụ Nham Vân Mây/ngoc-tu-nham-vay-may-2.jpg'
        ]
    ]
];
?>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 md:p-8">
    <h2 class="text-2xl font-semibold text-gray-900 mb-6 flex items-center">
        <i class="fas fa-star text-[#D4AF37] mr-3"></i>
        Đánh Giá Của Khách Hàng
    </h2>

    <!-- Overview -->
    <div class="flex flex-col md:flex-row items-center gap-8 mb-10 pb-10 border-b border-gray-100">
        <!-- Average Rating -->
        <div class="text-center md:w-1/3">
            <div class="text-5xl font-bold text-[#8B0000] mb-2"><?= number_format($san_pham['danh_gia'], 1) ?></div>
            <div class="flex justify-center text-[#D4AF37] text-xl mb-2">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <div class="text-gray-500 text-sm"><?= $san_pham['tong_danh_gia'] ?> đánh giá</div>
        </div>

        <!-- Rating Bars -->
        <div class="md:w-2/3 w-full space-y-3">
            <?php foreach ([5, 4, 3, 2, 1] as $sao): 
                $percent = $sao === 5 ? 85 : ($sao === 4 ? 10 : ($sao === 3 ? 5 : 0));
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
        <?php foreach ($danh_gia_list as $review): ?>
        <div class="border-b border-gray-100 pb-8 last:border-0 last:pb-0">
            <div class="flex justify-between items-start mb-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-[#FAF7F2] flex items-center justify-center text-[#8B0000] font-semibold">
                        <?= substr($review['ten'], 0, 1) ?>
                    </div>
                    <div>
                        <div class="font-medium text-gray-900"><?= $review['ten'] ?></div>
                        <div class="flex items-center mt-1">
                            <div class="flex text-[#D4AF37] text-xs mr-2">
                                <?php for ($i = 0; $i < $review['sao']; $i++): ?>
                                    <i class="fas fa-star"></i>
                                <?php endfor; ?>
                                <?php for ($i = $review['sao']; $i < 5; $i++): ?>
                                    <i class="far fa-star"></i>
                                <?php endfor; ?>
                            </div>
                            <span class="text-xs text-green-600 bg-green-50 px-2 py-0.5 rounded-full flex items-center">
                                <i class="fas fa-check-circle mr-1"></i> Đã mua hàng
                            </span>
                        </div>
                    </div>
                </div>
                <div class="text-sm text-gray-400"><?= $review['ngay'] ?></div>
            </div>

            <div class="text-sm text-gray-500 mb-3 ml-13">Phân loại: <?= $review['phan_loai'] ?></div>
            
            <div class="text-gray-700 mb-4 ml-13 leading-relaxed">
                <?= $review['noi_dung'] ?>
            </div>

            <?php if (!empty($review['hinh_anh'])): ?>
            <div class="flex flex-wrap gap-3 ml-13">
                <?php foreach ($review['hinh_anh'] as $img): ?>
                <div class="w-20 h-20 rounded-lg overflow-hidden border border-gray-200 cursor-pointer hover:opacity-90 transition group relative">
                    <img src="<?= $img ?>" alt="Ảnh đánh giá" class="w-full h-full object-cover">
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
    
    <!-- Pagination/Load More -->
    <div class="mt-8 text-center">
        <button class="px-6 py-2.5 border border-[#8B0000] text-[#8B0000] font-medium rounded-full hover:bg-[#8B0000] hover:text-white transition duration-300">
            Xem Thêm Đánh Giá
        </button>
    </div>
</div>
