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
    const bannersData = <?= json_encode($banners, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    let currentBannerId = null;
    let targetStatus = '';

    function getStatusBadge(status) {
        switch (status) {
            case 'dang_hien_thi':
                return '<span class="px-2 py-0.5 bg-green-50 text-green-700 text-xs font-medium rounded border border-green-100 inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Đang hiển thị</span>';
            case 'dang_an':
                return '<span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-xs font-medium rounded border border-gray-200 inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span> Đang ẩn</span>';
            case 'sap_hien_thi':
                return '<span class="px-2 py-0.5 bg-blue-50 text-blue-700 text-xs font-medium rounded border border-blue-100 inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Sắp hiển thị</span>';
            case 'het_han':
                return '<span class="px-2 py-0.5 bg-gray-100 text-gray-500 text-xs font-medium rounded border border-gray-200 inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span> Hết hạn</span>';
            case 'thieu_cau_hinh':
                return '<span class="px-2 py-0.5 bg-yellow-50 text-yellow-700 text-xs font-medium rounded border border-yellow-100 inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Thiếu cấu hình</span>';
            default:
                return '<span class="px-2 py-0.5 bg-gray-100 text-gray-600 text-xs font-medium rounded border border-gray-200 inline-flex items-center gap-1"><span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span> Bản nháp</span>';
        }
    }

    function openBannerDrawer(id) {
        const banner = bannersData.find(b => b.id === id);
        if (banner) {
            const imgDesktop = document.getElementById('drawer_anh_desktop');
            const imgMobile = document.getElementById('drawer_anh_mobile');
            
            imgDesktop.style.display = 'block';
            imgDesktop.nextElementSibling.style.display = 'none';
            imgDesktop.src = banner.anh_desktop ? (banner.anh_desktop.startsWith('http') ? banner.anh_desktop : '<?= APP_URL ?>' + banner.anh_desktop) : '';
            
            imgMobile.style.display = 'block';
            imgMobile.nextElementSibling.style.display = 'none';
            imgMobile.src = banner.anh_mobile ? (banner.anh_mobile.startsWith('http') ? banner.anh_mobile : '<?= APP_URL ?>' + banner.anh_mobile) : '';
            
            document.getElementById('drawer_ten').textContent = banner.ten;
            document.getElementById('drawer_trang_thai').innerHTML = getStatusBadge(banner.trang_thai_hien_thi || banner.trang_thai);
            document.getElementById('drawer_thu_tu').textContent = banner.thu_tu;
            document.getElementById('drawer_vi_tri').textContent = banner.vi_tri.toUpperCase();
            
            let devices = '';
            if (banner.thiet_bi.includes('desktop')) devices += '<span class="flex items-center gap-1.5 text-xs bg-white border border-gray-200 px-2 py-1 rounded"><span class="iconify text-gray-500" data-icon="mdi:monitor"></span> Desktop</span>';
            if (banner.thiet_bi.includes('mobile')) devices += '<span class="flex items-center gap-1.5 text-xs bg-white border border-gray-200 px-2 py-1 rounded"><span class="iconify text-gray-500" data-icon="mdi:cellphone"></span> Mobile</span>';
            document.getElementById('drawer_thiet_bi').innerHTML = devices;

            document.getElementById('drawer_link').href = banner.link || '#';
            document.getElementById('drawer_link_text').textContent = banner.link || 'Chưa cấu hình';
            
            let timeStr = '';
            if (banner.khong_gioi_han == 1 || (!banner.bat_dau && !banner.ket_thuc)) {
                timeStr = 'Không giới hạn thời gian';
            } else {
                timeStr = (banner.bat_dau ? new Date(banner.bat_dau).toLocaleString() : '---') + ' đến ' + (banner.ket_thuc ? new Date(banner.ket_thuc).toLocaleString() : '---');
            }
            document.getElementById('drawer_thoi_gian').textContent = timeStr;
            
            document.getElementById('drawer_ngay_tao').textContent = new Date(banner.ngay_tao).toLocaleString();
            document.getElementById('drawer_ngay_cap_nhat').textContent = new Date(banner.ngay_cap_nhat).toLocaleString();
            
            document.getElementById('drawer_btn_edit').href = '<?= APP_URL ?>/admin/banner/sua/' + banner.id;
        }

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
        currentBannerId = id;
        targetStatus = (currentStatus === 'dang_hien_thi') ? 'nhap' : 'dang_hien_thi';
        document.getElementById('toggleBannerModal').classList.remove('hidden');
    }

    function closeToggleModal() {
        document.getElementById('toggleBannerModal').classList.add('hidden');
    }

    async function confirmToggleStatus() {
        if (!currentBannerId) return;
        try {
            const res = await fetch('<?= APP_URL ?>/admin/banner/api/trang-thai', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ id: currentBannerId, trang_thai: targetStatus })
            });
            const data = await res.json();
            if (data.success) {
                showToast(data.message, 'success');
                setTimeout(() => window.location.reload(), 500);
            } else {
                showToast(data.message, 'error');
            }
        } catch (e) {
            showToast('Lỗi máy chủ', 'error');
        }
        closeToggleModal();
    }

    function openDeleteModal(id) {
        currentBannerId = id;
        document.getElementById('deleteBannerModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
        document.getElementById('deleteBannerModal').classList.add('hidden');
    }

    async function confirmDeleteBanner() {
        if (!currentBannerId) return;
        try {
            const res = await fetch('<?= APP_URL ?>/admin/banner/api/xoa', {
                method: 'POST',
                headers: {'Content-Type': 'application/json'},
                body: JSON.stringify({ id: currentBannerId })
            });
            const data = await res.json();
            if (data.success) {
                showToast(data.message, 'success');
                setTimeout(() => window.location.reload(), 500);
            } else {
                showToast(data.message, 'error');
            }
        } catch (e) {
            showToast('Lỗi máy chủ', 'error');
        }
        closeDeleteModal();
    }

    function openSortModal() {
        document.getElementById('sortBannerModal').classList.remove('hidden');
    }

    function closeSortModal() {
        document.getElementById('sortBannerModal').classList.add('hidden');
    }
</script>
