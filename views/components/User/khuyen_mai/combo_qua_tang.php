<?php
// views/components/User/khuyen_mai/combo_qua_tang.php
$combos = [
    [
        'title' => 'Vòng ngọc + hộp quà cao cấp',
        'desc' => 'Tặng kèm hộp nhung đỏ sang trọng và thẻ bảo hành mạ vàng.',
        'save' => '50.000đ',
        'image' => APP_URL . '/public/images/Sản phẩm/Vòng Ngọc/Hồng Anh Đào Ngọc Nương Tử/hong-anh-dao-1.jpg'
    ],
    [
        'title' => 'Chuỗi đá + túi gấm + thiệp',
        'desc' => 'Phù hợp làm quà tặng người thân, đối tác nhân dịp đặc biệt.',
        'save' => '30.000đ',
        'image' => APP_URL . '/public/images/Sản phẩm/Tràng Hạt/Vòng Đá Mã Não/vong-da-ma-nao-1.jpg'
    ],
    [
        'title' => 'Cặp vòng bình an',
        'desc' => 'Ưu đãi đặc biệt cho đơn mua 2 sản phẩm vòng tay bất kỳ.',
        'save' => '15%',
        'image' => APP_URL . '/public/images/Sản phẩm/Trầm Hương và Nhang/tram-huong-1.jpg'
    ]
];
?>
<section id="combo-qua-tang">
    <div class="mb-8">
        <h2 class="font-semibold text-3xl text-gray-900 mb-2">Combo quà tặng ưu đãi</h2>
        <p class="text-gray-600">Những set quà tặng ý nghĩa với mức giá tiết kiệm hơn.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <?php foreach($combos as $c): ?>
        <div class="flex flex-col sm:flex-row bg-[#FFFDF9] rounded-2xl border border-amber-100/50 shadow-sm hover:shadow-md transition-shadow overflow-hidden group">
            <div class="w-full sm:w-2/5 aspect-square sm:aspect-auto relative overflow-hidden bg-white">
                <img src="<?= $c['image'] ?>" alt="<?= $c['title'] ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute top-2 left-2 bg-white/90 backdrop-blur text-[#8B0000] text-[10px] uppercase font-bold px-2 py-1 rounded border border-red-100 shadow-sm">
                    Tiết kiệm <?= $c['save'] ?>
                </div>
            </div>
            
            <div class="w-full sm:w-3/5 p-5 flex flex-col justify-center">
                <h3 class="font-semibold font-bold text-lg text-gray-900 mb-2 group-hover:text-[#8B0000] transition-colors"><?= $c['title'] ?></h3>
                <p class="text-sm text-gray-600 mb-4 line-clamp-3"><?= $c['desc'] ?></p>
                <a href="#" class="inline-flex items-center text-sm font-semibold text-[#8B0000] hover:text-[#660000] transition-colors mt-auto">
                    Xem chi tiết <iconify-icon icon="mdi:chevron-right" class="ml-1"></iconify-icon>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

