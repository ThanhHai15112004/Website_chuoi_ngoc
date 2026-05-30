<div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-7 gap-4 mb-6">
    <!-- Card 1: Tổng sản phẩm -->
    <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 p-3 opacity-10">
            <span class="iconify text-4xl text-gray-900" data-icon="mdi:package-variant-closed"></span>
        </div>
        <div class="text-sm text-gray-500 font-medium mb-1">Tổng sản phẩm</div>
        <div class="text-2xl font-bold text-gray-900"><?= number_format($stats['total_products']) ?></div>
        <div class="text-xs text-gray-400 mt-1">Đang theo dõi kho</div>
    </div>

    <!-- Card 2: Còn hàng -->
    <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 p-3 opacity-10">
            <span class="iconify text-4xl text-emerald-600" data-icon="mdi:check-circle"></span>
        </div>
        <div class="text-sm text-gray-500 font-medium mb-1">Còn hàng</div>
        <div class="text-2xl font-bold text-emerald-600"><?= number_format($stats['in_stock']) ?></div>
        <div class="text-xs text-gray-400 mt-1">Sản phẩm đủ kho</div>
    </div>

    <!-- Card 3: Sắp hết hàng -->
    <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 p-3 opacity-10">
            <span class="iconify text-4xl text-amber-500" data-icon="mdi:alert"></span>
        </div>
        <div class="text-sm text-gray-500 font-medium mb-1">Sắp hết hàng</div>
        <div class="text-2xl font-bold text-amber-500"><?= number_format($stats['low_stock']) ?></div>
        <div class="text-xs text-gray-400 mt-1">Dưới ngưỡng cảnh báo</div>
    </div>

    <!-- Card 4: Hết hàng -->
    <div class="bg-white p-4 rounded-xl border border-red-200 bg-red-50/50 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 p-3 opacity-10">
            <span class="iconify text-4xl text-red-600" data-icon="mdi:close-circle"></span>
        </div>
        <div class="text-sm text-red-800 font-medium mb-1">Hết hàng</div>
        <div class="text-2xl font-bold text-red-600"><?= number_format($stats['out_of_stock']) ?></div>
        <div class="text-xs text-red-600/70 mt-1">Cần nhập kho ngay</div>
    </div>

    <!-- Card 5: Tồn kho cao -->
    <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 p-3 opacity-10">
            <span class="iconify text-4xl text-purple-600" data-icon="mdi:arrow-up-bold-box"></span>
        </div>
        <div class="text-sm text-gray-500 font-medium mb-1">Tồn kho cao</div>
        <div class="text-2xl font-bold text-purple-600"><?= number_format($stats['high_stock']) ?></div>
        <div class="text-xs text-gray-400 mt-1">Bán chậm / Ứ đọng</div>
    </div>

    <!-- Card 6: Tổng số lượng -->
    <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 p-3 opacity-10">
            <span class="iconify text-4xl text-blue-600" data-icon="mdi:sigma"></span>
        </div>
        <div class="text-sm text-gray-500 font-medium mb-1">Tổng số lượng tồn</div>
        <div class="text-2xl font-bold text-gray-900"><?= number_format($stats['total_items'], 0, ',', '.') ?></div>
        <div class="text-xs text-gray-400 mt-1">Tổng cộng các loại ĐVT</div>
    </div>

    <!-- Card 7: Giá trị tồn kho -->
    <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 p-3 opacity-10">
            <span class="iconify text-4xl text-[#6B0D18]" data-icon="mdi:currency-usd"></span>
        </div>
        <div class="text-sm text-gray-500 font-medium mb-1">Giá trị tồn kho</div>
        <div class="text-2xl font-bold text-[#6B0D18]"><?= number_format($stats['inventory_value'] / 1000000, 0, ',', '.') ?> Tr</div>
        <div class="text-xs text-gray-400 mt-1">Ước tính theo giá vốn</div>
    </div>
</div>
