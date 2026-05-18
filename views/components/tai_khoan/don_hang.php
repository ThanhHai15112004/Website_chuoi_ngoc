<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Quản lý đơn hàng</h2>
        <p class="text-gray-500 mt-1">Theo dõi trạng thái và lịch sử mua hàng của bạn</p>
    </div>

    <!-- Order Tabs -->
    <div class="border-b border-gray-200 mb-6">
        <nav class="flex gap-6 overflow-x-auto pb-[-1px] scrollbar-hide">
            <button class="whitespace-nowrap pb-4 border-b-2 border-[#8b0000] text-[#8b0000] font-medium px-1">Tất cả đơn</button>
            <button class="whitespace-nowrap pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium px-1 transition-colors">Chờ xác nhận <span class="ml-1 bg-red-100 text-red-600 py-0.5 px-2 rounded-full text-xs">1</span></button>
            <button class="whitespace-nowrap pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium px-1 transition-colors">Đang xử lý</button>
            <button class="whitespace-nowrap pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium px-1 transition-colors">Đang giao <span class="ml-1 bg-blue-100 text-blue-600 py-0.5 px-2 rounded-full text-xs">1</span></button>
            <button class="whitespace-nowrap pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium px-1 transition-colors">Hoàn thành</button>
            <button class="whitespace-nowrap pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium px-1 transition-colors">Đã hủy</button>
        </nav>
    </div>

    <!-- Search/Filter -->
    <div class="flex gap-4 mb-6">
        <div class="relative flex-1">
            <svg class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Tìm kiếm theo Mã đơn hàng, Tên sản phẩm..." class="w-full rounded-lg border border-gray-300 pl-10 pr-4 py-2.5 focus:border-[#8b0000] focus:ring-[#8b0000] focus:ring-1 outline-none transition-shadow text-sm">
        </div>
    </div>

    <!-- Orders List -->
    <div class="space-y-6">
        
        <!-- Order Item 1 -->
        <div class="border border-gray-200 rounded-xl overflow-hidden hover:border-gray-300 transition-colors">
            <!-- Header -->
            <div class="bg-gray-50 px-5 py-3 border-b border-gray-200 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-4 text-sm">
                    <span class="font-bold text-gray-900">Mã đơn: #DH89102</span>
                    <span class="text-gray-400">|</span>
                    <span class="text-gray-600">Ngày đặt: 02/05/2026</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"></path></svg>
                    <span class="text-blue-600 font-medium text-sm">Đang giao hàng</span>
                </div>
            </div>
            
            <!-- Products -->
            <div class="p-5">
                <div class="flex gap-4 mb-4 pb-4 border-b border-gray-100 last:mb-0 last:pb-0 last:border-0">
                    <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden shrink-0">
                        <img src="<?= APP_URL ?>/public/assets/images/placeholder.jpg" alt="Product" class="w-full h-full object-cover opacity-20">
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between gap-4">
                            <div>
                                <h3 class="font-medium text-gray-900 mb-1">Vòng tay Tỳ Hưu Vàng 24K</h3>
                                <p class="text-sm text-gray-500">Phân loại: Đá Đen, Mix Vàng</p>
                                <p class="text-sm text-gray-900 mt-1">x1</p>
                            </div>
                            <div class="text-right">
                                <p class="text-[#8b0000] font-medium">3.500.000đ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-5 py-4 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-sm text-gray-600">
                    Thành tiền: <span class="text-xl font-bold text-[#8b0000] ml-2">3.500.000đ</span>
                </div>
                <div class="flex gap-3 w-full sm:w-auto">
                    <button class="flex-1 sm:flex-none px-4 py-2 border border-[#8b0000] text-[#8b0000] rounded-lg font-medium hover:bg-red-50 transition-colors text-sm">Xem chi tiết</button>
                    <button class="flex-1 sm:flex-none px-4 py-2 bg-[#8b0000] text-white rounded-lg font-medium hover:bg-[#700000] transition-colors text-sm">Đã nhận hàng</button>
                </div>
            </div>
        </div>

        <!-- Order Item 2 -->
        <div class="border border-gray-200 rounded-xl overflow-hidden hover:border-gray-300 transition-colors">
            <!-- Header -->
            <div class="bg-gray-50 px-5 py-3 border-b border-gray-200 flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-4 text-sm">
                    <span class="font-bold text-gray-900">Mã đơn: #DH89234</span>
                    <span class="text-gray-400">|</span>
                    <span class="text-gray-600">Ngày đặt: 15/05/2026</span>
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <span class="text-green-600 font-medium text-sm">Hoàn thành</span>
                </div>
            </div>
            
            <!-- Products -->
            <div class="p-5">
                <div class="flex gap-4">
                    <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden shrink-0">
                        <img src="<?= APP_URL ?>/public/assets/images/placeholder.jpg" alt="Product" class="w-full h-full object-cover opacity-20">
                    </div>
                    <div class="flex-1">
                        <div class="flex justify-between gap-4">
                            <div>
                                <h3 class="font-medium text-gray-900 mb-1">Vòng tay Đá Thạch Anh Hồng</h3>
                                <p class="text-sm text-gray-500">Phân loại: Size M (16cm)</p>
                                <p class="text-sm text-gray-900 mt-1">x1</p>
                            </div>
                            <div class="text-right">
                                <p class="text-[#8b0000] font-medium">1.250.000đ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-5 py-4 border-t border-gray-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-sm text-gray-600">
                    Thành tiền: <span class="text-xl font-bold text-[#8b0000] ml-2">1.250.000đ</span>
                </div>
                <div class="flex gap-3 w-full sm:w-auto">
                    <button class="flex-1 sm:flex-none px-4 py-2 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-100 transition-colors text-sm">Xem chi tiết</button>
                    <button class="flex-1 sm:flex-none px-4 py-2 border border-[#8b0000] text-[#8b0000] rounded-lg font-medium hover:bg-red-50 transition-colors text-sm">Đánh giá</button>
                    <button class="flex-1 sm:flex-none px-4 py-2 bg-[#8b0000] text-white rounded-lg font-medium hover:bg-[#700000] transition-colors text-sm">Mua lại</button>
                </div>
            </div>
        </div>

    </div>
    
    <!-- Pagination -->
    <div class="mt-8 flex justify-center">
        <nav class="flex items-center gap-1">
            <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-[#8b0000] text-white font-medium shadow-sm">1</button>
            <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors font-medium">2</button>
            <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors font-medium">3</button>
            <span class="px-2 text-gray-400">...</span>
            <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </nav>
    </div>
</div>
