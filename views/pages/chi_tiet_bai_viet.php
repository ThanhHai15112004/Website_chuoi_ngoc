<?php
// views/pages/chi_tiet_bai_viet.php
$article = $data['article'] ?? [];
$related_articles = $data['related_articles'] ?? [];
$related_products = $data['related_products'] ?? [];
?>

<div class="py-4 bg-white">
<?php 
if (isset($breadcrumbs) && !empty($breadcrumbs)) {
    $breadcrumb_items = [];
    foreach ($breadcrumbs as $index => $crumb) {
        $icon = 'ph:article-bold';
        if ($index === 0) $icon = 'ph:house-bold';
        elseif ($index === count($breadcrumbs) - 1) $icon = 'ph:file-text-bold';
        
        $breadcrumb_items[] = [
            'ten' => $crumb['ten'],
            'url' => $crumb['url'] ?? null,
            'icon' => $crumb['icon'] ?? $icon,
        ];
    }
} else {
    $breadcrumb_items = [
        ['ten' => 'Trang Chủ', 'url' => APP_URL . '/', 'icon' => 'ph:house-bold'],
        ['ten' => 'Chi tiết bài viết', 'url' => null, 'icon' => 'ph:file-text-bold'],
    ];
}
require_once __DIR__ . '/../components/common/breadcrumb.php'; 
?>
</div>

<div class="bg-gray-50 min-h-screen py-8">
    <div class="container mx-auto px-4 max-w-7xl">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Content Area -->
            <div class="w-full lg:w-2/3 bg-white rounded-2xl shadow-sm p-6 lg:p-8">
                <?php require __DIR__ . '/../components/User/chi_tiet_bai_viet/header_bai_viet.php'; ?>
                <?php require __DIR__ . '/../components/User/chi_tiet_bai_viet/noi_dung.php'; ?>
                <?php require __DIR__ . '/../components/User/chi_tiet_bai_viet/binh_luan.php'; ?>
            </div>

            <!-- Sidebar -->
            <div class="w-full lg:w-1/3">
                <?php require __DIR__ . '/../components/User/chi_tiet_bai_viet/sidebar.php'; ?>
            </div>
        </div>
    </div>
</div>


