<?php
// views/components/Admin/auth/login_form.php
?>
<div class="w-full lg:w-1/2 flex flex-col justify-between p-6 lg:p-12 overflow-y-auto bg-[#FAF8F5] h-screen relative">
    
    <!-- Mobile Logo (only shows on mobile) -->
    <div class="lg:hidden text-center mb-6 mt-4">
        <div class="inline-flex items-center justify-center w-12 h-12 rounded-full border border-[#C5A880]/50 mb-2 bg-[#4C0519]">
            <span class="iconify text-xl text-[#FAF8F5]" data-icon="mdi:rhombus-split"></span>
        </div>
        <h1 class="font-luxury text-2xl font-bold text-[#6B0D18] tracking-wider">Chuỗi Ngọc Phong Thủy</h1>
        <p class="text-xs text-gray-500 tracking-widest uppercase">Admin System</p>
    </div>

    <!-- Main Container -->
    <div class="flex-grow flex items-center justify-center py-6">
        <div class="w-full max-w-[460px] auth-card-transition">
            
            <!-- Desktop Branding (Above form) -->
            <div class="hidden lg:block text-center mb-8">
                <h2 class="font-luxury text-3xl font-bold text-[#6B0D18] tracking-wider mb-1">Chuỗi Ngọc Phong Thủy</h2>
                <div class="flex items-center justify-center gap-2">
                    <span class="w-2 h-[1px] bg-[#C5A880]"></span>
                    <span class="text-xs text-gray-500 font-medium tracking-widest uppercase">Hệ Thống Quản Trị</span>
                    <span class="w-2 h-[1px] bg-[#C5A880]"></span>
                </div>
            </div>

            <!-- Login Card -->
            <div class="bg-white p-8 rounded-[24px] shadow-[0_12px_40px_rgba(107,13,24,0.03)] border border-[#E4D5C3]/40 relative overflow-hidden">
                <!-- Gold Accent Top Line -->
                <div class="absolute top-0 left-0 right-0 h-[3px] bg-gradient-to-r from-[#C5A880] via-[#E4D5C3] to-[#9A7B56]"></div>
                
                <!-- Dynamic Alert Box Container -->
                <?php include __DIR__ . '/panels/alert_messages.php'; ?>

                <!-- PANEL 1: DEFAULT LOGIN -->
                <?php include __DIR__ . '/panels/login_panel.php'; ?>

                <!-- PANEL 2: 2FA OTP VERIFICATION -->
                <?php include __DIR__ . '/panels/otp_panel.php'; ?>

                <!-- PANEL 3: FORGOT PASSWORD -->
                <?php include __DIR__ . '/panels/forgot_panel.php'; ?>

                <!-- Security Notice Section (Always displayed below inputs inside the card) -->
                <div class="mt-6 pt-5 border-t border-[#E4D5C3]/40 flex items-start gap-2 text-xs text-gray-500">
                    <span class="iconify text-[#6B0D18] text-lg flex-shrink-0 mt-0.5" data-icon="mdi:shield-lock-outline"></span>
                    <p class="leading-relaxed">Khu vực dành riêng cho quản trị viên và nhân viên. Vui lòng bảo mật thông tin đăng nhập cá nhân.</p>
                </div>
            </div>

            <!-- Back to main website option -->
            <div class="mt-8 text-center">
                <a href="<?= APP_URL ?>/" class="inline-flex items-center gap-1.5 text-xs text-[#6B0D18] hover:text-[#9B1C31] font-bold tracking-wider uppercase transition-colors">
                    <span class="iconify text-base" data-icon="mdi:arrow-left"></span>
                    Xem trang bán hàng
                </a>
            </div>
        </div>
    </div>

</div>

<!-- VISUAL STATES SWITCHER / TESTING DRAWER (Removed for Production) -->

<!-- SCRIPTS & STYLES -->
<?php include __DIR__ . '/panels/scripts.php'; ?>
