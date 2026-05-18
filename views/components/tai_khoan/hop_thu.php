<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Thông báo</h2>
            <p class="text-gray-500 mt-1">Cập nhật đơn hàng, khuyến mãi và tin tức mới nhất</p>
        </div>
        <button class="text-sm text-[#8b0000] font-medium hover:underline">Đánh dấu tất cả đã đọc</button>
    </div>

    <!-- Notification Tabs -->
    <div class="border-b border-gray-200 mb-6">
        <nav class="flex gap-6 overflow-x-auto pb-[-1px] scrollbar-hide">
            <button class="whitespace-nowrap pb-4 border-b-2 border-[#8b0000] text-[#8b0000] font-medium px-1">Tất cả</button>
            <button class="whitespace-nowrap pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium px-1 transition-colors">Đơn hàng <span class="ml-1 bg-red-100 text-red-600 py-0.5 px-2 rounded-full text-xs">1</span></button>
            <button class="whitespace-nowrap pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium px-1 transition-colors">Khuyến mãi <span class="ml-1 bg-red-100 text-red-600 py-0.5 px-2 rounded-full text-xs">1</span></button>
            <button class="whitespace-nowrap pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium px-1 transition-colors">Hệ thống</button>
        </nav>
    </div>

    <!-- Notification List -->
    <div class="space-y-4">
        
        <!-- Unread Notification -->
        <div class="bg-red-50/50 border border-red-100 rounded-xl p-5 flex gap-4 relative group hover:bg-red-50 transition-colors cursor-pointer">
            <div class="absolute top-5 right-5 w-2.5 h-2.5 bg-red-500 rounded-full"></div>
            
            <div class="w-12 h-12 rounded-full bg-red-100 text-red-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            </div>
            
            <div class="flex-1 pr-8">
                <h3 class="font-bold text-gray-900 mb-1">Giao hàng thành công</h3>
                <p class="text-sm text-gray-600 line-clamp-2">Đơn hàng #DH89234 của bạn đã được giao thành công. Vui lòng đánh giá sản phẩm để nhận thêm điểm thưởng nhé!</p>
                <span class="text-xs text-gray-400 mt-2 block">10 phút trước</span>
            </div>
        </div>

        <!-- Unread Notification -->
        <div class="bg-red-50/50 border border-red-100 rounded-xl p-5 flex gap-4 relative group hover:bg-red-50 transition-colors cursor-pointer">
            <div class="absolute top-5 right-5 w-2.5 h-2.5 bg-red-500 rounded-full"></div>
            
            <div class="w-12 h-12 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"></path></svg>
            </div>
            
            <div class="flex-1 pr-8">
                <h3 class="font-bold text-gray-900 mb-1">Quà tặng đặc biệt dành cho bạn</h3>
                <p class="text-sm text-gray-600 line-clamp-2">Chúc mừng bạn đã thăng hạng Gold! Tặng bạn voucher giảm 10% áp dụng cho đơn hàng tiếp theo.</p>
                <span class="text-xs text-gray-400 mt-2 block">2 giờ trước</span>
            </div>
        </div>

        <!-- Read Notification -->
        <div class="bg-white border border-gray-200 rounded-xl p-5 flex gap-4 relative group hover:border-gray-300 transition-colors cursor-pointer">
            <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            
            <div class="flex-1">
                <h3 class="font-medium text-gray-900 mb-1">Xác nhận đơn hàng</h3>
                <p class="text-sm text-gray-500 line-clamp-2">Đơn hàng #DH89102 của bạn đã được xác nhận và đang trong quá trình đóng gói.</p>
                <span class="text-xs text-gray-400 mt-2 block">02/05/2026 14:30</span>
            </div>
        </div>

    </div>
    
    <div class="mt-8 text-center">
        <button class="text-sm text-gray-500 hover:text-[#8b0000] font-medium transition-colors">Xem thêm thông báo</button>
    </div>
</div>
