    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600"><span class="iconify text-lg" data-icon="mdi:comment-text-multiple-outline"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Tổng đánh giá</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['tong'], 0, ',', '.') ?></p>
        </div>
        <div class="bg-amber-50 rounded-xl shadow-sm border border-amber-200 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center text-amber-700"><span class="iconify text-lg" data-icon="mdi:clock-outline"></span></div>
                <h3 class="text-xs font-bold text-amber-700 uppercase tracking-wider">Chờ duyệt</h3>
            </div>
            <p class="text-2xl font-bold text-amber-800"><?= $thong_ke['cho_duyet'] ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600"><span class="iconify text-lg" data-icon="mdi:check-circle-outline"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Đã duyệt</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($thong_ke['da_duyet'], 0, ',', '.') ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-gray-100 flex items-center justify-center text-gray-600"><span class="iconify text-lg" data-icon="mdi:eye-off-outline"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Đã ẩn</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= $thong_ke['da_an'] ?></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-yellow-50 flex items-center justify-center text-yellow-500"><span class="iconify text-lg" data-icon="mdi:star"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Điểm trung bình</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= $thong_ke['diem_tb'] ?> <span class="text-sm font-normal text-gray-500">/ 5</span></p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-purple-50 flex items-center justify-center text-purple-600"><span class="iconify text-lg" data-icon="mdi:image-outline"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Có hình ảnh</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= $thong_ke['co_anh'] ?></p>
        </div>
    </div>

