<div class="md:hidden fixed bottom-0 left-0 w-full bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-50">
    <a href="<?= APP_URL ?>/dat-hang-thanh-cong" class="block text-center w-full bg-[#8B0000] text-white font-medium py-3.5 px-6 rounded-xl hover:bg-red-800 transition-colors shadow-md shadow-red-900/20 text-lg">
        Hoàn tất đặt hàng (<?php echo isset($tong_tien_cuoi_cung) ? number_format($tong_tien_cuoi_cung, 0, ',', '.') : '0'; ?>đ)
    </a>
</div>
