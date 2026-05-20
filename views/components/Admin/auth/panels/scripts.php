<?php
// views/components/Admin/auth/panels/scripts.php
?>
<script>
    // Panel Swapping System
    function switchPanel(panelId) {
        // Hide all panels
        document.getElementById('panel-login').classList.add('hidden');
        document.getElementById('panel-otp').classList.add('hidden');
        document.getElementById('panel-forgot').classList.add('hidden');
        
        // Show target panel
        const targetPanel = document.getElementById(panelId);
        targetPanel.classList.remove('hidden');
        targetPanel.classList.add('animate-fade-in');
        
        // Reset dynamic success warnings unless doing a custom state test
        hideAllAlerts();
    }

    // Toggle Password eye icon
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.setAttribute('data-icon', 'mdi:eye-off-outline');
        } else {
            passwordInput.type = 'password';
            eyeIcon.setAttribute('data-icon', 'mdi:eye-outline');
        }
    }

    // OTP Code Fields Focus Shifting
    const otpBoxes = document.querySelectorAll('.otp-box');
    otpBoxes.forEach((box, index) => {
        box.addEventListener('input', (e) => {
            // Only allow digits
            box.value = box.value.replace(/[^0-9]/g, '');
            if (box.value.length === 1 && index < otpBoxes.length - 1) {
                otpBoxes[index + 1].focus();
            }
        });
        
        box.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && box.value.length === 0 && index > 0) {
                otpBoxes[index - 1].focus();
            }
        });
    });

    // OTP Resend Action and Countdown Timer
    let otpCountdown = 60;
    let otpTimerInterval;
    
    function startOtpTimer() {
        clearInterval(otpTimerInterval);
        otpCountdown = 60;
        const timerText = document.getElementById('otp-timer');
        const resendBtn = document.getElementById('btn-otp-resend');
        
        resendBtn.disabled = true;
        resendBtn.classList.remove('text-[#6B0D18]', 'hover:text-[#9B1C31]', 'cursor-pointer');
        resendBtn.classList.add('text-gray-400', 'cursor-not-allowed');
        
        otpTimerInterval = setInterval(() => {
            otpCountdown--;
            timerText.innerText = otpCountdown + 's';
            
            if (otpCountdown <= 0) {
                clearInterval(otpTimerInterval);
                timerText.innerText = '0s';
                resendBtn.disabled = false;
                resendBtn.classList.remove('text-gray-400', 'cursor-not-allowed');
                resendBtn.classList.add('text-[#6B0D18]', 'hover:text-[#9B1C31]', 'cursor-pointer');
            }
        }, 1000);
    }
    
    function resendOtp() {
        startOtpTimer();
        alert('Mã xác thực mới đã được gửi đi!');
    }

    // Submit Loading Logic Demonstration (Testing Mode)
    const formLogin = document.getElementById('form-login');
    if (formLogin) {
        formLogin.addEventListener('submit', function(e) {
            e.preventDefault(); // Ngăn form submit thực tế (đang test)
            setLoginBtnLoading(true);
            
            // Giả lập thời gian load và chuyển hướng
            setTimeout(() => {
                window.location.href = '<?= APP_URL ?>/admin';
            }, 800);
        });
    }

    function setLoginBtnLoading(isLoading) {
        const btn = document.getElementById('btn-login');
        const btnText = document.getElementById('btn-login-text');
        const btnIcon = document.getElementById('btn-login-icon');
        
        if (isLoading) {
            btn.disabled = true;
            btn.classList.add('opacity-85', 'cursor-not-allowed');
            btnText.innerText = 'Đang xác minh chữ ký bảo mật...';
            btnIcon.setAttribute('data-icon', 'mdi:loading');
            btnIcon.classList.add('animate-spin');
        } else {
            btn.disabled = false;
            btn.classList.remove('opacity-85', 'cursor-not-allowed');
            btnText.innerText = 'Đăng nhập quản trị';
            btnIcon.setAttribute('data-icon', 'mdi:login');
            btnIcon.classList.remove('animate-spin');
        }
    }

    // OTP form verification mockup submit
    function handleOtpSubmit(e) {
        e.preventDefault();
        setOtpBtnLoading(true);
        setTimeout(() => {
            setOtpBtnLoading(false);
            alert('Xác thực OTP thành công! Chuyển hướng tới bảng điều khiển.');
            window.location.href = '/admin';
        }, 1500);
    }

    function setOtpBtnLoading(isLoading) {
        const btn = document.getElementById('btn-otp-confirm');
        const btnText = document.getElementById('btn-otp-text');
        const btnIcon = document.getElementById('btn-otp-icon');
        
        if (isLoading) {
            btn.disabled = true;
            btn.classList.add('opacity-80', 'cursor-not-allowed');
            btnText.innerText = 'Đang xác nhận mã OTP...';
            btnIcon.setAttribute('data-icon', 'mdi:loading');
            btnIcon.classList.add('animate-spin');
        } else {
            btn.disabled = false;
            btn.classList.remove('opacity-80', 'cursor-not-allowed');
            btnText.innerText = 'Xác nhận';
            btnIcon.setAttribute('data-icon', 'mdi:check-decagram');
            btnIcon.classList.remove('animate-spin');
        }
    }

    // Forgot Password mockup submit
    function handleForgotSubmit(e) {
        e.preventDefault();
        const email = document.getElementById('recovery_email').value;
        const btn = document.getElementById('btn-forgot-submit');
        const btnText = document.getElementById('btn-forgot-text');
        const btnIcon = document.getElementById('btn-forgot-icon');
        
        btn.disabled = true;
        btn.classList.add('opacity-80', 'cursor-not-allowed');
        btnText.innerText = 'Đang gửi yêu cầu...';
        btnIcon.setAttribute('data-icon', 'mdi:loading');
        btnIcon.classList.add('animate-spin');
        
        setTimeout(() => {
            btn.disabled = false;
            btn.classList.remove('opacity-80', 'cursor-not-allowed');
            btnText.innerText = 'Gửi hướng dẫn';
            btnIcon.setAttribute('data-icon', 'mdi:email-send');
            btnIcon.classList.remove('animate-spin');
            
            // Show alert success
            hideAllAlerts();
            document.getElementById('alert-container').classList.remove('hidden');
            document.getElementById('alert-success-recovery').classList.remove('hidden');
        }, 1200);
    }

    // Floating Test Widget Toggle
    function toggleTestWidget() {
        const menu = document.getElementById('test-widget-menu');
        menu.classList.toggle('hidden');
    }

    function hideAllAlerts() {
        document.getElementById('alert-container').classList.add('hidden');
        document.getElementById('alert-incorrect').classList.add('hidden');
        document.getElementById('alert-locked').classList.add('hidden');
        document.getElementById('alert-no-permission').classList.add('hidden');
        document.getElementById('alert-too-many').classList.add('hidden');
        document.getElementById('alert-success-recovery').classList.add('hidden');
    }

    // Testing System: Interactive State Switcher
    let lockoutInterval;
    function applyVisualState(stateName) {
        hideAllAlerts();
        setLoginBtnLoading(false);
        setOtpBtnLoading(false);
        clearInterval(lockoutInterval);
        
        const inputs = document.querySelectorAll('#form-login input, #form-login button');
        inputs.forEach(el => {
            el.removeAttribute('disabled');
            el.classList.remove('opacity-60', 'cursor-not-allowed');
        });

        if (stateName === 'default') {
            switchPanel('panel-login');
        } 
        else if (stateName === 'incorrect') {
            switchPanel('panel-login');
            document.getElementById('alert-container').classList.remove('hidden');
            document.getElementById('alert-incorrect').classList.remove('hidden');
        } 
        else if (stateName === 'locked') {
            switchPanel('panel-login');
            document.getElementById('alert-container').classList.remove('hidden');
            document.getElementById('alert-locked').classList.remove('hidden');
            // Disable login form inputs
            inputs.forEach(el => {
                el.setAttribute('disabled', 'true');
                if (el.tagName === 'INPUT') el.classList.add('opacity-60', 'cursor-not-allowed');
            });
        } 
        else if (stateName === 'no_permission') {
            switchPanel('panel-login');
            document.getElementById('alert-container').classList.remove('hidden');
            document.getElementById('alert-no-permission').classList.remove('hidden');
        } 
        else if (stateName === 'too_many_attempts') {
            switchPanel('panel-login');
            document.getElementById('alert-container').classList.remove('hidden');
            document.getElementById('alert-too-many').classList.remove('hidden');
            
            // Disable forms
            inputs.forEach(el => {
                el.setAttribute('disabled', 'true');
                if (el.tagName === 'INPUT') el.classList.add('opacity-60', 'cursor-not-allowed');
            });
            
            // Start locked countdown
            let lockedTime = 59;
            const timerSpan = document.getElementById('locked-countdown');
            timerSpan.innerText = lockedTime + ' giây';
            
            lockoutInterval = setInterval(() => {
                lockedTime--;
                timerSpan.innerText = lockedTime + ' giây';
                if (lockedTime <= 0) {
                    clearInterval(lockoutInterval);
                    applyVisualState('default');
                }
            }, 1000);
        } 
        else if (stateName === 'loading') {
            switchPanel('panel-login');
            setLoginBtnLoading(true);
        } 
        else if (stateName === 'otp') {
            switchPanel('panel-otp');
            startOtpTimer();
            // Autofocus first digit
            setTimeout(() => otpBoxes[0].focus(), 400);
        } 
        else if (stateName === 'forgot') {
            switchPanel('panel-forgot');
        }
    }
</script>

<style>
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }
</style>
