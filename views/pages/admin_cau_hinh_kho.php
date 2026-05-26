<div class="p-6 space-y-6 bg-gray-50/50 min-h-screen relative">
    
    <!-- 1. Tiêu đề trang -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Cấu hình kho bãi</h1>
            <p class="text-sm text-gray-500 mt-1">Thiết lập danh sách kho, khu vực lưu trữ, quy tắc tồn kho, cảnh báo và quyền thao tác kho.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:refresh"></span> Làm mới
            </button>
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:export-variant"></span> Xuất cấu hình
            </button>
            <button onclick="switchTab('khu_vuc'); openModal('modalThemViTri')" class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:plus-box-outline"></span> Thêm khu vực
            </button>
            <a href="<?= APP_URL ?>/admin/cau-hinh-kho/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:warehouse"></span>
                Thêm kho
            </a>
        </div>
    </div>

    <!-- 2. Thẻ thống kê (Stats Cards) -->
    <?php require_once __DIR__ . '/../components/Admin/cau_hinh_kho/stats_cards.php'; ?>

    <!-- 3. Tabs Navigation -->
    <?php require_once __DIR__ . '/../components/Admin/cau_hinh_kho/tabs_navigation.php'; ?>

    <!-- 4. Nội dung các Tab -->
    <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden" id="tabContentArea">
        
        <div id="tab-danh_sach" class="tab-pane block">
            <?php require_once __DIR__ . '/../components/Admin/cau_hinh_kho/tabs/tab_danh_sach.php'; ?>
        </div>
        
        <div id="tab-khu_vuc" class="tab-pane hidden">
            <?php require_once __DIR__ . '/../components/Admin/cau_hinh_kho/tabs/tab_khu_vuc.php'; ?>
        </div>
        
        <div id="tab-quy_tac" class="tab-pane hidden">
            <?php require_once __DIR__ . '/../components/Admin/cau_hinh_kho/tabs/tab_quy_tac.php'; ?>
        </div>
        
        <div id="tab-canh_bao" class="tab-pane hidden">
            <?php require_once __DIR__ . '/../components/Admin/cau_hinh_kho/tabs/tab_canh_bao.php'; ?>
        </div>
        
        <div id="tab-quyen" class="tab-pane hidden">
            <?php require_once __DIR__ . '/../components/Admin/cau_hinh_kho/tabs/tab_quyen.php'; ?>
        </div>
        
        <div id="tab-kiem_ke" class="tab-pane hidden">
            <?php require_once __DIR__ . '/../components/Admin/cau_hinh_kho/tabs/tab_kiem_ke.php'; ?>
        </div>
        
        <div id="tab-sku" class="tab-pane hidden">
            <?php require_once __DIR__ . '/../components/Admin/cau_hinh_kho/tabs/tab_sku_barcode.php'; ?>
        </div>
        
        <div id="tab-nhat_ky" class="tab-pane hidden">
            <?php require_once __DIR__ . '/../components/Admin/cau_hinh_kho/tabs/tab_nhat_ky.php'; ?>
        </div>
    </div>

    <!-- 5. Drawer & Modals -->
    <?php require_once __DIR__ . '/../components/Admin/cau_hinh_kho/drawer_chi_tiet.php'; ?>
    <?php require_once __DIR__ . '/../components/Admin/cau_hinh_kho/modals.php'; ?>
    
    <!-- Overlay cho Drawer -->
    <div id="drawerOverlay" class="fixed inset-0 bg-gray-900/40 z-40 hidden backdrop-blur-[2px] transition-opacity opacity-0" onclick="closeDrawer()"></div>

</div>

<script>
    // Tab switching logic
    function switchTab(tabId) {
        // Hide all tab panes
        document.querySelectorAll('.tab-pane').forEach(el => {
            el.classList.remove('block');
            el.classList.add('hidden');
        });
        
        // Show selected tab pane
        document.getElementById(`tab-${tabId}`).classList.remove('hidden');
        document.getElementById(`tab-${tabId}`).classList.add('block');
        
        // Update tab navigation styling
        document.querySelectorAll('.nav-tab-btn').forEach(btn => {
            btn.classList.remove('text-white', 'bg-[#6B0D18]', 'shadow-sm');
            btn.classList.add('text-gray-500', 'hover:bg-gray-100', 'hover:text-gray-900');
        });
        
        const activeBtn = document.getElementById(`nav-tab-${tabId}`);
        if(activeBtn) {
            activeBtn.classList.remove('text-gray-500', 'hover:bg-gray-100', 'hover:text-gray-900');
            activeBtn.classList.add('text-white', 'bg-[#6B0D18]', 'shadow-sm');
        }
    }
</script>
