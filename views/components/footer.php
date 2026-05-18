<footer class="mt-auto" style="background: #111; color: #ccc;">
    <!-- Main Footer -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- Col 1: About -->
            <div data-aos="fade-up" data-aos-delay="0">
                <a href="<?= APP_URL ?>" class="inline-flex items-center gap-3 mb-6">
                    <img src="<?= APP_URL ?>/images/Logo_.jpg" alt="Chuỗi Ngọc" class="h-12 w-auto rounded-md">
                    <div>
                        <h3 class="text-xl font-bold" style="color: #fff;">Chuỗi Ngọc</h3>
                        <p class="text-[10px] uppercase tracking-[0.15em] font-medium" style="color: #d4af37;">Phong Thủy</p>
                    </div>
                </a>
                <p class="text-sm leading-relaxed mb-6" style="color: #999;">
                    Chúng tôi tự hào mang đến những sản phẩm trang sức phong thủy chế tác từ đá tự nhiên 100%, giúp cân bằng năng lượng, thu hút tài lộc và bình an.
                </p>
                <div class="flex space-x-3">
                    <?php 
                    $socials = [
                        ['icon' => 'M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z', 'label' => 'Twitter'],
                        ['icon' => 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z', 'label' => 'Instagram'],
                        ['icon' => 'M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z', 'label' => 'Facebook'],
                    ];
                    foreach($socials as $s): ?>
                    <a href="#" class="w-10 h-10 rounded-full flex items-center justify-center transition-all duration-300" style="background: rgba(255,255,255,0.08); color: #999;" onmouseover="this.style.background='#8b0000';this.style.color='#fff'" onmouseout="this.style.background='rgba(255,255,255,0.08)';this.style.color='#999'" aria-label="<?= $s['label'] ?>">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="<?= $s['icon'] ?>"/></svg>
                    </a>
                    <?php endforeach; ?>
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
                        ['Sản phẩm', APP_URL . '/products'],
                        ['Bộ sưu tập', APP_URL . '/collections'],
                        ['Kiến thức phong thủy', APP_URL . '/blogs'],
                        ['Về chúng tôi', APP_URL . '/about'],
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
                        ['Chính sách bảo hành', APP_URL . '/policy'],
                        ['Chính sách vận chuyển', APP_URL . '/shipping'],
                        ['Đổi trả & Hoàn tiền', APP_URL . '/return-policy'],
                        ['Câu hỏi thường gặp', APP_URL . '/faq'],
                        ['Liên hệ', APP_URL . '/contact'],
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

            <!-- Col 4: Thông tin liên hệ -->
            <div data-aos="fade-up" data-aos-delay="300">
                <h4 class="font-semibold mb-6 uppercase tracking-wider text-sm" style="color: #fff;">
                    Thông Tin Liên Hệ
                    <span class="block w-8 h-0.5 mt-2" style="background: #d4af37;"></span>
                </h4>
                <ul class="space-y-4">
                    <?php
                    $lien_he = [
                        ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>', 'text' => '123 Đường Ngọc Bích, Phường Bến Nghé, Quận 1, TP.HCM'],
                        ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>', 'text' => 'Hotline: <strong style="color: #d4af37;">0909.123.456</strong> (Zalo)'],
                        ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>', 'text' => 'Email: contact@chuoingoc.com'],
                        ['icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>', 'text' => 'Mở cửa: 08:00 - 21:00 hàng ngày'],
                    ];
                    foreach($lien_he as $lh): ?>
                    <li class="flex items-start">
                        <div class="w-8 h-8 rounded-full flex items-center justify-center mr-3 mt-0.5 shrink-0" style="background: rgba(139,0,0,0.2);">
                            <svg class="w-4 h-4" style="color: #d4af37;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><?= $lh['icon'] ?></svg>
                        </div>
                        <span class="text-sm pt-1" style="color: #999;"><?= $lh['text'] ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Bottom Bar -->
    <div class="border-t" style="border-color: rgba(255,255,255,0.08);">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex flex-col md:flex-row justify-between items-center text-sm" style="color: #666;">
            <p>&copy; <?= date('Y') ?> Chuỗi Ngọc Phong Thủy. Đã đăng ký bản quyền.</p>
            <div class="mt-4 md:mt-0 flex space-x-4 items-center">
                <span class="mr-2" style="color: #555;">Thanh toán an toàn qua:</span>
                <img src="<?= APP_URL ?>/images/logo/vnpay-logo.png" alt="VNPay" class="h-5 opacity-50 hover:opacity-100 transition">
                <img src="<?= APP_URL ?>/images/logo/mastercard-logo.png" alt="Mastercard" class="h-6 opacity-50 hover:opacity-100 transition">
                <img src="<?= APP_URL ?>/images/logo/visa-logo.png" alt="Visa" class="h-5 opacity-50 hover:opacity-100 transition">
            </div>
        </div>
    </div>
</footer>
