<?php
// views/pages/thanh_toan.php
?>
<div class="bg-[#f8f9fa] py-6 md:py-10 pb-32">
    <div class="container mx-auto px-4 max-w-6xl">
        <!-- Breadcrumb & Progress -->
        <div class="mb-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
            <!-- Breadcrumb Pill -->
            <nav class="flex text-sm text-gray-500 font-medium">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 bg-white px-4 py-2 rounded-full shadow-sm border border-gray-100">
                    <li class="inline-flex items-center">
                        <a href="<?= APP_URL ?>/" class="hover:text-[#8B0000] transition-colors">Trang Chủ</a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <iconify-icon icon="mdi:chevron-right" class="text-gray-400"></iconify-icon>
                            <a href="<?= APP_URL ?>/gio-hang" class="ml-1 md:ml-2 hover:text-[#8B0000] transition-colors">Giỏ Hàng</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <iconify-icon icon="mdi:chevron-right" class="text-gray-400"></iconify-icon>
                            <span class="ml-1 md:ml-2 text-[#8B0000] bg-red-50 px-3 py-1 rounded-full border border-red-100 flex items-center gap-1">
                                <iconify-icon icon="mdi:credit-card-outline" class="text-lg"></iconify-icon> Thanh Toán
                            </span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Progress Bar -->
            <div class="flex items-center gap-2 md:gap-4 text-xs md:text-sm font-medium">
                <div class="flex items-center gap-1.5 text-green-600">
                    <iconify-icon icon="mdi:check-circle" class="text-lg"></iconify-icon>
                    <span>1. Giỏ hàng</span>
                </div>
                <div class="h-[1px] w-8 md:w-12 bg-gray-300"></div>
                <div class="flex items-center gap-1.5 text-[#8B0000] bg-red-50 px-2 py-1 rounded-md border border-red-100">
                    <span class="w-5 h-5 rounded-full bg-[#8B0000] text-white flex items-center justify-center text-xs">2</span>
                    <span>Thanh toán</span>
                </div>
                <div class="h-[1px] w-8 md:w-12 bg-gray-300"></div>
                <div class="flex items-center gap-1.5 text-gray-400">
                    <span class="w-5 h-5 rounded-full bg-gray-200 text-gray-500 flex items-center justify-center text-xs">3</span>
                    <span>Hoàn tất</span>
                </div>
            </div>
        </div>

        <?php if(empty($gio_hang)): ?>
            <!-- Trạng thái giỏ hàng trống khi thanh toán -->
            <?php require_once __DIR__ . '/../components/User/thanh_toan/gio_hang_trong.php'; ?>
        <?php else: ?>
            <form id="checkout-form" method="POST" action="<?= APP_URL ?>/thanh-toan/dat-hang" class="flex flex-col lg:flex-row gap-6 lg:gap-8 items-start">
                
                <!-- Cột trái (65%): Form nhập liệu -->
                <div class="w-full lg:w-[65%] space-y-5">
                    <!-- Địa chỉ giao hàng -->
                    <?php require_once __DIR__ . '/../components/User/thanh_toan/dia_chi_nhan_hang.php'; ?>

                    <!-- Danh sách Sản phẩm -->
                    <?php require_once __DIR__ . '/../components/User/thanh_toan/san_pham.php'; ?>

                    <!-- Voucher -->
                    <?php require_once __DIR__ . '/../components/User/thanh_toan/voucher.php'; ?>

                    <!-- Phương thức vận chuyển -->
                    <?php require_once __DIR__ . '/../components/User/thanh_toan/phuong_thuc_van_chuyen.php'; ?>

                    <!-- Phương thức thanh toán -->
                    <?php require_once __DIR__ . '/../components/User/thanh_toan/phuong_thuc_thanh_toan.php'; ?>
                </div>

                <!-- Cột phải (35%): Tóm tắt & Đặt hàng -->
                <div class="w-full lg:w-[35%] sticky top-24">
                    <!-- Chi tiết thanh toán & Nút đặt hàng -->
                    <?php require_once __DIR__ . '/../components/User/thanh_toan/chi_tiet_thanh_toan.php'; ?>
                </div>

            </form>

            <!-- Modals (Bắt buộc để ngoài form) -->
            <?php require_once __DIR__ . '/../components/User/thanh_toan/modal_dia_chi.php'; ?>
        <?php endif; ?>
    </div>
</div>

