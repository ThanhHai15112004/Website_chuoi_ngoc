<?php
// views/pages/dat_hang_thanh_cong.php
?>
<div class="bg-slate-50 min-h-screen py-12">
    <div class="container mx-auto px-4 max-w-3xl">
        
        <!-- Header -->
        <?php require_once 'views/components/dat_hang_thanh_cong/header_thanh_cong.php'; ?>
        
        <!-- Order Status -->
        <?php require_once 'views/components/dat_hang_thanh_cong/trang_thai_don_hang.php'; ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- Shipping Info -->
            <?php require_once 'views/components/dat_hang_thanh_cong/thong_tin_nhan_hang.php'; ?>
            <!-- Payment Summary -->
            <?php require_once 'views/components/dat_hang_thanh_cong/tom_tat_thanh_toan.php'; ?>
        </div>

        <!-- Next Steps -->
        <?php require_once 'views/components/dat_hang_thanh_cong/buoc_tiep_theo.php'; ?>

        <!-- Call to Actions -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-8">
            <a href="<?= APP_URL ?>/" class="w-full sm:w-auto px-8 py-3 bg-white border-2 border-[#8B0000] text-[#8B0000] font-semibold rounded-full hover:bg-[#8B0000] hover:text-white transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 text-center flex items-center justify-center">
                <iconify-icon icon="mdi:arrow-left" class="mr-2 text-lg"></iconify-icon> Tiếp tục mua sắm
            </a>
            <a href="#" class="w-full sm:w-auto px-8 py-3 bg-white border-2 border-[#8B0000] text-[#8B0000] font-semibold rounded-full hover:bg-[#8B0000] hover:text-white transition-all shadow-sm hover:shadow-md hover:-translate-y-0.5 text-center flex items-center justify-center">
                Xem chi tiết đơn hàng <iconify-icon icon="mdi:arrow-right" class="ml-2 text-lg"></iconify-icon>
            </a>
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
