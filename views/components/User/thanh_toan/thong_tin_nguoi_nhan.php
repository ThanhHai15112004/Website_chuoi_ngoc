<div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
    <div class="flex items-center gap-3 mb-6 pb-4 border-b border-gray-100">
        <div class="w-8 h-8 rounded-full bg-red-50 flex items-center justify-center text-[#8B0000]">
            <span class="font-bold">1</span>
        </div>
        <h2 class="text-xl font-serif text-gray-800">Thông tin người nhận</h2>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-1">Họ và tên <span class="text-red-500">*</span></label>
            <input type="text" value="<?php echo htmlspecialchars($user_info['ho_ten'] ?? ''); ?>" placeholder="Nhập họ và tên" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8B0000] focus:border-[#8B0000] outline-none transition-all">
        </div>
        <div class="col-span-1">
            <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại <span class="text-red-500">*</span></label>
            <input type="tel" value="<?php echo htmlspecialchars($user_info['so_dien_thoai'] ?? ''); ?>" placeholder="Nhập số điện thoại" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8B0000] focus:border-[#8B0000] outline-none transition-all">
        </div>
        <div class="col-span-1 md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Email (tùy chọn)</label>
            <input type="email" value="<?php echo htmlspecialchars($user_info['email'] ?? ''); ?>" placeholder="Để nhận email xác nhận đơn hàng" class="w-full px-4 py-2.5 rounded-xl border border-gray-300 focus:ring-2 focus:ring-[#8B0000] focus:border-[#8B0000] outline-none transition-all">
        </div>
    </div>
</div>
