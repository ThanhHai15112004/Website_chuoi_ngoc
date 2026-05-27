<?php
// views/components/Admin/nhan_su/form_permissions.php
?>
<div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
    <div class="flex items-center justify-between mb-6 pb-3 border-b border-gray-100">
        <h3 class="font-bold text-gray-900 flex items-center gap-2">
            <span class="iconify text-gray-400 text-xl" data-icon="mdi:shield-account-outline"></span> Vai trò & Phân quyền
        </h3>
        <button type="button" class="text-sm font-medium text-[#6B0D18] hover:underline">Quản lý các vai trò</button>
    </div>

    <!-- Chọn vai trò -->
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 mb-2">Vai trò trong hệ thống <span class="text-red-500">*</span></label>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3">
            <!-- Super Admin -->
            <label class="relative block cursor-pointer group">
                <input type="radio" name="role" value="super_admin" id="roleSelect" class="peer sr-only" onchange="handleRoleChange()">
                <div class="p-4 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18]/5 transition-all">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="iconify text-[#6B0D18]" data-icon="mdi:shield-crown-outline"></span>
                        <span class="font-bold text-gray-900 peer-checked:text-[#6B0D18]">Super Admin</span>
                    </div>
                    <p class="text-xs text-gray-500 line-clamp-2">Toàn quyền kiểm soát hệ thống, bao gồm phân quyền và xóa dữ liệu.</p>
                </div>
                <div class="absolute top-4 right-4 hidden peer-checked:block text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:check-circle"></span>
                </div>
            </label>

            <!-- Admin -->
            <label class="relative block cursor-pointer group">
                <input type="radio" name="role" value="admin" class="peer sr-only" onchange="handleRoleChange()">
                <div class="p-4 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18]/5 transition-all">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="iconify text-orange-600" data-icon="mdi:shield-account-outline"></span>
                        <span class="font-bold text-gray-900 peer-checked:text-[#6B0D18]">Admin</span>
                    </div>
                    <p class="text-xs text-gray-500 line-clamp-2">Quản lý hầu hết chức năng, ngoại trừ thiết lập hệ thống.</p>
                </div>
                <div class="absolute top-4 right-4 hidden peer-checked:block text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:check-circle"></span>
                </div>
            </label>

            <!-- Quản lý kho -->
            <label class="relative block cursor-pointer group">
                <input type="radio" name="role" value="kho" class="peer sr-only" onchange="handleRoleChange()">
                <div class="p-4 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18]/5 transition-all">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="iconify text-blue-600" data-icon="mdi:warehouse"></span>
                        <span class="font-bold text-gray-900 peer-checked:text-[#6B0D18]">Quản lý kho</span>
                    </div>
                    <p class="text-xs text-gray-500 line-clamp-2">Kiểm soát tồn kho, nhập/xuất và kiểm kê hàng hóa.</p>
                </div>
                <div class="absolute top-4 right-4 hidden peer-checked:block text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:check-circle"></span>
                </div>
            </label>

            <!-- CSKH -->
            <label class="relative block cursor-pointer group">
                <input type="radio" name="role" value="cskh" class="peer sr-only" onchange="handleRoleChange()" checked>
                <div class="p-4 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18]/5 transition-all">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="iconify text-purple-600" data-icon="mdi:headset"></span>
                        <span class="font-bold text-gray-900 peer-checked:text-[#6B0D18]">CSKH</span>
                    </div>
                    <p class="text-xs text-gray-500 line-clamp-2">Tương tác khách hàng, xem đơn hàng, hỗ trợ giải đáp.</p>
                </div>
                <div class="absolute top-4 right-4 hidden peer-checked:block text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:check-circle"></span>
                </div>
            </label>

            <!-- Tùy chỉnh -->
            <label class="relative block cursor-pointer group">
                <input type="radio" name="role" value="custom" class="peer sr-only" onchange="handleRoleChange()">
                <div class="p-4 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 peer-checked:border-[#6B0D18] peer-checked:bg-[#6B0D18]/5 transition-all h-full">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="iconify text-gray-600" data-icon="mdi:cog-outline"></span>
                        <span class="font-bold text-gray-900 peer-checked:text-[#6B0D18]">Tùy chỉnh quyền</span>
                    </div>
                    <p class="text-xs text-gray-500 line-clamp-2">Thiết lập quyền hạn thủ công cho từng module.</p>
                </div>
                <div class="absolute top-4 right-4 hidden peer-checked:block text-[#6B0D18]">
                    <span class="iconify" data-icon="mdi:check-circle"></span>
                </div>
            </label>
        </div>

        <div id="superAdminWarning" class="hidden mt-4 p-4 bg-orange-50 border border-orange-200 rounded-xl flex gap-3">
            <span class="iconify text-orange-500 text-xl shrink-0 mt-0.5" data-icon="mdi:alert"></span>
            <div>
                <p class="text-sm font-bold text-orange-800">Cảnh báo bảo mật</p>
                <p class="text-xs text-orange-700 mt-1">Vai trò Super Admin có toàn quyền hệ thống. Hãy đảm bảo bạn cấp quyền này cho đúng người và yêu cầu họ bật xác minh bảo mật.</p>
            </div>
        </div>
    </div>

    <!-- Ma trận phân quyền -->
    <div id="permissionMatrixSection" class="mt-8 pt-6 border-t border-gray-200">
        <h4 class="font-bold text-gray-900 mb-4 flex items-center justify-between">
            <span>Chi tiết phân quyền (Theo vai trò)</span>
            <button type="button" class="text-xs text-gray-500 font-normal underline hover:text-[#6B0D18]">Sao chép quyền từ vai trò khác</button>
        </h4>
        
        <div class="overflow-x-auto border border-gray-200 rounded-xl relative">
            <table class="w-full text-left min-w-[800px] permission-table">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 w-1/3">Module quản lý</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 text-center w-24">Xem</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 text-center w-24">Thêm</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 text-center w-24">Sửa</th>
                        <th class="px-4 py-3 text-xs font-medium text-red-500 text-center w-24">Xóa</th>
                        <th class="px-4 py-3 text-xs font-medium text-gray-500 text-center w-24">Đặc biệt</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-sm">
                    <!-- Dashboard -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">Dashboard & Thống kê</td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-view"></td>
                        <td class="px-4 py-3 text-center">-</td>
                        <td class="px-4 py-3 text-center">-</td>
                        <td class="px-4 py-3 text-center">-</td>
                        <td class="px-4 py-3 text-center">
                            <label class="inline-flex items-center gap-1 cursor-pointer" title="Quyền xuất Excel">
                                <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-special">
                                <span class="iconify text-gray-400" data-icon="mdi:file-excel-outline"></span>
                            </label>
                        </td>
                    </tr>
                    <!-- Sản phẩm -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">Sản phẩm & Danh mục</td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-view"></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-add"></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-edit"></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-red-500 focus:ring-red-500 p-check p-delete"></td>
                        <td class="px-4 py-3 text-center">
                            <label class="inline-flex items-center gap-1 cursor-pointer" title="Quyền xuất Excel">
                                <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-special">
                                <span class="iconify text-gray-400" data-icon="mdi:file-excel-outline"></span>
                            </label>
                        </td>
                    </tr>
                    <!-- Đơn hàng -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">Đơn hàng & Thanh toán</td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-view"></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-add"></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-edit"></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-red-500 focus:ring-red-500 p-check p-delete"></td>
                        <td class="px-4 py-3 text-center">
                            <label class="inline-flex items-center gap-1 cursor-pointer" title="Quyền xuất Excel">
                                <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-special">
                                <span class="iconify text-gray-400" data-icon="mdi:file-excel-outline"></span>
                            </label>
                        </td>
                    </tr>
                    <!-- Kho -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">Quản lý Kho</td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-view"></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-add"></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-edit"></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-red-500 focus:ring-red-500 p-check p-delete"></td>
                        <td class="px-4 py-3 text-center">
                            <label class="inline-flex items-center gap-1 cursor-pointer" title="Duyệt phiếu nhập/xuất">
                                <input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-special">
                                <span class="iconify text-gray-400" data-icon="mdi:check-decagram-outline"></span>
                            </label>
                        </td>
                    </tr>
                    <!-- Cấu hình -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 font-medium text-gray-900">Cấu hình & Nhân sự</td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-view"></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-add"></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-[#6B0D18] focus:ring-[#6B0D18] p-check p-edit"></td>
                        <td class="px-4 py-3 text-center"><input type="checkbox" class="rounded border-gray-300 text-red-500 focus:ring-red-500 p-check p-delete"></td>
                        <td class="px-4 py-3 text-center">-</td>
                    </tr>
                </tbody>
            </table>
            <div id="matrixOverlay" class="absolute inset-0 bg-white/60 backdrop-blur-[1px] hidden items-center justify-center border border-gray-200 rounded-xl" style="margin-top: -1px">
                <div class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm font-medium shadow-lg flex items-center gap-2">
                    <span class="iconify" data-icon="mdi:shield-check-outline"></span> Quyền hạn được thiết lập sẵn theo vai trò
                </div>
            </div>
        </div>
        <p class="text-xs text-gray-500 mt-3 flex items-center gap-1">
            <span class="iconify text-gray-400" data-icon="mdi:information-outline"></span> Chọn vai trò "Tùy chỉnh quyền" để có thể check/uncheck các quyền thủ công ở bảng trên.
        </p>
    </div>
</div>

<style>
    .permission-table {
        position: relative;
    }
</style>

<script>
    function handleRoleChange() {
        const roles = document.getElementsByName('role');
        let selectedRole = '';
        for (let r of roles) {
            if (r.checked) selectedRole = r.value;
        }

        const warning = document.getElementById('superAdminWarning');
        const overlay = document.getElementById('matrixOverlay');
        const checkboxes = document.querySelectorAll('.p-check');

        // Reset
        warning.classList.add('hidden');
        overlay.classList.add('hidden');
        overlay.classList.remove('flex');

        if (selectedRole === 'super_admin') {
            warning.classList.remove('hidden');
            // Check all
            checkboxes.forEach(cb => { cb.checked = true; cb.disabled = true; });
            overlay.classList.add('flex');
            overlay.classList.remove('hidden');
        } 
        else if (selectedRole === 'cskh') {
            // Check view, add, edit for order, view for product. Uncheck others.
            checkboxes.forEach((cb, idx) => {
                cb.checked = false;
                cb.disabled = true;
                // row 1: product, row 2: order
                // This is just a mock logic
                if(cb.classList.contains('p-view')) cb.checked = true;
            });
            overlay.classList.add('flex');
            overlay.classList.remove('hidden');
        }
        else if (selectedRole === 'custom') {
            // Enable all
            checkboxes.forEach(cb => { cb.disabled = false; });
        }
        else {
            // Admin, Kho ...
            checkboxes.forEach((cb, idx) => {
                cb.checked = (idx % 2 === 0); // Mock check
                cb.disabled = true;
            });
            overlay.classList.add('flex');
            overlay.classList.remove('hidden');
        }
    }
</script>
