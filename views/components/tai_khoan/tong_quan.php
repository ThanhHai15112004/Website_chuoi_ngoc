<div class="bg-white rounded-2xl shadow-sm p-6 lg:p-10">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-bold text-gray-900">Tổng quan tài khoản</h2>
    </div>

    <!-- User Info & Membership Card -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Personal Info -->
        <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
            <div class="flex items-start justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-900">Thông tin cá nhân</h3>
                <button class="text-sm text-[#8b0000] font-medium hover:underline flex items-center gap-1" onclick="document.querySelector('[data-target=\'tab-ho-so\']').click()">
                    <iconify-icon icon="ph:pencil-simple"></iconify-icon> Chỉnh sửa
                </button>
            </div>
            <div class="space-y-4">
                <div class="flex items-center text-gray-600">
                    <iconify-icon icon="ph:user" class="text-xl mr-3 text-gray-400"></iconify-icon>
                    <span class="font-medium text-gray-800">Nguyễn Văn A</span>
                </div>
                <div class="flex items-center text-gray-600">
                    <iconify-icon icon="ph:envelope-simple" class="text-xl mr-3 text-gray-400"></iconify-icon>
                    <span>nguyenvana@example.com</span>
                </div>
                <div class="flex items-center text-gray-600">
                    <iconify-icon icon="ph:phone" class="text-xl mr-3 text-gray-400"></iconify-icon>
                    <span>0901234567</span>
                </div>
            </div>
        </div>

        <!-- Membership Status -->
        <div class="bg-gradient-to-br from-yellow-50 via-amber-100 to-yellow-200 rounded-2xl p-6 border border-yellow-300 relative overflow-hidden shadow-sm">
            <!-- Decorative Elements -->
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-yellow-300 opacity-30 rounded-full blur-2xl"></div>
            <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-24 h-24 bg-amber-400 opacity-30 rounded-full blur-2xl"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Hạng thành viên</h3>
                    <iconify-icon icon="ph:crown-simple-fill" class="text-3xl text-yellow-600 drop-shadow-md"></iconify-icon>
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
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm text-center cursor-pointer hover:shadow-md hover:-translate-y-1 transition-all duration-300" onclick="document.querySelector('[data-target=\'tab-don-hang\']').click()">
            <div class="w-14 h-14 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mx-auto mb-3">
                <iconify-icon icon="ph:package" class="text-2xl"></iconify-icon>
            </div>
            <div class="text-2xl font-bold text-gray-900">12</div>
            <div class="text-xs text-gray-500 uppercase tracking-wider font-medium mt-1">Đơn hàng</div>
        </div>
        
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm text-center cursor-pointer hover:shadow-md hover:-translate-y-1 transition-all duration-300" onclick="document.querySelector('[data-target=\'tab-voucher\']').click()">
            <div class="w-14 h-14 rounded-full bg-green-50 text-green-600 flex items-center justify-center mx-auto mb-3">
                <iconify-icon icon="ph:ticket" class="text-2xl"></iconify-icon>
            </div>
            <div class="text-2xl font-bold text-gray-900">3</div>
            <div class="text-xs text-gray-500 uppercase tracking-wider font-medium mt-1">Voucher</div>
        </div>
        
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm text-center cursor-pointer hover:shadow-md hover:-translate-y-1 transition-all duration-300" onclick="document.querySelector('[data-target=\'tab-yeu-thich\']').click()">
            <div class="w-14 h-14 rounded-full bg-red-50 text-red-600 flex items-center justify-center mx-auto mb-3">
                <iconify-icon icon="ph:heart" class="text-2xl"></iconify-icon>
            </div>
            <div class="text-2xl font-bold text-gray-900">8</div>
            <div class="text-xs text-gray-500 uppercase tracking-wider font-medium mt-1">Yêu thích</div>
        </div>
        
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm text-center cursor-pointer hover:shadow-md hover:-translate-y-1 transition-all duration-300" onclick="document.querySelector('[data-target=\'tab-hop-thu\']').click()">
            <div class="w-14 h-14 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center mx-auto mb-3 relative">
                <iconify-icon icon="ph:bell" class="text-2xl"></iconify-icon>
                <span class="absolute top-1 right-1 w-3.5 h-3.5 bg-red-500 rounded-full border-2 border-white"></span>
            </div>
            <div class="text-2xl font-bold text-gray-900">2</div>
            <div class="text-xs text-gray-500 uppercase tracking-wider font-medium mt-1">Thông báo</div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div>
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-900">Đơn hàng gần đây</h3>
            <button class="text-sm text-[#8b0000] font-medium hover:underline flex items-center gap-1" onclick="document.querySelector('[data-target=\'tab-don-hang\']').click()">Xem tất cả <iconify-icon icon="ph:caret-right"></iconify-icon></button>
        </div>
        
        <div class="overflow-x-auto rounded-2xl border border-gray-100 shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-100">
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
                                <div class="w-12 h-12 rounded-xl bg-gray-100 mr-4 overflow-hidden">
                                    <!-- Placeholder image -->
                                    <div class="w-full h-full bg-[#8b0000] opacity-20"></div>
                                </div>
                                <span class="text-gray-800 font-medium line-clamp-1">Vòng tay Đá Thạch Anh Hồng</span>
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
                                <div class="w-12 h-12 rounded-xl bg-gray-100 mr-4 overflow-hidden">
                                    <div class="w-full h-full bg-[#8b0000] opacity-20"></div>
                                </div>
                                <span class="text-gray-800 font-medium line-clamp-1">Vòng tay Tỳ Hưu Vàng 24K</span>
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
