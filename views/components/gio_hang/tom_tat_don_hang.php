<!-- Cột phải: Tóm tắt đơn hàng -->
<div class="lg:w-1/3">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24">
        <h2 class="text-lg font-serif text-[#8B0000] mb-4 pb-4 border-b border-gray-100">Tóm tắt đơn hàng</h2>
        
        <!-- Voucher section -->
        <div class="mb-6">
            <p class="text-sm text-gray-600 mb-2 font-medium">Mã giảm giá / Voucher</p>
            <div class="flex gap-2">
                <input type="text" placeholder="Nhập mã ưu đãi" class="flex-1 text-sm border-gray-300 rounded-lg focus:ring-[#8B0000] focus:border-[#8B0000]">
                <button class="bg-gray-800 text-white px-4 py-2 text-sm rounded-lg hover:bg-black transition-colors">Áp dụng</button>
            </div>
            
            <!-- Suggested vouchers -->
            <?php if(!empty($vouchers)): ?>
                <div class="mt-3 space-y-2">
                    <?php foreach($vouchers as $vc): ?>
                        <div class="flex items-center justify-between p-2 border border-dashed border-red-200 bg-red-50 rounded-lg">
                            <div>
                                <p class="text-xs font-bold text-[#8B0000]"><?php echo htmlspecialchars($vc['ma']); ?></p>
                                <p class="text-[10px] text-gray-500"><?php echo htmlspecialchars($vc['dieu_kien']); ?></p>
                            </div>
                            <button class="text-xs font-medium text-[#8B0000] hover:underline px-2 py-1 bg-white rounded shadow-sm border border-red-100">
                                Dùng
                            </button>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="space-y-3 mb-6 pb-6 border-b border-gray-100 text-sm">
            <div class="flex justify-between text-gray-600">
                <span>Tạm tính (<?php echo count($gio_hang); ?> sp)</span>
                <span class="font-medium"><?php echo number_format($tong_tam_tinh ?? 0, 0, ',', '.'); ?>đ</span>
            </div>
            <div class="flex justify-between text-gray-600">
                <span>Phí vận chuyển</span>
                <span>Giao hàng tiêu chuẩn</span>
            </div>
            <div class="flex justify-between text-green-600">
                <span>Giảm giá</span>
                <span>-0đ</span>
            </div>
        </div>

        <div class="flex justify-between items-end mb-6">
            <span class="text-gray-800 font-medium">Tổng cộng</span>
            <div class="text-right">
                <span class="text-2xl font-bold text-[#8B0000] block"><?php echo number_format($tong_tam_tinh ?? 0, 0, ',', '.'); ?>đ</span>
                <span class="text-xs text-gray-500">(Đã bao gồm VAT nếu có)</span>
            </div>
        </div>

        <a href="<?= APP_URL ?>/thanh-toan" class="w-full bg-[#8B0000] hover:bg-red-800 text-white font-medium py-3.5 rounded-xl transition-colors shadow-md shadow-red-900/20 text-lg flex justify-center items-center gap-2 group hidden md:flex">
            Tiến hành thanh toán
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </a>
        
        <div class="mt-4 space-y-2 text-xs text-gray-500">
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Freeship toàn quốc cho đơn từ 500.000đ
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Kiểm tra hàng trước khi thanh toán
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-4 h-4 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                Đổi trả miễn phí trong 7 ngày
            </div>
        </div>
    </div>
</div>
