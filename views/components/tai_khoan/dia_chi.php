<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-10">
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-6 mb-8 pb-6 border-b border-gray-100">
        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-1">Sổ địa chỉ</h2>
            <p class="text-gray-500 text-sm">Quản lý thông tin giao hàng để thanh toán nhanh chóng hơn.</p>
        </div>
        <button class="inline-flex items-center justify-center px-6 py-3 bg-[#8b0000] text-white rounded-xl font-bold hover:bg-[#700000] transition-colors shadow-lg shadow-red-900/20 focus:ring-2 focus:ring-offset-2 focus:ring-[#8b0000] outline-none gap-2 flex-shrink-0">
            <iconify-icon icon="ph:plus-bold" class="text-lg"></iconify-icon>
            Thêm địa chỉ mới
        </button>
    </div>

    <div class="space-y-5">
        
        <!-- Default Address -->
        <div class="group border-2 border-red-100 bg-gradient-to-br from-red-50/50 to-white rounded-2xl p-6 relative transition-all hover:shadow-md hover:border-[#8b0000]/30 overflow-hidden">
            <!-- Decorative badge bg -->
            <div class="absolute top-0 right-0 w-32 h-32 bg-red-100/50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
            
            <div class="absolute top-5 right-5 flex items-center gap-3 z-10 opacity-0 group-hover:opacity-100 transition-opacity">
                <button class="flex items-center justify-center w-10 h-10 rounded-full bg-white text-[#8b0000] hover:bg-[#8b0000] hover:text-white shadow-sm border border-red-100 transition-colors" title="Chỉnh sửa">
                    <iconify-icon icon="ph:pencil-simple-bold" class="text-lg"></iconify-icon>
                </button>
            </div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-3">
                    <h3 class="text-xl font-bold text-gray-900">Nguyễn Văn A</h3>
                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                    <span class="text-gray-600 font-medium">0901 234 567</span>
                    <span class="ml-2 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-[#8b0000] text-white shadow-sm">
                        <iconify-icon icon="ph:check-circle-fill"></iconify-icon>
                        Mặc định
                    </span>
                </div>
                
                <div class="flex items-start gap-3 text-gray-600">
                    <iconify-icon icon="ph:map-pin-line-duotone" class="text-xl text-[#8b0000] mt-0.5 flex-shrink-0"></iconify-icon>
                    <div class="space-y-1 leading-relaxed">
                        <p>Số 123, Đường Lê Lợi, Phường Bến Thành</p>
                        <p class="font-medium text-gray-700">Quận 1, Thành phố Hồ Chí Minh</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Address 2 -->
        <div class="group border border-gray-200 bg-white rounded-2xl p-6 relative transition-all hover:shadow-md hover:border-gray-300">
            <div class="absolute top-5 right-5 flex items-center gap-2 z-10 opacity-0 group-hover:opacity-100 transition-opacity">
                <button class="px-4 py-2 text-sm font-semibold text-gray-600 bg-gray-50 hover:bg-gray-100 hover:text-gray-900 rounded-lg border border-gray-200 transition-colors">
                    Thiết lập mặc định
                </button>
                <button class="flex items-center justify-center w-10 h-10 rounded-full bg-gray-50 text-gray-600 hover:bg-[#8b0000] hover:text-white border border-gray-200 transition-colors" title="Chỉnh sửa">
                    <iconify-icon icon="ph:pencil-simple-bold" class="text-lg"></iconify-icon>
                </button>
                <button class="flex items-center justify-center w-10 h-10 rounded-full bg-red-50 text-red-600 hover:bg-red-600 hover:text-white border border-red-100 transition-colors" title="Xóa">
                    <iconify-icon icon="ph:trash-bold" class="text-lg"></iconify-icon>
                </button>
            </div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-3 mb-3">
                    <h3 class="text-xl font-bold text-gray-900">Nguyễn Văn B</h3>
                    <div class="w-1.5 h-1.5 rounded-full bg-gray-300"></div>
                    <span class="text-gray-600 font-medium">0987 654 321</span>
                    <span class="ml-2 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold bg-gray-100 text-gray-600 border border-gray-200">
                        <iconify-icon icon="ph:buildings-duotone"></iconify-icon>
                        Văn phòng
                    </span>
                </div>
                
                <div class="flex items-start gap-3 text-gray-600">
                    <iconify-icon icon="ph:map-pin-line-duotone" class="text-xl text-gray-400 mt-0.5 flex-shrink-0"></iconify-icon>
                    <div class="space-y-1 leading-relaxed">
                        <p>Tòa nhà Bitexco, Tầng 15, Số 2 Hải Triều, Phường Bến Nghé</p>
                        <p class="font-medium text-gray-700">Quận 1, Thành phố Hồ Chí Minh</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
