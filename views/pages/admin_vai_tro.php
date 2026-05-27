<?php
// views/pages/admin_vai_tro.php
?>
<div class="px-4 md:px-6 py-6 pb-24 max-w-[1400px] mx-auto min-h-screen bg-gray-50/50">
    
    <!-- Breadcrumb -->
    <nav class="flex items-center text-sm text-gray-500 mb-4">
        <a href="<?= APP_URL ?>/admin/dashboard" class="hover:text-[#6B0D18] transition-colors">Admin</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <a href="<?= APP_URL ?>/admin/nhan-su" class="hover:text-[#6B0D18] transition-colors">Quản lý nhân sự</a>
        <span class="mx-2 iconify" data-icon="mdi:chevron-right"></span>
        <span class="text-gray-900 font-medium">Vai trò & Phân quyền</span>
    </nav>

    <!-- Tiêu đề trang & Actions -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">Quản lý vai trò</h1>
            <p class="text-gray-500 mt-1 text-sm">Thiết lập các nhóm quyền hạn mặc định áp dụng cho nhân viên trong hệ thống.</p>
        </div>
        <div class="flex items-center gap-3">
            <button class="px-4 py-2 bg-white border border-gray-200 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:content-copy"></span> Nhân bản vai trò
            </button>
            <button class="px-6 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-medium flex items-center gap-2 shadow-sm">
                <span class="iconify" data-icon="mdi:plus"></span> Tạo vai trò mới
            </button>
        </div>
    </div>

    <!-- Layout 2 cột -->
    <div class="grid grid-cols-1 xl:grid-cols-12 gap-6">
        
        <!-- Cột trái: Danh sách vai trò -->
        <div class="xl:col-span-3 space-y-4">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-4 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                    <h3 class="font-bold text-gray-900">Danh sách vai trò</h3>
                    <span class="px-2 py-0.5 bg-gray-200 text-gray-700 rounded-full text-xs font-bold">5</span>
                </div>
                <div class="divide-y divide-gray-100">
                    <!-- Item -->
                    <button class="w-full text-left p-4 hover:bg-gray-50 transition-colors flex items-center justify-between group">
                        <div class="flex items-center gap-3">
                            <span class="iconify text-xl text-[#6B0D18]" data-icon="mdi:shield-crown-outline"></span>
                            <div>
                                <p class="text-sm font-bold text-gray-900">Super Admin</p>
                                <p class="text-xs text-gray-500">2 nhân viên</p>
                            </div>
                        </div>
                        <span class="iconify text-gray-300 group-hover:text-gray-500" data-icon="mdi:chevron-right"></span>
                    </button>
                    <!-- Item -->
                    <button class="w-full text-left p-4 hover:bg-gray-50 transition-colors flex items-center justify-between group">
                        <div class="flex items-center gap-3">
                            <span class="iconify text-xl text-orange-600" data-icon="mdi:shield-account-outline"></span>
                            <div>
                                <p class="text-sm font-bold text-gray-900">Admin</p>
                                <p class="text-xs text-gray-500">1 nhân viên</p>
                            </div>
                        </div>
                        <span class="iconify text-gray-300 group-hover:text-gray-500" data-icon="mdi:chevron-right"></span>
                    </button>
                    <!-- Item -->
                    <button class="w-full text-left p-4 hover:bg-gray-50 transition-colors flex items-center justify-between group bg-red-50 relative">
                        <div class="absolute left-0 top-0 bottom-0 w-1 bg-[#6B0D18]"></div>
                        <div class="flex items-center gap-3 pl-1">
                            <span class="iconify text-xl text-blue-600" data-icon="mdi:warehouse"></span>
                            <div>
                                <p class="text-sm font-bold text-[#6B0D18]">Quản lý kho</p>
                                <p class="text-xs text-gray-600">3 nhân viên</p>
                            </div>
                        </div>
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:chevron-right"></span>
                    </button>
                    <!-- Item -->
                    <button class="w-full text-left p-4 hover:bg-gray-50 transition-colors flex items-center justify-between group">
                        <div class="flex items-center gap-3">
                            <span class="iconify text-xl text-purple-600" data-icon="mdi:headset"></span>
                            <div>
                                <p class="text-sm font-bold text-gray-900">CSKH</p>
                                <p class="text-xs text-gray-500">5 nhân viên</p>
                            </div>
                        </div>
                        <span class="iconify text-gray-300 group-hover:text-gray-500" data-icon="mdi:chevron-right"></span>
                    </button>
                    <!-- Item -->
                    <button class="w-full text-left p-4 hover:bg-gray-50 transition-colors flex items-center justify-between group">
                        <div class="flex items-center gap-3">
                            <span class="iconify text-xl text-emerald-600" data-icon="mdi:cart-outline"></span>
                            <div>
                                <p class="text-sm font-bold text-gray-900">Nhân viên bán hàng</p>
                                <p class="text-xs text-gray-500">1 nhân viên</p>
                            </div>
                        </div>
                        <span class="iconify text-gray-300 group-hover:text-gray-500" data-icon="mdi:chevron-right"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Cột phải: Cấu hình phân quyền -->
        <div class="xl:col-span-9 space-y-6">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200">
                <!-- Header Cấu hình -->
                <div class="p-6 border-b border-gray-200 flex justify-between items-start">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <h2 class="text-xl font-bold text-gray-900">Quản lý kho</h2>
                            <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold bg-blue-100 text-blue-700">Mặc định hệ thống</span>
                        </div>
                        <p class="text-sm text-gray-500">Kiểm soát tồn kho, nhập/xuất và kiểm kê hàng hóa.</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <button class="px-4 py-2 bg-white border border-gray-200 text-red-600 rounded-lg hover:bg-red-50 transition-colors text-sm font-medium flex items-center gap-2">
                            <span class="iconify text-lg" data-icon="mdi:delete-outline"></span> Xóa
                        </button>
                        <button class="px-4 py-2 bg-[#6B0D18] text-white rounded-lg hover:bg-red-900 transition-colors text-sm font-bold flex items-center gap-2">
                            <span class="iconify" data-icon="mdi:content-save-outline"></span> Lưu thay đổi
                        </button>
                    </div>
                </div>
                
                <!-- Bảng Ma Trận Quyền -->
                <div class="p-6">
                    <h3 class="font-bold text-gray-900 mb-4">Thiết lập quyền truy cập</h3>
                    
                    <div class="overflow-x-auto border border-gray-200 rounded-xl">
                        <table class="w-full text-left min-w-[800px]">
                            <thead class="bg-gray-50 border-b border-gray-200">
                                <tr>
                                    <th class="px-6 py-4 text-sm font-bold text-gray-700 w-1/3">Module quản lý</th>
                                    <th class="px-4 py-4 text-sm font-bold text-gray-700 text-center w-24">Xem</th>
                                    <th class="px-4 py-4 text-sm font-bold text-gray-700 text-center w-24">Thêm</th>
                                    <th class="px-4 py-4 text-sm font-bold text-gray-700 text-center w-24">Sửa</th>
                                    <th class="px-4 py-4 text-sm font-bold text-red-600 text-center w-24">Xóa</th>
                                    <th class="px-4 py-4 text-sm font-bold text-gray-700 text-center w-24">Đặc biệt</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-sm">
                                <!-- Dashboard -->
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">Dashboard & Thống kê</td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" checked></td>
                                    <td class="px-4 py-4 text-center">-</td>
                                    <td class="px-4 py-4 text-center">-</td>
                                    <td class="px-4 py-4 text-center">-</td>
                                    <td class="px-4 py-4 text-center">
                                        <label class="inline-flex items-center gap-1 cursor-pointer" title="Quyền xuất Excel">
                                            <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                            <span class="iconify text-gray-400" data-icon="mdi:file-excel-outline"></span>
                                        </label>
                                    </td>
                                </tr>
                                <!-- Sản phẩm -->
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">Sản phẩm & Danh mục</td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" checked></td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-red-500 focus:ring-red-500"></td>
                                    <td class="px-4 py-4 text-center">
                                        <label class="inline-flex items-center gap-1 cursor-pointer" title="Quyền xuất Excel">
                                            <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                            <span class="iconify text-gray-400" data-icon="mdi:file-excel-outline"></span>
                                        </label>
                                    </td>
                                </tr>
                                <!-- Kho -->
                                <tr class="bg-blue-50/30">
                                    <td class="px-6 py-4 font-bold text-[#6B0D18]">Quản lý Kho (Quyền chính)</td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" checked></td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" checked></td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" checked></td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-red-500 focus:ring-red-500"></td>
                                    <td class="px-4 py-4 text-center">
                                        <label class="inline-flex items-center gap-1 cursor-pointer" title="Duyệt phiếu nhập/xuất">
                                            <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]" checked>
                                            <span class="iconify text-[#6B0D18]" data-icon="mdi:check-decagram-outline"></span>
                                        </label>
                                    </td>
                                </tr>
                                <!-- Đơn hàng -->
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">Đơn hàng & Khách hàng</td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-red-500 focus:ring-red-500"></td>
                                    <td class="px-4 py-4 text-center">
                                        <label class="inline-flex items-center gap-1 cursor-pointer" title="Quyền xuất Excel">
                                            <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                            <span class="iconify text-gray-400" data-icon="mdi:file-excel-outline"></span>
                                        </label>
                                    </td>
                                </tr>
                                <!-- Báo cáo -->
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 font-medium text-gray-900">Báo cáo doanh thu</td>
                                    <td class="px-4 py-4 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]"></td>
                                    <td class="px-4 py-4 text-center">-</td>
                                    <td class="px-4 py-4 text-center">-</td>
                                    <td class="px-4 py-4 text-center">-</td>
                                    <td class="px-4 py-4 text-center">
                                        <label class="inline-flex items-center gap-1 cursor-pointer" title="Quyền xuất Excel">
                                            <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18]">
                                            <span class="iconify text-gray-400" data-icon="mdi:file-excel-outline"></span>
                                        </label>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="bg-orange-50 border border-orange-200 p-4 rounded-xl flex gap-3">
                <span class="iconify text-orange-500 text-xl shrink-0 mt-0.5" data-icon="mdi:alert-outline"></span>
                <div>
                    <h4 class="text-sm font-bold text-orange-800">Lưu ý khi phân quyền</h4>
                    <p class="text-xs text-orange-700 mt-1">Khi bạn thay đổi quyền của một Vai trò, tất cả nhân viên đang mang vai trò đó sẽ lập tức được áp dụng các quyền hạn mới.</p>
                </div>
            </div>
        </div>
    </div>
</div>
