<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4 sm:p-6 lg:p-8">
    
    <!-- Tiêu đề & Thanh tìm kiếm -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-6">
        <div class="shrink-0">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Hộp thư & Thông báo</h2>
            <p class="text-gray-500 mt-1 text-sm">Cập nhật tin tức, khuyến mãi và trạng thái đơn hàng của bạn.</p>
        </div>
        <div class="relative w-full sm:w-56 sm:max-w-[220px]">
            <input type="text" placeholder="Tìm kiếm thông báo..." 
                   class="w-full pl-10 pr-4 py-2.5 rounded-lg border border-gray-300 focus:outline-none focus:border-[#8b0000] focus:ring-1 focus:ring-[#8b0000] text-sm transition-colors">
            <iconify-icon icon="ph:magnifying-glass-bold" class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-lg"></iconify-icon>
        </div>
    </div>

    <!-- Bộ lọc loại thông báo (Pills) -->
    <div class="flex items-center gap-2 overflow-x-auto pb-3 mb-4 scrollbar-hide -mx-4 px-4 sm:mx-0 sm:px-0">
        <button class="whitespace-nowrap px-4 py-1.5 rounded-full text-sm font-medium transition-colors bg-[#8b0000] text-white border border-[#8b0000]">
            Tất cả
        </button>
        <button class="whitespace-nowrap px-4 py-1.5 rounded-full text-sm font-medium transition-colors bg-white text-gray-600 border border-gray-300 hover:border-[#8b0000] hover:text-[#8b0000]">
            Đơn hàng <span class="ml-1 bg-red-100 text-red-600 py-0.5 px-1.5 rounded-full text-[10px]">1</span>
        </button>
        <button class="whitespace-nowrap px-4 py-1.5 rounded-full text-sm font-medium transition-colors bg-white text-gray-600 border border-gray-300 hover:border-[#8b0000] hover:text-[#8b0000]">
            Voucher <span class="ml-1 bg-red-100 text-red-600 py-0.5 px-1.5 rounded-full text-[10px]">1</span>
        </button>
        <button class="whitespace-nowrap px-4 py-1.5 rounded-full text-sm font-medium transition-colors bg-white text-gray-600 border border-gray-300 hover:border-[#8b0000] hover:text-[#8b0000]">
            Khuyến mãi
        </button>
        <button class="whitespace-nowrap px-4 py-1.5 rounded-full text-sm font-medium transition-colors bg-white text-gray-600 border border-gray-300 hover:border-[#8b0000] hover:text-[#8b0000]">
            Hệ thống
        </button>
        <button class="whitespace-nowrap px-4 py-1.5 rounded-full text-sm font-medium transition-colors bg-white text-gray-600 border border-gray-300 hover:border-[#8b0000] hover:text-[#8b0000]">
            Admin <span class="ml-1 bg-red-100 text-red-600 py-0.5 px-1.5 rounded-full text-[10px]">1</span>
        </button>
    </div>

    <!-- Trạng thái & Thao tác hàng loạt -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 py-3 border-b border-gray-100 mb-6">
        
        <!-- Status Tabs -->
        <div class="flex gap-6">
            <button class="text-sm font-semibold text-[#8b0000] border-b-2 border-[#8b0000] pb-2 -mb-[13px]">
                Tất cả
            </button>
            <button class="text-sm font-medium text-gray-500 hover:text-gray-900 pb-2 -mb-[13px] border-b-2 border-transparent transition-colors">
                Chưa đọc (3)
            </button>
            <button class="text-sm font-medium text-gray-500 hover:text-gray-900 pb-2 -mb-[13px] border-b-2 border-transparent transition-colors">
                Đã đọc
            </button>
        </div>

        <!-- Bulk Actions -->
        <div class="flex items-center justify-between sm:justify-end gap-4">
            <label class="flex items-center gap-2 cursor-pointer group">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#8b0000] focus:ring-[#8b0000]">
                <span class="text-sm text-gray-600 group-hover:text-gray-900">Chọn tất cả</span>
            </label>
            <div class="h-4 w-px bg-gray-300 hidden sm:block"></div>
            <div class="flex items-center gap-3">
                <button class="text-sm font-medium text-gray-600 hover:text-[#8b0000] flex items-center gap-1 transition-colors" title="Đánh dấu đã đọc">
                    <iconify-icon icon="ph:check-circle-bold" class="text-lg"></iconify-icon>
                    <span class="hidden sm:inline">Đã đọc</span>
                </button>
                <button class="text-sm font-medium text-gray-600 hover:text-red-600 flex items-center gap-1 transition-colors" title="Xóa đã chọn">
                    <iconify-icon icon="ph:trash-bold" class="text-lg"></iconify-icon>
                    <span class="hidden sm:inline">Xóa</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Danh sách thông báo -->
    <div class="space-y-3">
        
        <!-- Item Chưa đọc: Đơn hàng -->
        <div class="relative group bg-red-50/40 hover:bg-red-50 border border-red-100 rounded-xl p-4 transition-colors flex gap-4 items-start sm:items-center">
            <div class="pt-1 sm:pt-0">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#8b0000] focus:ring-[#8b0000]">
            </div>
            
            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center shrink-0">
                <iconify-icon icon="ph:package-bold" class="text-xl"></iconify-icon>
            </div>
            
            <div class="flex-1 min-w-0 pr-10 sm:pr-24">
                <div class="flex items-center gap-2 mb-1">
                    <h3 class="font-bold text-gray-900 truncate">Đơn hàng #DH89234 đang được giao</h3>
                    <span class="w-2 h-2 rounded-full bg-red-500 shrink-0"></span>
                </div>
                <p class="text-sm text-gray-600 line-clamp-2 sm:line-clamp-1">Kiện hàng của bạn đang được shipper giao đến. Vui lòng chú ý điện thoại để nhận hàng nhé.</p>
                <div class="flex items-center gap-4 mt-2">
                    <span class="text-xs text-gray-400">10 phút trước</span>
                    <a href="<?= APP_URL ?>/tai-khoan#tab-don-hang" class="text-xs font-semibold text-[#8b0000] hover:underline flex items-center gap-1">
                        Xem đơn hàng
                        <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
                    </a>
                </div>
            </div>

            <!-- Nút xóa (Hiển thị khi hover) -->
            <button class="absolute right-4 top-4 sm:top-1/2 sm:-translate-y-1/2 p-2 rounded-lg text-gray-400 hover:text-red-600 hover:bg-white transition-all opacity-100 lg:opacity-0 lg:group-hover:opacity-100">
                <iconify-icon icon="ph:trash-bold" class="text-lg"></iconify-icon>
            </button>
        </div>

        <!-- Item Chưa đọc: Voucher/Khuyến mãi -->
        <div class="relative group bg-red-50/40 hover:bg-red-50 border border-red-100 rounded-xl p-4 transition-colors flex gap-4 items-start sm:items-center">
            <div class="pt-1 sm:pt-0">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#8b0000] focus:ring-[#8b0000]">
            </div>
            
            <div class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center shrink-0">
                <iconify-icon icon="ph:ticket-bold" class="text-xl"></iconify-icon>
            </div>
            
            <div class="flex-1 min-w-0 pr-10 sm:pr-24">
                <div class="flex items-center gap-2 mb-1">
                    <h3 class="font-bold text-gray-900 truncate">Bạn nhận được Voucher 50K!</h3>
                    <span class="w-2 h-2 rounded-full bg-red-500 shrink-0"></span>
                </div>
                <p class="text-sm text-gray-600 line-clamp-2 sm:line-clamp-1">Chúc mừng bạn đã thăng hạng Gold! Tặng bạn voucher giảm 50K áp dụng cho đơn hàng từ 500K.</p>
                <div class="flex items-center gap-4 mt-2">
                    <span class="text-xs text-gray-400">2 giờ trước</span>
                    <a href="<?= APP_URL ?>/tai-khoan#tab-voucher" class="text-xs font-semibold text-[#8b0000] hover:underline flex items-center gap-1">
                        Dùng ngay
                        <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
                    </a>
                </div>
            </div>

            <button class="absolute right-4 top-4 sm:top-1/2 sm:-translate-y-1/2 p-2 rounded-lg text-gray-400 hover:text-red-600 hover:bg-white transition-all opacity-100 lg:opacity-0 lg:group-hover:opacity-100">
                <iconify-icon icon="ph:trash-bold" class="text-lg"></iconify-icon>
            </button>
        </div>

        <!-- Item Chưa đọc: Admin -->
        <div class="relative group bg-red-50/40 hover:bg-red-50 border border-red-100 rounded-xl p-4 transition-colors flex gap-4 items-start sm:items-center">
            <div class="pt-1 sm:pt-0">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#8b0000] focus:ring-[#8b0000]">
            </div>
            
            <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center shrink-0">
                <iconify-icon icon="ph:megaphone-bold" class="text-xl"></iconify-icon>
            </div>
            
            <div class="flex-1 min-w-0 pr-10 sm:pr-24">
                <div class="flex items-center gap-2 mb-1">
                    <h3 class="font-bold text-gray-900 truncate">Cập nhật chính sách đổi trả mới</h3>
                    <span class="w-2 h-2 rounded-full bg-red-500 shrink-0"></span>
                </div>
                <p class="text-sm text-gray-600 line-clamp-2 sm:line-clamp-1">Từ ngày 01/06, Chuỗi Ngọc Phong Thủy áp dụng chính sách hỗ trợ đổi trả miễn phí trong 7 ngày đối với lỗi do nhà sản xuất.</p>
                <div class="flex items-center gap-4 mt-2">
                    <span class="text-xs text-gray-400">Hôm qua</span>
                    <a href="#" class="text-xs font-semibold text-[#8b0000] hover:underline flex items-center gap-1">
                        Xem chi tiết
                        <iconify-icon icon="ph:arrow-right-bold"></iconify-icon>
                    </a>
                </div>
            </div>

            <button class="absolute right-4 top-4 sm:top-1/2 sm:-translate-y-1/2 p-2 rounded-lg text-gray-400 hover:text-red-600 hover:bg-white transition-all opacity-100 lg:opacity-0 lg:group-hover:opacity-100">
                <iconify-icon icon="ph:trash-bold" class="text-lg"></iconify-icon>
            </button>
        </div>

        <!-- Item Đã đọc -->
        <div class="relative group bg-white hover:bg-gray-50 border border-gray-200 rounded-xl p-4 transition-colors flex gap-4 items-start sm:items-center opacity-75 hover:opacity-100">
            <div class="pt-1 sm:pt-0">
                <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-[#8b0000] focus:ring-[#8b0000]">
            </div>
            
            <div class="w-10 h-10 rounded-full bg-gray-100 text-gray-500 flex items-center justify-center shrink-0">
                <iconify-icon icon="ph:check-circle-bold" class="text-xl"></iconify-icon>
            </div>
            
            <div class="flex-1 min-w-0 pr-10 sm:pr-24">
                <div class="flex items-center gap-2 mb-1">
                    <h3 class="font-medium text-gray-700 truncate">Xác nhận đơn hàng thành công</h3>
                </div>
                <p class="text-sm text-gray-500 line-clamp-2 sm:line-clamp-1">Đơn hàng #DH89102 của bạn đã được xác nhận và đang trong quá trình đóng gói.</p>
                <div class="flex items-center gap-4 mt-2">
                    <span class="text-xs text-gray-400">02/05/2026 14:30</span>
                </div>
            </div>

            <button class="absolute right-4 top-4 sm:top-1/2 sm:-translate-y-1/2 p-2 rounded-lg text-gray-400 hover:text-red-600 hover:bg-white transition-all opacity-100 lg:opacity-0 lg:group-hover:opacity-100">
                <iconify-icon icon="ph:trash-bold" class="text-lg"></iconify-icon>
            </button>
        </div>

    </div>
    
    <!-- Phân trang / Tải thêm -->
    <div class="mt-8 text-center">
        <button class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full border border-gray-300 text-sm font-semibold text-gray-700 hover:border-[#8b0000] hover:text-[#8b0000] transition-colors">
            Xem thêm thông báo cũ hơn
            <iconify-icon icon="ph:caret-down-bold"></iconify-icon>
        </button>
    </div>

    <!-- Empty State (Ví dụ khi không có thông báo, có thể ẩn đi bằng class hidden) -->
    <div class="hidden flex-col items-center justify-center py-16 text-center">
        <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mb-4">
            <iconify-icon icon="ph:bell-slash-duotone" class="text-5xl text-gray-300"></iconify-icon>
        </div>
        <h3 class="text-lg font-bold text-gray-900 mb-1">Không có thông báo nào</h3>
        <p class="text-sm text-gray-500 max-w-sm">Hiện tại bạn chưa có thông báo nào trong hộp thư. Hãy tiếp tục mua sắm để nhận các cập nhật mới nhất nhé!</p>
        <a href="<?= APP_URL ?>/san-pham" class="mt-6 inline-flex items-center gap-2 px-6 py-2.5 rounded-full text-sm font-semibold text-white bg-[#8b0000] hover:bg-[#7a0000] transition-colors">
            Tiếp tục mua sắm
        </a>
    </div>

</div>

<style>
/* Ẩn scrollbar cho thẻ container các nút filter ngang */
.scrollbar-hide::-webkit-scrollbar {
    display: none;
}
.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}
</style>
