<?php
// views/components/Admin/banner/banner_grid.php
// $banners được truyền từ controller
function getStatusBadge($status) {
    switch ($status) {
        case 'dang_hien_thi':
            return '<span class="px-2 py-1 bg-green-50 text-green-700 text-xs font-medium rounded border border-green-100 flex items-center gap-1 w-max"><span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Đang hiển thị</span>';
        case 'dang_an':
            return '<span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded border border-gray-200 flex items-center gap-1 w-max"><span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span> Đang ẩn</span>';
        case 'sap_hien_thi':
            return '<span class="px-2 py-1 bg-blue-50 text-blue-700 text-xs font-medium rounded border border-blue-100 flex items-center gap-1 w-max"><span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span> Sắp hiển thị</span>';
        case 'het_han':
            return '<span class="px-2 py-1 bg-gray-100 text-gray-500 text-xs font-medium rounded border border-gray-200 flex items-center gap-1 w-max"><span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span> Hết hạn</span>';
        case 'thieu_cau_hinh':
            return '<span class="px-2 py-1 bg-yellow-50 text-yellow-700 text-xs font-medium rounded border border-yellow-100 flex items-center gap-1 w-max"><span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Thiếu cấu hình</span>';
        default:
            return '<span class="px-2 py-1 bg-gray-100 text-gray-600 text-xs font-medium rounded border border-gray-200 flex items-center gap-1 w-max"><span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span> Bản nháp</span>';
    }
}
?>

<!-- Phần Header chọn tất cả (Chỉ cho Grid) -->
<div class="flex items-center justify-between mt-6 mb-3 px-1">
    <label class="flex items-center gap-2 cursor-pointer group">
        <input type="checkbox" id="checkAll" class="w-4 h-4 text-[#6B0D18] border-gray-300 rounded focus:ring-[#6B0D18]">
        <span class="text-sm font-medium text-gray-600 group-hover:text-gray-900 transition-colors">Chọn tất cả</span>
    </label>
    <div class="text-sm text-gray-500">
        Hiển thị 1 - 5 trong số 32 banner
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-5">
    <?php foreach ($banners as $banner): ?>
    <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:shadow-md transition-all group flex flex-col relative">
        
        <!-- Checkbox tuyệt đối -->
        <div class="absolute top-3 left-3 z-10">
            <input type="checkbox" class="banner-checkbox w-4 h-4 text-[#6B0D18] border-white/50 rounded focus:ring-[#6B0D18] shadow-sm cursor-pointer mix-blend-difference">
        </div>

        <!-- Ảnh Preview -->
        <div class="aspect-[16/7] bg-gray-50 relative border-b border-gray-100 overflow-hidden flex items-center justify-center cursor-pointer" onclick="openBannerDrawer(<?= $banner['id'] ?>)">
            <?php if (!empty($banner['anh_desktop'])): ?>
                <img src="<?= $banner['anh_desktop'] ?>" alt="<?= $banner['ten'] ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <?php else: ?>
                <div class="text-center text-gray-400">
                    <span class="iconify text-3xl block mx-auto mb-1 opacity-50" data-icon="mdi:image-off-outline"></span>
                    <span class="text-xs">Chưa có ảnh Desktop</span>
                </div>
            <?php endif; ?>
            
            <!-- Icon Mobile/Desktop overlay -->
            <div class="absolute bottom-2 right-2 flex items-center gap-1 bg-white/90 backdrop-blur text-gray-700 px-1.5 py-1 rounded text-[10px] shadow-sm font-medium">
                <?php if (strpos($banner['thiet_bi'], 'desktop') !== false): ?>
                    <span class="iconify" data-icon="mdi:monitor"></span>
                <?php endif; ?>
                <?php if (strpos($banner['thiet_bi'], 'mobile') !== false): ?>
                    <span class="iconify" data-icon="mdi:cellphone"></span>
                <?php endif; ?>
            </div>
            
            <!-- Xem nhanh overlay -->
            <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                <span class="px-3 py-1.5 bg-white text-gray-800 text-sm font-medium rounded-full shadow-sm">Xem chi tiết</span>
            </div>
        </div>

        <!-- Thông tin banner -->
        <div class="p-4 flex-1 flex flex-col">
            <!-- Badge Vị trí & Trạng thái -->
            <div class="flex items-start justify-between gap-2 mb-2">
                <span class="px-2 py-0.5 bg-red-50 text-[#6B0D18] text-[10px] font-bold uppercase tracking-wider rounded">
                    <?= $banner['vi_tri'] ?>
                </span>
                <?= getStatusBadge($banner['trang_thai']) ?>
            </div>

            <!-- Tên banner -->
            <h3 class="font-bold text-gray-800 text-base line-clamp-2 leading-tight mb-2 hover:text-[#6B0D18] cursor-pointer" onclick="openBannerDrawer(<?= $banner['id'] ?>)">
                <?= $banner['ten'] ?>
            </h3>

            <!-- Thông tin phụ -->
            <div class="mt-auto space-y-1.5">
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <span class="iconify text-gray-400 shrink-0" data-icon="mdi:link-variant"></span>
                    <?php if (!empty($banner['link'])): ?>
                        <span class="line-clamp-1 hover:text-[#6B0D18] cursor-pointer transition-colors" title="<?= $banner['link'] ?>"><?= $banner['link'] ?></span>
                    <?php else: ?>
                        <span class="text-orange-500 italic text-xs">Chưa gắn link</span>
                    <?php endif; ?>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <span class="iconify text-gray-400 shrink-0" data-icon="mdi:calendar-range"></span>
                    <span class="text-xs font-medium">
                        <?= date('d/m/Y', strtotime($banner['bat_dau'])) ?> 
                        <?= $banner['ket_thuc'] ? ' - ' . date('d/m/Y', strtotime($banner['ket_thuc'])) : ' - Không giới hạn' ?>
                    </span>
                </div>
                <div class="flex items-center gap-2 text-sm text-gray-500">
                    <span class="iconify text-gray-400 shrink-0" data-icon="mdi:sort-numeric-ascending"></span>
                    <span class="text-xs">Thứ tự: <strong><?= $banner['thu_tu'] ?></strong></span>
                </div>
            </div>
            
            <!-- Nút thao tác thẻ -->
            <div class="flex items-center gap-2 pt-4 mt-4 border-t border-gray-100">
                <a href="<?= APP_URL ?>/admin/banner/sua" class="flex-1 text-center py-1.5 bg-gray-50 hover:bg-[#6B0D18] hover:text-white text-gray-700 text-sm font-medium rounded border border-gray-200 hover:border-[#6B0D18] transition-colors">
                    Chỉnh sửa
                </a>
                <?php if ($banner['trang_thai'] === 'dang_hien_thi'): ?>
                    <button onclick="openToggleModal(<?= $banner['id'] ?>, 'dang_hien_thi')" class="px-3 py-1.5 bg-white hover:bg-gray-50 text-gray-600 border border-gray-200 rounded transition-colors" title="Tắt banner">
                        <span class="iconify block" data-icon="mdi:toggle-switch-outline text-xl text-green-600"></span>
                    </button>
                <?php else: ?>
                    <button onclick="openToggleModal(<?= $banner['id'] ?>, 'dang_an')" class="px-3 py-1.5 bg-white hover:bg-gray-50 text-gray-600 border border-gray-200 rounded transition-colors" title="Bật banner">
                        <span class="iconify block" data-icon="mdi:toggle-switch-off-outline text-xl text-gray-400"></span>
                    </button>
                <?php endif; ?>
                <button onclick="openDeleteModal(<?= $banner['id'] ?>)" class="px-2 py-1.5 bg-white hover:bg-red-50 text-gray-400 hover:text-red-600 border border-gray-200 hover:border-red-200 rounded transition-colors" title="Xóa">
                    <span class="iconify block text-lg" data-icon="mdi:trash-can-outline"></span>
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Phân trang (Mock) -->
<div class="flex items-center justify-between mt-6 bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
    <div class="text-sm text-gray-500">
        Hiển thị <strong>1</strong> đến <strong>5</strong> của <strong>32</strong> banner
    </div>
    <div class="flex items-center gap-1">
        <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 text-gray-400 bg-gray-50 cursor-not-allowed" disabled>
            <span class="iconify" data-icon="mdi:chevron-left"></span>
        </button>
        <button class="w-8 h-8 flex items-center justify-center rounded border border-[#6B0D18] text-white bg-[#6B0D18] font-medium text-sm">1</button>
        <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">2</button>
        <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">3</button>
        <span class="text-gray-400 mx-1">...</span>
        <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors">7</button>
        <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
            <span class="iconify" data-icon="mdi:chevron-right"></span>
        </button>
    </div>
</div>
