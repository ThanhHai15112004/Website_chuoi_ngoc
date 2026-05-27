    <!-- Stats Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-[#6B0D18]"><span class="iconify text-lg" data-icon="mdi:yin-yang"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Tổng mệnh</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= $stats['tong_menh'] ?> mệnh</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-emerald-50 flex items-center justify-center text-emerald-600"><span class="iconify text-lg" data-icon="mdi:eye-outline"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Đang hiển thị</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= $stats['dang_hien_thi'] ?> mệnh</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600"><span class="iconify text-lg" data-icon="mdi:diamond-stone"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Loại đá liên kết</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($stats['loai_da_lien_ket']) ?> loại</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-purple-50 flex items-center justify-center text-purple-600"><span class="iconify text-lg" data-icon="mdi:package-variant-closed"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Sản phẩm gắn mệnh</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($stats['san_pham_gan_menh']) ?> SP</p>
        </div>
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-amber-50 flex items-center justify-center text-amber-600"><span class="iconify text-lg" data-icon="mdi:calendar-account-outline"></span></div>
                <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">Năm sinh cấu hình</h3>
            </div>
            <p class="text-2xl font-bold text-gray-800"><?= number_format($stats['nam_sinh_cau_hinh']) ?> năm</p>
        </div>
        <div class="bg-amber-50 rounded-xl shadow-sm border border-amber-200 p-4">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-8 h-8 rounded-full bg-amber-100 flex items-center justify-center text-amber-700"><span class="iconify text-lg" data-icon="mdi:alert-circle-outline"></span></div>
                <h3 class="text-xs font-bold text-amber-700 uppercase tracking-wider">Cần bổ sung</h3>
            </div>
            <p class="text-2xl font-bold text-amber-800"><?= $stats['dang_an'] ?> mệnh</p>
        </div>
    </div>

