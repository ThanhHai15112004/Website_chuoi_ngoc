<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Hạng thành viên</h2>
        <p class="text-gray-500 mt-1">Chương trình khách hàng thân thiết Chuỗi Ngọc Phong Thủy</p>
    </div>

    <!-- Current Status Card -->
    <div class="bg-gradient-to-r from-yellow-600 to-yellow-400 rounded-2xl p-8 text-white relative overflow-hidden shadow-lg mb-8">
        <!-- Decorative bg -->
        <div class="absolute -top-24 -right-24 w-64 h-64 bg-white opacity-10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-12 -left-12 w-40 h-40 bg-black opacity-10 rounded-full blur-2xl"></div>
        
        <div class="relative z-10">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
                <div>
                    <div class="flex items-center gap-2 mb-2 opacity-90">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span class="font-medium tracking-wide">Thành viên</span>
                    </div>
                    <div class="text-4xl font-bold mb-1 drop-shadow-sm">GOLD</div>
                    <p class="text-yellow-100 text-sm">Hưởng ưu đãi 10% cho mọi đơn hàng</p>
                </div>
                
                <div class="text-right hidden md:block">
                    <svg class="w-20 h-20 opacity-80" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
            </div>

            <!-- Progress Bar -->
            <div class="mt-8 bg-black/10 rounded-xl p-4 backdrop-blur-sm border border-white/20">
                <div class="flex justify-between text-sm font-medium mb-2">
                    <span>Đã chi tiêu: 5.000.000đ</span>
                    <span>Diamond: 10.000.000đ</span>
                </div>
                <div class="w-full bg-black/20 rounded-full h-3 overflow-hidden">
                    <div class="bg-white h-3 rounded-full relative" style="width: 50%">
                        <div class="absolute top-0 right-0 bottom-0 left-0 bg-gradient-to-r from-transparent to-white/40 animate-pulse"></div>
                    </div>
                </div>
                <p class="text-xs text-center mt-3 text-yellow-100">Chi tiêu thêm <span class="font-bold text-white">5.000.000đ</span> để thăng hạng Diamond</p>
            </div>
        </div>
    </div>

    <!-- Tiers Info -->
    <h3 class="text-lg font-bold text-gray-900 mb-4">Quyền lợi các hạng thẻ</h3>
    
    <div class="space-y-4">
        
        <!-- Silver -->
        <div class="border border-gray-200 rounded-xl p-5 hover:border-gray-300 transition-colors bg-gray-50 opacity-60">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center border-2 border-white shadow-sm text-gray-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-700">SILVER</h4>
                        <p class="text-xs text-gray-500">Tổng chi tiêu từ 0đ</p>
                    </div>
                </div>
            </div>
            <ul class="text-sm text-gray-600 space-y-2 ml-13">
                <li class="flex items-start">
                    <svg class="w-4 h-4 text-gray-400 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Tích lũy 1% giá trị đơn hàng.
                </li>
                <li class="flex items-start">
                    <svg class="w-4 h-4 text-gray-400 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Quà tặng sinh nhật trị giá 100k.
                </li>
            </ul>
        </div>

        <!-- Gold (Current) -->
        <div class="border-2 border-yellow-400 rounded-xl p-5 bg-yellow-50 relative">
            <div class="absolute -top-3 right-4 bg-yellow-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-sm">Hạng hiện tại</div>
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center border-2 border-white shadow-sm text-yellow-600">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-yellow-700">GOLD</h4>
                        <p class="text-xs text-yellow-600">Tổng chi tiêu từ 5.000.000đ</p>
                    </div>
                </div>
            </div>
            <ul class="text-sm text-gray-800 space-y-2 ml-13">
                <li class="flex items-start">
                    <svg class="w-4 h-4 text-yellow-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Giảm ngay 10% cho mọi đơn hàng.
                </li>
                <li class="flex items-start">
                    <svg class="w-4 h-4 text-yellow-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Tích lũy 2% giá trị đơn hàng.
                </li>
                <li class="flex items-start">
                    <svg class="w-4 h-4 text-yellow-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Quà tặng sinh nhật trị giá 300k.
                </li>
                <li class="flex items-start">
                    <svg class="w-4 h-4 text-yellow-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Miễn phí vận chuyển toàn quốc.
                </li>
            </ul>
        </div>

        <!-- Diamond -->
        <div class="border border-gray-200 rounded-xl p-5 hover:border-gray-300 transition-colors">
            <div class="flex items-center justify-between mb-3">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center border-2 border-white shadow-sm text-blue-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-blue-900">DIAMOND</h4>
                        <p class="text-xs text-gray-500">Tổng chi tiêu từ 10.000.000đ</p>
                    </div>
                </div>
                <div class="text-xs font-medium text-gray-400">
                    Sắp đạt được
                </div>
            </div>
            <ul class="text-sm text-gray-600 space-y-2 ml-13">
                <li class="flex items-start">
                    <svg class="w-4 h-4 text-blue-400 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Giảm ngay 15% cho mọi đơn hàng.
                </li>
                <li class="flex items-start">
                    <svg class="w-4 h-4 text-blue-400 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Tích lũy 5% giá trị đơn hàng.
                </li>
                <li class="flex items-start">
                    <svg class="w-4 h-4 text-blue-400 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Quà tặng sinh nhật cao cấp trị giá 1.000k.
                </li>
                <li class="flex items-start">
                    <svg class="w-4 h-4 text-blue-400 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Ưu tiên xử lý đơn hàng & Bảo hành trọn đời.
                </li>
            </ul>
        </div>
        
    </div>
</div>
