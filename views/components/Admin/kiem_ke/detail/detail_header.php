<?php
// views/components/Admin/kiem_ke/detail/detail_header.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
    <div class="p-6">
        <div class="flex flex-col md:flex-row md:items-start justify-between gap-6">
            
            <!-- Thông tin chính -->
            <div class="flex-1">
                <div class="flex items-center gap-3 mb-2">
                    <h3 class="text-xl font-bold text-[#6B0D18]"><?= $phieu['id'] ?></h3>
                    <?php if($phieu['trang_thai'] === 'Đang kiểm kê'): ?>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-blue-100 text-blue-700">Đang kiểm kê</span>
                    <?php elseif($phieu['trang_thai'] === 'Chờ duyệt'): ?>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-amber-100 text-amber-700">Chờ duyệt</span>
                    <?php elseif($phieu['trang_thai'] === 'Hoàn tất'): ?>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-100 text-emerald-700">Hoàn tất</span>
                    <?php else: ?>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-bold bg-gray-100 text-gray-700"><?= $phieu['trang_thai'] ?></span>
                    <?php endif; ?>
                </div>
                <h4 class="text-lg font-bold text-gray-900 mb-4"><?= $phieu['ten_dot'] ?></h4>
                
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500 mb-1">Kho kiểm kê</p>
                        <p class="font-medium text-gray-900 flex items-center gap-1"><span class="iconify text-gray-400" data-icon="mdi:warehouse"></span> <?= $phieu['kho'] ?></p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Loại kiểm kê</p>
                        <p class="font-medium text-gray-900"><?= $phieu['loai'] ?></p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Người kiểm kê</p>
                        <p class="font-medium text-gray-900"><?= $phieu['nguoi_kiem_ke'] ?></p>
                    </div>
                    <div>
                        <p class="text-gray-500 mb-1">Hạn hoàn tất</p>
                        <p class="font-medium text-red-600"><?= $phieu['han_hoan_tat'] ?></p>
                    </div>
                </div>
                
                <?php if(!empty($phieu['ghi_chu'])): ?>
                <div class="mt-4 bg-gray-50 border border-gray-100 p-3 rounded-lg text-sm flex gap-2">
                    <span class="iconify text-gray-400 text-lg shrink-0 mt-0.5" data-icon="mdi:message-outline"></span>
                    <p class="text-gray-700 italic"><?= $phieu['ghi_chu'] ?></p>
                </div>
                <?php endif; ?>
            </div>

            <!-- Tiến độ kiểm đếm (Chỉ hiển thị khi đang kiểm kê) -->
            <?php if($phieu['trang_thai'] === 'Đang kiểm kê' || $phieu['trang_thai'] === 'Chờ duyệt'): ?>
            <div class="w-full md:w-[320px] bg-gray-50 p-4 rounded-xl border border-gray-100 shrink-0">
                <div class="flex items-end justify-between mb-2">
                    <p class="text-sm font-medium text-gray-700">Tiến độ kiểm đếm</p>
                    <p class="text-xl font-bold text-[#6B0D18]"><?= $phieu['da_kiem'] ?> <span class="text-sm font-medium text-gray-500">/ <?= $phieu['tong_sp'] ?></span></p>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-2 mb-4">
                    <div class="bg-[#6B0D18] h-2 rounded-full" style="width: <?= ($phieu['da_kiem'] / $phieu['tong_sp']) * 100 ?>%"></div>
                </div>
                
                <div class="grid grid-cols-2 gap-3 text-sm">
                    <div class="bg-red-50 p-2 rounded border border-red-100 text-center">
                        <p class="text-xs text-red-600 mb-0.5">Thiếu</p>
                        <p class="font-bold text-red-700">2 sp</p>
                    </div>
                    <div class="bg-blue-50 p-2 rounded border border-blue-100 text-center">
                        <p class="text-xs text-blue-600 mb-0.5">Thừa</p>
                        <p class="font-bold text-blue-700">1 sp</p>
                    </div>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>
</div>
