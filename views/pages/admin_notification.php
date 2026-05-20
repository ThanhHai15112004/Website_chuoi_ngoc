<?php
// views/pages/admin_notification.php
?>
<div class="space-y-6 animate-[fadeInPage_0.3s_ease-out]">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-800 font-luxury">Hộp thư / Thông báo</h2>
            <p class="text-sm text-gray-500 mt-1">Quản lý thông báo hệ thống, tin nhắn gửi khách hàng và các cảnh báo cần xử lý.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-2">
                <span class="iconify" data-icon="mdi:email-fast-outline"></span>
                Gửi hàng loạt
            </button>
            <a href="<?= APP_URL ?>/admin/notification/them" class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md shadow-[#6B0D18]/20 flex items-center gap-2">
                <span class="iconify" data-icon="mdi:plus"></span>
                Tạo thông báo
            </a>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
        <!-- Tổng thông báo -->
        <div class="bg-white p-4 rounded-[20px] shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-500 mb-2">
                <span class="iconify text-lg" data-icon="mdi:email-multiple-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Tổng thông báo</span>
            </div>
            <div class="text-2xl font-bold text-gray-800">1.248 <span class="text-sm font-normal text-gray-500">thông báo</span></div>
        </div>

        <!-- Chưa xử lý -->
        <div class="bg-red-50 p-4 rounded-[20px] shadow-sm border border-red-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-red-600 mb-2">
                <span class="iconify text-lg" data-icon="mdi:bell-alert-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Chưa xử lý</span>
            </div>
            <div class="text-2xl font-bold text-[#6B0D18]">18 <span class="text-sm font-normal text-red-700/70">thông báo</span></div>
        </div>

        <!-- Đã gửi cho khách -->
        <div class="bg-emerald-50 p-4 rounded-[20px] shadow-sm border border-emerald-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-emerald-600 mb-2">
                <span class="iconify text-lg" data-icon="mdi:email-send-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Đã gửi</span>
            </div>
            <div class="text-2xl font-bold text-emerald-800">820 <span class="text-sm font-normal text-emerald-700/70">thông báo</span></div>
        </div>

        <!-- Đã đọc bởi khách -->
        <div class="bg-blue-50 p-4 rounded-[20px] shadow-sm border border-blue-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-blue-600 mb-2">
                <span class="iconify text-lg" data-icon="mdi:email-open-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Khách đã đọc</span>
            </div>
            <div class="text-2xl font-bold text-blue-800">562 <span class="text-sm font-normal text-blue-700/70">lượt</span></div>
        </div>

        <!-- Thông báo thất bại -->
        <div class="bg-white p-4 rounded-[20px] shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-red-400 mb-2">
                <span class="iconify text-lg" data-icon="mdi:email-remove-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Gửi thất bại</span>
            </div>
            <div class="text-2xl font-bold text-gray-800">6 <span class="text-sm font-normal text-gray-500">thông báo</span></div>
        </div>

        <!-- Nháp -->
        <div class="bg-white p-4 rounded-[20px] shadow-sm border border-gray-100 flex flex-col justify-between">
            <div class="flex items-center gap-2 text-gray-400 mb-2">
                <span class="iconify text-lg" data-icon="mdi:file-document-edit-outline"></span>
                <span class="text-xs font-medium uppercase tracking-wider">Bản nháp</span>
            </div>
            <div class="text-2xl font-bold text-gray-800">9 <span class="text-sm font-normal text-gray-500">thông báo</span></div>
        </div>
    </div>

    <!-- Main Content Area -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 space-y-4">
        
        <!-- Tabs Loại Thông Báo -->
        <div class="flex space-x-1 border-b border-gray-100 overflow-x-auto hide-scrollbar pb-1">
            <button class="tab-btn px-4 py-2 bg-[#6B0D18] text-white rounded-t-lg font-medium text-sm whitespace-nowrap transition-colors">Tất cả (1248)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Đơn hàng (320)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Voucher (120)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Khuyến mãi (80)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Bình luận / đánh giá (45)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Hệ thống (45)</button>
            <button class="tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors">Tin nhắn gửi (210)</button>
        </div>

        <!-- Tabs Trạng thái -->
        <div class="flex space-x-4 overflow-x-auto hide-scrollbar pt-1">
            <button class="text-sm font-medium text-[#6B0D18] border-b-2 border-[#6B0D18] pb-1 whitespace-nowrap">Tất cả</button>
            <button class="text-sm font-medium text-gray-500 hover:text-gray-700 pb-1 whitespace-nowrap relative">Chưa đọc <span class="absolute -top-1 -right-3 w-2 h-2 rounded-full bg-red-500"></span></button>
            <button class="text-sm font-medium text-gray-500 hover:text-gray-700 pb-1 whitespace-nowrap">Đã đọc</button>
            <button class="text-sm font-medium text-gray-500 hover:text-gray-700 pb-1 whitespace-nowrap">Đã gửi</button>
            <button class="text-sm font-medium text-gray-500 hover:text-gray-700 pb-1 whitespace-nowrap">Đang lên lịch</button>
            <button class="text-sm font-medium text-gray-400 hover:text-gray-700 pb-1 whitespace-nowrap">Nháp</button>
            <button class="text-sm font-medium text-red-500 hover:text-red-700 pb-1 whitespace-nowrap">Gửi thất bại</button>
        </div>

        <!-- Search & Filters -->
        <div class="flex flex-col lg:flex-row gap-3 pt-2">
            <div class="relative flex-1">
                <span class="iconify absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-lg" data-icon="mdi:magnify"></span>
                <input type="text" placeholder="Tìm theo tiêu đề, nội dung, người nhận..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
            </div>
            
            <div class="flex flex-wrap gap-2">
                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Người nhận</option>
                    <option value="kh">Một khách hàng</option>
                    <option value="gold">Nhóm Gold</option>
                    <option value="diamond">Nhóm Diamond</option>
                    <option value="admin">Nội bộ Admin</option>
                </select>

                <select class="px-3 py-2 border border-gray-200 rounded-lg text-sm text-gray-600 focus:outline-none focus:border-[#6B0D18] bg-white">
                    <option value="">Thời gian</option>
                    <option value="today">Hôm nay</option>
                    <option value="7days">7 ngày qua</option>
                    <option value="this_month">Tháng này</option>
                </select>

                <button class="px-3 py-2 bg-gray-50 border border-gray-200 text-gray-600 rounded-lg hover:bg-gray-100 transition-colors font-medium text-sm flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:filter-variant"></span>
                    Bộ lọc
                </button>
            </div>
        </div>

        <!-- Active Filters Chips -->
        <div class="flex flex-wrap gap-2">
            <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md bg-gray-100 text-gray-600 text-xs font-medium border border-gray-200">
                Người nhận: Nhóm Gold
                <button class="hover:text-gray-900"><span class="iconify" data-icon="mdi:close"></span></button>
            </span>
            <button class="text-xs text-gray-500 hover:text-[#6B0D18] underline font-medium">Xóa bộ lọc</button>
        </div>
    </div>

    <!-- Action Bar & Table -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Bulk Actions -->
        <div class="p-3 border-b border-gray-100 bg-gray-50 flex items-center gap-2">
            <span class="text-sm text-gray-500 px-2 border-r border-gray-300">Đã chọn: <strong class="text-gray-800" id="selected-count">0</strong></span>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-sm font-medium disabled:opacity-50 flex items-center gap-1" disabled><span class="iconify text-base" data-icon="mdi:email-open-outline"></span> Đánh dấu đã đọc</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-sm font-medium disabled:opacity-50 flex items-center gap-1" disabled><span class="iconify text-base" data-icon="mdi:archive-arrow-down-outline"></span> Lưu trữ</button>
            <button class="px-3 py-1.5 bg-white border border-gray-200 text-red-600 rounded-md hover:bg-red-50 hover:border-red-200 transition-colors text-sm font-medium disabled:opacity-50 flex items-center gap-1" disabled><span class="iconify text-base" data-icon="mdi:trash-can-outline"></span> Xóa</button>
        </div>

        <!-- Table Responsive Container -->
        <div class="overflow-x-auto min-h-[400px]">
            <table class="w-full text-left text-sm text-gray-600 whitespace-nowrap">
                <thead class="bg-gray-50 text-gray-500 uppercase text-xs font-semibold sticky top-0 z-10">
                    <tr>
                        <th class="px-4 py-3 w-10">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </th>
                        <th class="px-4 py-3">Loại</th>
                        <th class="px-4 py-3 w-[250px]">Tiêu đề</th>
                        <th class="px-4 py-3">Người nhận</th>
                        <th class="px-4 py-3 min-w-[200px]">Nội dung ngắn</th>
                        <th class="px-4 py-3">Trạng thái gửi</th>
                        <th class="px-4 py-3">Đã đọc</th>
                        <th class="px-4 py-3">Người tạo</th>
                        <th class="px-4 py-3">Thời gian</th>
                        <th class="px-4 py-3 text-right">Thao tác</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    
                    <!-- Dòng 1: Quan trọng chưa đọc (Đơn hàng) -->
                    <tr class="hover:bg-gray-50/80 transition-colors group bg-red-50/20">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-teal-100 text-teal-600 mb-1" title="Đơn hàng">
                                <span class="iconify text-lg" data-icon="mdi:shopping-outline"></span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top cursor-pointer" onclick="openNotificationDrawer(1)">
                            <div class="font-bold text-gray-900 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors">
                                Đơn hàng #DH202600123 đã được xác nhận
                            </div>
                            <span class="inline-flex mt-1 px-1.5 py-0.5 rounded text-[10px] font-medium bg-red-100 text-red-700 border border-red-200">Quan trọng</span>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Nguyễn Văn A</div>
                            <div class="text-xs text-gray-500">KH000123</div>
                        </td>
                        <td class="px-4 py-4 align-top whitespace-normal">
                            <div class="text-gray-600 line-clamp-2 text-xs">
                                Cửa hàng đã xác nhận đơn hàng của bạn và đang chuẩn bị sản phẩm để giao cho đơn vị vận chuyển.
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-emerald-50 text-emerald-700">Đã gửi</span>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-amber-50 text-amber-700">Chưa đọc</span>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Hệ thống</div>
                            <div class="text-xs text-gray-500">Tự động</div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs text-gray-800 font-medium">10:30 Hôm nay</div>
                            <div class="text-[10px] text-gray-500">Tạo lúc 10:29</div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-[#6B0D18] rounded-md hover:bg-red-50 hover:border-red-200 transition-colors text-xs font-medium" onclick="openNotificationDrawer(1)">Xem</button>
                        </td>
                    </tr>

                    <!-- Dòng 2: Voucher gửi nhóm -->
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 mb-1" title="Voucher">
                                <span class="iconify text-lg" data-icon="mdi:ticket-percent-outline"></span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top cursor-pointer" onclick="openNotificationDrawer(2)">
                            <div class="font-medium text-gray-700 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors">
                                Voucher GOLD5 dành riêng cho bạn tháng này
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Nhóm Gold</div>
                            <div class="text-xs text-gray-500">520 khách</div>
                        </td>
                        <td class="px-4 py-4 align-top whitespace-normal">
                            <div class="text-gray-500 line-clamp-2 text-xs">
                                Chào bạn, shop xin tặng bạn mã giảm giá 5% cho mọi đơn hàng vòng ngọc...
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-emerald-50 text-emerald-700">Đã gửi</span>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs font-medium text-gray-800 mb-1">320 / 520 <span class="text-gray-400 font-normal">đã đọc</span></div>
                            <div class="w-full bg-gray-100 rounded-full h-1.5">
                                <div class="bg-blue-500 h-1.5 rounded-full" style="width: 61%"></div>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Hải Admin</div>
                            <div class="text-xs text-gray-500">Quản trị viên</div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs text-gray-600">18/05/2026 09:00</div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-xs font-medium" onclick="openNotificationDrawer(2)">Xem</button>
                                <button class="p-1.5 text-gray-400 hover:text-gray-700 hover:bg-gray-100 rounded transition-colors" onclick="toggleRowMenu(this)">
                                    <span class="iconify text-lg" data-icon="mdi:dots-vertical"></span>
                                </button>
                                <!-- Row Dropdown -->
                                <div class="absolute right-0 top-10 mt-1 w-40 bg-white rounded-md shadow-lg border border-gray-100 hidden z-20 row-menu">
                                    <div class="py-1">
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"><span class="iconify text-gray-400" data-icon="mdi:refresh"></span> Gửi lại</a>
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50"><span class="iconify text-gray-400" data-icon="mdi:archive-outline"></span> Lưu trữ</a>
                                        <hr class="my-1 border-gray-100">
                                        <a href="#" class="flex items-center gap-2 px-4 py-2 text-sm text-red-600 hover:bg-red-50"><span class="iconify text-red-400" data-icon="mdi:trash-can-outline"></span> Xóa</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>

                    <!-- Dòng 3: Gửi thất bại -->
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-red-100 text-red-600 mb-1" title="Khuyến mãi">
                                <span class="iconify text-lg" data-icon="mdi:sale"></span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top cursor-pointer">
                            <div class="font-medium text-gray-700 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors">
                                Flash Sale Vòng Ngọc bắt đầu lúc 20:00
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Tất cả KH</div>
                            <div class="text-xs text-gray-500">2.500 khách</div>
                        </td>
                        <td class="px-4 py-4 align-top whitespace-normal">
                            <div class="text-gray-500 line-clamp-2 text-xs">
                                Đừng bỏ lỡ cơ hội sở hữu vòng ngọc quý với giá ưu đãi lớn nhất năm...
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-red-50 text-red-600 border border-red-100">Gửi thất bại (15)</span>
                        </td>
                        <td class="px-4 py-4 align-top text-gray-400 text-xs">
                            Không khả dụng
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Hải Admin</div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs text-gray-600">17/05/2026 19:00</div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <button class="px-3 py-1.5 bg-red-50 border border-red-200 text-red-600 rounded-md hover:bg-red-100 transition-colors text-xs font-medium flex items-center gap-1" onclick="openResendModal()">Gửi lại lỗi</button>
                            </div>
                        </td>
                    </tr>

                    <!-- Dòng 4: Đang lên lịch -->
                    <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 text-blue-600 mb-1" title="Tin nhắn">
                                <span class="iconify text-lg" data-icon="mdi:message-text-outline"></span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top cursor-pointer">
                            <div class="font-medium text-gray-700 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors">
                                Chúc mừng sinh nhật tháng 5
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Khách sinh tháng 5</div>
                            <div class="text-xs text-gray-500">120 khách</div>
                        </td>
                        <td class="px-4 py-4 align-top whitespace-normal">
                            <div class="text-gray-500 line-clamp-2 text-xs">
                                Shop tặng bạn mã voucher giảm 10% cho tháng sinh nhật...
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-blue-50 text-blue-700 border border-blue-100">Đang lên lịch</span>
                        </td>
                        <td class="px-4 py-4 align-top text-gray-400 text-xs">
                            -
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Hải Admin</div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-[10px] text-gray-500">Lịch gửi:</div>
                            <div class="text-xs text-blue-700 font-medium">21/05/2026 08:00</div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <div class="flex items-center justify-end gap-2">
                                <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-xs font-medium">Sửa</button>
                            </div>
                        </td>
                    </tr>

                     <!-- Dòng 5: Cảnh báo nội bộ -->
                     <tr class="hover:bg-gray-50/80 transition-colors group">
                        <td class="px-4 py-4 align-top">
                            <input type="checkbox" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 text-gray-600 mb-1" title="Cảnh báo">
                                <span class="iconify text-lg" data-icon="mdi:shield-alert-outline"></span>
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top cursor-pointer">
                            <div class="font-bold text-gray-800 whitespace-normal line-clamp-2 hover:text-[#6B0D18] transition-colors">
                                Có 5 đơn hàng đang chờ xác nhận quá 24h
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Nội bộ Admin</div>
                        </td>
                        <td class="px-4 py-4 align-top whitespace-normal">
                            <div class="text-gray-500 line-clamp-2 text-xs">
                                Hệ thống phát hiện 5 đơn hàng chưa được xử lý, vui lòng kiểm tra.
                            </div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <span class="inline-flex px-2 py-1 rounded text-xs font-medium bg-emerald-50 text-emerald-700">Đã gửi</span>
                        </td>
                        <td class="px-4 py-4 align-top text-gray-400 text-xs">
                            -
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="font-medium text-gray-800">Hệ thống</div>
                        </td>
                        <td class="px-4 py-4 align-top">
                            <div class="text-xs text-gray-600">16/05/2026 08:00</div>
                        </td>
                        <td class="px-4 py-4 align-top text-right relative">
                            <button class="px-3 py-1.5 bg-white border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 transition-colors text-xs font-medium">Xem</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="p-4 border-t border-gray-100 flex items-center justify-between bg-white">
            <div class="text-sm text-gray-500 flex items-center gap-2">
                <span>Hiển thị</span>
                <select class="border border-gray-200 rounded p-1 text-sm bg-white focus:outline-none">
                    <option>10</option>
                    <option>20</option>
                    <option>50</option>
                </select>
                <span>trong 1.248 thông báo</span>
            </div>
            <div class="flex items-center gap-1">
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled><span class="iconify" data-icon="mdi:chevron-left"></span></button>
                <button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-md text-sm font-medium shadow-sm">1</button>
                <button class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">2</button>
                <button class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">3</button>
                <span class="px-2 text-gray-400">...</span>
                <button class="px-3 py-1.5 border border-gray-200 text-gray-600 rounded-md hover:bg-gray-50 text-sm font-medium transition-colors">125</button>
                <button class="px-2.5 py-1.5 border border-gray-200 rounded-md text-gray-500 hover:bg-gray-50 transition-colors"><span class="iconify" data-icon="mdi:chevron-right"></span></button>
            </div>
        </div>
    </div>
</div>

<!-- ================== OVERLAYS & MODALS ================== -->
<div id="modalOverlay" class="fixed inset-0 bg-black/50 z-40 hidden opacity-0 transition-opacity duration-300" onclick="closeAllDrawers()"></div>

<!-- Drawer Xem Chi Tiết -->
<div id="notificationDrawer" class="fixed top-0 right-0 h-full w-[600px] max-w-full bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col">
    <!-- Drawer Header -->
    <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
        <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:email-open-outline"></span> Chi tiết thông báo
        </h3>
        <button onclick="closeNotificationDrawer()" class="text-gray-400 hover:text-gray-600 transition-colors"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
    </div>
    
    <!-- Drawer Content -->
    <div class="flex-1 overflow-y-auto p-6 space-y-6">
        <!-- Badge & Title -->
        <div>
            <span class="inline-flex px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-700 border border-yellow-200 mb-3 flex w-max items-center gap-1">
                <span class="iconify" data-icon="mdi:ticket-percent-outline"></span> Voucher
            </span>
            <h2 class="text-2xl font-bold text-gray-800 leading-tight">Voucher GOLD5 dành riêng cho bạn tháng này</h2>
            
            <div class="flex flex-wrap items-center gap-4 mt-3 text-sm text-gray-500">
                <div class="flex items-center gap-1">
                    <span class="iconify text-gray-400" data-icon="mdi:account-outline"></span>
                    Hải Admin
                </div>
                <div class="flex items-center gap-1">
                    <span class="iconify text-gray-400" data-icon="mdi:clock-outline"></span>
                    18/05/2026 09:00
                </div>
                <div class="flex items-center gap-1">
                    <span class="inline-flex px-1.5 py-0.5 rounded text-[10px] font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">Đã gửi</span>
                </div>
            </div>
        </div>

        <hr class="border-gray-100">

        <!-- Info List -->
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-50 rounded-lg p-3 border border-gray-100">
                <div class="text-xs text-gray-500 mb-1">Người nhận</div>
                <div class="font-medium text-gray-800">Nhóm Gold (520 khách)</div>
            </div>
            <div class="bg-gray-50 rounded-lg p-3 border border-gray-100">
                <div class="text-xs text-gray-500 mb-1">Thời gian gửi</div>
                <div class="font-medium text-gray-800">18/05/2026, 09:00</div>
            </div>
        </div>

        <!-- Message Content -->
        <div>
            <div class="text-sm font-medium text-gray-700 mb-2">Nội dung thông báo</div>
            <div class="bg-white border border-gray-200 rounded-xl p-5 text-gray-700 leading-relaxed text-sm shadow-sm relative">
                <div class="absolute top-0 left-0 w-full h-1 bg-[#6B0D18] rounded-t-xl"></div>
                <p class="whitespace-pre-line">Xin chào [Tên_khách_hàng],
                
                Tháng mới, ưu đãi mới!
                Shop xin tặng riêng cho bạn (Hạng Gold) mã giảm giá 5% cho mọi đơn hàng vòng ngọc.
                
                Mã voucher: <strong>GOLD5-XYZ</strong>
                Hạn sử dụng: 31/05/2026
                
                Chúc bạn luôn gặp nhiều may mắn và bình an.</p>
                
                <div class="mt-4 pt-3 border-t border-dashed border-gray-200 text-center">
                    <a href="#" class="inline-block px-6 py-2 bg-[#6B0D18] text-white rounded-lg text-sm font-medium hover:bg-[#8A111F] transition-colors">Xem mã voucher</a>
                </div>
            </div>
        </div>

        <!-- Read Statistics -->
        <div>
            <div class="text-sm font-medium text-gray-700 mb-2">Thống kê đọc</div>
            <div class="bg-white border border-gray-100 rounded-xl p-4 shadow-sm flex items-center justify-between">
                <div>
                    <div class="text-3xl font-bold text-[#6B0D18]">61%</div>
                    <div class="text-xs text-gray-500 mt-1">Tỷ lệ mở xem</div>
                </div>
                <div class="text-right space-y-2 text-sm">
                    <div class="flex justify-between gap-4">
                        <span class="text-gray-500">Tổng người nhận:</span>
                        <span class="font-medium text-gray-800">520</span>
                    </div>
                    <div class="flex justify-between gap-4">
                        <span class="text-gray-500">Đã đọc:</span>
                        <span class="font-medium text-emerald-600">320</span>
                    </div>
                    <div class="flex justify-between gap-4">
                        <span class="text-gray-500">Chưa đọc:</span>
                        <span class="font-medium text-amber-600">200</span>
                    </div>
                </div>
            </div>
            <div class="mt-2 text-right">
                <button class="text-[#6B0D18] text-xs font-medium hover:underline flex items-center justify-end gap-1 w-full"><span class="iconify" data-icon="mdi:format-list-bulleted"></span> Xem danh sách người nhận</button>
            </div>
        </div>
    </div>
    
    <!-- Drawer Footer -->
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between gap-3">
        <button class="px-4 py-2 bg-white border border-red-200 text-red-600 rounded-lg hover:bg-red-50 transition-colors font-medium text-sm flex items-center gap-1">
            <span class="iconify" data-icon="mdi:trash-can-outline"></span> Xóa
        </button>
        <div class="flex gap-2">
            <button class="px-4 py-2 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm flex items-center gap-1">
                <span class="iconify" data-icon="mdi:content-copy"></span> Sao chép
            </button>
            <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md flex items-center gap-1">
                <span class="iconify" data-icon="mdi:refresh"></span> Gửi lại
            </button>
        </div>
    </div>
</div>

<!-- Modal Gửi Lại Lỗi -->
<div id="resendModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[450px] max-w-[90%] transform scale-95 transition-transform duration-300 p-6 flex flex-col">
        <div class="flex items-center gap-3 mb-4">
            <div class="w-12 h-12 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                <span class="iconify text-2xl" data-icon="mdi:alert-circle-outline"></span>
            </div>
            <div>
                <h3 class="text-xl font-bold text-gray-800">Gửi lại thông báo?</h3>
                <p class="text-gray-500 text-sm">Có 15 khách hàng chưa nhận được thông báo này do lỗi hệ thống.</p>
            </div>
        </div>
        
        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100 mb-6 text-sm">
            <div class="space-y-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="resendOpt" class="text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                    <span class="text-gray-700">Chỉ gửi lại cho <strong>15 người</strong> bị lỗi</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="resendOpt" class="text-[#6B0D18] focus:ring-[#6B0D18]">
                    <span class="text-gray-700">Gửi lại cho toàn bộ <strong>2.500 người</strong></span>
                </label>
            </div>
        </div>
        
        <div class="flex gap-3 justify-end">
            <button onclick="closeResendModal()" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy</button>
            <button onclick="closeResendModal(); showToast('Đang tiến hành gửi lại thông báo...')" class="px-5 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-[#8A111F] transition-colors font-medium text-sm shadow-md">Gửi lại ngay</button>
        </div>
    </div>
</div>

<!-- Toast Notification -->
<div id="toast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70] pointer-events-none">
    <div class="text-emerald-500 mt-0.5">
        <span class="iconify text-xl" data-icon="mdi:check-circle"></span>
    </div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="toast-msg">Thao tác thành công.</p>
    </div>
</div>

<script>
    // Tab switching UI
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const parent = e.target.parentElement;
            parent.querySelectorAll('.tab-btn').forEach(b => {
                b.className = 'tab-btn px-4 py-2 border-transparent text-gray-500 hover:text-gray-800 font-medium text-sm whitespace-nowrap transition-colors';
            });
            e.target.className = 'tab-btn px-4 py-2 bg-[#6B0D18] text-white rounded-t-lg font-medium text-sm whitespace-nowrap transition-colors';
        });
    });

    // Row Menu Toggle
    function toggleRowMenu(btn) {
        // Close others
        document.querySelectorAll('.row-menu').forEach(menu => {
            if(menu !== btn.nextElementSibling) menu.classList.add('hidden');
        });
        btn.nextElementSibling.classList.toggle('hidden');
    }
    
    // Close menus on click outside
    document.addEventListener('click', (e) => {
        if(!e.target.closest('td')) {
            document.querySelectorAll('.row-menu').forEach(menu => menu.classList.add('hidden'));
        }
    });

    // Drawer Logic
    const overlay = document.getElementById('modalOverlay');
    const drawer = document.getElementById('notificationDrawer');

    function openNotificationDrawer(id) {
        overlay.classList.remove('hidden');
        // small delay for transition
        setTimeout(() => {
            overlay.classList.remove('opacity-0');
            drawer.classList.remove('translate-x-full');
        }, 10);
    }

    function closeNotificationDrawer() {
        drawer.classList.add('translate-x-full');
        overlay.classList.add('opacity-0');
        setTimeout(() => {
            overlay.classList.add('hidden');
        }, 300);
    }

    function closeAllDrawers() {
        closeNotificationDrawer();
        closeResendModal();
    }

    // Modal Logic
    const resendModal = document.getElementById('resendModal');
    
    function openResendModal() {
        resendModal.classList.remove('hidden');
        setTimeout(() => {
            resendModal.classList.remove('opacity-0');
            resendModal.firstElementChild.classList.remove('scale-95');
        }, 10);
    }
    
    function closeResendModal() {
        resendModal.classList.add('opacity-0');
        resendModal.firstElementChild.classList.add('scale-95');
        setTimeout(() => {
            resendModal.classList.add('hidden');
        }, 300);
    }

    // Toast Logic
    function showToast(msg) {
        const toast = document.getElementById('toast');
        document.getElementById('toast-msg').textContent = msg;
        toast.classList.remove('translate-y-20', 'opacity-0');
        setTimeout(() => {
            toast.classList.add('translate-y-20', 'opacity-0');
        }, 3000);
    }
</script>
