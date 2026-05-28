<?php
$kh = $kh ?? null;
$ranks = $ranks ?? [];
$isEdit = !empty($kh);
?>
<!-- Form -->
<form id="customerForm" class="bg-white rounded-b-2xl shadow-sm border border-gray-100 p-8 pt-6" onsubmit="event.preventDefault(); saveCustomer();">
    <input type="hidden" id="customer_id" value="<?= $kh['id'] ?? '' ?>">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Cột trái: Thông tin cá nhân -->
        <div class="space-y-5">
            <div class="flex items-center gap-2 border-b border-gray-100 pb-2 mb-4">
                <span class="iconify text-gray-400 text-lg" data-icon="mdi:card-account-details-outline"></span>
                <h4 class="text-sm font-bold text-gray-800 uppercase tracking-wide">Thông tin cá nhân</h4>
            </div>
            
            <!-- Upload Avatar -->
            <div class="flex items-center gap-4 mb-2">
                <div class="relative group cursor-pointer" onclick="document.getElementById('anh_dai_dien').click()">
                    <div id="avatar-preview" class="w-20 h-20 rounded-full bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center text-gray-400 overflow-hidden group-hover:border-[#6B0D18] group-hover:text-[#6B0D18] transition-colors relative">
                        <?php if(!empty($kh['anh_dai_dien'])): ?>
                            <img src="<?= APP_URL . '/public' . $kh['anh_dai_dien'] ?>" class="w-full h-full object-cover">
                        <?php else: ?>
                            <span class="iconify text-2xl" data-icon="mdi:camera-plus-outline"></span>
                        <?php endif; ?>
                    </div>
                    <!-- Hidden input file -->
                    <input type="file" id="anh_dai_dien" name="anh_dai_dien" class="hidden" accept="image/*" onchange="previewAvatar(this)">
                </div>
                <div>
                    <h4 class="text-[13px] font-bold text-gray-800">Ảnh đại diện</h4>
                    <p class="text-[11px] text-gray-500 mt-0.5">Hỗ trợ JPG, PNG hoặc GIF.<br>Dung lượng tối đa 2MB.</p>
                </div>
            </div>
            
            <div>
                <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Họ và tên <span class="text-red-500">*</span></label>
                <input type="text" id="ho_ten" name="ho_ten" value="<?= htmlspecialchars($kh['ho_ten'] ?? '') ?>" placeholder="Nhập họ tên đầy đủ..." class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all" required>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Số điện thoại <span class="text-red-500">*</span></label>
                    <input type="text" id="so_dien_thoai" name="so_dien_thoai" value="<?= htmlspecialchars($kh['so_dien_thoai'] ?? '') ?>" placeholder="Nhập số điện thoại..." class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all" required>
                </div>
                <div>
                    <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Giới tính</label>
                    <select id="gioi_tinh" name="gioi_tinh" class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] transition-all">
                        <option value="nam" <?= ($kh['gioi_tinh'] ?? '') == 'nam' ? 'selected' : '' ?>>Nam</option>
                        <option value="nu" <?= ($kh['gioi_tinh'] ?? '') == 'nu' ? 'selected' : '' ?>>Nữ</option>
                        <option value="khac" <?= ($kh['gioi_tinh'] ?? '') == 'khac' ? 'selected' : '' ?>>Khác</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Email liên hệ</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($kh['email'] ?? '') ?>" placeholder="Nhập địa chỉ email..." class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
            </div>
            
            <div>
                <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Ngày sinh</label>
                <input type="date" id="ngay_sinh" name="ngay_sinh" value="<?= htmlspecialchars($kh['ngay_sinh'] ?? '') ?>" class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
                <p class="text-[11px] text-gray-500 mt-1.5 flex items-start gap-1">
                    <span class="iconify shrink-0 mt-0.5 text-blue-500" data-icon="mdi:information-outline"></span>
                    Hệ thống sẽ tự động tính Mệnh phong thủy dựa trên năm sinh để đưa ra gợi ý sản phẩm phù hợp.
                </p>
            </div>
        </div>

        <!-- Cột phải: Cài đặt tài khoản & Ghi chú -->
        <div class="space-y-5">
            <div class="flex items-center gap-2 border-b border-gray-100 pb-2 mb-4">
                <span class="iconify text-gray-400 text-lg" data-icon="mdi:shield-account-outline"></span>
                <h4 class="text-sm font-bold text-gray-800 uppercase tracking-wide">Tài khoản & Ghi chú</h4>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Hạng thành viên</label>
                    <select id="id_hang_thanh_vien" name="id_hang_thanh_vien" class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] transition-all">
                        <option value="none">Chưa có hạng</option>
                        <?php foreach($ranks as $r): ?>
                            <option value="<?= $r['id'] ?>" <?= ($kh['id_hang_thanh_vien'] ?? '') == $r['id'] ? 'selected' : '' ?>><?= htmlspecialchars($r['ten_hang']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Trạng thái</label>
                    <select id="trang_thai" name="trang_thai" class="w-full px-4 py-2.5 <?= ($kh['trang_thai'] ?? 1) == 1 ? 'bg-emerald-50 text-emerald-700 border-emerald-100 focus:border-emerald-300' : 'bg-red-50 text-red-700 border-red-100 focus:border-red-300' ?> rounded-xl text-sm font-medium focus:outline-none transition-all" onchange="this.className=this.value=='active'?'w-full px-4 py-2.5 bg-emerald-50 text-emerald-700 border border-emerald-100 rounded-xl text-sm font-medium focus:outline-none focus:border-emerald-300 transition-all':'w-full px-4 py-2.5 bg-red-50 text-red-700 border border-red-100 rounded-xl text-sm font-medium focus:outline-none focus:border-red-300 transition-all'">
                        <option value="active" <?= ($kh['trang_thai'] ?? 1) == 1 ? 'selected' : '' ?>>Kích hoạt ngay</option>
                        <option value="inactive" <?= ($kh['trang_thai'] ?? 1) == 0 ? 'selected' : '' ?>>Tạm khóa</option>
                    </select>
                </div>
            </div>
            
            <div>
                <label class="block text-[13px] font-bold text-gray-700 mb-1.5"><?= $isEdit ? 'Mật khẩu mới (Bỏ trống nếu không đổi)' : 'Mật khẩu khởi tạo' ?></label>
                <div class="relative">
                    <input type="text" id="mat_khau" name="mat_khau" value="<?= $isEdit ? '' : '123456' ?>" placeholder="Nhập mật khẩu..." class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all">
                    <button type="button" onclick="generatePassword()" class="absolute right-3 top-2.5 text-xs font-bold text-[#6B0D18] hover:underline">Tạo ngẫu nhiên</button>
                </div>
                <p class="text-[11px] text-gray-500 mt-1.5">Mặc định hệ thống dùng `123456`. Khách hàng có thể đổi lại sau khi đăng nhập.</p>
            </div>
            
            <div>
                <label class="block text-[13px] font-bold text-gray-700 mb-1.5">Ghi chú nội bộ</label>
                <textarea id="ghi_chu_vip" name="ghi_chu_vip" rows="4" placeholder="Nhập ghi chú hỗ trợ chăm sóc khách hàng (chỉ nhân viên xem được)..." class="w-full px-4 py-2.5 bg-gray-50/50 border border-gray-200 rounded-xl text-sm focus:outline-none focus:bg-white focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all resize-none"><?= htmlspecialchars($kh['ghi_chu_vip'] ?? '') ?></textarea>
            </div>
        </div>
        
    </div>

    <!-- Submit actions -->
    <div class="mt-8 pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
        <a href="<?= APP_URL ?>/admin/khach-hang" class="px-6 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-xl font-bold text-sm hover:bg-gray-50 transition-colors">Hủy bỏ</a>
        <button id="btn-save" type="submit" class="px-8 py-2.5 bg-[#6B0D18] text-white rounded-xl font-bold text-sm hover:bg-[#8A111F] transition-colors shadow-md flex items-center gap-2">
            <span class="iconify" data-icon="mdi:check"></span> <?= $isEdit ? 'Lưu thay đổi' : 'Tạo hồ sơ' ?>
        </button>
    </div>
</form>

<div id="toast" class="fixed top-4 right-4 z-50 transform transition-all duration-300 translate-y-[-100%] opacity-0">
    <div class="bg-gray-800 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3">
        <span class="iconify text-xl" data-icon="mdi:information"></span>
        <span id="toast-message" class="font-medium text-sm"></span>
    </div>
</div>

<script>
    function previewAvatar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('avatar-preview').innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function generatePassword() {
        const chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*";
        let pass = "";
        for (let i = 0; i < 10; i++) {
            pass += chars.charAt(Math.floor(Math.random() * chars.length));
        }
        document.getElementById('mat_khau').value = pass;
    }

    function showToast(message) {
        const toast = document.getElementById('toast');
        document.getElementById('toast-message').textContent = message;
        toast.classList.remove('translate-y-[-100%]', 'opacity-0');
        setTimeout(() => toast.classList.add('translate-y-[-100%]', 'opacity-0'), 3000);
    }

    async function saveCustomer() {
        const form = document.getElementById('customerForm');
        const formData = new FormData(form);
        const id = document.getElementById('customer_id').value;
        const btnSave = document.getElementById('btn-save');
        const originalText = btnSave.innerHTML;
        
        const url = id ? `<?= APP_URL ?>/admin/khach-hang/cap-nhat/${id}` : `<?= APP_URL ?>/admin/khach-hang/luu`;

        btnSave.innerHTML = '<span class="iconify animate-spin text-lg" data-icon="mdi:loading"></span> Đang lưu...';
        btnSave.disabled = true;

        try {
            const response = await fetch(url, {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            
            if (result.success) {
                showToast(result.message);
                setTimeout(() => {
                    window.location.href = '<?= APP_URL ?>/admin/khach-hang';
                }, 1000);
            } else {
                showToast(result.message);
                btnSave.innerHTML = originalText;
                btnSave.disabled = false;
            }
        } catch (error) {
            console.error('Error:', error);
            showToast('Có lỗi xảy ra khi lưu khách hàng');
            btnSave.innerHTML = originalText;
            btnSave.disabled = false;
        }
    }
</script>
