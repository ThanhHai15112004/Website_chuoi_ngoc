<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
    
    <!-- Card 1: SP đã bán -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 relative overflow-hidden group">
        <div class="flex justify-between items-start">
            <div>
                <p class="text-sm font-medium text-gray-500">Sản phẩm đã bán</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-2"><?= $overview['san_pham_da_ban']['gia_tri'] ?></h3>
            </div>
            <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                <span class="iconify text-xl" data-icon="mdi:package-variant-closed"></span>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm">
            <span class="flex items-center text-green-600 font-medium">
                <span class="iconify mr-1" data-icon="mdi:arrow-top-right"></span> +<?= $overview['san_pham_da_ban']['tang_truong'] ?>%
            </span>
        </div>
    </div>

    <!-- Card 2: Doanh thu SP -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 xl:col-span-2 relative overflow-hidden group">
        <div class="absolute right-0 top-0 w-24 h-24 bg-red-50 rounded-bl-full -mr-4 -mt-4 opacity-50 transition-transform group-hover:scale-110"></div>
        <div class="flex justify-between items-start relative z-10">
            <div>
                <p class="text-sm font-medium text-gray-500">Doanh thu sản phẩm</p>
                <h3 class="text-3xl font-bold text-[#6B0D18] mt-2"><?= number_format($overview['doanh_thu_san_pham']['gia_tri'], 0, ',', '.') ?>đ</h3>
            </div>
            <div class="w-10 h-10 rounded-lg bg-red-50 text-[#6B0D18] flex items-center justify-center shrink-0">
                <span class="iconify text-2xl" data-icon="mdi:cash-multiple"></span>
            </div>
        </div>
        <div class="mt-4 flex items-center text-sm relative z-10">
            <span class="flex items-center text-green-600 font-medium bg-green-50 px-2 py-0.5 rounded mr-2">
                <span class="iconify mr-1" data-icon="mdi:arrow-top-right"></span> +<?= $overview['doanh_thu_san_pham']['tang_truong'] ?>%
            </span>
            <span class="text-gray-500 text-xs">so với kỳ trước</span>
        </div>
    </div>

    <!-- Card 3: Bán chạy nhất -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
        <p class="text-sm font-medium text-gray-500 mb-3">Bán chạy nhất</p>
        <div class="flex gap-3 items-center">
            <img src="<?= $overview['sp_ban_chay_nhat']['hinh_anh'] ?>" alt="Bán chạy" class="w-12 h-12 rounded object-cover border border-gray-100 shrink-0">
            <div class="min-w-0 flex-1">
                <h4 class="text-sm font-bold text-gray-800 truncate" title="<?= $overview['sp_ban_chay_nhat']['ten'] ?>">
                    <?= $overview['sp_ban_chay_nhat']['ten'] ?>
                </h4>
                <p class="text-xs text-gray-500 mt-1">Đã bán: <strong class="text-gray-800"><?= $overview['sp_ban_chay_nhat']['da_ban'] ?></strong></p>
            </div>
        </div>
    </div>

    <!-- Card 4 & 5: Cảnh báo xếp chồng (Stacked) -->
    <div class="xl:col-span-2 grid grid-cols-2 gap-4">
        <!-- Bán chậm -->
        <div class="bg-orange-50/50 rounded-xl border border-orange-100 p-4 flex flex-col justify-between">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs text-orange-800 font-medium">Bán chậm</p>
                    <h3 class="text-2xl font-bold text-orange-600 mt-1"><?= $overview['sp_ban_cham']['so_luong'] ?> <span class="text-sm font-normal text-orange-700">SP</span></h3>
                </div>
                <span class="iconify text-orange-400 text-xl" data-icon="mdi:trending-down"></span>
            </div>
            <p class="text-xs text-orange-600 mt-3 font-medium cursor-pointer hover:underline"><?= $overview['sp_ban_cham']['hanh_dong'] ?> &rarr;</p>
        </div>

        <!-- Hết hàng & Tồn cao -->
        <div class="grid grid-rows-2 gap-4">
            <div class="bg-red-50/50 rounded-lg border border-red-100 px-3 py-2 flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-red-800 font-medium">Sắp hết hàng</p>
                    <h4 class="text-base font-bold text-red-600"><?= $overview['sap_het_hang']['so_luong'] ?></h4>
                </div>
                <span class="iconify text-red-400 text-lg" data-icon="mdi:alert-circle-outline"></span>
            </div>
            <div class="bg-yellow-50/50 rounded-lg border border-yellow-100 px-3 py-2 flex items-center justify-between">
                <div>
                    <p class="text-[11px] text-yellow-800 font-medium">Tồn kho cao</p>
                    <h4 class="text-base font-bold text-yellow-700"><?= $overview['ton_kho_cao']['so_luong'] ?></h4>
                </div>
                <span class="iconify text-yellow-500 text-lg" data-icon="mdi:archive-alert-outline"></span>
            </div>
        </div>
    </div>

</div>
