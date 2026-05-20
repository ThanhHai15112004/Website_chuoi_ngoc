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
            <?php component('input_text', [
                'name' => 'identifier',
                'placeholder' => 'Email / Số điện thoại',
                'required' => true,
                'icon' => 'ph:envelope-light',
                'wrapperClass' => 'mb-0'
            ]); ?>

            <?php component('input_text', [
                'name' => 'password',
                'id' => 'login_password',
                'type' => 'password',
                'placeholder' => 'Mật khẩu',
                'required' => true,
                'icon' => 'ph:lock-key-light',
                'togglePassword' => true,
                'wrapperClass' => 'mb-0'
            ]); ?>

            <div class="flex items-center justify-between pt-1">
                <?php component('checkbox', [
                    'name' => 'remember',
                    'label' => 'Ghi nhớ tôi'
                ]); ?>
                <a href="<?= APP_URL ?>/quen-mat-khau" class="text-[11px] font-semibold text-crimson-600 hover:text-crimson-700 hover:underline transition-colors">Quên mật khẩu?</a>
            </div>
        </div>

        <button type="submit" class="auth-submit-btn mt-5">
            <span>Đăng Nhập</span>
            <iconify-icon icon="ph:arrow-right-bold" class="text-base"></iconify-icon>
        </button>
    </form>
</div>
