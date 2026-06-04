<?php
// Parse ngay_sinh
$ngaySinh = $user['ngay_sinh'] ?? null;
$birthDay = $ngaySinh ? (int)date('d', strtotime($ngaySinh)) : 0;
$birthMonth = $ngaySinh ? (int)date('m', strtotime($ngaySinh)) : 0;
$birthYear = $ngaySinh ? (int)date('Y', strtotime($ngaySinh)) : 0;
$gioiTinh = $user['gioi_tinh'] ?? '';
?>
<div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 lg:p-10">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-2">Hồ sơ cá nhân</h2>
        <p class="text-gray-500">Quản lý thông tin hồ sơ để bảo mật tài khoản và nhận các ưu đãi cá nhân hóa.</p>
    </div>

    <!-- User Profile Header -->
    <div class="flex items-center gap-6 mb-12 pb-8 border-b border-gray-100">
        <div class="relative group shrink-0">
            <div class="w-24 h-24 lg:w-28 lg:h-28 rounded-full bg-red-50 flex items-center justify-center border-4 border-white shadow-md overflow-hidden relative">
                <?php if (!empty($user['anh_dai_dien'])): ?>
                <img src="<?= htmlspecialchars($user['anh_dai_dien']) ?>" alt="Avatar" class="w-full h-full object-cover" id="avatar-preview">
                <?php else: ?>
                <img src="https://ui-avatars.com/api/?name=<?= urlencode($user['ho_ten'] ?? 'U') ?>&background=8b0000&color=fff&size=150" alt="Avatar" class="w-full h-full object-cover" id="avatar-preview">
                <?php endif; ?>
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <iconify-icon icon="ph:camera-plus-bold" class="text-white text-2xl"></iconify-icon>
                </div>
            </div>
            <label for="avatar-upload" class="absolute bottom-0 right-0 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-lg border border-gray-200 text-gray-600 hover:text-[#8b0000] cursor-pointer transition-colors z-10">
                <iconify-icon icon="ph:pencil-simple-bold" class="text-lg"></iconify-icon>
                <input type="file" id="avatar-upload" class="hidden" accept="image/jpeg, image/png, image/jpg">
            </label>
        </div>
        <div class="text-left flex-1">
            <h3 class="text-xl lg:text-2xl font-bold text-gray-900"><?= htmlspecialchars($user['ho_ten'] ?? 'Chưa cập nhật') ?></h3>
            <p class="text-sm text-gray-500 mt-1">Định dạng file: .JPEG, .PNG. Dung lượng tối đa: 2MB.</p>
            <div class="mt-3 inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-red-50 text-[#8b0000] border border-red-100">
                <iconify-icon icon="ph:shield-check-fill"></iconify-icon>
                <span class="text-xs font-semibold">Tài khoản đã xác thực</span>
            </div>
        </div>
    </div>

    <form id="form-ho-so" class="mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-10">
            <!-- Full Name -->
            <div class="flex flex-col gap-4">
                <label class="text-sm font-semibold text-gray-700">Họ và tên</label>
                <input type="text" name="ho_ten" value="<?= htmlspecialchars($user['ho_ten'] ?? '') ?>" class="w-full rounded-xl border border-gray-200 px-5 py-4 text-gray-800 focus:border-[#8b0000] focus:ring-1 focus:ring-[#8b0000] outline-none transition-all hover:border-gray-300">
            </div>

            <!-- Email (readonly) -->
            <div class="flex flex-col gap-4">
                <label class="text-sm font-semibold text-gray-700">Email</label>
                <input type="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" disabled class="w-full rounded-xl border border-gray-100 bg-gray-50 px-5 py-4 text-gray-500 cursor-not-allowed">
            </div>

            <!-- Phone -->
            <div class="flex flex-col gap-4">
                <label class="text-sm font-semibold text-gray-700">Số điện thoại</label>
                <input type="tel" name="so_dien_thoai" value="<?= htmlspecialchars($user['so_dien_thoai'] ?? '') ?>" class="w-full rounded-xl border border-gray-200 px-5 py-4 text-gray-800 focus:border-[#8b0000] focus:ring-1 focus:ring-[#8b0000] outline-none transition-all hover:border-gray-300">
            </div>

            <!-- Gender -->
            <div class="flex flex-col gap-4">
                <label class="text-sm font-semibold text-gray-700">Giới tính</label>
                <div class="flex items-center gap-8 h-[56px] px-2">
                    <?php foreach (['Nam' => 'Nam', 'Nữ' => 'Nữ', 'Khác' => 'Khác'] as $val => $label): ?>
                    <label class="flex items-center cursor-pointer group">
                        <div class="relative flex items-center justify-center">
                            <input type="radio" name="gioi_tinh" value="<?= $val ?>" <?= $gioiTinh == $val ? 'checked' : '' ?> class="peer" style="display: none !important;">
                            <div class="w-5 h-5 rounded-full border-2 border-gray-300 peer-checked:border-[#8b0000] transition-colors"></div>
                            <div class="absolute w-2.5 h-2.5 rounded-full bg-[#8b0000] opacity-0 peer-checked:opacity-100 transition-opacity"></div>
                        </div>
                        <span class="ml-3 text-gray-700 font-medium group-hover:text-[#8b0000] transition-colors"><?= $label ?></span>
                    </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Date of Birth -->
            <div class="flex flex-col gap-4">
                <label class="text-sm font-semibold text-gray-700">Ngày sinh</label>
                <div class="flex gap-4">
                    <div class="relative flex-1">
                        <select name="ngay_sinh_ngay" class="w-full rounded-xl border border-gray-200 px-5 py-4 text-gray-800 appearance-none focus:border-[#8b0000] focus:ring-1 focus:ring-[#8b0000] outline-none transition-all hover:border-gray-300 cursor-pointer bg-white">
                            <option value="">Ngày</option>
                            <?php for($i=1; $i<=31; $i++): ?>
                                <option value="<?= $i ?>" <?= $birthDay == $i ? 'selected' : '' ?>><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <iconify-icon icon="ph:caret-down-bold" class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></iconify-icon>
                    </div>
                    <div class="relative flex-1">
                        <select name="ngay_sinh_thang" class="w-full rounded-xl border border-gray-200 px-5 py-4 text-gray-800 appearance-none focus:border-[#8b0000] focus:ring-1 focus:ring-[#8b0000] outline-none transition-all hover:border-gray-300 cursor-pointer bg-white">
                            <option value="">Tháng</option>
                            <?php for($i=1; $i<=12; $i++): ?>
                                <option value="<?= $i ?>" <?= $birthMonth == $i ? 'selected' : '' ?>>Tháng <?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <iconify-icon icon="ph:caret-down-bold" class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></iconify-icon>
                    </div>
                    <div class="relative flex-1">
                        <select name="ngay_sinh_nam" class="w-full rounded-xl border border-gray-200 px-5 py-4 text-gray-800 appearance-none focus:border-[#8b0000] focus:ring-1 focus:ring-[#8b0000] outline-none transition-all hover:border-gray-300 cursor-pointer bg-white">
                            <option value="">Năm</option>
                            <?php $currentYear = date('Y'); for($i=$currentYear; $i>=1900; $i--): ?>
                                <option value="<?= $i ?>" <?= $birthYear == $i ? 'selected' : '' ?>><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                        <iconify-icon icon="ph:caret-down-bold" class="absolute right-5 top-1/2 -translate-y-1/2 text-gray-400 pointer-events-none"></iconify-icon>
                    </div>
                </div>
            </div>
            
            <!-- Address -->
            <div class="flex flex-col gap-4">
                <label class="text-sm font-semibold text-gray-700">Địa chỉ</label>
                <input type="text" name="dia_chi" value="<?= htmlspecialchars($user['dia_chi'] ?? '') ?>" placeholder="Nhập địa chỉ của bạn..." class="w-full rounded-xl border border-gray-200 px-5 py-4 text-gray-800 focus:border-[#8b0000] focus:ring-1 focus:ring-[#8b0000] outline-none transition-all hover:border-gray-300">
            </div>

            <!-- Feng Shui Element -->
            <div class="flex flex-col gap-4 md:col-span-2">
                <label class="text-sm font-semibold text-gray-700">Mệnh Phong Thủy</label>
                <div class="relative">
                    <input type="text" value="<?= htmlspecialchars($user['ten_menh'] ?? 'Chưa cập nhật') ?>" disabled class="w-full rounded-xl border border-gray-100 bg-gray-50 px-5 py-4 text-gray-500 cursor-not-allowed">
                </div>
                <p class="text-xs text-gray-500 mt-1 flex items-center gap-1.5"><iconify-icon icon="ph:info-bold" class="text-[#d4af37] text-sm"></iconify-icon> Mệnh được tự động tính dựa trên năm sinh. <a href="<?= APP_URL ?>/vong-theo-menh" class="text-[#8b0000] hover:opacity-80 transition-opacity">Tra cứu bản mệnh</a></p>
            </div>
        </div>

        <div class="pt-8 mt-4 border-t border-gray-100 flex justify-end">
            <button type="submit" class="bg-[#8b0000] text-white px-8 py-3.5 rounded-xl font-bold hover:bg-[#700000] transition-colors shadow-lg shadow-red-900/20 focus:ring-2 focus:ring-offset-2 focus:ring-[#8b0000] outline-none flex items-center gap-2">
                <iconify-icon icon="ph:floppy-disk-back-bold" class="text-lg"></iconify-icon>
                Lưu Thay Đổi
            </button>
        </div>
    </form>
</div>

<script>
document.getElementById('form-ho-so')?.addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    try {
        const res = await fetch('<?= APP_URL ?>/tai-khoan/cap-nhat-ho-so', {
            method: 'POST',
            body: formData
        });
        const data = await res.json();
        
        if (data.success) {
            Toast.fire({ icon: 'success', title: data.message });
        } else {
            Toast.fire({ icon: 'error', title: data.message });
        }
    } catch (err) {
        Toast.fire({ icon: 'error', title: 'Có lỗi xảy ra. Vui lòng thử lại.' });
    }
});
</script>
