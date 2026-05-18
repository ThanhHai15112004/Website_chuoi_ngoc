<!-- Main Content -->
<main class="min-h-screen bg-[#FDFBF7] pb-20 pt-8">
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Breadcrumb -->
        <?php
        $breadcrumb_items = [
            ['ten' => 'Trang Chủ', 'url' => APP_URL . '/', 'icon' => 'ph:house-bold'],
            ['ten' => 'Tài Khoản', 'url' => APP_URL . '/tai-khoan', 'icon' => 'ph:user-bold'],
            ['ten' => 'Đơn Hàng', 'url' => APP_URL . '/tai-khoan#tab-don-hang', 'icon' => 'ph:package-bold'],
            ['ten' => 'Chi Tiết', 'url' => null, 'icon' => 'ph:clipboard-text-bold'],
        ];
        require_once __DIR__ . '/../components/common/breadcrumb.php';
        ?>
        <div class="flex justify-end mb-6">
            <a href="<?= APP_URL ?>/tai-khoan#tab-don-hang" class="inline-flex items-center gap-2 text-sm text-gray-600 hover:text-[#8b0000] transition-colors font-medium" style="text-decoration: none;">
                <i class="fas fa-arrow-left"></i> Quay lại lịch sử đơn hàng
            </a>
        </div>

        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Chi tiết đơn hàng</h1>
            <div class="flex flex-wrap items-center gap-4 text-sm">
                <span class="text-gray-600">Mã đơn hàng: <strong class="text-[#8b0000] text-base" id="order-id"><?= htmlspecialchars($order['order_code']) ?></strong></span>
                <button onclick="copyOrderId()" class="px-3 py-1 border border-[#8b0000] text-[#8b0000] hover:bg-red-50 rounded text-xs font-medium transition-colors">
                    Sao chép mã
                </button>
                <span class="text-gray-400">|</span>
                <span class="text-gray-600">Ngày đặt: <?= date('d/m/Y, H:i', strtotime($order['created_at'])) ?></span>
            </div>
        </div>

        <!-- Order Overview Card -->
        <?php include __DIR__ . '/../components/chi_tiet_don_hang/tong_quan.php'; ?>

        <!-- Product List -->
        <?php include __DIR__ . '/../components/chi_tiet_don_hang/danh_sach_san_pham.php'; ?>

        <!-- 2-Column Details Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
            
            <!-- Left Column: Delivery, Payment Status, Payment Details -->
            <div class="space-y-6">
                <!-- Delivery Info -->
                <?php include __DIR__ . '/../components/chi_tiet_don_hang/thong_tin_giao_hang.php'; ?>

                <!-- Payment Status -->
                <?php include __DIR__ . '/../components/chi_tiet_don_hang/thong_tin_thanh_toan.php'; ?>

                <!-- Payment Details -->
                <?php include __DIR__ . '/../components/chi_tiet_don_hang/chi_tiet_thanh_toan.php'; ?>
            </div>

            <!-- Right Column: Notes, History, Support -->
            <div class="space-y-6">
                <!-- Notes & Extras Container -->
                <?php include __DIR__ . '/../components/chi_tiet_don_hang/ghi_chu_dich_vu.php'; ?>

                <!-- Update History -->
                <?php include __DIR__ . '/../components/chi_tiet_don_hang/lich_su_cap_nhat.php'; ?>

                <!-- Support Box -->
                <?php include __DIR__ . '/../components/chi_tiet_don_hang/hop_ho_tro.php'; ?>
            </div>
            
        </div>

        <!-- Action Buttons -->
        <?php include __DIR__ . '/../components/chi_tiet_don_hang/nut_thao_tac.php'; ?>
        
    </div>
</main>

<!-- Cancel Order Modal -->
<?php include __DIR__ . '/../components/chi_tiet_don_hang/modal_huy_don.php'; ?>
