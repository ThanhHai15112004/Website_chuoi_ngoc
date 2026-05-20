<?php
/**
 * View: Chi tiết sản phẩm
 */
$san_pham = $data['san_pham'];
$san_pham_lien_quan = $data['san_pham_lien_quan'] ?? [];
$san_pham_da_xem = $data['san_pham_da_xem'] ?? [];
?>

<div class="bg-[#FAFAFA] min-h-screen pb-20 lg:pb-12">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="py-4">
            <?php require_once __DIR__ . '/../components/User/chi_tiet_san_pham/breadcrumb.php'; ?>
        </div>

        <!-- Main Product Info (2 columns on desktop) -->
        <div class="flex flex-col lg:flex-row gap-8 xl:gap-0 mb-12">
            <!-- Left: Images -->
            <div class="w-full lg:w-5/12 lg:border-r lg:border-gray-200 lg:pr-8 xl:pr-12">
                <?php require_once __DIR__ . '/../components/User/chi_tiet_san_pham/anh_san_pham.php'; ?>
            </div>

            <!-- Right: Details & Actions -->
            <div class="w-full lg:w-7/12 lg:pl-8 xl:pl-12">
                <?php require_once __DIR__ . '/../components/User/chi_tiet_san_pham/thong_tin_san_pham.php'; ?>
            </div>
        </div>

        <!-- Product Tabs (Description, Details, etc) -->
        <div class="mb-16">
            <?php require_once __DIR__ . '/../components/User/chi_tiet_san_pham/tabs_thong_tin.php'; ?>
        </div>

        <!-- Reviews & Ratings -->
        <div class="mb-16" id="danh-gia">
            <?php require_once __DIR__ . '/../components/User/chi_tiet_san_pham/danh_gia.php'; ?>
        </div>

        <!-- Related Products -->
        <?php if (!empty($san_pham_lien_quan)): ?>
            <div class="mb-16">
                <?php require_once __DIR__ . '/../components/User/chi_tiet_san_pham/san_pham_lien_quan.php'; ?>
            </div>
        <?php endif; ?>

        <!-- Recently Viewed -->
        <?php if (!empty($san_pham_da_xem)): ?>
            <div class="mb-8">
                <?php require_once __DIR__ . '/../components/User/chi_tiet_san_pham/san_pham_da_xem.php'; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Mobile Sticky Buy Bar -->
    <?php require_once __DIR__ . '/../components/User/chi_tiet_san_pham/thanh_mua_nhanh.php'; ?>
</div>

<script>
    // Simple Alpine.js setup if not already globally available, or we can use vanilla JS for tabs and variants
    // I will use vanilla JS in the components to keep it dependency-free as requested for "không framework JS"
</script>

