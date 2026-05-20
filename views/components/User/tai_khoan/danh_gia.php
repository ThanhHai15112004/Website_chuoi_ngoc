<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Đánh giá của tôi</h2>
        <p class="text-gray-500 mt-1">Quản lý các đánh giá sản phẩm bạn đã mua</p>
    </div>

    <!-- Tabs -->
    <div class="border-b border-gray-200 mb-6">
        <nav class="flex gap-6 overflow-x-auto pb-[-1px] scrollbar-hide">
            <button class="whitespace-nowrap pb-4 border-b-2 border-[#8b0000] text-[#8b0000] font-medium px-1">Chưa đánh giá <span class="ml-1 bg-red-100 text-red-600 py-0.5 px-2 rounded-full text-xs">2</span></button>
            <button class="whitespace-nowrap pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium px-1 transition-colors">Đã đánh giá</button>
        </nav>
    </div>

    <!-- Products to Review -->
    <div class="space-y-4">
        
        <!-- Item -->
        <div class="border border-gray-200 rounded-xl p-5 hover:border-gray-300 transition-colors">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden shrink-0">
                    <img src="<?= APP_URL ?>/public/assets/images/placeholder.jpg" alt="Product" class="w-full h-full object-cover opacity-20">
                </div>
                <div class="flex-1 flex flex-col justify-between">
                    <div>
                        <h3 class="font-medium text-gray-900 mb-1">Vòng tay Đá Thạch Anh Tóc Vàng Vip</h3>
                        <p class="text-sm text-gray-500">Phân loại: 10 ly, Vàng 18K</p>
                        <p class="text-xs text-gray-400 mt-1">Đơn hàng #DH89234 • Giao hàng: 15/05/2026</p>
                    </div>
                </div>
                <div class="flex items-center sm:items-end justify-end mt-4 sm:mt-0">
                    <button class="px-6 py-2 bg-[#8b0000] text-white text-sm font-medium rounded-lg hover:bg-[#700000] transition-colors shadow-sm">
                        Đánh giá ngay
                    </button>
                </div>
            </div>
            
            <!-- Quick Rating Stars (Interactive Preview) -->
            <div class="mt-4 pt-4 border-t border-gray-100 flex items-center gap-2">
                <span class="text-sm text-gray-600 font-medium mr-2">Chất lượng sản phẩm:</span>
                <div class="flex gap-1">
                    <button class="text-gray-300 hover:text-yellow-400 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </button>
                    <button class="text-gray-300 hover:text-yellow-400 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </button>
                    <button class="text-gray-300 hover:text-yellow-400 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </button>
                    <button class="text-gray-300 hover:text-yellow-400 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </button>
                    <button class="text-gray-300 hover:text-yellow-400 transition-colors">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>
