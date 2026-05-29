<?php
$currentTab = $_GET['tab'] ?? '';
$baseUrl = APP_URL . '/admin/ton-kho';

// Maintain other query params when switching tabs
$queryParams = $_GET;
unset($queryParams['tab']);
$queryString = !empty($queryParams) ? '&' . http_build_query($queryParams) : '';

$tabs = [
    '' => ['label' => 'Tất cả', 'count' => $stats['total_products'], 'color' => 'text-gray-700 hover:bg-gray-50'],
    'in_stock' => ['label' => 'Còn hàng', 'count' => $stats['in_stock'], 'color' => 'text-gray-700 hover:bg-gray-50'],
    'low_stock' => ['label' => 'Sắp hết hàng', 'count' => $stats['low_stock'], 'color' => 'text-amber-600 hover:bg-amber-50'],
    'out_of_stock' => ['label' => 'Hết hàng', 'count' => $stats['out_of_stock'], 'color' => 'text-red-600 hover:bg-red-50'],
    'high_stock' => ['label' => 'Tồn kho cao', 'count' => $stats['high_stock'], 'color' => 'text-purple-600 hover:bg-purple-50']
];
?>
<div class="flex items-center gap-2 overflow-x-auto pb-4 mb-2 sidebar-scroll">
    <?php foreach ($tabs as $key => $tab): ?>
        <?php
            $isActive = $currentTab === $key;
            $activeClass = $isActive ? 'bg-[#6B0D18] text-white shadow-sm border border-transparent' : 'bg-white border border-gray-200 ' . $tab['color'];
            
            // Clean up href if no query params
            $href = $baseUrl;
            if ($key || !empty($queryParams)) {
                $href .= '?' . ($key ? 'tab=' . $key : '') . ($key && !empty($queryParams) ? $queryString : ltrim($queryString, '&'));
            }
        ?>
        <a href="<?= $href ?>" class="px-4 py-2 rounded-full text-sm font-medium whitespace-nowrap transition-colors <?= $activeClass ?>">
            <?= $tab['label'] ?> (<?= $tab['count'] ?>)
        </a>
    <?php endforeach; ?>
</div>
