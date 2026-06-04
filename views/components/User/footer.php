<?php
/**
 * Footer - Lấy dữ liệu động từ bảng cau_hinh
 */
$cauHinhModel = new \App\Models\Admin\CauHinhModel();
$footer_config = $cauHinhModel->getAll();

// Merge với giá trị mặc định
$fc = array_merge([
    'ten_cua_hang' => 'Chuỗi Ngọc Phong Thủy',
    'hotline_chinh' => '0901234567',
    'email' => 'hotro@chuoingoc.com',
    'dia_chi_chi_tiet' => '',
    'phuong_xa' => '',
    'quan_huyen' => '',
    'tinh_thanh' => '',
    'gio_lam_viec' => '08:00 - 21:00, Thứ 2 - Chủ nhật',
    'zalo' => '',
    'zalo_active' => '0',
    'facebook' => '',
    'facebook_active' => '0',
    'tiktok' => '',
    'tiktok_active' => '0',
    'youtube' => '',
    'youtube_active' => '0',
    'logo_chinh' => '',
    'logo_toi' => '',
    'mo_ta' => '',
    'slogan' => '',
], $footer_config);

// Build địa chỉ
$footer_address_parts = array_filter([$fc['dia_chi_chi_tiet'], $fc['phuong_xa'], $fc['quan_huyen'], $fc['tinh_thanh']]);
$footer_address = implode(', ', $footer_address_parts);
?>
<footer class="mt-auto" style="background: #111; color: #ccc;">
    <!-- Main Footer -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- Col 1: About -->
            <div data-aos="fade-up" data-aos-delay="0">
                <a href="<?= APP_URL ?>" class="inline-flex items-center gap-3 mb-6">
                    <?php if (!empty($fc['logo_toi'])): ?>
                        <img src="<?= htmlspecialchars($fc['logo_toi']) ?>" alt="<?= htmlspecialchars($fc['ten_cua_hang']) ?>" class="h-12 w-auto rounded-md">
                    <?php elseif (!empty($fc['logo_chinh'])): ?>
                        <img src="<?= htmlspecialchars($fc['logo_chinh']) ?>" alt="<?= htmlspecialchars($fc['ten_cua_hang']) ?>" class="h-12 w-auto rounded-md">
                    <?php else: ?>
                        <img src="<?= APP_URL ?>/images/Logo_.jpg" alt="Chuỗi Ngọc" class="h-12 w-auto rounded-md">
                    <?php endif; ?>
                    <div>
                        <h3 class="text-xl font-bold" style="color: #fff;"><?= htmlspecialchars($fc['ten_cua_hang']) ?></h3>
                        <?php if (!empty($fc['slogan'])): ?>
                        <p class="text-[10px] uppercase tracking-[0.15em] font-medium" style="color: #d4af37;"><?= htmlspecialchars(mb_strimwidth($fc['slogan'], 0, 40, '...')) ?></p>
                        <?php else: ?>
                        <p class="text-[10px] uppercase tracking-[0.15em] font-medium" style="color: #d4af37;">Phong Thủy</p>
                        <?php endif; ?>
                    </div>
                </a>
                <p class="text-sm leading-relaxed mb-6" style="color: #999;">
                    <?= htmlspecialchars(!empty($fc['mo_ta']) ? $fc['mo_ta'] : 'Chúng tôi tự hào mang đến những sản phẩm trang sức phong thủy chế tác từ đá tự nhiên 100%, giúp cân bằng năng lượng, thu hút tài lộc và bình an.') ?>
                </p>
                <div class="flex space-x-3">
                    <?php if (!empty($fc['facebook']) && $fc['facebook_active'] == 1): ?>
                    <a href="<?= htmlspecialchars($fc['facebook']) ?>" target="_blank" class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300" style="background: rgba(255,255,255,0.08); color: #999;" onmouseover="this.style.background='#8b0000';this.style.color='#fff'" onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='#999'" aria-label="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($fc['zalo']) && $fc['zalo_active'] == 1): ?>
                    <?php $footer_zalo_link = is_numeric($fc['zalo']) ? 'https://zalo.me/' . $fc['zalo'] : $fc['zalo']; ?>
                    <a href="<?= htmlspecialchars($footer_zalo_link) ?>" target="_blank" class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300" style="background: rgba(255,255,255,0.08); color: #999;" onmouseover="this.style.background='#0068FF';this.style.color='#fff'" onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='#999'" aria-label="Zalo">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.477 2 2 6.03 2 11c0 2.84 1.48 5.37 3.79 7.02-.13.78-.45 1.83-1.03 2.71-.14.21.03.48.28.43 2.05-.44 4.05-1.58 5.35-2.58A10.74 10.74 0 0012 20c5.523 0 10-4.03 10-9s-4.477-9-10-9z"/></svg>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($fc['tiktok']) && $fc['tiktok_active'] == 1): ?>
                    <a href="<?= htmlspecialchars($fc['tiktok']) ?>" target="_blank" class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300" style="background: rgba(255,255,255,0.08); color: #999;" onmouseover="this.style.background='#111';this.style.color='#fff';this.style.border='1px solid #fff'" onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='#999';this.style.border='none'" aria-label="TikTok">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-2.88 2.5 2.89 2.89 0 01-2.89-2.89 2.89 2.89 0 012.89-2.89c.28 0 .54.04.79.11V9a6.33 6.33 0 00-.79-.05A6.34 6.34 0 003.15 15.3a6.34 6.34 0 0010.86 4.43v-7.15a8.16 8.16 0 005.58 2.17V11.3a4.85 4.85 0 01-3.77-1.84V6.69z"/></svg>
                    </a>
                    <?php endif; ?>
                    <?php if (!empty($fc['youtube']) && $fc['youtube_active'] == 1): ?>
                    <a href="<?= htmlspecialchars($fc['youtube']) ?>" target="_blank" class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300" style="background: rgba(255,255,255,0.08); color: #999;" onmouseover="this.style.background='#FF0000';this.style.color='#fff'" onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='#999'" aria-label="YouTube">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Col 2: Liên kết nhanh -->
            <div data-aos="fade-up" data-aos-delay="100">
                <h4 class="font-semibold mb-6 uppercase tracking-wider text-sm" style="color: #fff;">
                    Liên Kết Nhanh
                    <span class="block w-8 h-0.5 mt-2" style="background: #d4af37;"></span>
                </h4>
                <ul class="space-y-3">
                    <?php
                    $lien_ket = [
                        ['Trang chủ', APP_URL . '/'],
                        ['Sản phẩm', APP_URL . '/san-pham'],
                        ['Khuyến mãi', APP_URL . '/khuyen-mai'],
                        ['Bài viết', APP_URL . '/bai-viet'],
                        ['Liên hệ', APP_URL . '/lien-he'],
                    ];
                    foreach($lien_ket as $lk): ?>
                    <li>
                        <a href="<?= $lk[1] ?>" class="flex items-center text-sm transition-colors group" style="color: #999;" onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#999'">
                            <span class="mr-2 transition-transform group-hover:translate-x-1" style="color: #d4af37;">›</span>
                            <?= $lk[0] ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Col 3: Hỗ trợ khách hàng -->
            <div data-aos="fade-up" data-aos-delay="200">
                <h4 class="font-semibold mb-6 uppercase tracking-wider text-sm" style="color: #fff;">
                    Hỗ Trợ Khách Hàng
                    <span class="block w-8 h-0.5 mt-2" style="background: #d4af37;"></span>
                </h4>
                <ul class="space-y-3">
                    <?php
                    $ho_tro = [
                        ['Vòng theo mệnh', APP_URL . '/vong-theo-menh'],
                        ['Kiểm tra đơn hàng', APP_URL . '/tai-khoan'],
                        ['Câu hỏi thường gặp', APP_URL . '/lien-he#faq'],
                        ['Liên hệ hỗ trợ', APP_URL . '/lien-he'],
                    ];
                    foreach($ho_tro as $ht): ?>
                    <li>
                        <a href="<?= $ht[1] ?>" class="flex items-center text-sm transition-colors group" style="color: #999;" onmouseover="this.style.color='#d4af37'" onmouseout="this.style.color='#999'">
                            <span class="mr-2 transition-transform group-hover:translate-x-1" style="color: #d4af37;">›</span>
                            <?= $ht[0] ?>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Col 4: Thông tin liên hệ (ĐỘNG từ DB) -->
            <div data-aos="fade-up" data-aos-delay="300">
                <h4 class="font-semibold mb-6 uppercase tracking-wider text-sm" style="color: #fff;">
                    Thông Tin Liên Hệ
                    <span class="block w-8 h-0.5 mt-2" style="background: #d4af37;"></span>
                </h4>
                <ul class="space-y-4">
                    <?php if (!empty($footer_address)): ?>
                    <li class="flex items-start">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center mr-3 mt-0.5 shrink-0" style="background: rgba(139,0,0,0.2);">
                            <svg class="w-4 h-4" style="color: #d4af37;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        </div>
                        <span class="text-sm pt-1" style="color: #999;"><?= htmlspecialchars($footer_address) ?></span>
                    </li>
                    <?php endif; ?>

                    <li class="flex items-start">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center mr-3 mt-0.5 shrink-0" style="background: rgba(139,0,0,0.2);">
                            <svg class="w-4 h-4" style="color: #d4af37;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        </div>
                        <span class="text-sm pt-1" style="color: #999;">Hotline: <a href="tel:<?= htmlspecialchars($fc['hotline_chinh']) ?>" style="color: #d4af37;" class="font-semibold hover:opacity-80 transition-opacity"><?= format_phone_number($fc['hotline_chinh']) ?></a></span>
                    </li>

                    <?php if (!empty($fc['email'])): ?>
                    <li class="flex items-start">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center mr-3 mt-0.5 shrink-0" style="background: rgba(139,0,0,0.2);">
                            <svg class="w-4 h-4" style="color: #d4af37;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="text-sm pt-1" style="color: #999;">Email: <a href="mailto:<?= htmlspecialchars($fc['email']) ?>" style="color: #d4af37;" class="hover:opacity-80 transition-opacity"><?= htmlspecialchars($fc['email']) ?></a></span>
                    </li>
                    <?php endif; ?>

                    <li class="flex items-start">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center mr-3 mt-0.5 shrink-0" style="background: rgba(139,0,0,0.2);">
                            <svg class="w-4 h-4" style="color: #d4af37;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <span class="text-sm pt-1" style="color: #999;">Mở cửa: <?= htmlspecialchars($fc['gio_lam_viec']) ?></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Bottom Bar -->
    <div class="border-t" style="border-color: rgba(255,255,255,0.08);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col md:flex-row justify-between items-center text-sm" style="color: #666;">
            <p>&copy; <?= date('Y') ?> <?= htmlspecialchars($fc['ten_cua_hang']) ?>. Đã đăng ký bản quyền.</p>
            <div class="mt-4 md:mt-0 flex space-x-4 items-center">
                <span class="mr-2" style="color: #555;">Thanh toán an toàn qua:</span>
                <img src="<?= APP_URL ?>/images/logo/vnpay-logo.png" alt="VNPay" class="h-5 opacity-50 hover:opacity-100 transition">
                <img src="<?= APP_URL ?>/images/logo/mastercard-logo.png" alt="Mastercard" class="h-6 opacity-50 hover:opacity-100 transition">
                <img src="<?= APP_URL ?>/images/logo/visa-logo.png" alt="Visa" class="h-5 opacity-50 hover:opacity-100 transition">
            </div>
        </div>
    </div>
</footer>
