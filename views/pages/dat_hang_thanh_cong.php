<div class="bg-slate-50 min-h-screen pt-24 pb-32 md:pt-32 md:pb-20 px-4 sm:px-6">
    <div class="container mx-auto max-w-4xl font-sans">
        
    <!-- Success Header -->
    <div class="text-center mb-10">
        <div class="inline-flex items-center justify-center w-24 h-24 rounded-full bg-red-50 text-[#8B0000] mb-6 shadow-sm border border-red-100 relative">
            <iconify-icon icon="mdi:check-circle" class="text-5xl"></iconify-icon>
            <div class="absolute -top-1 -right-2 text-[#D4AF37] text-2xl animate-pulse"><iconify-icon icon="mdi:star-four-points"></iconify-icon></div>
            <div class="absolute bottom-0 -left-2 text-[#D4AF37] text-xl animate-bounce"><iconify-icon icon="mdi:sparkles"></iconify-icon></div>
        </div>
        <h1 class="text-3xl font-serif text-[#8B0000] mb-3">Đặt Hàng Thành Công!</h1>
        <p class="text-gray-600 text-lg">Cảm ơn bạn đã tin tưởng và lựa chọn Chuỗi Ngọc.</p>
        <p class="text-gray-500 mt-2">Mã đơn hàng của bạn là: <span class="font-bold text-[#8B0000] text-xl"><?= $order_info['ma_don_hang'] ?></span></p>
    </div>

    <!-- Main Receipt Container -->
    <div class="bg-white rounded-t-2xl shadow-sm border border-gray-100 overflow-hidden relative">
        <!-- Receipt Top Decoration -->
        <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-[#8B0000] to-[#D4AF37]"></div>
        
        <div class="p-6 sm:p-10">
            <!-- Order Status Tracker -->
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
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Shipping Info -->
                <div>
                    <h3 class="text-lg font-serif text-[#8B0000] border-b border-gray-100 pb-2 mb-4 flex items-center">
                        <iconify-icon icon="mdi:map-marker-radius" class="mr-2 text-[#D4AF37] text-xl"></iconify-icon> Thông tin nhận hàng
                    </h3>
                    <div class="space-y-3 text-gray-700 text-sm sm:text-base">
                        <p><span class="text-gray-500 w-24 inline-block">Người nhận:</span> <span class="font-medium"><?= htmlspecialchars($order_info['nguoi_nhan']['ho_ten']) ?></span></p>
                        <p><span class="text-gray-500 w-24 inline-block">Điện thoại:</span> <span class="font-medium"><?= htmlspecialchars($order_info['nguoi_nhan']['so_dien_thoai']) ?></span></p>
                        <p class="flex items-start">
                            <span class="text-gray-500 w-24 inline-block flex-shrink-0 mt-0.5">Địa chỉ:</span> 
                            <span><?= htmlspecialchars($order_info['nguoi_nhan']['dia_chi']) ?></span>
                        </p>
                        <p class="pt-2 border-t border-gray-50 mt-2"><span class="text-gray-500 w-24 inline-block">Thanh toán:</span> <span class="text-[#8B0000] font-medium bg-red-50 px-2 py-1 rounded text-sm inline-block mt-1 sm:mt-0"><?= htmlspecialchars($order_info['phuong_thuc_thanh_toan']) ?></span></p>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="bg-stone-50 rounded-xl p-5 border border-stone-100 shadow-inner">
                    <h3 class="text-lg font-serif text-[#8B0000] border-b border-stone-200 pb-2 mb-4 flex items-center">
                        <iconify-icon icon="mdi:receipt-text-outline" class="mr-2 text-[#D4AF37] text-xl"></iconify-icon> Tóm tắt thanh toán
                    </h3>
                    <div class="space-y-3 text-sm text-gray-600">
                        <div class="flex justify-between">
                            <span>Tạm tính</span>
                            <span class="font-medium text-gray-800"><?= number_format($order_info['tong_tien'], 0, ',', '.') ?>đ</span>
                        </div>
                        <div class="flex justify-between">
                            <span>Phí vận chuyển</span>
                            <span class="font-medium text-gray-800"><?= number_format($order_info['phi_van_chuyen'], 0, ',', '.') ?>đ</span>
                        </div>
                        <div class="flex justify-between text-[#8B0000]">
                            <span>Giảm giá</span>
                            <span class="font-medium">-<?= number_format($order_info['giam_gia'], 0, ',', '.') ?>đ</span>
                        </div>
                        <div class="pt-3 mt-3 border-t border-stone-200 flex justify-between items-center">
                            <span class="font-medium text-gray-800 uppercase tracking-wider text-xs">Tổng cộng</span>
                            <span class="font-bold text-2xl text-[#8B0000]"><?= number_format($order_info['thanh_toan'], 0, ',', '.') ?>đ</span>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    <!-- Receipt Bottom Decoration -->
    <div class="h-6 w-full flex mb-8">
        <?php for($i = 0; $i < 40; $i++): ?>
        <div class="h-full flex-1 bg-white relative">
            <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-6 h-6 bg-slate-50 rounded-full"></div>
        </div>
        <?php endfor; ?>
    </div>
    
    <!-- Next Steps Info Box -->
    <div class="bg-amber-50 rounded-xl p-6 mb-8 border border-amber-100 flex flex-col sm:flex-row items-start gap-4 shadow-sm">
        <div class="text-[#D4AF37] text-3xl mt-1 flex-shrink-0 hidden sm:block">
            <iconify-icon icon="mdi:bell-ring" class="animate-wiggle"></iconify-icon>
        </div>
        <div>
            <h4 class="font-serif text-lg text-[#8B0000] mb-2 flex items-center">
                <iconify-icon icon="mdi:bell-ring" class="text-[#D4AF37] mr-2 sm:hidden animate-wiggle"></iconify-icon> Bước tiếp theo:
            </h4>
            <ul class="space-y-2 text-gray-700 text-sm">
                <li class="flex items-start">
                    <iconify-icon icon="mdi:circle-small" class="text-lg text-[#D4AF37] mt-0.5 mr-1 flex-shrink-0"></iconify-icon>
                    <span>Chúng tôi sẽ liên hệ với bạn qua số điện thoại <strong class="text-gray-900"><?= htmlspecialchars($order_info['nguoi_nhan']['so_dien_thoai']) ?></strong> trong vòng 24h để xác nhận đơn hàng.</span>
                </li>
                <li class="flex items-start">
                    <iconify-icon icon="mdi:circle-small" class="text-lg text-[#D4AF37] mt-0.5 mr-1 flex-shrink-0"></iconify-icon>
                    <span>Bạn có thể theo dõi trạng thái đơn hàng trong phần <strong class="text-gray-900">Đơn hàng của tôi</strong>.</span>
                </li>
                <?php if($order_info['phuong_thuc_thanh_toan'] == 'Chuyển khoản ngân hàng'): ?>
                <li class="flex items-start bg-white p-3 rounded-md border border-amber-200 mt-3 shadow-sm">
                    <iconify-icon icon="mdi:bank" class="text-[#8B0000] mt-0.5 mr-2 flex-shrink-0 text-lg"></iconify-icon>
                    <span class="text-[#8B0000]">
                        Vui lòng chuyển khoản với nội dung: <br class="sm:hidden"/>
                        <strong class="font-mono bg-red-50 text-[#8B0000] px-3 py-1 rounded border border-red-100 text-base shadow-inner inline-block my-1"><?= $order_info['ma_don_hang'] ?></strong> 
                        <br class="sm:hidden"/> để chúng tôi tiến hành gửi hàng sớm nhất.
                    </span>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <!-- Call to Actions -->
    <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
        <a href="<?= APP_URL ?>/" class="w-full sm:w-auto px-8 py-3 bg-white border-2 border-[#8B0000] text-[#8B0000] font-semibold rounded-full hover:bg-[#8B0000] hover:text-white transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 text-center flex items-center justify-center">
            <iconify-icon icon="mdi:arrow-left" class="mr-2 text-lg"></iconify-icon> Tiếp tục mua sắm
        </a>
        <a href="#" class="w-full sm:w-auto px-8 py-3 bg-white border-2 border-[#8B0000] text-[#8B0000] font-semibold rounded-full hover:bg-[#8B0000] hover:text-white transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 text-center flex items-center justify-center">
            Xem chi tiết đơn hàng <iconify-icon icon="mdi:arrow-right" class="ml-2 text-lg"></iconify-icon>
        </a>
    </div>
    </div>
</div>

<style>
/* Custom animations */
@keyframes wiggle {
    0%, 100% { transform: rotate(-5deg); }
    50% { transform: rotate(5deg); }
}
.animate-wiggle {
    animation: wiggle 1s ease-in-out infinite;
}
</style>
