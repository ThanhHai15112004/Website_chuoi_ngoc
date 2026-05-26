<?php
// views/components/Admin/banner/form_preview.php
?>
<div class="bg-gray-50 rounded-xl border border-gray-200 p-4 mt-6">
    <div class="flex items-center justify-between mb-3">
        <h3 class="text-sm font-bold text-gray-800 flex items-center gap-1.5">
            <span class="iconify text-gray-500" data-icon="mdi:eye-outline"></span>
            Xem trước
        </h3>
        <div class="flex bg-white rounded-md border border-gray-200 p-0.5">
            <button type="button" class="px-2 py-1 text-xs font-medium rounded text-[#6B0D18] bg-red-50">Desktop</button>
            <button type="button" class="px-2 py-1 text-xs font-medium rounded text-gray-500 hover:bg-gray-50">Mobile</button>
        </div>
    </div>
    
    <!-- Khung preview -->
    <div class="bg-white border border-gray-200 rounded shadow-sm aspect-[16/7] relative overflow-hidden flex items-center justify-center">
        <!-- Chữ mô phỏng trên banner -->
        <div class="absolute inset-0 z-10 flex flex-col justify-center px-6 pointer-events-none text-left">
            <h4 class="text-xl font-bold text-gray-800 mb-1 drop-shadow-sm">Ưu đãi vòng ngọc tháng này</h4>
            <p class="text-[10px] text-gray-600 max-w-[60%] drop-shadow-sm">Giảm đến 30% cho các mẫu vòng ngọc phong thủy chọn lọc.</p>
            <div class="mt-3">
                <span class="inline-block px-4 py-1.5 bg-[#6B0D18] text-white text-xs font-medium rounded">Xem ngay</span>
            </div>
        </div>
        
        <?php if (!empty($banner['anh_desktop'])): ?>
            <img src="<?= $banner['anh_desktop'] ?>" class="w-full h-full object-cover opacity-50">
        <?php else: ?>
            <div class="text-center text-gray-400">
                <span class="iconify text-3xl mx-auto block mb-1 opacity-50" data-icon="mdi:image-outline"></span>
                <span class="text-[10px]">Preview</span>
            </div>
        <?php endif; ?>
    </div>
    <p class="text-[10px] text-gray-400 mt-2 text-center italic">Hình ảnh xem trước chỉ mang tính chất minh họa tương đối.</p>
</div>
