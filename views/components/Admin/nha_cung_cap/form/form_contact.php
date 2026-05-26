<?php
// views/components/Admin/nha_cung_cap/form/form_contact.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between bg-gray-50/50">
        <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18]" data-icon="mdi:card-account-details-outline"></span>
            Thông tin liên hệ
        </h2>
    </div>
    
    <div class="p-6 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Người liên hệ chính -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Người liên hệ chính <span class="text-red-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="iconify text-gray-400" data-icon="mdi:account-outline"></span>
                    </div>
                    <input type="text" value="<?= $isEdit ? 'Anh Minh' : '' ?>" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors" placeholder="Họ và tên">
                </div>
            </div>

            <!-- Chức vụ -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Chức vụ</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="iconify text-gray-400" data-icon="mdi:badge-account-outline"></span>
                    </div>
                    <input type="text" value="<?= $isEdit ? 'Kinh doanh' : '' ?>" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors" placeholder="Quản lý / Sale / Giám đốc...">
                </div>
            </div>

            <!-- Số điện thoại -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Số điện thoại <span class="text-red-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="iconify text-gray-400" data-icon="mdi:phone-outline"></span>
                    </div>
                    <input type="tel" value="<?= $isEdit ? '0901234567' : '' ?>" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors" placeholder="09xx xxx xxx">
                </div>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="iconify text-gray-400" data-icon="mdi:email-outline"></span>
                    </div>
                    <input type="email" value="<?= $isEdit ? 'minh@ngocanphat.com' : '' ?>" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors" placeholder="email@example.com">
                </div>
            </div>

            <!-- Zalo -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Zalo / Kênh liên hệ ưu tiên</label>
                <div class="relative flex">
                    <select class="w-24 px-2 py-2.5 bg-gray-100 border border-gray-300 border-r-0 rounded-l-lg text-sm text-gray-700 focus:outline-none focus:bg-white">
                        <option>Zalo</option>
                        <option>Viber</option>
                        <option>Line</option>
                    </select>
                    <input type="text" value="<?= $isEdit ? '0901234567' : '' ?>" class="flex-1 w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-r-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors" placeholder="SĐT hoặc Link">
                </div>
            </div>

            <!-- Giờ làm việc -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Giờ làm việc</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="iconify text-gray-400" data-icon="mdi:clock-outline"></span>
                    </div>
                    <input type="text" value="<?= $isEdit ? '8:00 - 17:00 (T2-T7)' : '' ?>" class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors" placeholder="Ví dụ: 8:00 - 17:00">
                </div>
            </div>

            <!-- Địa chỉ cụ thể -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Địa chỉ cụ thể</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 pt-3 pointer-events-none">
                        <span class="iconify text-gray-400" data-icon="mdi:map-marker-outline"></span>
                    </div>
                    <textarea class="w-full pl-10 pr-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white transition-colors resize-none h-20" placeholder="Số nhà, đường, phường/xã, quận/huyện..."><?= $isEdit ? '123 Đường 3/2, Quận 10' : '' ?></textarea>
                </div>
            </div>

            <div class="md:col-span-2 border-t border-dashed border-gray-200 pt-4 mt-2">
                <button type="button" class="text-sm font-medium text-blue-600 hover:text-blue-800 flex items-center gap-1 transition-colors">
                    <span class="iconify" data-icon="mdi:plus"></span> Thêm người liên hệ khác
                </button>
            </div>
        </div>
    </div>
</div>
