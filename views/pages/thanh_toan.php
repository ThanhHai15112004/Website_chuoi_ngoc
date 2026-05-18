<?php
// views/pages/thanh_toan.php
?>
<div class="bg-slate-50 min-h-screen py-8 pb-32 md:pb-12">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Breadcrumb -->
        <div class="mb-6 text-sm text-gray-500">
            <a href="/" class="hover:text-[#8B0000] transition-colors">Trang chủ</a>
            <span class="mx-2">/</span>
            <a href="/gio-hang" class="hover:text-[#8B0000] transition-colors">Giỏ hàng</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">Thanh toán</span>
        </div>

        <h1 class="text-2xl md:text-3xl font-serif text-[#8B0000] mb-8">Thanh toán đơn hàng</h1>

        <?php if(empty($gio_hang)): ?>
            <!-- Trạng thái giỏ hàng trống khi thanh toán -->
            <div class="bg-white rounded-2xl p-12 text-center shadow-sm border border-gray-100">
                <div class="w-24 h-24 mx-auto bg-red-50 rounded-full flex items-center justify-center mb-4 text-[#8B0000]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h2 class="text-xl font-medium text-gray-800 mb-2">Không có sản phẩm để thanh toán</h2>
                <p class="text-gray-500 mb-8">Bạn cần chọn ít nhất 1 sản phẩm vào giỏ hàng trước khi thanh toán.</p>
                <a href="/" class="inline-block bg-[#8B0000] hover:bg-red-800 text-white font-medium py-3 px-8 rounded-full transition-colors shadow-md shadow-red-900/20">
                    Tiếp tục mua sắm
                </a>
            </div>
        <?php else: ?>
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cột trái: Form thông tin thanh toán -->
                <div class="lg:w-2/3 space-y-6">
                    
                    <!-- Thông tin người nhận -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                            <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-[#8B0000]">
                                <span class="font-bold">1</span>
                            </div>
                            <h2 class="text-xl font-serif text-gray-800">Thông tin người nhận</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Họ và tên <span class="text-red-500">*</span></label>
                                <input type="text" value="<?php echo htmlspecialchars($user_info['ho_ten'] ?? ''); ?>" placeholder="Nhập họ và tên" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8B0000] focus:border-[#8B0000] outline-none transition-all">
                            </div>
                            <div class="col-span-1">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại <span class="text-red-500">*</span></label>
                                <input type="tel" value="<?php echo htmlspecialchars($user_info['so_dien_thoai'] ?? ''); ?>" placeholder="Nhập số điện thoại" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8B0000] focus:border-[#8B0000] outline-none transition-all">
                            </div>
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email (tùy chọn)</label>
                                <input type="email" value="<?php echo htmlspecialchars($user_info['email'] ?? ''); ?>" placeholder="Để nhận email xác nhận đơn hàng" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8B0000] focus:border-[#8B0000] outline-none transition-all">
                            </div>
                        </div>
                    </div>

                    <!-- Địa chỉ giao hàng -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                            <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-[#8B0000]">
                                <span class="font-bold">2</span>
                            </div>
                            <h2 class="text-xl font-serif text-gray-800">Địa chỉ giao hàng</h2>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ chi tiết <span class="text-red-500">*</span></label>
                                <input type="text" value="<?php echo htmlspecialchars($user_info['dia_chi'] ?? ''); ?>" placeholder="Số nhà, tên đường, phường/xã, quận/huyện, tỉnh/thành phố" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8B0000] focus:border-[#8B0000] outline-none transition-all">
                            </div>
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú đơn hàng (tùy chọn)</label>
                                <textarea rows="3" placeholder="Ghi chú thêm về đơn hàng, thời gian giao hàng..." class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8B0000] focus:border-[#8B0000] outline-none transition-all resize-none"></textarea>
                            </div>
                        </div>

                        <!-- Gift options -->
                        <div class="mt-6 bg-red-50/50 p-4 rounded-xl border border-red-100">
                            <label class="flex items-start gap-3 cursor-pointer">
                                <div class="mt-0.5">
                                    <input type="checkbox" class="w-5 h-5 rounded border-gray-300 text-[#8B0000] focus:ring-[#8B0000]">
                                </div>
                                <div>
                                    <span class="font-medium text-gray-800 block">Đóng gói quà tặng sang trọng (+50.000đ)</span>
                                    <span class="text-sm text-gray-500">Sản phẩm sẽ được đặt trong hộp nhung cao cấp, kèm thiệp viết tay theo yêu cầu. Phù hợp để làm quà biếu tặng.</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Phương thức thanh toán -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                        <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
                            <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-[#8B0000]">
                                <span class="font-bold">3</span>
                            </div>
                            <h2 class="text-xl font-serif text-gray-800">Phương thức thanh toán</h2>
                        </div>
                        
                        <div class="space-y-3">
                            <!-- COD -->
                            <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors bg-red-50/20 border-[#8B0000]/30 relative overflow-hidden group">
                                <div class="absolute inset-0 border-2 border-[#8B0000] rounded-xl opacity-100"></div>
                                <input type="radio" name="payment_method" value="cod" class="w-5 h-5 border-gray-300 text-[#8B0000] focus:ring-[#8B0000]" checked>
                                <div class="flex-1">
                                    <span class="font-medium text-gray-800 block">Thanh toán khi nhận hàng (COD)</span>
                                    <span class="text-sm text-gray-500">Thanh toán bằng tiền mặt khi giao hàng</span>
                                </div>
                                <div class="w-8 h-8 opacity-70">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#8B0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 16V12" stroke="#8B0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 8H12.01" stroke="#8B0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </label>

                            <!-- Chuyển khoản -->
                            <label class="flex items-center gap-4 p-4 border border-gray-200 rounded-xl cursor-pointer hover:bg-gray-50 transition-colors relative overflow-hidden group">
                                <div class="absolute inset-0 border-2 border-[#8B0000] rounded-xl opacity-0"></div>
                                <input type="radio" name="payment_method" value="bank_transfer" class="w-5 h-5 border-gray-300 text-[#8B0000] focus:ring-[#8B0000]">
                                <div class="flex-1">
                                    <span class="font-medium text-gray-800 block">Chuyển khoản ngân hàng</span>
                                    <span class="text-sm text-gray-500">Quét mã QR qua ứng dụng ngân hàng</span>
                                </div>
                                <div class="w-8 h-8 opacity-70">
                                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 21H21" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M3 10H21" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M5 6L12 3L19 6" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M4 10V21" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M20 10V21" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8 14V17" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12 14V17" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 14V17" stroke="#4B5563" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Cột phải: Tóm tắt đơn hàng -->
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24">
                        <h2 class="text-lg font-serif text-[#8B0000] mb-4 pb-4 border-b border-gray-100">Đơn hàng của bạn</h2>
                        
                        <!-- Danh sách sản phẩm -->
                        <div class="space-y-4 mb-6">
                            <?php 
                            $tong_tam_tinh = 0;
                            foreach($gio_hang as $item): 
                                $thanh_tien = $item['gia'] * $item['so_luong'];
                                $tong_tam_tinh += $thanh_tien;
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
                            <div class="mt-3 flex items-center justify-between p-2 border border-[#8B0000]/30 bg-red-50 rounded-lg">
                                <div class="flex items-center gap-2">
                                    <svg class="w-5 h-5 text-[#8B0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                                    <span class="text-sm font-bold text-[#8B0000]">GIAM50K</span>
                                </div>
                                <button class="text-xs text-gray-500 hover:text-red-500 hover:underline">Xóa</button>
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

                        <?php $tong_tien_cuoi_cung = max(0, $tong_tam_tinh - 50000); ?>
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
                            Bằng việc đặt hàng, bạn đồng ý với <a href="#" class="text-[#8B0000] hover:underline">Điều khoản dịch vụ</a> và <a href="#" class="text-[#8B0000] hover:underline">Chính sách bảo mật</a> của chúng tôi.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sticky Checkout Button cho Mobile -->
            <div class="md:hidden fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-50">
                <a href="<?= APP_URL ?>/dat-hang-thanh-cong" class="block text-center w-full bg-[#8B0000] text-white font-medium py-3.5 px-6 rounded-xl hover:bg-red-800 transition-colors shadow-md shadow-red-900/20 text-lg">
                    Hoàn tất đặt hàng (<?php echo number_format($tong_tien_cuoi_cung, 0, ',', '.'); ?>đ)
                </a>
            </div>
            
        <?php endif; ?>
    </div>
</div>

<script>
// Logic đơn giản đổi viền màu đỏ khi click radio phương thức thanh toán
document.addEventListener('DOMContentLoaded', function() {
    const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
    
    paymentRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            // Xóa style active của tất cả
            paymentRadios.forEach(r => {
                const parent = r.closest('label');
                parent.classList.remove('bg-red-50/20', 'border-[#8B0000]/30');
                const overlay = parent.querySelector('.absolute');
                if(overlay) overlay.classList.remove('opacity-100');
                if(overlay) overlay.classList.add('opacity-0');
            });
            
            // Thêm style active cho radio được chọn
            if(this.checked) {
                const parent = this.closest('label');
                parent.classList.add('bg-red-50/20', 'border-[#8B0000]/30');
                const overlay = parent.querySelector('.absolute');
                if(overlay) overlay.classList.remove('opacity-0');
                if(overlay) overlay.classList.add('opacity-100');
            }
        });
    });
});
</script>
