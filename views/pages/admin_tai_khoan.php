<?php
// views/pages/admin_tai_khoan.php
$tab = $active_tab ?? 'profile';
?>
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="flex items-center gap-4">
        <div class="w-16 h-16 rounded-full bg-red-100 flex items-center justify-center shrink-0 border-4 border-white shadow-sm">
            <span class="iconify text-3xl text-red-600" data-icon="mdi:account-cog-outline"></span>
        </div>
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Quản lý Tài khoản</h1>
            <p class="text-sm text-gray-500 mt-1">Cập nhật thông tin cá nhân và cài đặt bảo mật</p>
        </div>
    </div>

    <!-- Main Card -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <!-- Tabs -->
        <div class="flex items-center border-b border-gray-200 px-6 bg-gray-50/50">
            <a href="?tab=profile" class="flex items-center gap-2 px-4 py-4 text-sm font-medium border-b-2 transition-colors <?= $tab === 'profile' ? 'border-red-600 text-red-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' ?>">
                <span class="iconify text-lg" data-icon="mdi:card-account-details-outline"></span>
                Hồ sơ cá nhân
            </a>
            <a href="?tab=security" class="flex items-center gap-2 px-4 py-4 text-sm font-medium border-b-2 transition-colors <?= $tab === 'security' ? 'border-red-600 text-red-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' ?>">
                <span class="iconify text-lg" data-icon="mdi:shield-lock-outline"></span>
                Bảo mật & Mật khẩu
            </a>
        </div>

        <!-- Tab Content -->
        <div class="p-6">
            <?php if ($tab === 'profile'): ?>
                <!-- PROFILE TAB -->
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="space-y-8">
                        <!-- Avatar Section -->
                        <div>
                            <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wide">Ảnh đại diện</h3>
                            <div class="flex items-center gap-6">
                                <img src="<?= $user['anh_dai_dien'] ?>" alt="Avatar" class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-md">
                                <div>
                                    <div class="flex gap-3">
                                        <label class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 cursor-pointer transition-colors shadow-sm">
                                            <span class="flex items-center gap-2">
                                                <span class="iconify" data-icon="mdi:upload-outline"></span>
                                                Tải ảnh lên
                                            </span>
                                            <input type="file" class="hidden" accept="image/*">
                                        </label>
                                        <button type="button" class="px-4 py-2 bg-white border border-gray-200 text-red-600 rounded-lg text-sm font-medium hover:bg-red-50 transition-colors shadow-sm">
                                            Xóa ảnh
                                        </button>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-2">Định dạng JPEG, PNG, GIF. Kích thước tối đa 2MB.</p>
                                </div>
                            </div>
                        </div>

                        <hr class="border-gray-100">

                        <!-- Personal Info -->
                        <div>
                            <h3 class="text-sm font-bold text-gray-900 mb-4 uppercase tracking-wide">Thông tin cơ bản</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Họ và tên <span class="text-red-500">*</span></label>
                                    <input type="text" value="<?= $user['ho_ten'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-colors" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                                    <input type="email" value="<?= $user['email'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-colors" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Số điện thoại</label>
                                    <input type="tel" value="<?= $user['sdt'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-colors">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Vai trò hệ thống</label>
                                    <input type="text" value="<?= $user['vai_tro'] ?>" class="w-full px-4 py-2 border border-gray-200 bg-gray-50 rounded-lg text-gray-500 cursor-not-allowed" disabled>
                                    <p class="text-[11px] text-gray-500 mt-1">Chỉ Super Admin mới có thể thay đổi vai trò.</p>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Địa chỉ</label>
                                    <input type="text" value="<?= $user['dia_chi'] ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-colors">
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex justify-end gap-3 pt-6 border-t border-gray-100">
                            <button type="button" class="px-5 py-2.5 bg-white border border-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors">Hủy thay đổi</button>
                            <button type="button" class="px-5 py-2.5 bg-[#8B0000] text-white font-medium rounded-lg hover:bg-red-900 transition-colors flex items-center gap-2 shadow-sm">
                                <span class="iconify" data-icon="mdi:content-save"></span>
                                Lưu thông tin
                            </button>
                        </div>
                    </div>
                </form>

            <?php elseif ($tab === 'security'): ?>
                <!-- SECURITY TAB -->
                <form action="#" method="POST">
                    <div class="space-y-8 max-w-2xl">
                        <div>
                            <h3 class="text-sm font-bold text-gray-900 mb-1 uppercase tracking-wide">Đổi mật khẩu</h3>
                            <p class="text-sm text-gray-500 mb-6">Đảm bảo tài khoản của bạn đang sử dụng một mật khẩu mạnh và không trùng lặp.</p>
                            
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu hiện tại <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="password" placeholder="••••••••" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-colors" required>
                                        <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                            <span class="iconify text-xl" data-icon="mdi:eye-outline"></span>
                                        </button>
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Mật khẩu mới <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="password" placeholder="••••••••" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-colors" required>
                                        <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                            <span class="iconify text-xl" data-icon="mdi:eye-outline"></span>
                                        </button>
                                    </div>
                                    <p class="text-xs text-gray-500 mt-1.5">Mật khẩu phải dài ít nhất 8 ký tự, bao gồm chữ cái và số.</p>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Xác nhận mật khẩu mới <span class="text-red-500">*</span></label>
                                    <div class="relative">
                                        <input type="password" placeholder="••••••••" class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-red-900/20 focus:border-red-900 transition-colors" required>
                                        <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                            <span class="iconify text-xl" data-icon="mdi:eye-outline"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Actions -->
                        <div class="flex justify-start gap-3 pt-6 border-t border-gray-100">
                            <button type="button" class="px-5 py-2.5 bg-[#8B0000] text-white font-medium rounded-lg hover:bg-red-900 transition-colors flex items-center gap-2 shadow-sm">
                                <span class="iconify" data-icon="mdi:shield-check"></span>
                                Cập nhật mật khẩu
                            </button>
                        </div>
                    </div>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
