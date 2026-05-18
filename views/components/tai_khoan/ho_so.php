<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900">Hồ sơ cá nhân</h2>
        <p class="text-gray-500 mt-1">Quản lý thông tin cá nhân để bảo mật tài khoản</p>
    </div>

    <form class="space-y-6">
        <!-- Avatar Section -->
        <div class="flex items-center gap-6 pb-6 border-b border-gray-100">
            <div class="relative">
                <div class="w-24 h-24 rounded-full bg-red-50 flex items-center justify-center border-4 border-white shadow-sm overflow-hidden">
                    <svg class="w-12 h-12 text-[#8b0000]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <label for="avatar-upload" class="absolute bottom-0 right-0 bg-white rounded-full p-2 shadow-md border border-gray-200 text-gray-500 hover:text-[#8b0000] cursor-pointer transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <input type="file" id="avatar-upload" class="hidden" accept="image/*">
                </label>
            </div>
            <div>
                <h3 class="text-lg font-medium text-gray-900">Ảnh đại diện</h3>
                <p class="text-sm text-gray-500 mt-1">Dung lượng file tối đa 1 MB.<br>Định dạng: .JPEG, .PNG</p>
            </div>
        </div>

        <!-- Form Fields -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <div class="space-y-1.5">
                <label class="block text-sm font-medium text-gray-700">Họ và tên</label>
                <input type="text" value="Nguyễn Văn A" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 focus:border-[#8b0000] focus:ring-[#8b0000] focus:ring-1 outline-none transition-shadow" placeholder="Nhập họ và tên">
            </div>

            <div class="space-y-1.5">
                <label class="block text-sm font-medium text-gray-700">Tên đăng nhập</label>
                <input type="text" value="nguyenvana123" disabled class="w-full rounded-lg border border-gray-200 bg-gray-50 px-4 py-2.5 text-gray-500 cursor-not-allowed">
                <p class="text-xs text-gray-400 mt-1">Tên đăng nhập không thể thay đổi</p>
            </div>

            <div class="space-y-1.5">
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <div class="relative">
                    <input type="email" value="nguyenvana@example.com" class="w-full rounded-lg border border-gray-300 pl-4 pr-24 py-2.5 focus:border-[#8b0000] focus:ring-[#8b0000] focus:ring-1 outline-none transition-shadow">
                    <button type="button" class="absolute right-2 top-1/2 -translate-y-1/2 text-sm text-[#8b0000] hover:underline font-medium px-2 py-1">Thay đổi</button>
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block text-sm font-medium text-gray-700">Số điện thoại</label>
                <div class="relative">
                    <input type="tel" value="0901234567" class="w-full rounded-lg border border-gray-300 pl-4 pr-24 py-2.5 focus:border-[#8b0000] focus:ring-[#8b0000] focus:ring-1 outline-none transition-shadow">
                    <button type="button" class="absolute right-2 top-1/2 -translate-y-1/2 text-sm text-[#8b0000] hover:underline font-medium px-2 py-1">Thay đổi</button>
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block text-sm font-medium text-gray-700">Giới tính</label>
                <div class="flex items-center gap-6 h-[42px]">
                    <label class="flex items-center cursor-pointer group">
                        <input type="radio" name="gender" value="male" checked class="w-4 h-4 text-[#8b0000] border-gray-300 focus:ring-[#8b0000]">
                        <span class="ml-2 text-gray-700 group-hover:text-[#8b0000]">Nam</span>
                    </label>
                    <label class="flex items-center cursor-pointer group">
                        <input type="radio" name="gender" value="female" class="w-4 h-4 text-[#8b0000] border-gray-300 focus:ring-[#8b0000]">
                        <span class="ml-2 text-gray-700 group-hover:text-[#8b0000]">Nữ</span>
                    </label>
                    <label class="flex items-center cursor-pointer group">
                        <input type="radio" name="gender" value="other" class="w-4 h-4 text-[#8b0000] border-gray-300 focus:ring-[#8b0000]">
                        <span class="ml-2 text-gray-700 group-hover:text-[#8b0000]">Khác</span>
                    </label>
                </div>
            </div>

            <div class="space-y-1.5">
                <label class="block text-sm font-medium text-gray-700">Ngày sinh</label>
                <div class="flex gap-2">
                    <select class="flex-1 rounded-lg border border-gray-300 px-3 py-2.5 focus:border-[#8b0000] focus:ring-[#8b0000] focus:ring-1 outline-none">
                        <option value="">Ngày</option>
                        <?php for($i=1; $i<=31; $i++): ?>
                            <option value="<?= $i ?>" <?= $i == 15 ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                    <select class="flex-1 rounded-lg border border-gray-300 px-3 py-2.5 focus:border-[#8b0000] focus:ring-[#8b0000] focus:ring-1 outline-none">
                        <option value="">Tháng</option>
                        <?php for($i=1; $i<=12; $i++): ?>
                            <option value="<?= $i ?>" <?= $i == 5 ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                    <select class="flex-1 rounded-lg border border-gray-300 px-3 py-2.5 focus:border-[#8b0000] focus:ring-[#8b0000] focus:ring-1 outline-none">
                        <option value="">Năm</option>
                        <?php $currentYear = date('Y'); for($i=$currentYear; $i>=1900; $i--): ?>
                            <option value="<?= $i ?>" <?= $i == 1990 ? 'selected' : '' ?>><?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
            </div>

        </div>

        <div class="pt-6 border-t border-gray-100 flex justify-end">
            <button type="button" class="bg-[#8b0000] text-white px-8 py-2.5 rounded-lg font-medium hover:bg-[#700000] transition-colors shadow-sm focus:ring-2 focus:ring-offset-2 focus:ring-[#8b0000] outline-none">
                Lưu Thay Đổi
            </button>
        </div>
    </form>
</div>
