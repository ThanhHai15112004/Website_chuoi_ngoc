<div class="p-6 space-y-6 bg-gray-50/50 min-h-screen relative pb-24">
    
    <!-- Tiêu đề trang -->
    <div class="flex items-center gap-4">
        <a href="<?= APP_URL ?>/admin/cau-hinh-kho" class="w-10 h-10 bg-white rounded-full flex items-center justify-center text-gray-500 hover:text-[#6B0D18] hover:bg-red-50 border border-gray-200 transition-colors shadow-sm">
            <span class="iconify" data-icon="mdi:arrow-left"></span>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-gray-900"><?= isset($isEdit) && $isEdit ? 'Chỉnh sửa kho hàng' : 'Thêm kho hàng mới' ?></h1>
            <p class="text-sm text-gray-500 mt-1">Thiết lập các thông tin cơ bản và cấu hình vận hành cho kho hàng.</p>
        </div>
    </div>

    <form class="grid grid-cols-1 xl:grid-cols-3 gap-6">
        
        <!-- Cột trái: Thông tin cơ bản & Địa chỉ -->
        <div class="xl:col-span-2 space-y-6">
            
            <!-- Block 1: Thông tin cơ bản -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:information-outline"></span> Thông tin cơ bản
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tên kho <span class="text-red-500">*</span></label>
                        <input type="text" value="<?= $isEdit ? 'Kho Online' : '' ?>" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm" placeholder="VD: Kho trung tâm, Kho Q1...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Mã kho <span class="text-red-500">*</span></label>
                        <input type="text" value="<?= $isEdit ? 'KHO-ONLINE' : '' ?>" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm" placeholder="VD: KHO-TT, tự sinh nếu để trống">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Loại kho <span class="text-red-500">*</span></label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <label class="flex items-center justify-center gap-2 p-2 border <?= $isEdit ? 'border-[#6B0D18] bg-red-50 text-[#6B0D18]' : 'border-gray-200 text-gray-600 hover:bg-gray-50' ?> rounded-lg cursor-pointer transition-colors text-sm font-medium text-center">
                            <input type="radio" name="loai_kho" class="hidden" <?= $isEdit ? 'checked' : '' ?>>
                            Kho Online
                        </label>
                        <label class="flex items-center justify-center gap-2 p-2 border border-gray-200 text-gray-600 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors text-sm font-medium text-center">
                            <input type="radio" name="loai_kho" class="hidden">
                            Kho Tổng
                        </label>
                        <label class="flex items-center justify-center gap-2 p-2 border border-gray-200 text-gray-600 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors text-sm font-medium text-center">
                            <input type="radio" name="loai_kho" class="hidden">
                            Kho Cửa hàng
                        </label>
                        <label class="flex items-center justify-center gap-2 p-2 border border-gray-200 text-gray-600 hover:bg-gray-50 rounded-lg cursor-pointer transition-colors text-sm font-medium text-center">
                            <input type="radio" name="loai_kho" class="hidden">
                            Kho Lỗi/Hủy
                        </label>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Mô tả chức năng kho</label>
                    <textarea class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm h-20 resize-none" placeholder="Nhập mô tả ngắn..."><?= $isEdit ? 'Lưu hàng sẵn bán cho website' : '' ?></textarea>
                </div>
            </div>

            <!-- Block 2: Địa chỉ & Người phụ trách -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-900 flex items-center gap-2">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:map-marker-radius"></span> Vị trí & Nhân sự
                    </h3>
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                        <span class="text-xs text-gray-500">Kho nội bộ (Không cần địa chỉ)</span>
                    </label>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tỉnh / Thành phố</label>
                        <select class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm">
                            <option>TP. Hồ Chí Minh</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Quận / Huyện</label>
                        <select class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm">
                            <option>Quận 5</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Phường / Xã</label>
                        <select class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm">
                            <option>Phường 4</option>
                        </select>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Địa chỉ chi tiết</label>
                    <input type="text" value="<?= $isEdit ? '123 Nguyễn Trãi' : '' ?>" class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm" placeholder="Số nhà, tên đường...">
                </div>

                <div class="pt-4 border-t border-gray-100">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Người phụ trách chính</label>
                    <select class="w-full px-4 py-2 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] focus:bg-white text-sm">
                        <option>Chọn người phụ trách</option>
                        <option selected>Hải Admin</option>
                        <option>Trần Văn B</option>
                    </select>
                    <p class="text-[11px] text-gray-500 mt-1 flex items-center gap-1">
                        <span class="iconify text-amber-500" data-icon="mdi:information"></span> Người này sẽ nhận các thông báo cảnh báo kho.
                    </p>
                </div>
            </div>
            
        </div>

        <!-- Cột phải: Cấu hình vận hành & Trạng thái -->
        <div class="xl:col-span-1 space-y-6">
            
            <!-- Block 3: Cấu hình vận hành -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:cog-outline"></span> Cấu hình vận hành
                </h3>
                
                <div class="space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-gray-50">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Cho phép bán hàng</span>
                            <span class="block text-[11px] text-gray-500 mt-0.5">Kho có thể giao cho khách</span>
                        </div>
                        <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-[#6B0D18] checked:right-0 transition-all duration-200" style="right: 0;">
                            <label class="toggle-label block overflow-hidden h-5 rounded-full bg-[#6B0D18] cursor-pointer"></label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pb-3 border-b border-gray-50">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Làm kho mặc định Online</span>
                            <span class="block text-[11px] text-gray-500 mt-0.5">Ưu tiên trừ hàng từ kho này</span>
                        </div>
                        <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-blue-600 checked:right-0 transition-all duration-200" style="right: 0;">
                            <label class="toggle-label block overflow-hidden h-5 rounded-full bg-blue-600 cursor-pointer"></label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pb-3 border-b border-gray-50">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Cho phép Thuyên chuyển</span>
                            <span class="block text-[11px] text-gray-500 mt-0.5">Chuyển hàng sang kho khác</span>
                        </div>
                        <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-[#6B0D18] checked:right-0 transition-all duration-200" style="right: 0;">
                            <label class="toggle-label block overflow-hidden h-5 rounded-full bg-[#6B0D18] cursor-pointer"></label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div>
                            <span class="block text-sm font-medium text-gray-700">Cho phép Kiểm kê</span>
                            <span class="block text-[11px] text-gray-500 mt-0.5">Được lập phiếu kiểm kê</span>
                        </div>
                        <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                            <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-[#6B0D18] checked:right-0 transition-all duration-200" style="right: 0;">
                            <label class="toggle-label block overflow-hidden h-5 rounded-full bg-[#6B0D18] cursor-pointer"></label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Block 4: Trạng thái -->
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                    <span class="iconify text-[#6B0D18]" data-icon="mdi:shield-check-outline"></span> Trạng thái kho
                </h3>
                
                <div class="space-y-3">
                    <label class="flex items-center gap-3 p-3 rounded-lg border <?= $isEdit ? 'border-emerald-200 bg-emerald-50' : 'border-gray-200 hover:bg-gray-50' ?> cursor-pointer transition-colors group">
                        <input type="radio" name="trang_thai" value="hoat_dong" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]" <?= $isEdit ? 'checked' : '' ?>>
                        <div>
                            <span class="block text-sm font-semibold text-emerald-700">Đang hoạt động</span>
                        </div>
                    </label>
                    
                    <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer transition-colors group">
                        <input type="radio" name="trang_thai" value="tam_ngung" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                        <div>
                            <span class="block text-sm font-medium text-amber-700">Tạm ngừng</span>
                        </div>
                    </label>

                    <?php if($isEdit): ?>
                    <label class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer transition-colors group">
                        <input type="radio" name="trang_thai" value="ngung_dung" class="w-4 h-4 text-[#6B0D18] focus:ring-[#6B0D18]">
                        <div>
                            <span class="block text-sm font-medium text-rose-700">Ngừng dùng kho</span>
                        </div>
                    </label>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </form>

    <!-- Sticky Bottom Bar -->
    <div class="fixed bottom-0 left-0 right-0 md:left-[260px] bg-white border-t border-gray-200 p-4 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] z-40 flex justify-between items-center px-6">
        <a href="<?= APP_URL ?>/admin/cau-hinh-kho" class="px-6 py-2.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-medium transition-colors">
            Hủy bỏ
        </a>
        <button type="button" class="px-8 py-2.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-bold transition-colors shadow-sm flex items-center gap-2">
            <span class="iconify" data-icon="mdi:check-circle-outline"></span>
            Lưu thay đổi
        </button>
    </div>

</div>
