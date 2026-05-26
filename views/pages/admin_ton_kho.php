<!-- Trang Tồn Kho Hiện Tại - Admin -->
<div class="px-6 py-6 pb-20 max-w-[1600px] mx-auto min-h-screen bg-gray-50">
    
    <!-- 1. Tiêu đề và Actions (Nhập kho, Xuất danh sách) -->
    <?php require __DIR__ . '/../components/Admin/ton_kho/header_actions.php'; ?>

    <!-- 2. Card Thống kê Tồn kho -->
    <?php require __DIR__ . '/../components/Admin/ton_kho/overview_cards.php'; ?>

    <!-- 3. Bộ lọc nhanh (Tabs) -->
    <?php require __DIR__ . '/../components/Admin/ton_kho/tabs_status.php'; ?>

    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
        <!-- 4. Thanh tìm kiếm và Bộ lọc nâng cao -->
        <?php require __DIR__ . '/../components/Admin/ton_kho/filters.php'; ?>

        <!-- 5. Khu vực cảnh báo kho (nếu có) -->
        <?php require __DIR__ . '/../components/Admin/ton_kho/alerts.php'; ?>

        <!-- 6. Bảng Tồn kho sản phẩm -->
        <?php require __DIR__ . '/../components/Admin/ton_kho/inventory_table.php'; ?>
    </div>
</div>

<!-- 7. Các Popup Modals (Cập nhật tồn kho, Nhập/Xuất kho) -->
<?php require __DIR__ . '/../components/Admin/ton_kho/modals.php'; ?>

<!-- 8. Drawer Lịch sử kho -->
<?php require __DIR__ . '/../components/Admin/ton_kho/drawer_history.php'; ?>

<!-- 9. Scripts xử lý sự kiện -->
<?php require __DIR__ . '/../components/Admin/ton_kho/scripts.php'; ?>
