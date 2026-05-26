<?php
// views/components/Admin/cau_hinh_kho/tabs/tab_quyen.php
?>
<div class="flex flex-col lg:flex-row h-full min-h-[500px]">
    
    <!-- Cột trái: Danh sách kho -->
    <div class="w-full lg:w-1/4 border-b lg:border-b-0 lg:border-r border-gray-200 bg-gray-50/30 p-4">
        <h3 class="font-bold text-gray-900 mb-4">Chọn kho</h3>
        <div class="space-y-2">
            <button class="w-full text-left px-3 py-2 rounded-lg bg-white border border-[#6B0D18] shadow-sm flex items-center gap-2">
                <span class="iconify text-[#6B0D18]" data-icon="mdi:web"></span>
                <span class="font-bold text-[#6B0D18] text-sm">Kho Online</span>
            </button>
            <button class="w-full text-left px-3 py-2 rounded-lg bg-transparent hover:bg-gray-100 flex items-center gap-2 transition-colors">
                <span class="iconify text-gray-500" data-icon="mdi:warehouse"></span>
                <span class="font-medium text-gray-700 text-sm">Kho Tổng</span>
            </button>
            <button class="w-full text-left px-3 py-2 rounded-lg bg-transparent hover:bg-gray-100 flex items-center gap-2 transition-colors">
                <span class="iconify text-gray-500" data-icon="mdi:store-outline"></span>
                <span class="font-medium text-gray-700 text-sm">Kho Cửa hàng Q1</span>
            </button>
        </div>
    </div>

    <!-- Cột phải: Bảng ma trận quyền -->
    <div class="w-full lg:w-3/4 flex flex-col">
        <div class="p-4 flex justify-between items-center border-b border-gray-100">
            <div>
                <h3 class="font-bold text-gray-900">Phân quyền: Kho Online</h3>
                <p class="text-[11px] text-gray-500 mt-1">Chỉ những nhân viên được cấp quyền mới có thể thao tác với kho này.</p>
            </div>
            <button class="px-3 py-1.5 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 font-medium text-sm transition-colors flex items-center gap-2">
                <span class="iconify" data-icon="mdi:content-save"></span> Lưu phân quyền
            </button>
        </div>
        
        <div class="overflow-x-auto p-4 flex-1">
            <table class="w-full text-left border-collapse min-w-[800px]">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200 text-[11px] uppercase text-gray-500">
                        <th class="py-3 px-4 font-semibold w-48">Nhân viên</th>
                        <th class="py-3 px-4 font-semibold text-center w-20">Xem</th>
                        <th class="py-3 px-4 font-semibold text-center w-20">Nhập</th>
                        <th class="py-3 px-4 font-semibold text-center w-20 text-rose-600 tooltip" title="Có quyền xuất hàng ra khỏi kho">Xuất*</th>
                        <th class="py-3 px-4 font-semibold text-center w-20 text-rose-600 tooltip" title="Điều chỉnh/Sửa số liệu kho">Đ.Chỉnh*</th>
                        <th class="py-3 px-4 font-semibold text-center w-20">Kiểm kê</th>
                        <th class="py-3 px-4 font-semibold text-center w-20">Chuyển</th>
                        <th class="py-3 px-4 font-semibold text-center w-20 text-rose-600 tooltip" title="Có quyền duyệt phiếu xuất/nhập/kiểm kê">Duyệt*</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50/50">
                        <td class="py-3 px-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-red-100 text-[#6B0D18] flex items-center justify-center font-bold text-xs">H</div>
                                <div>
                                    <div class="text-sm font-bold text-gray-900">Hải Admin</div>
                                    <div class="text-[10px] text-gray-500">Quản lý kho</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                    </tr>
                    <tr class="hover:bg-gray-50/50">
                        <td class="py-3 px-4">
                            <div class="flex items-center gap-2">
                                <div class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs">T</div>
                                <div>
                                    <div class="text-sm font-bold text-gray-900">Trần Văn B</div>
                                    <div class="text-[10px] text-gray-500">Nhân viên kho</div>
                                </div>
                            </div>
                        </td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" checked class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                        <td class="py-3 px-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                    </tr>
                </tbody>
            </table>
            
            <div class="mt-4 pt-4 border-t border-gray-200">
                <button class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1">
                    <span class="iconify" data-icon="mdi:plus"></span> Thêm nhân viên
                </button>
            </div>
        </div>
    </div>
</div>
