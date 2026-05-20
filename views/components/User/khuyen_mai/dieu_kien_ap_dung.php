<?php
// views/components/User/khuyen_mai/dieu_kien_ap_dung.php
$conditions = [
    'Mỗi voucher có thời hạn sử dụng riêng, ghi rõ trên từng mã.',
    'Một đơn hàng chỉ áp dụng tối đa một mã voucher giảm giá (có thể áp dụng chung với freeship nếu hệ thống cho phép).',
    'Voucher có thể không áp dụng cho sản phẩm đã giảm giá sâu (như Flash Sale).',
    'Ưu đãi thành viên chỉ áp dụng tự động khi quý khách đã đăng nhập vào tài khoản.',
    'Cửa hàng có quyền thay đổi chương trình khuyến mãi theo từng thời điểm mà không cần báo trước.',
    'Sản phẩm khuyến mãi vẫn được hỗ trợ đổi trả theo chính sách chung nếu đủ điều kiện (còn nguyên tem mác, hộp đựng).'
];
?>
<section id="dieu-kien-ap-dung" class="bg-white p-6 md:p-8 rounded-2xl border border-gray-100 shadow-sm h-full">
    <div class="flex items-center gap-3 mb-6">
        <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center text-[#8B0000]">
            <iconify-icon icon="mdi:information-outline" class="text-xl"></iconify-icon>
        </div>
        <h2 class="font-semibold text-2xl text-gray-900">Điều kiện áp dụng</h2>
    </div>
    
    <ul class="space-y-4">
        <?php foreach($conditions as $c): ?>
        <li class="flex items-start gap-3">
            <iconify-icon icon="mdi:check" class="text-[#8B0000] mt-1 flex-shrink-0"></iconify-icon>
            <span class="text-gray-600 text-sm leading-relaxed"><?= $c ?></span>
        </li>
        <?php endforeach; ?>
    </ul>
</section>

