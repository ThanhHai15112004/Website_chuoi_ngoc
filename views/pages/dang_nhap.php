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

    <!-- MAIN AUTH WRAPPER â€” compact size -->
    <div class="auth-container relative w-full max-w-[800px] min-h-[600px] bg-white/80 backdrop-blur-sm rounded-2xl shadow-[0_25px_80px_rgba(139,0,0,0.12)] overflow-hidden border border-white/60" id="auth-container" data-aos="zoom-in" data-aos-duration="800">
        
        <?php include __DIR__ . '/../components/User/auth/mobile_tabs.php'; ?>

        <?php include __DIR__ . '/../components/User/auth/register_form.php'; ?>

        <?php include __DIR__ . '/../components/User/auth/login_form.php'; ?>

        <?php include __DIR__ . '/../components/User/auth/sliding_overlay.php'; ?>

    </div>
</div>

<?php include __DIR__ . '/../components/User/auth/scripts_styles.php'; ?>

