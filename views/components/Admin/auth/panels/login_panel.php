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
        <?php component('input_text', [
            'name' => 'email', 
            'label' => 'Email hoặc tên đăng nhập', 
            'placeholder' => 'Nhập email hoặc tên đăng nhập', 
            'required' => true, 
            'rightIcon' => 'mdi:account-outline'
        ]); ?>

        <?php component('input_text', [
            'name' => 'password', 
            'type' => 'password', 
            'label' => 'Mật khẩu', 
            'placeholder' => 'Nhập mật khẩu', 
            'required' => true, 
            'togglePassword' => true
        ]); ?>

        <div class="flex items-center justify-between pt-1">
            <?php component('checkbox', ['name' => 'remember', 'label' => 'Ghi nhớ đăng nhập']); ?>
            <button type="button" onclick="switchPanel('panel-forgot')" class="text-xs text-crimson-600 font-bold hover:text-crimson-700 transition-colors focus:outline-none">Quên mật khẩu?</button>
        </div>

        <button type="submit" id="btn-login" class="w-full h-[48px] bg-[#6B0D18] hover:bg-[#4C0519] text-[#FAF8F5] font-semibold rounded-xl transition-all shadow-md flex items-center justify-center gap-2 focus:outline-none">
            <span>Đăng nhập quản trị</span>
            <span class="iconify" data-icon="mdi:login"></span>
        </button>
    </form>
</div>
