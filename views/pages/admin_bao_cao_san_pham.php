<div class="px-6 py-8 w-full max-w-7xl mx-auto space-y-6">

    <!-- 1. Tiêu đề và Nút hành động -->
    <?php require __DIR__ . '/../components/Admin/bao_cao_san_pham/header_actions.php'; ?>

    <!-- 2. Bộ lọc thời gian và nâng cao -->
    <?php require __DIR__ . '/../components/Admin/bao_cao_san_pham/filters.php'; ?>

    <!-- 3. Chỉ số tổng quan (KPIs) -->
    <?php require __DIR__ . '/../components/Admin/bao_cao_san_pham/overview_cards.php'; ?>

    <!-- 4. Biểu đồ Top SP & Doanh thu Danh mục -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <?php require __DIR__ . '/../components/Admin/bao_cao_san_pham/charts.php'; ?>
    </div>

    <!-- 5. Gợi ý hành động -->
    <?php require __DIR__ . '/../components/Admin/bao_cao_san_pham/action_suggestions.php'; ?>

    <!-- 6. Báo cáo theo Thuộc tính (Đá/Ngọc, Mệnh) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <?php require __DIR__ . '/../components/Admin/bao_cao_san_pham/attributes_report.php'; ?>
    </div>

    <!-- 7. Các bảng phân tích chi tiết (Bán chậm, Tồn kho, Khuyến mãi) -->
    <div class="space-y-6">
        <?php require __DIR__ . '/../components/Admin/bao_cao_san_pham/tables_analysis.php'; ?>
    </div>

    <!-- 8. Bảng chi tiết toàn bộ sản phẩm -->
    <?php require __DIR__ . '/../components/Admin/bao_cao_san_pham/table_all_products.php'; ?>

</div>

<!-- Modals Xuất báo cáo -->
<?php require __DIR__ . '/../components/Admin/bao_cao_san_pham/modals.php'; ?>

<!-- Nhúng thư viện Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Scripts cho các Chart và Tương tác -->
<?php require __DIR__ . '/../components/Admin/bao_cao_san_pham/scripts.php'; ?>
