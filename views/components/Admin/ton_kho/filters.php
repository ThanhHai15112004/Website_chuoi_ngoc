<div class="p-4 border-b border-gray-200 bg-white flex flex-col lg:flex-row lg:items-center justify-between gap-4">
    <!-- Tìm kiếm -->
    <div class="relative w-full lg:max-w-md">
        <input type="text" placeholder="Tìm theo tên sản phẩm, mã SKU, barcode..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-colors text-sm">
        <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
    </div>

    <!-- Bộ lọc nâng cao -->
    <div class="flex flex-wrap items-center gap-3">
        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 bg-white">
            <option value="">Tất cả danh mục</option>
            <option value="1">Vòng tay phong thủy</option>
            <option value="2">Chuỗi ngọc</option>
            <option value="3">Vòng cao cấp</option>
        </select>
        
        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 bg-white">
            <option value="">Loại đá / ngọc</option>
            <option value="ngoc_bich">Ngọc bích</option>
            <option value="cam_thach">Cẩm thạch</option>
            <option value="thach_anh">Thạch anh</option>
            <option value="mat_ho">Đá mắt hổ</option>
        </select>

        <select class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-900/20 focus:border-red-900 bg-white">
            <option value="">Ngưỡng tồn kho</option>
            <option value="0">Bằng 0</option>
            <option value="under_5">Dưới 5</option>
            <option value="10_50">Từ 10 - 50</option>
            <option value="over_50">Trên 50</option>
        </select>

        <button class="flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium">
            <span class="iconify text-lg" data-icon="mdi:filter-variant"></span> Thêm bộ lọc
        </button>
    </div>
</div>

<!-- Active Filters -->
<div class="px-4 py-3 bg-gray-50/50 border-b border-gray-200 flex flex-wrap items-center gap-2 text-sm">
    <span class="text-gray-500 mr-1">Đang lọc:</span>
    <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-white border border-gray-200 text-gray-700">
        Sắp hết hàng <button class="hover:text-red-600"><span class="iconify" data-icon="mdi:close"></span></button>
    </span>
    <span class="inline-flex items-center gap-1 px-2 py-1 rounded bg-white border border-gray-200 text-gray-700">
        Ngọc bích <button class="hover:text-red-600"><span class="iconify" data-icon="mdi:close"></span></button>
    </span>
    <button class="text-red-600 hover:text-red-800 font-medium text-xs ml-2">Xóa tất cả</button>
</div>
