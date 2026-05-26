<div class="flex items-center gap-2 overflow-x-auto pb-4 mb-2 sidebar-scroll">
    <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-full text-sm font-medium whitespace-nowrap shadow-sm">
        Tất cả (<?= $stats['total_products'] ?>)
    </button>
    <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
        Còn hàng (<?= $stats['in_stock'] ?>)
    </button>
    <button class="px-4 py-2 bg-white border border-gray-200 text-amber-600 hover:bg-amber-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
        Sắp hết hàng (<?= $stats['low_stock'] ?>)
    </button>
    <button class="px-4 py-2 bg-white border border-gray-200 text-red-600 hover:bg-red-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
        Hết hàng (<?= $stats['out_of_stock'] ?>)
    </button>
    <button class="px-4 py-2 bg-white border border-gray-200 text-purple-600 hover:bg-purple-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
        Tồn kho cao (<?= $stats['high_stock'] ?>)
    </button>
    <button class="px-4 py-2 bg-white border border-gray-200 text-gray-500 hover:bg-gray-50 rounded-full text-sm font-medium whitespace-nowrap transition-colors">
        Lỗi kho (1)
    </button>
</div>
