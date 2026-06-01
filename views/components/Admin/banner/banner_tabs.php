<?php
// views/components/Admin/banner/banner_tabs.php
?>
<div class="border-b border-gray-100 bg-white px-4 md:px-6 pt-4">
    <!-- Tabs Vị trí hiển thị -->
    <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar pb-3">
        <?php
        $vitri_list = [
            'all' => 'Tất cả',
            'slider_chinh' => 'Slider chính',
            'banner_phu' => 'Banner phụ',
            'khuyen_mai' => 'Khuyến mãi',
            'san_pham' => 'Danh sách sản phẩm',
            'chi_tiet_sp' => 'Chi tiết sản phẩm',
            'bai_viet' => 'Bài viết',
            'vong_sinh_menh' => 'Vòng Sinh Mệnh',
            'footer' => 'Footer / Sidebar'
        ];
        foreach ($vitri_list as $key => $label):
            $isActive = ($vi_tri === $key);
            $count = ($key === 'all') ? ($stats['total'] ?? 0) : ($stats['vi_tri'][$key] ?? 0);
            
            $baseClasses = "px-4 py-1.5 rounded-full text-sm font-medium whitespace-nowrap transition-colors ";
            if ($isActive) {
                $classes = $baseClasses . "bg-[#6B0D18] text-white shadow-sm";
                $countClasses = "ml-1 opacity-80 font-normal";
            } else {
                $classes = $baseClasses . "bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 hover:text-[#6B0D18] hover:border-[#6B0D18]";
                $countClasses = "ml-1 text-gray-400 font-normal";
            }
        ?>
        <a href="<?= APP_URL ?>/admin/banner?vi_tri=<?= $key ?>&trang_thai=<?= $trang_thai ?>&search=<?= urlencode($search ?? '') ?>" class="<?= $classes ?>">
            <?= $label ?> <span class="<?= $countClasses ?>">(<?= $count ?>)</span>
        </a>
        <?php endforeach; ?>
    </div>

    <!-- Tabs Trạng thái -->
    <div class="flex items-center gap-6 overflow-x-auto hide-scrollbar mt-2">
        <?php
        $trangthai_list = [
            'all' => 'Tất cả',
            'dang_hien_thi' => 'Đang hiển thị',
            'nhap' => 'Đang ẩn',
            'sap_hien_thi' => 'Sắp hiển thị',
            'het_han' => 'Hết hạn',
            'thieu_cau_hinh' => 'Thiếu cấu hình'
        ];
        foreach ($trangthai_list as $key => $label):
            $isActive = ($trang_thai === $key);
            
            $baseClasses = "pb-3 text-sm font-medium whitespace-nowrap transition-colors flex items-center gap-1.5 ";
            if ($isActive) {
                $classes = $baseClasses . "text-[#6B0D18] border-b-2 border-[#6B0D18]";
            } else {
                $classes = $baseClasses . "text-gray-500 hover:text-gray-800 border-b-2 border-transparent hover:border-gray-300";
            }
        ?>
        <a href="<?= APP_URL ?>/admin/banner?vi_tri=<?= $vi_tri ?>&trang_thai=<?= $key ?>&search=<?= urlencode($search ?? '') ?>" class="<?= $classes ?>">
            <?= $label ?>
            <?php if($key === 'thieu_cau_hinh'): ?>
                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
            <?php endif; ?>
        </a>
        <?php endforeach; ?>
    </div>
</div>
