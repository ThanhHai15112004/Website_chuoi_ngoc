<?php
// views/components/Admin/cau_hinh_kho/tabs/tab_sku_barcode.php
?>
<div class="p-6">
    <div class="flex justify-between items-center pb-4 border-b border-gray-100 mb-6">
        <div>
            <h3 class="text-lg font-bold text-gray-900">Cấu hình SKU & Mã vạch</h3>
            <p class="text-sm text-gray-500 mt-1">Thiết lập quy tắc sinh mã tự động cho hàng hóa và cấu hình in tem nhãn.</p>
        </div>
        <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
            <span class="iconify" data-icon="mdi:content-save"></span> Lưu cấu hình
        </button>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Quy tắc SKU -->
        <div class="space-y-6">
            <div>
                <h4 class="text-sm font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:format-title"></span> Quy tắc sinh mã SKU
                </h4>
                
                <div class="p-4 bg-gray-50 border border-gray-200 rounded-xl mb-4">
                    <label class="block text-xs font-medium text-gray-700 mb-2">Thành phần mã SKU (Kéo thả để sắp xếp)</label>
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="px-3 py-1.5 bg-white border border-gray-300 rounded text-sm text-gray-700 flex items-center gap-1 cursor-move shadow-sm">
                            <span class="iconify text-gray-400" data-icon="mdi:drag"></span> [TIEN-TO]
                        </span>
                        <span class="px-3 py-1.5 bg-white border border-gray-300 rounded text-sm text-gray-700 flex items-center gap-1 cursor-move shadow-sm">
                            <span class="iconify text-gray-400" data-icon="mdi:drag"></span> [DANH-MUC]
                        </span>
                        <span class="px-3 py-1.5 bg-white border border-gray-300 rounded text-sm text-gray-700 flex items-center gap-1 cursor-move shadow-sm">
                            <span class="iconify text-gray-400" data-icon="mdi:drag"></span> [LOAI-DA]
                        </span>
                        <span class="px-3 py-1.5 bg-white border border-[#6B0D18] rounded text-sm text-[#6B0D18] font-bold flex items-center gap-1 cursor-move shadow-sm bg-red-50/50">
                            <span class="iconify text-[#6B0D18]" data-icon="mdi:drag"></span> [STT]
                        </span>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Tiền tố mặc định</label>
                            <input type="text" value="VNG" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] text-sm" />
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Ký tự phân cách</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] text-sm">
                                <option value="-">Gạch ngang (-)</option>
                                <option value="_">Gạch dưới (_)</option>
                                <option value="">Không phân cách</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="p-4 border border-dashed border-[#6B0D18]/40 bg-red-50/20 rounded-xl text-center">
                    <span class="text-xs text-gray-500 block mb-1">Preview mã SKU</span>
                    <span class="text-lg font-mono font-bold text-[#6B0D18]">VNG-VONG-NGOC-001</span>
                </div>
            </div>
        </div>

        <!-- Cấu hình Barcode & Tem nhãn -->
        <div class="space-y-6">
            <div>
                <h4 class="text-sm font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-blue-600" data-icon="mdi:barcode-scan"></span> Cấu hình Barcode & Tem
                </h4>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 border border-gray-200 rounded-lg">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Tự động tạo Barcode khi thêm SP</span>
                        </div>
                        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-[#6B0D18] checked:right-0 transition-all duration-200" style="right: 0;">
                            <label class="toggle-label block overflow-hidden h-5 rounded-full bg-[#6B0D18] cursor-pointer"></label>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Chuẩn mã vạch</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] text-sm">
                                <option value="code128">Code 128 (Khuyên dùng)</option>
                                <option value="ean13">EAN-13</option>
                                <option value="upc">UPC-A</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-medium text-gray-700 mb-1">Kích thước giấy in tem</label>
                            <select class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] text-sm">
                                <option value="35x22">35x22 mm (2 tem/hàng)</option>
                                <option value="50x30">50x30 mm (1 tem/hàng)</option>
                                <option value="100x150">100x150 mm (Khổ lớn)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-medium text-gray-700 mb-2">Thông tin hiển thị trên tem nhãn</label>
                        <div class="grid grid-cols-2 gap-2">
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Tên sản phẩm</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Mã SKU</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Giá bán</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                <span class="text-sm text-gray-700">Logo cửa hàng</span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
