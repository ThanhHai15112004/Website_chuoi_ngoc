<style>
    /* ===== FLOATING ORBS ===== */
    .auth-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        opacity: 0.5;
        animation: orbFloat 12s ease-in-out infinite;
    }
    .auth-orb-1 {
        width: 300px; height: 300px;
        background: radial-gradient(circle, rgba(139,0,0,0.15), transparent 70%);
        top: -5%; left: -5%;
        animation-delay: 0s;
    }
    .auth-orb-2 {
        width: 250px; height: 250px;
        background: radial-gradient(circle, rgba(212,175,55,0.18), transparent 70%);
        bottom: -8%; right: -5%;
        animation-delay: 4s;
    }
    .auth-orb-3 {
        width: 180px; height: 180px;
        background: radial-gradient(circle, rgba(139,0,0,0.08), transparent 70%);
        top: 50%; left: 60%;
        animation-delay: 8s;
    }
    @keyframes orbFloat {
        0%, 100% { transform: translate(0, 0) scale(1); }
        25% { transform: translate(30px, -20px) scale(1.08); }
        50% { transform: translate(-15px, 25px) scale(0.95); }
        75% { transform: translate(20px, 10px) scale(1.04); }
    }

    /* ===== FLOATING PARTICLES ===== */
    .auth-particles {
        position: absolute;
        inset: 0;
        pointer-events: none;
        z-index: 0;
    }
    .auth-particle {
        position: absolute;
        width: 3px; height: 3px;
        background: rgba(212,175,55,0.4);
        border-radius: 50%;
        animation: particleRise linear infinite;
    }
    @keyframes particleRise {
        0% { opacity: 0; transform: translateY(0) scale(0); }
        20% { opacity: 1; transform: translateY(-30px) scale(1); }
        100% { opacity: 0; transform: translateY(-200px) scale(0); }
    }

    /* ===== ICON BOUNCE ===== */
    .auth-icon-bounce {
        animation: iconBounce 2s ease-in-out infinite;
    }
    @keyframes iconBounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-4px); }
    }

    /* ===== ICON BACKGROUNDS ===== */
    .icon-bg-login {
        background: linear-gradient(135deg, #8b0000, #c0392b);
        box-shadow: 0 10px 25px -5px rgba(139,0,0,0.3);
    }
    .icon-bg-register {
        background: linear-gradient(135deg, #d4af37, #b8860b);
        box-shadow: 0 10px 25px -5px rgba(212,175,55,0.3);
    }

    /* ===== SOCIAL BUTTONS ===== */
    .auth-social-btn {
        width: 38px; height: 38px;
        border-radius: 12px;
        border: 1.5px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    .auth-social-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(139,0,0,0.08), rgba(212,175,55,0.08));
        opacity: 0;
        transition: opacity 0.3s;
    }
    .auth-social-btn:hover {
        border-color: #8b0000;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(139,0,0,0.12);
    }
    .auth-social-btn:hover::before { opacity: 1; }

    /* ===== DIVIDER ===== */
    .auth-divider {
        position: relative;
        width: 100%;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .auth-divider::before,
    .auth-divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: linear-gradient(90deg, transparent, #e5e7eb, transparent);
    }
    .auth-divider span {
        font-size: 9px;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: #9ca3af;
        font-weight: 500;
        white-space: nowrap;
    }

    /* ===== INPUT GROUP ===== */
    .auth-input-group {
        position: relative;
    }
    .auth-input-icon {
        position: absolute;
        left: 0;
        top: 10px;
        font-size: 18px;
        color: #9ca3af;
        transition: color 0.3s, transform 0.3s;
        z-index: 1;
    }
    .auth-input {
        width: 100%;
        padding: 8px 8px 8px 30px;
        border: none;
        border-bottom: 1.5px solid #e5e7eb;
        background: transparent;
        color: #1f2937;
        font-size: 13px;
        outline: none;
        transition: border-color 0.3s;
    }
    .auth-input::placeholder {
        color: #9ca3af;
        font-size: 12px;
    }
    .auth-input-line {
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #8b0000, #d4af37);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        transform: translateX(-50%);
        border-radius: 2px;
    }
    .auth-input:focus ~ .auth-input-line {
        width: 100%;
    }
    .auth-input:focus {
        border-bottom-color: transparent;
    }
    .auth-input-group:focus-within .auth-input-icon {
        color: #8b0000;
        transform: translateY(-2px) scale(1.1);
    }
    .auth-input-toggle {
        position: absolute;
        right: 4px;
        top: 10px;
        font-size: 18px;
        color: #9ca3af;
        cursor: pointer;
        transition: color 0.3s;
        z-index: 1;
    }
    .auth-input-toggle:hover { color: #8b0000; }

    /* ===== SUBMIT BUTTON ===== */
    .auth-submit-btn {
        width: 100%;
        padding: 11px 20px;
        border-radius: 14px;
        background: linear-gradient(135deg, #8b0000 0%, #b30000 50%, #8b0000 100%);
        background-size: 200% 100%;
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        font-size: 12px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    .auth-submit-btn::before {
        content: '';
        position: absolute;
        top: 0; left: -100%;
        width: 100%; height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.15), transparent);
        transition: left 0.6s;
    }
    .auth-submit-btn:hover {
        background-position: 100% 0;
        transform: translateY(-2px);
        box-shadow: 0 12px 35px rgba(139,0,0,0.3);
    }
    .auth-submit-btn:hover::before {
        left: 100%;
    }
    .auth-submit-btn:active {
        transform: translateY(0);
    }

    /* ===== OVERLAY BUTTONS (FIX: white-on-white) ===== */
    .overlay-cta-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 28px;
        border-radius: 50px;
        border: none;
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(10px);
        color: white;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 11px;
        letter-spacing: 0.1em;
        cursor: pointer;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }
    .overlay-cta-btn::before {
        content: '';
        position: absolute;
        inset: 0;
        border-radius: 50px;
        border: 1.5px solid rgba(255,255,255,0.5);
        transition: border-color 0.3s;
    }
    .overlay-cta-btn:hover {
        background: white;
        color: #8b0000;
        transform: translateY(-2px) scale(1.03);
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }
    .overlay-cta-btn:hover::before {
        border-color: transparent;
    }

    /* ===== OVERLAY ICON WRAP ===== */
    .overlay-icon-wrap {
        width: 60px; height: 60px;
        border-radius: 50%;
        background: rgba(255,255,255,0.12);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* ===== OVERLAY SPARKLES ===== */
    .overlay-sparkles {
        position: absolute;
        inset: 0;
        pointer-events: none;
    }
    .sparkle {
        position: absolute;
        color: rgba(255,255,255,0.3);
        animation: sparklePulse 3s ease-in-out infinite;
    }
    .sparkle.s1 { top: 15%; right: 20%; font-size: 14px; animation-delay: 0s; }
    .sparkle.s2 { bottom: 20%; left: 15%; font-size: 10px; animation-delay: 1s; }
    .sparkle.s3 { top: 45%; right: 10%; font-size: 8px; animation-delay: 2s; }
    @keyframes sparklePulse {
        0%, 100% { opacity: 0.2; transform: scale(0.8) rotate(0deg); }
        50% { opacity: 0.8; transform: scale(1.2) rotate(180deg); }
    }

    /* ===== WAVE / GIFT ICON ANIMATIONS ===== */
    .overlay-wave {
        display: inline-block;
        animation: wave 2.5s ease-in-out infinite;
        transform-origin: 70% 70%;
    }
    @keyframes wave {
        0%, 100% { transform: rotate(0); }
        15% { transform: rotate(14deg); }
        30% { transform: rotate(-8deg); }
        45% { transform: rotate(14deg); }
        60% { transform: rotate(-4deg); }
        75% { transform: rotate(6deg); }
    }
    .overlay-gift {
        display: inline-block;
        animation: giftBounce 2s ease-in-out infinite;
    }
    @keyframes giftBounce {
        0%, 100% { transform: translateY(0) scale(1); }
        30% { transform: translateY(-6px) scale(1.05); }
        60% { transform: translateY(2px) scale(0.98); }
    }

    .overlay-content {
        position: relative;
        z-index: 2;
    }

    /* ===== CORE DESKTOP SLIDER LAYOUT ===== */
    @media (min-width: 768px) {
        .auth-container {
            position: relative;
        }

        .form-container {
            position: absolute;
            top: 0;
            height: 100%;
            transition: all 0.6s ease-in-out;
        }

        .sign-in-container {
            left: 0;
            width: 50%;
            z-index: 2;
        }

        .sign-up-container {
            left: 0;
            width: 50%;
            opacity: 0;
            z-index: 1;
        }

        .auth-container.right-panel-active .sign-in-container {
            transform: translateX(100%);
            opacity: 0;
        }

        .auth-container.right-panel-active .sign-up-container {
            transform: translateX(100%);
            opacity: 1;
            z-index: 5;
            animation: showForm 0.6s;
        }

        @keyframes showForm {
            0%, 49.99% { opacity: 0; z-index: 1; }
            50%, 100% { opacity: 1; z-index: 5; }
        }

        .overlay-container {
            position: absolute;
            top: 0;
            left: 50%;
            width: 50%;
            height: 100%;
            overflow: hidden;
            transition: transform 0.6s ease-in-out;
            z-index: 100;
            border-radius: 0 1rem 1rem 0;
        }

        .auth-container.right-panel-active .overlay-container {
            transform: translateX(-100%);
            border-radius: 1rem 0 0 1rem;
        }

        .overlay {
            background-image: url('<?= APP_URL ?>/images/Sản%20phẩm/Vòng%20Ngọc/Hồng%20Anh%20Đào%20Ngọc%20Nương%20Tử/hong-anh-dao-1.jpg');
            background-color: #8b0000;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
            left: -100%;
            height: 100%;
            width: 200%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
        }

        .overlay::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(139,0,0,0.92) 0%, rgba(139,0,0,0.7) 50%, rgba(212,175,55,0.55) 100%);
        }

        .auth-container.right-panel-active .overlay {
            transform: translateX(50%);
        }

        .overlay-panel {
            position: absolute;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 0 35px;
            text-align: center;
            top: 0;
            height: 100%;
            width: 50%;
            transform: translateX(0);
            transition: transform 0.6s ease-in-out;
            z-index: 1;
        }

        .overlay-left {
            transform: translateX(-20%);
        }
        .auth-container.right-panel-active .overlay-left {
            transform: translateX(0);
        }

        .overlay-right {
            right: 0;
            transform: translateX(0);
        }
        .auth-container.right-panel-active .overlay-right {
            transform: translateX(20%);
        }
    }

    /* ===== MOBILE FALLBACK ===== */
    @media (max-width: 767px) {
        .auth-container {
            min-height: auto;
            border-radius: 1.25rem;
        }
        .form-container {
            width: 100%;
            display: none;
            animation: mobileFadeIn 0.4s ease-out forwards;
        }
        .form-container.active {
            display: block;
        }
        @keyframes mobileFadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    }

    /* ===== STAGGERED FORM ENTRANCE ===== */
    .auth-form > * {
        opacity: 0;
        animation: formStagger 0.5s ease-out forwards;
    }
    .auth-form > *:nth-child(1) { animation-delay: 0.1s; }
    .auth-form > *:nth-child(2) { animation-delay: 0.15s; }
    .auth-form > *:nth-child(3) { animation-delay: 0.2s; }
    .auth-form > *:nth-child(4) { animation-delay: 0.25s; }
    .auth-form > *:nth-child(5) { animation-delay: 0.3s; }
    .auth-form > *:nth-child(6) { animation-delay: 0.35s; }
    .auth-form > *:nth-child(7) { animation-delay: 0.4s; }
    .auth-form > *:nth-child(8) { animation-delay: 0.45s; }
    @keyframes formStagger {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const btnShowRegister = document.getElementById('btn-show-register');
        const btnShowLogin = document.getElementById('btn-show-login');
        const authContainer = document.getElementById('auth-container');

        // Desktop Slider Logic
        if(btnShowRegister && btnShowLogin) {
            btnShowRegister.addEventListener('click', () => {
                authContainer.classList.add("right-panel-active");
            });

            btnShowLogin.addEventListener('click', () => {
                authContainer.classList.remove("right-panel-active");
            });
        }

        // Initialize mobile state
        if(window.innerWidth < 768) {
            document.querySelector('.sign-in-container').classList.add('active');
        }

        // Window resize handler
        window.addEventListener('resize', () => {
            if(window.innerWidth >= 768) {
                document.querySelector('.sign-in-container').classList.remove('active');
                document.querySelector('.sign-up-container').classList.remove('active');
            } else {
                if(authContainer.classList.contains('right-panel-active')) {
                    switchMobileTab('register');
                } else {
                    switchMobileTab('login');
                }
            }
        });

        // Generate floating particles
        createParticles();
    });

    // ===== FLOATING PARTICLES =====
    function createParticles() {
        const container = document.getElementById('auth-particles');
        if (!container) return;
        
        for (let i = 0; i < 15; i++) {
            const particle = document.createElement('div');
            particle.className = 'auth-particle';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.bottom = '-5px';
            particle.style.animationDuration = (4 + Math.random() * 6) + 's';
            particle.style.animationDelay = (Math.random() * 8) + 's';
            particle.style.width = (2 + Math.random() * 3) + 'px';
            particle.style.height = particle.style.width;
            
            // Alternate colors between gold and subtle red
            if (i % 3 === 0) {
                particle.style.background = 'rgba(139,0,0,0.25)';
            }
            
            container.appendChild(particle);
        }
    }

    // Mobile Toggle Logic
    function switchMobileTab(mode) {
        const signInContainer = document.querySelector('.sign-in-container');
        const signUpContainer = document.querySelector('.sign-up-container');
        const tabLogin = document.getElementById('tab-login');
        const tabRegister = document.getElementById('tab-register');
        const authContainer = document.getElementById('auth-container');

        if(mode === 'register') {
            signInContainer.classList.remove('active');
            signUpContainer.classList.add('active');
            
            tabRegister.classList.remove('text-gray-400', 'border-transparent');
            tabRegister.classList.add('text-[#8b0000]', 'border-[#8b0000]');
            
            tabLogin.classList.remove('text-[#8b0000]', 'border-[#8b0000]');
            tabLogin.classList.add('text-gray-400', 'border-transparent');
            
            authContainer.classList.add('right-panel-active');
        } else {
            signUpContainer.classList.remove('active');
            signInContainer.classList.add('active');
            
            tabLogin.classList.remove('text-gray-400', 'border-transparent');
            tabLogin.classList.add('text-[#8b0000]', 'border-[#8b0000]');
            
            tabRegister.classList.remove('text-[#8b0000]', 'border-[#8b0000]');
            tabRegister.classList.add('text-gray-400', 'border-transparent');
            
            authContainer.classList.remove('right-panel-active');
        }
    }

    // Toggle Password Visibility
    function togglePassword(inputId, icon) {
        const input = document.getElementById(inputId);
        if (input.type === 'password') {
            input.type = 'text';
            icon.setAttribute('icon', 'ph:eye-slash-light');
        } else {
            input.type = 'password';
            icon.setAttribute('icon', 'ph:eye-light');
        }
    }

    // Validate Register Form
    function validateRegister(e) {
        const pass = document.getElementById('reg_password').value;
        const passConfirm = document.getElementById('reg_password_confirm').value;

        if (pass !== passConfirm) {
            document.getElementById('error-reg-password').classList.remove('hidden');
            document.getElementById('reg_password_confirm').classList.add('border-red-500');
            e.preventDefault();
            return false;
        } else {
            document.getElementById('error-reg-password').classList.add('hidden');
            document.getElementById('reg_password_confirm').classList.remove('border-red-500');
        }
        return true;
    }
</script>

<!-- Iconify Script for Icons -->
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
