<?php
// views/components/Admin/nha_cung_cap/tabs_filter.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-visible">
    <!-- Tabs cuộn ngang -->
    <div class="border-b border-gray-100">
        <div class="overflow-x-auto sidebar-scroll">
            <nav class="flex px-4 pt-2 min-w-max" aria-label="Tabs">
                <button class="relative py-3 px-4 text-sm font-medium text-[#6B0D18] hover:bg-red-50 rounded-t-lg transition-colors group">
                    <span class="flex items-center gap-2">
                        Tất cả <span class="bg-red-100 text-[#6B0D18] py-0.5 px-2 rounded-full text-xs font-bold"><?= $stats['tong'] ?></span>
                    </span>
                    <span class="absolute bottom-0 left-0 w-full h-0.5 bg-[#6B0D18] rounded-t-full"></span>
                </button>
                <button class="relative py-3 px-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-50 rounded-t-lg transition-colors">
                    Đang hợp tác <span class="text-gray-400 text-xs ml-1">(<?= $stats['dang_hop_tac'] ?>)</span>
                </button>
                <button class="relative py-3 px-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-50 rounded-t-lg transition-colors">
                    Có công nợ <span class="text-gray-400 text-xs ml-1">(<?= $stats['co_cong_no'] ?>)</span>
                </button>
                <button class="relative py-3 px-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-50 rounded-t-lg transition-colors">
                    Uy tín cao <span class="text-gray-400 text-xs ml-1">(<?= $stats['danh_gia_tot'] ?>)</span>
                </button>
                <button class="relative py-3 px-4 text-sm font-medium text-gray-500 hover:text-gray-700 hover:bg-gray-50 rounded-t-lg transition-colors">
                    Chưa có đơn nhập <span class="text-gray-400 text-xs ml-1">(1)</span>
                </button>
            </nav>
        </div>
    </div>

    <!-- Thanh công cụ tìm kiếm và lọc nâng cao -->
    <div class="p-4 flex flex-col lg:flex-row items-stretch lg:items-center justify-between gap-4">
        
        <!-- Tìm kiếm -->
        <div class="relative w-full lg:w-[400px]">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="iconify text-gray-400 text-lg" data-icon="mdi:magnify"></span>
            </div>
            <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] sm:text-sm transition-colors" placeholder="Tên NCC, mã, số điện thoại, email...">
        </div>

        <!-- Bộ lọc -->
        <div class="flex items-center gap-3">
            <div class="relative dropdown-container">
                <button type="button" class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 text-sm font-medium transition-colors flex items-center gap-2 shadow-sm" onclick="toggleDropdown(this)">
                    <span class="iconify" data-icon="mdi:filter-variant"></span>
                    Bộ lọc nâng cao
                    <span class="bg-[#6B0D18] text-white text-[10px] w-4 h-4 flex items-center justify-center rounded-full ml-1">2</span>
                </button>
                
                <!-- Filter Dropdown Panel -->
                <div class="dropdown-menu hidden absolute right-0 z-40 mt-2 w-80 origin-top-right rounded-xl bg-white shadow-xl ring-1 ring-black ring-opacity-5 focus:outline-none border border-gray-100">
                    <div class="p-4 space-y-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase">Khu vực</label>
                            <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm rounded-md border">
                                <option>Tất cả khu vực</option>
                                <option>TP.HCM</option>
                                <option>Hà Nội</option>
                                <option>Đà Nẵng</option>
                                <option>Các tỉnh khác</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase">Nhóm hàng cung cấp</label>
                            <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm rounded-md border">
                                <option>Tất cả nhóm hàng</option>
                                <option>Ngọc bích</option>
                                <option>Thạch anh</option>
                                <option>Phụ kiện bạc</option>
                                <option>Vật tư đóng gói</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 mb-1.5 uppercase">Công nợ</label>
                            <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-[#6B0D18] focus:border-[#6B0D18] sm:text-sm rounded-md border">
                                <option>Tất cả trạng thái</option>
                                <option>Không có công nợ</option>
                                <option>Có công nợ</option>
                                <option>Đến hạn / Quá hạn</option>
                            </select>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 rounded-b-xl border-t border-gray-100 flex items-center justify-between">
                        <button type="button" class="text-sm font-medium text-gray-600 hover:text-gray-900 transition-colors">Xóa lọc</button>
                        <button type="button" class="px-4 py-1.5 bg-[#6B0D18] text-white rounded text-sm font-medium hover:bg-red-900 transition-colors shadow-sm">Áp dụng</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Active Filters Display -->
    <div class="px-4 pb-4 flex items-center gap-2 flex-wrap">
        <span class="text-sm text-gray-500 mr-1">Đang lọc:</span>
        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-red-50 text-[#6B0D18] border border-red-100">
            Khu vực: TP.HCM
            <button class="text-[#6B0D18] hover:text-red-900 focus:outline-none"><span class="iconify" data-icon="mdi:close"></span></button>
        </span>
        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-medium bg-red-50 text-[#6B0D18] border border-red-100">
            Có công nợ
            <button class="text-[#6B0D18] hover:text-red-900 focus:outline-none"><span class="iconify" data-icon="mdi:close"></span></button>
        </span>
    </div>
</div>
