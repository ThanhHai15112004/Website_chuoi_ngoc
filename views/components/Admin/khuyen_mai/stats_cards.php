    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-500 mb-2">
                <span class="iconify" data-icon="mdi:sale"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Tổng chương trình</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['tong_chuong_trinh']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-emerald-600 mb-2">
                <span class="iconify" data-icon="mdi:play-circle-outline"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Đang diễn ra</span>
            </div>
            <div class="text-2xl font-bold text-emerald-600"><?= number_format($thong_ke['dang_dien_ra']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-blue-500 mb-2">
                <span class="iconify" data-icon="mdi:clock-start"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Sắp bắt đầu</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['sap_bat_dau']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-amber-500 mb-2">
                <span class="iconify" data-icon="mdi:clock-alert-outline"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Sắp kết thúc</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['sap_ket_thuc']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-purple-600 mb-2">
                <span class="iconify" data-icon="mdi:percent-circle-outline"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Sản phẩm giảm giá</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['san_pham_giam_gia']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-[#6B0D18] mb-2">
                <span class="iconify" data-icon="mdi:currency-usd"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Doanh thu K.Mãi</span>
            </div>
            <div class="text-lg font-bold text-[#6B0D18] truncate" title="<?= number_format($thong_ke['doanh_thu_km'], 0, ',', '.') ?>đ"><?= format_currency_short($thong_ke['doanh_thu_km']) ?></div>
        </div>
    </div>

