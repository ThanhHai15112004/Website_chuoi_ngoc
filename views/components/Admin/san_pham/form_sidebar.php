            <!-- Trạng thái -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Trạng thái</h3>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-700">Hiển thị trên Web</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="trang_thai" value="1" class="sr-only peer" <?= ($sp['trang_thai'] ?? '1') == '1' ? 'checked' : '' ?>>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                    </label>
                </div>
            </div>

            <!-- Hình ảnh -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Hình ảnh sản phẩm</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Ảnh chính</label>
                        <?php if($is_edit && isset($sp['anh_chinh'])): ?>
                            <div class="relative w-full aspect-square rounded-[18px] overflow-hidden border border-gray-200 group mb-2">
                                <img src="<?= $sp['anh_chinh'] ?>" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button type="button" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-red-600 hover:bg-red-50 hover:scale-110 transition-transform">
                                        <span class="iconify text-xl" data-icon="mdi:trash-can-outline"></span>
                                    </button>
                                </div>
                            </div>
                        <?php else: ?>
                            <div id="imagePreviewContainer" class="relative border-2 border-dashed border-gray-300 rounded-[18px] p-6 text-center hover:bg-gray-50 hover:border-[#6B0D18] transition-colors cursor-pointer group mb-2 aspect-square flex flex-col items-center justify-center overflow-hidden">
                                <input type="file" name="anh_chinh" id="anh_chinh_input" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                <div id="imagePlaceholder">
                                    <span class="iconify text-4xl text-gray-400 group-hover:text-[#6B0D18] mb-2" data-icon="mdi:image-plus-outline"></span>
                                    <p class="text-sm font-medium text-gray-600 group-hover:text-[#6B0D18]">Tải ảnh lên</p>
                                    <p class="text-[11px] text-gray-400 mt-1">PNG, JPG, WEBP tới 5MB</p>
                                </div>
                                <img id="imagePreview" src="#" alt="Preview" class="hidden absolute inset-0 w-full h-full object-cover">
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Ảnh phụ (Tối đa 5 ảnh)</label>
                        <div class="grid grid-cols-4 gap-2" id="anhPhuPreviewContainer">
                            <?php if($is_edit && isset($sp['anh_phu'])): ?>
                                <?php foreach($sp['anh_phu'] as $anh): ?>
                                    <div class="relative aspect-square rounded-lg overflow-hidden border border-gray-200 group">
                                        <img src="<?= $anh ?>" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                            <button type="button" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-red-600 hover:scale-110 transition-transform">
                                                <span class="iconify text-xs" data-icon="mdi:trash-can-outline"></span>
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <div class="relative border border-dashed border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-50 hover:border-[#6B0D18] hover:text-[#6B0D18] transition-colors cursor-pointer aspect-square text-gray-400">
                                <input type="file" name="anh_phu[]" id="anh_phu_input" accept="image/*" multiple class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
                                <span class="iconify text-xl" data-icon="mdi:plus"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Giá & Kho -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Giá & Kho</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Giá bán (VNĐ) <span class="text-red-500">*</span></label>
                        <input type="number" name="gia_ban" value="<?= $sp['gia_ban'] ?? '' ?>" placeholder="0" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm font-bold text-gray-900">
                    </div>
                </div>
            </div>

            <!-- Biến thể (Kích thước / Màu sắc) -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4 border-b border-gray-100 pb-3">
                    <h3 class="text-base font-bold text-gray-900">Phân loại (Biến thể)</h3>
                    <button type="button" id="btnAddVariant" class="text-[#6B0D18] text-sm font-medium hover:underline flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:plus-circle-outline"></span> Thêm
                    </button>
                </div>
                
                <div id="variantsContainer" class="space-y-3">
                    <?php 
                    $bien_the_list = $sp['bien_the_thuc_te'] ?? []; 
                    if(empty($bien_the_list)): 
                    ?>
                        <div class="variant-item bg-gray-50 p-3 rounded-xl border border-gray-200 relative group">
                            <button type="button" class="remove-variant absolute -top-2 -right-2 w-6 h-6 bg-red-100 text-red-600 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-500 hover:text-white shadow-sm">
                                <span class="iconify text-xs" data-icon="mdi:close"></span>
                            </button>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-xs font-medium text-gray-600 mb-1">Tên thuộc tính (VD: Size 8mm)</label>
                                    <input type="text" name="bien_the[thuoc_tinh][]" placeholder="Tên phân loại" class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-[#6B0D18] text-sm">
                                </div>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label class="block text-xs font-medium text-gray-600 mb-1">Giá cộng thêm</label>
                                        <input type="number" name="bien_the[gia_cong_them][]" placeholder="0" class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-[#6B0D18] text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-gray-600 mb-1">Tồn kho</label>
                                        <input type="number" name="bien_the[so_luong_ton][]" placeholder="0" class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-[#6B0D18] text-sm">
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <?php foreach($bien_the_list as $bt): ?>
                            <div class="variant-item bg-gray-50 p-3 rounded-xl border border-gray-200 relative group">
                                <button type="button" class="remove-variant absolute -top-2 -right-2 w-6 h-6 bg-red-100 text-red-600 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-500 hover:text-white shadow-sm">
                                    <span class="iconify text-xs" data-icon="mdi:close"></span>
                                </button>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs font-medium text-gray-600 mb-1">Tên thuộc tính (VD: Size 8mm)</label>
                                        <input type="text" name="bien_the[thuoc_tinh][]" value="<?= htmlspecialchars($bt['thuoc_tinh']) ?>" class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-[#6B0D18] text-sm">
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <label class="block text-xs font-medium text-gray-600 mb-1">Giá cộng thêm</label>
                                            <input type="number" name="bien_the[gia_cong_them][]" value="<?= $bt['gia_cong_them'] ?>" class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-[#6B0D18] text-sm">
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-gray-600 mb-1">Tồn kho</label>
                                            <input type="number" name="bien_the[so_luong_ton][]" value="<?= $bt['so_luong_ton'] ?>" class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-[#6B0D18] text-sm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Nhãn Sản phẩm -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Gắn nhãn (Tag)</h3>
                <div class="flex flex-wrap gap-2">
                    <?php 
                        $all_tags = ['Mới', 'Bán chạy', 'Giảm giá', 'Flash sale', 'Cao cấp'];
                        $selected_tags = $sp['nhan'] ?? [];
                    ?>
                    <?php foreach($all_tags as $tag): ?>
                        <?php $isChecked = in_array($tag, $selected_tags); ?>
                        <label class="cursor-pointer relative">
                            <input type="checkbox" name="nhan[]" value="<?= $tag ?>" class="peer sr-only" <?= $isChecked ? 'checked' : '' ?>>
                            <div class="px-3 py-1.5 rounded-lg border border-gray-200 text-sm text-gray-600 peer-checked:bg-teal-50 peer-checked:text-teal-700 peer-checked:border-teal-200 peer-checked:font-medium hover:bg-gray-50 transition-colors">
                                <?= $tag ?>
                            </div>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const input = document.getElementById('anh_chinh_input');
                    const preview = document.getElementById('imagePreview');
                    const placeholder = document.getElementById('imagePlaceholder');
                    const container = document.getElementById('imagePreviewContainer');

                    if(input) {
                        input.addEventListener('change', function() {
                            const file = this.files[0];
                            if (file) {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    preview.src = e.target.result;
                                    preview.classList.remove('hidden');
                                    placeholder.classList.add('hidden');
                                    container.classList.remove('p-6', 'border-dashed');
                                }
                                reader.readAsDataURL(file);
                            } else {
                                preview.src = '#';
                                preview.classList.add('hidden');
                                placeholder.classList.remove('hidden');
                                container.classList.add('p-6', 'border-dashed');
                            }
                        });
                    }

                    const anhPhuInput = document.getElementById('anh_phu_input');
                    const anhPhuContainer = document.getElementById('anhPhuPreviewContainer');

                    if(anhPhuInput) {
                        anhPhuInput.addEventListener('change', function() {
                            const existingPreviews = anhPhuContainer.querySelectorAll('.new-preview');
                            existingPreviews.forEach(el => el.remove());

                            Array.from(this.files).slice(0, 5).forEach(file => {
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    const div = document.createElement('div');
                                    div.className = 'new-preview relative aspect-square rounded-lg overflow-hidden border border-gray-200 group';
                                    div.innerHTML = `
                                        <img src="${e.target.result}" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                            <button type="button" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-red-600 hover:scale-110 transition-transform">
                                                <span class="iconify text-xs" data-icon="mdi:trash-can-outline"></span>
                                            </button>
                                        </div>
                                    `;
                                    anhPhuContainer.insertBefore(div, anhPhuInput.parentElement);
                                }
                                reader.readAsDataURL(file);
                            });
                        });
                    }

                    // Xử lý Thêm / Xóa Biến thể
                    const btnAddVariant = document.getElementById('btnAddVariant');
                    const variantsContainer = document.getElementById('variantsContainer');

                    if(btnAddVariant && variantsContainer) {
                        btnAddVariant.addEventListener('click', function() {
                            const html = `
                                <div class="variant-item bg-gray-50 p-3 rounded-xl border border-gray-200 relative group mt-3">
                                    <button type="button" class="remove-variant absolute -top-2 -right-2 w-6 h-6 bg-red-100 text-red-600 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity hover:bg-red-500 hover:text-white shadow-sm">
                                        <span class="iconify text-xs" data-icon="mdi:close"></span>
                                    </button>
                                    <div class="space-y-3">
                                        <div>
                                            <label class="block text-xs font-medium text-gray-600 mb-1">Tên thuộc tính (VD: Size 8mm)</label>
                                            <input type="text" name="bien_the[thuoc_tinh][]" placeholder="Tên phân loại" class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-[#6B0D18] text-sm">
                                        </div>
                                        <div class="grid grid-cols-2 gap-3">
                                            <div>
                                                <label class="block text-xs font-medium text-gray-600 mb-1">Giá cộng thêm</label>
                                                <input type="number" name="bien_the[gia_cong_them][]" placeholder="0" class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-[#6B0D18] text-sm">
                                            </div>
                                            <div>
                                                <label class="block text-xs font-medium text-gray-600 mb-1">Tồn kho</label>
                                                <input type="number" name="bien_the[so_luong_ton][]" placeholder="0" class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg focus:outline-none focus:border-[#6B0D18] text-sm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            variantsContainer.insertAdjacentHTML('beforeend', html);
                        });

                        variantsContainer.addEventListener('click', function(e) {
                            if(e.target.closest('.remove-variant')) {
                                const item = e.target.closest('.variant-item');
                                if(variantsContainer.querySelectorAll('.variant-item').length > 1) {
                                    item.remove();
                                } else {
                                    // Xóa trống giá trị
                                    const inputs = item.querySelectorAll('input');
                                    inputs.forEach(input => input.value = '');
                                }
                            }
                        });
                    }
                });
            </script>
