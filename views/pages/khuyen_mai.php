<?php
// views/pages/khuyen_mai.php
?>
<main class="bg-[#FAF9F6] pb-16 overflow-hidden">
    <!-- Banner Khuyến Mãi -->
    <?php require_once __DIR__ . '/../components/khuyen_mai/banner.php'; ?>

    <!-- Breadcrumb -->
    <div class="container mx-auto px-4 lg:px-8 pt-6 mb-6">
        <nav aria-label="Breadcrumb">
            <ol class="inline-flex items-center gap-1.5 p-1.5 bg-white rounded-full shadow-[0_2px_10px_-3px_rgba(0,0,0,0.05)] border border-gray-100">
                <!-- Home -->
                <li>
                    <a href="<?= APP_URL ?>/" class="flex items-center gap-2 px-3 py-1.5 rounded-full hover:bg-gray-50 transition-colors">
                        <div class="flex items-center justify-center w-7 h-7 rounded-lg bg-gray-50 text-gray-500">
                            <iconify-icon icon="ph:house-bold" class="text-lg"></iconify-icon>
                        </div>
                        <span class="text-sm font-medium text-gray-600">Trang Chủ</span>
                    </a>
                </li>
                
                <!-- Separator -->
                <li aria-hidden="true" class="flex items-center px-1">
                    <iconify-icon icon="ph:caret-right-bold" class="text-gray-300 text-xs"></iconify-icon>
                </li>
                
                <!-- Active Page -->
                <li aria-current="page">
                    <div class="flex items-center gap-2 px-4 py-1.5 rounded-full bg-[#8B0000]">
                        <div class="flex items-center justify-center w-7 h-7 rounded-lg bg-white/20 text-white">
                            <iconify-icon icon="ph:gift-bold" class="text-lg"></iconify-icon>
                        </div>
                        <span class="text-sm font-bold text-white tracking-wide">Khuyến Mãi</span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>

    <div class="container mx-auto px-4 lg:px-8 space-y-20">
        <!-- Voucher Hot -->
        <?php require_once __DIR__ . '/../components/khuyen_mai/danh_sach_voucher.php'; ?>

        <!-- Flash Sale -->
        <?php require_once __DIR__ . '/../components/khuyen_mai/flash_sale.php'; ?>

        <!-- Sản phẩm đang khuyến mãi -->
        <?php require_once __DIR__ . '/../components/khuyen_mai/san_pham_giam_gia.php'; ?>

        <!-- Khối Freeship -->
        <?php require_once __DIR__ . '/../components/khuyen_mai/khoi_freeship.php'; ?>

        <!-- Combo quà tặng -->
        <?php require_once __DIR__ . '/../components/khuyen_mai/combo_qua_tang.php'; ?>

        <!-- Ưu đãi đặc quyền thành viên -->
        <?php require_once __DIR__ . '/../components/khuyen_mai/uu_dai_thanh_vien.php'; ?>

        <!-- Điều khoản và FAQ -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Điều kiện áp dụng -->
            <?php require_once __DIR__ . '/../components/khuyen_mai/dieu_kien_ap_dung.php'; ?>

            <!-- FAQ -->
            <?php require_once __DIR__ . '/../components/khuyen_mai/faq.php'; ?>
        </div>
    </div>
</main>
