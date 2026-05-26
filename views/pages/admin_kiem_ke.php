<!-- Trang Quản lý Phiếu Kiểm Kê Kho -->
<div class="px-6 py-6 pb-20 max-w-[1600px] mx-auto min-h-screen bg-[#FAF8F5]">
    
    <!-- Tiêu đề & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 leading-tight">Kiểm Kê Kho</h2>
            <p class="text-sm text-gray-500 mt-1">Tạo phiếu kiểm kê, đối chiếu tồn kho thực tế với hệ thống và xử lý chênh lệch.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="flex items-center gap-2 px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg text-gray-500" data-icon="mdi:refresh"></span> Làm mới
            </button>
            <a href="<?= APP_URL ?>/admin/kiem-ke/them" class="flex items-center gap-2 px-4 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20">
                <span class="iconify text-lg" data-icon="mdi:plus"></span> Tạo phiếu kiểm kê
            </a>
        </div>
    </div>

    <!-- Include Stats Cards -->
    <?php require_once __DIR__ . '/../components/Admin/kiem_ke/stats_cards.php'; ?>

    <!-- Include Tabs & Filters -->
    <?php require_once __DIR__ . '/../components/Admin/kiem_ke/tabs_filter.php'; ?>

    <!-- Thanh thao tác chọn nhiều phiếu -->
    <div class="hidden items-center justify-between bg-blue-50 border border-blue-100 rounded-lg p-3 mb-4" id="bulkActionsBar">
        <div class="flex items-center gap-2 text-blue-800 text-sm font-medium">
            <span class="iconify text-lg" data-icon="mdi:check-circle"></span> Đã chọn 3 phiếu kiểm kê
        </div>
        <div class="flex items-center gap-2">
            <button class="px-3 py-1.5 bg-white border border-blue-200 text-blue-700 rounded text-sm hover:bg-blue-100 transition-colors shadow-sm">Xuất biên bản</button>
            <button class="px-3 py-1.5 bg-amber-500 text-white rounded text-sm hover:bg-amber-600 transition-colors shadow-sm">Duyệt nhanh</button>
            <button class="px-3 py-1.5 bg-white border border-red-200 text-red-600 rounded text-sm hover:bg-red-50 transition-colors shadow-sm">Hủy phiếu</button>
        </div>
    </div>

    <!-- Include Table List -->
    <?php require_once __DIR__ . '/../components/Admin/kiem_ke/table_list.php'; ?>

</div>

<script>
    // Demo JS cho việc cuộn tab
    const scrollContainer = document.querySelector('.sidebar-scroll');
    let isDown = false;
    let startX;
    let scrollLeft;

    if(scrollContainer) {
        scrollContainer.addEventListener('mousedown', (e) => {
            isDown = true;
            scrollContainer.classList.add('cursor-grabbing');
            startX = e.pageX - scrollContainer.offsetLeft;
            scrollLeft = scrollContainer.scrollLeft;
        });
        scrollContainer.addEventListener('mouseleave', () => {
            isDown = false;
            scrollContainer.classList.remove('cursor-grabbing');
        });
        scrollContainer.addEventListener('mouseup', () => {
            isDown = false;
            scrollContainer.classList.remove('cursor-grabbing');
        });
        scrollContainer.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - scrollContainer.offsetLeft;
            const walk = (x - startX) * 2;
            scrollContainer.scrollLeft = scrollLeft - walk;
        });
    }
</script>
