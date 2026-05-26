<?php
// views/components/Admin/banner/banner_sort_modal.php
?>
<div id="sortBannerModal" class="fixed inset-0 z-[60] hidden">
    <div class="fixed inset-0 bg-black/50 backdrop-blur-sm transition-opacity" onclick="closeSortModal()"></div>
    <div class="fixed inset-0 z-10 overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-xl transition-all w-full max-w-2xl flex flex-col max-h-[90vh]">
                
                <!-- Header -->
                <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:swap-vertical"></span>
                        Sắp xếp thứ tự banner
                    </h3>
                    <button onclick="closeSortModal()" class="text-gray-400 hover:text-gray-600">
                        <span class="iconify text-xl" data-icon="mdi:close"></span>
                    </button>
                </div>

                <!-- Content -->
                <div class="px-6 py-4 overflow-y-auto flex-1 bg-gray-50/50">
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Chọn vị trí cần sắp xếp</label>
                        <select class="w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] bg-white">
                            <option value="slider_chinh">Trang chủ · Slider chính</option>
                            <option value="banner_phu">Trang chủ · Banner phụ</option>
                            <option value="khuyen_mai">Trang khuyến mãi</option>
                        </select>
                    </div>

                    <p class="text-xs text-gray-500 mb-3 italic">Kéo thả các khối bên dưới để thay đổi thứ tự ưu tiên hiển thị. Banner ở trên cùng sẽ hiển thị đầu tiên.</p>

                    <!-- Danh sách drag & drop mô phỏng -->
                    <div class="space-y-3" id="sortableList">
                        <!-- Item 1 -->
                        <div class="bg-white border border-gray-200 rounded-lg p-3 flex items-center gap-4 cursor-move hover:shadow-md transition-shadow group">
                            <div class="text-gray-400 group-hover:text-[#6B0D18]">
                                <span class="iconify text-xl" data-icon="mdi:drag"></span>
                            </div>
                            <div class="w-16 h-8 bg-gray-100 rounded overflow-hidden shrink-0">
                                <img src="<?= APP_URL ?>/images/Sản phẩm/Vòng Ngọc/Hồng Đào Điểm Son/hong-dao-diem-son-1.jpg" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-bold text-gray-800 truncate">Flash Sale Vòng Ngọc Tháng 5</h4>
                                <p class="text-[10px] text-green-600 font-medium">Đang hiển thị</p>
                            </div>
                            <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-xs font-bold text-gray-500 border border-gray-200">
                                1
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="bg-white border border-gray-200 rounded-lg p-3 flex items-center gap-4 cursor-move hover:shadow-md transition-shadow group">
                            <div class="text-gray-400 group-hover:text-[#6B0D18]">
                                <span class="iconify text-xl" data-icon="mdi:drag"></span>
                            </div>
                            <div class="w-16 h-8 bg-gray-100 rounded overflow-hidden shrink-0">
                                <img src="<?= APP_URL ?>/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-1.jpg" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-bold text-gray-800 truncate">Bộ sưu tập Xuân Hè 2026</h4>
                                <p class="text-[10px] text-gray-500 font-medium">Bản nháp</p>
                            </div>
                            <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-xs font-bold text-gray-500 border border-gray-200">
                                2
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="bg-white border border-gray-200 rounded-lg p-3 flex items-center gap-4 cursor-move hover:shadow-md transition-shadow group">
                            <div class="text-gray-400 group-hover:text-[#6B0D18]">
                                <span class="iconify text-xl" data-icon="mdi:drag"></span>
                            </div>
                            <div class="w-16 h-8 bg-gray-100 rounded overflow-hidden shrink-0">
                                <img src="<?= APP_URL ?>/images/Sản phẩm/Bột Xông Nhà/bot-xong-nha-2.jpg" class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-bold text-gray-800 truncate">Ưu đãi khách hàng VIP</h4>
                                <p class="text-[10px] text-blue-600 font-medium">Sắp hiển thị</p>
                            </div>
                            <div class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center text-xs font-bold text-gray-500 border border-gray-200">
                                3
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Footer -->
                <div class="bg-white px-6 py-4 border-t border-gray-100 flex items-center justify-end gap-3 rounded-b-2xl">
                    <button type="button" onclick="closeSortModal()" class="px-4 py-2 text-sm font-semibold text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-50">Hủy</button>
                    <button type="button" onclick="closeSortModal()" class="px-4 py-2 text-sm font-semibold text-white bg-[#6B0D18] rounded-lg hover:bg-[#8A1120] shadow-sm flex items-center gap-2">
                        Lưu thứ tự
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
