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
