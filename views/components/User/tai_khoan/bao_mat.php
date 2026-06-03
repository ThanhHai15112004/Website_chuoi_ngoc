<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900">Đổi mật khẩu</h2>
        <p class="text-gray-500 mt-1">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người khác</p>
    </div>

    <form id="form-doi-mat-khau" class="max-w-lg">
        <div class="space-y-6">
            <!-- Current Password -->
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-gray-700">Mật khẩu hiện tại</label>
                <div class="relative">
                    <input type="password" name="mat_khau_cu" required class="w-full rounded-xl border border-gray-200 px-5 py-4 text-gray-800 focus:border-[#8b0000] focus:ring-1 focus:ring-[#8b0000] outline-none transition-all hover:border-gray-300 pr-12" placeholder="Nhập mật khẩu hiện tại">
                    <button type="button" onclick="togglePassword(this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <iconify-icon icon="ph:eye" class="text-xl"></iconify-icon>
                    </button>
                </div>
            </div>

            <!-- New Password -->
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-gray-700">Mật khẩu mới</label>
                <div class="relative">
                    <input type="password" name="mat_khau_moi" required minlength="6" class="w-full rounded-xl border border-gray-200 px-5 py-4 text-gray-800 focus:border-[#8b0000] focus:ring-1 focus:ring-[#8b0000] outline-none transition-all hover:border-gray-300 pr-12" placeholder="Tối thiểu 6 ký tự">
                    <button type="button" onclick="togglePassword(this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <iconify-icon icon="ph:eye" class="text-xl"></iconify-icon>
                    </button>
                </div>
            </div>

            <!-- Confirm Password -->
            <div class="flex flex-col gap-2">
                <label class="text-sm font-semibold text-gray-700">Xác nhận mật khẩu mới</label>
                <div class="relative">
                    <input type="password" name="xac_nhan_mat_khau" required class="w-full rounded-xl border border-gray-200 px-5 py-4 text-gray-800 focus:border-[#8b0000] focus:ring-1 focus:ring-[#8b0000] outline-none transition-all hover:border-gray-300 pr-12" placeholder="Nhập lại mật khẩu mới">
                    <button type="button" onclick="togglePassword(this)" class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                        <iconify-icon icon="ph:eye" class="text-xl"></iconify-icon>
                    </button>
                </div>
            </div>
        </div>

        <div class="pt-8 mt-4 border-t border-gray-100">
            <button type="submit" class="bg-[#8b0000] text-white px-8 py-3.5 rounded-xl font-bold hover:bg-[#700000] transition-colors shadow-lg shadow-red-900/20 focus:ring-2 focus:ring-offset-2 focus:ring-[#8b0000] outline-none flex items-center gap-2">
                <iconify-icon icon="ph:lock-key-bold" class="text-lg"></iconify-icon>
                Đổi mật khẩu
            </button>
        </div>
    </form>
</div>

<script>
function togglePassword(btn) {
    const input = btn.parentElement.querySelector('input');
    const icon = btn.querySelector('iconify-icon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.setAttribute('icon', 'ph:eye-slash');
    } else {
        input.type = 'password';
        icon.setAttribute('icon', 'ph:eye');
    }
}

document.getElementById('form-doi-mat-khau')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    if (formData.get('mat_khau_moi') !== formData.get('xac_nhan_mat_khau')) {
        Toast.fire({ icon: 'error', title: 'Mật khẩu xác nhận không khớp' });
        return;
    }
    
    try {
        const res = await fetch('<?= APP_URL ?>/tai-khoan/doi-mat-khau', {
            method: 'POST',
            body: formData
        });
        const data = await res.json();
        
        if (data.success) {
            Toast.fire({ icon: 'success', title: data.message });
            this.reset();
        } else {
            Toast.fire({ icon: 'error', title: data.message });
        }
    } catch (err) {
        Toast.fire({ icon: 'error', title: 'Có lỗi xảy ra. Vui lòng thử lại.' });
    }
});
</script>
