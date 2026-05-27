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
                        <input type="text" name="ten_loai_da" value="<?= htmlspecialchars($is_edit ? $stone['ten_loai_da'] : '') ?>" required placeholder="Ví dụ: Ngọc bích" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mã loại đá</label>
                        <input type="text" name="ma_loai_da" value="<?= htmlspecialchars($is_edit ? $stone['ma_loai_da'] : '') ?>" placeholder="Tự động sinh nếu để trống" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] <?= $is_edit ? 'bg-gray-50 text-gray-500' : '' ?>" <?= $is_edit ? 'readonly' : '' ?>>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tên tiếng Anh / Tên khác</label>
                        <input type="text" name="ten_tieng_anh" value="<?= htmlspecialchars($is_edit ? $stone['ten_tieng_anh'] : '') ?>" placeholder="Ví dụ: Jade" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nhóm chất liệu <span class="text-red-500">*</span></label>
                        <select name="nhom" required class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm text-gray-700 focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] bg-white">
                            <option value="">Chọn nhóm...</option>
                            <option value="Ngọc" <?= $is_edit && $stone['nhom'] === 'Ngọc' ? 'selected' : '' ?>>Ngọc</option>
                            <option value="Đá tự nhiên" <?= $is_edit && $stone['nhom'] === 'Đá tự nhiên' ? 'selected' : '' ?>>Đá tự nhiên</option>
                            <option value="Đá bán quý" <?= $is_edit && $stone['nhom'] === 'Đá bán quý' ? 'selected' : '' ?>>Đá bán quý</option>
                            <option value="Đá cao cấp" <?= $is_edit && $stone['nhom'] === 'Đá cao cấp' ? 'selected' : '' ?>>Đá cao cấp</option>
                            <option value="Khác" <?= $is_edit && $stone['nhom'] === 'Khác' ? 'selected' : '' ?>>Khác</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả ngắn</label>
                    <textarea name="mo_ta_ngan" rows="2" placeholder="Nhập mô tả ngắn gọn..." class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] resize-none"><?= htmlspecialchars($is_edit ? ($stone['mo_ta_ngan'] ?? '') : '') ?></textarea>
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
                        <?php if ($is_edit && !empty($stone['hinh_anh'])): ?>
                            <div class="relative group rounded-xl border border-gray-200 overflow-hidden aspect-square" id="imagePreviewContainer">
                                <img src="<?= APP_URL ?>/public/uploads/loai_da/<?= $stone['hinh_anh'] ?>" class="w-full h-full object-cover" id="imagePreview">
                                <div class="absolute inset-0 bg-black/50 hidden group-hover:flex items-center justify-center gap-2 transition-all">
                                    <label class="w-8 h-8 bg-white text-gray-700 rounded-full flex items-center justify-center hover:bg-gray-100 cursor-pointer">
                                        <span class="iconify" data-icon="mdi:pencil"></span>
                                        <input type="file" name="hinh_anh" accept="image/*" class="hidden" onchange="previewImage(this)">
                                    </label>
                                </div>
                            </div>
                        <?php else: ?>
                            <label class="border-2 border-dashed border-gray-300 rounded-xl aspect-square flex flex-col items-center justify-center text-gray-400 hover:border-[#6B0D18] hover:text-[#6B0D18] transition-colors cursor-pointer bg-gray-50 hover:bg-red-50/50 relative overflow-hidden" id="imagePreviewContainer">
                                <img src="" id="imagePreview" class="absolute inset-0 w-full h-full object-cover hidden">
                                <div class="flex flex-col items-center justify-center pointer-events-none" id="imagePlaceholder">
                                    <span class="iconify text-3xl mb-2" data-icon="mdi:cloud-upload-outline"></span>
                                    <span class="text-sm font-medium">Tải ảnh lên</span>
                                    <span class="text-xs text-gray-400 mt-1">PNG, JPG (tối đa 2MB)</span>
                                </div>
                                <input type="file" name="hinh_anh" accept="image/*" class="hidden" onchange="previewImage(this)">
                            </label>
                        <?php endif; ?>
                    </div>

                    <script>
                    function previewImage(input) {
                        if (input.files && input.files[0]) {
                            var reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('imagePreview').src = e.target.result;
                                document.getElementById('imagePreview').classList.remove('hidden');
                                var placeholder = document.getElementById('imagePlaceholder');
                                if (placeholder) placeholder.classList.add('hidden');
                            }
                            reader.readAsDataURL(input.files[0]);
                        }
                    }
                    </script>

                    <!-- Màu sắc -->
                    <div class="flex-1 space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Màu chủ đạo</label>
                                <input type="text" name="mau_sac_ten" value="<?= htmlspecialchars($is_edit ? $stone['mau_sac_ten'] : '') ?>" placeholder="Ví dụ: Xanh ngọc, Hồng nhạt..." class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mã màu (để làm chấm màu)</label>
                                <div class="flex items-center gap-3">
                                    <input type="color" id="stoneColorPicker" value="<?= $is_edit ? ($stone['mau_sac_hex'] ?: '#E5E7EB') : '#E5E7EB' ?>" class="w-10 h-10 rounded cursor-pointer border-0 p-0" onchange="document.getElementById('hexInput').value = this.value">
                                    <input type="text" name="mau_sac_hex" id="hexInput" value="<?= htmlspecialchars($is_edit ? ($stone['mau_sac_hex'] ?: '#E5E7EB') : '#E5E7EB') ?>" class="flex-1 px-4 py-2 border border-gray-200 rounded-lg text-sm font-mono focus:outline-none focus:border-[#6B0D18]" oninput="document.getElementById('stoneColorPicker').value = this.value">
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Gợi ý bảng màu</label>
                            <div class="flex flex-wrap gap-2">
                                <button type="button" class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #10B981" onclick="setColor('#10B981')"></button>
                                <button type="button" class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #3B82F6" onclick="setColor('#3B82F6')"></button>
                                <button type="button" class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #F472B6" onclick="setColor('#F472B6')"></button>
                                <button type="button" class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #A855F7" onclick="setColor('#A855F7')"></button>
                                <button type="button" class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #EF4444" onclick="setColor('#EF4444')"></button>
                                <button type="button" class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #F59E0B" onclick="setColor('#F59E0B')"></button>
                                <button type="button" class="w-6 h-6 rounded-full shadow-sm hover:scale-110 transition-transform" style="background-color: #1F2937" onclick="setColor('#1F2937')"></button>
                                <button type="button" class="w-6 h-6 rounded-full shadow-sm border border-gray-200 hover:scale-110 transition-transform" style="background-color: #FFFFFF" onclick="setColor('#FFFFFF')"></button>
                            </div>
                        </div>
                        <script>
                        function setColor(hex) {
                            document.getElementById('stoneColorPicker').value = hex;
                            document.getElementById('hexInput').value = hex;
                        }
                        </script>
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
                        foreach ($menh_list as $m): 
                            $isChecked = $is_edit && in_array($m['id'], $stone['menh_ids']);
                        ?>
                            <label class="cursor-pointer">
                                <input type="checkbox" name="menh_ids[]" value="<?= $m['id'] ?>" class="peer hidden" <?= $isChecked ? 'checked' : '' ?>>
                                <div class="px-4 py-2 border border-gray-200 rounded-full text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18] peer-checked:text-white transition-all select-none flex items-center gap-2">
                                    <span class="w-2.5 h-2.5 rounded-full" style="background-color: <?= $m['mau_sac_hop'] ?: '#ccc' ?>"></span>
                                    <?= $m['ten_menh'] ?>
                                </div>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-3">Nhu cầu phù hợp (Nhập các từ khóa, cách nhau bằng dấu phẩy)</label>
                    <?php 
                    $nhuCauStr = '';
                    if ($is_edit && !empty($stone['nhu_cau'])) {
                        $nhuCauArr = is_string($stone['nhu_cau']) ? json_decode($stone['nhu_cau'], true) : $stone['nhu_cau'];
                        if (is_array($nhuCauArr)) {
                            $nhuCauStr = implode(', ', $nhuCauArr);
                        }
                    }
                    ?>
                    <input type="text" name="nhu_cau" value="<?= htmlspecialchars($nhuCauStr) ?>" placeholder="Bình an, Tài lộc, May mắn, Sức khỏe..." class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18]">
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ý nghĩa phong thủy</label>
                        <p class="text-[11px] text-gray-400 mb-2">Nội dung phong thủy nên viết theo hướng tham khảo.</p>
                        <textarea name="y_nghia" rows="4" placeholder="Nhập ý nghĩa chi tiết..." class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] resize-none leading-relaxed"><?= htmlspecialchars($is_edit ? ($stone['y_nghia'] ?? '') : '') ?></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Lưu ý sử dụng & bảo quản</label>
                        <p class="text-[11px] text-gray-400 mb-2">Các lưu ý giúp khách hàng bảo quản đá/ngọc tốt hơn.</p>
                        <textarea name="luu_y" rows="4" placeholder="Ví dụ: Tránh va đập mạnh, hạn chế hóa chất..." class="w-full px-4 py-3 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500 resize-none leading-relaxed"><?= htmlspecialchars($is_edit ? ($stone['luu_y'] ?? '') : '') ?></textarea>
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
                            <input type="text" name="slug" value="<?= htmlspecialchars($is_edit ? $stone['slug'] : '') ?>" placeholder="Tự động sinh nếu để trống" class="flex-1 px-3 py-2 focus:outline-none text-gray-700">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
                        <input type="text" name="meta_title" value="<?= htmlspecialchars($is_edit ? ($stone['meta_title'] ?? '') : '') ?>" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
                        <textarea name="meta_description" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] resize-none"><?= htmlspecialchars($is_edit ? ($stone['meta_description'] ?? '') : '') ?></textarea>
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
                                <input type="radio" name="trang_thai" value="1" <?= (!$is_edit || $stone['trang_thai'] == 1) ? 'checked' : '' ?> class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm font-medium text-emerald-600">Đang hiển thị</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="trang_thai" value="0" <?= ($is_edit && $stone['trang_thai'] == 0) ? 'checked' : '' ?> class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-500">Ẩn đi</span>
                            </label>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">Nếu ẩn, loại đá này sẽ không hiển thị ở bộ lọc trang chủ.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

