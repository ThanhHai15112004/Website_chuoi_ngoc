<!-- Cột trái: Danh sách sản phẩm -->
<div class="lg:w-2/3 space-y-4">
    
    <!-- Phần header danh sách -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between hidden md:flex">
        <div class="flex items-center gap-3 w-1/2">
            <input type="checkbox" id="check-all" class="w-5 h-5 rounded border-gray-300 text-[#8B0000] focus:ring-[#8B0000]">
            <label for="check-all" class="font-medium text-gray-700 cursor-pointer">Chọn tất cả (<?php echo count($gio_hang); ?>)</label>
        </div>
        <div class="w-1/6 text-center text-gray-500 text-sm">Đơn giá</div>
        <div class="w-1/6 text-center text-gray-500 text-sm">Số lượng</div>
        <div class="w-1/6 text-right text-gray-500 text-sm">Thành tiền</div>
        <div class="w-8"></div> <!-- Spacer for delete icon -->
    </div>

    <!-- Danh sách items -->
    <div class="space-y-4">
        <?php 
        $tong_tam_tinh = 0;
        foreach($gio_hang as $item): 
            $thanh_tien = $item['gia'] * $item['so_luong'];
            if($item['con_hang']) {
                $tong_tam_tinh += $thanh_tien;
            }
        ?>
        <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 relative group transition-all hover:shadow-md <?php echo !$item['con_hang'] ? 'opacity-60 grayscale-[0.5]' : ''; ?>">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
                <!-- Checkbox & Image -->
                <div class="flex items-center gap-3 md:w-1/2">
                    <input type="checkbox" class="w-5 h-5 rounded border-gray-300 text-[#8B0000] focus:ring-[#8B0000]" <?php echo !$item['con_hang'] ? 'disabled' : 'checked'; ?>>
                    <div class="w-24 h-24 shrink-0 rounded-lg overflow-hidden border border-gray-100 relative">
                        <img src="<?php echo htmlspecialchars($item['hinh_anh']); ?>" alt="<?php echo htmlspecialchars($item['ten']); ?>" class="w-full h-full object-cover">
                        <?php if(!$item['con_hang']): ?>
                            <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                                <span class="bg-gray-800 text-white text-xs font-bold px-2 py-1 rounded">Hết hàng</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="flex-1">
                        <a href="<?= APP_URL ?>/san-pham/<?php echo $item['id']; ?>" class="font-medium text-gray-800 hover:text-[#8B0000] line-clamp-2 transition-colors mb-1"><?php echo htmlspecialchars($item['ten']); ?></a>
                        <div class="text-xs text-gray-500 space-y-0.5">
                            <p>Đá: <?php echo htmlspecialchars($item['loai_da']); ?> • Hạt: <?php echo htmlspecialchars($item['kich_thuoc_hat']); ?></p>
                            <p>Mệnh: <?php echo htmlspecialchars($item['menh']); ?> • Size: <?php echo htmlspecialchars($item['size_vong']); ?></p>
                        </div>
                        
                        <!-- Cảnh báo số lượng trên mobile -->
                        <?php if($item['con_hang'] && $item['ton_kho'] <= 5): ?>
                            <p class="text-xs text-red-500 mt-1 md:hidden">Chỉ còn <?php echo $item['ton_kho']; ?> sản phẩm!</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Đơn giá -->
                <div class="hidden md:block w-1/6 text-center">
                    <div class="font-medium text-gray-800"><?php echo number_format($item['gia'], 0, ',', '.'); ?>đ</div>
                    <?php if($item['gia_cu'] > 0): ?>
                        <div class="text-xs text-gray-400 line-through"><?php echo number_format($item['gia_cu'], 0, ',', '.'); ?>đ</div>
                    <?php endif; ?>
                </div>

                <!-- Số lượng -->
                <div class="w-full md:w-1/6 flex justify-between md:justify-center items-center mt-3 md:mt-0">
                    <span class="md:hidden text-sm text-gray-500">Số lượng:</span>
                    <?php if($item['con_hang']): ?>
                        <div class="flex items-center border border-gray-300 rounded-full h-8 overflow-hidden bg-white">
                            <button class="w-8 h-full flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-[#8B0000] transition-colors" title="Giảm">-</button>
                            <input type="text" value="<?php echo $item['so_luong']; ?>" class="w-10 h-full text-center text-sm font-medium border-none focus:ring-0 p-0" readonly>
                            <button class="w-8 h-full flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-[#8B0000] transition-colors" title="Tăng">+</button>
                        </div>
                    <?php else: ?>
                        <span class="text-sm text-gray-400">---</span>
                    <?php endif; ?>
                </div>

                <!-- Thành tiền & Giá Mobile -->
                <div class="w-full md:w-1/6 flex justify-between md:block items-center mt-2 md:mt-0 md:text-right">
                    <div class="md:hidden">
                        <span class="font-medium text-gray-800"><?php echo number_format($item['gia'], 0, ',', '.'); ?>đ</span>
                    </div>
                    <div>
                        <span class="md:hidden text-sm text-gray-500 mr-2">Tổng:</span>
                        <span class="font-bold text-[#8B0000]"><?php echo number_format($thanh_tien, 0, ',', '.'); ?>đ</span>
                    </div>
                </div>

                <!-- Nút xóa -->
                <div class="absolute top-4 right-4 md:relative md:top-auto md:right-auto md:w-8 md:text-right">
                    <button class="text-gray-400 hover:text-red-500 transition-colors p-1" title="Xóa sản phẩm">
                        <iconify-icon icon="mdi:trash-can-outline" class="text-xl"></iconify-icon>
                    </button>
                </div>
            </div>
            <!-- Cảnh báo số lượng trên desktop -->
            <?php if($item['con_hang'] && $item['ton_kho'] <= 5): ?>
                <p class="text-xs text-red-500 mt-2 hidden md:block md:ml-12">Chỉ còn <?php echo $item['ton_kho']; ?> sản phẩm trong kho!</p>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Các thao tác chung -->
    <div class="flex items-center justify-between pt-4">
        <button class="text-sm font-medium text-red-500 hover:text-red-700 hover:underline">
            Xóa sản phẩm đã chọn
        </button>
        <a href="<?= APP_URL ?>/" class="text-sm font-medium text-[#8B0000] hover:underline flex items-center gap-1">
            <iconify-icon icon="mdi:arrow-left" class="text-base"></iconify-icon>
            Tiếp tục mua sắm
        </a>
    </div>
</div>
