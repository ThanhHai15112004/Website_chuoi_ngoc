<!-- ================= SIGN UP PANEL ================= -->
<div class="form-container sign-up-container pt-16 md:pt-0">
    <form id="form-register" action="<?= APP_URL ?>/dang-ky/xu-ly" method="POST" class="auth-form flex flex-col items-center justify-center h-full px-8 md:px-12 text-center bg-transparent" onsubmit="return validateRegister(event)">
        
        <!-- Decorative icon -->
        <div class="w-12 h-12 rounded-2xl icon-bg-register flex items-center justify-center mb-4 auth-icon-bounce">
            <iconify-icon icon="ph:user-plus-fill" class="text-xl text-white"></iconify-icon>
        </div>

        <h2 class="text-2xl font-serif font-bold text-[#8b0000] mb-0.5 tracking-tight">Tạo Tài Khoản</h2>
        <p class="text-gray-400 text-xs mb-3">Gia nhập thế giới trang sức phong thủy</p>

        <!-- Social Login -->
        <div class="flex gap-3 justify-center mb-2.5">
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

        <div class="w-full space-y-3 text-left mt-1">
            <?php component('input_text', [
                'name' => 'ho_ten',
                'placeholder' => 'Họ và tên',
                'required' => true,
                'icon' => 'ph:user-light',
                'wrapperClass' => 'mb-0'
            ]); ?>

            <?php component('input_text', [
                'name' => 'email',
                'placeholder' => 'Email',
                'required' => true,
                'icon' => 'ph:envelope-light',
                'wrapperClass' => 'mb-0'
            ]); ?>

            <?php component('input_text', [
                'name' => 'password',
                'id' => 'reg_password',
                'type' => 'password',
                'placeholder' => 'Mật khẩu (Tối thiểu 6 ký tự)',
                'required' => true,
                'icon' => 'ph:lock-key-light',
                'togglePassword' => true,
                'class' => 'minlength-6',
                'wrapperClass' => 'mb-0'
            ]); ?>

            <?php component('input_text', [
                'name' => 'password_confirm',
                'id' => 'reg_password_confirm',
                'type' => 'password',
                'placeholder' => 'Nhập lại mật khẩu',
                'required' => true,
                'icon' => 'ph:shield-check-light',
                'wrapperClass' => 'mb-0'
            ]); ?>
            <p id="error-reg-password" class="text-[11px] text-red-500 hidden mt-0.5 pl-7">Mật khẩu không khớp!</p>
        </div>

        <button type="submit" class="auth-submit-btn mt-6">
            <span>Đăng Ký</span>
            <iconify-icon icon="ph:arrow-right-bold" class="text-base"></iconify-icon>
        </button>
    </form>
</div>
