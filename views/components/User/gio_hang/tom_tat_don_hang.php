<!-- Cột phải: Tóm tắt đơn hàng -->
<div class="lg:w-1/3">
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 sticky top-24">
        <h2 class="text-lg font-serif text-[#8B0000] mb-4 pb-4 border-b border-gray-100">Tóm tắt đơn hàng</h2>
        
        <!-- Voucher section -->
        <div class="mb-6">
            <p class="text-sm text-gray-600 mb-2 font-medium">Mã giảm giá / Voucher</p>
            <div class="flex gap-2 mb-3">
                <input type="text" id="voucher-code-input" placeholder="Nhập mã ưu đãi" class="flex-1 text-sm border-gray-300 rounded-lg focus:ring-[#8B0000] focus:border-[#8B0000]">
                <button onclick="applyVoucherCode()" class="bg-gray-800 text-white px-4 py-2 text-sm rounded-lg hover:bg-black transition-colors">Áp dụng</button>
            </div>
            
            <button onclick="openVoucherModal()" class="w-full py-2 px-4 border border-[#8B0000] text-[#8B0000] rounded-lg text-sm font-medium hover:bg-red-50 transition-colors flex items-center justify-between">
                <span class="flex items-center gap-2"><iconify-icon icon="mdi:ticket-percent-outline" class="text-lg"></iconify-icon> Chọn mã giảm giá</span>
                <iconify-icon icon="mdi:chevron-down" class="text-lg"></iconify-icon>
            </button>

            <!-- Applied Vouchers -->
            <div id="applied-vouchers-container" class="mt-3 space-y-2">
                <?php if (!empty($applied_vouchers)): ?>
                    <?php foreach ($applied_vouchers as $vc): ?>
                        <div class="flex items-center justify-between p-2 bg-green-50 border border-green-200 rounded-lg">
                            <div class="flex items-center gap-2">
                                <iconify-icon icon="mdi:check-circle" class="text-green-500"></iconify-icon>
                                <div>
                                    <p class="text-xs font-bold text-green-700"><?= htmlspecialchars($vc['ma_voucher']) ?></p>
                                    <p class="text-[10px] text-green-600"><?= htmlspecialchars($vc['ten_chuong_trinh']) ?></p>
                                </div>
                            </div>
                            <button onclick="removeVoucher('<?= htmlspecialchars($vc['id_voucher']) ?>')" class="text-gray-400 hover:text-red-500 transition-colors">
                                <iconify-icon icon="mdi:close" class="text-lg"></iconify-icon>
                            </button>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="space-y-3 mb-6 pb-6 border-b border-gray-100 text-sm">
            <div class="flex justify-between text-gray-600">
                <span>Tạm tính (<span id="cart-item-count"><?= count($gio_hang) ?></span> sp)</span>
                <span id="cart-subtotal"><?= number_format($tong_tam_tinh ?? 0, 0, ',', '.') ?>đ</span>
            </div>
            <!-- Phí vận chuyển -->
            <div class="flex justify-between text-gray-600">
                <span>Phí vận chuyển</span>
                <span class="text-xs italic">Tính khi thanh toán</span>
            </div>
            <div class="flex justify-between text-green-600" id="cart-discount-row" <?= empty($tong_giam_gia) ? 'style="display:none;"' : '' ?>>
                <span>Giảm giá (Voucher)</span>
                <span id="cart-discount">-<?= number_format($tong_giam_gia ?? 0, 0, ',', '.') ?>đ</span>
            </div>
        </div>

        <div class="flex justify-between items-end mb-6">
            <span class="text-gray-800 font-medium">Tổng cộng</span>
            <div class="text-right">
                <span id="cart-total" class="text-2xl font-bold text-[#8B0000] block"><?= number_format(max(0, ($tong_tam_tinh ?? 0) - ($tong_giam_gia ?? 0)), 0, ',', '.') ?>đ</span>
                <span class="text-xs text-gray-500">(Đã bao gồm VAT nếu có)</span>
            </div>
        </div>

        <a href="<?= APP_URL ?>/thanh-toan" class="w-full bg-[#8B0000] hover:bg-red-800 text-white font-medium py-3.5 rounded-xl transition-colors shadow-md shadow-red-900/20 text-lg flex justify-center items-center gap-2 group hidden md:flex">
            Tiến hành thanh toán
            <iconify-icon icon="mdi:arrow-right" class="text-xl group-hover:translate-x-1 transition-transform"></iconify-icon>
        </a>
        
        <div class="mt-4 space-y-2 text-xs text-gray-500">
            <div class="flex items-center gap-2">
                <iconify-icon icon="mdi:check-circle-outline" class="text-base text-green-500"></iconify-icon>
                Freeship toàn quốc cho đơn từ 500.000đ
            </div>
            <div class="flex items-center gap-2">
                <iconify-icon icon="mdi:check-circle-outline" class="text-base text-green-500"></iconify-icon>
                Kiểm tra hàng trước khi thanh toán
            </div>
            <div class="flex items-center gap-2">
                <iconify-icon icon="mdi:check-circle-outline" class="text-base text-green-500"></iconify-icon>
                Đổi trả miễn phí trong 7 ngày
            </div>
        </div>
    </div>
</div>

<!-- Modal Voucher -->
<div id="voucherModal" class="fixed inset-0 z-[100] hidden items-end sm:items-center justify-center">
    <div class="absolute inset-0 bg-black/60 backdrop-blur-sm" onclick="closeVoucherModal()"></div>
    <div class="bg-white w-full relative flex flex-col transform translate-y-full transition-transform duration-300 sm:rounded-2xl rounded-t-2xl" style="max-width: 480px; height: 80vh; max-height: 600px;" id="voucherModalContent">
        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b border-gray-100 shrink-0">
            <h3 class="text-lg font-serif font-bold text-gray-900">Chọn Mã Giảm Giá</h3>
            <button onclick="closeVoucherModal()" class="w-8 h-8 flex items-center justify-center rounded-full hover:bg-gray-100 text-gray-500 transition-colors">
                <iconify-icon icon="mdi:close" class="text-xl"></iconify-icon>
            </button>
        </div>
        
        <!-- Info Alert -->
        <div class="px-4 py-3 bg-blue-50 border-b border-blue-100 shrink-0">
            <p class="text-xs text-blue-700 flex items-center gap-1.5">
                <iconify-icon icon="mdi:information-outline" class="text-base"></iconify-icon>
                Có thể áp dụng tối đa 1 mã Freeship và 1 mã Giảm giá.
            </p>
        </div>

        <!-- Voucher List -->
        <div class="p-4 overflow-y-auto flex-1 space-y-3" id="voucherListContainer">
            <!-- Loading -->
            <div class="flex justify-center py-10" id="voucherLoading">
                <iconify-icon icon="mdi:loading" class="text-3xl text-[#8B0000] animate-spin"></iconify-icon>
            </div>
        </div>
    </div>
</div>

<style>
/* Utilities cho modal animation */
.modal-open #voucherModalContent {
    transform: translateY(0);
}
</style>
