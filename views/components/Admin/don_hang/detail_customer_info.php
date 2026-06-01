            <!-- Khách hàng -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:account-circle"></span> Thông tin khách hàng
                    </h2>
                    <?php if(!empty($don_hang['id_nguoi_dung'])): ?>
                        <a href="<?= APP_URL ?>/admin/thanh-vien/chi-tiet/<?= $don_hang['id_nguoi_dung'] ?>" class="text-xs text-[#6B0D18] font-medium hover:underline">Xem hồ sơ</a>
                    <?php endif; ?>
                </div>
                
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 rounded-full bg-gray-100 flex items-center justify-center text-xl font-bold text-gray-500 uppercase">
                        <?= mb_substr(!empty($don_hang['ho_ten']) ? $don_hang['ho_ten'] : $don_hang['ten_nguoi_nhan'], 0, 1, 'UTF-8') ?>
                    </div>
                    <div>
                        <div class="font-bold text-gray-900"><?= !empty($don_hang['ho_ten']) ? htmlspecialchars($don_hang['ho_ten']) : htmlspecialchars($don_hang['ten_nguoi_nhan']) ?></div>
                        <div class="flex items-center gap-2 mt-1">
                            <?php if(!empty($don_hang['ten_hang'])): ?>
                                <span class="bg-yellow-100 text-yellow-800 text-[10px] px-2 py-0.5 rounded-full font-bold uppercase tracking-wider"><?= htmlspecialchars($don_hang['ten_hang']) ?></span>
                            <?php else: ?>
                                <span class="bg-gray-100 text-gray-600 text-[10px] px-2 py-0.5 rounded-full font-bold uppercase tracking-wider">Khách vãng lai</span>
                            <?php endif; ?>
                            <?php if(!empty($don_hang['id_nguoi_dung'])): ?>
                                <span class="text-xs text-emerald-600 flex items-center"><span class="iconify" data-icon="mdi:check-circle"></span> Đã đăng ký</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <div class="space-y-3 text-sm">
                    <div class="flex items-start gap-2 text-gray-600">
                        <span class="iconify mt-0.5 shrink-0" data-icon="mdi:phone"></span>
                        <a href="tel:<?= $don_hang['sdt_nguoi_nhan'] ?>" class="hover:text-[#6B0D18] font-medium transition-colors"><?= $don_hang['sdt_nguoi_nhan'] ?></a>
                    </div>
                    <?php if(!empty($don_hang['email'])): ?>
                    <div class="flex items-start gap-2 text-gray-600">
                        <span class="iconify mt-0.5 shrink-0" data-icon="mdi:email"></span>
                        <a href="mailto:<?= $don_hang['email'] ?>" class="hover:text-[#6B0D18] transition-colors"><?= $don_hang['email'] ?></a>
                    </div>
                    <?php endif; ?>
                </div>
                
                <?php if(!empty($don_hang['id_nguoi_dung'])): ?>
                <div class="mt-4 pt-4 border-t border-gray-100 grid grid-cols-2 gap-4">
                    <div>
                        <div class="text-xs text-gray-400 mb-1">Tổng chi tiêu</div>
                        <div class="font-bold text-gray-900"><?= number_format($don_hang['tong_chi_tieu'], 0, ',', '.') ?>đ</div>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Giao hàng -->
            <div class="bg-white rounded-2xl border border-gray-100 shadow-sm p-5">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-teal-600" data-icon="mdi:map-marker"></span> Giao hàng
                    </h2>
                    <button class="text-xs text-gray-500 font-medium hover:text-gray-900 flex items-center gap-1" title="Tính năng copy đang phát triển">
                        <span class="iconify" data-icon="mdi:content-copy"></span> Copy
                    </button>
                </div>
                
                <div class="space-y-3 text-sm">
                    <div>
                        <span class="font-bold text-gray-900"><?= htmlspecialchars($don_hang['ten_nguoi_nhan']) ?></span>
                        <span class="text-gray-500 ml-2"><?= $don_hang['sdt_nguoi_nhan'] ?></span>
                    </div>
                    <div class="text-gray-600 leading-relaxed">
                        <?= htmlspecialchars($don_hang['dia_chi_giao_hang']) ?>
                    </div>
                </div>
                
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <div class="flex items-center gap-2 mb-2">
                        <span class="bg-gray-100 px-2 py-1 rounded text-xs font-medium text-gray-700"><?= htmlspecialchars($don_hang['pt_thanh_toan']) ?></span>
                    </div>
                    <div class="text-sm text-orange-600 flex items-center gap-1.5 mt-2 bg-orange-50 p-2 rounded-lg border border-orange-100">
                        <span class="iconify" data-icon="mdi:alert-circle-outline"></span> Chưa có mã vận đơn
                    </div>
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
                        <span class="font-medium"><?= number_format($don_hang['tong_tien'], 0, ',', '.') ?>đ</span>
                    </div>
                    
                    <div class="flex justify-between text-gray-600">
                        <span>Phí vận chuyển</span>
                        <span class="font-medium"><?= number_format($don_hang['phi_ship'], 0, ',', '.') ?>đ</span>
                    </div>
                    
                    <?php if(!empty($don_hang['ma_voucher'])): ?>
                    <div class="flex justify-between items-center text-gray-600 border border-red-200 border-dashed bg-red-50/50 p-2 rounded-lg mt-2">
                        <div class="flex items-center gap-1.5">
                            <span class="iconify text-[#6B0D18]" data-icon="mdi:ticket-percent"></span>
                            <span class="font-bold text-[#6B0D18] text-xs"><?= htmlspecialchars($don_hang['ma_voucher']) ?></span>
                        </div>
                        <span class="font-bold text-[#6B0D18]">-<?= number_format($don_hang['tien_giam_gia'], 0, ',', '.') ?>đ</span>
                    </div>
                    <?php endif; ?>
                </div>
                
                <div class="pt-4 border-t border-gray-100 flex justify-between items-end mb-4">
                    <div class="font-bold text-gray-900">Tổng thanh toán</div>
                    <div class="font-black text-[#6B0D18] text-xl"><?= number_format($don_hang['thanh_tien'], 0, ',', '.') ?>đ</div>
                </div>

                <div class="bg-gray-50 rounded-xl p-3 border border-gray-100">
                    <div class="text-xs text-gray-500 mb-1">Phương thức</div>
                    <div class="font-medium text-sm text-gray-900 truncate" title="<?= htmlspecialchars($don_hang['pt_thanh_toan']) ?>"><?= htmlspecialchars($don_hang['pt_thanh_toan']) ?></div>
                    
                    <div class="flex items-center justify-between">
                        <?php if($don_hang['trang_thai_thanh_toan'] == 1): ?>
                            <span class="px-2 py-1 bg-blue-100 text-blue-800 text-xs font-bold rounded-md uppercase">Đã thanh toán</span>
                        <?php else: ?>
                            <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-bold rounded-md uppercase">Chưa thanh toán</span>
                            <button onclick="capNhatThanhToan('<?= $don_hang['id'] ?>', 1)" class="text-xs font-medium text-[#6B0D18] hover:underline flex items-center gap-1">
                                <span class="iconify" data-icon="mdi:check"></span> Xác nhận đã thu tiền
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
