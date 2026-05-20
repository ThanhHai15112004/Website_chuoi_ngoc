<div class="bg-stone-50 rounded-xl p-5 border border-stone-100 shadow-inner">
    <h3 class="text-lg font-serif text-[#8B0000] border-b border-stone-200 pb-2 mb-4 flex items-center">
        <iconify-icon icon="mdi:receipt-text-outline" class="mr-2 text-[#D4AF37] text-xl"></iconify-icon> Tóm tắt thanh toán
    </h3>
    <div class="space-y-3 text-sm text-gray-600">
        <div class="flex justify-between">
            <span>Tạm tính</span>
            <span class="font-medium text-gray-800"><?= number_format($order_info['tong_tien'], 0, ',', '.') ?>đ</span>
        </div>
        <div class="flex justify-between">
            <span>Phí vận chuyển</span>
            <span class="font-medium text-gray-800"><?= number_format($order_info['phi_van_chuyen'], 0, ',', '.') ?>đ</span>
        </div>
        <div class="flex justify-between text-[#8B0000]">
            <span>Giảm giá</span>
            <span class="font-medium">-<?= number_format($order_info['giam_gia'], 0, ',', '.') ?>đ</span>
        </div>
        <div class="pt-3 mt-3 border-t border-stone-200 flex justify-between items-center">
            <span class="font-medium text-gray-800 uppercase tracking-wider text-xs">Tổng cộng</span>
            <span class="font-bold text-2xl text-[#8B0000]"><?= number_format($order_info['thanh_toan'], 0, ',', '.') ?>đ</span>
        </div>
    </div>
</div>
