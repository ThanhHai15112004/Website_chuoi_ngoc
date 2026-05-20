    <!-- Card Thống Kê Nhanh (Grid) -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:shopping-outline"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Tổng đơn hàng</p>
            <p class="text-xl font-bold text-gray-800"><?= $kh['tong_don'] ?> <span class="text-xs font-normal text-gray-400">đơn</span></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:check-circle-outline"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Đơn thành công</p>
            <p class="text-xl font-bold text-gray-800"><?= $kh['don_thanh_cong'] ?> <span class="text-xs font-normal text-gray-400">đơn</span></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 relative overflow-hidden">
            <div class="absolute -right-4 -bottom-4 opacity-5 text-red-900">
                <span class="iconify text-6xl" data-icon="mdi:cash-multiple"></span>
            </div>
            <div class="w-8 h-8 rounded-full bg-red-50 text-[#6B0D18] flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:cash"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Tổng chi tiêu</p>
            <p class="text-xl font-bold text-[#6B0D18] relative z-10"><?= number_format($kh['tong_chi_tieu'], 0, ',', '.') ?>đ</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-orange-50 text-orange-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:ticket-percent-outline"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Voucher khả dụng</p>
            <p class="text-xl font-bold text-gray-800"><?= $kh['so_voucher'] ?> <span class="text-xs font-normal text-gray-400">mã</span></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-pink-50 text-pink-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:heart-outline"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Yêu thích</p>
            <p class="text-xl font-bold text-gray-800"><?= $kh['so_yeu_thich'] ?> <span class="text-xs font-normal text-gray-400">SP</span></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="w-8 h-8 rounded-full bg-yellow-50 text-yellow-500 flex items-center justify-center mb-3">
                <span class="iconify" data-icon="mdi:star-outline"></span>
            </div>
            <p class="text-xs text-gray-500 mb-0.5">Đánh giá</p>
            <p class="text-xl font-bold text-gray-800"><?= $kh['so_danh_gia'] ?> <span class="text-xs font-normal text-gray-400">lượt</span></p>
        </div>
    </div>

