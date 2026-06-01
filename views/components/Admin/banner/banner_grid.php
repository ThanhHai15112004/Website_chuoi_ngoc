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
        <?php
        $start = ($current_page_num - 1) * $limit + 1;
        $end = min($current_page_num * $limit, $total_filtered);
        if ($total_filtered == 0) {
            echo "Không tìm thấy banner nào";
        } else {
            echo "Hiển thị {$start} - {$end} trong số {$total_filtered} banner";
        }
        ?>
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
        <div class="aspect-[16/7] bg-gray-50 relative border-b border-gray-100 overflow-hidden flex items-center justify-center cursor-pointer group" onclick="openBannerDrawer('<?= $banner['id'] ?>')">
            <?php if (!empty($banner['anh_desktop'])): ?>
                <?php $img_src = strpos($banner['anh_desktop'], 'http') === 0 ? $banner['anh_desktop'] : APP_URL . $banner['anh_desktop']; ?>
                <img src="<?= $img_src ?>" alt="<?= htmlspecialchars($banner['ten']) ?>" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <div class="absolute inset-0 flex-col items-center justify-center text-gray-400 bg-gray-50 hidden" style="display: none;">
                    <span class="iconify text-3xl block mx-auto mb-1 opacity-50" data-icon="mdi:image-broken-variant"></span>
                    <span class="text-xs">Lỗi ảnh</span>
                </div>
            <?php else: ?>
                <div class="text-center text-gray-400 flex flex-col items-center justify-center">
                    <span class="iconify text-3xl block mx-auto mb-1 opacity-50" data-icon="mdi:image-off-outline"></span>
                    <span class="text-xs">Chưa có ảnh</span>
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
            <h3 class="font-bold text-gray-800 text-base line-clamp-2 leading-tight mb-2 hover:text-[#6B0D18] cursor-pointer" onclick="openBannerDrawer('<?= $banner['id'] ?>')">
                <?= htmlspecialchars($banner['ten']) ?>
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
                <div class="text-sm text-gray-500 mb-1 flex items-center gap-1.5" title="Thời gian hiển thị">
                <span class="iconify text-gray-400 shrink-0" data-icon="mdi:calendar-clock"></span>
                <span class="truncate">
                    <?php if (isset($banner['khong_gioi_han']) && $banner['khong_gioi_han'] || (empty($banner['bat_dau']) && empty($banner['ket_thuc']))): ?>
                        Không giới hạn
                    <?php else: ?>
                        <?= !empty($banner['bat_dau']) ? date('d/m/Y', strtotime($banner['bat_dau'])) : '---' ?> - <?= !empty($banner['ket_thuc']) ? date('d/m/Y', strtotime($banner['ket_thuc'])) : '---' ?>
                    <?php endif; ?>
                </span>
            </div>    
            <div class="flex items-center gap-2 text-sm text-gray-500">
                    <span class="iconify text-gray-400 shrink-0" data-icon="mdi:sort-numeric-ascending"></span>
                    <span class="text-xs">Thứ tự: <strong><?= $banner['thu_tu'] ?></strong></span>
                </div>
            </div>
            
            <!-- Nút thao tác thẻ -->
            <div class="flex items-center gap-2 pt-4 mt-4 border-t border-gray-100">
                <a href="<?= APP_URL ?>/admin/banner/sua/<?= $banner['id'] ?>" class="flex-1 text-center py-1.5 bg-gray-50 hover:bg-[#6B0D18] hover:text-white text-gray-700 text-sm font-medium rounded border border-gray-200 hover:border-[#6B0D18] transition-colors">
                    Chỉnh sửa
                </a>
                <?php if ($banner['trang_thai'] === 'dang_hien_thi'): ?>
                    <button onclick="openToggleModal('<?= $banner['id'] ?>', 'dang_hien_thi')" class="px-3 py-1.5 bg-white hover:bg-gray-50 text-gray-600 border border-gray-200 rounded transition-colors" title="Tắt banner">
                        <span class="iconify block" data-icon="mdi:toggle-switch-outline text-xl text-green-600"></span>
                    </button>
                <?php else: ?>
                    <button onclick="openToggleModal('<?= $banner['id'] ?>', 'dang_an')" class="px-3 py-1.5 bg-white hover:bg-gray-50 text-gray-600 border border-gray-200 rounded transition-colors" title="Bật banner">
                        <span class="iconify block" data-icon="mdi:toggle-switch-off-outline text-xl text-gray-400"></span>
                    </button>
                <?php endif; ?>
                <button onclick="openDeleteModal('<?= $banner['id'] ?>')" class="px-2 py-1.5 bg-white hover:bg-red-50 text-gray-400 hover:text-red-600 border border-gray-200 hover:border-red-200 rounded transition-colors" title="Xóa">
                    <span class="iconify block text-lg" data-icon="mdi:trash-can-outline"></span>
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<!-- Phân trang -->
<?php if ($total_pages > 1): ?>
<div class="flex items-center justify-between mt-6 bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
    <div class="text-sm text-gray-500">
        Hiển thị <strong><?= $start ?></strong> đến <strong><?= $end ?></strong> của <strong><?= $total_filtered ?></strong> banner
    </div>
    <div class="flex items-center gap-1">
        <?php 
        $query_string = http_build_query(array_merge($_GET, ['page' => $current_page_num - 1]));
        $prev_url = "?$query_string";
        ?>
        <a href="<?= $current_page_num > 1 ? $prev_url : '#' ?>" class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 <?= $current_page_num > 1 ? 'text-gray-600 hover:bg-gray-50' : 'text-gray-400 bg-gray-50 cursor-not-allowed' ?>">
            <span class="iconify" data-icon="mdi:chevron-left"></span>
        </a>
        
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
            <?php 
            $query_string = http_build_query(array_merge($_GET, ['page' => $i]));
            $page_url = "?$query_string";
            if ($i == $current_page_num):
            ?>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-[#6B0D18] text-white bg-[#6B0D18] font-medium text-sm"><?= $i ?></button>
            <?php else: ?>
                <a href="<?= $page_url ?>" class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-50 font-medium text-sm transition-colors"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
        
        <?php 
        $query_string = http_build_query(array_merge($_GET, ['page' => $current_page_num + 1]));
        $next_url = "?$query_string";
        ?>
        <a href="<?= $current_page_num < $total_pages ? $next_url : '#' ?>" class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 <?= $current_page_num < $total_pages ? 'text-gray-600 hover:bg-gray-50' : 'text-gray-400 bg-gray-50 cursor-not-allowed' ?>">
            <span class="iconify" data-icon="mdi:chevron-right"></span>
        </a>
    </div>
</div>
<?php endif; ?>
