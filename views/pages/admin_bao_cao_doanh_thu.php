<div class="px-6 py-8 w-full max-w-7xl mx-auto space-y-6">

    <!-- 1. Tiêu đề và Nút hành động -->
    <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/header_actions.php'; ?>

    <!-- Cảnh báo số liệu bất thường -->
    <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/alerts.php'; ?>

    <!-- 2. Bộ lọc thời gian và nâng cao -->
    <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/filters.php'; ?>

    <!-- 3. Chỉ số tổng quan (KPIs) -->
    <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/overview_cards.php'; ?>

    <!-- 4. Biểu đồ doanh thu chính và trạng thái đơn hàng -->
    <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/charts.php'; ?>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- 5. Bảng dữ liệu theo thời gian -->
        <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/table_time.php'; ?>

        <!-- 6. Doanh thu theo sản phẩm (Top bán chạy) & Cảnh báo bán chậm -->
        <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/top_products.php'; ?>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- 7. Doanh thu theo Danh mục -->
        <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/sales_by_category.php'; ?>

        <!-- 8. Doanh thu theo Loại Đá -->
        <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/sales_by_stone.php'; ?>

        <!-- 9. Doanh thu theo Mệnh -->
        <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/sales_by_destiny.php'; ?>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- 10. Báo cáo Marketing (Voucher) -->
        <div class="lg:col-span-2">
            <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/marketing_report.php'; ?>
        </div>

        <!-- 11. Báo cáo Phương thức TT & Hạng thành viên -->
        <div class="space-y-6">
            <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/sales_by_payment.php'; ?>
            <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/sales_by_rank.php'; ?>
        </div>
    </div>

    <!-- 12. Bảng chi tiết đơn hàng (Dữ liệu gốc) -->
    <?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/orders_table.php'; ?>

</div>

<!-- Modals Xuất báo cáo -->
<?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/modals.php'; ?>

<!-- Nhúng thư viện Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Scripts cho các Chart và Tương tác -->
<?php require __DIR__ . '/../components/Admin/bao_cao_doanh_thu/scripts.php'; ?>
