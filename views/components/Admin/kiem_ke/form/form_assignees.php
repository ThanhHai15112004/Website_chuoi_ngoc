<?php
// views/components/Admin/kiem_ke/form/form_assignees.php
?>
<div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden mb-6">
    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50/50 flex justify-between items-center">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-[#6B0D18] text-xl" data-icon="mdi:account-group-outline"></span> 3. Người thực hiện & Ghi chú
        </h3>
    </div>
    
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            <!-- Phân công người kiểm -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Người thực hiện kiểm kê</label>
                <div class="flex items-center gap-2 mb-3">
                    <select class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                        <option value="">-- Chọn nhân viên --</option>
                        <option value="1">Trần Văn A (Nhân viên kho)</option>
                        <option value="2">Lê Thị B (Quản lý cửa hàng)</option>
                        <option value="3">Nguyễn Văn C (Thu ngân)</option>
                    </select>
                    <button type="button" class="px-3 py-2 bg-gray-100 border border-gray-300 rounded-lg hover:bg-gray-200 text-gray-600">Thêm</button>
                </div>
                <!-- Avatar Group (Mock) -->
                <div class="flex flex-wrap gap-2 mt-2">
                    <div class="inline-flex items-center gap-2 bg-gray-50 border border-gray-200 rounded-full pl-1 pr-3 py-1 text-xs">
                        <div class="w-6 h-6 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">A</div>
                        <span class="font-medium text-gray-700">Trần Văn A</span>
                        <button class="text-gray-400 hover:text-red-500 ml-1"><span class="iconify" data-icon="mdi:close-circle"></span></button>
                    </div>
                </div>
                <div class="mt-3">
                    <label class="flex items-center gap-2 text-sm text-gray-600 cursor-pointer">
                        <input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]/20"> Gửi thông báo đến nhân viên được phân công
                    </label>
                </div>
            </div>

            <!-- Người duyệt -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Người duyệt kết quả</label>
                <select class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm">
                    <option value="">-- Chọn người duyệt (Tùy chọn) --</option>
                    <option value="admin" selected>Admin (Quản trị viên)</option>
                    <option value="2">Lê Thị B (Quản lý cửa hàng)</option>
                </select>
            </div>

            <!-- Ghi chú nội bộ -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Ghi chú (Hiển thị trong phiếu kiểm kê)</label>
                <textarea rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#6B0D18]/20 focus:border-[#6B0D18] text-sm" placeholder="Nhập ghi chú cho đợt kiểm kê... VD: Chú ý đếm kỹ khu vực kệ góc..."></textarea>
                <div class="mt-2 flex items-center gap-4">
                    <button type="button" class="text-sm text-[#6B0D18] flex items-center gap-1 hover:underline">
                        <span class="iconify" data-icon="mdi:paperclip"></span> Đính kèm file / hình ảnh (nếu có)
                    </button>
                </div>
            </div>
            
        </div>
    </div>
</div>
