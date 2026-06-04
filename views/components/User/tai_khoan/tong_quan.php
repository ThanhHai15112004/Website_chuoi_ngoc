<?php
use App\Constants\DonHangConstants;

// Helper map trạng thái đơn hàng
$trangThaiMap = [
    DonHangConstants::TRANG_THAI_CHO_XU_LY => ['text' => 'Chờ xác nhận', 'bg' => 'bg-yellow-100', 'color' => 'text-yellow-800'],
    DonHangConstants::TRANG_THAI_DANG_XU_LY => ['text' => 'Đang xử lý', 'bg' => 'bg-blue-100', 'color' => 'text-blue-800'],
    DonHangConstants::TRANG_THAI_DA_GIAO_CHO_DON_VI_VAN_CHUYEN => ['text' => 'Đang giao', 'bg' => 'bg-teal-100', 'color' => 'text-teal-800'],
    DonHangConstants::TRANG_THAI_DA_GIAO_HANG => ['text' => 'Hoàn thành', 'bg' => 'bg-green-100', 'color' => 'text-green-800'],
    DonHangConstants::TRANG_THAI_DA_HUY => ['text' => 'Đã hủy', 'bg' => 'bg-red-100', 'color' => 'text-red-800'],
];
?>
<div class="bg-white rounded-2xl shadow-sm p-6 lg:p-10">
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-bold text-gray-900">Tổng quan tài khoản</h2>
    </div>

    <!-- User Info & Membership Card -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <!-- Personal Info -->
        <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
            <div class="flex items-start justify-between mb-6">
                <h3 class="text-lg font-bold text-gray-900">Thông tin cá nhân</h3>
                <button class="text-sm text-[#8b0000] font-medium hover:opacity-80 transition-opacity flex items-center gap-1" onclick="document.querySelector('[data-target=\'tab-ho-so\']').click()">
                    <iconify-icon icon="ph:pencil-simple"></iconify-icon> Chỉnh sửa
                </button>
            </div>
            <div class="space-y-4">
                <div class="flex items-center text-gray-600">
                    <iconify-icon icon="ph:user" class="text-xl mr-3 text-gray-400"></iconify-icon>
                    <span class="font-medium text-gray-800"><?= htmlspecialchars($user['ho_ten'] ?? 'Chưa cập nhật') ?></span>
                </div>
                <div class="flex items-center text-gray-600">
                    <iconify-icon icon="ph:envelope-simple" class="text-xl mr-3 text-gray-400"></iconify-icon>
                    <span><?= htmlspecialchars($user['email'] ?? 'Chưa cập nhật') ?></span>
                </div>
                <div class="flex items-center text-gray-600">
                    <iconify-icon icon="ph:phone" class="text-xl mr-3 text-gray-400"></iconify-icon>
                    <span><?= !empty($user['so_dien_thoai']) ? format_phone_number($user['so_dien_thoai']) : 'Chưa cập nhật' ?></span>
                </div>
            </div>
        </div>

        <!-- Membership Status -->
        <?php
        $hangHienTai = $user['hang_thanh_vien'] ?? null;
        $chiTieu = (float)($user['tong_chi_tieu'] ?? 0);
        ?>
        <div class="bg-gradient-to-br from-yellow-50 via-amber-100 to-yellow-200 rounded-2xl p-6 border border-yellow-300 relative overflow-hidden shadow-sm">
            <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-yellow-300 opacity-30 rounded-full blur-2xl"></div>
            <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-24 h-24 bg-amber-400 opacity-30 rounded-full blur-2xl"></div>
            
            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900">Hạng thành viên</h3>
                    <iconify-icon icon="ph:crown-simple-fill" class="text-3xl text-yellow-600 drop-shadow-md"></iconify-icon>
                </div>
                <div class="text-3xl font-bold text-yellow-700 mb-1"><?= htmlspecialchars($hangHienTai['ten_hang'] ?? 'Chưa có hạng') ?></div>
                <?php if ($hangHienTai && !empty($hangHienTai['phan_tram_giam'])): ?>
                <p class="text-sm text-yellow-800 mb-4">Bạn đang hưởng ưu đãi giảm <span class="font-bold"><?= (int)$hangHienTai['phan_tram_giam'] ?>%</span> cho mọi đơn hàng.</p>
                <?php else: ?>
                <p class="text-sm text-yellow-800 mb-4">Mua sắm thêm để nhận ưu đãi thành viên!</p>
                <?php endif; ?>
                
                <?php if ($hang_tiep_theo): ?>
                <div class="mt-4">
                    <?php 
                    $chiTieuHangTiep = (float)$hang_tiep_theo['chi_tieu_toi_thieu'];
                    $progress = $chiTieuHangTiep > 0 ? min(100, ($chiTieu / $chiTieuHangTiep) * 100) : 0;
                    $conThieu = max(0, $chiTieuHangTiep - $chiTieu);
                    ?>
                    <div class="flex justify-between text-xs text-yellow-800 mb-1">
                        <span>Chi tiêu: <?= number_format($chiTieu, 0, ',', '.') ?>đ</span>
                        <span><?= htmlspecialchars($hang_tiep_theo['ten_hang']) ?>: <?= number_format($chiTieuHangTiep, 0, ',', '.') ?>đ</span>
                    </div>
                    <div class="w-full bg-yellow-200 rounded-full h-2">
                        <div class="bg-yellow-500 h-2 rounded-full" style="width: <?= $progress ?>%"></div>
                    </div>
                    <p class="text-xs text-yellow-700 mt-2 text-right">Mua thêm <?= number_format($conThieu, 0, ',', '.') ?>đ để thăng hạng</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Quick Stats -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-10">
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm text-center cursor-pointer hover:shadow-md hover:-translate-y-1 transition-all duration-300" onclick="document.querySelector('[data-target=\'tab-don-hang\']').click()">
            <div class="w-14 h-14 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center mx-auto mb-3">
                <iconify-icon icon="ph:package" class="text-2xl"></iconify-icon>
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= $tong_quan['tong_don'] ?? 0 ?></div>
            <div class="text-xs text-gray-500 uppercase tracking-wider font-medium mt-1">Đơn hàng</div>
        </div>
        
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm text-center cursor-pointer hover:shadow-md hover:-translate-y-1 transition-all duration-300" onclick="document.querySelector('[data-target=\'tab-voucher\']').click()">
            <div class="w-14 h-14 rounded-full bg-green-50 text-green-600 flex items-center justify-center mx-auto mb-3">
                <iconify-icon icon="ph:ticket" class="text-2xl"></iconify-icon>
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= $tong_quan['tong_voucher'] ?? 0 ?></div>
            <div class="text-xs text-gray-500 uppercase tracking-wider font-medium mt-1">Voucher</div>
        </div>
        
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm text-center cursor-pointer hover:shadow-md hover:-translate-y-1 transition-all duration-300" onclick="document.querySelector('[data-target=\'tab-yeu-thich\']').click()">
            <div class="w-14 h-14 rounded-full bg-red-50 text-red-600 flex items-center justify-center mx-auto mb-3">
                <iconify-icon icon="ph:heart" class="text-2xl"></iconify-icon>
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= $tong_quan['tong_yeu_thich'] ?? 0 ?></div>
            <div class="text-xs text-gray-500 uppercase tracking-wider font-medium mt-1">Yêu thích</div>
        </div>
        
        <div class="bg-white rounded-2xl p-5 border border-gray-100 shadow-sm text-center cursor-pointer hover:shadow-md hover:-translate-y-1 transition-all duration-300" onclick="document.querySelector('[data-target=\'tab-hop-thu\']').click()">
            <div class="w-14 h-14 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center mx-auto mb-3 relative">
                <iconify-icon icon="ph:bell" class="text-2xl"></iconify-icon>
                <?php if (($tong_quan['thong_bao_chua_doc'] ?? 0) > 0): ?>
                <span class="absolute top-1 right-1 w-3.5 h-3.5 bg-red-500 rounded-full border-2 border-white"></span>
                <?php endif; ?>
            </div>
            <div class="text-2xl font-bold text-gray-900"><?= $tong_quan['thong_bao_chua_doc'] ?? 0 ?></div>
            <div class="text-xs text-gray-500 uppercase tracking-wider font-medium mt-1">Thông báo</div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div>
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-bold text-gray-900">Đơn hàng gần đây</h3>
            <button class="text-sm text-[#8b0000] font-medium hover:opacity-80 transition-opacity flex items-center gap-1" onclick="document.querySelector('[data-target=\'tab-don-hang\']').click()">Xem tất cả <iconify-icon icon="ph:caret-right"></iconify-icon></button>
        </div>
        
        <?php if (!empty($don_hang_gan_day)): ?>
        <div class="overflow-x-auto rounded-2xl border border-gray-100 shadow-sm">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm border-b border-gray-100">
                        <th class="py-3 px-4 font-medium">Mã đơn</th>
                        <th class="py-3 px-4 font-medium">Ngày đặt</th>
                        <th class="py-3 px-4 font-medium">Sản phẩm</th>
                        <th class="py-3 px-4 font-medium">Tổng tiền</th>
                        <th class="py-3 px-4 font-medium">Trạng thái</th>
                    </tr>
                </thead>
                <tbody class="text-sm divide-y divide-gray-100">
                    <?php foreach ($don_hang_gan_day as $dh): ?>
                    <?php $tt = $trangThaiMap[$dh['trang_thai_don_hang']] ?? ['text' => 'Không rõ', 'bg' => 'bg-gray-100', 'color' => 'text-gray-800']; ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="py-4 px-4 font-medium text-gray-900">#<?= htmlspecialchars($dh['ma_don_hang']) ?></td>
                        <td class="py-4 px-4 text-gray-500"><?= date('d/m/Y', strtotime($dh['ngay_tao'])) ?></td>
                        <td class="py-4 px-4">
                            <div class="flex items-center">
                                <?php 
                                $firstProduct = !empty($dh['chi_tiet']) ? $dh['chi_tiet'][0] : null;
                                $tenSP = $firstProduct ? $firstProduct['ten_sp'] : 'Sản phẩm';
                                $hinhSP = $firstProduct && !empty($firstProduct['hinh_anh_chinh']) ? $firstProduct['hinh_anh_chinh'] : '';
                                $soSP = count($dh['chi_tiet'] ?? []);
                                ?>
                                <div class="w-12 h-12 rounded-xl bg-gray-100 mr-4 overflow-hidden">
                                    <?php if (!empty($hinhSP)): ?>
                                    <img src="<?= get_image_url($hinhSP) ?>" alt="" class="w-full h-full object-cover">
                                    <?php else: ?>
                                    <div class="w-full h-full bg-[#8b0000] opacity-20"></div>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <span class="text-gray-800 font-medium line-clamp-1"><?= htmlspecialchars($tenSP) ?></span>
                                    <?php if ($soSP > 1): ?>
                                    <span class="text-xs text-gray-400">+<?= $soSP - 1 ?> sản phẩm khác</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </td>
                        <td class="py-4 px-4 font-medium text-[#8b0000]"><?= number_format($dh['thanh_tien'], 0, ',', '.') ?>đ</td>
                        <td class="py-4 px-4">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $tt['bg'] ?> <?= $tt['color'] ?>">
                                <?= $tt['text'] ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
        <div class="text-center py-10 text-gray-500">
            <iconify-icon icon="ph:package" class="text-5xl text-gray-300 mb-3"></iconify-icon>
            <p>Bạn chưa có đơn hàng nào. <a href="<?= APP_URL ?>/san-pham" class="text-[#8b0000] font-medium hover:opacity-80 transition-opacity">Mua sắm ngay!</a></p>
        </div>
        <?php endif; ?>
    </div>
</div>
