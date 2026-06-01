<?php
// views/components/Admin/banner/form_settings.php
$vi_tri = $banner['vi_tri'] ?? '';
$thiet_bi = $banner['thiet_bi'] ?? 'desktop_mobile';
$trang_thai = $banner['trang_thai'] ?? 'nhap';
$loai_link = $banner['loai_link'] ?? 'san_pham';
?>
<!-- Block: Vị trí & Liên kết -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5">
    <h3 class="text-[15px] font-bold text-gray-800 mb-4 flex items-center gap-2 pb-2 border-b border-gray-100">
        <span class="iconify text-[#6B0D18]" data-icon="mdi:map-marker-path"></span>
        Vị trí & Liên kết
    </h3>
    
    <div class="space-y-4">
        <!-- Vị trí hiển thị -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Vị trí hiển thị <span class="text-red-500">*</span>
            </label>
            <select name="vi_tri" class="w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] bg-white">
                <option value="">-- Chọn vị trí hiển thị --</option>
                <optgroup label="Trang chủ">
                    <option value="slider_chinh" <?= $vi_tri === 'slider_chinh' ? 'selected' : '' ?>>Slider chính (Banner ngang)</option>
                    <option value="banner_phu" <?= $vi_tri === 'banner_phu' ? 'selected' : '' ?>>Banner phụ (Dưới slider)</option>
                </optgroup>
                <option value="khuyen_mai" <?= $vi_tri === 'khuyen_mai' ? 'selected' : '' ?>>Trang khuyến mãi</option>
                <option value="san_pham" <?= $vi_tri === 'san_pham' ? 'selected' : '' ?>>Trang danh sách sản phẩm</option>
                <option value="chi_tiet_sp" <?= $vi_tri === 'chi_tiet_sp' ? 'selected' : '' ?>>Trang chi tiết sản phẩm</option>
                <option value="bai_viet" <?= $vi_tri === 'bai_viet' ? 'selected' : '' ?>>Trang bài viết</option>
                <option value="vong_sinh_menh" <?= $vi_tri === 'vong_sinh_menh' ? 'selected' : '' ?>>Trang Vòng Sinh Mệnh</option>
                <option value="footer" <?= $vi_tri === 'footer' ? 'selected' : '' ?>>Footer</option>
            </select>
        </div>

        <!-- Thiết bị -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Thiết bị hiển thị</label>
            <div class="flex items-center gap-4">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="thiet_bi" value="desktop_mobile" class="text-[#6B0D18] focus:ring-[#6B0D18] border-gray-300" <?= $thiet_bi === 'desktop_mobile' ? 'checked' : '' ?>>
                    <span class="text-sm text-gray-700 flex items-center gap-1"><span class="iconify text-gray-400" data-icon="mdi:laptop-cellphone"></span> Cả hai</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="thiet_bi" value="desktop" class="text-[#6B0D18] focus:ring-[#6B0D18] border-gray-300" <?= $thiet_bi === 'desktop' ? 'checked' : '' ?>>
                    <span class="text-sm text-gray-700 flex items-center gap-1"><span class="iconify text-gray-400" data-icon="mdi:monitor"></span> Desktop</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="thiet_bi" value="mobile" class="text-[#6B0D18] focus:ring-[#6B0D18] border-gray-300" <?= $thiet_bi === 'mobile' ? 'checked' : '' ?>>
                    <span class="text-sm text-gray-700 flex items-center gap-1"><span class="iconify text-gray-400" data-icon="mdi:cellphone"></span> Mobile</span>
                </label>
            </div>
        </div>

        <!-- Link đích -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Link liên kết <span class="text-red-500">*</span>
            </label>
            <div class="flex gap-2">
                <select name="loai_link" id="loai_link" class="w-1/3 border border-gray-300 rounded-lg shadow-sm py-2 px-2 text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18] bg-white">
                    <option value="san_pham" <?= $loai_link === 'san_pham' ? 'selected' : '' ?>>Sản phẩm</option>
                    <option value="danh_muc" <?= $loai_link === 'danh_muc' ? 'selected' : '' ?>>Danh mục</option>
                    <option value="khuyen_mai" <?= $loai_link === 'khuyen_mai' ? 'selected' : '' ?>>Khuyến mãi</option>
                    <option value="bai_viet" <?= $loai_link === 'bai_viet' ? 'selected' : '' ?>>Bài viết</option>
                    <option value="tuy_chinh" <?= $loai_link === 'tuy_chinh' ? 'selected' : '' ?>>Link tùy chỉnh</option>
                </select>
                <div class="w-2/3 relative flex">
                    <input type="text" id="link_input" name="link" value="<?= $banner['link'] ?? '' ?>" class="w-full border border-gray-300 rounded-l-lg shadow-sm py-2 px-3 text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18]" placeholder="Nhập link hoặc tìm kiếm..." required>
                    <button type="button" onclick="openLinkSearchModal()" id="btnSearchLink" class="px-3 bg-gray-100 border border-l-0 border-gray-300 rounded-r-lg text-gray-600 hover:bg-gray-200 transition-colors flex items-center justify-center">
                        <span class="iconify" data-icon="mdi:magnify"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Thứ tự -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Thứ tự hiển thị</label>
            <input type="number" name="thu_tu" value="<?= $banner['thu_tu'] ?? 1 ?>" min="1" class="w-24 border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18]">
        </div>
    </div>
</div>

<!-- Block: Trạng thái & Thời gian -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 mt-6">
    <h3 class="text-[15px] font-bold text-gray-800 mb-4 flex items-center gap-2 pb-2 border-b border-gray-100">
        <span class="iconify text-[#6B0D18]" data-icon="mdi:clock-check-outline"></span>
        Trạng thái & Thời gian
    </h3>

    <div class="space-y-5">
        <!-- Trạng thái -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Trạng thái</label>
            <div class="space-y-2">
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="trang_thai" value="dang_hien_thi" class="text-[#6B0D18] focus:ring-[#6B0D18] border-gray-300" <?= $trang_thai === 'dang_hien_thi' ? 'checked' : '' ?>>
                    <span class="text-sm text-gray-700">Đang hiển thị (Công khai)</span>
                </label>
                <label class="flex items-center gap-2 cursor-pointer">
                    <input type="radio" name="trang_thai" value="nhap" class="text-[#6B0D18] focus:ring-[#6B0D18] border-gray-300" <?= $trang_thai === 'nhap' ? 'checked' : '' ?>>
                    <span class="text-sm text-gray-700">Lưu nháp / Đang ẩn</span>
                </label>
            </div>
            <p class="text-xs text-gray-500 mt-2 italic">Banner chỉ hiển thị khi chọn "Đang hiển thị" và nằm trong thời gian hiệu lực.</p>
        </div>

        <!-- Thời gian -->
        <div>
            <div class="flex items-center justify-between mb-2">
                <label class="block text-sm font-medium text-gray-700">Thời gian hiển thị</label>
                <label class="flex items-center gap-1.5 cursor-pointer">
                    <input type="checkbox" name="khong_gioi_han" value="1" class="text-[#6B0D18] focus:ring-[#6B0D18] border-gray-300 rounded text-xs" <?= isset($banner['khong_gioi_han']) && $banner['khong_gioi_han'] ? 'checked' : '' ?>>
                    <span class="text-[11px] text-gray-500 font-medium">Không giới hạn</span>
                </label>
            </div>
            
            <div class="grid grid-cols-2 gap-3 mb-3">
                <div>
                    <label class="text-[10px] uppercase text-gray-500 font-bold mb-1 block">Bắt đầu</label>
                    <input type="date" name="bat_dau" value="<?= $banner['bat_dau'] ?? '' ?>" class="w-full border border-gray-300 rounded shadow-sm py-1.5 px-2 text-xs focus:ring-[#6B0D18] focus:border-[#6B0D18]">
                </div>
                <div>
                    <label class="text-[10px] uppercase text-gray-500 font-bold mb-1 block">Giờ bắt đầu</label>
                    <input type="time" name="gio_bat_dau" value="<?= $banner['gio_bat_dau'] ?? '00:00' ?>" class="w-full border border-gray-300 rounded shadow-sm py-1.5 px-2 text-xs focus:ring-[#6B0D18] focus:border-[#6B0D18]">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="text-[10px] uppercase text-gray-500 font-bold mb-1 block">Kết thúc</label>
                    <input type="date" name="ket_thuc" value="<?= $banner['ket_thuc'] ?? '' ?>" class="w-full border border-gray-300 rounded shadow-sm py-1.5 px-2 text-xs focus:ring-[#6B0D18] focus:border-[#6B0D18]">
                </div>
                <div>
                    <label class="text-[10px] uppercase text-gray-500 font-bold mb-1 block">Giờ kết thúc</label>
                    <input type="time" name="gio_ket_thuc" value="<?= $banner['gio_ket_thuc'] ?? '23:59' ?>" class="w-full border border-gray-300 rounded shadow-sm py-1.5 px-2 text-xs focus:ring-[#6B0D18] focus:border-[#6B0D18]">
                </div>
            </div>
        </div>
    </div>
</div>
