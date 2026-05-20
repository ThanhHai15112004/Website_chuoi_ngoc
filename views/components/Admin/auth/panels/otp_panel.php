<?php
// views/components/Admin/auth/panels/otp_panel.php
?>
<!-- PANEL 2: 2FA OTP VERIFICATION -->
<div id="panel-otp" class="hidden auth-card-transition">
    <div class="mb-6">
        <h3 class="font-luxury text-2xl font-bold text-gray-900 mb-1 flex items-center gap-2">
            Xác thực bảo mật
            <span class="iconify text-emerald-600 text-xl" data-icon="mdi:shield-check"></span>
        </h3>
        <p class="text-gray-500 text-xs font-light">Nhập mã xác thực OTP gồm 6 chữ số được gửi tới số điện thoại/email của bạn.</p>
    </div>

    <form id="form-otp" onsubmit="handleOtpSubmit(event)" class="space-y-6">
        <!-- Six digit blocks -->
        <div class="flex justify-between gap-2" dir="ltr">
            <input type="text" maxlength="1" class="otp-box w-12 h-12 border border-gray-200 rounded-lg text-center text-lg font-bold text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/15 focus:border-[#6B0D18] transition-all bg-[#FAF8F5]" required>
            <input type="text" maxlength="1" class="otp-box w-12 h-12 border border-gray-200 rounded-lg text-center text-lg font-bold text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/15 focus:border-[#6B0D18] transition-all bg-[#FAF8F5]" required>
            <input type="text" maxlength="1" class="otp-box w-12 h-12 border border-gray-200 rounded-lg text-center text-lg font-bold text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/15 focus:border-[#6B0D18] transition-all bg-[#FAF8F5]" required>
            <input type="text" maxlength="1" class="otp-box w-12 h-12 border border-gray-200 rounded-lg text-center text-lg font-bold text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/15 focus:border-[#6B0D18] transition-all bg-[#FAF8F5]" required>
            <input type="text" maxlength="1" class="otp-box w-12 h-12 border border-gray-200 rounded-lg text-center text-lg font-bold text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/15 focus:border-[#6B0D18] transition-all bg-[#FAF8F5]" required>
            <input type="text" maxlength="1" class="otp-box w-12 h-12 border border-gray-200 rounded-lg text-center text-lg font-bold text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/15 focus:border-[#6B0D18] transition-all bg-[#FAF8F5]" required>
        </div>

        <!-- Resend & Timer -->
        <div class="flex items-center justify-between text-xs">
            <span class="text-gray-500 flex items-center gap-1">
                <span class="iconify" data-icon="mdi:clock-outline"></span>
                Gửi lại sau: <span id="otp-timer" class="font-bold text-[#6B0D18]">60s</span>
            </span>
            <button type="button" id="btn-otp-resend" onclick="resendOtp()" disabled class="text-gray-400 font-bold transition-colors focus:outline-none cursor-not-allowed">Gửi lại mã</button>
        </div>

        <!-- Buttons -->
        <div class="space-y-3">
            <button type="submit" id="btn-otp-confirm" class="w-full h-[46px] bg-[#6B0D18] hover:bg-[#4C0519] text-[#FAF8F5] font-semibold rounded-xl transition-all shadow-md flex items-center justify-center gap-2 focus:outline-none">
                <span id="btn-otp-text">Xác nhận</span>
                <span class="iconify" id="btn-otp-icon" data-icon="mdi:check-decagram"></span>
            </button>
            <button type="button" onclick="switchPanel('panel-login')" class="w-full h-[46px] border border-gray-200 hover:bg-gray-50 text-gray-700 font-medium rounded-xl transition-all flex items-center justify-center gap-1 focus:outline-none">
                <span class="iconify" data-icon="mdi:chevron-left"></span>
                Quay lại đăng nhập
            </button>
        </div>
    </form>
</div>
