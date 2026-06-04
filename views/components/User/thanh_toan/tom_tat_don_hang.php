<?php
$tong_tam_tinh = 0;
foreach($gio_hang as $item): 
    $thanh_tien = $item['gia'] * $item['so_luong'];
    $tong_tam_tinh += $thanh_tien;
endforeach;
$tong_tien_cuoi_cung = max(0, $tong_tam_tinh - 50000);
?>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24">
    <h2 class="text-lg font-serif text-[#8B0000] mb-4 pb-4 border-b border-gray-100">Đơn hàng của bạn</h2>
    
    <!-- Danh sách sản phẩm -->
    <div class="space-y-4 mb-6">
        <?php foreach($gio_hang as $item): 
            $thanh_tien = $item['gia'] * $item['so_luong'];
        ?>
        <div class="flex gap-3">
            <div class="w-16 h-16 rounded-lg overflow-hidden border border-gray-100 relative shrink-0">
                <img src="<?php echo htmlspecialchars($item['hinh_anh']); ?>" alt="<?php echo htmlspecialchars($item['ten']); ?>" class="w-full h-full object-cover">
                <span class="absolute -top-1 -right-1 bg-gray-500 text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full border-2 border-white shadow-sm z-10">
                    <?php echo $item['so_luong']; ?>
                </span>
            </div>
            <div class="flex-1 text-sm">
                <p class="font-medium text-gray-800 line-clamp-2"><?php echo htmlspecialchars($item['ten']); ?></p>
                <p class="text-gray-500 text-xs mt-1"><?php echo htmlspecialchars($item['loai_da']); ?> - Size: <?php echo htmlspecialchars($item['size_vong']); ?></p>
            </div>
            <div class="text-right shrink-0">
                <p class="font-medium text-gray-800"><?php echo number_format($thanh_tien, 0, ',', '.'); ?>đ</p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- Voucher section -->
    <div class="mb-6 pt-6 border-t border-gray-100">
        <div class="flex gap-2">
            <input type="text" placeholder="Nhập mã ưu đãi" class="flex-1 text-sm px-3 py-2 border border-gray-300 rounded-lg focus:ring-[#8B0000] focus:border-[#8B0000]">
            <button class="bg-gray-800 text-white px-4 py-2 text-sm rounded-lg hover:bg-black transition-colors">Áp dụng</button>
        </div>
        <!-- Voucher đã chọn (demo) -->
        <div class="mt-3 flex items-center justify-between p-2 border-2 border-dashed border-red-400 bg-red-50 rounded-lg">
            <div class="flex items-center gap-2">
                <iconify-icon icon="mdi:ticket-percent-outline" class="text-xl text-[#8B0000]"></iconify-icon>
                <span class="text-sm font-bold text-[#8B0000]">GIAM50K</span>
            </div>
            <button class="text-xs text-gray-500 hover:text-red-500 transition-colors">Xóa</button>
        </div>
    </div>

    <div class="space-y-3 mb-6 pb-6 border-b border-gray-100 text-sm">
        <div class="flex justify-between text-gray-600">
            <span>Tạm tính</span>
            <span class="font-medium"><?php echo number_format($tong_tam_tinh, 0, ',', '.'); ?>đ</span>
        </div>
        <div class="flex justify-between text-gray-600">
            <span>Phí vận chuyển</span>
            <span>Miễn phí</span>
        </div>
        <div class="flex justify-between text-green-600">
            <span>Giảm giá (GIAM50K)</span>
            <span>-50.000đ</span>
        </div>
    </div>

    <div class="flex justify-between items-end mb-6">
        <span class="text-gray-800 font-medium">Tổng thanh toán</span>
        <div class="text-right">
            <span class="text-2xl font-bold text-[#8B0000] block"><?php echo number_format($tong_tien_cuoi_cung, 0, ',', '.'); ?>đ</span>
            <span class="text-xs text-gray-500">(Đã bao gồm VAT)</span>
        </div>
    </div>

    <a href="<?= APP_URL ?>/dat-hang-thanh-cong" class="block text-center w-full bg-[#8B0000] hover:bg-red-800 text-white font-medium py-3.5 rounded-xl transition-all shadow-[0_8px_20px_-6px_rgba(139,0,0,0.4)] hover:shadow-[0_12px_25px_-6px_rgba(139,0,0,0.5)] text-lg hidden md:block">
        Hoàn tất đặt hàng
    </a>
    
    <p class="text-xs text-center text-gray-500 mt-4 px-4 hidden md:block">
        Bằng việc đặt hàng, bạn đồng ý với <a href="#" class="text-[#8B0000] hover:opacity-80 transition-opacity">Điều khoản dịch vụ</a> và <a href="#" class="text-[#8B0000] hover:opacity-80 transition-opacity">Chính sách bảo mật</a> của chúng tôi.
    </p>
</div>
