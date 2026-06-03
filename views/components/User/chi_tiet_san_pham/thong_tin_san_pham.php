<?php
/**
 * Component: Thông tin sản phẩm (Right Column)
 */
?>
<div class="product-info font-inter flex flex-col gap-6">
    <!-- Title & Rating -->
    <div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2 leading-tight">
            <?= htmlspecialchars($san_pham['ten']) ?>
        </h1>
        <div class="text-sm text-gray-500 mb-3">
            Mã sản phẩm: <?= htmlspecialchars($san_pham['ma_sp'] ?? 'Đang cập nhật') ?>
        </div>
        
        <div class="flex items-center text-sm">
            <div class="flex text-[#D4AF37] items-center">
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            </div>
            <span class="font-semibold text-gray-900 ml-1.5"><?= number_format($san_pham['danh_gia'], 1) ?></span>
            <span class="mx-2 text-gray-300">|</span>
            <a href="#danh-gia" class="text-gray-500 hover:text-[#8B0000] underline-offset-2 hover:underline"><?= number_format($san_pham['tong_danh_gia']) ?> đánh giá</a>
            <span class="mx-2 text-gray-300">|</span>
            <span class="text-gray-500">Đã bán <?= number_format($san_pham['da_ban']) ?></span>
        </div>
    </div>

    <!-- Price -->
    <div class="bg-[#FDFBF7] p-5 rounded-2xl border border-[#F0E6D2]">
        <div class="flex items-end gap-3 flex-wrap">
            <span id="display_price" class="text-3xl font-bold text-[#8B0000]">
                <?php 
                $basePrice = $san_pham['gia'];
                if (!empty($san_pham['bien_the_thuc_te'])) {
                    $basePrice += (float)$san_pham['bien_the_thuc_te'][0]['gia_cong_them'];
                }
                echo number_format($basePrice, 0, ',', '.');
                ?>đ
            </span>
            <?php if (!empty($san_pham['gia_cu'])): ?>
                <span class="text-lg text-gray-400 line-through mb-1"><?= number_format($san_pham['gia_cu'], 0, ',', '.') ?>đ</span>
                <?php if (!empty($san_pham['phan_tram_giam'])): ?>
                    <span class="bg-[#8B0000] text-white text-xs font-bold px-2 py-1 rounded mb-1.5 ml-2">Giảm <?= $san_pham['phan_tram_giam'] ?>%</span>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="text-xs text-gray-500 mt-2">Giá đã bao gồm VAT nếu có.</div>
    </div>

    <!-- Quick Attributes -->
    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 gap-x-4 text-sm">
            <?php foreach ($san_pham['thuoc_tinh'] as $label => $value): ?>
                <div class="flex items-start">
                    <span class="text-gray-500 w-28 shrink-0"><?= htmlspecialchars($label) ?>:</span>
                    <span class="font-medium text-gray-900 
                        <?php if(in_array($label, ['Mệnh phù hợp', 'Tình trạng'])) echo 'text-[#8B0000]'; ?>
                    ">
                        <?= htmlspecialchars($value) ?>
                    </span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <hr class="border-gray-100">

    <!-- Variants -->
    <?php if (!empty($san_pham['bien_the_thuc_te'])): ?>
        <div class="flex flex-col gap-5">
            <div>
                <h3 class="text-sm font-semibold text-gray-900 mb-3">Phân loại / Kích thước</h3>
                <div class="flex flex-wrap gap-2">
                    <?php foreach ($san_pham['bien_the_thuc_te'] as $index => $bt): ?>
                        <button type="button" 
                            class="variant-btn border rounded-lg px-4 py-2 text-sm transition-colors duration-200 
                            <?= $index === 0 ? 'border-[#8B0000] bg-[#8B0000] text-white' : 'border-gray-200 text-gray-700 bg-white hover:border-[#8B0000] hover:text-[#8B0000]' ?>"
                            data-price-add="<?= $bt['gia_cong_them'] ?>"
                            data-stock="<?= $bt['so_luong_ton'] ?>"
                            data-variant-id="<?= $bt['id'] ?>"
                            onclick="selectRealVariant(this)">
                            <?= htmlspecialchars($bt['thuoc_tinh']) ?>
                        </button>
                    <?php endforeach; ?>
                </div>
                <input type="hidden" name="id_bien_the" id="id_bien_the_input" value="<?= $san_pham['bien_the_thuc_te'][0]['id'] ?>">
            </div>
        </div>
    <?php endif; ?>

    <hr class="border-gray-100">

    <!-- Quantity & Action Buttons -->
    <div class="flex flex-col gap-4">
        <div class="flex items-center gap-4">
            <h3 class="text-sm font-semibold text-gray-900 w-20">Số lượng</h3>
            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden bg-white h-11">
                <button type="button" class="w-10 h-full flex items-center justify-center text-gray-600 hover:bg-gray-100 hover:text-[#8B0000] transition-colors" onclick="updateQuantity(-1)">-</button>
                <?php
                $max_qty = $san_pham['so_luong_con'];
                if (!empty($san_pham['bien_the_thuc_te'])) {
                    $max_qty = $san_pham['bien_the_thuc_te'][0]['so_luong_ton'];
                }
                ?>
                <input type="number" id="quantity" value="1" min="1" max="<?= $max_qty ?>" class="w-12 h-full text-center border-x border-gray-300 text-gray-900 font-medium focus:outline-none appearance-none" style="-moz-appearance: textfield;">
                <button type="button" class="w-10 h-full flex items-center justify-center text-gray-600 hover:bg-gray-100 hover:text-[#8B0000] transition-colors" onclick="updateQuantity(1)">+</button>
            </div>
            <span id="display_stock" class="text-sm text-gray-500">
                <?php if ($max_qty > 0): ?>
                    Còn <?= $max_qty ?> sản phẩm <?= !empty($san_pham['bien_the_thuc_te']) ? '(Phân loại này)' : '' ?>
                <?php else: ?>
                    <span class="text-red-500 font-medium">Đã hết hàng</span>
                <?php endif; ?>
            </span>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 mt-2">
            <button type="button" id="btn_add_cart" class="flex-1 border-2 border-[#8B0000] bg-white text-[#8B0000] hover:bg-[#8B0000] hover:text-white font-semibold rounded-xl py-3.5 flex items-center justify-center gap-2 transition-colors duration-300 <?= $max_qty <= 0 ? 'opacity-50 cursor-not-allowed' : '' ?>" <?= $max_qty <= 0 ? 'disabled' : '' ?>>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                Thêm vào giỏ
            </button>
            <button type="button" id="btn_buy_now" class="flex-1 bg-[#8B0000] text-white hover:bg-[#660000] font-semibold rounded-xl py-3.5 transition-colors duration-300 shadow-md <?= $max_qty <= 0 ? 'opacity-50 cursor-not-allowed' : '' ?>" <?= $max_qty <= 0 ? 'disabled' : '' ?>>
                <?= $max_qty <= 0 ? 'Hết hàng' : 'Mua ngay' ?>
            </button>
        </div>
        
        <div class="flex items-center justify-between text-sm text-gray-500 mt-2 px-1">
            <button type="button" class="flex items-center gap-1.5 hover:text-[#8B0000] transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                Thêm vào yêu thích
            </button>
            <div class="flex items-center gap-3">
                <span>Chia sẻ:</span>
                <a href="#" class="hover:text-[#1877F2] transition-colors"><svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg></a>
                <a href="#" class="hover:text-[#0068FF] transition-colors font-semibold text-xs border border-current rounded px-1 rounded-sm">Zalo</a>
                <button type="button" class="hover:text-gray-900 transition-colors"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg></button>
            </div>
        </div>
    </div>

    <!-- Quick Policies -->
    <div class="bg-[#FDFBF7] rounded-xl p-4 border border-[#F0E6D2]">
        <div class="grid grid-cols-2 gap-y-3 gap-x-2 text-xs text-gray-700">
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-full bg-[#8B0000]/10 flex items-center justify-center shrink-0">
                    <svg class="w-3.5 h-3.5 text-[#8B0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                </div>
                <span>Đá/ngọc chọn lọc kỹ</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-full bg-[#8B0000]/10 flex items-center justify-center shrink-0">
                    <svg class="w-3.5 h-3.5 text-[#8B0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                </div>
                <span>Tư vấn chọn theo mệnh</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-full bg-[#8B0000]/10 flex items-center justify-center shrink-0">
                    <svg class="w-3.5 h-3.5 text-[#8B0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
                <span>Đóng gói hộp sang trọng</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-full bg-[#8B0000]/10 flex items-center justify-center shrink-0">
                    <svg class="w-3.5 h-3.5 text-[#8B0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                </div>
                <span>Đổi trả theo chính sách</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-6 h-6 rounded-full bg-[#8B0000]/10 flex items-center justify-center shrink-0">
                    <svg class="w-3.5 h-3.5 text-[#8B0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <span>Giao hàng toàn quốc</span>
            </div>
        </div>
    </div>

    <!-- Vouchers -->
    <?php if (!empty($vouchers)): ?>
    <div class="mb-2">
        <h3 class="text-sm font-semibold text-gray-900 mb-3 flex items-center gap-2">
            <svg class="w-4 h-4 text-[#8B0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"></path></svg>
            Ưu đãi có thể áp dụng
        </h3>
        <div class="flex flex-col gap-2">
            <?php foreach ($vouchers as $vc): ?>
            <div class="flex items-center justify-between bg-red-50/50 border border-red-100 border-dashed rounded-lg p-3">
                <div class="flex flex-col">
                    <span class="text-sm font-medium text-[#8B0000]">
                        <?= htmlspecialchars($vc['ten_chuong_trinh']) ?>
                        <?php if ($vc['loai_giam'] == 1): ?>
                            (Giảm <?= $vc['gia_tri'] ?>%)
                        <?php elseif ($vc['loai_giam'] == 2): ?>
                            (Giảm <?= number_format($vc['gia_tri'], 0, ',', '.') ?>đ)
                        <?php elseif ($vc['loai_giam'] == 3): ?>
                            (Freeship)
                        <?php endif; ?>
                    </span>
                    <span class="text-xs text-gray-500">Cho đơn từ <?= number_format($vc['don_toi_thieu'], 0, ',', '.') ?>đ</span>
                </div>
                <?php if (in_array($vc['id'], $saved_vouchers ?? [])): ?>
                    <button class="bg-gray-200 text-gray-500 text-xs font-semibold px-3 py-1.5 rounded cursor-default flex items-center gap-1 btn-luu-voucher" disabled>
                        <iconify-icon icon="ph:check-circle-fill"></iconify-icon> Đã lưu
                    </button>
                <?php else: ?>
                    <button type="button" class="bg-[#8B0000] hover:bg-[#660000] text-white text-xs font-semibold px-3 py-1.5 rounded transition-colors btn-luu-voucher" data-id="<?= $vc['id'] ?>">Lưu mã</button>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php endif; ?>
</div>

<script>
    function updateQuantity(change) {
        const input = document.getElementById('quantity');
        let val = parseInt(input.value) + change;
        const max = parseInt(input.getAttribute('max'));
        const min = parseInt(input.getAttribute('min'));
        
        if (val < min) val = min;
        if (val > max) val = max;
        
        input.value = val;
    }

    function selectRealVariant(button) {
        // Find all buttons in the same group
        const container = button.parentElement;
        const buttons = container.querySelectorAll('.variant-btn');
        
        // Reset all
        buttons.forEach(btn => {
            btn.classList.remove('border-[#8B0000]', 'bg-[#8B0000]', 'text-white');
            btn.classList.add('border-gray-200', 'text-gray-700', 'bg-white');
        });
        
        // Set active
        button.classList.remove('border-gray-200', 'text-gray-700', 'bg-white');
        button.classList.add('border-[#8B0000]', 'bg-[#8B0000]', 'text-white');

        // Update hidden input
        document.getElementById('id_bien_the_input').value = button.getAttribute('data-variant-id');
        
        // Update price
        const basePrice = <?= $san_pham['gia'] ?>;
        const addPrice = parseFloat(button.getAttribute('data-price-add'));
        const newPrice = basePrice + addPrice;
        document.getElementById('display_price').innerText = new Intl.NumberFormat('vi-VN').format(newPrice) + 'đ';
        
        // Update stock
        const stock = parseInt(button.getAttribute('data-stock'));
        document.getElementById('quantity').setAttribute('max', stock);
        const stockDisplay = document.getElementById('display_stock');
        if (stock > 0) {
            stockDisplay.innerHTML = 'Còn ' + stock + ' sản phẩm (Phân loại này)';
            stockDisplay.className = 'text-sm text-gray-500';
            document.getElementById('btn_add_cart').disabled = false;
            document.getElementById('btn_add_cart').classList.remove('opacity-50', 'cursor-not-allowed');
            document.getElementById('btn_buy_now').disabled = false;
            document.getElementById('btn_buy_now').classList.remove('opacity-50', 'cursor-not-allowed');
            document.getElementById('btn_buy_now').innerText = 'Mua ngay';
        } else {
            stockDisplay.innerHTML = '<span class="text-red-500 font-medium">Phân loại này đã hết hàng</span>';
            document.getElementById('btn_add_cart').disabled = true;
            document.getElementById('btn_add_cart').classList.add('opacity-50', 'cursor-not-allowed');
            document.getElementById('btn_buy_now').disabled = true;
            document.getElementById('btn_buy_now').classList.add('opacity-50', 'cursor-not-allowed');
            document.getElementById('btn_buy_now').innerText = 'Hết hàng';
            
            if (parseInt(document.getElementById('quantity').value) > 1) {
                document.getElementById('quantity').value = 1;
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.btn-luu-voucher');
        buttons.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const voucherId = this.dataset.id;
                if (!voucherId) return;

                const originalText = this.innerHTML;
                this.innerHTML = '<iconify-icon icon="ph:spinner-gap" class="animate-spin"></iconify-icon>';
                this.disabled = true;

                const formData = new FormData();
                formData.append('voucher_id', voucherId);

                fetch('<?= APP_URL ?>/khuyen-mai/luu-voucher', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        });
                        this.innerHTML = '<iconify-icon icon="ph:check-circle-fill"></iconify-icon> Đã lưu';
                        this.className = 'bg-gray-200 text-gray-500 text-xs font-semibold px-3 py-1.5 rounded cursor-default flex items-center gap-1 btn-luu-voucher';
                        this.removeAttribute('data-id');
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.message
                        });
                        this.innerHTML = originalText;
                        this.disabled = false;
                        
                        if (data.message.includes('đăng nhập')) {
                            setTimeout(() => {
                                window.location.href = '<?= APP_URL ?>/dang-nhap';
                            }, 1500);
                        }
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Toast.fire({
                        icon: 'error',
                        title: 'Đã có lỗi xảy ra, vui lòng thử lại sau.'
                    });
                    this.innerHTML = originalText;
                    this.disabled = false;
                });
            });
        });
    });
</script>
