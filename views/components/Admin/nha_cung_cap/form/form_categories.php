<?php
// views/components/Admin/nha_cung_cap/form/form_categories.php

$categories = [
    'Đá / ngọc' => ['Ngọc bích', 'Cẩm thạch', 'Thạch anh', 'Mã não', 'Đá mắt hổ', 'Obsidian', 'Ruby', 'Sapphire', 'Đá thô khác'],
    'Sản phẩm' => ['Vòng tay hoàn thiện', 'Chuỗi hạt', 'Dây chuyền', 'Nhẫn', 'Hoa tai'],
    'Phụ kiện' => ['Charm bạc', 'Charm vàng', 'Dây xâu vòng', 'Khóa kim loại', 'Hạt đệm'],
    'Vật tư' => ['Hộp quà', 'Túi nhung', 'Túi giấy', 'Khăn lau ngọc', 'Giấy kiểm định', 'Băng keo / Mút xốp']
];

$mockSelected = $isEdit ? ['Ngọc bích', 'Thạch anh', 'Ruby'] : [];
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
        <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:tag-multiple-outline"></span>
            Nhóm hàng cung cấp
        </h2>
    </div>
    
    <div class="p-6 space-y-6">
        <p class="text-sm text-gray-500 mb-4">Chọn các loại hàng hóa mà nhà cung cấp này có thể phân phối cho cửa hàng.</p>
        
        <!-- Search bar nhỏ -->
        <div class="relative w-full md:w-1/2 mb-6">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="iconify text-gray-400" data-icon="mdi:magnify"></span>
            </div>
            <input type="text" class="w-full pl-10 pr-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm" placeholder="Tìm nhanh nhóm hàng...">
        </div>

        <div class="space-y-6">
            <?php foreach($categories as $groupName => $items): ?>
                <div>
                    <h3 class="text-sm font-semibold text-gray-800 mb-3 border-l-2 border-[#6B0D18] pl-2"><?= $groupName ?></h3>
                    <div class="flex flex-wrap gap-2">
                        <?php foreach($items as $item): 
                            $isChecked = in_array($item, $mockSelected);
                        ?>
                            <label class="cursor-pointer group">
                                <input type="checkbox" class="peer hidden" value="<?= $item ?>" <?= $isChecked ? 'checked' : '' ?>>
                                <span class="inline-block px-3 py-1.5 text-sm rounded-full border transition-all duration-200 
                                    peer-checked:bg-[#6B0D18] peer-checked:text-white peer-checked:border-[#6B0D18] peer-checked:shadow-sm
                                    peer-focus:ring-2 peer-focus:ring-offset-1 peer-focus:ring-[#6B0D18]/40
                                    bg-white text-gray-600 border-gray-300 hover:bg-gray-50 group-hover:border-[#6B0D18]/50">
                                    <?= $item ?>
                                </span>
                            </label>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="border-t border-dashed border-gray-200 pt-4 mt-6">
            <button type="button" class="text-sm font-medium text-blue-600 hover:text-blue-800 flex items-center gap-1 transition-colors">
                <span class="iconify" data-icon="mdi:plus"></span> Thêm nhóm hàng mới
            </button>
        </div>
    </div>
</div>
