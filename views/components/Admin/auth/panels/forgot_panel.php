<?php
// views/components/Admin/auth/panels/forgot_panel.php
?>
<!-- PANEL 3: FORGOT PASSWORD -->
<div id="panel-forgot" class="hidden auth-card-transition">
    <div class="mb-6">
        <h3 class="font-luxury text-2xl font-bold text-gray-900 mb-1 flex items-center gap-2">
            Khôi phục mật khẩu
            <span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:lock-reset"></span>
        </h3>
        <p class="text-gray-500 text-xs font-light">Nhập email quản trị của bạn để nhận liên kết khôi phục.</p>
    </div>

    <form id="form-forgot" onsubmit="handleForgotSubmit(event)" class="space-y-5">
        <div>
            <label for="recovery_email" class="block text-xs font-semibold text-gray-700 uppercase tracking-wider mb-1.5">Email quản trị</label>
            <div class="relative">
                <input type="email" id="recovery_email" placeholder="Nhập email đã đăng ký hệ thống" required
                    class="w-full px-4 h-[46px] border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/15 focus:border-[#6B0D18] transition-all text-sm placeholder-gray-400">
                <span class="absolute right-3.5 top-1/2 -translate-y-1/2 iconify text-gray-400 text-lg" data-icon="mdi:email-outline"></span>
            </div>
        </div>

        <div class="space-y-3">
            <button type="submit" id="btn-forgot-submit" class="w-full h-[46px] bg-[#6B0D18] hover:bg-[#4C0519] text-[#FAF8F5] font-semibold rounded-xl transition-all shadow-md flex items-center justify-center gap-2 focus:outline-none">
                <span id="btn-forgot-text">Gửi hướng dẫn</span>
                <span class="iconify" id="btn-forgot-icon" data-icon="mdi:email-send"></span>
            </button>
            <button type="button" onclick="switchPanel('panel-login')" class="w-full h-[46px] border border-gray-200 hover:bg-gray-50 text-gray-700 font-medium rounded-xl transition-all flex items-center justify-center gap-1 focus:outline-none">
                <span class="iconify" data-icon="mdi:chevron-left"></span>
                Quay lại đăng nhập
            </button>
        </div>
    </form>
</div>
