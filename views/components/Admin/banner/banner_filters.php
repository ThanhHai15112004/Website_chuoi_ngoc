<?php
// views/components/Admin/banner/banner_filters.php
?>
<div class="p-4 border-b border-gray-100 bg-gray-50/50 flex flex-col md:flex-row gap-3">
    <!-- Ô tìm kiếm -->
    <div class="relative flex-1">
        <form action="" method="GET" class="w-full relative">
            <input type="hidden" name="vi_tri" value="<?= htmlspecialchars($vi_tri) ?>">
            <input type="hidden" name="trang_thai" value="<?= htmlspecialchars($trang_thai) ?>">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="iconify text-gray-400 text-lg" data-icon="mdi:magnify"></span>
            </div>
            <input type="text" name="search" value="<?= htmlspecialchars($search ?? '') ?>" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] bg-white transition-colors" placeholder="Tìm theo tên banner, liên kết...">
        </form>
    </div>

    <!-- Nút Lọc -->
    <div class="flex items-center gap-2">
        <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 hover:text-[#6B0D18] hover:border-[#6B0D18] text-sm font-medium flex items-center gap-2 transition-colors">
            <span class="iconify" data-icon="mdi:filter-variant"></span>
            Bộ lọc
        </button>
        
        <!-- Chế độ hiển thị (Grid/Table) -->
        <div class="flex items-center bg-white border border-gray-200 rounded-lg p-0.5">
            <button class="p-1.5 bg-gray-100 text-[#6B0D18] rounded-md shadow-sm" title="Dạng lưới">
                <span class="iconify text-lg block" data-icon="mdi:view-grid-outline"></span>
            </button>
            <button class="p-1.5 text-gray-400 hover:text-gray-700 rounded-md transition-colors" title="Dạng bảng">
                <span class="iconify text-lg block" data-icon="mdi:format-list-bulleted"></span>
            </button>
        </div>
    </div>
</div>

<!-- Vùng hiển thị Filter tags đang áp dụng (ẩn mặc định nếu không có bộ lọc) -->
<!--
<div class="px-4 py-3 bg-white border-b border-gray-100 flex flex-wrap gap-2 items-center text-sm">
    <span class="text-gray-500 text-xs font-medium mr-1">Đang lọc theo:</span>
    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-gray-100 border border-gray-200 text-gray-700">
        Trang chủ <button class="hover:text-red-600"><span class="iconify text-sm block" data-icon="mdi:close"></span></button>
    </span>
    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded bg-gray-100 border border-gray-200 text-gray-700">
        Desktop <button class="hover:text-red-600"><span class="iconify text-sm block" data-icon="mdi:close"></span></button>
    </span>
    <button class="text-[#6B0D18] hover:underline text-xs font-medium ml-2">Xóa tất cả</button>
</div>
-->
