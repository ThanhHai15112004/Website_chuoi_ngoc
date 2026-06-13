        <!-- Form Area -->
        <div class="flex-1 space-y-6">
            <input type="hidden" id="voucher_id" value="<?= $is_edit ? $voucher['id'] : '' ?>">
            
            <!-- Thông tin cơ bản -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-5">
                <h4 class="font-semibold text-gray-800 flex items-center gap-2 border-b border-gray-50 pb-3 text-lg">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:information-outline"></span>
                    Thông tin cơ bản
                </h4>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Mã voucher <span class="text-red-500">*</span></label>
                        <div class="flex gap-2">
                            <input type="text" id="input_ma" oninput="updatePreview()" value="<?= $is_edit ? $voucher['ma_voucher'] : '' ?>" placeholder="VD: GIAM50K" class="flex-1 uppercase px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <button type="button" onclick="generateRandomCode()" class="px-4 py-2.5 bg-gray-50 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-100 transition-colors text-sm font-medium whitespace-nowrap flex items-center gap-1" title="Tạo mã ngẫu nhiên">
                                <span class="iconify" data-icon="mdi:refresh"></span> Tạo mã
                            </button>
                        </div>
                    </div>
                    
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Tên chương trình <span class="text-red-500">*</span></label>
                        <input type="text" id="input_ten" oninput="updatePreview()" value="<?= $is_edit ? $voucher['ten_chuong_trinh'] : '' ?>" placeholder="VD: Giảm 50K cho đơn từ 500K" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-sm font-medium text-gray-700">Mô tả chi tiết</label>
                    <textarea id="input_mo_ta" rows="3" placeholder="Nhập mô tả chi tiết về chương trình..." class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm resize-y transition-colors"><?= $is_edit ? $voucher['mo_ta'] : '' ?></textarea>
                </div>
            </div>

            <!-- Loại và giá trị giảm -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-5">
                <h4 class="font-semibold text-gray-800 flex items-center gap-2 border-b border-gray-50 pb-3 text-lg">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:percent-outline"></span>
                    Loại & Giá trị giảm
                </h4>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mb-2">
                    <label class="cursor-pointer">
                        <input type="radio" name="loai_giam" value="percent" class="peer sr-only" <?= (!$is_edit || $voucher['loai_giam'] == 1) ? 'checked' : '' ?> onchange="toggleDiscountType()">
                        <div class="px-4 py-3 border border-gray-200 rounded-xl text-center text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:text-[#6B0D18] peer-checked:bg-red-50 hover:bg-gray-50 transition-all flex flex-col items-center gap-1.5">
                            <span class="iconify text-xl" data-icon="mdi:percent"></span>
                            Phần trăm
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="loai_giam" value="fixed" class="peer sr-only" <?= ($is_edit && $voucher['loai_giam'] == 2) ? 'checked' : '' ?> onchange="toggleDiscountType()">
                        <div class="px-4 py-3 border border-gray-200 rounded-xl text-center text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:text-[#6B0D18] peer-checked:bg-red-50 hover:bg-gray-50 transition-all flex flex-col items-center gap-1.5">
                            <span class="iconify text-xl" data-icon="mdi:currency-usd"></span>
                            Số tiền
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="loai_giam" value="freeship" class="peer sr-only" <?= ($is_edit && $voucher['loai_giam'] == 3) ? 'checked' : '' ?> onchange="toggleDiscountType()">
                        <div class="px-4 py-3 border border-gray-200 rounded-xl text-center text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:text-[#6B0D18] peer-checked:bg-red-50 hover:bg-gray-50 transition-all flex flex-col items-center gap-1.5">
                            <span class="iconify text-xl" data-icon="mdi:truck-outline"></span>
                            Freeship
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="loai_giam" value="gift" class="peer sr-only" <?= ($is_edit && $voucher['loai_giam'] == 4) ? 'checked' : '' ?> onchange="toggleDiscountType()">
                        <div class="px-4 py-3 border border-gray-200 rounded-xl text-center text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:text-[#6B0D18] peer-checked:bg-red-50 hover:bg-gray-50 transition-all flex flex-col items-center gap-1.5">
                            <span class="iconify text-xl" data-icon="mdi:gift-outline"></span>
                            Quà tặng
                        </div>
                    </label>
                </div>

                <!-- Dynamic Fields based on Type -->
                <div id="discountFieldsPercent" class="grid grid-cols-1 md:grid-cols-2 gap-5 transition-all <?= ($is_edit && $voucher['loai_giam'] != 1 && $voucher['loai_giam'] != 3) ? 'hidden' : '' ?>">
                    <div class="space-y-1.5" id="field_percent" style="<?= ($is_edit && $voucher['loai_giam'] == 3) ? 'display: none;' : '' ?>">
                        <label class="block text-sm font-medium text-gray-700">Mức giảm (%) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="number" id="input_gia_tri" value="<?= ($is_edit && $voucher['loai_giam'] == 1) ? $voucher['gia_tri'] : '' ?>" oninput="updatePreview()" placeholder="VD: 10" class="w-full px-4 py-2.5 pr-8 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">%</span>
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Giảm tối đa (VNĐ)</label>
                        <div class="relative">
                            <input type="number" id="input_giam_toi_da" value="<?= ($is_edit && $voucher['giam_toi_da'] > 0) ? $voucher['giam_toi_da'] : '' ?>" placeholder="Không giới hạn thì để trống" class="w-full px-4 py-2.5 pr-8 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">đ</span>
                        </div>
                    </div>
                </div>

                <div id="discountFieldsFixed" class="transition-all <?= (!$is_edit || $voucher['loai_giam'] != 2) ? 'hidden' : '' ?>">
                    <div class="space-y-1.5 w-full md:w-1/2">
                        <label class="block text-sm font-medium text-gray-700">Số tiền giảm (VNĐ) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="number" id="input_gia_tri_fixed" value="<?= ($is_edit && $voucher['loai_giam'] == 2) ? $voucher['gia_tri'] : '' ?>" oninput="updatePreview()" placeholder="VD: 50000" class="w-full px-4 py-2.5 pr-8 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">đ</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Điều kiện áp dụng -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-5">
                <h4 class="font-semibold text-gray-800 flex items-center gap-2 border-b border-gray-50 pb-3 text-lg">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:format-list-checks"></span>
                    Điều kiện áp dụng
                </h4>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Giá trị đơn hàng tối thiểu</label>
                        <div class="relative">
                            <input type="number" id="input_dieu_kien" value="<?= $is_edit ? $voucher['don_toi_thieu'] : '' ?>" oninput="updatePreview()" placeholder="0 = Không yêu cầu" class="w-full px-4 py-2.5 pr-8 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">đ</span>
                        </div>
                    </div>

                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Phạm vi sản phẩm</label>
                        <select id="input_pham_vi" onchange="toggleScopeUI()" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm bg-white transition-colors">
                            <option value="all" <?= (!$is_edit || $voucher['pham_vi_san_pham'] == 'all') ? 'selected' : '' ?>>Toàn bộ cửa hàng</option>
                            <option value="category" <?= ($is_edit && $voucher['pham_vi_san_pham'] == 'category') ? 'selected' : '' ?>>Danh mục cụ thể</option>
                            <option value="product" <?= ($is_edit && $voucher['pham_vi_san_pham'] == 'product') ? 'selected' : '' ?>>Sản phẩm cụ thể</option>
                        </select>
                    </div>

                    <!-- Dynamic Category Selector -->
                    <div id="scope_category_box" class="space-y-2 mt-4 p-4 bg-gray-50 border border-gray-200 rounded-lg <?= ($is_edit && $voucher['pham_vi_san_pham'] == 'category') ? '' : 'hidden' ?> col-span-1 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Chọn các danh mục áp dụng</label>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-2 max-h-48 overflow-y-auto custom-scrollbar">
                            <?php foreach($danh_muc_list as $dm): ?>
                            <label class="flex items-center gap-2 cursor-pointer p-2 hover:bg-white rounded border border-transparent hover:border-gray-200">
                                <input type="checkbox" name="danh_muc_ids[]" value="<?= $dm['id'] ?>" class="w-4 h-4 text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18] category-checkbox" <?= in_array($dm['id'], $voucher_danh_muc) ? 'checked' : '' ?>>
                                <span class="text-sm text-gray-700"><?= $dm['ten_danh_muc'] ?></span>
                            </label>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Dynamic Product Selector -->
                    <div id="scope_product_box" class="space-y-3 mt-4 p-4 bg-gray-50 border border-gray-200 rounded-lg <?= ($is_edit && $voucher['pham_vi_san_pham'] == 'product') ? '' : 'hidden' ?> col-span-1 md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Chọn sản phẩm áp dụng</label>
                        <div class="relative">
                            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" data-icon="mdi:magnify"></span>
                            <input type="text" id="search_product_input" placeholder="Nhập tên hoặc mã sản phẩm..." oninput="searchProductDebounce(this.value)" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm">
                            <!-- Search Results Dropdown -->
                            <div id="search_product_results" class="absolute z-20 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg hidden max-h-60 overflow-y-auto custom-scrollbar">
                            </div>
                        </div>
                        
                        <!-- Selected Products List -->
                        <div class="mt-3">
                            <span class="text-xs font-bold text-gray-500 uppercase">Sản phẩm đã chọn (<span id="selected_products_count"><?= count($voucher_san_pham) ?></span>)</span>
                            <div id="selected_products_list" class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-2 max-h-48 overflow-y-auto custom-scrollbar">
                                <!-- Rendered via JS mostly, but initial load: -->
                                <?php foreach($voucher_san_pham as $sp): ?>
                                <div class="flex items-center justify-between bg-white p-2 border border-gray-200 rounded" id="selected_prod_<?= $sp['id_san_pham'] ?>">
                                    <div class="flex items-center gap-2">
                                        <img src="<?= $sp['anh_chinh'] ?>" class="w-8 h-8 rounded object-cover border border-gray-100">
                                        <div>
                                            <p class="text-sm font-medium text-gray-800 line-clamp-1"><?= $sp['ten_sp'] ?></p>
                                            <p class="text-xs text-gray-500"><?= $sp['ma_sp'] ?></p>
                                        </div>
                                    </div>
                                    <button type="button" onclick="removeProduct('<?= $sp['id_san_pham'] ?>')" class="text-red-500 hover:text-red-700 p-1">
                                        <span class="iconify" data-icon="mdi:close"></span>
                                    </button>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="pt-2">
                    <label class="flex items-center gap-3 cursor-pointer">
                        <input type="checkbox" id="input_is_combine" <?= ($is_edit && $voucher['is_combine'] == 1) ? 'checked' : '' ?> class="w-5 h-5 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        <span class="text-sm text-gray-700 font-medium">Không áp dụng cùng lúc với sản phẩm đang giảm giá</span>
                    </label>
                </div>
            </div>

            <!-- Đối tượng & Thời gian -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Thời gian -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-5">
                    <h4 class="font-semibold text-gray-800 flex items-center gap-2 border-b border-gray-50 pb-3 text-lg">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:calendar-clock-outline"></span>
                        Thời gian & Giới hạn
                    </h4>

                    <div class="space-y-4">
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider">Bắt đầu <span class="text-red-500">*</span></label>
                            <input type="datetime-local" id="input_ngay_bat_dau" value="<?= $is_edit ? date('Y-m-d\TH:i', strtotime($voucher['ngay_bat_dau'])) : '' ?>" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider">Kết thúc <span class="text-red-500">*</span></label>
                            <input type="datetime-local" id="input_date" value="<?= $is_edit ? date('Y-m-d\TH:i', strtotime($voucher['ngay_ket_thuc'])) : '' ?>" onchange="updatePreview()" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                        </div>
                        <div class="space-y-1.5 pt-4 border-t border-gray-50">
                            <label class="block text-xs font-bold text-gray-500 uppercase tracking-wider">Tổng số lượt sử dụng</label>
                            <div class="flex items-center gap-4">
                                <input type="number" id="input_so_luong" value="<?= ($is_edit && $voucher['so_luong'] != -1) ? $voucher['so_luong'] : '' ?>" <?= ($is_edit && $voucher['so_luong'] == -1) ? 'disabled' : '' ?> placeholder="VD: 100" class="flex-1 px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                                <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer whitespace-nowrap font-medium">
                                    <input type="checkbox" id="input_unlimited" <?= (!$is_edit || $voucher['so_luong'] == -1) ? 'checked' : '' ?> onchange="document.getElementById('input_so_luong').disabled = this.checked;" class="w-5 h-5 text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18]">
                                    Không giới hạn
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Đối tượng -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-5 flex flex-col">
                    <h4 class="font-semibold text-gray-800 flex items-center gap-2 border-b border-gray-50 pb-3 text-lg">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:account-group-outline"></span>
                        Khách hàng áp dụng
                    </h4>

                    <div class="space-y-2.5 flex-1 overflow-y-auto custom-scrollbar pr-2">
                        <label class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors border border-transparent hover:border-gray-200">
                            <input type="radio" name="doi_tuong" value="all" <?= (!$is_edit || $voucher['doi_tuong'] == 'all') ? 'checked' : '' ?> class="w-5 h-5 text-[#6B0D18] border-gray-300 focus:ring-[#6B0D18]">
                            <span class="text-sm font-medium text-gray-800">Tất cả khách hàng</span>
                        </label>
                        <label class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors border border-transparent hover:border-gray-200">
                            <input type="radio" name="doi_tuong" value="new" <?= ($is_edit && $voucher['doi_tuong'] == 'new') ? 'checked' : '' ?> class="w-5 h-5 text-[#6B0D18] border-gray-300 focus:ring-[#6B0D18]">
                            <span class="text-sm font-medium text-gray-800">Khách hàng mới (chưa mua hàng)</span>
                        </label>
                        
                        <div class="px-3 pt-3 pb-2 border-t border-gray-100 mt-2">
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-wider">Hạng thành viên</span>
                        </div>
                        
                        <?php 
                            $htv = $is_edit ? json_decode($voucher['hang_thanh_vien'], true) ?: [] : [];
                            $badgeColors = [
                                'Silver' => 'text-slate-600 bg-slate-50 border-slate-200', 
                                'Gold' => 'text-yellow-700 bg-yellow-50 border-yellow-200', 
                                'Diamond' => 'text-[#6B0D18] bg-red-50 border-red-200'
                            ];
                        ?>
                        <?php foreach($hang_thanh_vien_list as $hang): 
                            $colorClass = $badgeColors[$hang['ten_hang']] ?? 'text-gray-600 bg-gray-50 border-gray-200';
                            $checked = in_array($hang['ten_hang'], $htv) ? 'checked' : '';
                        ?>
                        <label class="flex items-center gap-3 p-3 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors border border-transparent hover:border-gray-200">
                            <input type="checkbox" name="hang_thanh_vien[]" value="<?= $hang['ten_hang'] ?>" <?= $checked ?> class="w-5 h-5 text-[#6B0D18] rounded border-gray-300 focus:ring-[#6B0D18]">
                            <span class="px-2.5 py-1 rounded text-xs font-bold border <?= $colorClass ?>"><?= $hang['ten_hang'] ?></span>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <!-- Trạng thái -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex justify-between items-center">
                <div>
                    <h4 class="font-semibold text-gray-800 text-lg">Trạng thái Kích hoạt</h4>
                    <p class="text-sm text-gray-500 mt-1">Voucher sẽ hiển thị và có thể sử dụng nếu đang trong thời gian hiệu lực.</p>
                </div>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="input_trang_thai" <?= (!$is_edit || $voucher['trang_thai'] == 1) ? 'checked' : '' ?> class="sr-only peer">
                    <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                </label>
            </div>
            
        </div>

