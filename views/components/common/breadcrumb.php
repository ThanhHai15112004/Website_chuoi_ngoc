<?php
/**
 * Component: Breadcrumb dùng chung (Kiểu Khuyến Mãi - rounded pill)
 * 
 * Biến cần truyền vào trước khi include:
 * @var array $breadcrumb_items - Mảng các mục breadcrumb
 *   Mỗi phần tử là mảng chứa:
 *     - 'ten'  (string) Tên hiển thị
 *     - 'url'  (string|null) Đường dẫn (null = trang hiện tại)
 *     - 'icon' (string) Tên icon Iconify (vd: 'ph:house-bold')
 * 
 * Ví dụ sử dụng:
 * $breadcrumb_items = [
 *     ['ten' => 'Trang Chủ', 'url' => APP_URL . '/', 'icon' => 'ph:house-bold'],
 *     ['ten' => 'Sản Phẩm', 'url' => null, 'icon' => 'ph:shopping-bag-bold'],
 * ];
 * require_once __DIR__ . '/../common/breadcrumb.php';
 */
?>
<div class="container mx-auto px-4 mb-8 lg:px-8 pt-4">
    <nav aria-label="Breadcrumb">
        <ol class="inline-flex items-center gap-1.5 p-1.5 bg-white rounded-full shadow-[0_2px_10px_-3px_rgba(0,0,0,0.05)] border border-gray-100">
            <?php foreach ($breadcrumb_items as $index => $item): ?>
                <?php if ($index > 0): ?>
                    <!-- Separator -->
                    <li aria-hidden="true" class="flex items-center px-1">
                        <iconify-icon icon="ph:caret-right-bold" class="text-gray-300 text-xs"></iconify-icon>
                    </li>
                <?php endif; ?>

                <?php $is_last = ($index === count($breadcrumb_items) - 1); ?>
                
                <?php if (!$is_last && isset($item['url'])): ?>
                    <!-- Link item -->
                    <li>
                        <a href="<?= $item['url'] ?>" class="flex items-center gap-1.5 px-3 py-1.5 rounded-full hover:bg-gray-50 text-gray-500 hover:text-[#8B0000] transition-colors">
                            <iconify-icon icon="<?= $item['icon'] ?>" class="text-lg"></iconify-icon>
                            <span class="text-sm font-medium"><?= htmlspecialchars($item['ten']) ?></span>
                        </a>
                    </li>
                <?php else: ?>
                    <!-- Active (current page) -->
                    <li aria-current="page">
                        <div class="flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-red-50 text-[#8B0000] border border-red-100">
                            <iconify-icon icon="<?= $item['icon'] ?>" class="text-lg"></iconify-icon>
                            <span class="text-sm font-bold tracking-wide"><?= htmlspecialchars($item['ten']) ?></span>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ol>
    </nav>
</div>
