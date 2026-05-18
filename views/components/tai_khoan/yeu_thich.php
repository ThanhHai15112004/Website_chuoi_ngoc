<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Sản phẩm yêu thích</h2>
        <p class="text-gray-500 mt-1">Danh sách những món trang sức bạn quan tâm</p>
    </div>

    <!-- Filter -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div class="flex items-center gap-2">
            <span class="text-gray-600 text-sm">Đang hiển thị <strong>8</strong> sản phẩm</span>
        </div>
        <select class="rounded-lg border border-gray-300 py-2 pl-3 pr-8 text-sm focus:border-[#8b0000] focus:outline-none focus:ring-[#8b0000]">
            <option>Mới thêm gần đây</option>
            <option>Giá: Thấp đến Cao</option>
            <option>Giá: Cao đến Thấp</option>
        </select>
    </div>

    <!-- Product Grid -->
    <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4">
        
        <!-- Product Item -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all group overflow-hidden relative flex flex-col h-full">
            <!-- Favorite button -->
            <button class="absolute top-3 right-3 z-10 w-8 h-8 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center text-red-500 hover:text-gray-400 hover:bg-gray-100 transition-colors shadow-sm">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
            </button>
            
            <a href="#" class="block relative aspect-square bg-gray-100 overflow-hidden">
                <!-- Placeholder Image -->
                <div class="w-full h-full flex items-center justify-center bg-gray-100">
                    <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
            </a>
            <div class="p-4 flex flex-col flex-grow">
                <h3 class="text-sm font-medium text-gray-900 mb-1 hover:text-[#8b0000] transition-colors line-clamp-2 flex-grow">
                    <a href="#">Vòng tay Đá Thạch Anh Tóc Vàng Vip</a>
                </h3>
                <div class="mt-2">
                    <span class="text-[#8b0000] font-bold">2.450.000đ</span>
                </div>
                <button class="mt-3 w-full py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-[#8b0000] transition-colors flex items-center justify-center gap-2 group-hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Thêm vào giỏ
                </button>
            </div>
        </div>

        <!-- Product Item -->
        <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-all group overflow-hidden relative flex flex-col h-full">
            <button class="absolute top-3 right-3 z-10 w-8 h-8 bg-white/80 backdrop-blur-sm rounded-full flex items-center justify-center text-red-500 hover:text-gray-400 hover:bg-gray-100 transition-colors shadow-sm">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path></svg>
            </button>
            
            <a href="#" class="block relative aspect-square bg-gray-100 overflow-hidden">
                <div class="absolute top-2 left-2 bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded shadow-sm z-10">
                    -15%
                </div>
                <div class="w-full h-full flex items-center justify-center bg-gray-100">
                    <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                </div>
            </a>
            <div class="p-4 flex flex-col flex-grow">
                <h3 class="text-sm font-medium text-gray-900 mb-1 hover:text-[#8b0000] transition-colors line-clamp-2 flex-grow">
                    <a href="#">Chuỗi Ngọc Bích Huyết Phỉ Thúy Bản Hiếm</a>
                </h3>
                <div class="mt-2 flex items-center gap-2">
                    <span class="text-[#8b0000] font-bold">12.500.000đ</span>
                    <span class="text-xs text-gray-400 line-through">14.700.000đ</span>
                </div>
                <button class="mt-3 w-full py-2 bg-gray-900 text-white text-sm font-medium rounded-lg hover:bg-[#8b0000] transition-colors flex items-center justify-center gap-2 group-hover:shadow-md">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Thêm vào giỏ
                </button>
            </div>
        </div>

    </div>
    
    <!-- Pagination -->
    <div class="mt-8 flex justify-center">
        <nav class="flex items-center gap-1">
            <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 transition-colors opacity-50 cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button class="w-10 h-10 flex items-center justify-center rounded-lg bg-[#8b0000] text-white font-medium shadow-sm">1</button>
            <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition-colors font-medium">2</button>
            <button class="w-10 h-10 flex items-center justify-center rounded-lg border border-gray-200 text-gray-500 hover:bg-gray-50 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
        </nav>
    </div>
</div>
