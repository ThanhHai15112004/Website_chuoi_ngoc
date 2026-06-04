<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 lg:p-6 mb-4">
    <div class="flex items-center gap-2 mb-4 pb-4 border-b border-gray-100">
        <iconify-icon icon="mdi:shopping-outline" class="text-xl text-[#8B0000]"></iconify-icon>
        <h2 class="text-lg font-bold text-gray-800">Sản phẩm trong đơn hàng</h2>
    </div>

    <!-- Headers (Desktop only) -->
    <div class="hidden md:flex items-center text-sm font-medium text-gray-500 mb-3 px-2">
        <div class="flex-1">Sản phẩm</div>
        <div class="w-32 text-center">Đơn giá</div>
        <div class="w-24 text-center">Số lượng</div>
        <div class="w-32 text-right">Thành tiền</div>
    </div>

    <div class="space-y-4">
        <?php foreach($gio_hang as $item): 
            $thanh_tien_sp = $item['gia'] * $item['so_luong'];
        ?>
        <div class="flex flex-col md:flex-row items-start md:items-center gap-4 p-3 hover:bg-gray-50 rounded-xl border border-transparent hover:border-gray-100 transition-colors">
            <!-- Sản phẩm info -->
            <div class="flex-1 flex gap-4 w-full">
                <div class="w-20 h-20 rounded-lg border border-gray-200 overflow-hidden shrink-0 shadow-sm">
                    <img src="<?php echo htmlspecialchars($item['hinh_anh']); ?>" alt="<?php echo htmlspecialchars($item['ten'] ?? ''); ?>" class="w-full h-full object-cover">
                </div>
                <div class="flex-1 min-w-0 py-1">
                    <p class="font-bold text-gray-800 text-sm md:text-base line-clamp-2"><?php echo htmlspecialchars($item['ten'] ?? ''); ?></p>
                    <?php if (!empty($item['bien_the'])): ?>
                    <p class="text-xs text-gray-500 mt-1.5">Phân loại: <?php echo htmlspecialchars($item['bien_the']); ?></p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Giá, Số lượng, Thành tiền -->
            <div class="flex items-center justify-between md:justify-end w-full md:w-auto gap-4 md:gap-0 mt-2 md:mt-0 px-2 md:px-0">
                <div class="w-32 text-center text-sm text-gray-600 hidden md:block">
                    <?php echo number_format($item['gia'], 0, ',', '.'); ?>đ
                </div>
                <div class="w-24 text-center text-sm font-medium text-gray-800">
                    <span class="md:hidden text-gray-500 font-normal">SL: </span>
                    <?php echo $item['so_luong']; ?>
                </div>
                <div class="w-32 text-right text-sm font-bold text-[#8B0000]">
                    <?php echo number_format($thanh_tien_sp, 0, ',', '.'); ?>đ
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Ghi chú đơn hàng -->
    <div class="mt-6 pt-5 border-t border-gray-100">
        <label for="ghi_chu" class="block text-sm font-medium text-gray-700 mb-2">Ghi chú cho shop</label>
        <textarea name="ghi_chu" id="ghi_chu" rows="2" placeholder="Ví dụ: giao giờ hành chính, đóng gói làm quà..." class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-[#8B0000] focus:ring-1 focus:ring-[#8B0000] outline-none transition-colors text-sm resize-none"></textarea>
    </div>
</div>
