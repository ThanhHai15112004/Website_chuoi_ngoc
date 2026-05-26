    <!-- Quick Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col gap-1">
            <div class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1 flex items-center gap-2">
                <span class="iconify text-gray-400" data-icon="mdi:package-variant-closed"></span> Tổng SP
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($thong_ke['tong_san_pham'] ?? 0) ?></div>
        </div>
        
        <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col gap-1">
            <div class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1 flex items-center gap-2">
                <span class="iconify text-green-500" data-icon="mdi:eye-outline"></span> Đang hiển thị
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($thong_ke['dang_hien_thi'] ?? 0) ?></div>
        </div>

        <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col gap-1">
            <div class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1 flex items-center gap-2">
                <span class="iconify text-orange-500" data-icon="mdi:alert-outline"></span> Sắp hết hàng
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($thong_ke['sap_het_hang'] ?? 0) ?></div>
        </div>

        <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col gap-1">
            <div class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1 flex items-center gap-2">
                <span class="iconify text-red-600" data-icon="mdi:close-circle-outline"></span> Hết hàng
            </div>
            <div class="text-2xl font-bold text-red-600"><?= number_format($thong_ke['het_hang'] ?? 0) ?></div>
        </div>

        <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col gap-1">
            <div class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1 flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:sale"></span> Giảm giá
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($thong_ke['dang_giam_gia'] ?? 0) ?></div>
        </div>

        <div class="bg-white rounded-[18px] p-4 shadow-sm border border-gray-100 flex flex-col gap-1">
            <div class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1 flex items-center gap-2">
                <span class="iconify text-gray-400" data-icon="mdi:eye-off-outline"></span> Đang ẩn
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= number_format($thong_ke['dang_an'] ?? 0) ?></div>
        </div>
    </div>
