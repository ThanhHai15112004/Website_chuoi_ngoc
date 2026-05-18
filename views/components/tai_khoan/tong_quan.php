<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Tổng quan tài khoản</h2>
    </div>

    <!-- User Info & Membership Card -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Personal Info -->
        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
            <div class="flex items-start justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Thông tin cá nhân</h3>
                <button class="text-sm text-[#8b0000] font-medium hover:underline" onclick="document.querySelector('[data-target=\'tab-ho-so\']').click()">Chỉnh sửa</button>
            </div>
            <div class="space-y-3">
                <div class="flex items-center text-gray-600">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span>Nguyễn Văn A</span>
                </div>
                <div class="flex items-center text-gray-600">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <span>nguyenvana@example.com</span>
                </div>
                <div class="flex items-center text-gray-600">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    <span>0901234567</span>
                </div>
            </div>
        </div>

        <!-- Membership Status -->
        <div class="bg-gradient-to-br from-yellow-50 to-amber-100 rounded-xl p-6 border border-yellow-200 relative overflow-hidden">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-yellow-300 opacity-20 rounded-full blur-xl"></div>
            <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-20 h-20 bg-amber-400 opacity-20 rounded-full blur-xl"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-lg font-semibold text-gray-900">Hạng thành viên</h3>
                    <svg class="w-8 h-8 text-yellow-600" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
                <div class="text-3xl font-bold text-yellow-700 mb-1">Vàng (Gold)</div>
                <p class="text-sm text-yellow-800 mb-4">Bạn đang hưởng ưu đãi giảm <span class="font-bold">10%</span> cho mọi đơn hàng.</p>
                
                <div class="mt-4">
                    <div class="flex justify-between text-xs text-yellow-800 mb-1">
                        <span>Chi tiêu hiện tại: 5.000.000đ</span>
                        <span>Kim cương: 10.000.000đ</span>
                    </div>
                    <div class="w-full bg-yellow-200 rounded-full h-2">
                        <div class="bg-yellow-500 h-2 rounded-full" style="width: 50%"></div>
                    </div>
                    <p class="text-xs text-yellow-700 mt-2 text-right">Mua thêm 5.000.000đ để thăng hạng</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm text-center cursor-pointer hover:shadow-md transition-shadow" onclick="document.querySelector('[data-target=\'tab-don-hang\']').click()">
            <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mx-auto mb-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
            </div>
            <div class="text-2xl font-bold text-gray-900">12</div>
            <div class="text-xs text-gray-500 uppercase tracking-wider">Đơn hàng</div>
        </div>
        
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm text-center cursor-pointer hover:shadow-md transition-shadow" onclick="document.querySelector('[data-target=\'tab-voucher\']').click()">
            <div class="w-12 h-12 rounded-full bg-green-50 text-green-600 flex items-center justify-center mx-auto mb-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
            </div>
            <div class="text-2xl font-bold text-gray-900">3</div>
            <div class="text-xs text-gray-500 uppercase tracking-wider">Voucher</div>
        </div>
        
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm text-center cursor-pointer hover:shadow-md transition-shadow" onclick="document.querySelector('[data-target=\'tab-yeu-thich\']').click()">
            <div class="w-12 h-12 rounded-full bg-red-50 text-red-600 flex items-center justify-center mx-auto mb-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
            </div>
            <div class="text-2xl font-bold text-gray-900">8</div>
            <div class="text-xs text-gray-500 uppercase tracking-wider">Yêu thích</div>
        </div>
        
        <div class="bg-white rounded-xl p-4 border border-gray-100 shadow-sm text-center cursor-pointer hover:shadow-md transition-shadow" onclick="document.querySelector('[data-target=\'tab-hop-thu\']').click()">
            <div class="w-12 h-12 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center mx-auto mb-2 relative">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                <span class="absolute top-0 right-0 w-3 h-3 bg-red-500 rounded-full border-2 border-white"></span>
            </div>
            <div class="text-2xl font-bold text-gray-900">2</div>
            <div class="text-xs text-gray-500 uppercase tracking-wider">Thông báo</div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div>
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-900">Đơn hàng gần đây</h3>
            <button class="text-sm text-[#8b0000] font-medium hover:underline" onclick="document.querySelector('[data-target=\'tab-don-hang\']').click()">Xem tất cả</button>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-sm border-y border-gray-200">
                        <th class="py-3 px-4 font-medium">Mã đơn</th>
                        <th class="py-3 px-4 font-medium">Ngày đặt</th>
                        <th class="py-3 px-4 font-medium">Sản phẩm</th>
                        <th class="py-3 px-4 font-medium">Tổng tiền</th>
                        <th class="py-3 px-4 font-medium">Trạng thái</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 font-medium text-gray-900">#DH89234</td>
                        <td class="py-4 px-4 text-gray-500">15/05/2026</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded bg-gray-100 mr-3 overflow-hidden">
                                    <!-- Placeholder image -->
                                    <div class="w-full h-full bg-[#8b0000] opacity-20"></div>
                                </div>
                                <span class="text-gray-700 line-clamp-1">Vòng tay Đá Thạch Anh Hồng</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 font-medium text-[#8b0000]">1.250.000đ</td>
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                Hoàn thành
                            </span>
                        </td>
                    </tr>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 font-medium text-gray-900">#DH89102</td>
                        <td class="py-4 px-4 text-gray-500">02/05/2026</td>
                        <td class="py-4 px-4">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded bg-gray-100 mr-3 overflow-hidden">
                                    <div class="w-full h-full bg-[#8b0000] opacity-20"></div>
                                </div>
                                <span class="text-gray-700 line-clamp-1">Vòng tay Tỳ Hưu Vàng 24K</span>
                            </div>
                        </td>
                        <td class="py-4 px-4 font-medium text-[#8b0000]">3.500.000đ</td>
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                Đang giao
                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
