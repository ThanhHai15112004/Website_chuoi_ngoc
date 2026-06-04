<?php
$so_luong_sp = 0;
foreach ($gio_hang as $item) {
    $so_luong_sp += $item['so_luong'];
}
$tong_thanh_toan_hien_tai = max(0, $tong_tam_tinh - $tong_giam_gia);
?>
<div class="bg-white rounded-xl shadow-[0_4px_20px_-4px_rgba(0,0,0,0.08)] border border-gray-100 p-4 lg:p-5">
    <div class="flex items-center gap-2 mb-3 pb-3 border-b border-gray-100">
        <iconify-icon icon="mdi:receipt-text-outline" class="text-lg text-[#8B0000]"></iconify-icon>
        <h2 class="text-base font-bold text-gray-800">Tóm tắt đơn hàng</h2>
    </div>

    <div class="space-y-2.5 text-sm text-gray-600 mb-4">
        <div class="flex justify-between items-center">
            <span>Tạm tính (<?php echo $so_luong_sp; ?> sản phẩm)</span>
            <span class="font-medium text-gray-800"><?php echo number_format($tong_tam_tinh, 0, ',', '.'); ?>đ</span>
        </div>
        <div class="flex justify-between items-center">
            <span>Phí vận chuyển</span>
            <span id="display-phi-ship" class="font-medium text-green-600">Miễn phí</span>
        </div>
        <?php if ($order_discount > 0): ?>
        <div class="flex justify-between items-center text-green-600">
            <span>Voucher giảm giá</span>
            <span class="font-medium">-<?php echo number_format($order_discount, 0, ',', '.'); ?>đ</span>
        </div>
        <?php endif; ?>
    </div>

    <div class="flex justify-between items-center mb-4 pt-3 border-t border-gray-100">
        <span class="text-gray-800 font-bold text-sm">Tổng thanh toán</span>
        <span id="display-tong-thanh-toan" class="text-xl font-bold text-[#8B0000]" data-base-total="<?php echo max(0, $tong_tam_tinh - $order_discount); ?>" data-max-freeship="<?php echo $max_freeship_discount; ?>"><?php echo number_format($thanh_tien, 0, ',', '.'); ?>đ</span>
    </div>

    <?php $has_address = !empty($dia_chi_mac_dinh); ?>
    <button type="submit" id="btn-dat-hang" <?= !$has_address ? 'disabled' : '' ?> class="w-full <?= !$has_address ? 'bg-gray-400 cursor-not-allowed' : 'bg-[#8B0000] hover:bg-red-800 shadow-[0_4px_14px_0_rgba(139,0,0,0.3)] hover:shadow-[0_6px_20px_rgba(139,0,0,0.2)]' ?> text-white font-bold py-3 rounded-xl transition-all text-base uppercase flex justify-center items-center gap-2">
        <iconify-icon icon="<?= !$has_address ? 'mdi:map-marker-alert-outline' : 'mdi:shopping-outline' ?>" class="text-lg"></iconify-icon> <?= !$has_address ? 'Vui lòng nhập địa chỉ' : 'Đặt Hàng' ?>
    </button>

    <p class="text-[11px] text-gray-400 mt-3 text-center leading-relaxed">
        Bằng việc đặt hàng, bạn đồng ý với <a href="<?= APP_URL ?>/chinh-sach" class="text-[#8B0000] hover:underline" target="_blank">Điều khoản Chuỗi Ngọc</a>.
    </p>

    <div class="mt-3 pt-3 border-t border-gray-50 flex flex-wrap gap-x-4 gap-y-1 text-[11px] text-gray-400">
        <span class="flex items-center gap-1"><iconify-icon icon="mdi:truck-check-outline" class="text-green-500"></iconify-icon> Freeship từ 500K</span>
        <span class="flex items-center gap-1"><iconify-icon icon="mdi:shield-check-outline" class="text-green-500"></iconify-icon> Kiểm tra hàng</span>
        <span class="flex items-center gap-1"><iconify-icon icon="mdi:refresh-circle" class="text-green-500"></iconify-icon> Đổi trả 7 ngày</span>
    </div>
</div>

<script>
// Function to update checkout totals based on shipping fee
function updateCheckoutTotals(shippingFee) {
    const formatCurrency = (number) => new Intl.NumberFormat('vi-VN').format(number);

    const totalDisplay = document.getElementById('display-tong-thanh-toan');
    if (!totalDisplay) return;

    const baseTotal = parseInt(totalDisplay.getAttribute('data-base-total')) || 0;
    const maxFreeshipDiscount = parseInt(totalDisplay.getAttribute('data-max-freeship')) || 0;
    
    // Tính phí ship thực tế
    let actualShippingFee = Math.max(0, shippingFee - maxFreeshipDiscount);

    const feeDisplay = document.getElementById('display-phi-ship');
    if (feeDisplay) {
        if (actualShippingFee === 0) {
            feeDisplay.textContent = 'Miễn phí';
            feeDisplay.className = 'font-medium text-green-600';
        } else {
            feeDisplay.textContent = formatCurrency(actualShippingFee) + 'đ';
            feeDisplay.className = 'font-medium text-gray-800';
        }
    }

    // Cập nhật tổng tiền
    totalDisplay.textContent = formatCurrency(baseTotal + actualShippingFee) + 'đ';
}

// Validate form before submit
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('checkout-form');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        const ten = document.getElementById('hidden_ten')?.value?.trim();
        const sdt = document.getElementById('hidden_sdt')?.value?.trim();
        const diaChi = document.getElementById('hidden_dia_chi')?.value?.trim();
        const pttt = document.querySelector('input[name="phuong_thuc_thanh_toan"]:checked');

        const errors = [];
        if (!ten) errors.push('Họ tên người nhận');
        if (!sdt) errors.push('Số điện thoại');
        if (!diaChi) errors.push('Địa chỉ nhận hàng');
        if (!pttt) errors.push('Phương thức thanh toán');

        if (errors.length > 0) {
            e.preventDefault();
            const msg = 'Vui lòng bổ sung: ' + errors.join(', ');
            if (typeof CartHelper !== 'undefined') {
                CartHelper._toast(msg, 'error');
            } else {
                alert(msg);
            }
            return false;
        }

        // Show loading
        const btn = document.getElementById('btn-dat-hang');
        if (btn) {
            btn.disabled = true;
            btn.innerHTML = '<div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white mr-2"></div> Đang xử lý...';
        }
    });
});
</script>
