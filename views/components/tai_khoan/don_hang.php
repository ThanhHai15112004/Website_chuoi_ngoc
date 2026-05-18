<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    
    <!-- Tiêu đề trang -->
    <div class="mb-6 flex flex-col md:flex-row md:items-end justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Lịch sử đơn hàng</h2>
            <p class="text-gray-500 mt-1 text-sm">Theo dõi, kiểm tra và quản lý các đơn hàng bạn đã đặt.</p>
        </div>
        <div class="text-sm text-gray-600 bg-red-50 px-4 py-2 rounded-lg border border-red-100">
            Bạn có <span class="text-[#8b0000] font-bold text-base">12</span> đơn hàng
        </div>
    </div>

    <!-- Tìm kiếm & Bộ lọc -->
    <div class="flex flex-col lg:flex-row gap-4 mb-6">
        <!-- Search -->
        <div class="relative flex-1">
            <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-[#8b0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Tìm theo mã đơn hàng, tên sản phẩm..." class="w-full rounded-xl border border-gray-300 pl-10 pr-24 py-3 focus:border-[#8b0000] focus:ring-[#8b0000] focus:ring-1 outline-none transition-shadow text-sm">
            <button class="absolute right-1.5 top-1.5 bottom-1.5 bg-[#8b0000] text-white px-4 rounded-lg text-sm font-medium hover:bg-[#700000] transition-colors">
                Tìm
            </button>
        </div>
        <!-- Lọc Nhanh -->
        <div class="flex gap-2 overflow-x-auto pb-1 scrollbar-hide lg:pb-0 items-center">
            <button class="whitespace-nowrap px-4 py-2.5 rounded-xl bg-[#8b0000] text-white text-sm font-medium shadow-sm transition-colors">
                Tất cả
            </button>
            <button class="whitespace-nowrap px-4 py-2.5 rounded-xl bg-gray-50 text-gray-600 hover:bg-gray-100 border border-gray-200 text-sm font-medium transition-colors">
                7 ngày gần đây
            </button>
            <button class="whitespace-nowrap px-4 py-2.5 rounded-xl bg-gray-50 text-gray-600 hover:bg-gray-100 border border-gray-200 text-sm font-medium transition-colors">
                30 ngày
            </button>
            <!-- Nút Lọc Nâng cao -->
            <button class="whitespace-nowrap px-4 py-2.5 rounded-xl bg-gray-50 text-gray-700 hover:bg-gray-100 border border-gray-200 text-sm font-medium transition-colors flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path></svg>
                Bộ lọc
            </button>
        </div>
    </div>

    <!-- Tabs Trạng thái -->
    <div class="border-b border-gray-200 mb-6 relative">
        <nav class="flex gap-2 overflow-x-auto pb-3 scrollbar-hide">
            <button class="whitespace-nowrap px-5 py-2 rounded-full bg-[#8b0000] text-white font-medium text-sm transition-colors">
                Tất cả
            </button>
            <button class="whitespace-nowrap px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-600 hover:border-gray-300 font-medium text-sm transition-colors">
                Chờ xác nhận <span class="ml-1 text-[#8b0000]">(2)</span>
            </button>
            <button class="whitespace-nowrap px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-600 hover:border-gray-300 font-medium text-sm transition-colors">
                Đã xác nhận
            </button>
            <button class="whitespace-nowrap px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-600 hover:border-gray-300 font-medium text-sm transition-colors">
                Đang giao <span class="ml-1 text-blue-600">(1)</span>
            </button>
            <button class="whitespace-nowrap px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-600 hover:border-gray-300 font-medium text-sm transition-colors">
                Đã giao
            </button>
            <button class="whitespace-nowrap px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-600 hover:border-gray-300 font-medium text-sm transition-colors">
                Thành công
            </button>
            <button class="whitespace-nowrap px-5 py-2 rounded-full bg-white border border-gray-200 text-gray-600 hover:border-gray-300 font-medium text-sm transition-colors">
                Đã hủy
            </button>
        </nav>
        <!-- Fade effect for scroll -->
        <div class="absolute right-0 top-0 bottom-3 w-8 bg-gradient-to-l from-white to-transparent pointer-events-none lg:hidden"></div>
    </div>

    <!-- Danh sách Đơn hàng -->
    <div class="space-y-6">
        
        <!-- ================= CARD ĐƠN HÀNG 1: Chờ Xác Nhận ================= -->
        <div class="border border-gray-200 rounded-2xl overflow-hidden hover:shadow-md transition-shadow bg-white">
            <!-- Header Card -->
            <div class="bg-gray-50/50 px-4 py-3 sm:px-6 sm:py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm">
                    <span class="font-bold text-gray-900">Mã đơn: #DH202600123</span>
                    <span class="hidden sm:inline text-gray-300">|</span>
                    <span class="text-gray-500">Ngày đặt: 17/05/2026</span>
                    <span class="hidden sm:inline text-gray-300">|</span>
                    <span class="text-gray-500">Thanh toán: COD</span>
                </div>
                <!-- Badge -->
                <div class="self-start sm:self-auto">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-yellow-50 text-yellow-700 border border-yellow-100">
                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                        Chờ xác nhận
                    </span>
                </div>
            </div>
            
            <!-- Danh sách sản phẩm -->
            <div class="p-4 sm:p-6">
                <!-- SP 1 -->
                <div class="flex gap-4 items-start">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gray-50 rounded-xl overflow-hidden shrink-0 border border-gray-100">
                        <img src="<?= APP_URL ?>/public/assets/images/placeholder.jpg" alt="Product" class="w-full h-full object-cover opacity-30">
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-col sm:flex-row sm:justify-between gap-2">
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1 truncate">Vòng tay Tỳ Hưu Vàng 24K</h3>
                                <p class="text-sm text-gray-500 mb-1">Phân loại: Đá Đen, Mix Vàng</p>
                                <p class="text-sm font-medium text-gray-700">x1</p>
                            </div>
                            <div class="sm:text-right">
                                <p class="text-gray-900 font-medium">3.500.000đ</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Dấu ngăn cách nếu có nhiều SP -->
                <div class="my-4 border-t border-dashed border-gray-200"></div>
                <!-- SP 2 -->
                <div class="flex gap-4 items-start">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gray-50 rounded-xl overflow-hidden shrink-0 border border-gray-100">
                        <img src="<?= APP_URL ?>/public/assets/images/placeholder.jpg" alt="Product" class="w-full h-full object-cover opacity-30">
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-col sm:flex-row sm:justify-between gap-2">
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1 truncate">Chuỗi hạt Gỗ Sưa Đỏ</h3>
                                <p class="text-sm text-gray-500 mb-1">Phân loại: 108 hạt, 8mm</p>
                                <p class="text-sm font-medium text-gray-700">x2</p>
                            </div>
                            <div class="sm:text-right">
                                <p class="text-gray-900 font-medium">1.200.000đ</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 text-center">
                    <button class="text-sm text-[#8b0000] hover:underline font-medium">Xem thêm 2 sản phẩm khác</button>
                </div>
            </div>

            <!-- Footer Card -->
            <div class="bg-gray-50/30 px-4 py-4 sm:px-6 border-t border-gray-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <div class="text-right lg:text-left">
                    <p class="text-sm text-gray-500 mb-1">Đã áp dụng voucher: <span class="text-green-600">-50.000đ</span></p>
                    <div class="text-sm text-gray-600">
                        Tổng thanh toán: <span class="text-xl font-bold text-[#8b0000] ml-2">5.850.000đ</span>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                    <button onclick="document.getElementById('cancelModal').classList.remove('hidden')" class="flex-1 sm:flex-none px-6 py-2.5 border border-[#8b0000] text-[#8b0000] rounded-xl font-medium hover:bg-red-50 transition-colors text-sm text-center">
                        Hủy đơn
                    </button>
                    <a href="<?= APP_URL ?>/chi-tiet-don-hang?id=DH202600123" class="flex-1 sm:flex-none px-6 py-2.5 bg-[#8b0000] text-white rounded-xl font-medium hover:bg-[#700000] shadow-sm transition-colors text-sm text-center" style="text-decoration: none;">
                        Xem chi tiết
                    </a>
                </div>
            </div>
        </div>

        <!-- ================= CARD ĐƠN HÀNG 2: Đang Giao ================= -->
        <div class="border border-gray-200 rounded-2xl overflow-hidden hover:shadow-md transition-shadow bg-white">
            <!-- Header Card -->
            <div class="bg-gray-50/50 px-4 py-3 sm:px-6 sm:py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm">
                    <span class="font-bold text-gray-900">Mã đơn: #DH202600098</span>
                    <span class="hidden sm:inline text-gray-300">|</span>
                    <span class="text-gray-500">Ngày đặt: 12/05/2026</span>
                    <span class="hidden sm:inline text-gray-300">|</span>
                    <span class="text-gray-500">Thanh toán: Chuyển khoản</span>
                </div>
                <!-- Badge -->
                <div class="self-start sm:self-auto">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-teal-50 text-teal-700 border border-teal-100">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                        Đang giao hàng
                    </span>
                </div>
            </div>
            
            <!-- Timeline (Optional) -->
            <div class="px-4 sm:px-6 pt-4 pb-2">
                <div class="flex items-center text-xs">
                    <div class="flex items-center text-[#8b0000]">
                        <span class="w-5 h-5 rounded-full bg-[#8b0000] text-white flex items-center justify-center">✓</span>
                        <span class="ml-2 font-medium">Xác nhận</span>
                    </div>
                    <div class="flex-1 h-px bg-[#8b0000] mx-2"></div>
                    <div class="flex items-center text-[#8b0000]">
                        <span class="w-5 h-5 rounded-full bg-red-100 text-[#8b0000] flex items-center justify-center animate-pulse">●</span>
                        <span class="ml-2 font-medium">Đang giao</span>
                    </div>
                    <div class="flex-1 h-px bg-gray-200 mx-2"></div>
                    <div class="flex items-center text-gray-400">
                        <span class="w-5 h-5 rounded-full bg-gray-100 flex items-center justify-center"></span>
                        <span class="ml-2">Thành công</span>
                    </div>
                </div>
            </div>

            <!-- Danh sách sản phẩm -->
            <div class="p-4 sm:p-6">
                <!-- SP 1 -->
                <div class="flex gap-4 items-start">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gray-50 rounded-xl overflow-hidden shrink-0 border border-gray-100">
                        <img src="<?= APP_URL ?>/public/assets/images/placeholder.jpg" alt="Product" class="w-full h-full object-cover opacity-30">
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-col sm:flex-row sm:justify-between gap-2">
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1 truncate">Vòng tay Đá Thạch Anh Hồng</h3>
                                <p class="text-sm text-gray-500 mb-1">Phân loại: Size M (16cm)</p>
                                <p class="text-sm font-medium text-gray-700">x1</p>
                            </div>
                            <div class="sm:text-right">
                                <p class="text-gray-900 font-medium">1.250.000đ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Card -->
            <div class="bg-gray-50/30 px-4 py-4 sm:px-6 border-t border-gray-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <div class="text-right lg:text-left">
                    <div class="text-sm text-gray-600">
                        Tổng thanh toán: <span class="text-xl font-bold text-[#8b0000] ml-2">1.250.000đ</span>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                    <a href="<?= APP_URL ?>/chi-tiet-don-hang?id=DH202600098" class="flex-1 sm:flex-none px-6 py-2.5 bg-[#8b0000] text-white rounded-xl font-medium hover:bg-[#700000] shadow-sm transition-colors text-sm text-center" style="text-decoration: none;">
                        Xem chi tiết
                    </a>
                </div>
            </div>
        </div>

        <!-- ================= CARD ĐƠN HÀNG 3: Thành Công ================= -->
        <div class="border border-gray-200 rounded-2xl overflow-hidden hover:shadow-md transition-shadow bg-white">
            <div class="bg-gray-50/50 px-4 py-3 sm:px-6 sm:py-4 border-b border-gray-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm">
                    <span class="font-bold text-gray-900">Mã đơn: #DH202600045</span>
                    <span class="hidden sm:inline text-gray-300">|</span>
                    <span class="text-gray-500">Ngày đặt: 05/05/2026</span>
                </div>
                <!-- Badge -->
                <div class="self-start sm:self-auto">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-100">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Thành công
                    </span>
                </div>
            </div>
            
            <!-- Danh sách sản phẩm -->
            <div class="p-4 sm:p-6">
                <!-- SP 1 -->
                <div class="flex gap-4 items-start">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-gray-50 rounded-xl overflow-hidden shrink-0 border border-gray-100">
                        <img src="<?= APP_URL ?>/public/assets/images/placeholder.jpg" alt="Product" class="w-full h-full object-cover opacity-30">
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-col sm:flex-row sm:justify-between gap-2">
                            <div>
                                <h3 class="font-bold text-gray-900 mb-1 truncate">Mặt Dây Chuyền Phật Bản Mệnh</h3>
                                <p class="text-sm text-gray-500 mb-1">Phân loại: Đá Mắt Hổ</p>
                                <p class="text-sm font-medium text-gray-700">x1</p>
                            </div>
                            <div class="sm:text-right">
                                <p class="text-gray-900 font-medium">950.000đ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Card -->
            <div class="bg-gray-50/30 px-4 py-4 sm:px-6 border-t border-gray-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <div class="text-right lg:text-left">
                    <div class="text-sm text-gray-600">
                        Tổng thanh toán: <span class="text-xl font-bold text-[#8b0000] ml-2">950.000đ</span>
                    </div>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                    <button class="flex-1 sm:flex-none px-6 py-2.5 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-100 transition-colors text-sm text-center">
                        Mua lại
                    </button>
                    <button class="flex-1 sm:flex-none px-6 py-2.5 border border-[#8b0000] text-[#8b0000] rounded-xl font-medium hover:bg-red-50 transition-colors text-sm text-center">
                        Đánh giá sản phẩm
                    </button>
                    <a href="<?= APP_URL ?>/chi-tiet-don-hang?id=DH202600045" class="flex-1 sm:flex-none px-6 py-2.5 bg-[#8b0000] text-white rounded-xl font-medium hover:bg-[#700000] shadow-sm transition-colors text-sm text-center" style="text-decoration: none;">
                        Xem chi tiết
                    </a>
                </div>
            </div>
        </div>
        
        <!-- ================= Lỗi Thanh Toán / Hủy ================= -->
        <div class="border border-red-100 rounded-2xl overflow-hidden hover:shadow-md transition-shadow bg-white relative">
            <div class="bg-red-50/50 px-4 py-3 sm:px-6 sm:py-4 border-b border-red-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                <div class="flex flex-wrap items-center gap-x-4 gap-y-1 text-sm">
                    <span class="font-bold text-gray-900">Mã đơn: #DH202600021</span>
                    <span class="hidden sm:inline text-gray-300">|</span>
                    <span class="text-gray-500">Ngày đặt: 01/05/2026</span>
                </div>
                <!-- Badge -->
                <div class="self-start sm:self-auto">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-[#8b0000] border border-red-200">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Đã hủy
                    </span>
                </div>
            </div>
            
            <div class="p-4 sm:p-6">
                <!-- Nội dung giải thích lỗi -->
                <div class="mb-4 text-sm text-red-600 bg-red-50 p-3 rounded-lg border border-red-100">
                    <span class="font-medium">Lý do hủy:</span> Bạn chưa hoàn tất thanh toán trong thời gian quy định.
                </div>
                
                <!-- SP 1 -->
                <div class="flex gap-4 items-start opacity-75 grayscale-[30%]">
                    <div class="w-16 h-16 sm:w-20 sm:h-20 bg-gray-50 rounded-xl overflow-hidden shrink-0 border border-gray-100">
                        <img src="<?= APP_URL ?>/public/assets/images/placeholder.jpg" alt="Product" class="w-full h-full object-cover opacity-30">
                    </div>
                    <div class="flex-1 min-w-0">
                        <h3 class="font-medium text-gray-900 mb-1 truncate">Vòng ngọc bích 12 con giáp</h3>
                        <p class="text-sm text-gray-500 mb-1">x1</p>
                    </div>
                    <div class="sm:text-right">
                        <p class="text-gray-900 font-medium">1.800.000đ</p>
                    </div>
                </div>
            </div>

            <div class="bg-gray-50/30 px-4 py-4 sm:px-6 border-t border-gray-100 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                <div class="text-right lg:text-left text-sm text-gray-600">
                    Tổng thanh toán: <span class="text-xl font-bold text-gray-500 ml-2 line-through">1.800.000đ</span>
                </div>
                <div class="flex flex-col sm:flex-row gap-3 w-full lg:w-auto">
                    <button class="flex-1 sm:flex-none px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 shadow-sm transition-colors text-sm text-center">
                        Mua lại đơn này
                    </button>
                    <a href="<?= APP_URL ?>/chi-tiet-don-hang?id=DH202600021" class="flex-1 sm:flex-none px-6 py-2.5 bg-[#8b0000] text-white rounded-xl font-medium hover:bg-[#700000] shadow-sm transition-colors text-sm text-center" style="text-decoration: none;">
                        Xem chi tiết
                    </a>
                </div>
            </div>
        </div>

    </div>
    
    <!-- Empty State (Trạng thái Chưa có đơn hàng - Ẩn mặc định, thêm class 'hidden' khi có data) -->
    <div class="hidden flex-col items-center justify-center py-16 text-center">
        <div class="w-32 h-32 mb-6 bg-red-50 rounded-full flex items-center justify-center">
            <svg class="w-16 h-16 text-[#8b0000] opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
        </div>
        <h3 class="text-xl font-bold text-gray-900 mb-2">Bạn chưa có đơn hàng nào</h3>
        <p class="text-gray-500 mb-8 max-w-md">Hãy khám phá các mẫu vòng ngọc và chuỗi đá phong thủy cao cấp phù hợp với bản mệnh của bạn.</p>
        <div class="flex flex-col sm:flex-row gap-4">
            <a href="<?= APP_URL ?>/san-pham" class="px-8 py-3 bg-[#8b0000] text-white rounded-xl font-bold shadow-md hover:bg-[#700000] hover:shadow-lg transition-all text-sm">
                Khám phá sản phẩm
            </a>
            <a href="<?= APP_URL ?>/vong-theo-menh" class="px-8 py-3 bg-white border-2 border-[#8b0000] text-[#8b0000] rounded-xl font-bold hover:bg-red-50 transition-colors text-sm">
                Tra cứu Vòng Sinh Mệnh
            </a>
        </div>
    </div>

    <!-- Phân trang -->
    <div class="mt-10 flex justify-center">
        <nav class="flex items-center gap-1.5 sm:gap-2">
            <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-500 hover:bg-gray-50 transition-colors disabled:opacity-50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button class="w-10 h-10 flex items-center justify-center rounded-xl bg-[#8b0000] text-white font-medium shadow-sm">1</button>
            <button class="w-10 h-10 hidden sm:flex items-center justify-center rounded-xl border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors font-medium">2</button>
            <button class="w-10 h-10 hidden sm:flex items-center justify-center rounded-xl border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors font-medium">3</button>
            <span class="px-1 text-gray-400 hidden sm:block">...</span>
            <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors font-medium">8</button>
            <button class="w-10 h-10 flex items-center justify-center rounded-xl border border-gray-200 text-gray-500 hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </nav>
    </div>
</div>

<!-- Modal Xác nhận hủy đơn -->
<div id="cancelModal" class="fixed inset-0 z-50 hidden">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-gray-900/50 backdrop-blur-sm transition-opacity" onclick="document.getElementById('cancelModal').classList.add('hidden')"></div>
    
    <!-- Modal Content -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[90%] max-w-md bg-white rounded-2xl shadow-xl overflow-hidden p-6 animate-fade-in">
        <div class="flex justify-between items-center mb-5">
            <h3 class="text-xl font-bold text-gray-900">Xác nhận hủy đơn hàng</h3>
            <button onclick="document.getElementById('cancelModal').classList.add('hidden')" class="text-gray-400 hover:text-gray-600 transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        
        <p class="text-gray-600 mb-6 text-sm">
            Bạn có chắc muốn hủy đơn hàng <span class="font-bold text-gray-900">#DH202600123</span> không? Thao tác này không thể hoàn tác sau khi xác nhận.
        </p>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Vui lòng chọn lý do hủy:</label>
            <select class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:border-[#8b0000] focus:ring-[#8b0000] focus:ring-1 outline-none transition-shadow text-sm bg-white">
                <option value="">-- Chọn lý do --</option>
                <option value="1">Đặt nhầm sản phẩm</option>
                <option value="2">Muốn thay đổi địa chỉ giao hàng</option>
                <option value="3">Muốn thay đổi phương thức thanh toán</option>
                <option value="4">Không còn nhu cầu mua nữa</option>
                <option value="5">Lý do khác</option>
            </select>
        </div>

        <div class="flex flex-col-reverse sm:flex-row gap-3">
            <button onclick="document.getElementById('cancelModal').classList.add('hidden')" class="flex-1 px-4 py-3 border border-gray-300 text-gray-700 rounded-xl font-medium hover:bg-gray-50 transition-colors text-sm">
                Không, giữ đơn hàng
            </button>
            <button class="flex-1 px-4 py-3 bg-[#8b0000] text-white rounded-xl font-medium hover:bg-[#700000] shadow-sm transition-colors text-sm">
                Xác nhận hủy
            </button>
        </div>
    </div>
</div>
