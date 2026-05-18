<?php
// views/pages/gio_hang.php
?>
<div class="bg-slate-50 min-h-screen py-8 pb-32 md:pb-12">
    <div class="container mx-auto px-4">
        <!-- Breadcrumb -->
        <div class="mb-6 text-sm text-gray-500">
            <a href="<?= APP_URL ?>/" class="hover:text-[#8B0000] transition-colors">Trang chủ</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-medium">Giỏ hàng của bạn</span>
        </div>

        <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-6">
            <div class="flex items-center justify-between w-full md:w-auto md:justify-start gap-4">
                <h1 class="text-2xl md:text-3xl font-serif text-[#8B0000]">Giỏ hàng của bạn</h1>
                <span class="text-gray-500 bg-white px-3 py-1 rounded-full text-sm border border-gray-200 shadow-sm hidden md:inline-block">
                    <span class="font-bold text-[#8B0000]"><?php echo count($gio_hang ?? []); ?></span> Sản phẩm
                </span>
            </div>
        </div>

        <?php if(empty($gio_hang)): ?>
            <!-- Trạng thái giỏ hàng trống -->
            <div class="bg-white rounded-2xl p-12 text-center shadow-sm border border-gray-100">
                <div class="w-24 h-24 mx-auto bg-red-50 rounded-full flex items-center justify-center mb-4 text-[#8B0000]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <h2 class="text-xl font-medium text-gray-800 mb-2">Giỏ hàng của bạn đang trống</h2>
                <p class="text-gray-500 mb-8">Chưa có sản phẩm nào trong giỏ hàng. Hãy tham khảo thêm các sản phẩm tuyệt vời của chúng tôi nhé!</p>
                <a href="<?= APP_URL ?>/" class="inline-block bg-[#8B0000] hover:bg-red-800 text-white font-medium py-3 px-8 rounded-full transition-colors shadow-md shadow-red-900/20">
                    Tiếp tục mua sắm
                </a>
            </div>
        <?php else: ?>
            <div class="flex flex-col lg:flex-row gap-8">
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
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
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
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Tiếp tục mua sắm
                        </a>
                    </div>
                </div>

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
                                <span class="font-medium"><?php echo number_format($tong_tam_tinh, 0, ',', '.'); ?>đ</span>
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
                                <span class="text-2xl font-bold text-[#8B0000] block"><?php echo number_format($tong_tam_tinh, 0, ',', '.'); ?>đ</span>
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
            </div>

            <!-- Sticky Checkout Bar for Mobile -->
            <div class="md:hidden fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-50 flex items-center justify-between">
                <div>
                    <span class="block text-xs text-gray-500">Tổng thanh toán</span>
                    <span class="block text-lg font-bold text-[#8B0000]"><?php echo number_format($tong_tam_tinh, 0, ',', '.'); ?>đ</span>
                </div>
                <a href="<?= APP_URL ?>/thanh-toan" class="bg-[#8B0000] text-white font-medium py-3 px-6 rounded-xl hover:bg-red-800 transition-colors shadow-md shadow-red-900/20">
                    Mua hàng (<?php echo count($gio_hang); ?>)
                </a>
            </div>
            
            <!-- Khu vực Mua Thêm (Cross-sell) -->
            <?php if(!empty($san_pham_goi_y)): ?>
            <div class="mt-16 border-t border-gray-200 pt-10">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl md:text-2xl font-serif text-[#8B0000]">Phụ kiện nên mua kèm</h2>
                    <div class="flex gap-2">
                        <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-500 hover:text-[#8B0000] hover:border-[#8B0000] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                        </button>
                        <button class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-500 hover:text-[#8B0000] hover:border-[#8B0000] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </button>
                    </div>
                </div>
                
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                    <?php foreach($san_pham_goi_y as $sp): ?>
                        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg transition-all duration-300 flex flex-col h-full">
                            <!-- Hình ảnh -->
                            <div class="relative aspect-square overflow-hidden bg-gray-100">
                                <?php if($sp['nhan']): ?>
                                    <div class="absolute top-2 left-2 z-10 bg-red-500 text-white text-[10px] font-bold px-2 py-1 rounded">
                                        <?php echo htmlspecialchars($sp['nhan']); ?>
                                    </div>
                                <?php endif; ?>
                                
                                <img src="<?php echo htmlspecialchars($sp['hinh_anh']); ?>" alt="<?php echo htmlspecialchars($sp['ten']); ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                
                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <button class="w-10 h-10 bg-white/90 rounded-full flex items-center justify-center text-[#8B0000] hover:bg-[#8B0000] hover:text-white transition-colors transform translate-y-4 group-hover:translate-y-0 duration-300 shadow-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Thông tin -->
                            <div class="p-4 flex flex-col flex-1">
                                <a href="#" class="text-sm font-medium text-gray-800 hover:text-[#8B0000] line-clamp-2 transition-colors mb-2">
                                    <?php echo htmlspecialchars($sp['ten']); ?>
                                </a>
                                
                                <div class="mt-auto">
                                    <!-- Đánh giá -->
                                    <div class="flex items-center gap-1 mb-2">
                                        <div class="flex text-yellow-400 text-[10px]">
                                            <?php for($i=1; $i<=5; $i++): ?>
                                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                            <?php endfor; ?>
                                        </div>
                                        <span class="text-[10px] text-gray-400 border-l border-gray-300 pl-1 ml-1">Đã bán <?php echo number_format($sp['da_ban'], 0, ',', '.'); ?></span>
                                    </div>
                                    
                                    <div class="flex items-baseline gap-2">
                                        <span class="font-bold text-[#8B0000]"><?php echo number_format($sp['gia'], 0, ',', '.'); ?>đ</span>
                                        <?php if($sp['gia_cu'] > 0): ?>
                                            <span class="text-xs text-gray-400 line-through"><?php echo number_format($sp['gia_cu'], 0, ',', '.'); ?>đ</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
            
        <?php endif; ?>
    </div>
</div>
