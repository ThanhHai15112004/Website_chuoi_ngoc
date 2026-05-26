            <!-- Khách hàng -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:account-circle"></span> Thông tin khách hàng
                    </h2>
                    <a href="#" class="text-xs text-[#6B0D18] font-medium hover:underline">Xem hồ sơ</a>
                </div>
                
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-xl font-bold text-gray-500">
                        N
                    </div>
                    <div>
                        <div class="font-bold text-gray-900"><?= $don_hang['khach_hang']['ho_ten'] ?></div>
                        <div class="flex items-center gap-2 mt-1">
                            <span class="bg-yellow-100 text-yellow-800 text-[10px] px-2 py-0.5 rounded-full font-bold uppercase tracking-wider"><?= $don_hang['khach_hang']['hang_thanh_vien'] ?></span>
                            <span class="text-xs text-emerald-600 flex items-center"><span class="iconify" data-icon="mdi:check-circle"></span> Đã xác thực</span>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-3 text-sm">
                    <div class="flex items-start gap-2 text-gray-600">
                        <span class="iconify mt-0.5 shrink-0" data-icon="mdi:phone"></span>
                        <a href="tel:<?= $don_hang['khach_hang']['sdt'] ?>" class="hover:text-[#6B0D18] font-medium transition-colors"><?= $don_hang['khach_hang']['sdt'] ?></a>
                    </div>
                    <div class="flex items-start gap-2 text-gray-600">
                        <span class="iconify mt-0.5 shrink-0" data-icon="mdi:email"></span>
                        <a href="mailto:<?= $don_hang['khach_hang']['email'] ?>" class="hover:text-[#6B0D18] transition-colors"><?= $don_hang['khach_hang']['email'] ?></a>
                    </div>
                </div>
                
                <div class="mt-4 pt-4 border-t border-gray-100 grid grid-cols-2 gap-4">
                    <div>
                        <div class="text-xs text-gray-400 mb-1">Tổng đơn đã mua</div>
                        <div class="font-bold text-gray-900"><?= $don_hang['khach_hang']['tong_don'] ?> đơn</div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-400 mb-1">Tổng chi tiêu</div>
                        <div class="font-bold text-gray-900"><?= number_format($don_hang['khach_hang']['tong_chi_tieu'], 0, ',', '.') ?>đ</div>
                    </div>
                </div>
            </div>

            <!-- Giao hàng -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-teal-600" data-icon="mdi:map-marker"></span> Giao hàng
                    </h2>
                    <button class="text-xs text-gray-500 font-medium hover:text-gray-900 flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:content-copy"></span> Copy
                    </button>
                </div>
                
                <div class="space-y-3 text-sm">
                    <div>
                        <span class="font-bold text-gray-900"><?= $don_hang['giao_hang']['nguoi_nhan'] ?></span>
                        <span class="text-gray-500 ml-2"><?= $don_hang['giao_hang']['sdt_nhan'] ?></span>
                    </div>
                    <div class="text-gray-600 leading-relaxed">
                        <?= $don_hang['giao_hang']['dia_chi'] ?>
                    </div>
                </div>
                
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="bg-gray-100 px-2 py-1 rounded text-xs font-medium text-gray-700"><?= $don_hang['giao_hang']['phuong_thuc'] ?></span>
                    </div>
                    <?php if(empty($don_hang['giao_hang']['ma_van_don'])): ?>
                        <div class="text-sm text-orange-600 flex items-center gap-1.5 mt-2 bg-orange-50 p-2 rounded-lg border border-orange-100">
                            <span class="iconify" data-icon="mdi:alert-circle-outline"></span> Chưa có mã vận đơn
                        </div>
                    <?php else: ?>
                        <div class="text-sm text-gray-600 flex justify-between items-center mt-2 bg-gray-50 p-2 rounded-lg">
                            <span>Mã VĐ: <span class="font-bold text-gray-900"><?= $don_hang['giao_hang']['ma_van_don'] ?></span></span>
                            <button class="text-[#6B0D18] hover:underline text-xs font-medium">Theo dõi</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Chi tiết thanh toán -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <h2 class="font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:cash-multiple"></span> Chi tiết thanh toán
                </h2>
                
                <div class="space-y-3 text-sm mb-4">
                    <div class="flex justify-between text-gray-600">
                        <span>Tạm tính</span>
                        <span class="font-medium"><?= number_format($don_hang['chi_tiet_tien']['tam_tinh'], 0, ',', '.') ?>đ</span>
                    </div>
                    <?php if($don_hang['chi_tiet_tien']['giam_gia'] < 0): ?>
                    <div class="flex justify-between text-gray-600">
                        <span>Giảm giá sản phẩm</span>
                        <span class="font-medium text-green-600"><?= number_format($don_hang['chi_tiet_tien']['giam_gia'], 0, ',', '.') ?>đ</span>
                    </div>
                    <?php endif; ?>
                    
                    <div class="flex justify-between text-gray-600">
                        <span>Phí vận chuyển</span>
                        <span class="font-medium"><?= number_format($don_hang['chi_tiet_tien']['phi_van_chuyen'], 0, ',', '.') ?>đ</span>
                    </div>
                    
                    <?php if($don_hang['chi_tiet_tien']['goi_qua'] > 0): ?>
                    <div class="flex justify-between text-gray-600">
                        <span>Dịch vụ gói quà</span>
                        <span class="font-medium"><?= number_format($don_hang['chi_tiet_tien']['goi_qua'], 0, ',', '.') ?>đ</span>
                    </div>
                    <?php endif; ?>
                    
                    <?php if(!empty($don_hang['chi_tiet_tien']['voucher'])): ?>
                    <div class="flex justify-between items-center text-gray-600 border border-red-200 border-dashed bg-red-50/50 p-2 rounded-lg">
                        <div class="flex items-center gap-1.5">
                            <span class="iconify text-[#6B0D18]" data-icon="mdi:ticket-percent"></span>
                            <span class="font-bold text-[#6B0D18] text-xs"><?= $don_hang['chi_tiet_tien']['voucher']['ma'] ?></span>
                        </div>
                        <span class="font-bold text-[#6B0D18]"><?= number_format($don_hang['chi_tiet_tien']['voucher']['tien_giam'], 0, ',', '.') ?>đ</span>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="pt-4 border-t border-gray-100 flex justify-between items-end mb-4">
                    <div class="font-bold text-gray-900">Tổng thanh toán</div>
                    <div class="font-black text-[#6B0D18] text-xl"><?= number_format($don_hang['chi_tiet_tien']['tong_thanh_toan'], 0, ',', '.') ?>đ</div>
                </div>

                <div class="bg-gray-50 rounded-xl p-3 border border-gray-100">
                    <div class="text-xs text-gray-500 mb-1">Phương thức</div>
                    <div class="font-bold text-gray-900 text-sm mb-2"><?= $don_hang['thanh_toan']['phuong_thuc'] ?></div>
                    
                    <div class="flex items-center justify-between">
                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-md uppercase"><?= $don_hang['thanh_toan']['trang_thai'] ?></span>
                        <button class="text-xs font-medium text-[#6B0D18] hover:underline">Xác nhận đã thu tiền</button>
                    </div>
                </div>
            </div>
