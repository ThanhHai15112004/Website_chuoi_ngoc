<?php
// views/pages/thanh_toan.php
?>
<div class="bg-slate-50 min-h-screen py-8 pb-32 md:pb-12">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Breadcrumb -->
        <?php require_once 'views/components/thanh_toan/breadcrumb.php'; ?>

        <h1 class="text-2xl md:text-3xl font-serif text-[#8B0000] mb-8">Thanh toán đơn hàng</h1>

        <?php if(empty($gio_hang)): ?>
            <!-- Trạng thái giỏ hàng trống khi thanh toán -->
            <?php require_once 'views/components/thanh_toan/gio_hang_trong.php'; ?>
        <?php else: ?>
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Cột trái: Form thông tin thanh toán -->
                <div class="lg:w-2/3 space-y-6">
                    <!-- Thông tin người nhận -->
                    <?php require_once 'views/components/thanh_toan/thong_tin_nguoi_nhan.php'; ?>

                    <!-- Địa chỉ giao hàng -->
                    <?php require_once 'views/components/thanh_toan/dia_chi_giao_hang.php'; ?>

                    <!-- Phương thức thanh toán -->
                    <?php require_once 'views/components/thanh_toan/phuong_thuc_thanh_toan.php'; ?>
                </div>

                <!-- Cột phải: Tóm tắt đơn hàng -->
                <div class="lg:w-1/3">
                    <?php require_once 'views/components/thanh_toan/tom_tat_don_hang.php'; ?>
                </div>
            </div>

            <!-- Sticky Checkout Button cho Mobile -->
            <?php require_once 'views/components/thanh_toan/sticky_mobile_btn.php'; ?>
            
        <?php endif; ?>
    </div>
</div>

<script>
// Logic đơn giản đổi viền màu đỏ khi click radio phương thức thanh toán
document.addEventListener('DOMContentLoaded', function() {
    const paymentRadios = document.querySelectorAll('input[name="payment_method"]');
    
    paymentRadios.forEach(radio => {
        radio.addEventListener('change', function() {
            // Xóa style active của tất cả
            paymentRadios.forEach(r => {
                const parent = r.closest('label');
                parent.classList.remove('bg-red-50/20', 'border-[#8B0000]/30');
                const overlay = parent.querySelector('.absolute');
                if(overlay) overlay.classList.remove('opacity-100');
                if(overlay) overlay.classList.add('opacity-0');
            });
            
            // Thêm style active cho radio được chọn
            if(this.checked) {
                const parent = this.closest('label');
                parent.classList.add('bg-red-50/20', 'border-[#8B0000]/30');
                const overlay = parent.querySelector('.absolute');
                if(overlay) overlay.classList.remove('opacity-0');
                if(overlay) overlay.classList.add('opacity-100');
            }
        });
    });
});
</script>
