<?php
// views/pages/dat_hang_thanh_cong.php
?>
<div class="bg-slate-50 py-8 md:py-12">
    <div class="container mx-auto px-4 max-w-3xl">
        <!-- Header -->
        <?php require_once __DIR__ . '/../components/dat_hang_thanh_cong/header_thanh_cong.php'; ?>
        
        <!-- Order Status -->
        <?php require_once __DIR__ . '/../components/dat_hang_thanh_cong/trang_thai_don_hang.php'; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10 mt-12">
            <!-- Shipping Info -->
            <?php require_once __DIR__ . '/../components/dat_hang_thanh_cong/thong_tin_nhan_hang.php'; ?>
            <!-- Payment Summary -->
            <?php require_once __DIR__ . '/../components/dat_hang_thanh_cong/tom_tat_thanh_toan.php'; ?>
        </div>

        <!-- Next Steps -->
        <div class="mt-8 md:mt-12">
            <?php require_once __DIR__ . '/../components/dat_hang_thanh_cong/buoc_tiep_theo.php'; ?>
        </div>
    </div>
</div>

<style>
/* Custom animations */
@keyframes wiggle {
    0%, 100% { transform: rotate(-5deg); }
    50% { transform: rotate(5deg); }
}
.animate-wiggle {
    animation: wiggle 1s ease-in-out infinite;
}
</style>
