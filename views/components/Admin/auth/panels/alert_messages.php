<?php
// views/components/Admin/auth/panels/alert_messages.php
?>
<!-- Dynamic Alert Box Container -->
<div id="alert-container" class="hidden mb-6">
    <!-- Standard Warning Alert -->
    <div id="alert-incorrect" class="hidden p-4 bg-red-50 rounded-xl border border-red-100 flex items-start gap-3">
        <span class="iconify text-red-700 text-xl flex-shrink-0 mt-0.5" data-icon="mdi:alert-circle-outline"></span>
        <div>
            <h4 class="text-sm font-semibold text-red-900">Đăng nhập thất bại</h4>
            <p class="text-xs text-red-700 mt-0.5">Tài khoản hoặc mật khẩu không chính xác. Vui lòng kiểm tra lại.</p>
        </div>
    </div>

    <!-- Locked Account Alert -->
    <div id="alert-locked" class="hidden p-4 bg-red-50 rounded-xl border border-red-200 flex items-start gap-3">
        <span class="iconify text-red-700 text-xl flex-shrink-0 mt-0.5" data-icon="mdi:lock-alert"></span>
        <div class="flex-grow">
            <h4 class="text-sm font-semibold text-red-900">Tài khoản đã bị khóa</h4>
            <p class="text-xs text-red-700 mt-0.5">Tài khoản Admin của bạn đã bị khóa. Vui lòng liên hệ quản trị viên cấp cao.</p>
            <a href="mailto:support@chuoingocphongthuy.com" class="inline-flex items-center gap-1.5 text-xs text-red-900 font-semibold mt-2 hover:underline">
                <span class="iconify" data-icon="mdi:email-outline"></span> Liên hệ hỗ trợ kỹ thuật
            </a>
        </div>
    </div>

    <!-- No Permission Alert -->
    <div id="alert-no-permission" class="hidden p-4 bg-amber-50 rounded-xl border border-amber-100 flex items-start gap-3">
        <span class="iconify text-amber-700 text-xl flex-shrink-0 mt-0.5" data-icon="mdi:shield-alert-outline"></span>
        <div>
            <h4 class="text-sm font-semibold text-amber-900">Không có quyền truy cập</h4>
            <p class="text-xs text-amber-700 mt-0.5">Bạn không có quyền truy cập khu vực quản trị. Vui lòng sử dụng tài khoản được cấp quyền.</p>
        </div>
    </div>

    <!-- Too Many Failed Attempts Alert -->
    <div id="alert-too-many" class="hidden p-4 bg-red-50 rounded-xl border border-red-200 flex items-start gap-3 animate-pulse">
        <span class="iconify text-red-700 text-xl flex-shrink-0 mt-0.5" data-icon="mdi:shield-lock-outline"></span>
        <div class="flex-grow">
            <h4 class="text-sm font-semibold text-red-900">Giới hạn bảo mật kích hoạt</h4>
            <p class="text-xs text-red-700 mt-0.5">Bạn đã nhập sai mật khẩu nhiều lần. Vui lòng thử lại sau:</p>
            <div class="mt-2 inline-flex items-center gap-2 px-3 py-1 bg-red-100 rounded-lg text-xs font-bold text-red-900">
                <span class="iconify" data-icon="mdi:clock-outline"></span>
                <span id="locked-countdown">59 giây</span>
            </div>
        </div>
    </div>

    <!-- Success Recovery Mail Alert -->
    <div id="alert-success-recovery" class="hidden p-4 bg-emerald-50 rounded-xl border border-emerald-100 flex items-start gap-3">
        <span class="iconify text-emerald-700 text-xl flex-shrink-0 mt-0.5" data-icon="mdi:checkbox-marked-circle-outline"></span>
        <div>
            <h4 class="text-sm font-semibold text-emerald-900 font-medium">Gửi thành công</h4>
            <p class="text-xs text-emerald-700 mt-0.5">Hướng dẫn khôi phục mật khẩu đã được gửi đến email quản trị của bạn.</p>
        </div>
    </div>
</div>

<!-- PHP Back-end error compatibility -->
<?php if (isset($error_message)): ?>
<div class="mb-6 p-4 bg-red-50 rounded-xl border border-red-100 flex items-start gap-3">
    <span class="iconify text-red-900 text-xl flex-shrink-0 mt-0.5" data-icon="mdi:alert-circle-outline"></span>
    <div>
        <p class="text-xs text-red-900 font-medium"><?php echo htmlspecialchars($error_message); ?></p>
    </div>
</div> 
<?php endif; ?>
