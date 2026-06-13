    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <!-- Tổng voucher -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-500 mb-2">
                <span class="iconify" data-icon="mdi:ticket-percent-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Tổng voucher</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['tong_voucher']) ?> <span class="text-sm font-normal text-gray-500">mã</span></div>
        </div>

        <!-- Đang hoạt động -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-emerald-600 mb-2">
                <span class="iconify" data-icon="mdi:check-circle-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Đang hoạt động</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['dang_hoat_dong']) ?> <span class="text-sm font-normal text-gray-500">mã</span></div>
        </div>

        <!-- Sắp hết hạn -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-amber-500 mb-2">
                <span class="iconify" data-icon="mdi:clock-alert-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Sắp hết hạn</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['sap_het_han']) ?> <span class="text-sm font-normal text-gray-500">mã</span></div>
        </div>

        <!-- Đã hết hạn -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-400 mb-2">
                <span class="iconify" data-icon="mdi:clock-remove-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Đã hết hạn</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['het_han']) ?> <span class="text-sm font-normal text-gray-500">mã</span></div>
        </div>

        <!-- Đã dùng -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-blue-500 mb-2">
                <span class="iconify" data-icon="mdi:cart-check"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Đã dùng</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['da_dung']) ?> <span class="text-sm font-normal text-gray-500">lượt</span></div>
        </div>

        <!-- Tổng giảm giá -->
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 mb-2">
                <span class="iconify text-lg text-emerald-500" data-icon="mdi:cash-check"></span>
                <span class="text-xs font-semibold text-emerald-700 uppercase tracking-wide">Tổng đã giảm</span>
            </div>
            <div class="text-xl font-bold text-emerald-700 truncate" title="<?= number_format($thong_ke['tong_giam_gia'], 0, ',', '.') ?>đ"><?= format_currency_short($thong_ke['tong_giam_gia']) ?></div>
        </div>
    </div>
