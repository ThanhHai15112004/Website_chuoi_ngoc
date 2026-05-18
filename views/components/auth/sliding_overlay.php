<!-- ================= SLIDING OVERLAY (DESKTOP) ================= -->
<div class="overlay-container hidden md:block">
    <div class="overlay">
        <!-- Overlay Left (Visible when looking at Sign Up) -->
        <div class="overlay-panel overlay-left">
            <div class="overlay-content flex flex-col items-center">
                <!-- Animated sparkle decoration -->
                <div class="overlay-sparkles">
                    <iconify-icon icon="ph:sparkle-fill" class="sparkle s1"></iconify-icon>
                    <iconify-icon icon="ph:sparkle-fill" class="sparkle s2"></iconify-icon>
                    <iconify-icon icon="ph:sparkle-fill" class="sparkle s3"></iconify-icon>
                </div>
                
                <div class="overlay-icon-wrap mb-4">
                    <iconify-icon icon="ph:hand-waving-fill" class="text-3xl text-white/90 overlay-wave"></iconify-icon>
                </div>
                
                <h2 class="text-3xl font-serif font-bold text-white mb-2 leading-tight drop-shadow-md">Chào bạn<br>trở lại!</h2>
                <p class="text-white/90 text-sm leading-relaxed mb-5 max-w-[260px] drop-shadow-sm">
                    Đăng nhập ngay để tiếp tục hành trình khám phá và tận hưởng các đặc quyền.
                </p>
                
                <div class="flex flex-col gap-3 mb-8 text-left w-full pl-6">
                    <div class="flex items-center gap-3 text-white/95 text-[13px] font-medium">
                        <div class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center shrink-0 shadow-inner">
                            <iconify-icon icon="ph:check-bold" class="text-[10px]"></iconify-icon>
                        </div>
                        <span>Quản lý đơn hàng tiện lợi</span>
                    </div>
                    <div class="flex items-center gap-3 text-white/95 text-[13px] font-medium">
                        <div class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center shrink-0 shadow-inner">
                            <iconify-icon icon="ph:star-bold" class="text-[10px]"></iconify-icon>
                        </div>
                        <span>Tích lũy điểm thưởng mua sắm</span>
                    </div>
                    <div class="flex items-center gap-3 text-white/95 text-[13px] font-medium">
                        <div class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center shrink-0 shadow-inner">
                            <iconify-icon icon="ph:crown-bold" class="text-[10px]"></iconify-icon>
                        </div>
                        <span>Nhận ưu đãi hạng thành viên VIP</span>
                    </div>
                </div>

                <button class="overlay-cta-btn shadow-[0_8px_20px_rgba(0,0,0,0.15)] hover:shadow-[0_12px_25px_rgba(0,0,0,0.25)]" id="btn-show-login">
                    <iconify-icon icon="ph:sign-in-bold" class="text-sm"></iconify-icon>
                    <span>Đăng Nhập</span>
                </button>
            </div>
        </div>
        
        <!-- Overlay Right (Visible when looking at Sign In) -->
        <div class="overlay-panel overlay-right">
            <div class="overlay-content flex flex-col items-center">
                <!-- Animated sparkle decoration -->
                <div class="overlay-sparkles">
                    <iconify-icon icon="ph:sparkle-fill" class="sparkle s1"></iconify-icon>
                    <iconify-icon icon="ph:sparkle-fill" class="sparkle s2"></iconify-icon>
                    <iconify-icon icon="ph:sparkle-fill" class="sparkle s3"></iconify-icon>
                </div>

                <div class="overlay-icon-wrap mb-4">
                    <iconify-icon icon="ph:gift-fill" class="text-3xl text-white/90 overlay-gift"></iconify-icon>
                </div>
                
                <h2 class="text-3xl font-serif font-bold text-white mb-2 leading-tight drop-shadow-md">Bạn là<br>người mới?</h2>
                <p class="text-white/90 text-sm leading-relaxed mb-5 max-w-[260px] drop-shadow-sm">
                    Gia nhập Chuỗi Ngọc để trải nghiệm mua sắm trang sức phong thủy đẳng cấp.
                </p>
                
                <div class="flex flex-col gap-3 mb-8 text-left w-full pl-6">
                    <div class="flex items-center gap-3 text-white/95 text-[13px] font-medium">
                        <div class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center shrink-0 shadow-inner">
                            <iconify-icon icon="ph:gift-bold" class="text-[10px]"></iconify-icon>
                        </div>
                        <span>Nhận ngay Voucher giảm giá 50K</span>
                    </div>
                    <div class="flex items-center gap-3 text-white/95 text-[13px] font-medium">
                        <div class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center shrink-0 shadow-inner">
                            <iconify-icon icon="ph:truck-bold" class="text-[10px]"></iconify-icon>
                        </div>
                        <span>Miễn phí giao hàng toàn quốc</span>
                    </div>
                    <div class="flex items-center gap-3 text-white/95 text-[13px] font-medium">
                        <div class="w-5 h-5 rounded-full bg-white/20 flex items-center justify-center shrink-0 shadow-inner">
                            <iconify-icon icon="ph:shield-check-bold" class="text-[10px]"></iconify-icon>
                        </div>
                        <span>Bảo hành trang sức trọn đời</span>
                    </div>
                </div>

                <button class="overlay-cta-btn shadow-[0_8px_20px_rgba(0,0,0,0.15)] hover:shadow-[0_12px_25px_rgba(0,0,0,0.25)]" id="btn-show-register">
                    <iconify-icon icon="ph:user-plus-bold" class="text-sm"></iconify-icon>
                    <span>Đăng Ký Ngay</span>
                </button>
            </div>
        </div>
    </div>
</div>
