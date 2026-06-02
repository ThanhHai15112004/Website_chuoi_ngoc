<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
    <!-- Card 1: Tổng doanh thu (Lớn nhất/Nổi bật) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 xl:col-span-2 relative overflow-hidden group">
        <div class="absolute right-0 top-0 w-24 h-24 bg-red-50 rounded-bl-full -mr-4 -mt-4 opacity-50 transition-transform group-hover:scale-110"></div>
        <div class="flex justify-between items-start relative z-10">
            <div>
                <p class="text-sm font-medium text-gray-500 flex items-center gap-1">
                    Tổng doanh thu
                    <span class="iconify text-gray-400 cursor-help" data-icon="mdi:information" title="Tổng giá trị đơn hàng thành công trong khoảng thời gian đã chọn."></span>
                </p>
                <h3 class="text-3xl font-bold text-[#6B0D18] mt-2"><?= format_currency_short($overview['tong_doanh_thu']['gia_tri']) ?></h3>
            </div>
            <div class="w-10 h-10 rounded-lg bg-red-50 text-[#6B0D18] flex items-center justify-center shrink-0">
                <span class="iconify text-2xl" data-icon="mdi:cash-multiple"></span>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <?php if($overview['tong_doanh_thu']['xu_huong'] === 'tang'): ?>
                <span class="flex items-center text-green-600 font-medium bg-green-50 px-2 py-0.5 rounded mr-2">
                    <span class="iconify mr-1" data-icon="mdi:arrow-top-right"></span> +<?= $overview['tong_doanh_thu']['tang_truong'] ?>%
                </span>
            <?php elseif($overview['tong_doanh_thu']['xu_huong'] === 'giam'): ?>
                <span class="flex items-center text-red-600 font-medium bg-red-50 px-2 py-0.5 rounded mr-2">
                    <span class="iconify mr-1" data-icon="mdi:arrow-bottom-right"></span> -<?= $overview['tong_doanh_thu']['tang_truong'] ?>%
                </span>
            <?php else: ?>
                <span class="flex items-center text-gray-600 font-medium bg-gray-100 px-2 py-0.5 rounded mr-2">
                    <span class="iconify mr-1" data-icon="mdi:minus"></span> 0%
                </span>
            <?php endif; ?>
            <span class="text-gray-500 text-xs">so với kỳ trước</span>
        </div>
    </div>

    <!-- Card 2: Đơn hàng thành công -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-gray-500">Đơn thành công</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-2"><?= number_format($overview['don_thanh_cong']['gia_tri'], 0, ',', '.') ?></h3>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <?php if($overview['don_thanh_cong']['xu_huong'] === 'tang'): ?>
                <span class="flex items-center text-green-600 font-medium bg-green-50 px-2 py-0.5 rounded">
                    <span class="iconify mr-1" data-icon="mdi:arrow-top-right"></span> +<?= $overview['don_thanh_cong']['tang_truong'] ?>%
                </span>
            <?php elseif($overview['don_thanh_cong']['xu_huong'] === 'giam'): ?>
                <span class="flex items-center text-red-600 font-medium bg-red-50 px-2 py-0.5 rounded">
                    <span class="iconify mr-1" data-icon="mdi:arrow-bottom-right"></span> -<?= $overview['don_thanh_cong']['tang_truong'] ?>%
                </span>
            <?php else: ?>
                <span class="flex items-center text-gray-600 font-medium bg-gray-100 px-2 py-0.5 rounded">
                    <span class="iconify mr-1" data-icon="mdi:minus"></span> 0%
                </span>
            <?php endif; ?>
        </div>
    </div>

    <!-- Card 3: Giá trị đơn trung bình -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-gray-500">Đơn trung bình</p>
                <h3 class="text-xl font-bold text-gray-800 mt-2"><?= format_currency_short($overview['gia_tri_trung_binh']['gia_tri']) ?></h3>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <?php if($overview['gia_tri_trung_binh']['xu_huong'] === 'tang'): ?>
                <span class="flex items-center text-green-600 font-medium bg-green-50 px-2 py-0.5 rounded">
                    <span class="iconify mr-1" data-icon="mdi:arrow-top-right"></span> +<?= $overview['gia_tri_trung_binh']['tang_truong'] ?>%
                </span>
            <?php elseif($overview['gia_tri_trung_binh']['xu_huong'] === 'giam'): ?>
                <span class="flex items-center text-red-600 font-medium bg-red-50 px-2 py-0.5 rounded">
                    <span class="iconify mr-1" data-icon="mdi:arrow-bottom-right"></span> -<?= $overview['gia_tri_trung_binh']['tang_truong'] ?>%
                </span>
            <?php else: ?>
                <span class="flex items-center text-gray-600 font-medium bg-gray-100 px-2 py-0.5 rounded">
                    <span class="iconify mr-1" data-icon="mdi:minus"></span> 0%
                </span>
            <?php endif; ?>
        </div>
    </div>

    <!-- Card 4: SP đã bán & Giảm giá (Stacked) -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 flex flex-col justify-between xl:col-span-2">
        
        <div class="flex items-center justify-between pb-3 border-b border-gray-100">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center">
                    <span class="iconify" data-icon="mdi:package-variant"></span>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium">Sản phẩm đã bán</p>
                    <p class="text-lg font-bold text-gray-800"><?= number_format($overview['san_pham_da_ban']['gia_tri'], 0, ',', '.') ?></p>
                </div>
            </div>
        </div>
        
        <div class="flex items-center justify-between pt-3">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-orange-50 text-orange-600 flex items-center justify-center">
                    <span class="iconify" data-icon="mdi:ticket-percent"></span>
                </div>
                <div>
                    <p class="text-xs text-gray-500 font-medium flex items-center gap-1">
                        Tổng giảm giá
                        <span class="iconify text-gray-400 cursor-help" data-icon="mdi:information" title="Tổng giá trị giảm từ voucher và khuyến mãi."></span>
                    </p>
                    <p class="text-lg font-bold text-orange-600"><?= format_currency_short($overview['tong_giam_gia']['gia_tri']) ?></p>
                </div>
            </div>
        </div>

    </div>

</div>
