<?php
// views/pages/admin_dang_nhap.php
?>

<!-- Left Column: Branding / Sacred Geometry Illustration (Hidden on mobile) -->
<div class="hidden lg:flex lg:w-1/2 relative bg-[#4C0519] overflow-hidden items-center justify-center border-r border-[#C5A880]/20">
    <!-- Abstract gradient overlay -->
    <div class="absolute inset-0 bg-gradient-to-br from-[#6B0D18] via-[#4C0519] to-[#2D020E] opacity-95"></div>
    
    <!-- Glowing aura in background -->
    <div class="absolute w-[500px] h-[500px] rounded-full bg-[#C5A880]/10 filter blur-[80px] pulse-glow-circle"></div>
    
    <!-- Sacred Geometry Mandala Background SVG -->
    <div class="absolute opacity-10 w-[140%] h-[140%] flex items-center justify-center pointer-events-none">
        <svg class="w-full h-full text-white animated-mandala" viewBox="0 0 200 200" fill="none" stroke="currentColor" stroke-width="0.3">
            <circle cx="100" cy="100" r="80" />
            <circle cx="100" cy="100" r="60" />
            <circle cx="100" cy="100" r="40" />
            <polygon points="100,20 169.28,60 169.28,140 100,180 30.72,140 30.72,60" />
            <polygon points="100,20 100,180" />
            <polygon points="30.72,60 169.28,140" />
            <polygon points="30.72,140 169.28,60" />
            <polygon points="100,40 151.96,70 151.96,130 100,160 48.04,130 48.04,70" />
            <polygon points="100,60 134.64,80 134.64,120 100,140 65.36,120 65.36,80" />
            <path d="M 100,20 A 80,80 0 0,1 180,100" />
            <path d="M 180,100 A 80,80 0 0,1 100,180" />
            <path d="M 100,180 A 80,80 0 0,1 20,100" />
            <path d="M 20,100 A 80,80 0 0,1 100,20" />
        </svg>
    </div>

    <!-- Content Overlay -->
    <div class="relative z-10 p-16 text-center text-white max-w-xl flex flex-col items-center">
        <!-- Diamond Stone / Feng Shui Amulet Icon Container -->
        <div class="relative mb-8 flex items-center justify-center">
            <!-- Golden ring -->
            <div class="absolute w-24 h-24 rounded-full border-2 border-dashed border-[#C5A880]/30 animate-[spin_40s_linear_infinite]"></div>
            <!-- solid ring -->
            <div class="absolute w-20 h-20 rounded-full border border-[#C5A880]/60"></div>
            <!-- Icon -->
            <span class="iconify text-4xl text-[#E4D5C3] relative z-10" data-icon="mdi:rhombus-split"></span>
        </div>
        
        <h1 class="font-luxury text-5xl font-bold mb-6 tracking-wide leading-tight">
            HỆ THỐNG QUẢN TRỊ
            <span class="block text-2xl tracking-[0.25em] text-[#C5A880] mt-3 font-sans font-medium">CHUỖI NGỌC PHONG THỦY</span>
        </h1>
        
        <div class="w-16 h-[1px] bg-[#C5A880]/50 my-6"></div>
        
        <p class="text-base text-[#FAF8F5]/80 leading-relaxed font-light max-w-md">
            Cổng hậu trường quản lý sản phẩm, tối ưu đơn hàng, phân tích doanh thu và chăm sóc khách hàng nội bộ của cửa hiệu ngọc quý.
        </p>

        <!-- Trust badge / Safety parameters -->
        <div class="mt-16 grid grid-cols-3 gap-6 w-full max-w-md pt-8 border-t border-[#C5A880]/15">
            <div class="flex flex-col items-center">
                <span class="iconify text-xl text-[#C5A880] mb-2" data-icon="mdi:shield-check-outline"></span>
                <span class="text-xs font-medium text-gray-300">Mã hóa SSL 256</span>
            </div>
            <div class="flex flex-col items-center border-x border-[#C5A880]/15">
                <span class="iconify text-xl text-[#C5A880] mb-2" data-icon="mdi:two-factor-authentication"></span>
                <span class="text-xs font-medium text-gray-300">Xác thực 2 lớp</span>
            </div>
            <div class="flex flex-col items-center">
                <span class="iconify text-xl text-[#C5A880] mb-2" data-icon="mdi:server-security"></span>
                <span class="text-xs font-medium text-gray-300">Giám sát IP</span>
            </div>
        </div>
    </div>
</div>

<!-- Right Column: Login Form Component -->
<?php include __DIR__ . '/../components/Admin/auth/login_form.php'; ?>
