    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600"><span class="iconify text-lg" data-icon="mdi:account-group"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Tổng khách</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['tong'], 0, ',', '.') ?></p>
        </div>
        <div class="bg-emerald-50 rounded-xl shadow-sm border border-emerald-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600"><span class="iconify text-lg" data-icon="mdi:account-plus"></span></div>
                <h3 class="text-xs font-bold text-emerald-700 uppercase tracking-wider">Khách mới</h3>
            </div>
            <p class="text-2xl font-bold text-emerald-800">+<?= $thong_ke['khach_moi'] ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-purple-50 flex items-center justify-center text-purple-600"><span class="iconify text-lg" data-icon="mdi:cart-check"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Đã mua hàng</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['da_mua'], 0, ',', '.') ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600"><span class="iconify text-lg" data-icon="mdi:cart-off"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Chưa mua</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['chua_mua'], 0, ',', '.') ?></p>
        </div>
        <div class="bg-red-50 rounded-xl shadow-sm border border-red-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center text-red-600"><span class="iconify text-lg" data-icon="mdi:lock"></span></div>
                <h3 class="text-xs font-bold text-red-700 uppercase tracking-wider">Bị khóa</h3>
            </div>
            <p class="text-2xl font-bold text-red-800"><?= $thong_ke['bi_khoa'] ?></p>
        </div>
        <div class="bg-gradient-to-br from-white to-orange-50 rounded-xl shadow-sm border border-orange-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600"><span class="iconify text-lg" data-icon="mdi:diamond-stone"></span></div>
                <h3 class="text-xs font-bold text-orange-700 uppercase tracking-wider">Diamond</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= $thong_ke['diamond'] ?></p>
        </div>
    </div>
