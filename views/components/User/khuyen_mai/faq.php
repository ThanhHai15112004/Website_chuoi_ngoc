<?php
// views/components/User/khuyen_mai/faq.php
$faqs = [
    [
        'q' => 'Làm sao để sử dụng voucher?',
        'a' => 'Bạn có thể bấm "Lưu mã" tại trang Khuyến mãi này. Mã sẽ được lưu vào tài khoản. Khi tiến hành thanh toán, bạn chọn mã đã lưu trong Giỏ hàng hoặc trang Thanh toán để được giảm giá.'
    ],
    [
        'q' => 'Có thể dùng nhiều voucher cùng lúc không?',
        'a' => 'Tùy từng chương trình. Thông thường bạn có thể kết hợp 1 voucher Freeship và 1 voucher giảm giá trên cùng một đơn hàng. Hệ thống sẽ tự động tính toán voucher hợp lệ.'
    ],
    [
        'q' => 'Sản phẩm giảm giá có được đổi trả không?',
        'a' => 'Sản phẩm khuyến mãi vẫn được hỗ trợ đổi trả trong vòng 7 ngày nếu lỗi do nhà sản xuất, và phải đáp ứng đủ điều kiện còn nguyên tem mác, hộp quà đi kèm.'
    ],
    [
        'q' => 'Vì sao voucher của tôi không áp dụng được?',
        'a' => 'Voucher không áp dụng được có thể do: đã hết hạn, hết số lượt sử dụng, đơn hàng chưa đạt giá trị tối thiểu, hoặc sản phẩm trong giỏ không thuộc danh mục áp dụng voucher.'
    ],
    [
        'q' => 'Ưu đãi thành viên được tính như thế nào?',
        'a' => 'Ưu đãi thành viên (Silver, Gold, Diamond) được áp dụng tự động trên giá gốc của sản phẩm khi bạn đăng nhập tài khoản. Mức giảm cụ thể tuỳ thuộc vào thứ hạng hiện tại của bạn.'
    ]
];
?>
<section id="faq-khuyen-mai" class="bg-white p-6 md:p-8 rounded-2xl border border-gray-100 shadow-sm h-full">
    <div class="flex items-center gap-3 mb-6">
        <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center text-gray-700">
            <iconify-icon icon="mdi:help-circle-outline" class="text-xl"></iconify-icon>
        </div>
        <h2 class="font-semibold text-2xl text-gray-900">Câu hỏi thường gặp</h2>
    </div>
    
    <div class="space-y-3">
        <?php foreach($faqs as $index => $faq): ?>
        <details class="group bg-slate-50 rounded-xl overflow-hidden [&_summary::-webkit-details-marker]:hidden" <?= $index === 0 ? 'open' : '' ?>>
            <summary class="flex items-center justify-between p-4 cursor-pointer font-medium text-gray-900 hover:text-[#8B0000] transition-colors">
                <span><?= $faq['q'] ?></span>
                <span class="transition duration-300 group-open:-rotate-180 text-[#8B0000]">
                    <iconify-icon icon="mdi:chevron-down"></iconify-icon>
                </span>
            </summary>
            
            <div class="p-4 pt-0 text-sm text-gray-600 leading-relaxed border-t border-gray-100 bg-white">
                <?= $faq['a'] ?>
            </div>
        </details>
        <?php endforeach; ?>
    </div>
</section>

