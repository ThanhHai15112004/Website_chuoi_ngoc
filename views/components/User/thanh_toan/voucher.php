<?php
// Lấy tổng tạm tính để hiển thị điều kiện voucher
$tong_gio_hang = 0;
foreach ($gio_hang as $item) {
    $tong_gio_hang += $item['gia'] * $item['so_luong'];
}
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 lg:p-6">
    <div class="flex items-center justify-between mb-4 pb-4 border-b border-gray-100">
        <div class="flex items-center gap-2">
            <iconify-icon icon="mdi:ticket-percent-outline" class="text-xl text-[#8B0000]"></iconify-icon>
            <h2 class="text-lg font-bold text-gray-800">Mã giảm giá</h2>
        </div>
        <button type="button" onclick="openCheckoutVoucherModal()" class="inline-flex items-center gap-1 text-[#8B0000] hover:bg-red-50 font-medium rounded-lg px-3 py-1.5 transition-colors text-sm border border-[#8B0000]/30">
            <iconify-icon icon="mdi:ticket-outline" class="text-lg"></iconify-icon>
            Chọn Voucher <iconify-icon icon="mdi:chevron-right"></iconify-icon>
        </button>
    </div>

    <?php if (!empty($danh_sach_voucher_ap_dung)): ?>
        <div class="space-y-3">
        <?php foreach ($danh_sach_voucher_ap_dung as $voucher_ap_dung): 
            $typeLabel = '';
            $typeColor = 'bg-[#8B0000]';
            $giamText = '';
            
            if ($voucher_ap_dung['loai_giam'] == 1 || $voucher_ap_dung['loai_giam'] == 2) {
                $typeLabel = 'Mã giảm giá';
                $giamText = '- ' . number_format($voucher_ap_dung['giam_gia'], 0, ',', '.') . 'đ';
            } elseif ($voucher_ap_dung['loai_giam'] == 3) {
                $typeLabel = 'Freeship';
                $typeColor = 'bg-blue-600';
                $giamText = 'Miễn phí vận chuyển';
            } else {
                $typeLabel = 'Quà tặng';
                $typeColor = 'bg-amber-600';
                $giamText = 'Kèm quà tặng';
            }
        ?>
            <!-- Đã áp dụng voucher -->
            <div class="border border-green-300 bg-green-50/40 rounded-xl p-3 sm:p-4 relative group transition-colors hover:border-green-400">
                <div class="flex gap-3 items-center">
                    <div class="w-12 h-12 sm:w-14 sm:h-14 <?= $typeColor ?> text-white rounded-lg flex flex-col items-center justify-center shrink-0 shadow-sm">
                        <iconify-icon icon="mdi:ticket-percent" class="text-2xl"></iconify-icon>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-2 mb-0.5">
                            <span class="font-bold text-gray-800 text-sm sm:text-base line-clamp-1"><?= htmlspecialchars($voucher_ap_dung['ten_chuong_trinh'] ?? $typeLabel) ?></span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs bg-white text-gray-700 px-2 py-0.5 rounded border border-gray-200 font-mono font-medium"><?= htmlspecialchars($voucher_ap_dung['ma_voucher'] ?? 'VOUCHER') ?></span>
                            <span class="text-xs sm:text-sm font-bold text-green-600"><?= $giamText ?></span>
                        </div>
                    </div>
                    <div class="shrink-0 pl-2 border-l border-green-200/50">
                        <button type="button" onclick="removeVoucherCheckout('<?= htmlspecialchars($voucher_ap_dung['id_voucher']) ?>')" class="flex flex-col items-center justify-center text-gray-400 hover:text-red-500 transition-colors p-2 rounded-lg hover:bg-white" title="Bỏ chọn">
                            <iconify-icon icon="mdi:close-circle" class="text-xl sm:text-2xl"></iconify-icon>
                            <span class="text-[10px] uppercase font-medium mt-0.5 hidden sm:block">Bỏ chọn</span>
                        </button>
                    </div>
                </div>
                
                <!-- Badge Đã áp dụng -->
                <div class="absolute -top-2.5 -right-2.5 bg-green-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full shadow-sm flex items-center gap-1 border-2 border-white">
                    <iconify-icon icon="mdi:check-bold"></iconify-icon> Đã áp dụng
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    <?php else: ?>
        <!-- Chưa có voucher - Ô nhập mã -->
        <div class="flex gap-2">
            <input type="text" id="checkout-voucher-input" placeholder="Nhập mã giảm giá..." class="flex-1 px-4 py-2.5 rounded-lg border border-gray-300 focus:border-[#8B0000] focus:ring-1 focus:ring-[#8B0000] outline-none transition-colors text-sm">
            <button type="button" onclick="applyVoucherCheckout()" class="px-5 py-2.5 bg-[#8B0000] hover:bg-red-800 text-white font-medium rounded-lg transition-colors text-sm whitespace-nowrap">Áp dụng</button>
        </div>
    <?php endif; ?>
</div>

<!-- Modal Chọn Voucher -->
<div id="voucher-modal-checkout" class="fixed inset-0 z-[999] hidden">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black/50" onclick="closeCheckoutVoucherModal()"></div>
    <!-- Modal Content -->
    <div class="absolute right-0 top-0 bottom-0 w-full max-w-md bg-white shadow-2xl flex flex-col animate-slide-in-right">
        <!-- Header -->
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 shrink-0">
            <h3 class="text-lg font-bold text-gray-800">Chọn Mã Giảm Giá</h3>
            <button type="button" onclick="closeCheckoutVoucherModal()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 transition-colors">
                <iconify-icon icon="mdi:close" class="text-xl text-gray-500"></iconify-icon>
            </button>
        </div>
        <!-- Body -->
        <div class="flex-1 overflow-y-auto p-5" id="voucher-modal-body">
            <div class="flex items-center justify-center py-12">
                <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-[#8B0000]"></div>
            </div>
        </div>
    </div>
</div>

<style>
@keyframes slideInRight {
    from { transform: translateX(100%); }
    to { transform: translateX(0); }
}
.animate-slide-in-right {
    animation: slideInRight 0.3s ease-out;
}
</style>

<script>
function openCheckoutVoucherModal() {
    const modal = document.getElementById('voucher-modal-checkout');
    modal.classList.remove('hidden');
    document.body.style.overflow = 'hidden';
    loadVouchersForCheckout();
}

function closeCheckoutVoucherModal() {
    const modal = document.getElementById('voucher-modal-checkout');
    modal.classList.add('hidden');
    document.body.style.overflow = '';
}

function loadVouchersForCheckout() {
    const body = document.getElementById('voucher-modal-body');
    body.innerHTML = '<div class="flex items-center justify-center py-12"><div class="animate-spin rounded-full h-8 w-8 border-b-2 border-[#8B0000]"></div></div>';

    fetch(`${typeof APP_URL !== 'undefined' ? APP_URL : ''}/gio-hang/vouchers`)
        .then(r => r.json())
        .then(res => {
            if (!res.success || !res.data || res.data.length === 0) {
                body.innerHTML = `
                    <div class="text-center py-12 text-gray-500">
                        <iconify-icon icon="mdi:ticket-outline" class="text-5xl text-gray-300 mb-3 block mx-auto"></iconify-icon>
                        <p class="font-medium">Không có voucher nào khả dụng</p>
                        <p class="text-sm mt-1">Hãy quay lại sau nhé!</p>
                    </div>`;
                return;
            }

            let html = '<div class="space-y-3">';
            res.data.forEach(v => {
                const isApplied = <?php echo json_encode(array_keys($_SESSION['cart_vouchers'] ?? [])); ?>.includes(v.id);
                const expired = new Date(v.ngay_ket_thuc) < new Date();
                const outOfStock = v.so_luong != -1 && v.da_dung >= v.so_luong;
                const disabled = expired || outOfStock;

                let typeLabel = '';
                let typeColor = 'bg-[#8B0000]';
                if (v.loai_giam == 1) {
                    typeLabel = `Giảm ${v.gia_tri}%`;
                } else if (v.loai_giam == 2) {
                    typeLabel = `Giảm ${new Intl.NumberFormat('vi-VN').format(v.gia_tri)}đ`;
                } else if (v.loai_giam == 3) {
                    typeLabel = 'Freeship';
                    typeColor = 'bg-blue-600';
                } else {
                    typeLabel = 'Quà tặng';
                    typeColor = 'bg-amber-600';
                }

                html += `
                <div class="border ${isApplied ? 'border-green-300 bg-green-50/30' : disabled ? 'border-gray-200 opacity-60' : 'border-gray-200 hover:border-[#8B0000]/30'} rounded-xl p-4 transition-colors">
                    <div class="flex gap-3">
                        <div class="w-16 h-16 ${typeColor} text-white rounded-lg flex flex-col items-center justify-center shrink-0 text-xs font-bold leading-tight text-center">
                            <iconify-icon icon="mdi:ticket-percent" class="text-2xl mb-0.5"></iconify-icon>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center gap-2 mb-1">
                                <span class="font-bold text-gray-800 text-sm">${typeLabel}</span>
                                <span class="text-xs bg-gray-100 text-gray-600 px-2 py-0.5 rounded font-mono">${v.ma_voucher}</span>
                            </div>
                            <p class="text-xs text-gray-600 line-clamp-1">${v.ten_chuong_trinh || ''}</p>
                            ${v.don_toi_thieu > 0 ? `<p class="text-xs text-gray-400 mt-0.5">Đơn tối thiểu ${new Intl.NumberFormat('vi-VN').format(v.don_toi_thieu)}đ</p>` : ''}
                            <p class="text-xs text-gray-400 mt-0.5">HSD: ${new Date(v.ngay_ket_thuc).toLocaleDateString('vi-VN')}</p>
                        </div>
                        <div class="shrink-0 flex items-center">
                            ${isApplied 
                                ? '<span class="text-xs text-green-600 font-medium bg-green-100 px-2 py-1 rounded">Đã chọn</span>'
                                : disabled 
                                    ? '<span class="text-xs text-gray-400">Hết hạn</span>'
                                    : `<button type="button" onclick="applyVoucherFromModal('${v.ma_voucher}')" class="text-xs text-[#8B0000] font-medium border border-[#8B0000] px-3 py-1.5 rounded-lg hover:bg-red-50 transition-colors">Áp dụng</button>`
                            }
                        </div>
                    </div>
                </div>`;
            });
            html += '</div>';
            body.innerHTML = html;
        })
        .catch(err => {
            body.innerHTML = '<div class="text-center py-12 text-red-500">Có lỗi xảy ra khi tải voucher.</div>';
            console.error(err);
        });
}

function applyVoucherFromModal(code) {
    fetch(`${typeof APP_URL !== 'undefined' ? APP_URL : ''}/gio-hang/ap-voucher`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'ma_voucher=' + encodeURIComponent(code)
    })
    .then(r => r.json())
    .then(res => {
        if (res.success) {
            closeCheckoutVoucherModal();
            location.reload();
        } else {
            if (typeof CartHelper !== 'undefined') {
                CartHelper._toast(res.message || 'Không thể áp dụng mã', 'error');
            } else {
                alert(res.message || 'Không thể áp dụng mã');
            }
        }
    })
    .catch(err => console.error(err));
}

function applyVoucherCheckout() {
    const input = document.getElementById('checkout-voucher-input');
    const code = input ? input.value.trim() : '';
    if (!code) {
        if (typeof CartHelper !== 'undefined') {
            CartHelper._toast('Vui lòng nhập mã giảm giá', 'error');
        }
        return;
    }
    applyVoucherFromModal(code);
}

function removeVoucherCheckout(id) {
    if (!id) return;
    fetch(`${typeof APP_URL !== 'undefined' ? APP_URL : ''}/gio-hang/xoa-voucher`, {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'id_voucher=' + encodeURIComponent(id)
    })
    .then(r => r.json())
    .then(res => {
        if (res.success) {
            location.reload();
        }
    })
    .catch(err => console.error(err));
}
</script>
