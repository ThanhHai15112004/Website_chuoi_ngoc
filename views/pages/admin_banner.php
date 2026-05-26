<?php
// views/pages/admin_banner.php
$banners = $banners ?? [];
?>

<div class="space-y-6">
    <!-- Tiêu đề trang -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Quản lý banner</h2>
            <p class="text-sm text-gray-500 mt-1">Tạo, chỉnh sửa và sắp xếp các banner hiển thị trên website.</p>
        </div>
        <div class="flex items-center gap-3">
            <button onclick="openSortModal()" class="px-4 py-2 bg-white text-gray-700 border border-gray-200 rounded-lg hover:bg-gray-50 hover:text-[#6B0D18] hover:border-[#6B0D18] transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:swap-vertical"></span>
                Sắp xếp banner
            </button>
            <a href="<?= APP_URL ?>/admin/banner/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A1120] transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:plus"></span>
                Thêm banner
            </a>
        </div>
    </div>

    <!-- Card Thống kê nhanh -->
    <?php require_once __DIR__ . '/../components/Admin/banner/banner_stats_cards.php'; ?>

    <!-- Bộ lọc & Tabs -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Tabs Vị trí -->
        <?php require_once __DIR__ . '/../components/Admin/banner/banner_tabs.php'; ?>
        
        <!-- Thanh Tìm kiếm và Bộ lọc -->
        <?php require_once __DIR__ . '/../components/Admin/banner/banner_filters.php'; ?>
        
        <!-- Thanh thao tác hàng loạt -->
        <?php require_once __DIR__ . '/../components/Admin/banner/banner_actions.php'; ?>
    </div>

    <!-- Danh sách Banner (Grid Card) -->
    <?php require_once __DIR__ . '/../components/Admin/banner/banner_grid.php'; ?>

</div>

<!-- Drawer chi tiết banner -->
<?php require_once __DIR__ . '/../components/Admin/banner/banner_drawer.php'; ?>

<!-- Các Modal (Bật/Tắt, Xóa) -->
<?php require_once __DIR__ . '/../components/Admin/banner/banner_modals.php'; ?>

<!-- Modal kéo thả sắp xếp -->
<?php require_once __DIR__ . '/../components/Admin/banner/banner_sort_modal.php'; ?>

<script>
    // Logic để mở các Modal và Drawer (mock)
    function openBannerDrawer(id) {
        document.getElementById('bannerDrawer').classList.remove('translate-x-full');
        document.getElementById('drawerOverlay').classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeBannerDrawer() {
        document.getElementById('bannerDrawer').classList.add('translate-x-full');
        document.getElementById('drawerOverlay').classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }

    function openToggleModal(id, currentStatus) {
        document.getElementById('toggleBannerModal').classList.remove('hidden');
    }

    function closeToggleModal() {
        document.getElementById('toggleBannerModal').classList.add('hidden');
    }

    function openDeleteModal(id) {
        document.getElementById('deleteBannerModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteBannerModal').classList.add('hidden');
    }

    function openSortModal() {
        document.getElementById('sortBannerModal').classList.remove('hidden');
    }

    function closeSortModal() {
        document.getElementById('sortBannerModal').classList.add('hidden');
    }
</script>
