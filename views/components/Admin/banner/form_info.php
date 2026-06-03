<?php
// views/components/Admin/banner/form_info.php
?>
<!-- Block: Thông tin cơ bản -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
        <span class="iconify text-[#6B0D18]" data-icon="mdi:information-variant-circle"></span>
        Thông tin cơ bản
    </h3>
    
    <div class="space-y-4">
        <!-- Tên Banner -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Tên banner <span class="text-red-500">*</span>
            </label>
            <input type="text" id="ten_banner" name="ten" value="<?= $banner['ten'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18]" placeholder="Ví dụ: Flash Sale Vòng Ngọc Tháng 5" required>
            <p class="mt-1 text-[11px] text-gray-500 italic">Tên dùng để quản lý nội bộ, không hiển thị cho khách hàng.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Tiêu đề -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tiêu đề hiển thị (tùy chọn)</label>
                <input type="text" name="tieu_de_hien_thi" value="<?= $banner['tieu_de_hien_thi'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18]" placeholder="Ưu đãi vòng ngọc tháng này" maxlength="60">
                <p class="mt-1 text-[10px] text-gray-400 text-right"><span class="text-gray-600 font-medium">0</span>/60</p>
            </div>
            
            <!-- Nút CTA -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nút hành động (CTA)</label>
                <input type="text" name="cta" value="<?= $banner['cta'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18]" placeholder="Xem ngay" maxlength="20">
                <p class="mt-1 text-[11px] text-gray-500 italic">Chữ trên nút bấm (nếu có hỗ trợ vẽ nút trên ảnh).</p>
            </div>
        </div>

        <!-- Tiêu đề phụ (Badge) -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Tiêu đề phụ / Badge (tùy chọn)</label>
            <input type="text" name="badge_text" value="<?= $banner['badge_text'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18]" placeholder="Ví dụ: Chuỗi Ngọc Phong Thủy" maxlength="100">
        </div>

        <!-- Mô tả -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Mô tả ngắn (tùy chọn)</label>
            <textarea name="mo_ta" rows="2" class="w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18]" placeholder="Giảm đến 30% cho các mẫu vòng ngọc phong thủy chọn lọc..." maxlength="120"><?= $banner['mo_ta'] ?? '' ?></textarea>
            <p class="mt-1 text-[10px] text-gray-400 text-right"><span class="text-gray-600 font-medium">0</span>/120</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Đặc điểm 1 -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Đặc điểm 1 (tùy chọn)</label>
                <input type="text" name="dac_diem_1" value="<?= $banner['dac_diem_1'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18]" placeholder="Ví dụ: Chế tác thủ công tinh xảo">
            </div>
            
            <!-- Đặc điểm 2 -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Đặc điểm 2 (tùy chọn)</label>
                <input type="text" name="dac_diem_2" value="<?= $banner['dac_diem_2'] ?? '' ?>" class="w-full border border-gray-300 rounded-lg shadow-sm py-2 px-3 text-sm focus:ring-[#6B0D18] focus:border-[#6B0D18]" placeholder="Ví dụ: Bảo hành 100%">
            </div>
        </div>
    </div>
</div>

<!-- Block: Hình ảnh -->
<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-lg font-bold text-gray-800 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:image-multiple"></span>
            Hình ảnh Banner <span class="text-red-500">*</span>
        </h3>
        <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">Tối đa 2MB/ảnh</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        
        <!-- Upload Ảnh Desktop -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                <span class="iconify text-gray-400" data-icon="mdi:monitor"></span>
                Ảnh Desktop
            </label>
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-[#6B0D18] hover:bg-red-50/30 transition-colors cursor-pointer group relative overflow-hidden" style="min-height: 180px;">
                <input type="file" id="anh_desktop" name="anh_desktop" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                
                <div class="absolute inset-0 flex flex-col items-center justify-center p-4 z-10 pointer-events-none <?= !empty($banner['anh_desktop']) ? 'hidden' : '' ?>" id="upload_prompt_desktop">
                    <span class="iconify text-4xl text-gray-400 mb-2 group-hover:text-[#6B0D18]" data-icon="mdi:cloud-upload"></span>
                    <p class="text-sm text-gray-600"><span class="text-[#6B0D18] font-medium">Bấm để tải ảnh lên</span> hoặc kéo thả</p>
                    <p class="text-xs text-gray-400 mt-1">1920 x 600px (16:5)</p>
                </div>

                <div class="absolute inset-0 z-10 <?= !empty($banner['anh_desktop']) ? '' : 'hidden' ?>" id="preview_container_desktop">
                    <img src="<?= $banner['anh_desktop'] ?? '' ?>" id="preview_img_desktop" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center text-white">
                        <span class="iconify text-2xl mb-1" data-icon="mdi:swap-horizontal"></span>
                        <span class="text-xs font-medium">Thay đổi ảnh</span>
                    </div>
                </div>
            </div>
            <input type="text" placeholder="Nhập Alt text cho ảnh Desktop" class="mt-2 w-full border border-gray-300 rounded text-xs px-2 py-1.5 focus:ring-[#6B0D18] focus:border-[#6B0D18] text-gray-600">
        </div>

        <!-- Upload Ảnh Mobile -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-1">
                <span class="iconify text-gray-400" data-icon="mdi:cellphone"></span>
                Ảnh Mobile
            </label>
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-[#6B0D18] hover:bg-red-50/30 transition-colors cursor-pointer group relative overflow-hidden flex items-center justify-center bg-gray-50/50" style="min-height: 180px;">
                <input type="file" id="anh_mobile" name="anh_mobile" accept="image/*" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20">
                
                <div class="absolute inset-0 flex flex-col items-center justify-center p-4 z-10 pointer-events-none <?= !empty($banner['anh_mobile']) ? 'hidden' : '' ?>" id="upload_prompt_mobile">
                    <span class="iconify text-4xl text-gray-400 mb-2 group-hover:text-[#6B0D18]" data-icon="mdi:cloud-upload"></span>
                    <p class="text-sm text-gray-600"><span class="text-[#6B0D18] font-medium">Bấm tải ảnh</span></p>
                    <p class="text-xs text-gray-400 mt-1">750 x 900px (5:6)</p>
                </div>

                <div class="absolute inset-0 z-10 flex justify-center <?= !empty($banner['anh_mobile']) ? '' : 'hidden' ?>" id="preview_container_mobile">
                    <div class="h-full aspect-[5/6] relative">
                        <img src="<?= $banner['anh_mobile'] ?? '' ?>" id="preview_img_mobile" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity flex flex-col items-center justify-center text-white">
                            <span class="iconify text-2xl mb-1" data-icon="mdi:swap-horizontal"></span>
                            <span class="text-xs font-medium">Đổi ảnh</span>
                        </div>
                    </div>
                </div>
            </div>
            <input type="text" placeholder="Nhập Alt text cho ảnh Mobile" class="mt-2 w-full border border-gray-300 rounded text-xs px-2 py-1.5 focus:ring-[#6B0D18] focus:border-[#6B0D18] text-gray-600">
            
            <div class="mt-2 p-2 bg-blue-50 text-blue-800 text-[11px] rounded border border-blue-100 flex gap-2">
                <span class="iconify text-sm shrink-0" data-icon="mdi:information-outline"></span>
                <span>Nên có ảnh riêng cho Mobile để hiển thị không bị cắt chữ, đảm bảo trải nghiệm tốt nhất trên điện thoại.</span>
            </div>
        </div>

    </div>
</div>
