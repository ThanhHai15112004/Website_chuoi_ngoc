<?php
// views/pages/admin_dashboard.php
?>
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Dashboard Tổng Quan</h2>
            <p class="text-sm text-gray-500 mt-1">Xin chào Quản trị viên, đây là tình hình kinh doanh hôm nay.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:calendar-month-outline"></span>
                Hôm nay: <?= date('d/m/Y') ?>
            </button>
            <button class="px-4 py-2 bg-red-900 text-white rounded-lg text-sm font-medium hover:bg-red-800 transition-colors shadow-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:download"></span>
                Xuất báo cáo
            </button>
        </div>
    </div>

    <?php require_once __DIR__ . '/../components/Admin/dashboard/quick_stats.php'; ?>

    <!-- Main Content Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Left Column: Chart & Orders -->
        <div class="lg:col-span-2 space-y-6">
            <?php require_once __DIR__ . '/../components/Admin/dashboard/revenue_chart.php'; ?>

            <?php require_once __DIR__ . '/../components/Admin/dashboard/recent_orders.php'; ?>
        </div>

        <!-- Right Column: Activities, Alerts, Products -->
        <div class="space-y-6">
            
            <?php require_once __DIR__ . '/../components/Admin/dashboard/best_selling_products.php'; ?>

            <?php require_once __DIR__ . '/../components/Admin/dashboard/system_alerts.php'; ?>

            <?php require_once __DIR__ . '/../components/Admin/dashboard/recent_activity.php'; ?>

        </div>
    </div>
</div>

