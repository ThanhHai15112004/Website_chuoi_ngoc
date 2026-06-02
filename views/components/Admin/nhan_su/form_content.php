<?php
// views/components/Admin/nhan_su/form_content.php
$staff = $staff ?? null;
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <h3 class="font-bold text-gray-900 mb-6 pb-3 border-b border-gray-100 flex items-center gap-2">
        <span class="iconify text-gray-400 text-xl" data-icon="mdi:account-details-outline"></span> Thông tin tài khoản
    </h3>
    
    <div class="flex flex-col md:flex-row gap-8">
        <!-- Cột Ảnh đại diện -->
        <div class="w-full md:w-1/4 flex flex-col items-center">
            <div class="relative group cursor-pointer mb-3">
                <div class="w-32 h-32 rounded-full border-2 border-dashed border-gray-300 bg-gray-50 flex flex-col items-center justify-center overflow-hidden group-hover:border-[#6B0D18] transition-colors relative">
                    <?php if($staff): ?>
                        <img src="<?= $staff['avatar_url'] ?>" class="w-full h-full object-cover" id="avatarPreview">
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="iconify text-white text-2xl" data-icon="mdi:camera-outline"></span>
                        </div>
                    <?php else: ?>
                        <span class="iconify text-gray-400 text-3xl mb-1 group-hover:text-[#6B0D18] transition-colors" data-icon="mdi:camera-plus-outline"></span>
                        <span class="text-xs text-gray-500 font-medium group-hover:text-[#6B0D18] transition-colors">Tải ảnh lên</span>
                    <?php endif; ?>
                </div>
            </div>
            <p class="text-[11px] text-gray-400 text-center px-4">Định dạng JPG, PNG. Dung lượng tối đa 2MB.</p>
        </div>

        <!-- Cột Thông tin nhập liệu -->
        <div class="w-full md:w-3/4 space-y-5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Họ và tên <span class="text-red-500">*</span></label>
                    <input type="text" id="staffName" name="ho_ten" value="<?= htmlspecialchars($staff['ho_ten'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm" placeholder="Nhập họ tên nhân viên...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Mã nhân viên</label>
                    <input type="text" id="staffCode" name="ma_nv" value="<?= htmlspecialchars($staff['ma_nv'] ?? ($ma_nv_moi ?? '')) ?>" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm <?= $staff ? 'bg-gray-50' : '' ?>" placeholder="VD: NV00123 (Có thể để trống để tự sinh)" <?= $staff ? 'readonly' : '' ?>>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="staffEmail" name="email" value="<?= htmlspecialchars($staff['email'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm" placeholder="Dùng để đăng nhập">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
                    <input type="text" id="staffPhone" name="dien_thoai" value="<?= htmlspecialchars($staff['dien_thoai'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm" placeholder="Số điện thoại liên hệ">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Phòng ban</label>
                    <input type="text" id="staffDept" name="phong_ban" value="<?= htmlspecialchars($staff['phong_ban'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm" placeholder="VD: Kho, CSKH, Kế toán...">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Ngày sinh (Tùy chọn)</label>
                    <input type="date" id="staffDob" name="ngay_sinh" value="<?= $staff['ngay_sinh'] ?? '' ?>" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm text-gray-700">
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ (Tùy chọn)</label>
                <input type="text" id="staffAddress" name="dia_chi" value="<?= htmlspecialchars($staff['dia_chi'] ?? '') ?>" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] transition-colors text-sm" placeholder="Địa chỉ thường trú">
            </div>
        </div>
    </div>
</div>
