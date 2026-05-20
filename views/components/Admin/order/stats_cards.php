    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
        <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center gap-2 mb-2">
                <span class="iconify text-gray-400 text-lg" data-icon="mdi:receipt-text-outline"></span>
                <span class="text-[10px] font-medium text-gray-500 uppercase tracking-wider">Tổng đơn hàng</span>
            </div>
            <div>
                <span class="text-2xl font-bold text-gray-900" id="statTongDon"><?= number_format($stats['tong_don'], 0, ',', '.') ?></span>
                <span class="text-[10px] text-gray-500 ml-1">đơn</span>
            </div>
        </div>
        <div class="bg-yellow-50 p-4 rounded-[18px] border border-yellow-200 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="absolute -right-2 -top-2 w-12 h-12 bg-yellow-100 rounded-full opacity-50"></div>
            <div class="flex items-center gap-2 mb-2 relative z-10">
                <span class="iconify text-yellow-600 text-lg" data-icon="mdi:clock-outline"></span>
                <span class="text-[10px] font-bold text-yellow-700 uppercase tracking-wider">Chờ xác nhận</span>
            </div>
            <div class="relative z-10 flex items-baseline gap-2">
                <span class="text-2xl font-bold text-yellow-800" id="statChoXacNhan"><?= number_format($stats['cho_xac_nhan'], 0, ',', '.') ?></span>
                <span class="text-[10px] font-bold text-yellow-700 bg-yellow-200 px-1.5 py-0.5 rounded">Cần xử lý</span>
            </div>
        </div>
        <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center gap-2 mb-2">
                <span class="iconify text-teal-500 text-lg" data-icon="mdi:truck-delivery-outline"></span>
                <span class="text-[10px] font-medium text-teal-600 uppercase tracking-wider">Đang giao</span>
            </div>
            <div>
                <span class="text-2xl font-bold text-gray-900" id="statDangGiao"><?= number_format($stats['dang_giao'], 0, ',', '.') ?></span>
                <span class="text-[10px] text-gray-500 ml-1">đơn</span>
            </div>
        </div>
        <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center gap-2 mb-2">
                <span class="iconify text-emerald-500 text-lg" data-icon="mdi:check-circle-outline"></span>
                <span class="text-[10px] font-medium text-emerald-600 uppercase tracking-wider">Thành công</span>
            </div>
            <div>
                <span class="text-2xl font-bold text-gray-900" id="statThanhCong"><?= number_format($stats['thanh_cong'], 0, ',', '.') ?></span>
                <span class="text-[10px] text-gray-500 ml-1">đơn</span>
            </div>
        </div>
        <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
            <div class="flex items-center gap-2 mb-2">
                <span class="iconify text-gray-400 text-lg" data-icon="mdi:cancel"></span>
                <span class="text-[10px] font-medium text-gray-500 uppercase tracking-wider">Đã hủy</span>
            </div>
            <div>
                <span class="text-2xl font-bold text-gray-600" id="statDaHuy"><?= number_format($stats['da_huy'], 0, ',', '.') ?></span>
                <span class="text-[10px] text-gray-400 ml-1">đơn</span>
            </div>
        </div>
        <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 w-16 h-16 bg-red-50 rounded-full opacity-50"></div>
            <div class="flex items-center gap-2 mb-2 relative z-10">
                <span class="iconify text-[#6B0D18] text-lg" data-icon="mdi:cash-multiple"></span>
                <span class="text-[10px] font-medium text-gray-500 uppercase tracking-wider">Doanh thu (Thành công)</span>
            </div>
            <div class="relative z-10">
                <span class="text-xl font-bold text-[#6B0D18] tracking-tight"><?= number_format($stats['doanh_thu'], 0, ',', '.') ?>đ</span>
            </div>
        </div>
    </div>
