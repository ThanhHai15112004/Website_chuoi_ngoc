<?php
// views/components/Admin/auth/panels/login_panel.php
?>
<!-- PANEL 1: DEFAULT LOGIN -->
<div id="panel-login" class="auth-card-transition">
    <div class="mb-6">
        <h3 class="font-luxury text-2xl font-bold text-gray-900 mb-1 flex items-center gap-2">
            Đăng nhập Admin
            <span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:lock-outline"></span>
        </h3>
        <p class="text-gray-500 text-xs font-light">Vui lòng nhập thông tin tài khoản để truy cập trang quản trị.</p>
    </div>

    <form id="form-login" action="/admin/dang-nhap/xu-ly" method="POST" class="space-y-4">
        <!-- Email Field -->
        <div>
            <label for="email" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Email hoặc tên đăng nhập</label>
            <div class="relative">
                <input type="text" id="email" name="email" placeholder="Nhập email hoặc tên đăng nhập" required
                    class="w-full px-4 h-[46px] border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/15 focus:border-[#6B0D18] transition-all text-sm placeholder-gray-400">
                <span class="absolute right-3.5 top-1/2 -translate-y-1/2 iconify text-gray-400 text-lg" data-icon="mdi:account-outline"></span>
            </div>
        </div>

        <!-- Password Field -->
        <div>
            <label for="password" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Mật khẩu</label>
            <div class="relative">
                <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required
                    class="w-full px-4 h-[46px] border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/15 focus:border-[#6B0D18] transition-all text-sm placeholder-gray-400 pr-10">
                <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-[#6B0D18] transition-colors focus:outline-none">
                    <span class="iconify text-lg" data-icon="mdi:eye-outline" id="eye-icon"></span>
                </button>
            </div>
        </div>

        <!-- Remember & Forgot -->
        <div class="flex items-center justify-between pt-1">
            <label class="flex items-center gap-2 cursor-pointer group">
                <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] cursor-pointer transition-colors accent-[#6B0D18]">
                <span class="text-xs text-gray-600 group-hover:text-gray-900 transition-colors">Ghi nhớ đăng nhập</span>
            </label>
            <button type="button" onclick="switchPanel('panel-forgot')" class="text-xs text-[#6B0D18] font-bold hover:text-[#9B1C31] transition-colors focus:outline-none">Quên mật khẩu?</button>
        </div>

        <!-- Submit Button -->
        <button type="submit" id="btn-login" class="w-full h-[48px] bg-[#6B0D18] hover:bg-[#4C0519] text-[#FAF8F5] font-semibold rounded-xl transition-all shadow-md hover:shadow-lg flex items-center justify-center gap-2 mt-2 focus:outline-none">
            <span id="btn-login-text">Đăng nhập quản trị</span>
            <span class="iconify" id="btn-login-icon" data-icon="mdi:login"></span>
        </button>
    </form>
</div>
