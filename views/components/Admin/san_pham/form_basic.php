            <!-- Thông tin chung -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Thông tin chung</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Tên sản phẩm <span class="text-red-500">*</span></label>
                        <input type="text" name="ten_sp" value="<?= $sp['ten_sp'] ?? '' ?>" placeholder="Nhập tên sản phẩm..." class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Mã sản phẩm (Tự động nếu để trống)</label>
                            <input type="text" name="ma_sp" value="<?= $sp['ma_sp'] ?? '' ?>" placeholder="VD: VNB-001" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm font-mono">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Danh mục <span class="text-red-500">*</span></label>
                            <select name="danh_muc" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-10 relative bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_1rem_center] bg-[length:1em_1em] text-sm">
                                <option value="">Chọn danh mục</option>
                                <?php foreach($danh_muc_list as $dm): ?>
                                    <option value="<?= $dm ?>" <?= ($sp['danh_muc'] ?? '') === $dm ? 'selected' : '' ?>><?= $dm ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Loại đá <span class="text-red-500">*</span></label>
                            <select name="loai_da" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-10 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_1rem_center] bg-[length:1em_1em] text-sm">
                                <option value="">Chọn loại đá</option>
                                <?php foreach($loai_da_list as $da): ?>
                                    <option value="<?= $da ?>" <?= ($sp['loai_da'] ?? '') === $da ? 'selected' : '' ?>><?= $da ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Mệnh phù hợp (Chọn nhiều)</label>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <?php foreach($menh_list as $m): ?>
                                    <?php $isChecked = isset($sp['menh']) && in_array($m, $sp['menh']); ?>
                                    <label class="cursor-pointer">
                                        <input type="checkbox" name="menh[]" value="<?= $m ?>" class="peer sr-only" <?= $isChecked ? 'checked' : '' ?>>
                                        <div class="px-3 py-1.5 rounded-lg border border-gray-200 text-sm text-gray-600 peer-checked:bg-[#FAF8F5] peer-checked:text-[#6B0D18] peer-checked:border-[#E4D5C3] peer-checked:font-medium hover:bg-gray-50 transition-colors">
                                            <?= $m ?>
                                        </div>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bài viết mô tả -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Mô tả sản phẩm</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Mô tả ngắn (Hiển thị ở danh sách SP)</label>
                        <textarea name="mo_ta_ngan" rows="3" placeholder="Nhập một đoạn tóm tắt về sản phẩm..." class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm"><?= $sp['mo_ta_ngan'] ?? '' ?></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Mô tả chi tiết (Bài viết SEO)</label>
                        <!-- Giả lập Rich Text Editor -->
                        <div class="border border-gray-200 rounded-xl overflow-hidden focus-within:border-[#6B0D18] transition-colors">
                            <div class="bg-gray-50 border-b border-gray-200 px-3 py-2 flex items-center gap-1 flex-wrap">
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:format-bold"></span></button>
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:format-italic"></span></button>
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:format-underline"></span></button>
                                <div class="w-px h-5 bg-gray-300 mx-1"></div>
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:format-list-bulleted"></span></button>
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:format-list-numbered"></span></button>
                                <div class="w-px h-5 bg-gray-300 mx-1"></div>
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:image-outline"></span></button>
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:link-variant"></span></button>
                            </div>
                            <textarea name="mo_ta_chi_tiet" rows="10" placeholder="Viết mô tả chi tiết..." class="w-full px-4 py-3 bg-white focus:outline-none text-sm resize-y min-h-[200px] prose prose-sm"><?= strip_tags($sp['mo_ta_chi_tiet'] ?? '') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>
