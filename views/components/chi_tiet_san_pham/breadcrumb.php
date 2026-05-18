<?php
/**
 * Component: Breadcrumb chi tiết sản phẩm
 */
?>
<nav class="flex text-[13px] text-gray-500 mb-2 font-inter" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2">
        <li class="inline-flex items-center">
            <a href="<?= APP_URL ?>" class="hover:text-[#8B0000] transition-colors duration-200">Trang chủ</a>
        </li>
        <li>
            <div class="flex items-center">
                <span class="mx-1.5 text-gray-400">/</span>
                <a href="<?= APP_URL ?>/san-pham" class="hover:text-[#8B0000] transition-colors duration-200">Sản phẩm</a>
            </div>
        </li>
        <li>
            <div class="flex items-center">
                <span class="mx-1.5 text-gray-400">/</span>
                <a href="<?= APP_URL ?>/san-pham?danh_muc=<?= urlencode($san_pham['danh_muc']) ?>" class="hover:text-[#8B0000] transition-colors duration-200"><?= htmlspecialchars($san_pham['danh_muc']) ?></a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <span class="mx-1.5 text-gray-400">/</span>
                <span class="text-gray-900 font-medium truncate max-w-[150px] md:max-w-xs" title="<?= htmlspecialchars($san_pham['ten']) ?>">
                    <?= htmlspecialchars($san_pham['ten']) ?>
                </span>
            </div>
        </li>
    </ol>
</nav>
