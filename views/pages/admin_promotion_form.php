<?php
// views/pages/admin_promotion_form.php
$is_edit = $is_edit ?? false;
$mock = $mock_data ?? [];
?>
<div class="animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-1">
                <a href="<?= APP_URL ?>/admin/khuyen-mai" class="hover:text-[#6B0D18]">Khuyến mãi sản phẩm</a>
                <span class="iconify text-xs" data-icon="mdi:chevron-right"></span>
                <span class="text-gray-800 font-medium"><?= $is_edit ? 'Chỉnh sửa' : 'Thêm mới' ?></span>
            </div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury"><?= $is_edit ? 'Chỉnh sửa khuyến mãi' : 'Tạo khuyến mãi mới' ?></h2>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?= APP_URL ?>/admin/khuyen-mai" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy bỏ</a>
            <button class="px-4 py-2 bg-white border border-[#6B0D18] text-[#6B0D18] rounded-lg hover:bg-red-50 transition-colors font-medium text-sm">Lưu nháp</button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md" onclick="showFormToast()">
                <?= $is_edit ? 'Cập nhật khuyến mãi' : 'Tạo & Kích hoạt ngay' ?>
            </button>
        </div>
    </div>

    <!-- Alert if Editing Active Promo -->
    <?php if ($is_edit): ?>
    <div class="bg-amber-50 border border-amber-200 rounded-xl p-4 mb-6 flex items-start gap-3">
        <span class="iconify text-amber-500 text-xl mt-0.5" data-icon="mdi:alert-circle-outline"></span>
        <div>
            <h4 class="font-bold text-amber-800 text-sm">Chương trình đang diễn ra</h4>
            <p class="text-sm text-amber-700 mt-0.5">Việc thay đổi giá giảm hoặc thời gian lúc này có thể ảnh hưởng đến trải nghiệm của khách hàng đang xem trang web. Hãy cẩn trọng.</p>
        </div>
    </div>
    <?php endif; ?>

    <!-- Two Columns Layout -->
    <div class="flex flex-col lg:flex-row gap-6">
        
        <!-- LEFT COLUMN: Configurations -->
        <div class="flex-1 space-y-6">
            
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
                            <input type="text" value="<?= $is_edit ? $mock['ten'] : '' ?>" placeholder="VD: Flash Sale Vòng Ngọc Tháng 5" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all" id="input-name" oninput="updatePreview()">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mã chương trình (Tự động sinh)</label>
                            <input type="text" value="<?= $is_edit ? $mock['ma'] : 'KM-SP-0526' ?>" class="w-full px-3 py-2 border border-gray-100 bg-gray-50 text-gray-500 rounded-lg text-sm font-mono" readonly>
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Loại khuyến mãi <span class="text-red-500">*</span></label>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                            <label class="relative cursor-pointer">
                                <input type="radio" name="promo_type" value="percent" class="peer sr-only" <?= !$is_edit || $mock['loai'] !== 'flash_sale' ? 'checked' : '' ?> onchange="updatePreview()">
                                <div class="p-3 border border-gray-200 rounded-lg text-center peer-checked:border-[#6B0D18] peer-checked:bg-red-50 transition-colors">
                                    <span class="iconify text-xl mx-auto text-gray-400 peer-checked:text-[#6B0D18]" data-icon="mdi:percent-circle-outline"></span>
                                    <div class="text-[11px] font-medium mt-1 text-gray-600 peer-checked:text-[#6B0D18]">Giảm thông thường</div>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="promo_type" value="flash" class="peer sr-only" <?= $is_edit && $mock['loai'] === 'flash_sale' ? 'checked' : '' ?> onchange="updatePreview()">
                                <div class="p-3 border border-gray-200 rounded-lg text-center peer-checked:border-[#6B0D18] peer-checked:bg-red-50 transition-colors">
                                    <span class="iconify text-xl mx-auto text-gray-400 peer-checked:text-[#6B0D18]" data-icon="mdi:lightning-bolt-outline"></span>
                                    <div class="text-[11px] font-medium mt-1 text-gray-600 peer-checked:text-[#6B0D18]">Flash Sale</div>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="promo_type" value="clearance" class="peer sr-only">
                                <div class="p-3 border border-gray-200 rounded-lg text-center peer-checked:border-[#6B0D18] peer-checked:bg-red-50 transition-colors">
                                    <span class="iconify text-xl mx-auto text-gray-400 peer-checked:text-[#6B0D18]" data-icon="mdi:package-down"></span>
                                    <div class="text-[11px] font-medium mt-1 text-gray-600 peer-checked:text-[#6B0D18]">Xả kho</div>
                                </div>
                            </label>
                            <label class="relative cursor-pointer">
                                <input type="radio" name="promo_type" value="bundle" class="peer sr-only">
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
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="px-5 py-4 border-b border-gray-100 bg-gray-50/50 flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="w-6 h-6 rounded-full bg-[#6B0D18] text-white flex items-center justify-center text-xs font-bold">2</span>
                        <h3 class="font-bold text-gray-800">Sản phẩm áp dụng</h3>
                    </div>
                </div>
                <div class="p-5 space-y-4">
                    <div class="flex gap-2">
                        <select class="w-1/3 px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                            <option>Sản phẩm cụ thể</option>
                            <option>Theo Danh mục</option>
                            <option>Theo Loại ngọc</option>
                        </select>
                        <div class="relative flex-1">
                            <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                            <input type="text" placeholder="Tìm tên hoặc mã sản phẩm để thêm..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        </div>
                        <button class="px-4 py-2 bg-gray-100 border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors text-sm font-medium whitespace-nowrap">Chọn</button>
                    </div>

                    <!-- Selected Products Table -->
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <table class="w-full text-left text-sm text-gray-600">
                            <thead class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase tracking-wider font-bold">
                                <tr>
                                    <th class="px-4 py-2">Sản phẩm (1)</th>
                                    <th class="px-4 py-2">Giá gốc</th>
                                    <th class="px-4 py-2">Tồn kho</th>
                                    <th class="px-4 py-2 text-right">Xóa</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr>
                                    <td class="px-4 py-3 flex items-center gap-2">
                                        <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg" class="w-8 h-8 rounded border border-gray-100 object-cover">
                                        <div>
                                            <div class="font-medium text-gray-800 text-[13px]">Vòng Ngọc Bích Tài Lộc</div>
                                            <div class="text-[10px] text-gray-400 font-mono">NB-TL-001</div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-gray-800">850.000đ</td>
                                    <td class="px-4 py-3 text-gray-800">100</td>
                                    <td class="px-4 py-3 text-right">
                                        <button class="text-red-400 hover:text-red-600"><span class="iconify text-lg" data-icon="mdi:close-circle"></span></button>
                                    </td>
                                </tr>
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
                                <button class="flex-1 py-1.5 bg-white text-gray-800 shadow-sm rounded-md text-sm font-medium transition-all">Giảm phần trăm</button>
                                <button class="flex-1 py-1.5 text-gray-500 hover:text-gray-700 text-sm font-medium transition-all">Giảm tiền mặt</button>
                                <button class="flex-1 py-1.5 text-gray-500 hover:text-gray-700 text-sm font-medium transition-all">Giá sale cố định</button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Mức giảm <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <input type="number" id="input-discount" value="<?= $is_edit ? $mock['muc_giam'] : '20' ?>" class="w-full px-3 py-2 pr-10 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-right font-medium" oninput="updatePreview()">
                                <span class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 font-bold">%</span>
                            </div>
                        </div>
                    </div>

                    <!-- Price calculation preview -->
                    <div class="bg-blue-50 border border-blue-100 rounded-lg p-4 flex items-center justify-between">
                        <div>
                            <span class="text-xs text-blue-600 block mb-0.5">Giá trị sau khi giảm (ước tính cho sp gốc 850.000đ):</span>
                            <div class="text-lg font-bold text-[#6B0D18] flex items-center gap-2">
                                <span class="line-through text-gray-400 text-sm font-normal">850.000đ</span>
                                <span class="iconify text-gray-400 text-sm" data-icon="mdi:arrow-right"></span>
                                <span id="calc-result">680.000đ</span>
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
                            <input type="datetime-local" value="<?= $is_edit ? $mock['ngay_bd'] : '' ?>" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Thời gian kết thúc <span class="text-red-500">*</span></label>
                            <input type="datetime-local" value="<?= $is_edit ? $mock['ngay_kt'] : '' ?>" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-100 pt-4 mt-2">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Giới hạn tổng số lượng Sale</label>
                                <div class="relative">
                                    <input type="number" placeholder="Để trống là không giới hạn" value="100" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Giới hạn mỗi khách hàng</label>
                                <div class="relative">
                                    <input type="number" placeholder="Để trống là không giới hạn" class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18]">
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
                        <input type="checkbox" checked class="mt-1 w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" onchange="togglePreviewBadge('sale_badge', this.checked)">
                        <div>
                            <div class="text-sm font-medium text-gray-800">Hiển thị nhãn giảm giá (Badge)</div>
                            <div class="text-xs text-gray-500">Gắn nhãn -20% hoặc Flash Sale lên góc ảnh sản phẩm.</div>
                        </div>
                    </label>
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" checked class="mt-1 w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" onchange="togglePreviewBadge('countdown', this.checked)">
                        <div>
                            <div class="text-sm font-medium text-gray-800">Hiển thị đồng hồ đếm ngược</div>
                            <div class="text-xs text-gray-500">Rất phù hợp cho chương trình Flash Sale.</div>
                        </div>
                    </label>
                    <label class="flex items-start gap-3 cursor-pointer">
                        <input type="checkbox" checked class="mt-1 w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]" onchange="togglePreviewBadge('progress', this.checked)">
                        <div>
                            <div class="text-sm font-medium text-gray-800">Hiển thị thanh tiến độ (Đã bán)</div>
                            <div class="text-xs text-gray-500">Hiển thị thanh đã bán / tổng số lượng sale.</div>
                        </div>
                    </label>
                </div>
            </div>

        </div>

        <!-- RIGHT COLUMN: Live Preview -->
        <div class="w-full lg:w-[320px] xl:w-[360px] shrink-0">
            <div class="sticky top-6">
                <div class="bg-gray-100 rounded-xl p-4 border border-gray-200">
                    <h3 class="text-sm font-bold text-gray-800 mb-3 flex items-center gap-2">
                        <span class="iconify" data-icon="mdi:eye-outline"></span> Xem trước hiển thị thẻ sản phẩm
                    </h3>
                    
                    <!-- Storefront Product Card Mockup -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden relative group">
                        
                        <!-- Badges -->
                        <div id="prev-sale-badge" class="absolute top-2 left-2 bg-[#6B0D18] text-white text-[10px] font-bold px-2 py-1 rounded shadow-sm z-10 transition-opacity">
                            <span id="prev-discount-val">-20%</span>
                        </div>
                        <div id="prev-flash-badge" class="absolute top-2 right-2 bg-gradient-to-r from-orange-500 to-red-500 text-white text-[10px] font-bold px-2 py-1 rounded-full shadow-sm z-10 flex items-center gap-1 transition-opacity">
                            <span class="iconify text-[10px]" data-icon="mdi:lightning-bolt"></span> FLASH SALE
                        </div>

                        <!-- Image -->
                        <div class="aspect-square bg-gray-50 relative overflow-hidden">
                            <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            
                            <!-- Countdown Overlay -->
                            <div id="prev-countdown" class="absolute bottom-0 left-0 w-full bg-black/60 backdrop-blur-sm text-white text-[10px] py-1.5 flex justify-center items-center gap-1.5 transition-opacity">
                                <span>Kết thúc sau:</span>
                                <div class="flex items-center gap-0.5 font-mono font-bold">
                                    <span class="bg-white/20 px-1 rounded">03</span>:
                                    <span class="bg-white/20 px-1 rounded">15</span>:
                                    <span class="bg-white/20 px-1 rounded">42</span>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-3">
                            <h4 class="text-[13px] font-medium text-gray-800 line-clamp-2 leading-tight mb-2 hover:text-[#6B0D18] transition-colors cursor-pointer">Vòng Ngọc Bích Tài Lộc Hảo Hạng Tự Nhiên</h4>
                            
                            <div class="flex items-center gap-1.5 mb-2">
                                <span class="text-sm font-bold text-[#6B0D18]" id="prev-price-sale">680.000đ</span>
                                <span class="text-[11px] text-gray-400 line-through">850.000đ</span>
                            </div>

                            <!-- Progress Bar -->
                            <div id="prev-progress" class="w-full bg-red-100 rounded-full h-3 relative overflow-hidden mb-2 transition-opacity">
                                <div class="bg-gradient-to-r from-red-500 to-[#6B0D18] h-full" style="width: 45%;"></div>
                                <span class="absolute inset-0 flex items-center justify-center text-[8px] font-bold text-white uppercase tracking-wider drop-shadow-md">Đã bán 45</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-4 text-xs text-gray-500 text-center">
                        * Giao diện xem trước có thể khác biệt đôi chút so với thực tế trên thiết bị di động.
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Toast -->
<div id="formToast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]">
    <div class="text-emerald-500 mt-0.5"><span class="iconify text-xl" data-icon="mdi:check-circle"></span></div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5">Đã lưu chương trình khuyến mãi.</p>
    </div>
    <button onclick="document.getElementById('formToast').classList.add('translate-y-20','opacity-0')" class="text-gray-400 hover:text-gray-600 ml-4"><span class="iconify" data-icon="mdi:close"></span></button>
</div>

<script>
    function showFormToast() {
        const t = document.getElementById('formToast');
        t.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(() => t.classList.add('translate-y-20', 'opacity-0'), 3000);
        setTimeout(() => window.location.href = '<?= APP_URL ?>/admin/khuyen-mai', 1500);
    }

    function updatePreview() {
        // Logic to update live preview
        const discountInput = document.getElementById('input-discount').value;
        const typeFlash = document.querySelector('input[name="promo_type"][value="flash"]').checked;
        
        // Update math
        if(discountInput && discountInput <= 100) {
            const salePrice = 850000 * (1 - (discountInput / 100));
            const formattedSale = salePrice.toLocaleString('vi-VN') + 'đ';
            document.getElementById('calc-result').textContent = formattedSale;
            document.getElementById('prev-price-sale').textContent = formattedSale;
            document.getElementById('prev-discount-val').textContent = '-' + discountInput + '%';
        }

        // Toggle flash badge specifically
        const flashBadge = document.getElementById('prev-flash-badge');
        if(flashBadge) {
            if(typeFlash) {
                flashBadge.style.opacity = '1';
                flashBadge.style.display = 'flex';
            } else {
                flashBadge.style.opacity = '0';
                setTimeout(() => { if(flashBadge.style.opacity === '0') flashBadge.style.display = 'none'; }, 300);
            }
        }
    }

    function togglePreviewBadge(type, isShow) {
        let el;
        if(type === 'sale_badge') el = document.getElementById('prev-sale-badge');
        if(type === 'countdown') el = document.getElementById('prev-countdown');
        if(type === 'progress') el = document.getElementById('prev-progress');
        
        if(el) {
            if(isShow) {
                el.style.display = type === 'countdown' || type === 'sale_badge' ? 'flex' : 'block';
                setTimeout(() => el.style.opacity = '1', 10);
            } else {
                el.style.opacity = '0';
                setTimeout(() => { if(el.style.opacity === '0') el.style.display = 'none'; }, 300);
            }
        }
    }

    // Initialize state
    document.addEventListener('DOMContentLoaded', () => {
        updatePreview();
    });
</script>
