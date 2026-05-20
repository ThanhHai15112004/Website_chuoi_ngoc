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
                            <input type="text" id="input_ma" oninput="updatePreview()" placeholder="VD: GIAM50K" class="flex-1 uppercase px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <button type="button" onclick="generateRandomCode()" class="px-4 py-2.5 bg-gray-50 text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-100 transition-colors text-sm font-medium whitespace-nowrap flex items-center gap-1" title="Tạo mã ngẫu nhiên">
                                <span class="iconify" data-icon="mdi:refresh"></span> Tạo mã
                            </button>
                        </div>
                    </div>
                    
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Tên chương trình <span class="text-red-500">*</span></label>
                        <input type="text" id="input_ten" oninput="updatePreview()" placeholder="VD: Giảm 50K cho đơn từ 500K" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-sm font-medium text-gray-700">Mô tả chi tiết</label>
                    <textarea rows="3" placeholder="Nhập mô tả chi tiết về chương trình..." class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm resize-y transition-colors"></textarea>
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
                        <input type="radio" name="loai_giam" value="percent" class="peer sr-only" checked onchange="toggleDiscountType()">
                        <div class="px-4 py-3 border border-gray-200 rounded-xl text-center text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:text-[#6B0D18] peer-checked:bg-red-50 hover:bg-gray-50 transition-all flex flex-col items-center gap-1.5">
                            <span class="iconify text-xl" data-icon="mdi:percent"></span>
                            Phần trăm
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="loai_giam" value="fixed" class="peer sr-only" onchange="toggleDiscountType()">
                        <div class="px-4 py-3 border border-gray-200 rounded-xl text-center text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:text-[#6B0D18] peer-checked:bg-red-50 hover:bg-gray-50 transition-all flex flex-col items-center gap-1.5">
                            <span class="iconify text-xl" data-icon="mdi:currency-usd"></span>
                            Số tiền
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="loai_giam" value="freeship" class="peer sr-only" onchange="toggleDiscountType()">
                        <div class="px-4 py-3 border border-gray-200 rounded-xl text-center text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:text-[#6B0D18] peer-checked:bg-red-50 hover:bg-gray-50 transition-all flex flex-col items-center gap-1.5">
                            <span class="iconify text-xl" data-icon="mdi:truck-outline"></span>
                            Freeship
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="loai_giam" value="gift" class="peer sr-only" onchange="toggleDiscountType()">
                        <div class="px-4 py-3 border border-gray-200 rounded-xl text-center text-sm font-medium text-gray-600 peer-checked:border-[#6B0D18] peer-checked:text-[#6B0D18] peer-checked:bg-red-50 hover:bg-gray-50 transition-all flex flex-col items-center gap-1.5">
                            <span class="iconify text-xl" data-icon="mdi:gift-outline"></span>
                            Quà tặng
                        </div>
                    </label>
                </div>

                <!-- Dynamic Fields based on Type -->
                <div id="discountFieldsPercent" class="grid grid-cols-1 md:grid-cols-2 gap-5 transition-all">
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Mức giảm (%) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="number" id="input_gia_tri" oninput="updatePreview()" placeholder="VD: 10" class="w-full px-4 py-2.5 pr-8 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">%</span>
                        </div>
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-gray-700">Giảm tối đa (VNĐ)</label>
                        <div class="relative">
                            <input type="number" placeholder="Không giới hạn thì để trống" class="w-full px-4 py-2.5 pr-8 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">đ</span>
                        </div>
                    </div>
                </div>

                <div id="discountFieldsFixed" class="hidden transition-all">
                    <div class="space-y-1.5 w-full md:w-1/2">
                        <label class="block text-sm font-medium text-gray-700">Số tiền giảm (VNĐ) <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <input type="number" id="input_gia_tri_fixed" oninput="updatePreview()" placeholder="VD: 50000" class="w-full px-4 py-2.5 pr-8 border border-gray-300 rounded-lg focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] text-sm transition-colors">
                            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500 font-medium">đ</span>
                        </div>
                    </div>
                </div>
            </div>
