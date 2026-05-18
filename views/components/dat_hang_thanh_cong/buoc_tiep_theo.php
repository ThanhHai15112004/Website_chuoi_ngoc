<!-- Receipt Bottom Decoration -->
<div class="h-6 w-full flex mb-8">
    <?php for($i = 0; $i < 40; $i++): ?>
    <div class="h-full flex-1 bg-white relative">
        <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-6 h-6 bg-slate-50 rounded-full"></div>
    </div>
    <?php endfor; ?>
</div>

<!-- Next Steps Info Box -->
<div class="bg-amber-50 rounded-xl p-6 mb-8 border border-amber-100 flex flex-col sm:flex-row items-start gap-4 shadow-sm">
    <div class="text-[#D4AF37] text-3xl mt-1 flex-shrink-0 hidden sm:block">
        <iconify-icon icon="mdi:bell-ring" class="animate-wiggle"></iconify-icon>
    </div>
    <div>
        <h4 class="font-serif text-lg text-[#8B0000] mb-2 flex items-center">
            <iconify-icon icon="mdi:bell-ring" class="text-[#D4AF37] mr-2 sm:hidden animate-wiggle"></iconify-icon> Bước tiếp theo:
        </h4>
        <ul class="space-y-2 text-gray-700 text-sm">
            <li class="flex items-start">
                <iconify-icon icon="mdi:circle-small" class="text-lg text-[#D4AF37] mt-0.5 mr-1 flex-shrink-0"></iconify-icon>
                <span>Chúng tôi sẽ liên hệ với bạn qua số điện thoại <strong class="text-gray-900"><?= htmlspecialchars($order_info['nguoi_nhan']['so_dien_thoai']) ?></strong> trong vòng 24h để xác nhận đơn hàng.</span>
            </li>
            <li class="flex items-start">
                <iconify-icon icon="mdi:circle-small" class="text-lg text-[#D4AF37] mt-0.5 mr-1 flex-shrink-0"></iconify-icon>
                <span>Bạn có thể theo dõi trạng thái đơn hàng trong phần <strong class="text-gray-900">Đơn hàng của tôi</strong>.</span>
            </li>
            <?php if($order_info['phuong_thuc_thanh_toan'] == 'Chuyển khoản ngân hàng'): ?>
            <li class="flex items-start bg-white p-3 rounded-md border border-amber-200 mt-3 shadow-sm">
                <iconify-icon icon="mdi:bank" class="text-[#8B0000] mt-0.5 mr-2 flex-shrink-0 text-lg"></iconify-icon>
                <span class="text-[#8B0000]">
                    Vui lòng chuyển khoản với nội dung: <br class="sm:hidden"/>
                    <strong class="font-mono bg-red-50 text-[#8B0000] px-3 py-1 rounded border border-red-100 text-base shadow-inner inline-block my-1"><?= $order_info['ma_don_hang'] ?></strong> 
                    <br class="sm:hidden"/> để chúng tôi tiến hành gửi hàng sớm nhất.
                </span>
            </li>
            <?php endif; ?>
        </ul>
    </div>
</div>

<!-- Call to Actions -->
<div class="flex flex-col sm:flex-row items-center justify-center gap-4">
    <a href="<?= APP_URL ?>/" class="w-full sm:w-auto px-8 py-3 bg-white border-2 border-[#8B0000] text-[#8B0000] font-semibold rounded-full hover:bg-[#8B0000] hover:text-white transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 text-center flex items-center justify-center">
        <iconify-icon icon="mdi:arrow-left" class="mr-2 text-lg"></iconify-icon> Tiếp tục mua sắm
    </a>
    <a href="#" class="w-full sm:w-auto px-8 py-3 bg-white border-2 border-[#8B0000] text-[#8B0000] font-semibold rounded-full hover:bg-[#8B0000] hover:text-white transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 text-center flex items-center justify-center">
        Xem chi tiết đơn hàng <iconify-icon icon="mdi:arrow-right" class="ml-2 text-lg"></iconify-icon>
    </a>
</div>
