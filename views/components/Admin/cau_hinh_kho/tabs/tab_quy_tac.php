<?php
// views/components/Admin/cau_hinh_kho/tabs/tab_quy_tac.php
?>
<div class="p-6">
    <div class="flex justify-between items-center pb-4 border-b border-gray-100 mb-6">
        <div>
            <h3 class="text-lg font-bold text-gray-900">Quy tắc tồn kho & Bán hàng</h3>
            <p class="text-sm text-gray-500 mt-1">Thiết lập cách hệ thống xử lý tồn kho khi có đơn hàng, hủy đơn hoặc hết hàng.</p>
        </div>
        <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
            <span class="iconify" data-icon="mdi:content-save"></span> Lưu cấu hình
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Cột trái -->
        <div class="space-y-8">
            
            <!-- Quy tắc trừ kho -->
            <div>
                <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:minus-circle-outline"></span> Thời điểm trừ kho
                </h4>
                <div class="space-y-3">
                    <label class="flex items-start gap-3 p-3 rounded-lg border border-[#6B0D18]/30 bg-red-50/20 cursor-pointer transition-colors">
                        <input type="radio" name="tru_kho" class="mt-0.5 text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                        <div>
                            <span class="block text-sm font-semibold text-gray-900">Khi Admin xác nhận đơn (Khuyên dùng)</span>
                            <span class="block text-xs text-gray-500 mt-0.5">Tồn kho chỉ bị trừ thực tế khi đơn được cửa hàng xác nhận có thể giao.</span>
                        </div>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="radio" name="tru_kho" class="mt-0.5 text-[#6B0D18] focus:ring-[#6B0D18]">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Khi khách đặt hàng thành công</span>
                            <span class="block text-xs text-gray-500 mt-0.5">Hệ thống sẽ trừ kho ngay khi có mã đơn hàng. Tránh bị khách khác mua mất.</span>
                        </div>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="radio" name="tru_kho" class="mt-0.5 text-[#6B0D18] focus:ring-[#6B0D18]">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Khi đơn chuyển sang Đang giao</span>
                            <span class="block text-xs text-gray-500 mt-0.5">Chỉ trừ kho khi hàng đã xuất khỏi kho giao cho ĐVVC.</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Quy tắc hoàn kho -->
            <div>
                <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                    <span class="iconify text-emerald-600" data-icon="mdi:backup-restore"></span> Quy tắc hoàn kho
                </h4>
                <div class="space-y-3">
                    <label class="flex items-center justify-between p-3 rounded-lg border border-gray-200 bg-white">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Hoàn kho khi đơn bị hủy</span>
                            <span class="block text-xs text-gray-500 mt-0.5">Cộng lại số lượng vào kho đã xuất khi đơn hàng chuyển sang trạng thái "Đã hủy".</span>
                        </div>
                        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-[#6B0D18] checked:right-0 transition-all duration-200" style="right: 1.25rem;">
                            <label class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                    </label>
                    <label class="flex items-center justify-between p-3 rounded-lg border border-gray-200 bg-white">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Hoàn kho khi giao thất bại</span>
                            <span class="block text-xs text-gray-500 mt-0.5">Tự động hoàn hàng khi khách không nhận hàng và đơn bị chuyển về "Hoàn trả".</span>
                        </div>
                        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-[#6B0D18] checked:right-0 transition-all duration-200" style="right: 1.25rem;">
                            <label class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                    </label>
                </div>
            </div>

        </div>

        <!-- Cột phải -->
        <div class="space-y-8">
            
            <!-- Quy tắc chọn kho -->
            <div>
                <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                    <span class="iconify text-blue-600" data-icon="mdi:home-search-outline"></span> Chọn kho trừ hàng
                </h4>
                <div class="space-y-3">
                    <label class="flex items-start gap-3 p-3 rounded-lg border border-[#6B0D18]/30 bg-red-50/20 cursor-pointer transition-colors">
                        <input type="radio" name="chon_kho" class="mt-0.5 text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                        <div>
                            <span class="block text-sm font-semibold text-gray-900">Luôn trừ từ kho mặc định</span>
                            <span class="block text-xs text-gray-500 mt-0.5">Tất cả đơn online sẽ lấy hàng từ 1 kho mặc định được chỉ định sẵn (VD: Kho Online).</span>
                        </div>
                    </label>
                    <label class="flex items-start gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer transition-colors">
                        <input type="radio" name="chon_kho" class="mt-0.5 text-[#6B0D18] focus:ring-[#6B0D18]">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Admin chọn kho khi xác nhận</span>
                            <span class="block text-xs text-gray-500 mt-0.5">Nhân viên xử lý đơn sẽ tự chọn xuất từ kho nào dựa vào thực tế hàng hóa.</span>
                        </div>
                    </label>
                </div>
            </div>

            <!-- Quy tắc khi hết hàng -->
            <div class="p-4 bg-gray-50 rounded-xl border border-gray-200">
                <h4 class="text-sm font-bold text-gray-900 mb-3 flex items-center gap-2">
                    <span class="iconify text-amber-600" data-icon="mdi:package-variant-closed-remove"></span> Xử lý khi hết hàng
                </h4>
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Cho phép bán khi hết hàng (Pre-order)</span>
                            <span class="block text-[11px] text-gray-500 mt-0.5">Khách vẫn có thể đặt mua dù tồn kho bằng 0. <span class="text-amber-600">Cẩn thận khi bật.</span></span>
                        </div>
                        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-[#6B0D18] transition-all duration-200" style="right: 1.25rem;">
                            <label class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                    </div>
                    
                    <div class="flex items-center justify-between">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Hiển thị nút "Liên hệ tư vấn"</span>
                            <span class="block text-[11px] text-gray-500 mt-0.5">Thay nút Mua ngay thành nút Liên hệ Zalo/Hotline khi sản phẩm hết hàng.</span>
                        </div>
                        <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-[#6B0D18] transition-all duration-200" style="right: 0;">
                            <label class="toggle-label block overflow-hidden h-5 rounded-full bg-[#6B0D18] cursor-pointer"></label>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
