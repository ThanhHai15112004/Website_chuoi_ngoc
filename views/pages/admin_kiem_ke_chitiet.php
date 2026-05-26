<!-- Trang Chi Tiết & Thực Hiện Phiếu Kiểm Kê -->
<div class="px-6 py-6 pb-32 max-w-[1400px] mx-auto min-h-screen bg-[#FAF8F5]">
    
    <!-- Tiêu đề & Trở về -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div class="flex items-center gap-4">
            <a href="<?= APP_URL ?>/admin/kiem-ke" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors shadow-sm">
                <span class="iconify text-xl" data-icon="mdi:arrow-left"></span>
            </a>
            <div>
                <h2 class="text-2xl font-bold text-gray-900 leading-tight">Thực hiện kiểm kê</h2>
                <p class="text-sm text-gray-500 mt-1">
                    <span class="iconify inline text-gray-400" data-icon="mdi:account-outline"></span> Tạo bởi: <span class="font-medium text-gray-700"><?= $phieu['nguoi_tao'] ?></span> lúc <?= $phieu['gio_tao'] ?> - <?= $phieu['ngay_tao'] ?>
                </p>
            </div>
        </div>
        
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-colors text-sm flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:printer"></span> In phiếu
            </button>
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-colors text-sm flex items-center gap-2 shadow-sm">
                <span class="iconify text-green-600" data-icon="mdi:file-excel"></span> Xuất Excel
            </button>
        </div>
    </div>

    <!-- 1. Header (Info & Progress) -->
    <?php require_once __DIR__ . '/../components/Admin/kiem_ke/detail/detail_header.php'; ?>

    <!-- 2. Bảng thực hiện kiểm đếm -->
    <?php require_once __DIR__ . '/../components/Admin/kiem_ke/detail/execution_table.php'; ?>

    <!-- 3. Modals -->
    <?php require_once __DIR__ . '/../components/Admin/kiem_ke/detail/modals.php'; ?>

    <!-- Sticky Bottom Actions -->
    <div class="fixed bottom-0 left-0 right-0 lg:left-64 bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-40">
        <div class="max-w-[1400px] mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
            
            <div class="flex items-center gap-3 text-sm text-gray-600">
                <span class="iconify text-lg text-gray-400" data-icon="mdi:information-outline"></span>
                Trạng thái lưu: <span class="text-emerald-600 font-medium">Đã lưu (1 phút trước)</span>
            </div>

            <div class="flex items-center gap-3">
                <?php if($phieu['trang_thai'] === 'Đang kiểm kê'): ?>
                    <button class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">Lưu tạm</button>
                    <button onclick="openModal('modalGuiDuyet')" class="px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium shadow-sm shadow-blue-600/20 flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:send"></span> Gửi duyệt kết quả
                    </button>
                <?php elseif($phieu['trang_thai'] === 'Chờ duyệt'): ?>
                    <button onclick="openModal('modalDuyet')" class="px-6 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20 flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:shield-check"></span> Duyệt & Điều chỉnh kho
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    // Demo Scroll Tabs
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
