<?php
// views/components/Admin/auth/panels/testing_widget.php
?>
<!-- VISUAL STATES SWITCHER / TESTING DRAWER -->
<div id="state-testing-widget" class="fixed bottom-4 right-4 z-50">
    <!-- Mini Trigger Button -->
    <button onclick="toggleTestWidget()" class="flex items-center gap-2 px-3.5 py-2 bg-gradient-to-r from-[#6B0D18] to-[#4C0519] text-white text-xs font-bold rounded-full shadow-2xl border border-[#C5A880]/30 hover:scale-105 transition-all focus:outline-none">
        <span class="iconify text-base animate-spin" style="animation-duration: 6s" data-icon="mdi:cog-outline"></span>
        Visual Testing Widget
    </button>
    
    <!-- Expanded Drawer Menu -->
    <div id="test-widget-menu" class="hidden absolute bottom-12 right-0 w-72 bg-[#2D020E]/95 backdrop-blur-md rounded-2xl shadow-[0_20px_50px_rgba(0,0,0,0.3)] border border-[#C5A880]/30 p-4 text-[#FAF8F5]">
        <div class="flex items-center justify-between border-b border-[#C5A880]/20 pb-2 mb-3">
            <h4 class="text-xs uppercase tracking-widest font-bold text-[#C5A880] flex items-center gap-1">
                <span class="iconify" data-icon="mdi:eye-outline"></span> Test Mockup States
            </h4>
            <button onclick="toggleTestWidget()" class="text-gray-400 hover:text-white"><span class="iconify" data-icon="mdi:close"></span></button>
        </div>
        <p class="text-[10px] text-gray-300 leading-normal mb-3">Click each state below to quickly preview how the layout handles different administrative workflows.</p>
        
        <div class="grid grid-cols-2 gap-2 text-[11px]">
            <button onclick="applyVisualState('default')" class="px-2 py-1.5 bg-[#6B0D18] hover:bg-[#8B1C28] rounded font-medium text-left truncate flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> 1. Default Login
            </button>
            <button onclick="applyVisualState('incorrect')" class="px-2 py-1.5 bg-red-950/40 hover:bg-[#6B0D18] rounded font-medium text-left truncate flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> 2. Incorrect Info
            </button>
            <button onclick="applyVisualState('locked')" class="px-2 py-1.5 bg-red-950/40 hover:bg-[#6B0D18] rounded font-medium text-left truncate flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span> 3. Acc Locked
            </button>
            <button onclick="applyVisualState('no_permission')" class="px-2 py-1.5 bg-red-950/40 hover:bg-[#6B0D18] rounded font-medium text-left truncate flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> 4. Permission Denied
            </button>
            <button onclick="applyVisualState('too_many_attempts')" class="px-2 py-1.5 bg-red-950/40 hover:bg-[#6B0D18] rounded font-medium text-left truncate flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-[#C5A880]"></span> 5. Limit (300s)
            </button>
            <button onclick="applyVisualState('loading')" class="px-2 py-1.5 bg-red-950/40 hover:bg-[#6B0D18] rounded font-medium text-left truncate flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-pulse"></span> 6. Loading Effect
            </button>
            <button onclick="applyVisualState('otp')" class="px-2 py-1.5 bg-red-950/40 hover:bg-[#6B0D18] rounded font-medium text-left truncate flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400"></span> 7. 2FA OTP UI
            </button>
            <button onclick="applyVisualState('forgot')" class="px-2 py-1.5 bg-red-950/40 hover:bg-[#6B0D18] rounded font-medium text-left truncate flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span> 8. Forgot Pwd UI
            </button>
        </div>
    </div>
</div>
