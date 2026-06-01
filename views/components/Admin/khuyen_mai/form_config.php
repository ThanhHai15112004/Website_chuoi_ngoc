        <!-- LEFT COLUMN: Configurations -->
        <div class="flex-1 space-y-6" id="promo-config-area">
            <?php if($is_edit): ?>
                <input type="hidden" id="input-id" value="<?= $mock['id'] ?>">
            <?php endif; ?>
            <!-- Group 1: Thông tin chung -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-[#6B0D18] text-white flex items-center justify-center text-xs font-bold">1</span>
                    <h3 class="font-bold text-gray-800">Thông tin chương trình</h3>
                </div>
                <div class="p-5 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tên chương trình <span class="text-red-500">*</span></label>
                            <input type="text" id="input-name" value="<?= $is_edit ? $mock['ten_chuong_trinh'] : '' ?>" placeholder="VD: Flash Sale Vòng Ngọc Tháng 5" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all" oninput="updatePreview()">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mã chương trình (Tự động sinh)</label>
                            <input type="text" id="input-code" value="<?= $is_edit ? $mock['ma_km'] : '' ?>" placeholder="VD: KM-SP-0526 (Tùy chọn)" class="w-full px-3 py-2 border border-gray-200 bg-white text-gray-800 rounded-lg text-sm font-mono focus:border-[#6B0D18]">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Loại khuyến mãi <span class="text-red-500">*</span></label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="relative cursor-pointer">
                                <input type="radio" name="promo_type" value="percent" class="peer sr-only" <?= !$is_edit || $mock['loai_km'] === 'percent' ? 'checked' : '' ?> onchange="updatePreview()">
                                <div class="p-3 border border-gray-200 rounded-lg text-center peer-checked:border-[#6B0D18] peer-checked:bg-red-50 transition-colors">
                                    <span class="iconify text-xl mx-auto text-gray-400 peer-checked:text-[#6B0D18]" data-icon="mdi:percent-circle-outline"></span>
                                    <div class="text-[11px] font-medium mt-1 text-gray-600 peer-checked:text-[#6B0D18]">Giảm thông thường</div>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="promo_type" value="flash" class="peer sr-only" <?= $is_edit && $mock['loai_km'] === 'flash' ? 'checked' : '' ?> onchange="updatePreview()">
                                <div class="p-3 border border-gray-200 rounded-lg text-center peer-checked:border-[#6B0D18] peer-checked:bg-red-50 transition-colors">
                                    <span class="iconify text-xl mx-auto text-gray-400 peer-checked:text-[#6B0D18]" data-icon="mdi:lightning-bolt-outline"></span>
                                    <div class="text-[11px] font-medium mt-1 text-gray-600 peer-checked:text-[#6B0D18]">Flash Sale</div>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="promo_type" value="clearance" class="peer sr-only" <?= $is_edit && $mock['loai_km'] === 'clearance' ? 'checked' : '' ?>>
                                <div class="p-3 border border-gray-200 rounded-lg text-center peer-checked:border-[#6B0D18] peer-checked:bg-red-50 transition-colors">
                                    <span class="iconify text-xl mx-auto text-gray-400 peer-checked:text-[#6B0D18]" data-icon="mdi:package-down"></span>
                                    <div class="text-[11px] font-medium mt-1 text-gray-600 peer-checked:text-[#6B0D18]">Xả kho</div>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="promo_type" value="bundle" class="peer sr-only" <?= $is_edit && $mock['loai_km'] === 'bundle' ? 'checked' : '' ?>>
                                <div class="p-3 border border-gray-200 rounded-lg text-center peer-checked:border-[#6B0D18] peer-checked:bg-red-50 transition-colors">
                                    <span class="iconify text-xl mx-auto text-gray-400 peer-checked:text-[#6B0D18]" data-icon="mdi:package-variant-closed"></span>
                                    <div class="text-[11px] font-medium mt-1 text-gray-600 peer-checked:text-[#6B0D18]">Combo sản phẩm</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Group 2: Sản phẩm áp dụng -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between rounded-t-xl">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-[#6B0D18] text-white flex items-center justify-center text-xs font-bold">2</span>
                        <h3 class="font-bold text-gray-800">Sản phẩm áp dụng</h3>
                    </div>
                </div>
                <div class="p-5 space-y-4">
                    <div class="flex gap-2">
                        <select class="w-1/3 px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                            <option>Sản phẩm cụ thể</option>
                        </select>
                        <div class="relative flex-1">
                            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                            <input type="text" id="search-product-input" placeholder="Tìm tên hoặc mã sản phẩm để thêm..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]" autocomplete="off">
                            <div id="search-results" class="absolute z-50 w-full bg-white border border-gray-200 rounded-lg mt-1 shadow-xl hidden max-h-60 overflow-y-auto"></div>
                        </div>
                        <button type="button" id="btn-search-trigger" class="px-4 py-2 bg-gray-100 border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium whitespace-nowrap">Tìm & Thêm</button>
                    </div>

                    <!-- Selected Products Table -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <table class="w-full text-left text-sm text-gray-600">
                            <thead class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase tracking-wider font-bold">
                                <tr>
                                    <th class="px-4 py-2">Sản phẩm</th>
                                    <th class="px-4 py-2">Giá gốc</th>
                                    <th class="px-4 py-2">Tồn kho</th>
                                    <th class="px-4 py-2 text-right">Xóa</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100" id="selected-products-body">
                                <?php if($is_edit && isset($mock['san_pham_ap_dung'])): ?>
                                    <?php foreach($mock['san_pham_ap_dung'] as $sp): ?>
                                    <?php $img = strpos($sp['hinh_anh_chinh'], 'http') === false ? APP_URL . '/' . $sp['hinh_anh_chinh'] : $sp['hinh_anh_chinh']; ?>
                                    <tr data-id="<?= $sp['id'] ?>" data-price="<?= $sp['gia_ban'] ?>" data-name="<?= htmlspecialchars($sp['ten_sp']) ?>" data-img="<?= $img ?>">
                                        <td class="px-4 py-3 flex items-center gap-2">
                                            <img src="<?= $img ?>" class="w-8 h-8 rounded border border-gray-100 object-cover">
                                            <div>
                                                <div class="font-medium text-gray-800 text-[13px]"><?= $sp['ten_sp'] ?></div>
                                                <div class="text-[10px] text-gray-400 font-mono"><?= $sp['ma_sp'] ?></div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-gray-800"><?= number_format($sp['gia_ban']) ?>đ</td>
                                        <td class="px-4 py-3 text-gray-800"><?= $sp['tong_ton_kho'] ?></td>
                                        <td class="px-4 py-3 text-right">
                                            <button type="button" class="text-red-400 hover:text-red-600 remove-product-btn"><span class="iconify text-lg" data-icon="mdi:close-circle"></span></button>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Group 3: Thiết lập mức giảm -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-[#6B0D18] text-white flex items-center justify-center text-xs font-bold">3</span>
                    <h3 class="font-bold text-gray-800">Thiết lập mức giảm</h3>
                </div>
                <div class="p-5 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kiểu giảm giá</label>
                            <div class="flex p-1 bg-gray-100 rounded-lg">
                                <?php $kieu = $is_edit ? $mock['kieu_giam'] : 'phan_tram'; ?>
                                <label class="flex-1 text-center cursor-pointer">
                                    <input type="radio" name="kieu_giam" value="phan_tram" class="peer sr-only" <?= $kieu === 'phan_tram' ? 'checked' : '' ?> onchange="updatePreview()">
                                    <div class="py-1.5 text-gray-500 peer-checked:bg-white peer-checked:text-gray-800 peer-checked:shadow-sm rounded-md text-sm font-medium transition-all">Phần trăm</div>
                                </label>
                                <label class="flex-1 text-center cursor-pointer">
                                    <input type="radio" name="kieu_giam" value="so_tien" class="peer sr-only" <?= $kieu === 'so_tien' ? 'checked' : '' ?> onchange="updatePreview()">
                                    <div class="py-1.5 text-gray-500 peer-checked:bg-white peer-checked:text-gray-800 peer-checked:shadow-sm rounded-md text-sm font-medium transition-all">Tiền mặt</div>
                                </label>
                                <label class="flex-1 text-center cursor-pointer">
                                    <input type="radio" name="kieu_giam" value="gia_co_dinh" class="peer sr-only" <?= $kieu === 'gia_co_dinh' ? 'checked' : '' ?> onchange="updatePreview()">
                                    <div class="py-1.5 text-gray-500 peer-checked:bg-white peer-checked:text-gray-800 peer-checked:shadow-sm rounded-md text-sm font-medium transition-all">Giá sale cố định</div>
                                </label>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mức giảm/Giá trị <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="text" id="input-discount" value="<?= $is_edit ? $mock['gia_tri_giam'] : '' ?>" class="w-full px-3 py-2 pr-10 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-right font-medium" oninput="updatePreview()">
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 font-bold" id="discount-unit">%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Price calculation preview -->
                    <div class="bg-blue-50 border border-blue-100 rounded-lg p-4 flex items-center justify-between">
                        <div>
                            <span class="text-xs text-blue-600 block mb-0.5" id="estimation-text">Giá trị sau khi giảm (ước tính cho sp gốc 1.000.000đ):</span>
                            <div class="text-lg font-bold text-[#6B0D18] flex items-center gap-2">
                                <span class="line-through text-gray-400 text-sm font-normal" id="estimation-original">1.000.000đ</span>
                                <span class="iconify text-gray-400 text-sm" data-icon="mdi:arrow-right"></span>
                                <span id="calc-result">...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Group 4: Thời gian và số lượng -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-[#6B0D18] text-white flex items-center justify-center text-xs font-bold">4</span>
                    <h3 class="font-bold text-gray-800">Thời gian & Giới hạn</h3>
                </div>
                <div class="p-5 space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Thời gian bắt đầu <span class="text-red-500">*</span></label>
                            <input type="datetime-local" id="input-start" value="<?= $is_edit ? date('Y-m-d\TH:i', strtotime($mock['ngay_bat_dau'])) : '' ?>" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Thời gian kết thúc <span class="text-red-500">*</span></label>
                            <input type="datetime-local" id="input-end" value="<?= $is_edit ? date('Y-m-d\TH:i', strtotime($mock['ngay_ket_thuc'])) : '' ?>" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-100 pt-4 mt-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Giới hạn tổng số lượng Sale</label>
                                <div class="relative">
                                    <input type="number" id="input-limit-total" value="<?= $is_edit ? ($mock['gioi_han_tong'] == -1 ? '' : $mock['gioi_han_tong']) : '' ?>" placeholder="Để trống là không giới hạn" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Giới hạn mỗi khách hàng</label>
                                <div class="relative">
                                    <input type="number" id="input-limit-user" value="<?= $is_edit ? ($mock['gioi_han_khach'] == -1 ? '' : $mock['gioi_han_khach']) : '' ?>" placeholder="Để trống là không giới hạn" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Group 5: Hiển thị -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center gap-2">
                    <span class="w-6 h-6 rounded-full bg-[#6B0D18] text-white flex items-center justify-center text-xs font-bold">5</span>
                    <h3 class="font-bold text-gray-800">Hiển thị ngoài trang chủ</h3>
                </div>
                <div class="p-5 space-y-3">
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" id="input-badge" <?= !$is_edit || $mock['hien_thi_badge'] == 1 ? 'checked' : '' ?> class="mt-1 w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" onchange="togglePreviewBadge('sale_badge', this.checked)">
                        <div>
                            <div class="text-sm font-medium text-gray-800">Hiển thị nhãn giảm giá (Badge)</div>
                            <div class="text-xs text-gray-500">Gắn nhãn giảm giá hoặc Flash Sale lên góc ảnh sản phẩm.</div>
                        </div>
                    </label>
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" id="input-countdown" <?= $is_edit && $mock['hien_thi_countdown'] == 1 ? 'checked' : '' ?> class="mt-1 w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" onchange="togglePreviewBadge('countdown', this.checked)">
                        <div>
                            <div class="text-sm font-medium text-gray-800">Hiển thị đồng hồ đếm ngược</div>
                            <div class="text-xs text-gray-500">Rất phù hợp cho chương trình Flash Sale.</div>
                        </div>
                    </label>
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" id="input-progress" <?= $is_edit && $mock['hien_thi_progress'] == 1 ? 'checked' : '' ?> class="mt-1 w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" onchange="togglePreviewBadge('progress', this.checked)">
                        <div>
                            <div class="text-sm font-medium text-gray-800">Hiển thị thanh tiến độ (Đã bán)</div>
                            <div class="text-xs text-gray-500">Hiển thị thanh đã bán / tổng số lượng sale.</div>
                        </div>
                    </label>
                </div>
            </div>

        </div>

