    <!-- Tabs Content Type -->
    <div class="flex items-center gap-2 overflow-x-auto scrollbar-hide mb-4">
        <?php
        $buildUrl = function($newType) use ($filters) {
            $params = $_GET;
            $params['type'] = $newType;
            if (isset($params['page'])) unset($params['page']); // reset page
            return '?' . http_build_query($params);
        };
        
        $currentType = $filters['type'] ?? 'all';
        $tabs = [
            'all' => ['label' => 'Tất cả', 'count' => $thong_ke['tong']],
            'danh_gia_sp' => ['label' => 'Đánh giá sản phẩm', 'count' => $thong_ke['tong']],
            'binh_luan_bv' => ['label' => 'Bình luận bài viết', 'count' => $thong_ke['binh_luan_bv']],
            'co_phan_hoi' => ['label' => 'Phản hồi từ cửa hàng', 'count' => $thong_ke['co_phan_hoi']]
        ];

        foreach ($tabs as $key => $tab):
            $isActive = $currentType === $key;
            $activeClass = $isActive 
                ? 'bg-[#6B0D18] text-white border-transparent' 
                : 'bg-white border-gray-200 text-gray-600 hover:bg-gray-50';
        ?>
            <a href="<?= $buildUrl($key) ?>" class="px-4 py-2 <?= $activeClass ?> border rounded-full text-sm font-medium whitespace-nowrap shrink-0 transition-colors inline-block text-center">
                <?= $tab['label'] ?> <?= $tab['count'] > 0 ? "({$tab['count']})" : "" ?>
            </a>
        <?php endforeach; ?>
    </div>

    <!-- Tabs Status -->
    <div class="border-b border-gray-200 mb-6 flex overflow-x-auto scrollbar-hide">
        <?php
        $buildUrlStatus = function($newStatus) {
            $params = $_GET;
            $params['status'] = $newStatus;
            if (isset($params['page'])) unset($params['page']); // reset page
            return '?' . http_build_query($params);
        };
        ?>
        <a href="<?= $buildUrlStatus('all') ?>" class="px-4 py-3 border-b-2 <?= empty($_GET['status']) || $_GET['status'] == 'all' ? 'border-[#6B0D18] text-[#6B0D18] font-bold' : 'border-transparent text-gray-500 hover:text-gray-800 font-medium' ?> text-sm whitespace-nowrap shrink-0">Tất cả</a>
        
        <a href="<?= $buildUrlStatus('cho_duyet') ?>" class="px-4 py-3 border-b-2 <?= ($_GET['status'] ?? '') == 'cho_duyet' ? 'border-[#6B0D18] text-[#6B0D18] font-bold' : 'border-transparent text-gray-500 hover:text-gray-800 font-medium' ?> text-sm whitespace-nowrap shrink-0 flex items-center gap-1.5">
            Chờ duyệt <span class="bg-amber-100 text-amber-700 text-[10px] font-bold px-2 py-0.5 rounded-full"><?= $thong_ke['cho_duyet'] ?></span>
        </a>
        
        <a href="<?= $buildUrlStatus('da_duyet') ?>" class="px-4 py-3 border-b-2 <?= ($_GET['status'] ?? '') == 'da_duyet' ? 'border-[#6B0D18] text-[#6B0D18] font-bold' : 'border-transparent text-gray-500 hover:text-gray-800 font-medium' ?> text-sm whitespace-nowrap shrink-0">Đã duyệt</a>
        
        <a href="<?= $buildUrlStatus('da_an') ?>" class="px-4 py-3 border-b-2 <?= ($_GET['status'] ?? '') == 'da_an' ? 'border-[#6B0D18] text-[#6B0D18] font-bold' : 'border-transparent text-gray-500 hover:text-gray-800 font-medium' ?> text-sm whitespace-nowrap shrink-0">Đã ẩn</a>
    </div>

