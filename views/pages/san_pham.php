<?php
/**
 * Trang danh sách sản phẩm
 * @var array $danh_sach_san_pham - Danh sách sản phẩm
 * @var int $tong_san_pham - Tổng số sản phẩm
 * @var int $trang_hien_tai_phan_trang - Trang hiện tại
 * @var int $tong_trang - Tổng số trang
 */
?>

<!-- Banner nhỏ / Tiêu đề trang -->
<?php include __DIR__ . '/../components/User/san_pham/banner.php'; ?>

<!-- Breadcrumb -->
<?php include __DIR__ . '/../components/User/san_pham/breadcrumb.php'; ?>

<!-- Nội dung chính: Bộ lọc + Danh sách sản phẩm -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        
        <!-- Sidebar bộ lọc (25%) -->
        <aside id="filter-sidebar" class="w-full lg:w-[280px] lg:flex-shrink-0">
            <?php include __DIR__ . '/../components/User/san_pham/bo_loc.php'; ?>
        </aside>

        <!-- Vùng hiển thị sản phẩm (75%) -->
        <main class="flex-1 min-w-0">
            <!-- Thanh sắp xếp + view mode -->
            <?php include __DIR__ . '/../components/User/san_pham/thanh_sap_xep.php'; ?>
            
            <!-- Danh sách sản phẩm dạng Grid -->
            <?php include __DIR__ . '/../components/User/san_pham/danh_sach.php'; ?>
            
            <!-- Phân trang -->
            <?php include __DIR__ . '/../components/User/san_pham/phan_trang.php'; ?>
        </main>

    </div>
</section>

