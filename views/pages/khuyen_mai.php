<?php
// views/pages/khuyen_mai.php
?>
<main class="bg-[#FAF9F6] pb-16 overflow-hidden">
    <!-- Banner Khuyến Mãi -->
    <?php require_once __DIR__ . '/../components/khuyen_mai/banner.php'; ?>

    <!-- Breadcrumb (nằm dưới banner) -->
    <?php
    $breadcrumb_items = [
        ['ten' => 'Trang Chủ', 'url' => APP_URL . '/', 'icon' => 'ph:house-bold'],
        ['ten' => 'Khuyến Mãi', 'url' => null, 'icon' => 'ph:gift-bold'],
    ];
    require_once __DIR__ . '/../components/common/breadcrumb.php';
    ?>

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
