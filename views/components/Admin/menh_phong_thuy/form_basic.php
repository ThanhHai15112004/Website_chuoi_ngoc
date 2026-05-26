        <!-- Khối 1: Thông tin cơ bản -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:information-outline"></span>
                    Thông tin cơ bản
                </h3>
            </div>
            <div class="p-6 space-y-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tên mệnh</label>
                    <input type="text" value="<?= $mock['ten'] ?>" class="w-full md:w-1/2 px-4 py-2 border border-gray-200 rounded-lg text-sm bg-gray-50 text-gray-500 cursor-not-allowed font-bold" readonly>
                    <p class="text-xs text-gray-400 mt-1">Tên ngũ hành là cố định, không thể thay đổi.</p>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả ngắn</label>
                    <input type="text" value="<?= $mock['mo_ta_ngan'] ?>" placeholder="Ví dụ: Sự sinh sôi, phát triển..." class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả chi tiết & Ý nghĩa</label>
                    <p class="text-[11px] text-gray-400 mb-2">Nội dung phong thủy nên viết theo hướng tham khảo, tránh khẳng định tuyệt đối.</p>
                    <textarea rows="4" placeholder="Nhập ý nghĩa chi tiết..." class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] resize-none leading-relaxed"><?= $mock['mo_ta_chi_tiet'] ?></textarea>
                </div>
            </div>
        </div>

        <!-- Khối 2: Màu sắc -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:palette-outline"></span>
                    Màu sắc phong thủy
                </h3>
            </div>
            <div class="p-6 space-y-6">
                <!-- Màu đại diện -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">Màu đại diện</label>
                    <div class="flex items-center gap-3">
                        <input type="color" value="<?= $mock['mau_dai_dien'][0] ?>" class="w-10 h-10 rounded cursor-pointer border-0 p-0">
                        <span class="text-sm text-gray-500">Màu này dùng làm chấm màu (badge) hiển thị chung cho Mệnh Mộc.</span>
                    </div>
                </div>

                <hr class="border-gray-100">

                <?php 
                $allColors = ['Trắng', 'Bạc', 'Vàng', 'Nâu', 'Xanh lá', 'Xanh ngọc', 'Xanh dương', 'Đen', 'Đỏ', 'Hồng', 'Tím'];
                ?>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Màu hợp -->
                    <div>
                        <label class="block text-sm font-bold text-emerald-600 mb-3">Màu tương sinh / tương hợp</label>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($allColors as $c): 
                                $isChecked = in_array($c, $mock['mau_hop']);
                            ?>
                                <label class="cursor-pointer">
                                    <input type="checkbox" class="peer hidden" <?= $isChecked ? 'checked' : '' ?>>
                                    <div class="px-3 py-1.5 border border-gray-200 rounded-md text-sm font-medium text-gray-600 peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:text-emerald-700 transition-all select-none">
                                        <?= $c ?>
                                    </div>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                    <!-- Màu kỵ -->
                    <div>
                        <label class="block text-sm font-bold text-red-500 mb-3">Màu tương khắc (Nên tránh)</label>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($allColors as $c): 
                                $isChecked = in_array($c, $mock['mau_ky']);
                            ?>
                                <label class="cursor-pointer">
                                    <input type="checkbox" class="peer hidden" <?= $isChecked ? 'checked' : '' ?>>
                                    <div class="px-3 py-1.5 border border-gray-200 rounded-md text-sm font-medium text-gray-600 peer-checked:border-red-500 peer-checked:bg-red-50 peer-checked:text-red-700 transition-all select-none">
                                        <?= $c ?>
                                    </div>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Khối 3: Đá & Nhu cầu -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden border-l-4 border-l-[#6B0D18]">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
                <h3 class="font-bold text-[#6B0D18] flex items-center gap-2">
                    <span class="iconify text-lg" data-icon="mdi:diamond-stone"></span>
                    Đá phong thủy & Nhu cầu
                </h3>
            </div>
            <div class="p-6 space-y-6">
                <!-- Nhu cầu phù hợp -->
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">Nhu cầu phù hợp</label>
                    <div class="flex flex-wrap gap-3">
                        <?php 
                        $nhucaus = ['Bình an', 'Tài lộc', 'May mắn', 'Tình duyên', 'Công việc', 'Sức khỏe tinh thần', 'Quà tặng'];
                        foreach ($nhucaus as $n): 
                            $isChecked = in_array($n, $mock['nhu_cau']);
                        ?>
                            <label class="cursor-pointer relative">
                                <input type="checkbox" class="peer hidden" <?= $isChecked ? 'checked' : '' ?>>
                                <div class="px-4 py-2 border border-gray-200 rounded-full text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18] peer-checked:text-white transition-all select-none">
                                    <?= $n ?>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <hr class="border-gray-100">

                <!-- Loại đá phù hợp -->
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <label class="block text-sm font-bold text-gray-700">Loại đá / ngọc gợi ý</label>
                        <button class="text-sm font-medium text-[#6B0D18] hover:underline flex items-center gap-1">
                            <span class="iconify" data-icon="mdi:plus"></span> Thêm loại đá
                        </button>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3">
                        <?php foreach ($mock['da_hop'] as $da): ?>
                            <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg bg-gray-50 group">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 bg-white border border-gray-200 rounded-full flex items-center justify-center shrink-0">
                                        <span class="iconify text-gray-400" data-icon="mdi:diamond-stone"></span>
                                    </div>
                                    <div class="min-w-0">
                                        <h5 class="text-sm font-bold text-gray-800 truncate"><?= $da['ten'] ?></h5>
                                        <p class="text-[10px] text-gray-500"><?= $da['mau'] ?> • <?= $da['nhom'] ?></p>
                                    </div>
                                </div>
                                <button class="w-6 h-6 rounded flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 transition-colors opacity-0 group-hover:opacity-100 shrink-0">
                                    <span class="iconify" data-icon="mdi:close"></span>
                                </button>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Khối 4: Quản lý Năm sinh -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:calendar-account-outline"></span>
                    Năm sinh cấu hình
                </h3>
                <button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-md text-xs font-bold hover:bg-[#8A111F] transition-colors flex items-center gap-1" onclick="document.getElementById('addYearModal').classList.remove('hidden')">
                    <span class="iconify" data-icon="mdi:plus"></span> Thêm năm sinh
                </button>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                    <?php foreach ($mock['nam_sinh'] as $ns): ?>
                        <div class="flex items-center justify-between px-3 py-2 border border-gray-200 rounded-lg hover:border-[#6B0D18] transition-colors group">
                            <div>
                                <h5 class="text-sm font-bold text-gray-800"><?= $ns['nam'] ?></h5>
                                <p class="text-[10px] text-gray-500"><?= $ns['can_chi'] ?></p>
                            </div>
                            <button class="text-gray-400 hover:text-red-500 transition-colors opacity-0 group-hover:opacity-100" title="Xóa">
                                <span class="iconify" data-icon="mdi:trash-can-outline"></span>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Khối 5: Sản phẩm gợi ý -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:package-variant-closed"></span>
                    Sản phẩm gợi ý (Vòng Sinh Mệnh)
                </h3>
                <button class="px-3 py-1.5 bg-white border border-gray-300 text-gray-700 rounded-md text-xs font-bold hover:bg-gray-50 transition-colors flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:magnify"></span> Thêm sản phẩm
                </button>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <?php foreach ($mock['san_pham'] as $sp): ?>
                        <div class="flex items-center gap-3 p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors group">
                            <span class="iconify text-gray-300 cursor-move" data-icon="mdi:drag"></span>
                            <div class="w-12 h-12 bg-gray-100 rounded-md border border-gray-200 shrink-0 overflow-hidden">
                                <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h5 class="text-sm font-bold text-gray-800 truncate"><?= $sp['ten'] ?></h5>
                                <div class="flex items-center gap-2 mt-0.5 text-xs">
                                    <span class="font-medium text-[#6B0D18]"><?= number_format($sp['gia'], 0, ',', '.') ?>đ</span>
                                    <span class="text-gray-300">•</span>
                                    <span class="text-gray-500">Tồn: <?= $sp['ton'] ?></span>
                                </div>
                            </div>
                            <button class="w-8 h-8 rounded-lg flex items-center justify-center text-gray-400 hover:text-red-500 hover:bg-red-50 transition-colors shrink-0">
                                <span class="iconify" data-icon="mdi:trash-can-outline"></span>
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Khối 6: SEO & Trạng thái -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="iconify text-gray-400" data-icon="mdi:web"></span>
                        Nội dung hiển thị trên User (Vòng theo mệnh)
                    </h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tiêu đề hiển thị</label>
                        <input type="text" value="<?= $mock['seo_tieu_de'] ?>" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Đoạn giới thiệu ngắn</label>
                        <textarea rows="3" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"><?= $mock['seo_mo_ta'] ?></textarea>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="iconify text-gray-400" data-icon="mdi:eye-outline"></span>
                        Trạng thái hiển thị
                    </h3>
                </div>
                <div class="p-6">
                    <label class="block text-sm font-medium text-gray-800 mb-3">Hiển thị trên trang User?</label>
                    <div class="flex items-center gap-4">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" <?= $mock['trang_thai'] === 1 ? 'checked' : '' ?> class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                            <span class="text-sm font-medium text-emerald-600">Đang hiển thị</span>
                        </label>
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="radio" name="status" <?= $mock['trang_thai'] === 0 ? 'checked' : '' ?> class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                            <span class="text-sm text-gray-500">Ẩn đi</span>
                        </label>
                    </div>
                    <p class="text-xs text-gray-500 mt-4 leading-relaxed bg-gray-50 p-3 rounded-lg border border-gray-100">Nếu tắt, mệnh này sẽ không hiển thị ở các trang gợi ý hoặc bộ lọc người dùng, nhưng dữ liệu vẫn được bảo lưu.</p>
                </div>
            </div>

        </div>

    </div>
</div>

