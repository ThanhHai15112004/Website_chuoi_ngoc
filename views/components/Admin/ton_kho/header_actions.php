<div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-900 leading-tight">Tồn kho hiện tại</h2>
        <p class="text-sm text-gray-500 mt-1">Theo dõi số lượng tồn kho, trạng thái hàng hóa và cập nhật kho cho từng sản phẩm.</p>
    </div>
    <div class="flex flex-wrap items-center gap-3">
        <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
            <span class="iconify text-lg text-gray-500" data-icon="mdi:refresh"></span> Làm mới
        </button>
        <button class="flex items-center gap-2 px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
            <span class="iconify text-lg text-gray-500" data-icon="mdi:tray-arrow-up"></span> Xuất kho
        </button>
        <a href="<?= APP_URL ?>/admin/nhap-kho/them" class="flex items-center gap-2 px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium shadow-sm shadow-red-900/20">
            <span class="iconify text-lg" data-icon="mdi:tray-arrow-down"></span> + Nhập kho
        </a>
    </div>
</div>
