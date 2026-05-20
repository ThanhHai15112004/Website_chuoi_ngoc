<div>
    <h3 class="text-lg font-serif text-[#8B0000] border-b border-gray-100 pb-2 mb-4 flex items-center">
        <iconify-icon icon="mdi:map-marker-radius" class="mr-2 text-[#D4AF37] text-xl"></iconify-icon> Thông tin nhận hàng
    </h3>
    <div class="space-y-3 text-gray-700 text-sm sm:text-base">
        <p><span class="text-gray-500 w-24 inline-block">Người nhận:</span> <span class="font-medium"><?= htmlspecialchars($order_info['nguoi_nhan']['ho_ten']) ?></span></p>
        <p><span class="text-gray-500 w-24 inline-block">Điện thoại:</span> <span class="font-medium"><?= htmlspecialchars($order_info['nguoi_nhan']['so_dien_thoai']) ?></span></p>
        <p class="flex items-start">
            <span class="text-gray-500 w-24 inline-block flex-shrink-0 mt-0.5">Địa chỉ:</span> 
            <span><?= htmlspecialchars($order_info['nguoi_nhan']['dia_chi']) ?></span>
        </p>
        <p class="pt-2 border-t border-gray-50 mt-2"><span class="text-gray-500 w-24 inline-block">Thanh toán:</span> <span class="text-[#8B0000] font-medium bg-red-50 px-2 py-1 rounded text-sm inline-block mt-1 sm:mt-0"><?= htmlspecialchars($order_info['phuong_thuc_thanh_toan']) ?></span></p>
    </div>
</div>
