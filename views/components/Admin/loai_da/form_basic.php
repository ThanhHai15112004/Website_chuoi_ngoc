        <!-- Nhóm 1: Thông tin cơ bản -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:information-outline"></span>
                    Thông tin cơ bản
                </h3>
            </div>
            <div class="p-6 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tên loại đá / ngọc <span class="text-red-500">*</span></label>
                        <input type="text" value="<?= $is_edit ? $mock['ten'] : '' ?>" placeholder="Ví dụ: Ngọc bích" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mã loại đá</label>
                        <input type="text" value="<?= $is_edit ? $mock['ma'] : 'STONE-' ?>" placeholder="Tự động sinh nếu để trống" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] <?= $is_edit ? 'bg-gray-50 text-gray-500' : '' ?>" <?= $is_edit ? 'readonly' : '' ?>>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tên tiếng Anh / Tên khác</label>
                        <input type="text" value="<?= $is_edit ? $mock['tieng_anh'] : '' ?>" placeholder="Ví dụ: Jade" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nhóm chất liệu <span class="text-red-500">*</span></label>
                        <select class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] bg-white">
                            <option value="">Chọn nhóm...</option>
                            <option value="ngoc" <?= $is_edit && $mock['nhom'] == 'ngoc' ? 'selected' : '' ?>>Ngọc</option>
                            <option value="tu_nhien">Đá tự nhiên</option>
                            <option value="ban_quy">Đá bán quý</option>
                            <option value="cao_cap">Đá cao cấp</option>
                            <option value="khac">Khác</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả ngắn</label>
                    <textarea rows="2" placeholder="Nhập mô tả ngắn gọn..." class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] resize-none"><?= $is_edit ? $mock['mo_ta'] : '' ?></textarea>
                </div>
            </div>
        </div>

        <!-- Nhóm 2: Hình ảnh và màu sắc -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                <h3 class="font-bold text-gray-800 flex items-center gap-2">
                    <span class="iconify text-gray-400" data-icon="mdi:image-outline"></span>
                    Hình ảnh và Màu sắc
                </h3>
            </div>
            <div class="p-6">
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Ảnh đại diện -->
                    <div class="w-full lg:w-[240px] shrink-0">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ảnh đại diện</label>
                        <?php if ($is_edit): ?>
                            <div class="relative group rounded-xl border border-gray-200 overflow-hidden aspect-square">
                                <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/50 hidden group-hover:flex items-center justify-center gap-2 transition-all">
                                    <button class="w-8 h-8 bg-white text-gray-700 rounded-full flex items-center justify-center hover:bg-gray-100"><span class="iconify" data-icon="mdi:pencil"></span></button>
                                    <button class="w-8 h-8 bg-white text-red-600 rounded-full flex items-center justify-center hover:bg-red-50"><span class="iconify" data-icon="mdi:trash-can-outline"></span></button>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="border-2 border-dashed border-gray-300 rounded-xl aspect-square flex flex-col items-center justify-center text-gray-400 hover:border-[#6B0D18] hover:text-[#6B0D18] transition-colors cursor-pointer bg-gray-50 hover:bg-red-50/50">
                                <span class="iconify text-3xl mb-2" data-icon="mdi:cloud-upload-outline"></span>
                                <span class="text-sm font-medium">Tải ảnh lên</span>
                                <span class="text-xs text-gray-400 mt-1">PNG, JPG (tối đa 2MB)</span>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Màu sắc -->
                    <div class="flex-1 space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Màu chủ đạo</label>
                                <input type="text" value="<?= $is_edit ? $mock['mau_sac'] : '' ?>" placeholder="Ví dụ: Xanh ngọc, Hồng nhạt..." class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mã màu (để làm chấm màu)</label>
                                <div class="flex items-center gap-3">
                                    <input type="color" id="stoneColorPicker" value="<?= $is_edit ? $mock['mau_hex'] : '#E5E7EB' ?>" class="w-10 h-10 rounded cursor-pointer border-0 p-0" onchange="document.getElementById('hexInput').value = this.value">
                                    <input type="text" id="hexInput" value="<?= $is_edit ? $mock['mau_hex'] : '#E5E7EB' ?>" class="flex-1 px-4 py-2 border border-gray-200 rounded-lg text-sm font-mono focus:outline-none focus:border-[#6B0D18]" oninput="document.getElementById('stoneColorPicker').value = this.value">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gợi ý bảng màu</label>
                            <div class="flex flex-wrap gap-2">
                                <button class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #10B981" onclick="setColor('#10B981')"></button>
                                <button class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #3B82F6" onclick="setColor('#3B82F6')"></button>
                                <button class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #F472B6" onclick="setColor('#F472B6')"></button>
                                <button class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #A855F7" onclick="setColor('#A855F7')"></button>
                                <button class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #EF4444" onclick="setColor('#EF4444')"></button>
                                <button class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #F59E0B" onclick="setColor('#F59E0B')"></button>
                                <button class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #1F2937" onclick="setColor('#1F2937')"></button>
                                <button class="w-6 h-6 rounded-full shadow-sm border border-gray-200 hover:scale-110 transition-transform" style="background-color: #FFFFFF" onclick="setColor('#FFFFFF')"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nhóm 3: Phong thủy và Ý nghĩa -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden border-l-4 border-l-[#6B0D18]">
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
                <h3 class="font-bold text-[#6B0D18] flex items-center gap-2">
                    <span class="iconify text-lg" data-icon="mdi:yin-yang"></span>
                    Phong thủy và Ý nghĩa
                </h3>
            </div>
            <div class="p-6 space-y-6">
                
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">Mệnh phù hợp</label>
                    <div class="flex flex-wrap gap-3">
                        <?php 
                        $menhs = ['Kim', 'Mộc', 'Thủy', 'Hỏa', 'Thổ'];
                        foreach ($menhs as $m): 
                            $isChecked = $is_edit && in_array($m, $mock['menh']);
                        ?>
                            <label class="cursor-pointer">
                                <input type="checkbox" class="peer hidden" <?= $isChecked ? 'checked' : '' ?>>
                                <div class="px-4 py-2 border border-gray-200 rounded-full text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18] peer-checked:text-white transition-all select-none">
                                    <?= $m ?>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">Nhu cầu phù hợp</label>
                    <div class="flex flex-wrap gap-3">
                        <?php 
                        $nhucaus = ['Bình an', 'Tài lộc', 'May mắn', 'Tình duyên', 'Công việc', 'Sức khỏe tinh thần', 'Quà tặng'];
                        foreach ($nhucaus as $n): 
                            $isChecked = $is_edit && in_array($n, $mock['nhu_cau']);
                        ?>
                            <label class="cursor-pointer">
                                <input type="checkbox" class="peer hidden" <?= $isChecked ? 'checked' : '' ?>>
                                <div class="px-4 py-2 border border-gray-200 rounded-full text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:bg-red-50 peer-checked:text-[#6B0D18] transition-all select-none">
                                    <?= $n ?>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ý nghĩa phong thủy</label>
                        <p class="text-[11px] text-gray-400 mb-2">Nội dung phong thủy nên viết theo hướng tham khảo.</p>
                        <textarea rows="4" placeholder="Nhập ý nghĩa chi tiết..." class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] resize-none leading-relaxed"><?= $is_edit ? $mock['y_nghia'] : '' ?></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lưu ý sử dụng & bảo quản</label>
                        <p class="text-[11px] text-gray-400 mb-2">Các lưu ý giúp khách hàng bảo quản đá/ngọc tốt hơn.</p>
                        <textarea rows="4" placeholder="Ví dụ: Tránh va đập mạnh, hạn chế hóa chất..." class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 resize-none leading-relaxed"><?= $is_edit ? $mock['luu_y'] : '' ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Nhóm 4 & 5: SEO & Trạng thái -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
                    <h3 class="font-bold text-gray-800 flex items-center gap-2">
                        <span class="iconify text-gray-400" data-icon="mdi:web"></span>
                        SEO & Đường dẫn
                    </h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Slug (Đường dẫn)</label>
                        <div class="flex items-center text-sm border border-gray-200 rounded-lg overflow-hidden focus-within:border-[#6B0D18] focus-within:ring-1 focus-within:ring-[#6B0D18]">
                            <span class="bg-gray-50 px-3 py-2 text-gray-500 border-r border-gray-200 hidden sm:block">chuoingoc.com/loai-da/</span>
                            <input type="text" value="<?= $is_edit ? $mock['slug'] : '' ?>" placeholder="ngoc-bich" class="flex-1 px-3 py-2 focus:outline-none text-gray-700">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
                        <input type="text" value="<?= $is_edit ? $mock['ten'] . ' phong thủy' : '' ?>" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
                        <textarea rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"><?= $is_edit ? 'Tìm hiểu ý nghĩa ' . $mock['ten'] . ' và các mẫu sản phẩm phù hợp.' : '' ?></textarea>
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
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-3">Hiển thị loại đá này?</label>
                        <div class="flex items-center gap-4">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="status" checked class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm font-medium text-emerald-600">Đang hiển thị</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="status" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-500">Ẩn đi</span>
                            </label>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">Nếu ẩn, loại đá này sẽ không hiển thị ở bộ lọc trang chủ.</p>
                    </div>
                    
                    <hr class="border-gray-100">

                    <div>
                        <label class="block text-sm font-medium text-gray-800 mb-1">Thứ tự ưu tiên</label>
                        <p class="text-xs text-gray-500 mb-2">Số càng nhỏ, xếp càng cao trong bộ lọc.</p>
                        <input type="number" value="1" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

