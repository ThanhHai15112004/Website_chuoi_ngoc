<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
        <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-[#8B0000]">
            <span class="font-bold">3</span>
        </div>
        <h2 class="text-xl font-serif text-gray-800">Phương thức thanh toán</h2>
    </div>
    
    <div class="space-y-3">
        <!-- COD -->
        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors bg-red-50/20 border-[#8B0000]/30 relative overflow-hidden group">
            <div class="absolute inset-0 border-2 border-[#8B0000] rounded-xl opacity-100"></div>
            <input type="radio" name="payment_method" value="cod" class="w-5 h-5 border-gray-300 text-[#8B0000] focus:ring-[#8B0000]" checked>
            <div class="flex-1">
                <span class="font-medium text-gray-800 block">Thanh toán khi nhận hàng (COD)</span>
                <span class="text-sm text-gray-500">Thanh toán bằng tiền mặt khi giao hàng</span>
            </div>
            <div class="w-8 h-8 opacity-70">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#8B0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 16V12" stroke="#8B0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 8H12.01" stroke="#8B0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </label>

        <!-- Chuyển khoản -->
        <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors relative overflow-hidden group">
            <div class="absolute inset-0 border-2 border-[#8B0000] rounded-xl opacity-0"></div>
            <input type="radio" name="payment_method" value="bank_transfer" class="w-5 h-5 border-gray-300 text-[#8B0000] focus:ring-[#8B0000]">
            <div class="flex-1">
                <span class="font-medium text-gray-800 block">Chuyển khoản ngân hàng</span>
                <span class="text-sm text-gray-500">Quét mã QR qua ứng dụng ngân hàng</span>
            </div>
            <div class="w-8 h-8 opacity-70">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 21H21" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M3 10H21" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M5 6L12 3L19 6" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4 10V21" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M20 10V21" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 14V17" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M12 14V17" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M16 14V17" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </label>
    </div>
</div>
