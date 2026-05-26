<?php
// views/components/Admin/nha_cung_cap/form/form_basic.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
        <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:domain"></span>
            Thông tin cơ bản
        </h2>
    </div>
    
    <div class="p-6 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Tên NCC -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Tên nhà cung cấp <span class="text-red-500">*</span></label>
                <input type="text" value="<?= $isEdit ? 'Công ty Ngọc An Phát' : '' ?>" placeholder="Ví dụ: Công ty TNHH Ngọc An Phát" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors">
            </div>

            <!-- Mã NCC -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Mã nhà cung cấp <span class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="text" value="<?= $isEdit ? 'NCC001' : 'NCC0037' ?>" class="w-full px-4 py-2.5 bg-gray-100 border border-gray-200 text-gray-700 rounded-lg focus:outline-none cursor-not-allowed font-medium" readonly>
                    <button type="button" class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-400 hover:text-[#6B0D18] tooltip" title="Tạo mã mới">
                        <span class="iconify" data-icon="mdi:refresh"></span>
                    </button>
                </div>
                <p class="text-[11px] text-gray-500 mt-1">Mã tự sinh. Có thể sửa nếu có quyền.</p>
            </div>

            <!-- Loại NCC -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Loại hình</label>
                <select class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors">
                    <option value="">-- Chọn loại hình --</option>
                    <option value="cong_ty" <?= $isEdit ? 'selected' : '' ?>>Công ty / Doanh nghiệp</option>
                    <option value="xuong">Xưởng sản xuất</option>
                    <option value="ca_nhan">Cá nhân / Hộ kinh doanh</option>
                    <option value="dai_ly">Đại lý phân phối</option>
                    <option value="khac">Khác</option>
                </select>
            </div>

            <!-- Khu vực -->
            <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tỉnh / Thành phố <span class="text-red-500">*</span></label>
                    <select class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors">
                        <option value="">-- Chọn Tỉnh/Thành --</option>
                        <option value="hcm" <?= $isEdit ? 'selected' : '' ?>>Hồ Chí Minh</option>
                        <option value="hn">Hà Nội</option>
                        <option value="dn">Đà Nẵng</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Quốc gia</label>
                    <select class="w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors">
                        <option value="vn" selected>Việt Nam</option>
                        <option value="cn">Trung Quốc</option>
                        <option value="th">Thái Lan</option>
                        <option value="other">Khác</option>
                    </select>
                </div>
            </div>

            <!-- Logo -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Logo / Ảnh đại diện (Tùy chọn)</label>
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 rounded-xl border border-dashed border-gray-300 bg-gray-50 flex items-center justify-center text-gray-400 hover:text-[#6B0D18] hover:border-[#6B0D18] transition-colors cursor-pointer group relative overflow-hidden">
                        <?php if($isEdit): ?>
                            <div class="absolute inset-0 flex items-center justify-center bg-white">
                                <span class="iconify text-3xl text-gray-300" data-icon="mdi:domain"></span>
                            </div>
                        <?php else: ?>
                            <span class="iconify text-2xl group-hover:scale-110 transition-transform" data-icon="mdi:camera-plus"></span>
                        <?php endif; ?>
                    </div>
                    <div class="text-sm text-gray-500">
                        <p>Hỗ trợ định dạng .jpg, .png, .webp</p>
                        <p class="text-xs mt-1">Kích thước tối đa 2MB</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
