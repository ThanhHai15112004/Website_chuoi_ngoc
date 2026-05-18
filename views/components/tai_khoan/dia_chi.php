<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-900">Sổ địa chỉ</h2>
            <p class="text-gray-500 mt-1">Quản lý địa chỉ nhận hàng của bạn</p>
        </div>
        <button class="inline-flex items-center justify-center px-4 py-2 bg-[#8b0000] text-white rounded-lg font-medium hover:bg-[#700000] transition-colors shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-[#8b0000] outline-none gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
            Thêm địa chỉ mới
        </button>
    </div>

    <div class="space-y-4">
        
        <!-- Default Address -->
        <div class="border border-red-200 bg-red-50/30 rounded-xl p-5 relative">
            <div class="absolute top-5 right-5 flex gap-2">
                <button class="text-[#8b0000] hover:text-[#700000] font-medium text-sm hover:underline">Chỉnh sửa</button>
            </div>
            
            <div class="flex items-center gap-3 mb-2">
                <h3 class="text-lg font-bold text-gray-900">Nguyễn Văn A</h3>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-[#8b0000] text-white">
                    Mặc định
                </span>
                <span class="text-gray-400">|</span>
                <span class="text-gray-600">0901 234 567</span>
            </div>
            
            <div class="text-gray-600 mt-2 space-y-1">
                <p>Số 123, Đường Lê Lợi, Phường Bến Thành</p>
                <p>Quận 1, Thành phố Hồ Chí Minh</p>
            </div>
        </div>

        <!-- Address 2 -->
        <div class="border border-gray-200 rounded-xl p-5 relative hover:border-gray-300 transition-colors">
            <div class="absolute top-5 right-5 flex gap-3">
                <button class="text-gray-500 hover:text-[#8b0000] font-medium text-sm hover:underline">Thiết lập mặc định</button>
                <span class="text-gray-300">|</span>
                <button class="text-[#8b0000] hover:text-[#700000] font-medium text-sm hover:underline">Chỉnh sửa</button>
                <span class="text-gray-300">|</span>
                <button class="text-gray-400 hover:text-red-600 font-medium text-sm hover:underline">Xóa</button>
            </div>
            
            <div class="flex items-center gap-3 mb-2">
                <h3 class="text-lg font-bold text-gray-900">Nguyễn Văn B</h3>
                <span class="text-gray-400">|</span>
                <span class="text-gray-600">0987 654 321</span>
            </div>
            
            <div class="text-gray-600 mt-2 space-y-1">
                <p>Tòa nhà Bitexco, Tầng 15, Số 2 Hải Triều, Phường Bến Nghé</p>
                <p>Quận 1, Thành phố Hồ Chí Minh</p>
            </div>
        </div>

    </div>
</div>
