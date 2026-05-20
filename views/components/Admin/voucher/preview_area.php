        <!-- Preview Area (Right Side) -->
        <div class="w-full xl:w-96 flex flex-col gap-6">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 sticky top-24">
                <h4 class="font-semibold text-gray-800 flex items-center gap-2 mb-6 text-lg border-b border-gray-50 pb-3">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:eye-outline"></span>
                    Xem trước giao diện
                </h4>
                
                <!-- Ticket Mockup -->
                <div class="relative mx-auto w-full max-w-sm rounded-xl overflow-hidden shadow-lg border border-red-100 bg-gradient-to-br from-red-50 to-white transition-all hover:shadow-xl">
                    <!-- Serrated edges top & bottom -->
                    <div class="absolute top-0 left-0 w-full h-2 bg-repeat-x flex justify-around">
                        <?php for($i=0; $i<20; $i++): ?><div class="w-3 h-3 bg-white rounded-full -mt-1.5 shadow-inner"></div><?php endfor; ?>
                    </div>
                    <div class="absolute bottom-0 left-0 w-full h-2 bg-repeat-x flex justify-around">
                        <?php for($i=0; $i<20; $i++): ?><div class="w-3 h-3 bg-white rounded-full mt-0.5 shadow-inner"></div><?php endfor; ?>
                    </div>

                    <div class="p-6 pt-8 pb-8 relative z-10 border-l-4 border-[#6B0D18] flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-full bg-red-100 text-[#6B0D18] flex items-center justify-center mb-4 shadow-sm">
                            <span class="iconify text-2xl" data-icon="mdi:ticket-percent"></span>
                        </div>
                        
                        <h3 class="text-2xl font-black text-[#6B0D18] tracking-widest uppercase mb-2" id="preview_ma">MÃ_VOUCHER</h3>
                        
                        <div class="w-full border-t-2 border-dashed border-red-200 my-4 relative">
                            <div class="absolute -left-7 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-white border-r border-red-100 shadow-inner"></div>
                            <div class="absolute -right-7 top-1/2 -translate-y-1/2 w-5 h-5 rounded-full bg-white border-l border-red-100 shadow-inner"></div>
                        </div>

                        <div class="space-y-1.5 w-full">
                            <p class="font-bold text-gray-800 text-xl" id="preview_gia_tri">Giảm 0%</p>
                            <p class="text-base font-medium text-gray-600" id="preview_ten">Tên chương trình</p>
                            <p class="text-sm text-gray-500 mt-2 bg-gray-50/80 py-1.5 px-3 rounded-md inline-block border border-gray-100" id="preview_dieu_kien">Đơn từ 0đ</p>
                        </div>
                        
                        <div class="mt-6 pt-4 border-t border-gray-100 w-full flex justify-between items-center text-xs text-gray-500">
                            <span class="flex items-center gap-1.5 font-medium"><span class="iconify" data-icon="mdi:clock-outline"></span> <span id="preview_date">HSD: Chưa đặt</span></span>
                            <span class="font-bold text-[#6B0D18]">Tất cả KH</span>
                        </div>
                    </div>
                </div>

                <div class="mt-8 p-4 bg-amber-50 border border-amber-100 rounded-xl text-sm text-amber-800 flex items-start gap-3">
                    <span class="iconify mt-0.5 shrink-0 text-xl text-amber-500" data-icon="mdi:lightbulb-on-outline"></span>
                    <p class="leading-relaxed">Khách hàng sẽ thấy voucher này trong ví voucher của họ và ở trang giỏ hàng nếu đủ điều kiện áp dụng.</p>
                </div>
            </div>
        </div>
    </div>
</div>

