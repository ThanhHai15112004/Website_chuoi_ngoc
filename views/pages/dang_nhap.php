<!-- Tailwind CDN added to ensure arbitrary classes render correctly -->
<script src="https://cdn.tailwindcss.com"></script>
<div class="auth-page-wrapper flex items-center justify-center bg-gradient-to-br from-gray-50 via-white to-gray-100 py-10 px-4 sm:px-6 lg:px-8 relative overflow-hidden min-h-[calc(100vh-80px)]">
    
    <!-- Decorative Floating Orbs -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="auth-orb auth-orb-1"></div>
        <div class="auth-orb auth-orb-2"></div>
        <div class="auth-orb auth-orb-3"></div>
    </div>

    <!-- Floating Particles -->
    <div class="auth-particles" id="auth-particles"></div>

    <!-- MAIN AUTH WRAPPER -->
    <div class="auth-container relative w-full max-w-[800px] min-h-[600px] bg-white/80 backdrop-blur-sm rounded-2xl shadow-[0_25px_80px_rgba(139,0,0,0.12)] overflow-hidden border border-white/60" id="auth-container" data-aos="zoom-in" data-aos-duration="800">
        
        <?php include __DIR__ . '/../components/User/auth/mobile_tabs.php'; ?>

        <?php include __DIR__ . '/../components/User/auth/register_form.php'; ?>

        <?php include __DIR__ . '/../components/User/auth/login_form.php'; ?>

        <?php include __DIR__ . '/../components/User/auth/sliding_overlay.php'; ?>

    </div>
</div>

<!-- OTP Modal -->
<div id="otpModal" class="fixed inset-0 z-[300] hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeOtpModal()"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-[400px] p-8 relative" style="animation: otpSlideIn 0.4s cubic-bezier(0.16,1,0.3,1)">
            <button onclick="closeOtpModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <iconify-icon icon="ph:x-bold" class="text-xl"></iconify-icon>
            </button>

            <!-- OTP Header -->
            <div class="text-center mb-6">
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-4" style="background: linear-gradient(135deg, #8b0000, #c0392b);">
                    <iconify-icon icon="ph:shield-check-fill" class="text-2xl" style="color: #ffffff;"></iconify-icon>
                </div>
                <h3 id="otpTitle" class="text-xl font-bold text-gray-900">Xác nhận mã OTP</h3>
                <p id="otpDesc" class="text-sm text-gray-500 mt-1">Nhập mã 6 số đã gửi tới email của bạn</p>
            </div>

            <!-- OTP Input Boxes -->
            <div class="flex justify-center gap-2.5 mb-6" id="otpInputs">
                <input type="text" maxlength="1" class="otp-digit w-12 h-14 text-center text-xl font-bold border-2 border-gray-200 rounded-xl focus:border-[#8b0000] focus:ring-2 focus:ring-[#8b0000]/20 outline-none transition-all" data-index="0">
                <input type="text" maxlength="1" class="otp-digit w-12 h-14 text-center text-xl font-bold border-2 border-gray-200 rounded-xl focus:border-[#8b0000] focus:ring-2 focus:ring-[#8b0000]/20 outline-none transition-all" data-index="1">
                <input type="text" maxlength="1" class="otp-digit w-12 h-14 text-center text-xl font-bold border-2 border-gray-200 rounded-xl focus:border-[#8b0000] focus:ring-2 focus:ring-[#8b0000]/20 outline-none transition-all" data-index="2">
                <input type="text" maxlength="1" class="otp-digit w-12 h-14 text-center text-xl font-bold border-2 border-gray-200 rounded-xl focus:border-[#8b0000] focus:ring-2 focus:ring-[#8b0000]/20 outline-none transition-all" data-index="3">
                <input type="text" maxlength="1" class="otp-digit w-12 h-14 text-center text-xl font-bold border-2 border-gray-200 rounded-xl focus:border-[#8b0000] focus:ring-2 focus:ring-[#8b0000]/20 outline-none transition-all" data-index="4">
                <input type="text" maxlength="1" class="otp-digit w-12 h-14 text-center text-xl font-bold border-2 border-gray-200 rounded-xl focus:border-[#8b0000] focus:ring-2 focus:ring-[#8b0000]/20 outline-none transition-all" data-index="5">
            </div>

            <!-- New Password (chỉ hiển thị khi quên mật khẩu) -->
            <div id="newPasswordGroup" class="hidden mb-5">
                <label class="block text-xs font-semibold text-gray-600 mb-1.5">Mật khẩu mới</label>
                <input type="password" id="newPasswordInput" placeholder="Tối thiểu 6 ký tự" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#8b0000] outline-none transition-all text-sm">
            </div>

            <!-- OTP Error -->
            <p id="otpError" class="text-red-500 text-xs text-center mb-4 hidden"></p>

            <!-- Confirm Button -->
            <button id="otpConfirmBtn" onclick="confirmOtp()" class="w-full py-3 font-semibold rounded-xl hover:shadow-lg transition-all flex items-center justify-center gap-2" style="background: linear-gradient(to right, #8b0000, #b30000); color: #ffffff;">
                <span id="otpConfirmText">Xác nhận</span>
                <iconify-icon id="otpConfirmIcon" icon="ph:check-bold" class="text-base"></iconify-icon>
            </button>

            <!-- Resend -->
            <div class="text-center mt-4">
                <span class="text-xs text-gray-400">Không nhận được mã?</span>
                <button id="otpResendBtn" onclick="resendOtp()" class="text-xs font-bold text-[#8b0000] hover:underline ml-1">
                    Gửi lại (<span id="otpTimer">60</span>s)
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Forgot Password Modal -->
<div id="forgotModal" class="fixed inset-0 z-[300] hidden">
    <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeForgotModal()"></div>
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-[400px] p-8 relative" style="animation: otpSlideIn 0.4s cubic-bezier(0.16,1,0.3,1)">
            <button onclick="closeForgotModal()" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600 transition-colors">
                <iconify-icon icon="ph:x-bold" class="text-xl"></iconify-icon>
            </button>
            <div class="text-center mb-6">
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-4" style="background: linear-gradient(135deg, #f59e0b, #d97706);">
                    <iconify-icon icon="ph:key-fill" class="text-2xl" style="color: #ffffff;"></iconify-icon>
                </div>
                <h3 class="text-xl font-bold text-gray-900">Quên mật khẩu</h3>
                <p class="text-sm text-gray-500 mt-1">Nhập email để nhận mã OTP đặt lại mật khẩu</p>
            </div>
            <div class="space-y-4">
                <input type="email" id="forgotEmailInput" placeholder="Nhập email của bạn" class="w-full px-4 py-3 border-2 border-gray-200 rounded-xl focus:border-[#8b0000] outline-none transition-all text-sm">
                <p id="forgotError" class="text-red-500 text-xs hidden"></p>
                <button id="forgotSendBtn" onclick="sendForgotOtp()" class="w-full py-3 font-semibold rounded-xl hover:shadow-lg transition-all flex items-center justify-center gap-2" style="background: linear-gradient(to right, #f59e0b, #d97706); color: #ffffff;">
                    <span id="forgotSendText">Gửi mã OTP</span>
                    <iconify-icon id="forgotSendIcon" icon="ph:paper-plane-right-bold" class="text-base"></iconify-icon>
                </button>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../components/User/auth/scripts_styles.php'; ?>

<!-- Toast Container for Auth Errors -->
<div id="userToastContainer" class="fixed top-5 right-5 z-[400] space-y-2"></div>

<?php if (!empty($error)): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const messages = {
        'wrong': {msg: 'Tài khoản hoặc mật khẩu không chính xác.', type: 'error', icon: 'ph:warning-circle-fill'},
        'locked': {msg: 'Tài khoản đã bị khóa. Liên hệ cửa hàng.', type: 'error', icon: 'ph:lock-fill'},
        'empty': {msg: 'Vui lòng nhập đầy đủ thông tin.', type: 'warning', icon: 'ph:info-fill'},
        'email_exists': {msg: 'Email này đã được đăng ký.', type: 'error', icon: 'ph:envelope-fill'},
        'password_short': {msg: 'Mật khẩu phải ít nhất 6 ký tự.', type: 'warning', icon: 'ph:lock-key-fill'},
        'password_mismatch': {msg: 'Mật khẩu nhập lại không khớp.', type: 'warning', icon: 'ph:shield-warning-fill'},
    };
    const err = '<?= htmlspecialchars($error) ?>';
    const info = messages[err] || {msg: 'Có lỗi xảy ra, vui lòng thử lại.', type: 'error', icon: 'ph:warning-circle-fill'};
    showUserToast(info.msg, info.type, info.icon);
});
</script>
<?php endif; ?>

<?php if (!empty($mode) && $mode === 'register'): ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const authContainer = document.getElementById('auth-container');
    if (authContainer) authContainer.classList.add('right-panel-active');
    if (window.innerWidth < 768) switchMobileTab('register');
});
</script>
<?php endif; ?>

<script>
// Global toast function
function showUserToast(msg, type, icon) {
    const colors = { error: 'bg-red-600', warning: 'bg-amber-600', success: 'bg-emerald-600' };
    const container = document.getElementById('userToastContainer');
    if (!container) return;
    const toast = document.createElement('div');
    toast.className = `${colors[type] || colors.error} text-white px-5 py-3.5 rounded-xl shadow-2xl flex items-center gap-3 text-sm font-medium max-w-sm`;
    toast.style.animation = 'slideInRight 0.4s cubic-bezier(0.16,1,0.3,1) forwards';
    toast.innerHTML = `
        <iconify-icon icon="${icon || 'ph:info-fill'}" class="text-lg shrink-0"></iconify-icon>
        <span>${msg}</span>
        <button onclick="this.parentElement.remove()" class="ml-auto shrink-0 opacity-70 hover:opacity-100"><iconify-icon icon="ph:x-bold"></iconify-icon></button>
    `;
    container.appendChild(toast);
    setTimeout(() => { toast.style.animation = 'slideOutRight 0.3s ease-in forwards'; setTimeout(() => toast.remove(), 300); }, 5000);
}
</script>

<style>
    @keyframes slideInRight { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
    @keyframes slideOutRight { from { transform: translateX(0); opacity: 1; } to { transform: translateX(100%); opacity: 0; } }
    @keyframes otpSlideIn { from { transform: translateY(20px) scale(0.95); opacity: 0; } to { transform: translateY(0) scale(1); opacity: 1; } }
</style>
