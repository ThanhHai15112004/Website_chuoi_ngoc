<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
        <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-[#8B0000]">
            <span class="font-bold">2</span>
        </div>
        <h2 class="text-xl font-serif text-gray-800">Địa chỉ giao hàng</h2>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="col-span-1 md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ chi tiết <span class="text-red-500">*</span></label>
            <input type="text" value="<?php echo htmlspecialchars($user_info['dia_chi'] ?? ''); ?>" placeholder="Số nhà, tên đường, phường/xã, quận/huyện, tỉnh/thành phố" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8B0000] focus:border-[#8B0000] outline-none transition-all">
        </div>
        <div class="col-span-1 md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Ghi chú đơn hàng (tùy chọn)</label>
            <textarea rows="3" placeholder="Ghi chú thêm về đơn hàng, thời gian giao hàng..." class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8B0000] focus:border-[#8B0000] outline-none transition-all resize-none"></textarea>
        </div>
    </div>

    <!-- Gift options -->
    <div class="mt-6 bg-red-50/50 p-4 rounded-xl border border-red-100">
        <label class="flex items-start gap-3 cursor-pointer">
            <div class="mt-0.5">
                <input type="checkbox" class="w-5 h-5 rounded border-gray-300 text-[#8B0000] focus:ring-[#8B0000]">
            </div>
            <div>
                <span class="font-medium text-gray-800 block">Đóng gói quà tặng sang trọng (+50.000đ)</span>
                <span class="text-sm text-gray-500">Sản phẩm sẽ được đặt trong hộp nhung cao cấp, kèm thiệp viết tay theo yêu cầu. Phù hợp để làm quà biếu tặng.</span>
            </div>
        </label>
    </div>
</div>
