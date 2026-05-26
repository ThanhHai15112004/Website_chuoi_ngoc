<!-- Quick View Panel (Right Slide-in) -->
<div id="quickViewPanel" class="fixed inset-y-0 right-0 z-50 w-full md:w-[480px] bg-white shadow-[-10px_0_30px_rgba(0,0,0,0.1)] translate-x-full transition-transform duration-300 flex flex-col hidden">
    <!-- Panel Header -->
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between shrink-0 bg-[#FAF8F5]">
        <div class="flex items-center gap-3">
            <h3 class="font-bold text-xl text-[#6B0D18] tracking-tight" id="qvOrderCode">#DH202600123</h3>
            <span id="qvOrderStatus" class="text-[11px] font-bold px-2.5 py-1 rounded-full border bg-red-50 text-[#6B0D18] border-red-200">Chờ xác nhận</span>
        </div>
        <button onclick="closeQuickView()" class="text-gray-400 hover:text-gray-700 transition-colors p-1.5 rounded-xl hover:bg-gray-200 bg-white shadow-sm">
            <span class="iconify text-xl" data-icon="mdi:close"></span>
        </button>
    </div>
    
    <!-- Panel Content -->
    <div class="flex-1 overflow-y-auto p-6 space-y-6">
        <!-- Khách hàng & Giao hàng -->
        <div class="bg-gray-50/50 rounded-2xl p-4 border border-gray-100 space-y-4">
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center shrink-0">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:account-circle-outline"></span>
                </div>
                <div>
                    <div class="font-bold text-gray-900" id="qvCustomerName">Nguyễn Văn An</div>
                    <div class="text-sm text-gray-500 mt-0.5" id="qvCustomerPhone">0901234567</div>
                </div>
            </div>
            <div class="h-px w-full bg-gray-200"></div>
            <div class="flex items-start gap-3">
                <div class="w-10 h-10 rounded-full bg-white shadow-sm flex items-center justify-center shrink-0">
                    <span class="iconify text-gray-400 text-xl" data-icon="mdi:map-marker-outline"></span>
                </div>
                <div class="text-sm text-gray-700 leading-relaxed">
                    123 Đường Nguyễn Trãi, Phường 2, Quận 5, TP.HCM
                </div>
            </div>
        </div>

        <!-- Sản phẩm -->
        <div>
            <h4 class="font-bold text-gray-900 mb-3 flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:package-variant"></span> Sản phẩm
            </h4>
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 rounded-xl bg-emerald-50 text-emerald-700 flex items-center justify-center font-bold text-xl shadow-sm shrink-0 border border-emerald-100">NB</div>
                    <div class="flex-1 min-w-0">
                        <div class="font-medium text-gray-900 truncate">Vòng Ngọc Bích Tài Lộc</div>
                        <div class="text-xs text-gray-500 mt-0.5">Size: 16cm</div>
                    </div>
                    <div class="text-right shrink-0">
                        <div class="font-bold text-[#6B0D18]">850.000đ</div>
                        <div class="text-xs text-gray-500">x1</div>
                    </div>
                </div>
                <!-- Sp 2 -->
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center font-bold text-xl shadow-sm shrink-0 border border-amber-100">TH</div>
                    <div class="flex-1 min-w-0">
                        <div class="font-medium text-gray-900 truncate">Nhẫn Tỳ Hưu Mạ Vàng</div>
                        <div class="text-xs text-gray-500 mt-0.5">Size: 10</div>
                    </div>
                    <div class="text-right shrink-0">
                        <div class="font-bold text-[#6B0D18]">450.000đ</div>
                        <div class="text-xs text-gray-500">x1</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ghi chú nội bộ -->
        <div class="bg-yellow-50/50 rounded-2xl p-4 border border-yellow-100">
            <h4 class="font-bold text-yellow-800 text-sm mb-2 flex items-center gap-1.5">
                <span class="iconify" data-icon="mdi:note-edit-outline"></span> Ghi chú nội bộ (Khách không thấy)
            </h4>
            <textarea class="w-full bg-white border border-yellow-200 rounded-xl p-3 text-sm focus:outline-none focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 placeholder-yellow-300 resize-none" rows="3" placeholder="Nhập ghi chú cho nhân viên kho / đóng gói..."></textarea>
            <button class="mt-2 px-3 py-1.5 bg-yellow-100 text-yellow-800 hover:bg-yellow-200 rounded-lg text-xs font-bold transition-colors">Lưu ghi chú</button>
        </div>
    </div>

    <!-- Panel Footer -->
    <div class="px-6 py-4 border-t border-gray-100 flex flex-col gap-3 shrink-0 bg-white">
        <div class="flex items-center justify-between">
            <span class="text-gray-500 text-sm">Tổng thanh toán</span>
            <span class="font-bold text-xl text-[#6B0D18]">1.360.000đ</span>
        </div>
        <div class="flex items-center gap-2">
            <a href="#" id="qvFullDetailLink" class="flex-1 px-4 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 font-medium text-sm transition-colors text-center shadow-sm">
                Xem chi tiết đầy đủ
            </a>
            <button onclick="openConfirmModal('DH202600123', 'Nguyễn Văn An')" class="flex-1 px-4 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] font-medium text-sm transition-colors text-center shadow-sm">
                Xác nhận đơn
            </button>
        </div>
    </div>
</div>

<!-- Modal Overlay cho Quick View -->
<div id="qvOverlay" class="fixed inset-0 bg-gray-900/40 backdrop-blur-sm z-40 hidden opacity-0 transition-opacity duration-300" onclick="closeQuickView()"></div>
