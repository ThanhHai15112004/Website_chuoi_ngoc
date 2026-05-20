    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-500 mb-2">
                <span class="iconify" data-icon="mdi:diamond-stone"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Tổng loại đá</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['tong_loai']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-emerald-600 mb-2">
                <span class="iconify" data-icon="mdi:eye-outline"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Đang hiển thị</span>
            </div>
            <div class="text-2xl font-bold text-emerald-600"><?= number_format($thong_ke['dang_hien_thi']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-400 mb-2">
                <span class="iconify" data-icon="mdi:eye-off-outline"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Đang ẩn</span>
            </div>
            <div class="text-2xl font-bold text-gray-500"><?= number_format($thong_ke['dang_an']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-blue-500 mb-2">
                <span class="iconify" data-icon="mdi:package-variant-closed"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Có sản phẩm</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['co_san_pham']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-amber-500 mb-2">
                <span class="iconify" data-icon="mdi:package-variant"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Chưa có SP</span>
            </div>
            <div class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['chua_co_sp']) ?></div>
        </div>

        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-[#6B0D18] mb-2">
                <span class="iconify text-[#D4AF37]" data-icon="mdi:crown"></span>
                <span class="text-[11px] font-medium uppercase tracking-wider">Dùng nhiều nhất</span>
            </div>
            <div class="text-sm font-bold text-gray-800 truncate" title="<?= $thong_ke['dung_nhieu_nhat'] ?>"><?= $thong_ke['dung_nhieu_nhat'] ?></div>
        </div>
    </div>

