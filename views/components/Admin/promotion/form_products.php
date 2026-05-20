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
