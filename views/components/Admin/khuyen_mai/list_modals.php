<!-- MODALS -->

<!-- Delete Modal -->
<div id="deletePromoModal" class="fixed inset-0 bg-black/60 z-[60] flex items-center justify-center hidden opacity-0 transition-opacity duration-300 backdrop-blur-sm">
    <div class="bg-white rounded-2xl shadow-xl w-[420px] max-w-[90%] transform scale-95 transition-transform duration-300 p-6 flex flex-col items-center text-center">
        <div class="w-16 h-16 rounded-full bg-red-100 text-red-600 flex items-center justify-center mb-4">
            <span class="iconify text-3xl" data-icon="mdi:delete-alert-outline"></span>
        </div>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Xác nhận xóa chương trình</h3>
        <p class="text-gray-600 text-sm mb-2">Bạn có chắc muốn xóa chương trình <strong class="text-gray-900" id="del-promo-code">CODE</strong>?</p>
        
        <p class="text-amber-700 text-[13px] bg-amber-50 p-3 rounded-lg border border-amber-200 hidden w-full text-left" id="promo-delete-warning">
            <span class="iconify inline-block text-amber-500 mr-1" data-icon="mdi:alert"></span>
            Chương trình này <strong>đã phát sinh đơn hàng</strong>. Bạn nên <strong class="text-amber-800">Tắt chương trình</strong> thay vì xóa để giữ dữ liệu báo cáo chính xác.
        </p>
        
        <div class="flex flex-col sm:flex-row gap-3 w-full mt-6">
            <button onclick="closeDeletePromoModal()" class="flex-1 px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors font-medium text-sm">Hủy</button>
            <button id="btn-pause-instead" class="hidden flex-1 px-4 py-2.5 bg-amber-50 border border-amber-200 text-amber-700 rounded-lg hover:bg-amber-100 transition-colors font-medium text-sm" onclick="pauseInstead()">Tắt thay thế</button>
            <button onclick="executeDeletePromo()" class="flex-1 px-4 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors font-medium text-sm shadow-md shadow-red-600/20">Xóa luôn</button>
        </div>
    </div>
</div>

<!-- Details Drawer -->
<div id="detailsPromoDrawer" class="fixed inset-0 z-[60] hidden">
    <div class="absolute inset-0 bg-black/50 opacity-0 transition-opacity duration-300" onclick="closePromoDetails()"></div>
    <div class="absolute right-0 top-0 bottom-0 w-[450px] max-w-full bg-white shadow-2xl transform translate-x-full transition-transform duration-300 flex flex-col">
        <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/80">
            <h3 class="text-lg font-bold text-gray-800 font-luxury flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:information-outline"></span> Chi tiết chương trình
            </h3>
            <button onclick="closePromoDetails()" class="text-gray-400 hover:text-gray-600 transition-colors"><span class="iconify text-xl" data-icon="mdi:close"></span></button>
        </div>
        
        <div class="p-6 overflow-y-auto flex-1 space-y-6">
            <div>
                <h4 class="text-xl font-bold text-gray-800 mb-1" id="det-name">Flash Sale Vòng Ngọc</h4>
                <div class="flex items-center gap-2">
                    <span class="text-sm font-mono text-gray-500 bg-gray-100 px-2 py-0.5 rounded" id="det-code">FLASH-T5</span>
                    <span class="inline-flex px-2 py-0.5 rounded text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 uppercase tracking-wider" id="det-status">Đang diễn ra</span>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <div class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Loại khuyến mãi</div>
                    <div class="font-bold text-gray-800" id="det-type">Flash Sale</div>
                </div>
                <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                    <div class="text-[11px] text-gray-500 uppercase tracking-wider mb-1">Thời gian</div>
                    <div class="font-bold text-gray-800 text-sm" id="det-time">01/05 - 31/05/2026</div>
                </div>
            </div>

            <div>
                <div class="text-sm font-bold text-gray-800 mb-3 border-b border-gray-100 pb-2">Hiệu quả chương trình</div>
                <div class="space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Đã bán</span>
                        <span class="font-bold text-gray-800">45 / 100 <span class="text-xs font-normal text-gray-500">sp</span></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Doanh thu mang lại</span>
                        <span class="font-bold text-[#6B0D18]">30.600.000đ</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-600">Tổng tiền đã giảm</span>
                        <span class="font-bold text-amber-600">7.650.000đ</span>
                    </div>
                </div>
            </div>
            
            <div id="det-products-container">
                <div class="text-sm font-bold text-gray-800 mb-3 border-b border-gray-100 pb-2">Sản phẩm áp dụng (1)</div>
                <div class="flex items-center gap-3 p-3 border border-gray-100 rounded-lg">
                    <img src="<?= APP_URL ?>/public/images/Sản phẩm/Vòng Ngọc/Mã Não Hồng Bưởi/ma-nao-hong-buoi-1.jpg" class="w-12 h-12 rounded object-cover">
                    <div class="flex-1">
                        <div class="font-medium text-gray-800 text-sm line-clamp-1">Vòng Ngọc Bích Tài Lộc</div>
                        <div class="text-xs text-gray-500 mt-1">850.000đ <span class="iconify inline text-[10px]" data-icon="mdi:arrow-right"></span> <strong class="text-[#6B0D18]">680.000đ</strong></div>
                    </div>
                </div>
            </div>
            
            <div class="text-xs text-gray-400 mt-4" id="det-creator">
                Người tạo: Hải Admin - 01/05/2026 09:00
            </div>
        </div>
        
        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex gap-3">
            <a href="<?= APP_URL ?>/admin/khuyen-mai/sua" class="flex-1 text-center px-4 py-2.5 bg-white border border-[#6B0D18] text-[#6B0D18] rounded-lg hover:bg-red-50 transition-colors font-medium text-sm">Chỉnh sửa</a>
        </div>
    </div>
</div>

<!-- Toast -->
<div id="promoToast" class="fixed bottom-6 right-6 bg-white border-l-4 border-emerald-500 shadow-xl rounded-lg p-4 flex items-start gap-3 transform translate-y-20 opacity-0 transition-all duration-300 z-[70]">
    <div class="text-emerald-500 mt-0.5"><span class="iconify text-xl" data-icon="mdi:check-circle"></span></div>
    <div>
        <h4 class="text-sm font-bold text-gray-800">Thành công!</h4>
        <p class="text-sm text-gray-600 mt-0.5" id="promo-toast-msg">Thao tác thành công.</p>
    </div>
    <button onclick="hidePromoToast()" class="text-gray-400 hover:text-gray-600 ml-4"><span class="iconify" data-icon="mdi:close"></span></button>
</div>

