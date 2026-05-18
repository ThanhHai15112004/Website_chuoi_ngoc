<!-- ================= SIGN IN PANEL ================= -->
<div class="form-container sign-in-container pt-16 md:pt-0">
    <form action="<?= APP_URL ?>/dang-nhap/xu-ly" method="POST" class="auth-form flex flex-col items-center justify-center h-full px-8 md:px-12 text-center bg-transparent">
        
        <!-- Decorative icon -->
        <div class="w-14 h-14 rounded-2xl icon-bg-login flex items-center justify-center mb-5 auth-icon-bounce">
            <iconify-icon icon="ph:lock-key-fill" class="text-2xl text-white"></iconify-icon>
        </div>

        <h2 class="text-2xl font-serif font-bold text-[#8b0000] mb-1 tracking-tight">Mừng Trở Lại</h2>
        <p class="text-gray-400 text-xs mb-5">Đăng nhập để tiếp tục hành trình của bạn</p>

        <!-- Social Login -->
        <div class="flex gap-3 justify-center mb-4">
            <button type="button" class="auth-social-btn">
                <iconify-icon icon="logos:google-icon" class="text-base"></iconify-icon>
            </button>
            <button type="button" class="auth-social-btn">
                <iconify-icon icon="logos:facebook" class="text-base"></iconify-icon>
            </button>
        </div>

        <div class="auth-divider">
            <span>Hoặc đăng nhập bằng email</span>
        </div>

        <div class="w-full space-y-4 text-left mt-1">
            <div class="auth-input-group">
                <iconify-icon icon="ph:envelope-light" class="auth-input-icon"></iconify-icon>
                <input type="text" name="identifier" class="auth-input" placeholder="Email / Số điện thoại" required>
                <div class="auth-input-line"></div>
            </div>

            <div class="auth-input-group">
                <iconify-icon icon="ph:lock-key-light" class="auth-input-icon"></iconify-icon>
                <input type="password" id="login_password" name="password" class="auth-input pr-9" placeholder="Mật khẩu" required>
                <iconify-icon icon="ph:eye-light" class="auth-input-toggle" onclick="togglePassword('login_password', this)"></iconify-icon>
                <div class="auth-input-line"></div>
            </div>

            <div class="flex items-center justify-between pt-1">
                <label class="flex items-center gap-2 cursor-pointer group">
                    <input type="checkbox" name="remember" class="w-3.5 h-3.5 text-[#8b0000] border-gray-300 rounded focus:ring-[#8b0000] cursor-pointer accent-[#8b0000]">
                    <span class="text-[11px] text-gray-400 group-hover:text-[#8b0000] transition-colors">Ghi nhớ tôi</span>
                </label>
                <a href="<?= APP_URL ?>/quen-mat-khau" class="text-[11px] font-semibold text-[#8b0000] hover:text-[#b30000] hover:underline transition-colors">Quên mật khẩu?</a>
            </div>
        </div>

        <button type="submit" class="auth-submit-btn mt-5">
            <span>Đăng Nhập</span>
            <iconify-icon icon="ph:arrow-right-bold" class="text-base"></iconify-icon>
        </button>
    </form>
</div>
