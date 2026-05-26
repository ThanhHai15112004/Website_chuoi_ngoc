<?php
// views/components/Admin/cau_hinh_kho/tabs/tab_kiem_ke.php
?>
<div class="p-6">
    <div class="flex justify-between items-center pb-4 border-b border-gray-100 mb-6">
        <div>
            <h3 class="text-lg font-bold text-gray-900">Lịch kiểm kê định kỳ tự động</h3>
            <p class="text-sm text-gray-500 mt-1">Hệ thống sẽ tự động tạo phiếu kiểm kê theo chu kỳ và nhắc nhở nhân viên thực hiện.</p>
        </div>
        <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2 shadow-sm">
            <span class="iconify" data-icon="mdi:plus-circle-outline"></span> Thêm lịch mới
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
        
        <!-- Card Lịch 1 -->
        <div class="border border-emerald-200 rounded-xl bg-emerald-50/20 shadow-[0_2px_10px_-3px_rgba(16,185,129,0.1)] overflow-hidden">
            <div class="p-4 border-b border-gray-100 flex justify-between items-start bg-white">
                <div>
                    <h4 class="font-bold text-gray-900">Kiểm kê cuối tháng (Kho Online)</h4>
                    <p class="text-[11px] text-gray-500 mt-0.5">Tạo tự động vào ngày 28 hàng tháng</p>
                </div>
                <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" checked class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-emerald-500 checked:right-0 transition-all duration-200" style="right: 0;">
                    <label class="toggle-label block overflow-hidden h-5 rounded-full bg-emerald-500 cursor-pointer"></label>
                </div>
            </div>
            <div class="p-4 space-y-3 text-sm">
                <div class="flex justify-between">
                    <span class="text-gray-500">Kho áp dụng:</span>
                    <span class="font-medium text-gray-900">Kho Online</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Phạm vi:</span>
                    <span class="font-medium text-gray-900">Toàn kho</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Nhắc trước:</span>
                    <span class="font-medium text-gray-900">3 ngày</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Người thực hiện:</span>
                    <span class="font-medium text-gray-900">Hải Admin</span>
                </div>
            </div>
            <div class="p-3 bg-gray-50 flex justify-end gap-2 border-t border-gray-100">
                <button class="px-3 py-1.5 text-xs font-medium text-gray-600 hover:text-blue-600 bg-white border border-gray-200 rounded transition-colors">Sửa</button>
                <button class="px-3 py-1.5 text-xs font-medium text-rose-600 hover:text-white hover:bg-rose-600 bg-white border border-rose-200 rounded transition-colors">Xóa</button>
            </div>
        </div>

        <!-- Card Lịch 2 -->
        <div class="border border-gray-200 rounded-xl bg-white shadow-sm overflow-hidden">
            <div class="p-4 border-b border-gray-100 flex justify-between items-start">
                <div>
                    <h4 class="font-bold text-gray-900">Kiểm kê Vòng Ngọc Bích (Kho Tổng)</h4>
                    <p class="text-[11px] text-gray-500 mt-0.5">Tạo tự động thứ 2 hàng tuần</p>
                </div>
                <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer border-gray-300 checked:border-[#6B0D18] checked:right-0 transition-all duration-200" style="right: 1.25rem;">
                    <label class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
            </div>
            <div class="p-4 space-y-3 text-sm opacity-60">
                <div class="flex justify-between">
                    <span class="text-gray-500">Kho áp dụng:</span>
                    <span class="font-medium text-gray-900">Kho Tổng</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Phạm vi:</span>
                    <span class="font-medium text-gray-900">Nhóm: Ngọc Bích</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Nhắc trước:</span>
                    <span class="font-medium text-gray-900">1 ngày</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-500">Người thực hiện:</span>
                    <span class="font-medium text-gray-900">Trần Văn B</span>
                </div>
            </div>
            <div class="p-3 bg-gray-50 flex justify-end gap-2 border-t border-gray-100">
                <button class="px-3 py-1.5 text-xs font-medium text-gray-600 hover:text-blue-600 bg-white border border-gray-200 rounded transition-colors">Sửa</button>
                <button class="px-3 py-1.5 text-xs font-medium text-rose-600 hover:text-white hover:bg-rose-600 bg-white border border-rose-200 rounded transition-colors">Xóa</button>
            </div>
        </div>

    </div>
</div>
