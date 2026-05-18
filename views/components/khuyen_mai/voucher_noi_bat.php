<?php
// views/components/khuyen_mai/voucher_noi_bat.php
$vouchers = [
    [
        'code' => 'GIAM50K',
        'title' => 'Giảm 50.000đ',
        'desc' => 'Cho đơn từ 500.000đ',
        'exp' => '31/05/2026',
        'type' => 'discount'
    ],
    [
        'code' => 'FREESHIP',
        'title' => 'Miễn phí vận chuyển',
        'desc' => 'Cho đơn từ 300.000đ',
        'exp' => '31/05/2026',
        'type' => 'shipping'
    ],
    [
        'code' => 'NEW10',
        'title' => 'Giảm 10%',
        'desc' => 'Cho khách hàng mới',
        'exp' => '7 ngày sau khi đăng ký',
        'type' => 'new',
        'warning' => 'Sắp hết hạn'
    ],
    [
        'code' => 'GOLD5',
        'title' => 'Giảm thêm 5%',
        'desc' => 'Cho thành viên hạng Gold trở lên',
        'exp' => 'Không thời hạn',
        'type' => 'member'
    ]
];
?>
<section id="voucher-noi-bat">
    <div class="mb-8">
        <h2 class="font-semibold text-3xl text-gray-900 mb-2">Voucher dành cho bạn</h2>
        <p class="text-gray-600">Lưu mã ngay để áp dụng khi thanh toán.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php foreach($vouchers as $v): ?>
        <div class="flex bg-white rounded-[18px] border border-gray-100 shadow-sm hover:shadow-md transition-shadow relative overflow-hidden group">
            
            <!-- Cutout decoration -->
            <div class="absolute top-1/2 -left-3 w-6 h-6 bg-slate-50 rounded-full -translate-y-1/2 border-r border-gray-100 z-10"></div>
            <div class="absolute top-1/2 -right-3 w-6 h-6 bg-slate-50 rounded-full -translate-y-1/2 border-l border-gray-100 z-10"></div>
            
            <!-- Left part: Code -->
            <div class="w-1/3 bg-red-50/50 border-r border-dashed border-red-200 flex flex-col items-center justify-center p-4 relative">
                <?php if(isset($v['warning'])): ?>
                    <span class="absolute top-0 left-0 bg-[#D4AF37] text-white text-[10px] uppercase font-bold px-2 py-0.5 rounded-br-lg"><?= $v['warning'] ?></span>
                <?php endif; ?>
                <div class="text-[#8B0000] mb-1">
                    <?php if($v['type'] == 'shipping'): ?>
                        <iconify-icon icon="mdi:truck-fast" class="text-3xl opacity-80"></iconify-icon>
                    <?php else: ?>
                        <iconify-icon icon="mdi:ticket-percent" class="text-3xl opacity-80"></iconify-icon>
                    <?php endif; ?>
                </div>
                <div class="font-bold text-[#8B0000] text-lg tracking-wider text-center break-all"><?= $v['code'] ?></div>
            </div>
            
            <!-- Right part: Info & Action -->
            <div class="w-2/3 p-5 flex flex-col justify-between">
                <div>
                    <h3 class="font-bold text-gray-900 text-lg mb-1"><?= $v['title'] ?></h3>
                    <p class="text-sm text-gray-600 mb-2"><?= $v['desc'] ?></p>
                    <p class="text-xs text-gray-400 flex items-center">
                        <iconify-icon icon="mdi:clock-outline" class="mr-1"></iconify-icon> Hạn dùng: <?= $v['exp'] ?>
                    </p>
                </div>
                
                <div class="mt-4 flex justify-end">
                    <button data-code="<?= $v['code'] ?>" class="btn-save-voucher px-5 py-2 bg-[#8B0000] text-white text-sm font-semibold rounded-full hover:bg-[#660000] transition-colors flex items-center gap-1">
                        Lưu mã
                    </button>
                    <!-- Saved state (hidden by default, toggled via JS) -->
                    <button data-code="<?= $v['code'] ?>" class="btn-saved-voucher hidden px-5 py-2 bg-red-50 text-[#8B0000] text-sm font-semibold rounded-full flex items-center gap-1 border border-red-100 cursor-default">
                        <iconify-icon icon="mdi:check-circle"></iconify-icon> Đã lưu
                    </button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Lấy danh sách voucher đã lưu từ localStorage
    let savedVouchers = JSON.parse(localStorage.getItem('savedVouchers')) || [];
    
    const saveBtns = document.querySelectorAll('.btn-save-voucher');
    const savedBtns = document.querySelectorAll('.btn-saved-voucher');
    
    // Cập nhật giao diện ban đầu
    saveBtns.forEach(btn => {
        const code = btn.getAttribute('data-code');
        if (savedVouchers.includes(code)) {
            btn.classList.add('hidden');
            btn.nextElementSibling.classList.remove('hidden');
        }
        
        btn.addEventListener('click', function() {
            const currentCode = this.getAttribute('data-code');
            
            // Lưu vào localStorage
            if (!savedVouchers.includes(currentCode)) {
                savedVouchers.push(currentCode);
                localStorage.setItem('savedVouchers', JSON.stringify(savedVouchers));
            }
            
            // Cập nhật UI
            this.classList.add('hidden');
            this.nextElementSibling.classList.remove('hidden');
            
            // Tuỳ chọn: Hiện toast notification
            // alert(`Voucher ${currentCode} đã được lưu vào tài khoản của bạn.`);
        });
    });
});
</script>
