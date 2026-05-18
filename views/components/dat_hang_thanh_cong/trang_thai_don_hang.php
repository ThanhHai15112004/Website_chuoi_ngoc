<div class="mb-12 relative px-2">
    <div class="absolute left-4 right-4 sm:left-10 sm:right-10 top-5 h-1 bg-gray-200 rounded-full z-0"></div>
    <!-- Active Line -->
    <div class="absolute left-4 sm:left-10 top-5 w-1/3 h-1 bg-[#8B0000] rounded-full z-0 transition-all duration-500 shadow-[0_0_8px_rgba(139,0,0,0.5)]"></div>
    
    <div class="relative z-10 flex justify-between">
        <!-- Step 1: Placed -->
        <div class="flex flex-col items-center">
            <div class="w-10 h-10 rounded-full bg-[#8B0000] text-white flex items-center justify-center shadow-md mb-2 border-4 border-white relative z-10">
                <iconify-icon icon="mdi:clipboard-check-outline" class="text-lg"></iconify-icon>
            </div>
            <span class="text-xs sm:text-sm font-semibold text-[#8B0000] text-center">Đã đặt hàng</span>
        </div>
        <!-- Step 2: Processing (Active) -->
        <div class="flex flex-col items-center">
            <div class="w-10 h-10 rounded-full bg-[#8B0000] text-white flex items-center justify-center shadow-md mb-2 border-4 border-white relative z-10 ring-4 ring-[#8B0000]/30 animate-pulse">
                <iconify-icon icon="mdi:package-variant-closed" class="text-lg"></iconify-icon>
            </div>
            <span class="text-xs sm:text-sm font-bold text-[#8B0000] text-center">Đang xử lý</span>
        </div>
        <!-- Step 3: Shipping (Pending) -->
        <div class="flex flex-col items-center opacity-40 grayscale">
            <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center mb-2 border-4 border-white relative z-10">
                <iconify-icon icon="mdi:truck-delivery-outline" class="text-lg"></iconify-icon>
            </div>
            <span class="text-xs sm:text-sm font-medium text-gray-500 text-center">Đang giao</span>
        </div>
        <!-- Step 4: Delivered (Pending) -->
        <div class="flex flex-col items-center opacity-40 grayscale">
            <div class="w-10 h-10 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center mb-2 border-4 border-white relative z-10">
                <iconify-icon icon="mdi:home-check-outline" class="text-lg"></iconify-icon>
            </div>
            <span class="text-xs sm:text-sm font-medium text-gray-500 text-center">Thành công</span>
        </div>
    </div>
</div>
