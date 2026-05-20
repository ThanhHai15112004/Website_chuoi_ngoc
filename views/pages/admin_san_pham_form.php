<?php
// views/pages/admin_san_pham_form.php
$is_edit = $is_edit ?? false;
$sp = $san_pham ?? [];
?>
<div class="space-y-6">
    <!-- Breadcrumb & Header -->
    <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
        <div>
            <div class="flex items-center gap-2 text-sm text-gray-500 mb-2">
                <a href="<?= APP_URL ?>/admin/san-pham" class="hover:text-[#6B0D18] transition-colors flex items-center gap-1">
                    <span class="iconify text-base" data-icon="mdi:arrow-left"></span>
                    Danh sách sản phẩm
                </a>
                <span>/</span>
                <span class="text-gray-900 font-medium"><?= $is_edit ? 'Chỉnh sửa sản phẩm' : 'Thêm sản phẩm mới' ?></span>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 font-luxury"><?= $is_edit ? 'Chỉnh sửa: ' . ($sp['ten_sp'] ?? '') : 'Thêm sản phẩm mới' ?></h2>
            <?php if($is_edit): ?>
            <p class="text-sm text-gray-500 mt-1 font-mono">Mã SP: <?= $sp['ma_sp'] ?? '' ?></p>
            <?php endif; ?>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-5 py-2.5 bg-white border border-gray-200 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors text-sm font-medium shadow-sm">
                Hủy bỏ
            </button>
            <button class="flex items-center gap-2 px-5 py-2.5 bg-[#6B0D18] text-white rounded-xl hover:bg-[#4C0519] transition-colors text-sm font-medium shadow-sm">
                <span class="iconify text-lg" data-icon="mdi:content-save-outline"></span>
                <?= $is_edit ? 'Lưu thay đổi' : 'Tạo sản phẩm' ?>
            </button>
        </div>
    </div>

    <!-- Form Area -->
    <form action="" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Cột Trái (2/3) -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Thông tin chung -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Thông tin chung</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Tên sản phẩm <span class="text-red-500">*</span></label>
                        <input type="text" name="ten_sp" value="<?= $sp['ten_sp'] ?? '' ?>" placeholder="Nhập tên sản phẩm..." class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Mã sản phẩm (Tự động nếu để trống)</label>
                            <input type="text" name="ma_sp" value="<?= $sp['ma_sp'] ?? '' ?>" placeholder="VD: VNB-001" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm font-mono">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Danh mục <span class="text-red-500">*</span></label>
                            <select name="danh_muc" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-10 relative bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_1rem_center] bg-[length:1em_1em] text-sm">
                                <option value="">Chọn danh mục</option>
                                <?php foreach($danh_muc_list as $dm): ?>
                                    <option value="<?= $dm ?>" <?= ($sp['danh_muc'] ?? '') === $dm ? 'selected' : '' ?>><?= $dm ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Loại đá <span class="text-red-500">*</span></label>
                            <select name="loai_da" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] text-gray-600 appearance-none pr-10 bg-[url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20fill%3D%22none%22%20stroke%3D%22%23666%22%20stroke-width%3D%222%22%20stroke-linecap%3D%22round%22%20stroke-linejoin%3D%22round%22%3E%3Cpolyline%20points%3D%226%209%2012%2015%2018%209%22%3E%3C%2Fpolyline%3E%3C%2Fsvg%3E')] bg-no-repeat bg-[position:right_1rem_center] bg-[length:1em_1em] text-sm">
                                <option value="">Chọn loại đá</option>
                                <?php foreach($loai_da_list as $da): ?>
                                    <option value="<?= $da ?>" <?= ($sp['loai_da'] ?? '') === $da ? 'selected' : '' ?>><?= $da ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">Mệnh phù hợp (Chọn nhiều)</label>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <?php foreach($menh_list as $m): ?>
                                    <?php $isChecked = isset($sp['menh']) && in_array($m, $sp['menh']); ?>
                                    <label class="cursor-pointer">
                                        <input type="checkbox" name="menh[]" value="<?= $m ?>" class="peer sr-only" <?= $isChecked ? 'checked' : '' ?>>
                                        <div class="px-3 py-1.5 rounded-lg border border-gray-200 text-sm text-gray-600 peer-checked:bg-[#FAF8F5] peer-checked:text-[#6B0D18] peer-checked:border-[#E4D5C3] peer-checked:font-medium hover:bg-gray-50 transition-colors">
                                            <?= $m ?>
                                        </div>
                                    </label>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bài viết mô tả -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Mô tả sản phẩm</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Mô tả ngắn (Hiển thị ở danh sách SP)</label>
                        <textarea name="mo_ta_ngan" rows="3" placeholder="Nhập một đoạn tóm tắt về sản phẩm..." class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm"><?= $sp['mo_ta_ngan'] ?? '' ?></textarea>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Mô tả chi tiết (Bài viết SEO)</label>
                        <!-- Giả lập Rich Text Editor -->
                        <div class="border border-gray-200 rounded-xl overflow-hidden focus-within:border-[#6B0D18] transition-colors">
                            <div class="bg-gray-50 border-b border-gray-200 px-3 py-2 flex items-center gap-1 flex-wrap">
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:format-bold"></span></button>
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:format-italic"></span></button>
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:format-underline"></span></button>
                                <div class="w-px h-5 bg-gray-300 mx-1"></div>
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:format-list-bulleted"></span></button>
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:format-list-numbered"></span></button>
                                <div class="w-px h-5 bg-gray-300 mx-1"></div>
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:image-outline"></span></button>
                                <button type="button" class="p-1.5 text-gray-600 hover:bg-gray-200 rounded"><span class="iconify text-lg" data-icon="mdi:link-variant"></span></button>
                            </div>
                            <textarea name="mo_ta_chi_tiet" rows="10" placeholder="Viết mô tả chi tiết..." class="w-full px-4 py-3 bg-white focus:outline-none text-sm resize-y min-h-[200px] prose prose-sm"><?= strip_tags($sp['mo_ta_chi_tiet'] ?? '') ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Cột Phải (1/3) -->
        <div class="lg:col-span-1 space-y-6">
            
            <!-- Trạng thái -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Trạng thái</h3>
                <div class="flex items-center justify-between">
                    <span class="text-sm font-medium text-gray-700">Hiển thị trên Web</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="trang_thai" value="1" class="sr-only peer" <?= ($sp['trang_thai'] ?? '1') == '1' ? 'checked' : '' ?>>
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-[#6B0D18]"></div>
                    </label>
                </div>
            </div>

            <!-- Hình ảnh -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Hình ảnh sản phẩm</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Ảnh chính</label>
                        <?php if($is_edit && isset($sp['anh_chinh'])): ?>
                            <div class="relative w-full aspect-square rounded-[18px] overflow-hidden border border-gray-200 group mb-2">
                                <img src="<?= $sp['anh_chinh'] ?>" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                    <button type="button" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-red-600 hover:bg-red-50 hover:scale-110 transition-transform">
                                        <span class="iconify text-xl" data-icon="mdi:trash-can-outline"></span>
                                    </button>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="border-2 border-dashed border-gray-300 rounded-[18px] p-6 text-center hover:bg-gray-50 hover:border-[#6B0D18] transition-colors cursor-pointer group mb-2 aspect-square flex flex-col items-center justify-center">
                                <span class="iconify text-4xl text-gray-400 group-hover:text-[#6B0D18] mb-2" data-icon="mdi:image-plus-outline"></span>
                                <p class="text-sm font-medium text-gray-600 group-hover:text-[#6B0D18]">Tải ảnh lên</p>
                                <p class="text-[11px] text-gray-400 mt-1">PNG, JPG, WEBP tới 5MB</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Ảnh phụ (Tối đa 5 ảnh)</label>
                        <div class="grid grid-cols-4 gap-2">
                            <?php if($is_edit && isset($sp['anh_phu'])): ?>
                                <?php foreach($sp['anh_phu'] as $anh): ?>
                                    <div class="relative aspect-square rounded-lg overflow-hidden border border-gray-200 group">
                                        <img src="<?= $anh ?>" class="w-full h-full object-cover">
                                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                            <button type="button" class="w-6 h-6 bg-white rounded-full flex items-center justify-center text-red-600 hover:scale-110 transition-transform">
                                                <span class="iconify text-xs" data-icon="mdi:trash-can-outline"></span>
                                            </button>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            <div class="border border-dashed border-gray-300 rounded-lg flex items-center justify-center hover:bg-gray-50 hover:border-[#6B0D18] hover:text-[#6B0D18] transition-colors cursor-pointer aspect-square text-gray-400">
                                <span class="iconify text-xl" data-icon="mdi:plus"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Giá & Kho -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Giá & Kho</h3>
                
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Giá bán (VNĐ) <span class="text-red-500">*</span></label>
                        <input type="number" name="gia_ban" value="<?= $sp['gia_ban'] ?? '' ?>" placeholder="0" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm font-bold text-gray-900">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Giá khuyến mãi (VNĐ)</label>
                        <input type="number" name="gia_khuyen_mai" value="<?= $sp['gia_khuyen_mai'] ?? '' ?>" placeholder="0" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm font-bold text-[#6B0D18]">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1.5">Số lượng trong kho <span class="text-red-500">*</span></label>
                        <input type="number" name="ton_kho" value="<?= $sp['ton_kho'] ?? '' ?>" placeholder="0" class="w-full px-4 py-3 bg-white border border-gray-200 rounded-xl focus:outline-none focus:border-[#6B0D18] focus:ring-1 focus:ring-[#6B0D18] transition-all text-sm">
                    </div>
                </div>
            </div>

            <!-- Nhãn Sản phẩm -->
            <div class="bg-white rounded-[24px] p-6 shadow-sm border border-gray-100">
                <h3 class="text-base font-bold text-gray-900 mb-4 border-b border-gray-100 pb-3">Gắn nhãn (Tag)</h3>
                <div class="flex flex-wrap gap-2">
                    <?php 
                        $all_tags = ['Mới', 'Bán chạy', 'Giảm giá', 'Flash sale', 'Cao cấp'];
                        $selected_tags = $sp['nhan'] ?? [];
                    ?>
                    <?php foreach($all_tags as $tag): ?>
                        <?php $isChecked = in_array($tag, $selected_tags); ?>
                        <label class="cursor-pointer">
                            <input type="checkbox" name="nhan[]" value="<?= $tag ?>" class="peer sr-only" <?= $isChecked ? 'checked' : '' ?>>
                            <div class="px-3 py-1.5 rounded-lg border border-gray-200 text-sm text-gray-600 peer-checked:bg-teal-50 peer-checked:text-teal-700 peer-checked:border-teal-200 peer-checked:font-medium hover:bg-gray-50 transition-colors">
                                <?= $tag ?>
                            </div>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </form>
</div>
