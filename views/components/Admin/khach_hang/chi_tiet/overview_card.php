<?php
$kh = $kh ?? [];
$isBlocked = ($kh['trang_thai'] ?? 1) == 0;
?>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
    <!-- Top banner background -->
    <div class="h-24 bg-gradient-to-r from-[#6B0D18] to-[#9B1B26]"></div>
    
    <div class="px-8 pb-8 relative">
        <!-- Avatar and Actions -->
        <div class="flex justify-between items-end -mt-12 mb-6">
            <div class="flex gap-6 items-end">
                <div class="w-24 h-24 rounded-full border-4 border-white bg-white shadow-md overflow-hidden shrink-0 relative">
                    <?php if(!empty($kh['anh_dai_dien'])): ?>
                        <img src="<?= APP_URL . '/public' . $kh['anh_dai_dien'] ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center text-3xl font-bold text-gray-500 uppercase">
                            <?= mb_substr($kh['ho_ten'] ?? '?', 0, 1) ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if($isBlocked): ?>
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center backdrop-blur-[1px]">
                            <span class="iconify text-white text-2xl" data-icon="mdi:lock"></span>
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="pb-2">
                    <div class="flex items-center gap-3 mb-1">
                        <h3 class="text-xl font-bold text-gray-800"><?= htmlspecialchars($kh['ho_ten'] ?? '') ?></h3>
                        <?php if($isBlocked): ?>
                            <span class="px-2 py-0.5 bg-red-100 text-red-700 text-[10px] font-bold uppercase tracking-wider rounded-full flex items-center gap-1">
                                <span class="iconify" data-icon="mdi:lock"></span> Bị khóa
                            </span>
                        <?php else: ?>
                            <span class="px-2 py-0.5 bg-green-100 text-green-700 text-[10px] font-bold uppercase tracking-wider rounded-full flex items-center gap-1">
                                <span class="iconify" data-icon="mdi:check-circle"></span> Hoạt động
                            </span>
                        <?php endif; ?>
                        
                        <?php if(!empty($kh['ten_hang'])): ?>
                            <span class="px-2 py-0.5 bg-amber-100 text-amber-700 text-[10px] font-bold uppercase tracking-wider rounded-full flex items-center gap-1">
                                <span class="iconify" data-icon="mdi:star-circle"></span> <?= htmlspecialchars($kh['ten_hang']) ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <div class="text-gray-500 text-sm flex items-center gap-4">
                        <span class="flex items-center gap-1">
                            <span class="iconify" data-icon="mdi:id-card"></span> <?= htmlspecialchars($kh['ma_nd'] ?? '') ?>
                        </span>
                        <span class="text-gray-300">|</span>
                        <span class="flex items-center gap-1">
                            <span class="iconify" data-icon="mdi:calendar-account"></span> Tham gia: <?= date('d/m/Y', strtotime($kh['ngay_tao'])) ?>
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="pb-2">
                <button onclick="window.location.href='mailto:<?= htmlspecialchars($kh['email'] ?? '') ?>'" class="px-4 py-2 bg-gray-100 text-gray-700 font-medium rounded-lg text-sm hover:bg-gray-200 transition-colors flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:email-outline"></span> Gửi Email
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Contact Info -->
            <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Thông tin liên hệ</h4>
                <div class="space-y-3">
                    <div class="flex items-start gap-3">
                        <span class="iconify text-gray-400 mt-0.5" data-icon="mdi:phone"></span>
                        <div>
                            <div class="text-sm text-gray-800 font-medium"><?= htmlspecialchars($kh['so_dien_thoai'] ?? 'Chưa cập nhật') ?></div>
                            <div class="text-xs text-gray-500">Số điện thoại chính</div>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <span class="iconify text-gray-400 mt-0.5" data-icon="mdi:email"></span>
                        <div>
                            <div class="text-sm text-gray-800 font-medium"><?= htmlspecialchars($kh['email'] ?? 'Chưa cập nhật') ?></div>
                            <div class="text-xs text-gray-500">Email</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Demographics -->
            <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Thông tin cá nhân</h4>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Giới tính</div>
                        <div class="text-sm text-gray-800 font-medium">
                            <?php 
                            if (($kh['gioi_tinh'] ?? null) === 'nam') echo 'Nam';
                            elseif (($kh['gioi_tinh'] ?? null) === 'nu') echo 'Nữ';
                            else echo 'Khác';
                            ?>
                        </div>
                    </div>
                    <div>
                        <div class="text-xs text-gray-500 mb-1">Ngày sinh</div>
                        <div class="text-sm text-gray-800 font-medium">
                            <?= !empty($kh['ngay_sinh']) ? date('d/m/Y', strtotime($kh['ngay_sinh'])) : 'Chưa cập nhật' ?>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="text-xs text-gray-500 mb-1">Bản mệnh phong thủy</div>
                        <div class="text-sm text-gray-800 font-medium flex items-center gap-2">
                            <?= !empty($kh['ten_menh']) ? htmlspecialchars($kh['ten_menh']) : 'Chưa cập nhật' ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Spending & Notes -->
            <div class="bg-gray-50 rounded-xl p-5 border border-gray-100 flex flex-col justify-between">
                <div>
                    <h4 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-4">Tổng chi tiêu</h4>
                    <div class="text-2xl font-bold text-[#6B0D18]">
                        <?= number_format($kh['tong_chi_tieu'] ?? 0, 0, ',', '.') ?>đ
                    </div>
                </div>
                
                <div class="mt-4 pt-4 border-t border-gray-200">
                    <div class="text-xs text-gray-500 mb-1 flex items-center gap-1">
                        <span class="iconify" data-icon="mdi:note-edit-outline"></span> Ghi chú VIP
                    </div>
                    <div class="text-sm text-gray-800 italic">
                        <?= !empty($kh['ghi_chu_vip']) ? nl2br(htmlspecialchars($kh['ghi_chu_vip'])) : '<span class="text-gray-400">Không có ghi chú</span>' ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
