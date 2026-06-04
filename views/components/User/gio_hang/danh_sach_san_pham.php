<!-- Cột trái: Danh sách sản phẩm -->
<div class="lg:w-2/3 space-y-4">
    
    <!-- Phần header danh sách -->
    <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 flex items-center justify-between hidden md:flex">
        <div class="flex items-center gap-3 w-1/2">
            <input type="checkbox" id="check-all" class="w-5 h-5 rounded border-gray-300 text-[#8B0000] focus:ring-[#8B0000]">
            <label for="check-all" class="font-medium text-gray-700 cursor-pointer">Chọn tất cả (<?= count($gio_hang) ?>)</label>
        </div>
        <div class="w-1/6 text-center text-gray-500 text-sm">Đơn giá</div>
        <div class="w-1/6 text-center text-gray-500 text-sm">Số lượng</div>
        <div class="w-1/6 text-right text-gray-500 text-sm">Thành tiền</div>
        <div class="w-8"></div> <!-- Spacer for delete icon -->
    </div>

    <!-- Danh sách items -->
    <div class="space-y-4" id="cart-items-list">
        <?php 
        foreach($gio_hang as $item): 
            $thanh_tien = $item['gia'] * $item['so_luong'];
        ?>
        <div class="cart-item bg-white p-4 rounded-xl shadow-sm border border-gray-100 relative group transition-all hover:shadow-md <?= !$item['con_hang'] ? 'opacity-60 grayscale-[0.5]' : '' ?>" 
             data-cart-id="<?= $item['cart_id'] ?>"
             data-price="<?= $item['gia'] ?>">
            <div class="flex flex-col md:flex-row items-start md:items-center gap-4">
                <!-- Checkbox & Image -->
                <div class="flex items-center gap-3 md:w-1/2">
                    <input type="checkbox" class="cart-checkbox w-5 h-5 rounded border-gray-300 text-[#8B0000] focus:ring-[#8B0000]" <?= !$item['con_hang'] ? 'disabled' : 'checked' ?>>
                    <div class="w-24 h-24 shrink-0 rounded-lg overflow-hidden border border-gray-100 relative">
                        <img src="<?= htmlspecialchars($item['hinh_anh']) ?>" alt="<?= htmlspecialchars($item['ten']) ?>" class="w-full h-full object-cover">
                        <?php if(!$item['con_hang']): ?>
                            <div class="absolute inset-0 bg-black/50 flex items-center justify-center">
                                <span class="bg-gray-800 text-white text-xs font-bold px-2 py-1 rounded">Hết hàng</span>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="flex-1">
                        <a href="<?= APP_URL ?>/chi-tiet-san-pham?id=<?= $item['id_san_pham'] ?>" class="font-medium text-gray-800 hover:text-[#8B0000] line-clamp-2 transition-colors mb-1"><?= htmlspecialchars($item['ten']) ?></a>
                        <div class="text-xs text-gray-500 space-y-0.5">
                            <?php if (!empty($item['loai_da'])): ?>
                                <p>Đá: <?= htmlspecialchars($item['loai_da']) ?></p>
                            <?php endif; ?>
                            <?php if (!empty($item['bien_the'])): ?>
                                <p>Phân loại: <?= htmlspecialchars($item['bien_the']) ?></p>
                            <?php endif; ?>
                            <?php if (!empty($item['menh'])): ?>
                                <p>Mệnh: <?= htmlspecialchars($item['menh']) ?></p>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Cảnh báo số lượng trên mobile -->
                        <?php if($item['con_hang'] && $item['ton_kho'] <= 5): ?>
                            <p class="text-xs text-red-500 mt-1 md:hidden">Chỉ còn <?= $item['ton_kho'] ?> sản phẩm!</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Đơn giá -->
                <div class="hidden md:block w-1/6 text-center">
                    <div class="font-medium text-gray-800"><?= number_format($item['gia'], 0, ',', '.') ?>đ</div>
                    <?php if($item['gia_goc']): ?>
                        <div class="text-xs text-gray-400 line-through"><?= number_format($item['gia_goc'], 0, ',', '.') ?>đ</div>
                    <?php endif; ?>
                </div>

                <!-- Số lượng -->
                <div class="w-full md:w-1/6 flex justify-between md:justify-center items-center mt-3 md:mt-0">
                    <span class="md:hidden text-sm text-gray-500">Số lượng:</span>
                    <?php if($item['con_hang']): ?>
                        <div class="flex items-center border border-gray-300 rounded-full h-8 overflow-hidden bg-white">
                            <button type="button" class="qty-btn w-8 h-full flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-[#8B0000] transition-colors" data-action="decrease" title="Giảm">-</button>
                            <input type="text" value="<?= $item['so_luong'] ?>" class="qty-input w-10 h-full text-center text-sm font-medium border-none focus:ring-0 p-0" readonly data-max="<?= min($item['ton_kho'], 50) ?>">
                            <button type="button" class="qty-btn w-8 h-full flex items-center justify-center text-gray-500 hover:bg-gray-100 hover:text-[#8B0000] transition-colors" data-action="increase" title="Tăng">+</button>
                        </div>
                    <?php else: ?>
                        <span class="text-sm text-gray-400">---</span>
                    <?php endif; ?>
                </div>

                <!-- Thành tiền & Giá Mobile -->
                <div class="w-full md:w-1/6 flex justify-between md:block items-center mt-2 md:mt-0 md:text-right">
                    <div class="md:hidden">
                        <span class="font-medium text-gray-800"><?= number_format($item['gia'], 0, ',', '.') ?>đ</span>
                    </div>
                    <div>
                        <span class="md:hidden text-sm text-gray-500 mr-2">Tổng:</span>
                        <span class="item-total font-bold text-[#8B0000]"><?= number_format($thanh_tien, 0, ',', '.') ?>đ</span>
                    </div>
                </div>

                <!-- Nút xóa -->
                <div class="absolute top-4 right-4 md:relative md:top-auto md:right-auto md:w-8 md:text-right">
                    <button type="button" class="btn-remove text-gray-400 hover:text-red-500 transition-colors p-1" title="Xóa sản phẩm">
                        <iconify-icon icon="mdi:trash-can-outline" class="text-xl"></iconify-icon>
                    </button>
                </div>
            </div>
            <!-- Cảnh báo số lượng trên desktop -->
            <?php if($item['con_hang'] && $item['ton_kho'] <= 5): ?>
                <p class="text-xs text-red-500 mt-2 hidden md:block md:ml-12">Chỉ còn <?= $item['ton_kho'] ?> sản phẩm trong kho!</p>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
    
    <!-- Các thao tác chung -->
    <div class="flex items-center justify-between pt-4">
        <button id="btn-delete-selected" class="text-sm font-medium text-red-500 hover:text-red-700 transition-colors">
            Xóa sản phẩm đã chọn
        </button>
        <a href="<?= APP_URL ?>/" class="text-sm font-medium text-[#8B0000] hover:opacity-80 transition-opacity flex items-center gap-1">
            <iconify-icon icon="mdi:arrow-left" class="text-base"></iconify-icon>
            Tiếp tục mua sắm
        </a>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const cartList = document.getElementById('cart-items-list');
    if (!cartList) return;

    // Format VND
    function formatVND(price) {
        return new Intl.NumberFormat('vi-VN').format(Math.round(price)) + 'đ';
    }

    // Recalculate totals
    function recalcTotals() {
        let total = 0;
        let savings = 0;
        document.querySelectorAll('.cart-item').forEach(item => {
            const checkbox = item.querySelector('.cart-checkbox');
            if (checkbox && checkbox.checked && !checkbox.disabled) {
                const price = parseFloat(item.dataset.price);
                const qty = parseInt(item.querySelector('.qty-input')?.value || 0);
                total += price * qty;
            }
        });

        // Đọc discount từ DOM
        let discountAmount = 0;
        const discountRow = document.getElementById('cart-discount-row');
        if (discountRow && discountRow.style.display !== 'none') {
            const discountText = document.getElementById('cart-discount')?.textContent || '';
            const numStr = discountText.replace(/\D/g, '');
            if (numStr) {
                discountAmount = parseInt(numStr);
            }
        }

        const finalTotal = Math.max(0, total - discountAmount);

        // Update sidebar
        const totalEl = document.getElementById('cart-total');
        const subtotalEl = document.getElementById('cart-subtotal');
        if (totalEl) totalEl.textContent = formatVND(finalTotal);
        if (subtotalEl) subtotalEl.textContent = formatVND(total);
        
        // Update mobile bar
        const mobileTotal = document.querySelector('.mobile-cart-total');
        if (mobileTotal) mobileTotal.textContent = formatVND(finalTotal);
    }

    // Check All
    const checkAll = document.getElementById('check-all');
    if (checkAll) {
        checkAll.addEventListener('change', function() {
            document.querySelectorAll('.cart-checkbox:not(:disabled)').forEach(cb => {
                cb.checked = this.checked;
            });
            recalcTotals();
        });
    }

    // Individual checkbox
    cartList.addEventListener('change', function(e) {
        if (e.target.classList.contains('cart-checkbox')) {
            recalcTotals();
        }
    });

    // Quantity buttons
    cartList.addEventListener('click', async function(e) {
        const btn = e.target.closest('.qty-btn');
        if (!btn) return;

        const cartItem = btn.closest('.cart-item');
        const input = cartItem.querySelector('.qty-input');
        const cartId = cartItem.dataset.cartId;
        const maxQty = parseInt(input.dataset.max);
        let qty = parseInt(input.value);

        if (btn.dataset.action === 'decrease') {
            qty = Math.max(1, qty - 1);
        } else {
            qty = Math.min(maxQty, qty + 1);
        }

        input.value = qty;

        // Update item total
        const price = parseFloat(cartItem.dataset.price);
        const itemTotal = cartItem.querySelector('.item-total');
        if (itemTotal) itemTotal.textContent = formatVND(price * qty);

        recalcTotals();

        // Thêm loading UI state
        input.disabled = true;
        btn.style.opacity = '0.5';

        // API call
        await CartHelper.updateQty(cartId, qty);
        
        // Reload page to recalculate vouchers and totals server-side
        window.location.reload();
    });

    // Remove button
    cartList.addEventListener('click', async function(e) {
        const btn = e.target.closest('.btn-remove');
        if (!btn) return;

        const cartItem = btn.closest('.cart-item');
        const cartId = cartItem.dataset.cartId;

        const result = await CartHelper.removeItem(cartId);
        if (result && result.success) {
            cartItem.style.transition = 'all 0.3s ease';
            cartItem.style.opacity = '0';
            cartItem.style.transform = 'translateX(50px)';
            setTimeout(() => {
                cartItem.remove();
                recalcTotals();

                // Check if cart is empty
                if (document.querySelectorAll('.cart-item').length === 0) {
                    location.reload();
                }
            }, 300);
        }
    });

    // Delete selected
    document.getElementById('btn-delete-selected')?.addEventListener('click', async function() {
        const checked = document.querySelectorAll('.cart-checkbox:checked:not(:disabled)');
        if (checked.length === 0) {
            if (typeof Swal !== 'undefined') {
                Toast.fire({ icon: 'warning', title: 'Vui lòng chọn sản phẩm cần xóa.' });
            }
            return;
        }

        const confirm = await Swal.fire({
            title: 'Xóa sản phẩm?',
            text: `Bạn muốn xóa ${checked.length} sản phẩm đã chọn?`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#8B0000',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        });

        if (confirm.isConfirmed) {
            for (const cb of checked) {
                const cartItem = cb.closest('.cart-item');
                const cartId = cartItem.dataset.cartId;
                await CartHelper.removeItem(cartId);
                cartItem.remove();
            }
            recalcTotals();
            if (document.querySelectorAll('.cart-item').length === 0) {
                location.reload();
            }
        }
    });

    // Init totals
    recalcTotals();
});
</script>
