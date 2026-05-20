    <!-- Stats Cards -->
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="iconify text-gray-400 text-lg" data-icon="mdi:folder-multiple-outline"></span>
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wider">Tổng danh mục</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900"><?= $stats['tong'] ?></span>
                            <span class="text-xs text-gray-500 ml-1">danh mục</span>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="iconify text-emerald-500 text-lg" data-icon="mdi:eye-outline"></span>
                            <span class="text-xs font-medium text-emerald-600 uppercase tracking-wider">Đang hiển thị</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900"><?= $stats['hien_thi'] ?></span>
                            <span class="text-xs text-gray-500 ml-1">danh mục</span>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="iconify text-gray-400 text-lg" data-icon="mdi:eye-off-outline"></span>
                            <span class="text-xs font-medium text-gray-500 uppercase tracking-wider">Đang ẩn</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900"><?= $stats['dang_an'] ?></span>
                            <span class="text-xs text-gray-500 ml-1">danh mục</span>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-[18px] border border-gray-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="iconify text-blue-500 text-lg" data-icon="mdi:package-variant-closed"></span>
                            <span class="text-xs font-medium text-blue-600 uppercase tracking-wider">Có sản phẩm</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-gray-900"><?= $stats['co_sp'] ?></span>
                            <span class="text-xs text-gray-500 ml-1">danh mục</span>
                        </div>
                    </div>
                    <div class="bg-yellow-50 p-4 rounded-[18px] border border-yellow-100 shadow-sm flex flex-col justify-between hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-2 mb-2">
                            <span class="iconify text-yellow-600 text-lg" data-icon="mdi:alert-circle-outline"></span>
                            <span class="text-xs font-medium text-yellow-700 uppercase tracking-wider">Chưa có SP</span>
                        </div>
                        <div>
                            <span class="text-2xl font-bold text-yellow-800"><?= $stats['trong'] ?></span>
                            <span class="text-xs text-yellow-600 ml-1">danh mục</span>
                        </div>
                    </div>
                </div>

            