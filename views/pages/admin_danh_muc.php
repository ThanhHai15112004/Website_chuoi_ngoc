<?php
// views/pages/admin_danh_muc.php
?>
<div class="max-w-7xl mx-auto space-y-6">
                
                <!-- Page Header -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 tracking-tight">Quản lý danh mục</h1>
                        <p class="text-gray-500 text-sm mt-1">Tạo, chỉnh sửa và sắp xếp các danh mục sản phẩm hiển thị trên website.</p>
                    </div>
                    <button onclick="openModal('categoryModal')" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors shadow-sm flex items-center gap-2 shrink-0">
                        <span class="iconify text-lg" data-icon="mdi:plus"></span>
                        Thêm danh mục
                    </button>
                </div>

            <?php include __DIR__ . '/../components/Admin/danh_muc/stats_cards.php'; ?>
<?php include __DIR__ . '/../components/Admin/danh_muc/table_section.php'; ?>
<?php include __DIR__ . '/../components/Admin/danh_muc/modals.php'; ?>
<?php include __DIR__ . '/../components/Admin/danh_muc/scripts.php'; ?>
