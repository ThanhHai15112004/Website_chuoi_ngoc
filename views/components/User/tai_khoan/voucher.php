<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Kho Voucher</h2>
        <p class="text-gray-500 mt-1">Các mã giảm giá và ưu đãi dành riêng cho bạn</p>
    </div>

    <!-- Add Voucher Input -->
    <div class="flex gap-4 mb-8">
        <div class="flex-1 relative">
            <input type="text" placeholder="Nhập mã ưu đãi..." class="w-full rounded-lg border border-gray-300 pl-4 pr-4 py-3 focus:border-[#8b0000] focus:ring-[#8b0000] focus:ring-1 outline-none transition-shadow uppercase placeholder-normal">
        </div>
        <button class="px-6 py-3 bg-[#8b0000] text-white rounded-lg font-medium hover:bg-[#700000] transition-colors shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-[#8b0000] outline-none whitespace-nowrap">
            Lưu mã
        </button>
    </div>

    <!-- Voucher Tabs -->
    <div class="border-b border-gray-200 mb-6">
        <nav class="flex gap-6 overflow-x-auto pb-[-1px] scrollbar-hide">
            <button class="whitespace-nowrap pb-4 border-b-2 border-[#8b0000] text-[#8b0000] font-medium px-1">Tất cả <span class="ml-1 bg-red-100 text-red-600 py-0.5 px-2 rounded-full text-xs">3</span></button>
            <button class="whitespace-nowrap pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium px-1 transition-colors">Giảm giá</button>
            <button class="whitespace-nowrap pb-4 border-b-2 border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 font-medium px-1 transition-colors">Miễn phí vận chuyển</button>
        </nav>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        
        <!-- Voucher 1 -->
        <div class="border border-gray-200 rounded-xl overflow-hidden flex h-[120px] hover:shadow-md transition-shadow relative">
            <div class="w-[100px] bg-[#8b0000] flex flex-col justify-center items-center text-white shrink-0 border-r border-dashed border-gray-300 relative">
                <!-- Half circles for ticket effect -->
                <div class="absolute -top-3 -right-3 w-6 h-6 bg-white rounded-full"></div>
                <div class="absolute -bottom-3 -right-3 w-6 h-6 bg-white rounded-full"></div>
                
                <span class="text-xs uppercase opacity-80 mb-1 tracking-wider">Giảm</span>
                <span class="text-2xl font-bold">10%</span>
            </div>
            <div class="p-4 flex-1 flex flex-col justify-between bg-white">
                <div>
                    <h3 class="font-bold text-gray-900 text-sm leading-snug line-clamp-2">Giảm 10% tối đa 100k cho đơn từ 500k</h3>
                    <p class="text-xs text-gray-500 mt-1">HSD: 30/05/2026</p>
                </div>
                <div class="flex justify-between items-center mt-2">
                    <span class="text-xs text-[#8b0000] font-medium cursor-pointer hover:underline">Điều kiện</span>
                    <button class="px-4 py-1.5 bg-[#8b0000] text-white text-xs font-medium rounded hover:bg-[#700000] transition-colors">Sử dụng</button>
                </div>
            </div>
        </div>

        <!-- Voucher 2 -->
        <div class="border border-gray-200 rounded-xl overflow-hidden flex h-[120px] hover:shadow-md transition-shadow relative">
            <div class="w-[100px] bg-green-600 flex flex-col justify-center items-center text-white shrink-0 border-r border-dashed border-gray-300 relative">
                <div class="absolute -top-3 -right-3 w-6 h-6 bg-white rounded-full"></div>
                <div class="absolute -bottom-3 -right-3 w-6 h-6 bg-white rounded-full"></div>
                
                <span class="text-xs uppercase opacity-80 mb-1 tracking-wider">Free</span>
                <span class="text-2xl font-bold">Ship</span>
            </div>
            <div class="p-4 flex-1 flex flex-col justify-between bg-white">
                <div>
                    <h3 class="font-bold text-gray-900 text-sm leading-snug line-clamp-2">Miễn phí vận chuyển cho đơn từ 200k</h3>
                    <p class="text-xs text-gray-500 mt-1">HSD: 31/05/2026</p>
                </div>
                <div class="flex justify-between items-center mt-2">
                    <span class="text-xs text-[#8b0000] font-medium cursor-pointer hover:underline">Điều kiện</span>
                    <button class="px-4 py-1.5 bg-[#8b0000] text-white text-xs font-medium rounded hover:bg-[#700000] transition-colors">Sử dụng</button>
                </div>
            </div>
        </div>

        <!-- Voucher 3 -->
        <div class="border border-gray-200 rounded-xl overflow-hidden flex h-[120px] hover:shadow-md transition-shadow relative">
            <div class="w-[100px] bg-yellow-500 flex flex-col justify-center items-center text-white shrink-0 border-r border-dashed border-gray-300 relative">
                <div class="absolute -top-3 -right-3 w-6 h-6 bg-white rounded-full"></div>
                <div class="absolute -bottom-3 -right-3 w-6 h-6 bg-white rounded-full"></div>
                
                <span class="text-xs uppercase opacity-80 mb-1 tracking-wider">Giảm</span>
                <span class="text-2xl font-bold">50k</span>
            </div>
            <div class="p-4 flex-1 flex flex-col justify-between bg-white">
                <div>
                    <h3 class="font-bold text-gray-900 text-sm leading-snug line-clamp-2">Giảm trực tiếp 50k - Quà tặng thành viên mới</h3>
                    <p class="text-xs text-gray-500 mt-1">HSD: Không thời hạn</p>
                </div>
                <div class="flex justify-between items-center mt-2">
                    <span class="text-xs text-[#8b0000] font-medium cursor-pointer hover:underline">Điều kiện</span>
                    <button class="px-4 py-1.5 bg-[#8b0000] text-white text-xs font-medium rounded hover:bg-[#700000] transition-colors">Sử dụng</button>
                </div>
            </div>
        </div>

    </div>
</div>
