<!-- ================= SIGN UP PANEL ================= -->
<div class="form-container sign-up-container pt-16 md:pt-0">
    <form action="<?= APP_URL ?>/dang-ky/xu-ly" method="POST" class="auth-form flex flex-col items-center justify-center h-full px-8 md:px-12 text-center bg-transparent" onsubmit="return validateRegister(event)">
        
        <!-- Decorative icon -->
        <div class="w-14 h-14 rounded-2xl icon-bg-register flex items-center justify-center mb-5 auth-icon-bounce">
            <iconify-icon icon="ph:user-plus-fill" class="text-2xl text-white"></iconify-icon>
        </div>

        <h2 class="text-2xl font-serif font-bold text-[#8b0000] mb-1 tracking-tight">Tạo Tài Khoản</h2>
        <p class="text-gray-400 text-xs mb-4">Gia nhập thế giới trang sức phong thủy</p>

        <!-- Social Login -->
        <div class="flex gap-3 justify-center mb-3">
            <button type="button" class="auth-social-btn">
                <iconify-icon icon="logos:google-icon" class="text-base"></iconify-icon>
            </button>
            <button type="button" class="auth-social-btn">
                <iconify-icon icon="logos:facebook" class="text-base"></iconify-icon>
            </button>
        </div>

        <div class="auth-divider">
            <span>Hoặc đăng ký bằng email</span>
        </div>

        <div class="w-full space-y-3.5 text-left mt-1">
            <div class="auth-input-group">
                <iconify-icon icon="ph:user-light" class="auth-input-icon"></iconify-icon>
                <input type="text" name="fullname" class="auth-input" placeholder="Họ và tên" required>
                <div class="auth-input-line"></div>
            </div>

            <div class="auth-input-group">
                <iconify-icon icon="ph:envelope-light" class="auth-input-icon"></iconify-icon>
                <input type="text" name="identifier" class="auth-input" placeholder="Email / Số điện thoại" required>
                <div class="auth-input-line"></div>
            </div>

            <div class="auth-input-group">
                <iconify-icon icon="ph:lock-key-light" class="auth-input-icon"></iconify-icon>
                <input type="password" id="reg_password" name="password" class="auth-input pr-9" placeholder="Mật khẩu (Tối thiểu 6 ký tự)" required minlength="6">
                <iconify-icon icon="ph:eye-light" class="auth-input-toggle" onclick="togglePassword('reg_password', this)"></iconify-icon>
                <div class="auth-input-line"></div>
            </div>

            <div class="auth-input-group">
                <iconify-icon icon="ph:shield-check-light" class="auth-input-icon"></iconify-icon>
                <input type="password" id="reg_password_confirm" name="password_confirm" class="auth-input pr-9" placeholder="Nhập lại mật khẩu" required minlength="6">
                <div class="auth-input-line"></div>
            </div>
            <p id="error-reg-password" class="text-[11px] text-red-500 hidden mt-0.5 pl-7">Mật khẩu không khớp!</p>
        </div>

        <button type="submit" class="auth-submit-btn mt-5">
            <span>Đăng Ký</span>
            <iconify-icon icon="ph:arrow-right-bold" class="text-base"></iconify-icon>
        </button>
    </form>
</div>
